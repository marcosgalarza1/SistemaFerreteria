-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-05-2025 a las 02:00:29
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
(13, 'Impermiabilizante', '2025-05-11 16:15:49');

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
(1, 'por defecto', '0000022', '0000000', 'sin direccion', 122, '2025-05-11 13:40:20', '2025-05-11 17:40:20'),
(2, 'ANTONELA MILLER', '74185296SC', ' 785-47-412', '78de agosto', 18, '2024-10-03 21:03:12', '2024-10-04 01:03:12'),
(3, 'Cristina Gusman', '74185296SC', '258741369', '6 de agosto', 18, '2024-10-03 22:32:34', '2024-10-04 02:32:34'),
(4, 'Rosalía Gutiérrez', '9818710SC', ' 695-87-412', 'Av. Moscú', 13, '2024-10-03 20:58:04', '2024-10-04 00:58:04'),
(6, 'ALEJANDRA GARCIA', 's/n', ' 000-00-000', 's/d', 12, '2024-10-03 21:02:04', '2024-11-05 14:17:03'),
(11, 'RUTH NOGALES', '985471697', ' 569-87-412', 'CALLE PITAJAYA', 27, '2025-04-03 16:37:06', '2025-04-03 20:37:06'),
(12, 'BRAYAN FUENTE', '8569744111', ' 698-21-782', 'CALLE TOTAI', 13, '0000-00-00 00:00:00', '2025-04-03 20:36:42'),
(13, 'ANGELA NOGALES', '5698417', ' 745-89-671', 'AV MAPAISO', 3, '0000-00-00 00:00:00', '2025-04-03 20:36:45'),
(14, 'CARLOS ANDRES HURTADO', '78524717', ' 785-22-633', 'BARRIO AMBORO', 11, '0000-00-00 00:00:00', '2025-04-03 20:36:26'),
(15, 'ANA GUTIERREZ', '856932147', ' 784-12-369', 'BARRIO LOS PINOS', 4, '0000-00-00 00:00:00', '2025-04-03 20:36:17'),
(16, 'José daniel ', '7896547', ' 745-12-369', 'calle coco', 8, '2024-10-03 21:02:26', '2024-10-04 01:02:26'),
(17, 'Raquel Ojinaga', '7459632', ' 788-52-244', 'Mercado primavera', 23, '2024-10-23 22:14:02', '2024-10-24 02:14:02'),
(18, 'NAOMI QUINTEROS', '98187456', ' 789-65-412', 'AV. MOSCÚ', 0, '0000-00-00 00:00:00', '2025-04-03 20:11:20'),
(19, 'JHANEL SOLLES', '9658741', ' 856-97-415', 'AV. NUEVO PALMAR', 0, '0000-00-00 00:00:00', '2025-04-03 20:12:13'),
(20, 'XIOMARA SOLLES', '745896', ' 369-85-214', 'AV. NUEVO PALMAR', 0, '0000-00-00 00:00:00', '2025-04-03 20:12:45'),
(21, 'VIAKA MONTENEGRO', '7415896', ' 784-96-314', 'PLAN 3000', 0, '0000-00-00 00:00:00', '2025-04-03 20:13:21'),
(22, 'JORDAN SION', '584697CB', ' 587-46-982', 'AV ALEMANA', 0, '0000-00-00 00:00:00', '2025-04-03 20:23:57'),
(23, 'CESAR VILLAGOMEZ', '693258SC', ' 784-12-369', 'SEGUNDO ANILLO TRANSITO', 0, '0000-00-00 00:00:00', '2025-04-03 20:21:20'),
(24, 'FRANKLIN', '5846978LP', ' 695-21-581', 'AV. CRISTO REDENTOR', 0, '0000-00-00 00:00:00', '2025-04-03 20:21:02'),
(25, 'EDWIN MAMANI', '7845698LP', ' 478-63-148', 'LA REFINIRIA', 0, '0000-00-00 00:00:00', '2025-04-03 20:20:52'),
(26, 'MARISOL MAMANI ', '7446988LP', ' 785-22-136', 'AV. BENI', 0, '0000-00-00 00:00:00', '2025-04-03 20:20:43');

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

--
-- Volcado de datos para la tabla `compras`
--

INSERT INTO `compras` (`id`, `codigo`, `total`, `id_usuario`, `id_proveedor`, `estado`, `fecha_alta`) VALUES
(2, 10001, 7000.00, 1, 3, 1, '2024-10-03 22:00:10'),
(5, 10002, 7500.00, 2, 2, 1, '2024-10-04 00:18:39'),
(6, 10003, 4350.00, 2, 9, 1, '2024-10-04 00:19:25'),
(7, 10004, 1000.00, 2, 6, 1, '2024-10-04 00:20:01'),
(8, 10005, 600.00, 2, 4, 1, '2024-10-04 00:20:46'),
(9, 10006, 4500.00, 2, 2, 1, '2024-10-04 00:21:56'),
(10, 10007, 900.00, 2, 4, 1, '2024-10-04 00:22:25'),
(11, 10008, 1760.00, 2, 5, 1, '2024-10-04 00:22:59'),
(12, 10009, 1700.00, 2, 4, 1, '2024-10-04 00:23:38'),
(13, 10010, 2010.00, 2, 5, 1, '2024-10-04 00:24:20'),
(14, 10011, 635.00, 2, 3, 1, '2024-10-04 00:24:57'),
(15, 10012, 65.00, 2, 10, 1, '2024-10-04 00:25:15'),
(16, 10013, 2190.00, 2, 3, 1, '2024-10-04 00:28:45'),
(17, 10014, 900.00, 2, 5, 1, '2024-10-04 00:29:21'),
(18, 10015, 140.00, 2, 4, 1, '2024-10-04 00:31:24'),
(19, 10016, 270.00, 2, 4, 1, '2024-10-04 00:31:42'),
(20, 10017, 50.00, 2, 5, 1, '2024-10-04 00:32:07'),
(21, 10018, 960.00, 2, 4, 1, '2024-10-04 00:32:26'),
(22, 10019, 400.00, 2, 1, 1, '2024-10-04 00:32:43'),
(23, 10020, 600.00, 2, 3, 1, '2024-10-04 00:33:29'),
(24, 10021, 371.00, 2, 5, 1, '2024-10-04 00:34:38'),
(25, 10022, 1673.00, 2, 3, 1, '2024-10-04 00:38:14'),
(29, 10026, 5000.00, 1, 3, 1, '2024-10-04 00:59:27'),
(30, 10027, 29200.00, 1, 1, 1, '2024-10-04 01:38:44'),
(31, 10028, 10.00, 1, 1, 1, '2024-10-04 01:39:10'),
(32, 10029, 77.00, 1, 1, 1, '2024-10-04 01:39:25'),
(33, 10030, 42.00, 1, 1, 1, '2024-10-04 01:39:49'),
(34, 10031, 12.00, 1, 1, 1, '2024-10-04 01:40:01'),
(35, 10031, 40.00, 1, 1, 1, '2024-10-04 01:40:13'),
(36, 10032, 10.00, 1, 1, 1, '2024-10-04 01:40:22'),
(37, 10032, 120.00, 1, 1, 1, '2024-10-04 01:40:31'),
(38, 10033, 428.00, 1, 1, 1, '2024-10-04 01:40:46'),
(39, 10034, 67.00, 1, 1, 1, '2024-10-04 01:43:45'),
(40, 10035, 120.00, 1, 4, 1, '2024-10-04 01:44:09'),
(41, 10036, 195.00, 1, 3, 1, '2024-10-04 01:45:05'),
(42, 10037, 10.00, 1, 2, 1, '2024-10-04 01:45:16'),
(43, 10038, 10.00, 1, 1, 1, '2024-10-04 01:45:24'),
(44, 10038, 5.00, 1, 1, 1, '2024-10-04 01:45:29'),
(45, 10039, 1335.00, 1, 3, 1, '2024-10-04 01:45:54'),
(46, 10039, 5.00, 1, 1, 1, '2024-10-04 01:46:00'),
(47, 10040, 24.00, 1, 1, 1, '2024-10-04 01:46:26'),
(48, 10040, 55.00, 1, 1, 1, '2024-10-04 01:46:41'),
(49, 10041, 5.00, 1, 1, 1, '2024-10-04 01:47:00'),
(50, 10041, 35.00, 1, 1, 1, '2024-10-04 01:47:09'),
(51, 10042, 1810.00, 1, 1, 1, '2024-10-04 01:47:28'),
(52, 10043, 515.00, 1, 1, 1, '2024-10-04 01:48:04'),
(53, 10044, 20.00, 1, 1, 1, '2024-10-04 01:48:41'),
(54, 10045, 10.00, 1, 1, 1, '2024-10-24 01:45:19'),
(55, 10046, 500.00, 1, 1, 1, '2024-11-01 00:34:07'),
(56, 10047, 11000.00, 1, 1, 1, '2024-11-05 02:24:15'),
(57, 10048, 35.00, 1, 4, 1, '2025-04-02 19:02:04'),
(58, 10049, 35.00, 1, 1, 1, '2025-04-02 19:02:24'),
(59, 10050, 35.00, 1, 1, 1, '2025-04-02 19:02:39'),
(60, 10051, 157.00, 10, 3, 1, '2025-04-03 20:06:25'),
(61, 10052, 167.00, 10, 3, 1, '2025-04-03 20:06:47'),
(62, 10053, 167.00, 10, 3, 1, '2025-04-03 20:07:09'),
(63, 10054, 167.00, 10, 3, 1, '2025-04-03 20:07:38'),
(64, 10055, 167.00, 10, 1, 1, '2025-04-03 20:07:50'),
(65, 10056, 167.00, 10, 3, 1, '2025-04-03 20:08:05'),
(66, 10057, 167.00, 10, 1, 1, '2025-04-03 20:08:19'),
(67, 10058, 167.00, 10, 3, 1, '2025-04-03 20:08:34'),
(68, 10059, 60.00, 10, 9, 1, '2025-04-03 20:09:06'),
(69, 10060, 440.00, 10, 1, 1, '2025-04-03 20:09:24'),
(70, 10061, 560.00, 10, 1, 1, '2025-04-03 20:10:14'),
(71, 10062, 3240.00, 10, 3, 1, '2025-04-03 20:35:29'),
(72, 10063, 1550.00, 10, 3, 1, '2025-04-03 20:35:48'),
(73, 10064, 5500.00, 2, 1, 1, '2025-05-11 17:37:25');

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

--
-- Volcado de datos para la tabla `detalle_compra`
--

INSERT INTO `detalle_compra` (`id`, `id_producto`, `id_compra`, `producto`, `cantidad`, `precio_compra`, `subtotal`) VALUES
(2, 78, 55, 'color negro con arillo', 10, 10.00, 100.00),
(3, 83, 56, 'rojo', 100, 40.00, 4000.00),
(4, 82, 56, 'PINTURA COLOR AZUL ', 100, 20.00, 2000.00),
(5, 81, 56, 'LIJA CON ASPERO  COLOR CAFE', 100, 40.00, 4000.00),
(6, 78, 56, 'color negro con arillo', 100, 10.00, 1000.00),
(10, 95, 60, 'audifonos de seguridad color azul', 1, 50.00, 50.00),
(11, 93, 60, 'caretilla  colorblanco negro y gris', 1, 20.00, 20.00),
(12, 91, 60, 'cinta de enmascar color blanco', 1, 12.00, 12.00),
(13, 90, 60, 'cinta color rojo', 1, 10.00, 10.00),
(14, 87, 60, 'cinta acolor nenegro', 1, 50.00, 50.00),
(15, 86, 60, 'huantyes de seguridad color gris', 1, 15.00, 15.00),
(16, 93, 61, 'caretilla  colorblanco negro y gris', 1, 20.00, 20.00),
(17, 91, 61, 'cinta de enmascar color blanco', 1, 12.00, 12.00),
(18, 90, 61, 'cinta color rojo', 1, 10.00, 10.00),
(19, 86, 61, 'huantyes de seguridad color gris', 1, 15.00, 15.00),
(20, 85, 61, 'gafas de seguridad', 1, 10.00, 10.00),
(21, 87, 61, 'cinta acolor nenegro', 1, 50.00, 50.00),
(22, 95, 61, 'audifonos de seguridad color azul', 1, 50.00, 50.00),
(23, 95, 62, 'audifonos de seguridad color azul', 1, 50.00, 50.00),
(24, 93, 62, 'caretilla  colorblanco negro y gris', 1, 20.00, 20.00),
(25, 91, 62, 'cinta de enmascar color blanco', 1, 12.00, 12.00),
(26, 90, 62, 'cinta color rojo', 1, 10.00, 10.00),
(27, 86, 62, 'huantyes de seguridad color gris', 1, 15.00, 15.00),
(28, 85, 62, 'gafas de seguridad', 1, 10.00, 10.00),
(29, 87, 62, 'cinta acolor nenegro', 1, 50.00, 50.00),
(30, 95, 63, 'audifonos de seguridad color azul', 1, 50.00, 50.00),
(31, 91, 63, 'cinta de enmascar color blanco', 1, 12.00, 12.00),
(32, 93, 63, 'caretilla  colorblanco negro y gris', 1, 20.00, 20.00),
(33, 87, 63, 'cinta acolor nenegro', 1, 50.00, 50.00),
(34, 86, 63, 'huantyes de seguridad color gris', 1, 15.00, 15.00),
(35, 90, 63, 'cinta color rojo', 1, 10.00, 10.00),
(36, 85, 63, 'gafas de seguridad', 1, 10.00, 10.00),
(37, 95, 64, 'audifonos de seguridad color azul', 1, 50.00, 50.00),
(38, 93, 64, 'caretilla  colorblanco negro y gris', 1, 20.00, 20.00),
(39, 91, 64, 'cinta de enmascar color blanco', 1, 12.00, 12.00),
(40, 90, 64, 'cinta color rojo', 1, 10.00, 10.00),
(41, 87, 64, 'cinta acolor nenegro', 1, 50.00, 50.00),
(42, 86, 64, 'huantyes de seguridad color gris', 1, 15.00, 15.00),
(43, 85, 64, 'gafas de seguridad', 1, 10.00, 10.00),
(44, 95, 65, 'audifonos de seguridad color azul', 1, 50.00, 50.00),
(45, 93, 65, 'caretilla  colorblanco negro y gris', 1, 20.00, 20.00),
(46, 91, 65, 'cinta de enmascar color blanco', 1, 12.00, 12.00),
(47, 90, 65, 'cinta color rojo', 1, 10.00, 10.00),
(48, 87, 65, 'cinta acolor nenegro', 1, 50.00, 50.00),
(49, 86, 65, 'huantyes de seguridad color gris', 1, 15.00, 15.00),
(50, 85, 65, 'gafas de seguridad', 1, 10.00, 10.00),
(51, 95, 66, 'audifonos de seguridad color azul', 1, 50.00, 50.00),
(52, 93, 66, 'caretilla  colorblanco negro y gris', 1, 20.00, 20.00),
(53, 91, 66, 'cinta de enmascar color blanco', 1, 12.00, 12.00),
(54, 90, 66, 'cinta color rojo', 1, 10.00, 10.00),
(55, 87, 66, 'cinta acolor nenegro', 1, 50.00, 50.00),
(56, 86, 66, 'huantyes de seguridad color gris', 1, 15.00, 15.00),
(57, 85, 66, 'gafas de seguridad', 1, 10.00, 10.00),
(58, 95, 67, 'audifonos de seguridad color azul', 1, 50.00, 50.00),
(59, 93, 67, 'caretilla  colorblanco negro y gris', 1, 20.00, 20.00),
(60, 91, 67, 'cinta de enmascar color blanco', 1, 12.00, 12.00),
(61, 90, 67, 'cinta color rojo', 1, 10.00, 10.00),
(62, 87, 67, 'cinta acolor nenegro', 1, 50.00, 50.00),
(63, 86, 67, 'huantyes de seguridad color gris', 1, 15.00, 15.00),
(64, 85, 67, 'gafas de seguridad', 1, 10.00, 10.00),
(65, 83, 68, 'COLOR AMARILLO', 1, 40.00, 40.00),
(66, 82, 68, 'PINTURA COLOR AZUL ', 1, 20.00, 20.00),
(67, 83, 69, 'COLOR AMARILLO', 6, 40.00, 240.00),
(68, 82, 69, 'PINTURA COLOR AZUL ', 10, 20.00, 200.00),
(69, 85, 70, 'gafas de seguridad', 11, 10.00, 110.00),
(70, 86, 70, 'huantyes de seguridad color gris', 10, 15.00, 150.00),
(71, 87, 70, 'cinta acolor nenegro', 6, 50.00, 300.00),
(72, 95, 71, 'audifonos de seguridad color azul', 50, 50.00, 2500.00),
(73, 93, 71, 'caretilla  colorblanco negro y gris', 10, 20.00, 200.00),
(74, 91, 71, 'cinta de enmascar color blanco', 20, 12.00, 240.00),
(75, 90, 71, 'cinta color rojo', 30, 10.00, 300.00),
(76, 87, 72, 'cinta acolor nenegro', 31, 50.00, 1550.00),
(77, 98, 73, 'Recuplast Grietas', 100, 25.00, 2500.00),
(78, 97, 73, 'Recuplast Fibrado', 100, 30.00, 3000.00);

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

--
-- Volcado de datos para la tabla `detalle_venta`
--

INSERT INTO `detalle_venta` (`id`, `id_producto`, `id_venta`, `producto`, `cantidad`, `precio_venta`, `precio_compra`, `subtotal`) VALUES
(13, 83, 64, 'COLOR AMARILLO', 1, 50.00, 40.00, 50.00),
(14, 82, 64, 'PINTURA COLOR AZUL ', 1, 30.00, 20.00, 30.00),
(15, 81, 64, 'LIJA CON ASPERO  COLOR CAFE', 1, 50.00, 40.00, 50.00),
(16, 78, 64, 'color negro con arillo', 1, 12.00, 10.00, 12.00),
(17, 95, 65, 'audifonos de seguridad color azul', 1, 55.00, 50.00, 55.00),
(18, 93, 65, 'caretilla  colorblanco negro y gris', 1, 25.00, 20.00, 25.00),
(19, 91, 65, 'cinta de enmascar color blanco', 1, 14.00, 12.00, 14.00),
(20, 90, 65, 'cinta color rojo', 1, 12.00, 10.00, 12.00),
(21, 87, 65, 'cinta acolor nenegro', 1, 12.00, 50.00, 12.00),
(22, 95, 66, 'audifonos de seguridad color azul', 1, 55.00, 50.00, 55.00),
(23, 93, 66, 'caretilla  colorblanco negro y gris', 1, 25.00, 20.00, 25.00),
(24, 95, 67, 'audifonos de seguridad color azul', 1, 55.00, 50.00, 55.00),
(25, 93, 67, 'caretilla  colorblanco negro y gris', 1, 25.00, 20.00, 25.00),
(26, 95, 68, 'audifonos de seguridad color azul', 1, 55.00, 50.00, 55.00),
(27, 93, 68, 'caretilla  colorblanco negro y gris', 1, 25.00, 20.00, 25.00),
(28, 91, 68, 'cinta de enmascar color blanco', 1, 14.00, 12.00, 14.00),
(29, 91, 69, 'cinta de enmascar color blanco', 1, 14.00, 12.00, 14.00),
(30, 98, 70, 'Recuplast Grietas', 1, 28.00, 25.00, 28.00),
(31, 97, 70, 'Recuplast Fibrado', 1, 30.00, 30.00, 30.00),
(32, 95, 70, 'audifonos de seguridad color azul', 1, 55.00, 50.00, 55.00),
(33, 93, 70, 'caretilla  colorblanco negro y gris', 1, 25.00, 20.00, 25.00),
(34, 91, 70, 'cinta de enmascar color blanco', 1, 14.00, 12.00, 14.00),
(35, 90, 70, 'cinta color rojo', 1, 12.00, 10.00, 12.00),
(36, 87, 70, 'cinta acolor nenegro', 1, 12.00, 50.00, 12.00),
(37, 86, 70, 'huantyes de seguridad color gris', 1, 18.00, 15.00, 18.00),
(38, 85, 70, 'gafas de seguridad', 1, 12.00, 10.00, 12.00),
(39, 83, 70, 'COLOR AMARILLO', 1, 50.00, 40.00, 50.00);

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
(41, 'cerradura');

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
(10, 'SINTEPLAST', '2024-11-04 14:00:38');

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
(1, 'POR DEFECTO', 'sin empresa', '6351232', 'sin direccion', '2024-10-01 15:48:36'),
(2, 'MONTERREY', 'JOSE AGUILAR', '97815267', 'AV MAPAISO SUR', '2024-09-18 17:25:39'),
(3, '3M', 'ALEJANDRA GARCIA', '78526987', 'AV MAPAISO NORTE', '2024-10-01 15:37:05'),
(4, 'TRAMONTINA', 'MARCIA AGUIRRE ', '74187698', 'CALLE RAMOS ', '2024-10-04 00:09:05'),
(5, 'PLAMAT', 'CAROL TORREZ ', '62147856', 'AV GRIGOTA', '2024-10-01 15:42:31'),
(6, 'NORTON', 'ALEJANDRO ', '63258741', 'AV MARISCAL ', '2024-10-01 15:45:21'),
(7, 'IRWIN', 'MARCELO PEDRAZA', '78523697', 'AV TOTAI', '2024-10-01 15:47:15'),
(8, 'RIBEPAR', 'ANGELA  AGUILAR', '78574125', 'CALLE PUMASI', '2024-10-01 15:49:35'),
(9, 'SINTEPLAST', 'BRAYAN  ALGAARAÑAZ', '78069985', 'AV SUCRE', '2024-10-01 15:55:59'),
(10, 'MONOPOL', 'JHON JUSTINIANO', '78522697', 'CALLE LA PAZ', '2024-10-04 00:09:54');

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
(2, 'Mario Terrazas', 'mario', '$2a$07$asxx54ahjppf45sd87a5auQ/NJtQNnAMPFo71ZO28SPo1sLrZVwrq', 'Administrador', 'vistas/img/usuarios/mario/949.jpg', 1, '2025-05-11 19:58:24', '2025-05-11 23:58:24'),
(6, 'Carla Alejandra ', 'carla', '$2a$07$asxx54ahjppf45sd87a5auzrnXKQ/xqxfrDlQ2vTa4aimiFqQJwKW', 'Vendedor', 'vistas/img/usuarios/carla/606.png', 1, '2025-04-03 15:55:22', '2025-04-03 19:55:22'),
(8, 'Jhanel Solles', 'jhanel', '$2a$07$asxx54ahjppf45sd87a5au5jSg5fYHiKgM7Vu2SkqkgsuFVQGlwo2', 'Vendedor', 'vistas/img/usuarios/jhanel/228.jpg', 1, '0000-00-00 00:00:00', '2025-04-03 19:57:21'),
(9, 'Carlos Vega', 'carlos', '$2a$07$asxx54ahjppf45sd87a5auelrdZeBYZ4t33w118t1DE5bSBf9deF2', 'Vendedor', 'vistas/img/usuarios/carlos/588.png', 1, '0000-00-00 00:00:00', '2025-04-03 19:57:17'),
(10, 'Pitter Quenallata', 'pitter', '$2a$07$asxx54ahjppf45sd87a5auQSHlY1sIx0Mrbneligl.F.Qpzq4gzhu', 'Administrador', 'vistas/img/usuarios/pitter/363.png', 1, '2025-04-03 15:57:55', '2025-04-03 19:57:55'),
(11, 'William', 'william', '$2a$07$asxx54ahjppf45sd87a5auYUB42pXoYm/RgQCT3rG7TGkuGWIpY/S', 'Vendedor', 'vistas/img/usuarios/william/113.png', 1, '0000-00-00 00:00:00', '2025-04-03 19:57:08'),
(12, 'Alex Aramcibia', 'alex', '$2a$07$asxx54ahjppf45sd87a5auNvGRBP67HwteI1werOGGwt8t1BsO7QW', 'Vendedor', 'vistas/img/usuarios/alex/795.jpg', 1, '0000-00-00 00:00:00', '2025-04-03 19:57:05'),
(13, 'Alejandro Montenegro', 'alejandro', '$2a$07$asxx54ahjppf45sd87a5aum62QgZKPkDGnsaxZ.g5DBQk7EWKqlLe', 'Vendedor', 'vistas/img/usuarios/alejandro/806.png', 1, '0000-00-00 00:00:00', '2025-04-03 19:57:14'),
(14, 'Naomi Quinteros', 'naomi', '$2a$07$asxx54ahjppf45sd87a5au207q.qectj6U94obluGehvzy9GuzBfe', 'Vendedor', 'vistas/img/usuarios/naomi/387.jpg', 1, '0000-00-00 00:00:00', '2025-05-11 15:27:17'),
(15, 'Jordan Sion', 'jordan', '$2a$07$asxx54ahjppf45sd87a5aup8s0NlRS68DlYiwbY6EueX2sCdjyYVG', 'Vendedor', 'vistas/img/usuarios/jordan/639.jpg', 1, '0000-00-00 00:00:00', '2025-05-11 15:35:58'),
(16, 'Bianca Flores', 'bianca', '$2a$07$asxx54ahjppf45sd87a5auksF20.9dKNhZ9uHixDIE41dtGtGbjpa', 'Vendedor', 'vistas/img/usuarios/bianca/687.jpg', 1, '0000-00-00 00:00:00', '2025-05-11 15:35:57'),
(17, 'Damaris Montalvo', 'damaris', '$2a$07$asxx54ahjppf45sd87a5auri2DocPiIOyg0JDDggI2oj.nlPCj2WO', 'Vendedor', 'vistas/img/usuarios/damaris/410.jpg', 1, '0000-00-00 00:00:00', '2025-05-11 15:37:31'),
(18, 'Danna Cardena', 'dana', '$2a$07$asxx54ahjppf45sd87a5auBbe5zZl6oaGiTTQ.mretNIYwafPw3BW', 'Vendedor', 'vistas/img/usuarios/dana/454.jpg', 1, '0000-00-00 00:00:00', '2025-05-11 15:37:30'),
(19, 'Naomi Gutierrez', 'naomi2', '$2a$07$asxx54ahjppf45sd87a5au207q.qectj6U94obluGehvzy9GuzBfe', 'Vendedor', 'vistas/img/usuarios/naomi2/861.jpg', 1, '0000-00-00 00:00:00', '2025-05-11 15:38:56'),
(20, 'Ariana Caba Cuba', 'ariana', '$2a$07$asxx54ahjppf45sd87a5auL/aPUUC7FZNSVsGv2E0eVJ2GC2K/cNe', 'Administrador', 'vistas/img/usuarios/ariana/600.jpg', 1, '0000-00-00 00:00:00', '2025-05-11 15:42:07'),
(21, 'Jose Emanuel Irriarte Becerra', 'jose', '$2a$07$asxx54ahjppf45sd87a5auOsTcxV66Wf1lWFlt.R6o37VOXIB1YhO', 'Administrador', 'vistas/img/usuarios/jose/475.jpg', 1, '0000-00-00 00:00:00', '2025-05-11 15:50:41'),
(22, 'Jheny Angela Chambi Mamani', 'angela', '$2a$07$asxx54ahjppf45sd87a5aupEWanzXNWwA0/4j9qb2ws25ruWlUff.', 'Administrador', 'vistas/img/usuarios/angela/366.jpg', 1, '0000-00-00 00:00:00', '2025-05-11 15:50:40'),
(23, 'Luis Enrique Vaca Pinto', 'luis', '$2a$07$asxx54ahjppf45sd87a5auwx8lyuZ.kds4dac831wJ6GwzvInb.wG', 'Vendedor', 'vistas/img/usuarios/luis/664.jpg', 1, '0000-00-00 00:00:00', '2025-05-11 15:55:01'),
(25, 'Eunice Rios Zarete', 'eunice', '$2a$07$asxx54ahjppf45sd87a5auH.hD78n/JL2XJd6wDtyO4QR3LXXTlme', 'Vendedor', 'vistas/img/usuarios/eunice/528.jpg', 1, '0000-00-00 00:00:00', '2025-05-11 15:56:48');

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
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id`, `codigo`, `id_cliente`, `id_vendedor`, `total`, `fecha`) VALUES
(64, 10005, 11, 1, 142, '2025-04-02 19:10:10'),
(65, 10006, 11, 10, 118, '2025-04-03 20:37:06'),
(66, 10007, 1, 2, 80, '2025-04-25 19:05:21'),
(67, 10008, 1, 2, 80, '2025-05-11 16:56:15'),
(68, 10009, 1, 2, 94, '2025-05-11 16:56:57'),
(69, 10010, 1, 2, 14, '2025-05-11 17:35:58'),
(70, 10011, 1, 2, 256, '2025-05-11 17:40:20');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT de la tabla `detalle_compra`
--
ALTER TABLE `detalle_compra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT de la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de la tabla `madelas`
--
ALTER TABLE `madelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de la tabla `marcas`
--
ALTER TABLE `marcas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

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
