<?php
  session_start();
  if(!isset($_SESSION["usuario"])){
    header("location: login.php");
  }
  if($_SESSION["tipo"]=="alumno"){
  header("location: bienvenido.php");
}

?>
<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
    <input type="number" name="idUsuario" placeholder="Ingrese idUsuario"/><br>
    <input type="number" name="idLaboratorio" placeholder="Ingrese idLaboratorio"/><br>
    <label for="">Ingrese Fecha de Inicio</label></br>
    <input type="date" name="fechaInicio" /><br>
    <label for="">Ingrese Fecha de Fin</label></br>
    <input type="date" name="fechaFin" /><br>
    <input type="text" name="horarios" placeholder="Ingrese Horarios"/><br>
    <input type="submit" value="Guardar"/><br>
</form>
<?php
    if(!empty($_POST)){
        $idUsuario = $_POST["idUsuario"]; 
        $idLaboratorio = $_POST["idLaboratorio"];
        $fechaInicio = $_POST["fechaInicio"];        
        $fechaFin = $_POST["fechaFin"];    
        $horarios = $_POST["horarios"];
      
        require_once "Controladores/ReservaControlador.php";
        $uc = new ReservaControlador();
        echo $uc->guardar($idUsuario, $idLaboratorio, $fechaInicio, $fechaFin,  $horarios);
    }