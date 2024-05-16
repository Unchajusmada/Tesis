<?php
require '../BBDD/connect_user.php';
include '../Auth/leer_bbdd.php'

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>Administración</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet" />
  <link href="../Main index/img/unefa.png" rel="icon" />
</head>

<body id="page-top">
  <!-- Page Wrapper -->
  <div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-text mx-3">Administración</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0" />

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="#">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Administración</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block" />

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>
    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
      <!-- Main Content -->
      <div id="content">
        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">
            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Opciones</span>
                <img class="img-profile rounded-circle" src="img/engranaje-vector-8.png" />
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Salir
                </a>
              </div>
            </li>
          </ul>
        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Page Heading -->
          <h1 class="h2 mb-4 text-gray-800">
            COORDINACIÓN DE TRABAJOS ESPECIALES DE GRADO
          </h1>

          <!-- Collapsable Card Example -->
          <div class="card shadow mb-4">
            <!-- Card Header - Accordion -->
            <a href="#collapseCard1" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCard1">
              <h4 class="m-0 font-weight-bold text-primary">
                Registrar Trabajo Especial de Grado
              </h4>
            </a>
            <!-- Card Content - Collapse -->
            <div class="collapse" id="collapseCard1">
              <!-- QUITARLE EL SHOW -->
              <div class="card-body">
                <div class="p-3">
                  <div class="text-center">
                    <h4 class="h4 text-gray-900 mb-4">
                      Para el registro del trabajo especial de grado de las y
                      los graduandos se requiere la siguiente información:
                    </h4>
                  </div>
                  <hr />
                  <form class="user" method="POST" action="../Auth/ObtenerDatos.php" enctype="multipart/form-data">
                    <div class="form-group">
                      <label>Titulo del TEG</label>
                      <input type="text" class="form-control form-control-user" id="titulo" name="titulo" placeholder="Titulo COMPLETO como en la portadada del TEG" required />
                    </div>

                    <div class="form-group row">
                      <div class="col-sm-6 mb-3 mb-sm-0">
                        <label>Nombres del Autor</label>
                        <input type="text" class="form-control form-control-user" id="nombres" name="nombres" placeholder="Ejemplo: Jose Maria" required />
                      </div>
                      <div class="col-sm-6">
                        <label>Apellidos del Autor</label>
                        <input type="text" class="form-control form-control-user" id="apellidos" name="apellidos" placeholder="Ejemplo: Palacios Blanco" required />
                      </div>
                    </div>

                    <div class="form-group">
                      <label>Correo del Autor</label>
                      <input type="email" class="form-control form-control-user" id="correo" name="correo" placeholder="Ejemplo: Correo@gmail.com" required />
                    </div>

                    <div class="form-group row">
                      <div class="col-sm-6 mb-3 mb-sm-0">
                        <label>Nombre y Apellido del Tutor</label>
                        <input type="text" class="form-control form-control-user" id="nombres_tutor" name="nombres_tutor" placeholder="Ejemplo: Alexander Arroyo" required />
                      </div>
                      <div class="col-sm-6">
                        <label>¿Se implemento o se implementara?</label>
                        <select class="form-control-special form-control-user-special" name="factibilidad" aria-label="Default select example">
                          <option disabled selected>
                            Escoja una opcion de la siguiente lista
                          </option>
                          <option value="si">
                            Si
                          </option>
                          <option value="no">
                            No
                          </option>
                        </select>
                      </div>
                    </div>

                    <div class="form-group row">
                      <div class="col-sm-6 mb-3 mb-sm-0">
                        <label>Año en que se realizo</label>
                        <input type="number" class="form-control form-control-user" id="fecha-publicacion" name="year" placeholder="Ejemplo: 2024" min="1999" max="2999" pattern="[0-9]{4}" title="Por favor, ingrese un número de 4 dígitos" required />
                      </div>
                      <div class="col-sm-6">
                        <label>Archivo del TEG</label>
                        <input class="form-control-special custom-file-input" type="file" id="archivo_pdf" name="archivo_pdf" accept=".pdf" />
                      </div>
                    </div>

                    <div class="form-group">
                      <label>Carrera del graduando</label>
                      <select class="form-control-special form-control-user" name="nombre_carrera_autor" aria-label="Default select example">
                        <option disabled selected>
                          Escoja una Carrera de la siguiente lista
                        </option>
                        <option value="Ingenieria Civil">
                          Ingenieria Civil
                        </option>
                        <option value="Ingenieria de Telecom.">
                          Ingenieria de Telecomunicaciones
                        </option>
                        <option value="Ingenieria Aeronautica">
                          Ingenieria Aeronautica
                        </option>
                        <option value="Ingenieria Electrica">
                          Ingenieria Electrica
                        </option>
                        <option value="Ingenieria Electronica">
                          Ingenieria Electronica
                        </option>
                        <option value="Ingenieria de Sistemas">
                          Ingenieria de Sistemas
                        </option>
                      </select>
                    </div>
                    <input type="submit" class="btn btn-primary btn-user btn-block" value="Enviar" />
                  </form>
                </div>
              </div>
            </div>
          </div>

          <!-- Collapsable Card Example -->
          <div class="card shadow mb-4">
            <!-- Card Header - Accordion -->
            <a href="#collapseCard2" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCard2">
              <h4 class="m-0 font-weight-bold text-primary">
                Modificar Trabajo Especial de Grado Existentes
              </h4>
            </a>
            <!-- Card Content - Collapse -->
            <div class="collapse" id="collapseCard2">
              <!-- QUITARLE EL SHOW -->
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-bordered" id="dataTable2" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th class="text-center" style="vertical-align: middle;">Titulo del TEG</th>
                        <th class="text-center" style="vertical-align: middle;">Autor del TEG</th>
                        <th class="text-center" style="vertical-align: middle;">Correo del Autor</th>
                        <th class="text-center" style="vertical-align: middle;">Año del TEG</th>
                        <th class="text-center" style="vertical-align: middle;">Nombre del Tutor</th>
                        <th class="text-center" style="vertical-align: middle;">¿Implementado?</th>
                        <th class="text-center" style="vertical-align: middle;">Carrera del Autor</th>
                        <th class="text-center" style="vertical-align: middle;">PDF</th>
                        <th class="text-center" style="vertical-align: middle;">Modificar</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th class="text-center" style="vertical-align: middle;">Titulo del TEG</th>
                        <th class="text-center" style="vertical-align: middle;">Autor del TEG</th>
                        <th class="text-center" style="vertical-align: middle;">Correo del Autor</th>
                        <th class="text-center" style="vertical-align: middle;">Año del TEG</th>
                        <th class="text-center" style="vertical-align: middle;">Nombre del Tutor</th>
                        <th class="text-center" style="vertical-align: middle;">¿Implementado?</th>
                        <th class="text-center" style="vertical-align: middle;">Carrera del Autor</th>
                        <th class="text-center" style="vertical-align: middle;">PDF</th>
                        <th class="text-center" style="vertical-align: middle;">Modificar</th>
                      </tr>
                    </tfoot>
                    <tbody>
                      <?php
                      $datos_teg = leer($conection);
                      foreach ($datos_teg as $row) : ?>
                        <tr>
                          <td class="text-center" style="vertical-align: middle;"><?php echo $row['titulo_teg']; ?></td>
                          <td class="text-center" style="vertical-align: middle;"><?php echo $row['nombres_autor_teg']; ?>, <?php echo $row['apellidos_autor_teg']; ?></td>
                          <td class="text-center" style="vertical-align: middle;"><?php echo $row['correo_autor']; ?></td>
                          <td class="text-center" style="vertical-align: middle;"><?php echo $row['year_teg']; ?></td>
                          <td class="text-center" style="vertical-align: middle;"><?php echo $row['nombres_tutor']; ?></td>
                          <td class="text-center" style="vertical-align: middle;"><?php echo strtoupper($row['factibilidad']); ?></td>
                          <td class="text-center" style="vertical-align: middle;"><?php echo $row['nombre_carrera_autor']; ?></td>
                          <td class="text-center" style="vertical-align: middle;"><?php echo $row['archivo_pdf']; ?></td>
                          <td class="text-center" style="vertical-align: middle;"><button>Modificar</button></td>
                        </tr>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>

          <div class="card shadow mb-4">
            <!-- Card Header - Accordion -->
            <a href="#collapseCard3" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCard3">
              <h4 class="m-0 font-weight-bold text-primary">
                Trabajos Especiales de Grado existentes
              </h4>
            </a>
            <!-- Card Content - Collapse -->
            <div class="collapse" id="collapseCard3">
              <!-- QUITARLE EL SHOW -->
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th class="text-center" style="vertical-align: middle;">Titulo del TEG</th>
                        <th class="text-center" style="vertical-align: middle;">Autor del TEG</th>
                        <th class="text-center" style="vertical-align: middle;">Correo del Autor</th>
                        <th class="text-center" style="vertical-align: middle;">Año del TEG</th>
                        <th class="text-center" style="vertical-align: middle;">Nombre del Tutor</th>
                        <th class="text-center" style="vertical-align: middle;">¿Implementado?</th>
                        <th class="text-center" style="vertical-align: middle;">Carrera del Autor</th>
                        <th class="text-center" style="vertical-align: middle;">PDF</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th class="text-center" style="vertical-align: middle;">Titulo del TEG</th>
                        <th class="text-center" style="vertical-align: middle;">Autor del TEG</th>
                        <th class="text-center" style="vertical-align: middle;">Correo del Autor</th>
                        <th class="text-center" style="vertical-align: middle;">Año del TEG</th>
                        <th class="text-center" style="vertical-align: middle;">Nombre del Tutor</th>
                        <th class="text-center" style="vertical-align: middle;">¿Implementado?</th>
                        <th class="text-center" style="vertical-align: middle;">Carrera del Autor</th>
                        <th class="text-center" style="vertical-align: middle;">PDF</th>
                      </tr>
                    </tfoot>
                    <tbody>
                      <?php
                      $datos_teg = leer($conection);
                      foreach ($datos_teg as $row) : ?>
                        <tr>
                          <td class="text-center" style="vertical-align: middle;"><?php echo $row['titulo_teg']; ?></td>
                          <td class="text-center" style="vertical-align: middle;"><?php echo $row['nombres_autor_teg']; ?>, <?php echo $row['apellidos_autor_teg']; ?></td>
                          <td class="text-center" style="vertical-align: middle;"><?php echo $row['correo_autor']; ?></td>
                          <td class="text-center" style="vertical-align: middle;"><?php echo $row['year_teg']; ?></td>
                          <td class="text-center" style="vertical-align: middle;"><?php echo $row['nombres_tutor']; ?></td>
                          <td class="text-center" style="vertical-align: middle;"><?php echo strtoupper($row['factibilidad']); ?></td>
                          <td class="text-center" style="vertical-align: middle;"><?php echo $row['nombre_carrera_autor']; ?></td>
                          <td class="text-center" style="vertical-align: middle;"><?php echo $row['archivo_pdf']; ?></td>
                        </tr>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2020</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->
    </div>
    <!-- End of Content Wrapper -->
  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Saliendo</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">¿Desea salir del modo administrador?</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">
            Volver
          </button>
          <a class="btn btn-primary" href="../Main index/index.php">Salir</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>

  <script>
    $(document).ready(function() {
      $('#dataTable2').DataTable({
        "lengthMenu": [5],
        "pageLength": 5
      });
    });
  </script>
</body>

</html>