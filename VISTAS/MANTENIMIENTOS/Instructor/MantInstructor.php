    <!DOCTYPE html>
    <?php
    session_start();  
    if (!empty($_SESSION['nombre'])) 
        {
            
            $listaInstuctores = $_SESSION['listaInstructor'];
        } else{
            echo '<script> document.location.href="../../Login.php";</script>';  
        }
    //var_dump( $listaInstuctores);
    
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
            <h5>Lista de Instructores</h5>
            <br>
        
                <div class="container"> 
                    <buttom class="btn btn-primary" data-toggle="modal" data-target="#crear_agno" > 
                Agregar nuevo 
                </buttom>
                    <br><br>
                
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                <tr class="text-center">
                    <th>ID instructor</th>
                    <th>ID Empleado</th>
                    <th>Instructor</th>
                    <th>Apellidos</th>
                    <th>Telefono</th>
                    <th>Correo</th>
                    <th>Estado</th>
                    <th>Editar</th>
                    <th>Eliminar</th>

                    </tr>
                </thead>
                <tbody>      

                <?php
                    if(!empty($listaInstuctores)){
                    foreach( $listaInstuctores as $instructor):   
                ?>

                <tr class="text-center">
                    <td><?php echo $instructor['id_instructor']?></td>
                    <td><?php  echo $instructor['id_empleado']?></td> 
                    <td><?php echo $instructor['emp_nombre']?></td>
                    <td><?php echo $instructor['emp_apellido']?></td>
                    <td><?php echo $instructor['emp_telefono']?></td>
                    <td><?php echo $instructor['emp_correo']?></td>
                    <td><?php echo $instructor['ins_estado']?></td>
                    <td> <button class="btn btn-warning" data-toggle="modal"   data-target="#modalEdicion"
                    onclick="llenarModalEdit('<?php echo $instructor['id_instructor']?>','<?php  echo $instructor['id_empleado']?>','<?php echo $instructor['emp_nombre']?>','<?php echo $instructor['emp_apellido']?>','<?php echo $instructor['emp_telefono']?>','<?php echo $instructor['emp_correo']?>','<?php echo $instructor['ins_estado']?>')"
                    >Editar</td>
                    <form action="../../../CONTROLADORES/MantenimientosControlador.php?op=37" method="post">   
                    <input type="hidden" name="idinstructor"value="<?php echo $instructor['id_instructor']?> " >
                    <input type="hidden" name="idempleado"value="<?php  echo $instructor['id_empleado']?>" >

                    <td><input value="Eliminar" type="submit" class="btn btn-danger"> </td>   
                    </form> 
                </tr>
                <?php endforeach;
                
                    } else{
                        echo "<p> Aun no tienes instructores registrados </p>";
                    }
                ?>                  </tbody>
                </table>    
            </div>
        
        <script>   
            
            function llenarModalEdit( idi,ide,nom,ape,tel,cor,est){
                this.idi=idi;
                this.ide=ide;
                this.nombre=nom;
                this.apellido=ape;
                this.telefono=tel;
                this.correo=cor;
                this.estado=est;            
                
                $('#idInstructoru').val(idi);
                $('#idEmpleadou').val(ide);
                $('#Inombreu').val(nombre);
                $('#Iapellidou').val(apellido);
                $('#Itelefonou').val(telefono);
                $('#Icorreou').val(correo);
                $('#estadou').val(estado);

        }
        </script>

                <script>
        $(document).ready(function () {
            $("#Itelefono").attr("title", "Un telefono celular contiene 9 dígitos, Ingresa solo 9 dígitos");
                $("#Itelefono").attr("pattern", "[0-9]{9}");
                $("#Itelefonou").attr("title", "Un telefono celular contiene 9 dígitos, Ingresa solo 9 dígitos");
                $("#Itelefonou").attr("pattern", "[0-9]{9}");
            });

    
    </script>

        <!-- Modal para edicion de datos -->
        <form action="../../../CONTROLADORES/MantenimientosControlador.php?op=36" method="post">
            <div class="modal fade" id="modalEdicion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Actualizar coche </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <div class="modal-body">
                        <input type="hidden" name="idInstructor" id="idInstructoru">
                        <input type="hidden"  name="idEmpleado" id="idEmpleadou" >
                        <div class="form-group">
                            <label >Nombres</label>
                            <input type="text" name="Inombre" id="Inombreu" class="form-control input-sm" required>
                        </div>
                        <div class="form-group">
                            <label>Apellidos</label>
                            <input type="text" name="Iapellido" id="Iapellidou" class="form-control input-sm" required>
                        </div>
                        <div class="form-group">
                            <label>Teléfono</label>
                            <input type="text" name="Itelefono" id="Itelefonou" class="form-control input-sm" required>
                        </div>
                        <div class="form-group">
                            <label>Correo</label>
                            <input type="email" name="Icorreo" id="Icorreou" class="form-control input-sm" required>
                        </div>
                        <label>Estado</label>
                        <select name="estado" id="estadou" class="form-control">
                        <option  class="form-control input-sm"    value="habilitado">Habilitado</option>
                        <option class="form-control input-sm"   value="inhabilitado">Inhabilitado</option>
                        </select>
                    </div>
                        <div class="modal-footer">
                        <input value="actualizar" type="submit" class="btn btn-warning">
                        </div>
                    </div>
                </div>
            </div> 
        </form>



    <!-- Modal  añadir instructor-->
    <form name="form"method="post" action="../../../CONTROLADORES/MantenimientosControlador.php?op=35">
        <div class="modal fade" id="crear_agno" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Agregar Nuevo Instructor </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label >Nombres</label>
                            <input type="text" name="Inombre" id="" class="form-control input-sm" required>
                        </div>
                        <div class="form-group">
                            <label>Apellidos</label>
                            <input type="text" name="Iapellido" id="" class="form-control input-sm" required>
                        </div>
                        <div class="form-group">
                            <label>Teléfono</label>
                            <input type="text" name="Itelefono" id="Itelefono" class="form-control input-sm" required>
                        </div>
                        <div class="form-group">
                            <label>Correo</label>
                            <input type="email" name="Icorreo" id="" class="form-control input-sm" required>
                        </div>
                        <label>Estado</label>
                        <select name="estado"  class="form-control" >
                        <option  class="form-control input-sm"    value="habilitado">Habilitado</option>
                        <option class="form-control input-sm"   value="inhabilitado">Inhabilitado</option>
                        </select>
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