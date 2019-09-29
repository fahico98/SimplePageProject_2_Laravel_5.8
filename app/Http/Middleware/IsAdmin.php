<?php

namespace simplePageProject_2\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Closure;

class IsAdmin{

   /**
    * Handle an incoming request.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \Closure  $next
    * @return mixed
    */
   public function handle($request, Closure $next){
      if(Auth::check() && !Auth::user()->isAdmin()){
         return redirect("/");
      }
      return $next($request);
   }
}
