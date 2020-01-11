
@extends('user.profile')

@section("profileContent")
   <div class="mt-3">
      <div class="mb-3">
         <a href="#" id="newMessageLink"><i class="far fa-comment-dots"></i>&nbsp;New message...</a>
      </div>
      <div class="accordion" id="accordionExample">
         @forelse($messages as $message)
         <!--
            <div class="card bg-light" id="{/{ $message->id }}">
               <div class="card-header collapsed" id="heading{/{ $message->id }}" data-toggle="collapse" aria-expanded="false"
                  data-target="#collapse{/{ $message->id }}" aria-controls="collapse{/{ $message->id }}" style="cursor: pointer;">
                  <div class="row">
                     <div class="col-11">
                        <p class="mb-0 text-truncate">
                           <a class="btn btn-link collapsed" data-toggle="collapse" aria-expanded="false"
                              data-target="#collapse{/{ $message->id }}" aria-controls="collapse{/{ $message->id }}">
                              @/sended($message->id)
                                 To&nbsp;<strong>{/{ $message->recipient->name }}&nbsp;
                                    {/{ $message->recipient->lastname }}:&nbsp;</strong>
                              @/else
                                 From&nbsp;<strong>{/{ $message->sender->name }}&nbsp;
                                    {/{ $message->sender->lastname }}:&nbsp;</strong>
                              @/endsended
                              {/{ $message->content }}
                           </a>
                        </p>
                     </div>
                     <div class="col-1 mt-2">
                        @/sended($message->id)
                           <i class="text-primary far fa-lg fa-arrow-alt-circle-right"></i>
                        @/else
                           <i class="text-primary far fa-lg fa-arrow-alt-circle-left"></i>
                        @/endsended
                     </div>
                  </div>
               </div>
               <div id="collapse{/{ $message->id }}" class="collapse" aria-labelledby="heading{/{ $message->id }}"
                  data-parent="#accordionExample">
                  <div class="card-body overflow-auto">
                     <p class="messageActionContent" id="{/{ $message->id }}">{/{ $message->content }}</p>
                     <div class="d-inline">
                        <a href="#" class="text-primary answerMessage" id="{/{ $message->id }}">
                           <small>Answer</small>
                        </a>
                        &nbsp;&nbsp;
                        <a href="#" class="text-primary resendMessage" id="{/{ $message->id }}">
                           <small>Resend</small>
                        </a>
                        &nbsp;&nbsp;
                        <a href="#" class="text-danger deleteMessage" id="{/{ $message->id }}">
                           <small>Delete</small>
                        </a>
                     </div>
                     @/sended($message->id)
                        <input type="hidden" class="messageActionRecipientEmail" id="{/{ $message->id }}"
                           value="{/{ $message->recipient->e_mail }}">
                     @/else
                        <input type="hidden" class="messageActionRecipientEmail" id="{/{ $message->id }}"
                           value="{/{ $message->sender->e_mail }}">
                     @/endsended
                  </div>
               </div>
            </div>
         -->
         {{ $message->receiver->name . " " . $message->receiver->lastname . ": " . $message->content }}
         <br><br>
         @empty
            <div class="row justify-content-center">
               <h5 class="mt-5 font-weight-bold">You don't have any message yet...!</h5>
            </div>
         @endforelse
      </div>

      <!-- Button trigger new message modal window -->
      <button id="triggerNewMessageModalButton" type="button" class="btn btn-primary" data-toggle="modal"
         data-target="#newMessageModal" hidden>
         Launch demo modal
      </button>

      <!-- New message modal window -->
      <div class="modal fade" id="newMessageModal" tabindex="-1" role="dialog" aria-labelledby="newMessageModalLabel"
         aria-hidden="true">
         <div class="modal-dialog" role="document">
            <div class="modal-content">
               <div class="modal-header card-header">
                  <h5 class="modal-title font-weight-bold" id="newMessageModalLabel">New message</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                  </button>
               </div>
               <form method="GET" action="{{ route('user.messages.send') }}">
                  @csrf
                  <div class="modal-body">
                     <div class="form-group row mx-2 my-2">
                        <input id="receiverEmail" name="receiverEmail" type="text" placeholder="Receiver email"
                           class="w-100 form-control">
                     </div>
                     <div class="form-group row mx-2 my-0">
                        <textarea class="form-control" name="messageContent" id="messageContent" rows="4" cols="50"
                           style="resize: none; width: 100%;" placeholder="Content..."></textarea>
                     </div>
                  </div>
                  <div class="modal-footer">
                     <button type="submit" class="btn btn-primary">Send</button>
                     <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
                  </div>
               </form>
            </div>
         </div>
      </div>

      <!-- Button trigger delete message modal window -->
      <button id="triggerDeleteMessageModalButton" type="button" class="btn btn-primary" data-toggle="modal"
         data-target="#deleteMessageModal" hidden>
         Launch demo modal
      </button>

      <!-- delete message modal window -->
      <div class="modal fade" id="deleteMessageModal" tabindex="-1" role="dialog" aria-labelledby="deleteMessageModalLabel"
         aria-hidden="true">
         <div class="modal-dialog" role="document">
            <div class="modal-content">
               <div class="modal-header card-header">
                  <h5 class="modal-title" id="deleteMessageModalLabel"><strong>Delete Message</strong></h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                  </button>
               </div>
               <div class="modal-body">
                  Are you sure to want to delete this Message ?
               </div>
               <input type="hidden" id="messageToDeleteId">
               <div class="modal-footer">
                  <button type="button" id="deleteMessageAction" class="btn btn-primary" data-dismiss="modal">Delete</button>
                  <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
               </div>
            </div>
         </div>
      </div>
   </div>
@endsection

