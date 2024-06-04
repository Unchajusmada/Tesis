<?php
require '../BBDD/connect_user.php';

// Obtén los valores que deseas insertar en la tabla admin
$ID_admin = $_POST['cedula'];
$usuario = $_POST['user'];
$nivel_acceso = $_POST['nivel_acceso'];
$nombre_user = $_POST['nombre'];
$apellido_user = $_POST['apellido'];
$correo_user = $_POST['correo'];
$pass1 = $_POST['pass1'];
$pass2 = $_POST['pass2'];

$pass_hash = sha1($pass1);

// Verifica si todas las variables están definidas
if (isset($nombre_user, $apellido_user, $correo_user, $pass1, $pass2)) {
  // Prepara la consulta SQL utilizando un prepared statement
  $sql = "INSERT INTO admin (ID_admin, usuario, password, nombre_usuario, apellido_usuario, correo, nivel_acceso) VALUES (?, ?, ?, ?, ?, ?, ?)";

  if ($stmt = mysqli_prepare($conection, $sql)) {
    // Vincula los parámetros a los marcadores de posición de la consulta
    mysqli_stmt_bind_param($stmt, "sssssss", $ID_admin, $usuario, $pass_hash, $nombre_user, $apellido_user, $correo_user, $nivel_acceso);

    // Verificar contraseña
    if ($pass1 == $pass2) {
      // Ejecuta la consulta
      if (mysqli_stmt_execute($stmt)) {
        mysqli_stmt_close($stmt); // Cierra el prepared statement

        // Redirecciona
        header("Location: ../Admin/Admin-panel.php?code=1");
        exit; // Termina la ejecución del script
      } else {
        header("Location: ../Admin/Admin-panel.php?code=500"); // Error al ejecutar la consulta
      }
    } else {
      header("Location: ../Admin/Paginas/register.php?code=101"); // Las contraseñas no coinciden
    }
  } else {
    header("Location: ../Admin/Admin-panel.php?code=400"); // Error al preparar la consulta
  }

  // Cierra la conexión
  mysqli_close($conection);
} else {
  header("Location: ../Admin/Paginas/register.php?code=100"); // Faltan parámetros en el formulario
}
