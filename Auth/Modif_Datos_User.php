<?php
require '../BBDD/connect_user.php';
$nivel_acceso = $_GET['nv'];

// Obtén los valores que deseas actualizar en la tabla teg
$ID_admin = $_POST['ID_admin'];

// Crea un array para almacenar los campos que se van a actualizar
$campos = array();

if (!empty($_POST['user'])) {
  $user = trim($_POST['user']);
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
  $campos[] = "password = '$pass1'";
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
        header("Location: ../Admin/Admin-panel.php?code=3&nv=" . $nivel_acceso);
        exit();
      } else {
        header("Location: ../Admin/Admin-panel.php?code=500&nv=" . $nivel_acceso);
        exit();
      }
    } else {
      header("Location: ../Admin/Admin-panel.php?code=400&nv=" . $nivel_acceso);
      exit();
    }
  } else {
    // Las contraseñas no coinciden
    header("Location: ../Admin/Admin-panel.php?code=101&nv=" . $nivel_acceso);
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
      header("Location: ../Admin/Admin-panel.php?code=3&nv=" . $nivel_acceso);
      exit();
    } else {
      header("Location: ../Admin/Admin-panel.php?code=500&nv=" . $nivel_acceso);
      exit();
    }
  } else {
    header("Location: ../Admin/Admin-panel.php?code=400&nv=" . $nivel_acceso);
    exit();
  }
}

// Eliminación de usuario
if (!empty($_POST['eliminar'])) {
  // Obtén el ID del usuario a eliminar
  $idUsuario = $_POST['ID_admin'];

  // Prepara la consulta SQL para eliminar el usuario
  $sql = "DELETE FROM admin WHERE ID_admin = ?";

  if ($stmt = mysqli_prepare($conection, $sql)) {
    // Vincula el parámetro del ID_admin al marcador de posición de la consulta
    mysqli_stmt_bind_param($stmt, "i", $idUsuario);

    // Ejecuta la consulta
    if (mysqli_stmt_execute($stmt)) {
      // Redirige a la página de administración con un código de éxito
      header("Location: ../Admin/Admin-panel.php?code=10&nv=" . $nivel_acceso);
      exit(); // Termina la ejecución del script después de la redirección
    } else {
      // Redirige a la página de administración con un código de error de servidor
      header("Location: ../Admin/Admin-panel.php?code=500&nv=" . $nivel_acceso);
      exit();
    }
  } else {
    // Redirige a la página de administración con un código de error de consulta
    header("Location: ../Admin/Admin-panel.php?code=400&nv=" . $nivel_acceso);
    exit();
  }
}

// Cierra la conexión
mysqli_close($conection);
