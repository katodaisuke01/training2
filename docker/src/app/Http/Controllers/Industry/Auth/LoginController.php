<?php

namespace App\Http\Controllers\Industry\Auth;

use App\Http\Controllers\Controller;
use App\Models\IndustryGroup;
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
    protected $redirectTo = RouteServiceProvider::MAIN_HOME;

    protected function redirectTo()
    {
        $industry_group = auth('industry')
            ->user()
            ->industry_group()
            ->first();

        if ($industry_group->natural_type === IndustryGroup::TYPE_CULTIVATION) {
            return route('industry.cultivation');
        }

        return $this->redirectTo;
    }

    // ログイン画面
    public function showLoginForm2($industry_group_id)
    {
        Auth::guard('industry')->logout();

        return view('auth.loginShortCut', ['industry_group_id' => $industry_group_id]);
    }

    protected function validateLogin(Request $request)
    {
        $request->validate([
            $this->industry_group_id() => 'required|integer',
            $this->username() => 'required|string',
            'password' => 'required|string',
        ]);
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
        return \Auth::guard('industry');
    }

    protected function credentials(Request $request)
    {
        return $request->only($this->industry_group_id(), $this->username(), 'password');
    }

    // ログイン画面
    public function showLoginForm()
    {
        Auth::guard('industry')->logout();

        return view('auth.login');
    }

    public function logout(Request $request)
    {
        Auth::guard('industry')->logout();

        return $this->loggedOut($request);
    }

    protected function loggedOut(Request $request)
    {
        return redirect(route('industry.login'));
    }
}
