-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-04-2021 a las 17:10:12
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `konecta`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblproducto`
--

CREATE TABLE `tblproducto` (
  `id` int(11) NOT NULL,
  `nom_producto` varchar(200) NOT NULL,
  `referencia` varchar(200) NOT NULL,
  `precio` int(16) NOT NULL,
  `peso` int(12) NOT NULL,
  `categoria` varchar(200) NOT NULL,
  `stock` int(12) NOT NULL,
  `fecha` date NOT NULL,
  `fecha_venta` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tblproducto`
--

INSERT INTO `tblproducto` (`id`, `nom_producto`, `referencia`, `precio`, `peso`, `categoria`, `stock`, `fecha`, `fecha_venta`) VALUES
(1, 'papas', 'cod123', 2000, 2, 'Harinas', 30, '2021-04-07', NULL),
(4, 'prueba234', 'cod55534', 4444, 444, 'Harinas', 4, '2021-04-07', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblventa`
--

CREATE TABLE `tblventa` (
  `id_venta` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `fecha_venta` datetime NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tblventa`
--

INSERT INTO `tblventa` (`id_venta`, `id`, `fecha_venta`, `cantidad`) VALUES
(1, 4, '2021-04-07 16:43:03', 10),
(3, 1, '2021-04-07 16:48:38', 20);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tblproducto`
--
ALTER TABLE `tblproducto`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tblventa`
--
ALTER TABLE `tblventa`
  ADD PRIMARY KEY (`id_venta`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tblproducto`
--
ALTER TABLE `tblproducto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tblventa`
--
ALTER TABLE `tblventa`
  MODIFY `id_venta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tblventa`
--
ALTER TABLE `tblventa`
  ADD CONSTRAINT `tblventa_ibfk_1` FOREIGN KEY (`id`) REFERENCES `tblproducto` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
