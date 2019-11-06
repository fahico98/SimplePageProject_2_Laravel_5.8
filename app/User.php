<?php

namespace simplePageProject_2;

use simplePageProject_2\Role;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable{

   use Notifiable;

   /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
   protected $fillable = [
      'name',
      "lastname",
      "country",
      "city",
      "phone_number",
      'e_mail',
      'password',
      "role_id"
   ];

   /**
    * The attributes that should be hidden for arrays.
    *
    * @var array
    */
   protected $hidden = [
      'password',
      'remember_token'
   ];

   /**
    * The attributes that should be cast to native types.
    *
    * @var array
    */
   protected $casts = ['email_verified_at' => 'datetime'];

   public function role(){
      return $this->belongsTo(Role::class);
   }

   public function isAdmin(){
      return $this->role->name === "administrator";
   }

   public function isSeller(){
      return $this->role->name === "seller";
   }
}
