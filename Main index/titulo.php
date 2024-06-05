<?php
require '../BBDD/connect_user.php';
include '../Auth/funciones_leer_bbdd.php';

// Función de comparación para ordenar por nombre de autor
function compararPorNombreTeg($a, $b)
{
	return strcmp($a['titulo_teg'], $b['titulo_teg']);
}

$datos_teg = leer($conection);

// Ordenar el arreglo $datos_teg por nombre de autor
usort($datos_teg, 'compararPorNombreTeg');

// Definir el número de elementos por página
$elementos_por_pagina = 6;

// Obtener el número total de páginas
$total_paginas = ceil(count($datos_teg) / $elementos_por_pagina);

// Obtener el número de página actual
$pagina_actual = isset($_GET['pagina']) ? $_GET['pagina'] : 1;

// Obtener los elementos correspondientes a la página actual
$elementos_pagina = array_slice($datos_teg, ($pagina_actual - 1) * $elementos_por_pagina, $elementos_por_pagina);

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<title>Organizar por: TITULO</title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport" />

	<!-- Favicon -->
	<link href="img/unefa.png" rel="icon" />

	<!-- Google Web Fonts -->
	<link href="../Admin/fonts/Poppins-Black.ttf" rel="stylesheet" />

	<!-- Font Awesome -->
	<link rel="stylesheet" href="css/all.css" rel="stylesheet" />

	<!-- Customized Bootstrap Stylesheet -->
	<link href="css/style.css" rel="stylesheet" />
	<link href="css/index.css" rel="stylesheet" />
	<link href="css/extras.css" rel="stylesheet" />
	<link rel="stylesheet" href="../Admin/css/bootstrap-icons-1.11.3/font/bootstrap-icons.css">
</head>

<body>
	<!-- Topbar Start -->
	<div class="bg-primary text-white container pt-2 pb-2 pl-4 pr-4">
		<div class="d-flex justify-content-between">
			<div class="align-self-start ml-10">
				<img class="logos" src="img/defensa logo.png" />
			</div>
			<div class="align-self-end">
				<img class="logos" src="img/unefa.png" alt="" />
			</div>
		</div>
	</div>
	<!-- Topbar End -->

	<!-- Navbar Start -->
	<?php include 'template/navbar.php'; ?>
	<!-- Navbar End -->

	<main>
		<!-- Indice Start -->
		<?php include 'template/indice.php'; ?>
		<!-- Indice End -->


		<!--ESTE EES TU CONTENEDOR MEDIO, MEETELE EL CONTENIDO QUE QUIERAS-->
		<div class="contenedor-medio">
			<div class="container texto-categoria">
				<div class="row">
					<div class="categoria col-md-12 d-flex justify-content-md-center">
						<span>Organizar por Titulo (A-Z)</span>
					</div>
				</div>
			</div>
			<div class="ordenar">
				<?php
				foreach ($elementos_pagina as $row) :
					// Obtener la primera letra del título del TEG
					$primeraLetra = substr($row['titulo_teg'], 0, 1);
				?>
					<div class="clasificar d-md-flex">
						<span style="font-size: 2em; color: white; text-shadow: black 3px 3px 3px; font-weight: bold;"><?php echo $primeraLetra; ?></span>
						<div class="container texto enlace-teg" data-id-teg="<?php echo $row['ID_teg']; ?>">
							<div class="row">
								<div class="titulo col-md-12 d-flex justify-content-md-center">
									<span><?php echo $row['titulo_teg']; ?></span>
								</div>
							</div>
							<div class="row">
								<div class="autor col-md-6">
									<div class="row-md-6 d-flex justify-content-md-start pl-md-3">Autor: </div>
									<div class="row-md-6 d-flex justify-content-md-start pl-md-3">
										<span><?php echo $row['nombres_autor_teg']; ?>,
											<br class="d-none d-md-block">
											<?php echo $row['apellidos_autor_teg']; ?></span>
									</div>
								</div>
								<div class="carrera col-md-6">
									<div class="row-md-6 d-flex justify-content-md-start">Carrera:</div>
									<div class="row-md-6 d-flex justify-content-md-start"><span><?php echo $row['nombre_carrera_autor']; ?></span></div>
								</div>
							</div>
							<div class="row d-flex justify-content-md-end">
								<div class="year col-md-6 d-flex justify-content-md-end">
									<p>Año: <span><?php echo $row['year_teg']; ?></span></p>
								</div>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
			</div>

			<!-- Mostrar la paginación -->
			<div class="pagination">
				<?php if ($pagina_actual > 1) : ?>
					<a class="arrow" href="?pagina=<?php echo $pagina_actual - 1; ?>"><i class="bi bi-arrow-left"></i></a>
				<?php endif; ?>

				<?php for ($i = 1; $i <= $total_paginas; $i++) : ?>
					<a href="?pagina=<?php echo $i; ?>" <?php if ($i == $pagina_actual) echo 'class="active"'; ?>><?php echo $i; ?></a>
				<?php endfor; ?>

				<?php if ($pagina_actual < $total_paginas) : ?>
					<a class="arrow" href="?pagina=<?php echo $pagina_actual + 1; ?>"><i class="bi bi-arrow-right"></i></a>
				<?php endif; ?>
			</div>
		</div>
	</main>

	<!-- Footer Start -->
	<div class="container-fluid text-dark">
		<div class="row footer py-4">
			<div class="col-md-12 px-xl-0">
				<p class="mb-md-0 text-center text-md-center text-light">
					&copy;
					<a class="text-light font-weight-semi-bold" href="#">TEG - Sistema de Gestión Administrativa de los Trabajos Especiales de Grado</a>. All Rights Reserved. Designed by
					<a class="text-light font-weight-semi-bold" href="#">Carlos Bruzual</a>
				</p>
			</div>
		</div>
	</div>
	<!-- Footer End -->

	<!-- Back to Top -->
	<a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>

	<script src="js/jquery-3.7.1.min.js"></script>
	<script src="js/bootstrap.bundle.min.js"></script>

	<!-- Javascript personalizados -->
	<script src="js/main.js"></script>
	<script src="js/redireccion-teg.js"></script>
	<script src="js/filtro-carreras.js"></script>
	<script src="js/indice.js"></script>
	<script src="js/flecha-indice.js"></script>
</body>

</html>