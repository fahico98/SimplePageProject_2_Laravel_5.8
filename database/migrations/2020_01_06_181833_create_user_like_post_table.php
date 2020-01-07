<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserLikePostTable extends Migration{

   /**
    * Run the migrations.
    *
    * @return void
    */
   public function up(){
      Schema::create('user_like_post', function (Blueprint $table) {
         $table->bigIncrements('id');
         $table->bigInteger("user_id")->unsigned();
         $table->bigInteger("post_id")->unsigned();
         $table->timestamps();
      });
   }

   /**
    * Reverse the migrations.
    *
    * @return void
    */
   public function down(){
      Schema::dropIfExists('user_like_post');
   }
}
