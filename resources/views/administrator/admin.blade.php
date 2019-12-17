@extends('layouts.app')

@section('content')
   <div class="container">
      <div class="row justify-content-center">
         <div class="col-md-8">
            <div class="card">
               <div class="card-header">Admin Panel</div>
               <div class="card-body">
                  You are admin {{ $user->name }}, got have everything under control...!<br>
                  Now you can access the <a href="{{ route('users.index') }}">user search</a>.
               </div>
            </div>
         </div>
      </div>
   </div>
@endsection
