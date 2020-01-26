
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

   $(document).on("click", ".likePostLink", function(event){
      event.preventDefault();
      var id = $(this).attr("id");
      var likes = $("#" + id + ".likeNumber").text();
      $("#" + id + ".likeNumber").text(parseInt(likes, 10) + 1);
      like(id);
      $(this)
         .removeClass("text-secondary")
         .removeClass("likePostLink")
         .addClass("text-success")
         .addClass("undoLikePostLink");
      if($("#" + id + ".undoDislikePostLink").length){
         $("#" + id + ".undoDislikePostLink").trigger("click");
      }
   });

   $(document).on("click", ".dislikePostLink", function(event){
      event.preventDefault();
      var id = $(this).attr("id");
      var dislikes = $("#" + id + ".dislikeNumber").text();
      $("#" + id + ".dislikeNumber").text(parseInt(dislikes, 10) + 1);
      dislike(id);
      $(this)
         .removeClass("text-secondary")
         .removeClass("dislikePostLink")
         .addClass("text-danger")
         .addClass("undoDislikePostLink");
      if($("#" + id + ".undoLikePostLink").length){
         $("#" + id + ".undoLikePostLink").trigger("click");
      }
   });

   $(document).on("click", ".undoLikePostLink", function(event){
      event.preventDefault();
      var id = $(this).attr("id");
      var likes = $("#" + id + ".likeNumber").text();
      $("#" + id + ".likeNumber").text(parseInt(likes, 10) - 1);
      $(this)
         .removeClass("text-success")
         .removeClass("undoLikePostLink")
         .addClass("text-secondary")
         .addClass("likePostLink");
      undoLike(id);
   });

   $(document).on("click", ".undoDislikePostLink", function(event){
      event.preventDefault();
      var id = $(this).attr("id");
      var dislikes = $("#" + id + ".dislikeNumber").text();
      $("#" + id + ".dislikeNumber").text(parseInt(dislikes, 10) - 1);
      $(this)
         .removeClass("text-danger")
         .removeClass("undoDislikePostLink")
         .addClass("text-secondary")
         .addClass("dislikePostLink");
      undoDislike(id);
   });
});

function modalUpdateForm(id){
   $.ajaxSetup({
      headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
   });
   $.ajax({
      url: "/user/post/modal_update_form?id=" + id + "&tab=posts",
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
      url: "/user/post/modal_delete_form?id=" + id + "&tab=posts",
      type: "GET",
      dataType: "html",
      processData: false,
      success: function(response){
         $("#modalDeletePostDiv").html(response);
      },
      async: false
   });
}

function like(postId){
   $.ajaxSetup({
      headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
   });
   $.ajax({
      url: "/user/post/like?id=" + postId,
      type: "GET",
      processData: false,
      async: false
   });
}

function dislike(postId){
   $.ajaxSetup({
      headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
   });
   $.ajax({
      url: "/user/post/dislike?id=" + postId,
      type: "GET",
      processData: false,
      async: false
   });
}

function undoLike(postId){
   $.ajaxSetup({
      headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
   });
   $.ajax({
      url: "/user/post/undo_like?id=" + postId,
      type: "GET",
      processData: false,
      async: false
   });
}

function undoDislike(postId){
   $.ajaxSetup({
      headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
   });
   $.ajax({
      url: "/user/post/undo_dislike?id=" + postId,
      type: "GET",
      processData: false,
      async: false
   });
}
