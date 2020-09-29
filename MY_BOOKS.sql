-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 29-09-2020 a las 21:04:49
-- Versión del servidor: 10.4.13-MariaDB
-- Versión de PHP: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `MY_BOOKS`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autor`
--

CREATE TABLE `autor` (
  `ideautor` int(10) NOT NULL,
  `nombre_autor` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `autor`
--

INSERT INTO `autor` (`ideautor`, `nombre_autor`) VALUES
(30, 'Victor Hugo uppp0'),
(31, 'William Shakespeare'),
(33, 'felipe carlos'),
(39, 'asdf'),
(42, 'felipe marin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `boleta`
--

CREATE TABLE `boleta` (
  `ide_boleta` int(10) NOT NULL,
  `id_lector` int(11) NOT NULL,
  `registro` date DEFAULT NULL,
  `expiracion` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `boleta`
--

INSERT INTO `boleta` (`ide_boleta`, `id_lector`, `registro`, `expiracion`) VALUES
(2, 1, '2020-09-21', '2020-09-21'),
(3, 22, '2020-09-24', '2020-09-24');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_libro`
--

CREATE TABLE `estado_libro` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `estado_libro`
--

INSERT INTO `estado_libro` (`id`, `descripcion`) VALUES
(1, 'disponble'),
(2, 'ocupado'),
(3, 'en proceso');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo_lectura`
--

CREATE TABLE `grupo_lectura` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(50) NOT NULL,
  `genero` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lector_grupos`
--

CREATE TABLE `lector_grupos` (
  `id_lector` int(11) NOT NULL,
  `id_grupo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `leector`
--

CREATE TABLE `leector` (
  `ide_lector` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `direccio` varchar(40) NOT NULL,
  `telefono` bigint(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `leector`
--

INSERT INTO `leector` (`ide_lector`, `nombre`, `direccio`, `telefono`) VALUES
(1, 'carlos', 'calle falsa', 2222),
(22, 'MONI', 'paco rosales', 234);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros`
--

CREATE TABLE `libros` (
  `idelibro` int(11) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `numPaginas` varchar(5) DEFAULT NULL,
  `id_autor` int(10) DEFAULT NULL,
  `id_estante` int(11) DEFAULT NULL,
  `id_orden` int(11) DEFAULT NULL,
  `id_estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `libros`
--

INSERT INTO `libros` (`idelibro`, `titulo`, `numPaginas`, `id_autor`, `id_estante`, `id_orden`, `id_estado`) VALUES
(1, 'Romeo y Julieta', '350', 31, 3, NULL, 1),
(3, 'Viaje al Centro de la Tierra', '234', 30, 3, NULL, 2),
(10, 'pepe pecas', '1', 39, NULL, NULL, NULL),
(12, 'asdf', '60', NULL, 2, NULL, 1),
(13, 'felipe', '60', NULL, NULL, NULL, 1),
(14, 'ok', '1', NULL, 2, NULL, 1),
(15, 'ok', '1', NULL, NULL, NULL, 1),
(16, 'asdf', '1', 30, NULL, NULL, NULL),
(17, 'Romeo y Julietaa', '0', 30, NULL, NULL, NULL),
(19, 'nuevo', '9', 42, 1, NULL, NULL),
(20, 'nuevo', '9', 30, NULL, NULL, NULL),
(21, 'Romeo y Julietaa', '1', 33, NULL, NULL, 2),
(22, 'nuevo', '1', 30, NULL, NULL, NULL),
(23, 'nuevo', '1', 30, NULL, NULL, NULL),
(24, 'asdf', '1', NULL, NULL, NULL, NULL),
(25, 'nuevo', '0', 30, NULL, NULL, NULL),
(26, 'nuevo', '11111', 30, NULL, NULL, NULL),
(27, 'nuevo', '11111', 30, NULL, NULL, NULL),
(28, 'nuevo', '0', 30, NULL, NULL, NULL),
(29, 'nuevo', '3', 30, NULL, NULL, NULL),
(30, 'PPPPP', '0', 30, NULL, NULL, NULL),
(31, 'PPPPP', '0', NULL, NULL, NULL, NULL),
(32, 'PPPPP', '0', NULL, NULL, NULL, NULL),
(33, 'PPPPP', '0', NULL, NULL, NULL, NULL),
(34, 'PPPPP', '0', NULL, NULL, NULL, NULL),
(35, 'nuevo', '1', 30, NULL, NULL, NULL),
(36, 'Romeo y Julieta', '1', 30, NULL, NULL, NULL),
(37, 'nuevo', '-2', 30, NULL, NULL, NULL),
(38, 'nsdfkjbsdkg l-smndrf', '1', 30, NULL, NULL, NULL),
(39, 'gcjjaewsd', '1', 30, NULL, NULL, NULL),
(42, 'nuevo', '2', NULL, NULL, NULL, 1),
(43, 'nuevo', '2', NULL, NULL, NULL, 1),
(46, 'PEPECHOMMM', '1', NULL, NULL, NULL, 1),
(47, 'PEPECHOMMM', '1', NULL, NULL, NULL, 1),
(48, 'PEPECHOMMMM', '1', NULL, NULL, NULL, 1),
(49, 'PEPECHOMMMM', '1', NULL, NULL, NULL, 1),
(54, 'Romeo ', '1200', NULL, NULL, NULL, 1),
(55, 'Romeo ', '1200', NULL, NULL, NULL, 1),
(56, 'safrseger', '44', 30, NULL, NULL, NULL),
(57, 'safrseger', '44', 30, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orden`
--

CREATE TABLE `orden` (
  `ide_orden` int(11) NOT NULL,
  `fecha_entrega` datetime NOT NULL,
  `fecha_devolucion` datetime NOT NULL,
  `id_boleta` int(10) NOT NULL,
  `id_trabajador` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `stante`
--

CREATE TABLE `stante` (
  `id_stante` int(11) NOT NULL,
  `num_estante` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `stante`
--

INSERT INTO `stante` (`id_stante`, `num_estante`) VALUES
(1, '1 a-g'),
(2, '1 h-o'),
(3, '1 p-z');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trabajador`
--

CREATE TABLE `trabajador` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `telefono` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `trabajador`
--

INSERT INTO `trabajador` (`id`, `nombre`, `telefono`) VALUES
(3, 'felipoe', 35346577),
(4, 'felipoe', 35346577),
(5, 'pepe', 222323),
(6, 'carlitos', 222323),
(7, 'chonnn', 2323445);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `autor`
--
ALTER TABLE `autor`
  ADD PRIMARY KEY (`ideautor`);

--
-- Indices de la tabla `boleta`
--
ALTER TABLE `boleta`
  ADD PRIMARY KEY (`ide_boleta`),
  ADD KEY `fk_boleta_leector` (`id_lector`);

--
-- Indices de la tabla `estado_libro`
--
ALTER TABLE `estado_libro`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `grupo_lectura`
--
ALTER TABLE `grupo_lectura`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lector_grupos`
--
ALTER TABLE `lector_grupos`
  ADD KEY `fk_lector` (`id_lector`),
  ADD KEY `fk_grupo` (`id_grupo`);

--
-- Indices de la tabla `leector`
--
ALTER TABLE `leector`
  ADD PRIMARY KEY (`ide_lector`);

--
-- Indices de la tabla `libros`
--
ALTER TABLE `libros`
  ADD PRIMARY KEY (`idelibro`),
  ADD KEY `fk_libro_stante` (`id_estante`),
  ADD KEY `fk_libro_estado` (`id_estado`),
  ADD KEY `fk_libro_orden` (`id_orden`),
  ADD KEY `fk_libro_autor` (`id_autor`);

--
-- Indices de la tabla `orden`
--
ALTER TABLE `orden`
  ADD PRIMARY KEY (`ide_orden`),
  ADD KEY `fk_orden_boleta` (`id_boleta`),
  ADD KEY `fk_orden_trabajador` (`id_trabajador`);

--
-- Indices de la tabla `stante`
--
ALTER TABLE `stante`
  ADD PRIMARY KEY (`id_stante`);

--
-- Indices de la tabla `trabajador`
--
ALTER TABLE `trabajador`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `autor`
--
ALTER TABLE `autor`
  MODIFY `ideautor` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT de la tabla `boleta`
--
ALTER TABLE `boleta`
  MODIFY `ide_boleta` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `estado_libro`
--
ALTER TABLE `estado_libro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `leector`
--
ALTER TABLE `leector`
  MODIFY `ide_lector` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT de la tabla `libros`
--
ALTER TABLE `libros`
  MODIFY `idelibro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT de la tabla `orden`
--
ALTER TABLE `orden`
  MODIFY `ide_orden` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `stante`
--
ALTER TABLE `stante`
  MODIFY `id_stante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `trabajador`
--
ALTER TABLE `trabajador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `boleta`
--
ALTER TABLE `boleta`
  ADD CONSTRAINT `fk_boleta_leector` FOREIGN KEY (`id_lector`) REFERENCES `leector` (`ide_lector`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `lector_grupos`
--
ALTER TABLE `lector_grupos`
  ADD CONSTRAINT `fk_grupo` FOREIGN KEY (`id_grupo`) REFERENCES `grupo_lectura` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_lector` FOREIGN KEY (`id_lector`) REFERENCES `leector` (`ide_lector`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `libros`
--
ALTER TABLE `libros`
  ADD CONSTRAINT `fk_libro_autor` FOREIGN KEY (`id_autor`) REFERENCES `autor` (`ideautor`),
  ADD CONSTRAINT `fk_libro_estado` FOREIGN KEY (`id_estado`) REFERENCES `estado_libro` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_libro_orden` FOREIGN KEY (`id_orden`) REFERENCES `orden` (`ide_orden`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_libro_stante` FOREIGN KEY (`id_estante`) REFERENCES `stante` (`id_stante`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Filtros para la tabla `orden`
--
ALTER TABLE `orden`
  ADD CONSTRAINT `fk_orden_boleta` FOREIGN KEY (`id_boleta`) REFERENCES `boleta` (`ide_boleta`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_orden_trabajador` FOREIGN KEY (`id_trabajador`) REFERENCES `trabajador` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
