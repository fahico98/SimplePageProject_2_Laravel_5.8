<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model{

   /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
   protected $fillable = [
      'user_id',
      "post_permission_id",
      "title",
      "content",
      "likes",
      "dislikes"
   ];

   public function user(){
      return $this->belongsTo(User::class);
   }

   public function postPermission(){
      return $this->belongsTo(PostPermission::class);
   }
}