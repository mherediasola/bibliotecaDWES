<?php 
include("BaseDeDatos.php");
require_once(__DIR__ . "/../pojos/Usuario.php");
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
        $usuarios = $usuarios[0];
        $usuario = new Usuario();
        $usuario->setId($usuarios['id']);
        $usuario->setIdRol($usuarios['id_rol']);
        $usuario->setUsuario($usuarios['usuario']);
        $usuario->setClave($usuarios['clave']);
        $usuario->setNombre($usuarios['nombre']);
        $usuario->setApellidos($usuarios['apellidos']);
        $usuario->setEmail($usuarios['email']);
        return $usuario;
    }

    public function insertar($usuario){
        $consulta="INSERT INTO usuario(id_rol, usuario, clave, nombre, apellidos, email) VALUES ({$usuario->getIdRol()}, '{$usuario->getUsuario()}', '{$usuario->getClave()}', '{$usuario->getNombre()}', '{$usuario->getApellidos()}', '{$usuario->getEmail()}')";
        $this->conexion->query($consulta);
    }

    public function editar($usuario)
    {
        $consulta= "UPDATE usuario SET id_rol={$usuario->getIdRol()}, usuario='{$usuario->getUsuario()}', clave='{$usuario->getClave()}', nombre='{$usuario->getNombre()}', apellidos='{$usuario->getApellidos()}', email='{$usuario->getEmail()}' WHERE id = {$usuario->getId()}";
        $this->conexion->query($consulta);
        
    }

    public function eliminar($usuario)
    {
        $consulta= "DELETE FROM usuario WHERE id = {$usuario->getId()}";
        $this->conexion->query($consulta);
    }

    public function finalizarConexion()
    {
        $this->conexion->close();
    }

}

?>