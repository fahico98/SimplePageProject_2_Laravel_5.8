<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\User;

class FollowController extends Controller{

   public function following(){
      $email = Input::get("email");
      $user = User::where("e_mail", "=", $email)->first();
      return view("user.profile_tabs.following")->with(["following" => $user->followed]);
   }

   public function follow(){
      $followerId = User::where("e_mail", "=", Input::get("followerEmail"))->first()->id;
      $followedId = User::where("e_mail", "=", Input::get("followedEmail"))->first()->id;
      DB::table('follower_followed')->insert([
         "follower_id" => $followerId,
         "followed_id" => $followedId
      ]);
   }

   public function unfollow(){
      $followerId = User::where("e_mail", "=", Input::get("followerEmail"))->first()->id;
      $followedId = User::where("e_mail", "=", Input::get("followedEmail"))->first()->id;
      DB::table("follower_followed")
         ->where("follower_id", "=", $followerId)
         ->where("followed_id", "=", $followedId)
         ->delete();
   }
}
