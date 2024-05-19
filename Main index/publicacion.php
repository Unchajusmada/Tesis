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
  <link href="img/unefa.png" rel="icon" />

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
  <!-- Topbar End -->

  <!-- Navbar Start -->
  <?php include 'template/navbar.php'; ?>
  <!-- Navbar End -->

  <main>
    <!--ESTE ES TU INDICE, MEETELE EL CONTENIDO QUE QUIERAS-->
    <div class="indice d-lg-block d-none">
      <aside id="menu">
        <h3>Organizar por:</h3>
        <ul>
          <li><a href="autor.php" class="a-indice">Autor</a></li>
          <li><a href="publicacion.php" class="a-indice">Año</a></li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" id="carrera-link" data-toggle="dropdown">Carrera</a>
            <div class="dropdown-menu rounded-0 m-0">
              <a href="carreras.php?carrera=Aeronautica" class="dropdown-item">Ing. Aeronautica</a>
              <a href="carreras.php?carrera=Civil" class="dropdown-item">Ing. Civil</a>
              <a href="carreras.php?carrera=Electrica" class="dropdown-item">Ing. Electrica</a>
              <a href="carreras.php?carrera=Electronica" class="dropdown-item">Ing. Electronica</a>
              <a href="carreras.php?carrera=Sistemas" class="dropdown-item">Ing. de <br>Sistemas</a>
              <a href="carreras.php?carrera=Telecom" class="dropdown-item">Ing. de <br>Telecomunicaciones</a>
            </div>
          </li>
          <li><a href="titulo.php" class="a-indice">Título</a></li>
          <li><a href="tutor.php" class="a-indice">Tutor</a></li>
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
          <div class="clasificar"><span style="font-size: 1.8em; color: white; text-shadow: black 3px 3px 3px; font-weight: bold;"><?php echo $row['year_teg']; ?></span>
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
              <div class="row d-flex justify-content-md-end">
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

  <!-- Footer Start -->
  <div class="container-fluid text-dark">
    <div class="row footer py-4">
      <div class="col-md-12 px-xl-0">
        <p class="mb-md-0 text-center text-md-center text-light">
          &copy;
          <a class="text-light font-weight-semi-bold" href="#">Your Site Name</a>. All Rights Reserved. Designed by
          <a class="text-light font-weight-semi-bold" href="#">Carlos Bruzual</a>
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
      document.getElementById("carrera-link").addEventListener("click", function(e) {
        e.preventDefault();
        var carreraSelect = document.getElementById("carrera");
        if (carreraSelect.style.display === "none") {
          carreraSelect.style.display = "block";
        } else {
          carreraSelect.style.display = "none";
        }
      });
    });
  </script>

  <script>
    // Obtener todos los elementos con la clase "enlace-teg"
    var tegDivs = document.getElementsByClassName('enlace-teg');

    // Agregar el evento de clic a cada elemento
    for (var i = 0; i < tegDivs.length; i++) {
      tegDivs[i].addEventListener('click', function() {
        // Obtener el ID_teg del elemento actual
        var idTeg = this.getAttribute('data-id-teg');

        // Redireccionar al usuario a paginaTeg.php con el ID_teg como parámetro
        var url = 'paginaTeg.php?id_teg=' + idTeg;
        window.location.href = url;
      });
    }
  </script>
</body>

</html>