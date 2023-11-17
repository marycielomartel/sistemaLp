<form method="POST" action="<?php echo $_SERVER["PHP_SELF"];?>">
    <input type="text" name="usuario" placeholder="Ingrese nombre de usuario"/><br>
    <input type="password" name="contraseña" placeholder="Ingrese la contraseña"/><br>
    <input type="submit" value="Login"/><br>
</form>

<?php
if (!empty($_POST)) {
    $usuario = $_POST["usuario"];
    $contraseña = $_POST["contraseña"];

    require_once "Controladores/UsuarioControlador.php";
    $uc = new UsuarioControlador();
    
    $resultadoLogin = $uc->login($usuario, $contraseña);

    if ($resultadoLogin !== "ok") {
        echo $resultadoLogin;
    } else {  
        session_start(); 
        $_SESSION["usuario"]= $usuario;
        $_SESSION["id"]= $id ;
        $_SESSION["rol"]= 'alumno' ;
        header("location: bienvenido.php");
        exit();  
    }
}
?>
  
  