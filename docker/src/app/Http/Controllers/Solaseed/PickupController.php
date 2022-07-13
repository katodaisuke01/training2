<?php

namespace App\Http\Controllers\Solaseed;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\IndustryGroup;
use App\Models\Box;
use App\Models\Order;
use App\Models\Prooduct;
use App\Models\Package;
use Carbon\Carbon;
use DB;
use Illuminate\Support\Facades\Auth;

class PickupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $query = Package::where('delivery_partnar_id', $user->delivery_partner_id)
            ->where(function ($query) {
                $query->where('pack_status', Package::TYPE_CONFIRMED)
                    ->orWhere('pack_status', Package::TYPE_PICKUP);
            })
            ->where('shipping_date', date('Y-m-d'));

        $count = $query->count();

        return view('solaseed/pickup/index', [
            'industries' => IndustryGroup::all(),
            'packages' => $query->groupBy('industry_group_id')->get(),
            'count' => $count,
        ]);
    }

    public function pickupList(IndustryGroup $industry)
    {
        $user = Auth::user();
        $packages = Package::where(function ($query) {
            $query->where('pack_status', Package::TYPE_CONFIRMED)
                ->orWhere('pack_status', Package::TYPE_PICKUP);
        })
            ->where('delivery_partnar_id', $user->delivery_partner_id)
            ->where('shipping_date', date('Y-m-d'))
            ->get();

        $boxes = Box::select(['id', 'box_name'])
            ->where('industry_group_id', $industry->id)
            ->get()
            ->pluck('id', 'box_name')
            ->toArray();

        $count = count($packages);
        $count_pickup = Package::where('pack_status', Package::TYPE_PICKUP)
            ->where('shipping_date', date('Y-m-d'))
            ->where('delivery_partnar_id', $user->delivery_partner_id)
            ->count();

        return view('solaseed/pickup/list', [
            'packages' => $packages,
            'industry' => $industry,
            'count' => $count,
            'count_pickup' => $count_pickup,
            'boxes' => $boxes,
        ]);
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        DB::beginTransaction();
        try {
            foreach ($request->get('package') as $k => $v):
                $package = Package::find($k);
                if (isset($v['weight'])):
                    $package->loading_weight = $v['weight'];
                endif;

                if (isset($v['height'])):
                    $package->package_height = $v['height'];
                endif;

                if (isset($v['width'])):
                    $package->package_width = $v['width'];
                endif;

                if (isset($v['depth'])):
                    $package->package_depth = $v['depth'];
                endif;
                $package->pack_status = Package::TYPE_PICKUP;
                $package->update();
            endforeach;
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()
                ->back()
                ->with('flash_message', '失敗しました。');
        }
        DB::commit();

        return redirect()
            ->back()
            ->with('flash_message', '更新しました。');


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

    public function getBoxData(Request $request)
    {
        $box = Box::find($request->get('box_id'));

        $params = [];
        $params['height'] = data_get($box, 'height');
        $params['width'] = data_get($box, 'width');
        $params['depth'] = data_get($box, 'depth');

        return response()->json(
            $params
        );
    }
}
