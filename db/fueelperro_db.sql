-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-10-2017 a las 03:43:11
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

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
(68, 'Dolores', 200000, 'images/delantal1.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `delantal`
--

CREATE TABLE `delantal` (
  `id_delantal` int(11) NOT NULL,
  `talle_disponible` varchar(10) NOT NULL,
  `descripcion` text NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `imagen` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `delantal`
--

INSERT INTO `delantal` (`id_delantal`, `talle_disponible`, `descripcion`, `id_categoria`, `imagen`) VALUES
(3, 'S', 'eeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee', 65, 'images/delantal1.png');

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
(1, 'arturo', '$2y$10$psoHOtN0hB3uCCsczXP7kuOsEY2wPjSvc4rcu61jq2a18Bq8Zuh7W', 'arturogreinhold@gmail.com');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `delantal`
--
ALTER TABLE `delantal`
  ADD PRIMARY KEY (`id_delantal`),
  ADD KEY `id_categoria` (`id_categoria`);

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
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;
--
-- AUTO_INCREMENT de la tabla `delantal`
--
ALTER TABLE `delantal`
  MODIFY `id_delantal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `delantal`
--
ALTER TABLE `delantal`
  ADD CONSTRAINT `delantal_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`) ON DELETE CASCADE ON UPDATE CASCADE;

