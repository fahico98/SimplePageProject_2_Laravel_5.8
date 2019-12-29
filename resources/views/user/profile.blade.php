
@extends('layouts.app')

@section('content')
   <div class="container">
      <div class="row justify-content-center">
         <div class="col-md-3">
            <img src="{{ Storage::url($user->profile_picture) }}" width="250px" class="rounded" id="image"
               style="cursor: pointer">
            <h2 class="mt-2 mb-0"><strong>{{ $user->name }}&nbsp;{{ $user->lastname }}</strong></h2>
            <h5 class="mt-1"><a href="" id="emailLink">{{ $user->e_mail }}</a></h5>
            @if($user->biography == null && $user->occupation == null)
               <p><a href="" id="bioLink"><strong>+</strong>&nbsp;Add a bio</a></p>
            @else
               <p><strong>{{ $user->occupation }}</strong><br>{{ $user->biography }}</p>
            @endif
         </div>
         <div class="col-md-9">
            <ul class="nav nav-tabs">
               <li class="nav-item">
                  <a id="postsLink" class="nav-link active" href="#">Posts</a>
               </li>
               <li class="nav-item">
                  <a id="followersLink" class="nav-link" href="#">Followers</a>
               </li>
               <li class="nav-item">
                  <a id="followedLink" class="nav-link" href="#">Followed</a>
               </li>
               <li class="nav-item">
                  <a id="messagesLink" class="nav-link" href="#">Messages</a>
               </li>
               <li class="nav-item">
                  <a id="settingsLink" class="nav-link" href="#">Settings</a>
               </li>
            </ul>
            <div class="mt-3" id="profileContent"></div>
         </div>
      </div>
   </div>

   @if($user->biography == null && $user->occupation == null)
      <!-- Button trigger profile updload picture modal window -->
      <button id="triggerProfilePictureModalButton" type="button" class="btn btn-primary" data-toggle="modal"
         data-target="#uploadPictureModal" hidden>
         Launch demo modal
      </button>

      <!-- Upload profile picture modal window -->
      <div class="modal fade" id="uploadPictureModal" tabindex="-1" role="dialog" aria-labelledby="uploadPictureModalLabel"
         aria-hidden="true">
         <div class="modal-dialog" role="document">
            <div class="modal-content">
               <div class="modal-header card-header">
                  <h5 class="modal-title" id="uploadPictureModalLabel">Upload profile picture</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                  </button>
               </div>
               <form enctype="multipart/form-data" method="POST" action="{{ route('user.profilePicture') }}">
                  @csrf
                  <div class="modal-body">
                     <div class="form-group row mb-2 mx-2 my-0">
                        <h4>Select a profile picture.</h4>
                     </div>
                     <div class="form-group row mx-2 my-0">
                        <input name="profilePicture" id="profilePicture" type="file">
                        <input name="e_mail" type="hidden" value="{{ $user->e_mail }}"> <!-- Hidden input -->
                        <div class="d-flex justify-content-center w-100 my-0">
                           <img class="mt-3" id="blank" src="#" width="0" hidden>
                        </div>
                     </div>
                  </div>
                  <div class="modal-footer">
                     <button type="submit" id="profilePictureSubmitButton" class="btn btn-primary" disabled="true">
                        Upload
                     </button>
                     <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
                  </div>
               </form>
            </div>
         </div>
      </div>
   @endif

   <!-- Button trigger biography modal window -->
   <button id="triggerBioModalButton" type="button" class="btn btn-primary" data-toggle="modal"
      data-target="#bioModal" hidden>
      Launch demo modal
   </button>

   <!-- Biography modal window -->
   <div class="modal fade" id="bioModal" tabindex="-1" role="dialog" aria-labelledby="bioModalLabel"
      aria-hidden="true">
      <div class="modal-dialog" role="document">
         <div class="modal-content">
            <div class="modal-header card-header">
               <h5 class="modal-title" id="bioModalLabel">Biography</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <form method="POST" action="{{ route("user.bio") }}">
               @csrf
               <div class="modal-body">
                  <div class="form-group row mx-2 my-0">
                     <h4 class="mb-2">Add a biography to your profile.</h4>
                  </div>
                  <div class="form-group row mx-2 my-2">
                     <input id="occupation" name="occupation" type="text" placeholder="Occupation" class="w-100">
                  </div>
                  <div class="form-group row mx-2 my-0">
                     <span><strong class="text-warning" id="charRemaining">100</strong></span>
                  </div>
                  <div class="form-group row mx-2 my-0">
                     <textarea name="biography" id="biography" rows="3" cols="50" style="resize: none; width: 100%;"
                        placeholder="Your biography..."></textarea>
                     <input name="e_mail" type="hidden" value="{{ $user->e_mail }}"> <!-- Hidden input -->
                  </div>
               </div>
               <div class="modal-footer">
                  <button type="submit" class="btn btn-primary">Done</button>
                  <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
               </div>
            </form>
         </div>
      </div>
   </div>

   <script src="{{ asset('js/user/profile.js') }}" defer></script>
@endsection