-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-05-2025 a las 06:10:46
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ferromax`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `categoria` text NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `categoria`, `fecha`) VALUES
(1, ' CONSTRUCCION', '2025-05-11 16:03:25'),
(2, ' CARPINTERIA', '2025-05-11 16:03:33'),
(3, 'PLOMERIA', '2025-05-11 16:03:18'),
(4, 'PINTURA Y ACCESORIOS', '2024-10-02 01:32:33'),
(6, 'ADHESIVOS Y SELLADORES', '2024-10-02 01:32:55'),
(7, 'CONECTORES Y TUBOS', '2024-10-02 01:42:00'),
(8, 'HERRAMIENTAS DE JARDINERIA', '2024-10-03 23:05:21'),
(9, 'Tornillos', '2025-05-11 16:02:09'),
(10, 'Fontaneria', '2025-05-11 16:02:29'),
(11, 'Electricidad', '2025-05-11 16:02:41'),
(12, 'Fierros', '2025-05-11 16:03:50'),
(13, 'Impermiabilizante', '2025-05-11 16:15:49'),
(14, 'Seguridad', '2025-05-12 01:17:16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `documento` varchar(11) NOT NULL,
  `telefono` text NOT NULL,
  `direccion` text NOT NULL,
  `compras` int(11) NOT NULL,
  `ultima_compra` datetime NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nombre`, `documento`, `telefono`, `direccion`, `compras`, `ultima_compra`, `fecha`) VALUES
(1, 'sn', 'sn', ' 000-00-000', 'sn', 0, '0000-00-00 00:00:00', '2025-05-12 04:00:59');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `id` int(11) NOT NULL,
  `codigo` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_proveedor` int(11) NOT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT 1,
  `fecha_alta` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_compra`
--

CREATE TABLE `detalle_compra` (
  `id` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `id_compra` int(11) NOT NULL,
  `producto` varchar(200) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio_compra` decimal(10,2) NOT NULL,
  `subtotal` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_venta`
--

CREATE TABLE `detalle_venta` (
  `id` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `id_venta` int(11) NOT NULL,
  `producto` varchar(200) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio_venta` decimal(10,2) NOT NULL,
  `precio_compra` decimal(10,2) NOT NULL,
  `subtotal` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `madelas`
--

CREATE TABLE `madelas` (
  `id` int(11) NOT NULL,
  `madela` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `madelas`
--

INSERT INTO `madelas` (`id`, `madela`) VALUES
(1, 'LIJA PARA PARED'),
(3, 'LIJA PARA METAL'),
(4, 'LIJA PARA MADERA'),
(21, 'disco de corte para metal'),
(22, 'disco de corte para cerámica '),
(23, 'disco de corte para madera'),
(27, 'ALICATE DE SUJECCION'),
(28, 'ALICATE DE CORTE'),
(29, 'adhesivo para tubos'),
(30, 'PROTECCION'),
(31, 'BALDE GRANDE'),
(32, 'BALDE MEDIANO'),
(33, 'BALDE PEQUEÑO'),
(34, 'CLAVOS BOLSA DE  1K'),
(35, 'CARRTILLA'),
(36, 'impermialisante'),
(37, 'Herramientas Manuales'),
(38, 'Masilla'),
(39, 'Sellador'),
(40, 'accesorio para pintar'),
(41, 'cerradura'),
(42, 'Tornillo para madera'),
(43, 'tornillo para pared'),
(44, 'tornillo pra duralit');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marcas`
--

CREATE TABLE `marcas` (
  `id` int(11) NOT NULL,
  `marca` text NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `marcas`
--

INSERT INTO `marcas` (`id`, `marca`, `fecha`) VALUES
(1, 'MONOPOL', '2024-09-17 01:13:08'),
(2, 'RIBEPAR', '2024-09-17 15:13:33'),
(5, 'IRWIN', '2024-10-04 00:12:30'),
(6, 'SIKA', '2024-10-04 00:12:39'),
(7, '3M', '2024-10-04 00:12:57'),
(8, 'NORTON', '2024-10-04 00:13:15'),
(9, 'TAMONTINA', '2024-10-04 00:13:23'),
(10, 'SINTEPLAST', '2024-11-04 14:00:38'),
(12, 'Uyustool', '2025-05-12 01:14:41');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `id_marca` int(11) NOT NULL,
  `id_madela` int(11) NOT NULL,
  `nombre` varchar(11) NOT NULL,
  `codigo` text NOT NULL,
  `descripcion` text NOT NULL,
  `medida` varchar(11) NOT NULL,
  `imagen` text DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `precio_venta` float DEFAULT NULL,
  `precio_compra` float DEFAULT NULL,
  `ventas` int(11) DEFAULT NULL,
  `fecha` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `id_categoria`, `id_marca`, `id_madela`, `nombre`, `codigo`, `descripcion`, `medida`, `imagen`, `stock`, `precio_venta`, `precio_compra`, `ventas`, `fecha`) VALUES
(78, 6, 7, 29, 'Banda antid', '602', 'color negro con arillo', '5.5M', 'vistas/img/productos/602/597.jpg', 107, 12, 10, 3, '2025-04-02 19:10:10'),
(81, 1, 7, 3, 'LIJA', '101', 'LIJA CON ASPERO  COLOR CAFE', '100m', 'vistas/img/productos/101/911.jpg', 99, 50, 40, 1, '2025-04-02 19:10:10'),
(82, 4, 10, 31, 'PINTURA', '401', 'PINTURA COLOR AZUL ', '18L', 'vistas/img/productos/401/349.png', 110, 30, 20, 1, '2025-04-03 20:09:24'),
(83, 1, 1, 33, 'PINTURA', '102', 'COLOR AMARILLO', '20L', 'vistas/img/productos/102/736.jpg', 103, 50, 40, 4, '2025-05-11 17:40:19'),
(85, 4, 7, 30, '', '402', 'gafas de seguridad', '30x40mm', 'vistas/img/productos/402/837.jpg', 17, 12, 10, 1, '2025-05-11 17:40:19'),
(86, 4, 7, 30, '', '403', 'huantyes de seguridad color gris', '15cm', 'vistas/img/productos/403/841.jpg', 17, 18, 15, 1, '2025-05-11 17:40:19'),
(87, 6, 7, 29, '', '603', 'cinta acolor nenegro', '100m', 'vistas/img/productos/603/104.jpg', 43, 12, 50, 2, '2025-05-11 17:40:19'),
(90, 6, 7, 29, '', '604', 'cinta color rojo', '100m ', 'vistas/img/productos/604/697.jpg', 36, 12, 10, 2, '2025-05-11 17:40:19'),
(91, 6, 7, 29, '', '605', 'cinta de enmascar color blanco', '100m', 'vistas/img/productos/605/352.jpg', 24, 14, 12, 4, '2025-05-11 17:40:19'),
(93, 6, 7, 29, '', '606', 'caretilla  colorblanco negro y gris', '100m', 'vistas/img/productos/606/184.jpg', 13, 25, 20, 5, '2025-05-11 17:40:19'),
(95, 4, 7, 30, '', '404', 'audifonos de seguridad color azul', '0', 'vistas/img/productos/404/124.jpg', 53, 55, 50, 5, '2025-05-11 17:40:19'),
(97, 13, 10, 31, '', '1301', 'Recuplast Fibrado', '18L', 'vistas/img/productos/1301/991.jpg', 99, 30, 30, 1, '2025-05-11 17:40:19'),
(98, 13, 10, 32, '', '1302', 'Recuplast Grietas', '10L', 'vistas/img/productos/1302/961.jpg', 99, 28, 25, 1, '2025-05-11 17:40:19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `empresa` varchar(100) NOT NULL,
  `telefono` varchar(12) NOT NULL,
  `direccion` text NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`id`, `nombre`, `empresa`, `telefono`, `direccion`, `fecha`) VALUES
(1, 'sn', 'sn', '00000000', 'sn', '2025-05-12 04:02:09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `usuario` text NOT NULL,
  `password` text NOT NULL,
  `perfil` text NOT NULL,
  `foto` text NOT NULL,
  `estado` int(11) NOT NULL,
  `ultimo_login` datetime NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `usuario`, `password`, `perfil`, `foto`, `estado`, `ultimo_login`, `fecha`) VALUES
(1, 'admin', 'admin', '$2a$07$asxx54ahjppf45sd87a5auGZEtGHuyZwm.Ur.FJvWLCql3nmsMbXy', 'Administrador', 'vistas/img/usuarios/admin/522.png', 1, '2025-04-22 20:58:57', '2025-04-23 00:58:57'),
(2, 'Carla Alejandra ', 'carla', '$2a$07$asxx54ahjppf45sd87a5auzrnXKQ/xqxfrDlQ2vTa4aimiFqQJwKW', 'Vendedor', 'vistas/img/usuarios/carla/169.jpg', 1, '0000-00-00 00:00:00', '2025-05-12 04:08:05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id` int(11) NOT NULL,
  `codigo` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_vendedor` int(11) NOT NULL,
  `total` float NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_compra_usuario` (`id_usuario`),
  ADD KEY `fk_compra_proveedor` (`id_proveedor`);

--
-- Indices de la tabla `detalle_compra`
--
ALTER TABLE `detalle_compra`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_detalle_compra_producto` (`id_producto`),
  ADD KEY `fk_detalle_compra_compra` (`id_compra`);

--
-- Indices de la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_producto` (`id_producto`),
  ADD KEY `fk_venta` (`id_venta`);

--
-- Indices de la tabla `madelas`
--
ALTER TABLE `madelas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `marcas`
--
ALTER TABLE `marcas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_categoria` (`id_categoria`),
  ADD KEY `fk_id_marca` (`id_marca`),
  ADD KEY `fk_id_madela` (`id_madela`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cliente` (`id_cliente`),
  ADD KEY `id_vendedor` (`id_vendedor`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detalle_compra`
--
ALTER TABLE `detalle_compra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `madelas`
--
ALTER TABLE `madelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT de la tabla `marcas`
--
ALTER TABLE `marcas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `compras`
--
ALTER TABLE `compras`
  ADD CONSTRAINT `fk_compra_proveedor` FOREIGN KEY (`id_proveedor`) REFERENCES `proveedor` (`id`),
  ADD CONSTRAINT `fk_compra_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `detalle_compra`
--
ALTER TABLE `detalle_compra`
  ADD CONSTRAINT `fk_detalle_compra_compra` FOREIGN KEY (`id_compra`) REFERENCES `compras` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_detalle_compra_producto` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  ADD CONSTRAINT `fk_producto` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_venta` FOREIGN KEY (`id_venta`) REFERENCES `ventas` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `fk_id_madela` FOREIGN KEY (`id_madela`) REFERENCES `madelas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_marca` FOREIGN KEY (`id_marca`) REFERENCES `marcas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
