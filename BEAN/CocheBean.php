<?php 


class CocheBean{

    public $id_coche;
    public $coche_modelo;
    public $coche_tipo;
    public  $coche_placa;
    public  $coche_marca;

	public function getId_coche(){
		return $this->id_coche;
	}

	public function setId_coche($id_coche){
		$this->id_coche = $id_coche;
	}

	public function getCoche_modelo(){
		return $this->coche_modelo;
	}

	public function setCoche_modelo($coche_modelo){
		$this->coche_modelo = $coche_modelo;
	}

	public function getCoche_tipo(){
		return $this->coche_tipo;
	}

	public function setCoche_tipo($coche_tipo){
		$this->coche_tipo = $coche_tipo;
	}

	public function getCoche_placa(){
		return $this->coche_placa;
	}

	public function setCoche_placa($coche_placa){
		$this->coche_placa = $coche_placa;
	}

	public function getCoche_marca(){
		return $this->coche_marca;
	}

	public function setCoche_marca($coche_marca){
		$this->coche_marca = $coche_marca;
	}

}

