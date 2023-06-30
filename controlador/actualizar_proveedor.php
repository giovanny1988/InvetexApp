<?php
    include("../db/conexion.php");
    $id=$_GET["idProveedor"];

    $sql=$conexion->query("SELECT * FROM proveedor WHERE idProveedor=$id");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css"
    />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../css/normalize.css" />
    <link rel="stylesheet" href="../css/menu.css" />
    <link rel="stylesheet" href="../css/table.css" />
    <link rel="shortcut icon" href="../img/logo2.ico" type="image/x-icon" />
    <title>Actualizar Usuario</title>
</head>
<body>
    <div class="column__menu col-5 m-auto mt-5">
        <h5>Actualizar Proveedor</h5><br />
        <form method="post">
            <input type="hidden" name="id" value="<?= $_GET["idProveedor"]?> ">
            <?php
                include("../controlador/controlador_proveedor.php");
            ?>
            <?php
                while($dato=$sql->fetch_object()){ ?>

                    <div class="mb-2">
                        <label for="exampleInputEmail1" class="form-label"
                        >Nombre Proveedor</label
                        >
                        <input type="text" class="form-control" name="proveedor" value="<?=$dato->nombre_proveedor?>" />
                    </div>
                    <div class="mb-2">
                        <label for="exampleInputPassword1" class="form-label"
                        >Correo electrónico</label
                        >
                        <input type="email" class="form-control" name="email" value="<?=$dato->email_proveedor?>" />
                    </div>
                    <div class="mb-2">
                        <label for="exampleInputPassword1" class="form-label"
                        >Dirección</label
                        >
                        <input type="text" class="form-control" name="direccion" value="<?=$dato->telefono_proveedor?>"/>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label"
                        >Número corporativo</label
                        >
                        <input type="tel" class="form-control" name="telefono" value="<?=$dato->direccion_proveedor?>" />
                    </div>
                <?php }
            ?>             
            <input type="submit" class="btn btn-success" value="Actualizar" name="btnguardar">
        </form>
    </div>
</body>
</html>