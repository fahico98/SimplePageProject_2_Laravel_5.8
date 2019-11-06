
var roleSelector = $("#roleSelector");
var searchName = $("#searchName");
var crud = $("#crudBody");

$(document).ready(function(){
   searchUsers(roleSelector.val());
   searchName.on("keyup", function(){
      searchUsers(roleSelector.val(), searchName.val());
   });
   roleSelector.on("change", function(){
      searchName.val("");
      searchUsers(roleSelector.val());
   });
});

function searchUsers(role, searchName = ""){
   var url = (searchName === "") ?
      "/user_search?role=" + role :
      "/user_search?role=" + role + "&searchName=" + searchName;
   $.ajaxSetup({
      headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
   });
   $.ajax({
      url: url,
      type: "GET",
      dataType: "JSON",
      processData: false,
      success: function(response){
         crud.empty();
         $.each(response.users, function(key, value){
            crud.append(
               "<tr>" +
                  "<th scope='row'>" + value.name + "</th>" +
                  "<td>" + value.lastname + "</td>" +
                  "<td>" + value.phone_number + "</td>" +
                  "<td>" + value.e_mail + "</td>" +
               "</tr>"
            );
         });
      }
   });

}
