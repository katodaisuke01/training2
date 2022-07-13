<?php

namespace App\Http\Controllers\Industry;

use App\Http\Requests\Industry\DacsNewDataRequest;
use App\Models\MeasuredProduct;
use App\Models\MeasuringLog;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DacsController extends Controller
{
    public function __construct()
    {
        MeasuringLog::stopIfExpire();
    }

    /**
     * @return Application|Factory|View
     */
    public function index(Request $request)
    {
        return view('market/home/dacs', [
            'measured_products' => MeasuredProduct::datePick(
                'created_at',
                $request->get('start_date'),
                $request->get('end_date')
            )->get(),
            'request' => $request->all()
        ]);
    }

    /**
     * @return JsonResponse
     */
    public function start(): JsonResponse
    {
        if (MeasuringLog::isMeasuring()) {
            return response()->json(['success' => false, 'flash_message' => '計量受入中です']);
        }

        MeasuringLog::create([
            'type' => MeasuringLog::TYPE_START,
        ]);

        return response()->json([
            'success' => true,
            'flash_message' => '計量の受付を開始しました。',
            'latest_id' => MeasuredProduct::getLatestId()
        ]);
    }

    /**
     * @return JsonResponse
     */
    public function newData(DacsNewDataRequest $request): JsonResponse
    {
        $measured_products = MeasuredProduct::getNewData($request->get('id'));

        return response()->json([
            'is_updated' => $measured_products->isNotEmpty(),
            'measured_products' => $measured_products,
            'latest_id' => data_get($measured_products->last(), 'id')
        ]);
    }

    /**
     * @return JsonResponse
     */
    public function stop(): JsonResponse
    {
        $measuring_log = MeasuringLog::measuring();
        if (empty($measuring_log)) {
            return response()->json(['success' => false, 'flash_message' => '計量中ではありません']);
        }

        $measuring_log->type = MeasuringLog::TYPE_STOP;
        $measuring_log->save();

        return response()->json(['success' => true, 'flash_message' => '計量の受付を停止しました。']);
    }
}
