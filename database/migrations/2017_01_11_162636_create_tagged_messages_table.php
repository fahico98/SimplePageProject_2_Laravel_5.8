<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaggedMessagesTable extends Migration{

   /**
    * Run the migrations.
    *
    * @return void
    */
   public function up(){
      Schema::create('tagged_messages', function (Blueprint $table) {
         $table->bigIncrements('id');
         $table->bigInteger('message_id')->unsigned()->unique();
         $table->bigInteger('tag_from_id')->unsigned()->nullable();
         $table->bigInteger('tag_to_id')->unsigned()->nullable();
         $table->timestamps();
      });
   }

   /**
    * Reverse the migrations.
    *
    * @return void
    */
   public function down(){
      Schema::drop('tagged_messages');
   }
}
