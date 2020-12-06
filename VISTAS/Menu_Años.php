<?php
session_start();

    if (!empty($_SESSION['nombre'])) 
    {
        $nombreUsuario = $_SESSION['nombre']; 
        $lista_agnos = $_SESSION['lista_agnos'];   
    }else{
        echo '<script> document.location.href="Login.php";</script>';  
    }
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Años</title>
    <?php include('../VISTAS/TEMPLATES/ImportacionesCabecera.php'); ?>
    <link rel="stylesheet" href="../LIBRERIAS/CSS/estilos_agnos.css">

</head>

<body>
    <header>
    <div class="titulo">
        <h1>Años</h1>
        <h5>Selecciona o crea años para realizar la programacion de las clases</h5>
    </div>
    </header>

    <form method="POST">

    
    <section>

    <div class="dataTable">
        <div class="row">
            <div class="col-lg-12">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Año</th>
                            <th>Accion</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                    if(!empty($lista_agnos)){

                    foreach ($lista_agnos as $indice): ?>
                        <tr>
                            <td style="text-align:center;">
                                <a name="eligio_agno" class="btn btn-light" 
                                href="../CONTROLADORES/ProgramacionControlador.php?op=4&id_agno=<?php echo $indice['id_agno'];?>&agno_numero=<?php echo $indice['agno_numero'];?>" >  
                                <?php echo $indice['agno_numero']; ?> 
                                </a>
                                
                            </td>
                            <td style="text-align:center;">
                            <a href="../CONTROLADORES/ProgramacionControlador.php?op=3&id_agno=<?php echo $indice['id_agno'];?>"
                                class="btn btn-danger">Eliminar</a>
                            </td>
                        </tr>
                    <?php endforeach;}
                    else{
                        echo "<p> Aun no tienes años registrados </p>";
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
    <footer>
        <div class="footer">

            <buttom class="btn btn-success" data-toggle="modal" data-target="#crear_agno" > 
            Crear Año 
            </buttom>
            
            <a id="Regresar" href="MenuPrincipal.php" class="btn btn-info"> Volver al Menu </a>
        </div>
    </footer>

    </form>
    <?php include('../VISTAS/TEMPLATES/ImportacionesPie.php'); ?>
    <?php include('../VISTAS/TEMPLATES/modal_creacion.php'); ?>
    <script src="../LIBRERIAS/JS/DataTable_reducido.js"></script>
    
</body>
</html>