<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../estilos/estilos.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Usuarios</title>
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
        <h1 class="titulo">Usuarios</h1>
        <div class="tabla" >
            <div>
              <?php 
                if(isset($_SESSION['usuario'])){
                  if(unserialize($_SESSION['usuario'])->getRol() == 1){
                    echo('<a href="/controladores/controladorFormularioUsuarios.php" class="btn btn-success botonInsertar">Insertar</a>');
                  }
                }
              ?>
            </div>
            <table class="tUsuarios table table-striped table-hover">
                <th>Id</th>
                <th>Rol</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Usuario</th>
                <th>Clave</th>
                <th>Email</th>
                <th></th>
                <th></th>
                <?php foreach($array_usuarios as $usuario) : ?>
                    <tr>
                        <td><?= $usuario->getId(); ?></td>
                        <td><?= $usuario->getRol(); ?></td>
                        <td><?= $usuario->getNombre(); ?></td>
                        <td><?= $usuario->getApellidos(); ?></td>
                        <td><?= $usuario->getUsuario(); ?></td>
                        <td><?= $usuario->getClave(); ?></td>
                        <td><?= $usuario->getEmail(); ?></td>
                        <?php        
                        if(isset($_SESSION['usuario'])){
                          if(unserialize($_SESSION['usuario'])->getRol() == 1){
                        ?>
                            <td><a href='/controladores/controladorFormularioUsuarios.php?id=<?= $usuario->getId(); ?>' class='btn btn-secondary'><i class='fa-regular fa-pen-to-square'></i></a></td>
                            <td><a href='/controladores/controladorEliminarUsuarios.php?id=<?= $usuario->getId(); ?>' class='btn btn-danger'><i class='fa-solid fa-trash'></i></a></td>
                        <?php     
                          }else{
                            echo "<td></td> <td></td>"; 
                          }
                        }
                        ?>
                  </tr>
                  <?php endforeach; ?>
                </table>
            </table>
        </div>
    </main>
    <?php include("footer.php");?>
</body>
</html>