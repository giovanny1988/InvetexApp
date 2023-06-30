<?php

if(!isset($_POST['txtbuscar'])){
    $_POST['txtbuscar'] = "";
    $buscar = $_POST['txtbuscar'];
}

$buscar = $_POST['txtbuscar'];

$sql= "SELECT * FROM usuario WHERE documento_usuario LIKE '%$buscar%' OR 
       nombre_usuario LIKE '%$buscar%'";

$query=$conexion->query($sql);

while($datos=mysqli_fetch_array($query)){ ?> 
    <tr>
      <td><?= $datos['idUsuario'] ?></td>
      <td><?= $datos['documento_usuario'] ?></td>
      <td><?= $datos['nombre_usuario'] ?></td>
      <td><?= $datos['email_usuario'] ?></td>
      <td><?= $datos['telefono_usuario'] ?></td>
      <td>
        <div class="btn-group btn-group-sm" role="group">
          <a href="../controlador/actualizar_usuario.php?idUsuario=<?=$datos['idUsuario'] ?>"><button type="button" style="background-color:#e69b00;border:none; padding:5px;"><i class="bi bi-pencil-square" style="color: #000000;"></i></button></a>
          <a href="../views/usuarios.php?idUsuario=<?=$datos['idUsuario'] ?>"><button onclick="return mensajeEliminar()" type="button" style="background-color:red; border:none; margin-left:5px; padding:5px; "><i class="bi bi-trash3-fill" style="color: #ffffff;"></i></button></a>
        </div>
      </td>
    </tr>

  <?php } 

?>

<script>
    function mensajeEliminar(){
        let mensaje = confirm("¿Desea eliminar este registro?");
        return mensaje;
    }
</script>