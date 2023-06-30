<?php
    if(!empty($_GET["idUsuario"])){
        $id=$_GET["idUsuario"];
        $sql=$conexion->query("DELETE FROM usuario WHERE idUsuario=$id");
    }
?>