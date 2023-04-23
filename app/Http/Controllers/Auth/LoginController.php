<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Foundation\Auth\AuthenticatesUsers;


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
    protected $redirectTo = RouteServiceProvider::ADMIN;



    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected function redirectTo()
    // {
    //     $role = Auth::user();
    //     if ($role == 0) {
    //         return RouteServiceProvider::DASHBOARD;
    //     } elseif ($role == 1) {
    //         return RouteServiceProvider::ADMIN;
    //     } else {
    //         return RouteServiceProvider::HOME;
    //     }
    // }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

        $this->middleware('guest')->except('logout');
    }

    // public function emailPasswordUpdate(Request $request)
    // {
    //     # code...
    //     dd($request);
    //     $user = Auth::user();
    //     $userUpdate = User::find($user);
    //     $userUpdate->email = $request->email;
    //     $userUpdate->password = $request->password;
    //     $userUpdate->save();
    //     Alert::success('User Detail Changed Successfully');
    //     return redirect()->back();
    // }
}
