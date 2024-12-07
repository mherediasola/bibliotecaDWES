<?php
$server = "localhost:3308";
$user = "root";
$pass = "";
$base = "biblioteca";

$dwes = mysqli_connect($server, $user, $pass, $base);

$id="";
if(isset($_REQUEST['idPrestamo'])){
    $id = $_REQUEST['idPrestamo'];
}

if($id){
    //update
    $sql= "UPDATE prestamo SET id_usuario={$_REQUEST['usuario']}, id_ejemplar={$_REQUEST['ejemplar']}, fecha='{$_REQUEST['fecha']}', fecha_final='{$_REQUEST['fechaFinal']}'
    WHERE id = $id";
}else{
    //insert
    $sql="INSERT INTO prestamo(id_usuario, id_ejemplar, fecha, fecha_final) VALUES ({$_REQUEST['usuario']},{$_REQUEST['ejemplar']},'{$_REQUEST['fecha']}','{$_REQUEST['fechaFinal']}')";
}

$dwes -> query($sql);

$dwes->close();

header("Location: prestamos.php");


?>