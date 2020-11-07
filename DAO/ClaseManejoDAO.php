<?php
require_once('../BEAN/ClaseManejoBean.php');
require_once('../UTILS/ConexionBD.php');
require_once('../BEAN/DiaBean.php');

class ClaseManejoDAO{

    public function listarClaseManejo($id_dia, $id_instructor)
    {
        $instanciacompartida = ConexionBD::getInstance();
        $sql = "SELECT * FROM clases_manejo WHERE id_dia = $id_dia AND id_instructor = $id_instructor";
        $res = $instanciacompartida->ejecutar($sql);
        $lista = $instanciacompartida->obtener_filas($res);
        $instanciacompartida->setArray(null);

        return $lista;
    }

    public function listarAgnos(){

        $instanciacompartida = ConexionBD::getInstance();
        $sql = "SELECT * FROM agnos";
        $res = $instanciacompartida->ejecutar($sql);
        $lista = $instanciacompartida->obtener_filas($res);
        return $lista;
    }

    public function listarClases(DiaBean $DiaBean, $id_instructor){

        $instanciacompartida = ConexionBD::getInstance();
        $dia_numero = $DiaBean->getId_dia();

        if(isset($id_instructor)){
            $sql = "SELECT  det.id_detalle_clases_manejo, class.id_clase_manejo,class.clas_fecha, det.det_horario, cur.cur_nombre, cur.cur_horas, det.det_n_clase, alum.alum_nombre,alum.alum_apellido, emp.emp_nombre, co.coche_tipo ,det.det_asistencia, class.clas_descripcion,ins.id_instructor
            FROM clases_manejo as class 
            INNER JOIN detalle_clases_manejo as det on det.id_clase_manejo = class.id_clase_manejo
            INNER JOIN alumnos as alum on alum.id_alumno=det.id_alumno
            INNER JOIN instructores as ins on ins.id_instructor=class.id_instructor
            INNER join coches as co on co.id_coche=det.id_coche
            INNER JOIN cursos as cur on cur.id_curso=det.id_curso
            INNER join empleados as emp on emp.id_empleado=ins.id_empleado
            INNER JOIN dias as dia on dia.id_dia=class.id_dia 
            WHERE dia.id_dia= $dia_numero and ins.id_instructor = $id_instructor
            ORDER BY det.det_horario asc";
        }else{
            $sql = "SELECT  det.id_detalle_clases_manejo, class.id_clase_manejo,class.clas_fecha, det.det_horario, cur.cur_nombre, cur.cur_horas, det.det_n_clase, alum.alum_nombre,alum.alum_apellido, emp.emp_nombre, co.coche_tipo ,det.det_asistencia, class.clas_descripcion,ins.id_instructor
            FROM clases_manejo as class 
            INNER JOIN detalle_clases_manejo as det on det.id_clase_manejo = class.id_clase_manejo
            INNER JOIN alumnos as alum on alum.id_alumno=det.id_alumno
            INNER JOIN instructores as ins on ins.id_instructor=class.id_instructor
            INNER join coches as co on co.id_coche=det.id_coche
            INNER JOIN cursos as cur on cur.id_curso=det.id_curso
            INNER join empleados as emp on emp.id_empleado=ins.id_empleado
            INNER JOIN dias as dia on dia.id_dia=class.id_dia 
            WHERE dia.id_dia= $dia_numero
            ORDER BY det.det_horario asc";
        }

        
        $res = $instanciacompartida->ejecutar($sql);
        $lista = $instanciacompartida->obtener_filas($res);

        $instanciacompartida->setArray(null);

        $_SESSION['listaCoches'] = $this->listarCoches();
        $_SESSION['listaCursos'] = $this->listarCursos();
        $_SESSION['listaAlumnos'] = $this->listarAlumnos();
        
        return $lista;
    }


    public function CalcularHorarios(){   

        $listahorarios = array();
        if(!empty($_SESSION['listaClases'])){
            foreach ($_SESSION['listaClases'] as $key) { //construimos un array
                array_push($listahorarios,$key["det_horario"]) ;
            }
        }
        //restamos a los que ya tenemos
        $_SESSION['lista_horarios'] = array_diff($_SESSION['horarios'],$listahorarios);
    }

    public function listarCursos(){
        $instanciacompartida = ConexionBD::getInstance();

        $sql = "SELECT * FROM cursos";

        $res = $instanciacompartida->ejecutar($sql);
        $listaCursos = $instanciacompartida->obtener_filas($res);
        $instanciacompartida->setArray(null);
        return $listaCursos;

    } 


    public function listarCoches(){
        $instanciacompartida = ConexionBD::getInstance();

        $sql = "SELECT * FROM coches";

        $res = $instanciacompartida->ejecutar($sql);
        $listaCoches = $instanciacompartida->obtener_filas($res);
        $instanciacompartida->setArray(null);
        return $listaCoches;

    } 


    public function listarAlumnos(){
        $instanciacompartida = ConexionBD::getInstance();

        $sql = "SELECT * FROM alumnos";

        $res = $instanciacompartida->ejecutar($sql);
        $listaAlumnos = $instanciacompartida->obtener_filas($res);
        $instanciacompartida->setArray(null);
        return $listaAlumnos;

    } 


    
    



    public function InsertarClaseVacia(ClaseManejoBean $ClaseManejoBean){

        $id_dia = $ClaseManejoBean->getId_dia();
        $id_instructor = $ClaseManejoBean->getId_instructor();
        $clas_descripcion = $ClaseManejoBean->getClas_descripcion();
        $clas_fecha = $ClaseManejoBean->getClas_fecha();
        
        
        $instanciacompartida = ConexionBD::getInstance();
        $sql = "INSERT INTO clases_manejo(id_dia,id_instructor,clas_descripcion,clas_fecha) VALUES ($id_dia,$id_instructor,'$clas_descripcion', '$clas_fecha')";
        
        //echo $sql;

        $estado = $instanciacompartida->EjecutarConEstado($sql);
        return $estado;
    }





    public function EditarDescripcion(ClaseManejoBean $ClaseManejoBean){
        
        $descripcion = $ClaseManejoBean->getClas_descripcion();
        $id_clase = $ClaseManejoBean->getId_clase_manejo();
        $id_instructor = $ClaseManejoBean->getId_instructor();

        $instanciacompartida = ConexionBD::getInstance();
        $sql = "UPDATE clases_manejo SET clas_descripcion='$descripcion' WHERE id_clase_manejo=$id_clase";
        //echo $sql;
        //die();
        $estado = $instanciacompartida->EjecutarConEstado($sql);
        

        $ClaseManejoDAO = new ClaseManejoDAO();
        $DiaBean = new DiaBean();

        $DiaBean->setId_dia($_SESSION['id_fechas']['id_dia']);

        $_SESSION['listaClases'] = $ClaseManejoDAO->listarClases($DiaBean, $id_instructor);
        $_SESSION["clase_manejo"]= $ClaseManejoDAO->listarClaseManejo($_SESSION['id_fechas']['id_dia'],$id_instructor);

        //die();
        echo '<script> document.location.href="../VISTAS/Menu_Clases.php";</script>';
    }






    public function evaluarHorarios($horario)
    {   
        $rpta = "malo";
        foreach ($_SESSION['lista_horarios'] as $key) {
            if($key == $horario){
                $rpta = "bueno";
            } 
        }
        return $rpta;
    }



    public function insertarClase(DetalleClaseManejoBean $DetalleClaseManejoBean){

        $id_coche = $DetalleClaseManejoBean->getId_coche();
        $id_curso = $DetalleClaseManejoBean->getId_curso();
        $id_clase_manejo = $DetalleClaseManejoBean->getId_clase_manejo();
        $id_alumno = $DetalleClaseManejoBean->getId_alumno();
        $det_asistencia = $DetalleClaseManejoBean->getDet_asistencia();
        $n_hora_clase = $DetalleClaseManejoBean->getDet_n_clase();
        $horario = $DetalleClaseManejoBean->getDet_horario();

        
        $instanciacompartida = ConexionBD::getInstance();
        $sql = "INSERT INTO detalle_clases_manejo (id_clase_manejo, id_curso, id_alumno, id_coche, det_horario, det_asistencia, det_n_clase) 
                VALUES ($id_clase_manejo,$id_curso,$id_alumno,$id_coche,'$horario','$det_asistencia','$n_hora_clase')";
    
        $estado = $instanciacompartida->EjecutarConEstado($sql);
        return $estado;


        
    }


    public function listarClaseManejoPorID($id)     
    {
        $instanciacompartida = ConexionBD::getInstance();
        $sql = "SELECT * FROM clases_manejo as class inner join detalle_clases_manejo as det on det.id_clase_manejo = class.id_clase_manejo WHERE class.id_clase_manejo = $id";
        //echo $sql;
        $res = $instanciacompartida->ejecutar($sql);
        $lista = $instanciacompartida->obtener_filas($res);
        $instanciacompartida->setArray(null);

        return $lista;
    }






    public function EditarDetalleClase(DetalleClaseManejoBean $DetalleClaseManejoBean, $id_clase_antigua){
        
        $ClaseManejoDAO = new ClaseManejoDAO();
        $DiaBean = new DiaBean();
        $lista = array();
        
        $id_detalle = $DetalleClaseManejoBean->getId_detalle_clase_manejo();
        $id_clase_manejo = $DetalleClaseManejoBean->getId_clase_manejo();
        $id_coche = $DetalleClaseManejoBean->getId_coche();
        $id_curso = $DetalleClaseManejoBean->getId_curso();
        $id_alumno = $DetalleClaseManejoBean->getId_alumno();
        $det_asistencia = $DetalleClaseManejoBean->getDet_asistencia();
        $n_hora_clase = $DetalleClaseManejoBean->getDet_n_clase();
        $horario = $DetalleClaseManejoBean->getDet_horario();


        $instanciacompartida = ConexionBD::getInstance();
        $sql = "UPDATE detalle_clases_manejo 
                SET  id_clase_manejo = $id_clase_manejo,id_curso= $id_curso, id_alumno = $id_alumno, id_coche= $id_coche, det_horario = '$horario',
                det_asistencia = '$det_asistencia', det_n_clase = '$n_hora_clase' 
                WHERE id_detalle_clases_manejo = $id_detalle";


            if($id_clase_manejo != $id_clase_antigua){ //si es que deseamos cambiar de profesor, es decir de clase
                $listaClasesExterna = $this->listarClaseManejoPorID($id_clase_manejo);


                    foreach ($listaClasesExterna as $key) {
                        $lista[]  = $key["det_horario"];
                    }
                    $resultado = in_array($horario,$lista);

                if($resultado == true){
                    echo '<script> document.location.href="../VISTAS/Menu_Clases.php";</script>';
                    die();
                }

                
            } else{

                    foreach ($_SESSION['listaClases'] as $key) {
                        $lista[]  = $key["det_horario"];
                    }
                    $resultado = in_array($horario,$lista);
                
                    if($resultado == true){
                    echo '<script> document.location.href="../VISTAS/Menu_Clases.php";</script>';
                    die();
                }
            }
            
        $estado = $instanciacompartida->EjecutarConEstado($sql);
        $DiaBean->setId_dia($_SESSION['id_fechas']['id_dia']);
        $_SESSION['listaClases'] = $ClaseManejoDAO->listarClases($DiaBean, $_SESSION["seleccion"]["id"]);
        
        echo '<script> document.location.href="../VISTAS/Menu_Clases.php";</script>';

    }

               // echo '<pre>' . var_export($listaClasesExterna, true) . '</pre>';


}