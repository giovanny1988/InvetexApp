<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="css/normalize.css" />
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
  <link rel="stylesheet" href="css/inicio.css" />
  <link rel="shortcut icon" href="img/logo2.ico" type="image/x-icon" />
  <title>Invetex</title>
</head>
<body>
<!--Estructura del header donde contiene el logo y el formulario de login  -->
<header class="container-fluid main">
  <main class="row">
    <!--Contenedor del logo -->
    <div class="col-sm-6 col-12 container__logo">
      <div class="d-flex justify-content-center login__contenedor__logo">
        <img src="img/logo.PNG" class="logos img-fluid" alt="Logo Invetex" />
      </div>
    </div>
    <!--Fin del contenedor del logo -->
    <!--Contenedor del formulario de login -->
    <div class="col-sm-6 col-12 d-flex justify-content-center d-flex align-items-center container__formulario">
      <form method="post" action="">
        <h2 class="login__subtitulo">Iniciar sesión</h2>
        <br />
          <?php
          include("db/conexion.php");
          include("db/controlador_login.php");
          ?>
        <label for="email" class="form-label">Tu correo</label>
        <div class="mb-3 d-flex justify-content-around">
          <i class="bi bi-envelope-at-fill"></i>
          <input
                  type="email"
                  name="email"
                  class="form-control"
                  minlength="8"
                  maxlength="40"
                  id="email"
                  placeholder="you@example.com"
                  autofocus
          />
        </div>
        <label for="password" class="form-label">Tu contraseña</label>
        <div class="mb-3 d-flex justify-content-around">
          <i class="bi bi-key-fill"></i>
          <input
                  type="password"
                  name="password"
                  class="form-control"
                  minlength="2"
                  maxlength="30"
                  id="pass"
                  placeholder="Ingrese su contraseña"
          />
        </div>
        <div class="d-grid gap-2">
          <input type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop" name="btnlogin" value="Ingresar" >
        </div><br>
        <div class="d-flex justify-content-start">
          <p class="registro__parrafo">¿No tiene una cuenta?</p> &nbsp;
          <a class="registro__color__vinculo" href="views/registro.php">Regístrese</a>
        </div>
      </form>
    </div>
  </main>
</header>
<!--Este codigo JavaScript evita que los datos del formulario sean reenviados cuando se
recargue el navegador -->
<script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>
</body>
</html>
