var MAX_FILE_UPLOADS;

$.validator.addMethod("maxfileuploads", function(value, element) {
    // return this.optional(element) || (parseFloat(value) > 0);
    debugger
    return element.files.length <= MAX_FILE_UPLOADS;
}, "Excede de la cantidad máxima de archivos.");

var validator = function(){
    $("#form_import").validate({
        rules:{
            import_file:{
                required: true,
            }
        },
        messages: {
            import_file: "Por favor seleccione un archivo para importar."
        },
        errorPlacement: function(error, element) {
            setErrorPlacement_import(error, element);
        },
        submitHandler: function(form) {
            var disabled = true;
            var msg = 'Cargando...';
            disabledButton('btnSave', disabled, msg);
            form.submit();
        }
    });
}

var validator_images = function(){
    $("#form_import_images").validate({
        rules:{
            'import_images[]':{
                required: true,
                maxfileuploads: true
            }
        },
        messages: {
            'import_images[]': {
                required: 'Por favor seleccione un archivo para importar.'
            }
        },
        errorPlacement: function(error, element) {
            setErrorPlacement_import_images(error, element);
        },
        submitHandler: function(form) {
            // $("#btnSaveImg").prop("disabled", true);
            var disabled = true;
            var msg = 'Cargando...';
            disabledButton('btnSaveImg', disabled, msg);
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
var setErrorPlacement_import_images = function(error, element){
    if(element.attr("id") == "form_import_images"){
        error.insertBefore($('#errorDivImportImage'));
    }else{
        error.insertAfter(element);
    }
}

var disabledButton = function(btnId, isDisabled, btnText){
    document.querySelector(`#${btnId}`).innerText = btnText
    document.querySelector(`#${btnId}`).disabled = isDisabled;
    
}