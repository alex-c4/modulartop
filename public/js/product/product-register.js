// $("#form_create_product").on("submit", function(){
//     //$("#btnSave").prop("disabled", true);
// })

// var hide_divs = function(){
//     // div para combo de tipos
//     // $("#div-types").css("display", "none")
// }

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

    if(type_id == ""){

        $("#div-subtypes").hide("slow");
        $("#div-acabados").hide("slow");
        $("#div-subacabados").hide("slow");
        $("#subtitle-acabados").hide("slow");

        //length
        $("#div-length").hide("slow");
        $("#length").val("");

        showCaracteristicas(false);

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

        // if(type_id == 2){
        //     $("#div-subacabados").hide("slow");
        //     $("#div-length").hide("slow");
        //     $("#length").val("");

        //     $("#acabado").val("").trigger("change");
        //     $("#sub_acabado").val("").trigger("change");

        //     showCaracteristicas(false);

        //     //creacion de validator para elementos de tipo "Tableros"
        //     validator_forTapacanto();
        // }else{
        //     $("#div-length").show("slow");

        //     showCaracteristicas(true);

        //     //creacion de validator para elementos de tipo "Tableros"
        //     validator_forTableros();
        // }
        $("#div-length").show("slow");
        showCaracteristicas(true);
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
        $("#code").val("");
        $("#name").val("");
        $("#cantinit").val("0");
    }
})

$("#acabado").on("change", function(){
    var acabado_id = (this.value != "") ? parseInt(this.value) : this.value;

    $("#sub_acabado").html("");

    if(acabado_id == ""){
        $("#div-subacabados").hide("slow");
        $('#sub_acabado').append($('<option>', {
            value: 0,
            text: "-Seleccione-"
        }));
    }else{
        produc_subacabados.forEach(item => {
            if(item.id_acabado == acabado_id){
                $('#sub_acabado').append($('<option>', {
                    value: item.id,
                    text: item.name
                }));
            }
        });
        
        $("#div-subacabados").show("slow");


    }
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
            acabado:"Por favor seleccione el Acabado",
            width: "Por favor ingrese el Ancho",
            thickness: "Por favor ingrese el Espesor",
            description: "Por favor ingrese la Descripción",
            image_0: "Por favor seleccione la Imagen Principal",
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

$('#CategoryDeleteModal').on('shown.bs.modal', function () {
    Utils.hideAlert("msgCategoryDelete");
    // $('#myInput').trigger('focus');
    
    var _catId = $("#category").val();
    if(_catId === ''){
        $('#msgCategory').html('Debe seleccionar la categoria de la lista a eliminar.')
        $("#btnDelete").prop('disabled', true);
    }else{
        var _categoryName = $('select[name="category"] option:selected').text();
        $('#msgCategory').html('¿Desea eliminar la categoria <b>'+_categoryName+'</b> de la lista?')
        $("#btnDelete").prop('disabled', false);
    }
});

var onclick_deleteCategory = function(){


    var _catId = $("#category").val();
    var _url = $("#hRouteDeleteCategory").val();
    var _data = {
        id : _catId
    };

    Utils.getData(_url, _token, _type, _data).then(function(result){

        if(result.result == true){
            Utils.deleteOptionToSelect("category", _catId);
            Utils.deleteOptionToSelect("modal_category_modal", _catId);
            $('#category option:first').prop('selected', true);
        
            $("#type").html("");
            $("#modal_type").html("");
        
            $("#div-types").hide("slow");
        
            $('#type').append($('<option>', {
                value: "",
                text: "-Seleccione-"
            }));

            $('#msgCategory').html('')
            Utils.setAlert(result.message, 'success', 'msgCategoryDelete');
        }else{
            Utils.setAlert(result.message, 'warning', 'msgCategoryDelete');
        }
        
        $("#btnDelete").prop('disabled', true);
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
            Utils.clearModal(['txtType'], 'msgTypeModal')
            // Utils.setAlert(result.message, 'success', 'msgTypeModal');
        }else{
            Utils.setAlert(result.message, 'warning', 'msgTypeModal');
        }
    });
}

$('#typeDeleteModal').on('shown.bs.modal', function () {
    Utils.hideAlert("msgTypeDelete");
    
    var _typeId = $("#type").val();
    if(_typeId === ''){
        $('#msgType').html('Debe seleccionar un tipo de la lista a eliminar.')
        $("#btnDeleteTypeModal").prop('disabled', true);
    }else{
        var _typeName = $('select[name="type"] option:selected').text();
        $('#msgType').html('¿Desea eliminar el tipo <b>'+_typeName+'</b> de la lista?')
        $("#btnDeleteTypeModal").prop('disabled', false);
    }
});

var onclick_deleteType = function(){
    var _typeId = $("#type").val();
    var _url = $("#hRouteDeleteType").val();
    var _data = {
        id : _typeId
    };
    Utils.getData(_url, _token, _type, _data).then(function(result){
        
        if(result.result == true){
            Utils.deleteOptionToSelect("type", _typeId);
            // eliminar del arreglo global
            produc_types = produc_types.filter( i => i.id != _typeId)

            $('#type option:first').prop('selected', true);
        
            $("#subtype").html("");
            $("#modal_subtype").html("");
        
            $("#div-subtype").hide("slow");
        
            $('#subtype').append($('<option>', {
                value: "",
                text: "-Seleccione-"
            }));

            $('#msgType').html('')
            Utils.setAlert(result.message, 'success', 'msgTypeDelete');
        }else{
            Utils.setAlert(result.message, 'warning', 'msgTypeDelete');
        }

        $("#btnDeleteTypeModal").prop('disabled', true);
    })

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
$('#subtypeDeleteModal').on('shown.bs.modal', function () {
    Utils.hideAlert("msgSubtypeDelete");
    
    var _subtypeId = $("#subtype").val();
    if(_subtypeId === ''){
        $('#msgSubtype').html('Debe seleccionar un sub-tipo de la lista a eliminar.')
        $("#btnDeleteSubtypeModal").prop('disabled', true);
    }else{
        var _subtypeName = $('select[name="subtype"] option:selected').text();
        $('#msgSubtype').html('¿Desea eliminar el sub-tipo <b>'+_subtypeName+'</b> de la lista?');
        $("#btnDeleteSubtypeModal").prop('disabled', false);
    }
});
var onclick_deleteSubtype = function(){
    var _subtypeId = $("#subtype").val();
    var _url = $("#hRouteDeleteSubtype").val();
    var _data = {
        id : _subtypeId
    };
    Utils.getData(_url, _token, _type, _data).then(function(result){
        if(result.result == true){
            Utils.deleteOptionToSelect("subtype", _subtypeId);
            $('#subtype option:first').prop('selected', true);
        
            // $("#subtype").html("");
            // $("#modal_subtype").html("");
        
            // $("#div-subtype").hide("slow");
        
            // $('#subtype').append($('<option>', {
            //     value: "",
            //     text: "-Seleccione-"
            // }));

            $('#msgSubtype').html('')
            Utils.setAlert(result.message, 'success', 'msgSubtypeDelete');
        }else{
            Utils.setAlert(result.message, 'warning', 'msgSubtypeDelete');
        }

        $("#btnDeleteSubtypeModal").prop('disabled', true);
    })

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

                });

                $("#material").val("").trigger("change");
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

