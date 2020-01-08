
<div class="mb-3">
   <a href="#" id="newMessageLink"><i class="far fa-comment-dots"></i>&nbsp;New message...</a>
</div>

<div class="list-group">
   @forelse($messages as $message)
      <a href="#" class="list-group-item list-group-item-secondary">
         <div class="d-flex w-100 justify-content-between">
         <h5 class="mb-1 font-weight-bold">{{ $message->sender->name}}&nbsp;{{$message->sender->lastname }}</h5>
            <small><i class="far fa-comment-dots"></i></small>
         </div>
         <p class="mb-1">{{ $message->content }}</p>
         <small>{{ $message->timestamp }}</small>
      </a>
   @empty
      <div class="row justify-content-center">
         <h5 class="mt-5 font-weight-bold">You don't have any message yet...!</h5>
      </div>
   @endforelse


   <!--
   <a href="#" class="list-group-item list-group-item-secondary">
      <div class="d-flex w-100 justify-content-between">
         <h5 class="mb-1">List group item heading</h5>
         <small class="text-muted">3 days ago</small>
      </div>
      <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
      <small class="text-muted">Donec id elit non mi porta.</small>
   </a>
   <a href="#" class="list-group-item list-group-item-action">
      <div class="d-flex w-100 justify-content-between">
         <h5 class="mb-1">List group item heading</h5>
         <small class="text-muted">3 days ago</small>
      </div>
      <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
      <small class="text-muted">Donec id elit non mi porta.</small>
   </a>
   -->
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
         <h5 class="modal-title" id="newMessageModalLabel"><strong>New post</strong></h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
         </button>
      </div>
      <form method="GET" action="{{ route('user.post.create') }}">
         @csrf
         <div class="modal-body">
            <div class="form-group row mx-2 my-2">
               <input id="recipients" name="recipients" type="text" placeholder="Recipients" class="w-100 form-control">
            </div>
            <div class="form-group row mx-2 my-0">
               <textarea class="form-control" name="messageContent" id="messageContent" rows="4" cols="50"
                  style="resize: none; width: 100%;" placeholder="Content..."></textarea>
            </div>
         </div>
         <div class="modal-footer">
            <button type="submit" id="newMessageSubmitButton" class="btn btn-primary">Send</button>
            <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
         </div>
      </form>
   </div>
</div>
</div>
