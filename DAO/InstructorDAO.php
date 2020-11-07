<?php
require_once("../BEAN/InstructorBean.php");
require_once("../UTILS/ConexionBD.php");


class InstructorDAO{



    public function listarInstructoresConClase($id_dia){

        $instanciacompartida = ConexionBD::getInstance();

        $sql = "SELECT * FROM instructores as ins INNER JOIN empleados as emp on emp.id_empleado = ins.id_empleado 
        INNER JOIN clases_manejo as clas on clas.id_instructor = ins.id_instructor
        INNER JOIN dias as dia on dia.id_dia= clas.id_dia WHERE dia.id_dia =$id_dia";
        $res = $instanciacompartida->ejecutar($sql);
        $lista = $instanciacompartida->obtener_filas($res);

            $instanciacompartida->setArray(null);
        return $lista;
    }




    public function listarInstructores(){

        $instanciacompartida = ConexionBD::getInstance();
        $sql = "SELECT * FROM instructores as ins INNER JOIN empleados as emp on emp.id_empleado = ins.id_empleado";
        $res = $instanciacompartida->ejecutar($sql);
        $lista = $instanciacompartida->obtener_filas($res);

        $instanciacompartida->setArray(null);
        return $lista;
    }

    public function listarInstructoresID($id){

        $instanciacompartida = ConexionBD::getInstance();
        $sql = "SELECT * FROM instructores as ins 
                INNER JOIN empleados as emp on emp.id_empleado = ins.id_empleado 
                WHERE ins.id_instructor=$id";
        $res = $instanciacompartida->ejecutar($sql);
        $lista = $instanciacompartida->obtener_filas($res);

        $instanciacompartida->setArray(null);
        return $lista;
    }
    
    public function listarClasesDelDia($id_dia){

        $instanciacompartida = ConexionBD::getInstance();
        $sql = "    SELECT * FROM clases_manejo as clas 
                    INNER join instructores as ins on ins.id_instructor = clas.id_instructor
                    inner join empleados as emp on emp.id_empleado = ins.id_empleado
                    where id_dia=$id_dia";
        $res = $instanciacompartida->ejecutar($sql);
        $lista = $instanciacompartida->obtener_filas($res);

        $instanciacompartida->setArray(null);
        return $lista;
    }
}


