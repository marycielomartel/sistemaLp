<?php
  session_start();
  if(!isset($_SESSION["usuario"])){
    header("location: login.php");
  }
  if($_SESSION["rol"]!="administrador"){
  header("location: index.php");
}

?>
<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
    <input type="text" name="nombre" placeholder="Ingrese nombre del laboratorio"/><br>
    <input type="text" name="descripcion" placeholder="Ingrese la descripcion del laboratorio"/><br>
    <input type="text" name="estado" placeholder="Ingrese el estado del laboratorio"/><br>
    <input type="text" name="inventario" placeholder="Ingrese el inventario de esta laboratorio"/><br>
    <input type="submit" value="Guardar"/><br>
</form>

<?php
    if(!empty($_POST)){
        $nombre = $_POST["nombre"]; 
        $descripcion = $_POST["descripcion"];
        $estado = $_POST["estado"];
        $inventario = $_POST["inventario"];
        
        require_once "Controladores/LaboratorioControlador.php";
        $uce = new LaboratorioControlador();
        echo $uce->guardar($nombre, $descripcion, $estado, $inventario);
    }