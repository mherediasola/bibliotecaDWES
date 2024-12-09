<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../estilos/estilos.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Registro</title>
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
      <div id="bienvenido">
        <h3>Registrarse</h3>
      </div>
      <div id="formulario" class="form mb-3 formulario col-2 mx-auto">
        <form action="controladorFormularioRegistroUsuarios.php" method="post">
          <label class="form-label" for="nombre">Nombre</label>
          <input class="form-control" type="text" name="nombre" id="nombre">
          <label class="form-label" for="apellidos">Apellidos</label>
          <input class="form-control" type="text" name="apellidos" id="apellidos">
          <label class="form-label" for="usuario">Usuario</label>
          <input class="form-control" type="text" name="usuario" id="usuario">
          <label class="form-label" for="clave">Clave</label>
          <input class="form-control" type="password" name="clave" id="clave">
          <label class="form-label" for="repetirClave">Confirmar clave</label>
          <input class="form-control" type="password" name="repetirClave" id="repetirClave">
          <label class="form-label" for="email">Email</label>
          <input class="form-control" type="email" name="email" id="email">
          <label class="form-label" for="confirmarEmail">Confirmar email</label>
          <input class="form-control" type="email" name="confirmarEmail" id="confirmarEmail">
          <p class="invalid-feedback" style="display: block;"><?php if(isset($error)) {echo ($error);} ?></p>
          <button class="btn btn-primary my-3" type="submit">Enviar</button>
        </form>
      </div>
    </main>
    <?php include("footer.php");?>
</body>
</html>