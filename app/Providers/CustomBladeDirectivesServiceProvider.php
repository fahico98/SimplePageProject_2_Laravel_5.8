<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;

class CustomBladeDirectivesServiceProvider extends ServiceProvider{

   /**
    * Register services.
    *
    * @return void
    */
   public function register(){
      //
   }

   /**
    * Bootstrap services.
    *
    * @return void
    */
   public function boot(){

      Blade::if("isadmin", function(){
         return Auth::user() ? (Auth::user()->role->name === "administrator") : false;
      });

      Blade::if("isseller", function(){
         return Auth::user() ? (Auth::user()->role->name === "seller") : false;
      });

      Blade::if("insession", function($email){
         return session()->has("email") ? session("email") === $email : false;
      });

      Blade::if("outsession", function($email){
         return session()->has("email") ? session("email") !== $email : true;
      });

      Blade::if("following", function($followerEmail, $followedEmail){
         $followerId = User::where("e_mail", "=", $followerEmail)->first()->id;
         $followedId = User::where("e_mail", "=", $followedEmail)->first()->id;
         return DB::table('follower_followed')
            ->where("follower_id", "=", $followerId)
            ->where("followed_id", "=", $followedId)
            ->exists();
      });

      Blade::if("liked", function($postId){
         if(Auth::user()){
            $userId = User::where("e_mail", "=", session("email"))->first()->id;
            return DB::table("user_like_post")
               ->where("user_id", "=", $userId)
               ->where("post_id", "=", $postId)
               ->exists();
         }else{
            return false;
         }
      });

      Blade::if("disliked", function($postId){
         if(Auth::user()){
            $userId = User::where("e_mail", "=", session("email"))->first()->id;
            return DB::table("user_dislike_post")
               ->where("user_id", "=", $userId)
               ->where("post_id", "=", $postId)
               ->exists();
         }else{
            return false;
         }
      });
   }
}
