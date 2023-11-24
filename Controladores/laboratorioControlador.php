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
    
    public function obtenerId($id) {
   
        $laboratorio = new Laboratorio();
        $laboratorioData = $laboratorio->obtenerdatosId($id);
    
     
        if ($laboratorioData) {
            return $laboratorioData; 
        } else {
            return null; 
        }
    }

    public function editar($id, $nombre, $descripcion, $estado) {
        $laboratorio = new Laboratorio();
        $resultado = $laboratorio->actualizar($id, $nombre, $descripcion,$estado);
        if ($resultado) {
            echo "Se edito con Exito el Campo";
        } else {
            echo "Error";
        }
    }
    public function eliminar($id){
        $laboratorio = new Laboratorio();
        $resultado=$laboratorio->eliminar($id);
        if($resultado!=0){
            echo "Laboratorio  Eliminado";
        }else{
            echo "Error";
        }

    }
}

