<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Años</title>
    <?php include './cabecera.php'; ?>
</head>
<body>
    <link rel="stylesheet" href="../../LIBRERIAS/CSS/estilos_agnos.css">
    <header>
        <div class="titulo">
            <h1> Menu de Mantenimientos </h1>
    
    </div>
    </header>
    
    <!-- Nav Lista de botones -->
<nav class="navbar navbar-expand-sm   " style="background-color: gray; ">

        <form class="form-inline" method="post" method="post">           
        <a  class="nav nav-link btn btn-info  " href="../../CONTROLADORES/MantenimientosControlador.php?op=1" type="submit" >Inicio</a>                    
        <a style="margin-left: 5px"  class="nav-link btn btn-info  " href="../../CONTROLADORES/MantenimientosControlador.php?op=10" type="submit" >Gestionar Coches</a> 
        <a  style="margin-left: 5px" class="nav nav-link btn btn-info" href=../../CONTROLADORES/MantenimientosControlador.php?op=20" type="submit" >Gestionar Alumnos</a>
        <a style="margin-left: 5px" class="nav nav-link btn btn-info"href="../../CONTROLADORES/MantenimientosControlador.php?op=30" type="submit" >Gestionar Cursos</a>
         <a style="margin-left: 5px" class="nav nav-link btn btn-info"href="../../CONTROLADORES/MantenimientosControlador.php?op=34" type="submit" >Gestionar Instructores</a>


        <!-- <button class="btn btn-info" type="submit">Gestionar Instructores</button>
        <button class="btn btn-info" type="submit">Empleados Alumnos</button>
        <button class="btn btn-info" type="submit">Gestionar Instructores</button>
        <input class="form-control mr-sm-2" type="text" placeholder="Search">
        <button class="btn btn-success" type="submit">Search</button> -->
        </form>
    </nav>

    <center>        

    </center>
 
</body>
</html>