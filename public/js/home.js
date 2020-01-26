
$(document).ready(function(){

   loadPosts(1);
   loadRecommended();

   $(window).scroll(function(){

      /*
      console.log("window scroll top: " + $(window).scrollTop() + ".\n");
      console.log("document height: " + $(document).height() + ".\n");
      console.log("window height: " + $(window).height() + ".\n");
      */

      if($(window).scrollTop() == $(document).height() - $(window).height()){

      }
   });

});

function loadRecommended(){
   $.ajaxSetup({
      headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
   });
   $.ajax({
      url: "/recommended",
      type: "GET",
      dataType: "html",
      processData: false,
      success: function(response){
         $("#cardToRecommended").append(response);
      },
      async: false
   });
}

function loadPosts(step){
   $.ajaxSetup({
      headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
   });
   $.ajax({
      url: "/load_posts?step=" + step,
      type: "GET",
      dataType: "html",
      processData: false,
      success: function(response){
         $("#wall").append(response);
      },
      async: false
   });
}
