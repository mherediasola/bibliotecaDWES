<?php
session_start();
include("requireLoggin.php");

if(isset($_SESSION['usuario'])){
    if($_SESSION['usuario']['id_rol'] === 3){
      header("Location:/vistas/index.php");
    }
}

require_once("../modelos/BBDD/Usuarios.php");
$usuarios = new Usuarios();
$array_usuarios = $usuarios->consultarTodo();

require_once("../modelos/BBDD/Ejemplares.php");
$ejemplares = new Ejemplares();
$array_ejemplares = $ejemplares->consultarTodo();

$prestamo="";
if(isset($_REQUEST['id'])){
    require_once("../modelos/BBDD/Prestamos.php");
    $prestamos = new Prestamos();
    $prestamo = $prestamos->consultarCoincideId($_REQUEST['id']);
    $prestamos->finalizarConexion();  
}

$usuarios->finalizarConexion();
$ejemplares->finalizarConexion();

include("../vistas/formularioPrestamos.php");
?>
