<?php
  require_once("Controladores/InventarioControlador.php");
  session_start();
  if(!isset($_SESSION["usuario"])){
    header("location: login.php");
  }
  if($_SESSION["rol"]!="administrador"){
  header("location: bienvenido.php");
}

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $inventarioControlador = new InventarioControlador();
  $inventarioControlador->eliminar($id);
}
include_once("layout/Header.php");

?>

<h1>Inventario</h1>
<table border=1>
    <tr>
        <th>Nombre</th>
        <th>Descripcion</th>
        <th>Acciones</th>
    </tr>
    <?php
        $inventarioControlador = new InventarioControlador();
        $inventarios = $inventarioControlador->mostrar();
        foreach($inventarios as $inventario){
            echo "<tr>
                    <td>".$inventario["nombre"]."</td>
                    <td>".$inventario["descripcion"]."</td>
                    <td>
                    <a href='mostrarInventario.php?id=".$inventario['id']."'>Eliminar</a>
                    </td>
                  </tr>";
        }
    ?>
</table>