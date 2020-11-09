<?php

class DetalleClaseManejoDAO {

    public function ListarDatosGlobales() {

         $instanciacompartida = ConexionBD::getInstance();

        $sql = "SELECT  dcm.det_horario, cm.clas_fecha ,concat_ws(' ', a.alum_nombre,  a.alum_apellido)  as alumno, c2.cur_nombre, dcm.det_n_clase,c.coche_tipo,concat_ws(' / ',dcm.det_n_clase ,c2.cur_horas)as hechas_total,dcm.det_asistencia, concat_ws(' ',e.emp_nombre ,e.emp_apellido)as Instructor, c2.cur_descripcion from empleados e 
		join instructores i on (e.id_empleado=i.id_empleado)
		join clases_manejo cm on (i.id_instructor=cm.id_instructor)
		join detalle_clases_manejo dcm on(cm.id_clase_manejo=dcm.id_clase_manejo)
		join coches c on (c.id_coche=dcm.id_coche)
		join cursos c2 on (c2.id_curso=dcm.id_curso)
        join alumnos a on (a.id_alumno=dcm.id_alumno) ";

        $res = $instanciacompartida->ejecutar($sql);
        $lista = $instanciacompartida->obtener_filas($res);
        $instanciacompartida->setArray(null);
        return $lista;
    }

}