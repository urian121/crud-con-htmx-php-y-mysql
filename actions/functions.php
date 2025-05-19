<?php

// Funcion para obtener todos los alumnos
function getAlumnos($servidor)
{
    $sqlAlumnos = "SELECT *, IF(habla_ingles = 1, 'Sí', 'No') AS habla_ingles FROM alumnos";
    $res = $servidor->query($sqlAlumnos);
    return $res ? $res->fetch_all(MYSQLI_ASSOC) : [];
}
