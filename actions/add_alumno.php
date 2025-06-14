<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once('../settings/settings.php');
    require_once('../settings/conn.php');
    require_once('functions.php');
    
    // Sanitizar los datos de entrada
    $nombre = $servidor->real_escape_string(trim($_POST['nombre']));
    $email = $servidor->real_escape_string(trim($_POST['email']));
    $curso = $servidor->real_escape_string(trim($_POST['curso']));
    $sexo = $servidor->real_escape_string(trim($_POST['sexo']));
    $habla_ingles = isset($_POST['habla_ingles']) ? 1 : 0;
    
    $insertSQL = "INSERT INTO tbl_alumnos (nombre, email, curso, sexo, habla_ingles) VALUES ('$nombre', '$email', '$curso', '$sexo', '$habla_ingles')";
    
    if ($servidor->query($insertSQL)) {
        // Obtener el ID del alumno recién insertado
        $nuevoId = $servidor->insert_id;
        
        // Obtener los datos completos del alumno recién creado
        $alumnoNuevo = getAlumnoId($servidor, $nuevoId);
        
        if ($alumnoNuevo) { ?>
            <!-- Retornar la nueva fila HTML -->
            <tr id="alumno_<?php echo $alumnoNuevo['id_alumno']; ?>">
                <th><?php echo $alumnoNuevo['id_alumno']; ?></th>
                <td><?php echo $alumnoNuevo['nombre']; ?></td>
                <td><?php echo $alumnoNuevo['email']; ?></td>
                <td><?php echo $alumnoNuevo['sexo']; ?></td>
                <td><?php echo $alumnoNuevo['curso']; ?></td>
                <td>
                    <span class="badge text-bg-<?php echo $alumnoNuevo['habla_ingles'] === 'Sí' ? 'success' : 'danger'; ?>">
                        <?php echo $alumnoNuevo['habla_ingles'] === 'Sí' ? 'Sí' : 'No'; ?>
                    </span>
                </td>
                <td>
                    <div class="form-check form-switch">
                        <input type="checkbox" 
                            hx-post="actions/change_status_alumno.php" 
                            hx-vals="js:{
                                id_alumno: '<?= $alumnoNuevo['id_alumno'] ?>',
                                status: event.target.checked ? '1' : '0'
                            }" 
                            hx-target="#result_alumno_<?= $alumnoNuevo['id_alumno'] ?>" 
                            hx-trigger="change" 
                            hx-swap="outerHTML"
                            class="form-check-input" <?= $alumnoNuevo['status'] === "1" ? 'checked' : '' ?>>
                        <label for="result_alumno_<?= $alumnoNuevo['id_alumno'] ?>" id="result_alumno_<?= $alumnoNuevo['id_alumno'] ?>">
                                <?= $alumnoNuevo['status'] === "1" ? '<i class="bi bi-person-fill-check text-success fs-5"></i>' : '<i class="bi bi-person-fill-lock text-danger fs-5"></i>' ?>
                        </label>
                    </div>
                </td>
                <td><?php echo date('d-m-Y', strtotime($alumnoNuevo['fecha_creacion'])); ?></td>
                <td>
                    <div class="flex_btns">
                        <a href="#" 
                           hx-get="modales/modal_view_alumno.php" 
                           hx-target="#modal_container" 
                           hx-swap="innerHTML" 
                           hx-vals='"{"id": "" . $alumnoNuevo['id_alumno'] . "}"' 
                           hx-trigger="click">
                            <i class="bi bi-box-arrow-up-right"></i>
                        </a>
                        <a href="#" 
                           hx-get="modales/modal_update_alumno.php" 
                           hx-target="#modal_container" 
                           hx-swap="innerHTML" 
                           hx-vals='"{"id": "" . $alumnoNuevo['id_alumno'] . "}"' 
                           hx-trigger="click">
                            <i class="bi bi-arrow-clockwise"></i>
                        </a>    
                        <a href="#" 
                           hx-get="modales/modal_delete.php" 
                           hx-target="#modal_container" 
                           hx-swap="innerHTML" 
                           hx-vals='"{"id": "" . $alumnoNuevo['id_alumno'] . "}"' 
                           hx-trigger="click">
                            <i class="bi bi-trash3"></i>
                        </a>
                    </div>
                </td>
            </tr>
        <?php }
    } else {
        echo '<div class="alert alert-danger">
                <strong>Error:</strong> No se pudo registrar el alumno. ' . mysqli_error($servidor) . '
              </div>';
    }
}
?>