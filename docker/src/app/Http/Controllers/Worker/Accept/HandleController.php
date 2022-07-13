<?php

namespace App\Http\Controllers\Worker\Accept;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAlertOrder;
use App\Models\OrderAlert;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Package;
use App\Models\Accept;
use App\Models\StaffWork;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class HandleController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:worker');
    }


    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        $today = date('Y-m-d');
        $instock_orders = Order::query()
            ->select(['orders.*', 'packages.*', 'accepts.accept_date'])
            ->join('packages', function ($join) {
                $join->on('packages.id', '=', 'orders.package_id')
                    ->where('packages.instock_date', date('Y-m-d'));
            })
            ->join('accepts', function ($join) {
                $join->on('packages.id', '=', 'accepts.package_id');
            })
            ->orderBy('accepts.accept_date', 'desc')
            ->get()
            ->groupBy('package_id');

        return view('worker/accept/handle', [
            'orders' => $instock_orders
        ]);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function getPackage(Request $request): JsonResponse
    {
        $package = Package::findByUrl($request->get('package-url'));

        $orders = Order::query()
            ->where('package_id', $package->id)
            ->where('instock_status', Order::TYPE_NOT_CONFIRMED)
            ->get();

        if (data_get($package, 'instock_date') == null) {
            $package->pack_status = Package::TYPE_ACCEPTED;
            $package->instock_date = date('Y-m-d');
            $package->update();

            // foreach ($orders as $order) {
            //     $order->instock_status = Order::TYPE_CONFIRMED;
            //     $order->update();
            // }

            // ログ
            Accept::create([
                'wuser_id' => \Auth::user()->id,
                'package_id' => $package->id,
                'accept_date' => date('Y-m-d H:i:s')
            ]);

            // 荷受け完了のログ作成
            StaffWork::create([
                'wuser_id' => \Auth::user()->id,
                'task_id' => StaffWork::TASK_RECEIPT,
                'package_id' => $package->id,
                'amount' => NULL,
                'completed_flg' => StaffWork::TYPE_COMPLETE
            ]);          
        }

        if ($package === null || $orders->isEmpty()) {
            return response()->json(['message' => 'Page Not Found'], 404);
        }

        return response()
            ->json([
                'package' => $package,
                'orders' => $orders
            ]);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function checkOrder(Request $request): JsonResponse
    {
        $is_processed = DB::transaction(function () use ($request) {
            $order = Order::find($request->get('order_id'));

            // orderのinstock_statusが0以降の場合は以降の処理をしない
            if($order->instock_status > Order::TYPE_NOT_CONFIRMED){
                return true;
            }

            $order->instock_status = Order::TYPE_CONFIRMED;
            $order->confirming_date = Carbon::today();
            $order->save();

            $package = Package::find($order->package_id);

            // 荷捌きのログ作成
            $exist_package = StaffWork::select('*')
            ->where('package_id', $package->id)
            ->where('task_id', StaffWork::TASK_HANDLING);

            // 荷捌きで同じ箱IDのレコードがない場合は作成、ある場合はamountをプラス
            if($exist_package->get()->isEmpty()){
                StaffWork::create([
                    'wuser_id' => \Auth::user()->id,
                    'task_id' => StaffWork::TASK_HANDLING,
                    'package_id' => $package->id,
                    'amount' => 1,
                    'completed_flg' => StaffWork::TYPE_COMPLETE
                ]);
            }else{
                $exist_package->increment('amount');    
            }

            if ($package->is_order_processed) {
                $package->pack_status = Package::TYPE_HANDLE;
                return $package->save();
            }
            return false;
        });

        return response()
            ->json([
                'is_processed' => $is_processed,
            ]);
    }

    /**
     * @param StoreAlertOrder $request
     * @return JsonResponse
     */
    public function alertOrder(StoreAlertOrder $request): JsonResponse
    {
        OrderAlert::updateOrCreate(
            ['order_id' => $request->get('order_id')],
            OrderAlert::processAlertsForUpdate($request->get('alerts') ?? [])
        );

        return response()
            ->json([
                'success' => true
            ]);
    }
}