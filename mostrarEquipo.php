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
    require_once("Controladores/EquipoControlador.php");
?>
<h1>Equipos</h1>
<table border=1>
    <tr>
        <th>Nombre</th>
        <th>Descripcion</th>
        <th>Estado</th>
    </tr>
    <?php
        $equipoControlador = new EquipoControlador();
        $equipos = $equipoControlador->mostrar();
        foreach($equipos as $equipo){
            echo "<tr>
                    <td>".$equipo["nombre"]."</td>
                    <td>".$equipo["descripcion"]."</td>
                    <td>".$equipo["estadp"]."</td>
                  </tr>";
        }
    ?>
</table>