<?php
session_start();
if(empty($_SESSION['id'])){
    header("location: ../index.php");
}
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
    <title>Inventario</title>
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
            <h5>Datos Inventario</h5>
            <br />
            <a href="../fpdf/reporte.php" target="_blank" class="btn btn-secondary" rel="noopener noreferrer"><i class="bi bi-file-earmark-pdf-fill"></i>   Generar Reporte</a>
          </div>
          <div class="column__menu column__menu2 col-md-8">
            <form class="d-flex" role="search">
              <input
                class="form-control me-2" id="busqueda" autofocus
                type="date"
                placeholder="&#128270;"
              />
              <input
                class="form-control me-2" id="busqueda2" autofocus
                type="date"
                placeholder="&#128270;"
              />
              <button class="btn btn-success" type="submit">Buscar</button>
            </form>
            <div class="table-responsive">
              <table id="tabla" class="table table-striped">
                <thead style="background-color: #113941; color: #ffffff">
                  <tr>
                    <th>Referencia</th>
                    <th>Insumo</th>
                    <th>Total unidades ingresadas</th>
                    <th>Total egreso</th>
                    <th>Unidades vendidas</th>
                    <th>Total ingreso</th>
                    <th>Stock actual</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    include('../controlador/ver_inventario.php');
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