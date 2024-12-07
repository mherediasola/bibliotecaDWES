<?php
$server = "localhost:3308";
$user = "root";
$pass = "";
$base = "biblioteca";

$dwes = mysqli_connect($server, $user, $pass, $base);

$id="";
if(isset($_REQUEST['idEjemplar'])){
    $id = $_REQUEST['idEjemplar'];
}

if($id){
    //update
    $sql= "UPDATE ejemplar SET nombre='{$_REQUEST['nombre']}',tipo='{$_REQUEST['tipo']}',autor='{$_REQUEST['autor']}',idioma='{$_REQUEST['idioma']}',editorial='{$_REQUEST['editorial']}' WHERE id = $id";
}else{
    //insert
    $sql="INSERT INTO ejemplar(nombre,tipo,autor,idioma,editorial) VALUES ('{$_REQUEST['nombre']}','{$_REQUEST['tipo']}','{$_REQUEST['autor']}','{$_REQUEST['idioma']}','{$_REQUEST['editorial']}')";
}

$dwes -> query($sql);

$dwes->close();

header("Location: ejemplares.php");


?>