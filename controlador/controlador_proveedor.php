<?php
if(!empty($_POST["btnguardar"])){
    if(!empty($_POST["proveedor"]) and !empty($_POST["email"]) and !empty($_POST["direccion"]) and !empty($_POST["telefono"])){
        $idproveedor=$_POST["id"];
        $nombreProv=$_POST["proveedor"];
        $emailProv=$_POST["email"];
        $dirProv=$_POST["direccion"];
        $telProv=$_POST["telefono"];

        $sql=$conexion->query("UPDATE proveedor SET nombre_proveedor='$nombreProv', email_proveedor='$emailProv', telefono_proveedor='$dirProv', direccion_proveedor='$telProv' WHERE idProveedor=$idproveedor");

        if($sql==1){
            header("location:../views/proveedor.php");
        } else{
            echo '<div class="alert alert-danger">Error al actualizar datos</div>';
        }
    }
}
?>