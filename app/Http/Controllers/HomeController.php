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
      if(Auth::check()){
         $user = Auth::user();
         if(Auth::user()->isAdmin()){
            return view("administrators.admin", compact("user"));
         }else{
            return view("home", compact("user"));
         }
      }
   }
}
