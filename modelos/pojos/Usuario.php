<?php 

class Usuario{
    private $id;
    private $id_rol;
    private $usuario;
    private $clave;
    private $nombre;
    private $apellidos;
    private $email;

    public function __construct()
    {
        
    }

    public function getId(){
        return $this->id; 
    }

    public function setId($id){
        $this->id = $id;
    }
    
    public function getRol(){
        return $this->id_rol; 
    }

    public function setRol($id_rol){
        $this->id_rol = $id_rol;
    }
    
    public function getUsuario(){
        return $this->usuario; 
    }

    public function setUsuario($usuario){
        $this->usuario = $usuario;
    }

    public function getClave(){
        return $this->clave; 
    }

    public function setClave($clave){
        $this->clave = $clave;
    }

    public function getNombre(){
        return $this->nombre; 
    }

    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    public function getApellidos(){
        return $this->apellidos; 
    }

    public function setApellidos($apellidos){
        $this->apellidos = $apellidos;
    }

    public function getEmail(){
        return $this->email; 
    }

    public function setEmail($email){
        $this->email = $email;
    }


}

?>