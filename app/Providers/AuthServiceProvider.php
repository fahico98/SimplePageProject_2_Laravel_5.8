<?php

<<<<<<< HEAD
namespace App\Providers;
=======
namespace simplePageProject_2\Providers;
>>>>>>> 110ffc8a2994256a0965438821bdb85263fbbc55

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

<<<<<<< HEAD
class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
=======
class AuthServiceProvider extends ServiceProvider{

   /**
    * The policy mappings for the application.
    *
    * @var array
    */
   protected $policies = [
      // 'simplePageProject_2\Model' => 'simplePageProject_2\Policies\ModelPolicy',
   ];

   /**
    * Register any authentication / authorization services.
    *
    * @return void
    */
   public function boot(){
      $this->registerPolicies();
   }
>>>>>>> 110ffc8a2994256a0965438821bdb85263fbbc55
}
