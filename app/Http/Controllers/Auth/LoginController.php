<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
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

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;

    // protected $redirectTo = '/customer/home';

    public function redirectTo()
    {
        if (Auth()->user()->role == 1) {
            return redirect()->route('admin.home');
        } else if (Auth()->user()->role == 2) {
            return redirect()->route('seller.home');
        } else if (Auth()->user()->role == 0) {
            return redirect()->route('complaintRegistration');
        } else {
            return redirect()->route('login')->with('error', 'Either Email or Password is wrong');
        }
    }



    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    // public function showLoginForm()
    // {
    //     return view('auth.login');
    // }

    public function showLoginForm()
    {
        return view('welcome');
    }


    public function login(Request $request)
    {
        $input = $request->all();

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // if(auth()->attempt(array('email' => $input['email'], 'password' => $input['password'])))
        // {
        //     if (auth()->user()->is_admin == 1) {
        //         return redirect()->route('admin.home');
        //     }else{
        //         return redirect()->route('profile');
        //     }
        // }else{
        //     return redirect()->route('login')
        //         ->with('error','Email-Address And Password Are Wrong.');
        // }

        if (auth()->attempt(array('email' => $input['email'], 'password' => $input['password']))) {

            if (Auth()->user()->role == 1) {
                return redirect()->route('admin.home');
            } else if (Auth()->user()->role == 2) {
                return redirect()->route('seller.home');
            } else if (Auth()->user()->role == 0) {
                return redirect()->route('complaintRegistration');
            } else {
                return redirect()->route('login')->with('error', 'Either Email or Password is wrong');
                // return redirect()->back()->with('error','Either Email or Password is wrong');

            }
        }
        return redirect()->route('login')->with('error', 'Either Email or Password is wrong');
    }
}
