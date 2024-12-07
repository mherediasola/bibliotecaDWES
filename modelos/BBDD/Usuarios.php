<?php 
include("BaseDeDatos.php");
class Usuarios implements BaseDeDatos{
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
        $consulta = "SELECT * FROM usuario";
        $resultado = $this->conexion->query($consulta);
        $usuarios= $resultado->fetch_All(MYSQLI_BOTH);
        return $usuarios;
    }

    public function consultarCoincideId($id)
    {
        $consulta = "SELECT * FROM usuario WHERE id = $id";
        $resultado = $this->conexion->query($consulta);
        $usuarios = $resultado->fetch_All(MYSQLI_BOTH);
        return $usuarios;
    }

    public function insertar($id_rol, $usuario, $clave, $nombre, $apellidos, $email){
        $consulta="INSERT INTO usuario(id_rol, usuario, clave, nombre, apellidos, email) VALUES ($id_rol, '$usuario', '$clave', '$nombre', '$apellidos', '$email')";
        $this->conexion->query($consulta);
    }

    public function editar($id, $id_rol, $usuario, $clave, $nombre, $apellidos, $email)
    {
        $consulta= "UPDATE usuario SET (id_rol= $id_rol, usuario='$usuario', clave= '$clave', nombre= '$nombre', apellidos = '$apellidos', email = '$email' WHERE id = $id";
        $this->conexion->query($consulta);
        
    }

    public function eliminar($id)
    {
        $consulta= "DELETE FROM usuario WHERE id = $id";
        $this->conexion->query($consulta);
    }

    public function finalizarConexion()
    {
        $this->conexion->close();
    }

}

?>