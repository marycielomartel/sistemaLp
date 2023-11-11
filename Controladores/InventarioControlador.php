<?php
require_once("Clases/Inventario.php");

class InventarioControlador{
    public function guardar(String $nombre, String $descripcion): String{
        $respuesta="";
        if(trim($nombre)==""){
            $respuesta.="Complete el campo de nombre<br>";
        }  
        if(trim($descripcion)==""){
            $respuesta.="Complete el campo de descripcion<br>";
        } 

        $inventario = new Inventario();

        if($inventario->guardar($nombre, $descripcion)>0){
            $respuesta = "Producto registrado";
        } 

        return $respuesta;
       
    }

    public function mostrar(){
        $inventario = new Inventario();
        return $inventario->traerTodo();        
    }
}
