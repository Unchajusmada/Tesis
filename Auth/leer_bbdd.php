<?php
function leer($conection)
{
  $consulta = "SELECT * FROM teg";
  $ejecutar = mysqli_query($conection, $consulta);
  $data = [];
  while ($fila = mysqli_fetch_assoc($ejecutar)) {
    $data[] = $fila;
  }
  return $data;
}

function leer_usuarios($conection)
{
  $consulta = "SELECT * FROM admin";
  $ejecutar = mysqli_query($conection, $consulta);
  $data = [];
  while ($fila = mysqli_fetch_assoc($ejecutar)) {
    $data[] = $fila;
  }
  return $data;
}

function leer_carrera($conection, $carrera)
{
  $consulta = "SELECT * FROM teg WHERE nombre_carrera_autor LIKE '%$carrera%'";
  $ejecutar = mysqli_query($conection, $consulta);
  $data = [];
  while ($fila = mysqli_fetch_assoc($ejecutar)) {
    $data[] = $fila;
  }
  return $data;
}

function leer_teg($conection, $idTeg)
{
  $consulta = "SELECT * FROM teg WHERE ID_teg = $idTeg";
  $ejecutar = mysqli_query($conection, $consulta);
  $data = [];
  while ($fila = mysqli_fetch_assoc($ejecutar)) {
    $data[] = $fila;
  }
  return $data;
}

function buscar($conection, $busquedaTEG)
{
  $consulta = "SELECT DISTINCT t1.* FROM teg t1
                LEFT JOIN teg t2 ON t1.nombres_autor_teg = t2.nombres_autor_teg
                                  AND t1.apellidos_autor_teg = t2.apellidos_autor_teg
                                  AND t1.year_teg = t2.year_teg
                                  AND t1.nombre_carrera_autor = t2.nombre_carrera_autor
                                  AND t1.nombres_tutor = t2.nombres_tutor
                WHERE t1.titulo_teg LIKE '%$busquedaTEG%' 
                OR t1.nombres_autor_teg LIKE '%$busquedaTEG%'
                OR t1.apellidos_autor_teg LIKE '%$busquedaTEG%'
                OR t1.year_teg LIKE '%$busquedaTEG%'
                OR t1.nombre_carrera_autor LIKE '%$busquedaTEG%'
                OR t1.nombres_tutor LIKE '%$busquedaTEG%'
                AND (t2.ID_teg IS NULL OR t1.ID_teg = t2.ID_teg)";

  $ejecutar = mysqli_query($conection, $consulta);
  $data = [];
  while ($fila = mysqli_fetch_assoc($ejecutar)) {
    $data[] = $fila;
  }
  return $data;
}

function modificar($conection, $ID_teg)
{
  $consulta = "SELECT * FROM teg WHERE ID_teg = $ID_teg";
  $ejecutar = mysqli_query($conection, $consulta);
  $data = [];
  while ($fila = mysqli_fetch_assoc($ejecutar)) {
    $data[] = $fila;
  }
  return $data;
}

function modificarUser($conection, $ID_admin)
{
  $consulta = "SELECT * FROM admin WHERE ID_admin = $ID_admin";
  $ejecutar = mysqli_query($conection, $consulta);
  $data = [];
  while ($fila = mysqli_fetch_assoc($ejecutar)) {
    $data[] = $fila;
  }
  return $data;
}

function login($connection, $usuario, $pass)
{
  // Utiliza una consulta preparada para evitar inyección SQL
  $consulta = "SELECT * FROM admin WHERE usuario = ?";

  // Prepara la consulta para verificar el usuario
  if ($stmt = mysqli_prepare($connection, $consulta)) {
    // Vincula los parámetros
    mysqli_stmt_bind_param($stmt, "s", $usuario);

    // Ejecuta la consulta
    mysqli_stmt_execute($stmt);

    // Obtiene el resultado
    $result = mysqli_stmt_get_result($stmt);

    // Comprueba si hay resultados
    if (mysqli_num_rows($result) > 0) {
      // Si el usuario existe, ahora verificamos la contraseña
      $consulta = "SELECT * FROM admin WHERE usuario = ? AND password = ?";

      // Prepara la consulta para verificar la contraseña
      if ($stmt = mysqli_prepare($connection, $consulta)) {
        // Vincula los parámetros
        mysqli_stmt_bind_param($stmt, "ss", $usuario, $pass);

        // Ejecuta la consulta
        mysqli_stmt_execute($stmt);

        // Obtiene el resultado
        $result = mysqli_stmt_get_result($stmt);

        // Array para almacenar los datos
        $data = [];

        // Comprueba si hay resultados
        if (mysqli_num_rows($result) > 0) {
          // Recorre los resultados y los almacena en el array
          while ($fila = mysqli_fetch_assoc($result)) {
            $data[] = $fila;
          }
          // Retorna los datos
          return $data;
        } else {
          // Si la contraseña no coincide
          echo "La contraseña no coincide"; ?>
          <br><a href="../Paginas/login.html">Volver</a>
        <?php
          return $data = 403;
        }
      } else {
        // Si hay un error al preparar la consulta de contraseña
        echo "Error en la consulta de contraseña"; ?>
        <br><a href="../Paginas/login.html">Volver</a>
      <?php
        return $data = 501;
      }
    } else {
      // Si no se encuentra el usuario
      echo "El usuario no existe"; ?>
      <br><a href="../Paginas/login.html">Volver</a>
    <?php
      return $data = 404;
    }
  } else {
    // Si hay un error al preparar la consulta de usuario
    echo "Error en la consulta de usuario"; ?>
    <br><a href="../Paginas/login.html">Volver</a>
<?php
    return $data = 500;
  }
}
