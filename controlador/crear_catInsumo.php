<?php
if(!empty($_POST["btnregistrar"])){
    if (empty($_POST["nombreIn"]) or empty($_POST["descIn"])) {
        echo '<div class="alert alert-danger">Al menos uno de los campos estan vacios</div>';
    }else{
        $categoria =$_POST["nombreIn"];
        $descripcionCat =$_POST["descIn"];

        $sql=$conexion->query("INSERT INTO tipo_insumo (nombre_tipo_insumo,descripcion_tipo_insumo) VALUES('$categoria','$descripcionCat')");

        if($sql == 1){
            echo '<div class="alert alert-success">Categoria registrada correctamente!</div>';
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