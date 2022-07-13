<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @param string|null $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check() && $guard === 'warehouse') {
            return redirect(RouteServiceProvider::WAREHOUSE_HOME);
        } elseif (Auth::guard($guard)->check() && $guard === 'admin') {
            return redirect(RouteServiceProvider::ADMIN_HOME);
        } elseif (Auth::guard($guard)->check() && $guard === 'industry') {
            return redirect(RouteServiceProvider::MAIN_HOME);
        } elseif (Auth::guard($guard)->check() && $guard === 'worker') {
            return redirect(RouteServiceProvider::WORKER_HOME);
        } elseif (Auth::guard($guard)->check() && $guard === 'solaseed') {
            return redirect(RouteServiceProvider::SOLASEED_HOME);
        }

        return $next($request);
    }
}
