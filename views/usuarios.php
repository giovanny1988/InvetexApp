<?php
session_start();
if(empty($_SESSION['id'])){
    header("location: ../index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
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
      <title>Usuarios registrados</title>
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
            <h5>Administrar usuarios</h5>
            <br />
            <form method="post">
                <?php
                    include("../controlador/crear_usuario.php");
                    include("../controlador/eliminar_usuario.php");
                ?>
                <div class="mb-2">
                    <label for="exampleInputEmail1" class="form-label"
                    >Documento</label
                    >
                    <input type="text" class="form-control" name="doc" autofocus />
                </div>
                <div class="mb-2">
                    <label for="exampleInputEmail1" class="form-label"
                    >Nombre usuario</label
                    >
                    <input type="text" class="form-control" name="user" autofocus />
                </div>
                <div class="mb-2">
                    <label for="exampleInputPassword1" class="form-label"
                    >Correo electrónico</label
                    >
                    <input type="email" class="form-control" name="email" />
                </div>
                <div class="mb-2">
                    <label for="exampleInputPassword1" class="form-label"
                    >Password</label
                    >
                    <input type="password" class="form-control" name="password" />
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label"
                    >Número de contacto</label
                    >
                    <input type="tel" class="form-control" name="tel" />
                </div>
                <input type="submit" class="btn btn-success" value="Guardar" name="btnguardar"  >
            </form>
          </div>
          <div class="column__menu column__menu2 col-md-8">
            <form method="POST" action="usuarios.php" class="d-flex" role="search">
              <input
              class="form-control me-2" name="txtbuscar"
              type="search"
              placeholder="&#128270; Buscar por cc o nombre "
              />
              <input type="submit" class="btn btn-success" value="Buscar">
            </form>
            <div class="table-responsive">
              <table id="tabla" class="table table-striped">
                <thead style="background-color: #113941; color: #ffffff">
                  <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Documento CC</th>
                    <th scope="col">Nombre usuario</th>
                    <th scope="col">Correo electrónico</th>
                    <th scope="col">Teléfono</th>
                    <th scope="col">Acciónes</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    include("../controlador/listarUsuarios.php");   
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