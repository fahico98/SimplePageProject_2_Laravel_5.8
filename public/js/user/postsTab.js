
$(document).ready(function(){

   $(document).on("click", "#newPostLink", function(event){
      event.preventDefault();
      $("#permissionDropdown").text("Permission");
      $("#postTitle").val("");
      $("#postContent").val("");
      $("#triggerNewPostModalButton").trigger("click");
   });

   $(document).on("click", ".dropdownItem", function(event){
      event.preventDefault();
      if($(this).text() == "Public"){
         var permissionVal = "1";
      }else if($(this).text() == "Followers"){
         var permissionVal = "2";
      }else{
         var permissionVal = "3";
      }
      $("#permissionDropdown").text($(this).text());
      $("#permission").val(permissionVal);
   });

   $(document).on("keyup", "#postContent", function(event){
      event.preventDefault();
      var content = $(this).val();
      var charCount = content.length;
      $("#newPostCharRemaining").removeClass();
      $("#newPostCharRemaining").text(charCount);
      if(charCount > 350 && charCount <= 400){
         $("#newPostCharRemaining").addClass("text-warning");
      }else if(charCount > 400){
         $("#newPostCharRemaining").addClass("text-danger");
      }
   });
});
