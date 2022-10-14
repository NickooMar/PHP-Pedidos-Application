-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-10-2022 a las 22:19:23
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tp_promocion_programacion`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `ID_cliente` int(11) NOT NULL,
  `DNI_cliente` int(11) DEFAULT NULL,
  `Nombre_completo` varchar(50) DEFAULT NULL,
  `Contraseña` varchar(25) DEFAULT NULL,
  `Telefono_cliente` varchar(15) DEFAULT NULL,
  `Email_cliente` varchar(25) DEFAULT NULL,
  `Localidad_cliente` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`ID_cliente`, `DNI_cliente`, `Nombre_completo`, `Contraseña`, `Telefono_cliente`, `Email_cliente`, `Localidad_cliente`) VALUES
(1, 43717722, 'Nicolás Marsili', '123456', '3413358413', 'nico@gmail.com', 'Rosario'),
(2, 12345678, 'John Wick', '123456', '123456', 'ejemplo@gmail.com', 'Rosario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `ID_Pedido` int(11) NOT NULL,
  `Fecha_Pedido` datetime DEFAULT NULL,
  `ID_cliente` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`ID_Pedido`, `Fecha_Pedido`, `ID_cliente`) VALUES
(1, '2022-10-05 00:00:00', 2),
(2, '2022-10-05 00:00:00', 1),
(3, '2022-10-06 00:00:00', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `ID_Producto` int(11) NOT NULL,
  `Nombre_Producto` varchar(40) DEFAULT NULL,
  `Precio_Producto` int(11) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`ID_Producto`, `Nombre_Producto`, `Precio_Producto`, `stock`) VALUES
(1, 'Mouse ASUS ROG Gladius', 17600, 80),
(2, 'Mother ASUS PRIME A520M', 15100, 50),
(3, 'Grafica ASUS GeForce GTX 1660', 92500, 15),
(4, 'Auriculares ASUS ROG STRIX', 19000, 12),
(5, 'Memoria RAM DDR4 16GB', 16000, 20),
(6, 'Procesador AMD Ryzen 5 1600', 40000, 12),
(7, 'Mouse Glorious Model D', 8000, 30),
(8, 'Gabinete ASUS TUF', 35000, 15),
(9, 'Fuente ASUS ROG THOR', 40000, 8),
(10, 'Disco Solido SSD Kingston', 3000, 20),
(11, 'Disco Rigido WD 2 TB', 10000, 15),
(12, 'Teclado HyperX Alloy RGB', 5000, 25),
(13, 'Monitor LG 27 165Hz', 12000, 12),
(14, 'Grafica ASUS GeForce RTX 3060', 180000, 5),
(15, 'Notebook ASUS ROG ZEPHYRUS G14', 500000, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos_pedidos`
--

CREATE TABLE `productos_pedidos` (
  `ID_Producto_Pedidos` int(11) NOT NULL,
  `Cantidad` int(11) DEFAULT NULL,
  `ID_Producto` int(11) DEFAULT NULL,
  `ID_Pedido` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos_pedidos`
--

INSERT INTO `productos_pedidos` (`ID_Producto_Pedidos`, `Cantidad`, `ID_Producto`, `ID_Pedido`) VALUES
(1, 1, 1, 1),
(2, 1, 1, 2),
(3, 1, 1, 3),
(4, 2, 2, 3),
(5, 3, 3, 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`ID_cliente`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`ID_Pedido`),
  ADD KEY `ID_cliente` (`ID_cliente`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`ID_Producto`);

--
-- Indices de la tabla `productos_pedidos`
--
ALTER TABLE `productos_pedidos`
  ADD PRIMARY KEY (`ID_Producto_Pedidos`),
  ADD KEY `ID_Producto` (`ID_Producto`),
  ADD KEY `ID_Pedido` (`ID_Pedido`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `ID_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `ID_Pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `ID_Producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `productos_pedidos`
--
ALTER TABLE `productos_pedidos`
  MODIFY `ID_Producto_Pedidos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`ID_cliente`) REFERENCES `clientes` (`ID_cliente`);

--
-- Filtros para la tabla `productos_pedidos`
--
ALTER TABLE `productos_pedidos`
  ADD CONSTRAINT `productos_pedidos_ibfk_1` FOREIGN KEY (`ID_Producto`) REFERENCES `productos` (`ID_Producto`),
  ADD CONSTRAINT `productos_pedidos_ibfk_2` FOREIGN KEY (`ID_Pedido`) REFERENCES `pedidos` (`ID_Pedido`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
