<?php 

class Rol{
    private $id;
    private $tipo;

    public function __construct()
    {
        
    }

    public function getId(){
        return $this->id; 
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getTipo(){
        return $this->tipo; 
    }

    public function setTipo($tipo){
        $this->tipo = $tipo;
    }


}

?>