<?php

include 'Conn.php';
$id=$_GET['id'];
$sql="select * from laboratorio where Id='".$id."'";
$resultado=mysql_query($sql);
while($fila=mysql_feach_assoc($resultado)){

?>

<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
    <input type="hiden" name="txtid" value="<?php echo $fila¨['Id'] ?> "> 
    <label for="Ingrese nombre del laboratorio"></label>
    <input type="text" name="nombre" placeholder="Ingrese nombre del laboratorio"/><br>
    <input type="text" name="descripcion" placeholder="Ingrese la descripcion del laboratorio"/><br>
    <input type="text" name="estado" placeholder="Ingrese el estado del laboratorio"/><br>
    <input type="number" name="idInventario" placeholder="Ingrese el id de inventario"/><br><br>
    <input type="submit" value="Guardar"/><br><br>
    <a href="bienvenido.php">Regresar</a>
</form>
<?php } ?>
