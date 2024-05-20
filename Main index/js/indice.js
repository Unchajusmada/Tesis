const boton = document.getElementById("boton-indice")
const indice = document.getElementById("menu")
const tamañoIndice = document.getElementById("indice")
const alinearBoton = document.getElementById("contenedor-boton")

boton.addEventListener("click", () => {
  tamañoIndice.classList.toggle("a-crecer")
  indice.classList.toggle("ocultar")
  alinearBoton.classList.toggle("contenedor-boton")
})
