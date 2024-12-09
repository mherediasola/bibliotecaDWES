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
      <?php include("../navbar.php");?>
      <h1 class="titulo">Préstamos</h1>
      <div class="tabla" >
        <div>
            <?php
                if($_SESSION['usuario']['id_rol'] != 3){
                    echo('<a href="/controladores/controladorFormularioPrestamos.php" class="btn btn-success botonInsertar">Insertar</a>');
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
                <tr>
                    <td><?= $prestamo->getId(); ?></td>
                    <td><?= $prestamo->getUsuario(); ?></td>
                    <td><?= $prestamo->getNombreUsuario(); ?></td>
                    <td><?= $prestamo->getEjemplar(); ?></td>
                    <td><?= $prestamo->getAutor(); ?></td>
                    <td><?= $prestamo->getFecha(); ?></td>
                    <td><?= $prestamo->getFechaFinal(); ?></td>
                </tr>
        </table>
      </div>
    </main>
    <?php include("footer.php");?>
</body>
</html>