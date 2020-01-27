
@extends('layouts.app')

@section('content')
   <div class="container">
      <div class="row justify-content-center">
         <div class="col-md-3 mx-0">
            @insession($user->e_mail)
               <img src="{{ Storage::url($user->profile_picture) }}" width="100%" class="rounded" id="image"
                  style="cursor: pointer">
            @else
               <img src="{{ Storage::url($user->profile_picture) }}" width="100%" class="rounded">
            @endinsession
            <h2 class="mt-2 mb-0"><strong>{{ $user->name }}&nbsp;{{ $user->lastname }}</strong></h2>
            <h5 class="mt-1"><a href="" id="emailLink">{{ $user->e_mail }}</a></h5>
            @if($user->biography == null && $user->occupation == null)
               @insession($user->e_mail)
                  <p><a href="" id="bioLink"><i class="far fa-address-card"></i>&nbsp;Add a bio</a></p>
               @endinsession
            @else
               <p class="mb-2"><strong>{{ $user->occupation }}</strong><br>{{ $user->biography }}</p>
            @endif
            @auth
               @outsession($user->e_mail)
                  @following(session("email"), $user->e_mail)
                     <form method="GET" action="{{ route('user.unfollow', [
                        'followerEmail' => session("email"),
                        'followedEmail' => $user->e_mail
                        ]) }}">
                        <button type="submit" class="btn btn-outline-secondary btn-sm w-100">Unfollow</button>
                     </form>
                  @else
                     <form method="GET" action="{{ route('user.follow', [
                           'followerEmail' => session("email"),
                           'followedEmail' => $user->e_mail
                        ]) }}">
                        <button type="submit" class="btn btn-primary btn-sm w-100">Follow</button>
                     </form>
                  @endfollowing
               @endoutsession
            @endauth
         </div>
         <div class="col-md-9">
            <ul class="nav nav-tabs">
               <li class="nav-item">
                  @if($tab === 'posts')
                     <a class="nav-link active" href="#">Posts</a>
                  @else
                     <a href="{{ route('user.profile', ['email' => $user->e_mail, 'tab' => 'posts']) }}"
                        class="nav-link">Posts</a>
                  @endif
               </li>
               <li class="nav-item">
                  @if($tab === 'followers')
                     <a href="#" class="nav-link active">Followers</a>
                  @else
                     <a href="{{ route('user.profile', ['email' => $user->e_mail, 'tab' => 'followers']) }}"
                        class="nav-link">Followers</a>
                  @endif
               </li>
               @insession($user->e_mail)
                  <li class="nav-item">
                     @if($tab === 'following')
                        <a class="nav-link active" href="#">Following</a>
                     @else
                        <a href="{{ route('user.profile', ['email' => $user->e_mail, 'tab' => 'following']) }}"
                           class="nav-link">Following</a>
                     @endif
                  </li>
                  <li class="nav-item">
                     @if($tab === 'messages')
                        <a class="nav-link active" href="#">Messages</a>
                     @else
                        <a href="{{ route('user.profile', ['email' => $user->e_mail, 'tab' => 'messages']) }}"
                           class="nav-link">Messages</a>
                     @endif
                  </li>
                  <li class="nav-item">
                     @if($tab === 'settings')
                        <a class="nav-link active" href="#">Settings</a>
                     @else
                        <a href="{{ route('user.profile', ['email' => $user->e_mail, 'tab' => 'settings']) }}"
                           class="nav-link">Settings</a>
                     @endif
                  </li>
               @endinsession
            </ul>
            @yield("profileContent")
         </div>
      </div>
   </div>

   @insession($user->e_mail)
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
                  <h5 class="modal-title" id="uploadPictureModalLabel"><strong>Profile picture</strong></h5>
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
                        <input name="e_mail" type="hidden" value="{{ $user->e_mail }}">      <!-- Hidden input -->
                        <input name="tab" type="hidden" value="{{ $tab }}">                  <!-- Hidden input -->
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
   @endinsession

   @if($user->biography == null && $user->occupation == null)
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
                  <h5 class="modal-title" id="bioModalLabel"><strong>Biography</strong></h5>
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
                        <input id="occupation" name="occupation" type="text" placeholder="Occupation" class="w-100 form-control">
                     </div>
                     <div class="form-group row mx-2 my-0">
                        <span><strong class="text-warning" id="charRemaining">100</strong></span>
                     </div>
                     <div class="form-group row mx-2 my-0">
                        <textarea name="biography" id="biography" rows="3" cols="50" style="resize: none; width: 100%;"
                        class="form-control" placeholder="Your biography..."></textarea>
                        <input name="e_mail" type="hidden" value="{{ $user->e_mail }}">      <!-- Hidden input -->
                        <input name="tab" type="hidden" value="{{ $tab }}">                  <!-- Hidden input -->
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
   @endif
   <script>var tab = "posts";</script>
   <script src="{{ asset('js/user/profile.js') }}" defer></script>
   <script src="{{ asset('js/user/messagesTab.js') }}" defer></script>
   <script src="{{ asset('js/user/postsTab.js') }}" defer></script>
@endsection
