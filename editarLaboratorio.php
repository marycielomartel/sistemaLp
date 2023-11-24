<?php
include_once("Controladores/laboratorioControlador.php");


$id = "";
$nombre = "";
$descripcion = "";
$estado = "";


if (isset($_GET['id'])) {
    $id = $_GET['id'];


    $laboratorioControlador = new LaboratorioControlador();
    $laboratorioData = $laboratorioControlador->obtenerId($id);


    if ($laboratorioData) {
        $nombre = $laboratorioData['nombre'];
        $descripcion = $laboratorioData['descripcion'];
        $estado = $laboratorioData['estado'];
    } else {
        echo "La escuela no existe o no se puede editar.";
        exit;
    }
}
if (isset($_POST['enviar'])) {

    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $estado = $_POST['estado'];

    $laboratorioControlador = new LaboratorioControlador();
    $resultado = $laboratorioControlador->editar($id, $nombre, $descripcion, $estado);

    
}
?>

<html>
<head>
    <title>Editar</title>
</head>
<body>
    <h1>Editar Laboratorio</h1>

    <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <input type="hidden" name="id" value="<?php echo $id; ?>">

        <input type="text" name="nombre" value="<?php echo htmlspecialchars($nombre); ?>"><br>
        <input type="text" name="descripcion" value="<?php echo $descripcion; ?>"><br>
        <input type="text" name="estado" value="<?php echo $estado; ?>"><br>
        <input type="submit" name="enviar" value="Actualizar"><br> 
        
        <a href="mostrarLaboratorio.php">Regresar</a>
    </form>
</body>
</html>