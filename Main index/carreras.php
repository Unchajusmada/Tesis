<?php
require '../BBDD/connect_user.php';
include '../Auth/funciones_leer_bbdd.php';

// Obtener el ID_teg de la URL
$carrera = $_GET['carrera'];

// Obtener los datos del TEG con el mismo ID
$datos_teg_carrera = leer_carrera($conection, $carrera);

// Definir el número de elementos por página
$elementos_por_pagina = 6;

// Obtener el número total de páginas
$total_paginas = ceil(count($datos_teg_carrera) / $elementos_por_pagina);

// Obtener el número de página actual
$pagina_actual = isset($_GET['pagina']) ? $_GET['pagina'] : 1;

// Obtener los elementos correspondientes a la página actual
$elementos_pagina = array_slice($datos_teg_carrera, ($pagina_actual - 1) * $elementos_por_pagina, $elementos_por_pagina);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <title>Organizar por: TODAS</title>
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
  <?php include 'template/topbar.php'; ?>
  <!-- Topbar End -->

  <!-- Navbar Start -->
  <?php include 'template/navbar.php'; ?>
  <!-- Navbar End -->

  <main>
    <!-- Indice Start -->
    <?php include 'template/indice.php'; ?>
    <!-- Indice End -->

    <!--ESTE EES TU CONTENEDOR MEDIO, MEETELE EL CONTENIDO QUE QUIERAS-->
    <div class="contenedor-medio">
      <div class="container texto-categoria">
        <div class="row">
          <div class="categoria col-md-12 d-flex justify-content-md-center">
            <?php
            $datos_teg_carrera = leer_titulo_carrera($conection, $carrera);
            foreach ($datos_teg_carrera as $row) :
            ?>
              <span><?php echo $row['nombre_carrera']; ?></span>
            <?php
              break; // Detener el bucle después de imprimir el primer resultado
            endforeach; ?>
          </div>
        </div>
      </div>

      <div class="ordenar">
        <?php
        if (empty($elementos_pagina)) {
        ?>
          <div class="container texto-error">
            <div class="row">
              <div class="titulo col-md-12 d-flex justify-content-md-center">
                <span>Aun no existen Trabajos Especiales de Grado cargados de esta carrera</span>
              </div>
            </div>
          </div>
          <?php
        } else {
          foreach ($elementos_pagina as $row) {
          ?>
            <div class="container texto enlace-teg" data-id-teg="<?php echo $row['ID_teg']; ?>">
              <div class="row">
                <div class="titulo col-md-12 d-flex justify-content-md-center">
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
        <?php
          }
        }
        ?>
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
  <script src="js/redireccion-teg.js"></script>

  <script src="js/indice.js"></script>
  <script src="js/flecha-indice.js"></script>
</body>

</html>