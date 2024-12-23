var _token = $("#token").val();
var _type = "POST";

var displayInformation = function(id, isHeader){
    var _url = $("#hShowNewsletterById").val();
    var _data = {
        id
    };
    Utils.getData(_url, _token, _type, _data).then(function(result){
        var _path = window.location.origin;

        if(result.result == true){
            if(!isHeader){
                $("#title-ult-nov").html(result.data.title);
                $('html, body').animate({
                    scrollTop: $(".contenedor-ultima-novedad").offset().top
                }, 1500);
                $('#imgHeaderNewsletter').attr('src', _path+'/images/newsletters/' + result.data.name_img)
            }

            $("#sumarry-ult-nov").html(result.data.content);
            $('#btnLeerMas').hide();

        }else{
            console.error(result)
        }
    });
}