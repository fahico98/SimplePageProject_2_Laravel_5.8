<?php

<<<<<<< HEAD
namespace App\Http\Controllers;
=======
namespace simplePageProject_2\Http\Controllers;
>>>>>>> 110ffc8a2994256a0965438821bdb85263fbbc55

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller{

   /**
    * Create a new controller instance.
    *
    * @return void
    */
   public function __construct(){
<<<<<<< HEAD
      $this->middleware('auth');
=======
      $this->middleware(['auth','verified']);
>>>>>>> 110ffc8a2994256a0965438821bdb85263fbbc55
   }

   /**
    * Show the application dashboard.
    *
<<<<<<< HEAD
    * @return \Illuminate\Contracts\Support\Renderable
    */
   public function index(){
=======
    *
    *
    * @return \Illuminate\Contracts\Support\Renderable
    */
   public function index(Request $request){
>>>>>>> 110ffc8a2994256a0965438821bdb85263fbbc55
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
