<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller{

    /*
   |--------------------------------------------------------------------------
   | Register Controller
   |--------------------------------------------------------------------------
   |
   | This controller handles the registration of new users as well as their
   | validation and creation. By default this controller uses a trait to
   | provide this functionality without requiring any additional code.
   |
   */

   use RegistersUsers;

   /**
    * Where to redirect users after registration.
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

      $this->middleware('guest')->except([
         "showSellerRegistrationForm",
         "createSeller",
         "sellerRegister"
      ]);

      $this->middleware('isAdmin')->only([
         "showSellerRegistrationForm",
         "createSeller",
         "sellerRegister"
      ]);
   }

   /**
    * Get a validator for an incoming registration request.
    *
    * @param  array  $data
    * @return \Illuminate\Contracts\Validation\Validator
    */
   protected function validator(array $data){
      return Validator::make($data, [
         'name' => ['required', 'string', 'max:50'],
         "lastname" => ["required", "string", "max:50"],
         "country" => ["required", "string", "max:100"],
         "city" => ["required", "string", "max:100"],
         "phone_number" => ["required", "string", "numeric", "unique:users"],
         'e_mail' => ['required', "email", 'max:50', 'unique:users'],
         'password' => ['required', 'string', 'min:8', 'confirmed'],
      ]);
   }

   /**
    * Create a new user instance after a valid registration.
    *
    * @param  array  $data
    * @return \simplePageProject_2\User
    */
   protected function create(array $data){
      return User::create([
         'name' => $data['name'],
         "lastname" => $data["lastname"],
         "country" => $data["country"],
         "city" => $data["city"],
         "phone_number" => $data["phone_number"],
         "e_mail" => $data["e_mail"],
         "password" => Hash::make($data['password']),
         "role_id" => 3
      ]);
   }

   /**
    * Show the application seller registration form.
    *
    * @return \Illuminate\Http\Response
    */
   public function showSellerRegistrationForm(){
      return view("auth.sellerRegister");
   }

   /**
    * Handle a seller registration request for the application.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
   public function sellerRegister(Request $request){
      $this->validator($request->all())->validate();
      event(new Registered($user = $this->createSeller($request->all())));
      //return $this->registered($request, $user) ? : redirect("/user_search_view");
      return redirect("/user_search_view");
   }

   /**
    * Create a new user instance after a valid registration.
    *
    * @param  array  $data
    * @return \simplePageProject_2\User
    */
   protected function createSeller(array $data){
      return User::create([
         'name' => $data['name'],
         "lastname" => $data["lastname"],
         "country" => $data["country"],
         "city" => $data["city"],
         "phone_number" => $data["phone_number"],
         "e_mail" => $data["e_mail"],
         "password" => Hash::make($data['password']),
         "role_id" => 2
      ]);
   }
}
