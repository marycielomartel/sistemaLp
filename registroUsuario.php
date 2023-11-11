<?php
  session_start();
  // Comprobación específica para la página de registro, para no redirigir al inicio de sesión
  $current_page = basename($_SERVER["PHP_SELF"]);
  if(!isset($_SESSION["usuario"]) && $current_page !== 'registroUsuario.php'){
    header("location: login.php");
  }
  echo $_SESSION["usuario"];


?>
<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
    <input type="text" name="usuario" placeholder="Ingrese nombre de usuario"/><br>
    <input type="password" name="contraseña" placeholder="Ingrese contraseña"/><br>
    <input type="password" name="contraseña2" placeholder="Repita la contraseña"/><br>
    <input type="text" name="nombres" placeholder="Ingrese nombres"/><br>
    <input type="text" name="apellidos" placeholder="Ingrese apellidos"/><br>
    <input type="text" name="facultad" placeholder="Ingrese el nombre de la facultad"/><br>
    <input type="text" name="escuela" placeholder="Ingrese el nombre de la escuela academica"/><br>
    <input type="submit" value="Guardar"/><br>
</form>
<?php
    if(!empty($_POST)){
        $usuario = $_POST["usuario"]; 
        $contraseña = $_POST["contraseña"];
        $contraseña2 = $_POST["contraseña2"];        
        $apellidos = $_POST["apellidos"];    
        $nombres = $_POST["nombres"];
        $facultad = $_POST["facultad"];    
        $escuela = $_POST["escuela"];
        
        require_once "Controladores/UsuarioControlador.php";
        $uc = new UsuarioControlador();
        echo $uc->guardar($usuario, $contraseña, $contraseña2, $nombres, $apellidos, $facultad, $escuela);
    }