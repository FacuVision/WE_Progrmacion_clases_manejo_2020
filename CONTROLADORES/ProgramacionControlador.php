<?php
session_start();
$opciones = $_REQUEST["op"];

require_once('../DAO/ClaseManejoDAO.php');
require_once('../DAO/AgnoDAO.php');
require_once('../DAO/MesDAO.php');
require_once('../DAO/DiaDAO.php');
require_once('../DAO/ClaseManejoDAO.php');
require_once('../DAO/InstructorDAO.php');

require_once('../BEAN/ClaseManejoBean.php');
require_once('../BEAN/AgnoBean.php');
require_once('../BEAN/MesBean.php');
require_once('../BEAN/DiaBean.php');
require_once('../BEAN/ClaseManejoBean.php');

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
            
            //si no existe la validacion entonces recoge informacion del formulario (esto se usa cuando la informacion llega del formulario y no del case N°8)
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

            break;

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

                //si no existe la validacion entonces recoge informacion del formulario (esto se usa cuando la informacion llega del formulario y no del case N°9)
                
                if (!isset($_REQUEST['validacion'])){
                    $_SESSION['fechas']["mes_nombre"] = $_REQUEST['nombre_mes'];
                    $_SESSION['fechas']["mes"] = $_REQUEST['numero_mes'];
                    $_SESSION['id_fechas']["id_mes"] = $_REQUEST['id_mes'];   
                }

                
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
    }


        case 9:{
            //ESTA ZONA ES PARA INSERTAR UN NUEVO DIA DESDE EL MENU_DIAS.PHP

            $validacion = true;
            $lista_dias_actual = $_SESSION['lista_dias'];
            $dia_convertido = intval(substr($_REQUEST["dia"],-2,2));

            //AQUI SE VALIDA SI NO EXISTE UN DIA CON EL MISMO NUMERO
            foreach ($lista_dias_actual as $e) {
                if($e["dia_numero"] == $dia_convertido){
                    $validacion = false;
                }
            }


            if($validacion){
                $MesBean = new MesBean();
                $DiaDAO = new DiaDAO();
                $DiaBean = new DiaBean();

                $MesBean->setId_mes($_SESSION['id_fechas']['id_mes']);
                $DiaBean->setDia_numero($dia_convertido);
                
                $estado = $DiaDAO->InsertarDia($DiaBean,$MesBean);

                echo '<script> document.location.href="ProgramacionControlador.php?op=7&validacion=1";</script>';
            } else{
                echo '<script> document.location.href="ProgramacionControlador.php?op=7&validacion=1";</script>';
            }
    break;
    }


    case 10:{
            
        //ESTA ZONA ES PARA ELIMINAR AL DIA EN ESPECIFICO
        $DiaBean = new DiaBean();
        $DiaDAO = new DiaDAO();

        $DiaBean->setId_dia($_REQUEST['id_dia']);
        
        $estado = $DiaDAO->eliminar_dia($DiaBean);

        echo '<script> document.location.href="ProgramacionControlador.php?op=7&validacion=1";</script>';

    break;

    }


    case 11:{
            
        //ESTA ZONA ES PARA LISTAR LAS PROGRAMACIONES DE CLASES SEGUN EL DIA QUE SE SELECCIONÓ

        $eleccion = 0; //nos dice no hemos usado el <select>
        
        $DiaBean = new DiaBean();   //creamos los objetos para las consultas
        $ClaseManejoDAO = new ClaseManejoDAO();
        $InstructoresDAO = new InstructorDAO();

        if (isset($_REQUEST['sel_instructor'])){    
            $eleccion = 1;  //significa que usamos el <select>
        }

        if($eleccion==0){   //significa que no usamos el <select> y venimos redireccionados del manu de dias.php
            $_SESSION['id_fechas']["id_dia"] = $_REQUEST['id_dia'];
            $_SESSION['fechas']["dia"]= $_REQUEST['numero_dia'];
        }

        $DiaBean->setId_dia($_SESSION['id_fechas']["id_dia"]);
        
                $_SESSION['listaInstructores'] = $InstructoresDAO->listarInstructoresConClase($_SESSION['id_fechas']["id_dia"]);

        if($eleccion == 1){
                    
            $nombre_id = explode("-", $_REQUEST['sel_instructor']);     //separamos los guiones 
            $listaInstructor = array("id"=>0, "nombre"=>"instructor");  //array de datos de instructor

            //llemanos array para mas tarde
            $listaInstructor["id"] = $nombre_id[0];
            $listaInstructor["nombre"] = $nombre_id[1];

            //llenamos la sesion
            $_SESSION["seleccion"] =  $listaInstructor;
            $primerInstructor = $listaInstructor["id"]; //id

            //obtenemos datos de la clase de manejo
            
                $_SESSION["clase_manejo"]= $ClaseManejoDAO->listarClaseManejo($_SESSION['id_fechas']['id_dia'],$primerInstructor);
        
        }else{

            $primerInstructor = $_SESSION['listaInstructores'][0]['id_instructor']; //obtenemos el primer instructor
            $_SESSION["seleccion"]["id"] =  $primerInstructor;
            $_SESSION["seleccion"]["nombre"] = $_SESSION['listaInstructores'][0]['emp_nombre'];
        }

                $_SESSION['listaClases'] = $ClaseManejoDAO->listarClases($DiaBean,$primerInstructor);
        
                $ClaseManejoDAO->CalcularHorarios();

                $_SESSION['TodoInstructor'] = $InstructoresDAO->listarInstructores();
                $_SESSION['listaClasesManejoPorDia'] = $InstructoresDAO->listarClasesDelDia($_SESSION['id_fechas']['id_dia']);

        echo '<script>document.location.href="../VISTAS/Menu_Clases.php";</script>';
        break;
    }
}