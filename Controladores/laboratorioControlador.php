<?php
require_once("Clases/Laboratorio.php");

class LaboratorioControlador{
    public function guardar(String $nombre, String $descripcion, String $estado, String $inventario): String{
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
        if(trim($inventario)==""){
            $respuesta.="Complete el campo de inventario<br>";
        } 


        $laboratorio = new Laboratorio();

        if($laboratorio->guardar($nombre, $descripcion, $estado, $inventario)>0){
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

    public function editar($id, $nombre, $descripcion, $estado,$inventario) {
        $laboratorio = new Laboratorio();
        $resultado = $laboratorio->actualizar($id, $nombre, $descripcion,$estado, $inventario);
        if ($resultado) {
            echo "Se edito con Exito el Campo";
            header("location: mostrarLaboratorio.php");
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

