<?php
session_start();

    if (!empty($_SESSION['nombre'])) 
    {
        $listaClases = $_SESSION['listaClases']; 
        if(isset($_SESSION["seleccion"])){
            $instructorSeleccionado = $_SESSION["seleccion"];
        }

        $instructor = $_SESSION['listaClases']; 
        $listaInstructores = $_SESSION['listaInstructores'];
        $TodoInstructor = $_SESSION['TodoInstructor'];
        $nombre_mes = $_SESSION['fechas']["mes_nombre"];
        $numero_mes = $_SESSION['fechas']['mes'];
        $numero_agno = $_SESSION['fechas']["año"];
        $numero_dia = $_SESSION['fechas']["dia"];
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
    <link rel="stylesheet" href="../LIBRERIAS/CSS/estilo_clase.css">

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
                    <?php foreach ($listaInstructores as $key ) {?>
                        <option  value="<?php echo $key['id_instructor']."-".$key['emp_nombre'];?>"> <?php echo $key['emp_nombre'];?> </option>
                    <?php } ?>
                </select>
                <input type="hidden" name="op" value="11">
                <input class="btn btn-primary" type="submit" value="Seleccionar" name="enviar">
        </form>
        <p> <?php 
        
        if(isset($instructorSeleccionado)){
            echo "Mostrando programacion del instructor ".  $instructorSeleccionado["nombre"];
        } else{
            echo "Aun no has seleccionado ningun Instructor";
        }


        ?></p>
                    
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
                            <td><?php echo $key['det_asistencia'] ?> </td>

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
    </form>
    </div>
</section>
    <footer>
        <div class="footer">

            <a  id="Regresar" class="btn btn-info" href="Menu_dias.php"> Volver a Dias </a>
            
            <a  href="MenuPrincipal.php" class="btn btn-secondary"> 
            Volver al Menu
            </a>
            
            <buttom class="btn btn-success" data-toggle="modal" data-target="#crear_programacion" > 
            Añadir programacion
            </buttom>
        </div>
    </footer>

    
    <?php include('../VISTAS/TEMPLATES/ImportacionesPie.php'); ?>
    <?php include('../VISTAS/TEMPLATES/modal_creacion.php'); ?>
    <script src="../LIBRERIAS/JS/DataTable_agnos.js"></script>
    
</body>
</html>