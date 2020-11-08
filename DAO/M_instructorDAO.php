<?php
require_once '../UTILS/ConexionBD.php';
require_once '../BEAN/InstructorBean.php';

class M_instructorDAO{

     public function listarInstructor(){
        $instanciacompartida = ConexionBD::getInstance();
        $sql="SELECT * FROM instructores i join empleados e ON (i.id_empleado=e.id_empleado)";        
        $rs = $instanciacompartida->ejecutar($sql);
        $array = $instanciacompartida->obtener_filas($rs);
        return $array;      
    }
    //Retorna ID del empleado insertado
     public function agregarRetornaID(InstructorBean $objInstructor){
        $instanciacompartida = ConexionBD::getInstance();
        $sql="INSERT INTO empleados(emp_nombre, emp_apellido, emp_telefono, emp_correo)  
        VALUES('".$objInstructor->getIns_nombre()."',
            '".$objInstructor->getIns_apellido()."',
            '".$objInstructor->getIns_telefono()."',
            '".$objInstructor->getIns_correo()."' );";        
         $estado=$instanciacompartida->EjecutarConEstado($sql);
         unset($_SESSION['idemple']);
         $_SESSION['idemple']=$instanciacompartida->Ultimo_ID(); 

        return $estado;      
    }

    //Inserción a la tabla Instructor
    public function agregarInstructor(InstructorBean $objInstructor){
        $instanciacompartida = ConexionBD::getInstance();
        $sql="INSERT INTO instructores (id_empleado, ins_estado)  
        VALUES('".$objInstructor->getId_empleado()."',
            '".$objInstructor->getIns_estado()."');";
        $estado= $instanciacompartida->EjecutarConEstado($sql);
        return $estado;      
    }
    public function editarEmple($nomb,$ape,$tel,$cor,$idemple){
            $instanciacompartida = ConexionBD::getInstance();
            $sql = "UPDATE empleados
                     SET emp_nombre='$nomb', emp_apellido='$ape', emp_telefono='$tel', emp_correo='$cor'
                     WHERE id_empleado=$idemple";      
            $estado = $instanciacompartida->ejecutar($sql); 
             
            return $estado;     
        }

    public function editarInstructor($estado,$idemple,$idinstruct){
            $instanciacompartida = ConexionBD::getInstance();
             $sql = "UPDATE instructores
                    SET id_empleado=$idemple, ins_estado='$estado'
                    WHERE id_instructor=$idinstruct;";      
            $estado = $instanciacompartida->ejecutar($sql);       
            return $estado;     
        }




     public function eliminarInstructor($id){
        $instanciacompartida = ConexionBD::getInstance();
        $sql="DELETE FROM instructores WHERE id_instructor   = $id";        
        $estado = $instanciacompartida->EjecutarConEstado($sql);
        return $estado;     
    }
     public function eliminarEmpleado($id){
        $instanciacompartida = ConexionBD::getInstance();
        $sql="DELETE FROM empleados WHERE id_empleado   = $id";        
        $estado = $instanciacompartida->EjecutarConEstado($sql);

        return $estado;     
    }

    

}