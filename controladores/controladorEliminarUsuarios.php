<?php 
require_once("../modelos/BBDD/Usuarios.php");
$usuarios = new Usuarios();

require_once("../modelos/pojos/Usuario.php");
$usuario = new usuario();

$id="";
if(isset($_REQUEST['id'])){
    $id = $_REQUEST['id'];
    $usuario->setId($id);
}

if($usuario->getId()){
    //delete
    $usuarios->eliminar($usuario);
}

$usuarios->finalizarConexion();

header("Location: controladorUsuarios.php");

?>