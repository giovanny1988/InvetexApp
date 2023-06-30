<?php
if(!isset($_POST['txtbuscar'])){
    $_POST['txtbuscar'] = "";
    $buscar = $_POST['txtbuscar'];
}

$buscar = $_POST['txtbuscar'];

$sql= "SELECT * FROM cliente WHERE nombre_cliente LIKE '%$buscar%'";

$query=$conexion->query($sql);

?>