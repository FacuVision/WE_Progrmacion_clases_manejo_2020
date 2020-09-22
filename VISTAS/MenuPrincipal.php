<?php
session_start();
    if (!empty($_SESSION['nombre'])) 
    {
        $nombreUsuario = $_SESSION['nombre'];   
    } else{
        echo '<script> document.location.href="Login.php";</script>';  
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Principal</title>
    <?php include('../VISTAS/TEMPLATES/ImportacionesCabecera.php'); ?>
    <link rel="stylesheet" href="../LIBRERIAS/CSS/Estilos_Menu_Principal.css">
</head>


<body>


    <header>
    <div class="titulo">
        <h1>Programacion de Clases JFK</h1>
    </div>
    </header>
    <section>
        <div class="agrupacion">
            
        <div class="container">
                <img src="../LIBRERIAS/images/diseno.png"  class="image">
                <a href="../CONTROLADORES/MantenimientosControlador.php">
                <div class="overlay">
                    <div class="text">Mantenimientos</div>
                </div> 
                </a>
        </div>

            <div class="container">
                <img src="../LIBRERIAS/images/calendario.png" class="image">
                <a href="../CONTROLADORES/ProgramacionControlador.php?op=1">
                <div class="overlay">
                    <div class="text">Programacion de Clases</div>
                </div>
                </a>
            </div>


            <div class="container">
                <img src="../LIBRERIAS/images/flecha.png" class="image">
                
                <a data-toggle="modal" data-target="#exampleModal">
                <div class="overlay">
                    <div class="text">Cerrar Sesion</div>
                </div>
                </a>
            </div>         
        </div>

    </section>
    <footer>
        <div class="bienvenido">
            <h5>Bienvenido <?php echo $nombreUsuario;?></h5>
        </div>
    </footer>
    <?php include('../VISTAS/TEMPLATES/ImportacionesPie.php'); ?>
    <?php include('../VISTAS/TEMPLATES/modal_confirmacion_01.php'); ?>

</body>

</html>