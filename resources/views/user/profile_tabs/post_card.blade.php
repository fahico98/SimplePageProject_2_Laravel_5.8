
<div class="mb-3">
   @forelse($posts as $post)
      <div class="card bg-light mb-2">
         <div class="card-body">
            <div class="mb-2">
               <img src="{{ Storage::url($post->user->profile_picture) }}" width="30px" style="cursor: pointer"
                  class="rounded d-inline align-middle mr-1 userProfilePostImage"
                  onClick="location.href='{{ route('user.profile', ['e_mail' => $post->user->e_mail]) }}'"
                  title="{{ $post->user->name . ' ' . $post->user->lastname }}">
               <h5 class="card-title d-inline align-middle"><strong>{{ $post->title }}</strong></h5>
            </div>
            <p class="card-text mb-2">{{ $post->content }}</p>
            <div class="row">
               <div class="col-9">
                  <span class="badge badge-secondary font-weight-normal">{{ $post->created_at }}</span>
               </div>
               <div class="col-3 d-flex justify-content-end">
                  @insession($post->user->e_mail)
                     <a href="#" id="{{ $post->id }}" class="text-danger deletePostLink ml-3">
                        <i class="fas fa-lg fa-trash-alt mr-1" title="Delete post"></i>
                     </a>
                     <a href="#" id="{{ $post->id }}" class="text-primary updatePostLink ml-3">
                        <i class="fas fa-lg fa-edit" title="Edit post"></i>
                     </a>
                  @endinsession
                  @auth
                     @liked($post->id)
                        <a href="#" id="{{ $post->id }}" class="text-success ml-3 undoLikePostLink">
                     @else
                        <a href="#" id="{{ $post->id }}" class="text-secondary likePostLink ml-3">
                     @endliked
                        <label id="{{ $post->id }}" class="likeNumber font-weight-bold">{{ $post->likes }}</label>
                        <i class="fas fa-lg fa-thumbs-up" title="Like"></i>
                     </a>
                     @disliked($post->id)
                        <a href="#" id="{{ $post->id }}" class="text-danger ml-3 undoDislikePostLink">
                     @else
                        <a href="#" id="{{ $post->id }}" class="text-secondary dislikePostLink ml-3">
                     @enddisliked
                        <label id="{{ $post->id }}" class="dislikeNumber font-weight-bold">{{ $post->dislikes }}</label>
                        <i class="fas fa-lg fa-thumbs-down" title="Dislike"></i>
                     </a>
                  @endauth
               </div>
            </div>
         </div>
      </div>
   @empty
   @endforelse
</div>
