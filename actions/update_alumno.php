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

    $updateSQL = "UPDATE tbl_alumnos SET
        nombre = '$nombre',
        email = '$email',
        curso = '$curso',
        sexo = '$sexo',
        habla_ingles = '$habla_ingles'
        WHERE id_alumno = $id";
    $result = $servidor->query($updateSQL);

    if ($result) {
         // Obtener los datos actualizados
        $alumnoActualizado = getAlumnoId($servidor, $id);
        
        if ($alumnoActualizado) {
            // Usar la función para generar la fila
            echo generarFilaAlumno($alumnoActualizado);
        }
    } else {
        echo '<div class="alert alert-danger">
                <strong>Error:</strong> No se pudo actualizar el alumno. ' . mysqli_error($servidor) . '
              </div>';
    }
}
?>