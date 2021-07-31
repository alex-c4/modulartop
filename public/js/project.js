var GLOBAL_VALIDATOR;
var GLOBAL_IS_UPDATING = false;

$(function(){
    $('#project_date').datepicker({
        format: "yyyy-mm-dd",
        language: "en",
        autoclose: true,
        startView: 2
    });

});

$("#proyectista").on("change", function(){
    var _value = parseInt(this.value);
    debugger
    try {
        if(GLOBAL_VALIDATOR) GLOBAL_VALIDATOR.destroy();
    } catch (error) {
        GLOBAL_VALIDATOR = null;
    }
    
    switch (_value) {
        case 1:

            // Modular Top
            // DIV
            listToHidden = [
                "div_client_name", 
                "div_project_date",
                "div_partner_company",
                "div_provider"
            ];
            hideFields(listToHidden);

            listToShow = [
                "div_client_name",
                "div_project_date"
            ];
            showFields(listToShow);

            // SPAN
            $("#span_description").html("*");

            //Crear validator
            if(GLOBAL_IS_UPDATING){
                validatorToModulartop_form_update()
            }else{
                validatorToModulartop_form()
            }


            break;
        case 2:

            // Aliado Comercial
            //DIV
            listToHidden = [
                "div_client_name",
                "div_project_date",
                "div_provider"
            ];
            hideFields(listToHidden);

            listToShow = [
                "div_partner_company"
            ];
            showFields(listToShow);

            //SPAN Others
            $("#span_description").html("");

            if(GLOBAL_IS_UPDATING){
                validatorToAliado_form_update();
            }else{
                validatorToAliado_form();
            }
            break;
        case 3:
            
            // Proveedor
            //DIV
            listToHidden = [
                "div_partner_company",
                "div_client_name",
                "div_project_date"
            ];
            hideFields(listToHidden);

            listToShow = [
                "div_provider"
            ];
            showFields(listToShow);

            //SPAN Others
            $("#span_description").html("");
            if(GLOBAL_IS_UPDATING){
                validatorToProvider_form_update();
            }else{
                validatorToProvider_form();
            }

            break;
    }

});

var hideFields = function(listFields){
    listFields.forEach(function(item){
        // $("#" + item).addClass("d-none");
        $("#" + item).hide("slow");
    });
}

var showFields = function(listFields){
    listFields.forEach(function(item){
        // $("#" + item).removeClass("d-none");
        $("#" + item).show("slow");
    });
}


var validatorToModulartop_form = function(){
    var validator = $("#form_project").validate({
        rules: {
            name: {
                required: true
            },
            client_name:  {
                required: true
            },
            project_date: {
                required: true
            },
            description: {
                required: true
            },
            cover_photo: {
                required: true
            },
            cover_photo_alt_text: {
                required: true
            },
        },
        messages: {
            name: {
                required: "Por favor ingrese nombre del proyecto"
            },
            client_name: {
                required: "Por favor ingrese nombre del cliente"
            },
            project_date: {
                required: "Por favor seleccione la fecha del proyecto"
            },
            description: {
                required: "Por favor ingrese la descripción del proyecto"
            },
            cover_photo: {
                required: "Por favor seleccione la foto portada del proyecto"
            },
            cover_photo_alt_text: {
                required: "Por favor ingrese el texto alternativo de la imagen"
            }
        },
        submitHandler: function(form) {
            $("#btnSave").prop("disabled", false);
            form.submit();
        }
    });

    GLOBAL_VALIDATOR = validator;

}

var validatorToModulartop_form_update = function(){
    var validator = $("#form_project").validate({
        rules: {
            name: {
                required: true
            },
            client_name:  {
                required: true
            },
            project_date: {
                required: true
            },
            description: {
                required: true
            },
            cover_photo_alt_text: {
                required: true
            },
        },
        messages: {
            name: {
                required: "Por favor ingrese nombre del proyecto"
            },
            client_name: {
                required: "Por favor ingrese nombre del cliente"
            },
            project_date: {
                required: "Por favor seleccione la fecha del proyecto"
            },
            description: {
                required: "Por favor ingrese la descripción del proyecto"
            },
            cover_photo_alt_text: {
                required: "Por favor ingrese el texto alternativo de la imagen"
            }
        },
        submitHandler: function(form) {
            $("#btnSave").prop("disabled", false);
            form.submit();
        }
    });

    GLOBAL_VALIDATOR = validator;

}

var validatorToAliado_form = function(){
    var validator = $( "#form_project" ).validate({
        rules: {
            name: {
                required: true
            },
            cover_photo: {
                required: true
            },
            cover_photo_alt_text: {
                required: true
            },
            partner_company: {
                required: true
            },
        },
        messages: {
            name: {
                required: "Por favor ingrese nombre del proyecto"
            },
            cover_photo: {
                required: "Por favor seleccione la foto portada del proyecto"
            },
            cover_photo_alt_text: {
                required: ""
            },
            partner_company: {
                required: "Por favor ingrese la empresa aliada"
            }
        },
        submitHandler: function(form) {
            $("#btnSave").prop("disabled", false);
            form.submit();
        }
    });

    GLOBAL_VALIDATOR = validator;

}

var validatorToAliado_form_update = function(){
    var validator = $( "#form_project" ).validate({
        rules: {
            name: {
                required: true
            },
            cover_photo_alt_text: {
                required: true
            },
            partner_company: {
                required: true
            },
        },
        messages: {
            name: {
                required: "Por favor ingrese nombre del proyecto"
            },
            cover_photo_alt_text: {
                required: ""
            },
            partner_company: {
                required: "Por favor ingrese la empresa aliada"
            }
        },
        submitHandler: function(form) {
            $("#btnSave").prop("disabled", false);
            form.submit();
        }
    });

    GLOBAL_VALIDATOR = validator;

}

var validatorToProvider_form = function(){
    var validator = $( "#form_project" ).validate({
        rules: {
            name: {
                required: true
            },
            cover_photo: {
                required: true
            },
            cover_photo_alt_text: {
                required: true
            },
            provider: {
                min: 1
            },
        },
        messages: {
            name: {
                required: "Por favor ingrese nombre del proyecto"
            },
            cover_photo: {
                required: "Por favor seleccione la foto portada del proyecto"
            },
            cover_photo_alt_text: {
                required: "Por favor ingrese el texto alternativo de la imagen"
            },
            provider: {
                min: "Por favor seleccione el proveedor"
            }
        },
        submitHandler: function(form) {
            $("#btnSave").prop("disabled", false);
            form.submit();
        }
    });

    GLOBAL_VALIDATOR = validator;

}

var validatorToProvider_form_update = function(){
    var validator = $( "#form_project" ).validate({
        rules: {
            name: {
                required: true
            },
            cover_photo_alt_text: {
                required: true
            },
            provider: {
                min: 1
            },
        },
        messages: {
            name: {
                required: "Por favor ingrese nombre del proyecto"
            },
            cover_photo_alt_text: {
                required: "Por favor ingrese el texto alternativo de la imagen"
            },
            provider: {
                min: "Por favor seleccione el proveedor"
            }
        },
        submitHandler: function(form) {
            $("#btnSave").prop("disabled", false);
            form.submit();
        }
    });

    GLOBAL_VALIDATOR = validator;

}

$("#btnUpload").on("click", function(){
    var MAX = 6;
    
    var _total = $(".img_container").children().length;
    if(_total < MAX){
        if(validator.form()){
    
            statusBtnUpload(false);
            var _route = $("#hrouteUploadImage").val();
            var _token = $("#token").val();
            var formData = new FormData(document.getElementById("form_upload_image"));
    
            $.ajax({
                url: _route,
                dataType: "html",
                contentType: false,
                headers: { 'X-CSRF-TOKEN': _token },
                type: 'POST',
                data: formData,
                processData: false
            })
            .done(function(result){
                var _data = JSON.parse(result);
                if(_data.result){
                    showAlert(_data.message, "alert-success");
                    addImage(_data.data.id, _data.data.name, _data.data.alt_text, GLOBAL_IS_UPDATING);
                    statusBtnUpload(true);
                    clearFields();
    
                }else{
                    statusBtnUpload(true);
                    showAlert(_data.message, "alert-warning");
                }
            })
            .fail(function(jqXHR, textStatus, errorThrown ){
                    statusBtnUpload(true);
                    showAlert("Hubo un error en la petición, por favor intente de nuevo.", "alert-warning");
            })
        }
    }else{
        showAlert("Ha alcanzado el número máximo de imágenes permitidas para subir", "alert-warning");

    }

})

var showAlert = function(_msg, _class){
    var _html = '<div class="alert ' + _class +' alert-dismissible fade show" role="alert">' +
                     _msg
                '    <button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
                '        <span aria-hidden="true">&times;</span>' +
                '    </button>' +
                '</div>';
    $("#div-message").html(_html);
}

var showAlertModal = function(_msg, _class){
    var _html = '<div class="alert ' + _class +' alert-dismissible fade show" role="alert">' +
                     _msg
                '    <button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
                '        <span aria-hidden="true">&times;</span>' +
                '    </button>' +
                '</div>';
    $("#div-message-modal").html(_html);
}

var addImage = function(_id, _name, _alt_text, isUpdating){
    debugger
    isUpdating = (typeof isUpdating == "boolean") ? isUpdating : false;

    var _div_id = "img_div_" + _id;
    var _html = '<div class="img_div" id="' + _div_id + '">' +
                '    <img src="' + GLOBAL_URL +'/' + _name + '" alt="' + _alt_text + '">' +
                '    <span title="eliminar" onclick="delete_image(\'' + _div_id + '\', ' + _id + ')" class="icon-delete"></span>';
    if(isUpdating){
        
        _html += '<span title="editar" class="icon-pencil" data-toggle="modal" data-target="#exampleModal" data-photoid="' + _id + '"></span>';
    }
    _html += '</div>';

    $(".img_container").append(_html);

}

var delete_image = function(div_id, id){
    var _route = $("#hrouteDeleteImage").val();
    var _token = $("#token").val();
    var _data = {
        id: id
    };

    $.ajax({
        url: _route,
        headers: { 'X-CSRF-TOKEN': _token },
        type: 'POST',
        data: _data,
        dataType: "html",
    })
    .done(function(result){
        var _data = JSON.parse(result);

        if(_data.result){
            $("#" + div_id).remove();
            showAlert(_data.message, "alert-success");
        }else{
            showAlert(_data.message, "alert-warning");
        }
    })
    .fail(function(jqXHR, textStatus, errorThrown ){
        showAlert("Hubo un error en la petición, por favor intente de nuevo.", "alert-warning");
    })
}

var statusBtnUpload = function(status){
    if(status){
        $("#btnUpload").text("Subir");
        $("#btnUpload").prop("disabled", false);
    }else{
        $("#btnUpload").text("Cargando...");
        $("#btnUpload").prop("disabled", true);
    }
}

var clearFields = function(){
    $("#project_photo").val("");
    $("#alt_text").val("");

}


$("#btnSaveAltText").on("click", function(){
    debugger
    var _alt_text = $("#cover_photo_alt_text_modal").val();
    var _url = $("#hUpdateAltTextRoute").val();
    var _token = $("#token").val();
    var _type = "POST";
    var _data = {
        id: GLOBAL_ID_ALT_TEXT,
        alt_text: _alt_text
    }
    Utils.getData(_url, _token, _type, _data)
        .then(function(result){
            showAlertModal(result.message, "alert-success");
        })
        .fail(function(qXHR, textStatus, errorThrown){
            showAlertModal(result.message, "alert-warning");
            console.log(qXHR);
        })
});
