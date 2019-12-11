<?php

<<<<<<< HEAD
namespace App\Providers;
=======
namespace simplePageProject_2\Providers;
>>>>>>> 110ffc8a2994256a0965438821bdb85263fbbc55

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Broadcast;

<<<<<<< HEAD
class BroadcastServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Broadcast::routes();

        require base_path('routes/channels.php');
    }
=======
class BroadcastServiceProvider extends ServiceProvider{

   /**
    * Bootstrap any application services.
    *
    * @return void
    */
   public function boot(){
      Broadcast::routes();
      require base_path('routes/channels.php');
   }
>>>>>>> 110ffc8a2994256a0965438821bdb85263fbbc55
}
