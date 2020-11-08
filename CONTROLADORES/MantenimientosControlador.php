<?php


require_once '../BEAN/AlumnoBean.php'; 
require_once '../BEAN/CursoBean.php'; 
require_once '../BEAN/CocheBean.php'; 
require_once '../BEAN/InstructorBean.php'; 
require_once '../DAO/M_alumnosDAO.php';
require_once '../DAO/M_cochesDAO.php'; 
require_once '../DAO/M_instructorDAO.php';   
require_once '../DAO/M_cursoDAO.php'; 

$objCochesDAO= new M_cochesDAO();
$objCochesBean= new CocheBean();
$objAlumnosDAO= new M_alumnosDAO();
$objAlumnosBean= new AlumnoBean();
$objCursoDAO= new M_cursoDAO();
$objCursoBean= new CursoBean();
$objInstructorBean = new InstructorBean();
$objInstructorDAO = new M_instructorDAO();


session_start();

$op=$_REQUEST['op'];

// include '../VISTAS/MANTENIMIENTOS/MantInicio.php';
switch ($op){
    case 1:
        // MENÚ DE MANTENIMIENTOS
        
         echo '<script> document.location.href="../VISTAS/MANTENIMIENTOS/MantInicio.php";</script>';
        break;
    case 10:
        //-------------- LISTA DE COCHES----------------------------------------
        unset( $_SESSION['listaCoche']);
        $_SESSION['listaCoche']=$objCochesDAO->listarCoches();
        // var_dump($_SESSION['listaCoche']);
        //  die;

         echo '<script> document.location.href="../VISTAS/MANTENIMIENTOS/Coches/MantListCoches.php";</script>';
        break;
    case 11:  //REGISTRAR COCHES
        // extract($_REQUEST);

        $modelo = $_REQUEST['modelo'];
        $tipocoche =$_REQUEST['tipocoche'];
        $placa=$_REQUEST['placa'];
        $marca =$_REQUEST['marca'];

// var_dump(  $modelo,  $tipocoche,    $placa,   $marca,$op  );
// die;

        $objCochesBean->setCoche_modelo($modelo);
        $objCochesBean->setCoche_tipo($tipocoche);
        $objCochesBean->setCoche_placa($placa);
        $objCochesBean->setCoche_marca($marca);
        $estado=$objCochesDAO->agregarCoches( $objCochesBean);
        if($estado=1){
        unset( $_SESSION['listaCoche']);        
         $_SESSION['listaCoche']=$objCochesDAO->listarCoches();      
         echo '<script> document.location.href="../VISTAS/MANTENIMIENTOS/Coches/MantListCoches.php";</script>';
        }else{
            echo"Error";
        }
       
        break;
    case 12: // EDITAR COCHES
        
        extract($_REQUEST);
        $objCochesBean->setCoche_marca($marca);
        $objCochesBean->setCoche_placa($placa);
        $objCochesBean->setCoche_tipo($tipo);
        $objCochesBean->setCoche_modelo($modelo);
        $objCochesBean->setId_coche($id);
        $estado=$objCochesDAO->editarCoches($objCochesBean );
         if($estado=1){
        unset( $_SESSION['listaCoche']);        
         $_SESSION['listaCoche']=$objCochesDAO->listarCoches();      
         echo '<script> document.location.href="../VISTAS/MANTENIMIENTOS/Coches/MantListCoches.php";</script>';
        }else{
            echo"Error";
        }

         echo '<script> document.location.href="../VISTAS/MANTENIMIENTOS/MantInicio.php";</script>';
        break;
    case 13:
        // ELIMINAR  
        $id= $_REQUEST['id'];        
        $estado=$objCochesDAO->eliminarCoches($id);         
          if($estado=1){
        unset( $_SESSION['listaCoche']);        
         $_SESSION['listaCoche']=$objCochesDAO->listarCoches();      
         echo '<script> document.location.href="../VISTAS/MANTENIMIENTOS/Coches/MantListCoches.php";</script>';
        }else{
            echo"Error";
        }                
        break;
    case 20:      
        //-------------------------LISTA DE ALUMNOS-------------------------  
        unset($_SESSION['listaAlum']);
        $_SESSION['listaAlum']=$objAlumnosDAO->listarAlumnos();
    
        // var_dump($_SESSION['listaAlum']);
        // die;
         echo '<script> document.location.href="../VISTAS/MANTENIMIENTOS/Alumnos/MantListAlumnos.php";</script>';
        break;
    case 21:  //REGISTRAR ALUMNOS
        extract($_REQUEST);
        
        $objAlumnosBean->setAlum_nombre($nombre);
        $objAlumnosBean->setAlum_apellido($apellido);
        $objAlumnosBean->setAlum_telefono($telefono);
        $objAlumnosBean->setAlum_correo($correo);
        $objAlumnosBean->setAlum_estado_pago($estadopago);
        $objAlumnosBean->setAlum_estado($estado);
        $validate=$objAlumnosDAO->agregarAlumno($objAlumnosBean);
        var_dump($_REQUEST);
        var_dump($validate);
 
          
       if($validate=1){
           unset($_SESSION['listaAlum']);
        $_SESSION['listaAlum']=$objAlumnosDAO->listarAlumnos();
        echo '<script> document.location.href="../VISTAS/MANTENIMIENTOS/Alumnos/MantListAlumnos.php";</script>';
       }


        break;
    case 22: // EDITAR ALUMNOS
         extract($_REQUEST);

       
         
        $objAlumnosBean->setAlum_nombre($nombre);
        $objAlumnosBean->setAlum_apellido($apellido);
        $objAlumnosBean->setAlum_telefono($telefono);
        $objAlumnosBean->setAlum_correo($correo);
        $objAlumnosBean->setAlum_estado_pago($estadopago);
        $objAlumnosBean->setAlum_estado($estado);
        $objAlumnosBean->setId_alumno($id);

        $validate=$objAlumnosDAO->editarAlumno($objAlumnosBean);
          if($validate=1){
           unset($_SESSION['listaAlum']);
        $_SESSION['listaAlum']=$objAlumnosDAO->listarAlumnos();
        echo '<script> document.location.href="../VISTAS/MANTENIMIENTOS/Alumnos/MantListAlumnos.php";</script>';
       }

        
        break;
    case 23:
        // ELIMINAR     
         extract($_REQUEST);   
         
         $val=$objAlumnosDAO->eliminarAlumno($id);           
         if($val=1){
                unset($_SESSION['listaAlum']);
                $_SESSION['listaAlum']=$objAlumnosDAO->listarAlumnos();
                echo '<script> document.location.href="../VISTAS/MANTENIMIENTOS/Alumnos/MantListAlumnos.php";</script>';
            }
        break;
    case 30:
        //-------------------------LISTA DE CURSOS-------------------------
        unset($_SESSION['listaCursos']);
        $_SESSION['listaCursos']=$objCursoDAO->listarCursos();
            echo '<script> document.location.href="../VISTAS/MANTENIMIENTOS/Cursos/MantListCursos.php";</script>';
        break;
    case 31:  //REGISTRAR COCHES
        extract($_REQUEST);
        $objCursoBean->setCur_nombre($nombre);
        $objCursoBean->setCur_horas($horas);
        $objCursoBean->setCur_descripcion($descripcion);
        $estado=$objCursoDAO->agregarCursos($objCursoBean);

        if($estado=1){
            unset($_SESSION['listaCursos']);
        $_SESSION['listaCursos']=$objCursoDAO->listarCursos();
            echo '<script> document.location.href="../VISTAS/MANTENIMIENTOS/Cursos/MantListCursos.php";</script>';            
        }       
        break;
    case 32: // EDITAR CURSOS
        extract($_REQUEST);
        $objCursoBean->setCur_nombre($nombre);
        $objCursoBean->setCur_horas($horas);
        $objCursoBean->setCur_descripcion($descripcion);
        $objCursoBean->setId_curso($id);
        $estado=$objCursoDAO->editarCursos($objCursoBean);
        if($$estado=1){
            unset($_SESSION['listaCursos']);
        $_SESSION['listaCursos']=$objCursoDAO->listarCursos();
            echo '<script> document.location.href="../VISTAS/MANTENIMIENTOS/Cursos/MantListCursos.php";</script>';            
        }
        
    die;

        if($estado=1){
            unset($_SESSION['listaCursos']);
        $_SESSION['listaCursos']=$objCursoDAO->listarCursos();
            echo '<script> document.location.href="../VISTAS/MANTENIMIENTOS/Cursos/MantListCursos.php";</script>';            
        }       

        
          
        break;
        // ELIMINAR   
    case 33:
        extract($_REQUEST);       
        $estado=$objCursoDAO->eliminarCursos($id);         
        if($estado=1){
            unset($_SESSION['listaCursos']);
        $_SESSION['listaCursos']=$objCursoDAO->listarCursos();
            echo '<script> document.location.href="../VISTAS/MANTENIMIENTOS/Cursos/MantListCursos.php";</script>';            
        }     
        break;

    case 34: // GESTIONAR INTRUCTORES LISTA
        unset($_SESSION['listaInstructor']);
        $_SESSION['listaInstructor']=$objInstructorDAO->listarInstructor();
        echo '<script> document.location.href="../VISTAS/MANTENIMIENTOS/Instructor/MantInstructor.php";</script>';     
        // var_dump($_SESSION['listaInstructor']);
        break;
    case 35: // GESTIONAR INTRUCTORES INSERTAR

        extract($_REQUEST);
        $objInstructorBean->setIns_nombre($Inombre);
        $objInstructorBean->setIns_apellido($Iapellido);
        $objInstructorBean->setIns_telefono($Itelefono);
        $objInstructorBean->setIns_correo($Icorreo);       
        $val = $objInstructorDAO->agregarRetornaID($objInstructorBean);

        if($val=1){
            $idemple=$_SESSION['idemple'];
            $objInstructorBean->setId_empleado($idemple);
            $objInstructorBean->setIns_estado($estado);
            $estad2=$objInstructorDAO->agregarInstructor($objInstructorBean);
            unset($_SESSION['listaInstructor']);
            unset($_SESSION['idemple']);
            $_SESSION['listaInstructor']=$objInstructorDAO->listarInstructor();
            echo '<script> document.location.href="../VISTAS/MANTENIMIENTOS/Instructor/MantInstructor.php";</script>';        
        }else{
            
        } 
        break;
    case 36: // GESTIONAR INTRUCTORES EDITAR
        extract($_REQUEST);
        $value=$objInstructorDAO->editarEmple($Inombre,$Iapellido,$Itelefono,$Icorreo,$idEmpleado);      
        if($val=1){
            $val=$objInstructorDAO->editarInstructor($estado,$idEmpleado,$idInstructor);
                if($val=1){
            unset($_SESSION['listaInstructor']);
            $_SESSION['listaInstructor']=$objInstructorDAO->listarInstructor();
            echo '<script> document.location.href="../VISTAS/MANTENIMIENTOS/Instructor/MantInstructor.php";</script>'; 

            }else{
                echo"Error en la Modificación de instructor";
            }
        
        }else{
                echo"Error en la Modificación de Empleado";
            }
        break;

    case 37: // GESTIONAR INTRUCTORES EIMINAR
        extract($_REQUEST);
        $estaIns=$objInstructorDAO->eliminarInstructor($idinstructor);
        $estaEmple=$objInstructorDAO->eliminarEmpleado($idempleado);
        
        unset($_SESSION['listaInstructor']);
        $_SESSION['listaInstructor']=$objInstructorDAO->listarInstructor();
        echo '<script> document.location.href="../VISTAS/MANTENIMIENTOS/Instructor/MantInstructor.php";</script>';
    break;

        

    

}