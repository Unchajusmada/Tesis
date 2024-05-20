// Obtener el botón y el elemento <i> por su ID
var botonIndice = document.getElementById("boton-indice")
var iconoIndice = document.getElementById("icono-indice")

// Agregar un evento de clic al botón
botonIndice.addEventListener("click", function () {
  // Cambiar la clase del elemento <i>
  if (iconoIndice.classList.contains("bi-arrow-bar-left")) {
    iconoIndice.classList.remove("bi-arrow-bar-left")
    iconoIndice.classList.add("bi-arrow-bar-right")
  } else {
    iconoIndice.classList.remove("bi-arrow-bar-right")
    iconoIndice.classList.add("bi-arrow-bar-left")
  }
})
