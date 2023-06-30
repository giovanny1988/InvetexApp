<?php

if(!isset($_POST['txtbuscar'])){
    $_POST['txtbuscar'] = "";
    $buscar = $_POST['txtbuscar'];
}

$buscar = $_POST['txtbuscar'];

$sql= "SELECT idProveedor, nombre_proveedor, email_proveedor,direccion_proveedor,telefono_proveedor FROM proveedor WHERE nombre_proveedor LIKE '%$buscar%'";

$query=$conexion->query($sql);
               
?>  
<script>
    /*
    function mensajeEliminar(){
        let mensaje = confirm("¿Desea eliminar este registro?");
        return mensaje;
    }
    */
</script>