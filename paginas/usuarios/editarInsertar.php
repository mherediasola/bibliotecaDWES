<?php
$server = "localhost:3308";
$user = "root";
$pass = "";
$base = "biblioteca";

$dwes = mysqli_connect($server, $user, $pass, $base);

$id="";
if(isset($_REQUEST['idUsuario'])){
    $id = $_REQUEST['idUsuario'];
}

if($id){
    //update
    $sql= "UPDATE usuario SET id_rol={$_REQUEST['rol']},usuario='{$_REQUEST['usuario']}',clave='{$_REQUEST['clave']}',nombre='{$_REQUEST['nombre']}',apellidos='{$_REQUEST['apellidos']}',email='{$_REQUEST['email']}' WHERE id = $id";
}else{
    //insert
    $sql="INSERT INTO usuario(id_rol,usuario,clave,nombre,apellidos,email) VALUES ({$_REQUEST['rol']},'{$_REQUEST['usuario']}','{$_REQUEST['clave']}','{$_REQUEST['nombre']}','{$_REQUEST['apellidos']}','{$_REQUEST['email']}')";
}

$dwes -> query($sql);

$dwes->close();

header("Location: usuarios.php");


?>