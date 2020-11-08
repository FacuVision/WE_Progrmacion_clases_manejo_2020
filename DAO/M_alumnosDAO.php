<?php
require_once '../UTILS/ConexionBD.php';
require_once '../BEAN/AlumnoBean.php';

class M_alumnosDAO{

     public function listarAlumnos(){
        $instanciacompartida = ConexionBD::getInstance();
        $sql="SELECT * FROM alumnos";        
        $rs = $instanciacompartida->ejecutar($sql);
        $array = $instanciacompartida->obtener_filas($rs);
        return $array;      
    }

     public function agregarAlumno(AlumnoBean $objAlumnoBean){
        $instanciacompartida = ConexionBD::getInstance();
        $sql="INSERT INTO alumnos(alum_nombre,alum_apellido,alum_telefono, alum_correo, alum_estado_pago, alum_estado)  VALUES('$objAlumnoBean->alum_nombre','$objAlumnoBean->alum_apellido','$objAlumnoBean->alum_telefono','$objAlumnoBean->alum_correo',
        '$objAlumnoBean->alum_estado_pago',
        '$objAlumnoBean->alum_estado')";        
         $estado = $instanciacompartida->EjecutarConEstado($sql);

        return $estado;      
    }

     public function eliminarAlumno($id){
        $instanciacompartida = ConexionBD::getInstance();
        $sql="DELETE FROM alumnos WHERE id_alumno = $id";        
        $estado = $instanciacompartida->EjecutarConEstado($sql);
        return $estado;     
    }

     public function editarAlumno(AlumnoBean $objAlumnosBean){
        $instanciacompartida = ConexionBD::getInstance();
        $sql = " UPDATE alumnos 
                        SET alum_nombre ='$objAlumnosBean->alum_nombre', alum_apellido = '$objAlumnosBean->alum_apellido', alum_telefono='$objAlumnosBean->alum_telefono', alum_correo='$objAlumnosBean->alum_correo',alum_estado_pago='$objAlumnosBean->alum_estado_pago', alum_estado='$objAlumnosBean->alum_estado'
                        WHERE alumnos.id_alumno = $objAlumnosBean->id_alumno";      
        $estado = $instanciacompartida->ejecutar($sql);        
        return $estado;     
    }

}