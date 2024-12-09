<?php
require_once("../modelos/BBDD/Usuarios.php");
$usuarios = new Usuarios();

if(isset($_REQUEST['usuario'])){
  $usuario = $_REQUEST['usuario'];
}else{
  $usuario="";
}

if(isset($_REQUEST['clave'])){
  $clave = $_REQUEST['clave'];
}else{
  $clave="";
}

if($usuario){
    require_once("../modelos/pojos/Usuario.php");
    $nuevoUsuario = new Usuario();
    $nuevoUsuario->setUsuario($usuario);
    $nuevoUsuario->setClave($clave);
    $res = $usuarios->consultarUsuarioClave($nuevoUsuario);

    if($res != ""){
        session_start();
        $_SESSION['usuario']= serialize($res);
        header("Location:../vistas/index.php");
    }else{
        $error = "El usuario o la contraseña no existe";
    }

}

include("../vistas/inicioSesion.php");

$usuarios->finalizarConexion();

?>