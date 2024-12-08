<?php
require_once("../modelos/BBDD/Roles.php");
$roles = new Roles();

require_once("../modelos/pojos/Rol.php");
$rol = new Rol();

$id="";
if(isset($_REQUEST['idRol'])){
    $id = $_REQUEST['idRol'];
    $rol->setId($id);
}

$tipo="";
if(isset($_REQUEST['tipo'])){
    $tipo = $_REQUEST['tipo'];
    $rol->setTipo($tipo);
}

if($rol->getId()){
    //update
    $roles->editar($rol);
   
}else{
    //insert
    $roles->insertar($rol);
    
}

$roles->finalizarConexion();

header("Location: controladorRoles.php");


?>