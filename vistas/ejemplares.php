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
      <?php include("navbar.php");?>
      <h1 class="titulo">Catálogo</h1>
      <div class="tabla" >
          <div>
            <?php
                if(isset($_SESSION['usuario'])){
                    if(unserialize($_SESSION['usuario'])->getRol() != 3){
                        echo('<a href="/controladores/controladorFormularioEjemplares.php" class="btn btn-success botonInsertar">Insertar</a>');
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
                        if(unserialize($_SESSION['usuario'])->getRol() != 3){
                            echo("<th></th>");
                            echo ("<th></th>");
                        }
                    }
                ?>
                <?php foreach($array_ejemplares as $ejemplar) : ?>
                    <tr>
                        <td><?= $ejemplar->getId(); ?></td>
                        <td><?= $ejemplar->getNombre(); ?></td>
                        <td><?= $ejemplar->getTipo(); ?></td>
                        <td><?= $ejemplar->getAutor(); ?></td>
                        <td><?= $ejemplar->getIdioma(); ?></td>
                        <td><?= $ejemplar->getEditorial(); ?></td>
                        <?php    
                        if(isset($_SESSION['usuario'])){
                            if(unserialize($_SESSION['usuario'])->getRol() != 3){ 
                        ?>
                                <td><a href='/controladores/controladorFormularioEjemplares.php?id=<?= $ejemplar->getId(); ?>' class='btn btn-secondary'><i class='fa-regular fa-pen-to-square'></i></a></td>
                                <td><a href='/controladores/controladorEliminarEjemplares.php?id=<?= $ejemplar->getId(); ?>' class='btn btn-danger'><i class='fa-solid fa-trash'></i></a></td>
                        <?php 
                            }
                        }
                        ?>
                    </tr>
              <?php endforeach; ?>
          </table>
      </div>
    </main>
    <?php include("footer.php");?>
</body>
</html>