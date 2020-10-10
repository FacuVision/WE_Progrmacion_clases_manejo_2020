<?php
session_start();
$opciones = $_REQUEST["op"];

require_once('../DAO/ClaseManejoDAO.php');
require_once('../DAO/AgnoDAO.php');
require_once('../DAO/MesDAO.php');
require_once('../DAO/DiaDAO.php');



require_once('../BEAN/ClaseManejoBean.php');
require_once('../BEAN/AgnoBean.php');
require_once('../BEAN/MesBean.php');
require_once('../BEAN/DiaBean.php');


switch ($opciones) {

    case 1:{
        if(!empty($_SESSION['lista_agnos'])) unset($_SESSION['lista_agnos']);

        //ESTA ZONA ES CUANDO SE PULSE EL BOTON "CALENDARIO" DEL MENU PRINCIPAL DESDE
        //EL MENU PRINCIPAL.PHP
        $ClaseManejoDAO = new ClaseManejoDAO();
        $lista = $ClaseManejoDAO->listarAgnos();
        
            //session_start();
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
        
        if (!isset($_REQUEST['validacion'])){
            $_SESSION['fechas']["año"] = $_REQUEST['agno_numero'];
            $_SESSION['id_fechas']["id_agno"] = $_REQUEST['id_agno'];
        }
        
        $MesDAO = new MesDAO();
        $lista = $MesDAO->listarMeses_segun_agno($_SESSION['id_fechas']["id_agno"]);
        
        $_SESSION['lista_meses'] = $lista;
            //var_dump($_SESSION['lista_meses']);
            //echo '<pre>' . var_export($_SESSION['lista_meses'] , true) . '</pre>';
            echo '<script> document.location.href="../VISTAS/Menu_Meses.php";</script>';
        
        break;

    }

    case 5:{
        
            //ESTA ZONA ES PARA ELIMINAR AL MES EN ESPECIFICO
            $MesBean = new MesBean();
            $MesDAO = new MesDAO();

            $MesBean->setId_mes($_REQUEST['id_mes']);
            $estado = $MesDAO->eliminar_mes($MesBean);

            echo '<script> document.location.href="ProgramacionControlador.php?op=6";</script>';

            reak;

        }

    case 6:{
            //ESTA ZONA ES PARA LISTAR  MESES LUEGO DE ELIMINAR 
            $MesDAO = new MesDAO();
            $_SESSION['lista_meses'] = $MesDAO->listarMeses_segun_agno($_SESSION['id_fechas']["id_agno"]);
            
            echo '<script> document.location.href="../VISTAS/Menu_Meses.php";</script>';
            break;
    }

    case 7:{
            //ESTA ZONA ES PARA LISTAR  DIAS SEGUN EL MES
            $_SESSION['fechas']["mes_nombre"] = $_REQUEST['nombre_mes'];
            $_SESSION['fechas']["mes"] = $_REQUEST['numero_mes'];
            $_SESSION['id_fechas']["id_mes"] = $_REQUEST['id_mes'];   
            $_SESSION['id_fechas']["id_agno"]= $_REQUEST['id_agno'];


            $DiaDAO = new DiaDAO();
            $_SESSION['lista_dias'] = $DiaDAO->lista_dias_segun_mes($_SESSION['id_fechas']["id_mes"]);

            
                //var_dump($_SESSION['lista_meses']);
                //echo '<pre>' . var_export($_SESSION['lista_dias']  , true) . '</pre>';
                echo '<script> document.location.href="../VISTAS/Menu_dias.php";</script>';
            break;
    }


    case 8:{
        //ESTA ZONA ES PARA INSERTAR UN NUEVO MES DESDE MENU_MES.PHP
        //AQUI EVALUAMOS SI EL MES COINCIDE CON LA LISTA DE MESES ACTUAL
        
        $validacion = true;

        $lista_meses_actual = $_SESSION['lista_meses'];

        foreach ($lista_meses_actual as $e) {
            if($e["mes_numero"] == $_REQUEST['meses_nombre_numero'] ){
                $validacion = false;
            }
        }
        
        if($validacion){
            $MesBean = new MesBean();
            $MesDAO = new MesDAO();

            $MesBean->setMes_numero($_REQUEST['meses_nombre_numero']);
            $MesBean->setId_año($_SESSION['id_fechas']["id_agno"]);
            $estado = $MesDAO->insertar_mes($MesBean);

            echo '<script> document.location.href="ProgramacionControlador.php?op=4&validacion=1";</script>';

        }else{
            echo '<script> document.location.href="ProgramacionControlador.php?op=4&validacion=1";</script>';        
        }

        break;
    break;
}

}