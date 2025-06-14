<?php

// Funcion para obtener todos los alumnos
function getListAlumnos($servidor)
{
    $sqlAlumnos = "SELECT *, IF(habla_ingles = 1, 'Sí', 'No') AS habla_ingles FROM tbl_alumnos";
    $res = $servidor->query($sqlAlumnos);
    return $res ? $res->fetch_all(MYSQLI_ASSOC) : [];
}


// Funcion para obtener un solo alumno
function getAlumnoId($servidor, $id)
{
    $sqlAlumno = "SELECT *, IF(habla_ingles = 1, 'Sí', 'No') AS habla_ingles FROM tbl_alumnos WHERE id_alumno = $id";
    $res = $servidor->query($sqlAlumno);
    return $res ? $res->fetch_assoc() : [];
}


// Generar fila de alumno
function generarFilaAlumno($alumno) { ?>
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
                        id_alumno: '<?php echo $alumno['id_alumno']; ?>',
                        status: event.target.checked ? '1' : '0'
                    }" 
                    hx-target="#result_alumno_<?php echo $alumno['id_alumno']; ?>" 
                    hx-trigger="change" 
                    hx-swap="outerHTML"
                    class="form-check-input" <?php echo $alumno['status'] === "1" ? 'checked' : ''; ?>>
                <label for="result_alumno_<?php echo $alumno['id_alumno']; ?>" id="result_alumno_<?php echo $alumno['id_alumno']; ?>">
                    <?php echo $alumno['status'] === "1" ? '<i class="bi bi-person-fill-check text-success fs-5"></i>' : '<i class="bi bi-person-fill-lock text-danger fs-5"></i>'; ?>
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
                   hx-vals="js:{ id: '<?php echo $alumno['id_alumno']; ?>' }" 
                   hx-trigger="click">
                    <i class="bi bi-box-arrow-up-right"></i>
                </a>
                <a href="#" 
                   hx-get="modales/modal_update_alumno.php" 
                   hx-target="#modal_container" 
                   hx-swap="innerHTML" 
                   hx-vals="js:{ id: '<?php echo $alumno['id_alumno']; ?>' }" 
                   hx-trigger="click">
                    <i class="bi bi-arrow-clockwise"></i>
                </a>    
                <a href="#" 
                   hx-get="modales/modal_delete.php" 
                   hx-target="#modal_container" 
                   hx-swap="innerHTML" 
                   hx-vals="js:{ id: '<?php echo $alumno['id_alumno']; ?>' }" 
                   hx-trigger="click">
                    <i class="bi bi-trash3"></i>
                </a>
            </div>
        </td>
    </tr>
<?php } ?>