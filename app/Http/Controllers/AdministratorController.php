<?php

namespace simplePageProject_2\Http\Controllers;

use Illuminate\Support\Facades\Input;
use simplePageProject_2\User;
use Illuminate\Http\Request;

class AdministratorController extends Controller{

   public function __construct(){
      $this->middleware("isAdmin");
   }

   public function userSearchView(){
      return view("administrators.userSearch");
   }

   public function userSearch(){

      if(Input::get("role") == "costumer"){
         $role_id = 3;
      }else if(Input::get("role") == "seller"){
         $role_id = 2;
      }

      $searchName = Input::get("searchName");

      if($searchName === ""){
         $users = User::where("role_id", "=", $role_id)->get();
      }else{
         $users = User::where("role_id", "=", $role_id)->where("name", "like", "%" . $searchName . "%")->get();
      }

      return response()->json(['users' => $users]);
   }
}
