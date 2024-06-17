-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-06-2024 a las 14:58:48
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
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'admin', 'admin', 'admin@gmail.com', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carreras`
--

CREATE TABLE `carreras` (
  `cod_carrera` varchar(11) NOT NULL,
  `nombre_carrera` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `carreras`
--

INSERT INTO `carreras` (`cod_carrera`, `nombre_carrera`) VALUES
('0305', 'Técnico Superior Universitario en Enfermería'),
('0905', 'Licenciatura en Administración y Gestión Municipal'),
('1305', 'Ingenieria Civil'),
('1605', 'Ingenieria de Telecomunicaciones'),
('1805', 'Ingenieria Aeronautica'),
('2205', 'Ingenieria Electrica'),
('2305', 'Ingenieria Electronica'),
('2605', 'Ingenieria de Sistemas');

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
(1, 'Diseño Sistema de Control de Inventario, en el entorno web de ventas y capital de negocio en Venezuela para la economía del Comercio Actual', 'Brian Abraham', 'Rodriguez Quintana', '2024', 'brianrodriguez@gmail.com', 'Ingenieria de Sistemas', 'Eddy Velazquez', 'no', 'BRIAN_RODRIGUEZ_TEG.PDF', 'BRIAN_RODRIGUEZ_RESUMEN.PDF'),
(3, 'Desarrollo de un Sistema de Gestión Aplicado a Dispositivos Móviles para el Proceso de Instalación de Fibra Óptica de la Empresa 360NET.', 'Ronney', 'Matloo Bracho', '2024', 'ronneymatloo@gmail.com', 'Ingenieria de Sistemas', 'Erik Zerpa', 'si', 'RONNEY_MATLOO_TEG.PDF', 'RONNEY_MATLOO_RESUMEN.PDF'),
(4, 'Sistema para Mejorar la Gestión Administrativa de Trabajo Especial de Grado en la UNEFA, Núcleo Maracay.', 'Carlos Luis', 'Bruzual Roa', '2024', 'carlosbruzual@gmail.com', 'Ingenieria de Sistemas', 'Alexander Arroyo', 'si', 'CARLOS_BRUZUAL_TEG.PDF', 'CARLOS_BRUZUAL_RESUMEN.PDF');

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
  MODIFY `ID_teg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
