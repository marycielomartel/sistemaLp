<?php
    require_once("Controladores/EquipoControlador.php");
    session_start();
    include_once("layout/Header.php");

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $equipoControlador = new EquipoControlador();
        $equipoControlador->eliminar($id);
      }
      include_once("layout/Header.php");
?>
<h1>Equipos</h1>
<table border=1>
    <tr>
        <th>Nombre</th>
        <th>Descripcion</th>
        <th>Estado</th>
        <th>Acciones</th>
    </tr>
    <?php
        $equipoControlador = new EquipoControlador();
        $equipos = $equipoControlador->mostrar();
        foreach($equipos as $equipo){
            echo "<tr>
                    <td>".$equipo["nombre"]."</td>
                    <td>".$equipo["descripcion"]."</td>
                    <td>".$equipo["estado"]."</td>
                    <td>
                    <a href='mostrarEquipo.php?id=".$equipo['id']."'>Eliminar</a>
                    </td>
                  </tr>";
        }
    ?>
</table>