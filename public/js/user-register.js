$(function() {
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
});