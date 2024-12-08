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
        <?php include("../navbar.php");?>
        <h3 class="titulo">Préstamo</h3>
        <div class="form mb-3 formulario col-2 mx-auto">
            <form action="/controladores/controladorEditarInsertarPrestamos.php" method="post">
                <input type="hidden" name="idPrestamo" id="idPrestamo" value="<?php if($prestamo){echo $prestamo->getId();}?>">
                <?php 
                    if($_SESSION['usuario']['id_rol'] != 3){?>
                        <label class="form-label" for="usuario">Usuario</label>
                        <select class="form-select" name="usuario" id="usuario">
                        <?php foreach($array_usuarios as $usuario) : ?>
                                <?php $nombre = $usuario->getUsuario() + " - " + $usuario->getNombre() + " " + $usuario->getApellidos(); 
                                if($prestamo && $usuario->getId() == $prestamo->getIdUsuario()){?>
                                    <option selected value='<?=$usuario->getId() ?>'><?=$nombre ?></option>
                                <?php
                                }else{?>
                                    <option value='<?=$usuario->getId() ?>'><?=$nombre ?></option>
                                <?php
                                }
                                ?>
                                <?php endforeach; ?>  
                        </select>
                    <?php
                    }else{?>
                        <input type="hidden" name="usuario" value="{$_SESSION['usuario']['id']}"></input>;
                    <?php    
                    }
                    ?>
                <label class="form-label" for="ejemplar">Ejemplar</label>
                <select class="form-select" name="ejemplar" id="ejemplar">
                    <?php foreach($array_ejemplares as $ejemplar) : ?>
                            <?php
                            if($prestamo && $ejemplar->getId() == $prestamo->getIdEjemplar()){?>
                                <option selected value='<?=$ejemplar->getId() ?>'><?=$ejemplar->getNombre() ?></option>
                            <?php
                            }else{?>
                                <option value='<?=$ejemplar->getId() ?>'><?=$ejemplar->getNombre() ?></option>
                            <?php
                            } 
                        endforeach; ?>
                </select>
                <label class="form-label" for="fecha">Fecha</label>
                <input class="form-control" type="date" name="fecha" id="fecha" value="<?php if($prestamo){echo $prestamo->getFecha();}?>">
                <label class="form-label" for="fechaFinal">Fecha final</label>
                <input class="form-control" type="date" name="fechaFinal" id="fechaFinal" value="<?php if($prestamo){echo $prestamo->getFechaFinal();}?>">
                <button class="btn btn-primary my-3" type="submit">Enviar</button>
            </form>
        </div>
    </main>
    <?php include("footer.php");?>
</body>
</html>