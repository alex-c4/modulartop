var validator = function(){
    $("#form_import").validate({
        rules:{
            import_file:{
                required: true
            }
        },
        messages: {
            import_file: "Por favor seleccione un archivo para importar."
        },
        errorPlacement: function(error, element) {
            setErrorPlacement_import(error, element);
        },
        submitHandler: function(form) {
            form.submit();
        }
    });
}

var setErrorPlacement_import = function(error, element){
    if(element.attr("id") == "import_file"){
        error.insertBefore($('#errorDivImport'));
    }else{
        error.insertAfter(element);
    }
}