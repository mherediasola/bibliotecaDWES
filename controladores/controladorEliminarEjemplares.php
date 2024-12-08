<?php 
require_once("../modelos/BBDD/Ejemplares.php");
$ejemplares = new Ejemplares();

require_once("../modelos/pojos/Ejemplar.php");
$ejemplar = new ejemplar();

$id="";
if(isset($_REQUEST['id'])){
    $id = $_REQUEST['id'];
    $ejemplar->setId($id);
}

if($ejemplar->getId()){
    //delete
    $ejemplares->eliminar($ejemplar);
}

$ejemplares->finalizarConexion();

header("Location: controladorEjemplares.php");

?>