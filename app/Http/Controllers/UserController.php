<?php

namespace App\Http\Controllers;

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
      return view("user.profile")->with(["user" => $user]);
   }

   /**
    * Store the user profile picture.
    *
    * @param  \Illuminate\Http\Request
    * @return \Illuminate\Http\Response
    */
   public function profilePicture(Request $request){
      if($request->hasFile("profilePicture")){
         $request->file("profilePicture")->store("public");
      }
   }
}
