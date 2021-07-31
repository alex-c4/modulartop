var $table = "";
var _idProduct = 0;
var _nameProduct = "";
var GLOBAL_VALIDATION = null;
var message = "Validando existencia del producto...";

$(function(){
    $('#sale_date').datepicker({
        format: "yyyy-mm-dd",
        language: "en",
        autoclose: true,
        startView: 2
    });

    $table = $('#product_table');
    $table.bootstrapTable('destroy').bootstrapTable({
        locale: "es-ES"
    });

    makeValidation();

});

$("#btnSave").on("click", function(){
    $("#btnSave").prop("disabled", true);
    
    var _data = $table.bootstrapTable('getData');
    var cadena = JSON.stringify(_data);
    $("#hProducts").val(cadena);

    $("#form_savesale").trigger("submit");

});

var onclick_addProduct = function(){
    var _quantity = $("#quantity").val();
    var _row = new Array();

    var _url = $("#hRouteValidateInventory").val();
    var _token = $("#token").val();
    var _type = "POST";
    var _dataForm = {
        product_id: _idProduct,
        quantity: parseInt(_quantity)  
    };

    var _data = $table.bootstrapTable('getData');

    if(isRepeated(_idProduct, _data)){

        alert("Producto Repetido!");

    }else if(_idProduct != 0 || _nameProduct != ""){

        $("#btnAddProduct").prop("disabled", true);
        $("#smallInfo").html(message);

        Utils.getData(_url, _token, _type, _dataForm).then(function(resp){
            if(resp.result == true){
                _row.push({
                    id: _idProduct,
                    name: _nameProduct,
                    quantity: _quantity
                });
                $table.bootstrapTable('append', _row);
                
                $("#smallInfo").html("");
                
                window.document.getElementById("quantity").focus();
            }else{
                $("#smallInfo").html(resp.message);
            }

            $("#btnAddProduct").prop("disabled", false);
        })
        .fail(function(qXHR, textStatus, errorThrown){
            $("#btnAddProduct").prop("disabled", false);
            console.log(qXHR);
        })

    }

}

var onchage_product = function(obj){
    _idProduct =  parseInt(obj[obj.selectedIndex].value);
    _nameProduct = obj[obj.selectedIndex].text;
}

var isRepeated = function(id, _data){

    var _idx = _data.findIndex(function(item){ return item.id == id});

    return _idx >= 0;
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

var onclick_addClient = function(){

    if(isValid){
        document.getElementById("form_client").submit();
    }
    
}

$("#form_client").on("submit", function(ev){
    
    ev.preventDefault();

    $("#btnSaveClient").prop("disabled", true);

    var formData = new FormData(document.getElementById("form_client"));

    var _route = $(this).attr('action');

    var _token = $("#token").val();

    var isValid = GLOBAL_VALIDATION.form();
    if(isValid){
        $.ajax({
            url: _route,
            dataType: "html",
            contentType: false,
            headers: { 'X-CSRF-TOKEN': _token },
            type: 'POST',
            data: formData,
            processData: false
        })
        .done(function(resp){
            debugger
            $("#btnSaveClient").prop("disabled", false);
            
            var data = JSON.parse(resp);
            
            if(data.result == true){
                $('#client').append($('<option>', {
                    value: data.data.id,
                    text: data.data.name + " " + data.data.lastName
                }));
    
                clearFields();
    
                showAlert(true, data.message);
            }else{
                showAlert(false, data.message);
            }
        })
        .fail(function(jqXHR, textStatus, errorThrown ){  
            debugger
            showAlert(false, data.message)
        });

    }else{
        $("#btnSaveClient").prop("disabled", false);
    }

})

var makeValidation = function(){
    var validation = $("#form_client").validate({
        rules: {
            name:{
                required: true
            },
            lastName:{
                required: true
            },
            email:{
                required: true,
                email: true
            },
            clientPhone:{
                required: true
            },
            clientAddress:{
                required: true
            },
            rif:{
                required: true
            },
            rsocial:{
                required: true
            },
            companyAddress:{
                required: true
            },
            companyPhone:{
                required: true
            }
        },
        messages: {
            name: "Por favor ingrese el Nombre",
            lastName: "Por favor ingrese el Apellido",
            email: {
                required: "Por favor ingrese el Correo Electrónico",
                email: "Por favor ingrese un Correo Electrónico valido"
            },
            clientPhone: "Por favor ingrese el Teléfono",
            clientAddress: "Por favor ingrese la Dirección",
            rif: "Por favor ingrese el RIF",
            rsocial: "Por favor ingrese la Razón Social",
            companyAddress: "Por favor ingrese la Dirección Fiscal",
            companyPhone: "Por favor ingrese el Teléfono"
        }
    });

    GLOBAL_VALIDATION = validation;
}

var clearFields = function(){
    $("#name").val("");
    $("#lastName").val("");
    $("#email").val("");
    $("#clientPhone").val("");
    $("#clientAddress").val("");
    $("#rif").val("");
    $("#rsocial").val("");
    $("#companyAddress").val("");
    $("#companyPhone").val("");
}

var showAlert = function(status, message){
    var _msg = "", _class = "";
    if(status){
        _msg = message;
        _class = 'success'
    }else{
        _msg = message;
        _class = 'warning'

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

$("#client").on("change", function(){
    var _userId = this.value;

    $('#id_order_sale').html("");

    $('#id_order_sale').append($('<option>', {
        value: 0,
        text: "-Seleccione-"
    }));

    if(_userId != "0"){
        order_sales.forEach(order => {
            if(_userId == order.userId){
                $('#id_order_sale').append($('<option>', {
                    value: order.orderSaleId,
                    text: order.orderSaleId + " " + order.userName + " " + order.userLastName + " " + order.orderSaleCreatedAt
                }));
            }
        });
    }

});

