<?php
if(!empty($_POST["btnregistrar"])){
    if (empty($_POST["cliente"]) or empty($_POST["correoCliente"]) or empty($_POST["telCliente"]) or empty($_POST["dirCliente"])) {
        echo '<div class="alert alert-danger">Al menos uno de los campos estan vacios</div>';
    }else{
        $cliente =$_POST["cliente"];
        $email =$_POST["correoCliente"];
        $telCliente =$_POST["telCliente"];
        $dirCliente =$_POST["dirCliente"];

        $sql=$conexion->query("INSERT INTO cliente (nombre_cliente,email_cliente,telefono_cliente,direccion_cliente ) VALUES('$cliente','$email','$telCliente','$dirCliente')");

        if($sql == 1){
            echo '<div class="alert alert-success">Cliente registrado correctamente</div>';
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