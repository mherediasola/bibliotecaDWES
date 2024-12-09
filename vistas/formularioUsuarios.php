<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../estilos/estilos.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Formulario Usuario</title>
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
        <h3 class="titulo">Usuario</h3>
        <div class="form mb-3 formulario col-2 mx-auto">
            <form action="/controladores/controladorEditarInsertarUsuarios.php" method="post">
                <input type="hidden" name="idUsuario" id="idUsuario" value="<?php if($usuario){echo $usuario->getId();}?>">
                <label class="form-label" for="rol">Rol</label>
                <select class="form-select" name="rol" id="rol">
                    <?php foreach($array_roles as $rol) : ?>
                            <?php 
                            if($usuario && $rol->getId() == $usuario->getRol()){
                            ?>    
                               <option selected value='<?= $rol->getId(); ?>'><?= $rol->getTipo(); ?></option>
                            <?php   
                            }else{
                            ?>    
                                <option value='<?= $rol->getId(); ?>'><?= $rol->getTipo(); ?></option>
                            <?php    
                            }
                            ?>
                    <?php endforeach; ?>
                </select>
                <label class="form-label" for="nombre">Nombre</label>
                <input class="form-control" type="text" name="nombre" id="nombre" value="<?php if($usuario){echo $usuario->getNombre();}?>">
                
                <label class="form-label" for="apellidos">Apellidos</label>
                <input class="form-control" type="text" name="apellidos" id="apellidos" value="<?php if($usuario){echo $usuario->getApellidos();}?>">
                
                <label class="form-label" for="usuario">Usuario</label>
                <input class="form-control" type="text" name="usuario" id="usuario" value="<?php if($usuario){echo $usuario->getUsuario();}?>">
                
                <label class="form-label" for="clave">Clave</label>
                <input class="form-control" type="text" name="clave" id="clave" value="<?php if($usuario){echo $usuario->getClave();}?>">
                
                <label class="form-label" for="email">Email</label>
                <input class="form-control" type="text" name="email" id="email" value="<?php if($usuario){echo $usuario->getEmail();}?>">
                
                <button class="btn btn-primary my-3" type="submit">Enviar</button>
            </form>
        </div>
    </main>
    <?php include("footer.php");?>
</body>
</html>