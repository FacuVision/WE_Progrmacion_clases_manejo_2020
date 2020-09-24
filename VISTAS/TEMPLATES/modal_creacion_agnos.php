

    <form method="post" action="../CONTROLADORES/ProgramacionControlador.php?op=2">
    <!-- Modal -->
    <div class="modal fade" id="crear_agno" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> Crear año </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
            <form>
            <div class="form-group">
                <label for="recipient-name" class="col-form-label">Numero de Año</label>
                <input name="numero_agno" type="number" class="form-control" id="recipient-name"value="<?php echo $indice['agno_numero'] + 1; ?>">
            </div>
            <div class="form-group" style="color:brown">
                <label for="message-text" class="col-form-label">
                Recuerda que no puedes ingresar años que ya esten creados</label>
            </div>
            </form>
        </div>

        
        <div class="modal-footer">
            <input value="Insertar" type="submit" class="btn btn-success">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
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