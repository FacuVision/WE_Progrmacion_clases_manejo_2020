<?php

require_once('../BEAN/ClaseManejoBean.php');
require_once('../UTILS/ConexionBD.php');

class ClaseManejoDAO{

    public function listarAgnos(){

        $instanciacompartida = ConexionBD::getInstance();
        $sql = "SELECT * FROM agno";
        $res = $instanciacompartida->ejecutar($sql);
        $lista = $instanciacompartida->obtener_filas($res);
        
        //echo '<pre>' . var_export($lista, true) . '</pre>';
        return $lista;
    }



}