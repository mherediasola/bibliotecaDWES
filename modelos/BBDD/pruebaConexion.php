<?php 
include("Roles.php");
$roles = new Roles();

$roles->consultarTodo();

$array_roles = $roles->consultarTodo();

foreach($array_roles as $rol){
    echo("<p>{$rol['id']}</p>");
    echo($rol['tipo']);
}

?>