<?php
require '../../BBDD/connect_user.php';
include '../../Auth/funciones_leer_bbdd.php';


// Verificar nivel de Acceso
$usuario = $_POST['usuario'];
$pass = $_POST['password'];

$datos_usuarios = login($conection, $usuario, $pass);

// Verifica si se encontraron coincidencias en la base de datos
if (is_array($datos_usuarios)) {
  foreach ($datos_usuarios as $row) {
    if ($row['nivel_acceso'] == 1) {
      header("Location: ../Admin-panel.php?nv=" . $row['nivel_acceso']);
    } else if ($row['nivel_acceso'] == 2) {
      header("Location: ../Admin-panel.php?nv=" . $row['nivel_acceso']);
    } else {
      // Si no se encontraron coincidencias, redirige a la página de inicio de sesión con el código de error en la URL
      header("Location: ../Paginas/login.html?error=1"); // Código de error genérico
    }
  }
} else {
  // Si ocurrió un error durante el proceso de inicio de sesión, redirige a la página de inicio de sesión con el código de error en la URL
  header("Location: ../Paginas/login.html?error=" . $datos_usuarios);
}
