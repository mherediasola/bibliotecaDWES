<?php
require_once("../modelos/BBDD/Prestamos.php");
$prestamos = new Prestamos();

require_once("../modelos/pojos/Prestamo.php");
$prestamo = new prestamo();

$id="";
if(isset($_REQUEST['id'])){
    $id = $_REQUEST['id'];
    $prestamo->setId($id);
}

if($prestamo->getId()){
    //delete
    $prestamos->eliminar($prestamo);
}

$prestamos->finalizarConexion();

header("Location: controladorPrestamos.php");

?>