<?php

session_start();
if (!isset($_SESSION["usuario"])) {
    header("location: login.php");
}
if ($_SESSION["rol"] != "alumno") {
    header("location: bienvenido.php");
}
include_once("layout/Header.php");
?>
<?php
require_once "Controladores/ReservaControlador.php";
$uc = new ReservaControlador();
$laboratorios= $uc->mostrarLab();

if (!empty($_POST)) {
    $idUsuario = $_POST["idUsuario"];
    $idLaboratorio = $_POST["idLaboratorio"];
    $fechaInicio = $_POST["fechaInicio"];
    $fechaFin = $_POST["fechaFin"];
    $horarios = $_POST["horarios"];

    echo $uc->guardar($idUsuario, $idLaboratorio, $fechaInicio, $fechaFin, $horarios);
}
?>
<div class="container mt-4">
        <div class="row">
            <div class="col-md-4 offset-md-4 rounded-4">
                <div class="card">
                    <div class="card-body">
                    <h3 class="text-center">Registrar Reserva</h3>
                    <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
                        <input class="form-control" type="number" name="idUsuario" placeholder="Ingrese idUsuario" ><br>
                        <select  class="form-select"  name="idLaboratorio" id="" require>
                        <option value="">Selecciona un laboratorio</option>
                        <?php 
                        
                        foreach ($laboratorios as $laboratorio) : ?>
                                    <option value="<?php echo $laboratorio['id']; ?>"><?php echo $laboratorio['nombre']; ?></option>
                                <?php endforeach; ?>
                        </select><br>
                        <label for="">Ingrese Fecha de Inicio</label></br>
                        <input  class="form-control" type="date" name="fechaInicio" required/><br>
                        <label for="">Ingrese Fecha de Fin</label></br>
                        <input  class="form-control" type="date" name="fechaFin" required/><br>
                        <input  class="form-control" type="text" name="horarios" placeholder="Ingrese Horarios" required/><br>
                        <div class="form-group text-center  mt-3">
                         <input type="submit" class="btn btn-primary" value="Guardar"/><br>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

