<?php
require_once("../settings/settings.php");
require_once("../settings/conn.php");
include("../actions/functions.php");

$idAlumno = isset($_GET['id']) ? $_GET['id'] : null;
$infoAlumno = getAlumno($servidor, $idAlumno);
?>
<div
  class="modal fade"
  id="modal_update_alumno"
  tabindex="-1"
  aria-labelledby="modal_update_alumno_title"
  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-3" id="modal_add_alumno_title">
          Actualizar datos del alumno
        </h1>
        <button
          type="button"
          class="btn-close"
          data-bs-dismiss="modal"
          aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form
          method="POST"
          hx-post="actions/update_alumno.php"
          hx-target="#modal_container"
          hx-swap="innerHTML"
          hx-swap-duration="500"
          hx-on:htmx:after-request="
            if (event.detail.successful) {
              const modal = bootstrap.Modal.getInstance(document.querySelector('.modal.show'));
              if (modal) {
                modal.hide();
                document.body.classList.remove('modal-open');
                const backdrop = document.querySelector('.modal-backdrop');
                if (backdrop) {
                  backdrop.remove();
                }
                // Recargar la tabla usando HTMX
                htmx.trigger('#table-responsive', 'load');
                // Otra opción: forzar recarga de la tabla
                // htmx.ajax('GET', 'actions/get_alumnos.php', {target: '#table-responsive', swap: 'innerHTML'});
              }
            }
          ">
          <input type="hidden" name="_method" value="PUT">
          <input type="text" name="id" value="<?php echo $idAlumno; ?>" hidden>
          <div class="mb-3">
            <label for="nombre" class="form-label float-start">Nombre</label>
            <input
              type="text"
              name="nombre"
              class="form-control"
              id="nombre"
              value="<?php echo $infoAlumno['nombre']; ?>"
              required />
          </div>
          <div class="mb-3">
            <label for="email" class="form-label float-start">Email</label>
            <input
              type="email"
              name="email"
              class="form-control"
              id="email"
              value="<?php echo $infoAlumno['email']; ?>"
              required />
          </div>

          <div class="mb-3">
            <label for="curso" class="form-label float-start">Curso</label>
            <select name="curso" id="curso" class="form-select">
              <option selected value="<?php echo $infoAlumno['curso']; ?>"><?php echo $infoAlumno['curso']; ?></option>
              <option value="HTMX">HTMX</option>
              <option value="PHP">PHP</option>
              <option value="JS">JS</option>
              <option value="HTML">HTML</option>
              <option value="REACT">React</option>
            </select>
          </div>

          <div class="mb-3 text-start">
            <label for="sexo" class="form-label">Sexo</label>
            <div class="form-check">
              <input
                class="form-check-input"
                type="radio"
                name="sexo"
                id="radioMasculino"
                value="Masculino"
                <?php if ($infoAlumno['sexo'] == 'Masculino') echo 'checked'; ?> />
              <label class="form-check-label" for="radioMasculino">Masculino</label>
            </div>
            <div class="form-check">
              <input
                class="form-check-input"
                type="radio"
                name="sexo"
                id="radioFemenino"
                value="Femenino"
                <?php if ($infoAlumno['sexo'] == 'Femenino') echo 'checked'; ?> />
              <label class="form-check-label" for="radioFemenino">Femenino</label>
            </div>
            <div class="form-check">
              <input
                class="form-check-input"
                type="radio"
                name="sexo"
                id="radioOtro"
                value="Otro"
                <?php if ($infoAlumno['sexo'] == 'Otro') echo 'checked'; ?> />
              <label class="form-check-label" for="radioOtro">Otro</label>
            </div>
          </div>

          <div class="mb-3 text-start">
            <label for="habla_ingles" class="form-label">Hablas inglés</label>
            <div class="form-check form-switch">
              <input
                class="form-check-input"
                type="checkbox"
                role="switch"
                id="habla_ingles"
                name="habla_ingles"
                <?php if ($infoAlumno['habla_ingles'] == 'Sí') echo 'checked'; ?> />
              <label class="form-check-label" for="habla_ingles">Sí</label>
            </div>
          </div>

          <div class="modal-footer">
            <button
              type="button"
              class="btn btn-secondary"
              data-bs-dismiss="modal">
              Cerrar
              <i class="bi bi-x-lg"></i>
            </button>
            <button type="submit" class="btn btn-primary">
              Actualizar
              <i class="bi bi-arrow-right"></i>
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>