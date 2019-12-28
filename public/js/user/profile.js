
$(document).ready(function(){

   $(document).on("click", "#image", function(event){
      event.preventDefault();
      $('#blank').attr('hidden', true);
      $("#profilePicture").val("");
      $("#triggerProfilePictureModalButton").trigger("click");
   });

   $(document).on("change", "#profilePicture", function(event){
      event.preventDefault();
      picturePreview(this);
   });

   $(document).on("keyup", "#biography", function(event){
      event.preventDefault();
      var bio = $(this).val();
      console.log(">>>" + bio + "<<<");
   });

});

function picturePreview(input){
   if(input.files && input.files[0]){
      var reader = new FileReader();
      reader.onload = function(e){
         $('#blank').attr('src', e.target.result);
         $('#blank').attr('width', "250px");
         $('#blank').attr('hidden', false);
      }
      reader.readAsDataURL(input.files[0]);
   }
}

