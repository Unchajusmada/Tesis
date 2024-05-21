<?php
require '../BBDD/connect_user.php';

// Obtén los valores que deseas insertar en la tabla teg
$titulo_teg = $_POST['titulo'];
$nombres_autor_teg = trim($_POST['nombres']);
$apellidos_autor_teg = trim($_POST['apellidos']);
$correo_autor = $_POST['correo'];
$year_teg = $_POST['year'];
$nombre_carrera_autor = $_POST['nombre_carrera_autor'];
$nombres_tutor = $_POST['nombres_tutor'];
$factibilidad = $_POST['factibilidad'];
$archivo_pdf = $_FILES['archivo_pdf'];
$archivo_pdf_resumen = $_FILES['archivo_pdf_resumen'];

// Obtener información del archivo
$nombre_archivo = $archivo_pdf['name'];
$tipo_archivo = $archivo_pdf['type'];
$tamaño_archivo = $archivo_pdf['size'];
$ruta_archivo = $archivo_pdf['tmp_name'];

// Obtener información del archivo del resumen
$nombre_archivo_resumen = $archivo_pdf_resumen['name'];
$tipo_archivo_resumen = $archivo_pdf_resumen['type'];
$tamaño_archivo_resumen = $archivo_pdf_resumen['size'];
$ruta_archivo_resumen = $archivo_pdf_resumen['tmp_name'];

// Prepara la consulta SQL utilizando un prepared statement
$sql = "INSERT INTO teg (titulo_teg, nombres_autor_teg, apellidos_autor_teg, year_teg, correo_autor, nombre_carrera_autor, nombres_tutor, factibilidad, archivo_pdf, archivo_pdf_resumen) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

if ($stmt = mysqli_prepare($conection, $sql)) {
  // Vincula los parámetros a los marcadores de posición de la consulta
  mysqli_stmt_bind_param($stmt, "ssssssssss", $titulo_teg, $nombres_autor_teg, $apellidos_autor_teg, $year_teg, $correo_autor, $nombre_carrera_autor, $nombres_tutor, $factibilidad, $nombre_archivo, $nombre_archivo_resumen); // Cambio realizado en esta línea

  // Verificar si se seleccionó un archivo para el resumen y un archivo principal
  if (!empty($nombre_archivo_resumen) && !empty($nombre_archivo)) {
    // Ruta donde se guardará el archivo del resumen en el servidor
    $directorio_archivos_resumen = '../Admin/PDF_Resumen/'; // Ruta del directorio para los archivos de resumen
    $ruta_destino_resumen = $directorio_archivos_resumen . $nombre_archivo_resumen;

    // Ruta donde se guardará el archivo principal en el servidor
    $directorio_archivos = '../Admin/PDF_TEG/'; // Ruta del directorio para los archivos principales
    $ruta_destino = $directorio_archivos . $nombre_archivo;

    // Mover el archivo del resumen al directorio de destino
    if (move_uploaded_file($ruta_archivo_resumen, $ruta_destino_resumen) && move_uploaded_file($ruta_archivo, $ruta_destino)) {
      // Ejecuta la consulta
      if (mysqli_stmt_execute($stmt)) {
        echo "Registro insertado correctamente";
        header("Location: ../Admin/Admin-panel.php");
      } else {
        echo "Error al ejecutar la consulta";
      }
    } else {
      echo "Error al mover los archivos";
    }
  } else {
    echo "No se seleccionó algún archivo";
  }
} else {
  echo "Error al preparar la consulta SQL";
}

// Cierra la conexión
mysqli_close($conection);
