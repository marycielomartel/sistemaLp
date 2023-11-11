<?php
require_once("Clases/Reserva.php");

class ReservaControlador{
    public function guardar(int $idUsuario, int $idLaboratorio,String $fechaInicio, String $fechaFin, String $horarios): String{
        $respuesta="";
        if(trim($idUsuario)==""){
            $respuesta.="Complete el campo de idUsuario<br>";
        }  
        if(trim($idLaboratorio)==""){
            $respuesta.="Complete el campo de idLaboratio<br>";
        } 
        if(trim($fechaInicio)==""){
            $respuesta.="Complete el campo de Fecha de Inicio<br>";
        }  
        if(trim($fechaFin)==""){
            $respuesta.="Complete el campo de Fecha de Fin<br>";
        }
        if(trim($horarios)==""){
            $respuesta.="Complete el campo de Horarios<br>";
        }  
       

        $reserva = new Reserva();

        if($reserva->guardar($idUsuario, $idLaboratorio, $fechaInicio, $fechaFin,  $horarios)>0){
            $respuesta = "Reserva Laboratorio registrado";
        } 

        return $respuesta;
       
    }

    public function mostrar(){
        $reserva = new Reserva();
        return $reserva->traerTodo();        
    }
}