<?php

require_once('../BEAN/AdministradorBean.php');
require_once('../UTILS/ConexionBD.php');

class AdministradorDAO {

    public function ValidarAdmin(AdministradorBean $objAdministradorBean){

        $correo = $objAdministradorBean->get_admin_correo();
        $contra = $objAdministradorBean->get_admin_contra();
        
        $instanciacompartida = ConexionBD::getInstance();
        $sql =  "SELECT * FROM empleados as emp 
                INNER JOIN administradores as adm on adm.id_empleado=emp.id_empleado
                WHERE emp.emp_correo='$correo' and  adm.admin_contra='$contra';";

        $res = $instanciacompartida->ejecutar($sql);
        $lista = $instanciacompartida->obtener_filas($res);

        //var_export($lista);
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



    
}

