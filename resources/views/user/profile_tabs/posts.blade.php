
@insession($email)
   <div class="mb-3">
      <a href="#" id="newPostLink"><strong>+</strong>&nbsp;New post...</a>
   </div>

   <!-- Button trigger new post modal window -->
   <button id="triggerNewPostModalButton" type="button" class="btn btn-primary" data-toggle="modal"
      data-target="#newPostModal" hidden>
      Launch demo modal
   </button>

   <!-- New post modal window -->
   <div class="modal fade" id="newPostModal" tabindex="-1" role="dialog" aria-labelledby="newPostModalLabel"
      aria-hidden="true">
      <div class="modal-dialog" role="document">
         <div class="modal-content">
            <div class="modal-header card-header">
               <h5 class="modal-title" id="newPostModalLabel"><strong>New post</strong></h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <form method="GET" action="{{ route('user.newPost') }}">
               @csrf
               <div class="modal-body">
                  <div class="form-group row mx-2 my-2">
                     <input id="postTitle" name="postTitle" type="text" placeholder="Title" class="w-100 form-control">
                  </div>
                  <div class="form-group row mx-2 my-0">
                     <span><strong id="newPostCharRemaining">0</strong></span>
                  </div>
                  <div class="form-group row mx-2 my-0">
                     <textarea class="form-control" name="postContent" id="postContent" rows="4" cols="50"
                        style="resize: none; width: 100%;" placeholder="Content..."></textarea>
                     <input name="email" type="hidden" value="{{ $email }}"> <!-- Hidden input -->
                  </div>
                  <div class="form-group row mx-2 mt-3 mb-0">
                     <div class="btn-group my-0">
                        <button type="button" class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false" id="permissionDropdown">
                           Permission
                        </button>
                        <div class="dropdown-menu">
                           <a class="dropdown-item dropdownItem" href="#">Public</a>
                           <a class="dropdown-item dropdownItem" href="#">Followers</a>
                           <a class="dropdown-item dropdownItem" href="#">Only me</a>
                        </div>
                        <input name="permission" id="permission" type="hidden"> <!-- Hidden input -->
                     </div>
                  </div>
               </div>
               <div class="modal-footer">
                  <button type="submit" id="newPostSubmitButton" class="btn btn-primary">Post</button>
                  <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
               </div>
            </form>
         </div>
      </div>
   </div>
@endinsession

@forelse($posts as $post)
   <div class="card bg-light mb-2">
      <div class="card-body">
         <h5 class="card-title"><strong>{{ $post->title }}</strong></h5>
         <p class="card-text mb-2">{{ $post->content }}</p>
         <div class="row">
            <div class="col-11">
               <span class="badge badge-secondary font-weight-normal">{{ $post->created_at }}</span>
               @insession($email)
                  <span class="badge badge-primary font-weight-normal">{{ $post->postPermission->name }}</span>
               @endinsession
            </div>
            @insession($email)
               <div class="col-1">
                  <a href="#" class="text-danger">
                     <i class="fas fa-trash-alt mr-1" title="Delete post" id="{{$post->id}}"></i>
                  </a>
                  <a href="#" class="text-primary">
                     <i class="fas fa-edit" title="Edit post" id="{{$post->id}}"></i>
                  </a>
               </div>
            @endinsession
         </div>
      </div>
   </div>
@empty
   <div class="row justify-content-center">
      @insession($email)
         <h5 class="mt-5"><strong>You don't have any post yet...!</trong></h5>
      @else
         <h5 class="mt-5"><strong>This user don't have any post yet...!</trong></h5>
      @endinsession
   </div>
@endforelse

<script src="{{ asset('js/user/postsTab.js') }}" defer></script>
