<?php
session_start();
include("../../controladores/requireLoggin.php");

if(isset($_SESSION['usuario'])){
  if($_SESSION['usuario']['id_rol'] != 1){
    header("Location:../../vistas/index.php");
  }
}

$server = "localhost:3308";
$user = "root";
$pass = "";
$base = "biblioteca";

$dwes = mysqli_connect($server, $user, $pass, $base);
//con left join muestra todos los usuarios aunque no tengan id_rol que coincida en ambas tablas
$sql= "SELECT u.id, r.tipo AS rol, u.usuario, u.clave, u.nombre, u.apellidos, u.email FROM usuario u LEFT JOIN rol r ON u.id_rol = r.id";
$resultado = $dwes -> query($sql);

$dwes->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../estilos/estilos.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Usuarios</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/9f4bf3af88.js" crossorigin="anonymous"></script>
</head>
<body>
    <header>
        <img/>
        <h1>Biblioteca</h1>
    </header>
    <main>
        <?php include("../../navbar.php");?>
        <h1 class="titulo">Usuarios</h1>
        <div class="tabla" >
            <div>
              <?php 
                if(isset($_SESSION['usuario'])){
                  if($_SESSION['usuario']['id_rol'] == 1){
                    echo('<a href="formularioUsuarios.php" class="btn btn-success botonInsertar">Insertar</a>');
                  }
                }
              ?>
            </div>
            <table class="tUsuarios table table-striped table-hover">
                <th>Id</th>
                <th>Rol</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Usuario</th>
                <th>Clave</th>
                <th>Email</th>
                <th></th>
                <th></th>
                <?php 
                    $res = $resultado -> fetch_All(MYSQLI_BOTH);
                    foreach($res as $row)
                        {
                        echo '<tr>';
                            echo "<td>". $row['id']. "</td>";
                            echo "<td>". $row['rol']. "</td>";
                            echo "<td>". $row['nombre']. "</td>";
                            echo "<td>". $row['apellidos']. "</td>";
                            echo "<td>". $row['usuario']. "</td>";
                            echo "<td>". $row['clave']. "</td>";
                            echo "<td>". $row['email']. "</td>";
                            if(isset($_SESSION['usuario'])){
                              if($_SESSION['usuario']['id_rol'] == 1){
                                echo "<td><a href='formularioUsuarios.php?id={$row['id']}' class='btn btn-secondary'><i class='fa-regular fa-pen-to-square'></i></a></td>";
                                echo "<td><a href='eliminarUsuarios.php?id={$row['id']}' class='btn btn-danger'><i class='fa-solid fa-trash'></i></a></td>";
                              }else{
                                echo "<td></td> <td></td>";
                              }
                            }
                        echo '</tr>';
                        }
                        echo '</table>';
                ?>
            </table>
        </div>
    </main>
    <?php include("../../vistas/footer.php");?>
</body>
</html>