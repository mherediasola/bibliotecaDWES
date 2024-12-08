<?php
require_once("../modelos/BBDD/Usuarios.php");
$usuarios = new Usuarios();

require_once("../modelos/pojos/Usuario.php");
$usuario = new Usuario();

$id="";
if(isset($_REQUEST['idUsuario'])){
    $id = $_REQUEST['idUsuario'];
    $usuario->setId($id);
}

$rol="";
if(isset($_REQUEST['rol'])){
    $rol = $_REQUEST['rol'];
    $usuario->setRol($rol);
}

$nombre="";
if(isset($_REQUEST['nombre'])){
    $nombre = $_REQUEST['nombre'];
    $usuario->setNombre($nombre);
}

$apellidos="";
if(isset($_REQUEST['apellidos'])){
    $apellidos = $_REQUEST['apellidos'];
    $usuario->setApellidos($apellidos);
}

$user="";
if(isset($_REQUEST['usuario'])){
    $user = $_REQUEST['usuario'];
    $usuario->setUsuario($user);
}

$clave="";
if(isset($_REQUEST['clave'])){
    $clave = $_REQUEST['clave'];
    $usuario->setClave($clave);
}

$email="";
if(isset($_REQUEST['email'])){
    $email = $_REQUEST['email'];
    $usuario->setEmail($email);
}


if($usuario->getId()){
    //update
    $usuarios->editar($usuario);
   
}else{
    //insert
    $usuarios->insertar($usuario);
    
}

$usuarios->finalizarConexion();

header("Location: controladorUsuarios.php");


?>