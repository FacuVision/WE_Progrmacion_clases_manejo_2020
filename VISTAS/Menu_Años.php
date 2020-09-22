<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Años</title>
    <?php include('../VISTAS/TEMPLATES/ImportacionesCabecera.php'); ?>
    <link rel="stylesheet" href="../LIBRERIAS/CSS/estilos_agno.css">

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
                <table id="example"  class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Año</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <a  class="btn btn-light" href="../CONTROLADORES/ProgramacionControlador.php?op=2" >  2021 </a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a  class="btn btn-light" href="../CONTROLADORES/ProgramacionControlador.php?op=2" >  2022 </a>
                            </td>
                        </tr>
                    </tbody>

                </table>

            </div>
        </div>
    </div>
</section>
    <footer>
        <div class="footer">
            <a href="#" class="btn btn-success"> Crear Año </a>
            <a href="#" class="btn btn-danger"> Eliminar Año </a>
            <a id="Regresar" href="#" class="btn btn-info"> Volver al Menu </a>
        </div>
    </footer>

    </form>
    <?php include('../VISTAS/TEMPLATES/ImportacionesPie.php.'); ?>
    <script src="../../LIBRERIAS/JS/DataTable_agnos.js"></script>
</body>
</html>