

<!-- Button trigger delete post modal window -->
<button id="triggerDeletePostModalButton" type="button" class="btn btn-primary" data-toggle="modal"
   data-target="#deletePostModal" hidden>
   Launch demo modal
</button>

<!-- delete post modal window -->
<div class="modal fade" id="deletePostModal" tabindex="-1" role="dialog" aria-labelledby="deletePostModalLabel"
   aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header card-header">
            <h5 class="modal-title" id="deletePostModalLabel"><strong>Delete post</strong></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            Are you sure to want to delete this post ?
         </div>
         <div class="modal-footer">
            <form method="GET" action="{{ route('user.post.destroy', ['id' => $id]) }}">
               @csrf
               @method('DELETE')
               <button type="submit" class="btn btn-primary">Delete</button>
               <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
            </form>
         </div>
      </div>
   </div>
</div>
