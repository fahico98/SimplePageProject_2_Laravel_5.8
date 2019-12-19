<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder{

   /**
    * Run the database seeds.
    *
    * @return void
    */
   public function run(){

      // Make empty the "roles" table before seed it...
      // DB::table("roles")->truncate();

      DB::table("roles")->insert([
         "name" => "administrator"
      ]);

      DB::table("roles")->insert([
         "name" => "seller"
      ]);

      DB::table("roles")->insert([
         "name" => "costumer"
      ]);
   }
}
