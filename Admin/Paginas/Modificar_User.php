<?php
session_start();

require '../../BBDD/connect_user.php';
include '../../Auth/funciones_leer_bbdd.php';

if ($_SESSION['nivel_acceso'] != 2) {
  header('location: ../../index.php');
}

$ID_admin = $_GET['ID_user'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>Modificar Usuario</title>

  <!-- Custom fonts for this template-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />

  <!-- Custom styles for this template-->
  <link href="../../Main index/img/unefa.png" rel="icon" />
  <link href="../css/sb-admin-2.min.css" rel="stylesheet" />
  <link href="../css/extras.css" rel="stylesheet" />
</head>

<body class="bg-gradient-dark">
  <div class="container">
    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">¡Modificar Usuario!</h1>
              </div>
              <?php
              $datos_user = modificarUser($conection, $ID_admin);
              foreach ($datos_user as $row) : ?>
                <form class="user" method="POST" action="../../Auth/Modif_Datos_User.php" onsubmit="return validateForm();" autocomplete="nope">
                  <input type="text" id="ID_admin" name="ID_admin" value="<?php echo htmlspecialchars($row['ID_admin']); ?>" hidden />
                  <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                      <label>Usuario</label>
                      <input type="text" class="form-control form-control-user" id="user" placeholder="Ingrese su nombre de usuario" name="user" value="<?php echo htmlspecialchars($row['usuario']); ?>" />
                      <span id="userError" class="errorCustom"></span>
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                      <label>Número de Cedula</label>
                      <input type="number" class="form-control form-control-user no-spin" id="cedula" name="cedula" value="<?php echo htmlspecialchars($row['ID_admin']); ?>" />
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                      <label>Nombre</label>
                      <input type="text" class="form-control form-control-user" pattern="[A-Za-z\s]+" id="exampleFirstName" placeholder="Primer Nombre" name="nombre" value="<?php echo htmlspecialchars($row['nombre_usuario']); ?>" />
                    </div>
                    <div class="col-sm-6">
                      <label>Apellido</label>
                      <input type="text" class="form-control form-control-user" pattern="[A-Za-z\s]+" id="exampleLastName" placeholder="Apellido" name="apellido" value="<?php echo htmlspecialchars($row['apellido_usuario']); ?>" />
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Correo</label>
                    <input type="email" class="form-control form-control-user" id="exampleInputEmail" placeholder="Correo" name="correo" value="<?php echo htmlspecialchars($row['correo']); ?>" />
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                      <label>Ingrese una nueva contraseña</label>
                      <input type="password" class="form-control form-control-user pass" id="exampleInputPassword" placeholder="Contraseña" name="pass1" />
                      <span id="pass1Error" style="color: red;"></span>
                    </div>
                    <div class="col-sm-6">
                      <label>Repita su nueva contraseña</label>
                      <input type="password" class="form-control form-control-user pass" id="exampleRepeatPassword" placeholder="Repita Contraseña" name="pass2" />
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Nivel de Acceso</label>
                    <select class="form-control-special form-control-user-special" name="nivel_acceso" aria-label="Default select example">
                      <option value="" selected>Selecciona una opción de la siguiente lista</option>
                      <option value="1" <?php echo ($row['nivel_acceso'] == '1') ? 'selected' : ''; ?>>1 - Administrador</option>
                      <option value="2" <?php echo ($row['nivel_acceso'] == '2') ? 'selected' : ''; ?>>2 - SuperAdmin</option>
                    </select>
                  </div>

                  <input type="submit" class="btn btn-primary btn-user btn-block" value="Enviar" id="enviar" />
                  <div class="text-center">
                    <a class="small btn btn-user btn-block" href="../Admin-panel.php" style="border: 1px solid blue; margin-top: 10px;">Volver</a>
                  </div>
                  <hr />
                </form>
                <form id="eliminarForm" class="eliminar" action="../../Auth/eliminar_user.php" method="POST">
                  <!-- Campo oculto para la eliminación -->
                  <input type="hidden" name="user-eliminar" id="user-eliminar" value="<?php echo htmlspecialchars($row['ID_admin']); ?>" />
                  <input type="hidden" name="eliminar" id="eliminar" value="0" />
                  <input type="button" class="btn btn-danger btn-user btn-block" value="Eliminar usuario" onclick="showConfirmation();" />
                </form>
              <?php endforeach; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../js/sb-admin-2.min.js"></script>

  <!-- Custom Script verificar cedula unica y usuario unico -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    $(document).ready(function() {
      // Evento de cambio del campo de usuario
      $("#user").on("change", function() {
        var user = $(this).val();
        if (user !== "") {
          // Realizar solicitud AJAX para verificar el usuario
          $.ajax({
            url: "../Auth_admin/verificar_usuario.php", // Ruta al archivo PHP que realizará la verificación
            method: "POST",
            data: {
              user: user
            },
            success: function(response) {
              if (response === "existe") {
                $("#userError").text("Este usuario ya está en uso");
                disableSubmitButton();
              } else {
                $("#userError").text("");
                enableSubmitButton();
              }
            }
          });
        } else {
          $("#userError").text("");
          enableSubmitButton();
        }
      });

      function disableSubmitButton() {
        $("#enviar").prop("disabled", true);
      }

      function enableSubmitButton() {
        $("#enviar").prop("disabled", false);
      }
    });
  </script>

  <script>
    $(document).ready(function() {
      // Evento de cambio del campo de usuario
      $(".pass").on("change", function() {
        var pass1 = $("#exampleInputPassword").val();
        var pass2 = $("#exampleRepeatPassword").val();

        if (pass1 !== "" && pass1 !== pass2) {
          $("#pass1Error").text("Las contraseñas no coinciden");
          disableSubmitButton();
        } else {
          $("#pass1Error").text("");
          enableSubmitButton();
        }
      });
    });

    function disableSubmitButton() {
      $("#enviar").prop("disabled", true);
    }

    function enableSubmitButton() {
      $("#enviar").prop("disabled", false);
    }
  </script>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
    function showConfirmation() {
      Swal.fire({
        title: '¿Estás seguro?',
        text: 'Esta acción eliminará al usuario permanentemente.',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Sí, eliminar',
        cancelButtonText: 'Cancelar'
      }).then((result) => {
        if (result.isConfirmed) {
          // Si el usuario confirma, establece el valor del campo oculto "eliminar" en 1 y envía el formulario
          document.getElementById("eliminar").value = "1";
          document.getElementById("eliminarForm").submit();
        }
      });
    }
  </script>

</body>

</html>