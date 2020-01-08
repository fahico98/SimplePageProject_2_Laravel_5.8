
$(document).ready(function(){

   $(document).on("click", "#newMessageLink", function(){
      console.log("...!");
      $("#triggerNewMessageModalButton").trigger("click");
   });
});
