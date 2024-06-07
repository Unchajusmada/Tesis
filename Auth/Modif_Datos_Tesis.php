<?php
// Verifica el tamaño del contenido POST
$contentLength = $_SERVER['CONTENT_LENGTH'];
$maxContentLength = 41943040; // 40MB

if ($contentLength > $maxContentLength) {
  header("Location: ../Admin/Admin-panel.php?code=600");
  // Puedes redirigir al usuario a una página de error o mostrar un mensaje adecuado.
  exit;
}

// Resto del código
require '../BBDD/connect_user.php';

// Obtén los valores que deseas actualizar en la tabla teg
$ID_teg = $_POST['ID_teg'];

// Crea un array para almacenar los campos que se van a actualizar
$campos = array();

if (!empty($_POST['titulo'])) {
  $titulo_teg = htmlspecialchars($_POST['titulo']);
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
  $correo_autor = htmlspecialchars($_POST['correo']);
  $campos[] = "correo_autor = '$correo_autor'";
}

if (!empty($_POST['year'])) {
  $year_teg = $_POST['year'];
  $campos[] = "year_teg = '$year_teg'";
}

if (!empty($_POST['nombre_carrera_autor'])) {
  $nombre_carrera_autor = htmlspecialchars($_POST['nombre_carrera_autor']);
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

// Obtén los nombres de los archivos actuales desde la base de datos
$sql = "SELECT archivo_pdf, archivo_pdf_resumen FROM teg WHERE ID_teg = ?";
if ($stmt = mysqli_prepare($conection, $sql)) {
  mysqli_stmt_bind_param($stmt, "i", $ID_teg);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_bind_result($stmt, $archivo_pdf_actual, $archivo_pdf_resumen_actual);
  mysqli_stmt_fetch($stmt);
  mysqli_stmt_close($stmt);
}

// Manejo de los archivos PDF
$pdf_update = false;
if (isset($_FILES['archivo_pdf']) && $_FILES['archivo_pdf']['error'] == UPLOAD_ERR_OK) {
  $archivo_pdf = $_FILES['archivo_pdf'];
  $nombre_archivo = $archivo_pdf['name'];
  $ruta_archivo = $archivo_pdf['tmp_name'];
  $directorio_archivos = '../Admin/PDF_TEG/';
  $ruta_destino = $directorio_archivos . $nombre_archivo;

  // Eliminar el archivo PDF actual del servidor
  if (!empty($archivo_pdf_actual) && file_exists($directorio_archivos . $archivo_pdf_actual)) {
    unlink($directorio_archivos . $archivo_pdf_actual);
  }

  if (move_uploaded_file($ruta_archivo, $ruta_destino)) {
    $campos[] = "archivo_pdf = '$nombre_archivo'";
    $pdf_update = true;
  } else {
    header("Location: ../Admin/Admin-panel.php?code=501"); // Error al mover el archivo
    exit();
  }
}

$pdf_update_resumen = false;
if (isset($_FILES['archivo_pdf_resumen']) && $_FILES['archivo_pdf_resumen']['error'] == UPLOAD_ERR_OK) {
  $archivo_pdf_resumen = $_FILES['archivo_pdf_resumen'];
  $nombre_archivo_resumen = $archivo_pdf_resumen['name'];
  $ruta_archivo_resumen = $archivo_pdf_resumen['tmp_name'];
  $directorio_archivos_resumen = '../Admin/PDF_Resumen/';
  $ruta_destino_resumen = $directorio_archivos_resumen . $nombre_archivo_resumen;

  // Eliminar el archivo PDF de resumen actual del servidor
  if (!empty($archivo_pdf_resumen_actual) && file_exists($directorio_archivos_resumen . $archivo_pdf_resumen_actual)) {
    unlink($directorio_archivos_resumen . $archivo_pdf_resumen_actual);
  }

  if (move_uploaded_file($ruta_archivo_resumen, $ruta_destino_resumen)) {
    $campos[] = "archivo_pdf_resumen = '$nombre_archivo_resumen'";
    $pdf_update = true;
  } else {
    header("Location: ../Admin/Admin-panel.php?code=501"); // Error al mover el archivo
    exit();
  }
}

// Manejo de la actualización de TEG
if (!empty($campos)) {
  $sql = "UPDATE teg SET " . implode(", ", $campos) . " WHERE ID_teg = ?";

  if ($stmt = mysqli_prepare($conection, $sql)) {
    mysqli_stmt_bind_param($stmt, "i", $ID_teg);

    if (mysqli_stmt_execute($stmt)) {
      if ($pdf_update) {
        header("Location: ../Admin/Admin-panel.php?code=4");
      } else {
        header("Location: ../Admin/Admin-panel.php?code=2");
      }
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
