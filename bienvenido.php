<?php
  session_start();
  if(!isset($_SESSION["usuario"])){
   header("location: login.php");
    exit;
  }

 
?>
<h1>Hola, bienvenido <?php echo $_SESSION["usuario"]; ?></h1>
<ul>
    <?php
    if($_SESSION["rol"]=="administrador"){
    echo "<li><a href='registroInventario.php'>Registrar Inventario</a></li>";
    echo "<li><a href='mostrarInventario.php'>Mostrar Inventario</a></li>";
    echo "<li><a href='registroEquipo.php'>Registrar Equipo</a></li>";
    echo "<li><a href='mostrarEquipo.php'>Mostrar Equipo</a></li>";
    echo "<li><a href='registroLaboratorio.php'>Registrar Laboratorio</a></li>";
    echo "<li><a href='mostrarLaboratorio.php'>Mostrar Laboratorio</a></li>";
    echo "<li><a href='mostrarPrestamo.php'>Mostrar Prestamos</a></li>";
    echo "<li><a href='mostrarReserva.php'>Mostrar Reservas</a></li>";
    }?>
    <?php
    if($_SESSION["rol"]=="alumno"){ ?>
    <li><a href="mostrarEquipo.php">Mostrar Equipos</a></li>
    <li><a href="mostrarLaboratorio.php">Mostrar Laboratorios</a></li>
    <li><a href="registroPrestamo.php">Realizar prestamo de Equipos Informaticos</a></li>
    <li><a href="registroReserva.php">Realizar reserva de Espacios de Laboratorio</a></li>
    <?php } ?>
    <li><a href="logout.php">Salir</a></li>
</ul>