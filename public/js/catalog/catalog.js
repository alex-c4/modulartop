var setErrorPlacement = function(error, element){
    if(element.attr("id") == "type"){
        error.insertBefore($('#errorDivType'));
    }else if(element.attr("id") == "proyectista"){
        error.insertBefore($('#errorDivProyectista'));
    }else if(element.attr("id") == "catalog"){
        error.insertBefore($('#errorDivCatalog'));
    }else{
        error.insertAfter(element);
    }
}

var validator = function(){
    $("#form_catalog").validate({
        rules:{
            type:{
                required: true
            },
            proyectista:{
                required: true
            },
            catalog:{
                required: true
            }
        },
        messages: {
            type: "El campo es requerido.",
            proyectista: "El campo es requerido.",
            catalog: "El campo es requerido."
        },
        errorPlacement: function(error, element) {
            setErrorPlacement(error, element);
        },
        submitHandler: function(form) {
            $("#btnSave").prop("disabled", true);
            form.submit();
        }
    });

    // GLOBAL_VALIDATOR = validator;
}

