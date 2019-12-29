<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler{

   /**
    * A list of the exception types that are not reported.
    *
    * @var array
    */
   protected $dontReport = [
      //
   ];

   /**
    * A list of the inputs that are never flashed for validation exceptions.
    *
    * @var array
    */
   protected $dontFlash = [
      'password',
      'password_confirmation',
   ];

   /**
    * Report or log an exception.
    *
    * @param  \Exception  $exception
    * @return void
    */
   public function report(Exception $exception){
      parent::report($exception);
   }

   /**
    * Render an exception into an HTTP response.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \Exception  $exception
    * @return \Illuminate\Http\Response
    */
   public function render($request, Exception $exception){
      /**
       * Hand the exception throwed when you try to access post routes from its link...
       */
      if($exception instanceof \Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException){
         return Auth::check() ? redirect("/") : redirect("/login");
      }
      return parent::render($request, $exception);
   }
}
