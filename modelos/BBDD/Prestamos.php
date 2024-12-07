<?php 
include("BaseDeDatos.php");
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
        return $prestamos;
    }

    public function insertar($id_usuario, $id_ejemplar, $fecha, $fecha_final){
        $consulta="INSERT INTO prestamo(id_usuario, id_ejemplar, fecha, fecha_final) VALUES ($id_usuario, $id_ejemplar, '$fecha', '$fecha_final')";
        $this->conexion->query($consulta);
    }

    public function editar($id, $id_usuario, $id_ejemplar, $fecha, $fecha_final)
    {
        $consulta= "UPDATE prestamo SET (id_usuario= $id_usuario, id_ejemplar= $id_ejemplar, fecha= '$fecha', fecha_final= '$fecha_final' WHERE id = $id";
        $this->conexion->query($consulta);
        
    }

    public function eliminar($id)
    {
        $consulta= "DELETE FROM prestamo WHERE id = $id";
        $this->conexion->query($consulta);
    }

    public function finalizarConexion()
    {
        $this->conexion->close();
    }

}

?>