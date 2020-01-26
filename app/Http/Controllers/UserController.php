<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\ReceivedMessage;
use App\User;
use App\Post;

class UserController extends Controller{

   /**
    * Create a new controller instance.
    *
    * @return void
    */
   public function __construct(){
      $this->middleware("auth");
   }

   /**
    * Display the user profile.
    *
    * @param  String  $e_mail
    * @return \Illuminate\Http\Response
    */
   public function profile($e_mail, $tab = ""){
      $user = User::where("e_mail", "=", $e_mail)->first();
      if($tab === "posts"){
         $posts = Post::where("user_id", "=", $user->id)->orderBy("created_at", "desc")->get();
         return view("user.profile_tabs.posts")->with([
            "posts" => $posts,
            "user" => $user,
            "tab" => $tab
         ]);
      }else if($tab === "followers"){
         return view("user.profile_tabs.following_followers")->with([
            "users" => $user->followers,
            "user" => $user,
            "tab" => $tab
         ]);
      }else if($tab === "following"){
         return view("user.profile_tabs.following_followers")->with([
            "users" => $user->following,
            "user" => $user,
            "tab" => $tab
         ]);
      }else if($tab === "messages"){
         $messages = $user->sentAndReceived();
         return view("user.profile_tabs.messages")->with([
            "messages" => $messages,
            "user" => $user,
            "tab" => $tab
         ]);
      }/*else if($tab === "settings"){

         return view("user.profile_tabs.settings")->with([
            "user" => $user,
            "tab" => $tab
         ]);
      }*/
      else if($tab === "home"){
         return redirect()->route("home");
      }else{
         return redirect()->route("user.profile", [
            "e_mail" => $user->e_mail,
            "tab" => "posts"
         ]);
      }
   }

   public function profileRedirection($email){

   }

   /**
    * Store the user profile picture.
    *
    * @param  \Illuminate\Http\Request
    * @return \Illuminate\Http\Response
    */
   public function profilePicture(Request $request){
      $user = User::where("e_mail", $request->e_mail)->first();
      if($request){
         if($request->hasFile("profilePicture")){
            if($user->profile_picture !== "public/defaultUserPhoto.jpg"){
               Storage::delete($user->profile_picture);
            }
            $path = Storage::putFile("public", $request->file('profilePicture'));
            $user->update(["profile_picture" => $path]);
         }
      }
      return redirect()->route("user.profile", [
         "e_mail" => $user->e_mail,
         "tab" => $request->tab
      ]);
   }

   /**
    * Update user biography and occupation.
    *
    * @param  \Illuminate\Http\Request
    */
   public function bio(Request $request){
      $user = User::where("e_mail", $request->e_mail)->first();
      $user->update([
         "occupation" => $request->occupation,
         "biography" => $request->biography
      ]);
      return redirect()->route("user.profile", [
         "e_mail" => $user->e_mail,
         "tab" => $request->tab
      ]);
   }
}
