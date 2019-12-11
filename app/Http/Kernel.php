<?php

<<<<<<< HEAD
namespace App\Http;
=======
namespace simplePageProject_2\Http;
>>>>>>> 110ffc8a2994256a0965438821bdb85263fbbc55

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel{

   /**
    * The application's global HTTP middleware stack.
    *
    * These middleware are run during every request to your application.
    *
    * @var array
    */
   protected $middleware = [
<<<<<<< HEAD
      \App\Http\Middleware\TrustProxies::class,
      \App\Http\Middleware\CheckForMaintenanceMode::class,
      \Illuminate\Foundation\Http\Middleware\ValidatePostSize::class,
      \App\Http\Middleware\TrimStrings::class,
      \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class,
=======
      \simplePageProject_2\Http\Middleware\CheckForMaintenanceMode::class,
      \Illuminate\Foundation\Http\Middleware\ValidatePostSize::class,
      \simplePageProject_2\Http\Middleware\TrimStrings::class,
      \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class,
      \simplePageProject_2\Http\Middleware\TrustProxies::class,
>>>>>>> 110ffc8a2994256a0965438821bdb85263fbbc55
   ];

   /**
    * The application's route middleware groups.
    *
    * @var array
    */
   protected $middlewareGroups = [
      'web' => [
<<<<<<< HEAD
         \App\Http\Middleware\EncryptCookies::class,
=======
         \simplePageProject_2\Http\Middleware\EncryptCookies::class,
>>>>>>> 110ffc8a2994256a0965438821bdb85263fbbc55
         \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
         \Illuminate\Session\Middleware\StartSession::class,
         // \Illuminate\Session\Middleware\AuthenticateSession::class,
         \Illuminate\View\Middleware\ShareErrorsFromSession::class,
<<<<<<< HEAD
         \App\Http\Middleware\VerifyCsrfToken::class,
=======
         \simplePageProject_2\Http\Middleware\VerifyCsrfToken::class,
>>>>>>> 110ffc8a2994256a0965438821bdb85263fbbc55
         \Illuminate\Routing\Middleware\SubstituteBindings::class,
      ],

      'api' => [
         'throttle:60,1',
         'bindings',
      ],
   ];

   /**
    * The application's route middleware.
    *
    * These middleware may be assigned to groups or used individually.
    *
    * @var array
    */
   protected $routeMiddleware = [
<<<<<<< HEAD
      'auth' => \App\Http\Middleware\Authenticate::class,
=======
      'auth' => \simplePageProject_2\Http\Middleware\Authenticate::class,
>>>>>>> 110ffc8a2994256a0965438821bdb85263fbbc55
      'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
      'bindings' => \Illuminate\Routing\Middleware\SubstituteBindings::class,
      'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
      'can' => \Illuminate\Auth\Middleware\Authorize::class,
<<<<<<< HEAD
      'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
      'signed' => \Illuminate\Routing\Middleware\ValidateSignature::class,
      'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
      'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class,
      "isAdmin" => \App\Http\Middleware\IsAdmin::class
=======
      'guest' => \simplePageProject_2\Http\Middleware\RedirectIfAuthenticated::class,
      'signed' => \Illuminate\Routing\Middleware\ValidateSignature::class,
      'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
      'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class,
      "role" => \simplePageProject_2\Http\Middleware\Roles::class,
      "isAdmin" => \simplePageProject_2\Http\Middleware\IsAdmin::class
>>>>>>> 110ffc8a2994256a0965438821bdb85263fbbc55
   ];

   /**
    * The priority-sorted list of middleware.
    *
    * This forces non-global middleware to always be in the given order.
    *
    * @var array
    */
   protected $middlewarePriority = [
      \Illuminate\Session\Middleware\StartSession::class,
      \Illuminate\View\Middleware\ShareErrorsFromSession::class,
<<<<<<< HEAD
      \App\Http\Middleware\Authenticate::class,
=======
      \simplePageProject_2\Http\Middleware\Authenticate::class,
>>>>>>> 110ffc8a2994256a0965438821bdb85263fbbc55
      \Illuminate\Session\Middleware\AuthenticateSession::class,
      \Illuminate\Routing\Middleware\SubstituteBindings::class,
      \Illuminate\Auth\Middleware\Authorize::class,
   ];
}
