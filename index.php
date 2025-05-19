<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>CRUD con HTMX PHP y MySQL</title>
    <link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-icon">
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
        crossorigin="anonymous" />
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
    <link rel="stylesheet" href="assets/css/home.css">
</head>

<body>

    <div class="container text-center mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <h1 class="fw-bold text-center mb-5 color_secondary">CRUD con <span class="color_primary">HTMX</span> PHP y MySQL</h1>

                <button
                    type="button"
                    hx-get="modales/modal_add_alumno.html"
                    hx-target="#modal_container"
                    hx-trigger="click"
                    class="btn btn-primary float-start mb-1">
                    Agregar
                    <i class="bi bi-plus-lg fw-bold"></i>
                </button>

                <!-- Contenedor para el modal -->
                <div id="modal_container"></div>

            </div>
            <div class="col-md-12">
                <div class="table-responsive" id="table-responsive"
                    hx-get="actions/get_alumnos.php"
                    hx-trigger="load, reloadTable from:body"
                    hx-target="this">
                </div>
            </div>

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
            <script src="https://unpkg.com/htmx.org@2.0.4" integrity="sha384-HGfztofotfshcF7+8n44JQL2oJmowVChPTg48S+jvZoztPfvwD79OC/LTtG6dMp+" crossorigin="anonymous"></script>
            <script>
                // Initialize Bootstrap modals after HTMX loads content
                document.body.addEventListener('htmx:afterSwap', function(evt) {
                    // Verificar si el contenido cargado contiene un modal
                    if (evt.detail.target.id === 'modal_container') {
                        const modal = evt.detail.target.querySelector('.modal');
                        if (modal) {
                            const bootstrapModal = new bootstrap.Modal(modal);
                            bootstrapModal.show();
                        }
                    }
                });

                // Función para recargar la tabla después de agregar un alumno
                function recargarTabla() {
                    const tabla = document.querySelector('#table-responsive');
                    if (tabla) {
                        htmx.trigger(tabla, 'load');
                    }
                }
            </script>
</body>

</html>