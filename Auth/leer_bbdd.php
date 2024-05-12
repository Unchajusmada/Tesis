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
