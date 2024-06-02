<?php
require '../BBDD/connect_user.php';

// Eliminación de usuario
if (!empty($_POST['eliminar'])) {
  // Obtén el ID del usuario a eliminar
  $idUsuario = $_POST['user-eliminar'];

  // Prepara la consulta SQL para eliminar el usuario
  $sql = "DELETE FROM admin WHERE ID_admin = ?";

  if ($stmt = mysqli_prepare($conection, $sql)) {
    // Vincula el parámetro del ID_admin al marcador de posición de la consulta
    mysqli_stmt_bind_param($stmt, "i", $idUsuario);

    // Ejecuta la consulta
    if (mysqli_stmt_execute($stmt)) {
      // Redirige a la página de administración con un código de éxito
      header("Location: ../Admin/Admin-panel.php?code=10");
      exit(); // Termina la ejecución del script después de la redirección
    } else {
      // Redirige a la página de administración con un código de error de servidor
      header("Location: ../Admin/Admin-panel.php?code=500");
      exit();
    }
  } else {
    // Redirige a la página de administración con un código de error de consulta
    header("Location: ../Admin/Admin-panel.php?code=400");
    exit();
  }
}

// Cierra la conexión
mysqli_close($conection);
