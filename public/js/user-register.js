$(function() {
    var previousCheckValue;
    // var _timezone = Intl.DateTimeFormat().resolvedOptions().timeZone.split("/")[1].replace("_", " ");

    // $("#clientAddress").val(_timezone);

    $("#chkClient").on("change", function(a,b,c){
        var _checked = this.checked;

        $(".container-hidden").animate({ height: "toggle"}, "slow",function(){
            if(_checked){
                $("#rolId option:eq(3)").prop('selected', true);
                document.getElementById("rif").focus();
            }else{
                document.getElementById("clientAddress").focus();
                var _rolId = $("#rolId").val();
                if(_rolId == 4){
                    $("#rolId option:eq(0)").prop('selected', true);
                }
            }

        });
    });

    $("#rolId").on("change", function(){
        var crrCheckValue = $("#chkClient")[0].checked;

        if(this.value == 4){
            Utils.trigger_chkClient(true);
            // $("#chkClient").prop("disabled", true);
        }else{
            // $("#chkClient").prop("disabled", false);
            if(crrCheckValue){
                Utils.trigger_chkClient(false);
            }
        }
    })

});