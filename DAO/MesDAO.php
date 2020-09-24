<?php

require_once('../UTILS/ConexionBD.php');
require_once('../BEAN/MesBean.php');

class MesDAO{

    public function listarMeses_segun_agno($id_agno){

        $instanciacompartida = ConexionBD::getInstance();
        $sql = "SELECT * FROM mes as mes 
                INNER JOIN agno as agno on agno.id_agno=mes.id_agno
                where agno.id_agno=$id_agno";
        //echo $sql;        
        $res = $instanciacompartida->ejecutar($sql);
        $lista = $instanciacompartida->obtener_filas($res);
        
        //echo '<pre>' . var_export($lista, true) . '</pre>';
        return $lista;
    }
    
    public function eliminar_mes(MesBean $MesBean){

        $id_mes = $MesBean->getId_mes();

        $instanciacompartida = ConexionBD::getInstance();
        $sql = "DELETE FROM mes WHERE id_mes=$id_mes";
        $estado = $instanciacompartida->EjecutarConEstado($sql);
        
        return $estado;
        
    }

}