$("#phone").mask("+7(999)999-99-99");

$("#application_form").submit(function(event){
    event.preventDefault();

    var url = $(this).attr("action");
    var request_method = $(this).attr("method");
    var form_data = $(this).serialize();

    $.ajax({
        url : url,
        type: request_method,
        data : form_data,
        success: function(response){
            alert('Application was accepted!');
            $("#application_card").hide();
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            alert("Something is wrong!");
        }
    });
});