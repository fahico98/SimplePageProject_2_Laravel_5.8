<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\User;

class FollowController extends Controller{

   public function follow($followerEmail, $followedEmail, $tab = "profile"){
      $followerId = User::where("e_mail", "=", $followerEmail)->first()->id;
      $followedId = User::where("e_mail", "=", $followedEmail)->first()->id;
      DB::table('follower_followed')->insert([
         "follower_id" => $followerId,
         "followed_id" => $followedId
      ]);
      if($tab === "profile"){
         $user = User::where("id", "=", $followedId)->first();
         return redirect()->route("user.profile", [
            "e_mail" => $user->e_mail,
            "tab" => "posts"
         ]);
      }else{
         $user = User::where("e_mail", "=", session("email"))->first();
         $users = $tab === "followers" ? $user->followers : $user->following;
         return view("user.profile_tabs.following_followers")->with([
            "users" => $users,
            "user" => $user,
            "tab" => $tab
         ]);
      }
   }

   public function unfollow($followerEmail, $followedEmail, $tab = "profile"){
      $followerId = User::where("e_mail", "=", $followerEmail)->first()->id;
      $followedId = User::where("e_mail", "=", $followedEmail)->first()->id;
      $user = User::where("e_mail", "=", session("email"))->first();
      DB::table("follower_followed")
         ->where("follower_id", "=", $followerId)
         ->where("followed_id", "=", $followedId)
         ->delete();
      if($tab === "profile"){
         $user = User::where("id", "=", $followedId)->first();
         return redirect()->route("user.profile", [
            "e_mail" => $user->e_mail,
            "tab" => "posts"
         ]);
      }else{
         $user = User::where("e_mail", "=", session("email"))->first();
         $users = $tab === "followers" ? $user->followers : $user->following;
         return view("user.profile_tabs.following_followers")->with([
            "users" => $users,
            "user" => $user,
            "tab" => $tab
         ]);
      }
   }
}
