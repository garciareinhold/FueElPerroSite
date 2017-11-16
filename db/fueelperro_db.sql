-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-11-2017 a las 03:21:55
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
(65, 'Ahora es otra', 8, 'images/delantal1.png'),
(69, 'sssss', 2, 'images/delantal1.png'),
(72, 'zandia', 22, 'images/delantal1.png'),
(74, 'categoria2', 2000, 'images/delantal1.png'),
(76, 'eee', 2000, 'images/delantal1.png');

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
(87, 2, 'passa', 'Descripcion categoria 1', 25),
(89, 4, 'passa', 'gsgsd', 25),
(90, 5, 'passa', 'hjfhdjkhfjkdf', 26),
(91, 1, 'passa', 'fsdsfdsgds', 26),
(92, 5, 'passa', 'fhweotew', 27),
(93, 1, 'passa', 'ersf', 27),
(94, 5, 'passa', 'fideos con salsa', 28),
(95, 3, 'passa', 'fia', 28),
(96, 3, 'passa', 'y65trgg', 29),
(97, 2, 'passa', 'xc', 29),
(98, 4, 'passa', 'nisajsahf', 30),
(99, 4, 'passa', 'aguante todo', 30),
(100, 3, 'passa', 'fdsfds', 31),
(101, 3, 'passa', 'kfosapksopa', 31),
(102, 3, 'passa', 'retefdhdf', 32),
(103, 3, 'passa', 'bvxvdsg', 32),
(104, 2, 'soyNuevo', 'xzcvdv', 25),
(105, 4, 'soyNuevo', 'sgsd', 25),
(106, 1, 'soyNuevo', '4444444444444444444', 26),
(107, 3, 'soyNuevo', 'efew', 26),
(108, 5, 'soyNuevo', 'basta chicos', 27),
(109, 5, 'soyNuevo', 'fjdfh', 27),
(110, 2, 'soyNuevo', 'dfds', 28),
(111, 5, 'soyNuevo', 'xs', 28),
(112, 4, 'soyNuevo', 'hfhdfhfhdf', 29),
(113, 3, 'soyNuevo', 'vdvdvsdv', 29),
(114, 3, 'soyNuevo', 'cx', 30),
(115, 3, 'soyNuevo', 'hfdhfd', 30),
(116, 4, 'soyNuevo', 'gfsg', 31),
(117, 1, 'soyNuevo', 'fdfs', 31),
(118, 3, 'soyNuevo', 'gfdg', 32),
(119, 5, 'soyNuevo', 'fds', 32);

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
(25, 'talle 1', 'descripcion 1', 65),
(26, 'talle2', 'descriocion ahora es otra', 65),
(27, 'talle 3', 'cxcbfshfdgvdfgbdfdfb', 65),
(28, 'dfsdfs', 'categoria 222222', 74),
(29, 'nueva nuev', 'nueva nueva nueva', 76),
(30, 'nuevotalle', 'descripcion ssss', 69),
(31, 'talle 6', 'zandia zandia', 72),
(32, 'otrozandia', 'blabalbalbalblabla', 72);

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
(65, 'images/5a0cf17e266f4.jpg', 25),
(66, 'images/5a0cf17e277da.jpg', 25),
(67, 'images/5a0cf17e28695.jpg', 25),
(68, 'images/5a0cf1973205c.jpg', 26),
(69, 'images/5a0cf1973315c.jpg', 26),
(70, 'images/5a0cf19734102.jpg', 26),
(71, 'images/5a0cf1a8d9dfe.jpg', 27),
(72, 'images/5a0cf1a8db1ea.jpg', 27),
(73, 'images/5a0cf1a8dc2b6.jpg', 27),
(74, 'images/5a0cf1c4a123b.jpg', 28),
(75, 'images/5a0cf1c4a231d.jpg', 28),
(76, 'images/5a0cf1c4a37f7.jpg', 28),
(77, 'images/5a0cf1c4a4d15.jpg', 28),
(78, 'images/5a0cf1e3d7c6d.jpg', 29),
(79, 'images/5a0cf1e3d8ca0.jpg', 29),
(80, 'images/5a0cf1e3d9b1e.jpg', 29),
(81, 'images/5a0cf1fcb7778.jpg', 30),
(82, 'images/5a0cf1fcb88a6.jpg', 30),
(83, 'images/5a0cf1fcb97e8.jpg', 30),
(84, 'images/5a0cf213c548e.jpg', 31),
(85, 'images/5a0cf213c65aa.jpg', 31),
(86, 'images/5a0cf213c76fc.jpg', 31),
(87, 'images/5a0cf213c87c2.jpg', 31),
(88, 'images/5a0cf226e8b67.jpg', 32),
(89, 'images/5a0cf226f1bb8.jpg', 32);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `clave` varchar(100) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `is_admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `username`, `clave`, `mail`, `is_admin`) VALUES
(1, 'arturo', '$2y$10$psoHOtN0hB3uCCsczXP7kuOsEY2wPjSvc4rcu61jq2a18Bq8Zuh7W', 'arturogreinhold@gmail.com', 1),
(2, 'passa', '$2y$10$PXcrUsc7nz/5km.z.zKCLODVgH26xG7jI/j6cID7BAMpMXipm6sce', 'luchontandil@hotmail.com', 0),
(3, 'soyNuevo', '$2y$10$.tMyAZzz98eb.3RPWZ20tOGG70mHFBeLnNe7rqDK4ohCVhtVzrOWu', 'soynuevo@gmail.com', 0);

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
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;
--
-- AUTO_INCREMENT de la tabla `comentario`
--
ALTER TABLE `comentario`
  MODIFY `id_comentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;
--
-- AUTO_INCREMENT de la tabla `delantal`
--
ALTER TABLE `delantal`
  MODIFY `id_delantal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT de la tabla `imagen`
--
ALTER TABLE `imagen`
  MODIFY `id_imagen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
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
