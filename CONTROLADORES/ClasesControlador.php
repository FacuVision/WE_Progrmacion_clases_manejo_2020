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
require_once('../BEAN/DetalleClaseManejoBean.php');


switch ($opciones) {
    
        case 1:{

            /*Esta zona es para no crear programaciones con instructores repetidos en el mismo dia */
            if(!empty($_SESSION['listaInstructores'])){
                $instructores = $_SESSION['listaInstructores'];
                $intentar = 1;
            }
            
            extract($_REQUEST); //tabla de valores
            
            $claseManejoBean = new ClaseManejoBean();
            $ClaseManejoDAO = new ClaseManejoDAO();
            $InstructorDAO = new InstructorDAO();

            if($intentar = 1){
                if(isset($instructores)){
                foreach ($instructores as $key) {
                    if($instructor == $key["id_instructor"]){
                        $intentar = 0;  
                        } 
                    }
                }
            }

            if($intentar==0) echo '<script> document.location.href="../VISTAS/Menu_Clases.php";</script>';

            /*Aqui comienza la insercion cuando no se ha elegido un instructor repetido */
            if($intentar == 1){

            $claseManejoBean->setClas_descripcion($descripcion);
            $claseManejoBean->setId_instructor($instructor);
            $claseManejoBean->setId_dia($_SESSION['id_fechas']["id_dia"]);
            $fecha = "". $_SESSION['fechas']["dia"]."-".$_SESSION['fechas']["mes"]."-".$_SESSION['fechas']["año"]."";
            $claseManejoBean->setClas_fecha($fecha);

            
            $estado = $ClaseManejoDAO->InsertarClaseVacia($claseManejoBean);
            $nombreSeleccionado = $InstructorDAO->listarInstructoresID($instructor);
            $_SESSION['listaInstructores'] = $InstructorDAO->listarInstructoresConClase($_SESSION['id_fechas']["id_dia"]);
            $_SESSION["clase_manejo"]= $ClaseManejoDAO->listarClaseManejo($_SESSION['id_fechas']['id_dia'],$instructor);    

                /*$_SESSION["seleccion"]["id"] =  $instructor;
                $_SESSION["seleccion"]["nombre"] = $nombreSeleccionado[0]["emp_nombre"];*/


            echo '<script> document.location.href="../VISTAS/Menu_Clases.php";</script>';

            }
            break;
        }

        case 2:{

            if(isset($_REQUEST)){
                extract($_REQUEST);
                    echo '<pre>' . var_export($_REQUEST, true) . '</pre>';
                
                if(isset($editarComentario)){

                    $claseManejoBean = new ClaseManejoBean();
                    $ClaseManejoDAO = new ClaseManejoDAO();

                    $claseManejoBean->setClas_descripcion($comentario);
                    $claseManejoBean->setId_clase_manejo($id_clase);
                    $claseManejoBean->setId_instructor($id_instructor);

                    $ClaseManejoDAO->EditarDescripcion($claseManejoBean);
                }
            }
            
            break;
        }

        case 3:{

            if(isset($_REQUEST)){
                extract($_REQUEST);
                
                $ClaseManejoDAO = new ClaseManejoDAO();
                $rpta = $ClaseManejoDAO->evaluarHorarios($horario);

                if($rpta=="bueno"){

                    $DetalleClaseManejoBean = new DetalleClaseManejoBean();
                    $DiaBean = new DiaBean();

                    $DetalleClaseManejoBean->setId_coche($coche);
                    $DetalleClaseManejoBean->setId_curso($curso);
                    $DetalleClaseManejoBean->setId_clase_manejo($id_clase_manejo);
                    $DetalleClaseManejoBean->setId_alumno($alumno);
                    $DetalleClaseManejoBean->setDet_asistencia($asistencia);
                    $DetalleClaseManejoBean->setDet_n_clase($n_hora_clase);
                    $DetalleClaseManejoBean->setDet_horario($horario);

                    $ClaseManejoDAO->insertarClase($DetalleClaseManejoBean);

                    /* CUANDO SE AÑADA UNA CALSE, SE DEBE DE ACTUALIZAR DICHO REGISTRO DE LA SESION*/   

                    $DiaBean->setId_dia($_SESSION['id_fechas']['id_dia']);

                    $_SESSION['listaClases'] = $ClaseManejoDAO->listarClases($DiaBean, $_SESSION["seleccion"]["id"] );
                    
                    $ClaseManejoDAO->CalcularHorarios();

                    echo '<script> document.location.href="../VISTAS/Menu_Clases.php";</script>';
                } 
                else{
                    
                    echo '<script> document.location.href="../VISTAS/Menu_Clases.php";</script>';
                }
            }
            break;
        }
        case 4:{

            unset($_SESSION['listaClases']);
            unset($_SESSION["seleccion"]);
            unset($_SESSION["clase_manejo"]);
            unset($_SESSION['listaCursos']);
            unset($_SESSION['listaCoches']) ;
            unset($_SESSION['listaAlumnos']);
            unset($_SESSION['lista_horarios']);
            
                echo '<script> document.location.href="../VISTAS/Menu_dias.php";</script>';
            
            break;    
        }
            
        case 5:{

            
            $DiaDAO = new DiaDAO();
            $DiaBean = new DiaBean();

            if(isset($_REQUEST)){
                extract($_REQUEST);
            }
            $DiaBean->setdia_estado($edicion_estado);
            $DiaBean->setId_dia($id_dia);

            $DiaDAO->editarEstado($DiaBean);
            $_SESSION['lista_dias'] = $DiaDAO->lista_dias_segun_mes($_SESSION['id_fechas']["id_mes"]);

                echo '<script> document.location.href="../VISTAS/Menu_dias.php";</script>';
            
            break;    
        }

        case 6:{

            
            $DiaDAO = new DiaDAO();
            $DiaBean = new DiaBean();

            if(isset($_REQUEST)){
                extract($_REQUEST);
            }
            $DiaBean->setdia_estado($edicion_estado);
            $DiaBean->setId_dia($id_dia);

            $DiaDAO->editarEstado($DiaBean);
            $_SESSION['lista_dias'] = $DiaDAO->lista_dias_segun_mes($_SESSION['id_fechas']["id_mes"]);

                echo '<script> document.location.href="../VISTAS/Menu_dias.php";</script>';
            
            break;    
        }

        }
    