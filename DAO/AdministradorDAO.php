<?php

require_once ('../UTILS/ConexionBD.php');
require_once '../BEAN/administradorBean.php';


class AdministradorDAO {

    public function ValidarAdmin(AdministradorBean $objAdministradorBean){

        $correo = $objAdministradorBean->get_admin_correo();
        $contra = $objAdministradorBean->get_admin_contra();
        
        $instanciacompartida = ConexionBD::getInstance();
        $sql =  "SELECT * FROM empleados as emp 
                INNER JOIN administradores as adm on adm.id_empleado=emp.id_empleado
                WHERE emp.emp_correo='$correo' and  adm.admin_contra='$contra' and adm.admin_estado='Habilitado';";

        $res = $instanciacompartida->ejecutar($sql);
        $lista = $instanciacompartida->obtener_filas($res);

        $verificar = mysqli_affected_rows($instanciacompartida->getLink());
        

        if($verificar>0){      
            session_start();
            $_SESSION['id_administrador'] = $lista[0]['id_administrador'];
            $_SESSION['nombre'] = $lista[0]['emp_nombre'];

            $fechas = array("dia"=>1,"mes"=>2,"año"=>3,"mes_nombre"=>"");
            $id_fechas = array("id_dia"=>1,"id_mes"=>2,"id_agno"=>3,"id_clase_manejo"=>4,"id_detalle_clase_manejo"=>5);
            $horarios = array("1. 8am-9am", "2. 9am-10am", "3. 10am-11am", "4. 11am-12pm", "5. 12pm-1pm", "6. 1pm-2pm", "7. 2pm-3pm", "8. 3pm-4pm", "9. 4pm-5pm", "10. 5pm-6pm", "11. 6pm-7pm", "12. 7pm-8pm");

            $_SESSION['fechas']= $fechas;
            $_SESSION['id_fechas']= $id_fechas; 
            $_SESSION['horarios'] = $horarios;

        }
        
        $instanciacompartida->setArray(null);
        
        return true;
    }
      public function listarAdmin(){
         $instanciacompartida = ConexionBD::getInstance();
        $sql =  "SELECT  * FROM administradores a 
		JOIN empleados e ON (a.id_empleado=e.id_empleado)";

        $res = $instanciacompartida->ejecutar($sql);
        $lista = $instanciacompartida->obtener_filas($res);

        return $lista;
    }

//Retorna ID del empleado insertado
     public function agregarRetornaID(AdministradorBean $objAdmin){
        $instanciacompartida = ConexionBD::getInstance();
        $sql="INSERT INTO empleados(emp_nombre, emp_apellido, emp_telefono, emp_correo)  
        VALUES('".$objAdmin->getAdmin_nombre()."',
            '".$objAdmin->getAdmin_apellido()."',
            '".$objAdmin->getAdmin_telefono()."',
            '".$objAdmin->get_admin_correo()."' );";        
         $estado=$instanciacompartida->EjecutarConEstado($sql);
         unset($_SESSION['idemple']);
         $_SESSION['idemple']=$instanciacompartida->Ultimo_ID(); 

        return $estado;      
    }

    //Inserción a la tabla Admin
    public function agregarAdmin(AdministradorBean $objAdmin){
        $instanciacompartida = ConexionBD::getInstance();
        $sql="INSERT INTO administradores(id_empleado, admin_contra, admin_estado)  
        VALUES('".$objAdmin->getId_empleado()."',
            '".$objAdmin->get_admin_contra()."',
            '".$objAdmin->get_admin_estado()."');";
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

    public function editarAdmin($idemple,$contra,$estado,$id){
            $instanciacompartida = ConexionBD::getInstance();
             $sql = "UPDATE administradores
                    SET id_empleado='$idemple', admin_contra='$contra', admin_estado='$estado'
                    WHERE id_administrador=$id;";      
            $estado = $instanciacompartida->ejecutar($sql);       
            return $estado;     
        }

     public function eliminarAdmin($id){
        $instanciacompartida = ConexionBD::getInstance();
        $sql="DELETE FROM administradores WHERE id_administrador= $id";        
        $estado = $instanciacompartida->EjecutarConEstado($sql);
        return $estado;     
    }
     public function eliminarEmple($id){
        $instanciacompartida = ConexionBD::getInstance();
        $sql="DELETE FROM empleados WHERE id_empleado   = $id";        
        $estado = $instanciacompartida->EjecutarConEstado($sql);

        return $estado;     
    }



    
}

