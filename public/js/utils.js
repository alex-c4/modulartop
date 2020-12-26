var Utils = {
    onclick_addCategory: function(){
        var _categoryName = $("#txtCategoryName").val();
        var _token = $("#token").val();
        var _route = $("#routeCurrent").val();
        var _url = _route;
    
        var _data = {
            categoryName: _categoryName
        }

        $.ajax({
            url: _url,
            headers: { 'X-CSRF-TOKEN': _token },
            type: 'POST',
            data: _data
        }).done(function(data){
            if(data.id > 0){
                $('#category').append($('<option>', {
                    value: data.id,
                    text: data.name,
                    selected: "selected"
                }));
                $("#addMessage").html("Categoria agregada correctamente")
            }else{
                $("#addMessage").html("Hubo un error agregando la categoria")
            }
        })
        .fail(function(jqXHR, textStatus, errorThrown ){
            debugger
        });
    }
}