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
