<?php
// DEBUG ACTIVADO
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Configuración de zona horaria
date_default_timezone_set('America/Bogota');


// Configuración de la base de datos
define('DB_HOST', 'localhost');
define('DB_NAME', 'crud_htmx_php');
define('DB_USER', 'root');
define('DB_PASSWORD', '4825');



$servidor = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
if ($servidor->connect_error) {
    die("Error de conexión: " . $servidor->connect_error);
}

if (!$servidor->set_charset("utf8mb4")) {
    die("Error cargando el conjunto de caracteres utf8mb4: " . $servidor->error);
}
