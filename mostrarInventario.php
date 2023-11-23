
<?php
    require_once("Controladores/InventarioControlador.php");
?>
<h1>Inventario</h1>
<table border=1>
    <tr>
        <th>Nombre</th>
        <th>Descripcion</th>
    </tr>
    <?php
        $inventarioControlador = new InventarioControlador();
        $inventarios = $inventarioControlador->mostrar();
        foreach($inventarios as $inventario){
            echo "<tr>
                    <td>".$inventario["nombre"]."</td>
                    <td>".$inventario["descripcion"]."</td>
                  </tr>";
        }
    ?>
</table>