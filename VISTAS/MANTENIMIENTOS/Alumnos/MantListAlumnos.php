<!DOCTYPE html>
<?php
session_start();  
$listaAlum=$_SESSION['listaAlum'];
// include "../../LIBRERIAS/Bootstrap/css/bootstrap.css";
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
          <h5>Lista de Alumnos</h5>
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
                  <th>Nombre</th>
                  <th>Apellido</th>
                  <th>Telefono</th>
                  <th>Correo</th>
                  <th>Estado_pago</th>
                  <th>Estado</th>
                  <th>Opciones</th>
                  <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
            <?php
            foreach ($listaAlum as $list):  ?>
            <tr class="text-center">
                <td><?php echo $list['id_alumno']?></td>
				<td><?php echo $list['alum_nombre']?></td>
				<td><?php echo $list['alum_apellido']?></td>
				<td><?php echo $list['alum_telefono']?></td>
				<td><?php echo $list['alum_correo']?></td>
               <td><?php echo $list['alum_estado_pago']?></td>
               <td><?php echo $list['alum_estado']?></td>  
                <td> <button class="btn btn-warning" data-toggle="modal"   data-target="#modalEdicion"
                onclick="llenarModalEditar(<?php echo $list['id_alumno']?>,'<?php echo $list['alum_nombre']?>','<?php echo $list['alum_apellido']?>','<?php echo $list['alum_telefono']?>','<?php echo $list['alum_correo']?>','<?php echo $list['alum_estado_pago']?>','<?php echo $list['alum_estado']?>')"
                >Editar</td>
                <form action="../../../CONTROLADORES/MantenimientosControlador.php?op=23" method="post">   
                <input type="hidden" name="id"value="<?php echo $list['id_alumno']?>" >
                <td><input value="Eliminar" type="submit" class="btn btn-danger"> </td>   
                 </form> 
             </tr>
             <?php endforeach ?> 
             </tbody>
            </table>    
        </div>
     
      <script>   
        
          function llenarModalEditar(Aid,Anombre, Aapellido, Atelefono, Acorreo, Aestadopago,Aestado){
          let id = Aid;
          let nombre = Anombre;
          let ape = Aapellido;
          let tel = Atelefono;
          let cor = Acorreo;
          let epago = Aestadopago;
          let estado = Aestado;

        //alert( id  +" "+nombre   +" "+ape  +"  "+tel      +"  "+  cor +" "+epago +"  "+ estado );
          $('#idu').val(id);
          $('#alumNomu').val(nombre);
          $('#alumApeu').val(ape);
          $('#alumTelu').val(tel);
          $('#alumEmailu').val(cor);
          $('#alumEstPagou').val(epago);
          $('#estadou').val(estado);
      }
      </script>

      <script>
    $(document).ready(function () {
         $("#telefono").attr("title", "Un telefono celular contiene 9 dígitos, Ingresa solo 9 dígitos");
            $("#telefono").attr("pattern", "[0-9]{9}");
             $("#alumTelu").attr("title", "Un telefono celular contiene 9 dígitos, Ingresa solo 9 dígitos");
            $("#alumTelu").attr("pattern", "[0-9]{9}");
        });

  
</script>
     <!-- Modal para edicion de datos -->
    <form action="../../../CONTROLADORES/MantenimientosControlador.php?op=22" method="post">
        <div class="modal fade" id="modalEdicion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                   <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Actualizar coche </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                            <input type="hidden" name="id" id="idu" class="form-control input-sm">
                        <div class="form-group">
                            <label >Nombre del Alumno</label>
                            <input type="text" name="nombre" id="alumNomu" class="form-control input-sm"required>
                        </div>
                    <div class="form-group">
                        <label>Apellidos</label>
                        <input type="text" name="apellido" id="alumApeu" class="form-control input-sm"required>
                    </div>
                    <div class="form-group">
                        <label>Telefono</label>
                        <input type="text" name="telefono" id="alumTelu" class="form-control input-sm"required>
                    </div>
                    <div class="form-group">
                        <label>correo</label>
                        <input type="email" name="correo" id="alumEmailu" class="form-control input-sm"required>
                    </div>
                    <div class="form-group">
                        <label>Estado de Pago</label>
                        <input type="text" name="estadopago" id="alumEstPagou" class="form-control input-sm"required>
                    </div>
                     <div class="form-group">
                      <label>Estado</label>
                        <select name="estado" id="estadou" >
                          <option  class="form-control input-sm"    value="Habilitado">Habilitado</option>
                          <option class="form-control input-sm"   value="Inhabilitado">Inhabilitado</option>
                        </select>
                    </div>
                        </div>
                    <div class="modal-footer">
                    <input value="actualizar" type="submit" class="btn btn-warning">
                    </div>
                </div>
            </div>
        </div> 
    </form>

 <!-- Modal  añadir coche-->
 <form name="form"method="post" action="../../../CONTROLADORES/MantenimientosControlador.php?op=21">
    <div class="modal fade" id="crear_agno" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> Añadir Alumno </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
                <div class="modal-body">
                        <div class="form-group">
                            <label >Nombre del Alumno</label>
                            <input type="text" name="nombre"   class="form-control input-sm"required>
                        </div>
                    <div class="form-group">
                        <label>Apellidos</label>
                        <input type="text" name="apellido"   class="form-control input-sm"required>
                    </div>
                    <div class="form-group">
                        <label>Telefono</label>
                        <input type="text" name="telefono" id="telefono"  class="form-control input-sm"required>
                    </div>
                    <div class="form-group">
                        <label>correo</label>
                        <input type="email" name="correo"   class="form-control input-sm"required>
                    </div>
                    <div class="form-group">
                        <label>Estado de Pago</label>
                        <input type="text" name="estadopago"   class="form-control input-sm"required>
                    </div>
                     <div class="form-group">
                      <label>Estado</label>
                        <select name="estado"   >
                          <option  class="form-control input-sm"    value="Habilitado">Habilitado</option>
                          <option class="form-control input-sm"   value="Inhabilitado">Inhabilitado</option>
                        </select>
                    </div>
                    </div>
            <div class="modal-footer">
                <!-- <input value="Insertar" type="submit" class="btn btn-success"> -->
            <input value="Insertar" type="submit" id="boton" class="btn btn-success">
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