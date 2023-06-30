<?php
//Insertar datos de usuario
if(!empty($_POST["btnguardar"])){
    if (empty($_POST["doc"]) or empty($_POST["user"]) or empty($_POST["email"]) or empty($_POST["password"]) or empty($_POST["tel"])) {
        echo '<div class="alert alert-danger">Al menos uno de los campos estan vacios</div>';
    }else{
        $documento =$_POST["doc"];
        $nombre =$_POST["user"];
        $email =$_POST["email"];
        $password =$_POST["password"];
        $telefono =$_POST["tel"];

        $sql=$conexion->query("INSERT INTO usuario (documento_usuario,nombre_usuario,email_usuario,password_usuario,telefono_usuario) VALUES('$documento','$nombre','$email','$password','$telefono')");

        if($sql == 1){
            echo '<div class="alert alert-success">Usuario registrado correctamente</div>';
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