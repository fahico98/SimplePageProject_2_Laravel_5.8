
@forelse($followers as $key => $follower)
   <h4>{{ $follower->name }}</h4>
@empty
   <h4>No followers...!</h4>
@endforelse

