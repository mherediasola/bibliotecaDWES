<?php
session_start();
include("../../controladores/requireLoggin.php");

if(isset($_SESSION['usuario'])){
  if($_SESSION['usuario']['id_rol'] != 1){
    header("Location:../../index.php");
  }
}

// $server = "localhost:3308";
// $user = "root";
// $pass = "";
// $base = "biblioteca";

// $dwes = mysqli_connect($server, $user, $pass, $base);

$id="";
if(isset($_REQUEST['id'])){
    $id = $_REQUEST['id'];
    //     $rol = "SELECT * FROM rol WHERE id = $id";
    //     $rol = $dwes -> query($rol);
    //     $rol = $rol -> fetch_All(MYSQLI_BOTH);
    //     $rol = $rol[0];
    }

// $dwes->close();

include("../../modelos/BBDD/Roles.php");
$roles = new Roles();

$roles->consultarCoincideId($id);

$array_roles = $roles->consultarTodo();

$rol=$array_roles[0];

$roles->finalizarConexion();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../estilos/estilos.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Formulario Roles</title>
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
        <h3 class="titulo">Rol</h3>
        <div class="form mb-3 formulario col-2 mx-auto">
            <form action="editarInsertar.php" method="post">
                <input type="hidden" name="idRol" id="idRol" value="<?php if($rol){echo $rol['id'];}?>">
                <label class="form-label" for="tipo">Tipo</label>
                <input class="form-control" type="text" name="tipo" id="tipo" value="<?php if($rol){echo $rol['tipo'];}?>">
                <button class="btn btn-primary my-3" type="submit">Enviar</button>
            </form>
        </div>
    </main>
    <?php include("../../vistas/footer.php");?>
</body>
</html>