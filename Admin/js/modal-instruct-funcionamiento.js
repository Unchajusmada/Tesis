// Esperar a que el documento esté listo
$(document).ready(function () {
  // Mostrar el modal al cargar la página
  $("#instruccionesModal").modal("show")

  // Variables para controlar el estado del modal
  var pasoActual = 1
  var totalPasos = 4

  // Función para mostrar el paso actual
  function mostrarPaso(paso) {
    // Ocultar todos los pasos
    for (var i = 1; i <= totalPasos; i++) {
      $("#paso" + i).hide()
    }

    // Mostrar el paso actual
    $("#paso" + paso).show()

    // Mostrar u ocultar los botones según el paso actual
    if (paso === 1) {
      $("#siguienteBtn").show()
      $("#anteriorBtn").hide()
      $("#finalizarBtn").hide()
      $("#omitirBtn").show()
    } else if (paso === totalPasos) {
      $("#siguienteBtn").hide()
      $("#anteriorBtn").show()
      $("#finalizarBtn").show()
      $("#omitirBtn").hide()
    } else {
      $("#siguienteBtn").show()
      $("#anteriorBtn").show()
      $("#finalizarBtn").hide()
      $("#omitirBtn").hide()
    }
  }

  // Mostrar el primer paso al cargar el modal
  mostrarPaso(pasoActual)

  // Acción al hacer clic en el botón "Siguiente"
  $("#siguienteBtn").click(function () {
    if (pasoActual < totalPasos) {
      pasoActual++
      mostrarPaso(pasoActual)
    }
  })

  // Acción al hacer clic en el botón "Anterior"
  $("#anteriorBtn").click(function () {
    if (pasoActual > 1) {
      pasoActual--
      mostrarPaso(pasoActual)
    }
  })

  // Acción al hacer clic en el botón "Omitir"
  $("#omitirBtn").click(function () {
    // Cerrar el modal
    $("#instruccionesModal").modal("hide")

    // Aquí puedes agregar la lógica para realizar cualquier acciónadicional después de omitir las instrucciones
  })

  // Acción al hacer clic en el botón "Finalizar"
  $("#finalizarBtn").click(function () {
    // Cerrar el modal
    $("#instruccionesModal").modal("hide")
  })
})
