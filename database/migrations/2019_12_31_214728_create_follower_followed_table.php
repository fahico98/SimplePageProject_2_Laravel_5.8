<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFollowerFollowedTable extends Migration{

   /**
    * Run the migrations.
    *
    * @return void
    */
   public function up(){
      Schema::create('follower_followed', function (Blueprint $table) {
         $table->bigIncrements('id');
         $table->bigInteger("follower_id")->unsigned();
         $table->bigInteger("followed_id")->unsigned();
         $table->timestamps();
      });
   }

   /**
    * Reverse the migrations.
    *
    * @return void
    */
   public function down(){
      Schema::dropIfExists('follower_followed');
   }
}
