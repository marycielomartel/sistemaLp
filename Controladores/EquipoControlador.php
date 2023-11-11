<?php
require_once("Clases/Equipo.php");

class EquipoControlador{
    public function guardar(String $nombre, String $descripcion, String $estado): String{
        $respuesta="";
        if(trim($nombre)==""){
            $respuesta.="Complete el campo de nombre<br>";
        }  
        if(trim($descripcion)==""){
            $respuesta.="Complete el campo de descripcion<br>";
        } 
        if(trim($estado)==""){
            $respuesta.="Complete el campo de estado<br>";
        } 

        $equipo = new Equipo();

        if($equipo->guardar($nombre, $descripcion, $estado)>0){
            $respuesta = "Equipo registrado";
        } 

        return $respuesta;
       
    }

    public function mostrar(){
        $equipo = new Equipo();
        return $equipo->traerTodo();        
    }
}
