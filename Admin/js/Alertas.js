// Función para mostrar una alerta de SweetAlert
function showAlert(title, text, icon) {
  Swal.fire({
    title: title,
    text: text,
    icon: icon,
    confirmButtonText: "Continuar",
  })
}

function mostrarAlertaPass() {
  Swal.fire({
    icon: "warning",
    title: "¡Atención!",
    text: "Ponte en contacto con el administrador de la página para obtener ayuda",
    confirmButtonText: "Aceptar",
  })
}

function codigosAlerta(Code) {
  // Evalúa el código de error y muestra la alerta correspondiente
  switch (Code) {
    case "0":
      showAlert("¡Exito!", "Registro de TEG realizado con exito", "success")
      break
    case "1":
      showAlert("¡Exito!", "Registro de usuario realizado con exito", "success")
      break
    case "2":
      showAlert(
        "¡Exito!",
        "Actualización de TEG realizada con exito",
        "success"
      )
      break
    case "3":
      showAlert(
        "¡Exito!",
        "Actualización de usuario realizada con exito",
        "success"
      )
      break
    case "4":
      showAlert(
        "¡Exito!",
        "Actualización de TEG y archivos PDF realizada con exito",
        "success"
      )
      break
    case "9":
      showAlert("¡Exito!", "TEG eliminado con exito", "warning")
      break
    case "10":
      showAlert("¡Exito!", "Usuario eliminado con exito", "warning")
      break
    case "100":
      showAlert(
        "Error",
        "Faltaron campos por llenar al registrar al usuario",
        "error"
      )
      break
    case "101":
      showAlert("Error", "Las contraseñas no coinciden", "error")
      break
    case "400":
      showAlert("Error", "Error al preparar la consulta SQL", "error")
      break
    case "403":
      showAlert("Error", "Contraseña incorrecta", "error")
      break
    case "404":
      showAlert("Error", "Usuario no encontrado", "error")
      break
    case "500":
      showAlert("Error", "Error al ejecutar la consulta", "error")
      break
    case "501":
      showAlert("Error", "Error al mover los archivos", "error")
      break
    case "502":
      showAlert("Error", "No se seleccionó algún archivo", "error")
      break
    default:
      break
  }
}
