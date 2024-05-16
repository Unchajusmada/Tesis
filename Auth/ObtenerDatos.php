<?php
require '../BBDD/connect_user.php';

// Obtén los valores que deseas insertar en la tabla teg
$titulo_teg = $_POST['titulo'];
$nombres_autor_teg = $_POST['nombres'];
$apellidos_autor_teg = $_POST['apellidos'];
$correo_autor = $_POST['correo'];
$year_teg = $_POST['year'];
$nombre_carrera_autor = $_POST['nombre_carrera_autor'];
$nombres_tutor = $_POST['nombres_tutor'];
$factibilidad = $_POST['factibilidad'];
$archivo_pdf = $_FILES['archivo_pdf'];

// Obtener información del archivo
$nombre_archivo = $archivo_pdf['name'];
$tipo_archivo = $archivo_pdf['type'];
$tamaño_archivo = $archivo_pdf['size'];
$ruta_archivo = $archivo_pdf['tmp_name'];

// Prepara la consulta SQL utilizando un prepared statement
$sql = "INSERT INTO teg (titulo_teg, nombres_autor_teg, apellidos_autor_teg, year_teg, correo_autor, nombre_carrera_autor, nombres_tutor, factibilidad, archivo_pdf) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

if ($stmt = mysqli_prepare($conection, $sql)) {
  // Vincula los parámetros a los marcadores de posición de la consulta
  mysqli_stmt_bind_param($stmt, "sssssssss", $titulo_teg, $nombres_autor_teg, $apellidos_autor_teg, $year_teg, $correo_autor, $nombre_carrera_autor, $nombres_tutor, $factibilidad, $nombre_archivo);

  // Verificar si se seleccionó un archivo
  if (!empty($nombre_archivo)) {
    // Ruta donde se guardará el archivo en el servidor
    $directorio_archivos = '../Admin/PDF_TEG/';
    $ruta_destino = $directorio_archivos . $nombre_archivo;

    // Mover el archivo al directorio de destino
    if (move_uploaded_file($ruta_archivo, $ruta_destino)) {
      // Ejecuta la consulta
      if (mysqli_stmt_execute($stmt)) {
        echo "Registro insertado correctamente";
      } else {
        echo "Error al ejecutar la consulta: " . mysqli_error($conection);
      }
    } else {
      // Error al mover el archivo al directorio de destino
      echo "Error al cargar el archivo.";
    }
  } else {
    // No se seleccionó ningún archivo
    echo "No se seleccionó ningún archivo.";
  }

  // Cierra la declaración preparada
  mysqli_stmt_close($stmt);
} else {
  echo "Error en la preparación de la consulta: " . mysqli_error($conection);
}

// Cierra la conexión
mysqli_close($conection);
