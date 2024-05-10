;(function ($) {
  "use strict" // Inicio de uso estricto

  // Función para cerrar la barra lateral cuando el ancho de la ventana sea menor que 480px
  function closeSidebar() {
    if ($(window).width() < 480 && !$(".sidebar").hasClass("toggled")) {
      $("body").addClass("sidebar-toggled")
      $(".sidebar").addClass("toggled")
      $(".sidebar .collapse").collapse("hide")
    }
  }

  // Llamar a la función para cerrar la barra lateral al cargar la página
  $(document).ready(function () {
    closeSidebar()
  })

  // Llamar a la función para cerrar la barra lateral al redimensionar la ventana
  $(window).resize(function () {
    closeSidebar()
    if ($(window).width() < 768) {
      $(".sidebar .collapse").collapse("hide")
    }
  })

  // Toggle the side navigation
  $("#sidebarToggle, #sidebarToggleTop").on("click", function (e) {
    $("body").toggleClass("sidebar-toggled")
    $(".sidebar").toggleClass("toggled")
    if ($(".sidebar").hasClass("toggled")) {
      $(".sidebar .collapse").collapse("hide")
    }
  })

  // Prevent the content wrapper from scrolling when the fixed side navigation hovered over
  $("body.fixed-nav .sidebar").on(
    "mousewheel DOMMouseScroll wheel",
    function (e) {
      if ($(window).width() > 768) {
        var e0 = e.originalEvent,
          delta = e0.wheelDelta || -e0.detail
        this.scrollTop += (delta < 0 ? 1 : -1) * 30
        e.preventDefault()
      }
    }
  )

  // Scroll to top button appear
  $(document).on("scroll", function () {
    var scrollDistance = $(this).scrollTop()
    if (scrollDistance > 100) {
      $(".scroll-to-top").fadeIn()
    } else {
      $(".scroll-to-top").fadeOut()
    }
  })

  // Smooth scrolling using jQuery easing
  $(document).on("click", "a.scroll-to-top", function (e) {
    var $anchor = $(this)
    $("html, body")
      .stop()
      .animate(
        {
          scrollTop: $($anchor.attr("href")).offset().top,
        },
        1000,
        "easeInOutExpo"
      )
    e.preventDefault()
  })
})(jQuery) // Fin de uso estricto
