-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-09-2020 a las 22:59:26
-- Versión del servidor: 10.1.32-MariaDB
-- Versión de PHP: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bdescuelamanejo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `programacion`
--

CREATE TABLE `programacion` (
  `id_programacion` int(11) NOT NULL,
  `pro_horario` varchar(30) NOT NULL,
  `id_instructor` int(11) DEFAULT NULL,
  `id_curso` int(11) DEFAULT NULL,
  `id_alumno` int(11) DEFAULT NULL,
  `id_coche` int(11) DEFAULT NULL,
  `pro_num_clase` varchar(100) DEFAULT NULL,
  `pro_fecha` datetime DEFAULT NULL,
  `pro_descripcion` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `programacion`
--

INSERT INTO `programacion` (`id_programacion`, `pro_horario`, `id_instructor`, `id_curso`, `id_alumno`, `id_coche`, `pro_num_clase`, `pro_fecha`, `pro_descripcion`) VALUES
(1, '8AM - 9AM', 1, 1, 1, 1, '10', '2020-09-17 00:00:00', 'no hay descripcion'),
(2, '9AM - 10AM', 1, 2, 1, 2, '11', '2020-09-17 00:00:00', 'no hay descripcion'),
(3, '10AM - 11AM', 1, 3, 3, 1, '7', '2020-09-17 00:00:00', 'no hay descripcion'),
(4, '11AM - 12AM', 1, 3, 3, 1, '8', '2020-09-17 00:00:00', 'no hay descripcion'),
(5, '12AM - 1PM', 1, 1, 4, 1, '12', '2020-09-17 00:00:00', NULL),
(6, '3PM - 4PM', 1, 1, 4, 1, '12', '2020-09-17 00:00:00', NULL),
(20, '4PM - 5PM', 1, 1, 5, 1, '6', '2020-09-17 00:00:00', NULL),
(23, '5PM - 6PM', 1, 1, 5, 1, '7', '2020-09-17 00:00:00', NULL),
(24, '7PM - 8PM', 1, 1, 5, 1, '8', '2020-09-17 00:00:00', NULL),
(25, '8PM - 9PM', 1, 1, 5, 1, '9', '2020-09-17 00:00:00', NULL),
(26, '8AM - 9AM', 2, 1, 6, 2, '1', '2020-09-17 00:00:00', 'no hay descripcion'),
(27, '9AM - 10AM', 2, 2, 6, 2, '2', '2020-09-17 00:00:00', 'no hay descripcion'),
(28, '10AM - 11AM', 2, 3, 6, 2, '3', '2020-09-17 00:00:00', 'no hay descripcion'),
(29, '11AM - 12AM', 2, 3, 6, 2, '4', '2020-09-17 00:00:00', 'no hay descripcion'),
(30, '12AM - 1PM', 2, 1, 2, 2, '3', '2020-09-17 00:00:00', NULL),
(31, '3PM - 4PM', 2, 1, 2, 2, '4', '2020-09-17 00:00:00', NULL),
(32, '4PM - 5PM', 2, 1, 2, 2, '5', '2020-09-17 00:00:00', NULL),
(33, '5PM - 6PM', 2, 1, 2, 2, '6', '2020-09-17 00:00:00', NULL),
(34, '7PM - 8PM', 2, NULL, NULL, NULL, NULL, NULL, NULL),
(35, '8PM - 9PM', 2, NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `programacion`
--
ALTER TABLE `programacion`
  ADD PRIMARY KEY (`id_programacion`),
  ADD KEY `id_instructor` (`id_instructor`),
  ADD KEY `id_curso` (`id_curso`),
  ADD KEY `id_coche` (`id_coche`),
  ADD KEY `id_alumno` (`id_alumno`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `programacion`
--
ALTER TABLE `programacion`
  MODIFY `id_programacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `programacion`
--
ALTER TABLE `programacion`
  ADD CONSTRAINT `programacion_ibfk_1` FOREIGN KEY (`id_instructor`) REFERENCES `instructor` (`id_instructor`) ON UPDATE CASCADE,
  ADD CONSTRAINT `programacion_ibfk_2` FOREIGN KEY (`id_curso`) REFERENCES `curso` (`id_curso`) ON UPDATE CASCADE,
  ADD CONSTRAINT `programacion_ibfk_3` FOREIGN KEY (`id_coche`) REFERENCES `coche` (`id_coche`) ON UPDATE CASCADE,
  ADD CONSTRAINT `programacion_ibfk_4` FOREIGN KEY (`id_alumno`) REFERENCES `alumno` (`id_alumno`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
