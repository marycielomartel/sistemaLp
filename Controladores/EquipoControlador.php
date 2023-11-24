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

    public function obtenerId($id) {
   
        $equipo = new Equipo();
        $equipoData = $equipo->obtenerdatosId($id);
    
     
        if ($equipoData) {
            return $equipoData; 
        } else {
            return null; 
        }
    }

    public function editar($id, $nombre, $descripcion, $estado) {
        $equipo = new Equipo();
        $resultado = $equipo->actualizar($id, $nombre, $descripcion,$estado);
        if ($resultado) {
            echo "Se edito con Exito el Campo";
        } else {
            echo "Error";
        }
    }

    public function eliminar($id){
        $equipo = new Equipo();
        $resultado=$equipo->eliminar($id);
        if($resultado!=0){
            echo "Equipo Eliminado";
        }else{
            echo "Error";
        }

    }


}
