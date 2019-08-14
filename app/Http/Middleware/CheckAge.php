<?php

namespace simplePageProject_2\Http\Middleware;

use Closure;

class CheckAge{

   /**
    * Handle an incoming request.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \Closure  $next
    * @return mixed
    */
   public function handle($request, Closure $next){
      if($request->age < 15){
         return redirect('home');
      }
      return $next($request);
   }
}
