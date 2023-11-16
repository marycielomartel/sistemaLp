<?php
require_once "Conn.php";

class Laboratorio{
    private $id;
    private $nombre;
    private $descripcion;
    private $estado;
    private $idInventario;
    


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

    public function setDescripcion(String $descripcion){
        $this->descripcion = $descripcion;
    }

    public function getEstado(){
        return $this->estado;
    }

    public function setEstado(String $estado){
        $this->estado = $estado;
    }
    public function getidInventario(){
        return $this->idInventario;
    }

    public function setidInventario(int $idInventario){
        $this->idInventario = $idInventario;
    }


  
    public function guardar(String $nombre, String $descripcion, String $estado, int $idInventario){
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql2 = "INSERT INTO laboratorio(nombre, descripcion, estado, idInventario) VALUES ('$nombre', '$descripcion','$estado','$idInventario')";
        $resultado = $conexion->exec($sql2);
        $conn->cerrar();
    
        return $resultado;
    }

    public function traerTodo(){
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql2 = "SELECT * FROM laboratorio";
        $resultado = $conexion->query($sql2);
        $conn->cerrar();
    
        return $resultado;
    }

    public function editar(String $nombre, String $descripcion, String $estado, int $idInventario){       
        $consulta="update ".$tabla." set ". $data ." where ".$condicion;
        $resultado=$this->db->query($consulta);
        if ($resultado) {
            return true;
        }else {
            return false;
        }
     }
    
    public function eliminar($id) {
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql2 = "DELETE FROM reserva WHERE id='$id'";
        $resultado = $conexion->exec($sql2);
        $conn->cerrar();
        
        if ($resultado !== false) {
            return true; // Éxito
        } else {
            return false; // Error
        }
    }
}