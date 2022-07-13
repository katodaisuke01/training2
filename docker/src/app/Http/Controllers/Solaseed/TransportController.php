<?php

namespace App\Http\Controllers\Solaseed;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Package;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class TransportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        $query = Package::where('shipping_date', date('Y-m-d'))
            ->where('delivery_partnar_id', $user->delivery_partner_id)
            ->where(function ($_q) {
                $_q->where('pack_status', Package::TYPE_CONFIRMED)
                    ->orwhere('pack_status', Package::TYPE_PICKUP);
            });

        if ($request->get('start_date')) {
            $query->where('shipping_date', '>=', $request->get('start_date'));
        }

        if ($request->get('end_date')) {
            $query->where('shipping_date', '<=', $request->get('end_date'));
        }

        $packages = $query->get();

        $done_count = 0;
        foreach ($packages as $package) {
            if (data_get($package, 'transport_done_package')) {
                $done_count++;
            }
        }

        return view('solaseed/transport/index', [
            'request' => $request,
            'packages' => $packages,
            'done_count' => $done_count,
        ]);
    }

    public function confirm()
    {
        return view('solaseed/transport/confirm');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        DB::beginTransaction();
        try {
            foreach ($request->get('package') as $k => $v) {
                $package = Package::find($k); // 対象の箱を取得
                if (!isset($v['shipping_number']) && !isset($v['shipping_schedule_time'])) continue;

                if (isset($v['shipping_number'])) {
                    $package->shipping_number = $v['shipping_number'];
                }

                if (isset($v['shipping_schedule_time'])) {
                    $time = str_replace([' '], '', $v['shipping_schedule_time']);
                    $package->shipping_schedule_time = $time;
                }

                $package->update();
            }
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()
                ->route('solaseed.transport.index')
                ->with('flash_message', '失敗しました。');
        }
        DB::commit();

        return redirect()
            ->route('solaseed.transport.index')
            ->with('flash_message', '更新しました。');
    }

    /**
     * Display the specified resource.
     *
     * @param Package $package
     * @return Application|Factory|View
     */
    public function show(Package $package)
    {
        $from = request('from');
        $user = Auth::user();
        return view('solaseed/transport/detail', [
            'package' => $package,
            'from' => $from,
            'user' => $user
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function entry(Package $package, Request $request)
    {
        try {
            $package->transport_space = $request->get('transport_space') ? Package::TYPE_RESERVED_SPACE : '';;
            $package->package_height = (int)$request->get('package_height') ?? null;
            $package->package_width = (int)$request->get('package_width') ?? null;
            $package->package_depth = (int)$request->get('package_depth') ?? null;
            $package->temporary_weight = (int)$request->get('temporary_weight') ?? null;
            $package->loading_weight = $request->get('loading_weight') ?? null;
            $package->logistic_cost = (int)$request->get('logistic_cost') ?? null;
            $package->update();
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('flash_message', '失敗しました。');
        }

        if (data_get($package, 'transport_done_package')) {
            $package->pack_status = Package::TYPE_PICKUP;
            $package->update();
        }

        return redirect()
            ->back()
            ->with('flash_message', '更新しました。');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
