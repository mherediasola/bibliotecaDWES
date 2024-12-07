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

$salas = "SELECT id, nombre FROM sala";
$salas = $dwes -> query($salas);
$salas = $salas -> fetch_All(MYSQLI_BOTH);

$mesa="";
if(isset($_REQUEST['id'])){
    $id = $_REQUEST['id'];
    $mesa = "SELECT * FROM mesa WHERE id = $id";
    $mesa = $dwes -> query($mesa);
    $mesa = $mesa -> fetch_All(MYSQLI_BOTH);
    $mesa = $mesa[0];
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
    <title>Formulario Mesas</title>
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
      <h3 class="titulo">Mesa</h3>
      <div class="form mb-3 formulario col-2 mx-auto">
          <form action="editarInsertar.php" method="post">
              <input type="hidden" name="idMesa" id="idMesa" value="<?php if($mesa){echo $mesa['id'];}?>">
              <label class="form-label" for="sala">Sala</label>
              <select class="form-select" name="sala" id="sala">
                  <?php
                      foreach($salas as $sala){
                          if($mesa && $sala['id'] == $mesa['id_sala']){
                              echo "<option selected value='".$sala['id']."'>".$sala['nombre']."</option>";
                          }else{
                              echo "<option value='".$sala['id']."'>".$sala['nombre']."</option>";
                          }
                          
                      }
                  ?>
              </select>
              <button class="btn btn-primary my-3" type="submit">Enviar</button>
          </form>
      </div>
    </main>
      
</body>
</html>