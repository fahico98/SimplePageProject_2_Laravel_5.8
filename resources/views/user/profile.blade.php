
@extends('layouts.app')

@section('content')
   <div class="container">
      <div class="row justify-content-center">
         <div class="col-md-3">
            <img src="{{ Storage::url($user->profile_picture) }}" width="250px" class="rounded" id="image"
               style="cursor: pointer">
            <h2 class="mt-2 mb-0"><strong>{{ $user->name }}&nbsp;{{ $user->lastname }}</strong></h2>
            <h5 class="mt-1"><a href="#">{{ $user->e_mail }}</a></h5>
         </div>
         <div class="col-md-9">
            <h3>Content...!</h3>
         </div>
      </div>
   </div>

   <!-- Button trigger modal -->
   <button id="triggerModalButton" type="button" class="btn btn-primary" data-toggle="modal"
      data-target="#uploadPictureModal" hidden>
      Launch demo modal
   </button>

   <!-- Modal -->
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
            <form method="POST" action="{{ route("user.profilePicture") }}" enctype="multipart/form-data">
               @csrf
               <div class="modal-body">
                  <div class="form-group row mx-2 my-0">
                     <h4>Select a profile picture.</h4>
                  </div>
                  <div class="form-group row mx-2 my-0">
                     <input name="profilePicture" id="profilePictureInput" type="file">
                     <input name="e_mail" type="hidden" value="{{ $user->e_mail }}">
                     <div class="d-flex justify-content-center w-100 my-0">
                        <img class="mt-3" id="blank" src="#" width="0" hidden>
                     </div>
                  </div>
               </div>
               <div class="modal-footer">
                  <button type="submit" class="btn btn-primary">Upload</button>
                  <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
               </div>
            </form>
         </div>
      </div>
   </div>
   <script src="{{ asset('js/user/profile.js') }}" defer></script>
@endsection
