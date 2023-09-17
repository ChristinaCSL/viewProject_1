<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;

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
    public function login(Request $request){
        $input = $request->all(); //email, password
        $request->validate(['email'=>'required|email','password'=>'required']);
        if(auth()->attempt(array('email'=>$input['email'],'password'=>$input['password']))){
            //auth() represents valid login user so you can get login user information from the auth() object
            $validate=auth()->user();
            if($validate->usertype=='admin'){
                //for admin
                return redirect()->route('admin.dashboard');
            }
            else{
                //for client
                return redirect()->route('home');
            }
        }
        else{
            return redirect()->route('login')->with('error','Invalid email & password');
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
