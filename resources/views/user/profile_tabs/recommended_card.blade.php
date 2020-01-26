

@forelse($recommended as $u)
   <div class="table" onClick="location.href='{{ route('user.profile', ['e_mail' => $u->e_mail]) }}'"
      style="cursor: pointer">
      <div class="row my-3">
         <div class="col-sm-2 my-auto">
            <img src="{{ Storage::url($u->profile_picture) }}" width="40px" class="rounded">
         </div>
         <div class="col-sm-9 ml-1 text-truncate align-middle">
            <p class="font-weight-bold my-0">{{ $u->name . ' ' . $u->lastname }}</p>
            <p class="my-0" style="font-size: 12px;">{{ $u->biography }}</p>
         </div>
      </div>
   </div>
@empty
@endforelse
