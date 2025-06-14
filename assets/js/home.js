// Inicializar los modales después de que HTMX cargue el contenido
htmx.on("htmx:afterSwap", function(evt) {
    // Verificar si el contenido cargado contiene un modal
    if (evt.detail.target.id === 'modal_container') {
        const modal = evt.detail.target.querySelector('.modal');
        if (modal) {
            const bootstrapModal = new bootstrap.Modal(modal);
            bootstrapModal.show();
        }
    }
});


// evento que se dispara después de que HTMX ha completado completamente una solicitud HTTP.
htmx.on("htmx:after-request", (event) => {
    if (event.target.closest("#modal_add_alumno form")) {
    if (event.detail.successful) {
        bootstrap.Modal.getInstance(document.getElementById("modal_add_alumno")).hide();
        showToast.success("Alumno agregado exitosamente 🎉");
    } else {
        showToast.error("Error al agregar");
    }
    }
});