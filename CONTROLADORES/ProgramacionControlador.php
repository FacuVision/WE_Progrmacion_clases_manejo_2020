<?php

$opciones = $_REQUEST["op"];

require_once('../DAO/ClaseManejoDAO.php');
require_once('../DAO/AgnoDAO.php');
require_once('../DAO/MesDAO.php');


require_once('../BEAN/ClaseManejoBean.php');
require_once('../BEAN/AgnoBean.php');
require_once('../BEAN/MesBean.php');


switch ($opciones) {

    case 1:{
        if(!empty($_SESSION['lista_agnos'])) unset($_SESSION['lista_agnos']);

        //ESTA ZONA ES CUANDO SE PULSE EL BOTON "CALENDARIO" DEL MENU PRINCIPAL DESDE
        //EL MENU PRINCIPAL.PHP
        $ClaseManejoDAO = new ClaseManejoDAO();
        $lista = $ClaseManejoDAO->listarAgnos();
        
            session_start();
            $_SESSION['lista_agnos']= $lista;
            echo '<script> document.location.href="../VISTAS/Menu_Años.php";</script>';
        
    break;

    }

    case 2:{

        //ESTA ZONA ES PARA LA CREACION DE AÑOS NUEVOS DESDE EL MENU_AÑOS.PHP
        $Agno_bean = new AgnoBean();
        $AgnoDAO = new AgnoDAO();

        $Agno_bean->setAgno($_REQUEST['numero_agno']);
        $estado2 = $AgnoDAO->insertar_agno($Agno_bean);

        echo '<script> document.location.href="ProgramacionControlador.php?op=1";</script>';
        
    break;

    }

    case 3:{

        //ESTA ZONA ES PARA LA ELIMINACION DE AÑOS DESDE EL MENU AÑO.PHP
        $Agno_bean = new AgnoBean();
        $AgnoDAO = new AgnoDAO();

        $Agno_bean->setId_agno($_REQUEST['id_agno']);
        $estado = $AgnoDAO->eliminar_agno($Agno_bean);

        echo '<script> document.location.href="ProgramacionControlador.php?op=1";</script>';

    break;

    }

    case 4:{

        //LISTAR MESES SEGUN AÑO

        //if(!empty($_SESSION['lista_meses'])) unset($_SESSION['lista_meses']);
        
        $_SESSION['fechas']["año"]= $_REQUEST['agno_numero'];
        $_SESSION['id_fechas']["id_agno"] = $_REQUEST['id_agno'];
       // echo $_SESSION['id_fechas']["id_agno"];
        $MesDAO = new MesDAO();
        $lista = $MesDAO->listarMeses_segun_agno($_SESSION['id_fechas']["id_agno"]);
        
        $_SESSION['lista_meses'] = $lista;
            //var_dump($_SESSION['lista_meses']);
            //echo '<pre>' . var_export($lista, true) . '</pre>';
            echo '<script> document.location.href="../VISTAS/Menu_Meses.php";</script>';
        
    break;

    }

case 5:{
    
        //ESTA ZONA ES PARA ELIMINAR AL MES EN ESPECIFICO
        /*$MesBean = new MesBean();
        $MesDAO = new MesDAO();

        $MesBean->setId_mes($_REQUEST['id_mes']);
        $estado = $MesDAO->eliminar_mes($MesBean);

        echo '<script> document.location.href="ProgramacionControlador.php?op=6";</script>';*/

    break;

    }

case 6:{
        //ESTA ZONA ES PARA LISTAR  MESES LUEGO DE ELIMINAR 

        /*$MesDAO = new MesDAO();
        $_SESSION['lista_meses'] = $MesDAO->listarMeses_segun_agno($_SESSION['id_fechas']["id_agno"]);
        
        echo '<script> document.location.href="../VISTAS/Menu_Meses.php";</script>';*/
    break;
}

}