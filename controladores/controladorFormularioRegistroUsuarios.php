<?php 
//compruebo si todos los inputs contienen datos
if(isset($_REQUEST['usuario'])){
  $usuario = $_REQUEST['usuario'];
}

$clave="";
if(isset($_REQUEST['clave'])){
  $clave = $_REQUEST['clave'];
}

if(isset($_REQUEST['repetirClave'])){
  $repetirClave = $_REQUEST['repetirClave'];
}

if(isset($_REQUEST['nombre'])){
  $nombre = $_REQUEST['nombre'];
}

if(isset($_REQUEST['apellidos'])){
  $apellidos = $_REQUEST['apellidos'];
}

if(isset($_REQUEST['email'])){
  $email = $_REQUEST['email'];
}

if(isset($_REQUEST['confirmarEmail'])){
  $confirmarEmail = $_REQUEST['confirmarEmail'];
}

//compruebo si la clave y el email coinciden para asegurar que el usuario ha introducido bien esos datos
  if($clave && $clave === $repetirClave && $email && $email === $confirmarEmail){
    //llamada a los objetos necesarios: Usuarios.php para crear la conexión y hacer el insert y Usuario.php para manejar los datos
    require_once("../modelos/BBDD/Usuarios.php");
    $usuarios = new Usuarios();

    require_once("../modelos/pojos/Usuario.php");
    $nuevoUsuario = new Usuario();

    //añado los valores en el objeto nuevoUsuario
    $nuevoUsuario->setUsuario($usuario);
    $nuevoUsuario->setClave($clave);
    $nuevoUsuario->setNombre($nombre);
    $nuevoUsuario->setApellidos($apellidos);
    $nuevoUsuario->setEmail($email);
    $nuevoUsuario->setRol(3);

    //compruebo si ya hay un usuario con ese nombre de usuario
    $res = $usuarios->consultarUsuario($nuevoUsuario);
    
    
    if($res == ""){
        $usuarios->insertar($nuevoUsuario);
    }else{
        $error = "El usuario indicado ya existe";
    }

    $usuarios->finalizarConexion();
  }



include("../vistas/formularioRegistro.php");
?>