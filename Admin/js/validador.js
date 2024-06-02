$(document).ready(function () {
  // Evento de cambio del campo de usuario
  $("#user").on("change", function () {
    var user = $(this).val()
    if (user !== "") {
      // Realizar solicitud AJAX para verificar el usuario
      $.ajax({
        url: "../Auth_admin/verificar_usuario.php", // Ruta al archivo PHP que realizará la verificación
        method: "POST",
        data: {
          user: user,
        },
        success: function (response) {
          if (response === "existe") {
            $("#userError").text("Este usuario ya está en uso")
            disableSubmitButton()
          } else {
            $("#userError").text("")
            enableSubmitButton()
          }
        },
      })
    }
  })

  // Evento de cambio del campo de cédula
  $("#cedula").on("change", function () {
    var cedula = $(this).val()
    if (cedula !== "") {
      // Realizar solicitud AJAX para verificar la cédula
      $.ajax({
        url: "../Auth_admin/verificar_usuario.php", // Ruta al archivo PHP que realizará la verificación
        method: "POST",
        data: {
          cedula: cedula,
        },
        success: function (response) {
          if (response === "existe") {
            $("#cedulaError").text("Esta cédula ya está en uso")
            disableSubmitButton()
          } else {
            $("#cedulaError").text("")
            enableSubmitButton()
          }
        },
      })
    }
  })

  function disableSubmitButton() {
    $('button[type="submit"]').prop("disabled", true)
  }

  function enableSubmitButton() {
    $('button[type="submit"]').prop("disabled", false)
  }
})
