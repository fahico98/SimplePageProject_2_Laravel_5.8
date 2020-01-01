<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\User;

class FollowController extends Controller{

   public function followers(){
      $email = Input::get("email");
      $user = User::where("e_mail", "=", $email)->first();
      return view("user.profile_tabs.followers")->with(["followers" => $user->followers]);
   }

   public function follow(){
      $followerId = User::where("e_mail", "=", Input::get("followerEmail"))->first()->id;
      $followedId = User::where("e_mail", "=", Input::get("followedEmail"))->first()->id;
      DB::table('follower_followed')->insert([
         "follower_id" => $followerId,
         "followed_id" => $followedId
      ]);
   }
}
