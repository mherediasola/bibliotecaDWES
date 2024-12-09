<?php
require_once("../modelos/pojos/Usuario.php"); 
session_start();
include("requireLoggin.php");

if(isset($_SESSION['usuario'])){
  if(unserialize($_SESSION['usuario'])->getRol() === 3){
    header("Location:index.php");
  }
}

require_once("../modelos/pojos/Ejemplar.php");
$ejemplar="";

if(isset($_REQUEST['id'])){
    require_once("../modelos/BBDD/Ejemplares.php");
    $ejemplares = new Ejemplares();
    $ejemplar = $ejemplares->consultarCoincideId($_REQUEST['id']);
    $ejemplares->finalizarConexion();
    
}

include("../vistas/formularioEjemplares.php");

?>