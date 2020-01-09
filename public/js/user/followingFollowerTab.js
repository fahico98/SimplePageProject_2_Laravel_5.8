
$(document).ready(function(){

   $(document).on("click", ".unfollowButton", function(event){
      event.preventDefault();
      var userEmail = $(this).attr("id");
      var ownEmail = $("#emailLink").text();
      var flag = $("#flag").val();
      if(flag.localeCompare("following") === 0){
         unfollow(ownEmail, userEmail);
      }else if(flag.localeCompare("followers") === 0){
         unfollow(userEmail, ownEmail);
         $(this)
            .removeClass("btn-outline-secondary")
            .removeClass("unfollowButton")
            .addClass("followButton")
            .addClass("btn-primarty")
            .text("Follow");
      }
   });

   $(document).on("click", ".followButton", function(event){
      event.preventDefault();
      var userEmail = $(this).attr("id");
      var ownEmail = $("#emailLink").text();
      follow(ownEmail, userEmail);
      $(this)
         .removeClass("followButton")
         .removeClass("btn-primarty")
         .addClass("unfollowButton")
         .addClass("btn-outline-secondary")
         .text("Unfollow");
   });
});

function unfollow(followerEmail, followedEmail){
   $.ajaxSetup({
      headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
   });
   $.ajax({
      url: "/user/unfollow?followerEmail=" + followerEmail + "&followedEmail=" + followedEmail,
      type: "GET",
      processData: false,
      success: function(){
         if($("#tab").val().localeCompare("following") === 0){
            loadFollowing(followerEmail);
         }
      }
   });
}

function follow(followerEmail, followedEmail){
   $.ajaxSetup({
      headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
   });
   $.ajax({
      url: "/user/follow?followerEmail=" + followerEmail + "&followedEmail=" + followedEmail,
      type: "GET",
      processData: false
   });
}
