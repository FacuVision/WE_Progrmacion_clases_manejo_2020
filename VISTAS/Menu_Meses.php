<?php
session_start();
    if (!empty($_SESSION['nombre'])) 
    {
        $lista_meses = $_SESSION['lista_meses']; 

        $array_meses= array(1 => "Enero", 2 =>  "Febrero", 3 => "Marzo", 4 =>  'Abril',5=> "Mayo", 6=> "Junio", 7 => "Julio", 8 =>"Agosto", 9=>"Septiembre", 10=>"Octubre", 11=>"Noviembre", 12 => "Diciembre" ); 
    } else{
        echo '<script> document.location.href="Login.php";</script>';  
    }

?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Meses</title>
    <?php include('../VISTAS/TEMPLATES/ImportacionesCabecera.php'); ?>
    <link rel="stylesheet" href="../LIBRERIAS/CSS/estilo_meses.css">

</head>

<body>
    <header>
    <div class="titulo">
        <h1>Meses del <?php echo $_SESSION['fechas']['año']?></h1>
        <h5>Selecciona un mes para realizar la programacion de las clases</h5>
    </div>
    </header>

    <form method="POST">

    
    <section>

    <div class="dataTable">
        <div class="row">
            <div class="col-lg-12">
                <table id="example"  class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Numero Mes</th>
                            <th>Nombre Mes</th>
                            <th>Accion</th>
                        </tr>
                    </thead>
                    <tbody>
                    
                    <?php
                        if(!empty($lista_meses)){
                        $i = 1;
                        foreach ($lista_meses as $indice): 
                    ?>
                        <tr>
                            <td style="text-align:center;">
                                <a  class="btn btn-light" 
                                href="../CONTROLADORES/ProgramacionControlador.php?op=7&id_mes=<?php echo $indice['id_mes'];?>&nombre_mes=<?php echo $array_meses[$indice['mes_numero']];?>&numero_mes=<?php echo $indice['mes_numero']; ?>" >  
                                
                                <?php  
                                if($indice['mes_numero']=="11" || $indice['mes_numero']=="12" || $indice['mes_numero']=="10" ) 
                                {echo $indice['mes_numero'];}
                                else{echo "0". $indice['mes_numero'];} 
                                ?> 
                                </a>
                            </td>



                            <td style="text-align:center;">
                                <?php echo $array_meses[$indice['mes_numero']];  $i++?>
                            </td>


                            <td style="text-align:center;">
                                <a href="../CONTROLADORES/ProgramacionControlador.php?op=5&id_mes=<?php echo $indice['id_mes'];?>"
                                class="btn btn-danger">Eliminar</a>
                            </td>


                        </tr>
                        <?php endforeach; } else{
                            echo "<p> Aun no tienes años registrados </p>";} ?>
                
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
    <footer>
        <div class="footer">
            <a class="btn btn-secondary" href="MenuPrincipal.php" > 
                Volver al Menu
            </a>
            <buttom class="btn btn-success" data-toggle="modal" data-target="#crear_mes" > 
            Crear Mes
            </buttom>


            <a id="Regresar" href="../CONTROLADORES/ProgramacionControlador.php?op=1" class="btn btn-info">
                Volver a Años 
            </a>



        </div>
    </footer>

    </form>
    <?php include('../VISTAS/TEMPLATES/ImportacionesPie.php'); ?>
    <?php include('../VISTAS/TEMPLATES/modal_creacion.php'); ?>
    <script src="../LIBRERIAS/JS/DataTable_agnos.js"></script>
    
</body>
</html>