<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostPermission extends Model{

   protected $table = "post_permissions";

   /**
    * The attributes that should be hidden for arrays.
    *
    * @var array
    */
   protected $hidden = [
      'name',
      'id'
   ];

   public function posts(){
      return $this->hasMany(Post::class);
   }
}
