<?php
header('Content-Type: text/html');

// Verificar si es una solicitud PUT
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['_method']) && $_POST['_method'] === 'PUT') {
    require_once('../settings/settings.php');
    require_once('../settings/conn.php');
    require_once('functions.php');
    
    // Obtener los datos del formulario
    $id = isset($_POST['id']) ? (int)$_POST['id'] : 0;
    
    // Obtener y validar los datos del formulario
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
                 habla_ingles = $habla_ingles 
                 WHERE id_alumno = $id";
    $result = $servidor->query($updateSQL);
    
   if ($result) {
    // Disparar evento para recargar la tabla
    echo '<div id="reload-table" hx-get="actions/get_alumnos.php" hx-trigger="load" hx-target="#table-responsive"></div>';
    include('get_alumnos.php');
}
} else {
    http_response_code(405);
    echo '<div class="alert alert-danger">Método no permitido</div>';
}