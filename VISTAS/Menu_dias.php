<?php
session_start();
    if (!empty($_SESSION['nombre'])) 
    {
        $lista_dias = $_SESSION['lista_dias'];   
        $nombre_mes = $_SESSION['fechas']["mes_nombre"];
        $numero_mes = $_SESSION['fechas']['mes'];
        $numero_agno = $_SESSION['fechas']["año"];
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
    <link rel="stylesheet" href="../LIBRERIAS/CSS/estilos_dias.css">

</head>

<body>
    <header>
    <div class="titulo">
        <h1>Dias del mes de <?php echo $nombre_mes; ?> del <?php echo $numero_agno;?></h1>
        <h5>Selecciona o crea dias para realizar la programacion de las clases</h5>
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
                            <th>Dia</th>
                            <th>Estado</th>
                            <th>Accion</th>
                            <th>Accion</th>
                            
                        </tr>
                    </thead>
                    <tbody>

                    <?php
                        if(!empty($lista_dias)){
                        $i = 1;
                        foreach ($lista_dias as $indice): ?>
                        <tr>
                            <td style="text-align:center;">
                                <a  class="btn btn-light" 
                                href="../CONTROLADORES/ProgramacionControlador.php?op=11&numero_dia=<?php echo $indice["dia_numero"];?>&id_dia=<?php echo $indice["id_dia"];?>" >  
                                
                                <?php  
                                if($indice['dia_numero']>=10) 
                                {echo $indice['dia_numero'];}

                                else{echo "0". $indice['dia_numero'];} 
                                ?> 
                                </a>
                            </td>

                            <td>
                                    <?php 
                                    
                                    if($indice["dia_estado"]=="Prog Completa"){
                                        echo "<strong><span style='color:green'>" . $indice["dia_estado"] ."</span></Strong>";
                                    } else{
                                        echo $indice["dia_estado"];
                                    }
                                    ?>
                            </td>

                            <td style="text-align:center;">
                                <buttom class="btn btn-warning" data-toggle="modal" data-target="#editarEstado" onclick="Editar(<?php echo $indice['id_dia']?>)"> Editar </buttom>
                            </td>

                            <td style="text-align:center;">
                                <a href="../CONTROLADORES/ProgramacionControlador.php?op=10&id_dia=<?php echo $indice['id_dia'];?>"
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
        <a class="btn btn-secondary" href="MenuPrincipal.php" > 
                Volver al Menu
            </a>
            <buttom class="btn btn-success" data-toggle="modal" data-target="#crear_dias" > 
            Crear Dia 
            </buttom>
            <a id="Regresar" href="Menu_Meses.php" class="btn btn-info"> Volver a meses </a>
        </div>
    </footer>

    </form>
    <?php include('../VISTAS/TEMPLATES/ImportacionesPie.php'); ?>
    <?php include('../VISTAS/TEMPLATES/modal_creacion.php'); ?>
    <script src="../LIBRERIAS/JS/DataTable_agnos.js"></script>

    <script>
    //permite obtener el id del dia y colocarlo en el modal
        function Editar(id) {
            let id_dia = id;
            $("#id").val(id_dia);
        }
    </script>
    
</body>
</html>