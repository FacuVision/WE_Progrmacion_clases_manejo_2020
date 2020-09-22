<?php 


class MesBean{

    private $id_mes;
    private $id_año;
    private $mes_numero;

	public function getId_mes(){
		return $this->id_mes;
	}

	public function setId_mes($id_mes){
		$this->id_mes = $id_mes;
	}

	public function getId_año(){
		return $this->id_año;
	}

	public function setId_año($id_año){
		$this->id_año = $id_año;
	}

	public function getMes_numero(){
		return $this->mes_numero;
	}

}

