<?php
session_start();
include("../../controladores/requireLoggin.php");

$server = "localhost:3308";
$user = "root";
$pass = "";
$base = "biblioteca";

$dwes = mysqli_connect($server, $user, $pass, $base);
$sql= "SELECT p.id, u.usuario, CONCAT(u.nombre, ' ', u.apellidos) AS Nombre, e.nombre AS Ejemplar, e.autor AS Autor, p.fecha AS Préstamo, p.fecha_final AS Vencimiento 
FROM ejemplar e JOIN prestamo p ON e.id = p.id_ejemplar
JOIN usuario u ON u.id = p.id_usuario";

if($_SESSION['usuario']){
  //3 es el id del rol usuario
  //La consulta solo mostrará información de préstamos relacionada con el usuario concreto
  if($_SESSION['usuario']['id_rol'] == 3){
    $sql .= " WHERE u.id = {$_SESSION['usuario']['id']}";
  }
}else{
  header("Location:../miCuenta/inicioSesion.php");
}


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
    <title>Préstamos</title>
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
      <h1 class="titulo">Préstamos</h1>
      <div class="tabla" >
        <div>
            <?php
                if($_SESSION['usuario']['id_rol'] != 3){
                    echo('<a href="formularioPrestamos.php" class="btn btn-success botonInsertar">Insertar</a>');
                }
            ?>
        </div>
        <table class="tReservas table table-striped table-hover">
            <th>Id</th>
            <th>Usuario</th>
            <th>Nombre</th>
            <th>Ejemplar</th>
            <th>Autor(es)</th>
            <th>Préstamo</th>
            <th>Vencimiento</th>
            <?php 
                if($_SESSION['usuario']['id_rol'] != 3){
                  echo("<th></th>");
                  echo ("<th></th>");
                }
                $res = $resultado -> fetch_All(MYSQLI_BOTH);
                foreach($res as $row)
                    {
                    echo '<tr>';
                        echo "<td>". $row['id']. "</td>";
                        echo "<td>". $row['usuario']. "</td>";
                        echo "<td>". $row['Nombre']. "</td>";
                        echo "<td>". $row['Ejemplar']. "</td>";
                        echo "<td>". $row['Autor']. "</td>";
                        echo "<td>". $row['Préstamo']. "</td>";
                        echo "<td>". $row['Vencimiento']. "</td>";
                        if($_SESSION['usuario']['id_rol'] != 3){
                          echo "<td><a href='formularioPrestamos.php?id={$row['id']}' class='btn btn-secondary'><i class='fa-regular fa-pen-to-square'></i></a></td>";
                          echo "<td><a href='eliminarPrestamos.php?id={$row['id']}' class='btn btn-danger'><i class='fa-solid fa-trash'></i></a></td>";
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