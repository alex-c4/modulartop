var _token = $("#token").val();
var _type = "POST";

var setErrorPlacement = function(error, element){
    if(element.attr("id") == "type"){
        error.insertBefore($('#errorDivType'));
    }else if(element.attr("id") == "aliado"){
        error.insertBefore($('#errorDivAliado'));
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
            aliado:{
                required: true
            },
            catalog:{
                required: true
            }
        },
        messages: {
            type: "El campo es requerido.",
            aliado: "El campo es requerido.",
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

var onclick_addType = function(){
    var _category = $("#modal_category_modal").val();
    var _tipo = $("#txtType").val();
    var _url = $("#hRouteAddType").val();
    var _data = {
        category: _category,
        name : _tipo
    };
    
    Utils.getData(_url, _token, _type, _data).then(function(result){
        if(result.result == true){
            var tipo = result.data;
            produc_types.push({id: tipo.id, category_id: parseInt(tipo.category_id), name: tipo.name});
            Utils.addOptionToSelect("type", tipo.id, tipo.name, false);
            // $('#typeModal').modal('hide');
            Utils.clearModal(['txtType'], 'msgTypeModal')
            Utils.setAlert(result.message, 'success', 'msgTypeModal');
        }else{
            Utils.setAlert(result.message, 'warning', 'msgTypeModal');
        }
    });
}

var onclick_addAliado = function(){
    var _aliado = $("#txtAliado").val();
    var _url = $("#hRouteAddAliado").val();
    var _data = {
        name : _aliado
    };
    
    Utils.getData(_url, _token, _type, _data).then(function(result){
        if(result.result == true){
            var aliado = result.data;
            Utils.addOptionToSelect("aliado", aliado.id, aliado.name, false);
            // $('#typeModal').modal('hide');
            Utils.clearModal(['txtAliado'], 'msgAliadoModal')
            Utils.setAlert(result.message, 'success', 'msgAliadoModal');
        }else{
            Utils.setAlert(result.message, 'warning', 'msgAliadoModal');
        }
    });
}

