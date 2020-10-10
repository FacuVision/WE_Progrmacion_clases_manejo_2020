
<!-- Modal CREACION DE AÑOS -->
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



<!-- Modal CREACION DE MES-->
<form method="post" action="../CONTROLADORES/ProgramacionControlador.php?op=8">

    <!-- Modal -->
    <div class="modal fade" id="crear_mes" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> Crear mes </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">

                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Seleccione Mes</label>
                    <select class="form-control" name="meses_nombre_numero" id="recipient-name">
                        <option value="1"> <?php echo $array_meses[1]?></option>
                        <option value="2"> <?php echo $array_meses[2]?></option>
                        <option value="3"> <?php echo $array_meses[3]?></option>
                        <option value="4"> <?php echo $array_meses[4]?></option>
                        <option value="5"> <?php echo $array_meses[5]?></option>
                        <option value="6"> <?php echo $array_meses[6]?></option>
                        <option value="7"> <?php echo $array_meses[7]?></option>
                        <option value="8"> <?php echo $array_meses[8]?></option>
                        <option value="9"> <?php echo $array_meses[9]?></option>
                        <option value="10"> <?php echo $array_meses[10]?></option>
                        <option value="11"> <?php echo $array_meses[11]?></option>
                        <option value="12"> <?php echo $array_meses[12]?></option>
                    </select>
                </div>
                <div class="form-group" style="color:brown">
                    <label for="message-text" class="col-form-label">
                    Recuerda que no puedes ingresar meses que ya esten creados</label>
                </div>
        </div>
                <div class="modal-footer">
                    <input value="Insertar" type="submit" class="btn btn-success">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
    </form>



<?php  
if(isset($numero_mes)){
        if($numero_mes<10)$numero_mes= "0". $numero_mes;
}

if(isset($indice['dia_numero'])){
    $dia_numero= intval($indice['dia_numero']) + 1;
    if($dia_numero<10) $dia_numero= "0".$dia_numero;
}

if(empty($indice['dia_numero'])) $dia_numero = "01";

?>

<!-- Modal CREACION DE DIAS-->
<form method="post" action="../CONTROLADORES/ProgramacionControlador.php?op=9">

    <!-- Modal -->
    <div class="modal fade" id="crear_dias" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> Crear mes </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">

                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Seleccione Dia</label>
                    <input name="dia" type="date" class="form-control" value="<?php echo $numero_agno ."-". $numero_mes."-".$dia_numero?>" min="<?php echo $numero_agno."-". $numero_mes;?>-01" >
                </div>


                <div class="form-group" style="color:brown">
                    <label for="message-text" class="col-form-label">
                    Recuerda que no puedes ingresar dias fuera del mes donde te encuentres</label>
                </div>
        </div>
                <div class="modal-footer">
                    <input value="Insertar" type="submit" class="btn btn-success">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
    </form>







<!-- SCRIPTS DE INICIACION DE MODALES -->
    <script>
    $('#myModal').on('shown.bs.modal', function () {
        $('#myInput').trigger('focus')
    })

    </script>


