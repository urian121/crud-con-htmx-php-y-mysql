<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once('../settings/settings.php');
    require_once('../settings/conn.php');
    require_once('functions.php');

    $id = isset($_POST['id']) ? (int)$_POST['id'] : 0;
    
    $nombre = isset($_POST['nombre']) ? $servidor->real_escape_string(trim($_POST['nombre'])) : '';
    $email = isset($_POST['email']) ? $servidor->real_escape_string(trim($_POST['email'])) : '';
    $curso = isset($_POST['curso']) ? $servidor->real_escape_string(trim($_POST['curso'])) : '';
    $sexo = isset($_POST['sexo']) ? $servidor->real_escape_string(trim($_POST['sexo'])) : '';
    $habla_ingles = isset($_POST['habla_ingles']) ? 1 : 0;

    $updateSQL = "UPDATE alumnos SET
        nombre = '$nombre',
        email = '$email',
        curso = '$curso',
        sexo = '$sexo',
        habla_ingles = '$habla_ingles'
        WHERE id_alumno = $id";
    $result = $servidor->query($updateSQL);

    if ($result) {
        $alumnoActualizado = getAlumnoId($servidor, $id);
        ?>
        <tr id="alumno_<?php echo $alumnoActualizado['id_alumno']; ?>">
            <th><?php echo $alumnoActualizado['id_alumno']; ?></th>
            <td><?php echo $alumnoActualizado['nombre']; ?></td>
            <td><?php echo $alumnoActualizado['email']; ?></td>
            <td><?php echo $alumnoActualizado['sexo']; ?></td>
            <td><?php echo $alumnoActualizado['curso']; ?></td>
            <td>
                <span class="badge text-bg-<?php echo $alumnoActualizado['habla_ingles'] === 1 ? 'success' : 'danger'; ?>">
                    <?php echo $alumnoActualizado['habla_ingles'] === 1 ? 'Sí' : 'No'; ?>
                </span>
            </td>
            <td><?php echo date('d-m-Y', strtotime($alumnoActualizado['fecha_creacion'])); ?></td>
            <td>
                <div class="flex_btns">
                    <a href="#" hx-get="modales/modal_view_alumno.php" hx-target="#modal_container" hx-swap="innerHTML" hx-vals='{"id": "<?php echo $alumnoActualizado['id_alumno']; ?>"}' hx-trigger="click">
                        <i class="bi bi-box-arrow-up-right"></i>
                    </a>
                    <a href="#" hx-get="modales/modal_update_alumno.php" hx-target="#modal_container" hx-swap="innerHTML" hx-vals='{"id": "<?php echo $alumnoActualizado['id_alumno']; ?>"}' hx-trigger="click">
                        <i class="bi bi-arrow-clockwise"></i>
                    </a>
                    <a href="#" hx-get="modales/modal_delete.php" hx-target="#modal_container" hx-swap="innerHTML" hx-vals='{"id": "<?php echo $alumnoActualizado['id_alumno']; ?>"}' hx-trigger="click">
                        <i class="bi bi-trash3"></i>
                    </a>
                </div>
            </td>
        </tr>
        <?php
    }
}
?>