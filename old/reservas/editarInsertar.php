<?php
$server = "localhost:3308";
$user = "root";
$pass = "";
$base = "biblioteca";

$dwes = mysqli_connect($server, $user, $pass, $base);

$id="";
if(isset($_REQUEST['idReserva'])){
    $id = $_REQUEST['idReserva'];
}

if($id){
    //update
    $sql= "UPDATE reserva SET id_usuario={$_REQUEST['usuario']}, id_mesa={$_REQUEST['mesa']}, fecha='{$_REQUEST['fecha']}', hora_inicio='{$_REQUEST['horaInicio']}', hora_final='{$_REQUEST['horaFinal']}'
    WHERE id = $id";
}else{
    //insert
    $sql="INSERT INTO reserva(id_usuario, id_mesa, fecha, hora_inicio, hora_final) VALUES ({$_REQUEST['usuario']},{$_REQUEST['mesa']},'{$_REQUEST['fecha']}','{$_REQUEST['horaInicio']}','{$_REQUEST['horaFinal']}')";
}

$dwes -> query($sql);

$dwes->close();

header("Location: reservas.php");


?>