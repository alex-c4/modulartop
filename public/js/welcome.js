var regex = /[\w-\.]{2,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/;

$( document ).ready(function() {
    $('#alertContact').hide();
    $('#msgcontact').hide();
    $('#divMessageNews').hide();
});

$("#btnShowContact").click(function(){
    
    $('#btnShowContact').hide();
    $('#msgcontact').slideDown();

});

$('#form_send_contact_info').submit(function(){
    blockButton();

    var _route = $(this).attr('action');
    var _token = $("#token").val();
    var _data = $(this).serialize();

    sendForm(_route, _token, _data, "contact");

    return false;
});
$('#form_send_project').submit(function(e){
    e.preventDefault();
    blockButton();

    var formData = new FormData(document.getElementById("form_send_project"));
    formData.append("fname", $('#fname').val());
    formData.append("lname", $('#lname').val());
    formData.append("email", $('#email').val());
    formData.append("subject", $('#subject').val());
    // formData.append("name_file", fileInputElement.files[0]);
    formData.append("name_file", $('#name_file')[0].files[0]);

    var _route = $(this).attr('action');
    var _token = $("#token").val();
    // var _data = $(this).serialize();
    var _data = formData;

    sendFormProject(_route, _token, _data, "contact");

    return false;
});

var sendForm = function(_route, _token, _data, _form_id){
    
    if($('#fname').val() == ""){
        $('#fname').select();
        enableButton();
        return false;
    }else if($('#lname').val() == ""){
        $('#lname').select();
        enableButton();
        return false;
    }else if(!regex.test($('#email').val().trim())){
        $('#email').select();
        enableButton();
        return false;
    }else if($('#subject').val() == ""){
        $('#subject').select();
        enableButton();
        return false;
    }else if($('#message').val() == ""){
        $('#message').select();
        enableButton();
        return false;
      }
    
    $.ajax({
        url: _route,
        headers: { 'X-CSRF-TOKEN': _token },
        type: 'POST',
        data: _data
    })
    .done(function(data, textStatus, jqXHR){
        if(data.success){
          showAlert("" + data.message + "");
          clearForm();
        //   $("#sendmessage").addClass("sendmessageShow");
          enableButton();
        }else{
          showAlert(data.message);
          clearForm();
          console.log(data.exeption);
          enableButton();
        }
        
    })
    .fail(function(jqXHR, textStatus, errorThrown ){   
             
        console.log(jqXHR.responseJSON.errors);
        showAlert("Hubo un error en la operación, por favor intente de nuevo. Muchas gracias!");
        enableButton();
    })
};

var sendFormProject = function(_route, _token, _data, _form_id){
    
    if($('#fname').val() == ""){
        $('#fname').select();
        enableButton();
        return false;
    }else if($('#lname').val() == ""){
        $('#lname').select();
        enableButton();
        return false;
    }else if(!regex.test($('#email').val().trim())){
        $('#email').select();
        enableButton();
        return false;
    }else if($('#subject').val() == ""){
        $('#subject').select();
        enableButton();
        return false;
    }else if($('#message').val() == ""){
        $('#message').select();
        enableButton();
        return false;
      }
    
    $.ajax({
        url: _route,
        headers: { 'X-CSRF-TOKEN': _token },
        type: 'POST',
        data: _data,
        processData: false,  
        contentType: false
    })
    .done(function(data, textStatus, jqXHR){
        if(data.success){
          showAlert("" + data.message + "");
          clearForm();
        //   $("#sendmessage").addClass("sendmessageShow");
          enableButton();
        }else{
          showAlert(data.message);
          clearForm();
          console.log(data.exeption);
          enableButton();
        }
        
    })
    .fail(function(jqXHR, textStatus, errorThrown ){   
             
        console.log(jqXHR.responseJSON.errors);
        showAlert("Hubo un error en la operación, por favor intente de nuevo. Muchas gracias!");
        enableButton();
    })
};

var clearForm = function(){
    $("#fname").val("");
    $("#lname").val("");
    $("#email").val("");
    $("#subject").val("");
    $("#message").val("");
}

var showAlert = function(msg){
    $('#divMessage').html(msg);
    $('#alertContact').slideDown();
}

var blockButton = function(){
    $('#btnSendContactInfo').val("Enviando...");
    $('#btnSendContactInfo').attr("disabled", true);
  }
  
var enableButton = function(){
    $('#btnSendContactInfo').attr("disabled", false);
    $('#btnSendContactInfo').val("Enviar");
}

// Newsletter
$('#form_send_newsletter').submit(function(){
    var _route = $(this).attr('action');
    var _token = $("#token").val();
    var _data = $(this).serialize();

    sendFormNewsletter(_route, _token, _data, "contact");

    return false;
});

var sendFormNewsletter = function(_route, _token, _data, _form_id){
    if(!regex.test($('#emailnews').val().trim())){
        $('#emailemailnews').select();
        enableButton();
        return false;
    }

    $.ajax({
        url: _route,
        headers: { 'X-CSRF-TOKEN': _token },
        type: 'POST',
        data: _data
    })
    .done(function(data, textStatus, jqXHR){
        if(data.success){
            $("#emailnews").val("");
            $('#divMessageNews').html(data.message);
            $('#divMessageNews').slideDown();
        }else{
            $('#divMessageNews').html(data.message);
            $('#divMessageNews').slideDown();
        }
    })
    .fail(function(jqXHR, textStatus, errorThrown ){   
        console.log(jqXHR.responseJSON.errors);
        $('#divMessageNews').html("Error en la operación, por favor intente de nuevo. Muchas gracias!");
    })
}
