<?php
require_once "Conn.php";

class Equipo{
    public $id;
    public $nombre;
    public $descripcion;
    public $cantidad;
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

    public function getCantidad(){
        return $this->cantidad;
    }

    public function setCantidad(int $cantidad){
        $this->cantidad = $cantidad;
    }

    public function getEstado(){
        return $this->descripcion;
    }

    public function setEstado(String $estado){
        $this->estado = $estado;
    }

  
    public function guardar(String $nombre, String $descripcion, int $cantidad, String $estado){
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql2 = "INSERT INTO equipo(nombre, descripcion, cantidad, estado) VALUES ('$nombre', '$descripcion','$cantidad','$estado')";
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
    public function obtenerdatosId($id) {
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql2 = "SELECT * FROM equipo WHERE id = :id";
        $stmt = $conexion->prepare($sql2);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();  
        $equipoData = $stmt->fetch(PDO::FETCH_ASSOC);
        
        $conn->cerrar();
        
        return $equipoData; 
    }
    
        public function actualizar($id, $nombre, $descripcion, $cantidad, $estado){
            $conn = new Conn();
            $conexion = $conn->conectar();
            $sql = "UPDATE equipo SET nombre = :nombre, descripcion = :descripcion,  cantidad = :cantidad, estado = :estado  WHERE id = :id";
            $stmt = $conexion->prepare($sql);
            $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
            $stmt->bindParam(':descripcion', $descripcion, PDO::PARAM_STR);
            $stmt->bindParam(':estado', $estado, PDO::PARAM_STR);
            $stmt->bindParam(':cantidad', $cantidad, PDO::PARAM_STR);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $resultado = $stmt->execute();
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

    public function obtenerNomLab($idEquipo){
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql2 = "SELECT nombre FROM equipo WHERE id = $idEquipo";
        $resultado = $conexion->query($sql2);
        $conn->cerrar();
       
        return $resultado;
    }
}