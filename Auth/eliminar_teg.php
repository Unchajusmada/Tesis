<?php
require '../BBDD/connect_user.php';

// Eliminación de TEG
if (!empty($_POST['eliminarTEG'])) {
  // Obtén el ID del TEG a eliminar
  $idTeg = $_POST['teg-eliminar'];
  $directorio_archivos_teg = '../Admin/PDF_TEG/';
  $directorio_archivos_resumen = '../Admin/PDF_RESUMEN/';

  // Prepara la consulta SQL para obtener las rutas de los archivos PDF
  $sql = "SELECT archivo_pdf, archivo_pdf_resumen FROM teg WHERE ID_teg = ?";

  if ($stmt = mysqli_prepare($conection, $sql)) {
    mysqli_stmt_bind_param($stmt, "i", $idTeg);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $archivoPdf, $archivoPdfResumen);

    if (mysqli_stmt_fetch($stmt)) {
      // Elimina los archivos PDF
      if (!empty($archivoPdf) && file_exists($directorio_archivos_teg . $archivoPdf)) {
        unlink($directorio_archivos_teg . $archivoPdf);
      }
      if (!empty($archivoPdfResumen) && file_exists($directorio_archivos_resumen . $archivoPdfResumen)) {
        unlink($directorio_archivos_resumen . $archivoPdfResumen);
      }
    }

    mysqli_stmt_close($stmt);
  }

  // Prepara la consulta SQL para eliminar el TEG
  $sql = "DELETE FROM teg WHERE ID_teg = ?";

  if ($stmt = mysqli_prepare($conection, $sql)) {
    mysqli_stmt_bind_param($stmt, "i", $idTeg);

    if (mysqli_stmt_execute($stmt)) {
      // Redirige a la página de administración con un código de éxito
      header("Location: ../Admin/Admin-panel.php?code=9");
      exit();
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
