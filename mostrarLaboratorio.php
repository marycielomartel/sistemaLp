
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
        <th>Acciones</th>
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
                    <td>
                        <a href='editarLaboratorio.php?id=".$laboratorio["id"]."'>Editar</a>
                        <a href='eliminar_laboratorio.php?id=".$laboratorio["id"]."'>Eliminar</a>
                    </td>
                  </tr>";
        }
    ?>
</table>
<br>
        <a href="bienvenido.php">Regresar</a>
