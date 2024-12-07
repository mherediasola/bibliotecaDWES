<?php
session_start();
include("../../controladores/requireLoggin.php");

$server = "localhost:3308";
$user = "root";
$pass = "";
$base = "biblioteca";

$dwes = mysqli_connect($server, $user, $pass, $base);
$usuarios= "SELECT id, usuario, nombre, apellidos FROM usuario";
$usuarios = $dwes -> query($usuarios);
$ejemplares = "SELECT id, nombre, tipo, autor, idioma, editorial FROM ejemplar";
$ejemplares = $dwes -> query($ejemplares);

$usuarios = $usuarios -> fetch_All(MYSQLI_BOTH);
$ejemplares = $ejemplares -> fetch_All(MYSQLI_BOTH);

$prestamo="";
if(isset($_REQUEST['id'])){
    $id = $_REQUEST['id'];
    $prestamo = "SELECT * FROM prestamo WHERE id = $id";
    $prestamo = $dwes -> query($prestamo);
    $prestamo = $prestamo -> fetch_All(MYSQLI_BOTH);
    $prestamo = $prestamo[0];
}


$dwes->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../estilos/estilos.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Formulario Préstamos</title>
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
        <h3 class="titulo">Préstamo</h3>
        <div class="form mb-3 formulario col-2 mx-auto">
            <form action="editarInsertar.php" method="post">
                <input type="hidden" name="idPrestamo" id="idPrestamo" value="<?php if($prestamo){echo $prestamo['id'];}?>">
                <?php 
                    if($_SESSION['usuario']['id_rol'] != 3){
                        echo('<label class="form-label" for="usuario">Usuario</label>');
                        echo('<select class="form-select" name="usuario" id="usuario">');
                            foreach($usuarios as $usuario){
                                $nombre = $usuario['usuario']. " - ". $usuario['nombre'] . " ". $usuario['apellidos'];
                                if($prestamo && $usuario['id'] == $prestamo['id_usuario']){
                                    echo "<option selected value='".$usuario['id']."'>".$nombre."</option>";
                                }else{
                                    echo "<option value='".$usuario['id']."'>".$nombre."</option>";
                                }
                            }
                        echo('</select>');
                    }else{
                        echo('<input type="hidden" name="usuario" value="'."{$_SESSION['usuario']['id']}".'"></input>');
                        
                    }
                ?>
                <label class="form-label" for="ejemplar">Ejemplar</label>
                <select class="form-select" name="ejemplar" id="ejemplar">
                    <?php
                        foreach($ejemplares as $ejemplar){
                            if($prestamo && $ejemplar['id'] == $prestamo['id_ejemplar']){
                                echo "<option selected value='".$ejemplar['id']."'>".$ejemplar['nombre']."</option>";
                            }else{
                                echo "<option value='".$ejemplar['id']."'>".$ejemplar['nombre']."</option>";
                            } 
                        }
                    ?>
                </select>
                <label class="form-label" for="fecha">Fecha</label>
                <input class="form-control" type="date" name="fecha" id="fecha" value="<?php if($prestamo){echo $prestamo['fecha'];}?>">
                <label class="form-label" for="fechaFinal">Fecha final</label>
                <input class="form-control" type="date" name="fechaFinal" id="fechaFinal" value="<?php if($prestamo){echo $prestamo['fecha_final'];}?>">
                <button class="btn btn-primary my-3" type="submit">Enviar</button>
            </form>
        </div>
    </main>
    <?php include("../../vistas/footer.php");?>
</body>
</html>