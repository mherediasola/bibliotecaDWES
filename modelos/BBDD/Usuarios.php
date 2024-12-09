<?php 
require_once("BaseDeDatos.php");
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

    public function consultarUsuario($usuario){
        $consulta = "SELECT * FROM usuario WHERE usuario = '{$usuario->getUsuario()}'";
        $resultado = $this->conexion->query($consulta);
        $usuarios= $resultado->fetch_All(MYSQLI_BOTH);
        if(count($usuarios) == 0){
            return "";
        }else{
            $usuarios = $usuarios[0];
            $usuario = new Usuario();
            $usuario->setId($usuarios['id']);
            $usuario->setRol($usuarios['id_rol']);
            $usuario->setUsuario($usuarios['usuario']);
            $usuario->setClave($usuarios['clave']);
            $usuario->setNombre($usuarios['nombre']);
            $usuario->setApellidos($usuarios['apellidos']);
            $usuario->setEmail($usuarios['email']);
            return $usuario;
        }
    }

    public function consultarUsuarioClave($usuario){
        $consulta= "SELECT * FROM usuario WHERE usuario = '{$usuario->getUsuario()}' AND clave = '{$usuario->getClave()}'";
        $resultado = $this->conexion->query($consulta);
        $usuarios= $resultado->fetch_All(MYSQLI_BOTH);
        if(count($usuarios) == 0){
            return "";
        }else{
            $usuarios = $usuarios[0];
            $usuario = new Usuario();
            $usuario->setId($usuarios['id']);
            $usuario->setRol($usuarios['id_rol']);
            $usuario->setUsuario($usuarios['usuario']);
            $usuario->setClave($usuarios['clave']);
            $usuario->setNombre($usuarios['nombre']);
            $usuario->setApellidos($usuarios['apellidos']);
            $usuario->setEmail($usuarios['email']);
            return $usuario;
        }
    }

    //muestra todos los usuarios aunque no tengan rol
    public function consultarTodo()
    {
        $consulta = "SELECT u.id, r.tipo AS rol, u.usuario, u.clave, u.nombre, u.apellidos, u.email FROM usuario u LEFT JOIN rol r ON u.id_rol = r.id";
        $resultado = $this->conexion->query($consulta);
        $usuarios= $resultado->fetch_All(MYSQLI_BOTH);
        $array_usuarios = array();
        foreach($usuarios as $usuario){
            $tmp = new Usuario();
            $tmp->setId($usuario['id']);
            $tmp->setRol($usuario['rol']);
            $tmp->setUsuario($usuario['usuario']);
            $tmp->setClave($usuario['clave']);
            $tmp->setNombre($usuario['nombre']);
            $tmp->setApellidos($usuario['apellidos']);
            $tmp->setEmail($usuario['email']);
            array_push($array_usuarios, $tmp);
        }
        return $array_usuarios;
    }

    public function consultarCoincideId($id)
    {
        $consulta = "SELECT * FROM usuario WHERE id = $id";
        $resultado = $this->conexion->query($consulta);
        $usuarios = $resultado->fetch_All(MYSQLI_BOTH);
        $usuarios = $usuarios[0];
        $usuario = new Usuario();
        $usuario->setId($usuarios['id']);
        $usuario->setRol($usuarios['id_rol']);
        $usuario->setUsuario($usuarios['usuario']);
        $usuario->setClave($usuarios['clave']);
        $usuario->setNombre($usuarios['nombre']);
        $usuario->setApellidos($usuarios['apellidos']);
        $usuario->setEmail($usuarios['email']);
        return $usuario;
    }

    public function insertar($usuario){
        $consulta="INSERT INTO usuario(id_rol, usuario, clave, nombre, apellidos, email) VALUES ({$usuario->getRol()}, '{$usuario->getUsuario()}', '{$usuario->getClave()}', '{$usuario->getNombre()}', '{$usuario->getApellidos()}', '{$usuario->getEmail()}')";
        $this->conexion->query($consulta);
    }

    public function editar($usuario)
    {
        $consulta= "UPDATE usuario SET id_rol={$usuario->getRol()}, usuario='{$usuario->getUsuario()}', clave='{$usuario->getClave()}', nombre='{$usuario->getNombre()}', apellidos='{$usuario->getApellidos()}', email='{$usuario->getEmail()}' WHERE id = {$usuario->getId()}";
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