<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Auth;

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
   }
}
