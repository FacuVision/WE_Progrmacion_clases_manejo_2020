<?php
require_once('../BEAN/AgnoBean.php');
require_once('../UTILS/ConexionBD.php');

class AgnoDAO{

    public function insertar_agno(AgnoBean $AgnoBean){

        $numero_agno = $AgnoBean->getAgno();

        $instanciacompartida = ConexionBD::getInstance();
        $sql = "INSERT INTO agnos(agno_numero) VALUES ('$numero_agno')";
        $estado = $instanciacompartida->EjecutarConEstado($sql);

        $AgnoBean->setId_agno($instanciacompartida->Ultimo_ID());
        
        if($estado>0) $estado2 = $this->Llenar_Meses($AgnoBean);
        
        return $estado2;
    }

    public function Llenar_Meses(AgnoBean $AñoBean){

        $agno_id = $AñoBean->getId_agno();
        
        $instanciacompartida = ConexionBD::getInstance();

        //SE EJECUTARA 12 VECES 
        for ($numero_mes=1; $numero_mes < 13; $numero_mes++) { 
            $sql = "INSERT INTO meses(id_agno,mes_numero) VALUES ($agno_id,'$numero_mes')";
            $estado2 = $instanciacompartida->EjecutarConEstado($sql);
        }
        
        return $estado2;
    }


    public function eliminar_agno(AgnoBean $AgnoBean){

        $id_agno = $AgnoBean->getId_agno();

        $instanciacompartida = ConexionBD::getInstance();
        $sql = "DELETE FROM agnos WHERE id_agno=$id_agno";
        $estado = $instanciacompartida->EjecutarConEstado($sql);
        
        return $estado;

    }

    

}