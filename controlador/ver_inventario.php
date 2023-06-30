<?php
if(!isset($_POST['txtbuscar'])){
    $_POST['txtbuscar'] = "";
    $buscar = $_POST['txtbuscar'];
}

$buscar = $_POST['txtbuscar'];

$sql= "SELECT  referencia, nombre_insumo, SUM(cantidad_entrada) AS 'Unidades ingresadas', SUM(valor_entrada) AS 'Valor ingresado',SUM(cantidad_salida) AS 'Unidades vendidas', SUM(valor_salida) AS 'Valor vendido', if( isnull(SUM(cantidad_salida)), SUM(cantidad_entrada), SUM(cantidad_entrada) - SUM(cantidad_salida)) as 'Stock actual' from inventario
left join entrada_insumo
on fk_entrada = idEntrada_insumo
left join salida_insumo
on fk_salida = idSalida_insumo
left join insumo
on fk_insumo = Id_insumo
group by fk_insumo;";

$query=$conexion->query($sql);
while($datos=mysqli_fetch_array($query)){ ?> 
    <tr>
      <td><?= $datos['referencia'] ?></td>
      <td><?= $datos['nombre_insumo'] ?></td>
      <td><?= $datos['Unidades ingresadas'] ?></td>
      <td><?= $datos['Valor ingresado'] ?></td>
      <td><?= $datos['Unidades vendidas'] ?></td>
      <td><?= $datos['Valor vendido'] ?></td>
      <td><?= $datos['Stock actual'] ?></td>
    </tr>
  <?php }    
?> 