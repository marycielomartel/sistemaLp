<?php
    require_once("Controladores/EquipoControlador.php");
    session_start();
    include_once("layout/Header.php");
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
                    <td>".$equipo["estado"]."</td>
                  </tr>";
        }
    ?>
</table>