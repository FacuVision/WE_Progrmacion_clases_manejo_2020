<?php
require_once '../BEAN/CocheBean.php';
require_once '../UTILS/ConexionBD.php';

$objCochesBean= new CocheBean();
class M_cochesDAO{
    


    
    public function listarCoches(){
        $instanciacompartida = ConexionBD::getInstance();
        $sql="SELECT * FROM coches";        
        $res = $instanciacompartida->ejecutar($sql);
        $lista = $instanciacompartida->obtener_filas($res);
        $instanciacompartida->setArray(null);
        return $lista;  
    }

     public function agregarCoches($objCochesBean){
        $instanciacompartida = ConexionBD::getInstance();
         
        // $sql="INSERT INTO coches(coche_modelo,coche_tipo,coche_placa,coche_marca)(`id_coche`, `coche_modelo`, `coche_tipo`, `coche_placa`, `coche_marca`) VALUES ('$objCochesBean->coche_modelo','$objCochesBean->coche_tipo','$objCochesBean->coche_placa','$objCochesBean->coche_marca');";
        $sql2="INSERT INTO coches (coche_modelo,coche_tipo,coche_placa,coche_marca) 
    VALUES ('$objCochesBean->coche_modelo','$objCochesBean->coche_tipo','$objCochesBean->coche_placa','$objCochesBean->coche_marca');"; //no olvidarce las comillas, es importante
        $estado= $instanciacompartida->EjecutarConEstado($sql2); 
        return $estado;      
    }

     public function eliminarCoches($id){
        $instanciacompartida = ConexionBD::getInstance();
        $sql="DELETE  FROM coches where id_coche=$id";        
        $estado = $instanciacompartida->ejecutar($sql);
        return $estado;      
    }

     public function editarCoches($objCochesBean){
        $instanciacompartida = ConexionBD::getInstance();
        $sql="UPDATE escuelamanejo.coches
                SET coche_marca='$objCochesBean->coche_marca ',coche_placa='$objCochesBean->coche_placa ',coche_tipo='$objCochesBean->coche_tipo',coche_modelo='$objCochesBean->coche_modelo'
                WHERE id_coche=$objCochesBean->id_coche";       
        
        $estado= $instanciacompartida->ejecutar($sql);        
        return $estado;      
    }

}
