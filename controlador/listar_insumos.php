<?php
if(!isset($_POST['txtbuscar'])){
    $_POST['txtbuscar'] = "";
    $buscar = $_POST['txtbuscar'];
}

$buscar = $_POST['txtbuscar'];

$sql2= "SELECT * FROM insumo";

$sql= " SELECT Id_insumo, referencia, nombre_insumo,descripcion_insumo,precio_unitario_insumo, nombre_tipo_insumo, nombre_proveedor FROM insumo
INNER JOIN tipo_insumo
ON fk_tipoInsumo = idTipo_insumo
INNER JOIN proveedor
ON fk_proveedor = idProveedor
WHERE nombre_insumo LIKE '%$buscar%' OR referencia LIKE '%$buscar%'
ORDER BY Id_insumo;";
$query2=$conexion->query($sql2);

$query=$conexion->query($sql);
?> 
 












