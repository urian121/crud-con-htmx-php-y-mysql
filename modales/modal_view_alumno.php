<?php
require_once("../settings/settings.php");
require_once("../settings/conn.php");
include("../actions/functions.php");

$idAlumno = isset($_GET['id']) ? $_GET['id'] : null;
$infoAlumno = getAlumno($servidor, $idAlumno);

?>
<div
  class="modal fade"
  id="modal_add_alumno"
  tabindex="-1"
  aria-labelledby="modal_add_alumno_title"
  aria-hidden="true"
>
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-3" id="modal_add_alumno_title">
          Datos del alumno
        </h1>
        <button
          type="button"
          class="btn-close"
          data-bs-dismiss="modal"
          aria-label="Close"
        ></button>
      </div>
      <div class="modal-body">
        <ul class="list-group list-group-flush">
          <li class="list-group-item">
            <label for="nombre" class="form-label float-start fw-bold">Nombre: </label>
            <span class="float-start mx-2"><?php echo $infoAlumno['nombre']; ?></span>
          </li>
          <li class="list-group-item">
            <label for="email" class="form-label float-start fw-bold">Email: </label>
            <span class="float-start mx-2"><?php echo $infoAlumno['email']; ?></span>
          </li>
          <li class="list-group-item">
            <label for="curso" class="form-label float-start fw-bold">Curso: </label>
            <span class="float-start mx-2"><?php echo $infoAlumno['curso']; ?></span>
          </li>
          <li class="list-group-item">
            <label for="sexo" class="form-label float-start fw-bold">Sexo: </label>
            <span class="float-start mx-2"><?php echo $infoAlumno['sexo']; ?></span>
          </li>
          <li class="list-group-item">
            <label for="habla_ingles" class="form-label float-start fw-bold">Habla inglés: </label>
            <span class="float-start mx-2"><?php echo $infoAlumno['habla_ingles']; ?></span>
          </li>
          <li class="list-group-item">
            <label for="fecha_creacion" class="form-label float-start fw-bold">Fecha creación: </label>
            <span class="float-start mx-2"><?php echo date('d-m-Y', strtotime($infoAlumno['fecha_creacion'])); ?></span>
          </li>
        </ul>

          <div class="modal-footer">
            <button
              type="button"
              class="btn btn-secondary"
              data-bs-dismiss="modal"
            >
              Cerrar
              <i class="bi bi-x-lg"></i>
            </button>
          </div>
      </div>
    </div>
  </div>
</div>
