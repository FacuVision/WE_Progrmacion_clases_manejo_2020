<?php

$opciones = $_REQUEST["op"];

require_once('../DAO/AdministradorDAO.php');
require_once('../BEAN/AdministradorBean.php');

switch ($opciones) {

    case 1: {
        //permite loguear al administrador

        $AdministradorDAO = new AdministradorDAO();
        $AdministradorBean = new AdministradorBean();

        $AdministradorBean->set_admin_correo($_REQUEST["correo"]);
        $AdministradorBean->set_admin_contra($_REQUEST["pass"]);
        echo "aea";
        if($AdministradorDAO->ValidarAdmin($AdministradorBean)){
            echo '<script> document.location.href="../VISTAS/MenuPrincipal.php";</script>';
        }
        break;
    }

    case 2: {
        //cerrar cesion del administrador
        session_start();
        unset($_SESSION['id_administrador']); 
        unset($_SESSION['nombre']);
        session_destroy();
        echo '<script> document.location.href="../VISTAS/Login.php";</script>';
        exit;

        break;
    }


    default:

        break;
}



