
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
      url: "/user/profile/load_posts?email=" + email,
      type: "GET",
      dataType: "html",
      processData: false,
      success: function(response){
         $("#profileContent").html(response);
      },
      async: false
   });
}

