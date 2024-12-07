<?php
session_start();

$server = "localhost:3308";
$user = "root";
$pass = "";
$base = "biblioteca";

$dwes = mysqli_connect($server, $user, $pass, $base);
$sql= "SELECT id, nombre, tipo, autor, idioma, editorial FROM ejemplar";
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
    <title>Ejemplares</title>
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
      <h1 class="titulo">Catálogo</h1>
      <div class="tabla" >
          <div>
            <?php
                if(isset($_SESSION['usuario'])){
                    if($_SESSION['usuario']['id_rol'] != 3){
                        echo('<a href="formularioEjemplares.php" class="btn btn-success botonInsertar">Insertar</a>');
                    }
                } 
            ?>
            </div>
          <table class="tMesas table table-striped table-hover">
                <th>Id</th>
                <th>Nombre</th>
                <th>Tipo</th>
                <th>Autor</th>
                <th>Idioma</th>
                <th>Editorial</th>
                <?php
                    if(isset($_SESSION['usuario'])){ 
                        if($_SESSION['usuario']['id_rol'] != 3){
                            echo("<th></th>");
                            echo ("<th></th>");
                        }
                    }
                    $res = $resultado -> fetch_All(MYSQLI_BOTH);
                    foreach($res as $row)
                        {
                        echo '<tr>';
                                echo "<td>". $row['id']. "</td>";
                                echo "<td>". $row['nombre']. "</td>";
                                echo "<td>". $row['tipo']. "</td>";
                                echo "<td>". $row['autor']. "</td>";
                                echo "<td>". $row['idioma']. "</td>";
                                echo "<td>". $row['editorial']. "</td>";
                                if(isset($_SESSION['usuario'])){
                                if($_SESSION['usuario']['id_rol'] != 3){
                                    echo "<td><a href='formularioEjemplares.php?id={$row['id']}' class='btn btn-secondary'><i class='fa-regular fa-pen-to-square'></i></a></td>";
                                    echo "<td><a href='eliminarEjemplares.php?id={$row['id']}' class='btn btn-danger'><i class='fa-solid fa-trash'></i></a></td>";
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