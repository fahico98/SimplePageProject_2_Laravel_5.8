<?php

<<<<<<< HEAD
namespace App\Http\Middleware;
=======
namespace simplePageProject_2\Http\Middleware;
>>>>>>> 110ffc8a2994256a0965438821bdb85263fbbc55

use Illuminate\Http\Request;
use Fideloper\Proxy\TrustProxies as Middleware;

class TrustProxies extends Middleware
{
    /**
     * The trusted proxies for this application.
     *
     * @var array|string
     */
    protected $proxies;

    /**
     * The headers that should be used to detect proxies.
     *
     * @var int
     */
    protected $headers = Request::HEADER_X_FORWARDED_ALL;
}
