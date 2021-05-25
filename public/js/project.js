$(function(){
    $('#project_date').datepicker({
        format: "yyyy-mm-dd",
        language: "en",
        autoclose: true,
        startView: 2
    });

});

$("#proyectista").on("change", function(){
    var _value = parseInt(this.value);

    switch (_value) {
        case 1:
            // Modular Top
            // DIV
            listToHidden = [
                "div_client_name", 
                "div_project_date",
                "div_partner_company",
                "div_provider"
            ];
            hideFields(listToHidden);

            listToShow = [
                "div_client_name",
                "div_project_date"
            ];
            showFields(listToShow);

            // SPAN
            $("#span_description").html("*");

            break;
        case 2:
            // Aliado Comercial
            //DIV
            listToHidden = [
                "div_client_name",
                "div_project_date",
                "div_provider"
            ];
            hideFields(listToHidden);

            listToShow = [
                "div_partner_company"
            ];
            showFields(listToShow);

            //SPAN Others
            $("#span_description").html("");

            break;
        case 3:
            // Proveedor
            //DIV
            listToHidden = [
                "div_partner_company",
                "div_client_name",
                "div_project_date"
            ];
            hideFields(listToHidden);

            listToShow = [
                "div_provider"
            ];
            showFields(listToShow);

            //SPAN Others
            $("#span_description").html("");

            break;
    }

});

var hideFields = function(listFields){
    listFields.forEach(function(item){
        $("#" + item).addClass("d-none");
    });
}

var showFields = function(listFields){
    listFields.forEach(function(item){
        $("#" + item).removeClass("d-none");
    });
}
