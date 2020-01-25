<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\User;
use App\Post;

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
    * @return \Illuminate\Contracts\Support\Renderable
    */
   public function index(){
      if(Auth::check()){
         $user = Auth::user();
         $following = $user->following->shuffle();
         $length = count($following);
         $recommended = [];
         if($length > 0){
            $end = ($length >= 3) ? 3 : $length;
            for($i = 0; $i < $end; $i++){
               $buffer = $following[$i]->following->shuffle()->first();
               if($buffer != null){
                  $recommended[$i] = $buffer;
               }
            }
         }
         if(count($recommended) == 0){
            $recommended = User::inRandomOrder()->limit(3)->get();
         }
         return view("home")->with([
            "user" => $user,
            "recommended" => $recommended
         ]);
      }
   }

   public function loadPosts(){
      if(Auth::check()){
         $postsPerLoad = 10;
         $step = Input::get("step");
         return Post::whereIn("user_id", Auth::user()->following->pluck('id'))
            ->offset($postsPerLoad * ($step - 1))
            ->limit($postsPerLoad)
            ->get();
      }
   }

}
