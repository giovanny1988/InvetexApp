<?php
session_start();
if(!empty($_POST["btnlogin"])){
    if (empty($_POST["email"]) or empty($_POST["password"])) {
        echo '<div class="alert alert-danger">!Los campos no pueden estar vacíos!</div>';
    }else{
        $email=$_POST["email"];
        $password=$_POST["password"];
        $sql=$conexion->query("SELECT * FROM usuario WHERE email_usuario='$email' AND password_usuario='$password'");
        if ($datos=$sql->fetch_object()){
            $_SESSION['id'] =$datos->idUsuario;
            $_SESSION['emailUser']=$datos->email_usuario;
            header("location:views/menu.php");
        }
        else {
                echo '<div class="alert alert-danger">Usuario no existe en el sistema!</div>';
        };
    };
};
?>