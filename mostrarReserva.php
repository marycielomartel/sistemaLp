<?php
require_once("Controladores/reservaControlador.php");


  session_start();
  if(!isset($_SESSION["usuario"])){
    header("location: login.php");
  }
  if($_SESSION["rol"]!="administrador"){
  header("location: index.php");
  
}
 
if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $reservaControlador = new ReservaControlador();
  $reservaControlador->eliminar($id);
}

?>

<h1>Reservas</h1>
<table border=1>
    <tr>
        <th>Id Usuario</th>
        <th>Id Laboratorio</th>
        <th>Fecha de Inicio</th>
        <th>Fecha de Fin</th>
        <th>Horarios</th>
        <th>Acciones</th>
    </tr>
    <?php
        $reservaControlador = new ReservaControlador();
        $reservas = $reservaControlador->mostrar();
        foreach($reservas as $reserva){

            echo "<tr>
                    <td>".$reserva["nombreUsuario"]."</td>
                    <td>".$reserva["nombreLaboratorio"]."</td>
                    <td>".$reserva["fechaInicio"]."</td>
                    <td>".$reserva["fechaFin"]."</td>
                    <td>".$reserva["horarios"]."</td>
                    <td>
                    <a href='mostrarReserva.php?id=".$reserva['id']."'>Eliminar</a>
                    </td>
                  </tr>";
        }
    ?>
</table>