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
