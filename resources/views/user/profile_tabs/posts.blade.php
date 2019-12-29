
<div>
   <a href="#"><strong>+</strong>&nbsp;New post...</a>
</div>

@forelse($posts as $post)
   <div class="row">
      <div class="card bg-light">
         <div class="card-header">Header</div>
         <div class="card-body">
            <h5 class="card-title">Light card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
         </div>
      </div>
   </div>
@empty
   <div class="row justify-content-center">
      <h5 class="mt-5"><strong>You have not published yet...!</trong></h5>
   </div>
@endforelse
