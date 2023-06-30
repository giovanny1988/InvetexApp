<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="../css/inicio.css">
    <link rel="shortcut icon" href="../img/logo2.ico" type="image/x-icon">
    <title>Invetex</title>
</head>
<body>
<header class="container-fluid main">
    <div class="row">
        <div class="col-sm-6 col-12 container__logo">
            <div class="d-flex justify-content-center login__contenedor__logo">
                <img src="../img/logo.PNG" class="logoss img-fluid" alt="Logo Invetex" />
            </div>
        </div>
        <div class="col-sm-6 col-12 d-flex justify-content-center d-flex align-items-center container__formulario">
            <form method="post" action="">
                <h2 class="login__subtitulo">Registro</h2><br>
                <?php
                    include("../db/conexion.php");
                    include("../db/registro_user.php");
                ?>
                <label for="id" class="form-label">Número de documento</label>
                <div class="mb-3 d-flex justify-content-around">
                    <i class="bi bi-person-vcard-fill"></i>
                    <input type="text" name="documento" class="form-control form-cc" id="input_ID" placeholder="Ingrese su número de documento" pattern="[A-Za-z0-9]{8,15}" required>
                </div>
                <label for="nombre" class="form-label">Nombre Completo</label>
                <div class="mb-3 d-flex justify-content-around">
                    <i class="bi bi-person-fill-add"></i>
                    <input type="text" name="nombre" class="form-control" placeholder="Ingrese su nombre completo" required pattern="[A-Za-z\s]{1,45}">
                </div>
                <label for="email" class="form-label">Correo electrónico</label>
                <div class="mb-3 d-flex justify-content-around">
                    <i class="bi bi-envelope-plus-fill"></i>
                    <input type="email" name="email" class="form-control" id="input_email" placeholder="Ingrese su direccion email" maxlength="30">
                </div>
                <label for="password" class="form-label">Contraseña</label>
                <div class="mb-3 d-flex justify-content-around">
                    <i class="bi bi-shield-lock-fill"></i>
                    <input type="password" name="password" class="form-control" placeholder="Ingrese una contraseña"  title="Al menos 8 caracteres, maximo 32, debe contener una letra minúscula, una mayúscula, un número y un caracter especial" >
                </div>
                <label for="telefono" class="form-label">Telefono contacto</label>
                <div class="mb-3 d-flex justify-content-around">
                    <i class="bi bi-telephone-fill"></i>
                    <input type="tel" name="telefono" class="form-control" id="input_tel" placeholder="Ingrese un número de contacto" required pattern="[0-9]{10}">
                </div>
                <div class="d-grid gap-2">
                    <input type="submit" class="btn btn-primary" value="Registrar" name="btnregistrar">
                </div><br>
                <div class="d-flex justify-content-start">
                    <p class="registro__parrafo">¿Ya tienes una cuenta?</p> &nbsp;
                    <a class="registro__color__vinculo" href="../index.php">Ingrese</a>
                </div>
            </form>
        </div>
    </div>
</header>
</body>
</html>