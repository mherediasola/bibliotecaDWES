<?php
require_once("../modelos/BBDD/Roles.php");
$roles = new Roles();

require_once("../modelos/pojos/Rol.php");
$rol = new Rol();

$id="";
if(isset($_REQUEST['id'])){
    $id = $_REQUEST['id'];
    $rol->setId($id);
}

if($rol->getId()){
    //delete
    $roles->eliminar($rol);
}

$roles->finalizarConexion();

header("Location: controladorRoles.php");

?>