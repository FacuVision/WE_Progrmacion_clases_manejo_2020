<?php 


class AdministradorBean{

    private $id_administrador;
    private $id_empleado;	
    private $admin_nombre;
    private $admin_apellido;
    private $admin_telefono;
    private $admin_correo;
    private $admin_contra;
    private $admin_estado;

    public  function get_id_administrador(){
        return $this->id_administrador;
    }
    public  function get_admin_correo (){
        return $this->admin_correo;
    }
    public  function get_admin_contra (){
        return $this->admin_contra;
    }
    public  function get_admin_estado (){
        return $this->admin_estado;
    }
    	public function getId_empleado(){
		return $this->id_empleado;
	}

	public function setId_empleado($id_empleado){
		$this->id_empleado = $id_empleado;
	}

	public function getAdmin_nombre(){
		return $this->admin_nombre;
	}

	public function setAdmin_nombre($admin_nombre){
		$this->admin_nombre = $admin_nombre;
	}

	public function getAdmin_apellido(){
		return $this->admin_apellido;
	}

	public function setAdmin_apellido($admin_apellido){
		$this->admin_apellido = $admin_apellido;
	}

	public function getAdmin_telefono(){
		return $this->admin_telefono;
	}

	public function setAdmin_telefono($admin_telefono){
		$this->admin_telefono = $admin_telefono;
	}
    
    public  function set_id_administrador($id_administrador){
        return $this->id_administrador = $id_administrador;
    }
    public  function set_admin_correo ($admin_correo){
        return $this->admin_correo = $admin_correo;
    }
    public  function set_admin_contra ($admin_contra){
        return $this->admin_contra = $admin_contra;
    }
    public  function set_admin_estado ($admin_estado){
        return $this->admin_estado = $admin_estado;
    }

}

