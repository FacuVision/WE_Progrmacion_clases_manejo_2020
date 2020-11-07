<?php
session_start();


    if (!empty($_SESSION['nombre'])) 
    {
        $listaClases = $_SESSION['listaClases']; 
        //echo '<pre>' . var_export($listaClases, true) . '</pre>';

        if(isset($_SESSION["seleccion"])){
            $instructorSeleccionado = $_SESSION["seleccion"];
        }
        
        $listaInstructores = $_SESSION['listaInstructores'];
    
        if(isset($_SESSION["clase_manejo"])){
            $clase_manejo = $_SESSION["clase_manejo"];
        }

        if(isset($_SESSION['listaClasesManejoPorDia'])){
            $listaClasesManejoPorDia = $_SESSION['listaClasesManejoPorDia'];
            //echo '<pre>' . var_export($listaClasesManejoPorDia, true) . '</pre>';

        }
        $TodoInstructor = $_SESSION['TodoInstructor'];

        $nombre_mes = $_SESSION['fechas']["mes_nombre"];
        $numero_mes = $_SESSION['fechas']['mes'];
        $numero_agno = $_SESSION['fechas']["año"];
        $numero_dia = $_SESSION['fechas']["dia"];

        $listaCursos = $_SESSION['listaCursos'];
        $listaCoches = $_SESSION['listaCoches'] ;
        $listaAlumnos = $_SESSION['listaAlumnos'];

        $listahorarios = $_SESSION['horarios'];
        $listaPorTerminar = $_SESSION['lista_horarios'];



    } else{
        echo '<script> document.location.href="Login.php";</script>';  
    }
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Dias</title>
    <?php include('../VISTAS/TEMPLATES/ImportacionesCabecera.php'); ?>
    <link rel="stylesheet" href="../LIBRERIAS/CSS/estilo_clases.css">

</head>

<body>
    <header>
    <div class="titulo">
        <h1><?php echo $numero_dia; ?> de <?php echo $nombre_mes; ?> del <?php echo $numero_agno;?></h1>
        <h5>Se muestran las programaciones de las clases completas (Las incompletas no se mostraran) - Asegurate de Seleccionar el instructor antes de añadir una clase</h5>
    </div>
    </header>

    

    <section>

    <div class="dataTable">
    <div class="instructores">

    <form action="../CONTROLADORES/ProgramacionControlador.php" method="get">
        Selecciona instructor &nbsp;&nbsp;

                <select class="form-control" style="width:5%; display:inline; margin-bottom:20px" name="sel_instructor">
                    <?php 
                    if(!empty($listaInstructores)){
                    foreach ($listaInstructores as $key ) {?>
                        <option  value="<?php echo $key['id_instructor']."-".$key['emp_nombre'];?>"> <?php echo $key['emp_nombre'];?> </option>
                    <?php } } else { echo "<option> ----- </option>";} ?>
                </select>

                <input type="hidden" name="op" value="11">
                <input class="btn btn-primary" type="submit" value="Seleccionar" name="enviar">
    </form>
        <p id="seleccion"> 
            <?php 
            if($instructorSeleccionado["nombre"] != null){ echo "Mostrando programacion del instructor <strong>".  $instructorSeleccionado["nombre"]."</strong>";
            }else{ echo "<label id='ninguno'> Aun no has seleccionado ningun Instructor </label>";}
            ?>
        </p>            
    </div>   

    <form method="POST">                    
        <div class="row">
            <div class="col-lg-12">
                <table id="example"  class="table table-striped table-bordered" style="width:100%">

                    <thead>
                        <tr>
                            <th>Horario</th>
                            <th>Datos Alumno</th>
                            <th>Nombre Curso</th>
                            <th>Horas Actuales</th>
                            <th>Coche</th>
                            <th>Horas Totales</th>
                            <th>Asistencia</th>
                            <th>Acciones</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>

                    <?php
                        if(!empty($listaClases)){

                        foreach ($listaClases as $key): ?>
                        <tr>
                            <td><?php echo $key['det_horario'] ?> </td>
                            <td><?php echo $key['alum_nombre'] ." ". $key['alum_apellido'] ?> </td>
                            <td><?php echo $key['cur_nombre'] ?> </td>
                            <td><?php echo $key['det_n_clase'] ?> </td>
                            <td><?php echo $key['coche_tipo'] ?> </td>
                            <td><?php echo $key['cur_horas'] ?> </td>
                            <td>
                                <?php if($key['det_asistencia']=="Asistio")
                                    echo "<span class='verde'>" . $key['det_asistencia']. "</span>";
                                else if ($key['det_asistencia']=="Programado")
                                    echo "<span class='celeste'>" . $key['det_asistencia']. "</span>";
                                else if ($key['det_asistencia']=="Tardanza")
                                    echo "<span class='rojo'>" . $key['det_asistencia']. "</span>";
                                else if ($key['det_asistencia']=="Falta")
                                    echo "<span class='gris'>" . $key['det_asistencia']. "</span>";
                                    
                                ?> 
                            
                            </td>

                            <td style="text-align:center;">
                                <buttom class="btn btn-warning" data-toggle="modal" data-target="#EditarClase" onclick="obtener_id(<?php echo $key['id_detalle_clases_manejo'];?> , <?php echo $key['id_clase_manejo'];?>)"> Editar </buttom>
                            </td>

                            <td style="text-align:center;">
                                <a href="#"
                                class="btn btn-danger">Eliminar</a>
                            </td>
                            
                            
                        </tr>
                        <?php endforeach; } else{
                            echo " "; } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="clases">
            <button id="clase" type="button" class="btn btn-success" data-toggle="modal" data-target=".bd-example-modal-lg">Añadir clase</button>
        </div>
    </form>
    </div>



<form action="../CONTROLADORES/ClasesControlador.php?op=2" method="post">
    <div class="comentarios">  
        <div id="comentarios" class="form-group">
            <label class="coment">Comentarios</label>
            
            <textarea name="comentario" style="width:98%" class="form-control" rows="3"> <?php 
            if( $listaClases[0]['clas_descripcion'] == null){
                if(isset($clase_manejo)){
                    echo $clase_manejo[0]["clas_descripcion"];
                }else{
                    echo "";
                }
            }else{
                echo $listaClases[0]['clas_descripcion'] ;
            }

            ?> </textarea>
        </div>
        <div class="botones">

        <input type="hidden" name="id_clase" value=" <?php 

            if( $listaClases[0]['id_clase_manejo'] == null){
                if(isset($clase_manejo)){
                    echo $clase_manejo[0]["id_clase_manejo"];
                }
            }else{
                echo $listaClases[0]['id_clase_manejo'] ;
            }
            ?> ">
        
        <input type="hidden" name="id_instructor" value=" <?php 
            if( $listaClases[0]['id_instructor'] == null){
                if(isset($clase_manejo)){
                    echo $clase_manejo[0]["id_instructor"];
                }
            }else{
                echo $listaClases[0]['id_instructor'] ;
            } ?> ">

            <input type="submit" name="editarComentario" class="btn btn-warning" value="Editar Comentario"> 
            <buttom class="btn btn-success" data-toggle="modal" data-target="#crear_programacion"> Añadir programacion </buttom>
        </div>
    
    </div>
</form>

</section>
    <footer>
        <div class="footer">
            <a class="btn btn-info" href="../CONTROLADORES/ClasesControlador.php?op=4"> Volver a Dias </a>
            <a href="MenuPrincipal.php" class="btn btn-secondary">  Volver al Menu </a>
        </div>
    </footer>

    <?php include('../VISTAS/TEMPLATES/ImportacionesPie.php'); ?>
    <?php include('../VISTAS/TEMPLATES/modal_creacion.php'); ?>
    <script src="../LIBRERIAS/JS/DataTable_agnos.js"></script>
    <script>
        $(document).ready(function () {
            var texto = $("#ninguno").text();
        
            if(texto != ""){
                $("#clase").hide(); 
            }   
            if(texto == ""){
                $("#clase").show();
            } 
        });

//permite obtener el id de la clase  y colocarlo en el modal

        function obtener_id(id_detalle, id_clase) {
            let id_detalle_env = id_detalle;
            let id_clase_env = id_clase;
            
            $("#detalle").val(id_detalle_env);
            $("#clase_antigua").val(id_clase_env);
        }





    </script>
    
</body>
</html>