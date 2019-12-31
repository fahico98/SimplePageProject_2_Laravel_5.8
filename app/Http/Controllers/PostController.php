<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
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
   public function loadPosts(){
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
      $post = new Post;
      $userId = User::select("id")->where("e_mail", "=", $request->email)->first()->id;
      $post->user_id = $userId;
      $post->post_permission_id = $request->permission;
      $post->title = $request->postTitle;
      $post->content = $request->postContent;
      $post->likes = 0;
      $post->dislikes = 0;
      $post->save();
      return(redirect()->route("user.profile", ["e_mail" => $request->email]));
   }

   /**
    * Update the post data into database.
    *
    * @param  \Illuminate\Http\Request
    */
   public function update(Request $request){
      $postId = Input::get("id");
      $post = Post::where("id", "=", $postId)->first();
      $post->update([
         "title" => $request->updatePostTitle,
         "content" => $request->updatePostContent,
         "post_permission_id" => $request->updatePermission
      ]);
      return(redirect()->route("user.profile", ["e_mail" => $post->user->e_mail]));
   }

   /**
    * Delete a post data from database.
    *
    */
   public function destroy($id){
      $post = Post::where("id", "=", $id)->first();
      $email = $post->user->e_mail;
      $post->delete();
      return(redirect()->route("user.profile", ["e_mail" => $email]));
   }

   public function modalUpdateForm(){
      $postId = Input::get("id");
      $post = Post::where("id", "=", $postId)->first();
      return view("user.profile_tabs.modal_update_form")->with(["post" => $post]);
   }

   public function modalDeleteForm(){
      $id = Input::get("id");
      return view("user.profile_tabs.modal_delete_form")->with(["id" => $id]);
   }
}
