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
      $currentPage = Input::get("currentPage");
      $usersPerPage = 5;
      if(Input::get("role") == "costumer"){
         $role_id = 3;
      }else if(Input::get("role") == "seller"){
         $role_id = 2;
      }
      $searchName = Input::get("searchName");
      if($searchName === ""){
         $totalUsers = User::where("role_id", "=", $role_id)->count();
         $users = User::where("role_id", "=", $role_id)
            ->offset(($currentPage - 1) * $usersPerPage)
            ->limit($usersPerPage)
            ->get();
      }else{
         $totalUsers = User::where("role_id", "=", $role_id)
            ->where("name", "like", "%" . $searchName . "%")
            ->count();
         $users = User::where("role_id", "=", $role_id)
            ->where("name", "like", "%" . $searchName . "%")
            ->offset(($currentPage - 1) * $usersPerPage)
            ->limit($usersPerPage)
            ->get();
      }
      $totalPages = ceil($totalUsers / $usersPerPage);
      return response()->json([
         'totalPages' => $totalPages,
         'users' => $users
      ]);
   }
}
