-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-11-2017 a las 23:04:17
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `fueelperro_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` int(11) NOT NULL,
  `nombre_categoria` varchar(100) NOT NULL,
  `precio_categoria` int(11) NOT NULL,
  `imagen` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `nombre_categoria`, `precio_categoria`, `imagen`) VALUES
(65, 'Larata', 2, 'images/delantal1.png'),
(69, 'Largo', 200, 'images/delantal1.png'),
(70, 'Mandril', 200, 'images/delantal1.png'),
(71, 'Arturo', 222, 'images/delantal1.png'),
(72, 'zandia', 22, 'images/delantal1.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentario`
--

CREATE TABLE `comentario` (
  `id_comentario` int(11) NOT NULL,
  `puntaje` tinyint(50) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `id_delantal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `comentario`
--

INSERT INTO `comentario` (`id_comentario`, `puntaje`, `usuario`, `descripcion`, `id_delantal`) VALUES
(1, 5, '1', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi', 3),
(2, 4, '1', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi', 3),
(3, 3, '1', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi', 12),
(4, 2, '1', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi', 11),
(5, 3, '2', 'HOLA SOY PASSA Y ESOTY COMENTANDOASKDJ', 3),
(6, 3, '2', 'HOLA SOY PASSA Y ESOTY COMENTANDOASKDJ', 3),
(7, 3, '2', 'HOLA SOY PASSA Y ESOTY COMENTANDOASKDJ', 11),
(8, 1, 'Arturo', 'Arturo coemntando', 3),
(9, 2, 'Arturo', 'dddddd', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `delantal`
--

CREATE TABLE `delantal` (
  `id_delantal` int(11) NOT NULL,
  `talle_disponible` varchar(10) NOT NULL,
  `descripcion` text NOT NULL,
  `id_categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `delantal`
--

INSERT INTO `delantal` (`id_delantal`, `talle_disponible`, `descripcion`, `id_categoria`) VALUES
(3, 'XL', 'Un delantal muy practico para usos multiples', 65),
(11, 'tt', 'Ricota', 65),
(12, 'XXXL', 'Un delantal con mÃºltiples aplicaciones', 70);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagen`
--

CREATE TABLE `imagen` (
  `id_imagen` int(11) NOT NULL,
  `locacion` varchar(500) NOT NULL,
  `id_delantal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `imagen`
--

INSERT INTO `imagen` (`id_imagen`, `locacion`, `id_delantal`) VALUES
(6, 'delantal1.png', 3),
(7, 'delantal1.png', 3),
(8, 'delantal1.png', 3),
(9, 'delantal1.png', 3),
(10, 'delantal1.png', 11),
(11, 'delantal1.png', 11),
(12, 'delantal1.png', 11),
(13, 'delantal1.png', 11),
(14, 'delantal1.png', 12),
(15, 'delantal1.png', 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_admin` int(11) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `clave` varchar(100) NOT NULL,
  `mail` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_admin`, `usuario`, `clave`, `mail`) VALUES
(1, 'arturo', '$2y$10$psoHOtN0hB3uCCsczXP7kuOsEY2wPjSvc4rcu61jq2a18Bq8Zuh7W', 'arturogreinhold@gmail.com'),
(2, 'passa', '$2y$10$PXcrUsc7nz/5km.z.zKCLODVgH26xG7jI/j6cID7BAMpMXipm6sce', 'luchontandil@hotmail.com');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`id_comentario`),
  ADD KEY `id_delantal` (`id_delantal`);

--
-- Indices de la tabla `delantal`
--
ALTER TABLE `delantal`
  ADD PRIMARY KEY (`id_delantal`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Indices de la tabla `imagen`
--
ALTER TABLE `imagen`
  ADD PRIMARY KEY (`id_imagen`),
  ADD KEY `id_delantal` (`id_delantal`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_admin`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;
--
-- AUTO_INCREMENT de la tabla `comentario`
--
ALTER TABLE `comentario`
  MODIFY `id_comentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `delantal`
--
ALTER TABLE `delantal`
  MODIFY `id_delantal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `imagen`
--
ALTER TABLE `imagen`
  MODIFY `id_imagen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD CONSTRAINT `comentario_ibfk_1` FOREIGN KEY (`id_delantal`) REFERENCES `delantal` (`id_delantal`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `delantal`
--
ALTER TABLE `delantal`
  ADD CONSTRAINT `delantal_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `imagen`
--
ALTER TABLE `imagen`
  ADD CONSTRAINT `imagen_ibfk_1` FOREIGN KEY (`id_delantal`) REFERENCES `delantal` (`id_delantal`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
