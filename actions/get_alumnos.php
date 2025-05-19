<?php
require_once("../settings/settings.php");
require_once("../settings/conn.php");
include("../actions/functions.php"); ?>
<table class="table table-striped table-hover" id="tabla-alumnos">
    <thead>
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Sexo</th>
            <th>Curso</th>
            <th>Hablas inglés</th>
            <th>Fecha creación</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $alumnos = getAlumnos($servidor);
        foreach ($alumnos as $alumno) {
        ?>
            <tr>
                <th><?php echo $alumno['id_alumno']; ?></th>
                <td><?php echo $alumno['nombre']; ?></td>
                <td><?php echo $alumno['email']; ?></td>
                <td><?php echo $alumno['sexo']; ?></td>
                <td><?php echo $alumno['curso']; ?></td>
                <td>
                    <span class="badge text-bg-<?php echo $alumno['habla_ingles'] === 'Sí' ? 'success' : 'danger'; ?>">
                        <?php echo $alumno['habla_ingles']; ?>
                    </span>
                </td>
                <td><?php echo date('d-m-Y', strtotime($alumno['fecha_creacion'])); ?></td>
                <td>
                    <div class="flex_btns">
                        <a href="#"
                        hx-get="modales/modal_view_alumno.php"
                        hx-target="#modal_container"
                        hx-swap="innerHTML"
                        hx-vals='{"id": "<?php echo $alumno['id_alumno']; ?>"}'
                        hx-trigger="click"
                        >
                            <i class="bi bi-box-arrow-up-right"></i>
                        </a>
                        <a href="#"
                        hx-get="modales/modal_update_alumno.php"
                        hx-target="#modal_container"
                        hx-swap="innerHTML"
                        hx-vals='{"id": "<?php echo $alumno['id_alumno']; ?>"}'
                        hx-trigger="click"
                        >
                            <i class="bi bi-arrow-clockwise"></i>
                        </a>
                        <a
                            href="#"
                            hx-delete="actions/delete_alumno.php?id=<?php echo $alumno['id_alumno']; ?>"
                            hx-target="closest tr"
                            hx-swap="delete"
                            hx-confirm="¿Estás seguro de que deseas eliminar este alumno?"
                            hx-on:htmx:beforeRequest="this.closest('tr').classList.add('table-danger')">
                            <i class="bi bi-trash3"></i>
                        </a>
                    </div>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>