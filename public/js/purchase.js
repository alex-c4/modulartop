var $table = "";
var _idProduct = 0;
var _nameProduct = "";
var arr = ["code", "name", "description", "image_0", "price"];

$(function(){
    $('#purchase_date').datepicker({
        format: "yyyy-mm-dd",
        language: "en",
        autoclose: true,
        startView: 2
    });

    $table = $('#purchase-table');
    $table.bootstrapTable('destroy').bootstrapTable({
        locale: "es-ES"
    });

});

var onclick_addProvider = function(){
    var _url = $("#hRouteProvider").val();
    var _token = $("#token").val();
    var _type = "POST";
    var _name = $("#txtProviderName").val();
    debugger
    var _data = {
        name: _name  
    };

    Utils.getData(_url, _token, _type, _data).then(function(result){
        $("#txtProviderName").val("");
        $("#provider").append("<option value='" + result.id + "' selected>" + result.name + "</option>")
    })
    .fail(function(qXHR, textStatus, errorThrown){
        console.log(qXHR);
    })
    
}

var onclick_addProduct = function(){
    debugger
    var _quantity = $("#quantity").val();
    var _row = new Array();
    var _data = $table.bootstrapTable('getData');

    if(isRepeated(_idProduct, _data)){
        alert("Producto Repetido!")
    }else if(_idProduct != 0 || _nameProduct != ""){
        _row.push({
            id: _idProduct,
            name: _nameProduct,
            quantity: _quantity
        });
        $table.bootstrapTable('append', _row);

        window.document.getElementById("quantity").focus();

        // _idProduct = 0;
        // _nameProduct = "";
        // $("#amount").val("");

    }

}

var onchage_product = function(obj){
    _idProduct =  parseInt(obj[obj.selectedIndex].value);
    _nameProduct = obj[obj.selectedIndex].text;
}

window.operateEvents = {
    'click .remove': function (e, value, row, index) {
      $table.bootstrapTable('remove', {
        field: 'id',
        values: [row.id]
      })
    }
  }

function operateFormatter(value, row, index) {
    return [
        '<a class="remove" href="javascript:void(0)" title="Eliminar">',
        '<span class="icon-trash" ></span>',
        '</a>'
    ].join('')
}

var remove_item = function(item){
    console.log()
}

var isRepeated = function(id, _data){

    var _idx = _data.findIndex(function(item){ return item.id == id});

    return _idx >= 0;
}

var FLAG_SEND = false;
$("#btnSave").on("click", function(){
    if(!FLAG_SEND){
        FLAG_SEND = true;
        $("#btnSave").prop("disabled", true);
    
        var _data = $table.bootstrapTable('getData');
        var cadena = JSON.stringify(_data);
        $("#hProducts").val(cadena);
        debugger
        $("#form_savepurchase").trigger("submit");

    }

});


$("#form_create_product").on("submit", function(ev){
    debugger
    ev.preventDefault();
    $("#btnSaveProduct").prop("disabled", true);

    var formData = new FormData(document.getElementById("form_create_product"));

    var _route = $(this).attr('action');

    var _token = $("#token").val();

    if(validationFormAddProduct()){
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
            $("#btnSaveProduct").prop("disabled", false);

            data = JSON.parse(result);
            if(data[0].result){
                $("#productList").append("<option value='" + data[0].data[0].id + "'>" + data[0].data[0].name + "</option>")
                resetField();
            }
            
            showAlert(data[0].result, data[0].msgPost);
            
        })
        .fail(function(jqXHR, textStatus, errorThrown ){  
            showAlert(false, "Hubo un error en la petición, por favor vuelva a intentarlo");
            $("#btnSaveProduct").prop("disabled", false);
            console.log(jqXHR.responseJSON.errors);
        })
    }else{
        $("#btnSaveProduct").prop("disabled", false);
    }
})

var validationFormAddProduct = function(){
    clearFields();
    isValid = true;

    arr.forEach(function(item){
        if($("#" + item).val() == ""){
            // isValid = false;
            $("#" + item).addClass("is-invalid");
            $("#" + item + "-msg").css("display", "initial");
            document.getElementById(item).focus();
            isValid = false;
        }
    });

    return isValid;
}

var clearFields = function(){
    arr.forEach(function(item){
        $("#" + item).removeClass("is-invalid");
        $("#" + item + "-msg").css("display", "none");
    });

}

var showAlert = function(status, message){
    var _msg = "", _class = "";
    if(status){
        _msg = message;
        _class = 'success'
    }else{
        _msg = 'Hubo un error';
        _class = 'success'

    }
    $("#message_alert").html("");
    var _html = '<div class="alert alert-' + _class + ' alert-dismissible fade show" role="alert">' +
                _msg +
                '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
                '    <span aria-hidden="true">&times;</span>' +
                '</button>' +
                '</div>';
    
    $("#message_alert").html(_html);
    
}

var resetField = function(){
    arr.forEach(function(item){
        $("#" + item).val("");
    });

    $("#pdf_file").val("");

    $("#container-img").html("");
    var _inputFile = '<input type="file" id="image_1" name="image_1" accept="image/png, image/jpeg, image/jpg" class="form-control mt-2" placeholder="Imagen">';
    $("#container-img").html(_inputFile);

}

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


