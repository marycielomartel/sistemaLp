<?php
require_once "Conn.php";

class Reserva{
    private $id;
    private $idUsuario;
    private $idLaboratorio;
    private $fechaInicio;
    private $fechaFin;
    private $horarios;



    public function getId(){
        return $this->id;
    }

    public function setId(int $id){
        $this->id = $id;
    }

    public function getIdUsuario(){
        return $this->idUsuario;
    }

    public function setIdUsuario(int  $idUsuario){
        $this->idUsuario = $idUsuario;
    }

    public function getIdLaboratorio(){
        return $this->idLaboratorio;
    }

    public function setIdLaboratorio(int $idLaboratorio){
        $this->idLaboratorio = $idLaboratorio;
    }
    public function getFechaInicio(){
        return $this->fechaInicio;
    }

    public function setFechaIncio(string $fechaInicio){
        $this->fechaInicio = $fechaInicio;
    }
    public function getFechaFin(){
        return $this->fechaFin;
    }

    public function setFechaFin(string $fechaFin){
        $this->fechaFin = $fechaFin;
    }
    public function getHorarios(){
        return $this->horarios;
    }

    public function setHorarios(string $horarios){
        $this->horarios = $horarios;
    }
   

  
    public function guardar(int $idUsuario, int $idLaboratorio,String $fechaInicio, String $fechaFin, String $horarios ){
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql2 = "INSERT INTO reserva(idUsuario, idLaboratorio, fechaInicio,fechaFin,horarios) 
        VALUES ('$idUsuario', '$idLaboratorio','$fechaInicio','$fechaFin','$horarios')";
        $resultado = $conexion->exec($sql2);
        $conn->cerrar();
    
        return $resultado;
    }

    public function traerTodo(){
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql2 = "SELECT r.*, l.nombre as nombreLaboratorio, u.username as nombreUsuario
        FROM reserva r
        JOIN laboratorio l ON r.idLaboratorio = l.id
        JOIN usuario u ON r.idUsuario = u.id";
        $resultado = $conexion->query($sql2);
        $conn->cerrar();
    
        return $resultado;
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
    public function traerLab(){
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql2 = "SELECT id, nombre FROM laboratorio where estado = 'Disponible'";
        $resultado = $conexion->query($sql2);
        $conn->cerrar();
    
        return $resultado;
    }
}