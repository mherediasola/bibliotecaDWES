<?php 
require_once("../modelos/pojos/Usuario.php");
include("requireLoggin.php");

if(isset($_SESSION['usuario'])){
  if(unserialize($_SESSION['usuario'])->getRol() != 1){
    header("Location:../vistas/index.php");
  }
}

include("../modelos/BBDD/Roles.php");

$roles = new Roles();
$array_roles = $roles->consultarTodo();
$roles->finalizarConexion();

include("../vistas/roles.php");

?>