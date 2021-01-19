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
                $('#stadium').selectpicker('refresh');
                $("#addMessage").html("Estadio agregado correctamente")
            }else{
                $("#addMessage").html("Hubo un error agregando la categoria")
            }
        })
        .fail(function(jqXHR, textStatus, errorThrown ){
            debugger
        });
    },
    onclick_VerOtrosPost: function(){
        var _route = $("#hOtherPost").val();
        var _url = _route;
        var _token = $("[name='_token']").val();
        $("#contentOtherPost").html("<h4>Cargando...</h4>");

        $.ajax({
            url: _url,
            headers: { 'X-CSRF-TOKEN': _token },
            type: 'POST'
        }).done(function(data){
            if(data.length > 0){
                var _url = $("#hRouteImage").val();
                var _urlPost = $("#hRoutePost").val();
                var _html = "";
                data.forEach(function(item){
                    _html += '<div class="single-blog-post">' +
                                '<div class="blog-pic">' +
                                '    <img src="' + _url + '/' + item.name_img + '" alt="">' +
                                '</div>' +
                                '<div class="blog-text">' +
                                '    <h4>' + item.title +'</h4>' +
                                '    <div class="blog-widget">' +
                                '        <div class="blog-info">' +
                                '        <img src="images/clock.png" alt="">' +
                                '            <span>' + item.created_at.split(" ")[0] +'</span><span class="mx-2">&bullet;' +
                                '        </div>' +
                                '       ' +
                                '    </div>' +
                                '    ' +
                                '    <p>' +
                                '        ' + item.summary + '...' +
                                '    </p>' +
                                '    <a href="' + _urlPost + '/' + item.id + '/' + item.url.replaceAll(" ", "-") + '" class="btn btn-primary btn-sm">Leer más</a>' +
                                '</div>' +
                                '</div>';
                });
                $("#contentOtherPost").html(_html);
                $("#btnShowOtherPost").addClass("disabled");

            }
        }).fail(function(jqXHR, textStatus, errorThrown ){
            debugger
        });
    }
}