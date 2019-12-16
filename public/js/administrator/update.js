
$(document).ready(function(){

    modalUpdateForm();

    $(document).on("click", "#sendButton", function(event){
        event.preventDefault();
        $("#triggerModalButton").trigger("click");
    });

    $(document).on("click", "#acceptModalButton", function(event){
        event.preventDefault();
        $("#updateForm").submit();
    });
});

function modalUpdateForm(){

    $.ajaxSetup({
       headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
       }
    });
 
    $.ajax({
       url: "/admin/users/modal_update_form",
       type: "GET",
       dataType: "html",
       processData: false,
       success: function(response){
          $("#modalContent").html(response);
       }
    });
 }
