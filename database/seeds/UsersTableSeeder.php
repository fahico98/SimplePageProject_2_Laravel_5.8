<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder{

   /**
    * Run the database seeds.
    *
    * @return void
    */
   public function run(){

      // Make empty the "users" table before seed it...
      DB::table('users')->truncate();

      DB::table('users')->insert([
         "name" => "Fahico",
         "lastname" => "Carcamo",
         "country" => "Colombia",
         "city" => "Bogota",
         "phone_number" => "3223986014",
         "e_mail" => "fahico98@gmail.com",
         "password" => Hash::make("mecatronica1992"),
         "role_id" => 1
      ]);

      DB::table('users')->insert([
         "name" => "Fahibran",
         "lastname" => "Carcamo",
         "country" => "Colombia",
         "city" => "Bogota",
         "phone_number" => "3221210081",
         "e_mail" => "facarcamoca@unal.edu.co",
         "password" => Hash::make("mecatronica1992"),
         "role_id" => 2
      ]);

      DB::table('users')->insert([
         "name" => "Jose",
         "lastname" => "Cardozo",
         "country" => "Colombia",
         "city" => "Liberty city",
         "phone_number" => "3219998880",
         "e_mail" => "jjcardozo155@hotmail.com",
         "password" => Hash::make("legado2019"),
         "role_id" => 3
      ]);

      DB::table('users')->insert([
         "name" => "Daniel",
         "lastname" => "Medrano",
         "country" => "United states",
         "city" => "vice city",
         "phone_number" => "3120912991",
         "e_mail" => "dani_medra_123@outlook.com",
         "password" => Hash::make("legado2019"),
         "role_id" => 3
      ]);

      DB::table('users')->insert([
         "name" => "Carlos",
         "lastname" => "Gutierrez",
         "country" => "Brazil",
         "city" => "Los santos",
         "phone_number" => "3113434343",
         "e_mail" => "cagutierrez09@gmail.com",
         "password" => Hash::make("legado2019"),
         "role_id" => 3
      ]);

      DB::table('users')->insert([
         "name" => "Ingrid",
         "lastname" => "Sarate",
         "country" => "Brazil",
         "city" => "Los santos",
         "phone_number" => "3133344551",
         "e_mail" => "avejita2019@hotmail.com",
         "password" => Hash::make("legado2019"),
         "role_id" => 3
      ]);

      DB::table('users')->insert([
         "name" => "Daniela",
         "lastname" => "Corzo",
         "country" => "Colombia",
         "city" => "San andreas",
         "phone_number" => "3220011343",
         "e_mail" => "danicorzo1996@gmail.com",
         "password" => Hash::make("legado2019"),
         "role_id" => 3
      ]);
   }

}
