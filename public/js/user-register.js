$(function() {
    var previousCheckValue;
    var _timezone = Intl.DateTimeFormat().resolvedOptions().timeZone.split("/")[1].replace("_", " ");

    $("#clientAddress").val(_timezone);

    $("#chkClient").on("change", function(a,b,c){
        var _checked = this.checked;
        $(".container-hidden").animate({ height: "toggle"}, "slow",function(){
            if(_checked){
                document.getElementById("rif").focus();
            }else{
                document.getElementById("clientAddress").focus();
            }

        });
    });

    $("#rolId").on("change", function(){
        console.log("cambio")
        var crrCheckValue = $("#chkClient")[0].checked;

        if(this.value == 4){
            if(!crrCheckValue){
                $("#chkClient").prop("checked", true);
                $("#chkClient").trigger("change");
            }
        }

    })
});