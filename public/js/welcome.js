var regex = /[\w-\.]{2,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/;

$( document ).ready(function() {
    $('#alertContact').hide();
    $('#msgcontact').hide();
    $('#divMessageNews').hide();
    $('#alertContact2').hide();
    $('#alertContact3').hide();
});

$("#btnShowContact").click(function(){
    
    $('#btnShowContact').hide();
    $('#msgcontact').slideDown();

});

$('#form_send_contact').submit(function(){
        
    $('#button-addon2').text("Enviando...");
    $('#button-addon2').attr("disabled", true);

    var _route = $(this).attr('action');
    var _token = $("#token").val();
    var _data = $(this).serialize();

    sendForm_contact(_route, _token, _data, "contact");

    return false;
});

$('#form_send_contact3').submit(function(){
        
    $('#button-addon3').text("Enviando...");
    $('#button-addon3').attr("disabled", true);

    var _route = $(this).attr('action');
    var _token = $("#token").val();
    
    var _data = $(this).serialize();
    debugger
    sendForm_contact_fromPost(_route, _token, _data, "contact");

    return false;
});


$('#form_send_contact4').on("submit", function(){
        
    $('#button-addon4').text("Enviando...");
    $('#button-addon4').attr("disabled", true);
    try {
        var _route = $(this).attr('action');
        var _token = $("#token").val();

        var _data = $(this).serialize();
        
        sendForm_contact_fromBotonFlotante(_route, _token, _data, "contact");

        return false;
        
    } catch (error) {
        $('#button-addon4').attr("disabled", false);
    }finally{
        return false;
    }

});

$('#form_send_contact_info_BK').submit(function(){
    debugger
    blockButton();

    var _route = $(this).attr('action');
    var _token = $("#token").val();
    var _data = $(this).serialize();

    debugger
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

    sendForm(_route, _token, _data, "contact");

    return false;
});
$('#form_send_project_bk').on("submit", function(e){
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

var sendForm_contact = function(_route, _token, _data, _form_id){
    $.ajax({
        url: _route,
        headers: { 'X-CSRF-TOKEN': _token },
        type: 'POST',
        data: _data
    })
    .done(function(data, textStatus, jqXHR){
        if(data.success){
            $("#emailnews").val("");

            $('#divMessage2').html(data.message);
            $('#alertContact2').slideDown();

            $('#button-addon2').text("Enviar");
            $('#button-addon2').attr("disabled", false);
        }else{
          showAlert(data.message);
          clearForm();
          console.log(data.exeption);
          $('#button-addon2').text("Enviar");
          $('#button-addon2').attr("disabled", false);
        }
        
    })
    .fail(function(jqXHR, textStatus, errorThrown ){   
             
        console.log(jqXHR.responseJSON.errors);
        showAlert("Hubo un error en la operación, por favor intente de nuevo. Muchas gracias!");
        enableButton();
    })
};


var sendForm_contact_fromPost = function(_route, _token, _data, _form_id){
    $.ajax({
        url: _route,
        headers: { 'X-CSRF-TOKEN': _token },
        type: 'POST',
        data: _data
    })
    .done(function(data, textStatus, jqXHR){
        if(data.success){
            $("#emailnews3").val("");

            // $('#divMessage3').html(data.message);
            // $('#alertContact3').slideDown();
            showAlert(data.message, $('#divMessage3'), $('#alertContact3'));
            $('#button-addon3').text("Enviar");
            $('#button-addon3').attr("disabled", false);
        }else{
            showAlert(data.message, $('#divMessage3'), $('#alertContact3'));
            clearForm();
            console.log(data.exeption);
            $('#button-addon3').text("Enviar");
            $('#button-addon3').attr("disabled", false);
        }
        
    })
    .fail(function(jqXHR, textStatus, errorThrown ){   
             
        console.log(jqXHR.responseJSON.errors);
        showAlert("Hubo un error en la operación, por favor intente de nuevo. Muchas gracias!", $('#divMessage3'), $('#alertContact3'));
        enableButton();
    })
};

var sendForm_contact_fromBotonFlotante = function(_route, _token, _data, _form_id){
    $.ajax({
        url: _route,
        headers: { 'X-CSRF-TOKEN': _token },
        type: 'POST',
        data: _data
    })
    .done(function(data, textStatus, jqXHR){
        if(data.success){
            $("#emailnews4").val("");

            $('#button-addon4').text("Enviar");
            $('#button-addon4').attr("disabled", false);
            $("#messageSuscripcion").html(data.message);
        }else{
            console.log(data.exeption);
            $('#button-addon4').text("Enviar");
            $('#button-addon4').attr("disabled", false);
        }
        
    })
    .fail(function(jqXHR, textStatus, errorThrown ){   
        $('#button-addon4').text("Enviar");
        $('#button-addon4').attr("disabled", false);
        $("#messageSuscripcion").html("Hubo un error en la operación.");
    })
};
var sendForm = function(_route, _token, _data, _form_id){
    
    
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

// var showAlert = function(msg, divMsg, alert){
//     divMsg.html(msg);
//     alert.slideDown();
// }


// Newsletter
// $('#form_send_newsletter').submit(function(){
//     var _route = $(this).attr('action');
//     var _token = $("#token").val();
//     var _data = $(this).serialize();

//     sendFormNewsletter(_route, _token, _data, "contact");

//     return false;
// });

var sendFormNewsletter = function(_route, _token, _data, _form_id){debugger
    // if(!regex.test($('#emailnews').val().trim())){
    //     $('#emailemailnews').select();
    //     enableButton();
    //     return false;
    // }

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
