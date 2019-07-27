<?php

namespace simplePageProject_2;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable{

   use Notifiable;

   /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
   protected $fillable = ['name', "lastname", "country", "city", "phone_number", 'e_mail', 'password'];

   /**
    * The attributes that should be hidden for arrays.
    *
    * @var array
    */
   protected $hidden = ['password', 'remember_token'];

   /**
    * The attributes that should be cast to native types.
    *
    * @var array
    */
   protected $casts = ['email_verified_at' => 'datetime'];

   public function role(){
      return $this->belongsTo("App/Role");
   }

   public function isAdmin(){
      return ($this->role->role_type == "aministrator") ? true : false ;
   }
}
