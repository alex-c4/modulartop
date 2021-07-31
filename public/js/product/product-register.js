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

        $('#subtype').trigger("change");
    
        $("#div-subtypes").show("slow");

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

    }
})

$("#subtype").on("change", function(){
    var subtype_id = parseInt(this.value);

    if(subtype_id > 0){
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




