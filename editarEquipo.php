<?php
include_once("Controladores/equipoControlador.php");


$id = "";
$nombre = "";
$descripcion = "";
$cantidad = "";
$estado = "";


if (isset($_GET['id'])) {
    $id = $_GET['id'];


    $equipoControlador = new EquipoControlador();
    $equipoData = $equipoControlador->obtenerId($id);


    if ($equipoData) {
        $nombre = $equipoData['nombre'];
        $descripcion = $equipoData['descripcion'];
        $cantidad = $equipoData['cantidad'];
        $estado = $equipoData['estado'];
    } else {
        echo "El equipo no existe o no se puede editar.";
        exit;
    }
}
if (isset($_POST['enviar'])) {

    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $cantidad = $_POST['cantidad'];
    $estado = $_POST['estado'];

    $equipoControlador = new EquipoControlador();
    $resultado = $equipoControlador->editar($id, $nombre, $descripcion, $cantidad, $estado);

    
}
?>

<html>
<head>
    <title>Editar</title>
</head>
<body>
    <h1>Editar Equipo</h1>

    <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <input type="hidden" name="id" value="<?php echo $id; ?>">

        <input type="text" name="nombre" value="<?php echo htmlspecialchars($nombre); ?>"><br>
        <input type="text" name="descripcion" value="<?php echo $descripcion; ?>"><br>
        <input type="text" name="cantidad" value="<?php echo $cantidad; ?>"><br>
        <input type="text" name="estado" value="<?php echo $estado; ?>"><br>
        <input type="submit" name="enviar" value="Actualizar"><br> 
        
        <a href="mostrarEquipo.php">Regresar</a>
    </form>
</body>
</html> 