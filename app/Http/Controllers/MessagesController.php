<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
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
      SendedMessage::where("id", "=", Input::get("id"))->first()->delete();
      ReceivedMessage::where("id", "=", Input::get("id"))->first()->delete();
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

      /*
      $recipiet = User::where("e_mail", "=", trim($request->recipientEmail))->first();
      $sender = User::where("e_mail", "=", $request->senderEmail)->first();
      $data = [
         "sender_id" => $sender->id,
         "recipient_id" => $recipiet->id,
         "content" => $request->messageContent
      ];
      DB::table("sended_messages")->insert($data);
      DB::table("received_message")->insert($data);
      */
      return redirect()->route("user.profile", [
         "e_mail" => $sender->e_mail,
         "tab" => "messages"
      ]);
   }
}
