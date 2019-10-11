
var selector = $("#tableSearchSelector");
var searchInput = $("#searchInput");

$(document).ready(function(){
   searchInput.keyup(function(){
      $.ajaxSetup({
         headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
      });
      $.ajax({
         type: "POST",
         url: "/user_search_ajax",
         data: {
            tableName: selector.val()
         },
         contentType: false,
         cache: false,
         processData: false,
         success: function(response){
            console.log(response.output);
         }
      });
   });
});
