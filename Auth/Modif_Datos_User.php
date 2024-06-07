<?php
require '../BBDD/connect_user.php';

// Obtén los valores que deseas actualizar en la tabla teg
$ID_admin = $_POST['ID_admin'];

// Crea un array para almacenar los campos que se van a actualizar
$campos = array();

if (!empty($_POST['cedula'])) {
  $cedula = $_POST['cedula'];
  $campos[] = "ID_admin = '$cedula'";
}

if (!empty($_POST['user'])) {
  $user = trim(htmlspecialchars($_POST['user']));
  $campos[] = "usuario = '$user'";
}

if (!empty($_POST['correo'])) {
  $correo = $_POST['correo'];
  $campos[] = "correo = '$correo'";
}

if (!empty($_POST['nombre'])) {
  $nombre = $_POST['nombre'];
  $campos[] = "nombre_usuario = '$nombre'";
}

if (!empty($_POST['apellido'])) {
  $apellido = $_POST['apellido'];
  $campos[] = "apellido_usuario = '$apellido'";
}

if (!empty($_POST['pass1'])) {
  $pass1 = $_POST['pass1'];
  $pass_hash = sha1($pass1);
  $campos[] = "password = '$pass_hash'";
}

if (!empty($_POST['nivel_acceso'])) {
  $nivel_acceso = $_POST['nivel_acceso'];
  $campos[] = "nivel_acceso = '$nivel_acceso'";
}

// Verificar contraseña
if (!empty($_POST['pass1'])) {
  if ($_POST['pass1'] == $_POST['pass2']) {
    // Las contraseñas coinciden, realiza la actualización de contraseña
    // Prepara la consulta SQL utilizando un prepared statement
    $sql = "UPDATE admin SET " . implode(", ", $campos) . " WHERE ID_admin = ?";

    if ($stmt = mysqli_prepare($conection, $sql)) {
      // Vincula el parámetro del ID_teg al marcador de posición de la consulta
      mysqli_stmt_bind_param($stmt, "i", $ID_admin);

      // Ejecuta la consulta
      if (mysqli_stmt_execute($stmt)) {
        header("Location: ../Admin/Admin-panel.php?code=3");
        exit();
      } else {
        header("Location: ../Admin/Admin-panel.php?code=500");
        exit();
      }
    } else {
      header("Location: ../Admin/Admin-panel.php?code=400");
      exit();
    }
  } else {
    // Las contraseñas no coinciden
    header("Location: ../Admin/Admin-panel.php?code=101");
    exit();
  }
} else {
  // No se quiere actualizar la contraseña
  // Prepara la consulta SQL utilizando un prepared statement
  $sql = "UPDATE admin SET " . implode(", ", $campos) . " WHERE ID_admin = ?";

  if ($stmt = mysqli_prepare($conection, $sql)) {
    // Vincula el parámetro del ID_teg al marcador de posición de la consulta
    mysqli_stmt_bind_param($stmt, "i", $ID_admin);

    // Ejecuta la consulta
    if (mysqli_stmt_execute($stmt)) {
      header("Location: ../Admin/Admin-panel.php?code=3");
      exit();
    } else {
      header("Location: ../Admin/Admin-panel.php?code=500");
      exit();
    }
  } else {
    header("Location: ../Admin/Admin-panel.php?code=400");
    exit();
  }
}

// Cierra la conexión
mysqli_close($conection);
