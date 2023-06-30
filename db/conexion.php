<?php

$conexion = new mysqli("localhost","root","","invetex","3306");

if(!$conexion){
    die('Error de conexión!: '. mysqli_connect_error());
}

?>