<?php 


class DiaBean{


    private $id_dia;
    private $id_mes;
	private $dia_numero;
	private $dia_estado;

	public function getId_dia(){
		return $this->id_dia;
	}

	public function setId_dia($id_dia){
		$this->id_dia = $id_dia;
	}

	public function getdia_estado(){
		return $this->dia_estado;
	}

	public function setdia_estado($dia_estado){
		$this->dia_estado = $dia_estado;
	}

	public function getId_mes(){
		return $this->id_mes;
	}

	public function setId_mes($id_mes){
		$this->id_mes = $id_mes;
	}

	public function getDia_numero(){
		return $this->dia_numero;
	}

	public function setDia_numero($dia_numero){
		$this->dia_numero = $dia_numero;
	}
}

