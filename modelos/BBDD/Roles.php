<?php 
include("BaseDeDatos.php");
require_once(__DIR__ . "/../pojos/Rol.php");
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
        $array_roles = array();
        foreach($roles as $rol){
            $tmp = new Rol();
            $tmp->setId($rol['id']);
            $tmp->setTipo($rol['tipo']);
            array_push($array_roles, $tmp);
        }
        return $array_roles;
    }

    public function consultarCoincideId($id)
    {
        $consulta = "SELECT * FROM rol WHERE id = $id";
        $resultado = $this->conexion->query($consulta);
        $roles = $resultado->fetch_All(MYSQLI_BOTH);
        $roles = $roles[0];
        $rol = new Rol();
        $rol->setId($roles['id']);
        $rol->setTipo($roles['tipo']);
        return $rol;
    }

    public function insertar($rol){
        $consulta="INSERT INTO rol(tipo) VALUES ('{$rol->getTipo()}')";
        $this->conexion->query($consulta);
    }

    public function editar($rol)
    {
        $consulta= "UPDATE rol SET tipo='{$rol->getTipo()}' WHERE id = {$rol->getId()}";
        $this->conexion->query($consulta);
        
    }

    public function eliminar($rol)
    {
        $consulta= "DELETE FROM rol WHERE id = {$rol->getId()}";
        $this->conexion->query($consulta);
    }

    public function finalizarConexion()
    {
        $this->conexion->close();
    }


    

}

?>