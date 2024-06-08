<?php
require 'BBDD/connect_user.php';
include 'Auth/funciones_leer_bbdd.php';

// Obtener los datos de la base de datos
$datos_teg = leer($conection);

// Definir el número de elementos por página
$elementos_por_pagina = 6;

// Obtener el número total de páginas
$total_paginas = ceil(count($datos_teg) / $elementos_por_pagina);

// Obtener el número de página actual
$pagina_actual = isset($_GET['pagina']) ? $_GET['pagina'] : 1;

// Obtener los elementos correspondientes a la página actual
$elementos_pagina = array_chunk($datos_teg, $elementos_por_pagina)[$pagina_actual - 1];

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <title>SIATEG - UNEFA ARAGUA</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />

  <!-- Favicon -->
  <link href="Main index/img/unefa.png" rel="icon" />

  <!-- Google Web Fonts -->
  <link href="Admin/fonts/Poppins-Black.ttf" rel="stylesheet" />

  <!-- Customized Bootstrap Stylesheet -->
  <link href="Main index/css/style.css" rel="stylesheet" />
  <link href="Main index/css/index.css" rel="stylesheet" />
  <link href="Main index/css/carrusel.css" rel="stylesheet" />
  <link href="Main index/css/extras.css" rel="stylesheet" />
  <link rel="stylesheet" href="Main index/css/all.css" rel="stylesheet" />
  <link rel="stylesheet" href="Admin/css/bootstrap-icons-1.11.3/font/bootstrap-icons.css">
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
      <div class="align-self-right logos">
        <img class="logos" src="Main index/img/defensa logo.png" alt="Unefa Logo" />
      </div>
      <div class="banner d-lg-block d-none" style="margin: auto;">
        <h2 class="h2 text-center" style="color: white; text-shadow: black 1px 5px 10px; font-weight: bold; margin: 0;">
          UNIVERSIDAD NACIONAL EXPERIMENTAL DE LAS FUERZAS ARMADAS<br>
          MARACAY - NÚCLEO ARAGUA<br>
          EXCELENCIA EDUCATIVA ABIERTA AL PUEBLO
        </h2>
      </div>
      <div class="align-self-left logos">
        <img class="logos" src="Main index/img/unefa.png" alt="Unefa Logo" />
      </div>
    </div>
  </div>

  <!-- Navbar Start -->
  <?php include 'Main index/template/navbar-index.php'; ?>
  <!-- Navbar End -->

  <main>
    <!-- Indice Start -->
    <?php include 'Main index/template/indice-index.php'; ?>
    <!-- Indice End -->

    <!--ESTE ES TU CONTENEDOR MEDIO, MEETELE EL CONTENIDO QUE QUIERAS-->
    <div class="contenedor-medio">
      <!-- CONVERTIR ESTO EN UNA ALERTA -->
      <div class="container texto-bienvenida">
        <div class="row">
          <div class="bienvenida col-md-12 d-flex justify-content-md-center">
            <span>BIENVENIDO AL SISTEMA INTEGRADO ADMINISTRATIVO DE TRABAJO ESPECIAL DE GRADO UNEFA NÚCLEO MARACAY (SIATEG)</span>
          </div>
        </div>
      </div>
      <!-- CONVERTIR ESTO EN UNA ALERTA -->

      <div class="ordenar">
        <?php
        // Mostrar los elementos
        foreach ($elementos_pagina as $row) :
        ?>
          <div class="container texto enlace-teg" data-id-teg="<?php echo $row['ID_teg']; ?>">
            <div class="row">
              <div class="titulo col-md-12 d-flex justify-content-center">
                <span><?php echo $row['titulo_teg']; ?></span>
              </div>
            </div>
            <div class="row">
              <div class="autor col-md-6">
                <div class="row-md-6 d-flex justify-content-md-start pl-md-2">Autor: </div>
                <div class="row-md-6 d-flex justify-content-md-start pl-md-2 contenido">
                  <span><?php echo $row['nombres_autor_teg']; ?>,
                    <br class="d-none d-md-block">
                    <?php echo $row['apellidos_autor_teg']; ?></span>
                </div>
              </div>
              <div class="carrera col-md-6">
                <div class="row-md-6 d-flex justify-content-md-start">Carrera:</div>
                <div class="row-md-6 d-flex justify-content-md-start contenido"><span>
                    <?php
                    $nombre_carrera = $row['nombre_carrera_autor'];

                    if ($nombre_carrera === 'Ingenieria de Telecomunicaciones') {
                      $nombre_carrera = 'Ingenieria de Telecom.';
                    }

                    echo $nombre_carrera;
                    ?>
                  </span></div>
              </div>
            </div>
            <div class="row d-flex justify-content-md-end">
              <div class="year col-md-6 d-flex justify-content-md-end">
                <p>Año: <span class="contenido"><?php echo $row['year_teg']; ?></span></p>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>

      <!-- Mostrar la paginación -->
      <div class="pagination">
        <?php if ($pagina_actual > 1) : ?>
          <a class="arrow" href="?pagina=<?php echo $pagina_actual - 1; ?>"><i class="bi bi-arrow-left"></i></a>
        <?php endif; ?>

        <?php for ($i = 1; $i <= $total_paginas; $i++) : ?>
          <a href="?pagina=<?php echo $i; ?>" <?php if ($i == $pagina_actual) echo 'class="active"'; ?>><?php echo $i; ?></a>
        <?php endfor; ?>

        <?php if ($pagina_actual < $total_paginas) : ?>
          <a class="arrow" href="?pagina=<?php echo $pagina_actual + 1; ?>"><i class="bi bi-arrow-right"></i></a>
        <?php endif; ?>
      </div>
    </div>
  </main>

  <!-- Footer Start -->
  <div class="container-fluid text-dark">
    <div class="row footer py-4">
      <div class="col-md-12 px-xl-0">
        <p class="mb-md-0 text-center text-md-center text-light">
          &copy;
          <a class="text-light font-weight-semi-bold" href="#">SIATEG</a>. All Rights Reserved. Designed by
          <a class="text-light font-weight-semi-bold" href="#">Carlos Bruzual</a>
        </p>
      </div>
    </div>
  </div>
  <!-- Footer End -->

  <!-- Back to Top -->
  <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>

  <!-- JavaScript Libraries -->
  <script src="Main index/js/jquery-3.7.1.min.js"></script>
  <script src="Main index/js/bootstrap.bundle.min.js"></script>
  <script src="Main index/lib/easing/easing.min.js"></script>

  <!-- Javascript personalizados -->
  <script src="Main index/js/main.js"></script>
  <script src="Main index/js/redireccion-teg-index.js"></script>

  <script src="Main index/js/indice.js"></script>
  <script src="Main index/js/flecha-indice.js"></script>
</body>

</html>