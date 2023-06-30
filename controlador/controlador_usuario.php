<?php
if(!empty($_POST["btnguardar"])){
    if(!empty($_POST["user"]) and !empty($_POST["email"]) and !empty($_POST["password"]) and !empty($_POST["tel"])){
        $idUser=$_POST["id"];
        $nombre=$_POST["user"];
        $email=$_POST["email"];
        $pass=$_POST["password"];
        $tel=$_POST["tel"];

        $sql=$conexion->query("UPDATE usuario SET nombre_usuario='$nombre', email_usuario='$email', password_usuario='$pass', telefono_usuario='$tel' WHERE idUsuario=$idUser");

        if($sql==1){
            header("location:../views/usuarios.php");
        } else{
            echo '<div class="alert alert-danger">Error al actualizar datos</div>';
        }
    }
}
?>