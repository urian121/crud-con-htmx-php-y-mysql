<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="CRUD con HTMX PHP y MySQL">
    <meta name="keywords" content="CRUD, HTMX, PHP, MySQL, Bootstrap">
    <meta name="author" content="Urian Viera - FullStack Developer">
    <title>CRUD con HTMX - PHP y MySQL</title>
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
                <h1 class="fw-bold text-center mb-5">
                    CRUD con <span class="color_primary">HTMX</span>
                    <span class="color_secondary">PHP y MySQL</span>
                </h1>

                <button
                    type="button"
                    hx-get="modales/modal_add_alumno.php"
                    hx-target="#modal_container"
                    hx-trigger="click"
                    class="btn btn-primary float-start mb-1">
                    Agregar
                    <i class="bi bi-plus-lg fw-bold"></i>
                </button>

                <!-- Contenedor para el modal -->
                <div id="modal_container"></div>

            </div>

            <?php
            require_once("settings/settings.php");
            require_once("settings/conn.php");
            include("actions/functions.php"); ?>

            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-striped table-hover" id="tabla-alumnos">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Email</th>
                                <th>Sexo</th>
                                <th>Curso</th>
                                <th>Hablas inglés</th>
                                <th>Estado</th>
                                <th>Fecha creación</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $alumnos = getListAlumnos($servidor);
                            foreach ($alumnos as $alumno) {
                            ?>
                                <tr id="alumno_<?php echo $alumno['id_alumno']; ?>">
                                    <th><?php echo $alumno['id_alumno']; ?></th>
                                    <td><?php echo $alumno['nombre']; ?></td>
                                    <td><?php echo $alumno['email']; ?></td>
                                    <td><?php echo $alumno['sexo']; ?></td>
                                    <td><?php echo $alumno['curso']; ?></td>
                                    <td>
                                        <span class="badge text-bg-<?php echo $alumno['habla_ingles'] === 'Sí' ? 'success' : 'danger'; ?>">
                                            <?php echo $alumno['habla_ingles'] === 'Sí' ? 'Sí' : 'No'; ?>
                                        </span>
                                    </td>
                                    <td>
                                        <div class="form-check form-switch">
                                            <input type="checkbox" 
                                                hx-post="actions/change_status_alumno.php" 
                                                hx-vals="js:{
                                                    id_alumno: '<?= $alumno['id_alumno'] ?>',
                                                    status: event.target.checked ? '1' : '0'
                                                }" 
                                                hx-target="#result_alumno_<?= $alumno['id_alumno'] ?>" 
                                                hx-trigger="change" 
                                                hx-swap="outerHTML"
                                                class="form-check-input" <?= $alumno['status'] === "1" ? 'checked' : '' ?>>
                                            <label for="result_alumno_<?= $alumno['id_alumno'] ?>" id="result_alumno_<?= $alumno['id_alumno'] ?>">
                                                    <?= $alumno['status'] === "1" ? '<i class="bi bi-person-fill-check text-success fs-5"></i>' : '<i class="bi bi-person-fill-lock text-danger fs-5"></i>' ?>
                                            </label>
                                        </div>
                                    </td>   
                                    <td><?php echo date('d-m-Y', strtotime($alumno['fecha_creacion'])); ?></td>
                                    <td>
                                        <div class="flex_btns">
                                            <a href="#"
                                                hx-get="modales/modal_view_alumno.php"
                                                hx-target="#modal_container"
                                                hx-swap="innerHTML"
                                                hx-vals='{"id": "<?php echo $alumno['id_alumno']; ?>"}'
                                                hx-trigger="click">
                                                <i class="bi bi-box-arrow-up-right"></i>
                                            </a>
                                            <a href="#"
                                                hx-get="modales/modal_update_alumno.php"
                                                hx-target="#modal_container"
                                                hx-swap="innerHTML"
                                                hx-vals='{"id": "<?php echo $alumno['id_alumno']; ?>"}'
                                                hx-trigger="click">
                                                <i class="bi bi-arrow-clockwise"></i>
                                            </a>
                                            <a
                                                href="#"
                                                hx-get="modales/modal_delete.php"
                                                hx-target="#modal_container"
                                                hx-swap="innerHTML"
                                                hx-vals='{"id": "<?php echo $alumno['id_alumno']; ?>"}'
                                                hx-trigger="click">
                                                <i class="bi bi-trash3"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
            <script src="https://unpkg.com/htmx.org@2.0.4" integrity="sha384-HGfztofotfshcF7+8n44JQL2oJmowVChPTg48S+jvZoztPfvwD79OC/LTtG6dMp+" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/toastjs-notifications@1.11.14/toast-notifications.min.js"></script>
            <script src="assets/js/home.js"></script>
    </body>

</html>