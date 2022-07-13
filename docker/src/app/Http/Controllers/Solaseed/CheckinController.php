<?php

namespace App\Http\Controllers\Solaseed;

use App\Http\Controllers\Controller;
use App\Models\IndustryGroup;
use App\Models\Package;
use App\Models\MBusiness;
use App\Models\DailyCheckinHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use DB;

class CheckinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function checkin()
    {
        $user = Auth::user();
        $query = Package::select(['packages.*', 'm_businesses.id as business_id', 'm_businesses.name as business_name'])
            ->where('delivery_partnar_id', $user->delivery_partner_id)
            ->where('shipping_date', date('Y-m-d'))
            ->leftJoin('m_businesses', 'm_businesses.id', 'packages.m_business_id');

        $package_count = $query->count();
        $packages = $query->get()
            ->groupBy('business_id');

        return view('solaseed/checkin/index', [
            'packages' => $packages,
            'package_count' => $package_count
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function checkinList(MBusiness $business)
    {
        $user = Auth::user();
        $packages = $business->checkin_target_packages()
            ->where('delivery_partnar_id', $user->delivery_partner_id)
            ->get();
        $daily_checkin_history = DailyCheckinHistory::where('m_business_id', $business->id)
            ->where('checkin_date', date('Y-m-d'))
            ->first();

        return view('solaseed/checkin/list', [
            'business' => $business,
            'packages' => $packages,
            'checkin_history' => $daily_checkin_history,
        ]);
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function checkedIn(Package $package)
    {
        try {
            $package->pack_status = Package::TYPE_CHECKED_IN;
            $package->save();
        } catch (\Exception $e) {
            return redirect()
                ->route('solaseed.checkin.index')
                ->with('flash_message', '失敗しました。');
        }

        return redirect()->back()->with('flash_message', '更新しました。');
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function createHistory(Request $request)
    {
        $params = $request->all();

        DB::beginTransaction();

        try {
            if (isset($params['checkin_photo'])) {
                // バケットの`checkin`フォルダへアップロード
                $path = Storage::disk('s3')->putFile('checkin', $params['checkin_photo']);
            }

            $daily_checkin_history = DailyCheckinHistory::where('m_business_id', $path)
                ->where('checkin_date', date('Y-m-d'))
                ->first();

            if ($daily_checkin_history) {
                $daily_checkin_history->image_path = $path;
                $daily_checkin_history->update();
            } else {
                DailyCheckinHistory::create([
                    'm_business_id' => $params['m_business_id'],
                    'checkin_date' => date('Y-m-d'),
                    'image_path' => $path,
                ]);
            }

            // 倉庫管理者にお知らせメール送信
            $m_business = MBusiness::find($params['m_business_id']);
            $target = $m_business->admin_email_address;

            foreach ($target as $val) {
                \Mail::send(new \App\Mail\NoticeCheckedIn([
                    'to' => $val,
                    'from' => (config('mail.from.address')),
                    'subject' => ('【' . env('APP_NAME', '倉庫管理システム') . '】' . __('置き配がされました'))
                ]));
            }
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withInput()->with('flash_message', '登録に失敗しました。');
        }
        DB::commit();

        return redirect()->back()->with('flash_message', '更新しました。');
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
    public function show()
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
