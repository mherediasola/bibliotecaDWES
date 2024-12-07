<?php
$server = "localhost:3308";
$user = "root";
$pass = "";
$base = "biblioteca";

$dwes = mysqli_connect($server, $user, $pass, $base);

$id="";
if(isset($_REQUEST['idMesa'])){
    $id = $_REQUEST['idMesa'];
}

if($id){
    //update
    $sql= "UPDATE mesa SET id_sala='{$_REQUEST['sala']}' WHERE id = $id";
}else{
    //insert
    $sql="INSERT INTO mesa(id_sala) VALUES ('{$_REQUEST['sala']}')";
}

$dwes -> query($sql);

$dwes->close();

header("Location: mesas.php");


?>