<?php
if(!isset($_POST['txtbuscar'])){
    $_POST['txtbuscar'] = "";
    $buscar = $_POST['txtbuscar'];
}

$buscar = $_POST['txtbuscar'];

$sql= "SELECT idEntrada_insumo, fecha_entrada,valor_entrada,cantidad_entrada, descuento_entrada,nombre_insumo FROM entrada_insumo
INNER JOIN insumo
ON fk_insumoIn = Id_insumo
where nombre_insumo like '%$buscar%'";

$query=$conexion->query($sql);
?> 
 