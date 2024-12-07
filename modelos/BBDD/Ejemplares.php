<?php 
include("BaseDeDatos.php");
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
        return $ejemplares;
    }

    public function consultarCoincideId($id)
    {
        $consulta = "SELECT * FROM ejemplar WHERE id = $id";
        $resultado = $this->conexion->query($consulta);
        $ejemplares = $resultado->fetch_All(MYSQLI_BOTH);
        return $ejemplares;
    }

    public function insertar($nombre, $tipo, $autor, $idioma, $editorial){
        $consulta="INSERT INTO ejemplar(nombre, tipo, autor, idioma, editorial) VALUES ('$nombre', $tipo, '$autor', '$idioma', '$editorial')";
        $this->conexion->query($consulta);
    }

    public function editar($id, $nombre, $tipo, $autor, $idioma, $editorial)
    {
        $consulta= "UPDATE ejemplar SET nombre='$nombre', tipo=$tipo, autor= '$autor', idioma= '$idioma', editorial = '$editorial' WHERE id = $id";
        $this->conexion->query($consulta);
        
    }

    public function eliminar($id)
    {
        $consulta= "DELETE FROM ejemplar WHERE id = $id";
        $this->conexion->query($consulta);
    }

    public function finalizarConexion()
    {
        $this->conexion->close();
    }

}

?>