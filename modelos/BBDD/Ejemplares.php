<?php 
require_once("BaseDeDatos.php");
require_once(__DIR__ . "/../pojos/Ejemplar.php");
class Ejemplares implements BaseDeDatos{
    //atributos
    private $conexion;
    private $server;
    private $user;
    private $pass;
    private $base;

    //métodos
    public function __construct()
    {
        $this->server="localhost:3308";
        $this->user = "root";
        $this->pass = "";
        $this->base = "biblioteca";
        $this->conexion = new mysqli($this->server, $this->user, $this->pass, $this->base);
    }

    public function consultarTodo()
    {
        $consulta = "SELECT * FROM ejemplar";
        $resultado = $this->conexion->query($consulta);
        $ejemplares= $resultado->fetch_All(MYSQLI_BOTH);
        $array_ejemplares = array();
        foreach($ejemplares as $ejemplar){
            $tmp = new Ejemplar();
            $tmp->setId($ejemplar['id']);
            $tmp->setNombre($ejemplar['nombre']);
            $tmp->setTipo($ejemplar['tipo']);
            $tmp->setAutor($ejemplar['autor']);
            $tmp->setIdioma($ejemplar['idioma']);
            $tmp->setEditorial($ejemplar['editorial']);
            array_push($array_ejemplares, $tmp);
        }
        return $array_ejemplares;
    }

    public function consultarCoincideId($id)
    {
        $consulta = "SELECT * FROM ejemplar WHERE id = $id";
        $resultado = $this->conexion->query($consulta);
        $ejemplares = $resultado->fetch_All(MYSQLI_BOTH);
        $ejemplares = $ejemplares[0];
        $ejemplar = new Ejemplar();
        $ejemplar->setId($ejemplares['id']);
        $ejemplar->setNombre($ejemplares['nombre']);
        $ejemplar->setTipo($ejemplares['tipo']);
        $ejemplar->setAutor($ejemplares['autor']);
        $ejemplar->setIdioma($ejemplares['idioma']);
        $ejemplar->setEditorial($ejemplares['editorial']);
        return $ejemplar;
    }

    public function insertar($ejemplar){
        $consulta="INSERT INTO ejemplar(nombre, tipo, autor, idioma, editorial) VALUES ('{$ejemplar->getNombre()}', '{$ejemplar->getTipo()}', '{$ejemplar->getAutor()}', '{$ejemplar->getIdioma()}', '{$ejemplar->getEditorial()}')";
        $this->conexion->query($consulta);
    }

    public function editar($ejemplar)
    {
        $consulta= "UPDATE ejemplar SET nombre='{$ejemplar->getNombre()}', tipo='{$ejemplar->getTipo()}', autor= '{$ejemplar->getAutor()}', idioma= '{$ejemplar->getIdioma()}', editorial = '{$ejemplar->getEditorial()}' WHERE id = {$ejemplar->getId()}";
        $this->conexion->query($consulta);
        
    }

    public function eliminar($ejemplar)
    {
        $consulta= "DELETE FROM ejemplar WHERE id = {$ejemplar->getId()}";
        $this->conexion->query($consulta);
    }

    public function finalizarConexion()
    {
        $this->conexion->close();
    }

}

?>