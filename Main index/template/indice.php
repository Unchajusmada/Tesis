<div class="indice" id="indice">
  <div id="contenedor-boton" class="d-flex justify-content-center">
    <button id="boton-indice"><i id="icono-indice" class="bi bi-arrow-bar-left"></i></button>
  </div>
  <aside id="menu">
    <h3>Organizar por:</h3>
    <ul>
      <li><a href="autor.php" class="a-indice">Autor</a></li>
      <li><a href="publicacion.php" class="a-indice">Año</a></li>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" id="carrera-link" data-toggle="dropdown">Carrera</a>
        <div class="dropdown-menu rounded-0 m-0">
          <?php
          $datos_teg_carrera = obtener_carreras($conection);

          foreach ($datos_teg_carrera as $row) : ?>
            <a href="<?php echo generarEnlaceCarrera($row['nombre_carrera']); ?>" class="dropdown-item" id="carrera">
              <?php echo $row['nombre_carrera']; ?>
            </a>
          <?php endforeach; ?>
        </div>
      </li>
      <li><a href="titulo.php" class="a-indice">Título</a></li>
      <li><a href="tutor.php" class="a-indice">Tutor</a></li>
    </ul>
  </aside>
</div>