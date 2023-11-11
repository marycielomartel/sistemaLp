<?php
require_once "Conn.php";

class Prestamo{
    public $idEquipo;
    public $idUsuario;
    public $estado;
    public $fechaInicio;
    public $fechaDevolucion;
    public $observaciones;
    


    
    public function getIdEquipo(){
        return $this->idEquipo;
    }

    public function setIdEquipo(int $idEquipo){
        $this->idEquipo = $idEquipo;
    }

    public function getIdUsuario(){
        return $this->idUsuario;
    }

    public function setIdUsuario(int $idUsuario){
        $this->idUsuario = $idUsuario;
    }

    public function getEstado() {
        return $this->estado;
    }

    public function setEstado(String $estado) {
        $this->estado = $estado;
    }

    public function getIdFechaInicio() {
        return $this->fechaInicio;
    }

    public function setIdFechaInicio(string $fechaInicio) {
        $this->fechaInicio = $fechaInicio;
    }
    public function getIdFechaDevolucion() {
        return $this->fechaDevolucion;
    }

    public function setIdFechaDevolucion(string $fechaDevolucion) {
        $this->fechaDevolucion = $fechaDevolucion;
    }

    public function getObservaciones() {
        return $this->observaciones;
    }
    public function setObservaciones(string $observaciones) {
        $this->observaciones = $observaciones;
    }

    public function guardar( String $estado, int $idEquipo, int $idUsuario, String $fechaInicio, String $fechaDevolucion,String $observaciones) {
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "INSERT INTO prestamo(estado, idEquipo, idUsuario, fechaInicio, fechaDevolucion, observaciones) VALUES ('$estado', '$idEquipo', '$idUsuario', '$fechaInicio', '$fechaDevolucion', '$observaciones')";
        $resultado = $conexion->exec($sql);
        $conn->cerrar();

        return $resultado;
    }

    public function traerTodo() {
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "SELECT * FROM prestamo";
        $resultado = $conexion->query($sql);
        $conn->cerrar();

        return $resultado;
    }
}