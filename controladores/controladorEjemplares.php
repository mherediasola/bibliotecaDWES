<?php
session_start();

//Conexión BBDD

include("../modelos/BBDD/Ejemplares.php");
$ejemplares = new Ejemplares();
$array_ejemplares = $ejemplares->consultarTodo();

//Cerrar BBDD
$ejemplares->finalizarConexion();

include("../vistas/ejemplares.php");

?>