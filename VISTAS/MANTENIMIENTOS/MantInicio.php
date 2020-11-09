<?php
session_start();
 $listaglobal=$_SESSION['listaglobal'];
// var_dump($listaglobal);

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!--  Datatables  -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.css"/>  

    <!--  extension responsive  -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css">
    <title>Menu Años</title>
    <?php  include './cabecera.php'; ?>
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
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent"  >
    <a  class="nav nav-link btn btn-info  " href="../../VISTAS/MenuPrincipal.php" type="submit" >Volver al Menu Principal</a>                      
        <a style="margin-left: 5px"  class="nav nav-link btn btn-info  " href="../../CONTROLADORES/MantenimientosControlador.php?op=1" type="submit" >Inicio</a>                    
        <a style="margin-left: 5px"  class="nav-link btn btn-info  " href="../../CONTROLADORES/MantenimientosControlador.php?op=10" type="submit" > Coches</a> 
        <a  style="margin-left: 5px" class="nav nav-link btn btn-info" href=../../CONTROLADORES/MantenimientosControlador.php?op=20" type="submit" > Alumnos</a>
        <a style="margin-left: 5px" class="nav nav-link btn btn-info"href="../../CONTROLADORES/MantenimientosControlador.php?op=30" type="submit" > Cursos</a>
         <a style="margin-left: 5px" class="nav nav-link btn btn-info"href="../../CONTROLADORES/MantenimientosControlador.php?op=34" type="submit" > Instructores</a>
         <a style="margin-left: 5px" class="nav nav-link btn btn-info"href="../../CONTROLADORES/MantenimientosControlador.php?op=2" type="submit" > Administradores</a>

    </ul>
     
  </div>
</nav>

      <h5>Lista de Horarios</h5>
        <br>
      
            <div class="col-lg-11"> 
                 
                <br> 
            
            	<table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
               <tr class="text-center">
                     <th>Horario</th>
                  <th>Fecha</th>
                  <th>Alumno</th>
                  <th>Tipo de Curso</th>
                  <th>N° clase</th>
                  <th>Tipo de Coche</th>
                  <th>hechas/ Total</th>
                  <th>Asistencia</th>
                  <th>Instructor</th>
                  <th>Descripción</th>
                </tr>
            </thead>
            <tbody>
            <?php
            foreach ($listaglobal as $list):  ?>
            <tr class=" ">
                <td><?php echo $list['det_horario']?></td>
				<td><?php echo $list['clas_fecha']?></td>
				<td><?php echo $list['alumno']?></td>
				<td><?php echo $list['cur_nombre']?></td>
                <td><?php echo $list['det_n_clase']?></td>
                <td><?php echo $list['coche_tipo']?></td>
				<td><?php echo $list['hechas_total']?></td>
				<td><?php echo $list['det_asistencia']?></td>
				<td><?php echo $list['Instructor']?></td>
                <td><?php echo $list['cur_descripcion']?></td>
             </tr>
             <?php endforeach ?> 
             </tbody>
            </table>    
        </div>
         <!-- <?php // include './footer.php'; ?>


         <script src="../../LIBRERIAS/JS/DataTables_normal.js"></script>
  -->
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
            
    <!--   Datatables-->
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.js"></script>  
      
    <!-- extension responsive -->
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
 <script>
    $(document).ready(function() {
        $('#example').DataTable({
            responsive: true
        });
    } );  
    
    </script>
</body>
</html>