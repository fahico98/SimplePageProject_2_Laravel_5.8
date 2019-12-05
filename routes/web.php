<?php

use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get("/", function(){
   return view('welcome');
});

// Auth::routes(["verify" => true]);

Route::get('/home', 'HomeController@index')->name('home');

Route::get("/user_search_view", "AdministratorController@userSearchView")->name("user_search_view");
Route::get("/user_search", "AdministratorController@userSearch");

Route::get("/seller_register", "Auth\RegisterController@showSellerRegistrationForm");
Route::post("/seller_register", "Auth\RegisterController@sellerRegister");

//Route::get("/admin", "AdministratorController@index")->name("admin");

/*
Route::group(["middleware" => "web"], function(){

   Route::get('/', function(){
      return view('welcome');
   });

   Auth::routes();
   Route::get('/home', 'HomeController@index')->name('home');
   Route::get("/admins/login", "AdministratorsController@showLoginForm");
   Route::post("/admins/login", "AdministratorsController@login")->name('adminsLogin');
   Route::get("/admins/area", "AdministratorsController@secret");
});
*/

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');

Route::get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');
Route::get('email/verify/{id}', 'Auth\VerificationController@verify')->name('verification.verify');
Route::get('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');

