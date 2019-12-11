<?php

<<<<<<< HEAD
namespace App;

=======
namespace simplePageProject_2;

use simplePageProject_2\User;
>>>>>>> 110ffc8a2994256a0965438821bdb85263fbbc55
use Illuminate\Database\Eloquent\Model;

class Role extends Model{

   protected $fillable = ['name'];

   public function users(){
      return $this->hasMany(User::class);
   }
<<<<<<< HEAD

=======
>>>>>>> 110ffc8a2994256a0965438821bdb85263fbbc55
}
