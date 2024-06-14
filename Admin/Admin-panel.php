<?php
session_start();

require '../BBDD/connect_user.php';
include '../Auth/funciones_leer_bbdd.php';

if (!isset($_SESSION['username'])) {
  header('location: ../index.php');
}
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
  <link href="fonts/Nunito-VariableFont_wght.ttf" rel="stylesheet" />

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet" />
  <link href="css/extras.css" rel="stylesheet" />
  <link href="../Main index/img/unefa.png" rel="icon" />
  <link href="css/bootstrap-icons-1.11.3/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body id="page-top">
  <!-- Page Wrapper -->
  <div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">
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

      <?php if ($_SESSION['nivel_acceso'] == 2) : ?>
        <li class="nav-item">
          <a class="nav-link" href="Paginas/register.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Crear usuarios</span>
          </a>
        </li>
      <?php endif; ?>

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
            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                Salir
              </a>
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

          <?php if ($_SESSION['nivel_acceso'] == 2) : ?>
            <!-- Collapsable Card Example -->
            <div class="card shadow mb-4">
              <!-- Card Header - Accordion -->
              <a href="#collapseCard0" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCard0">
                <h4 class="m-0 font-weight-bold text-primary">
                  Consultar y Modificar Usuarios
                </h4>
              </a>
              <!-- Card Content - Collapse -->
              <div class="collapse" id="collapseCard0">
                <!-- QUITARLE EL SHOW -->
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable3" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th class="text-center" style="vertical-align: middle;">ID de Usuario</th>
                          <th class="text-center" style="vertical-align: middle;">Nombre de Usuario</th>
                          <th class="text-center" style="vertical-align: middle;">Nombre y Apellido</th>
                          <th class="text-center" style="vertical-align: middle;">Correo</th>
                          <th class="text-center" style="vertical-align: middle;">Nivel de Acceso</th>
                          <th class="text-center" style="vertical-align: middle;">Modificar</th>
                        </tr>
                      </thead>
                      <tfoot>
                        <tr>
                          <th class="text-center" style="vertical-align: middle;">ID de Usuario</th>
                          <th class="text-center" style="vertical-align: middle;">Nombre de Usuario</th>
                          <th class="text-center" style="vertical-align: middle;">Nombre y Apellido</th>
                          <th class="text-center" style="vertical-align: middle;">Correo</th>
                          <th class="text-center" style="vertical-align: middle;">Nivel de Acceso</th>
                          <th class="text-center" style="vertical-align: middle;">Modificar</th>
                        </tr>
                      </tfoot>
                      <tbody>
                        <?php
                        $datos_usuarios = leer_usuarios($conection);
                        foreach ($datos_usuarios as $row) :
                          $ID_admin = $row['ID_admin'];
                        ?>
                          <tr>
                            <td class="text-center" style="vertical-align: middle;"><?php echo $row['ID_admin']; ?></td>
                            <td class="text-center" style="vertical-align: middle;"><?php echo $row['usuario']; ?></td>
                            <td class="text-center" style="vertical-align: middle;"><?php echo $row['nombre_usuario']; ?>&nbsp; <?php echo $row['apellido_usuario']; ?></td>
                            <td class="text-center" style="vertical-align: middle;"><?php echo $row['correo']; ?></td>
                            <td class="text-center" style="vertical-align: middle;">
                              <?php
                              $nivelAcceso = $row['nivel_acceso']; // Obtener el nivel de acceso del registro actual

                              if ($nivelAcceso == 2) {
                                echo "Administrador";
                              } else {
                                echo "Estudiante";
                              }
                              ?>
                            </td>
                            <td style="vertical-align: middle;">
                              <div class="text-center d-flex justify-content-center">
                                <a href="../Admin/Paginas/Modificar_User.php?ID_user=<?php echo $row['ID_admin']; ?>">
                                  <button type="button" class="btn btn-primary mr-2">
                                    <i class="bi bi-pencil-square"></i>
                                  </button>
                                </a>
                                <?php
                                if ($row['ID_admin'] != $_SESSION['ID_admin']) { ?>
                                  <form id="eliminarForm-<?php echo $ID_admin; ?>" class="eliminar" action="../Auth/eliminar_user.php" method="POST">
                                    <!-- Campo oculto para la eliminación -->
                                    <input type="hidden" name="user-eliminar" id="user-eliminar" value="<?php echo htmlspecialchars($row['ID_admin']); ?>" />
                                    <input type="hidden" name="eliminar" id="eliminar" value="0" />
                                    <button type="button" class="btn btn-danger" onclick="showConfirmationUSER('eliminarForm-<?php echo $ID_admin; ?>');">
                                      <i class="bi bi-trash"></i>
                                    </button>
                                  </form>
                                <?php } ?>
                              </div>
                            </td>
                          </tr>
                        <?php endforeach; ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          <?php endif; ?>


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
                  <form class="user" method="POST" action="../Auth/Registro_Tesis.php" enctype="multipart/form-data">
                    <div class="form-group">
                      <label>Titulo del TEG</label>
                      <input type="text" class="form-control form-control-user" id="titulo" name="titulo" placeholder="Titulo COMPLETO como en la portadada del TEG" required />
                    </div>

                    <div class="form-group row">
                      <div class="col-sm-6 mb-3 mb-sm-0">
                        <label>Nombres del Autor</label>
                        <input type="text" class="form-control form-control-user" pattern="[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+" id="nombres" name="nombres" placeholder="Ejemplo: Jose Maria" required />
                      </div>
                      <div class="col-sm-6">
                        <label>Apellidos del Autor</label>
                        <input type="text" class="form-control form-control-user" pattern="[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+" id="apellidos" name="apellidos" placeholder="Ejemplo: Palacios Blanco" required />
                      </div>
                    </div>

                    <div class="form-group row">
                      <div class="col-sm-6 mb-3 mb-sm-0">
                        <label>Correo del Autor</label>
                        <input type="email" class="form-control form-control-user" id="correo" name="correo" placeholder="Ejemplo: Correo@gmail.com" required />
                      </div>
                      <div class="col-sm-6 mb-3 mb-sm-0">
                        <label>Año en que se realizo</label>
                        <input type="number" class="form-control form-control-user no-spin" id="fecha-publicacion" name="year" placeholder="Ejemplo: 2024" min="1999" max="2999" pattern="[0-9]{4}" title="Por favor, ingrese un número de 4 dígitos" required />
                      </div>
                    </div>

                    <div class="form-group row">
                      <div class="col-sm-6 mb-3 mb-sm-0">
                        <label>Nombre y Apellido del Tutor</label>
                        <input type="text" class="form-control form-control-user" pattern="[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+" id="nombres_tutor" name="nombres_tutor" placeholder="Ejemplo: Alexander Arroyo" required />
                      </div>
                      <div class="col-sm-6">
                        <label>¿Se implemento o se implementara?</label>
                        <select class="form-control-special form-control-user-special" name="factibilidad" aria-label="Default select example" required>
                          <option value="" selected>Selecciona una opcion de la siguiente lista</option>
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
                      <div class="col-sm-6">
                        <label>Archivo del TEG completo</label>
                        <input class="form-control-special custom-file-input" type="file" id="archivo_pdf" name="archivo_pdf" accept=".pdf" required />
                      </div>
                      <div class="col-sm-6">
                        <label>Resumen del TEG (Página del <strong>resumen</strong> del TEG en formato PDF)</label>
                        <input class="form-control-special custom-file-input" type="file" id="archivo_pdf_resumen" name="archivo_pdf_resumen" accept=".pdf" required />
                      </div>
                    </div>

                    <div class="form-group">
                      <label>Carrera del graduando</label>
                      <select class="form-control-special form-control-user" name="nombre_carrera_autor" aria-label="Default select example" required>
                        <option value="" selected>
                          Escoja una Carrera de la siguiente lista
                          <?php
                          $datos_teg_carrera = obtener_carreras($conection);

                          // Función de comparación para ordenar alfabéticamente
                          function compararCarreras($a, $b)
                          {
                            return strcmp($a['nombre_carrera'], $b['nombre_carrera']);
                          }

                          // Ordenar el arreglo de carreras
                          usort($datos_teg_carrera, 'compararCarreras');

                          // Imprimir las opciones ordenadas
                          foreach ($datos_teg_carrera as $row) : ?>
                        <option value="<?php echo $row['nombre_carrera']; ?>">
                          <?php echo $row['nombre_carrera']; ?>
                        </option>
                      <?php endforeach; ?>
                      </select>
                    </div>
                    <input type="submit" id="enviarFormulario" class="btn btn-primary btn-user btn-block" value="Enviar" />
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
                Modificar Trabajo Especial de Grado Existente
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
                        <th class="text-center" style="vertical-align: middle;">Año del TEG</th>
                        <th class="text-center" style="vertical-align: middle;">Nombre del Tutor</th>
                        <th class="text-center" style="vertical-align: middle;">Carrera del Autor</th>
                        <th class="text-center" style="vertical-align: middle;">Modificar</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th class="text-center" style="vertical-align: middle;">Titulo del TEG</th>
                        <th class="text-center" style="vertical-align: middle;">Autor del TEG</th>
                        <th class="text-center" style="vertical-align: middle;">Año del TEG</th>
                        <th class="text-center" style="vertical-align: middle;">Nombre del Tutor</th>
                        <th class="text-center" style="vertical-align: middle;">Carrera del Autor</th>
                        <th class="text-center" style="vertical-align: middle;">Modificar</th>
                      </tr>
                    </tfoot>
                    <tbody>
                      <?php
                      $datos_teg = leer($conection);
                      foreach ($datos_teg as $row) : ?>
                        <tr>
                          <?php $ID_teg = $row['ID_teg']; ?>
                          <td class="text-center" style="vertical-align: middle;"><?php echo $row['titulo_teg']; ?></td>
                          <td class="text-center" style="vertical-align: middle;"><?php echo $row['nombres_autor_teg']; ?>, <?php echo $row['apellidos_autor_teg']; ?></td>
                          <td class="text-center" style="vertical-align: middle;"><?php echo $row['year_teg']; ?></td>
                          <td class="text-center" style="vertical-align: middle;"><?php echo $row['nombres_tutor']; ?></td>
                          <td class="text-center" style="vertical-align: middle;"><?php echo $row['nombre_carrera_autor']; ?></td>
                          <td style="vertical-align: middle;">
                            <div class="d-flex justify-content-center align-items-center">
                              <a href="../Admin/Paginas/Modificar_Teg.php?ID_TEG=<?php echo $ID_teg; ?>">
                                <button type="button" class="btn btn-primary mr-2">
                                  <i class="bi bi-pencil-square"></i>
                                </button>
                              </a>
                              <form id="eliminarTEGForm-<?php echo $ID_teg; ?>" class="eliminarTEG" action="../Auth/eliminar_teg.php" method="POST">
                                <!-- Campo oculto para la eliminación -->
                                <input type="hidden" name="teg-eliminar" id="teg-eliminar" value="<?php echo htmlspecialchars($row['ID_teg']); ?>" />
                                <input type="hidden" name="eliminarTEG" id="eliminarTEG" value="0" />
                                <button type="button" class="btn btn-danger" onclick="showConfirmationTEG('eliminarTEGForm-<?php echo $ID_teg; ?>');">
                                  <i class="bi bi-trash"></i>
                                </button>
                              </form>
                            </div>
                          </td>
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
                Información de los Trabajos Especiales de Grado Existentes
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
                        <th class="text-center" style="vertical-align: middle;">TEG PDF</th>
                        <th class="text-center" style="vertical-align: middle;">RESUMEN PDF</th>
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
                        <th class="text-center" style="vertical-align: middle;">TEG PDF</th>
                        <th class="text-center" style="vertical-align: middle;">RESUMEN PDF</th>
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
                          <td class="text-center" style="vertical-align: middle;"><a href="PDF_RESUMEN/<?php echo $row['archivo_pdf_resumen']; ?>" target="_blank"><?php echo $row['archivo_pdf_resumen']; ?></a></td>
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
      <footer class="sticky-footer bg-gradient-primary">
        <div class="my-auto">
          <div class="copyright text-center my-auto" style="color: white;">
            <span>Copyright &copy; SIATEG</span>. All Rights Reserved. Designed by Carlos Bruzual
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

  <!-- Instrucciones Modal -->
  <div class="modal fade" id="instruccionesModal" tabindex="-1" role="dialog" aria-labelledby="instruccionesModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="instruccionesModalLabel">Primeros pasos...</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <!-- Contenido del primer paso -->
          <div id="paso1" class="pasos">
            <h4>Registro de Trabajos Especiales de Grado</h4>
            <p>Accede a "Registrar Trabajo Especial de Grado" donde podras cargar la información más relevante del TEG y sus documentos.<br> <img src="img/registrar.png" alt="" style="width: 100%;"></p>
          </div>

          <!-- Contenido del segundo paso -->
          <div id="paso2" style="display: none;" class="pasos">
            <h4>Modificación de Trabajos Especiales de Grado</h4>
            <p>Accede a "Modificar Trabajo Especial de Grado Existente" donde podras modificar toda la información y documentos necesarios al momento.<br> <img src="img/modificar-teg.png" alt="" style="width: 80%;"></p>
          </div>

          <!-- Contenido del tercer paso -->
          <div id="paso3" style="display: none;" class="pasos">
            <h4>Consultas de Trabajos Especiales de Grado</h4>
            <p>Accede a "Información de los Trabajos Especiales de Grado Existentes" donde podras consultar toda la información y el resumen de los TEG.<br> <img src="img/consultar.png" alt="" style="width: 95%;"></p>
          </div>

          <!-- Contenido del cuarto paso -->
          <div id="paso4" style="display: none;" class="pasos">
            <h4>Creación, consulta y modificación de Usuarios</h4>
            <p>Accede a "Consultar y Modificar Usuarios" o "Crear Usuarios" donde podras ver la información de los usuarios o crearlos respectivamente.<br> <img src="img/usuarios.png" alt="" style="width: 100%;"></p>
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary mr-auto" id="omitirBtn" type="button">Omitir</button>
          <button class="btn btn-secondary mr-auto" id="anteriorBtn" type="button" style="display: none;">Anterior</button>
          <button class="btn btn-primary" id="siguienteBtn" type="button">Siguiente</button>
          <button class="btn btn-danger" id="finalizarBtn" type="button" style="display: none;">Finalizar</button>
        </div>
      </div>
    </div>
  </div>
  <!-- Instrucciones Modal -->

  <!-- Logout Modal -->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="logoutModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="logoutModalLabel">Saliendo</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">¿Desea salir del modo administrador?</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Volver</button>
          <a class="btn btn-primary" href="../Admin/Auth_admin/Cerrar_Sesion.php">Salir</a>
        </div>
      </div>
    </div>
  </div>
  <!-- Logout Modal -->

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sweetalert2.all.js"></script>
  <script src="js/sb-admin-2.js"></script>
  <script src="js/Alertas.js"></script>
  <script src="js/Eliminar_user_o_teg.js"></script>
  <script src="js/validarArchivosform.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/inicializar-datatables.js"></script>

  <script>
    // Esperar a que el documento esté listo
    $(document).ready(function() {
      // Mostrar el modal al cargar la página
      $('#instruccionesModal').modal('show');

      // Variables para controlar el estado del modal
      var pasoActual = 1;
      var totalPasos = 4;

      // Función para mostrar el paso actual
      function mostrarPaso(paso) {
        // Ocultar todos los pasos
        for (var i = 1; i <= totalPasos; i++) {
          $('#paso' + i).hide();
        }

        // Mostrar el paso actual
        $('#paso' + paso).show();

        // Mostrar u ocultar los botones según el paso actual
        if (paso === 1) {
          $('#siguienteBtn').show();
          $('#anteriorBtn').hide();
          $('#finalizarBtn').hide();
          $('#omitirBtn').show();
        } else if (paso === totalPasos) {
          $('#siguienteBtn').hide();
          $('#anteriorBtn').show();
          $('#finalizarBtn').show();
          $('#omitirBtn').hide();
        } else {
          $('#siguienteBtn').show();
          $('#anteriorBtn').show();
          $('#finalizarBtn').hide();
          $('#omitirBtn').hide();
        }
      }

      // Mostrar el primer paso al cargar el modal
      mostrarPaso(pasoActual);

      // Acción al hacer clic en el botón "Siguiente"
      $('#siguienteBtn').click(function() {
        if (pasoActual < totalPasos) {
          pasoActual++;
          mostrarPaso(pasoActual);
        }
      });

      // Acción al hacer clic en el botón "Anterior"
      $('#anteriorBtn').click(function() {
        if (pasoActual > 1) {
          pasoActual--;
          mostrarPaso(pasoActual);
        }
      });

      // Acción al hacer clic en el botón "Omitir"
      $('#omitirBtn').click(function() {
        // Cerrar el modal
        $('#instruccionesModal').modal('hide');

        // Aquí puedes agregar la lógica para realizar cualquier acciónadicional después de omitir las instrucciones
      });

      // Acción al hacer clic en el botón "Finalizar"
      $('#finalizarBtn').click(function() {
        // Cerrar el modal
        $('#instruccionesModal').modal('hide');
      });
    });
  </script>

  <script>
    // Obtén el código de la URL
    const urlParams = new URLSearchParams(window.location.search)
    const Code = urlParams.get("code")

    codigosAlerta(Code)
  </script>

  <script>
    var userField = document.getElementById('titulo');

    userField.addEventListener('input', function() {
      var userInput = this.value;
      var regex = /^[a-zA-Z0-9-()*. ]+$/;

      if (!regex.test(userInput)) {
        this.setCustomValidity('El campo solo puede contener letras, números, guiones, asteriscos, puntos y paréntesis.');
      } else {
        this.setCustomValidity('');
      }
    });
  </script>
</body>

</html>