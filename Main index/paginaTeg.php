<?php
require '../BBDD/connect_user.php';
include '../Auth/leer_bbdd.php'

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
  <link rel="preconnect" href="https://fonts.gstatic.com" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet" />

  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet" />

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

            <div class="resumen col-md-12 pt-2">
              <div class="row pl-md-2 justify-content-center justify-content-md-start">
                <span style="font-weight: bold;">Resumen:</span>&nbsp;
                <br class="d-block d-md-none">
                <span class="text-justify">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad accusantium aliquam laudantium ex, magni ullam impedit possimus labore tempore suscipit saepe reprehenderit sint hic quibusdam nihil modi quidem sapiente perspiciatis?</span>
              </div>
            </div>

            <div class="contenedor-pdf pt-4">
              <a href="../Admin/PDF_TEG/<?php echo $row['archivo_pdf']; ?>" target="_blank">
                <span><img src="img/pdf.png" alt=""></span>
                <p>¡Leer PDF!</p>
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
  <script src="js/filtro-carreras.js"></script>
</body>

</html>