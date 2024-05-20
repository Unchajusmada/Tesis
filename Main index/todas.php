<?php
require '../BBDD/connect_user.php';
include '../Auth/leer_bbdd.php'

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
  <link rel="preconnect" href="https://fonts.gstatic.com" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet" />

  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet" />

  <!-- Customized Bootstrap Stylesheet -->
  <link href="css/style.css" rel="stylesheet" />
  <link href="css/index.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
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

    <!--ESTE EES TU CONTENEDOR MEDIO, MEETELE EL CONTENIDO QUE QUIERAS-->
    <div class="contenedor-medio">
      <div class="container texto-categoria">
        <div class="row">
          <div class="categoria col-md-12 d-flex justify-content-md-center">
            <span>Todos los TEG</span>
          </div>
        </div>
      </div>

      <div class="ordenar">
        <?php
        $datos_teg = leer($conection);
        foreach ($datos_teg as $row) :
        ?>
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
              <div class="autor col-md-12">
                <div class="row-md-6 d-flex justify-content-md-center"><strong>Tutor:</strong></div>
                <div class="row-md-6 d-flex justify-content-md-center">
                  <span><?php echo $row['nombres_tutor']; ?></span>
                </div>
              </div>
            </div>
            <div class="row d-flex justify-content-md-end">
              <div class="year col-md-6 d-flex justify-content-md-end">
                <p>Año: <span><?php echo $row['year_teg']; ?></span></p>
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

  <!-- Javascript personalizados -->
  <script src="js/main.js"></script>
  <script src="js/redireccion-teg.js"></script>
  <script src="js/filtro-carreras.js"></script>
  <script src="js/indice.js"></script>
  <script src="js/flecha-indice.js"></script>
</body>

</html>