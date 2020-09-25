<?php

class DiaDAO{

    public function lista_dias_segun_mes($id_mes)
    {
        $instanciacompartida = ConexionBD::getInstance();
        $sql = "SELECT * FROM dia as dia 
                INNER JOIN mes as mes on mes.id_mes=dia.id_mes
                WHERE dia.id_mes=$id_mes";
        //echo $sql;        
        $res = $instanciacompartida->ejecutar($sql);
        $lista = $instanciacompartida->obtener_filas($res);
        
        //echo '<pre>' . var_export($lista, true) . '</pre>';
        $instanciacompartida->setArray(null);
        
        return $lista;
    }
}