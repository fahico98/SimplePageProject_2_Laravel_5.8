<?php

<<<<<<< HEAD
namespace App\Http\Middleware;
=======
namespace simplePageProject_2\Http\Middleware;
>>>>>>> 110ffc8a2994256a0965438821bdb85263fbbc55

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return route('login');
        }
    }
}
