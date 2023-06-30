<?php
if(!empty($_POST["btnregistrar"])){
    if (empty($_POST["nomProveedor"]) or empty($_POST["emailProv"]) or empty($_POST["telProv"]) or empty($_POST["dirProv"])) {
        echo '<div class="alert alert-danger">Al menos uno de los campos estan vacios</div>';
    }else{
        $proveedor =$_POST["nomProveedor"];
        $emailProv =$_POST["emailProv"];
        $dirProv =$_POST["dirProv"];
        $telProv =$_POST["telProv"];

        $sql=$conexion->query("INSERT INTO proveedor (nombre_proveedor,email_proveedor,direccion_proveedor,telefono_proveedor) VALUES('$proveedor','$emailProv','$telProv','$dirProv')");

        if($sql == 1){
            echo '<div class="alert alert-success">Proveedor registrado correctamente</div>';
        }else{
            echo '<div class="alert alert-danger">Error al registrar!</div>';
        }
    };
};
?>
<script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>