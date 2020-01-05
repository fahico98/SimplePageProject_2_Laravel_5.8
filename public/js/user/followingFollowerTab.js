
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
         $(this).removeClass("btn-outline-secondary");
         $(this).removeClass("unfollowButton");
         $(this).addClass("followButton");
         $(this).addClass("btn-primarty");
         $(this).text("Follow");
      }
   });

   $(document).on("click", ".followButton", function(event){
      event.preventDefault();
      var userEmail = $(this).attr("id");
      var ownEmail = $("#emailLink").text();
      follow(ownEmail, userEmail);
      $(this).removeClass("followButton");
      $(this).removeClass("btn-primarty");
      $(this).addClass("unfollowButton");
      $(this).addClass("btn-outline-secondary");
      $(this).text("Unfollow");
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
         if($("#flag").val().localeCompare("following") === 0){
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
