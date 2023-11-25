<?php
require_once "Clases/Usuario.php";

class UsuarioControlador{
    public function guardar(String $usuario2, String $contraseña, String $contraseña2, String $nombres, String $apellidos, String $facultad, String $escuela): String {
        $respuesta = "";
    
        if (trim($usuario2) == "") {
            $respuesta .= "Complete el campo Usuario<br>";
        }
        if (trim($contraseña) == "") {
            $respuesta .= "Complete el campo Contraseña<br>";
        }
        if (trim($contraseña2) == "") {
            $respuesta .= "Complete el campo Contraseña2<br>";
        }
        if (trim($nombres) == "") {
            $respuesta .= "Complete el campo Nombres<br>";
        }
        if (trim($apellidos) == "") {
            $respuesta .= "Complete el campo Apellidos<br>";
        }
        if (trim($facultad) == "") {
            $respuesta .= "Complete el campo Facultad<br>";
        }
        if (trim($escuela) == "") {
            $respuesta .= "Complete el campo de Escuela Academica<br>";
        }

        if (strlen($contraseña) > 0 && strlen($contraseña) < 8) {
            $respuesta .= "La contraseña debe tener al menos 8 caracteres<br>";
        }
        if (strlen($contraseña2) > 0 && strlen($contraseña2) < 8) {
            $respuesta .= "La contraseña2 debe tener al menos 8 caracteres<br>";
        }
    
        if ($contraseña !== $contraseña2) {
            $respuesta .= "La contraseña2 no coincide<br>";
        }

        $patronContraseña = '/^[A-Za-z]+$/';
        if (!preg_match($patronContraseña, $contraseña)) {
            $respuesta .= "La contraseña no cumple con el patrón permitido (solo letras)<br>";
        }
        //
        if (empty($respuesta)) {
            $usuario = new Usuario();
    
            if ($usuario->guardar($usuario2, $contraseña, $nombres, $apellidos, $facultad, $escuela) > 0) {
                $respuesta = "Usuario registrado";
                header("location: login.php");
            } else {
                $respuesta = "Error al intentar registrar el usuario";
            }
        }
    
        return $respuesta;
    }

    public function login(String $usuario2, $contraseña){
        $usuario = new Usuario();
        $resultado = $usuario->traerUsuario($usuario2);

        foreach($resultado as $user){
            $username = $user["username"];
            $password = $user["contraseña"];
            $id = $user["id"];
            $rol = $user["rol"];
        }
        if(isset($username)){
            if(password_verify($contraseña, $password)){
                $respuesta = "ok";
            }else{
                $respuesta = "Usuario y/o contraseña no coincide";
            }
        }else{
            $respuesta = "Usuario y/o contraseña no coincide";

        }
        return $respuesta;
    }
    
}
?>