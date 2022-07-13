<?php

namespace App\Http\Controllers\Worker;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePicking;
use App\Models\Client;
use App\Models\ClientPackage;
use App\Models\Order;
use App\Models\StaffWork;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PickingController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:worker');
    }

    public function index()
    {
        $user = Auth::user();
        $client_packages_count = ClientPackage::where('user_id', $user->id)
            ->whereDate('created_at', Carbon::today())
            ->count();
        $orders = Order::with(['client:id,name,shelf_number', 'order_product:id,title'])
            ->where('instock_status', Order::TYPE_SORTED)
            ->whereDate('shipping_date', Carbon::today())
            ->get();

        $clients = Client::with('shelf')->get();

        // ラベルに表示するQRのため最新のclient_package_idを取得してプラス1
        $qr_client_package_id = ClientPackage::orderByDesc('id')->first()->id + 1;

        return view('worker/picking/index', [
            'orders' => $orders->sortBy(function ($order) {
                return $order->client->shelf->position_key;
            })->values(),
            'clients' => $clients,
            'client_packages_count' => $client_packages_count,
            'qr_client_package_id' => $qr_client_package_id
        ]);
    }

    public function store(StorePicking $request)
    {
        DB::transaction(function () use ($request) {
            $user = Auth::user();

            $query = Order::query();
            foreach ($request->get('orders') as $id => $value) {
                $query->orWhere('id', $id);
            }
            $orders = $query->get();

            $image_path = Storage::disk('s3')
                ->putFile('client_packages', $request->file('image'));
            $client_package = ClientPackage::create([
                'image_path' => $image_path,
                'client_id' => $orders->first()->client_id,
                'user_id' => $user->id,
                'status' => ClientPackage::TYPE_PICKED,
            ]);

            // 摘取り完了のログ作成
            foreach($orders as $order){
                StaffWork::create([
                    'wuser_id' => Auth::user()->id,
                    'task_id' => StaffWork::TASK_PICKING,
                    'order_id' => $order->id,
                    'completed_flg' => StaffWork::TYPE_COMPLETE
                ]);
            }

            foreach ($orders as $order) {
                $order->update([
                    'instock_status' => Order::TYPE_PICKET,
                    'client_package_id' => $client_package->id
                ]);
            }
        });
    }
}