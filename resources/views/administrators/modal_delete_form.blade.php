
<!-- Button trigger modal -->
<button id="triggerModalButton" type="button" class="btn btn-primary" data-toggle="modal" data-target="#deleteModal" hidden>
   Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header card-header">
            <h5 class="modal-title" id="deleteModalLabel">Delete</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            Are you sure to want to delete <strong>{{ $user->name }}</strong> user ?
         </div>
         <div class="modal-footer">
            <form action="{{ route('users.destroy', $user->id) }}" method="POST">
               @csrf
               @method('DELETE')
               <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
               <button type="submit" class="btn btn-primary">Accept</button>
            </form>
         </div>
      </div>
   </div>
</div>
