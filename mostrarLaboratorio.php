
<?php
    require_once("Controladores/LaboratorioControlador.php");
    session_start();
    if(isset($_GET['id'])){
        $id=$_GET['id'];
        $laboratorioControlador= new LaboratorioControlador();
        $laboratorios = $laboratorioControlador->eliminar($id);

    }
include_once("layout/Header.php");

?>

<h1>Laboratorio</h1>
<table  border=1>
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
                    <a  role='button'class='btn btn-outline-success'  href='editarLaboratorio.php?id=".$laboratorio['id']."'>Editar</a>
                    <a role='button'class='btn btn-outline-danger' href='mostrarLaboratorio.php?id=".$laboratorio['id']."'>Eliminar</a>
                    </td>
                  </tr>";
        }
    ?>
</table>