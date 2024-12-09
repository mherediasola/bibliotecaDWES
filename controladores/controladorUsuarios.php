<?php 
require_once("../modelos/pojos/Usuario.php");
session_start();
include("requireLoggin.php");

if(isset($_SESSION['usuario'])){
  if(unserialize($_SESSION['usuario'])->getRol() != 1){
    header("Location:/vistas/index.php");
  }
}

//Conexión BBDD
include("../modelos/BBDD/Usuarios.php");
$usuarios = new Usuarios();
$array_usuarios = $usuarios->consultarTodo();

//Cerrar BBDD
$usuarios->finalizarConexion();

include("../vistas/usuarios.php");

?>