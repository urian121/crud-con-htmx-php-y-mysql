/*
* El evento htmx:afterSwap en HTMX se dispara justo después de que el contenido devuelto por el servidor ya fue insertado (swapeado) en el DOM.
* Aquí el evento htmx:afterSwap para detectar cuándo HTMX acaba de insertar contenido nuevo y ese contenido corresponde a un modal de Bootstrap.
*/
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
