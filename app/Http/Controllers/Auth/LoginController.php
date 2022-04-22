<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
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

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('web')->except('logout');
        // $this->username = $this->findUsername();

    }

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */

    public function showLoginForm()
    {
        Auth::guard('web');
        if(Auth::guard('web')->check())
        {
            return redirect()->route('company.dashboard');
        }
        return view('auth.login');
    }

    /**
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Http\JsonResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */

    public function login(Request $request)
    {

        $this->validateLogin($request);

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.

        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }
        $email = $request->get('email');
        $password = $request->get('password');
        $remember_me = $request->remember;
        $login_type = filter_var($email, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        if (Auth::attempt([$login_type => $email, 'password' => $password], $remember_me)) {
            $this->updateLastLogin();
            return $this->sendLoginResponse($request);
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();

        return redirect()->route('login');

    }

    public function updateLastLogin()
    {
        $user = Auth::user();
        $user->last_logged_in = Carbon::now();
        $user->no_of_logins = $user->no_of_logins+1;
        $user->save();
    }

    /**
     * Get the login username to be used by the controller.
     *
     * @return string
     */
    // public function findUsername()
    // {
    //     $login = request()->input('login');

    //     $fieldType = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

    //     request()->merge([$fieldType => $login]);

    //     return $fieldType;
    // }

    /**
     * Get username property.
     *
     * @return string
     */
    // public function username()
    // {
    //     return $this->username;
    // }
}
