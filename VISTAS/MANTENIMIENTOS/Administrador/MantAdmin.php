<!DOCTYPE html>
<?php
session_start();  
 if (!empty($_SESSION['nombre'])) 
    {
        
        $listaAdmin = $_SESSION['listaAdmin'];
    } else{
        echo '<script> document.location.href="../../Login.php";</script>';  
    }
    // var_dump($listaAdmin);
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
          <h5>Lista de Administradores</h5>
        <br>
            <div class="container"> 
                 <buttom class="btn btn-primary" data-toggle="modal" data-target="#crear_agno" > 
            Agregar nuevo 
            </buttom>
                <br><br>
            	<table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
               <tr class="text-center">
                    <th>ID </th>
                   <th>Nombre</th>
                   <th>Apellidos</th>
                   <th>Telefono</th>
                   <th>Correo</th>
                   <th>Contraseña</th>
                   <th>Estado</th>
                   <th>Editar</th>
                   <th>Eliminar</th>

                </tr>
            </thead>
            <tbody>             
            <?php foreach( $listaAdmin as $admin):   ?>
            <tr class="text-center">
                 <td>#<?php echo $admin['id_administrador']?></td>
                 <td><?php echo $admin['emp_nombre']?></td>
                 <td><?php echo $admin['emp_apellido']?></td>
                 <td><?php echo $admin['emp_telefono']?></td>
                 <td><?php echo $admin['emp_correo']?></td>
                 <td><?php echo $admin['admin_contra']?></td>
                 <td><?php echo $admin['admin_estado']?></td>

                <td> <button class="btn btn-warning" data-toggle="modal"   data-target="#modalEdicion"
                onclick="llenarModalEdit('<?php echo $admin['id_administrador']?>','<?php echo $admin['id_empleado']?>','<?php echo $admin['emp_nombre']?>','<?php echo $admin['emp_apellido']?>','<?php echo $admin['emp_telefono']?>','<?php echo $admin['emp_correo']?>','<?php echo $admin['admin_contra']?>','<?php echo $admin['admin_estado']?>')"
                >Editar</td>
                <form action="../../../CONTROLADORES/MantenimientosControlador.php?op=4" method="post">   
                <input type="hidden" name="idamin"value="<?php echo $admin['id_administrador']?> " >
                <input type="hidden" name="idemple"value="<?php echo $admin['id_empleado']?>" >
                <td><input value="Eliminar" type="submit" class="btn btn-danger"> </td>   
                </form> 
             </tr>
             <?php endforeach ?>  
             </tbody>
            </table>    
        </div>
      <script>   
           function llenarModalEdit(ida,ide,nom,ape,tel,cor,pass,est){
               this.ida=ida;
               this.ide=ide;
               this.nombre=nom;
               this.apellido=ape;
               this.telefono=tel;
               this.correo=cor;
               this.pass=pass;
               this.estado=est;   
            
               $('#idAdminu').val(ida);
               $('#idEmpleu').val(ide);
               $('#Anombreu').val(nombre);
               $('#Aapellidou').val(apellido);
               $('#Atelefonou').val(telefono);
               $('#Acorreou').val(correo);
               $('#Apassu').val(pass);
               $('#estadou').val(estado);

      }
   
    $(document).ready(function () {
        $("#Atelefono").attr("title", "Un telefono celular contiene 9 dígitos, Ingresa solo 9 dígitos");
        $("#Atelefono").attr("pattern", "[0-9]{9}");
        $("#Atelefonou").attr("title", "Un telefono celular contiene 9 dígitos, Ingresa solo 9 dígitos");
        $("#Atelefonou").attr("pattern", "[0-9]{9}");
        });

  
</script>

     <!-- Modal para edicion de datos -->
    <form action="../../../CONTROLADORES/MantenimientosControlador.php?op=5" method="post">
        <div class="modal fade" id="modalEdicion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                   <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Actualizar datos del Administrador </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                   <div class="modal-body">
                       <input type="hidden" name="idAdmin" id="idAdminu">
                       <input type="hidden"  name="idEmple" id="idEmpleu" >
                    <div class="form-group">
                        <label >Nombres</label>
                        <input type="text" name="Anombre" id="Anombreu" class="form-control input-sm" required>
                    </div>
                    <div class="form-group">
                        <label>Apellidos</label>
                        <input type="text" name="Aapellido" id="Aapellidou" class="form-control input-sm" required>
                    </div>
                    <div class="form-group">
                        <label>Teléfono</label>
                        <input type="text" name="Atelefono" id="Atelefonou" class="form-control input-sm" required>
                    </div>
                    <div class="form-group">
                        <label>Correo</label>
                        <input type="email" name="Acorreo" id="Acorreou" class="form-control input-sm" required>
                    </div>
                    <div class="form-group">
                        <label>Constraseña</label>
                        <input type="password" name="Apass" id="Apassu" class="form-control input-sm" required>
                    </div>                    
                    <label>Estado</label>
                    <select name="estado" class="form-control " id="estadou" >
                    <option  class="form-control input-sm"    value="Habilitado">Habilitado</option>
                    <option class="form-control input-sm"   value="Inhabilitado">Inhabilitado</option>
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
 <form name="form"method="post" action="../../../CONTROLADORES/MantenimientosControlador.php?op=3">
    <div class="modal fade" id="crear_agno" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> Agregar Nuevo Administrador </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label >Nombres</label>
                        <input type="text" name="Anombre" id="" class="form-control input-sm" required>
                    </div>
                    <div class="form-group">
                        <label>Apellidos</label>
                        <input type="text" name="Aapellido" id="" class="form-control input-sm" required>
                    </div>
                    <div class="form-group">
                        <label>Teléfono</label>
                        <input type="text" name="Atelefono" id="Atelefono" class="form-control input-sm" required>
                    </div>
                    <div class="form-group">
                        <label>Correo</label>
                        <input type="email" name="Acorreo" id="" class="form-control input-sm" required>
                    </div>
                    <div class="form-group">
                        <label>Constraseña</label>
                        <input type="password" name="Apass" id="" class="form-control input-sm" required>
                    </div>                    
                    <label>Estado</label>
                    <select name="estado"   class="form-control" >
                    <option  class="form-control input-sm"    value="Habilitado">Habilitado</option>
                    <option class="form-control input-sm"   value="Inhabilitado">Inhabilitado</option>
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