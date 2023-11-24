<?php
include_once("layout/Head.php")
?>
<div class="container mt-4">
        <div class="row">
            <div class="col-md-4 offset-md-4 rounded-4">
                <div class="card">
                    <div class="card-body">
                        <h2 class="text-center">Login</h2>
                        <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
                            <div class="form-group">
                                <input type="text" class="form-control" name="usuario" placeholder="Ingrese nombre de usuario" required>
                            </div>
                            <div class="form-group  mt-3">
                                <input type="password" class="form-control" name="contraseña" placeholder="Ingrese la contraseña" required>
                            </div>
                            <div class="form-group text-center  mt-3">
                                <input type="submit" class="btn btn-primary" value="Ingresar">
                            </div>
                            <p>¿No tienes cuenta? <a href="registroUsuario.php">Registrarse</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
if (!empty($_POST)) {
    $usuario = $_POST["usuario"];
    $contraseña = $_POST["contraseña"];

    require_once "Controladores/UsuarioControlador.php";
    $uc = new UsuarioControlador();
    
    $resultadoLogin = $uc->login($usuario, $contraseña);

    if ($resultadoLogin !== "ok") {
    ?>
        <div class="alert alert-success" role="alert"><?php echo $resultadoLogin?></div>
     
    <?php
    } else {  
        session_start(); 
        $_SESSION["usuario"]= $usuario;
        $_SESSION["idUsuario"] = $id;
        $_SESSION["rol"] = 'administrador';
        header("location: bienvenido.php");
        exit();  
    }
}
?>
  
  