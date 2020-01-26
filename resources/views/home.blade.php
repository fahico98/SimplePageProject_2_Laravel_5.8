@extends('layouts.app')

@section('content')

   <div class="container">
      <div class="row justify-content-center">
         <div class="col-md-3">
            <div class="card">
               <div class="card-header font-weight-bold">Recomended for you...!</div>
               <div class="card-body py-2 px-3" id="cardToRecommended"></div>
            </div>
         </div>
         <div id="wall" name="wall" class="col-md-9"></div>
      </div>
   </div>

   <!-- Button trigger update post modal window -->
   <button id="triggerNewPostModalButton" type="button" class="btn btn-primary" data-toggle="modal"
      data-target="#newPostModal" hidden>
      Launch demo modal
   </button>

   <!-- Update post modal window -->
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
                     <input name="email" type="hidden" value="{{ Auth::user()->e_mail }}"> <!-- Hidden input -->
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

   <div id="modalUpdatePostDiv"></div>
   <div id="modalDeletePostDiv"></div>

   <script src="{{ asset('js/home.js') }}" defer></script>
   <script src="{{ asset('js/user/postsTab.js') }}" defer></script>

@endsection
