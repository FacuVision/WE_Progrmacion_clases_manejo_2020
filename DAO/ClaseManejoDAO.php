<?php

require_once('../BEAN/ClaseManejoBean.php');
require_once('../UTILS/ConexionBD.php');

class ClaseManejoDAO{

    public function listarAgnos(){

        $instanciacompartida = ConexionBD::getInstance();
        $sql = "SELECT * FROM agnos";
        $res = $instanciacompartida->ejecutar($sql);
        $lista = $instanciacompartida->obtener_filas($res);
        
        //echo '<pre>' . var_export($lista, true) . '</pre>';
        return $lista;
    }


    public function listarClases(DiaBean $DiaBean, $id_empleado){

        $instanciacompartida = ConexionBD::getInstance();
        $dia_numero = $DiaBean->getId_dia();

        $sql = "SELECT  class.clas_fecha, det.det_horario, cur.cur_nombre, cur.cur_horas, det.det_n_clase, alum.alum_nombre,alum.alum_apellido, emp.emp_nombre, co.coche_tipo ,det.det_asistencia, class.clas_descripcion,ins.id_instructor
                FROM clases_manejo as class 
                INNER JOIN detalle_clases_manejo as det on det.id_clase_manejo = class.id_clase_manejo
                INNER JOIN alumnos as alum on alum.id_alumno=det.id_alumno
                INNER JOIN instructores as ins on ins.id_instructor=class.id_instructor
                INNER join coches as co on co.id_coche=det.id_coche
                INNER JOIN cursos as cur on cur.id_curso=det.id_curso
                INNER join empleados as emp on emp.id_empleado=ins.id_empleado
                INNER JOIN dias as dia on dia.id_dia=class.id_dia 
                WHERE dia.id_dia= $dia_numero and ins.id_instructor = $id_empleado
                ORDER BY det.det_horario asc";
        
        $res = $instanciacompartida->ejecutar($sql);
        $lista = $instanciacompartida->obtener_filas($res);
        //echo $sql;

        $instanciacompartida->setArray(null);
        //die();
        //echo '<pre>' . var_export($lista, true) . '</pre>';
        return $lista;
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



}