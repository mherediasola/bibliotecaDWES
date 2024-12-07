<?php 
if(session_status() !== PHP_SESSION_ACTIVE){
    session_start();
}
//redirige a la página de inicio de sesión si no hay un usuario logeado
function redirectSiNoLogeado(){
    if(!isset($_SESSION['usuario'])){
        header("Location: /paginas/miCuenta/inicioSesion.php");
      }
}

//pepito
redirectSiNoLogeado();
?>
