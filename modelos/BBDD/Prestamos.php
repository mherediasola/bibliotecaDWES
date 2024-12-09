<?php 
require_once("BaseDeDatos.php");
require_once(__DIR__ . "/../pojos/Prestamo.php");
require_once("Usuarios.php");
require_once("Ejemplares.php");
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
        $consulta = "SELECT p.id, u.id AS idUsuario, CONCAT(u.nombre, ' ', u.apellidos) AS Nombre, e.id AS Ejemplar, e.autor AS Autor, p.fecha AS Préstamo, p.fecha_final AS Vencimiento 
        FROM ejemplar e JOIN prestamo p ON e.id = p.id_ejemplar
        JOIN usuario u ON u.id = p.id_usuario";
        $resultado = $this->conexion->query($consulta);
        $prestamos= $resultado->fetch_All(MYSQLI_BOTH);
        $array_prestamos = array();
        foreach($prestamos as $prestamo){
            $tmp = new Prestamo();
            $tmp->setId($prestamo['id']);
            $tmpUsuarios = new Usuarios();
            $tmpUsuarios = $tmpUsuarios->consultarCoincideId($prestamo['idUsuario']);
            $tmp->setUsuario($tmpUsuarios);
            $tmpEjemplares = new Ejemplares();
            $tmpEjemplares = $tmpEjemplares->consultarCoincideId($prestamo['Ejemplar']);
            $tmp->setEjemplar($tmpEjemplares);
            $tmp->setAutor($prestamo['Autor']);
            $tmp->setFecha($prestamo['Préstamo']);
            $tmp->setFechaFinal($prestamo['Vencimiento']);
            array_push($array_prestamos, $tmp);
        }
        return $array_prestamos;
    }

    public function consultarTodoUsuario($idUsuario)
    {
        $consulta = "SELECT p.id, u.id AS idUsuario, CONCAT(u.nombre, ' ', u.apellidos) AS Nombre, e.id AS Ejemplar, e.autor AS Autor, p.fecha AS Préstamo, p.fecha_final AS Vencimiento 
        FROM ejemplar e JOIN prestamo p ON e.id = p.id_ejemplar
        JOIN usuario u ON u.id = p.id_usuario WHERE  u.id = $idUsuario";
        $resultado = $this->conexion->query($consulta);
        $prestamos= $resultado->fetch_All(MYSQLI_BOTH);
        $array_prestamos = array();
        foreach($prestamos as $prestamo){
            $tmp = new Prestamo();
            $tmp->setId($prestamo['id']);
            $tmpUsuarios = new Usuarios();
            $tmpUsuarios = $tmpUsuarios->consultarCoincideId($prestamo['idUsuario']);
            $tmp->setUsuario($tmpUsuarios);
            $tmpEjemplares = new Ejemplares();
            $tmpEjemplares = $tmpEjemplares->consultarCoincideId($prestamo['Ejemplar']);
            $tmp->setEjemplar($tmpEjemplares);
            $tmp->setAutor($prestamo['Autor']);
            $tmp->setFecha($prestamo['Préstamo']);
            $tmp->setFechaFinal($prestamo['Vencimiento']);
            array_push($array_prestamos, $tmp);
        }
        return $array_prestamos;
    }

    public function consultarCoincideId($id)
    {
        $consulta = "SELECT p.id, u.id AS idUsuario, CONCAT(u.nombre, ' ', u.apellidos) AS Nombre, e.id AS Ejemplar, e.autor AS Autor, p.fecha AS Préstamo, p.fecha_final AS Vencimiento 
        FROM ejemplar e JOIN prestamo p ON e.id = p.id_ejemplar
        JOIN usuario u ON u.id = p.id_usuario WHERE p.id = $id";
        $resultado = $this->conexion->query($consulta);
        $prestamos = $resultado->fetch_All(MYSQLI_BOTH);
        $prestamos = $prestamos[0];
        $prestamo = new Prestamo();
        $prestamo->setId($prestamos['id']);
        $tmpUsuarios = new Usuarios();
        $tmpUsuarios = $tmpUsuarios->consultarCoincideId($prestamos['idUsuario']);
        $prestamo->setUsuario($tmpUsuarios);
        $tmpEjemplares = new Ejemplares();
        $tmpEjemplares = $tmpEjemplares->consultarCoincideId($prestamos['Ejemplar']);
        $prestamo->setEjemplar($tmpEjemplares);
        $prestamo->setAutor($prestamos['Autor']);
        $prestamo->setFecha($prestamos['Préstamo']);
        $prestamo->setFechaFinal($prestamos['Vencimiento']);
        return $prestamo;
    }

    public function insertar($prestamo){    
        echo "Fecha: " . $prestamo->getFecha() . "<br>"; 
        echo "Fecha Final: " . $prestamo->getFechaFinal() . "<br>";  

        $consulta = "INSERT INTO prestamo(id_usuario, id_ejemplar, fecha, fecha_final) VALUES ({$prestamo->getUsuario()->getId()}, {$prestamo->getEjemplar()->getId()}, '{$prestamo->getFecha()}', '{$prestamo->getFechaFinal()}')";
        $this->conexion->query($consulta); 
    }

    public function editar($prestamo)
    {
        $consulta= "UPDATE prestamo 
        SET id_usuario= {$prestamo->getUsuario()->getId()}, id_ejemplar= {$prestamo->getEjemplar()->getId()}, fecha= '{$prestamo->getFecha()}', fecha_final= '{$prestamo->getFechaFinal()}' WHERE id = {$prestamo->getId()}";
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