<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Route;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param \Illuminate\Http\Request $request
     * @return string|null
     */

    protected $industry_route = 'industry.login';
    protected $admin_route = 'admin.login';
    protected $warehouse_route = 'warehouse.login';
    protected $solaseed_route = 'solaseed.login';
    protected $worker_route = 'worker.login';

    protected function redirectTo($request)
    {
        if (!$request->expectsJson()) {
            if (Route::is('solaseed.*')) {
                return route($this->solaseed_route);
            } elseif (Route::is('warehouse.*')) {
                return route($this->warehouse_route);
            } elseif (Route::is('admin.*')) {
                return route($this->admin_route);
            } elseif (Route::is('industry.*')) {
                return route($this->industry_route);
            } elseif (Route::is('worker.*')) {
                return route($this->worker_route);
            }
        }
    }
}
