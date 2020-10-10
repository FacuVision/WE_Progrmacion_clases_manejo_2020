-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-10-2020 a las 22:49:57
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
-- Base de datos: `escuelamanejo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administradores`
--

CREATE TABLE `administradores` (
  `id_administrador` int(11) NOT NULL,
  `id_empleado` int(11) DEFAULT NULL,
  `admin_contra` varchar(50) DEFAULT NULL,
  `admin_estado` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `administradores`
--

INSERT INTO `administradores` (`id_administrador`, `id_empleado`, `admin_contra`, `admin_estado`) VALUES
(1, 1, 'olenka@gmail.com', 'habilitado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `agnos`
--

CREATE TABLE `agnos` (
  `id_agno` int(11) NOT NULL,
  `agno_numero` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `agnos`
--

INSERT INTO `agnos` (`id_agno`, `agno_numero`) VALUES
(1, '2020'),
(2, '2021'),
(3, '2022');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE `alumnos` (
  `id_alumno` int(11) NOT NULL,
  `alum_nombre` varchar(50) DEFAULT NULL,
  `alum_apellido` varchar(50) DEFAULT NULL,
  `alum_telefono` int(9) DEFAULT NULL,
  `alum_correo` varchar(50) DEFAULT NULL,
  `alum_estado_pago` varchar(50) DEFAULT NULL,
  `alum_estado` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`id_alumno`, `alum_nombre`, `alum_apellido`, `alum_telefono`, `alum_correo`, `alum_estado_pago`, `alum_estado`) VALUES
(1, 'Pepe', 'Gomez', 98745863, 'Pepe@gmail.com', 'pendiente', 'habilitado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clases_manejo`
--

CREATE TABLE `clases_manejo` (
  `id_clase_manejo` int(11) NOT NULL,
  `id_dia` int(11) DEFAULT NULL,
  `id_instructor` int(11) DEFAULT NULL,
  `clas_descripcion` text,
  `clas_fecha` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `clases_manejo`
--

INSERT INTO `clases_manejo` (`id_clase_manejo`, `id_dia`, `id_instructor`, `clas_descripcion`, `clas_fecha`) VALUES
(1, 35, 1, 'El alumno Pepe Gomez ha cancelado un 50% del saldo', '01-01-2020');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `coches`
--

CREATE TABLE `coches` (
  `id_coche` int(11) NOT NULL,
  `coche_modelo` varchar(50) DEFAULT NULL,
  `coche_tipo` varchar(50) DEFAULT NULL,
  `coche_placa` varchar(50) DEFAULT NULL,
  `coche_marca` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `coches`
--

INSERT INTO `coches` (`id_coche`, `coche_modelo`, `coche_tipo`, `coche_placa`, `coche_marca`) VALUES
(1, 'Alpine', 'automatico', 'AFK-150', 'toyota');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos`
--

CREATE TABLE `cursos` (
  `id_curso` int(11) NOT NULL,
  `cur_nombre` varchar(50) DEFAULT NULL,
  `cur_horas` varchar(10) DEFAULT NULL,
  `cur_descripcion` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cursos`
--

INSERT INTO `cursos` (`id_curso`, `cur_nombre`, `cur_horas`, `cur_descripcion`) VALUES
(1, 'completo', '15', '12 horas de clase en via pública + 2 h de clase en círcuito (2 h de clase y 1h de trayecto)'),
(2, 'especial', '12', '10h de clase en vía pública + 1 hora de círcuito (1 h clase y 1 h trayecto)'),
(3, 'basico', '10', '8 horas de clase en vía pública + 1 hora de clase en círcuito (nosotros programamos 2h  ya que es 1h de clase y 1h de trayecto)'),
(4, 'full practica', '10', '10 horas de clase en vía pública');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_clases_manejo`
--

CREATE TABLE `detalle_clases_manejo` (
  `id_detalle_clases_manejo` int(11) NOT NULL,
  `id_clase_manejo` int(11) DEFAULT NULL,
  `id_curso` int(11) DEFAULT NULL,
  `id_alumno` int(11) DEFAULT NULL,
  `id_coche` int(11) DEFAULT NULL,
  `det_horario` varchar(20) DEFAULT NULL,
  `det_asistencia` varchar(20) DEFAULT NULL,
  `det_n_clase` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `detalle_clases_manejo`
--

INSERT INTO `detalle_clases_manejo` (`id_detalle_clases_manejo`, `id_clase_manejo`, `id_curso`, `id_alumno`, `id_coche`, `det_horario`, `det_asistencia`, `det_n_clase`) VALUES
(1, 1, 1, 1, 1, '1.  8am-9am', 'asistio', '1'),
(4, 1, 1, 1, 1, '2.  9am-10am', 'asistio', '2'),
(5, 1, 1, 1, 1, '3.  10am-11am', 'asistio', '3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dias`
--

CREATE TABLE `dias` (
  `id_dia` int(11) NOT NULL,
  `id_mes` int(11) DEFAULT NULL,
  `dia_numero` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `dias`
--

INSERT INTO `dias` (`id_dia`, `id_mes`, `dia_numero`) VALUES
(35, 2, '1'),
(38, 1, '1'),
(47, 15, '1'),
(48, 19, '1'),
(49, 19, '2'),
(50, 1, '2'),
(51, 1, '3'),
(52, 1, '4');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `id_empleado` int(11) NOT NULL,
  `emp_nombre` varchar(50) DEFAULT NULL,
  `emp_apellido` varchar(50) DEFAULT NULL,
  `emp_telefono` int(9) DEFAULT NULL,
  `emp_correo` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`id_empleado`, `emp_nombre`, `emp_apellido`, `emp_telefono`, `emp_correo`) VALUES
(1, 'olenka', 'garcia', 987456965, 'olenka@gmail.com'),
(2, 'Pablo ', 'Gomez', 987478500, 'Pablo@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `instructores`
--

CREATE TABLE `instructores` (
  `id_instructor` int(11) NOT NULL,
  `id_empleado` int(11) DEFAULT NULL,
  `ins_estado` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `instructores`
--

INSERT INTO `instructores` (`id_instructor`, `id_empleado`, `ins_estado`) VALUES
(1, 2, 'habilitado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `meses`
--

CREATE TABLE `meses` (
  `id_mes` int(11) NOT NULL,
  `mes_numero` varchar(4) NOT NULL,
  `id_agno` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `meses`
--

INSERT INTO `meses` (`id_mes`, `mes_numero`, `id_agno`) VALUES
(1, '1', 1),
(2, '2', 1),
(4, '4', 1),
(5, '5', 1),
(6, '6', 1),
(7, '7', 1),
(8, '8', 1),
(9, '9', 1),
(10, '10', 1),
(11, '11', 1),
(13, '12', 1),
(14, '3', 1),
(15, '1', 2),
(16, '2', 2),
(17, '3', 2),
(18, '4', 2),
(19, '5', 2),
(20, '6', 2),
(21, '7', 2),
(22, '8', 2),
(23, '9', 2),
(24, '10', 2),
(25, '11', 2),
(26, '12', 2),
(27, '1', 3),
(28, '2', 3),
(29, '3', 3),
(30, '4', 3),
(31, '5', 3),
(32, '6', 3),
(33, '7', 3),
(34, '8', 3),
(35, '9', 3),
(36, '10', 3),
(37, '11', 3),
(38, '12', 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administradores`
--
ALTER TABLE `administradores`
  ADD PRIMARY KEY (`id_administrador`),
  ADD KEY `id_empleado` (`id_empleado`);

--
-- Indices de la tabla `agnos`
--
ALTER TABLE `agnos`
  ADD PRIMARY KEY (`id_agno`),
  ADD UNIQUE KEY `agno_numero` (`agno_numero`);

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`id_alumno`),
  ADD UNIQUE KEY `alum_telefono` (`alum_telefono`);

--
-- Indices de la tabla `clases_manejo`
--
ALTER TABLE `clases_manejo`
  ADD PRIMARY KEY (`id_clase_manejo`),
  ADD KEY `id_dia` (`id_dia`),
  ADD KEY `id_instructor` (`id_instructor`);

--
-- Indices de la tabla `coches`
--
ALTER TABLE `coches`
  ADD PRIMARY KEY (`id_coche`);

--
-- Indices de la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`id_curso`);

--
-- Indices de la tabla `detalle_clases_manejo`
--
ALTER TABLE `detalle_clases_manejo`
  ADD PRIMARY KEY (`id_detalle_clases_manejo`),
  ADD KEY `id_clase_manejo` (`id_clase_manejo`),
  ADD KEY `id_curso` (`id_curso`),
  ADD KEY `id_coche` (`id_coche`),
  ADD KEY `id_alumno` (`id_alumno`);

--
-- Indices de la tabla `dias`
--
ALTER TABLE `dias`
  ADD PRIMARY KEY (`id_dia`),
  ADD KEY `id_mes` (`id_mes`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`id_empleado`),
  ADD UNIQUE KEY `emp_telefono` (`emp_telefono`);

--
-- Indices de la tabla `instructores`
--
ALTER TABLE `instructores`
  ADD PRIMARY KEY (`id_instructor`),
  ADD KEY `id_empleado` (`id_empleado`);

--
-- Indices de la tabla `meses`
--
ALTER TABLE `meses`
  ADD PRIMARY KEY (`id_mes`),
  ADD KEY `id_agno` (`id_agno`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administradores`
--
ALTER TABLE `administradores`
  MODIFY `id_administrador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `agnos`
--
ALTER TABLE `agnos`
  MODIFY `id_agno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  MODIFY `id_alumno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `clases_manejo`
--
ALTER TABLE `clases_manejo`
  MODIFY `id_clase_manejo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `coches`
--
ALTER TABLE `coches`
  MODIFY `id_coche` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `cursos`
--
ALTER TABLE `cursos`
  MODIFY `id_curso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `detalle_clases_manejo`
--
ALTER TABLE `detalle_clases_manejo`
  MODIFY `id_detalle_clases_manejo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `dias`
--
ALTER TABLE `dias`
  MODIFY `id_dia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `id_empleado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `instructores`
--
ALTER TABLE `instructores`
  MODIFY `id_instructor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `meses`
--
ALTER TABLE `meses`
  MODIFY `id_mes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `administradores`
--
ALTER TABLE `administradores`
  ADD CONSTRAINT `administradores_ibfk_1` FOREIGN KEY (`id_empleado`) REFERENCES `empleados` (`id_empleado`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `clases_manejo`
--
ALTER TABLE `clases_manejo`
  ADD CONSTRAINT `clases_manejo_ibfk_1` FOREIGN KEY (`id_dia`) REFERENCES `dias` (`id_dia`) ON UPDATE CASCADE,
  ADD CONSTRAINT `clases_manejo_ibfk_2` FOREIGN KEY (`id_instructor`) REFERENCES `instructores` (`id_instructor`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `detalle_clases_manejo`
--
ALTER TABLE `detalle_clases_manejo`
  ADD CONSTRAINT `detalle_clases_manejo_ibfk_1` FOREIGN KEY (`id_clase_manejo`) REFERENCES `clases_manejo` (`id_clase_manejo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `detalle_clases_manejo_ibfk_2` FOREIGN KEY (`id_curso`) REFERENCES `cursos` (`id_curso`) ON UPDATE CASCADE,
  ADD CONSTRAINT `detalle_clases_manejo_ibfk_3` FOREIGN KEY (`id_coche`) REFERENCES `coches` (`id_coche`) ON UPDATE CASCADE,
  ADD CONSTRAINT `detalle_clases_manejo_ibfk_4` FOREIGN KEY (`id_alumno`) REFERENCES `alumnos` (`id_alumno`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `dias`
--
ALTER TABLE `dias`
  ADD CONSTRAINT `dias_ibfk_1` FOREIGN KEY (`id_mes`) REFERENCES `meses` (`id_mes`);

--
-- Filtros para la tabla `instructores`
--
ALTER TABLE `instructores`
  ADD CONSTRAINT `instructores_ibfk_1` FOREIGN KEY (`id_empleado`) REFERENCES `empleados` (`id_empleado`);

--
-- Filtros para la tabla `meses`
--
ALTER TABLE `meses`
  ADD CONSTRAINT `meses_ibfk_1` FOREIGN KEY (`id_agno`) REFERENCES `agnos` (`id_agno`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
