-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-06-2024 a las 02:04:43
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
  `password` varchar(255) NOT NULL,
  `nombre_usuario` text NOT NULL,
  `apellido_usuario` text NOT NULL,
  `correo` varchar(50) NOT NULL,
  `nivel_acceso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `admin`
--

INSERT INTO `admin` (`ID_admin`, `usuario`, `password`, `nombre_usuario`, `apellido_usuario`, `correo`, `nivel_acceso`) VALUES
(5961928, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'admin', 'admin', 'admin@gmail.com', 2),
(27712072, 'Daye2802', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'Nayelis', 'Ceballos', 'nayelis@gmail.com', 1),
(28387623, 'Unchajusmada', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'Carlos', 'Bruzual', 'carlos@gmail.com', 2);

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
  `nombres_tutor` varchar(100) DEFAULT NULL,
  `factibilidad` text DEFAULT NULL,
  `archivo_pdf` varchar(100) DEFAULT NULL,
  `archivo_pdf_resumen` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `teg`
--

INSERT INTO `teg` (`ID_teg`, `titulo_teg`, `nombres_autor_teg`, `apellidos_autor_teg`, `year_teg`, `correo_autor`, `nombre_carrera_autor`, `nombres_tutor`, `factibilidad`, `archivo_pdf`, `archivo_pdf_resumen`) VALUES
(15, 'SEMIFINAL - Sistema para Mejorar la Gestión Administrativa de Trabajo Especial de Grado en la UNEFA núcleo Maracay', 'Carlos Luis', 'Bruzual Roa', '2024', 'carlosluisbruzualroa@gmail.com', 'Ingenieria de Sistemas', 'Alexander Arroyo', 'si', 'Sistema para Mejorar la Gestion Administrativa de TEG en la UNEFA núcleo Maracay.pdf', 'Resumen TEG Carlos Bruzual.pdf'),
(21, 'Sistema para Mejorar la Gestión Administrativa de Trabajo Especial de Grado en la UNEFA núcleo Maracay', 'Carlos Luis', 'Bruzual Roa', '2024', 'carlosluisbruzualroa@gmail.com', 'Ingenieria Civil', 'Alexander Arroyo', 'si', 'Sistema para Mejorar la Gestion Administrativa de TEG en la UNEFA núcleo Maracay.pdf', 'Resumen TEG Carlos Bruzual.pdf'),
(22, 'Sistema para Mejorar la Gestión Administrativa de Trabajo Especial de Grado en la UNEFA núcleo Maracay', 'Carlos Luis', 'Bruzual Roa', '2024', 'carlosluisbruzualroa@gmail.com', 'Ingenieria Electrica', 'Alexander Arroyo', 'si', 'Sistema para Mejorar la Gestion Administrativa de TEG en la UNEFA núcleo Maracay.pdf', 'Resumen TEG Carlos Bruzual.pdf'),
(23, 'Sistema para Mejorar la Gestión Administrativa de Trabajo Especial de Grado en la UNEFA núcleo Maracay', 'Carlos Luis', 'Bruzual Roa', '2024', 'carlosluisbruzualroa@gmail.com', 'Ingenieria Electronica', 'Alexander Arroyo', 'si', 'Sistema para Mejorar la Gestion Administrativa de TEG en la UNEFA núcleo Maracay.pdf', 'Resumen TEG Carlos Bruzual.pdf'),
(24, 'Sistema para Mejorar la Gestión Administrativa de Trabajo Especial de Grado en la UNEFA núcleo Maracay', 'Carlos Luis', 'Bruzual Roa', '2024', 'carlosluisbruzualroa@gmail.com', 'Ingenieria de Telecom.', 'Alexander Arroyo', 'si', 'Sistema para Mejorar la Gestion Administrativa de TEG en la UNEFA núcleo Maracay.pdf', 'Resumen TEG Carlos Bruzual.pdf'),
(25, 'Sistema para Mejorar la Gestión Administrativa de Trabajo Especial de Grado en la UNEFA núcleo Maracay', 'Carlos Luis', 'Bruzual Roa', '2024', 'carlosluisbruzualroa@gmail.com', 'Ingenieria Aeronautica', 'Alexander Arroyo', 'si', 'Sistema para Mejorar la Gestion Administrativa de TEG en la UNEFA núcleo Maracay.pdf', 'Resumen TEG Carlos Bruzual.pdf'),
(26, 'Sistema para Mejorar la Gestión Administrativa de Trabajo Especial de Grado en la UNEFA núcleo Maracay', 'Carlos Luis', 'Bruzual Roa', '2024', 'carlosluisbruzualroa@gmail.com', 'Ingenieria de Sistemas', 'Alexander Arroyo', 'si', 'Sistema para Mejorar la Gestion Administrativa de TEG en la UNEFA núcleo Maracay.pdf', 'Resumen TEG Carlos Bruzual.pdf'),
(27, 'FINAL - Sistema para Mejorar la Gestión Administrativa de los Trabajos Especiales de Grado en la UNEFA Núcleo Maracay', 'Carlos Luis', 'Bruzual Roa', '2024', 'carlosluisbruzualroa@gmail.com', 'Ingenieria de Sistemas', 'Alexander Arroyo', 'si', 'Sistema para Mejorar la Gestion Administrativa de TEG en la UNEFA núcleo Maracay - FINAL.pdf', 'Resumen TEG Carlos Bruzual.pdf');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID_admin`);

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
  MODIFY `ID_teg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
