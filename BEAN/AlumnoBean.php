<?php


class AlumnoBean{

public $id_alumno;
public $alum_nombre;
public $alum_apellido;
public $alum_telefono;
public $alum_correo;
public $alum_estado_pago;  
public $alum_estado;  


public function getId_alumno(){
    return $this->id_alumno;
}

public function setId_alumno($id_alumno){
    $this->id_alumno = $id_alumno;
}

public function getAlum_nombre(){
    return $this->alum_nombre;
}

public function setAlum_nombre($alum_nombre){
    $this->alum_nombre = $alum_nombre;
}

public function getAlum_aplellido(){
    return $this->alum_aplellido;
}

public function setAlum_apellido($alum_apellido){
    $this->alum_apellido = $alum_apellido;
}

public function getAlum_telefono(){
    return $this->alum_telefono;
}

public function setAlum_telefono($alum_telefono){
    $this->alum_telefono = $alum_telefono;
}

public function getAlum_correo(){
    return $this->alum_correo;
}

public function setAlum_correo($alum_correo){
    $this->alum_correo = $alum_correo;
}

public function getAlum_estado(){
    return $this->alum_estado;
}

public function setAlum_estado($alum_estado){
    $this->alum_estado = $alum_estado;
}

public function getAlum_estado_pago(){
    return $this->alum_estado_pago;
}

public function setAlum_estado_pago($alum_estado_pago){
    $this->alum_estado_pago = $alum_estado_pago;
}

}