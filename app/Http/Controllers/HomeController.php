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
         $recommendedIds = DB::table("follower_followed")
            ->whereIn("follower_id", $user->following->pluck('id'))
            ->pluck("followed_id");
         $recommended = User::whereIn("id", $recommendedIds)
            ->whereNotIn("id", $user->following->pluck("id"))
            ->where("id", "<>", $user->id)
            ->inRandomOrder()
            ->limit(3)
            ->get();
         if(count($recommended) == 0){
            $recommended = User::whereNotIn("id", $user->following->pluck("id"))
               ->where("id", "<>", $user->id)
               ->inRandomOrder()
               ->limit(3)
               ->get();
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
         $user = Auth::user();
         $step = Input::get("step");
         $posts = Post::whereIn("user_id", $user->following->pluck('id'))
            ->orWhere("user_id", "=", $user->id)
            ->orderBy("created_at", "desc")
            ->offset($postsPerLoad * ($step - 1))
            ->limit($postsPerLoad)
            ->get();
         return view("user.profile_tabs.post_card")->with(["posts" => $posts]);
      }
   }

}
