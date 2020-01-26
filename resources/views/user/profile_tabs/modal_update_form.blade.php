
<!-- Button trigger update post modal window -->
<button id="triggerUpdatePostModalButton" type="button" class="btn btn-primary" data-toggle="modal"
   data-target="#updatePostModal" hidden>
   Launch demo modal
</button>

<!-- Update post modal window -->
<div class="modal fade" id="updatePostModal" tabindex="-1" role="dialog" aria-labelledby="updatePostModalLabel"
   aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header card-header">
            <h5 class="modal-title" id="updatePostModalLabel"><strong>Update post</strong></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <form method="GET" action="{{ route('user.post.update') }}">
            @csrf
            <div class="modal-body">
               <div class="form-group row mx-2 my-2">
                  <input id="updatePostTitle" name="updatePostTitle" type="text" placeholder="Title"
                     class="w-100 form-control" value="{{ $post->title }}">
               </div>
               <div class="form-group row mx-2 my-0">
                  @if(strlen($post->content) > 350 && strlen($post->content) <= 400)
                     <span><strong id="updatePostCharRemaining" class="text-warning">
                        {{ strlen($post->content) }}
                     </strong></span>
                  @elseif(strlen($post->content) > 400)
                     <span><strong id="updatePostCharRemaining" class="text-danger">
                        {{ strlen($post->content) }}
                     </strong></span>
                  @else
                     <span><strong id="updatePostCharRemaining">{{ strlen($post->content) }}</strong></span>
                  @endif
               </div>
               <div class="form-group row mx-2 my-0">
                  <textarea class="form-control" name="updatePostContent" id="updatePostContent" rows="4" cols="50"
                     style="resize: none; width: 100%;" placeholder="Content...">{{ $post->content }}</textarea>
               </div>
               <div class="form-group row mx-2 mt-3 mb-0">
                  <div class="btn-group my-0">
                     <button type="button" class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false" id="updatePermissionDropdown">
                        @if($post->post_permission_id === 1)
                           {{ 'Public' }}
                        @elseif($post->post_permission_id === 2)
                           {{ 'Followers' }}
                        @elseif($post->post_permission_id === 3)
                           {{ 'Only me' }}
                        @endif
                     </button>
                     <div class="dropdown-menu">
                        <a class="dropdown-item updateDropdownItem" href="#">Public</a>
                        <a class="dropdown-item updateDropdownItem" href="#">Followers</a>
                        <a class="dropdown-item updateDropdownItem" href="#">Only me</a>
                     </div>
                  </div>
               </div>
            </div>
            <input type="hidden" name="id" value="{{ $post->id }}">                    <!-- Hidden input -->
            <input type="hidden" name="tab" value="{{ $tab }}">                        <!-- Hidden input -->
            <input type="hidden" name="updatePermission" id="updatePermission"
               value="{{ $post->post_permission_id }}">                                <!-- Hidden input -->
            <div class="modal-footer">
               <button type="submit" id="updatePostSubmitButton" class="btn btn-primary">Done</button>
               <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
            </div>
         </form>
      </div>
   </div>
</div>
