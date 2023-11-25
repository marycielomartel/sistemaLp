<?php
require_once "Conn.php";

class Usuario{
    public $usuario;
    public $contraseña;
    public $nombres;
    public $apellidos;
    public $facultad;
    public $escuela;


    public function guardar(String $usuario, String $contraseña, String $nombres, String $apellidos, String $facultad, String $escuela){
        $contraseña = password_hash($contraseña, PASSWORD_BCRYPT);
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql2 = "INSERT INTO usuario(username, contraseña, nombres, apellidos, facultad, escuela) VALUES ('$usuario', '$contraseña', '$nombres', '$apellidos','$facultad','$escuela')";
        $resultado = $conexion->exec($sql2);
        $conn->cerrar();
    
        return $resultado;
    }

    public function traerUsuario(String $usuario2){
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql2 = "SELECT * FROM Usuario WHERE username = '$usuario2'"; 
        $resultado = $conexion->query($sql2);
        $conn->cerrar();
    
        return $resultado;
    }
    
   
}