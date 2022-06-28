-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-06-2022 a las 04:24:19
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cafeteria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bodega`
--

CREATE TABLE `bodega` (
  `id_bodega` int(20) NOT NULL,
  `bodega` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `bodega`
--

INSERT INTO `bodega` (`id_bodega`, `bodega`) VALUES
(10, 'bodega2'),
(12, 'bodega1'),
(15, 'badega5'),
(25, 'badega3'),
(30, 'bodega4');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` int(20) NOT NULL,
  `categoria` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `categoria`) VALUES
(1, 'Cafés orgánicos'),
(2, 'Rainforest Alliance'),
(3, 'Relationship Coffees'),
(10, 'empanada'),
(12, 'galleta festival'),
(20, 'gaseosa'),
(156, 'detodito');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id_prod` int(12) NOT NULL,
  `name_pro` varchar(255) DEFAULT NULL,
  `referencia` varchar(50) DEFAULT NULL,
  `precio` int(20) DEFAULT NULL,
  `peso` int(10) DEFAULT NULL,
  `categoria` int(20) DEFAULT NULL,
  `stock` int(20) DEFAULT NULL,
  `fecha_creacio` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id_prod`, `name_pro`, `referencia`, `precio`, `peso`, `categoria`, `stock`, `fecha_creacio`) VALUES
(8, 'cafecon leche', '123', 345, 2, 2, 12, '2022-07-06'),
(9, 'cafecon leche', '23544', 2000, 23, 2, 15, '2022-06-05'),
(11, 'empanada', '23345', 2000, 3, 2, 12, '2022-06-22'),
(12, 'galleta', '4566', 1400, 2, 12, 10, '2022-06-27'),
(13, 'papa fritas', '234', 1200, 2, 156, 30, '2022-06-14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta_producto`
--

CREATE TABLE `venta_producto` (
  `id_venta` int(12) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `categoria` int(25) DEFAULT NULL,
  `stocks` int(20) DEFAULT NULL,
  `precio` int(22) DEFAULT NULL,
  `referencia` varchar(23) DEFAULT NULL,
  `fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `venta_producto`
--

INSERT INTO `venta_producto` (`id_venta`, `nombre`, `categoria`, `stocks`, `precio`, `referencia`, `fecha`) VALUES
(1, '', 2, 0, 0, '', '2022-06-22'),
(2, '', 1, 0, 0, '', '2022-06-22'),
(3, '', 1, 0, 0, '', '2022-07-06'),
(4, '', 3, 0, 0, '', '2022-06-27'),
(5, '', 1, 12, 0, '', '2022-06-14'),
(6, '', 1, 15, 0, '', '2022-06-27'),
(7, '', 1, 10, 0, '', '2022-06-14'),
(8, '', 1, 12, 0, '', '2022-06-14');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `bodega`
--
ALTER TABLE `bodega`
  ADD PRIMARY KEY (`id_bodega`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id_prod`),
  ADD KEY `categoria` (`categoria`),
  ADD KEY `stock` (`stock`);

--
-- Indices de la tabla `venta_producto`
--
ALTER TABLE `venta_producto`
  ADD PRIMARY KEY (`id_venta`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id_prod` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `venta_producto`
--
ALTER TABLE `venta_producto`
  MODIFY `id_venta` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`categoria`) REFERENCES `categoria` (`id_categoria`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `producto_ibfk_2` FOREIGN KEY (`stock`) REFERENCES `bodega` (`id_bodega`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
