<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\User;

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
   public function profile($e_mail){
      $user = User::where("e_mail", "=", $e_mail)->first();
      return(view("user.profile")->with(["user" => $user]));
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
      return(redirect()->route("user.profile", ["e_mail" => $user->e_mail]));
   }

   /**
    * Update user biography and occupation.
    *
    * @param  \Illuminate\Http\Request
    */
   public function bio(Request $request){
      $user = User::where("e_mail", $request->e_mail)->first();
      if($request){
         $user->update([
            "occupation" => $request->occupation,
            "biography" => $request->biography
         ]);
      }
      return(redirect()->route("user.profile", ["e_mail" => $user->e_mail]));
   }
}
