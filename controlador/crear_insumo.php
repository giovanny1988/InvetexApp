<?php
if(!empty($_POST["btnregistrar"])){
    if (empty($_POST["ref"]) or empty($_POST["nomInsumo"]) or empty($_POST["precioUn"])) {
        echo '<div class="alert alert-danger">Al menos uno de los campos estan vacios</div>';
    }else{
        $referencia =$_POST["ref"];
        $insumo =$_POST["nomInsumo"];
        $descrInsumo =$_POST["descInsumo"];
        $precioIns =$_POST["precioUn"];
        $fkTipoIn = $_POST["tipoInsumo"];
        $fkprov = $_POST['selProv'];

        $sql=$conexion->query("INSERT INTO insumo (referencia, nombre_insumo, descripcion_insumo, precio_unitario_insumo,fk_tipoInsumo,fk_proveedor)
                                 VALUES('$referencia','$insumo','$descrInsumo', $precioIns,$fkTipoIn,$fkprov)");

        if($sql == 1){
            echo '<div class="alert alert-success">Insumo registrado correctamente</div>';
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