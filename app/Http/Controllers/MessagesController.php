<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Inani\Messager\Message;
use App\User;

class MessagesController extends Controller{

   /**
    * Create a new controller instance.
    *
    * @return void
    */
    public function __construct(){
      $this->middleware("auth");
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create(){

   }

   /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
   public function store(Request $request){

   }

   /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function show($id){

   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function edit($id){

   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function update(Request $request, $id){

   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function destroy(){
      $message = Message::where("id", "=", Input::get("id"))->first();
      $user = User::where("e_mail", "=", session("email"))->first();
      if($message->archived_at_from === 0 && $message->archived_at_to === 0){
         $message->delete();
      }else if($user->id === $message->from_id){
         $message->update(["archived_at_from" => 0]);
      }else if($user->id === $message->to_id){
         $message->update(["archived_at_to" => 0]);
      }
   }

   /**
    * Create and store the new message.
    *
    * @param  \Illuminate\Http\Request  $request
    */
   public function send(Request $request){
      $receiver = User::where("e_mail", "=", trim($request->receiverEmail))->first();
      $messageData = ['content' => $request->messageContent];
      list($message, $user) = User::createFromRequest($messageData);
      $sender = User::where("e_mail", "=", session("email"))->first();
      $sender->writes($message)->to($receiver)->send();
      return redirect()->route("user.profile", [
         "e_mail" => $sender->e_mail,
         "tab" => "messages"
      ]);
   }
}
