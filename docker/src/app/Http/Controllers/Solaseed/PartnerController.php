<?php

namespace App\Http\Controllers\Solaseed;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePartner;
use App\Http\Requests\UpdatePartner;
use App\Models\Client;
use App\Models\IndustryGroup;
use App\Models\MBusiness;
use App\Models\Partner;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $industry_groups = IndustryGroup::all();
        $m_business = MBusiness::all();

        return view('solaseed/partner/index', ['industry_groups' => $industry_groups, 'm_business' => $m_business]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('solaseed/partner/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StorePartner $request
     * @return RedirectResponse
     */
    public function store(StorePartner $request)
    {
        $params = $request->all();
        unset($params['type']);

        $model = Partner::getModelClass($request->get('type'));
        if (!$model) {
            return redirect()->back()->with('error', 'failed');
        }

        $params['prefecture_name'] = config('prefecture')[$params['prefecture']];

        $model::create($params);

        return redirect()
            ->route('solaseed.partner.index')
            ->with('flash_message', '作成が完了しました。');
    }

    /**
     * Display the specified resource.
     *
     * @param $type
     * @param $partner
     * @return Application|Factory|RedirectResponse|View
     */
    public function show($type, $partner)
    {
        $model = Partner::getModelClass($type);
        if (!$model) {
            return redirect()->back()->with('error', 'failed');
        }

        $partner = $model::find($partner);

        return view('solaseed/partner/detail', ['partner' => $partner]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $type
     * @param $partner
     * @return Application|Factory|RedirectResponse|View
     */
    public function edit($type, $partner)
    {
        $model = Partner::getModelClass($type);
        if (!$model) {
            return redirect()->back()->with('error', 'failed');
        }

        $partner = $model::find($partner);
        return view('solaseed/partner/edit', ['partner' => $partner, 'type' => $type]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdatePartner $request
     * @return RedirectResponse
     */
    public function update(UpdatePartner $request): RedirectResponse
    {
        $params = $request->all();
        unset($params['type']);

        $model = Partner::getModelClass($request->get('type'));
        if (!$model) {
            return redirect()->back()->with('error', 'failed');
        }

        $params['prefecture_name'] = config('prefecture')[$params['prefecture']];

        $partner = $model::find($params['id']);
        $partner->update($params);
        $partner->save();

        return redirect()
            ->route('solaseed.partner.detail', ['type' => $request->get('type'), 'partner' => $partner->id])
            ->with('flash_message', '更新が完了しました。');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
