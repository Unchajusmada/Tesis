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

// Prepara la consulta SQL utilizando un prepared statement
$sql = "UPDATE teg SET " . implode(", ", $campos) . " WHERE ID_teg = ?";

if ($stmt = mysqli_prepare($conection, $sql)) {
  // Vincula el parámetro del ID_teg al marcador de posición de la consulta
  mysqli_stmt_bind_param($stmt, "i", $ID_teg);

  // Ejecuta la consulta
  if (mysqli_stmt_execute($stmt)) {
    // Verificar si se seleccionó un archivo para el resumen
    if (!empty($_FILES['archivo_pdf_resumen'])) {
      // Obtener información del archivo del resumen
      $archivo_pdf_resumen = $_FILES['archivo_pdf_resumen'];
      $nombre_archivo_resumen = $archivo_pdf_resumen['name'];
      $ruta_archivo_resumen = $archivo_pdf_resumen['tmp_name'];

      // Ruta donde se guardará el archivo del resumen en el servidor
      $directorio_archivos_resumen = '../Admin/PDF_Resumen/'; // Ruta del directorio para los archivos de resumen
      $ruta_destino_resumen = $directorio_archivos_resumen . $nombre_archivo_resumen;

      // Mover el archivo del resumen al directorio de destino
      if (move_uploaded_file($ruta_archivo_resumen, $ruta_destino_resumen)) {
        echo "Archivo de resumen actualizado correctamente";
      } else {
        echo "Error al mover el archivo de resumen";
      }
    }

    // Verificar si se seleccionó un archivo principal
    if (!empty($_FILES['archivo_pdf'])) {
      // Obtener información del archivo principal
      $archivo_pdf = $_FILES['archivo_pdf'];
      $nombre_archivo = $archivo_pdf['name'];
      $ruta_archivo = $archivo_pdf['tmp_name'];

      // Ruta donde se guardará el archivo principal en el servidor
      $directorio_archivos = '../Admin/PDF_TEG/'; // Ruta del directorio para los archivos principales
      $ruta_destino = $directorio_archivos . $nombre_archivo;

      // Mover el archivo principal al directorio de destino
      if (move_uploaded_file($ruta_archivo, $ruta_destino)) {
        echo "Archivo principal actualizado correctamente";
      } else {
        echo "Error al mover el archivo principal";
      }
    }
  } else {
    echo "Error al ejecutar la consulta";
  }
} else {
  echo "Error al preparar la consulta SQL";
}

// Cierra la conexión
mysqli_close($conection);
