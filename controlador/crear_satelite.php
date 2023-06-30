<?php
if(!empty($_POST["btnregistrar"])){
    if (empty($_POST["satelite"]) or empty($_POST["correoSat"]) or empty($_POST["dirSat"]) or empty($_POST["telSat"])) {
        echo '<div class="alert alert-danger">Al menos uno de los campos estan vacios</div>';
    }else{
        $satelite =$_POST["satelite"];
        $email =$_POST["correoSat"];
        $dirSat =$_POST["dirSat"];
        $telSat =$_POST["telSat"];

        $sql=$conexion->query("INSERT INTO satelite (nombre_satelite,correo_satelite,direccion_satelite,telefono_satelite ) VALUES('$satelite','$email','$dirSat','$telSat')");

        if($sql == 1){
            echo '<div class="alert alert-success">Satélite registrado correctamente</div>';
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