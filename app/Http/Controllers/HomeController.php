<?php

namespace simplePageProject_2\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller{

   /**
    * Create a new controller instance.
    *
    * @return void
    */
   public function __construct(){
      $this->middleware('auth');
   }

   /**
    * Show the application dashboard.
    *
    *
    *
    * @return \Illuminate\Contracts\Support\Renderable
    */
   public function index(Request $request){

      // Adding session data via Request instance...
      //$request->session()->put([$user->name => $user->role->role_name]);

      // Adding session data via session global helper...
      //session([$user->name => $user->role->role_name]);

      //var_dump($request->session()->all());

      $user = Auth::user();
      return view("home", compact("user"));
   }
}
