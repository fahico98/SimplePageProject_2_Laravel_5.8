<?php

<<<<<<< HEAD
namespace App\Http\Middleware;
=======
namespace simplePageProject_2\Http\Middleware;
>>>>>>> 110ffc8a2994256a0965438821bdb85263fbbc55

use Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode as Middleware;

class CheckForMaintenanceMode extends Middleware
{
    /**
     * The URIs that should be reachable while maintenance mode is enabled.
     *
     * @var array
     */
    protected $except = [
        //
    ];
}
