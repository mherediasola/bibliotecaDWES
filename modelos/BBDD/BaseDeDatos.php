<?php 
interface BaseDeDatos{
    public function __construct();
    public function consultarTodo();
    public function consultarCoincideId($id);
    //public function insertar(); Depende de la tabla, necesita más o menos parámetros, así que no lo incluyo en la interfaz
    //public function editar(); Igual que el anterior
    public function eliminar($id);
    public function finalizarConexion();
}
?>