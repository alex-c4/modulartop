var _token = $("#token").val();
  var _type = "POST";

  var onclick_sendEmail = function(){
    $("#btnSendEmail").prop("disabled", true);
    $("#btnCancelSendEmail").prop("disabled", true);

    var _email = $("#txtEmail").val();
    var _url = $("#hRouteAddEmail").val();
    var _data = {
      txtEmail : _email,
      hAliado: $('#hAliado').val()
    };
    Utils.getData(_url, _token, _type, _data).then(function(result){
      if(result.result == true){
        $("#txtEmail").val("");
        Utils.setAlert(result.message, 'success', 'msgEmailModal');
        let aLink = document.createElement('a');
        aLink.href = `${result.file_url}/${result.file_name}`;
        aLink.target = '_blank';
        aLink.download = result.file_name;
        document.body.appendChild(aLink);
        aLink.click();
        document.body.removeChild(aLink)

      }else{
        Utils.setAlert(result.message, 'warning', 'msgEmailModal');
      }
      
      $("#btnSendEmail").prop("disabled", false);
      $("#btnCancelSendEmail").prop("disabled", false);
    }).fail(e => {
      $("#btnSendEmail").prop("disabled", false);
      $("#btnCancelSendEmail").prop("disabled", false);
    });
  } 

  $('#form_send_contact_info').submit(function() {
    // var _valrecaptcha = $("#g-recaptcha-response").val();
    $('#btnSendContactInfo').val("Enviando...");
    $('#btnSendContactInfo').attr("disabled", true);

    // if((_valrecaptcha == "") || (_valrecaptcha == undefined)){
    //     $('#alertregister').slideDown();
    //     $('#btnSendContactInfo').attr("disabled", false);
    //     $('#btnSendContactInfo').val("Enviar");
    //     return false;
    // }else{
    //     return true;
    // }

    return true;
  });
  
  // $(function () {
    
  // });

  // $("#g-recaptcha-response").on("click", function(){
  //     $('#alertregister').slideUp()
  // });

  // var recaptchaCallback = function(){
  //     $('#alertregister').slideUp()
  // };
  
  onclick_img = function(aliadoId){
    if(aliadoId == null){
      Utils.setAlert("El aliado comercial seleccionado no posee aún un catálogo cargado en el sistema.", 'warning', 'msgEmailModal');
    }else{
      $('#hAliado').val(aliadoId)
    }
  }
      
  $("#catalogLeadModal").on('show.bs.modal', function (event) {
    var image = $(event.relatedTarget) // image that triggered the modal
    var recipient = image.data('aliado') // Extract info from data-* attributes
    var modal = $(this);
    
    modal.find('#hAliado').val(recipient)
    // modal.find('.modal-title').text('New message to ' + recipient)
  });

    // toogleModal = function(){
    //     $("#newsletterModal").modal('toggle');
    // }

  setTimeout(() => {
    const _isContact = sessionStorage.getItem('saveContactMT');
    if(_isContact != 'ok') $('#newsletterModal').modal('show')
  }, 500);

sendContact = function(){
    var fname = $("#fnameM").val();
    var email= $("#emailM").val();
    var hform= $("#hformM").val();
    var _url = $("#hRouteAddContact").val();
    var _token = $("#token").val();
    var _type = "POST";
    var _data ={ 
        fname, 
        hform,
        emailnews4: email
    };

    // console.log(fname, email, _url, hform);
    Utils.getData(_url, _token, _type, _data).then(function(result){
        if(result.success == true){
            $('#newsletterModal').modal('hide');
            Utils.setAlert(result.message, 'success', 'msgNewsletterModal');
            
            setTimeout(() => {
                Utils.clearModal(['fnameM','emailM'], null);
            }, 800);
        }else{
            Utils.setAlert(result.message, 'warning', 'msgNewsletterModal');
        }
    });
    
}

$('#newsletterModal').on('hide.bs.modal', function (event) {
    sessionStorage.setItem('saveContactMT', 'ok');
});