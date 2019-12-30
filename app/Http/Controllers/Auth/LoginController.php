<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller{

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
   protected $redirectTo = '/home';

   /**
    * Create a new controller instance.
    *
    * @return void
    */
   public function __construct(){
      $this->middleware('guest')->except('logout');
   }

   /**
    * This method has been overwritten of the original "username()" method in the
    * "Illuminate\Foundation\Auth\AuthenticatesUsers" trait.
    */
   public function username(){
      return 'e_mail';
   }

   /**
     * The user has been authenticated.
     *
     * @param  mixed  $user
     * @return mixed
     */
   public function authenticated($user){
      session(['email' => $user->e_mail]);
      return redirect()->intended($this->redirectPath());
   }
}
