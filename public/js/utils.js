var Utils = {
    GLOBAL_TAGS_IDs: new Array(),
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
                $('#stadium').selectpicker('refresh');
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
        var _data = {
            "hOptNewsletter": $("#hOptNewsletter").val(),
            "hTag_id": $("#hTag_id").val()
        }
        $.ajax({
            url: _url,
            headers: { 'X-CSRF-TOKEN': _token },
            type: 'POST',
            data: _data
        }).done(function(data){
            if(data.length > 0){
                var _url = $("#hRouteImage").val();
                var _urlPost = $("#hRoutePost").val();
                var _html = "";
                data.forEach(function(item){
                    _html += '<div class="container-newsletter box-shadow-mt" style="background-image: url(' + _url + '/' + item.name_img + ');">' +
                    '<div class="container-title">' + item.title +'</div>' +
                    '<div class="container-summary">' +
                    '<div class="border-top-title">&nbsp;</div>' +
                    '<span>' + item.summary +'</span>' +
                    '</div>' +
                    '<div class="container-boton">' +
                    '<input type="button" id="btnLeerMas" value="Leer más" class="btn btn-dark btn-leer-mas" onclick="displayInformation('+ item.id +', false)"/>' +
                    '</div>' +
                    '</div>';
                });
                $("#contentOtherPost").html(_html);
                $("#btnShowOtherPost").addClass("disabled");

            }
        }).fail(function(jqXHR, textStatus, errorThrown ){
            debugger
        });
    },
    onclick_addTag: function(){
        debugger
        var _tagName = $("#txtTagName").val();
        var _token = $("#token").val();
        var _route = $("#routeCurrent2").val();
        var _url = _route;

        var _data = {
            tagName: _tagName
        }

        $.ajax({
            url: _url,
            headers: { 'X-CSRF-TOKEN': _token },
            type: 'POST',
            data: _data
        }).done(function(data){
            if(data.result == true){
                var _html = Utils.getHtmlTag(data);
                Utils.addTag(_html);

                Utils.pushTagId(data.value);            

                $("#addMessage2").html("Tag agregado correctamente");
            }else{
                $("#addMessage2").html("El Tag <b>#" + data.text + "</b> ya existe!");
            }
        })
        .fail(function(jqXHR, textStatus, errorThrown ){
            debugger
        });
    },
    getHtmlTag: function(item){
        var _html = "<div class='div-tags' id='" + item.value + "' name='" + item.value + "'>#" + item.text +
                    "<button type='button' onclick=\"Utils.removeDiv(" + item.value + ")\"><span class='icon-close'></span></buttom>" +
                    "<div>";
        return _html;
    },
    addTag: function(_html){
        $("#content-div-tags").append(_html);
        $('.basicAutoComplete').autoComplete('clear');
    },
    pushTagId: function(id){
        Utils.GLOBAL_TAGS_IDs.push(id);
        Utils.updateHiddenFielTag(Utils.GLOBAL_TAGS_IDs);
    },
    removeTagId: function(id){
        var _idx = Utils.getIndex(id);
        Utils.GLOBAL_TAGS_IDs.splice(_idx, 1);
        Utils.updateHiddenFielTag(Utils.GLOBAL_TAGS_IDs);
    },
    isAdded: function(id){
        var _idx = Utils.getIndex(id);

        return _idx >= 0;
    },
    getIndex: function(id){
        return Utils.GLOBAL_TAGS_IDs.findIndex(item => item == id);
    },
    updateHiddenFielTag: function(_arrIDs){
        try {
            _arrIDs.reduce(function(prev_val, crr_value){ return prev_val + "," + crr_value })
            $("#HiddenFielTag").val(_arrIDs);
        } catch (error) {
            $("#HiddenFielTag").val('');
        }
    },
    initTags: function(){

        var _tagsId = JSON.parse($("#HiddenFielTag").val());

        _tagsId.forEach(function(item){
            var _html = Utils.getHtmlTag(item);
            Utils.addTag(_html);
            Utils.pushTagId(item.value);
        });

    },
    removeDiv: function(id){
        $("#" + id).remove();
        Utils.removeTagId(id);
    },
    getData: function(_url, _token, _type, _data){
        return $.ajax({
            url: _url,
            headers: { 'X-CSRF-TOKEN': _token },
            type: _type,
            data: _data
        }).done(function(data){

        })
        .fail(function(jqXHR, textStatus, errorThrown ){
            debugger
        });
    },
    addOptionToSelect: function(_component, _value, _name, _selected){
        var _sel = (_selected == true ) ? 'selected' : '';
        $("#" + _component).append("<option value='" + _value + "' " + _sel + ">" + _name + "</option>");
    },
    deleteOptionToSelect: function(_component, _value){
        $("#"+_component+" option[value='"+_value+"']").remove();
        
    },
    setAlert: function(message, type, id){
        
        switch(type){
            case 'success':
                $('#' + id).removeClass('alert-warning alert-danger');
                $('#' + id).addClass('alert-success');
                break;
            case 'danger':
                $('#' + id).removeClass('alert-success alert-warning');
                $('#' + id).addClass('alert-danger');
                break;
            case 'warning':
                $('#' + id).removeClass('alert-success alert-danger');
                $('#' + id).addClass('alert-warning');
                break;
        }
    
        $("#" + id).slideDown();
    
        $('#' + id).html(message);
    
    },
    hideAlert: function(id){
        $("#" + id).slideUp();
        $('#' + id).html('');
    },
    showMessage: function(id, message){
        $("#" + id).show('slow');
        $('#' + id).html(message);
    },
    clearModal: function(listInputs, alertId){
        Utils.hideAlert(alertId);
        // lista de inputs
        listInputs.forEach( item => {
            $("#"+item).val("");
        });
    },
    trigger_chkClient: function(checked){
    
        $("#chkClient").prop("checked", checked);
        $("#chkClient").trigger("change");
    
    } ,
    clearSelect: function(_component, isSelectpicker){
        $("#" + _component).empty();
        if(isSelectpicker){
            $('.selectpicker').selectpicker('refresh');
        }
    },
    onclick_downloadIDs: function(){
        var _url = $("#routeCurrent").val();
        var _token = $("#token").val();
        Utils.showMessage("messageFile", "La descarga del archivo se llevará a cabo en un instante.")
        // $("#messageFile").show("slow");
        // $("#messageFile").html();

        $.ajax({
            xhrFields: {
                responseType: 'blob',
            },
            url: _url,
            headers: { 'X-CSRF-TOKEN': _token },
            type: 'GET'
        }).done(function(data, status, xhr){

            var filename = xhr.getResponseHeader('content-disposition').split('filename=')[1].split(';')[0];

            // The actual download
            var blob = new Blob([data], {
                type: 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
            });
            var link = document.createElement('a');
            link.href = window.URL.createObjectURL(blob);
            link.download = filename;

            document.body.appendChild(link);

            link.click();
            document.body.removeChild(link);

            Utils.showMessage("messageFile", "Archivo descargado satisfactoriamente.")
            // $("").html();

        })
        .fail(function(jqXHR, textStatus, errorThrown ){
            debugger
        });
    },
    onclick_downloadTemplate: function(){
        debugger
        var _url = $("#routeCurrent2").val();
        var _token = $("#token").val();
        Utils.showMessage("messageFile", "La descarga del archivo se llevará a cabo en un instante.")

        $.ajax({
            xhrFields: {
                responseType: 'blob',
            },
            url: _url,
            headers: { 'X-CSRF-TOKEN': _token },
            type: 'GET'
        }).done(function(data, status, xhr){

            var filename = xhr.getResponseHeader('content-disposition').split('filename=')[1].split(';')[0];

            // The actual download
            var blob = new Blob([data], {
                type: 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
            });
            var link = document.createElement('a');
            link.href = window.URL.createObjectURL(blob);
            link.download = filename;

            document.body.appendChild(link);

            link.click();
            document.body.removeChild(link);

            Utils.showMessage("messageFile", "Archivo descargado satisfactoriamente.")
        })
        .fail(function(jqXHR, textStatus, errorThrown ){
            debugger
        });
    },
    truncarOracion(oracion, maxCaracteres) {
        if (oracion.length > maxCaracteres) {
          return oracion.substring(0, maxCaracteres) + "...";
        } else {
          return oracion;
        }
      }
    
}