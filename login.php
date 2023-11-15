<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
    <input type="text" name="usuario" placeholder="Ingrese nombre de usuario"/><br>
    <input type="password" name="contraseña" placeholder="Ingrese la contraseña"/><br>
    <input type="submit" value="Login"/><br>
</form>

<?php
    if(!empty($_POST)){
        $usuario = $_POST["usuario"]; 
        $contraseña = $_POST["contraseña"];

        session_start();
        $_SESSION["usuario"]= $usuario;
        $_SESSION["id"]= 125 ;
        $_SESSION["tipo"]= "alumno" ;
        header("location: bienvenido.php");
        exit;
    }