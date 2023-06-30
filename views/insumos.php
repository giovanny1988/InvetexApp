<?php
session_start();
if(empty($_SESSION['id'])){
    header("location: ../index.php");
}
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
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
    <link rel="stylesheet" href="../css/table.css">
    <link rel="shortcut icon" href="../img/logo2.ico" type="image/x-icon" />
    <title>Insumos</title>
  </head>
  <body>
    <?php
      include("../db/conexion.php");
    ?>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="#"
          ><img src="../img/logo.PNG" width="200" alt="Logo Invetex"
        /></a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarTogglerDemo02"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" href="menu.php">Inicio</a>
            </li>
          </ul>
          <form class="d-flex">
            <div class="dropdown">
              <a
                class="btn btn-secondary dropdown-toggle"
                href="#"
                role="button"
                id="dropdownMenuLink"
                data-bs-toggle="dropdown"
              >
                <i class="bi bi-person-circle" style="font-size: 20px"></i>
                  <?php echo $_SESSION['emailUser']; ?>
              </a>
              <ul class="dropdown-menu">
                <li>
                  <a class="dropdown-item" href="../db/controlador_cerrar.php">Cerrar sesión</a>
                </li>
              </ul>
            </div>
          </form>
        </div>
      </div>
    </nav>
    <section class="container">
      <div class="row justify-content-between">
        <div class="column__menu col-md-3">
          <form method="post">
            <h5>Crear insumo</h5>
            <br />
            <?php
              include("../controlador/crear_insumo.php");
            ?>
            <div class="mb-2">
              <label for="exampleInputEmail1" class="form-label"
                >Referencia</label
              >
              <input type="text" class="form-control" name="ref" autofocus />
            </div>
            <div class="mb-2">
              <label for="exampleInputPassword1" class="form-label"
                >Nombre Insumo</label
               >
              <input type="text" class="form-control" name="nomInsumo" />
            </div>
            <div class="mb-2">
              <label for="exampleInputPassword1" class="form-label"
                >Descripción</label
              >
              <input type="text" class="form-control" name="descInsumo" />
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label"
                >Precio unitario</label
              >
               <input type="number" class="form-control" name="precioUn" />
            </div>
            <div class="mb-3">
              <select class="form-select" name="tipoInsumo">
                <option value="">Categoria</option>
                <?php
                    include("../controlador/listar_tipoInsumo.php");
                    while($datos=mysqli_fetch_array($query))
                    { 
                ?> 
                      <option value="<?php echo $datos['idTipo_insumo']?>" ><?php echo $datos['nombre_tipo_insumo']?></option>                   
                     <?php }    
                    ?>  
              </select>            
            </div>
            <div class="mb-3">
              <select class="form-select" name="selProv">
                <option value="">Proveedor</option>
                <?php
                    include("../controlador/listar_proveedor.php");
                    while($datos=mysqli_fetch_array($query))
                    { 
                ?> 
                      <option value="<?php echo $datos['idProveedor']?>" ><?php echo $datos['nombre_proveedor']?></option>                   
                     <?php }    
                    ?>  
              </select>            
            </div>
            <div class="mb-3">
              <input type="submit" name="btnregistrar" class="btn btn-success" value="Guardar"></input>
            </div>
          </form>
            <?php 
              include('../barcode/generadorBarras.php');     
            ?>
            <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="bi bi-upc-scan"></i>  Generar código de barras</button>
        </div>
        <div class="column__menu column__menu2 col-md-8">
          <form method="post" class="d-flex">
            <input
              class="form-control me-2"
              type="search" name="txtbuscar"
              placeholder="&#128270; Buscar por referencia o nombre"
            />
            <input class="btn btn-success" type="submit" value="Buscar"></input>
          </form>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead style="background-color: #113941; color: #ffffff">
                <tr>
                  <th>Id</th>
                  <th>Referencia</th>
                  <th>Nombre Insumo</th>
                  <th>Descripción</th>
                  <th>Precio Unitario</th>
                  <th>Tipo Insumo</th>
                  <th>Proveedor</th>
                  <th>Acciónes</th>
                </tr>
              </thead>
              <tbody>
                  <?php
                    include("../controlador/listar_insumos.php");
                    while($datos=mysqli_fetch_array($query)){ ?> 
                      <tr>
                        <td><?= $datos['Id_insumo'] ?></td>
                        <td><?= $datos['referencia'] ?></td>
                        <td><?= $datos['nombre_insumo'] ?></td>
                        <td><?= $datos['descripcion_insumo'] ?></td>
                        <td><?= $datos['precio_unitario_insumo'] ?></td>
                        <td><?= $datos['nombre_tipo_insumo'] ?></td>
                        <td><?= $datos['nombre_proveedor'] ?></td>
                        <td>
                          <div class="btn-group btn-group-sm" role="group">
                             <a href="../controlador/actualizar_insumo.php?Id_insumo=<?=$datos['Id_insumo'] ?>"><button type="button" style="background-color:#e69b00;border:none; padding:5px;"><i class="bi bi-pencil-square" style="color: #000000;"></i></button></a>
                          </div>
                        </td>
                      </tr>
                    <?php }    
                  ?>  
              </tbody>
              </table>
          </div>
        </div>
      </div>     
    </section>
    <!--Pie de pagina-->
    <footer class="container__footer container-fluid text-center">
      <img src="../img/logo3.png" width="100" alt="Logo Invetex" />
      <hr />
      <p class="text__footer">Invetex &copy;Todos los derechos reservados</p>
      <p class="text__footer">2023</p>
    </footer>
  </body>
</html>
