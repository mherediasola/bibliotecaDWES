<?php
session_start();
include("requireLoggin.php");

if(isset($_SESSION['usuario'])){
  if($_SESSION['usuario']['id_rol'] != 1){
    header("Location:../../index.php");
  }
}

require_once("../modelos/pojos/Rol.php");
$rol="";

if(isset($_REQUEST['id'])){
    require_once("../modelos/BBDD/Roles.php");
    $roles = new Roles();
    $rol = $roles->consultarCoincideId($_REQUEST['id']);
    $roles->finalizarConexion();
    
}

include("../vistas/formularioRoles.php");

?>