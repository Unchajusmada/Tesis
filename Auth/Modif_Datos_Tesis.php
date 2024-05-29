<?php
require '../BBDD/connect_user.php';

// Obtén los valores que deseas actualizar en la tabla teg
$ID_teg = $_POST['ID_teg'];

// Crea un array para almacenar los campos que se van a actualizar
$campos = array();

if (!empty($_POST['titulo'])) {
  $titulo_teg = $_POST['titulo'];
  $campos[] = "titulo_teg = '$titulo_teg'";
}

if (!empty($_POST['nombres'])) {
  $nombres_autor_teg = trim($_POST['nombres']);
  $campos[] = "nombres_autor_teg = '$nombres_autor_teg'";
}

if (!empty($_POST['apellidos'])) {
  $apellidos_autor_teg = trim($_POST['apellidos']);
  $campos[] = "apellidos_autor_teg = '$apellidos_autor_teg'";
}

if (!empty($_POST['correo'])) {
  $correo_autor = $_POST['correo'];
  $campos[] = "correo_autor = '$correo_autor'";
}

if (!empty($_POST['year'])) {
  $year_teg = $_POST['year'];
  $campos[] = "year_teg = '$year_teg'";
}

if (!empty($_POST['nombre_carrera_autor'])) {
  $nombre_carrera_autor = $_POST['nombre_carrera_autor'];
  $campos[] = "nombre_carrera_autor = '$nombre_carrera_autor'";
}

if (!empty($_POST['nombres_tutor'])) {
  $nombres_tutor = $_POST['nombres_tutor'];
  $campos[] = "nombres_tutor = '$nombres_tutor'";
}

if (!empty($_POST['factibilidad'])) {
  $factibilidad = $_POST['factibilidad'];
  $campos[] = "factibilidad = '$factibilidad'";
}

// Eliminación de usuario
if (!empty($_POST['eliminar'])) {
  // Obtén el ID del teg a eliminar
  $ID_teg = $_POST['ID_teg'];

  // Prepara la consulta SQL para eliminar el usuario
  $sql = "DELETE FROM teg WHERE ID_teg = ?";

  if ($stmt = mysqli_prepare($conection, $sql)) {
    // Vincula el parámetro del ID_admin al marcador de posición de la consulta
    mysqli_stmt_bind_param($stmt, "i", $ID_teg);

    // Ejecuta la consulta
    if (mysqli_stmt_execute($stmt)) {
      // Redirige a la página de administración con un código de éxito
      header("Location: ../Admin/Admin-panel.php?code=9&nv=" . $nivel_acceso);
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
