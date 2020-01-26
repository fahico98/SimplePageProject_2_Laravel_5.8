<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\User;
use App\Post;

class PostController extends Controller{

   /**
    * Create a new controller instance.
    *
    * @return void
    */
   public function __construct(){
      $this->middleware("auth")->except(["loadPosts"]);
   }

   /**
    * Load user posts from database.
    *
    * @param String $e_mial
    */
   public function index(){
      $email = Input::get("email");
      $id = User::select("id")->where("e_mail", "=", $email)->first()->id;
      $posts = Post::where("user_id", "=", $id)->orderBy("created_at", "desc")->get();
      return view("user.profile_tabs.posts")->with([
         "posts" => $posts,
         "email" => $email
      ]);
   }

   /**
    * Save a new post into database.
    *
    * @param  \Illuminate\Http\Request
    */
   public function create(Request $request){
      $userId = Auth::user()->id;
      $post = new Post;
      $post->user_id = $userId;
      $post->post_permission_id = $request->permission;
      $post->title = $request->postTitle;
      $post->content = $request->postContent;
      $post->likes = 0;
      $post->dislikes = 0;
      $post->save();
      return ($request->tab == "home") ?
         redirect()->route("home") :
         redirect()->route("user.profile", [
            "e_mail" => Auth::user()->e_mail,
            "tab" => "posts"
         ]);
   }

   /**
    * Update the post data into database.
    *
    * @param  \Illuminate\Http\Request
    */
   public function update(Request $request){
      $post = Post::where("id", "=", $request->id)->first();
      $post->update([
         "title" => $request->updatePostTitle,
         "content" => $request->updatePostContent,
         "post_permission_id" => $request->updatePermission
      ]);
      return ($request->tab == "home") ?
         redirect()->route("home") :
         redirect()->route("user.profile", [
            "e_mail" => Auth::user()->e_mail,
            "tab" => "posts"
         ]);
   }

   /**
    * Delete a post data from database.
    *
    */
   public function destroy(Request $request){
      $post = Post::where("id", "=", $request->id)->first();
      $post->delete();
      return ($request->tab == "home") ?
         redirect()->route("home") :
         redirect()->route("user.profile", [
            "e_mail" => Auth::user()->e_mail,
            "tab" => "posts"
         ]);
   }

   public function modalUpdateForm(){
      $id = Input::get("id");
      $tab = Input::get("tab");
      $post = Post::where("id", "=", $id)->first();
      return view("user.profile_tabs.modal_update_form")->with([
         "post" => $post,
         "tab" => $tab
      ]);
   }

   public function modalDeleteForm(){
      $id = Input::get("id");
      $tab = Input::get("tab");
      return view("user.profile_tabs.modal_delete_form")->with([
         "id" => $id,
         "tab" => $tab
      ]);
   }

   public function like(){
      $user = User::where("e_mail", "=", session("email"))->first();
      $post = Post::where("id", "=", Input::get("id"))->first();
      $post->update(["likes" => $post->likes + 1]);
      DB::table("user_like_post")->insert([
         "user_id" => $user->id,
         "post_id" => $post->id
      ]);
   }

   public function dislike(){
      $user = User::where("e_mail", "=", session("email"))->first();
      $post = Post::where("id", "=", Input::get("id"))->first();
      $post->update(["dislikes" => $post->dislikes + 1]);
      DB::table("user_dislike_post")->insert([
         "user_id" => $user->id,
         "post_id" => $post->id
      ]);
   }

   public function undoLike(){
      $user = User::where("e_mail", "=", session("email"))->first();
      $post = Post::where("id", "=", Input::get("id"))->first();
      $post->update(["likes" => $post->likes - 1]);
      DB::table("user_like_post")
         ->where("user_id", "=", $user->id)
         ->where("post_id", "=", $post->id)
         ->delete();
   }

   public function undoDislike(){
      $user = User::where("e_mail", "=", session("email"))->first();
      $post = Post::where("id", "=", Input::get("id"))->first();
      $post->update(["dislikes" => $post->dislikes - 1]);
      DB::table("user_dislike_post")
         ->where("user_id", "=", $user->id)
         ->where("post_id", "=", $post->id)
         ->delete();
   }
}
