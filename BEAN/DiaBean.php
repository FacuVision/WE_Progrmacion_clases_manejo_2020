<?php 


class AdministardorBean{

    private $id_dia;
    private $id_mes;
    private $dia_numero;

	public function getId_dia(){
		return $this->id_dia;
	}

	public function setId_dia($id_dia){
		$this->id_dia = $id_dia;
	}

	public function getId_mes(){
		return $this->id_mes;
	}

	public function setId_mes($id_mes){
		$this->id_mes = $id_mes;
	}

}

