<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../estilos/estilos.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Formulario Ejemplares</title>
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
        <h3 class="titulo">Ejemplar</h3>
        <div class="form mb-3 formulario col-2 mx-auto">
            <form action="/controladores/controladorEditarInsertarEjemplares.php" method="post">
                <input type="hidden" name="idEjemplar" id="idEjemplar" value="<?php if($ejemplar){echo $ejemplar->getId();}?>">
                <label class="form-label" for="nombre">Nombre</label>
                <input class="form-control" type="text" name="nombre" id="nombre" value="<?php if($ejemplar){echo $ejemplar->getNombre();}?>">
                <label class="form-label" for="tipo">Tipo</label>
                <select class="form-select" name="tipo" id="tipo">
                    <option value="libro" name="tipo" id="libro">Libro</option>
                    <option value="articulo" name="tipo" id="articulo">Artículo</option>
                    <option value="cd" name="tipo" id="cd">CD</option>
                    <option value="dvd" name="tipo" id="dvd">DVD</option>
                </select>             
                <label class="form-label" for="autor">Autor</label>
                <input class="form-control" type="text" name="autor" id="autor" value="<?php if($ejemplar){echo $ejemplar->getAutor();}?>">
                
                <label class="form-label" for="idioma">Idioma</label>
                <input class="form-control" type="text" name="idioma" id="idioma" value="<?php if($ejemplar){echo $ejemplar->getIdioma();}?>">
                
                <label class="form-label" for="editorial">Editorial</label>
                <input class="form-control" type="text" name="editorial" id="editorial" value="<?php if($ejemplar){echo $ejemplar->getEditorial();}?>">
                
                <button class="btn btn-primary my-3" type="submit">Enviar</button>
            </form>
        </div>
    </main>
    <?php include("footer.php");?>
</body>
</html>