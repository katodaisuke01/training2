<?php

namespace App\Http\Controllers\Worker\Accept;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Order;
use App\Models\StaffWork;
use App\Models\Tray;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class SortController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:worker');
    }

    /**
     * @return Application|Factory|View
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        $chunksOfClients = Client::getChunksForTable();

        return view('worker/accept/sort', ['user' => $user, 'chunksOfClients' => $chunksOfClients]);
    }

    public function sortDataByUrl(Request $request)
    {
        $order = Order::findByStockUrl($request->get('order_stock_url'));
        if ($order->instock_status !== Order::TYPE_CONFIRMED) {
            return response()->json(['message' => 'Page Not Found'], 404);
        }

        StaffWork::create([
            'wuser_id' => Auth::user()->id,
            'task_id' => StaffWork::TASK_SORTING,
            'order_id' => $order->id,
            'completed_flg' => StaffWork::TYPE_PROCESS
        ]);

        return response()
            ->json([
                'order' => $order,
            ]);
    }

    public function associateWithTray(Request $request)
    {
        $user = Auth::user();

        $order = Order::find($request->get('order_id'));
        $tray = Tray::findByCode($request->get('tray_code'));
        if ($tray == null) {
            return response()->json(['message' => 'Page Not Found'], 404);
        }

        $order->instock_status = Order::TYPE_SORTED;
        $order->tray_id = $tray->id;
        $order->save();

        $staff_work = StaffWork::query()
            ->where('order_id', $order->id)
            ->where('task_id', StaffWork::TASK_SORTING);

        if(!$staff_work->get()->isEmpty()){
            $staff_work->update(['completed_flg' => StaffWork::TYPE_COMPLETE]);
        }

        $client = $order->client()->with(['shelf', 'area'])->first();

        return response()
            ->json([
                'tray' => $tray,
                'client' => $client,
                'todaysSortProgress' => Order::todaysSortProgress($user->m_business_id),
            ]);
    }
}