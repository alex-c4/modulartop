var hideTableroSections = function(){
    // $("#subtitle-acabados").hide("slow");
    // $("#div-acabados").hide("slow");
    // $("#div-subacabados").hide("slow");

    $("#div-length").hide("slow");

    $("#div-caracteristicas").hide("slow");
    $("#div-material").hide("slow");
    $("#div-sustrato").hide("slow");
    $("#div-colors").hide("slow");
    $("#div-description").hide("slow");
}


$("#category").on("change", function(){
    var category_id = (this.value != "") ? parseInt(this.value) : this.value;
    $("#type").html("");
    $("#modal_type").html("");

    if(category_id == ""){
        $("#div-types").hide("slow");

        $('#type').append($('<option>', {
            value: "",
            text: "-Seleccione-"
        }));
    }else{
        $('#type').append($('<option>', {
            value: "",
            text: "-Seleccione-"
        }));

        
        produc_types.forEach(function(item){
            if(category_id == parseInt(item.category_id)){
                $('#type').append($('<option>', {
                    value: item.id,
                    text: item.name
                }));

                $('#modal_type').append($('<option>', {
                    value: item.id,
                    text: item.name
                }));
            }
        });

        $("#div-types").show("slow");

    }

    $("#type").val("").trigger("change");

})

$("#type").on("change", function(){
    var type_id = (this.value != "") ? parseInt(this.value) : this.value;
    var category_id = $("#category").val();

    $("#subtype").html("");   

    // Se comenta el siguiente código debido al cambio agregado, 
    // se agregó nuevo botón para agregar nueva categoria

    // $('#subtype').trigger("change");

    
    // if(type_id == 1){
    //     $("#div-acabados").show("slow");
    //     $("#div-length").show("slow");
    //     $("#subtitle-acabados").show("slow");

    //     showCaracteristicas(true);

    //     //creacion de validator para elementos de tipo "Tableros"
    //     validator_forTableros();

    // }else{
    //     $("#div-acabados").hide("slow");
    //     $("#div-subacabados").hide("slow");
    //     $("#subtitle-acabados").hide("slow");
    //     //length
    //     $("#div-length").hide("slow");
    //     $("#length").val("");

    //     $("#acabado").val("").trigger("change");
    //     $("#sub_acabado").val("").trigger("change");

    //     showCaracteristicas(false);

    //     //creacion de validator para elementos de tipo "Tableros"
    //     validator_forTapacanto();
    // }
    
    // fin del código comentado

    if(type_id == ""){
        // $("#div-subtypes").hide("slow");
        // $("#div-acabados").hide("slow");
        // $("#div-subacabados").hide("slow");
        // $("#subtitle-acabados").hide("slow");

        //length
        // $("#div-length").hide("slow");
        // $("#length").val("");

        // showCaracteristicas(false);

        validator_default();
    }else{
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
        
        $('#modal_type').html("");
        produc_types.forEach(function(item){
            if(category_id == parseInt(item.category_id)){

                $('#modal_type').append($('<option>', {
                    value: item.id,
                    text: item.name
                }));
            }
        });

        $('#subtype').val("").trigger("change");
    
        $("#div-subtypes").show("slow");

        $("#div-acabados").show("slow");
        $("#subtitle-acabados").show("slow");

        // if(type_id == 1){
        //     $("#div-length").show("slow");

        //     showCaracteristicas(true);

        //     //creacion de validator para elementos de tipo "Tableros"
        //     validator_forTableros();
        // }else{
        //     $("#div-subacabados").hide("slow");

        //     $("#div-length").hide("slow");
        //     $("#length").val("");

        //     $("#acabado").val("").trigger("change");
        //     $("#sub_acabado").val("").trigger("change");

        //     showCaracteristicas(false);

        //     //creacion de validator para elementos de tipo "Tableros"
        //     validator_forTapacanto();
        // }
        showCaracteristicas(true);
        $("#div-length").show("slow");
        //creacion de validator para elementos de tipo "Tableros"
        validator_forTableros();
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

    // if(acabado_id == ""){
    //     $("#div-subacabados").hide("slow");
    //     $('#sub_acabado').append($('<option>', {
    //         value: 0,
    //         text: "-Seleccione-"
    //     }));
    // }else{


    // }    
})


var validator_forTapacanto = function(){
    var validator = $("#form_product").validate({
        rules:{
            cost:{
                required: true
            },
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
                required: true
            },
            acabado:{
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
            cost: "Por favor ingrese el costo",
            category: "Por favor seleccione la Categoria",
            type: "Por favor seleccione el Tipo",
            subtype: "Por favor seleccione el Sub-tipo",
            code: "Por favor ingrese el Código",
            name: "Por favor ingrese el Nombre",
            origen: "Por favor seleccione el Origen",
            acabado:"Por favor seleccione el Acabado",
            description: "Por favor ingrese la Descripción",
            image_alt: "Por favor ingrese el Texto Alternativo"
        },
        errorPlacement: function(error, element) {
            setErrorPlacement(error, element);
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
            cost:{
                required: true
            },
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
            cost: "Por favor ingrese el costo",
            category: "Por favor seleccione la Categoria",
            type: "Por favor seleccione el Tipo",
            subtype: "Por favor seleccione el Sub-tipo",
            code: "Por favor ingrese el Código",
            name:"Por favor ingrese el Nombre",
            origen:"Por favor seleccione el Origen",
            acabado:"Por favor seleccione el Acabado",
            material: "Por favor seleccione el Material",
            sustrato: "Por favor seleccione el Sustrato",
            color: "Por favor seleccione el Color",
            description: "Por favor ingrese la Descripción",
            image_alt: "Por favor ingrese el Texto Alternativo"
        },
        errorPlacement: function(error, element) {
            setErrorPlacement(error, element);
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
        errorPlacement: function(error, element) {
            setErrorPlacement(error, element);
        },
        submitHandler: function(form) {
            // $("#btnSave").prop("disabled", false);
            form.submit();
        }
    });

    GLOBAL_VALIDATOR = validator;
}

var onclick_addCategory = function(){
    var _category = $("#txtCategory").val();
    var _url = $("#hRouteAddCategory").val();
    var _data = {
        name : _category
    };
    Utils.hideAlert("msgCategoryModal")
    Utils.getData(_url, _token, _type, _data).then(function(result){
        if(result.result == true){
            var cate = result.data;
            Utils.addOptionToSelect("category", cate.id, cate.name, false);
            Utils.addOptionToSelect("modal_category_modal", cate.id, cate.name, false);
            $('#categoryModal').modal('hide');
            Utils.clearModal(['txtCategory'], 'msgCategoryModal')
            // Utils.setAlert(result.message, 'success', 'msgCategoryModal');
        }else{
            Utils.setAlert(result.message, 'warning', 'msgCategoryModal');
        }
    });
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
            $('#typeModal').modal('hide');
            Utils.clearModal(['txtType'], 'msgTypeModal');
            $("#type").val("").trigger("change")
            // Utils.setAlert(result.message, 'success', 'msgTypeModal');
        }else{
            Utils.setAlert(result.message, 'warning', 'msgTypeModal');
        }
    });
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
                type_id = parseInt($("#type").val());
                produc_subtypes.forEach(function(item){
                    if(type_id == parseInt(item.type_id)){
                        $('#subtype').append($('<option>', {
                            value: item.id,
                            text: item.name
                        }));
                    }
                });

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


