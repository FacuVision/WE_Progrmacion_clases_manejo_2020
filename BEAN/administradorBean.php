<?php 


class AdministradorBean{

    private $id_administrador;
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

