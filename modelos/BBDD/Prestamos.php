<?php 
include("BaseDeDatos.php");
require_once(__DIR__ . "/../pojos/Prestamo.php");
class Prestamos implements BaseDeDatos{
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
        $consulta = "SELECT * FROM prestamo";
        $resultado = $this->conexion->query($consulta);
        $prestamos= $resultado->fetch_All(MYSQLI_BOTH);
        return $prestamos;
    }

    public function consultarCoincideId($id)
    {
        $consulta = "SELECT * FROM prestamo WHERE id = $id";
        $resultado = $this->conexion->query($consulta);
        $prestamos = $resultado->fetch_All(MYSQLI_BOTH);
        $prestamos = $prestamos[0];
        $prestamo = new Prestamo();
        $prestamo->setId($prestamos['id']);
        $prestamo->setIdUsuario($prestamos['id_usuario']);
        $prestamo->setIdEjemplar($prestamos['id_ejemplar']);
        $prestamo->setFecha($prestamos['fecha']);
        $prestamo->setFechaFinal($prestamos['fecha_final']);
        return $prestamo;
    }

    public function insertar($prestamo){
        $consulta="INSERT INTO prestamo(id_usuario, id_ejemplar, fecha, fecha_final) VALUES ({$prestamo->getIdUsuario()}, {$prestamo->getIdEjemplar()}, '{$prestamo->getFecha()}', '{$prestamo->getFechaFinal()}')";
        $this->conexion->query($consulta);
    }

    public function editar($prestamo)
    {
        $consulta= "UPDATE prestamo SET (id_usuario= {$prestamo->getIdUsuario()}, id_ejemplar= {$prestamo->getIdEjemplar()}, fecha= '{$prestamo->getFecha()}', fecha_final= '$prestamo->getFechaFinal()}' WHERE id = {$prestamo->getId()}";
        $this->conexion->query($consulta);
        
    }

    public function eliminar($prestamo)
    {
        $consulta= "DELETE FROM prestamo WHERE id = {$prestamo->getId()}";
        $this->conexion->query($consulta);
    }

    public function finalizarConexion()
    {
        $this->conexion->close();
    }

}

?>