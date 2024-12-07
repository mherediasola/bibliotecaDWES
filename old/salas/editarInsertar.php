<?php
$server = "localhost:3308";
$user = "root";
$pass = "";
$base = "biblioteca";

$dwes = mysqli_connect($server, $user, $pass, $base);

$id="";
if(isset($_REQUEST['idSala'])){
    $id = $_REQUEST['idSala'];
}

if($id){
    //update
    $sql= "UPDATE sala SET nombre='{$_REQUEST['nombre']}' WHERE id = $id";
}else{
    //insert
    $sql="INSERT INTO sala(nombre) VALUES ('{$_REQUEST['nombre']}')";
}

$dwes -> query($sql);

$dwes->close();

header("Location: salas.php");


?>
 