<?php 

class ClaseManejoBean{

    private $id_clase_manejo;
    private $id_dia;
    private $id_instructor;
	private $clas_descripcion;
	private $clas_fecha;

	public function getId_clase_manejo(){
		return $this->id_clase_manejo;
	}

	public function setId_clase_manejo($id_clase_manejo){
		$this->id_clase_manejo = $id_clase_manejo;
	}

	public function getId_dia(){
		return $this->id_dia;
	}

	public function setId_dia($id_dia){
		$this->id_dia = $id_dia;
	}

	public function getId_instructor(){
		return $this->id_instructor;
	}

	public function setId_instructor($id_instructor){
		$this->id_instructor = $id_instructor;
	}

	public function getClas_descripcion(){
		return $this->clas_descripcion;
	}

	public function setClas_descripcion($clas_descripcion){
		$this->clas_descripcion = $clas_descripcion;
	}

	
	public function getClas_fecha(){
		return $this->clas_fecha;
	}

	public function setClas_fecha($clas_fecha){
		$this->clas_fecha = $clas_fecha;
	}


}

