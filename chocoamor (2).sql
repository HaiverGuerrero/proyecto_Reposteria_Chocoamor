-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-08-2022 a las 06:14:08
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
-- Base de datos: `chocoamor`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `direccion` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `email`, `pass`, `nombre`, `direccion`) VALUES
(18, 'a@a', 'alejandro', 'Alejandro', 'monterrey'),
(19, 'alejandro404notfound@hotmail.com', '12345', 'José', 'av. guayana'),
(42, 'pedro@gmail.com', 'pedro', 'pedro', NULL),
(43, 'Joel@gmail.com', 'Joel', 'Joel', NULL),
(57, 'tulio@gmail.com', 'tulio', 'tulio', NULL),
(58, 'josealejandrogilmendez08@gmail.com', 'Alejandro.9', 'Jose alejandro', 'av. guyana');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalleventas`
--

CREATE TABLE `detalleventas` (
  `id` int(11) NOT NULL,
  `idProd` int(5) NOT NULL,
  `idVentas` int(5) NOT NULL,
  `cantidad` int(5) NOT NULL,
  `precio` double NOT NULL,
  `subTotal` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detalleventas`
--

INSERT INTO `detalleventas` (`id`, `idProd`, `idVentas`, `cantidad`, `precio`, `subTotal`) VALUES
(1, 5, 9, 1, 10, 10),
(2, 7, 9, 1, 15, 15),
(3, 5, 10, 1, 10, 10),
(4, 7, 10, 1, 15, 15),
(5, 5, 11, 2, 10, 20),
(6, 6, 11, 1, 8, 8),
(7, 5, 12, 2, 10, 20),
(8, 6, 12, 1, 8, 8),
(9, 5, 13, 2, 10, 20),
(10, 8, 13, 1, 100, 100),
(11, 5, 14, 1, 10, 10),
(12, 6, 14, 1, 8, 8),
(13, 6, 15, 3, 8, 24),
(14, 6, 16, 2, 8, 16),
(15, 5, 17, 2, 10, 20),
(16, 5, 18, 5, 10, 50),
(17, 6, 19, 5, 8, 40),
(18, 5, 20, 3, 10, 30),
(19, 5, 21, 2, 10, 20);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `files`
--

CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `filename` varchar(250) NOT NULL,
  `filesize` int(11) NOT NULL,
  `web_path` varchar(250) NOT NULL,
  `system_path` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `files`
--

INSERT INTO `files` (`id`, `filename`, `filesize`, `web_path`, `system_path`) VALUES
(1, 'vent2.jpg', 2157354, '/chocoamor/uploads/1.jpg', 'C:/xampp/htdocs/chocoamor/uploads/1.jpg'),
(2, 'chocolate-cake.jpg', 2568269, '/chocoamor/uploads/2.jpg', 'C:/xampp/htdocs/chocoamor/uploads/2.jpg'),
(3, 'chocolate-cake.jpg', 2568269, 'chocoamor/uploads/3.jpg', 'C:/xampp/htdocschocoamor/uploads/3.jpg'),
(4, 'chocolate-cake.jpg', 2568269, 'htdocs/chocoamor/uploads/4.jpg', 'C:/xampp/htdocshtdocs/chocoamor/uploads/4.jpg'),
(5, 'chocolate-cake.jpg', 2568269, '/upload/5.jpg', 'C:/xampp/htdocs/upload/5.jpg'),
(6, 'chocolate-cake.jpg', 2568269, '/upload/6.jpg', 'C:/xampp/htdocs/upload/6.jpg'),
(7, 'vent2.jpg', 2157354, '/chocoamor/upload/7.jpg', 'C:/xampp/htdocs/chocoamor/upload/7.jpg'),
(8, 'vent3.jpg', 718375, '/chocoamor/upload/8.jpg', 'C:/xampp/htdocs/chocoamor/upload/8.jpg'),
(9, 'testimonial.jpg', 8966, '/chocoamor/upload/9.jpg', 'C:/xampp/htdocs/chocoamor/upload/9.jpg'),
(10, 'chocolate-cake.jpg', 2568269, '/chocoamor/upload/10.jpg', 'C:/xampp/htdocs/chocoamor/upload/10.jpg'),
(11, 'vent1.jpg', 3010919, '/chocoamor/upload/11.jpg', 'C:/xampp/htdocs/chocoamor/upload/11.jpg'),
(12, 'vent3.jpg', 718375, '/chocoamor/upload/12.jpg', 'C:/xampp/htdocs/chocoamor/upload/12.jpg'),
(13, 'testimonial.jpg', 8966, '/chocoamor/upload/13.jpg', 'C:/xampp/htdocs/chocoamor/upload/13.jpg'),
(14, 'cake-shop.jpg', 1514630, '/chocoamor/upload/14.jpg', 'C:/xampp/htdocs/chocoamor/upload/14.jpg'),
(15, 'vent3.jpg', 718375, '/chocoamor/upload/15.jpg', 'C:/xampp/htdocs/chocoamor/upload/15.jpg'),
(16, 'vent3.jpg', 718375, '/chocoamor/upload/16.jpg', 'C:/xampp/htdocs/chocoamor/upload/16.jpg'),
(17, 'vent2.jpg', 2157354, '/chocoamor/upload/17.jpg', 'C:/xampp/htdocs/chocoamor/upload/17.jpg'),
(18, 'vent1.jpg', 3010919, '/chocoamor/upload/18.jpg', 'C:/xampp/htdocs/chocoamor/upload/18.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `precio` double NOT NULL,
  `existencia` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `precio`, `existencia`) VALUES
(5, 'Torta de chocolate', 10, 10),
(6, 'Pie de limon', 8, 1),
(7, 'cupcake', 15, 20),
(8, 'haiver', 100, 1),
(9, 'aaaaaa', 13, 13),
(10, 'asdfasdf', 133, 13),
(11, 'ya', 46, 3),
(12, 'ejemplo', 12.21, 30);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos_files`
--

CREATE TABLE `productos_files` (
  `producto_id` int(11) NOT NULL,
  `file_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos_files`
--

INSERT INTO `productos_files` (`producto_id`, `file_id`) VALUES
(5, 10),
(6, 11),
(7, 12),
(9, 14),
(10, 15),
(11, 16),
(8, 13),
(8, 17),
(12, 18);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recibe`
--

CREATE TABLE `recibe` (
  `id` int(5) NOT NULL,
  `idCli` int(5) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `direccion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `recibe`
--

INSERT INTO `recibe` (`id`, `idCli`, `nombre`, `email`, `direccion`) VALUES
(1, 19, 'mama', 'mama@gmail.com', 'direccionde mi mama'),
(21, 18, 'Alejandro', 'a@a', 'monterrey'),
(22, 58, 'Jose alejandro', 'josealejandrogilmendez08@gmail.com', 'av. guyana');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `rol` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `rol`) VALUES
(1, 'administrador'),
(2, 'trabajador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `idRol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `email`, `pass`, `nombre`, `idRol`) VALUES
(7, 'admin@admin', 'admin', 'jose', 1),
(8, 'trabajador@trabajador', 'trabajador', 'trabajador', 2),
(9, 'ejemplo@ejemplo', 'ejemplo', 'ejemplo', 1),
(11, 'administrador2@admin', 'administrador2', 'administrador2', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id` int(11) NOT NULL,
  `idCli` int(5) NOT NULL,
  `idPago` varchar(255) NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id`, `idCli`, `idPago`, `fecha`) VALUES
(1, 19, 'ch_3LRKNJERcA3vDtSv0QdhlJhT', '2022-07-30 14:26:07'),
(2, 19, 'ch_3LRKRgERcA3vDtSv090JWy0A', '2022-07-30 14:30:38'),
(3, 19, 'ch_3LRKUZERcA3vDtSv1DTRF1kZ', '2022-07-30 14:33:36'),
(4, 19, 'ch_3LRLqhERcA3vDtSv0BhwH42I', '2022-07-30 16:00:32'),
(5, 19, 'ch_3LRLyWERcA3vDtSv1NDii6pW', '2022-07-30 16:08:37'),
(6, 19, 'ch_3LRM2BERcA3vDtSv1qljJOJ5', '2022-07-30 16:12:25'),
(7, 19, 'ch_3LRM5aERcA3vDtSv0UcKfYgw', '2022-07-30 16:15:55'),
(8, 19, 'ch_3LRM9wERcA3vDtSv1AHfVX0M', '2022-07-30 16:20:25'),
(9, 19, 'ch_3LRMDLERcA3vDtSv1n6sfhqK', '2022-07-30 16:23:56'),
(10, 19, 'ch_3LRME5ERcA3vDtSv0E2Fji6k', '2022-07-30 16:24:43'),
(11, 19, 'ch_3LRMFCERcA3vDtSv0gxCfuA0', '2022-07-30 16:25:51'),
(12, 19, 'ch_3LRMGUERcA3vDtSv1Gmx7vGg', '2022-07-30 16:27:12'),
(13, 19, 'ch_3LRMMAERcA3vDtSv1zRFMDma', '2022-07-30 16:33:04'),
(14, 19, 'ch_3LRe1VERcA3vDtSv1QMUBoSe', '2022-07-31 11:24:53'),
(15, 19, 'ch_3LRe2HERcA3vDtSv13hPL9LX', '2022-07-31 11:25:41'),
(16, 19, 'ch_3LRe3bERcA3vDtSv1lerv562', '2022-07-31 11:27:03'),
(17, 19, 'ch_3LReZXERcA3vDtSv11z9gH2k', '2022-07-31 12:00:03'),
(18, 19, 'ch_3LRiDeERcA3vDtSv0kaIEWUc', '2022-07-31 15:53:42'),
(19, 19, 'ch_3LS0sNERcA3vDtSv1PRjvkbf', '2022-08-01 11:48:57'),
(20, 18, 'ch_3LS2kPERcA3vDtSv1gUmJb3m', '2022-08-01 13:48:52'),
(21, 58, 'ch_3LSYwjERcA3vDtSv1evrWyUu', '2022-08-03 00:11:44');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kEmail` (`email`);

--
-- Indices de la tabla `detalleventas`
--
ALTER TABLE `detalleventas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fkIdProd` (`idProd`),
  ADD KEY `fkIdVenta` (`idVentas`);

--
-- Indices de la tabla `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos_files`
--
ALTER TABLE `productos_files`
  ADD KEY `fkProdId` (`producto_id`),
  ADD KEY `fkFileId` (`file_id`);

--
-- Indices de la tabla `recibe`
--
ALTER TABLE `recibe`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `fkIdCli` (`idCli`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fkIdRol` (`idRol`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fkIdCli` (`idCli`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT de la tabla `detalleventas`
--
ALTER TABLE `detalleventas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `recibe`
--
ALTER TABLE `recibe`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalleventas`
--
ALTER TABLE `detalleventas`
  ADD CONSTRAINT `idProd` FOREIGN KEY (`idProd`) REFERENCES `productos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `idVentas` FOREIGN KEY (`idVentas`) REFERENCES `ventas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `productos_files`
--
ALTER TABLE `productos_files`
  ADD CONSTRAINT `fkFileId` FOREIGN KEY (`file_id`) REFERENCES `files` (`id`),
  ADD CONSTRAINT `fkProdId` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fkIdRol` FOREIGN KEY (`idRol`) REFERENCES `roles` (`id`);

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `idCli` FOREIGN KEY (`idCli`) REFERENCES `clientes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
