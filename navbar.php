<?php
    if(session_status() !== PHP_SESSION_ACTIVE){
        session_start();
    }
?>

<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="/vistas/index.php">Inicio</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <?php
                if(isset($_SESSION['usuario'])){
                    if($_SESSION['usuario']['id_rol'] != 3){
                        echo('<li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Secciones
                        </a>
                        <ul class="dropdown-menu">');
                            if($_SESSION['usuario']['id_rol'] == 1){
                                echo('<li><a class="dropdown-item" href="/controladores/controladorRoles.php">Roles</a></li>
                                <li><a class="dropdown-item" href="/controladores/controladorUsuarios.php">Usuarios</a></li>');
                            }
                            echo('<li><a class="dropdown-item" href="/controladores/controladorEjemplares.php">Catálogo</a></li>
                            <li><a class="dropdown-item" href="/controladores/controladorPrestamos.php">Préstamos</a></li>
                        </ul>
                        </li>');
                    }else{
                        echo('<li ><a class="nav-link" href="/controladores/controladorEjemplares.php">Catálogo</a></li>');
                    }
                }else{
                    echo('<li ><a class="nav-link" href="/controladores/controladorEjemplares.php">Catálogo</a></li>');
                }  
            ?>
            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Mi cuenta</a>
            <ul class="dropdown-menu">
                <?php 
                    if(isset($_SESSION['usuario'])){
                        echo('<li><a class="dropdown-item" href="/paginas/miCuenta/cerrarSesion.php">Cerrar Sesión</a></li>');
                        if($_SESSION['usuario']['id_rol'] == 3){
                            echo('<li><a class="dropdown-item" href="/controladores/controladorPrestamos.php">Mis préstamos</a></li>');
                        }
                    }else{
                        echo('<li><a class="dropdown-item" href="/paginas/miCuenta/registro.php">Registrarse</a></li>');
                        echo('<li><a class="dropdown-item" href="/paginas/miCuenta/inicioSesion.php">Iniciar sesión</a></li>');
                    }
                ?>
            </ul>
            </li>
            <?php
                if(isset($_SESSION['usuario'])){
                echo("<li class="."nav-item"."><a class="."nav-link"." href="."#".">Bienvenido, {$_SESSION['usuario']['nombre']}</a></li>");
                }
            ?>
        </ul>
        </div>
    </div>
</nav>