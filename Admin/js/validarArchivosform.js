function validarFormulario() {
  var archivoTEG = document.getElementById("archivo_pdf").files[0]
  var archivoResumen = document.getElementById("archivo_pdf_resumen").files[0]
  var maxFileSize = 35 * 1024 * 1024 // 35MB

  if (!archivoTEG) {
    showAlert("Error", "Selecciona el archivo completo del TEG", "warning")
    return false // Detener el envío del formulario
  }

  if (!archivoResumen) {
    showAlert("Error", "Selecciona el archivo del resumen del TEG", "warning")
    return false // Detener el envío del formulario
  }

  if (archivoTEG.size > maxFileSize) {
    showAlert(
      "Error",
      "El archivo del TEG excede el tamaño máximo permitido (35MB)",
      "error"
    )
    return false // Detener el envío del formulario
  }

  if (archivoResumen.size > maxFileSize) {
    showAlert(
      "Error",
      "El archivo del resumen del TEG excede el tamaño máximo permitido (35MB)",
      "error"
    )
    return false // Detener el envío del formulario
  }

  return true // Continuar con el envío del formulario
}

document.querySelector(".user").addEventListener("submit", function (e) {
  if (!validarFormulario()) {
    e.preventDefault() // Detener el envío del formulario si no pasa la validación
  }
})
