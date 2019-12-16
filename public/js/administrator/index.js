
$(document).ready(function(){

   searchUsers();

   $(document).on("keyup", "#searchName", function(){
      searchUsers($("#roleSelector").val(), $("#searchName").val());
   });

   $(document).on("change", "#roleSelector", function(){
      $("#searchName").val("");
      searchUsers($("#roleSelector").val());
   });

   $(document).on("click", ".delete-icon", function(event){
      event.preventDefault();
      modalDeleteForm($(this).attr("id"));
      $("#triggerModalButton").trigger("click");
   });

   $(document).on("click", ".page-change-link", function(event){
      event.preventDefault();
      var page = $(this).attr("id");
      searchUsers($("#roleSelector").val(), $("#searchName").val(), parseInt(page, 10));
   });

   $(document).on("click", ".prev-page", function(event){
      event.preventDefault();
      var selectedPage = $(".selected-page").attr("id");
      searchUsers($("#roleSelector").val(), $("#searchName").val(), parseInt(selectedPage, 10) - 1);
   });

   $(document).on("click", ".next-page", function(event){
      event.preventDefault();
      var selectedPage = $(".selected-page").attr("id");
      searchUsers($("#roleSelector").val(), $("#searchName").val(), parseInt(selectedPage, 10) + 1);
   });
});

function modalDeleteForm(id){

   $.ajaxSetup({
      headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
   });

   $.ajax({
      url: "/admin/users/modal_delete_form?id=" + id,
      type: "GET",
      dataType: "html",
      processData: false,
      success: function(response){
         $("#modalContent").html(response);
      },
      async: false
   });
}

function searchUsers(role = "costumer", searchName = "", currentPage = 1){

   var url = (searchName === "") ?
      "/admin/users/crud_content?role=" + role :
      "/admin/users/crud_content?role=" + role + "&searchName=" + searchName;

   url += "&currentPage=" + currentPage;

   $.ajaxSetup({
      headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
   });

   $.ajax({
      url: url,
      type: "GET",
      dataType: "html",
      processData: false,
      success: function(response){
         $("#tableContainer").html(response);
      }
   });
}
