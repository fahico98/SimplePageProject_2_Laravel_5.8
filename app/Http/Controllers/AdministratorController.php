<?php

namespace simplePageProject_2\Http\Controllers;

use Illuminate\Http\Request;

include(app_path() . '/Includes/userSearch.php');

class AdministratorController extends Controller{

   public function __construct(){
      $this->middleware("isAdmin");
   }

   public function userSearch(){
      return view("administrators.userSearch");
   }

   public function userSearchAjax(Request $request){
      //return $request->all();
      return response()->json(['output' => 'Got Simple Ajax Request...']);
   }
}
