<?php 


class AñoBean{

    private $id_año;
    private $año;

	public function getId_año(){
		return $this->id_año;
	}

	public function setId_año($id_año){
		$this->id_año = $id_año;
	}

	public function getAño(){
		return $this->año;
	}

	public function setAño($año){
		$this->año = $año;
	}
}

