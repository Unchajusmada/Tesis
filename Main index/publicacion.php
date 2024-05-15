<?php
require '../BBDD/connect_user.php';
include '../Auth/leer_bbdd.php'

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <title>Organizar por: AÑO</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />

  <!-- Favicon -->
  <link href="img/favicon.ico" rel="icon" />

  <!-- Google Web Fonts -->
  <link rel="preconnect" href="https://fonts.gstatic.com" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet" />

  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet" />

  <!-- Libraries Stylesheet -->
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet" />

  <!-- Customized Bootstrap Stylesheet -->
  <link href="css/style.css" rel="stylesheet" />
  <link href="css/index.css" rel="stylesheet" />
</head>

<body>
  <!-- Topbar Start -->
  <div class="container-fluid">
    <div class="row align-items-center d-none py-3 px-xl-5">

      <div class="col-lg-3 d-none d-lg-block">
        <a href="#" class="text-decoration-none">
          <h1 class="m-0 display-5 font-weight-semi-bold">
            <span class="text-primary font-weight-bold border px-1 mr-1">U</span>NEFA
          </h1>
        </a>
      </div>
    </div>
  </div>
  <!-- Topbar End -->

  <div class="bg-primary text-white container pt-2 pb-2 pl-4 pr-4">
    <div class="d-flex justify-content-between">
      <div class="align-self-start ml-10">
        <img class="logos" src="img/defensa logo.png" />
      </div>
      <div class="align-self-end">
        <img class="logos" src="img/unefa.png" alt="" />
      </div>
    </div>
  </div>

  <!-- Navbar Start -->
  <div class="contenedor-navbar">
    <div class="row px-xl-5">
      <div class="col-lg-12">
        <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
          <a href="" class="text-decoration-none d-block d-lg-none">
            <h1 class="m-0 display-5 font-weight-semi-bold">
              <span class="text-primary font-weight-bold border px-1 mr-1">U</span>NEFA
            </h1>
          </a>
          <div class="col-lg-6 col-6 text-left d-lg-none d-block">
            <form action="">
              <div class="input-group">
                <input type="text" class="form-control" placeholder="¿Que deseas encontrar?" />
                <div class="input-group-append">
                  <span class="input-group-text bg-transparent text-primary">
                    <i class="fa fa-search"></i>
                  </span>
                </div>
              </div>
            </form>
          </div>
          <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
            <div class="navbar-nav mr-auto py-0">
              <a href="index.php" class="nav-item nav-link pl-4 pl-md-4 pr-md-4">Inicio</a>
              <a href="todas.php" class="nav-item nav-link pl-4 pl-md-4 pr-md-4">Todas</a>
              <div class="nav-item dropdown d-block d-lg-none pl-4 pl-md-2">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Categorias</a>
                <div class="dropdown-menu rounded-0 m-0">
                  <a href="autor.php" class="dropdown-item">Autor</a>
                  <a href="publicacion.php" class="dropdown-item">Año</a>
                  <a href="titulo.php" class="dropdown-item">Titulo</a>
                </div>
              </div>
              <div class="nav-item dropdown d-block d-lg-none pl-4 pl-md-2">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Carreras</a>
                <div class="dropdown-menu rounded-0 m-0">
                  <a href="cart.html" class="dropdown-item">Ing Sistemas</a>
                  <a href="publicacion.php" class="dropdown-item">Ing Telecom</a>
                  <a href="#" class="dropdown-item">Ing Electrica</a>
                  <a href="#" class="dropdown-item">Ing Civil</a>
                </div>
              </div>
              <a href="contact.html" class="nav-item nav-link pl-4 pl-md-4">Contacto</a>
            </div>
            <div class="col-lg-6 col-6 text-left d-lg-block d-none">
              <form action="">
                <div class="input-group">
                  Buscar
                  <input type="text" class="form-control" placeholder="¿Que deseas encontrar?" />
                  <div class="input-group-append">
                    <span class="input-group-text bg-transparent text-primary">
                      <i class="fa fa-search"></i>
                    </span>
                  </div>
                </div>
              </form>
            </div>
            <div class="navbar-nav ml-auto py-0">
              <a href="../Admin/Paginas/login.html" class="nav-item nav-link pl-4 pl-md-2">Cargar</a>
            </div>
          </div>
        </nav>
      </div>
    </div>
  </div>
  <!-- Navbar End -->

  <main>
    <!--ESTE ES TU INDICE, MEETELE EL CONTENIDO QUE QUIERAS-->
    <div class="indice d-lg-block d-none">
      <aside id="menu">
        <h3>Organizar por:</h3>
        <ul>
          <li><a href="autor.php" class="a-indice">Autor</a></li>
          <li><a href="publicacion.php" class="a-indice">Año</a></li>
          <li><a href="titulo.php" class="a-indice">Título</a></li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" id="carrera-link" data-toggle="dropdown">Carrera</a>
            <div class="dropdown-menu rounded-0 m-0">
              <a href="cart.html" class="dropdown-item">Ing Sistemas</a>
              <a href="publicacion.php" class="dropdown-item">Ing Telecom</a>
              <a href="#" class="dropdown-item">Ing Electrica</a>
              <a href="#" class="dropdown-item">Ing Civil</a>
            </div>
          </li>
        </ul>
      </aside>
    </div>

    <!--ESTE EES TU CONTENEDOR MEDIO, MEETELE EL CONTENIDO QUE QUIERAS-->
    <div class="contenedor-medio">
      <div class="container texto-categoria">
        <div class="row">
          <div class="categoria col-md-12 d-flex justify-content-md-center">
            <span>Organizar por Año de Publicación</span>
          </div>
        </div>
      </div>
      <div class="ordenar">
        <?php
        // Función de comparación para ordenar por año de publicación
        function compararPorYearTeg($a, $b)
        {
          return $a['year_teg'] - $b['year_teg'];
        }

        $datos_teg = leer($conection);

        // Ordenar el arreglo $datos_teg por año de publicación
        usort($datos_teg, 'compararPorYearTeg');

        foreach ($datos_teg as $row) :
        ?>
          <div class="clasificar"><span style="font-size: 1.5em;"><?php echo $row['year_teg']; ?></span>
            <div class="container texto enlace-teg" data-id-teg="<?php echo $row['ID_teg']; ?>">
              <div class="row">
                <div class="cabezera col-md-12 d-none d-md-flex justify-content-md-center">
                  <p>Titulo:</p>
                </div>
                <br />
                <div class="titulo col-md-12 d-flex justify-content-md-center">
                  <span><?php echo $row['titulo_teg']; ?></span>
                </div>
              </div>
              <div class="row">
                <div class="autor col-md-6">
                  <div class="row-md-6 d-flex justify-content-md-start pl-md-2">Autor: </div>
                  <div class="row-md-6 d-flex justify-content-md-start pl-md-2">
                    <span><?php echo $row['nombres_autor_teg']; ?>,
                      <br class="d-none d-md-block">
                      <?php echo $row['apellidos_autor_teg']; ?></span>
                  </div>
                </div>
                <div class="carrera col-md-6">
                  <div class="row-md-6 d-flex justify-content-md-start">Carrera:</div>
                  <div class="row-md-6 d-flex justify-content-md-start"><span><?php echo $row['nombre_carrera_autor']; ?></span></div>
                </div>
              </div>
              <div class="row">
                <div class="year col-md-6 d-flex justify-content-md-end">
                  <p>Año: <span><?php echo $row['year_teg']; ?></span></p>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </main>

  <!-- Vendor Start
    <div class="container-fluid py-5">
      <div class="row px-xl-5">
        <div class="col">
          <div class="owl-carousel vendor-carousel">
            <div class="vendor-item border p-4">
              <img src="img/vendor-1.jpg" alt="" />
            </div>
            <div class="vendor-item border p-4">
              <img src="img/vendor-2.jpg" alt="" />
            </div>
            <div class="vendor-item border p-4">
              <img src="img/vendor-3.jpg" alt="" />
            </div>
            <div class="vendor-item border p-4">
              <img src="img/vendor-4.jpg" alt="" />
            </div>
            <div class="vendor-item border p-4">
              <img src="img/vendor-5.jpg" alt="" />
            </div>
            <div class="vendor-item border p-4">
              <img src="img/vendor-6.jpg" alt="" />
            </div>
            <div class="vendor-item border p-4">
              <img src="img/vendor-7.jpg" alt="" />
            </div>
            <div class="vendor-item border p-4">
              <img src="img/vendor-8.jpg" alt="" />
            </div>
          </div>
        </div>
      </div>
    </div>
    Vendor End -->

  <!-- Footer Start -->
  <div class="container-fluid bg-secondary text-dark mt-5 pt-5">
    <!-- <div class="row px-xl-5 pt-5">
        <div class="col-lg-4 col-md-12 mb-5 pr-3 pr-xl-5">
          <a href="#" class="text-decoration-none">
            <h1 class="mb-4 display-5 font-weight-semi-bold">
              <span
                class="text-primary font-weight-bold border border-white px-3 mr-1"
                >E</span
              >Shopper
            </h1>
          </a>
          <p>
            Dolore erat dolor sit lorem vero amet. Sed sit lorem magna, ipsum no
            sit erat lorem et magna ipsum dolore amet erat.
          </p>
          <p class="mb-2">
            <i class="fa fa-map-marker-alt text-primary mr-3"></i>123 Street,
            New York, USA
          </p>
          <p class="mb-2">
            <i class="fa fa-envelope text-primary mr-3"></i>info@example.com
          </p>
          <p class="mb-0">
            <i class="fa fa-phone-alt text-primary mr-3"></i>+012 345 67890
          </p>
        </div>
        <div class="col-lg-8 col-md-12">
          <div class="row">
            <div class="col-md-4 mb-5">
              <h5 class="font-weight-bold text-dark mb-4">Quick Links</h5>
              <div class="d-flex flex-column justify-content-start">
                <a class="text-dark mb-2" href="index.html"
                  ><i class="fa fa-angle-right mr-2"></i>Home</a
                >
                <a class="text-dark mb-2" href="shop.html"
                  ><i class="fa fa-angle-right mr-2"></i>Our Shop</a
                >
                <a class="text-dark mb-2" href="detail.html"
                  ><i class="fa fa-angle-right mr-2"></i>Shop Detail</a
                >
                <a class="text-dark mb-2" href="cart.html"
                  ><i class="fa fa-angle-right mr-2"></i>Shopping Cart</a
                >
                <a class="text-dark mb-2" href="publicacion.php"
                  ><i class="fa fa-angle-right mr-2"></i>Checkout</a
                >
                <a class="text-dark" href="contact.html"
                  ><i class="fa fa-angle-right mr-2"></i>Contact Us</a
                >
              </div>
            </div>
            <div class="col-md-4 mb-5">
              <h5 class="font-weight-bold text-dark mb-4">Quick Links</h5>
              <div class="d-flex flex-column justify-content-start">
                <a class="text-dark mb-2" href="index.html"
                  ><i class="fa fa-angle-right mr-2"></i>Home</a
                >
                <a class="text-dark mb-2" href="shop.html"
                  ><i class="fa fa-angle-right mr-2"></i>Our Shop</a
                >
                <a class="text-dark mb-2" href="detail.html"
                  ><i class="fa fa-angle-right mr-2"></i>Shop Detail</a
                >
                <a class="text-dark mb-2" href="cart.html"
                  ><i class="fa fa-angle-right mr-2"></i>Shopping Cart</a
                >
                <a class="text-dark mb-2" href="publicacion.php"
                  ><i class="fa fa-angle-right mr-2"></i>Checkout</a
                >
                <a class="text-dark" href="contact.html"
                  ><i class="fa fa-angle-right mr-2"></i>Contact Us</a
                >
              </div>
            </div>
            <div class="col-md-4 mb-5">
              <h5 class="font-weight-bold text-dark mb-4">Newsletter</h5>
              <form action="">
                <div class="form-group">
                  <input
                    type="text"
                    class="form-control border-0 py-4"
                    placeholder="Your Name"
                    required="required"
                  />
                </div>
                <div class="form-group">
                  <input
                    type="email"
                    class="form-control border-0 py-4"
                    placeholder="Your Email"
                    required="required"
                  />
                </div>
                <div>
                  <button
                    class="btn btn-primary btn-block border-0 py-3"
                    type="submit"
                  >
                    Subscribe Now
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div> -->
    <div class="row border-top border-light mx-xl-5 py-4">
      <div class="col-md-6 px-xl-0">
        <p class="mb-md-0 text-center text-md-left text-dark">
          &copy;
          <a class="text-dark font-weight-semi-bold" href="#">Your Site Name</a>. All Rights Reserved. Designed by
          <a class="text-dark font-weight-semi-bold" href="https://htmlcodex.com">HTML Codex</a>
        </p>
      </div>
    </div>
  </div>
  <!-- Footer End -->

  <!-- Back to Top -->
  <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>

  <!-- JavaScript Libraries -->
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/owlcarousel/owl.carousel.min.js"></script>

  <!-- Contact Javascript File -->
  <script src="mail/jqBootstrapValidation.min.js"></script>
  <script src="mail/contact.js"></script>

  <!-- Template Javascript -->
  <script src="js/main.js"></script>
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      document
        .getElementById("carrera-link")
        .addEventListener("click", function(e) {
          e.preventDefault()
          var carreraSelect = document.getElementById("carrera")
          if (carreraSelect.style.display === "none") {
            carreraSelect.style.display = "block"
          } else {
            carreraSelect.style.display = "none"
          }
        })
    })
  </script>

  <script>
    // Obtener todos los elementos con la clase "enlace-teg"
    var tegDivs = document.getElementsByClassName('enlace-teg');

    // Agregar el evento de clic a cada elemento
    for (var i = 0; i < tegDivs.length; i++) {
      tegDivs[i].addEventListener('click', function() {
        // Obtener el ID_teg del elemento actual
        var idTeg = this.getAttribute('data-id-teg');

        // Construir la URL con el ID_teg y redireccionar al usuario
        var url = 'https://www.ejemplo.com/' + idTeg;
        window.location.href = url;
      });
    }
  </script>
</body>

</html>