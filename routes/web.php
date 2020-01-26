<?php

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

Route::get('home', 'HomeController@index')->name('home');
Route::get("load_posts", "HomeController@loadPosts");
Route::get("recommended", "HomeController@recommended");

Route::get("admin/users/seller_register", "Auth\RegisterController@showSellerRegistrationForm")
   ->name("users.seller_register_form");
Route::post("admin/users/seller_register", "Auth\RegisterController@sellerRegister")
   ->name("users.seller_register");

Route::get("admin/users/modal_delete_form", "AdministratorController@modalDeleteForm");
Route::get("admin/users/modal_update_form", "AdministratorController@modalUpdateForm");
Route::get("admin/users/crud_content", "AdministratorController@crudContent");
Route::resource('admin/users', 'AdministratorController');

Route::get("user/message/send", "MessagesController@send")->name("user.messages.send");
Route::get("user/message/delete", "MessagesController@destroy")->name("user.messages.delete");

Route::get("user/post/modal_delete_form", "PostController@modalDeleteForm");
Route::get("user/post/modal_update_form", "PostController@modalUpdateForm");
Route::get("user/post/load_posts", "PostController@loadPosts");
Route::get("user/post/undo_like", "PostController@undoLike");
Route::get("user/post/undo_dislike", "PostController@undoDislike");
Route::get("user/post/like", "PostController@like");
Route::get("user/post/dislike", "PostController@dislike");
Route::get("user/post/create", "PostController@create")->name("user.post.create");
Route::get("user/post/update", "PostController@update")->name("user.post.update");
Route::get("user/post/destroy", "PostController@destroy")->name("user.post.destroy");

Route::get("user/unfollow/{followerEmail}/{followedEmail}/{tab?}", "FollowController@unfollow")
   ->name("user.unfollow");
Route::get("user/follow/{followerEmail}/{followedEmail}/{tab?}", "FollowController@follow")
   ->name("user.follow");

Route::get("user/profile/{e_mail}/{tab?}", "UserController@profile")->name("user.profile");
Route::post("user/profile_picture", "UserController@profilePicture")->name("user.profilePicture");
Route::post("user/bio", "UserController@bio")->name("user.bio");

// Auth::routes(["verify" => true]);

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
