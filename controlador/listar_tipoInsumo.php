<?php

if(!isset($_POST['txtbuscar'])){
    $_POST['txtbuscar'] = "";
    $buscar = $_POST['txtbuscar'];
}

$buscar = $_POST['txtbuscar'];

$sql= "SELECT * FROM tipo_insumo WHERE nombre_tipo_insumo LIKE '%$buscar%'";

$query=$conexion->query($sql);

?>