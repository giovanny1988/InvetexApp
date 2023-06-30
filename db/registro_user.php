<?php
if(!empty($_POST["btnregistrar"])){
    if (empty($_POST["documento"]) or empty($_POST["nombre"]) or empty($_POST["email"]) or empty($_POST["password"]) or empty($_POST["telefono"])) {
        echo '<div class="alert alert-danger">Al menos uno de los campos estan vacíos</div>';
    }else{
        $documento =$_POST["documento"];
        $nombre =$_POST["nombre"];
        $email =$_POST["email"];
        $password =$_POST["password"];
        $telefono =$_POST["telefono"];

        $sql=$conexion->query("INSERT INTO usuario(documento_usuario,nombre_usuario,email_usuario,password_usuario,telefono_usuario) VALUES('$documento','$nombre','$email','$password','$telefono')");

        if($sql == 1){
            echo '<div class="alert alert-success">¡Usuario registrado correctamente!</div>';
        }else{
            echo '<div class="alert alert-danger">Error al registrar!</div>';
        }
    };
};
?>