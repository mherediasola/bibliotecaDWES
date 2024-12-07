<?php
session_start();
include("../../requireLoggin.php");

$server = "localhost:3308";
$user = "root";
$pass = "";
$base = "biblioteca";

$dwes = mysqli_connect($server, $user, $pass, $base);
$sql= "SELECT r.id, u.usuario, CONCAT(u.nombre, ' ', u.apellidos) AS Nombre, s.nombre AS Sala, m.id AS Mesa, r.fecha, CONCAT(r.hora_inicio, ' - ', r.hora_final) AS Hora
FROM sala s JOIN mesa m ON s.id = m.id_sala
JOIN reserva r ON m.id = r.id_mesa 
JOIN usuario u ON r.id_usuario = u.id";

if($_SESSION['usuario']){
  //3 es el id del rol usuario
  //La consulta solo mostrará información de reservas relacionada con el usuario concreto
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
    <title>Reservas</title>
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
      <h1 class="titulo">Reservas</h1>
      <div class="tabla" >
        <div>
          <a href="formularioReservas.php" class="btn btn-success botonInsertar">Insertar</a>
        </div>
        <table class="tReservas table table-striped table-hover">
            <th>Id</th>
            <th>Usuario</th>
            <th>Nombre</th>
            <th>Sala</th>
            <th>Mesa</th>
            <th>Fecha</th>
            <th>Hora</th>
            <th></th>
            <th></th>
            <?php 
                $res = $resultado -> fetch_All(MYSQLI_BOTH);
                foreach($res as $row)
                    {
                    echo '<tr>';
                        echo "<td>". $row['id']. "</td>";
                        echo "<td>". $row['usuario']. "</td>";
                        echo "<td>". $row['Nombre']. "</td>";
                        echo "<td>". $row['Sala']. "</td>";
                        echo "<td>". $row['Mesa']. "</td>";
                        echo "<td>". $row['fecha']. "</td>";
                        echo "<td>". $row['Hora']. "</td>";
                        echo "<td><a href='formularioReservas.php?id={$row['id']}' class='btn btn-secondary'><i class='fa-regular fa-pen-to-square'></i></a></td>";
                        echo "<td><a href='eliminarReservas.php?id={$row['id']}' class='btn btn-danger'><i class='fa-solid fa-trash'></i></a></td>";
                    echo '</tr>';
                    }
                    echo '</table>';
            ?>
        </table>
      </div>
    </main>
    <?php include("../../footer.php");?>
</body>
</html>