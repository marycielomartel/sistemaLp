<?php
  session_start();
  if(!isset($_SESSION["usuario"])){
   header("location: login.php");
    exit;
  }
  include_once("layout/Header.php");
 
?>
<h1 class="text-center">Hola, bienvenido <?php echo $_SESSION["usuario"]; ?></h1>
