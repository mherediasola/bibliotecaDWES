<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../estilos/estilos.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Roles</title>
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
        <h1 class="titulo">Roles</h1>
        <div class="tabla" >
            <div>
              <a href="/controladores/controladorFormularioRoles.php" class="btn btn-success botonInsertar">Insertar</a>
            </div>
            <table class="tRoles table table-striped table-hover">
                <tr>
                    <th>Id</th>
                    <th>Tipo</th>
                    <th></th>
                    <th></th>
                </tr>
                <?php foreach( $array_roles as $rol ) : ?>
                <tr>
                    <td><?= $rol->getId(); ?></td>
                    <td><?= $rol->getTipo(); ?></td>
                    <td><a href='formularioRoles.php?id= <?= $rol->getId(); ?>' class='btn btn-secondary'><i class='fa-regular fa-pen-to-square'></i></a></td>
                    <td><a href='eliminarRoles.php?id= <?= $rol->getId(); ?>' class='btn btn-danger'><i class='fa-solid fa-trash'></i></a></td>
                </tr>
                <?php  endforeach; ?>
            </table>
        </div>
    </main>
    <?php include("footer.php");?>
</body>
</html>