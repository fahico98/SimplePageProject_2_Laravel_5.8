
@extends('layouts.app')

@section('content')
   <div class="container">
      <div class="row justify-content-center">
         <div class="col-md-3">
            <img src="{{ Storage::url($user->profile_picture) }}" width="250px" class="rounded">
            <h2 class="mt-2 mb-0"><strong>{{ $user->name }}&nbsp;{{ $user->lastname }}</strong></h2>
            <h5 class="mt-1"><a href="#">{{ $user->e_mail }}</a></h5>
         </div>
         <div class="col-md-9">
            
            <form class="mt-4" method="POST" action="{{ route("user.profilePicture") }}" enctype="multipart/form-data">
               @csrf
               <div class="form-group row">
                  <h5>Profile picture...</h5>
               </div>
               <div class="form-group row">
                  <input name="profilePicture" type="file">
                  <input name="e_mail" type="hidden" value="{{ $user->e_mail }}">
               </div>
               <div class="form-group row">
                  <button type="submit" class="btn btn-success">Upload</button>
               </div>
            </form>
         </div>
      </div>
   </div>
@endsection
