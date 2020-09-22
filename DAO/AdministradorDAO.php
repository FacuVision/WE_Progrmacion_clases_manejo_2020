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
            var_dump($lista);
            $_SESSION['id_administrador'] = $lista[0]['id_administrador'];
            $_SESSION['nombre'] = $lista[0]['admin_nombre'];

            return true;
        }
        
        $instanciacompartida->setArray(null);
        
    }
}

