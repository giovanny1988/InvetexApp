<?php
date_default_timezone_set('America/Bogota');
$fecha_actual = date('Y-m-d');

if(!empty($_POST["btnregistrar"])){

    if (empty($_POST["fechaEntrada"]) or empty($_POST["valorEnt"]) or empty($_POST["valorEnt"]) or empty($_POST["cantIn"])) {
        echo '<div class="alert alert-danger">Al menos uno de los campos estan vacios</div>';
    }if($_POST['fechaEntrada'] < $fecha_actual){
        echo '<div class="alert alert-danger">¡Fecha invalida!</div>';
    }
    else{
        $fechaIn =$_POST["fechaEntrada"];
        $dateSQL = date("Y-m-d H:i:s", strtotime($fechaIn));
        $valorEnt =$_POST["valorEnt"];
        $cantidadIn =$_POST["cantIn"];
        $descIn =$_POST["descuentoIn"];
        $insumo = $_POST['selIns'];

        $sql=$conexion->query("INSERT INTO entrada_insumo (fecha_entrada, valor_entrada, cantidad_entrada, descuento_entrada,fk_insumoIn)
                                 VALUES('$dateSQL',$valorEnt,$cantidadIn, $descIn,$insumo)");

        $sqlId =$conexion->query("SELECT max(idEntrada_insumo) FROM entrada_insumo;");
        $nuevoId = mysqli_fetch_array($sqlId)[0];

        $sqlInv=$conexion->query("INSERT INTO inventario (fk_entrada,fk_insumo) VALUES ($nuevoId,$insumo)");

        if($sqlInv == 1){
            echo '<div class="alert alert-success">Entrada registrada correctamente</div>';
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