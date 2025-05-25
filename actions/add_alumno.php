<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once('../settings/settings.php');
    require_once('../settings/conn.php');

    $nombre = trim($_POST['nombre']);
    $email = trim($_POST['email']);
    $curso = trim($_POST['curso']);
    $sexo = trim($_POST['sexo']);
    $habla_ingles = isset($_POST['habla_ingles']) ? 1 : 0;

    $insertSQL = "INSERT INTO alumnos (nombre, email, curso, sexo, habla_ingles) VALUES ('$nombre', '$email', '$curso', '$sexo', '$habla_ingles')";
    $respSql = $servidor->query($insertSQL) or die("Error al registrar alumno:" . mysqli_error($servidor));

    if ($respSql) {
        echo '<div class="alert alert-success">
        <strong>¡Éxito!</strong> El alumno ha sido registrado correctamente.
    </div>';
    }
}
