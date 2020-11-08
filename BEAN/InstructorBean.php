<?php 


class InstructorBean{

	private $id_instructor;
    private $id_empleado;	
    private $ins_nombre;
    private $ins_apellido;
    private $ins_telefono;
    private $ins_correo;
    private $ins_estado;

    public function getId_empleado(){
		return $this->id_empleado;
	}

	public function setId_empleado($id_empleado){
		$this->id_empleado = $id_empleado;
	}

	    public function getId_instructor(){
		return $this->id_instructor;
	}

	public function setId_instructor($id_instructor){
		$this->id_instructor = $id_instructor;
	}


	public function getIns_nombre(){
		return $this->ins_nombre;
	}

	public function setIns_nombre($ins_nombre){
		$this->ins_nombre = $ins_nombre;
	}

    
	public function getIns_apellido(){
		return $this->ins_apellido;
	}

	public function setIns_apellido($ins_apellido){
		$this->ins_apellido = $ins_apellido;
	}

	public function getIns_telefono(){
		return $this->ins_telefono;
	}

	public function setIns_telefono($ins_telefono){
		$this->ins_telefono = $ins_telefono;
	}

	public function getIns_correo(){
		return $this->ins_correo;
	}

	public function setIns_correo($ins_correo){
		$this->ins_correo = $ins_correo;
	}

	public function getIns_estado(){
		return $this->ins_estado;
	}

	public function setIns_estado($ins_estado){
		$this->ins_estado = $ins_estado;
	}

}

