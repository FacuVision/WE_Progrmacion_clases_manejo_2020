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

            if(!empty($_SESSION['listaInstructores'])){
                $instructores = $_SESSION['listaInstructores'];
                $intentar = 1;
            }
            extract($_REQUEST); //tabla de valores

            $claseManejoBean = new ClaseManejoBean();
            $ClaseManejoDAO = new ClaseManejoDAO();

            if($intentar = 1){
            foreach ($instructores as $key) {
                if($instructor == $key["id_instructor"]){
                    if($instructor == $key["id_instructor"]) echo '<script> document.location.href="../VISTAS/Menu_Clases.php";</script>';
                    die();
                } 
            }
            }
            
            $claseManejoBean->setClas_descripcion($descripcion);
            $claseManejoBean->setId_instructor($instructor);
            $claseManejoBean->setId_dia($_SESSION['id_fechas']["id_dia"]);
            
            $fecha = "". $_SESSION['fechas']["dia"]."-".$_SESSION['fechas']["mes"]."-".$_SESSION['fechas']["año"]."";
            $claseManejoBean->setClas_fecha($fecha);

            $estado = $ClaseManejoDAO->InsertarClaseVacia($claseManejoBean);
            if($estado>0){
                echo '<script> document.location.href="../VISTAS/Menu_Clases.php";</script>';
            }
            break;
        }

        case 2:{

            if(isset($_REQUEST)){
                extract($_REQUEST);

                if(isset($editarComentario)){

                    $claseManejoBean = new ClaseManejoBean();
                    $ClaseManejoDAO = new ClaseManejoDAO();

                    $claseManejoBean->setClas_descripcion($comentario);
                    $claseManejoBean->setId_clase_manejo($id_clase);
                    $claseManejoBean->setId_instructor($id_instructor);

                    $ClaseManejoDAO->EditarDescripcion($claseManejoBean);

                    echo '<script> document.location.href="/CONTROLADORES/ProgramacionControlador.php?op=3";</script>';
                }
            }
            
            break;
        }

    }