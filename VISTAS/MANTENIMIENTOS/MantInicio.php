<?php
    session_start();
    if (!empty($_SESSION['nombre'])) 
    {
        $listaglobal=$_SESSION['listaglobal'];
        
    } else{
        echo '<script> document.location.href="../Login.php";</script>';  
    }
    ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prog. Clases General</title>
    <?php include('../../VISTAS/TEMPLATES/ImportacionesCabecera.php'); ?>
    <link rel="stylesheet" href="../../LIBRERIAS/CSS/estilo_clases.css">

</head>

<body>
    <link rel="stylesheet" href="../../LIBRERIAS/CSS/estilos_agnos.css">
    <header>
        <div class="titulo">
            <h1> Menu de Mantenimientos </h1>
        </div>
    </header>


    <!-- Nav Lista de botones -->
    <nav class="navbar navbar-expand-sm " style="background-color: whitesmoke; ">
        <a class="navbar-brand" href="#"> </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <a class="nav nav-link btn btn-secondary  " href="../../VISTAS/MenuPrincipal.php" type="submit">Volver al Menu
                Principal</a>
            <a style="margin-left: 5px" class="nav nav-link btn btn-info  "
                href="../../CONTROLADORES/MantenimientosControlador.php?op=1" type="submit">Inicio</a>
            <a style="margin-left: 5px" class="nav-link btn btn-info"
                href="../../CONTROLADORES/MantenimientosControlador.php?op=10" type="submit"> Coches</a>
            <a style="margin-left: 5px" class="nav nav-link btn btn-info"
                href=../../CONTROLADORES/MantenimientosControlador.php?op=20" type="submit"> Alumnos</a>
            <a style="margin-left: 5px" class="nav nav-link btn btn-info"
                href="../../CONTROLADORES/MantenimientosControlador.php?op=30" type="submit"> Cursos</a>
            <a style="margin-left: 5px" class="nav nav-link btn btn-info"
                href="../../CONTROLADORES/MantenimientosControlador.php?op=34" type="submit"> Instructores</a>
            <a style="margin-left: 5px" class="nav nav-link btn btn-info"
                href="../../CONTROLADORES/MantenimientosControlador.php?op=2" type="submit"> Administradores</a>
            </ul>
        </div>
    </nav>

    <h5>Lista General</h5>
    <br>
    
    <div class="col-lg" style="padding: 0px 3%">

        <br>
        <table id="example" class="table table-striped table-bordered" style="width:100%">

            <thead>
                <tr class="text-center">
                    <th>Horario</th>
                    <th>Fecha</th>
                    <th>Alumno</th>
                    <th>Tipo de Curso</th>
                    <th>Tipo de Coche</th>
                    <th>hechas/ Total</th>
                    <th>Asistencia</th>
                    <th>Instructor</th>
                    <th>Descripción</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    if(!empty($listaglobal)){
                    foreach( $listaglobal as $list):   
                ?>

                <tr class=" ">
                    <td><?php echo $list['det_horario']?></td>
                    <td><?php echo $list['clas_fecha']?></td>
                    <td><?php echo $list['alumno']?></td>
                    <td><?php echo $list['cur_nombre']?></td>
                    <td><?php echo $list['coche_tipo']?></td>
                    <td><?php echo $list['hechas_total']?></td>
                    <td><?php echo $list['det_asistencia']?></td>
                    <td><?php echo $list['Instructor']?></td>
                    <td><?php echo $list['clas_descripcion']?></td>
                </tr>
                <?php endforeach;
                
            } else{
                echo "<p> Aun no tienes registros generales </p>";
            }
        ?>   
            </tbody>
        </table>
    </div>
    <!-- jQuery, Popper.js, Bootstrap JS -->

        <script src="../../LIBRERIAS/reportes_recursos/jquery/jquery-3.3.1.min.js"></script>
        <script src="../../LIBRERIAS/reportes_recursos/popper/popper.min.js"></script>
        <script src="../../LIBRERIAS/reportes_recursos/bootstrap/js/bootstrap.min.js"></script>
        
        <!-- datatables JS -->
        <script type="text/javascript" src="../../LIBRERIAS/reportes_recursos/datatables/datatables.min.js"></script>    
        
        <!-- para usar botones en datatables JS -->  
        <script src="../../LIBRERIAS/reportes_recursosdatatables/Buttons-1.5.6/js/dataTables.buttons.min.js"></script>  
        <script src="../../LIBRERIAS/reportes_recursosdatatables/JSZip-2.5.0/jszip.min.js"></script>    
        <script src="../../LIBRERIAS/reportes_recursosdatatables/pdfmake-0.1.36/pdfmake.min.js"></script>    
        <script src="../../LIBRERIAS/reportes_recursosdatatables/pdfmake-0.1.36/vfs_fonts.js"></script>
        <script src="../../LIBRERIAS/reportes_recursosdatatables/Buttons-1.5.6/js/buttons.html5.min.js"></script>
        
        <!-- código JS propìo-->    
        <script type="text/javascript" src="../../LIBRERIAS/reportes_recursos/main.js"></script>  

</body>

</html>