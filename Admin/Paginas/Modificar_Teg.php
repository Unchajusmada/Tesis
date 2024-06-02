<?php
require '../../BBDD/connect_user.php';
include '../../Auth/funciones_leer_bbdd.php';
$ID_teg = $_GET['ID_TEG']

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>Modificar TEG</title>

  <!-- Custom fonts for this template-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />

  <!-- Custom styles for this template-->
  <link href="../../Main index/img/unefa.png" rel="icon" />
  <link href="../css/sb-admin-2.min.css" rel="stylesheet" />
  <link href="../css/extras.css" rel="stylesheet" />
</head>

<body class="bg-gradient-dark">
  <div class="container">
    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">¡Modificar TEG!</h1>
              </div>
              <?php
              $datos_teg = modificar($conection, $ID_teg);
              foreach ($datos_teg as $row) : ?>
                <form class="user" method="POST" action="../../Auth/Modif_Datos_Tesis.php" enctype="multipart/form-data">
                  <input type="text" id="ID_teg" name="ID_teg" value="<?php echo htmlspecialchars($row['ID_teg']); ?>" hidden />
                  <div class="form-group">
                    <label>Titulo del TEG</label>
                    <input type="text" class="form-control form-control-user" id="titulo" name="titulo" placeholder="Titulo COMPLETO como en la portada del TEG" value="<?php echo htmlspecialchars($row['titulo_teg']); ?>" />
                  </div>

                  <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                      <label>Nombres del Autor</label>
                      <input type="text" class="form-control form-control-user" pattern="[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+" id="nombres" name="nombres" placeholder="Ejemplo: Jose Maria" value="<?php echo htmlspecialchars($row['nombres_autor_teg']); ?>" />
                    </div>
                    <div class="col-sm-6">
                      <label>Apellidos del Autor</label>
                      <input type="text" class="form-control form-control-user" pattern="[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+" id="apellidos" name="apellidos" placeholder="Ejemplo: Palacios Blanco" value="<?php echo htmlspecialchars($row['apellidos_autor_teg']); ?>" />
                    </div>
                  </div>

                  <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                      <label>Correo del Autor</label>
                      <input type="email" class="form-control form-control-user" id="correo" name="correo" placeholder="Ejemplo: Correo@gmail.com" value="<?php echo htmlspecialchars($row['correo_autor']); ?>" />
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                      <label>Nombre y Apellido del <strong>Tutor</strong></label>
                      <input type="text" class="form-control form-control-user" pattern="[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+" id="nombres_tutor" name="nombres_tutor" placeholder="Ejemplo: Alexander Arroyo" value="<?php echo htmlspecialchars($row['nombres_tutor']); ?>" />
                    </div>
                  </div>

                  <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                      <label>Año en que se realizo</label>
                      <input type="number" class="form-control form-control-user no-spin" id="fecha-publicacion" name="year" placeholder="Ejemplo: 2024" min="1999" max="2999" pattern="[0-9]{4}" title="Por favor, ingrese un número de 4 dígitos" required value="<?php echo htmlspecialchars($row['year_teg']); ?>" />
                    </div>

                    <div class="col-sm-6">
                      <label>¿Se implementara?</label>
                      <select class="form-control-special form-control-user-special" name="factibilidad" aria-label="Default select example" required>
                        <option value="">Selecciona una opcion de la siguiente lista</option>
                        <option value="si" <?php echo ($row['factibilidad'] == 'si') ? 'selected' : ''; ?>>Si</option>
                        <option value="no" <?php echo ($row['factibilidad'] == 'no') ? 'selected' : ''; ?>>No</option>
                      </select>
                    </div>
                  </div>

                  <div class="form-group row">
                    <div class="col-sm-6">
                      <label>Archivo del TEG</label>
                      <input class="form-control-special custom-file-input" type="file" id="archivo_pdf" name="archivo_pdf" accept=".pdf" />
                      <?php if (!empty($row['archivo_pdf'])) : ?>
                        <small>Archivo actual: <?php echo htmlspecialchars($row['archivo_pdf']); ?></small>
                      <?php endif; ?>
                    </div>

                    <div class="col-sm-6">
                      <label>Resumen del TEG</label>
                      <input class="form-control-special custom-file-input" type="file" id="archivo_pdf_resumen" name="archivo_pdf_resumen" accept=".pdf" />
                      <?php if (!empty($row['archivo_pdf_resumen'])) : ?>
                        <small>Archivo actual: <?php echo htmlspecialchars($row['archivo_pdf_resumen']); ?></small>
                      <?php else : ?>
                        <small>Archivo actual: No tiene</small>
                      <?php endif; ?>
                    </div>
                  </div>

                  <div class="form-group">
                    <label>Carrera del graduando</label>
                    <select class="form-control-special form-control-user" name="nombre_carrera_autor" aria-label="Default select example" required>
                      <option value="" selected>
                        Selecciona una Carrera de la siguiente lista
                      </option>
                      <option value="Ingenieria Civil" <?php echo ($row['nombre_carrera_autor'] == 'Ingenieria Civil') ? 'selected' : ''; ?>>Ingenieria Civil</option>
                      <option value="Ingenieria de Telecom." <?php echo ($row['nombre_carrera_autor'] == 'Ingenieria de Telecom.') ? 'selected' : ''; ?>>Ingenieria de Telecomunicaciones</option>
                      <option value="Ingenieria Aeronautica" <?php echo ($row['nombre_carrera_autor'] == 'Ingenieria Aeronautica') ? 'selected' : ''; ?>>Ingenieria Aeronautica</option>
                      <option value="Ingenieria Electrica" <?php echo ($row['nombre_carrera_autor'] == 'Ingenieria Electrica') ? 'selected' : ''; ?>>Ingenieria Electrica</option>
                      <option value="Ingenieria Electronica" <?php echo ($row['nombre_carrera_autor'] == 'Ingenieria Electronica') ? 'selected' : ''; ?>>Ingenieria Electronica</option>
                      <option value="Ingenieria de Sistemas" <?php echo ($row['nombre_carrera_autor'] == 'Ingenieria de Sistemas') ? 'selected' : ''; ?>>Ingenieria de Sistemas</option>
                    </select>
                  </div>
                  <input type="submit" class="btn btn-primary btn-user btn-block" value="Enviar" />

                  <div class="text-center">
                    <a class="small btn btn-user btn-block" href="../Admin-panel.php" style="border: 1px solid blue; margin-top: 10px;">Volver</a>
                  </div>
                  <hr />
                </form>
                <form id="eliminarTEGForm" class="eliminarTEG" action="../../Auth/eliminar_teg.php" method="POST">
                  <!-- Campo oculto para la eliminación -->
                  <input type="hidden" name="teg-eliminar" id="teg-eliminar" value="<?php echo htmlspecialchars($row['ID_teg']); ?>" />
                  <input type="hidden" name="eliminarTEG" id="eliminarTEG" value="0" />
                  <input type="button" class="btn btn-danger btn-user btn-block" value="Eliminar TEG" onclick="showConfirmationTEG();" />
                </form>
              <?php endforeach; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../js/sb-admin-2.min.js"></script>
  <script src="../js/Eliminar_user_o_teg.js"></script>

  <!-- Custom Script verificar cedula unica y usuario unico -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>