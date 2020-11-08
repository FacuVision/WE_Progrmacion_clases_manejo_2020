<?php
require_once "../UTILS/ConexionBD.php";
require_once "../BEAN/DiaBean.php";
require_once "../BEAN/MesBean.php";

class DiaDAO{

    public function lista_dias_segun_mes($id_mes)
    {
        $instanciacompartida = ConexionBD::getInstance();
        $sql = "SELECT * FROM dias as dia 
                INNER JOIN meses as mes on mes.id_mes=dia.id_mes
                WHERE dia.id_mes=$id_mes";
        //echo $sql;        
        $res = $instanciacompartida->ejecutar($sql);
        $lista = $instanciacompartida->obtener_filas($res);
        
        //echo '<pre>' . var_export($lista, true) . '</pre>';
        $instanciacompartida->setArray(null);
        
        return $lista;
    }



    public function InsertarDia(DiaBean $DiaBean, MesBean $MesBean)
    {
        $dia_numero = $DiaBean->getDia_numero();
        $id_mes = $MesBean->getId_mes();

        $instanciacompartida = ConexionBD::getInstance();
        $sql = "INSERT INTO dias(id_mes, dia_numero, dia_estado) 
                VALUES ($id_mes,'$dia_numero', 'Sin datos')";
        //echo $sql;        
        $estado = $instanciacompartida->EjecutarConEstado($sql);
        return $estado;
    }


    public function eliminar_dia(DiaBean $DiaBean){

        $id_dia = $DiaBean->getId_dia();

        $instanciacompartida = ConexionBD::getInstance();
        $sql = "DELETE FROM dias WHERE id_dia=$id_dia";
        $estado = $instanciacompartida->EjecutarConEstado($sql);
        //echo $sql;
        return $estado;
        
    }

    public function editarEstado(DiaBean $DiaBean)
    {
        $dia_estado = $DiaBean->getdia_estado();
        $id_dia = $DiaBean->getId_dia();

        $instanciacompartida = ConexionBD::getInstance();
        $sql = "UPDATE dias SET dia_estado='$dia_estado' WHERE id_dia=$id_dia";
        $estado = $instanciacompartida->EjecutarConEstado($sql);
        return $estado;
        
    }

}