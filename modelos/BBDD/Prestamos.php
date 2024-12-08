<?php 
require_once("BaseDeDatos.php");
require_once(__DIR__ . "/../pojos/Prestamo.php");
class Prestamos implements BaseDeDatos{
    //atributos
    private $conexion;
    private $server;
    private $user;
    private $pass;
    private $base;

    //métodos
    public function __construct()
    {
        $this->server="localhost:3308";
        $this->user = "root";
        $this->pass = "";
        $this->base = "biblioteca";
        $this->conexion = new mysqli($this->server, $this->user, $this->pass, $this->base);
    }

    //muestra toda la info de préstamos uniendo tres tablas
    public function consultarTodo()
    {
        $consulta = "SELECT p.id, u.usuario, CONCAT(u.nombre, ' ', u.apellidos) AS Nombre, e.nombre AS Ejemplar, e.autor AS Autor, p.fecha AS Préstamo, p.fecha_final AS Vencimiento 
        FROM ejemplar e JOIN prestamo p ON e.id = p.id_ejemplar
        JOIN usuario u ON u.id = p.id_usuario";
        $resultado = $this->conexion->query($consulta);
        $prestamos= $resultado->fetch_All(MYSQLI_BOTH);
        $array_prestamos = array();
        foreach($prestamos as $prestamo){
            $tmp = new Prestamo();
            $tmp->setId($prestamo['id']);
            $tmp->setUsuario($prestamo['usuario']);
            $tmp->setNombreUsuario($prestamo['Nombre']);
            $tmp->setEjemplar($prestamo['Ejemplar']);
            $tmp->setAutor($prestamo['Autor']);
            $tmp->setFecha($prestamo['Préstamo']);
            $tmp->setFechaFinal($prestamo['Vencimiento']);
            array_push($array_prestamos, $tmp);
        }
        return $array_prestamos;
    }

    public function consultarCoincideId($id)
    {
        $consulta = "SELECT p.id, u.usuario, CONCAT(u.nombre, ' ', u.apellidos) AS Nombre, e.nombre AS Ejemplar, e.autor AS Autor, p.fecha AS Préstamo, p.fecha_final AS Vencimiento 
        FROM ejemplar e JOIN prestamo p ON e.id = p.id_ejemplar
        JOIN usuario u ON u.id = p.id_usuario WHERE p.id = $id";
        $resultado = $this->conexion->query($consulta);
        $prestamos = $resultado->fetch_All(MYSQLI_BOTH);
        $prestamos = $prestamos[0];
        $prestamo = new Prestamo();
        $prestamo->setId($prestamos['id']);
        $prestamo->setNombreUsuario($prestamos['Nombre']);
        $prestamo->setEjemplar($prestamos['Ejemplar']);
        $prestamo->setFecha($prestamos['Préstamo']);
        $prestamo->setFechaFinal($prestamos['Vencimiento']);
        return $prestamo;
    }

    public function insertar($prestamo){
        $consulta="INSERT INTO prestamo(id_usuario, id_ejemplar, fecha, fecha_final) VALUES ({$prestamo->getIdUsuario()}, {$prestamo->getIdEjemplar()}, '{$prestamo->getFecha()}', '{$prestamo->getFechaFinal()}')";
        $this->conexion->query($consulta);
    }

    public function editar($prestamo)
    {
        $consulta= "UPDATE prestamo SET (id_usuario= {$prestamo->getIdUsuario()}, id_ejemplar= {$prestamo->getIdEjemplar()}, fecha= '{$prestamo->getFecha()}', fecha_final= '$prestamo->getFechaFinal()}' WHERE id = {$prestamo->getId()}";
        $this->conexion->query($consulta);
        
    }

    public function eliminar($prestamo)
    {
        $consulta= "DELETE FROM prestamo WHERE id = {$prestamo->getId()}";
        $this->conexion->query($consulta);
    }

    public function finalizarConexion()
    {
        $this->conexion->close();
    }

}

?>