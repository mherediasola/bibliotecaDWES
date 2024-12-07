<?php
session_start();
include("../../requireLoggin.php");

if(isset($_SESSION['usuario'])){
  if($_SESSION['usuario']['id_rol'] == 3){
    header("Location:../../index.php");
  }
}

$server = "localhost:3308";
$user = "root";
$pass = "";
$base = "biblioteca";

$dwes = mysqli_connect($server, $user, $pass, $base);
$sql= "SELECT * FROM sala";
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
    <title>Salas</title>
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
        <h1 class="titulo">Salas</h1>
        <div class="tabla" >
            <div>
              <a href="formularioSalas.php" class="btn btn-success botonInsertar">Insertar</a>
            </div>
            <table class="tSalas table table-striped table-hover">
                <th>Id</th>
                <th>Nombre</th>
                <th></th>
                <th></th>
                <?php 
                    $res = $resultado -> fetch_All(MYSQLI_BOTH);
                    foreach($res as $row)
                        {
                        echo '<tr>';
                            echo "<td>". $row['id']. "</td>";
                            echo "<td>". $row['nombre']. "</td>";
                            echo "<td><a href='formularioSalas.php?id={$row['id']}' class='btn btn-secondary'><i class='fa-regular fa-pen-to-square'></i></a></td>";
                            echo "<td><a href='eliminarSalas.php?id={$row['id']}' class='btn btn-danger'><i class='fa-solid fa-trash'></i></a></td>";
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