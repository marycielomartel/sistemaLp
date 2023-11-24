<?php
include_once("layout/Head.php")
?>
<?php
    if(!empty($_POST)){
        $usuario2 = $_POST["usuario"]; 
        $contraseña = $_POST["contraseña"];
        $contraseña2 = $_POST["contraseña2"];        
        $apellidos = $_POST["apellidos"];    
        $nombres = $_POST["nombres"];
        $facultad = $_POST["facultad"];    
        $escuela = $_POST["escuela"];
        
        require_once "Controladores/UsuarioControlador.php";
        $uc = new UsuarioControlador();
        echo  $uc->guardar($usuario2, $contraseña, $contraseña2, $nombres, $apellidos, $facultad, $escuela);
    }
    
    ?>
<div class="container mt-4">
        <div class="row">
            <div class="col-md-4 offset-md-4 rounded-4">
                <div class="card">
                    <div class="card-body">
                        <h2 class="text-center">Registrarse</h2>
                        <form method="POST"  action="<?php echo $_SERVER["PHP_SELF"]?>">
                        
                            <input type="text" class="form-control" name="usuario" placeholder="Ingrese nombre de usuario"/><br>
                            <input type="password"class="form-control" name="contraseña" placeholder="Ingrese contraseña"/><br>
                            <input type="password" class="form-control" name="contraseña2" placeholder="Repita la contraseña"/><br>
                            <input type="text"class="form-control" name="nombres" placeholder="Ingrese nombres"/><br>
                            <input type="text" class="form-control" name="apellidos" placeholder="Ingrese apellidos"/><br>
                            <input type="text" class="form-control" name="facultad" placeholder="Ingrese el nombre de la facultad"/><br>
                            <input type="text" class="form-control" name="escuela" placeholder="Ingrese el nombre de la escuela academica"/><br>
                            <div class="form-group text-center  mt-3">
                              <input type="submit"  class="btn btn-primary" value="Guardar"/><br>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

