<?php
require_once "Conn.php";

class Inventario{
    private $id;
    private $nombre;
    private $descripcion;


    public function getId(){
        return $this->id;
    }

    public function setId(int $id){
        $this->id = $id;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function setNombre(String $nombre){
        $this->nombre = $nombre;
    }

    public function getDescripcion(){
        return $this->descripcion;
    }

    public function setDescipcion(String $descripcion){
        $this->descripcion = $descripcion;
    }

  
    public function guardar(String $nombre, String $descripcion){
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql2 = "INSERT INTO inventario(nombre, descripcion) VALUES ('$nombre', '$descripcion')";
        $resultado = $conexion->exec($sql2);
        $conn->cerrar();
    
        return $resultado;
    }

    public function traerTodo(){
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql2 = "SELECT * FROM inventario";
        $resultado = $conexion->query($sql2);
        $conn->cerrar();
    
        return $resultado;
    }

    public function eliminar($id) {
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql2 = "DELETE FROM inventario WHERE id='$id'";
        $resultado = $conexion->exec($sql2);
        $conn->cerrar();
        
        if ($resultado !== false) {
            return true; // Éxito
        } else {
            return false; // Error
        }
    }
}