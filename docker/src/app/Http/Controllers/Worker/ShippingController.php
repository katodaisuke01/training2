<?php

namespace App\Http\Controllers\Worker;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateWorkerSipping;
use App\Models\Area;
use App\Models\Client;
use App\Models\ClientPackage;
use App\Models\Order;
use App\Models\StaffWork;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ShippingController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:worker');
    }

    public function index()
    {
        $user = Auth::user();
        $areas = Area::with(['clients' => function ($query) use ($user) {
            $query->withWhereHas('client_packages', function ($query) use ($user) {
                $query->where('user_id', $user->id)
                    ->whereDate('created_at', Carbon::today());
            });
        }])
            ->get()
            ->filter(function ($area) {
                return $area->clients->isNotEmpty();
            });

        return view('worker/shipping/index', ['areas' => $areas]);
    }

    public function getClientPackage(Request $request)
    {
        $user = Auth::user();
        $client_package = ClientPackage::findByUrl($request->get('client-package-url'));
        if($user->id == $client_package->user_id){

        // 読み込んだパッケージのstatusとその中の商品のステータスを更新
        $client_package->update([
            'status' => ClientPackage::TYPE_SHIPPED,
        ]);
        foreach($client_package->orders as $order){
            $order->update([
                'instock_status' => Order::TYPE_SHIPPED
            ]);
        }

        // 出荷チェック完了のログ作成
        StaffWork::create([
            'wuser_id' => Auth::user()->id,
            'task_id' => StaffWork::TASK_SHIPPING_CONFIRMATION,
            'client_package_id' => $client_package->id,
            'completed_flg' => StaffWork::TYPE_COMPLETE
        ]);        

        $result = DB::transaction(function () use ($client_package) {
                $user = Auth::user();
                $client_packages = ClientPackage::with('orders')
                    ->where('client_id', $client_package->client_id)
                    ->where('user_id', $user->id)
                    ->get();

                $count = 0;
                foreach ($client_packages as $client_package) {
                    if($client_package->status != 2){
                        $count += 1;
                    }
                }
                return $count;    
            });
    
            return response()->json([
                $client_package->client_id,$result,$client_package->client->area_id
            ]);
        }else{
            return response()->json(['message' => 'Page Not Found'], 404);
        }
    }

    public function update(UpdateWorkerSipping $request)
    {
        $result = DB::transaction(function () use ($request) {
            $user = Auth::user();
            $client_packages = ClientPackage::with('orders')
                ->where('client_id', $request->get('client_id'))
                ->where('user_id', $user->id)
                ->where('status',ClientPackage::TYPE_PICKED)
                ->whereDate('created_at', Carbon::today())
                ->get();

            foreach ($client_packages as $client_package) {
                foreach ($client_package->orders as $order) {
                    $order->update([
                        'instock_status' => Order::TYPE_SHIPPED
                    ]);
                }
                $client_package->update([
                    'status' => ClientPackage::TYPE_SHIPPED,
                ]);

                // 出荷チェック完了のログ作成
                StaffWork::create([
                    'wuser_id' => Auth::user()->id,
                    'task_id' => StaffWork::TASK_SHIPPING_CONFIRMATION,
                    'client_package_id' => $client_package->id,
                    'completed_flg' => StaffWork::TYPE_COMPLETE
                ]);
            }

        });

        return response()->json([
            'success'
        ]);
    }
}