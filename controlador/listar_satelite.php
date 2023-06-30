<?php
if(!isset($_POST['txtbuscar'])){
    $_POST['txtbuscar'] = "";
    $buscar = $_POST['txtbuscar'];
}

$buscar = $_POST['txtbuscar'];

$sql= "SELECT * FROM satelite WHERE nombre_satelite LIKE '%$buscar%'";

$query=$conexion->query($sql);

?>