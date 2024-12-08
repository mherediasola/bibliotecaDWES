<?php 
session_start();
include("requireLoggin.php");

if(isset($_SESSION['usuario'])){
  if($_SESSION['usuario']['id_rol'] != 1){
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