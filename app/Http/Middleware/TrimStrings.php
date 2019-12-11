<?php

<<<<<<< HEAD
namespace App\Http\Middleware;
=======
namespace simplePageProject_2\Http\Middleware;
>>>>>>> 110ffc8a2994256a0965438821bdb85263fbbc55

use Illuminate\Foundation\Http\Middleware\TrimStrings as Middleware;

class TrimStrings extends Middleware
{
    /**
     * The names of the attributes that should not be trimmed.
     *
     * @var array
     */
    protected $except = [
        'password',
        'password_confirmation',
    ];
}
