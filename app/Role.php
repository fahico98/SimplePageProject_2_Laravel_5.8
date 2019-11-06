<?php

namespace simplePageProject_2;

use simplePageProject_2\User;
use Illuminate\Database\Eloquent\Model;

class Role extends Model{

   protected $fillable = ['name'];

   public function users(){
      return $this->hasMany(User::class);
   }
}
