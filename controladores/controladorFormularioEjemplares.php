<?php 
session_start();
include("../controladores/requireLoggin.php");

if(isset($_SESSION['usuario'])){
  if($_SESSION['usuario']['id_rol'] != 1){
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