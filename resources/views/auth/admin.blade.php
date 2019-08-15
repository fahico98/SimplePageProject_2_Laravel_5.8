@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
      <div class="col-md-8">
         <div class="card">
            <div class="card-header">{{ "Admin Panel" }}</div>
            <div class="card-body">
               You are admin {{ $user->name }}, you have control...!
            </div>
         </div>
      </div>
   </div>
</div>
@endsection
