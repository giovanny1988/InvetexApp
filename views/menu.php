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
    <link rel="shortcut icon" href="../img/logo2.ico" type="image/x-icon" />
    <title>Invetex</title>
  </head>
  <body>
    <!--Barra de navegacion-->
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
              <a class="nav-link active" href="#">Inicio</a>
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
    <!--Menu de botones interfaz-->
    <section class="container">
      <div class="row justify-content-between">
        <div class="column__menu col-md-3">
          <h4 class="text-center">Estadísticas</h4>
          <div class="contenedor text-center">
            <h4 class="">Insumo mas vendido</h4>
            <h3><i class="bi bi-bookmark-star-fill"></i></h3><br>
            <?php
              include('../db/conexion.php');
              $sqlMax=$conexion->query("SELECT nombre_insumo, cantidad_salida FROM salida_insumo
              INNER JOIN insumo
              ON fk_insumoSal = Id_insumo
              ORDER BY cantidad_salida DESC
              LIMIT 1;");

              while($dato=mysqli_fetch_array($sqlMax)){
                echo "<h6>" .  $dato['nombre_insumo'] . "</h6>";
                echo"<h6><b> ". $dato['cantidad_salida'] . " UND</b></h6>";
              }
            ?>
          </div>
          <div class="contenedor2 text-center">
            <h4 class="">Promedio ventas por mes</h4>
            <h3><i class="bi bi-activity"></i></h3><br>
            <?php
              include('../db/conexion.php');
              $sqlVent=$conexion->query("SELECT avg(valor_salida) AS 'Promedio', monthname(fecha_salida) AS 'Mes' from salida_insumo;");

              while($dato=mysqli_fetch_array($sqlVent)){
                echo "<h6>" .  $dato['Mes'] . "</h6>";
                echo"<h6><b>$ ". $dato['Promedio'] . "</b></h6>";
              }
            ?>
          </div>
        </div>
        <div class="column__menu col-md-8">
          <div class="row row-cols-1 row-cols-md-3 g-4">
            <div class="col">
              <div class="card text-center h-100">
                <i class="bi bi-box-seam-fill icon__button"></i>
                <div class="card-body">
                  <form action="insumos.php">
                    <button type="submit" class="btn btn-success">
                      Insumos
                    </button>
                  </form>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card text-center h-100">
                <i class="bi bi-person-badge icon__button"></i>
                <div class="card-body">
                  <form action="clientes.php">
                    <button type="submit" class="btn btn-success">
                      Clientes
                    </button>
                  </form>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card text-center h-100">
                <i class="bi bi-box-arrow-in-right icon__button"></i>
                <div class="card-body">
                  <form action="entrada.php">
                    <button type="submit" class="btn btn-success">
                      Entradas insumos
                    </button>
                  </form>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card text-center h-100">
                <i class="bi bi-box-arrow-in-left icon__button"></i>
                <div class="card-body">
                  <form action="salida.php">
                    <button type="submit" class="btn btn-success">
                      Salidas Insumos
                    </button>
                  </form>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card text-center h-100">
                <i class="bi bi-truck icon__button"></i>
                <div class="card-body">
                  <form action="proveedor.php">
                    <button type="submit" class="btn btn-success">
                      Proveedores
                    </button>
                  </form>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card text-center h-100">
                <i class="bi bi-person-rolodex icon__button"></i>
                <div class="card-body">
                  <form action="satelite.php">
                    <button type="submit" class="btn btn-success">
                      Satélites
                    </button>
                  </form>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card text-center h-100">
                <i class="bi bi-tags-fill icon__button"></i>
                <div class="card-body">
                  <form action="tipo_insumo.php">
                    <button type="submit" class="btn btn-success">
                      Categorias Insumos
                    </button>
                  </form>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card text-center h-100">
                <i class="bi bi-card-checklist icon__button"></i>
                <div class="card-body">
                  <form action="inventario.php">
                    <button type="submit" class="btn btn-success">
                      Inventario
                    </button>
                  </form>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card text-center h-100">
                <i class="bi bi-people-fill icon__button"></i>
                <div class="card-body">
                  <form action="usuarios.php">
                    <button type="submit" class="btn btn-success">
                      Usuarios
                    </button>
                  </form>
                </div>
              </div>
            </div>
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
