<?php
if(!empty($_POST["btnguardar"])){
    if(!empty($_POST["cliente"]) and !empty($_POST["email"]) and !empty($_POST["direccion"]) and !empty($_POST["telefono"])){
        $idcliente=$_POST["id"];
        $nombre=$_POST["cliente"];
        $email=$_POST["email"];
        $dirCli=$_POST["direccion"];
        $tel=$_POST["telefono"];

        $sql=$conexion->query("UPDATE cliente SET nombre_cliente='$nombre', email_cliente='$email', telefono_cliente='$dirCli', direccion_cliente='$tel' WHERE idcliente=$idcliente");

        if($sql==1){
            header("location:../views/clientes.php");
        } else{
            echo '<div class="alert alert-danger">Error al actualizar datos</div>';
        }
    }
}
?>