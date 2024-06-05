function showConfirmationTEG(formTEGId) {
  Swal.fire({
    title: "¿Estás seguro?",
    text: "Esta acción eliminará al TEG permanentemente.",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#d33",
    cancelButtonColor: "#3085d6",
    confirmButtonText: "Sí, eliminar",
    cancelButtonText: "Cancelar",
  }).then((result) => {
    if (result.isConfirmed) {
      // Si el usuario confirma, establece el valor del campo oculto "eliminar" en 1 y envía el formulario
      document.getElementById(formTEGId).querySelector("#eliminarTEG").value =
        "1"
      document.getElementById(formTEGId).submit()
    }
  })
}

function showConfirmationUSER(formId) {
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
      document.getElementById(formId).querySelector("#eliminar").value = "1"
      document.getElementById(formId).submit()
    }
  })
}
