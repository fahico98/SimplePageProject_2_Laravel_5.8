<?php

namespace simplePageProject_2\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ReportMail extends Mailable{

   use Queueable, SerializesModels;

   public $subject = "Mensaje de Reporte";
   public $messageData;

   /**
    * Create a new message instance.
    *
    * @return void
    */
   public function __construct($request){
      $this->messageData = $request;
   }

   /**
    * Build the message.
    *
    * @return $this
    */
   public function build(){
      return $this->view('emails.report-mail');
   }
}
