<?php

namespace simplePageProject_2\Http\Controllers;

use Illuminate\Http\Request;

class AdministratorController extends Controller{

   public function __construct(){
      $this->middleware("isAdmin");
   }

   public function userSearch(){
      return view("administrators.userSearch");
   }

   /*
   public function index(){
      return "Si has llegado hasta aquí entonces eres administrador...!";
   }
   */
}
