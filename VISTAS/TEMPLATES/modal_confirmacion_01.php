<form method="post">
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="exampleModalLabel">Confirmacion</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            ¿Estas Seguro que quieres cerrar sesion?
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <a href="../CONTROLADORES/SesionesControlador.php?op=2" class="btn btn-danger">Cerrar Sesion </a>
        </div>
        </div>
    </div>
</div>
</form>


<script>
$('#myModal').on('shown.bs.modal', function () {
    $('#myInput').trigger('focus')
})
</script>