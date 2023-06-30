<?php
date_default_timezone_set('America/Bogota');
$fecha_actual = date('Y-m-d');

if(!empty($_POST["btnregistrar"])){
    
    if (empty($_POST["fechaSalida"]) or empty($_POST["valSalida"]) or empty($_POST["cantSalida"])) {
        echo '<div class="alert alert-danger">Al menos uno de los campos estan vacios</div>';
    }
    if($_POST['fechaSalida'] < $fecha_actual){
        echo '<div class="alert alert-danger">¡Fecha invalida!</div>';
    }
    else{
        $fechaSal =$_POST["fechaSalida"];
        $dateSQL = date("Y-m-d H:i:s", strtotime($fechaSal));
        $cantidadSal =$_POST["cantSalida"];
        $valorSal =$_POST["valSalida"];
        $descSal =$_POST["descSal"];
        $cliente = $_POST['cliente'];
        $insumo = $_POST['selIns'];
        
        $sqlStock =$conexion->query("SELECT sum(cantidad_entrada),(SUM(cantidad_entrada) - SUM(cantidad_salida)) AS 'Stock actual' from inventario
        left join entrada_insumo
        on fk_entrada = idEntrada_insumo
        left join salida_insumo
        on fk_salida = idSalida_insumo
        left join insumo
        on fk_insumo = Id_insumo
        where Id_insumo = $insumo;");
        
        $resulStock= mysqli_fetch_array($sqlStock)[0];
        
        if($cantidadSal > $resulStock){
            echo '<div class="alert alert-danger">No hay suficiente stock para cubrir el pedido!</div>';
        }
        else{

            $sql=$conexion->query("INSERT INTO salida_insumo (fecha_salida,cantidad_salida,valor_salida,descuento,fk_cliente,fk_insumoSal)
                                     VALUES('$dateSQL',$cantidadSal,$valorSal,$descSal,$cliente,$insumo)");
    
            $sqlId =$conexion->query('SELECT max(idSalida_insumo) FROM salida_insumo;');
            $nuevoId=mysqli_fetch_array($sqlId)[0];
    
            $sqlInv=$conexion->query("INSERT INTO inventario (fk_salida, fk_insumo)
            VALUES($nuevoId,$insumo)");
            if($sql == 1){
                echo '<div class="alert alert-success">Salida registrada correctamente</div>';
            }else{
                echo '<div class="alert alert-danger">Error al registrar!</div>';
            }
        };
    }
        
};
?>
<script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>