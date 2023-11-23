<?php
  session_start();
  if(!isset($_SESSION["usuario"])){
    header("location: login.php");
    exit;
  }
  if($_SESSION["tipo"]!="administrador"){
  header("location: bienvenido.php");
  exit;
}

?>
<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
    <input type="text" name="nombre" placeholder="Ingrese nombre del equipo"/><br>
    <input type="text" name="descripcion" placeholder="Ingrese la descripcion del equipo"/><br>
    <input type="text" name="estado" placeholder="Ingrese el estado del equipo"/><br>
    <input type="submit" value="Guardar"/><br>
</form>
<?php
    if(!empty($_POST)){
        $nombre = $_POST["nombre"]; 
        $descripcion = $_POST["descripcion"];
        $estado = $_POST["estado"];
        
        require_once "Controladores/EquipoControlador.php";
        $uce = new EquipoControlador();
        echo $uce->guardar($nombre, $descripcion, $estado);
    }