<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\MeasuredProduct;
use App\Models\MeasuringLog;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DacsController extends Controller
{
    public function __construct()
    {
        MeasuringLog::stopIfExpire();
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function post(Request $request): JsonResponse
    {
        $measured_product = MeasuredProduct::create(
            array_merge(MeasuredProduct::parseWeight($request->get('data')), [
                'measuring_log_id' => MeasuringLog::measuringId()
            ])
        );

        return response()->json(isset($measured_product));
    }
}
