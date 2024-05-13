-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-05-2024 a las 02:08:14
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
-- Estructura de tabla para la tabla `carreras`
--

CREATE TABLE `carreras` (
  `cod_carrera` int(11) NOT NULL,
  `nombre_carrera` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `carreras`
--

INSERT INTO `carreras` (`cod_carrera`, `nombre_carrera`) VALUES
(1305, 'Ingenieria Civil'),
(1605, 'Ingenieria de Telecomunicaciones'),
(1805, 'Ingenieria Aeronautica'),
(2205, 'Ingenieria Electrica'),
(2305, 'Ingenieria Electronica'),
(2605, 'Ingenieria de Sistemas');

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
  `archivo_pdf` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `teg`
--

INSERT INTO `teg` (`ID_teg`, `titulo_teg`, `nombres_autor_teg`, `apellidos_autor_teg`, `year_teg`, `correo_autor`, `nombre_carrera_autor`, `archivo_pdf`) VALUES
(7, 'Sistema para Mejorar la Gestión Administrativa de Trabajo Especial de Grado en la UNEFA Núcleo Maracay', 'Carlos Luis', 'Bruzual Roa', '2024', 'carlosluisbruzualroa@gmail.com', 'Ingenieria de Sistemas', NULL),
(8, 'Sistema para Mejorar la Gestión Administrativa de Trabajo Especial de Grado en la UNEFA Núcleo Maracay', 'Carlos Luis', 'Bruzual Roa', '2024', 'carlosluisbruzualroa@gmail.com', 'Ingenieria Civil', NULL),
(9, 'Prueba', 'Brandon David', 'Marquez Perez', '2025', 'brandonthememelord@gmail.com', 'Ingenieria Electrica', NULL),
(10, 'Prueba', 'Brandon David', 'Marquez Perez', '2026', 'brandonthememelord@gmail.com', 'Ingenieria de Telecom.', NULL),
(11, 'Desarrollo de Asistente Web para la Gestión de Finanzas Personales', 'Nelson Daniel', 'Carrero Rescigno', '2024', 'daniel@gmail.com', 'Ingenieria Aeronautica', NULL),
(12, 'Avion hipersonico para viajar a la Velocidad de la Luz', 'Luis Jose', 'Monasterios', '2077', 'luis@gmail.com', 'Ingenieria Electronica', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carreras`
--
ALTER TABLE `carreras`
  ADD PRIMARY KEY (`cod_carrera`);

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
  MODIFY `ID_teg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
