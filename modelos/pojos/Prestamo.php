<?php 

class Prestamo{
    private $id;
    private $usuario;
    private $ejemplar;
    private $autor;
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

    public function getUsuario(){
        return $this->usuario; 
    }

    public function setUsuario($usuario){
        $this->usuario = $usuario;
    }
    
    public function getEjemplar(){
        return $this->ejemplar; 
    }

    public function setEjemplar($ejemplar){
        $this->ejemplar = $ejemplar;
    }

    public function getAutor(){
        return $this->autor; 
    }

    public function setAutor($autor){
        $this->autor = $autor;
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
        $this->fecha_final = $fecha_final;
    }

}

?>