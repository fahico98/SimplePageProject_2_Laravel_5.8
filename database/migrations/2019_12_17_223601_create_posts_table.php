<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration{
   
   /**
    * Run the migrations.
    *
    * @return void
    */
   public function up(){
      Schema::create('posts', function (Blueprint $table) {
         $table->bigIncrements('id');
         $table->bigInteger("user_id")->unsigned();
         $table->bigInteger("post_permission_id")->unsigned();
         $table->string("title", 255);
         $table->text('content');
         $table->integer("likes")->default(0);
         $table->integer("dislikes")->default(0);
         $table->timestamps();
      });
   }

   /**
    * Reverse the migrations.
    *
    * @return void
    */
   public function down(){
      Schema::dropIfExists('posts');
   }
}
