<?php $id = isset($_GET['id']) ? $_GET['id'] : null; ?>
<div class="modal fade" id="modal-delete" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title w-100 text-center opacity-75">Eliminar alumno <?php echo $id; ?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>
      <div class="modal-body">
        <p>¿Seguro que desea eliminar el alumno?</p>
      </div>
      <div class="modal-footer">
      <button
        type="button"
        class="btn btn-danger"
        hx-delete="actions/delete_alumno.php?id=<?php echo $id; ?>"
        hx-target="this"
        hx-swap="none"
        hx-on::after-request="
        if (event.detail.successful) {
          showToast.success('Alumno eliminado exitosamente 🎉');
          document.getElementById('alumno_<?php echo $id; ?>').remove();
        } else {
          showToast.error('Error al eliminar');
        }"
        data-bs-dismiss="modal">
        Eliminar <i class="bi bi-trash3"></i>
        </button>
      </div>
    </div>
  </div>
</div>