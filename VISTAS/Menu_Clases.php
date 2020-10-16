<?php
session_start();
    if (!empty($_SESSION['nombre'])) 
    {
        $listaClases = $_SESSION['listaClases']; 
        $nombre_mes = $_SESSION['fechas']["mes_nombre"];
        $numero_mes = $_SESSION['fechas']['mes'];
        $numero_agno = $_SESSION['fechas']["año"];
        $numero_dia = $_SESSION['fechas']["dia"];

    /* echo '<pre>' . var_export($_SESSION['fechas'], true) . '</pre>';
        echo '<pre>' . var_export($_SESSION['id_fechas'], true) . '</pre>';*/


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
        <h5>Se muestran las programaciones de las clases completas (Las incompletas no se mostraran)</h5>
    </div>
    </header>

    <form method="POST">

    
    <section>

    <div class="dataTable">
        <p class="instructor">
        <?php echo "Instructor  "  . $listaClases[0]['emp_nombre'] ?>
        </p>
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
                            echo "<p> Aun no tienes años registrados </p>"; } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
    <footer>
        <div class="footer">

            <a  id="Regresar" class="btn btn-info" href="Menu_dias.php"> Volver a Dias </a>
            
            <a  href="MenuPrincipal.php" class="btn btn-secondary"> 
            Volver al Menu
            </a>
            
            <buttom class="btn btn-success" data-toggle="modal" data-target="#crear_dias" > 
            Crear Dia 
            </buttom>
        </div>
    </footer>

    </form>
    <?php include('../VISTAS/TEMPLATES/ImportacionesPie.php'); ?>
    <?php include('../VISTAS/TEMPLATES/modal_creacion.php'); ?>
    <script src="../LIBRERIAS/JS/DataTable_agnos.js"></script>
    
</body>
</html>