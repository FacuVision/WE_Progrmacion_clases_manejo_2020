<?php 


class CursoBean{

    public $id_curso;
    public $cur_nombre;
    public $cur_horas;
    public $cur_descripcion;

	public function getId_curso(){
		return $this->id_curso;
	}

	public function setId_curso($id_curso){
		$this->id_curso = $id_curso;
	}

	public function getCur_nombre(){
		return $this->cur_nombre;
	}

	public function setCur_nombre($cur_nombre){
		$this->cur_nombre = $cur_nombre;
	}

	public function getCur_horas(){
		return $this->cur_horas;
	}

	public function setCur_horas($cur_horas){
		$this->cur_horas = $cur_horas;
	}

	public function getCur_descripcion(){
		return $this->cur_descripcion;
	}

	public function setCur_descripcion($cur_descripcion){
		$this->cur_descripcion = $cur_descripcion;
	}

}

