<div class="modal fade" id="modal_add_alumno" tabindex="-1" aria-labelledby="modal_add_alumno_title" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-3 opacity-75">
          Agregar nuevo alumno
        </h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST"
         hx-post="actions/add_alumno.php" 
         hx-target="#tabla-alumnos tbody"
         hx-swap="beforeend">
          <div class="mb-3">
            <label for="nombre" class="form-label float-start">Nombre</label>
            <input type="text" name="nombre" class="form-control" id="nombre" required />
          </div>
          <div class="mb-3">
            <label for="email" class="form-label float-start">Email</label>
            <input type="email" name="email" class="form-control" id="email" required />
          </div>

          <div class="mb-3">
            <label for="curso" class="form-label float-start">Curso</label>
            <select name="curso" id="curso" class="form-select" required>
              <option value="">Seleccione un curso</option>
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
              <input class="form-check-input" type="radio" name="sexo" id="radioMasculino" value="Masculino" checked />
              <label class="form-check-label" for="radioMasculino">Masculino</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="sexo" id="radioFemenino" value="Femenino" />
              <label class="form-check-label" for="radioFemenino">Femenino</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="sexo" id="radioOtro" value="Otro" />
              <label class="form-check-label" for="radioOtro">Otro</label>
            </div>
          </div>

          <div class="mb-3 text-start">
            <label for="habla_ingles" class="form-label">Hablas inglés</label>
              <div class="form-check form-switch">
              <input class="form-check-input" 
                type="checkbox" 
                role="switch" 
                id="habla_ingles"
                name="habla_ingles"
                onchange="this.closest('div').querySelector('.form-check-label').textContent = this.checked ? 'Sí' : 'No'"
              />
                <label class="form-check-label px-2 bg-info text-white rounded" for="habla_ingles">No</label>
              </div>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
              Cerrar
              <i class="bi bi-x-lg"></i>
            </button>
            <button type="submit" class="btn btn-primary">
              Registrar nuevo alumno
              <i class="bi bi-arrow-right"></i>
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>