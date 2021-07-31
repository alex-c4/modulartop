var hideTableroSections = function(){
    $("#subtitle-acabados").hide("slow");
    $("#div-acabados").hide("slow");
    $("#div-subacabados").hide("slow");

    $("#div-length").hide("slow");

    $("#div-caracteristicas").hide("slow");
    $("#div-material").hide("slow");
    $("#div-sustrato").hide("slow");
    $("#div-colors").hide("slow");
    $("#div-description").hide("slow");
}

$("#type").on("change", function(){
    var type_id = (this.value != "") ? parseInt(this.value) : this.value;
    $("#subtype").html("");   

    // se destruye el validator para crear otro nuevo en base a la seleccion del tipo
    try {
        if(GLOBAL_VALIDATOR) GLOBAL_VALIDATOR.destroy();
    } catch (error) {
        GLOBAL_VALIDATOR = null;
    }

    $('#subtype').append($('<option>', {
        value: "",
        text: "-Seleccione-"
    }));

    produc_subtypes.forEach(function(item){
        if(type_id == parseInt(item.type_id)){
            $('#subtype').append($('<option>', {
                value: item.id,
                text: item.name
            }));
        }
    });

    $('#subtype').trigger("change");

    // $("#div-subtypes").show("slow");

    if(type_id == 1){
        $("#div-acabados").show("slow");
        $("#div-length").show("slow");
        $("#subtitle-acabados").show("slow");

        showCaracteristicas(true);

        //creacion de validator para elementos de tipo "Tableros"
        validator_forTableros();

    }else{
        $("#div-acabados").hide("slow");
        $("#div-subacabados").hide("slow");
        $("#subtitle-acabados").hide("slow");
        //length
        $("#div-length").hide("slow");
        $("#length").val("");

        $("#acabado").val("").trigger("change");
        $("#sub_acabado").val("").trigger("change");

        showCaracteristicas(false);

        //creacion de validator para elementos de tipo "Tableros"
        validator_forTapacanto();
    }

})

$("#subtype").on("change", function(){
    var subtype_id = (this.value != "") ? parseInt(this.value) : this.value;

    if(subtype_id != ""){
        $("#div-code").show("slow");
        $("#div-name").show("slow");
        $("#div-origen").show("slow");
        $("#div-cantinit").show("slow");
    }else{
        $("#div-code").hide("slow");
        $("#div-name").hide("slow");
        $("#div-origen").hide("slow");
        $("#div-cantinit").hide("slow");

        // Limpiar los campos
        // $("#code").val("");
        // $("#name").val("");
        // $("#cantinit").val("0");
    }
})

$("#acabado").on("change", function(){
    var acabado_id = (this.value != "") ? parseInt(this.value) : this.value;

    $("#sub_acabado").html("");

    // if(acabado_id == ""){
    //     $("#div-subacabados").hide("slow");
    //     $('#sub_acabado').append($('<option>', {
    //         value: 0,
    //         text: "-Seleccione-"
    //     }));
    // }else{


    // }

    produc_subacabados.forEach(item => {
        if(item.id_acabado == acabado_id){
            $('#sub_acabado').append($('<option>', {
                value: item.id,
                text: item.name
            }));
        }
    });
    
    if(acabado_id != "") $("#div-subacabados").show("slow");
    
})


var validator_forTapacanto = function(){
    var validator = $("#form_product").validate({
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
    var validator = $("#form_product").validate({
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
    var validator = $("#form_product").validate({
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

var onclick_addSubType = function(){
    var _modal_type = $("#modal_type").val();
    var _subtype = $("#txtSubType").val();
    var _url = $("#hRouteAddSubType").val();
    var _data = {
        modal_type: _modal_type,
        subtype: _subtype
    };

    if(_subtype == ""){
        $("#txtSubType").addClass("is-invalid");
    }else{

        Utils.getData(_url, _token, _type, _data).then(function(result){
            if(result.result == true){
                produc_subtypes = result.data;
                $("#type").trigger("change");
                $('#subtypeModal').modal('hide')
                $("#txtSubType").val("");
                $("#txtSubType").removeClass("is-invalid")

            }else{
                console.log(result.message);
            }
        });


    }
}

var onclick_addAcabado = function(){
    var _crr_acabado = parseInt($("#acabado").val());

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
                
                // $('#acabado').append($('<option>', {
                //     value: 0,
                //     text: "-Seleccione-"
                // }));

                produc_acabados.forEach( item => {
                    if(item.id == _crr_acabado){
                        $('#acabado').append($('<option>', {
                            value: item.id,
                            text: item.name,
                            selected: "selected"
                        }));
                    }else{
                        $('#acabado').append($('<option>', {
                            value: item.id,
                            text: item.name
                        }));
                    }

                    // combo del modal
                    $('#modal_acabado').append($('<option>', {
                        value: item.id,
                        text: item.name
                    }));
                })
                // $("#acabado").val("0").trigger("change");
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
    var _crr_subacabado = parseInt($("#sub_acabado").val());
    var _crr_acabado = parseInt($("#acabado").val());

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
                    if(item.id_acabado == _crr_acabado){
                        if(item.id == _crr_subacabado){
                            $('#sub_acabado').append($('<option>', {
                                value: item.id,
                                text: item.name,
                                selected: "selected"
                            }));
                        }else{
                            $('#sub_acabado').append($('<option>', {
                                value: item.id,
                                text: item.name
                            }));
                        }
                    }

                    // $("#acabado").val("0").trigger("change");
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
    var _crr_material = parseInt($("#material").val());

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

                // $('#material').append($('<option>', {
                //     value: "",
                //     text: "-Seleccione-"
                // }));

                materials.forEach( item => {
                    if(item.id == _crr_material){
                        $('#material').append($('<option>', {
                            value: item.id,
                            text: item.name,
                            selected: "selected"
                        }));
                    }else{
                        $('#material').append($('<option>', {
                            value: item.id,
                            text: item.name
                        }));
                    }
                })
                
                // $("#material").val("").trigger("change");
                $('#materialModal').modal('hide');
                $("#txtMaterial").val("");
                $("#txtMaterial").removeClass("is-invalid")
                
            }else{
                console.log(result.message);
            }
        });
    }
}

var onclick_addSustrato = function(){
    var _url = $("#hRouteAddSustrato").val();
    var _name = $("#txtSustrato").val();
    var _crr_sustrato = parseInt($("#sustrato").val());

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

                // $('#sustrato').append($('<option>', {
                //     value: "",
                //     text: "-Seleccione-"
                // }));

                materials.forEach( item => {
                    if(item.id == _crr_sustrato){
                        $('#sustrato').append($('<option>', {
                            value: item.id,
                            text: item.name,
                            selected: "selected"
                        }));
                    }else{
                        $('#sustrato').append($('<option>', {
                            value: item.id,
                            text: item.name
                        }));
                    }

                    // $("#sustrato").val("").trigger("change");
                    $('#sustratoModal').modal('hide');
                    $("#txtSustrato").val("");
                    $("#txtSustrato").removeClass("is-invalid");

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
    var _crr_color = parseInt($("#color").val());

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

                // $('#color').append($('<option>', {
                //     value: "",
                //     text: "-Seleccione-"
                // }));

                colors.forEach( item => {
                    if(item.id == _crr_color){
                        $('#color').append($('<option>', {
                            value: item.id,
                            text: item.name,
                            selected: "selected"
                        }));
                    }else{
                        $('#color').append($('<option>', {
                            value: item.id,
                            text: item.name
                        }));
                    }

                    // $("#color").val("").trigger("change");
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


