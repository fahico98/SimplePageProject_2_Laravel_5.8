<?php

namespace simplePageProject_2\Http\Middleware;

use Closure;

class RoleMiddleware{

   /**
    * Handle an incoming request.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \Closure  $next
    * @return mixed
    */
   public function handle($request, Closure $next){
      return redirec("/");
      //return $next($request);
   }
}
