<?php 
session_start();
include("requireLoggin.php");

//Conexión BBDD
include("../modelos/BBDD/Prestamos.php");
$prestamos = new Prestamos();


if($_SESSION['usuario']){
    //3 es el id del rol usuario
    //La consulta solo mostrará información de préstamos relacionada con el usuario concreto
    if(unserialize($_SESSION['usuario'])->getRol() == 3){
        //esto es como consultar coincide id
        require_once("../modelos/pojos/Prestamo.php");
        $array_prestamos = $prestamos->consultarTodoUsuario(unserialize($_SESSION["usuario"])->getId());
    }else{
        $array_prestamos = $prestamos->consultarTodo();
    }
}

include("../vistas/prestamos.php");
//Cerrar BBDD
$prestamos->finalizarConexion();


?>