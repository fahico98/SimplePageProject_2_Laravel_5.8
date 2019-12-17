
@extends('layouts.app')

@section('content')
   <div class="container">
      <div class="row justify-content-center">
         <div class="col-md-8">
            <h2 class="mt-4">This is the <strong>{{ $user->name }} {{ $user->lastname }}</strong> profile...!</h2>
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
