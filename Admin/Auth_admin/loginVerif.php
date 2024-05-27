<?php
require '../../BBDD/connect_user.php';
include '../../Auth/leer_bbdd.php';

$usuario = $_POST['usuario'];
$pass = $_POST['password'];

$datos_usuarios = login($conection, $usuario, $pass);

// Verifica si se encontraron coincidencias en la base de datos
if (is_array($datos_usuarios)) {
  foreach ($datos_usuarios as $row) {
    if ($row['nivel_acceso'] == 1) {
      header("Location: ../SuperAdmin-panel.php");
    } else if ($row['nivel_acceso'] == 2) {
      header("Location: ../Admin-panel.php");
    } else {
      // Si no se encontraron coincidencias, redirige a la página de inicio de sesión con el código de error en la URL
      header("Location: ../Paginas/login.html?error=" . $datos_usuarios);
    }
  }
}
