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
        var _total_img = (_children.length / 2) + 1;
        var _html = "<input type='file' id='image_" + _total_img + "' name='image_" + _total_img + "' accept='image/png, image/jpeg, image/jpg' class='form-control mt-2' placeholder='Imagen'>" + 
                    "<input maxlength='60' type='text' name='image_alt_" + _total_img + "' id='image_alt_" + _total_img + "' class='form-control mt-1' placeholder='Texto alternativo'>"; 
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

