// var _url = $("#hUrlFillcombo").val();
var _token = $("#token").val();
var _type = "POST";

var GLOBAL_VALIDATOR;
var GLOBAL_IS_UPDATING = false;

$(function(){
    // hide_divs();
})

$("#btnAddImage").on("click", function(){
    debugger
    // validar que haya seleccionado imagenes
    var _children = $("#container-img").children();
    var _hasEmptyFile = false;

    _children.each(function(){ 
        _hasEmptyFile = (this.value == "") ? true : false;
    });

    if(!_hasEmptyFile){
        var _total_img = _children.length + 1;
        var _html = "<input type='file' id='image_" + _total_img + "' name='image_" + _total_img + "' accept='image/png, image/jpeg, image/jpg' class='form-control mt-2' placeholder='Imagen'>";  
        $("#container-img").append(_html);
    }else{
        
    }

});

var GLOBAL_URL = "";
var GLOBAL_PRODUCT_NAME = "";


var deleteImage = function(_id, _name, _productId){
    
    var _confirm = confirm("¿Seguro que desea borrar la imagen?")
    if(_confirm == true){
        _url = $("#hUrlDeleteImage").val();
        var _data = {
            id: _id,
            name: _name,
            id_product: _productId
        }

        Utils.getData(_url, _token, _type, _data).then(function(result){
            if(result.result == true){
                $(".images-container").html("");
                result.data.forEach(item => {
                    _html = "<div class='image-trash'>" +
                            "    <img src='"+ GLOBAL_URL + "/" + item.name + "' alt='" + GLOBAL_PRODUCT_NAME + "'>" +
                            "    <div class='div-trash'>" +
                            "        <span onclick='deleteImage(" + item.id + ", \"" + item.name + "\", " + item.id_product + ")' class='icon-trash'></span>" +
                            "    </div>" +
                            "</div>";
                    $(".images-container").append(_html);
                });
            }
        });
    }
}

var onclick_addAcabado = function(){

    var _url = $("#hRouteAddAcabado").val();
    var _name = $("#txtAcabado").val();

    var _data = {
        name: _name
    };

    if(_name == ""){
        $("#txtAcabado").addClass("is-invalid");
    }else{

        Utils.getData(_url, _token, _type, _data).then(function(result){

            if(result.result == true){                
                var produc_acabados = result.data;
                $("#acabado").html("")
                $("#modal_acabado").html("");
                
                $('#acabado').append($('<option>', {
                    value: 0,
                    text: "-Seleccione-"
                }));
                produc_acabados.forEach( item => {
                    $('#acabado').append($('<option>', {
                        value: item.id,
                        text: item.name
                    }));

                    // combo del modal
                    $('#modal_acabado').append($('<option>', {
                        value: item.id,
                        text: item.name
                    }));
                })
                $("#acabado").val("0").trigger("change");
                $('#subacabado').modal('hide');

                $('#acabadoModal').modal('hide');
                $("#txtAcabado").val("");
                $("#txtAcabado").removeClass("is-invalid")
            }else{
                console.log(result.message);
            }
        });


    }
}

var onclick_addSubacabado = function(){
    var _url = $("#hRouteAddSubacabado").val();
    var _id_acabado = $("#modal_acabado").val();
    var _name = $("#txtSubacabado").val();

    var _data = {
        id_acabado: _id_acabado,
        name: _name
    };

    if(_name == ""){
        $("#txtAcabado").addClass("is-invalid");
    }else{
        Utils.getData(_url, _token, _type, _data).then(function(result){
            if(result.result == true){
                $("#sub_acabado").html("");
                produc_subacabados = result.data;
                produc_subacabados.forEach( item => {
                    $('#sub_acabado').append($('<option>', {
                        value: item.id,
                        text: item.name
                    }));

                    $("#acabado").val("0").trigger("change");
                    $('#subacabadoModal').modal('hide');
                    $("#txtSubacabado").val("");
                    $("#txtSubacabado").removeClass("is-invalid")
                })
            }else{
                console.log(result.message);
            }
        });
    }

}

var onclick_addMaterial = function(){
    var _url = $("#hRouteAddMaterial").val();
    var _name = $("#txtMaterial").val();

    var _data = {
        name: _name
    };

    if(_name == ""){
        $("#txtMaterial").addClass("is-invalid");
    }else{
        Utils.getData(_url, _token, _type, _data).then(function(result){
            if(result.result == true){
                $("#material").html("");
                materials = result.data;

                $('#material').append($('<option>', {
                    value: "",
                    text: "-Seleccione-"
                }));

                materials.forEach( item => {
                    $('#material').append($('<option>', {
                        value: item.id,
                        text: item.name
                    }));

                    $("#material").val("").trigger("change");
                    $('#materialModal').modal('hide');
                    $("#txtMaterial").val("");
                    $("#txtMaterial").removeClass("is-invalid")
                })
            }else{
                console.log(result.message);
            }
        });
    }
}

var onclick_addSustrato = function(){
    var _url = $("#hRouteAddSustrato").val();
    var _name = $("#txtSustrato").val();

    var _data = {
        name: _name
    };

    if(_name == ""){
        $("#txtSustrato").addClass("is-invalid");
    }else{
        Utils.getData(_url, _token, _type, _data).then(function(result){
            if(result.result == true){
                $("#sustrato").html("");
                materials = result.data;

                $('#sustrato').append($('<option>', {
                    value: "",
                    text: "-Seleccione-"
                }));

                materials.forEach( item => {
                    $('#sustrato').append($('<option>', {
                        value: item.id,
                        text: item.name
                    }));

                    $("#sustrato").val("").trigger("change");
                    $('#sustratoModal').modal('hide');
                    $("#txtSustrato").val("");
                    $("#txtSustrato").removeClass("is-invalid")
                })
            }else{
                console.log(result.message);
            }
        });
    }
}

var onclick_addColor = function(){
    var _url = $("#hRouteAddColor").val();
    var _name = $("#txtColor").val();

    var _data = {
        name: _name
    };

    if(_name == ""){
        $("#txtColor").addClass("is-invalid");
    }else{
        Utils.getData(_url, _token, _type, _data).then(function(result){
            if(result.result == true){
                $("#color").html("");
                colors = result.data;

                $('#color').append($('<option>', {
                    value: "",
                    text: "-Seleccione-"
                }));

                colors.forEach( item => {
                    $('#color').append($('<option>', {
                        value: item.id,
                        text: item.name
                    }));

                    $("#color").val("").trigger("change");
                    $('#colorModal').modal('hide');
                    $("#txtColor").val("");
                    $("#txtColor").removeClass("is-invalid")
                })
            }else{
                console.log(result.message);
            }
        });
    }
}

var showCaracteristicas = function(option){
    if(option){
        $("#div-caracteristicas").show("slow");
        $("#div-material").show("slow");
        $("#div-sustrato").show("slow");
        $("#div-colors").show("slow");
        $("#div-description").show("slow");
    }else{
        $("#div-caracteristicas").hide("slow");
        $("#div-material").hide("slow");
        $("#div-sustrato").hide("slow");
        $("#div-colors").hide("slow");
        $("#div-description").hide("slow");

        // resetear opcion seleccionada
        $("#material").val("").trigger("change");
        $("#sustrato").val("").trigger("change");
        $("#color").val("").trigger("change");
        $("#description").val("")
    }
}

var validator_forTapacanto = function(){
    var validator = $("#form_create_product").validate({
        rules:{
            category:{
                min: 1
            },
            type:{
                required: true
            },
            subtype:{
                required: true
            },
            code:{
                required: true
            },
            name:{
                required: true
            },
            origen:{
                required: true
            },
            width:{
                required: true,
                min: 1
            },
            thickness:{
                required: true,
                min: 1
            },
            description:{
                required: true
            },
            image_0:{
                required: true
            },
            image_alt:{
                required: true
            }
        },
        messages: {
            category: "Por favor seleccione la Categoria",
            type: "Por favor seleccione el Tipo",
            subtype: "Por favor seleccione el Sub-tipo",
            code: "Por favor ingrese el Código",
            name: "Por favor ingrese el Nombre",
            origen: "Por favor seleccione el Origen",
            width: "Por favor ingrese el Ancho",
            thickness: "Por favor ingrese el Espesor",
            description: "Por favor ingrese la Descripción",
            image_0: "Por favor seleccione la Imagen Principal",
            image_alt: "Por favor ingrese el Texto Alternativo"
        },
        errorPlacement: function(error, element) {
        },
        submitHandler: function(form) {
            $("#btnSave").prop("disabled", false);
            form.submit();
        }
    });

    GLOBAL_VALIDATOR = validator;

}

var validator_forTableros = function(){
    var validator = $("#form_create_product").validate({
        rules: {
            category:{
                required: true
            },
            type:{
                required: true
            },
            subtype:{
                required: true
            },
            code:{
                required: true
            },
            name:{
                required: true
            },
            origen:{
                min: 1
            },
            acabado:{
                required: true
            },
            width:{
                required: true,
                min: 1
            },
            thickness:{
                required: true,
                min: 1
            },
            length:{
                required: true,
                min: 1
            },
            material:{
                required: true
            },
            sustrato:{
                required: true
            },
            color:{
                required: true
            },
            description:{
                required: true
            },
            image_0:{
                required: true
            },
            image_alt:{
                required: true
            }
        },
        messages: {
            category: "Por favor seleccione la Categoria",
            type: "Por favor seleccione el Tipo",
            subtype: "Por favor seleccione el Sub-tipo",
            code: "Por favor ingrese el Código",
            name:"Por favor ingrese el Nombre",
            origen:"Por favor seleccione el Origen",
            acabado:"Por favor seleccione el Acabado",
            width:"Por favor ingrese el Ancho",
            thickness:"Por favor ingrese el Espesor",
            length:"Por favor ingrese el Largo",
            material: "Por favor seleccione el Material",
            sustrato: "Por favor seleccione el Sustrato",
            color: "Por favor seleccione el Color",
            description: "Por favor ingrese la Descripción",
            image_0: "Por favor seleccione la Imagen Principal",
            image_alt: "Por favor ingrese el Texto Alternativo"
        },
        errorPlacement: function(error, element) {
            // $("#error-subtype").html("");

            // if(element[0].id == "subtype"){
            //     $("#error-subtype").html(error[0].getInnerHTML())
            // }
        },
        submitHandler: function(form) {
            $("#btnSave").prop("disabled", false);
            form.submit();
        }
    });

    GLOBAL_VALIDATOR = validator;
        
}

var validator_default = function(){
    var validator = $("#form_create_product").validate({
        rules:{
            category:{
                required: true
            },
            type:{
                required: true
            }
        },
        messages: {
            category: "Por favor seleccione la Categoria",
            type: "Por favor seleccione el Tipo"
        },
        submitHandler: function(form) {
            // $("#btnSave").prop("disabled", false);
            form.submit();
        }
    });

    GLOBAL_VALIDATOR = validator;
}