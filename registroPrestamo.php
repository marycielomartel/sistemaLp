<?php
  session_start();
  if(!isset($_SESSION["usuario"])){
    header("location: login.php");
    exit; 
  }
  if($_SESSION["rol"]!="alumno"){
  header("location: bienvenido.php");
  exit;

}
include_once("layout/Header.php");

?>
<?php
 require_once "Controladores/PrestamoControlador.php";
 $pre = new PrestamoControlador();
 $equipos= $pre->mostrarEquipo();
    if(!empty($_POST)){
        $idUsuario = $_POST["idUsuario"]; 
        $idEquipo = $_POST["idEquipo"];
        $estado = $_POST["estado"];
        $fechaInicio = $_POST["fechaInicio"];
        $fechaDevolucion = $_POST["fechaDevolucion"];
        $observaciones = $_POST["observaciones"];
        
        echo $pre->guardar($estado, $idEquipo, $idUsuario, $fechaInicio, $fechaDevolucion, $observaciones);
    }
  ?>
<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
    <input type="number" name="idUsuario" placeholder="Ingrese el id de usuario"/><br>
    <select name="idEquipo" id="" require>
    <option value="">Selecciona un Equipo</option>
    <?php 
    foreach ($equipos as $equipo) : ?>
                <option value="<?php echo $equipo['id']; ?>"><?php echo $equipo['nombre']; ?></option>
            <?php endforeach; ?>
    </select><br>
    <input type="text" name="estado" placeholder="Seleccione el estado del prestamo"/><br>
    <input type="date" name="fechaInicio" placeholder="Seleccione la fecha de inicio"/><br>
    <input type="date" name="fechaDevolucion" placeholder="Seleccione la fecha de dovolucion"/><br>
    <input type="text" name="observaciones" placeholder="Ingrese las observaciones"/><br>
    <input type="submit" value="Guardar Prestamo"/><br>
</form>
