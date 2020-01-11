<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTagsTable extends Migration{

   /**
    * Run the migrations.
    *
    * @return void
    */
   public function up(){
      Schema::create('tags', function (Blueprint $table) {
         $table->bigIncrements('id');
         $table->bigInteger('user_id')->unsigned();
         $table->string('name');
         $table->string('color');
         $table->timestamps();
      });
   }

   /**
    * Reverse the migrations.
    *
    * @return void
    */
   public function down(){
      Schema::drop('tags');
   }
}
