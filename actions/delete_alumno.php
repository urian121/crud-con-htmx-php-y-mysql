<?php
header('Content-Type: text/html');

if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
    require_once('../settings/settings.php');
    require_once('../settings/conn.php');

    $id = $_GET['id'];
    $deleteSQL = "DELETE FROM alumnos WHERE id_alumno = $id";
    $servidor->query($deleteSQL);
}
