<?php
$server = "localhost:3308";
$user = "root";
$pass = "";
$base = "biblioteca";

$dwes = mysqli_connect($server, $user, $pass, $base);

$id="";
if(isset($_REQUEST['id'])){
    $id = $_REQUEST['id'];
}

if($id){
    //delete
    $sql= "DELETE FROM prestamo WHERE id = $id";
    $dwes -> query($sql);
}

$dwes->close();

header("Location: prestamos.php");

?>