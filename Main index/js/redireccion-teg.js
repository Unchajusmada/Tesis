// Obtener todos los elementos con la clase "enlace-teg"
var tegDivs = document.getElementsByClassName("enlace-teg")

// Agregar el evento de clic a cada elemento
for (var i = 0; i < tegDivs.length; i++) {
  tegDivs[i].addEventListener("click", function () {
    // Obtener el ID_teg del elemento actual
    var idTeg = this.getAttribute("data-id-teg")

    // Verificar si idTeg es null antes de redireccionar
    if (idTeg !== null) {
      // Redireccionar al usuario a paginaTeg.php con el ID_teg como parámetro
      var url = "paginaTeg.php?id_teg=" + idTeg
      window.location.href = url
    }
  })
}
