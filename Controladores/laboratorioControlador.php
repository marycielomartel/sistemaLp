<?php
require_once("Clases/Laboratorio.php");

class LaboratorioControlador{
    public function guardar(String $nombre, String $descripcion, String $estado, int $idInventario): String{
        $respuesta="";
        if(trim($nombre)==""){
            $respuesta.="Complete el campo de nombre<br>";
        }  
        if(trim($descripcion)==""){
            $respuesta.="Complete el campo de descripcion<br>";
        }
        if(trim($estado)==""){
            $respuesta.="Complete el campo de estados<br>";
        } 
        if(trim($idInventario)==""){
            $respuesta.="Complete el campo de inventario<br>";
        } 


        $laboratorio = new Laboratorio();

        if($laboratorio->guardar($nombre, $descripcion, $estado, $idInventario)>0){
            $respuesta = "Laboratorio registrado";
        } 

        return $respuesta;
       
    }

    public function mostrar(){
        $laboratorio = new Laboratorio();
        return $laboratorio->traerTodo();        
    }
}

