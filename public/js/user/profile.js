
$(document).ready(function(){

   $(document).on("click", "#image", function(event){
      event.preventDefault();
      $('#blank').attr('hidden', true);
      //$('#blank').attr('src', "#");
      $("#profilePictureInput").val("");
      $("#triggerModalButton").trigger("click");
   });

   $(document).on("change", "#profilePictureInput", function(event){
      event.preventDefault();
      picturePreview(this);
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

