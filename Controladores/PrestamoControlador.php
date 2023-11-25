<?php
require_once("Clases/Prestamo.php");

class PrestamoControlador{
    public function guardar(String $estado, int $idEquipo, int $idUsuario, String $fechaInicio, String $fechaDevolucion,String $observaciones): String{
        $respuesta="";
        
        if(trim($estado)==""){
            $respuesta.="seleccione el estado del prestamo<br>";
        }  
        if(trim($idEquipo)==""){
            $respuesta.="Seleccione el id del equipo <br>";
        } 
        if(trim($idUsuario)==""){
            $respuesta.="Seleccione el id de usuario<br>";
        } 
        if(trim($fechaInicio)==""){
            $respuesta.="Seleccione la fecha de inicio<br>";
        } 
        if(trim($fechaDevolucion)==""){
            $respuesta.="Seleccione la fecha de devolucion<br>";
        } 
        if(trim($observaciones)==""){
            $respuesta.="Escriba las observaciones<br>";
        } 

        $prestamo = new Prestamo();

        if($prestamo->guardar( $estado, $idEquipo, $idUsuario, $fechaInicio, $fechaDevolucion, $observaciones )>0){
            $respuesta = "Prestamo Registrado";
        } 

        return $respuesta;
       
    }

    public function mostrar(){
        $prestamo = new Prestamo();
        return $prestamo->traerTodo();        
    }
    public function mostrarEquipo(){
        $equipo = new Prestamo();
        return $equipo->traerEquipo();        
    }
}
