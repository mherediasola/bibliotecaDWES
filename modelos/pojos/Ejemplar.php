<?php 

class Ejemplar{
    private $id;
    private $nombre;
    private $tipo;
    private $autor;
    private $idioma;
    private $editorial;

    public function __construct()
    {
        
    }

    public function getId(){
        return $this->id; 
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getNombre(){
        return $this->nombre; 
    }

    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    public function getTipo(){
        return $this->tipo; 
    }

    public function setTipo($tipo){
        $this->tipo = $tipo;
    }

    public function getAutor(){
        return $this->autor; 
    }

    public function setAutor($autor){
        $this->autor = $autor;
    }

    public function getIdioma(){
        return $this->idioma; 
    }

    public function setIdioma($idioma){
        $this->idioma = $idioma;
    }

    public function getEditorial(){
        return $this->editorial; 
    }

    public function setEditorial($editorial){
        $this->editorial = $editorial;
    }


}

?>