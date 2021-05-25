var $table = "";
var _idProduct = 0;
var _nameProduct = "";

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



