<?php
  session_start();
  if(!isset($_SESSION["usuario"])){
    header("location: login.php");
  }
  if($_SESSION["tipo"]=="administrador"){
  header("location: bienvenido.php");
}

?>
<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
    <input type="text" name="nombre" placeholder="Ingrese nombre del equipo"/><br>
    <input type="text" name="descripcion" placeholder="Ingrese la descripcion del equipo"/><br>
    <input type="submit" value="Guardar"/><br>
</form>
<?php
    if(!empty($_POST)){
        $nombre = $_POST["nombre"]; 
        $descripcion = $_POST["descripcion"];
        
        require_once "Controladores/InventarioControlador.php";
        $uce = new InventarioControlador();
        echo $uce->guardar($nombre, $descripcion);
    }