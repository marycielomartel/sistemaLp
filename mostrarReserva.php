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
    require_once("Controladores/ReservaControlador.php");
?>
<h1>Reservas</h1>
<table border=1>
    <tr>
        <th>Id Usuario</th>
        <th>Id Laboratorio</th>
        <th>Fecha de Inicio</th>
        <th>Fecha de Fin</th>
        <th>Horarios</th>
    </tr>
    <?php
        $reservaControlador = new ReservaControlador();
        $reservas = $reservaControlador->mostrar();
        foreach($reservas as $reserva){
            echo "<tr>
                    <td>".$reserva["idUsuario"]."</td>
                    <td>".$reserva["idLaboratorio"]."</td>
                    <td>".$reserva["fechaInicio"]."</td>
                    <td>".$reserva["fechaFin"]."</td>
                    <td>".$reserva["horarios"]."</td>
                  </tr>";
        }
    ?>
</table>