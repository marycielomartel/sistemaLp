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
    public function obtenerdatosId($id) {
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql2 = "SELECT * FROM laboratorio WHERE id = :id";
        $stmt = $conexion->prepare($sql2);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();  
        $laboratorioData = $stmt->fetch(PDO::FETCH_ASSOC);
        
        $conn->cerrar();
        
        return $laboratorioData;
    }
    
        public function actualizar($id, $nombre, $descripcion,$estado){
            $conn = new Conn();
            $conexion = $conn->conectar();
            $sql = "UPDATE laboratorio SET nombre = :nombre, descripcion = :descripcion, estado = :estado  WHERE id = :id";
            $stmt = $conexion->prepare($sql);
            $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
            $stmt->bindParam(':descripcion', $descripcion, PDO::PARAM_STR);
            $stmt->bindParam(':estado', $estado, PDO::PARAM_STR);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $resultado = $stmt->execute();
            $conn->cerrar();
            return $resultado;
        }
        public function eliminar($id){
            $conn = new Conn();
            $conexion = $conn->conectar();
            $sql2="DELETE FROM laboratorio WHERE id='$id'";
            $resultado =  $conexion->query($sql2);
            $conn->cerrar();
           
            return $resultado;
    
    
        }
        public function obtenerNomLab($idLaboratorio){
            $conn = new Conn();
            $conexion = $conn->conectar();
            $sql2 = "SELECT nombre FROM laboratorio WHERE id = $idLaboratorio";
            $resultado = $conexion->query($sql2);
            $conn->cerrar();
           
            return $resultado;
        }
}