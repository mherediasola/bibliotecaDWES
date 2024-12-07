<?php
$server = "localhost:3308";
$user = "root";
$pass = "";
$base = "biblioteca";

$dwes = mysqli_connect($server, $user, $pass, $base);

$id="";
if(isset($_REQUEST['idRol'])){
    $id = $_REQUEST['idRol'];
}

if($id){
    //update
    $sql= "UPDATE rol SET tipo='{$_REQUEST['tipo']}' WHERE id = $id";
}else{
    //insert
    $sql="INSERT INTO rol(tipo) VALUES ('{$_REQUEST['tipo']}')";
}

$dwes -> query($sql);

$dwes->close();

header("Location: roles.php");


?>