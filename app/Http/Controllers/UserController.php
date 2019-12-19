<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller{

   /**
    * Display the user profile.
    *
    * @param  int  $id
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
      if($request->hasFile("profilePicture")){
         if($user->profile_picture === "public/defaultUserPhoto.jpg"){
            $path = Storage::putFile('public', $request->file('profilePicture'));
         }else{
            Storage::delete($user->profile_picture);
            $path = Storage::putFile("public", $request->file('profilePicture'));
         }
         $user->update(["profile_picture" => $path]);
      }
      return(redirect()->route("user.profile", ["e_mail" => $user->e_mail]));
   }
}
