
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





    <!-- MODAL PARA CREAR UNA PROGRAMACION VACIA CON SU INSTRUCTOR CORRESPONDIENTE -->
<form method="post" action="../CONTROLADORES/ClasesControlador.php?op=1">
<!-- Modal -->
<div class="modal fade" id="crear_programacion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"> Crear programacion de clases </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>

        </div>

        <div class="modal-body">

        <div class="form-group">
            <label for="recipient-name" class="col-form-label">Seleccione Instructor asignado</label>
            <select class="form-control"  name="instructor">
                    <?php foreach ($TodoInstructor as $key ) {?>
                        <option  value="<?php echo $key['id_instructor']?>"> <?php echo $key['emp_nombre'];?> </option>
                    <?php } ?>
                </select>
        </div>
        <div class="form-group">
            <label>Añadir Descripcion (opcional)</label>
            <textarea name="descripcion" class="form-control" id="descripcion" rows="3"></textarea>
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





    <!-- MODAL PARA CREAR UNA CLASE VACIA CON SU INSTRUCTOR CORRESPONDIENTE -->


<form method="post" action="../CONTROLADORES/ClasesControlador.php?op=3">
<!-- Modal -->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"> Añadir Clase </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <table class="horario">
                <?php $cont = 0;
                
                foreach($listaPorTerminar as $key): ?>  
                    
                <tr>
                    <td><?php echo str_replace(".","",substr($key,-9,10)); $cont++;?></td>
                </tr>

                <?php endforeach; ?>    
        </table>
            <?php echo "<label style='text-align:center; margin-top:5px; font-weight:bold'>" .$cont. "</label>";?>
            <div class="modal-body">
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Curso </label>
                    <div class="form-group">
                    <select class="form-control"  name="curso">
                            <?php foreach ($listaCursos as $key ) {?>
                                <option  value="<?php echo $key['id_curso']?>"> <?php echo $key['cur_nombre']." - ". $key['cur_horas']. " horas ";?> </option>
                            <?php } ?>
                        </select>
                    </div>
                    <label for="recipient-name" class="col-form-label">Coche </label>
                    <div class="form-group">
                    <select class="form-control"  name="coche">
                            <?php foreach ($listaCoches as $key ) {?>
                                <option  value="<?php echo $key['id_coche']?>"> <?php echo $key['coche_marca']." (". $key['coche_modelo']. ", ". $key['coche_tipo']. ", ". $key['coche_placa']. ")";?> </option>
                            <?php } ?>
                        </select>
                    </div>

                    <label for="recipient-name" class="col-form-label">Alumno </label>
                    <div class="form-group">
                    <select class="form-control"  name="alumno">
                            <?php foreach ($listaAlumnos as $key ) {?>
                                <option  value="<?php echo $key['id_alumno']?>"> <?php echo $key['alum_nombre']." ". $key['alum_apellido'] . " - (".$key['alum_telefono']. ", ". $key['alum_correo']. ")"   ;?> </option>
                            <?php } ?>
                        </select>
                    </div>

                    <label for="recipient-name" class="col-form-label">Horario </label>
                    <div class="form-group">
                    <select class="form-control"  name="horario">
                            <?php foreach ($listahorarios as $key ) {?>
                                <option  value="<?php  echo $key; ?>"> <?php echo $key; ?> </option>
                            <?php } ?>
                        </select>
                    </div>                


                    <label for="recipient-name" class="col-form-label">N° de Hora de Clase</label>
                    <div class="form-group">
                    <select class="form-control"  name="n_hora_clase">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                            <option value="13">13</option>
                            <option value="14">14</option>
                            <option value="15">15</option>
                            <option value="HR">H. Recuperada</option>
                            <option value="HE">H. Extra</option>
                    </select>
                    </div>

                    <label for="recipient-name" class="col-form-label">Asistencia</label>
                    <div class="form-group">
                        <select class="form-control"  name="asistencia">
                                <option value="Asistio">Asistio</option>
                                <option value="Falta">Falta</option>
                                <option value="Tardanza">Tardanza</option>
                                <option value="Programado">Programado</option>
                        </select>
                    </div>

                    
                
                    <input type="hidden" name="id_clase_manejo" value="
                    <?php 
                        if(empty($listaClases)){
                            echo $clase_manejo[0]['id_clase_manejo'];
                        }  else{
                            echo $listaClases[0]['id_clase_manejo'];
                        } 
                    ?>">



                    </div>
                        <div class="modal-footer">
                            <input value="Insertar" type="submit" class="btn btn-success">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        </div>
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


