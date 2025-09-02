<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once('../settings/settings.php');
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
        
        if ($alumnoNuevo) { 
            // Usar la función para generar la fila
            echo generarFilaAlumno($alumnoNuevo);
        }
    } else {
        echo '<div class="alert alert-danger">
                <strong>Error:</strong> No se pudo registrar el alumno. ' . mysqli_error($servidor) . '
              </div>';
    }
}
?>
