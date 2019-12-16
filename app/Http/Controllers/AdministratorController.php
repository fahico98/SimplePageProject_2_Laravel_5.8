<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\User;

class AdministratorController extends Controller{

   public function __construct(){
      $this->middleware("isAdmin");
   }

   /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index(){
      return view("administrators.index");
   }

   public function crudContent(){

      $currentPage = Input::get("currentPage", 1);
      $searchName = Input::get("searchName", "");
      $role = Input::get("role", "costumer");

      $usersPerPage = 5;

      if($role == "costumer"){
         $role_id = 3;
      }else if($role == "seller"){
         $role_id = 2;
      }

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

      return view("administrators.crud_content")
         ->with([
            "users" => $users,
            "currentPage" => $currentPage,
            "totalPages" => $totalPages
         ]);
   }

   public function modalDeleteForm(){
      $id = Input::get("id");
      $user = User::where("id", "=", $id)->get()->first();
      return view("administrators.modal_delete_form")->with("user", $user);
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create(){
      return view("administrators.sellerRegister");
   }

   /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
   public function store(Request $request){
      //
   }

   /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function show($id){
      //
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function edit($id){
      $user = User::where("id", "=", $id)->get();
      $data = [
         "action" => "edit",
         "user" => $user->first()
      ];
      return view("auth.register")->with("data", $data);
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function update(Request $request, $id){

   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function destroy($id){
      echo("<h2>$id has been destroied...!</h2>");
   }
}
