<?php

namespace simplePageProject_2\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Auth;
use simplePageProject_2\User;

class CustomBladeDirectivesProvider extends ServiceProvider{

   /**
    * Register services.
    *
    * @return void
    */
   public function register(){

   }

   /**
    * Bootstrap services.
    *
    * @return void
    */
   public function boot(){

      Blade::if("isadmin", function(){
         return (Auth::user()) ? (Auth::user()->role->name === "administrator") : false;
      });

      Blade::if("isseller", function(){
         return (Auth::user()) ? (Auth::user()->role->name === "seller") : false;
      });
   }
}
