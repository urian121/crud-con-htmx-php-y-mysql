<?php

$servidor = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
if ($servidor->connect_error) {
    die("Error de conexión: " . $servidor->connect_error);
}

if (!$servidor->set_charset("utf8mb4")) {
    die("Error cargando el conjunto de caracteres utf8mb4: " . $servidor->error);
}
