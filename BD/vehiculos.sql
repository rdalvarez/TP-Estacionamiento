-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-11-2016 a las 21:41:12
-- Versión del servidor: 10.1.16-MariaDB
-- Versión de PHP: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `estacionamiento`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculos`
--

CREATE TABLE `vehiculos` (
  `id` int(11) NOT NULL,
  `patente` text COLLATE utf8_spanish2_ci NOT NULL,
  `fecha` text COLLATE utf8_spanish2_ci NOT NULL,
  `estacionado` int(2) NOT NULL,
  `hora` text COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `vehiculos`
--

INSERT INTO `vehiculos` (`id`, `patente`, `fecha`, `estacionado`, `hora`) VALUES
(1, '123-123', '2016-10-24', 1, '08:12:01'),
(2, 'ARD-154', '2016-10-24', 0, '15:22:03'),
(3, 'FTE-487', '2016-10-24', 1, '23:30:15'),
(4, 'LIZ-222', '2016-10-24', 0, '03:15:00'),
(5, 'LIZ-222', '2016-10-08', 1, '03:15:00'),
(6, 'GGG-222', '2016-10-8', 1, '10:10:00'),
(8, 'SSS-111', '2016-10-8', 1, '10:10:00'),
(10, 'asd-123', '2016-11-10', 1, '14:14:13'),
(11, 'RDA-684', '2016-11-10', 1, '14:34:25'),
(12, 'RRR-489', '2016-11-10', 1, '15:01:42'),
(13, 'HHH-154', '2016-11-10', 1, '15:04:19'),
(14, 'TTT-987', '2016-11-10', 1, '15:07:14'),
(15, 'PPP-987', '2016-11-10', 1, '15:09:20'),
(16, 'EMM-987', '2016-11-10', 1, '16:33:25'),
(17, 'EFS-147', '2016-11-10', 1, '16:36:38'),
(18, 'PEM-159', '2016-11-10', 1, '16:37:54'),
(19, 'ddd-987', '2016-11-10', 1, '16:40:30'),
(20, 'RTF-987', '2016-11-10', 1, '16:44:05');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
