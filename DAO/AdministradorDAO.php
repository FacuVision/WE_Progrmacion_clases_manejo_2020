<?php

require_once('../BEAN/AdministradorBean.php');
require_once('../UTILS/ConexionBD.php');

class AdministradorDAO {

    public function ValidarAdmin(AdministradorBean $objAdministradorBean){

        $correo = $objAdministradorBean->get_admin_correo();
        $contra = $objAdministradorBean->get_admin_contra();
        
        $instanciacompartida = ConexionBD::getInstance();
        $sql =  "SELECT *
                FROM administrador 
                WHERE admin_correo='$correo' and admin_contra='$contra';";

        $res = $instanciacompartida->ejecutar($sql);
        $lista = $instanciacompartida->obtener_filas($res);

        $verificar = mysqli_affected_rows($instanciacompartida->getLink());

        if($verificar>0){      
            session_start();
            $_SESSION['id_administrador'] = $lista[0]['id_administrador'];
            $_SESSION['nombre'] = $lista[0]['admin_nombre'];

            $fechas = array("dia"=>1,"mes"=>2,"año"=>3,"mes_nombre"=>"");
            $id_fechas = array("id_dia"=>1,"id_mes"=>2,"id_agno"=>3,"id_clase_manejo"=>4,"id_detalle_clase_manejo"=>5);

            $_SESSION['fechas']= $fechas;
            $_SESSION['id_fechas']= $id_fechas; 
        }
        
        $instanciacompartida->setArray(null);
        
        return true;
    }



    
}

