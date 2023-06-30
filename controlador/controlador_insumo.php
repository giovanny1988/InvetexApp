<?php
if(!empty($_POST["btnguardar"])){
    if(!empty($_POST["referencia"]) and !empty($_POST["insumo"]) and !empty($_POST["desIns"]) and !empty($_POST["precioU"])){
        $idInsumo=$_POST["id"];
        $ref=$_POST["referencia"];
        $insumo=$_POST["insumo"];
        $desIn=$_POST["desIns"];
        $precio=$_POST["precioU"];
        $tipoIn=$_POST["tipoInsumo"];
        $prov=$_POST["selProv"];

        $sql=$conexion->query("UPDATE insumo SET referencia='$ref', nombre_insumo='$insumo', descripcion_insumo='$desIn', precio_unitario_insumo=$precio WHERE Id_insumo=$idInsumo");

        if($sql==1){
            header("location:../views/insumos.php");
        } else{
            echo '<div class="alert alert-danger">Error al actualizar datos</div>';
        }
    }
}
?>