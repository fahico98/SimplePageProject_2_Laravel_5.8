
@extends('user.profile')

@section("profileContent")
   <div class="mt-3">
      @forelse($users as $key => $u)
         @if($key % 3 === 0)
            <div class="row mx-0 mb-2">
               <div class="col-md-4 mx-0 px-1">
                  <div class="card bg-light h-100" style="max-width: 18rem;">
                     <div onClick="location.href='{{ route('user.profile', ['e_mail' => $u->e_mail]) }}'"
                        class="card-body profileCard" style="cursor: pointer">
                        <img src="{{ Storage::url($u->profile_picture) }}" width="100%" heigth="100%"
                           class="rounded mb-3">
                        <h5 class="card-title mt-0 mb-2"><strong>{{ $u->name . " " . $u->lastname }}</strong></h5>
                        <p class="card-text h6">
                           @if($u->occupation != null)
                              {{ $u->occupation }}
                           @endif
                        </p>
                     </div>
                     @outsession($u->e_mail)
                        <div class="card-footer">
                           @if($tab === "followers")
                              @following(session("email"), $u->e_mail)
                                 <form method="GET" action="{{ route('user.unfollow', [
                                       'followerEmail' => session("email"),
                                       'followedEmail' => $u->e_mail,
                                       'tab' => $tab
                                    ]) }}">
                                    <button type="submit" class="btn btn-sm w-100 btn-outline-secondary">
                                       Unfollow
                                    </button>
                                 </form>
                              @else
                                 <form method="GET" action="{{ route('user.follow', [
                                       'followerEmail' => session("email"),
                                       'followedEmail' => $u->e_mail,
                                       'tab' => $tab
                                    ]) }}">
                                    <button type="submit" class="btn btn-sm w-100 btn-primary">
                                       Follow
                                    </button>
                                 </form>
                              @endfollowing
                           @elseif($tab === "following")
                              <form method="GET" action="{{ route('user.unfollow', [
                                    'followerEmail' => session("email"),
                                    'followedEmail' => $u->e_mail,
                                    'tab' => $tab
                                 ]) }}">
                                 <button type="submit" class="btn btn-sm w-100 btn-outline-secondary">
                                    Unfollow
                                 </button>
                              </form>
                           @endif
                        </div>
                     @endoutsession
                  </div>
               </div>
         @elseif(($key - 2) % 3 === 0 || $key === count($users) - 1)
               <div class="col-md-4 mx-0 px-1">
                  <div class="card bg-light mb-3 h-100" style="max-width: 18rem;">
                     <div onClick="location.href='{{ route('user.profile', ['e_mail' => $u->e_mail]) }}'"
                        class="card-body profileCard" style="cursor: pointer">
                        <img src="{{ Storage::url($u->profile_picture) }}" width="100%" heigth="100%"
                           class="rounded mb-3">
                        <h5 class="card-title mt-0 mb-2"><strong>{{ $u->name . " " . $u->lastname }}</strong></h5>
                        <p class="card-text h6">
                           @if($u->occupation != null)
                              {{ $u->occupation }}
                           @endif
                        </p>
                     </div>
                     @outsession($u->e_mail)
                        <div class="card-footer">
                           @if($tab === "followers")
                              @following(session("email"), $u->e_mail)
                                 <button class="btn btn-sm w-100 btn-outline-secondary" id="{{ $u->e_mail }}">
                                    Unfollow
                                 </button>
                              @else
                                 <button class="btn btn-sm w-100 btn-primary" id="{{ $u->e_mail }}">
                                    Follow
                                 </button>
                              @endfollowing
                           @elseif($tab === "following")
                              <button class="btn btn-sm w-100 btn-outline-secondary" id="{{ $u->e_mail }}">
                                 Unfollow
                              </button>
                           @endif
                        </div>
                     @endoutsession
                  </div>
               </div>
            </div>
         @else
            <div class="col-md-4 mx-0 px-1">
               <div class="card bg-light mb-3 h-100" style="max-width: 18rem;">
                  <div onClick="location.href='{{ route('user.profile', ['e_mail' => $u->e_mail]) }}'"
                     class="card-body profileCard" style="cursor: pointer">
                     <img src="{{ Storage::url($u->profile_picture) }}" width="100%" heigth="100%"
                        class="rounded mb-3">
                     <h5 class="card-title mt-0 mb-2"><strong>{{ $u->name . " " . $u->lastname }}</strong></h5>
                     <p class="card-text h6">
                        @if($u->occupation != null)
                           {{ $u->occupation }}
                        @endif
                     </p>
                  </div>
                  @outsession($u->e_mail)
                     <div class="card-footer">
                        @if($tab === "followers")
                           @following(session("email"), $u->e_mail)
                              <button class="btn btn-sm w-100 btn-outline-secondary" id="{{ $u->e_mail }}">
                                 Unfollow
                              </button>
                           @else
                              <button class="btn btn-sm w-100 btn-primary" id="{{ $u->e_mail }}">
                                 Follow
                              </button>
                           @endfollowing
                        @elseif($tab === "following")
                           <button class="btn btn-sm w-100 btn-outline-secondary" id="{{ $u->e_mail }}">
                              Unfollow
                           </button>
                        @endif
                     </div>
                  @endoutsession
               </div>
            </div>
         @endif
      @empty
         <h4>No users...!</h4>
      @endforelse

      <input type="hidden" id="tab" value="{{ $tab }}">
   </div>
@endsection



