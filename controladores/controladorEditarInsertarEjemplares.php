<?php
require_once("../modelos/BBDD/Ejemplares.php");
$ejemplares = new Ejemplares();

require_once("../modelos/pojos/Ejemplar.php");
$ejemplar = new Ejemplar();

$id="";
if(isset($_REQUEST['idEjemplar'])){
    $id = $_REQUEST['idEjemplar'];
    $ejemplar->setId($id);
}

$nombre="";
if(isset($_REQUEST['nombre'])){
    $nombre = $_REQUEST['nombre'];
    $ejemplar->setNombre($nombre);
}

$tipo="";
if(isset($_REQUEST['tipo'])){
    $tipo = $_REQUEST['tipo'];
    $ejemplar->setTipo($tipo);
}

$autor="";
if(isset($_REQUEST['autor'])){
    $autor = $_REQUEST['autor'];
    $ejemplar->setAutor($autor);
}

$idioma="";
if(isset($_REQUEST['idioma'])){
    $idioma = $_REQUEST['idioma'];
    $ejemplar->setIdioma($idioma);
}

$editorial="";
if(isset($_REQUEST['editorial'])){
    $editorial = $_REQUEST['editorial'];
    $ejemplar->setEditorial($editorial);
}

if($ejemplar->getId()){
    //update
    $ejemplares->editar($ejemplar);
   
}else{
    //insert
    $ejemplares->insertar($ejemplar);
    
}

$ejemplares->finalizarConexion();

header("Location: controladorEjemplares.php");


?>