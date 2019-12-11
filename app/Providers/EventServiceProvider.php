<?php

<<<<<<< HEAD
namespace App\Providers;
=======
namespace simplePageProject_2\Providers;
>>>>>>> 110ffc8a2994256a0965438821bdb85263fbbc55

use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

<<<<<<< HEAD
class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
=======
class EventServiceProvider extends ServiceProvider{

   /**
    * The event listener mappings for the application.
    *
    * @var array
    */
   protected $listen = [
      Registered::class => [
         SendEmailVerificationNotification::class,
      ],
   ];

   /**
    * Register any events for your application.
    *
    * @return void
    */
   public function boot(){
      parent::boot();
   }
>>>>>>> 110ffc8a2994256a0965438821bdb85263fbbc55
}
