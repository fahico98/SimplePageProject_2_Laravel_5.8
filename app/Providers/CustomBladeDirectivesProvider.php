<?php

<<<<<<< HEAD
namespace App\Providers;
=======
namespace simplePageProject_2\Providers;
>>>>>>> 110ffc8a2994256a0965438821bdb85263fbbc55

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Auth;
<<<<<<< HEAD
=======
use simplePageProject_2\User;
>>>>>>> 110ffc8a2994256a0965438821bdb85263fbbc55

class CustomBladeDirectivesProvider extends ServiceProvider{

   /**
    * Register services.
    *
    * @return void
    */
   public function register(){
<<<<<<< HEAD
      //
=======

>>>>>>> 110ffc8a2994256a0965438821bdb85263fbbc55
   }

   /**
    * Bootstrap services.
    *
    * @return void
    */
   public function boot(){

      Blade::if("isadmin", function(){
<<<<<<< HEAD
         return Auth::user() ? (Auth::user()->role->name === "administrator") : false;
      });

      Blade::if("isseller", function(){
         return Auth::user() ? (Auth::user()->role->name === "seller") : false;
=======
         return (Auth::user()) ? (Auth::user()->role->name === "administrator") : false;
      });

      Blade::if("isseller", function(){
         return (Auth::user()) ? (Auth::user()->role->name === "seller") : false;
>>>>>>> 110ffc8a2994256a0965438821bdb85263fbbc55
      });
   }
}
