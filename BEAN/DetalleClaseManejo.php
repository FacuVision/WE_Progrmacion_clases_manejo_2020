<?php 

class DetalleClaseManejo{

    private $id_detalle_clase_manejo;
    private $id_clase_manejo;
    private $id_curso;
	private  $id_alumno;
	private  $id_coche;
	private  $det_horario;
	private  $det_asistencia;
	private  $det_n_clase;

	public function getId_detalle_clase_manejo(){
		return $this->id_detalle_clase_manejo;
	}

	public function setId_detalle_clase_manejo($id_detalle_clase_manejo){
		$this->id_detalle_clase_manejo = $id_detalle_clase_manejo;
	}

	public function getId_clase_manejo(){
		return $this->id_clase_manejo;
	}

	public function setId_clase_manejo($id_clase_manejo){
		$this->id_clase_manejo = $id_clase_manejo;
	}

	public function getId_curso(){
		return $this->id_curso;
	}

	public function setId_curso($id_curso){
		$this->id_curso = $id_curso;
	}

	public function getId_alumno(){
		return $this->id_alumno;
	}

	public function setId_alumno($id_alumno){
		$this->id_alumno = $id_alumno;
	}

	public function getId_coche(){
		return $this->id_coche;
	}

	public function setId_coche($id_coche){
		$this->id_coche = $id_coche;
	}

	public function getDet_horario(){
		return $this->det_horario;
	}

	public function setDet_horario($det_horario){
		$this->det_horario = $det_horario;
	}

	public function getDet_asistencia(){
		return $this->det_asistencia;
	}

	public function setDet_asistencia($det_asistencia){
		$this->det_asistencia = $det_asistencia;
	}

	public function getDet_n_clase(){
		return $this->det_n_clase;
	}

	public function setDet_n_clase($det_n_clase){
		$this->det_n_clase = $det_n_clase;
	}
}

