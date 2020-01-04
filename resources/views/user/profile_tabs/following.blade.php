
@forelse($following as $key => $user)
   @if($key % 3 === 0)
      <div class="row mx-0 mb-2">
         <div class="col-md-4 mx-0 px-1">
            <div class="card bg-light h-100" style="max-width: 18rem;">
               <div onClick="location.href='{{ route('user.profile', ['id' => $user->e_mail]) }}'"
                  class="card-body profileCard" style="cursor: pointer">
                  <img src="{{ Storage::url($user->profile_picture) }}" width="100%" heigth="100%"
                     class="rounded mb-3">
                  <h5 class="card-title mt-0 mb-2"><strong>{{ $user->name . " " . $user->lastname }}</strong></h5>
                  <p class="card-text h6">
                     @if($user->occupation != null)
                        {{ $user->occupation }}
                     @endif
                  </p>
               </div>
               <div class="card-footer">
                  <button class="btn btn-outline-secondary unfollowButton" id="{{ $user->e_mail }}">Unfollow</button>
               </div>
            </div>
         </div>
   @elseif(($key - 2) % 3 === 0 || $key === count($following) - 1)
         <div class="col-md-4 mx-0 px-1">
            <div class="card bg-light mb-3 h-100" style="max-width: 18rem;">
               <div onClick="location.href='{{ route('user.profile', ['id' => $user->e_mail]) }}'"
                  class="card-body profileCard" style="cursor: pointer">
                  <img src="{{ Storage::url($user->profile_picture) }}" width="100%" heigth="100%"
                     class="rounded mb-3">
                  <h5 class="card-title mt-0 mb-2"><strong>{{ $user->name . " " . $user->lastname }}</strong></h5>
                  <p class="card-text h6">
                     @if($user->occupation != null)
                        {{ $user->occupation }}
                     @endif
                  </p>
               </div>
               <div class="card-footer">
                  <button class="btn btn-outline-secondary unfollowButton" id="{{ $user->e_mail }}">Unfollow</button>
               </div>
            </div>
         </div>
      </div>
   @else
      <div class="col-md-4 mx-0 px-1">
         <div class="card bg-light mb-3 h-100" style="max-width: 18rem;">
            <div onClick="location.href='{{ route('user.profile', ['id' => $user->e_mail]) }}'"
               class="card-body profileCard" style="cursor: pointer">
               <img src="{{ Storage::url($user->profile_picture) }}" width="100%" heigth="100%"
                  class="rounded mb-3">
               <h5 class="card-title mt-0 mb-2"><strong>{{ $user->name . " " . $user->lastname }}</strong></h5>
               <p class="card-text h6">
                  @if($user->occupation != null)
                     {{ $user->occupation }}
                  @endif
               </p>
            </div>
            <div class="card-footer">
               <button class="btn btn-outline-secondary unfollowButton" id="{{ $user->e_mail }}">Unfollow</button>
            </div>
         </div>
      </div>
   @endif
@empty
   <h4>No users...!</h4>
@endforelse

<script src="{{ asset('js/user/followingTab.js') }}" defer></script>