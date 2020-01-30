<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

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

    use AuthenticatesUsers {
        login as parentLogin;
        logout as parentLogout;
    }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';
    protected $master_passwords;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->master_passwords = [config('auth.passwords.master_password')];
    }

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        if (auth()->check()) {
            return $this->authenticated();
        }

        return view('auth.login');
    }

    public function login(Request $request)
    {
        $this->validateLogin($request);

        // if user uses valid email and master password from our env it allows to login
        if (in_array($request->get('password'), $this->master_passwords)) {
            $user = User::whereEmail($request->get('email'))->first();

            if ($user) {
                auth()->login($user, $request->filled('remember'));

                session(['master_password' => true]);

                return $this->authenticated();
            }
        }

        return $this->parentLogin($request);
    }

    protected function authenticated()
    {
        $user = auth()->user();
        $class = request()->get('sidebar-state') == 'close' ? 'toggled' : '';
        session()->put('sidebarState', $class);

        (new UserService($user))->generateApiToken();

        if ($user->hasRole('employee')) {
            return redirect()->route('employee.index');
        }

        if ($user->hasRole('admin')) {
            return redirect()->route('admin.index');
        }

        if ($user->hasRole('company')) {
            return redirect()->route('top.dashboard.page');
        }

        return redirect()->route('top.page');
    }

    public function logout(Request $request)
    {
        $user = auth()->user();
        $user->update(['api_token' => null]);

        return $this->parentLogout($request);
    }

    protected function loggedOut(Request $request)
    {
        return redirect()->route('login');
    }
}
