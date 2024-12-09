<?php
session_start();
include("../../requireLoggin.php");

$server = "localhost:3308";
$user = "root";
$pass = "";
$base = "biblioteca";

$dwes = mysqli_connect($server, $user, $pass, $base);
$usuarios= "SELECT id, usuario, nombre, apellidos FROM usuario";
$usuarios = $dwes -> query($usuarios);
$mesas = "SELECT m.id, s.nombre FROM mesa m JOIN sala s ON m.id_sala = s.id";
$mesas = $dwes -> query($mesas);

$usuarios = $usuarios -> fetch_All(MYSQLI_BOTH);
$mesas = $mesas -> fetch_All(MYSQLI_BOTH);

$reserva="";
if(isset($_REQUEST['id'])){
    $id = $_REQUEST['id'];
    $reserva = "SELECT * FROM reserva WHERE id = $id";
    $reserva = $dwes -> query($reserva);
    $reserva = $reserva -> fetch_All(MYSQLI_BOTH);
    $reserva = $reserva[0];
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
    <title>Formulario Reservas</title>
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
        <h3 class="titulo">Reserva</h3>
        <div class="form mb-3 formulario col-2 mx-auto">
            <form action="editarInsertar.php" method="post">
                <input type="hidden" name="idReserva" id="idReserva" value="<?php if($reserva){echo $reserva['id'];}?>">
                <?php 
                    if(unserialize($_SESSION['usuario'])->getRol() != 3){
                        echo('<label class="form-label" for="usuario">Usuario</label>');
                        echo('<select class="form-select" name="usuario" id="usuario">');
                            foreach($usuarios as $usuario){
                                $nombre = $usuario['usuario']. " - ". $usuario['nombre'] . " ". $usuario['apellidos'];
                                if($reserva && $usuario['id'] == $reserva['id_usuario']){
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
                <label class="form-label" for="mesa">Mesa</label>
                <select class="form-select" name="mesa" id="mesa">
                    <?php
                        foreach($mesas as $mesa){
                            $mesaSala = $mesa['nombre']. " - " . $mesa['id'];
                            if($reserva && $mesa['id'] == $reserva['id_mesa']){
                                echo "<option selected value='".$mesa['id']."'>".$mesaSala."</option>";
                            }else{
                                echo "<option value='".$mesa['id']."'>".$mesaSala."</option>";
                            } 
                        }
                    ?>
                </select>
                <label class="form-label" for="fecha">Fecha</label>
                <input class="form-control" type="date" name="fecha" id="fecha" value="<?php if($reserva){echo $reserva['fecha'];}?>">
                <label class="form-label" for="horaInicio">Hora de inicio</label>
                <input class="form-control" type="time" name="horaInicio" id="horaInicio" value="<?php if($reserva){echo $reserva['hora_inicio'];}?>">
                <label class="form-label" for="horaFinal">Hora Final</label>
                <input class="form-control" type="time" name="horaFinal" id="horaFinal" value="<?php if($reserva){echo $reserva['hora_final'];}?>">
                <button class="btn btn-primary my-3" type="submit">Enviar</button>
            </form>
        </div>
    </main>
    <?php include("../../footer.php");?>
</body>
</html>