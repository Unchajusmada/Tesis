<?php
require '../BBDD/connect_user.php';
include '../Auth/funciones_leer_bbdd.php'

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <title>Trabajo Especial de Grado</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />

  <!-- Favicon -->
  <link href="img/unefa.png" rel="icon" />

  <!-- Google Web Fonts -->
  <link href="../Admin/fonts/Poppins-Black.ttf" rel="stylesheet" />

  <!-- Font Awesome -->
  <link rel="stylesheet" href="css/all.css" rel="stylesheet" />

  <!-- Customized Bootstrap Stylesheet -->
  <link href="css/style.css" rel="stylesheet" />
  <link href="css/index.css" rel="stylesheet" />
  <link href="css/extras.css" rel="stylesheet" />
  <link rel="stylesheet" href="../Admin/css/bootstrap-icons-1.11.3/font/bootstrap-icons.css">
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
    <!-- Indice Start -->
    <?php include 'template/indice.php'; ?>
    <!-- Indice End -->

    <?php
    // Obtener el ID_teg de la URL
    $idTeg = $_GET['id_teg'];

    // Obtener los datos del TEG con el mismo ID
    $datos_teg_id = leer_teg($conection, $idTeg);
    foreach ($datos_teg_id as $row) :
    ?>
      <div class="contenedor-medio">
        <div class="container texto-categoria">
          <div class="row">
            <div class="categoria col-md-12 d-flex justify-content-md-center">
              <span><?php echo $row['titulo_teg']; ?></span>
            </div>
          </div>
        </div>

        <div class="ordenar-teg">
          <div class="container texto-teg enlace-teg" data-id-teg="<?php echo $row['ID_teg']; ?>">
            <div class="autor col-md-12">
              <div class="row pl-md-2 justify-content-center justify-content-md-start">
                <span style="font-weight: bold;">Autor:</span>&nbsp;
                <br class="d-block d-md-none">
                <span><?php echo $row['nombres_autor_teg']; ?>, <?php echo $row['apellidos_autor_teg']; ?></span>
              </div>
            </div>
            <div class="autor col-md-12">
              <div class="row pl-md-2 justify-content-center justify-content-md-start">
                <span style="font-weight: bold;">Tutor:</span>&nbsp;
                <br class="d-block d-md-none">
                <span><?php echo $row['nombres_tutor']; ?></span>
              </div>
            </div>
            <div class="carrera col-md-12">
              <div class="row pl-md-2 justify-content-center justify-content-md-start">
                <span style="font-weight: bold;">Carrera:</span>&nbsp;
                <br class="d-block d-md-none">
                <span><?php echo $row['nombre_carrera_autor']; ?></span>
              </div>
            </div>
            <div class="autor col-md-12">
              <div class="row pl-md-2 justify-content-center justify-content-md-start">
                <span style="font-weight: bold;">¿Fue implementado?:</span>&nbsp;
                <br class="d-block d-md-none">
                <span><?php echo strtoupper($row['factibilidad']); ?></span>
              </div>
            </div>
            <div class="row d-flex justify-content-center justify-content-md-end">
              <div class="year">
                <p><span style="font-weight: bold;">Año:</span>&nbsp; <span><?php echo $row['year_teg']; ?></span></p>
              </div>
            </div>

            <div class="resumen col-md-12 pt-2 d-none d-lg-block">
              <div class="row justify-content-center">
                <?php if (!empty($row['archivo_pdf_resumen'])) : ?>
                  <button id="mostrar" class="button-10">Mostrar resumen PDF</button>
                <?php else : ?>
                  <p>Este TEG no tiene un resumen.</p>
                <?php endif; ?>
                <iframe id="iframe-resumen" src="../Admin/PDF_RESUMEN/<?php echo $row['archivo_pdf_resumen']; ?>#toolbar=0"></iframe>
              </div>
            </div>
            <hr class="hr" />
            <div class="contenedor-pdf pt-4">
              <a href="../Admin/PDF_TEG/<?php echo $row['archivo_pdf']; ?>#toolbar=0" target="_blank">
                <span><img src="img/pdf.png" alt=""></span>
                <p>¡Leer TEG completo!</p>
              </a>
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
          <a class="text-light font-weight-semi-bold" href="#">TEG - Sistema de Gestión Administrativa de los Trabajos Especiales de Grado</a>. All Rights Reserved. Designed by
          <a class="text-light font-weight-semi-bold" href="#">Carlos Bruzual</a>
        </p>
      </div>
    </div>
  </div>
  <!-- Footer End -->

  <!-- Back to Top -->
  <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>

  <!-- JavaScript Libraries -->
  <script src="js/jquery-3.7.1.min.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="lib/easing/easing.min.js"></script>

  <!-- Javascript personalizados -->
  <script src="js/main.js"></script>
  <script src="js/filtro-carreras.js"></script>
  <script src="js/indice.js"></script>
  <script src="js/flecha-indice.js"></script>

  <script>
    // Obtener referencia al botón y al iframe
    var botonMostrar = document.getElementById('mostrar');
    var iframeResumen = document.getElementById('iframe-resumen');

    // Variable para realizar el seguimiento del estado actual
    var mostrando = false;

    // Agregar evento click al botón
    botonMostrar.addEventListener('click', function() {
      if (!mostrando) {
        // Si está oculto, mostrar el iframe
        iframeResumen.style.display = 'block'; // O 'inline' dependiendo del caso
        mostrando = true;
        botonMostrar.textContent = 'Ocultar resumen PDF';
      } else {
        // Si está mostrando, ocultar el iframe
        iframeResumen.style.display = 'none';
        mostrando = false;
        botonMostrar.textContent = 'Mostrar resumen PDF';
      }
    });
  </script>
</body>

</html>