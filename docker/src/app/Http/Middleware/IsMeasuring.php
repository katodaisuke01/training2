<?php

namespace App\Http\Middleware;

use App\Models\MeasuringLog;
use Closure;
use Illuminate\Http\Request;

class IsMeasuring
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (!MeasuringLog::isMeasuring()) {
            abort(response()->json(
                ['error' => '計量が開始されていません'],
                403
            ));
        }

        return $next($request);
    }
}
