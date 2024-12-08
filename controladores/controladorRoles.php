<?php 
//provisional sesión
include("requireLoggin.php");

if(isset($_SESSION['usuario'])){
  if($_SESSION['usuario']['id_rol'] != 1){
    header("Location:../vistas/index.php");
  }
}

include("../modelos/BBDD/Roles.php");

$roles = new Roles();
$array_roles = $roles->consultarTodo();
$roles->finalizarConexion();

include("../vistas/roles.php");

?>