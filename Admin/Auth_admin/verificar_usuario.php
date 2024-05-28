<?php
require '../../BBDD/connect_user.php';

if (!$conection) {
  die("Error de conexión: " . mysqli_connect_error());
}

if (isset($_POST['user'])) {
  $user = $_POST['user'];

  // Consulta para verificar si el usuario ya existe
  $consulta = "SELECT * FROM Admin WHERE usuario = '$user'";

  $result = mysqli_query($conection, $consulta);

  if ($result && mysqli_num_rows($result) > 0) {
    // El usuario ya existe
    echo "existe";
  } else {
    // El usuario no existe
    echo "noexiste";
  }
}

if (isset($_POST['cedula'])) {
  $user = $_POST['cedula'];

  // Consulta para verificar si el usuario ya existe
  $consulta = "SELECT * FROM Admin WHERE ID_admin = '$user'";

  $result = mysqli_query($conection, $consulta);

  if ($result && mysqli_num_rows($result) > 0) {
    // El usuario ya existe
    echo "existe";
  } else {
    // El usuario no existe
    echo "noexiste";
  }
}

// Cerrar conexión a la base de datos
mysqli_close($conection);
