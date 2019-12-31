
$(document).ready(function(){

   $(document).on("click", "#newPostLink", function(event){
      event.preventDefault();
      $("#permissionDropdown").text("Permission");
      $("#postTitle").val("");
      $("#postContent").val("");
      $("#triggerNewPostModalButton").trigger("click");
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

   $(document).on("keyup", "#updatePostContent", function(event){
      event.preventDefault();
      var content = $(this).val();
      var charCount = content.length;
      $("#updatePostCharRemaining").removeClass();
      $("#updatePostCharRemaining").text(charCount);
      if(charCount > 350 && charCount <= 400){
         $("#updatePostCharRemaining").addClass("text-warning");
      }else if(charCount > 400){
         $("#updatePostCharRemaining").addClass("text-danger");
      }
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

   $(document).on("click", ".updateDropdownItem", function(event){
      event.preventDefault();
      if($(this).text() == "Public"){
         var permissionVal = "1";
      }else if($(this).text() == "Followers"){
         var permissionVal = "2";
      }else{
         var permissionVal = "3";
      }
      $("#updatePermissionDropdown").text($(this).text());
      $("#updatePermission").val(permissionVal);
   });

   $(document).on("click", ".updatePostLink", function(event){
      event.preventDefault();
      modalUpdateForm($(this).attr("id"));
      $("#triggerUpdatePostModalButton").trigger("click");
   });

   $(document).on("click", ".deletePostLink", function(event){
      event.preventDefault();
      modalDeleteForm($(this).attr("id"));
      $("#triggerDeletePostModalButton").trigger("click");
   });
});

function modalUpdateForm(id){
   $.ajaxSetup({
      headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
   });
   $.ajax({
      url: "/user/post/modal_update_form?id=" + id,
      type: "GET",
      dataType: "html",
      processData: false,
      success: function(response){
         $("#modalUpdatePostDiv").html(response);
      },
      async: false
   });
}

function modalDeleteForm(id){
   $.ajaxSetup({
      headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
   });
   $.ajax({
      url: "/user/post/modal_delete_form?id=" + id,
      type: "GET",
      dataType: "html",
      processData: false,
      success: function(response){
         $("#modalDeletePostDiv").html(response);
      },
      async: false
   });
}
