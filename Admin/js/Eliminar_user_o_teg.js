function showConfirmationTEG() {
  Swal.fire({
    title: "¿Estás seguro?",
    text: "Esta acción eliminará al usuario permanentemente.",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#d33",
    cancelButtonColor: "#3085d6",
    confirmButtonText: "Sí, eliminar",
    cancelButtonText: "Cancelar",
  }).then((result) => {
    if (result.isConfirmed) {
      // Si el usuario confirma, establece el valor del campo oculto "eliminar" en 1 y envía el formulario
      document.getElementById("eliminarTEG").value = "1"
      document.getElementById("eliminarTEGForm").submit()
    }
  })
}

function showConfirmationUSER() {
  Swal.fire({
    title: "¿Estás seguro?",
    text: "Esta acción eliminará al usuario permanentemente.",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#d33",
    cancelButtonColor: "#3085d6",
    confirmButtonText: "Sí, eliminar",
    cancelButtonText: "Cancelar",
  }).then((result) => {
    if (result.isConfirmed) {
      // Si el usuario confirma, establece el valor del campo oculto "eliminar" en 1 y envía el formulario
      document.getElementById("eliminar").value = "1"
      document.getElementById("eliminarForm").submit()
    }
  })
}
