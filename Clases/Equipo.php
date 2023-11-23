<?php
require_once "Conn.php";

class Equipo{
    public $nombre;
    public $descripcion;
    public $estado;
   


    public function getNombre(){
        return $this->id;
    }

    public function setNombre(String $nombre){
        $this->nombre = $nombre;
    }

    public function getDescripcion(){
        return $this->nombre;
    }

    public function setDescipcion(String $descripcion){
        $this->descripcion = $descripcion;
    }

    public function getEstado(){
        return $this->descripcion;
    }

    public function setEstado(String $estado){
        $this->estado = $estado;
    }

  
    public function guardar(String $nombre, String $descripcion, String $estado){
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql2 = "INSERT INTO equipo(nombre, descripcion, estado) VALUES ('$nombre', '$descripcion', '$estado')";
        $resultado = $conexion->exec($sql2);
        $conn->cerrar();
    
        return $resultado;
    }

    public function traerTodo(){
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql2 = "SELECT * FROM equipo";
        $resultado = $conexion->query($sql2);
        $conn->cerrar();
    
        return $resultado;
    }

    public function eliminar($id) {
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql2 = "DELETE FROM equipo WHERE id='$id'";
        $resultado = $conexion->exec($sql2);
        $conn->cerrar();
        
        if ($resultado !== false) {
            return true; // Éxito
        } else {
            return false; // Error
        }
    }
}