document.addEventListener("DOMContentLoaded", function () {
  document
    .getElementById("carrera-link")
    .addEventListener("click", function (e) {
      e.preventDefault()
      var carreraSelect = document.getElementById("carrera")
      if (carreraSelect.style.display === "none") {
        carreraSelect.style.display = "block"
      } else {
        carreraSelect.style.display = "none"
      }
    })
})
