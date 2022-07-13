<?php

namespace App\Http\Controllers\Warehouse\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $maxAttempts = 30;     // ログイン試行回数（回）
    protected $decayMinutes = 1;   // ログインロックタイム（分）

    protected $redirectTo = RouteServiceProvider::WAREHOUSE_HOME;

    public function username()
    {
        $username = request()->input('username');
        $field = filter_var($username, FILTER_VALIDATE_EMAIL) ? 'email' : 'service_id';
        // 利用中のみのユーザがログインできるようにします
        request()->merge([$field => $username]);
        return $field;
    }

    public function m_business_id()
    {
        return 'm_business_id';
    }

    protected function validateLogin(Request $request)
    {
        $request->validate([
            $this->m_business_id() => 'required|integer',
            $this->username() => 'required|string',
            'password' => 'required|string',
        ]);
    }

    protected function credentials(Request $request)
    {
        return $request->only($this->m_business_id(), $this->username(), 'password');
    }

    // Guardの認証方法を指定
    protected function guard()
    {
        return Auth::guard('warehouse');
    }

    // ログイン画面
    public function showLoginForm()
    {
        Auth::guard('warehouse')->logout();

        return view('warehouse.auth.login');
    }


    // ログイン画面
    public function showLoginForm2($m_business_id)
    {
        Auth::guard('warehouse')->logout();

        return view('warehouse.auth.login2', ['m_business_id' => $m_business_id]);
    }

    protected function sendLoginResponse(Request $request)
    {
        $request->session()->regenerate();

        $this->clearLoginAttempts($request);

        if ($response = $this->authenticated($request, $this->guard()->user())) {
            return $response;
        }

        return $request->wantsJson()
            ? new JsonResponse([], 204)
            : redirect(route('warehouse.home'));
    }

    // ログアウト処理
    public function logout(Request $request)
    {
        Auth::guard('warehouse')->logout();

        return $this->loggedOut($request);
    }

    // ログアウトした時のリダイレクト先
    public function loggedOut(Request $request)
    {
        return redirect(route('warehouse.login'));
    }
}
