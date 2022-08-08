var GLOBAL_TOKEN = $("#token").val();
var GOBAL_URLROOT = $("#hRouteWelcome").val();

var attend_order = function(ev, idOrderSale){
    ev.preventDefault();
    console.log(idOrderSale);

    var _url = $("#hRouteAttendFromHome").val();
    var _token = GLOBAL_TOKEN;
    var _type = "POST";
    var _idOrdersale = idOrderSale;

    var _data = {
        idOrderSale: _idOrdersale
    };

    Utils.getData(_url, _token, _type, _data).then(function(result){
        debugger
        var _datos = result.orders;
        
        if(result.result){
            var html = renderHtml(result, _datos);
            $("#divTableOrders").html(html);
        }

        
    })
    .fail(function(qXHR, textStatus, errorThrown){
        debugger
        console.log(qXHR);
    })
}

var getUrl = function(module, id){
    return GOBAL_URLROOT + '/ordersale/' + module + '/' + id;
}

var getToken = function(){
    return $("#token").val();
}

var cancel_order = function(ev, idOrderSale){
    ev.preventDefault();
    var _url = $("#hRouteCancelFromHome").val();
    var _token = GLOBAL_TOKEN;
    var _type = "POST";
    var _idOrdersale = idOrderSale;
    var _data = {
        idOrderSale: _idOrdersale
    };

    Utils.getData(_url, _token, _type, _data).then(function(result){
        var _data = result.orders;
        if(result.result){
            var html = renderHtml(result, _data);
            $("#divTableOrders").html(html);
        }
    })

}

var renderHtml = function(result,_data){
    var _html = "";

    $("#divTableOrders").html("");

    $("#cantOrders").html(result.totalOrders);

    _html += '<table class="table table-sm">' +
            '   <thead>' +
            '       <tr>' +
            '           <th >ID</th>' +
            '           <th >Fecha de creación</th>' +
            '           <th ></th>' +
            '       </tr>' +
            '   </thead>' +
            '   <tbody>';

    _data.forEach(order => {
        _html += '<tr>' +
                    '  <th scope="row">' + order.id + '</th>' +
                    '  <td>' + order.created_at + '</td>' +
                    '  <td>' + order.userName + ' ' + order.userLastName + '</td>' +
                    '  <th class="icons-orders">';
        if(order.status == 2){
            _html += '<a href="#" title="Atender" onclick="attend_order(event, ' + order.id + ')"><span class="icon-square-o"></span></a>';
        }else if(order.status == 3){
            _html += '<form id="formOrderProcess_' + order.id + '" action="' + getUrl('process', order.id) + '" method="post">' +
                    '<input type="hidden" name="_token" id="token" value="' + getToken() + '">' +
                    '<a href="#" title="Procesar" onclick="document.getElementById(\'formOrderProcess_' + order.id + '\').submit()"><span class="icon-check m-1"></span></a>' +
                    '</form>';
            
            _html += '<a href="#" title="Cancelar orden" onclick="cancel_order(event, ' + order.id + ')"><span class="icon-remove"></span></a>';

            var _html_2 = '<form id="formOrderCancel_' + order.id + '" action="' + getUrl('delete', order.id) + '" method="post">' +
                    '<input type="hidden" name="_token" id="token" value="' + getToken() + '">' +
                    '<a href="#" title="Cancelar orden" onclick="document.getElementById(\'formOrderCancel_' + order.id + '\').submit()"><span class="icon-remove"></span></a>' +
                    '</form>';
        }
                    
        _html += '  </th>' +
                '<tr>';
    });

    _html += '</tbody>' +
                '</table>';

    return _html;
}

var update_usuario = function(ev, userId, option){
    ev.preventDefault();
    var _url = $("#hRouteUserUpdateFromHome").val();
    var _token = GLOBAL_TOKEN;
    var _type = "POST";
    
    var _data = {
        id: userId,
        option: option
    };

    Utils.getData(_url, _token, _type, _data).then(function(result){
        var _data = result.users;
        if(result.result){
            debugger
            var html = renderHtmlUser(result, _data);
            $("#divTableUsers").html(html);
        }
    })
}

var renderHtmlUser = function(result, _data){
    var _html = "";
    $("#divTableUsers").html("");
    $(".cantNews").html(result.totalUsers);

    _html += '<table class="table table-sm text-sm">' +
                '<thead>' +
                '    <tr>' +
                '        <th scope="col">#</th>' +
                '        <th scope="col">Cliente</th>' +
                '        <th scope="col">Razón social</th>' +
                '        <th scope="col">Tipo de cliente</th>' +
                '        <th scope="col"></th>' +
                '    </tr>' +
                '</thead>' +
                '<tbody>';

    var key = 0;
    _data.forEach(user => {
        _html += '<tr>'+
                '    <th scope="row">' + (key += 1) + '</th>' +
                '    <td>' + user.name + ' ' + user.lastName + '</td>' +
                '    <td>' + user.razonSocial + '</td>' +
                '    <td>' + user.client_type_name + '</td>' +
                '    <td class="icons-orders">' +
                '        <a href="#" title="Validar usuario" onclick="update_usuario(event, ' + user.id + ', 1)"><span class="icon-check"></span></a>' +
                '        <a href="#" title="Rechazar usuario" onclick="update_usuario(event, ' + user.id + ', 0)"><span class="icon-close"></span></a>' +
                '    </td>' +
                '<tr>';
    });

    _html += '</tbody>' +
            '</table>';

    return _html;
}
