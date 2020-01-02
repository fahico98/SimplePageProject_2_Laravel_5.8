
$(document).ready(function(){

   $(document).on("click", ".unfollowButton", function(event){
      event.preventDefault();
      var followedEmail = $(this).attr("id");
      var followerEmail = $("#emailLink").text();
      unfollow(followerEmail, followedEmail);
   });

});

function unfollow(followerEmail, followedEmail){
   var output;
   $.ajaxSetup({
      headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
   });
   $.ajax({
      url: "/user/followers/unfollow?followerEmail=" + followerEmail + "&followedEmail=" + followedEmail,
      type: "GET",
      processData: false,
      success: function(){
         $("#followersLink").trigger("click");
      },
      async: false
   });
}
