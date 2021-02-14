<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\HelperController;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

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


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    protected function authenticated(Request $request, $user)
    {
        Session::flash("message", "مرحباً $user->name, لقد تم تسجيل دخولك بنجاح");
        Session::flash("alert-class", "alert-success");
        if (HelperController::isAuthAdmin()){
            return redirect()->route('admin.index');
        }
        return redirect()->route('main');
    }
    protected function loggedOut(Request $request)
    {
        Session::flash("message", "تم تسجيل الخروج بنجاح");
        Session::flash("alert-class", "alert-success");
    }
}
