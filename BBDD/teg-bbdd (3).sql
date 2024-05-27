-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-05-2024 a las 14:10:33
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `teg-bbdd`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin`
--

CREATE TABLE `admin` (
  `ID_admin` int(8) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `nombre_usuario` text NOT NULL,
  `apellido_usuario` text NOT NULL,
  `correo` varchar(50) NOT NULL,
  `nivel_acceso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `admin`
--

INSERT INTO `admin` (`ID_admin`, `usuario`, `password`, `nombre_usuario`, `apellido_usuario`, `correo`, `nivel_acceso`) VALUES
(27712072, 'Daye2802', 'Febrero-28', 'Nayelis', 'Ceballos', 'nayelis@gmail.com', 2),
(28387623, 'Unchajusmada', 'Amazonas27', 'Carlos', 'Bruzual', 'carlos@gmail.com', 1),
(29598696, 'Denky13', '1234', 'Brandon', 'Marquez', 'brandon@gmail.com', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `teg`
--

CREATE TABLE `teg` (
  `ID_teg` int(11) NOT NULL,
  `titulo_teg` text NOT NULL,
  `nombres_autor_teg` text NOT NULL,
  `apellidos_autor_teg` text NOT NULL,
  `year_teg` year(4) NOT NULL,
  `correo_autor` varchar(100) NOT NULL,
  `nombre_carrera_autor` varchar(100) NOT NULL,
  `nombres_tutor` varchar(100) DEFAULT NULL,
  `factibilidad` text DEFAULT NULL,
  `archivo_pdf` varchar(100) DEFAULT NULL,
  `archivo_pdf_resumen` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `teg`
--

INSERT INTO `teg` (`ID_teg`, `titulo_teg`, `nombres_autor_teg`, `apellidos_autor_teg`, `year_teg`, `correo_autor`, `nombre_carrera_autor`, `nombres_tutor`, `factibilidad`, `archivo_pdf`, `archivo_pdf_resumen`) VALUES
(2, 'Carga desde teléfono', 'Luis Carlos', 'Roa Bruzual', '2099', 'clbr@gmail.com', 'Ingenieria Electrica', 'Brandon Márquez', 'no', 'COMPROBANTE BANCARIO REGISTRO FUNDICION DEL CENTRO 1.pdf', NULL),
(3, 'Constitucion de la Republica Bolivariana de Venezuela', 'Simón José Antonio de la Santísima Trinidad', 'Bolívar Ponte y Palacios Blanco', '1999', 'simonellibertador@patria.com', 'Ingenieria Civil', 'Andres Bello', 'si', 'constitucion-nacional-20191205135853.pdf', NULL),
(4, 'Prueba tesis titulo largo normal promedio largo', 'Fulanito', 'Detal', '2000', 'luis@gmail.com', 'Ingenieria Aeronautica', 'Luis Luna', 'no', 'RifCarlosBruzual.pdf', NULL),
(5, 'El impacto de Genshin Impact en los jovenes Venezolanos del Siglo XXI', 'Carlos Javier Alfonso', 'Moya Lopez', '2077', 'murderbro@gmail.com', 'Ingenieria de Telecom.', 'Emmanuel Salas y Adrian Ortega', 'no', 'genshin-impact-guide-list-en_compress.pdf', NULL),
(6, 'Sistema para Mejorar la Gestión Administrativa de Trabajo Especial de Grado en la UNEFA Núcleo Maracay', 'Carlos Luis', 'Bruzual Roa', '2024', 'carlosluisbruzualroa@gmail.com', 'Ingenieria de Sistemas', 'Alexander Arroyo', 'si', 'Sistema para Mejorar la Gestion Administrativa de TEG en la UNEFA núcleo Maracay.pdf', 'Resumen TEG Carlos Bruzual.pdf'),
(7, 'Sistema para Mejorar la Gestión Administrativa de Trabajo Especial de Grado en la UNEFA Núcleo Maracay', 'Carlos Luis', 'Bruzual Roa', '2024', 'carlosluisbruzualroa@gmail.com', 'Ingenieria de Telecom.', 'Alexander Arroyo', 'si', 'Informe - Nayelis Ceballos PI Santuario.pdf', 'Cap02 (1).pdf'),
(8, 'Sistema para Mejorar la Gestión Administrativa de Trabajo Especial de Grado en la UNEFA Núcleo Maracay', 'Fulanito', 'Detal', '1999', 'daniel@gmail.com', 'Ingenieria Aeronautica', 'Andres Bello', 'si', 'Cap02 (1).pdf', 'PreKTeachingUnit_BIRDS_spanish.pdf'),
(9, 'Avion hipersonico para viajar a la Velocidad de la Luz', 'Pruebas', 'Bruzual', '2026', 'brandonthememelord@gmail.com', 'Ingenieria Electrica', 'Alexander Arroy', 'no', 'NAYE 5.pdf', 'IMPLA 1.pdf');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID_admin`);

--
-- Indices de la tabla `teg`
--
ALTER TABLE `teg`
  ADD PRIMARY KEY (`ID_teg`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `teg`
--
ALTER TABLE `teg`
  MODIFY `ID_teg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
