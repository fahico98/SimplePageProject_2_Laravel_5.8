<?php

use Illuminate\Database\Seeder;

class PostPermissionsTableSeeder extends Seeder{

   /**
    * Run the database seeds.
    *
    * @return void
    */
   public function run(){

      DB::table("post_permissions")->insert([
         "name" => "public"
      ]);

      DB::table("post_permissions")->insert([
         "name" => "followers"
      ]);

      DB::table("post_permissions")->insert([
         "name" => "only_me"
      ]);
   }
}
