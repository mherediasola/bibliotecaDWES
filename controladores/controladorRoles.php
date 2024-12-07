<?php 
//provisional sesión
include("requireLoggin.php");

if(isset($_SESSION['usuario'])){
  if($_SESSION['usuario']['id_rol'] != 1){
    header("Location:../vistas/index.php");
  }
}

//función para mostrar toda la info de roles

    include("../modelos/BBDD/Roles.php");
    $roles = new Roles();
    $roles->consultarTodo();

    $array_roles = $roles->consultarTodo();
    foreach($array_roles as $rol){
        echo '<tr>';
            echo "<td>". $rol['id']. "</td>";
            echo "<td>". $rol['tipo']. "</td>";
            echo "<td><a href='formularioRoles.php?id={$rol['id']}' class='btn btn-secondary'><i class='fa-regular fa-pen-to-square'></i></a></td>";
            echo "<td><a href='eliminarRoles.php?id={$rol['id']}' class='btn btn-danger'><i class='fa-solid fa-trash'></i></a></td>";
        echo '</tr>';
        }
    //echo '</table>';
    $roles->finalizarConexion();

?>