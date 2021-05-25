var attend_order = function(ev, idOrderSale){
    ev.preventDefault();
    console.log(idOrderSale);

    var _url = $("#hRouteAttendFromHome").val();
    var _token = $("#token").val();
    var _type = "POST";
    var _idOrdersale = idOrderSale;

    var _data = {
        idOrderSale: _idOrdersale
    };

    Utils.getData(_url, _token, _type, _data).then(function(result){
        debugger
        var _html = ""
        var _data = result.orders;
        
        if(result.result){
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
                         '  <th>' +
                         '      <a href="#" title="Atender" onclick="attend_order(event, ' + order.id + ')"><span class="icon-square-o"></span></a>' +
                         '  </th>' +
                         '<tr>';
            });

            _html += '</tbody>' +
                     '</table>';

            $("#divTableOrders").html(_html)
        }

        
    })
    .fail(function(qXHR, textStatus, errorThrown){
        debugger
        console.log(qXHR);
    })
}