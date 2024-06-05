<?php
session_start();

if (!isset($_SESSION['username'])) {
  header('location: ../../index.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>Registro</title>

  <!-- Custom fonts for this template-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />
  <link href="../fonts/Nunito-VariableFont_wght.ttf" rel="stylesheet" />
  <!-- Custom styles for this template-->
  <link href="../../Main index/img/unefa.png" rel="icon" />
  <link href="../css/sb-admin-2.min.css" rel="stylesheet" />
  <link href="../css/extras.css" rel="stylesheet" />
</head>

<body class="bg-gradient-ligth">
  <header class="bg-gradient-primary">
    <div class="my-auto">
      <div class="copyright text-center my-auto" style="color: white">
        <div class="d-flex justify-content-between">
          <div class="align-self-right logos">
            <img class="logos" src="../../Main index/img/defensa logo.png" alt="Unefa Logo" />
          </div>
          <div class="align-self-left logos">
            <img class="logos" src="../../Main index/img/unefa.png" alt="Unefa Logo" />
          </div>
        </div>
      </div>
    </div>
  </header>
  <div class="container">
    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">¡Crear un usuario!</h1>
              </div>
              <form class="user" method="POST" action="../../Auth/Registro_Usuario.php">
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <label>Usuario</label>
                    <input type="text" class="form-control form-control-user" id="user" placeholder="Ingrese su nombre de usuario" name="user" autocomplete="off" required />
                    <span id="userError" class="errorCustom"></span>
                  </div>
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <label>Número de Cédula</label>
                    <input type="number" class="form-control form-control-user no-spin" id="cedula" placeholder="Ingrese su cédula (Ej: 28387623)" name="cedula" autocomplete="off" required />
                    <span id="cedulaError" class="errorCustom"></span>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <label>Nombre</label>
                    <input type="text" class="form-control form-control-user" id="exampleFirstName" placeholder="Primer Nombre" name="nombre" autocomplete="off" pattern="[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+" required />
                  </div>
                  <div class="col-sm-6">
                    <label>Apellido</label>
                    <input type="text" class="form-control form-control-user" id="exampleLastName" placeholder="Apellido" name="apellido" autocomplete="off" pattern="[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+" required />
                  </div>
                </div>
                <div class="form-group">
                  <label>Correo</label>
                  <input type="email" class="form-control form-control-user" id="exampleInputEmail" placeholder="Correo" name="correo" autocomplete="off" required />
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <label>Ingrese su contraseña</label>
                    <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Contraseña" name="pass1" autocomplete="off" required />
                  </div>
                  <div class="col-sm-6">
                    <label>Repita su contraseña</label>
                    <input type="password" class="form-control form-control-user" id="exampleRepeatPassword" placeholder="Repita Contraseña" name="pass2" autocomplete="off" required />
                  </div>
                </div>
                <div class="form-group">
                  <label>Nivel de Acceso</label>
                  <select class="form-control-special form-control-user-special" name="nivel_acceso" aria-label="Default select example" required>
                    <option value="" selected>
                      Selecciona el nivel de Acceso
                    </option>
                    <!-- <option value="1">1 - Estudiante</option> -->
                    <option value="2"><!-- 2 -  -->Administrador</option>
                  </select>
                </div>
                <button type="submit" href="../Admin-panel.php" class="btn btn-primary btn-user btn-block">
                  Registrarte
                </button>
              </form>
              <hr />
              <div class="text-center">
                <a class="small btn btn-user btn-block" href="../Admin-panel.php" style="border: 1px solid blue; margin-top: 10px;">Volver</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Footer -->
  <footer class="sticky-footer bg-gradient-primary">
    <div class="container my-auto">
      <div class="copyright text-center my-auto" style="color: white;">
        <span>Copyright &copy; TEG - Sistema de Gestión Administrativa de los Trabajos Especiales de Grado</span>
      </div>
    </div>
  </footer>
  <!-- End of Footer -->

  <!-- Bootstrap core JavaScript-->
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../js/sb-admin-2.min.js"></script>
  <script src="../js/sweetalert2.all.js"></script>
  <script src="../js/Alertas.js"></script>
  <script src="../js/validador.js"></script>

  <!-- Custom Script verificar cedula unica y usuario unico -->
  <script src="../js/jquery-3.7.1.min.js"></script>

  <script>
    // Obtén el código de la URL
    const urlParams = new URLSearchParams(window.location.search)
    const Code = urlParams.get("code")

    codigosAlerta(Code)
  </script>
</body>

</html>