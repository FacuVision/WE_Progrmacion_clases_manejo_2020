<!DOCTYPE html>
<?php
session_start();  
$listaCoche= $_SESSION['listaCoche'];
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
          <h5>Lista de Coches</h5>
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
                   <th>Coche Modelo</th>
                   <th>Tipo de Coche</th>
                   <th>Placa</th>
                   <th>Marca</th>
                   <th  >Opciones</th>
                   <th  >Opciones</th>

                </tr>
            </thead>
            <tbody>
            <?php
            foreach ($listaCoche as $indice){  ?>
            <tr class="text-center">
                <td><?php echo $indice['id_coche'] ?></td>
                <td><?php echo $indice['coche_modelo'] ?></td>
                <td><?php echo $indice['coche_tipo'] ?></td>
                <td><?php echo $indice['coche_placa'] ?></td>
                <td><?php echo $indice['coche_marca'] ?></td>   
                <td> <button class="btn btn-warning" data-toggle="modal"   data-target="#modalEdicion" 
                onclick="llenarModalEditar('<?php echo $indice['id_coche'] ?>','<?php echo $indice['coche_modelo'] ?>','<?php echo $indice['coche_tipo'] ?>','<?php echo $indice['coche_placa'] ?>','<?php echo $indice['coche_marca'] ?>')";
                >Editar</td>
                <form action="../../../CONTROLADORES/MantenimientosControlador.php?op=13" method="post">   
                <input type="hidden" name="id"value="<?php echo $indice['id_coche'] ?>" >
                <td><input value="Eliminar" type="submit" class="btn btn-danger"> </td>   
                 </form> 
             </tr>
             <?php } ?> 
             </tbody>
            </table>    
        </div>
     
      <script>   
       function eliminar(id){
         this.id=id;   
         document.form.action="../../../CONTROLADORES/MantenimientosControlador.php?op=13&id="+id;
         document.form.method="POST";
         document.form.submit(); 
      }
      function llenarModalEditar(Cid,Cmodelo, Ctipo, Cplaca, Cmarca,){
          let id = Cid;
          let modelo = Cmodelo;
          let tipo = Ctipo;
          let placa = Cplaca;
          let marca = Cmarca;
        //   alert( id  +" "+modelo   +" "+tipo  +"  "+placa      +"  "+  marca   );
        $('#idu').val(id);
        $('#modelou').val(modelo);
        $('#tipococheu').val(tipo);
        $('#placau').val(placa);
        $('#marcau').val(marca);    
      } 
      </script>
     <!-- Modal para edicion de datos -->
    <form action="../../../CONTROLADORES/MantenimientosControlador.php?op=12" method="post">
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
                            <label >Modelo del coche</label>
                            <input type="text" name="modelo" id="modelou" class="form-control input-sm"required>
                        </div>
                        <div class="form-group">   
                            <label>Tipo de Coche</label>
                            <input type="text" name="tipo" id="tipococheu" class="form-control input-sm"required>
                        </div> 
                        <div class="form-group">
                            <label>Placa</label>
                            <input type="text" name="placa" id="placau" class="form-control input-sm"required>
                        </div>
                        <div class="form-group">                    
                            <label>Marca</label>
                            <input type="text" name="marca" id="marcau" class="form-control input-sm"required>
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
 <form name="form"method="post" action="../../../CONTROLADORES/MantenimientosControlador.php?op=11">
    <div class="modal fade" id="crear_agno" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> Crear año </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                        <div class="form-group">
                            <label >Modelo del coche</label>
                            <input type="text"  name="modelo" class="form-control input-sm"required>
                        </div>
                    <div class="form-group">   
                        <label>Tipo de Coche</label>
                        <input type="text"  name="tipocoche" class="form-control input-sm"required>
                    </div> 
                    <div class="form-group">
                        <label>Placa</label>
                        <input type="text"  name="placa" class="form-control input-sm"required>
                    </div>
                    <div class="form-group">                    
                        <label>Marca</label>
                        <input type="text"  name="marca" class="form-control input-sm"required>
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