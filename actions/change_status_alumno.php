<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once('../settings/settings.php');
    require_once('../settings/conn.php');

    $id = trim($_POST['id_alumno']);
    $status = trim($_POST['status']);

    if($id != "" && $status != ""){
        $sql = "UPDATE tbl_alumnos SET status = '$status' WHERE id_alumno = $id";
        if ($servidor->query($sql)) { ?>
            <label for="result_alumno_<?= $id ?>" id="result_alumno_<?= $id ?>">
            <?= $status === "1" ? '<i class="bi bi-person-fill-check text-success fs-5"></i>' : '<i class="bi bi-person-fill-lock text-danger fs-5"></i>' ?>
            </label>
    <?php
        } else {
            echo "Error al actualizar el estado del usuario";
        }
    } else {
        echo "Error al actualizar el estado del usuario";
    }
}
?>
