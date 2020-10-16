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


    public function listarClases(DiaBean $DiaBean){

        $instanciacompartida = ConexionBD::getInstance();
        $dia_numero = $DiaBean->getId_dia();

        $sql = "SELECT  class.clas_fecha, det.det_horario, cur.cur_nombre, cur.cur_horas, det.det_n_clase, alum.alum_nombre,alum.alum_apellido, emp.emp_nombre, co.coche_tipo ,det.det_asistencia
                FROM clases_manejo as class 
                INNER JOIN detalle_clases_manejo as det on det.id_clase_manejo = class.id_clase_manejo
                INNER JOIN alumnos as alum on alum.id_alumno=det.id_alumno
                INNER JOIN instructores as ins on ins.id_instructor=class.id_instructor
                INNER join coches as co on co.id_coche=det.id_coche
                INNER JOIN cursos as cur on cur.id_curso=det.id_curso
                INNER join empleados as emp on emp.id_empleado=ins.id_empleado
                INNER JOIN dias as dia on dia.id_dia=class.id_dia 
                WHERE dia.id_dia=$dia_numero
                ORDER BY det.det_horario asc";
        
        $res = $instanciacompartida->ejecutar($sql);
        $lista = $instanciacompartida->obtener_filas($res);
        //echo $sql;

        $instanciacompartida->setArray(null);
        //die();
        //echo '<pre>' . var_export($lista, true) . '</pre>';
        return $lista;
    }



}