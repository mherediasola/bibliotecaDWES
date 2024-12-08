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
    $rol = new Rol();
    $rol->setId($_REQUEST['id']);
    require_once("../modelos/BBDD/Roles.php");
    $roles = new Roles();
    $res = $roles->consultarCoincideId($rol->getId());
    $roles->finalizarConexion();
    if(!$res){
        $rol = "";
    }
}



include("../vistas/formularioRoles.php");

?>