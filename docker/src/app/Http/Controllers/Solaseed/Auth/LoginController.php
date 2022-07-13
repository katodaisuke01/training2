<?php

namespace App\Http\Controllers\Solaseed\Auth;

use App\Http\Controllers\Controller;
use App\Models\DeliveryUser;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $maxAttempts = 30;     // ログイン試行回数（回）
    protected $decayMinutes = 1;   // ログインロックタイム（分）

    protected $redirectTo = RouteServiceProvider::SOLASEED_HOME;

    public function login(Request $request)
    {
        $this->validateLogin($request);

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if (method_exists($this, 'hasTooManyLoginAttempts') &&
            $this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        if ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }

    /**
     * Attempt to log the user into the application.
     *
     * @param \Illuminate\Http\Request $request
     * @return bool
     */
    protected function attemptLogin(Request $request)
    {
        return $this->guard()->attempt(
            $this->credentials($request), $request->filled('remember')
        );
    }

    public function username()
    {
        $username = request()->input('username');
        $field = filter_var($username, FILTER_VALIDATE_EMAIL) ? 'email' : 'service_id';
        // 利用中のみのユーザがログインできるようにします
        request()->merge([$field => $username]);
        return $field;
    }

    protected function validateLogin(Request $request)
    {
        $request->validate([
            'delivery_partner_id' => 'required',
            $this->username() => 'required|string',
            'password' => 'required|string',
        ]);
    }

    protected function credentials(Request $request)
    {
        return $request->only('delivery_partner_id', $this->username(), 'password');
    }

    // Guardの認証方法を指定
    protected function guard()
    {
        return Auth::guard('solaseed');
    }

    public function showLoginForm($delivery_partner_id = '')
    {
        Auth::guard('solaseed')->logout();

        return view('solaseed/auth/login', ['delivery_partner_id' => $delivery_partner_id]);
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
            : redirect(route('solaseed.home'));
    }

    // ログアウト処理
    public function logout(Request $request)
    {
        Auth::guard('solaseed')->logout();

        return $this->loggedOut($request);
    }

    // ログアウトした時のリダイレクト先
    public function loggedOut(Request $request)
    {
        return redirect(route('solaseed.login'));
    }

    protected function authenticated(Request $request, DeliveryUser $user)
    {
        $user->date_last = now();
        $user->save();
    }
}
