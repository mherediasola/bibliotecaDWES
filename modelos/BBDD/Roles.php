<?php 
include("BaseDeDatos.php");
class Roles implements BaseDeDatos{
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
        $consulta = "SELECT * FROM rol";
        $resultado = $this->conexion->query($consulta);
        $roles = $resultado->fetch_All(MYSQLI_BOTH);
        return $roles;
    }

    public function consultarCoincideId($id)
    {
        $consulta = "SELECT * FROM rol WHERE id = $id";
        if($resultado = $this->conexion->query($consulta)){
            $roles = $resultado->fetch_All(MYSQLI_BOTH);
            return $roles;
        }
    }

    public function insertar($tipo){
        $consulta="INSERT INTO rol(tipo) VALUES ('$tipo')";
        $this->conexion->query($consulta);
    }

    public function editar($tipo, $id)
    {
        $consulta= "UPDATE rol SET tipo='$tipo' WHERE id = $id";
        $this->conexion->query($consulta);
        
    }

    public function eliminar($id)
    {
        $consulta= "DELETE FROM rol WHERE id = $id";
        $this->conexion->query($consulta);
    }

    public function finalizarConexion()
    {
        $this->conexion->close();
    }


    

}

?>