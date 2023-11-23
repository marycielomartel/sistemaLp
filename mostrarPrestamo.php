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
    require_once("Controladores/PrestamoControlador.php");
?>
<h1>Prestamo</h1>
<table border=1>
    <tr>
        <th>Usuario</th>
        <th>Equipo</th>
        <th>Estado</th>
        <th>Fecha Inicio</th>
        <th>Fecha Devolucion</th>
        <th>Observaciones</th>
    </tr>
    <?php
        $prestamoControlador = new PrestamoControlador();
        $prestamos = $prestamoControlador->mostrar();
        foreach($prestamos as $prestamo){
            echo "<tr>
                    <td>".$prestamo["idUsuario"]."</td>
                    <td>".$prestamo["idEquipo"]."</td>
                    <td>".$prestamo["estado"]."</td>
                    <td>".$prestamo["fechaInicio"]."</td>
                    <td>".$prestamo["fechaDevolucion"]."</td>
                    <td>".$prestamo["observaciones"]."</td>
                  </tr>";
        }
    ?>
</table>