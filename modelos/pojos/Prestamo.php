<?php 

class Prestamo{
    private $id;
    private $id_usuario;
    private $id_ejemplar;
    private $fecha;
    private $fecha_final;

    public function __construct()
    {
        
    }

    public function getId(){
        return $this->id; 
    }

    public function setId($id){
        $this->id = $id;
    }
    
    public function getIdUsuario(){
        return $this->id_usuario; 
    }

    public function setIdUsuario($id_usuario){
        $this->id_usuario = $id_usuario;
    }
    
    public function getIdEjemplar(){
        return $this->id_ejemplar; 
    }

    public function setIdEjemplar($id_ejemplar){
        $this->id_ejemplar = $id_ejemplar;
    }

    public function getFecha(){
        return $this->fecha; 
    }

    public function setFecha($fecha){
        $this->fecha = $fecha;
    }

    public function getFechaFinal(){
        return $this->fecha_final; 
    }

    public function setFechaFinal($fecha_final){
        $this->fecha = $fecha_final;
    }

}

?>