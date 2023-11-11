<?php
  session_start();
  if(!isset($_SESSION["usuario"])){
    header("location: login.php");
  }
  if($_SESSION["tipo"]=="alumno"){
  header("location: bienvenido.php");
}

?>
<?php
  session_start();
  if(!isset($_SESSION["usuario"])){
    header("location: login.php");
  }
  if($_SESSION["tipo"]=="administrador"){
  header("location: bienvenido.php");
}

?>
<?php
    require_once("Controladores/LaboratorioControlador.php");
?>
<h1>Laboratorio</h1>
<table border=1>
    <tr>
        <th>Nombre</th>
        <th>Descripcion</th>
        <th>Estado</th>
        <th>Id Inventario</th>
    </tr>
    <?php
        $laboratorioControlador = new LaboratorioControlador();
        $laboratorios = $laboratorioControlador->mostrar();
        foreach($laboratorios as $laboratorio){
            echo "<tr>
                    <td>".$laboratorio["nombre"]."</td>
                    <td>".$laboratorio["descripcion"]."</td>
                    <td>".$laboratorio["estado"]."</td>
                    <td>".$laboratorio["idInventario"]."</td>
                  </tr>";
        }
    ?>
</table>