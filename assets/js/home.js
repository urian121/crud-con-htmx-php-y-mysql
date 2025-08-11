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

/*
* El evento htmx:after-request se dispara justo después de que HTMX termina la petición al servidor, sin importar si fue exitosa o fallida,
* pero antes de que el contenido se inserte en el DOM.
*/
htmx.on("htmx:after-request", (event) => {
    // Si la petición vino de un formulario dentro de #modal_add_alumno
    if (event.target.closest("#modal_add_alumno form")) {
    // Si la petición fue exitosa → cierra el modal y muestra un toast de éxito.
    if (event.detail.successful) {
        bootstrap.Modal.getInstance(document.getElementById("modal_add_alumno")).hide();
        showToast.success("Alumno agregado exitosamente 🎉");
    } else {
        // Si falló → muestra un toast de error.
        showToast.error("Error al agregar");
    }
    }
});
