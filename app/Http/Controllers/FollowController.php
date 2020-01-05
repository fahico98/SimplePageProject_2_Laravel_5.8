<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\User;

class FollowController extends Controller{

   public function followingFollowers(){
      $flag = Input::get("flag");
      $email = Input::get("email");
      $user = User::where("e_mail", "=", $email)->first();
      if($flag === "followers"){
         $users = $user->followers;
      }else if($flag === "following"){
         $users = $user->following;
      }
      return view("user.profile_tabs.following_followers")->with([
         "users" => $users,
         "flag" => $flag
      ]);
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
