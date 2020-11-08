<?php
require_once '../UTILS/ConexionBD.php';
require_once '../BEAN/CursoBean.php';

class M_cursoDAO{

     public function listarCursos(){
        $instanciacompartida = ConexionBD::getInstance();
        $sql="SELECT * FROM cursos";        
        $rs = $instanciacompartida->ejecutar($sql);
        $array = $instanciacompartida->obtener_filas($rs);
        return $array;      
    }

     public function agregarCursos(CursoBean $objCursoBean){
        $instanciacompartida = ConexionBD::getInstance();
        $sql="INSERT INTO cursos(cur_nombre,cur_horas,cur_descripcion)  VALUES('$objCursoBean->cur_nombre','$objCursoBean->cur_horas','$objCursoBean->cur_descripcion')";        
         $estado = $instanciacompartida->EjecutarConEstado($sql);
        return $estado;      
    }

     public function eliminarCursos($id){
        $instanciacompartida = ConexionBD::getInstance();
        $sql="DELETE FROM cursos WHERE cursos.id_curso = $id";        
        $estado = $instanciacompartida->EjecutarConEstado($sql);
        return $estado;     
    }

     public function editarCursos(CursoBean $objCursoBean){
        $instanciacompartida = ConexionBD::getInstance();
        $sql = " UPDATE cursos SET cur_nombre ='$objCursoBean->cur_nombre'  , cur_horas = '$objCursoBean->cur_horas',cur_descripcion = '$objCursoBean->cur_descripcion' WHERE cursos.id_curso = $objCursoBean->id_curso ";      
        $estado = $instanciacompartida->ejecutar($sql);   
        return $estado;     
    }

}