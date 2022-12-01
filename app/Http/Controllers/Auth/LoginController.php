<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Session;

class LoginController extends Controller
{
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
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        if (auth()->check()) {
            return redirect(RouteServiceProvider::HOME);
        }
        return view("auth.login");
    }

    public function login(Request $request)
    {
        $validated = Validator::make($request->all(), [
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ]);

        if ($validated->fails()) {               
            return redirect()->route('login')
                ->withErrors($validated)
                ->withInput();
        }

        $remember = $request->remember;

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials, $remember)) {
            \UserLog::createLog('Logged in to apps');

            return redirect()->route('home');
        }

        return redirect("login")->with([
            'msg' => 'Opps! You have entered invalid credentials',
            'icon' => 'warning',
            'confirmButtonColor' => 'warning',
        ]);
    }

    public function logout(Request $request)
    {
        \UserLog::createLog('Logged out from apps');
        Session::flush();
        Auth::logout();
        return redirect()->route('login');
    }
}
