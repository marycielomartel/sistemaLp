
<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
    <input type="text" name="nombre" placeholder="Ingrese nombre del laboratorio"/><br>
    <input type="text" name="descripcion" placeholder="Ingrese la descripcion del laboratorio"/><br>
    <input type="text" name="estado" placeholder="Ingrese el estado del laboratorio"/><br>
    <input type="number" name="idInventario" placeholder="Ingrese el id de inventario"/><br>
    <input type="submit" value="Guardar"/><br>
</form>

<?php
    if(!empty($_POST)){
        $nombre = $_POST["nombre"]; 
        $descripcion = $_POST["descripcion"];
        $estado = $_POST["estado"];
        $idInventario = $_POST["idInventario"];
        
        require_once "Controladores/LaboratorioControlador.php";
        $uce = new LaboratorioControlador();
        echo $uce->guardar($nombre, $descripcion, $estado, $idInventario);
    }