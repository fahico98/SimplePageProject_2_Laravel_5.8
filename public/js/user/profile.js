
$(document).ready(function(){

   loadPosts($("#emailLink").text());

   $(document).on("click", "#image", function(event){
      event.preventDefault();
      $('#blank').attr('hidden', true);
      $("#profilePicture").val("");
      $("#profilePictureSubmitButton").attr("disabled", true);
      $("#triggerProfilePictureModalButton").trigger("click");
   });

   $(document).on("change", "#profilePicture", function(event){
      event.preventDefault();
      picturePreview(this);
   });

   $(document).on("click", "#bioLink", function(event){
      event.preventDefault();
      $("#biography").val("");
      $("#occupation").val("");
      $("#charRemaining").text(0);
      $("#charRemaining").removeClass();
      $("#triggerBioModalButton").trigger("click");
   });

   $(document).on("keyup", "#biography", function(event){
      event.preventDefault();
      var bio = $(this).val();
      var charCount = bio.length;
      $("#charRemaining").removeClass();
      $("#charRemaining").text(charCount);
      if(charCount > 80 && charCount <= 100){
         $("#charRemaining").addClass("text-warning");
      }else if(charCount > 100){
         $("#charRemaining").addClass("text-danger");
      }
   });

   $(document).on("click", "#emailLink", function(event){
      event.preventDefault();
   });

   $(document).on("click", ".nav-link", function(event){
      event.preventDefault();
      if(!$(this).hasClass("active")){
         $(".nav-link").removeClass("active");
         $(this).addClass("active");
         if($(this).text().localeCompare("Posts") === 0){
            loadPosts($("#emailLink").text());
         }else if($(this).text().localeCompare("Following") === 0){
            loadFollowing($("#emailLink").text());
         }
      }
   });

   $(document).on("click", "#profileFollowButton", function(event){
      event.preventDefault();
      follow($("#follower").val(), $("#followed").val());
   });

   $(document).on("click", "#profileUnfollowButton", function(event){
      event.preventDefault();
      unfollowFromProfile($("#follower").val(), $("#followed").val());
   });
});

function picturePreview(input){
   if(input.files && input.files[0]){
      $("#profilePictureSubmitButton").attr("disabled", false);
      var reader = new FileReader();
      reader.onload = function(e){
         $('#blank').attr('src', e.target.result);
         $('#blank').attr('width', "250px");
         $('#blank').attr('hidden', false);
      }
      reader.readAsDataURL(input.files[0]);
   }else{
      $("#profilePictureSubmitButton").attr("disabled", true);
   }
}

function loadPosts(email){
   $.ajaxSetup({
      headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
   });
   $.ajax({
      url: "/user/post/load_posts?email=" + email,
      type: "GET",
      dataType: "html",
      processData: false,
      success: function(response){
         $("#profileContent").html(response);
      },
      async: false
   });
}

function loadFollowing(email){
   $.ajaxSetup({
      headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
   });
   $.ajax({
      url: "/user/following?email=" + email,
      type: "GET",
      dataType: "html",
      processData: false,
      success: function(response){
         $("#profileContent").html(response);
      },
      async: false
   });
}

function follow(followerEmail, followedEmail){
   $.ajaxSetup({
      headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
   });
   $.ajax({
      url: "/user/following/follow?followerEmail=" + followerEmail + "&followedEmail=" + followedEmail,
      type: "GET",
      dataType: "html",
      processData: false,
      success: function(){
         location.reload();
      },
      async: false
   });
}

function unfollowFromProfile(followerEmail, followedEmail){
   $.ajaxSetup({
      headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
   });
   $.ajax({
      url: "/user/following/unfollow?followerEmail=" + followerEmail + "&followedEmail=" + followedEmail,
      type: "GET",
      processData: false,
      success: function(){
         location.reload();
      },
      async: false
   });
}

