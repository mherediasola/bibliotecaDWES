<?php 
session_start();
include("requireLoggin.php");

//Conexión BBDD
include("../modelos/BBDD/Prestamos.php");
$prestamos = new Prestamos();
$array_prestamos = $prestamos->consultarTodo();

if($_SESSION['usuario']){
    //3 es el id del rol usuario
    //La consulta solo mostrará información de préstamos relacionada con el usuario concreto
    if($_SESSION['usuario']['id_rol'] == 3){
        //esto es como consultar coincide id
        require_once("../modelos/pojos/Prestamo.php");
        $prestamo = new Prestamo();
        $prestamo = $prestamos->consultarCoincideId($_SESSION['usuario']['id']);
    }
  }

  

//Cerrar BBDD
$prestamos->finalizarConexion();

include("../vistas/prestamos.php");

?>