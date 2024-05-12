<?php
$servername = "localhost"; //nombre del servidor de la bbdd 
$username = "root"; //nombre de usuario en el servidor
$password = ""; //contraseña del usuario del servidor
$board = "teg-bbdd"; // nombre de la base de datos

//conexion con la base de datos
$conection = mysqli_connect($servername, $username, $password, $board);

//Para verificar si esta conectando a la base de datos
if (!$conection) {
  die("Conexion fallida" . mysqli_connect_error());
}
