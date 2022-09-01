<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

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
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function login(Request $request){

        $message = array(
            'required.email'    =>  'This is required',
            'required.password' =>  'This is required',
        );
        $this->validate($request,[
            'email' =>  'required',
            'password'  =>  'required',
        ],$message);
    
        $email = $request->email;
        $pass = $request->password;
    
        if(Auth::attempt(['email' => $email, 'password' => $pass,'level' => 'admin'])){
            Session::flash('success','Welcome '.Auth::user()->name);
            return redirect()->to('/admin');
        }elseif(Auth::attempt(['email' => $email, 'password' => $pass,'level' => 'petugas'])){
            Session::flash('success','Welcome '.Auth::user()->name);
            return redirect()->to('/petugas');
        }elseif(Auth::attempt(['email' => $email, 'password' => $pass,'level' => 'pelanggan'])){
            Session::flash('success','Welcome '.Auth::user()->name);
            return redirect()->to('/');
        }else{
            Session::flash('error','Sorry! Try Again. It seems your login credential is not correct.');
            return redirect()->back();
        }
    
    }
}
