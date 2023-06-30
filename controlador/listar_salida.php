<?php
if(!isset($_POST['txtbuscar'])){
    $_POST['txtbuscar'] = "";
    $buscar = $_POST['txtbuscar'];
}

$buscar = $_POST['txtbuscar'];

$sql= " SELECT idSalida_insumo, fecha_salida,cantidad_salida,valor_salida,descuento,nombre_cliente,nombre_insumo FROM salida_insumo
INNER JOIN cliente
ON fk_cliente = idcliente
inner join insumo
on fk_insumoSal = Id_insumo;";

$query=$conexion->query($sql);
?> 