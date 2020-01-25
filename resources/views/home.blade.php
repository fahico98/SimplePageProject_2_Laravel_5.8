@extends('layouts.app')

@section('content')
   <div class="container">
      <div class="row justify-content-center">
         <div class="col-md-3">
            <div class="card">
               <div class="card-header">Recomended for you...!</div>
               <div class="card-body">
                  <ul class="list-group">
                     @if(isset($recommended))
                        @forelse($recommended as $u)
                           <li class="list-group-item active">
                              <div class="table">
                                 <div class="row">
                                    <div class="col-sm-2" style="cursor: pointer">
                                       <img src="{{ Storage::url($u->profile_picture) }}" width="40px" class="rounded">
                                    </div>
                                 </div>
                              </div>
                           </li>
                        @empty
                        @endforelse
                     @else
                        <stong>No recommended...!</strong>
                     @endif
                  </ul>
               </div>
            </div>
         </div>
         <div id="wall" name="wall" class="col-md-9">

            <!--
            <div class="card">
               <div class="card-header">User Panel</div>
               <div class="card-body">
                  @/if (session('status'))
                     <div class="alert alert-success" role="alert">
                        {/{ session('status') }}
                     </div>
                  @/endif
                  You are logged in {/{ $user->name }}...!
               </div>
            </div>
            -->

         </div>
      </div>
   </div>
   <script src="{{ asset('js/home.js') }}" defer></script>
@endsection
