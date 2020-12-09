    <!DOCTYPE html>
    <?php
    session_start();  
    if (!empty($_SESSION['nombre'])) 
    {
        $listacur=$_SESSION['listaCursos'];
        
        } else{
            echo '<script> document.location.href="../../Login.php";</script>';  
        }
    
    ?>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Coches</title>
        <?php include '../cabecera.php'; ?>
    </head>
    <body>

        <!--header and  Nav Lista de botones -->
    <?php
    include '../url.php';
    ?>
            <h5>Lista de Cursos</h5>
            <br>
        
                <div class="container"> 
                    <buttom class="btn btn-primary" data-toggle="modal" data-target="#crear_agno" > 
                Agregar nuevo 
                </buttom>
                    <br><br>
                
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                <tr class="text-center">
                    <th>ID</th>
                    <th>Nombre del curso</th>
                    <th>Horas</th>
                    <th>Descripcion</th>
                    <th>Opciones</th>
                    <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                <?php

                if(!empty($listacur)){

                    foreach( $listacur as $list):   
                ?>
                
                <tr class="text-center">
                    <td><?php echo $list['id_curso'] ?></td> 
                    <td><?php echo $list['cur_nombre'] ?></td>
                    <td><?php echo $list['cur_horas'] ?></td>
                    <td><?php echo $list['cur_descripcion'] ?></td>
                    <td> <button class="btn btn-warning" data-toggle="modal"   data-target="#modalEdicion"
                    onclick="llenarModalEdit('<?php echo $list['id_curso'] ?>','<?php echo $list['cur_nombre'] ?>','<?php echo $list['cur_horas'] ?>','<?php echo $list['cur_descripcion'] ?>')"
                    >Editar</td>
                    <form action="../../../CONTROLADORES/MantenimientosControlador.php?op=33" method="post">   
                    <input type="hidden" name="id"value="<?php echo $list['id_curso'] ?>" >
                    <td><input value="Eliminar" type="submit" class="btn btn-danger"> </td>   
                    </form> 
                </tr>
                <?php endforeach;
                
                    } else{
                        echo "<p> Aun no tienes cursos registrados </p>";
                    }
                ?>  
                </tbody>
                </table>    
            </div>
        
        <script>   
            
            function llenarModalEdit(ide,n,h,d){
            let id = ide;
            let nombre = n;
            let hora = h;
            let descripcion=d
            $('#idu').val(id);
            $('#curNombreu').val(nombre);
            $('#horaCursou').val(hora);
            $('#curDescripcionu').val(descripcion);
        }
        </script>

        <!-- Modal para edicion de datos -->
        <form action="../../../CONTROLADORES/MantenimientosControlador.php?op=32" method="post">
            <div class="modal fade" id="modalEdicion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Actualizar Curso </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                                <input type="hidden" name="id" id="idu" class="form-control input-sm">
                            <div class="form-group">
                                <label >Nombre del Curso</label>
                                <input type="text" name="nombre" id="curNombreu" class="form-control input-sm"required>
                            </div>
                            <div class="form-group">
                                <label>Horas del curso</label>
                                <input type="number" name="horas" id="horaCursou" class="form-control input-sm"required>
                            </div>
                            <div class="form-group">
                                <label >Descripción del Curso</label>
                                <textarea name="descripcion" id="curDescripcionu" cols="20" rows="5" class="form-control input-sm" required></textarea>
                                <!-- <input type="text" name="" id="curDescripocionu" class="form-control input-sm" > -->
                            </div>
                        </div>
                        <div class="modal-footer">
                        <input value="actualizar" type="submit" class="btn btn-warning">
                        </div>
                    </div>
                </div>
            </div> 
        </form>



    <!-- Modal  añadir curso-->
    <form name="form"method="post" action="../../../CONTROLADORES/MantenimientosControlador.php?op=31">
        <div class="modal fade" id="crear_agno" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Agregar Nuevo Curso </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                    <div class="modal-body">
                            <div class="form-group">
                                <label >Nombre del Curso</label>
                                <input type="text" name="nombre" id="curNombre" class="form-control input-sm"required>
                            </div>
                            <div class="form-group">
                                <label>Horas del curso</label>
                                <input type="number" min="1" name="horas" id="horaCurso" class="form-control input-sm"required>
                            </div>
                            <div class="form-group">
                                <label >Descripción del Curso</label>
                                <textarea name="descripcion" id="curDescripcion" cols="20" rows="5" class="form-control input-sm"required></textarea>
                            </div>

                            </div>
                <div class="modal-footer">
                    <!-- <input value="Insertar" type="submit" class="btn btn-success"> -->
                <input value="Insertar" type="submit" class="btn btn-success">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
                </div>
            </div>
        </div>
    </form>

    <br><br><br><br>
    <?php include '../footer.php'; ?>
    <script src="../../../LIBRERIAS/JS/DataTables_normal.js"></script>

    </body>
    </html>