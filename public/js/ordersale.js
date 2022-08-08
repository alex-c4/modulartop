$("#form_ordersale").on("submit", function(ev){
    
    // ev.preventDefault();

    try {
        $("#btnSave").prop("disabled", true);
        $("#btnSave").html("Cargando...")
        
    } catch (error) {
        $("#btnSave").html("Crear orden")
        $("#btnSaveClient").prop("disabled", false);
    }
})