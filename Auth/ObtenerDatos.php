<?php
require '../../BBDD/connect_user.php';

// Obtén los valores que deseas insertar en la tabla teg
$titulo_teg = $_POST['titulo'];
$nombres_autor_teg = $_POST['nombres'];
$apellidos_autor_teg = $_POST['apellidos'];
$correo_autor = $_POST['correo'];
$year_teg = $_POST['year'];
$nombre_carrera_autor = $_POST['nombre_carrera_autor'];

// Prepara la consulta SQL utilizando un prepared statement
$sql =  "INSERT INTO teg (titulo_teg, nombres_autor_teg, apellidos_autor_teg, year_teg, correo_autor, nombre_carrera_autor) VALUES (?, ?, ?, ?, ?, ?)";

if ($stmt = mysqli_prepare($conection, $sql)) {
  // Vincula los parámetros a los marcadores de posición de la consulta
  mysqli_stmt_bind_param($stmt, "ssssss", $titulo_teg, $nombres_autor_teg, $apellidos_autor_teg, $year_teg, $correo_autor, $nombre_carrera_autor);

  // Ejecuta la consulta
  if (mysqli_stmt_execute($stmt)) {
    echo "Registro insertado correctamente";
  } else {
    echo "Error al ejecutar la consulta: " . mysqli_error($conection);
  }

  // Cierra la declaración preparada
  mysqli_stmt_close($stmt);
} else {
  echo "Error en la preparación de la consulta: " . mysqli_error($conection);
}

// Cierra la conexión
mysqli_close($conection);
