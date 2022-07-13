<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    protected $maxAttempts = 30;     // ログイン試行回数（回）
    protected $decayMinutes = 1;   // ログインロックタイム（分）

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::ADMIN_HOME;

    // ログイン画面
    public function showLoginForm2($industry_group_id)
    {
        Auth::guard('admin')->logout();

        return view('auth.loginShortCut', ['industry_group_id' => $industry_group_id]);
    }

    public function username()
    {
        $username = request()->input('username');
        $field = filter_var($username, FILTER_VALIDATE_EMAIL) ? 'email' : 'service_id';
        // 利用中のみのユーザがログインできるようにします
        request()->merge([$field => $username]);
        return $field;
    }

    public function industry_group_id()
    {
        return 'industry_group_id';
    }


    protected function guard()
    {
        return \Auth::guard('admin');
    }

    protected function credentials(Request $request)
    {
        return $request->only($this->industry_group_id(), $this->username(), 'password');
    }

    /**
     * The user has been authenticated.
     *
     * @param \Illuminate\Http\Request $request
     * @param mixed $user
     * @return mixed
     */
    protected function authenticated(Request $request, $user)
    {
        if ($user->deleted_at == null) {
            if ($user->type === 'MANAGER') {
                // ログイン後のリダイレクト
                return redirect()->intended($this->redirectPath());
            } else {
                return redirect()->to(route('admin.login'))->with('flash_message', 'ログインに必要な権限がありません。');
            }
        } else {
            return redirect()->to(route('admin.login'))->with('flash_message', 'ログインに必要な情報がありません。');
        }
    }

    // ログイン画面
    public function showLoginForm()
    {
        Auth::guard('admin')->logout();

        return view('auth.login2');
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();

        return $this->loggedOut($request);
    }

    protected function loggedOut(Request $request)
    {
        return redirect(route('admin.login'));
    }
}
