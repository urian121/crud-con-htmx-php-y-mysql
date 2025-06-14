<?php
if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
    require_once('../settings/settings.php');
    require_once('../settings/conn.php');

    $id = $_GET['id'] ?? null;

    // Validar que sea numérico y entero
    if (!ctype_digit($id)) {
        http_response_code(400);
        echo "ID inválido";
        exit;
    }

    // Cast a int para asegurarte que sea un número
    $id = (int) $id;

    $deleteSQL = "DELETE FROM tbl_alumnos WHERE id_alumno = $id";
    if ($servidor->query($deleteSQL)) {
        http_response_code(200);
        echo "OK";
    } else {
        http_response_code(500);
        echo "Error al eliminar";
    }
}
?>
