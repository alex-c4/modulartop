
// var _url = $("#hUrlFillcombo").val();
var _token = $("#token").val();
var _type = "POST";

// $("#type").on("change", function(){
//     var _id = parseInt($("#type").val());
//     var _opt = 1;
//     var _data = {
//         id: _id,
//         opt: _opt
//     }
//     if( _id > 0){
//         Utils.getData(_url, _token, _type, _data).then(function(result){
//             var _list = $("#subcategory");
//             _list.html("");

//             result.forEach(item => {
//                 _list.append("<option value='" + item.id + "'>" + item.name + "</option>");
//             });
//         });
//     }
// });

// $("#subcategory").on("change", function(){
//     var _id = parseInt($("#subcategory").val());
//     var _opt = 2;
//     var _data = {
//         id: _id,
//         opt: _opt
//     }
//     if( _id > 0){
//         Utils.getData(_url, _token, _type, _data).then(function(result){
//             var _list = $("#clasification");
//             _list.html("");
//             result.forEach(item => {
//                 _list.append("<option value='" + item.id + "'>" + item.name + "</option>");
//             });
//         });
//     }
// });

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

$("#form_create_product").on("submit", function(){
    $("#btnSave").prop("disabled", true);
})
