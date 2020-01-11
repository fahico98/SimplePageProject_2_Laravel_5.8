<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesTable extends Migration{

   /**
    * Run the migrations.
    *
    * @return void
    */
   public function up(){
      Schema::create('messages', function (Blueprint $table) {
         $table->bigIncrements('id');
         $table->bigInteger('from_id')->unsigned();
         $table->bigInteger('to_id')->unsigned()->nullable();
         $table->bigInteger('root_id')->unsigned()->nullable();
         // $table->text('title');
         $table->text('content');
         $table->integer('state')->default(0);
         $table->integer('archived_at_from')->default(0);
         $table->integer('archived_at_to')->default(0);
         $table->timestamps();
      });
   }

   /**
    * Reverse the migrations.
    *
    * @return void
    */
   public function down(){
      Schema::drop('messages');
   }
}
