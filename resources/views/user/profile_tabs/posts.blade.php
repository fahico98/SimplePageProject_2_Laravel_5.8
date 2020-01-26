
@extends('user.profile')

@section("profileContent")
   <div class="mt-3" id="profileContent">
      @auth
         <div class="mb-3">
            <a href="#" id="newPostLink"><i class="far fa-plus-square"></i>&nbsp;New post...</a>
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
                  <form method="GET" action="{{ route('user.post.create') }}">
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
                           </div>
                        </div>
                     </div>
                     <input type="hidden" name="permission" id="permission">     <!-- Hidden input -->
                     <input type="hidden" name="tab"  value="posts">             <!-- Hidden input -->
                     <div class="modal-footer">
                        <button type="submit" id="newPostSubmitButton" class="btn btn-primary">Post</button>
                        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
                     </div>
                  </form>
               </div>
            </div>
         </div>

         <div id="modalUpdatePostDiv"></div>
         <div id="modalDeletePostDiv"></div>
      @endauth

      @forelse($posts as $post)
         <div class="card bg-light mb-2">
            <div class="card-body">
               <h5 class="card-title"><strong>{{ $post->title }}</strong></h5>
               <p class="card-text mb-2">{{ $post->content }}</p>
               <div class="row">
                  <div class="col-9">
                     <span class="badge badge-secondary font-weight-normal">{{ $post->created_at }}</span>
                     @insession($user->e_mail)
                        <span class="badge badge-primary font-weight-normal">{{ $post->postPermission->name }}</span>
                     @endinsession
                  </div>
                  <div class="col-3 d-flex justify-content-end">
                     @insession($user->e_mail)
                        <a href="#" id="{{ $post->id }}" class="text-danger deletePostLink ml-3">
                           <i class="fas fa-lg fa-trash-alt mr-1" title="Delete post"></i>
                        </a>
                        <a href="#" id="{{ $post->id }}" class="text-primary updatePostLink ml-3">
                           <i class="fas fa-lg fa-edit" title="Edit post"></i>
                        </a>
                     @endinsession
                     @auth
                        @liked($post->id)
                           <a href="#" id="{{ $post->id }}" class="text-success ml-3 undoLikePostLink">
                        @else
                           <a href="#" id="{{ $post->id }}" class="text-secondary likePostLink ml-3">
                        @endliked
                           <label id="{{ $post->id }}" class="likeNumber font-weight-bold">{{ $post->likes }}</label>
                           <i class="fas fa-lg fa-thumbs-up" title="Like"></i>
                        </a>
                        @disliked($post->id)
                           <a href="#" id="{{ $post->id }}" class="text-danger ml-3 undoDislikePostLink">
                        @else
                           <a href="#" id="{{ $post->id }}" class="text-secondary dislikePostLink ml-3">
                        @enddisliked
                           <label id="{{ $post->id }}" class="dislikeNumber font-weight-bold">{{ $post->dislikes }}</label>
                           <i class="fas fa-lg fa-thumbs-down" title="Dislike"></i>
                        </a>
                     @endauth
                  </div>
               </div>
            </div>
         </div>
      @empty
         <div class="row justify-content-center">
            @insession($user->e_mail)
               <h5 class="mt-5 font-weight-bold">You don't have any post yet...!</h5>
            @else
               <h5 class="mt-5 font-weight-bold">This user don't have any post yet...!</h5>
            @endinsession
         </div>
      @endforelse
   </div>
@endsection

