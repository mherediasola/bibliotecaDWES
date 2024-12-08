<?php 
session_start();
include("requireLoggin.php");

if(isset($_SESSION['usuario'])){
  if($_SESSION['usuario']['id_rol'] != 1){
    header("Location:/vistas/index.php");
  }
}

require_once("../modelos/BBDD/Roles.php");
$roles = new Roles();
$array_roles = $roles->consultarTodo();

require_once("../modelos/pojos/Usuario.php");
$usuario="";

if(isset($_REQUEST['id'])){
    require_once("../modelos/BBDD/Usuarios.php");
    $usuarios = new Usuarios();
    $usuario = $usuarios->consultarCoincideId($_REQUEST['id']);
    $usuarios->finalizarConexion();
}

$roles->finalizarConexion();

include("../vistas/formularioUsuarios.php");

?>