
$(document).ready(function(){

   $(document).on("click", "#newMessageLink", function(event){
      event.preventDefault();
      $("#triggerNewMessageModalButton").trigger("click");
   });
});
