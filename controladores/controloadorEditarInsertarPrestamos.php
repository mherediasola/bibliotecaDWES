<?php
require_once("../modelos/BBDD/Prestamos.php");
$prestamos = new Prestamos();

require_once("../modelos/pojos/Prestamo.php");
$prestamo = new Prestamo();

$id="";
if(isset($_REQUEST['idPrestamo'])){
    $id = $_REQUEST['idPrestamo'];
    $prestamo->setId($id);
}

$idUser="";
if(isset($_REQUEST['usuario'])){
    $idUser = $_REQUEST['usuario'];
    $prestamo->setIdUsuario($idUser);
}


$IdEjemplar="";
if(isset($_REQUEST['ejemplar'])){
    $IdEjemplar = $_REQUEST['ejemplar'];
    $prestamo->setEjemplar($IdEjemplar);
}


$fecha="";
if(isset($_REQUEST['fecha'])){
    $fecha = $_REQUEST['fecha'];
    $prestamo->setFecha($fecha);
}

$fecha_final="";
if(isset($_REQUEST['fechaFinal'])){
    $fecha_final = $_REQUEST['fechaFinal'];
    $prestamo->setFechaFinal($fecha_final);
}


if($prestamo->getId()){
    //update
    $prestamos->editar($prestamo);
   
}else{
    //insert
    $prestamos->insertar($prestamo);
    
}

$prestamos->finalizarConexion();

header("Location: controladorPrestamos.php");


?>