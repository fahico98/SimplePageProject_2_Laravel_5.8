<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostPermissionsTable extends Migration{
   
   /**
    * Run the migrations.
    *
    * @return void
    */
   public function up(){
      Schema::create('post_permissions', function (Blueprint $table) {
         $table->bigIncrements('id');
         $table->string("name");
         $table->timestamps();
      });
   }

   /**
    * Reverse the migrations.
    *
    * @return void
    */
   public function down(){
      Schema::dropIfExists('post_permissions');
   }
}
