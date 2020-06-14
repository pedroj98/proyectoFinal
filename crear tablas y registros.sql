-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 13-06-2020 a las 22:52:29
-- Versión del servidor: 5.7.29-0ubuntu0.18.04.1
-- Versión de PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `homestead`
--
CREATE DATABASE IF NOT EXISTS `homestead` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_bin;
USE `homestead`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE IF NOT EXISTS `categorias` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`) VALUES
(1, 'desayunos'),
(2, 'entrantes'),
(3, 'platos_principales'),
(4, 'sopas'),
(5, 'postres');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `criticas`
--

CREATE TABLE IF NOT EXISTS `criticas` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_usuario` bigint(20) UNSIGNED NOT NULL,
  `id_restaurante` bigint(20) UNSIGNED NOT NULL,
  `titulo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `puntuacion` tinyint(4) NOT NULL,
  `estado` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `criticas_id_usuario_foreign` (`id_usuario`),
  KEY `criticas_id_restaurante_foreign` (`id_restaurante`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturas_clientes`
--

CREATE TABLE IF NOT EXISTS `facturas_clientes` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_cliente` bigint(20) UNSIGNED NOT NULL,
  `fecha` datetime NOT NULL,
  `id_empleado` bigint(20) UNSIGNED DEFAULT NULL,
  `id_restaurante` bigint(20) UNSIGNED NOT NULL,
  `total` double NOT NULL,
  PRIMARY KEY (`id`),
  KEY `facturas_clientes_id_cliente_foreign` (`id_cliente`),
  KEY `facturas_clientes_id_empleado_foreign` (`id_empleado`),
  KEY `facturas_clientes_id_restaurante_foreign` (`id_restaurante`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `facturas_clientes`
--

INSERT INTO `facturas_clientes` (`id`, `id_cliente`, `fecha`, `id_empleado`, `id_restaurante`, `total`) VALUES
(1, 27, '2019-11-01 10:36:52', 43, 3, 371.18),
(2, 35, '2019-10-20 00:19:30', 43, 6, 57.82),
(3, 8, '2019-11-18 16:14:31', 24, 7, 143.94),
(4, 36, '2020-01-08 05:11:36', 9, 5, 25.64),
(5, 27, '2020-01-31 03:29:02', 22, 9, 471.52),
(6, 29, '2019-10-15 12:22:53', 16, 9, 400.4),
(7, 47, '2019-09-22 03:02:37', 22, 4, 86.98),
(8, 29, '2019-08-18 09:22:01', 20, 3, 46.69),
(9, 26, '2019-09-15 15:11:10', 24, 5, 319.99),
(10, 13, '2020-05-22 11:20:53', 8, 6, 223.93),
(11, 47, '2020-01-31 22:32:39', 7, 9, 259.2),
(12, 28, '2019-07-10 07:48:26', 17, 7, 391.48),
(13, 24, '2020-05-07 15:03:16', 6, 4, 352.99),
(14, 43, '2019-07-13 22:42:46', 5, 10, 131.2),
(15, 17, '2019-08-08 10:03:53', 34, 8, 392.14),
(16, 35, '2020-05-03 13:01:19', 48, 3, 494.23),
(17, 3, '2020-02-02 14:38:15', 24, 3, 159.59),
(18, 13, '2019-10-28 11:36:35', 23, 10, 453.89),
(19, 17, '2019-07-15 05:51:56', 24, 4, 491.28),
(20, 19, '2020-03-11 21:07:06', 36, 10, 166.86),
(21, 113, '2020-06-13 21:39:00', NULL, 3, 168.63),
(22, 2, '2020-06-13 22:32:00', 4, 8, 299.23),
(23, 2, '2020-06-13 22:32:00', 4, 8, 235.56),
(24, 2, '2020-06-13 22:33:00', 4, 8, 905.54);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturas_proveedores`
--

CREATE TABLE IF NOT EXISTS `facturas_proveedores` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_proveedor` bigint(20) UNSIGNED NOT NULL,
  `fecha` datetime NOT NULL,
  `id_empleado` bigint(20) UNSIGNED NOT NULL,
  `total` double NOT NULL,
  PRIMARY KEY (`id`),
  KEY `facturas_proveedores_id_proveedor_foreign` (`id_proveedor`),
  KEY `facturas_proveedores_id_empleado_foreign` (`id_empleado`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `facturas_proveedores`
--

INSERT INTO `facturas_proveedores` (`id`, `id_proveedor`, `fecha`, `id_empleado`, `total`) VALUES
(1, 1, '2019-07-05 22:54:16', 24, 12.35),
(2, 4, '2019-11-04 13:08:04', 50, 14.61),
(3, 4, '2019-07-11 21:25:11', 14, 51.74),
(4, 10, '2020-04-13 23:05:55', 8, 324.29),
(5, 10, '2019-11-08 14:26:19', 6, 303.35),
(6, 10, '2019-11-30 19:24:00', 37, 196.99),
(7, 9, '2019-10-14 19:40:07', 36, 173.13),
(8, 4, '2020-03-31 09:09:51', 26, 183.24),
(9, 2, '2020-02-10 08:42:08', 4, 368.93),
(10, 2, '2020-04-30 08:47:31', 48, 338.78),
(11, 10, '2019-10-18 08:59:58', 14, 414.84),
(12, 6, '2020-05-31 18:00:43', 33, 307.76),
(13, 10, '2019-10-03 00:52:54', 41, 16.25),
(14, 4, '2019-10-21 17:22:02', 4, 222.99),
(15, 10, '2019-12-24 09:36:44', 10, 169.89),
(16, 8, '2019-09-26 17:46:25', 6, 97.65),
(17, 9, '2019-08-17 01:27:45', 19, 413.14),
(18, 7, '2019-10-11 06:21:03', 8, 479.17),
(19, 9, '2020-02-26 10:57:41', 13, 456.45),
(20, 6, '2019-12-14 20:13:24', 47, 192.06);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingredientes`
--

CREATE TABLE IF NOT EXISTS `ingredientes` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `codigo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=78 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `ingredientes`
--

INSERT INTO `ingredientes` (`id`, `codigo`, `nombre`) VALUES
(1, '1899771883', 'Queso'),
(2, '6459425701', 'Huevo'),
(3, '9614969385', 'Crema Agría'),
(4, '0419272267', 'Leche'),
(5, '1855121751', 'Mozzarella'),
(6, '081098931X', 'Yogurt'),
(7, '4548963871', 'Mantequilla'),
(8, '0743697154', 'Natilla'),
(9, '3501255535', 'Leche condensada'),
(10, '0660150964', 'Crema'),
(11, '8917006140', 'Pepino'),
(12, '9741110677', 'Ají'),
(13, '4434557610', 'Menta'),
(14, '3111493601', 'Ajo'),
(15, '2195473738', 'Pepinillo'),
(16, '6060634567', 'Calabaza'),
(17, '5685841329', 'Apio'),
(18, '8201115724', 'Berenjena'),
(19, '6737340466', 'Perejil'),
(20, '5684630421', 'Papa'),
(21, '2496325800', 'Palta'),
(22, '0808611216', 'Zanahoria'),
(23, '8175027525', 'Jengibre'),
(24, '5652049863', 'Cebolla'),
(25, '4172858325', 'Champiñones'),
(26, '6680579651', 'Romero'),
(27, '8020090894', 'Tomate'),
(28, '4294823224', 'Pimiento'),
(29, '3415155668', 'Camote'),
(30, '0392579073', 'Maiz'),
(31, '9090738568', 'Brócoli'),
(32, '564556068X', 'Espinaca'),
(33, '3883755095', 'Pera'),
(34, '3612995677', 'Mora'),
(35, '2153939143', 'Coco'),
(36, '9561318466', 'Frambuesa'),
(37, '9269766837', 'Naranja'),
(38, '2589548877', 'Plátano'),
(39, '3358569500', 'Guayaba'),
(40, '6923875358', 'Pasa'),
(41, '7949356669', 'Durazno'),
(42, '351285575X', 'Arándano'),
(43, '8831257897', 'Papaya'),
(44, '0247569194', 'Chirimoya'),
(45, '7877611218', 'Kiwi'),
(46, '1765353785', 'Uva'),
(47, '4613716101', 'Sandía'),
(48, '9746160028', 'Cereza'),
(49, '4982205507', 'Piña'),
(50, '6278670429', 'Mandarina'),
(51, '7703041939', 'Limón'),
(52, '2721451448', 'Lima'),
(53, '8038949633', 'Mango'),
(54, '7673091674', 'Fresa'),
(55, '3811983210', 'Manzana'),
(56, '7801372662', 'Pollo'),
(57, '4809710645', 'Pechuga de pollo'),
(58, '0341945811', 'Pavo'),
(59, '1589335864', 'Tocino'),
(60, '3459374489', 'Jamón'),
(61, '4117719831', 'Cordero'),
(62, '4818013013', 'Chancho'),
(63, '4629720588', 'Cuy'),
(64, '5742793502', 'Res'),
(65, '597723242X', 'Alitas'),
(66, '1948112779', 'Salchicha'),
(67, '0964707349', 'Hot dog'),
(68, '303218181X', 'Mayonesa'),
(69, '0617581738', 'Salsa Golf'),
(70, '4358813569', 'Ketchup'),
(71, '3145814591', 'Tarí'),
(72, '8835617898', 'Salsa Blanca'),
(73, '4066801250', 'Mostaza'),
(74, '2017583693', 'Salsa de ajo'),
(75, '6853686322', 'Salsa BBQ'),
(76, '9141912713', 'Salsa chimichurri'),
(77, '1276757182', 'Ají');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingredientes_facturas`
--

CREATE TABLE IF NOT EXISTS `ingredientes_facturas` (
  `id_ingrediente` bigint(20) UNSIGNED NOT NULL,
  `id_factura` bigint(20) UNSIGNED NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` int(11) NOT NULL,
  KEY `ingredientes_facturas_id_ingrediente_foreign` (`id_ingrediente`),
  KEY `ingredientes_facturas_id_factura_foreign` (`id_factura`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `ingredientes_facturas`
--

INSERT INTO `ingredientes_facturas` (`id_ingrediente`, `id_factura`, `cantidad`, `precio`) VALUES
(23, 14, 4, 96),
(7, 7, 8, 78),
(2, 3, 10, 77),
(11, 10, 8, 34),
(1, 18, 4, 57),
(20, 11, 7, 26),
(7, 3, 10, 29),
(24, 11, 7, 40),
(26, 2, 9, 41),
(14, 13, 3, 55),
(22, 11, 7, 89),
(7, 9, 10, 91),
(18, 14, 9, 26),
(3, 17, 3, 75),
(24, 19, 2, 35),
(23, 9, 4, 59),
(15, 17, 9, 77),
(16, 1, 1, 41),
(17, 3, 3, 100),
(4, 9, 5, 82),
(6, 19, 2, 27),
(4, 12, 9, 9),
(1, 11, 7, 94),
(11, 14, 6, 13),
(20, 3, 3, 70),
(26, 20, 6, 79),
(10, 15, 7, 68),
(25, 1, 1, 100),
(1, 1, 4, 5),
(3, 16, 10, 54),
(26, 10, 4, 68),
(18, 14, 5, 7),
(22, 5, 10, 30),
(15, 9, 1, 75),
(4, 18, 6, 58),
(15, 11, 7, 80),
(21, 13, 2, 76),
(4, 10, 2, 80),
(5, 4, 10, 51),
(2, 20, 1, 9),
(14, 7, 4, 51),
(19, 2, 6, 89),
(22, 3, 2, 3),
(2, 16, 4, 87),
(8, 14, 5, 83),
(23, 18, 10, 20),
(15, 18, 2, 44),
(8, 7, 5, 53),
(27, 19, 5, 67),
(19, 13, 4, 2),
(15, 1, 8, 19),
(17, 18, 1, 47),
(7, 17, 4, 90),
(10, 1, 6, 78),
(23, 13, 2, 11),
(24, 7, 1, 50),
(17, 11, 4, 6),
(23, 17, 3, 50),
(7, 20, 3, 94),
(18, 20, 9, 50),
(11, 11, 6, 17),
(25, 14, 4, 56),
(25, 12, 3, 93),
(21, 15, 9, 99),
(17, 9, 4, 85),
(15, 12, 2, 20),
(21, 18, 5, 53),
(19, 4, 3, 75),
(18, 8, 10, 18),
(19, 20, 9, 64),
(26, 9, 6, 11),
(10, 10, 1, 58),
(4, 8, 6, 55),
(10, 2, 5, 1),
(25, 8, 1, 16),
(16, 17, 8, 91),
(24, 8, 4, 14),
(23, 8, 5, 72),
(22, 5, 10, 68),
(4, 9, 6, 43),
(21, 13, 7, 12),
(20, 12, 4, 92),
(23, 17, 4, 39),
(25, 20, 9, 83),
(17, 11, 2, 98),
(23, 3, 7, 93),
(13, 4, 10, 54),
(24, 9, 3, 40),
(2, 1, 9, 62),
(13, 9, 8, 11),
(13, 13, 3, 11),
(10, 19, 8, 63),
(13, 16, 5, 31),
(22, 4, 4, 65),
(5, 17, 4, 61),
(27, 17, 7, 97),
(23, 4, 10, 76),
(1, 11, 1, 44),
(17, 10, 5, 13),
(23, 4, 7, 68);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingredientes_platos`
--

CREATE TABLE IF NOT EXISTS `ingredientes_platos` (
  `id_plato` bigint(20) UNSIGNED NOT NULL,
  `id_ingrediente` bigint(20) UNSIGNED NOT NULL,
  KEY `ingredientes_platos_id_plato_foreign` (`id_plato`),
  KEY `ingredientes_platos_id_ingrediente_foreign` (`id_ingrediente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `ingredientes_platos`
--

INSERT INTO `ingredientes_platos` (`id_plato`, `id_ingrediente`) VALUES
(8, 26),
(10, 29),
(23, 47),
(6, 23),
(14, 73),
(26, 41),
(13, 65),
(16, 11),
(5, 27),
(18, 13),
(21, 64),
(1, 61),
(5, 40),
(4, 27),
(21, 75),
(1, 75),
(20, 44),
(24, 36),
(9, 11),
(2, 15),
(20, 14),
(27, 73),
(21, 48),
(16, 19),
(20, 10),
(15, 28),
(7, 32),
(26, 29),
(1, 13),
(4, 35),
(21, 38),
(10, 31),
(17, 52),
(15, 22),
(8, 64),
(8, 8),
(12, 21),
(7, 69),
(6, 18),
(3, 56),
(2, 60),
(24, 69),
(4, 11),
(20, 2),
(15, 55),
(6, 37),
(27, 45),
(4, 50),
(11, 41),
(10, 13),
(22, 29),
(6, 33),
(12, 72),
(5, 19),
(17, 44),
(5, 15),
(16, 11),
(2, 18),
(7, 52),
(23, 45),
(26, 34),
(13, 63),
(10, 12),
(6, 40),
(8, 49),
(13, 12),
(18, 77),
(2, 59),
(1, 67),
(5, 63),
(7, 24),
(8, 41),
(11, 49),
(11, 30),
(13, 52),
(4, 49),
(24, 73),
(20, 76),
(3, 20),
(16, 30),
(1, 70),
(26, 57),
(7, 27),
(12, 31),
(26, 64),
(20, 77),
(18, 10),
(18, 17),
(10, 56),
(14, 8),
(24, 24),
(18, 9),
(14, 30),
(9, 60),
(4, 60),
(8, 44),
(2, 76),
(3, 45),
(22, 48),
(1, 48);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingredientes_proveedores`
--

CREATE TABLE IF NOT EXISTS `ingredientes_proveedores` (
  `id_proveedor` bigint(20) UNSIGNED NOT NULL,
  `id_ingrediente` bigint(20) UNSIGNED NOT NULL,
  `precio` double NOT NULL,
  KEY `ingredientes_proveedores_id_proveedor_foreign` (`id_proveedor`),
  KEY `ingredientes_proveedores_id_ingrediente_foreign` (`id_ingrediente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `ingredientes_proveedores`
--

INSERT INTO `ingredientes_proveedores` (`id_proveedor`, `id_ingrediente`, `precio`) VALUES
(9, 42, 8.45),
(14, 11, 9.15),
(9, 30, 1.31),
(13, 47, 4.27),
(13, 67, 7.2),
(7, 40, 9.91),
(15, 28, 5.01),
(5, 69, 6.81),
(14, 53, 8.68),
(9, 39, 5.04),
(9, 53, 2.5),
(5, 32, 9.25),
(6, 50, 8.83),
(15, 26, 8.71),
(5, 19, 9.05),
(14, 70, 2.2),
(9, 60, 7.33),
(12, 30, 2.17),
(13, 72, 0.62),
(15, 50, 4.73),
(6, 54, 9.06),
(15, 28, 3.61),
(2, 3, 3.26),
(14, 32, 9.06),
(7, 65, 3.28),
(5, 15, 0.99),
(9, 14, 2.69),
(14, 49, 8.79),
(4, 36, 8.13),
(10, 15, 0.94),
(9, 11, 8.66),
(10, 65, 2.25),
(15, 48, 0.99),
(11, 24, 8.35),
(13, 51, 2.33),
(12, 4, 8.86),
(13, 35, 8.22),
(1, 40, 1.5),
(7, 4, 4.41),
(8, 66, 1.21),
(3, 50, 2.39),
(8, 37, 4.11),
(3, 10, 8.47),
(12, 2, 1.69),
(15, 43, 6.64),
(10, 26, 1.24),
(14, 52, 7.58),
(2, 68, 7.74),
(5, 15, 4.94),
(8, 15, 9.39),
(6, 46, 9.95),
(1, 15, 5.33),
(11, 8, 4.5),
(6, 49, 4.48),
(12, 50, 8.2),
(5, 6, 8.55),
(3, 10, 6.03),
(1, 29, 8.34),
(10, 31, 0.86),
(3, 52, 8.16),
(4, 62, 1.02),
(3, 1, 5.66),
(12, 57, 0.87),
(10, 72, 0.55),
(4, 39, 8.12),
(12, 25, 7.97),
(4, 77, 5.78),
(11, 15, 0.93),
(9, 39, 7.09),
(5, 2, 5.26),
(9, 35, 6.73),
(3, 38, 0.58),
(13, 60, 5.2),
(10, 24, 6.2),
(15, 75, 1.63),
(8, 4, 7.96),
(5, 2, 4.88),
(4, 10, 2.06),
(14, 76, 6.77),
(10, 21, 0.78),
(1, 63, 0.71),
(5, 9, 8.91),
(5, 49, 0.6),
(11, 29, 4.41),
(4, 65, 5.41),
(11, 64, 8.21),
(10, 19, 6.47),
(9, 14, 9.45),
(6, 74, 4.76),
(2, 31, 4.55),
(3, 65, 8.62),
(2, 72, 3.66),
(12, 45, 4.26),
(7, 66, 6.62),
(11, 16, 9.07),
(4, 21, 1.79),
(10, 42, 8.61),
(6, 43, 5.67),
(13, 71, 1.78),
(9, 68, 6.3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingredientes_restaurantes`
--

CREATE TABLE IF NOT EXISTS `ingredientes_restaurantes` (
  `id_restaurante` bigint(20) UNSIGNED NOT NULL,
  `id_ingrediente` bigint(20) UNSIGNED NOT NULL,
  `cantidad` double NOT NULL,
  KEY `ingredientes_restaurantes_id_restaurante_foreign` (`id_restaurante`),
  KEY `ingredientes_restaurantes_id_ingrediente_foreign` (`id_ingrediente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `ingredientes_restaurantes`
--

INSERT INTO `ingredientes_restaurantes` (`id_restaurante`, `id_ingrediente`, `cantidad`) VALUES
(10, 25, 179),
(4, 20, 173),
(2, 20, 152),
(1, 31, 145),
(8, 32, 105),
(5, 16, 11),
(8, 48, 185),
(7, 67, 6),
(2, 64, 197),
(2, 35, 169),
(8, 14, 60),
(6, 4, 192),
(1, 34, 177),
(4, 56, 38),
(4, 65, 152),
(9, 11, 149),
(8, 31, 139),
(7, 18, 49),
(8, 24, 152),
(2, 11, 101),
(2, 54, 75),
(4, 55, 77),
(7, 66, 28),
(8, 42, 195),
(10, 5, 40),
(1, 74, 189),
(1, 61, 100),
(2, 12, 85),
(8, 11, 48),
(1, 65, 56),
(3, 22, 76),
(5, 56, 21),
(1, 5, 78),
(6, 63, 92),
(10, 64, 98),
(1, 26, 85),
(8, 21, 29),
(3, 75, 12),
(6, 5, 19),
(6, 43, 159),
(4, 70, 140),
(9, 26, 181),
(1, 66, 46),
(10, 32, 160),
(3, 21, 66),
(5, 45, 139),
(2, 70, 137),
(6, 74, 173),
(3, 74, 165),
(1, 73, 58),
(2, 65, 153),
(2, 8, 168),
(6, 60, 125),
(4, 9, 58),
(4, 11, 62),
(9, 51, 26),
(5, 59, 186),
(2, 66, 97),
(1, 65, 82),
(3, 26, 8),
(3, 18, 107),
(6, 32, 106),
(2, 17, 191),
(6, 53, 187),
(8, 51, 195),
(7, 33, 190),
(4, 49, 159),
(1, 4, 154),
(10, 55, 98),
(2, 16, 31),
(4, 28, 84),
(4, 76, 37),
(8, 62, 79),
(3, 9, 190),
(3, 77, 132),
(2, 68, 3),
(3, 27, 153),
(9, 5, 84),
(2, 42, 9),
(9, 75, 19),
(10, 74, 105),
(6, 42, 140),
(1, 40, 118),
(5, 18, 115),
(5, 12, 66),
(5, 27, 64),
(1, 45, 99),
(6, 1, 118),
(6, 77, 136),
(8, 48, 187),
(5, 77, 171),
(6, 53, 71),
(4, 41, 104),
(2, 10, 79),
(7, 28, 167),
(9, 13, 12),
(4, 14, 149),
(7, 20, 184),
(9, 53, 79),
(4, 30, 44);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menus`
--

CREATE TABLE IF NOT EXISTS `menus` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `menus`
--

INSERT INTO `menus` (`id`, `nombre`) VALUES
(1, 'Menu Gourmet'),
(2, 'Menu Primaveral'),
(3, 'Menu Multicultural'),
(4, 'Menu Andaluz'),
(5, 'Menu Navideño'),
(6, 'Menu Standar');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu_platos`
--

CREATE TABLE IF NOT EXISTS `menu_platos` (
  `id_menu` bigint(20) UNSIGNED NOT NULL,
  `id_plato` bigint(20) UNSIGNED NOT NULL,
  `precio` double NOT NULL,
  KEY `menu_platos_id_menu_foreign` (`id_menu`),
  KEY `menu_platos_id_plato_foreign` (`id_plato`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `menu_platos`
--

INSERT INTO `menu_platos` (`id_menu`, `id_plato`, `precio`) VALUES
(1, 9, 79.51),
(1, 13, 16.44),
(1, 18, 72.14),
(1, 8, 44.2),
(1, 27, 20.06),
(1, 20, 76.06),
(1, 22, 63.76),
(1, 4, 18.2),
(1, 10, 37.54),
(1, 3, 51.39),
(1, 2, 58.62),
(1, 5, 64.91),
(1, 6, 12.44),
(1, 19, 65.31),
(1, 1, 23.54),
(1, 23, 52.47),
(1, 25, 64.98),
(1, 12, 30.36),
(1, 21, 31.24),
(1, 16, 70.91),
(1, 14, 28.38),
(1, 11, 70.39),
(1, 15, 24.3),
(1, 24, 75.3),
(1, 26, 52.52),
(1, 17, 79.08),
(1, 7, 75.41),
(4, 1, 0),
(4, 4, 0),
(4, 7, 0),
(4, 11, 0),
(4, 12, 0),
(4, 22, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mesas`
--

CREATE TABLE IF NOT EXISTS `mesas` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `num_sillas` tinyint(4) NOT NULL,
  `id_restaurante` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `mesas_id_restaurante_foreign` (`id_restaurante`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `mesas`
--

INSERT INTO `mesas` (`id`, `num_sillas`, `id_restaurante`) VALUES
(1, 3, 2),
(2, 9, 4),
(3, 7, 9),
(4, 8, 10),
(5, 9, 7),
(6, 12, 4),
(7, 9, 10),
(8, 2, 3),
(9, 8, 4),
(10, 11, 9),
(11, 7, 5),
(12, 3, 9),
(13, 8, 8),
(14, 3, 4),
(15, 11, 2),
(16, 8, 4),
(17, 12, 2),
(18, 11, 3),
(19, 10, 6),
(20, 8, 8),
(21, 11, 8),
(22, 5, 6),
(23, 4, 4),
(24, 5, 5),
(25, 4, 1),
(26, 11, 4),
(27, 11, 8),
(28, 9, 1),
(29, 10, 9),
(30, 7, 1),
(31, 2, 2),
(32, 5, 5),
(33, 5, 5),
(34, 6, 7),
(35, 7, 9),
(36, 3, 10),
(37, 6, 2),
(38, 9, 2),
(39, 11, 5),
(40, 7, 5),
(41, 11, 1),
(42, 5, 2),
(43, 6, 9),
(44, 10, 2),
(45, 12, 10),
(46, 6, 3),
(47, 6, 8),
(48, 8, 9),
(49, 7, 6),
(50, 9, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2020_05_19_092906_create_role_table', 1),
(2, '2020_05_19_094025_create_proveedor_table', 1),
(3, '2020_05_19_095322_create_categoria_table', 1),
(4, '2020_05_19_100615_create_ingredientes_table', 1),
(5, '2020_05_19_104251_create_menus_table', 1),
(6, '2020_05_19_104252_create_restaurantes_table', 1),
(7, '2020_05_19_104834_create_mesas_table', 1),
(8, '2020_05_19_105055_create_usuario_table', 1),
(9, '2020_05_19_105056_create_reservas_table', 1),
(10, '2020_05_19_105757_create_platos_table', 1),
(11, '2020_05_19_141829_create_ingredientes_platos_table', 1),
(12, '2020_05_19_143118_create_menu_platos_table', 1),
(13, '2020_06_03_115036_create_ingredientes_proveedores_table', 1),
(14, '2020_06_03_115337_create_ingredientes_restaurantes_table', 1),
(15, '2020_06_04_203503_create_facturas_clientes_table', 1),
(16, '2020_06_04_203816_create_facturas_proveedores_table', 1),
(17, '2020_06_05_134958_create_pedidos_table', 1),
(18, '2020_06_06_160858_create_criticas_table', 1),
(19, '2020_06_06_161141_create_quejas_table', 1),
(20, '2020_08_03_115524_create_ingredientes_facturas_table', 1),
(21, '2020_08_22_162511_create_platos_facturas_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE IF NOT EXISTS `pedidos` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_factura` bigint(20) UNSIGNED NOT NULL,
  `id_cliente` bigint(20) UNSIGNED NOT NULL,
  `id_restaurante` bigint(20) UNSIGNED NOT NULL,
  `fecha` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `pedidos_id_factura_foreign` (`id_factura`),
  KEY `pedidos_id_cliente_foreign` (`id_cliente`),
  KEY `pedidos_id_restaurante_foreign` (`id_restaurante`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`id`, `id_factura`, `id_cliente`, `id_restaurante`, `fecha`) VALUES
(1, 21, 113, 3, '2020-06-13 21:39:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `platos`
--

CREATE TABLE IF NOT EXISTS `platos` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci,
  `imagen` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_categoria` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `platos_id_categoria_foreign` (`id_categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `platos`
--

INSERT INTO `platos` (`id`, `nombre`, `descripcion`, `imagen`, `id_categoria`) VALUES
(1, 'Estofado de Res', 'Esta técnica hace que el medio vaporoso haga un reflujo de tal forma que se transmitan los sabores mediante la difusión del mismo. Tradicionalmente, el estofado se ha realizado con los ingredientes puestos inicialmente en crudo. El braseado se realiza cuando, en algunos casos, se somete a los ingredientes a una cocción previa', 'maxres.jpg', 1),
(2, 'Kanlu Wantan', 'Ullam consequatur dolorem ea dolorem ipsa id. Autem odit quia recusandae nihil autem dolorum deleniti. Vitae numquam impedit voluptate est dolor.', 'Kam-lu-wantán.jpg', 5),
(3, 'Bisteck a la olla', 'La olla de carne es un cocido tradicional de Costa Rica, que consta de un caldo con carne en trozos pequeños a medianos y abundantes verduras. Es una sopa tradicional costarricense usada mayormente para consumir en el almuerzo o comida de mediodía. Su historia comienza con un platillo judío llamado adafina. También se menciona en el famoso libro de Don Quijote de la Mancha un platillo similar llamado olla podrida, que no significaba podredumbre si no olla poderida o poderosa, por lo alimenticia que resultaba', 'bistec a la olla.jpg', 2),
(4, 'Salchipapa', 'Consiste en rodajas fritas de salchicha y papas fritas, acompañadas de diferentes salsas, como kétchup, mostaza, mayonesa, crema de aceituna y de chile/ají.6​ A veces se le agrega encima un huevo frito o una rebanada de queso edam derretido; también suele acompañarse con tomate y lechuga o ensalada de col, y ocasionalmente se adereza con orégano.', 'salchipapa.jpg', 1),
(5, 'Pollo a la brasa', 'El pollo asado, rostizado, en brasas o a la brasa es un plato genérico elaborado con un pollo expuesto directamente al fuego, que puede provenir de un hogar casero, hasta el asador profesional rotatorio. Por regla general el asado del pollo se va haciendo con la propia grasa y jugos del mismo que circulan por la carne durante la operación de asado, es por esta razón que se debe colocar expuesto al fuego de tal forma que pueda moverse o girar y que la circulación de estas grasas y jugos sea lo más eficiente posible, los asadores rotatorios emplean este concepto de forma muy eficaz. El pollo asado es un plato global que aparece en todas las culturas cocinado, o acompañado de diferentes formas.', 'En-que-restaurante-se-vendio-por-primera-vez-el-pollo-a-la-brasa.jpg', 4),
(6, 'Aguadito', 'Un oloroso y calientito Aguadito de Pollo con unas gotas de limón y un punto de ají, era el plato más esperado por los invitados en cualquier fiesta que pasó de la medianoche, al menos esa era la costumbre que recuerdo de no hace mucho tiempo atrás.\r\n\r\nEl Aguadito de Pollo es una sopa reconstituyente, con un aroma espectacular que inunda el ambiente, llamada familiarmente la “levanta muertos”, haciendo referencia a todos los invitados que de tanto bailar y levantar copas quedaron exhaustos en algún sofá esperando a ser “revividos”', 'aguadito.jpg', 2),
(7, 'Arroz a la cubana', 'El plato está compuesto de arroz blanco hervido, acompañado de salsa de tomate, huevo frito y plátano dulce o plátano macho frito', 'arroz.jpg', 1),
(8, 'Salpicon de Pollo', 'Normalmente el cóctel de gambas se presenta dentro de una copa de vidrio con una pequeña ensalada muy sencilla, a base de lechuga y salsa cóctel, una mezcla de mayonesa, kétchup y mostaza, con otros ingredientes menos importantes.1​\r\n\r\nEl cóctel de gambas es un plato ligero y refrescante que se sirve como entremés, sobre todo en verano', 'salpicon-de-pollo_700x465.jpg', 3),
(9, 'Arroz Chaufa', 'El arroz chaufa o también conocido como Arroz frito. Es un plato emblemático que proviene del vocablo chaufan. Esta deliciosa receta, proviene de los cocineros chinos que juntaban el arroz, que era producto de su trabajo; y que de esa sobra, realizaban una mezcolanza lo que más tarde se llamaría arroz chaufa. El fuego bravo de sus saltados, el arroz blanco de la diaria compañía con el punto de kion y cebolla china para dar ese saborcito único. Todo ello dieron vida a platos que hoy forman parte de nuestra cotidianidad y peruanidad. Este famoso y popular platillo no podía faltar dentro del recetario de Mi Comida Peruana, y por ello hoy te compartiré mi receta casera.', 'Arroz-chaufa.jpg', 5),
(10, 'Tallarines verdes', 'Los tallarines (del italiano taglierini) son un tipo de masa (pasta) alargada, de ancho pequeño y forma achatada que integran el conjunto de las paste asciutte (pastas secas) de origen italiano. Los que se conocen en toda Europa y en buena parte del mundo occidental provienen directamente de Italia y no deben ser confundidos con preparaciones parecidas', 'tallarines-verdes-receta-peruana.webp', 5),
(11, 'Papa a la Huancaina', 'Sed qui ea quidem. Molestiae vitae aliquam animi aut sed voluptatem. Illo sint facere consequatur veniam voluptates. Nisi vel asperiores quia velit.', 'img_papas_a_la_huancaina_peruanas_32116_600.jpg', 1),
(12, 'Sopa Blanca', 'La sopa es una preparación culinaria que consiste en un líquido con sustancia y sabor.1​ En algunos casos posee ingredientes sólidos de pequeño tamaño sumergidos en su volumen. Una de sus características principales es que se ingiere con cuchara.', '87970438-sopa-blanca-del-chile-del-pollo-con-los-granos-de-cannellini-y-el-primer-del-maíz-en-la-tabla-horizont.jpg', 1),
(13, 'Cuy al Horno', 'El cuy al Horno es un plato muy típico de la region de la sierra del Perú, y gracias a la afluencia de turistas, Cusco es uno de los destinos donde podemos probar este plato.\r\n\r\nEs más, existen distritos y pueblos enteros que se dedican a la producción de este plato, en Cusco tenemos el pueblo de Tipón', 'cuy.jpg', 2),
(14, 'Estofado de pollo', 'El guiso realizado mediante esta técnica culinaria evita la evaporación manteniendo gran parte de los jugos iniciales y reteniendo de esta forma los sabores y aromas de los alimentos cocinados', 'estofado-de-pollo-peruano-foto-principal.jpg', 4),
(15, 'Lentejas con arroz', 'La sopa de lentejas es una sopa típica de la cocina mediterránea cuyo principal ingrediente es la lenteja.\r\n\r\nSe sabe que es muy importante en la recuperación de lesiones de los arqueros. Grandes exponentes como Claudio Bravo, Keylor Navas u Oliver Khan han indicado que cuando se lesionan consumen lentejas', 'lentejas-con-arroz-recorte.jpg', 4),
(16, 'Arroz con pollo', 'La historia mas conocida y contada del arroz con pollo peruano, es de que este platillo nació como segunda opción del Arroz con pato norteño, ante la ausencia del pato en el siglo XVII. Así fue como al no tener al alcance el ingrediente principal, y el alto costo del maíz para preparar la chicha de jora, se optó por reemplazar estos principales ingredientes por el Pollo y la Cerveza negra respectivamente. Desde entonces se le conoce al Arroz verde con pollo o simplemente Arroz con pollo como una adaptación limeña del Arroz con pato del norte de Perú.', 'Arroz-Pollo-Pasta_y_arroz.jpg', 3),
(17, 'Sopa de Semola', 'La sopa juliana, es un producto de alimentación que se vende, normalmente, desecado, aunque se pueda preparar fresco, y que al cocerse, junto con fideos o sémola, o simplemente con agua, compone un recurso alimenticio de gran valor nutritivo. Se denomina así por la forma típica en la que se cortan las verduras empleadas en su elaboración', 'sopa-de-semola.jpg', 4),
(18, 'Chicharrón de Pollo', 'Trocitos de pollo bien sazonados y fritos a punto de chicharrón, remojadoS en aderezo de limón, salsa a la huancaína o salsa de huacatay, no tienen pierde a la hora de escoger una entrada que guste a todo el grupo', 'Receta-recetas-locos-x-la-parrilla-locosxlaparrilla-receta-chicharron-pollo-peruano-chicharron-pollo-receta-pollo-frito-pollo-640x477.jpg', 3),
(19, 'Saltado de vainitas', 'es una preparación que se usa como base para preparar muchos otros platillos. Esta \"base\" culinaria puede contener: cebolla, zanahoria, apio, tomate, sal, cilantro, cebollino y ajo. La combinación de ingredientes y proporciones varían dependiendo de la región o el platillo para el cual se va a usar. Los ingredientes son troceados o picados en pequeños pedazitos que se fríen en aceite de oliva (o un material graso como mantequilla, tocino', 'vainas.jpg', 3),
(20, 'Sopa de moron', 'es un caldo elaborado con miga de pan típico de la cocina gaditana,2​ y malagueña (donde con alguna variante se le denomina lavapuertas). La denominación de esta sopa proviene de la operación de hervir el pan, en vez de trocearlo (o migarlo en crudo) y verter posteriormente el caldo encima, tal y como se hace en las sopas', 'sopaPimiento.jpg', 5),
(21, 'Lomo Saltado', 'El lomo en adobo (denominado también como lomo adobado) es un plato de cerdo muy típico en la cocina española. Se prepara el lomo de cerdo en un adobo que incluye pimentón como uno de los principales ingredientes, proporcionándole su color rojo característico', 'lomoASAO.jpg', 4),
(22, 'Tallarines a la Alfredo', 'Los tallarines (del italiano taglierini) son un tipo de masa (pasta) alargada, de ancho pequeño y forma achatada que integran el conjunto de las paste asciutte (pastas secas) de origen italiano. Los que se conocen en toda Europa y en buena parte del mundo occidental provienen directamente de Italia y no deben ser confundidos con preparaciones parecidas', 'tallarines.jpg', 1),
(23, 'Hamburguesas con papas', 'Las cheeseburgers son, por el añadido de las rodajas de queso, hamburguesas con un mayor contenido graso. Por regla general unas 95 calorías y unos 4.5 gramos de grasa saturada a la hamburguesa', 'hamburguesa-papas-fritas.jpg', 3),
(24, 'Tallarines en salsa blanca', 'Los tallarines (del italiano taglierini) son un tipo de masa (pasta) alargada, de ancho pequeño y forma achatada que integran el conjunto de las paste asciutte (pastas secas) de origen italiano. Los que se conocen en toda Europa y en buena parte del mundo occidental provienen directamente de Italia y no deben ser confundidos con preparaciones parecidas', 'tallarines-salsa-blanca-hecha-en-casa-y-camarones-y-jamon-foto-principal.jpg', 5),
(25, 'Guiso de Quinua', 'Su semilla es el único alimento de origen vegetal que provee todos los aminoácidos esenciales, equiparándose su calidad proteica a la de la leche', 'quinoaguiso.jpg', 5),
(26, 'Caldo de Gallina', 'Aunque las estaciones andan un poco a su aire, no se sabe bien casi donde termina una y comienza la siguiente, si que es cierto que el frio acaba llegando y  una de las bebidas calientes que mas se ha utilizado siempre es un buen caldo de gallina, de pollo o de ternera , también el de hortalizas y verduras es muy apetecible y muy sano.', 'caldo-de-gallina_700x465.jpg', 4),
(27, 'Pescado Frito', 'El pescao frito o pescaíto frito (según la forma dialectal andaluza) es un plato tradicional del litoral mediterráneo, por ejemplo en Provenza (Francia), Rosellón (Francia), en las regiones costeras de Italia, en Grecia, y en diversas zonas de España como Huelva, Islas Baleares, Cataluña, Comunidad Valenciana, Málaga, Cádiz, Almería, Granada, provincias de interior como Córdoba y Sevilla, y también de las islas Canarias, que puede servirse en freidurías especializadas, pero no necesariamente, siendo típico de chiringuitos, bares y terrazas', 'pescadoFrito.jpg', 4),
(28, 'Paella Valenciana', 'hoy en día muy popular en toda España y también en otros países como Argentina y Filipinas. En esta receta el arroz se cocina junto a otros alimentos en una sartén, generalmente ancha y con asas. El nombre de paella hace referencia tanto a la receta o plato cocinado como al recipiente que se utiliza para su elaboración', 'paella.jpg', 3),
(29, 'Crema Catalana', 'La crema catalana (conocida también como crema quemada o, en Cataluña, simplemente crema) es un postre muy típico de la cocina catalana y de la cocina europea en general y que consiste en una crema pastelera con base en yema de huevo que se suele cubrir con una capa de azúcar caramelizado en su superficie para aportar un contraste crujiente. Se come durante todo el año pero es costumbre el día de San José, celebrado el 19 de marzo. Hasta hace poco era, en general, un postre de fiestas', '1111_CocContigo_CremaCatalana.jpg', 5),
(30, 'Potaje de Garbanzos', 'El potaje es un plato a base de verduras y legumbres cocidas en abundante agua. Las variantes de este plato son innumerables y dependen fundamentalmente de las variedades alimenticias y la disponibilidad regional de los alimentos. Esta variedad hace que la palabra potaje aparezca en los menús acompañada de las preposiciones \"con\" o de, y de esta forma las variantes se denominan, por ejemplo: potaje con/de acelgas; potaje con cebollas, etc.', 'potaje-de-garbanzos-thermomix.jpg', 4),
(31, 'Rosquillas de San Isidro', 'La rosquilla es un dulce español típico en la Semana Santa, cuyo origen se remonta al antiguo Imperio romano, época en la que su receta se extendió a buena parte de Europa y de la cuenca mediterránea.', 'rosquillas-tontas-tipica-de-madrid-por-san-isidro-15-de-mayo.jpg', 5),
(32, 'Paparajotes', 'Los paparajotes son un postre típico de la huerta murciana ​hechos con hojas de limonero recubiertas con una masa elaborada básicamente con harina y huevo que se fríen y se espolvorean con azúcar en polvo y canela', 'paparajotes.JPG', 2),
(33, 'Croqueta de Mejillones', 'La croqueta es una porción de masa hecha con un picadillo de diversos ingredientes, la cual ligada con bechamel se reboza en huevo y pan rallado, y por último se fríe en aceite abundante. Suele tener forma redonda u ovalada.', 'tigres-o-croquetas-con-mejillones.jpg', 2),
(34, 'Arroz con Habas', 'El plato suele consistir en arroz blanco acompañado de frijoles marrones, rojos o negros (típicamente Phaseolus vulgaris o Vigna unguiculata) y condimentado de diversas formas, según la región. En Brasil, por ejemplo, las judías negras son más populares en Río de Janeiro, Río Grande del Sur y Santa Catarina, mientras en la mayoría del resto del país se usan solo en las feijoada. La especialidad de Nueva Orleans conocida como red beans and rice se acompaña a menudo con salchicha ahumada o una chuleta de cerdo frita', 'Chocos-con-arroz-y-habas-750x500.jpg', 3),
(35, 'Tortitas de Carnaval', 'El panqueque es una especie de crepe utilizado en las cocinas argentina, chilena, guatemalteca, hondureña, costarricense, mexicana, peruana, uruguaya y venezolana,para hacer preparaciones tanto dulces como saladas', 'saborgourmet-tortitas-de-calabaza-carnaval-tortitas-hinojo-600x372.webp', 5),
(36, 'Congrio con Patatas', 'En Italia es popular sobre todo en zonas de influencia germánica, como la región de Trentino-Alto Adigio. En los valles surtiroleses era un tradicional plato campesino que se preparaba en época otoñal, concretamente en la celebración de acción de gracias llamada Törggelen.', 'congrio.jpg', 4),
(37, 'Potaje con Acelgas', 'El potaje es un plato a base de verduras y legumbres cocidas en abundante agua. Las variantes de este plato son innumerables y dependen fundamentalmente de las variedades alimenticias y la disponibilidad regional de los alimentos. Esta variedad hace que la palabra potaje aparezca en los menús acompañada de las preposiciones \"con\" o de, y de esta forma las variantes se denominan, por ejemplo: potaje con/de acelgas; potaje con cebollas, etc', 'garbanzos-con-acelgas.jpg', 3),
(38, 'Pimiento Piquillo Relleno', 'El potaje es un plato a base de verduras y legumbres cocidas en abundante agua. Las variantes de este plato son innumerables y dependen fundamentalmente de las variedades alimenticias y la disponibilidad regional de los alimentos. Esta variedad hace que la palabra potaje aparezca en los menús acompañada de las preposiciones \"con\" o de, y de esta forma las variantes se denominan, por ejemplo: potaje con/de acelgas; potaje con cebollas, etc', 'PIMIENTOS DEL PIQUILLO RELLENOS DE ATÚN.jpg', 2),
(39, 'Puchero Canario', 'El puchero canario (denominado también cocido canario) se trata de un cocido tradicional de la cocina canaria, se compone de carne de vaca, cerdo, pollo, chorizo y panceta con garbanzos (también se les suelen denominar garbanzas).', 'PUCHERO_CANARIO_NOT.jpg', 3),
(40, 'Chipirones a la Andaluza', 'La comunidad autónoma de Andalucía posee una rica gastronomía propia. Es muy variada y hay diferencias entre la costa y el interior, la gastronomía andaluza forma parte de la dieta mediterránea. Está muy vinculada al uso del aceite de oliva, los frutos secos, los pescados y las carnes. En la repostería se muestra gran influencia de la cocina andalusí, con el uso de almendras y miel, siendo muy conocidos de esta región los dulces navideños: los mantecados, polvorones y alfajores', 'chipirones.jpg', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `platos_facturas`
--

CREATE TABLE IF NOT EXISTS `platos_facturas` (
  `id_plato` bigint(20) UNSIGNED NOT NULL,
  `id_factura` bigint(20) UNSIGNED NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` double NOT NULL,
  KEY `platos_facturas_id_plato_foreign` (`id_plato`),
  KEY `platos_facturas_id_factura_foreign` (`id_factura`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `platos_facturas`
--

INSERT INTO `platos_facturas` (`id_plato`, `id_factura`, `cantidad`, `precio`) VALUES
(24, 15, 7, 99.33),
(10, 13, 2, 39.89),
(3, 7, 9, 59.24),
(7, 14, 6, 25.77),
(25, 1, 6, 67.52),
(7, 17, 8, 35.03),
(12, 1, 1, 66.52),
(22, 18, 10, 26.54),
(5, 7, 5, 80.14),
(2, 2, 6, 3.51),
(1, 1, 1, 97.72),
(22, 5, 10, 37.55),
(20, 19, 10, 31),
(11, 12, 2, 10.56),
(14, 11, 8, 92.46),
(8, 9, 2, 33.87),
(26, 15, 8, 44.16),
(5, 6, 9, 93.61),
(1, 7, 2, 50.58),
(17, 7, 3, 84.69),
(15, 5, 10, 73.31),
(18, 15, 5, 98.63),
(20, 7, 4, 8.75),
(7, 11, 5, 81.14),
(7, 8, 6, 83.18),
(11, 7, 1, 90.1),
(17, 2, 7, 80.36),
(12, 17, 6, 73.14),
(3, 7, 10, 47.14),
(11, 18, 2, 29.09),
(9, 10, 4, 61.54),
(25, 10, 7, 50.2),
(8, 8, 2, 67.56),
(19, 1, 8, 60.48),
(4, 10, 3, 66.81),
(8, 1, 5, 89.07),
(20, 11, 9, 99.12),
(17, 20, 7, 52.21),
(12, 14, 6, 80.74),
(23, 20, 2, 52.91),
(3, 4, 6, 70.49),
(13, 6, 2, 62.24),
(23, 5, 1, 32.52),
(6, 11, 6, 68.91),
(24, 6, 3, 52.56),
(27, 15, 8, 78.58),
(16, 8, 4, 59.25),
(7, 4, 8, 13.9),
(16, 5, 7, 46.12),
(24, 13, 9, 86.66),
(26, 10, 10, 95.81),
(25, 10, 9, 66.96),
(27, 8, 2, 26.9),
(11, 11, 5, 50.31),
(22, 6, 9, 29.81),
(7, 16, 1, 67.73),
(24, 2, 1, 92.74),
(16, 1, 7, 1.09),
(24, 18, 8, 74.69),
(18, 1, 1, 55.33),
(20, 5, 6, 35.93),
(26, 8, 8, 41.52),
(19, 20, 1, 45.73),
(10, 17, 4, 56.68),
(15, 15, 8, 50.3),
(27, 15, 1, 37.18),
(23, 17, 5, 56.45),
(22, 3, 7, 26.29),
(21, 3, 7, 3.13),
(7, 18, 3, 80.73),
(23, 14, 8, 13.26),
(1, 16, 4, 74.11),
(15, 13, 1, 73.55),
(12, 19, 4, 66.57),
(11, 6, 9, 26.8),
(6, 8, 10, 48.15),
(4, 17, 7, 52.37),
(23, 15, 2, 89.52),
(18, 15, 1, 93.55),
(14, 16, 7, 9.81),
(23, 15, 3, 84.74),
(14, 6, 9, 72.92),
(7, 6, 9, 59.42),
(19, 13, 9, 30.23),
(2, 3, 3, 75.97),
(8, 8, 2, 43.27),
(26, 17, 6, 4.48),
(21, 9, 4, 8.37),
(12, 12, 4, 52.31),
(13, 13, 6, 97.54),
(14, 6, 1, 93.8),
(22, 3, 4, 87.5),
(13, 2, 1, 87.19),
(22, 19, 6, 76.67),
(2, 1, 8, 32.26),
(14, 14, 3, 74.57),
(12, 18, 9, 9.94),
(12, 12, 1, 76.57),
(1, 20, 2, 27.24),
(13, 15, 6, 91.84),
(2, 21, 2, 58.62),
(3, 21, 1, 51.39),
(16, 21, 2, 70.91),
(23, 22, 3, 52.47),
(23, 22, 2, 52.47),
(19, 22, 2, 65.31),
(20, 23, 4, 76.06),
(10, 23, 10, 37.54),
(24, 24, 3, 75.3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE IF NOT EXISTS `proveedores` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pais` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `direccion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`id`, `nombre`, `pais`, `direccion`, `email`, `telefono`) VALUES
(1, 'Lind and Sons', 'Djibouti', '81619 Maurine Hills\nSouth Alejandra, MN 71636', 'rahul.hills@yahoo.com', '637558840'),
(2, 'Leannon, Lueilwitz and Leuschke', 'Haiti', '799 Margaret Tunnel\nTerryhaven, MN 56026-3972', 'rsmith@gmail.com', '623022016'),
(3, 'Kling Ltd', 'Kenya', '2194 Zena Squares Apt. 997\nSouth Jamaalborough, NH 02015', 'harvey.bernier@kunde.com', '628080321'),
(4, 'Gleichner, Effertz and Kessler', 'Norfolk Island', '569 O\'Reilly Club Apt. 618\nSouth Shayleechester, CA 85639-1674', 'runolfsdottir.colin@ward.com', '664103387'),
(5, 'Block LLC', 'Guinea', '699 Flavie Overpass\nPort Mackenzie, SC 12452-6936', 'marc.tremblay@yahoo.com', '616882448'),
(6, 'McDermott-Bayer', 'Lithuania', '943 Ruecker Trail Suite 874\nNovellaborough, DE 89923', 'barton.daren@hotmail.com', '606204024'),
(7, 'Hodkiewicz Group', 'Thailand', '3259 Rogers Mountains Apt. 383\nErnserberg, MS 90676-4290', 'efren.jaskolski@ratke.org', '687789870'),
(8, 'Collier, Blick and Stiedemann', 'Kuwait', '72797 Ambrose Crescent\nSouth Arnoldhaven, MD 71365-9789', 'zechariah84@gmail.com', '698816978'),
(9, 'Bailey Ltd', 'Costa Rica', '891 Shaina Estate Apt. 918\nJaydonberg, NJ 25656-5244', 'kosinski@hotmail.com', '687766353'),
(10, 'Rogahn, Altenwerth and Schiller', 'Seychelles', '746 Crona Brook Apt. 103\nPfefferburgh, WV 08171-4872', 'sipes.logan@yahoo.com', '679814297'),
(11, 'Murazik-Baumbach', 'Rwanda', '574 Champlin Mills Suite 694\nSouth Stephenton, OH 13134-2341', 'roxanne.nitzsche@hotmail.com', '645115116'),
(12, 'Gerlach-Kuphal', 'Antarctica (the territory South of 60 deg S)', '6862 Tiana Prairie\nLake Jefferey, ID 48361', 'effie21@bins.com', '639281768'),
(13, 'Moore-Mayert', 'Guinea-Bissau', '509 Berge Green Apt. 433\nCooperfurt, AZ 52434', 'douglas41@marvin.com', '699380385'),
(14, 'Hagenes-Reinger', 'Niger', '176 Hamill Turnpike Apt. 633\nEzraberg, NC 22119', 'quentin.lockman@boyer.com', '650499672'),
(15, 'Ondricka-Lakin', 'Morocco', '18290 Lucienne Vista Suite 541\nLake Damionfort, OR 51601', 'sydney68@bailey.com', '690582338');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `quejas`
--

CREATE TABLE IF NOT EXISTS `quejas` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_usuario` bigint(20) UNSIGNED NOT NULL,
  `id_restaurante` bigint(20) UNSIGNED NOT NULL,
  `titulo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `puntuacion` tinyint(4) NOT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `quejas_id_usuario_foreign` (`id_usuario`),
  KEY `quejas_id_restaurante_foreign` (`id_restaurante`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservas`
--

CREATE TABLE IF NOT EXISTS `reservas` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_cliente` bigint(20) UNSIGNED NOT NULL,
  `num_comensales` tinyint(4) NOT NULL,
  `id_mesa` bigint(20) UNSIGNED NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  PRIMARY KEY (`id`),
  KEY `reservas_id_mesa_foreign` (`id_mesa`),
  KEY `reservas_id_cliente_foreign` (`id_cliente`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `reservas`
--

INSERT INTO `reservas` (`id`, `id_cliente`, `num_comensales`, `id_mesa`, `fecha`, `hora`) VALUES
(1, 105, 6, 32, '1975-03-06', '17:28:40'),
(2, 89, 2, 44, '2013-10-14', '15:37:22'),
(3, 91, 5, 9, '1998-07-16', '14:17:36'),
(4, 100, 3, 34, '1975-06-08', '12:22:14'),
(5, 103, 9, 18, '1972-02-25', '21:36:32'),
(6, 96, 5, 24, '1974-03-06', '15:16:52'),
(7, 95, 2, 4, '1971-12-12', '19:59:46'),
(8, 96, 2, 28, '1975-06-15', '01:57:29'),
(9, 105, 2, 35, '1990-05-19', '01:10:10'),
(10, 105, 5, 12, '1973-06-24', '20:19:20'),
(11, 107, 6, 43, '2013-08-17', '07:10:26'),
(12, 89, 9, 49, '1976-11-06', '11:16:24'),
(13, 96, 5, 45, '1976-12-16', '01:22:54'),
(14, 85, 1, 6, '1999-07-27', '19:36:39'),
(15, 107, 1, 25, '2001-12-20', '23:24:57'),
(16, 89, 1, 21, '1970-03-04', '12:08:00'),
(17, 93, 7, 17, '1999-03-22', '23:21:28'),
(18, 90, 10, 36, '1986-02-01', '11:12:20'),
(19, 91, 8, 44, '2010-12-15', '19:35:34'),
(20, 93, 5, 8, '1985-08-23', '11:05:35'),
(22, 113, 5, 2, '2020-06-14', '16:00:00'),
(23, 113, 5, 6, '2020-06-14', '16:00:00'),
(24, 113, 5, 9, '2020-06-14', '16:00:00'),
(25, 113, 5, 16, '2020-06-14', '16:00:00'),
(26, 113, 5, 26, '2020-06-14', '16:00:00'),
(27, 113, 5, 2, '2020-06-14', '17:00:00'),
(28, 113, 5, 6, '2020-06-14', '17:00:00'),
(29, 113, 5, 9, '2020-06-14', '17:00:00'),
(30, 113, 5, 16, '2020-06-14', '17:00:00'),
(31, 113, 5, 26, '2020-06-14', '17:00:00'),
(32, 113, 5, 2, '2020-06-14', '19:00:00'),
(33, 113, 5, 6, '2020-06-14', '19:00:00'),
(34, 113, 5, 9, '2020-06-14', '19:00:00'),
(35, 113, 5, 16, '2020-06-14', '19:00:00'),
(36, 113, 5, 26, '2020-06-14', '19:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `restaurantes`
--

CREATE TABLE IF NOT EXISTS `restaurantes` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `direccion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ciudad` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_apertura` date NOT NULL,
  `hora_apertura` time NOT NULL DEFAULT '09:00:00',
  `hora_cierre` time NOT NULL DEFAULT '22:00:00',
  `imagen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_menu` bigint(20) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `restaurantes_id_menu_foreign` (`id_menu`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `restaurantes`
--

INSERT INTO `restaurantes` (`id`, `nombre`, `direccion`, `ciudad`, `telefono`, `fecha_apertura`, `hora_apertura`, `hora_cierre`, `imagen`, `id_menu`) VALUES
(1, 'La Gula de Sevilla', 'Calle Regina', 'Sevilla', '609212777', '1999-07-28', '09:00:00', '22:00:00', 'sevilla.jpg', 1),
(2, 'La Gula de Madrid', 'Calle Alcala', 'Madrid', '609651502', '2009-11-10', '09:00:00', '22:00:00', 'madrid.jpg', 1),
(3, 'La Gula de Barcelona', 'Las Ramblas', 'Barcelona', '692098112', '2011-06-08', '09:00:00', '22:00:00', 'barcelona.jpg', 1),
(4, 'La Gula de Badajoz', 'Calle Menacho', 'Badajoz', '692543222', '1998-11-01', '09:00:00', '22:00:00', 'badajoz.jpg', 1),
(5, 'La Gula de Almeria', 'Paseo de Almeria', 'Almeria', '632870177', '2018-09-19', '09:00:00', '22:00:00', 'almeria.jpg', 1),
(6, 'La Gula de Valencia', 'Calle la Paz', 'Valencia', '636009122', '2010-03-18', '09:00:00', '22:00:00', 'valencia.jpg', 1),
(7, 'La Gula de Murcia', 'Plaza de las Flores', 'Murcia', '636654990', '2006-05-04', '09:00:00', '22:00:00', 'murcia.jpg', 1),
(8, 'La Gula de Zaragoza', 'Paseo de la Independencia', 'Zaragoza', '611855309', '2007-03-31', '09:00:00', '22:00:00', 'zaragoza.jpg', 1),
(9, 'La Gula de Malaga', 'Calle Larios', 'Malaga', '637734888', '2011-11-11', '09:00:00', '22:00:00', 'malaga.jpg', 1),
(10, 'La Gula de Bilbao', 'Gran Via', 'Bilbao', '636909558', '2015-01-06', '09:00:00', '22:00:00', 'bilbao.jpg', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sueldo_base` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `nombre`, `sueldo_base`) VALUES
(1, 'administrador', 0),
(2, 'usuario', 0),
(3, 'gerente', 1630),
(4, 'responsable de compras', 1000),
(5, 'jefe de cocina', 3000),
(6, 'cocinero', 1487),
(7, 'ayudante de cocina', 1027),
(8, 'jefe de sala', 1600),
(9, 'camarero', 1100),
(10, 'equipo de limpieza', 832),
(11, 'repartidor', 850);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `usuario` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `direccion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha_incorporacion` date DEFAULT NULL,
  `telefono` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `imagen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_role` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `apellidos` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `numero_seguridad_social` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sueldo` double DEFAULT NULL,
  `id_restaurante` bigint(20) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `usuarios_id_role_foreign` (`id_role`),
  KEY `usuarios_id_restaurante_foreign` (`id_restaurante`)
) ENGINE=InnoDB AUTO_INCREMENT=114 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `password`, `email`, `direccion`, `fecha_incorporacion`, `telefono`, `imagen`, `id_role`, `nombre`, `apellidos`, `fecha_nacimiento`, `numero_seguridad_social`, `sueldo`, `id_restaurante`) VALUES
(1, 'administrador66', '$2y$10$cFhefdJ.clfb38UL0AxuI.jkp12/0CCMXaBPi8uHV457XysbFazZ2', 'administrador@administrador.com', 'Calle de los Naranajos', '1972-02-24', '600287443', 'foto2.jpg', 1, 'Shane', 'Farrell', '1970-08-21', '036-26-6504', 0, NULL),
(2, 'Cliente al Contado', NULL, NULL, NULL, NULL, NULL, 'usuario.png', 2, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'virginia.kuphal', '$2y$10$a3sKQtRUSpQWPKOnCQ4suOk5a0qNjDW8Dm140pUmD3col00gJxbqi', 'wolf.nona@parker.net', '620 Favian Gardens Suite 268', '2014-04-27', '653015722', 'usuario.png', 8, 'Arthur', 'Gutmann', '1972-11-13', '546-73-2371', 3134.41, 2),
(4, 'magdalen.stark', '$2y$10$r1LnriGns55pciNe3EpliOBvt7..E1jiNThbUaMdECuijHrYzVdTS', 'darlene98@yahoo.com', '7799 Gloria Island Apt. 282', '2018-08-07', '646508963', 'usuario.png', 9, 'Pete', 'Kohler', '1995-03-05', '785-86-6469', 3273.18, 8),
(5, 'hassan13', '$2y$10$0bCKNYgSDfh.vWAToBmLXeHOBB3mjrI9CSdTtu5dVyV1WpEmKr.KO', 'ebatz@gmail.com', '82535 Nicolas Green Apt. 656', '1979-04-25', '687344175', 'usuario.png', 5, 'Evangeline', 'Braun', '1981-04-12', '387-72-2195', 3968.18, 6),
(6, 'nick.king', '$2y$10$cRPdZ7vys49myZHpOlhd6e6Dxv9EEB3AWBwJLNyHdZG3zwiWIF0UG', 'helen98@medhurst.info', '69564 Bethel Course Suite 283', '1998-08-31', '669505121', 'usuario.png', 5, 'Lamont', 'Bayer', '1992-02-08', '314-46-6428', 4155.94, 1),
(7, 'adan.weber', '$2y$10$JxafvJVYQprSuPT7JQOYSe060z4oDszDKZmwK0X40rtCVqA3YFWBq', 'daryl.wunsch@senger.com', '7043 Greenfelder Plains Apt. 595', '2015-07-19', '669375354', 'usuario.png', 7, 'Esther', 'Senger', '1985-02-09', '707-18-8559', 4091.99, 4),
(8, 'qtillman', '$2y$10$m0yt6wPHgn3gdtz8D8n1..7bCrNyqcynE.H1fEqVerh9H56omRsEm', 'carey23@jerde.biz', '930 Donnie Coves', '2013-09-01', '655686134', 'usuario.png', 5, 'Bertrand', 'Kreiger', '1973-01-22', '404-08-2036', 2948.35, 6),
(9, 'danny.hills', '$2y$10$tJG4XLYZYyv00wgRthlbFu7/G3UJVURL8VNwgBjTT97ilcf0CDjnq', 'thiel.bernardo@hotmail.com', '562 Kamren Ferry', '1991-07-22', '689111855', 'usuario.png', 10, 'Michael', 'Cormier', '1994-08-29', '748-01-1966', 4911.07, 8),
(10, 'tyler.jenkins', '$2y$10$9lH4GJlg9yZK/iRvVXSh8OChIUrMyP5IuiTtUHPFC6WMLl4JET10S', 'edubuque@yahoo.com', '778 Heidenreich Station Suite 790', '1992-01-25', '621157320', 'usuario.png', 4, 'Aimee', 'Vandervort', '1983-03-29', '805-09-9569', 1158.25, 8),
(11, 'braun.dax', '$2y$10$nx.h54.oCv8lEnA1SdfQmeyocpdRPrQeVzS0lVbBFU/e9wvZZlDsi', 'kiehn.ricardo@yahoo.com', '517 Logan Manors Apt. 350', '1988-01-18', '687690513', 'usuario.png', 4, 'Helga', 'Bednar', '1971-12-08', '173-01-6291', 685.42, 8),
(12, 'runte.zachariah', '$2y$10$lPwvEklOkpmKO33pVbbV1OKBBNU9LkAmG3aY3MoYUKogXj.CKOXj2', 'marlen52@wehner.info', '61932 Janiya Springs Suite 498', '2002-07-20', '605813431', 'usuario.png', 9, 'Domenick', 'Ankunding', '1995-01-22', '215-36-3244', 1896.64, 10),
(13, 'grant.anais', '$2y$10$3lX5xA6sJsfHzk6Kyn1UyePWAmVVE2EyuzABFxmjKL2nNh1U2wbuS', 'corrine24@windler.com', '6429 Schaden Garden Apt. 412', '1986-08-09', '684682251', 'usuario.png', 5, 'Rossie', 'Hickle', '1979-01-10', '027-80-3705', 3479.85, 9),
(14, 'nlindgren', '$2y$10$xQ83B4gp90X5VpluOgC6E.I7UgdHsJGkcyLjaVduQ7Rui7jL8kB2C', 'pcollins@stroman.net', '17648 Metz Circles Suite 997', '1970-04-25', '606382454', 'usuario.png', 6, 'Lily', 'Brakus', '1984-11-30', '895-47-2514', 2255.81, 10),
(15, 'dcruickshank', '$2y$10$c0oCI0/8U4VoqpHvMeU16eTEFRDEVEsSA69V66FVjK5EApCWL.ZRK', 'stowne@williamson.net', '65130 Senger Hollow Apt. 629', '1988-03-12', '645744395', 'usuario.png', 5, 'Lucile', 'Mayer', '1999-01-01', '160-81-3624', 4683.85, 10),
(16, 'brown40', '$2y$10$tEGPXbULPZyb/ZRsS9V.JuABV2/ATaBN46Ro8dEApFwTBcaM/dv62', 'isai20@yahoo.com', '49267 D\'Amore Stravenue', '1998-08-22', '621743406', 'usuario.png', 6, 'Grant', 'DuBuque', '1995-05-31', '586-45-5398', 1286.06, 5),
(17, 'ebert.melvina', '$2y$10$DuvYjVyPALRZFSZl2S6za.GzJMg6zurIaOFmSgYKMj0UYsTY7/sMq', 'hyatt.laurine@denesik.com', '512 Bethany Branch', '1980-03-30', '612654214', 'usuario.png', 5, 'Marianne', 'Frami', '1986-04-12', '581-25-1253', 3311.04, 9),
(18, 'marques.mclaughlin', '$2y$10$2vA7Wg5hvo.F5gcgi.i39ulNqqUqDG0y5.Ppj7wuPz.OxvXGX9DPa', 'andre.kreiger@dooley.com', '2458 Marquardt Station Apt. 698', '1996-08-26', '678393996', 'usuario.png', 6, 'Sadie', 'Schinner', '1994-06-06', '891-60-2756', 4695.24, 1),
(19, 'kuhic.julien', '$2y$10$qPvkGHkOMDJVZHVkQ9Vg0uSNwmcWAO3ttDFXw5lwhNmHF7skopN0.', 'selena96@hotmail.com', '11820 Jast Greens', '2016-04-04', '644110024', 'usuario.png', 5, 'Joel', 'Emmerich', '1996-07-09', '378-93-3843', 2039, 3),
(20, 'mveum', '$2y$10$Mt1vL3K8buOLR9GBJrNEoOnLNL272LMMPT/xaoTOMV3Vlf3WBd9am', 'brigitte66@yahoo.com', '118 Mikayla Wells', '1996-08-07', '672415095', 'usuario.png', 4, 'Chaim', 'Fisher', '1977-06-25', '731-48-5983', 1982.75, 6),
(21, 'lgottlieb', '$2y$10$/2qmf1HiZB1L8xS6FJgRh.zZxg7u503cPvoJmH1rGeT/6.R4d6Gn.', 'claude.veum@nienow.com', '9277 Greenfelder Pine', '2008-11-27', '680493701', 'usuario.png', 5, 'Edyth', 'Sipes', '2000-03-13', '864-58-4320', 1204.24, 2),
(22, 'rogelio.morar', '$2y$10$hDzcigpJGIpp/cNWGeuE/O2EpICOtqWLwjx/s.WHX2BB10lJnDvO2', 'hudson.jules@hotmail.com', '66034 Noah Unions Suite 795', '2007-12-19', '672172427', 'usuario.png', 9, 'Gilbert', 'Tillman', '1991-08-20', '754-31-3876', 3612.67, 4),
(23, 'aurelio90', '$2y$10$MZXUP5MX1ND6aa9rm6swe.DtT8k290A5X7cLipJDZ/WOI4YQ66GZC', 'nhahn@gmail.com', '8185 Blick Turnpike Suite 935', '1994-09-27', '692521228', 'usuario.png', 9, 'Royce', 'Lueilwitz', '1998-01-07', '783-61-5372', 3580.93, 1),
(24, 'mcdermott.marvin', '$2y$10$WD7MQl7xDtoGApSGzDUzhunHZLHSVlIfvvgiYQSV4agvoW7mUfpM.', 'harvey.destinee@thompson.com', '48646 Johnston Stream', '1977-02-12', '624362769', 'usuario.png', 8, 'Aric', 'Kemmer', '1985-10-19', '899-41-6772', 968.42, 9),
(25, 'gokeefe', '$2y$10$qNHwST2bmWYrl6Apd0cRGOR1BvGvZ8gqrWXvWFZkU2ZNHf8iXiJQG', 'cassin.doyle@gmail.com', '60028 Trantow Plain Suite 208', '2014-01-19', '661117704', 'usuario.png', 9, 'Austen', 'Romaguera', '1995-11-20', '067-80-9333', 2409.56, 6),
(26, 'nbeahan', '$2y$10$ioRxR5farn2D5RgNFIX48.BI9OXXNDkhob8lJ3WmB2HuDhRM/ASNm', 'ebert.elissa@champlin.com', '9283 Roberts Plains', '2013-02-15', '624118251', 'usuario.png', 7, 'Vickie', 'Lemke', '1994-02-11', '876-91-4660', 1561.39, 2),
(27, 'pkemmer', '$2y$10$skyH6stmx54C2hUHCDnvcunDF3Vfi2izXFFY479uLgDLj9x0r5BzC', 'carter.dena@carroll.com', '45748 Bauch Unions Suite 348', '1976-10-26', '656999553', 'usuario.png', 4, 'Maeve', 'Walter', '1977-01-24', '767-50-9606', 3251.76, 2),
(28, 'cade37', '$2y$10$15Z9Y.tMpnKgGh234sTyee/kXlc2kNtN6pBA9R5bKIAExjj48FRZ2', 'jtillman@oreilly.com', '95724 Gage Overpass', '1988-01-08', '665373508', 'usuario.png', 9, 'Dorcas', 'Price', '1970-06-04', '627-38-0901', 2199.74, 7),
(29, 'kohler.wanda', '$2y$10$LLLIJvB5a7IPGTJfflrzmeSkUHWZLLMKJ1taSBD8oB0Q4UC96tUGq', 'schiller.sydni@hamill.org', '2431 Turcotte Walks', '1990-10-04', '684219325', 'usuario.png', 10, 'Shaniya', 'Auer', '1994-06-14', '819-11-8575', 4799.64, 6),
(30, 'turcotte.lupe', '$2y$10$G8kXMjNgvB75S6dCV2UIreUQTUGMv/KoOijNgK4MzaOO7QSQsk5s2', 'daniela.wyman@yahoo.com', '89667 Friesen Field Suite 941', '1990-04-20', '648576379', 'usuario.png', 7, 'Rae', 'Bahringer', '1988-03-04', '518-47-9877', 3384.49, 8),
(31, 'okon.laverne', '$2y$10$rJqfsPErBDf5L7ddHmy/Ruq9ahSREK3.CT2oPfN.D0b7XHb7wZuOG', 'toby79@sipes.com', '30288 Hickle Row', '1996-08-29', '689524220', 'usuario.png', 4, 'Trudie', 'Schumm', '1992-03-02', '400-16-7769', 3820.41, 5),
(32, 'letha.hammes', '$2y$10$dVbZ5Men7KKABbDXvj8e3e03q/mVKYo439QXXGvqh73TBHJK9rWuC', 'ziemann.ressie@watsica.com', '97925 Glover Ridges', '1982-09-14', '676946916', 'usuario.png', 5, 'Gwen', 'Stroman', '1979-11-06', '422-25-1781', 2009.31, 9),
(33, 'maxie73', '$2y$10$/EkUkc.dFRpt0UO1kkuah.g3vrl0VPOBMpSlAf/2SC25vX1XBrlPy', 'chandler.rowe@hotmail.com', '24281 Halvorson Hill Apt. 931', '2015-09-11', '662848781', 'usuario.png', 10, 'Jaycee', 'Graham', '1977-12-07', '157-16-7445', 4276.29, 8),
(34, 'irving01', '$2y$10$CKEqb1xU6G8QbkvXQXZn1.Jwk8WpCU.5RpP13Q5/UWq1ArY13XwEW', 'smitham.jodie@cole.com', '7195 Bernhard Lock Apt. 524', '1993-06-19', '670150240', 'usuario.png', 6, 'Daryl', 'Boehm', '1986-03-15', '629-11-0122', 2247.15, 10),
(35, 'cade.nienow', '$2y$10$IB3hcH4b7CzqoKUc8vG9J.RCRpSCI3o62VcRdrSmVwTp3GRnHeIj.', 'isobel.stark@hotmail.com', '5762 Harry Corner Suite 724', '1987-10-21', '660687684', 'usuario.png', 4, 'Octavia', 'Romaguera', '1998-03-12', '343-87-0625', 4604.47, 10),
(36, 'hilpert.meggie', '$2y$10$Buu/BuULsB75CwGj0YTR8eIU29bA6fcdmxshH0EwUxt/I9vEN.kdS', 'janis.morissette@yahoo.com', '17853 Maude Manor Suite 275', '1989-09-04', '663047411', 'usuario.png', 7, 'Keven', 'Blick', '1974-05-20', '151-13-2322', 1032.55, 9),
(37, 'lea.purdy', '$2y$10$ZscOIoTI3IXm7hpfsGkR4.0eKazc5ZvfuMovPYLJ5DMOJe6FlrS7W', 'zfeil@hotmail.com', '7690 Swaniawski Hollow Apt. 478', '1971-12-19', '693644507', 'usuario.png', 9, 'Sydnie', 'Ondricka', '1986-10-22', '834-31-2308', 1246.41, 2),
(38, 'mgrady', '$2y$10$PsmNdoSTxOYIRdLF2BQj3u6O.tWrkJAQLpccJptt20WMHtkrD/QLW', 'laurence57@jaskolski.com', '7678 Fadel Parkways', '1996-08-29', '657832318', 'usuario.png', 9, 'Davion', 'Schamberger', '1999-03-14', '626-44-6585', 4730.55, 1),
(39, 'noemi94', '$2y$10$koLrcdksebhpRjRd8EVdreeixf1Kv348YkKThPZlhQdMiO9BdM7Ge', 'tyree51@kohler.com', '95691 Tony Route', '2008-04-26', '676439487', 'usuario.png', 7, 'Jarrell', 'Schneider', '2000-03-27', '228-63-7511', 4910.02, 7),
(40, 'erika.welch', '$2y$10$ElN1lbvEDBSYnve7Y0o/0uVhk3BCTlxVwow4/djjoMNjM0XaTX4Ga', 'emmalee.oconnell@hotmail.com', '841 Donnelly Manor Apt. 371', '1970-07-11', '691774257', 'usuario.png', 9, 'Marion', 'Nitzsche', '1973-02-09', '684-08-2371', 1553.18, 2),
(41, 'bcorkery', '$2y$10$TF3i1mYdjSUZ3XAlh9kjHuup3UH3VFEtuydWEQSkGUvhrM64d5fiu', 'matteo.conn@gmail.com', '2623 Eriberto Vista Suite 140', '1985-01-15', '683610425', 'usuario.png', 7, 'Cassandre', 'Sanford', '1983-08-30', '591-78-7894', 2081.57, 3),
(42, 'clement92', '$2y$10$mLa5eG82NGYnmgoGEfjRZOQ5Sd.UPlOlBsp1/xmwPuIy/bZajlPNq', 'mwaters@jast.info', '595 Nikolaus Gardens', '1974-11-06', '647339065', 'usuario.png', 6, 'Casper', 'Dietrich', '1990-03-14', '150-01-3287', 629.74, 5),
(43, 'devyn59', '$2y$10$G6d.fsH37JobuDAgLhAgZOkfZDOMU7U3Fn.BQ61nUEK.skKU7fVbu', 'lila22@hotmail.com', '42742 Tremblay Brook', '1989-04-14', '625510002', 'usuario.png', 6, 'Tomasa', 'Sipes', '2000-04-18', '660-96-2300', 3949.8, 9),
(44, 'jody.goodwin', '$2y$10$4H.j65VVWwGPKZQkmFOsUONoo83iwKc.xByL5qB2KC5HfnQIsirvO', 'mayra52@pagac.com', '838 Heidenreich Creek', '1988-09-30', '657371086', 'usuario.png', 7, 'Hunter', 'Haag', '1994-03-28', '750-76-5482', 1723.24, 5),
(45, 'qheaney', '$2y$10$FYuvZM2/ZvzXnrsqWx9ns.Fo8rYhMn6VGJODKvI49Epipd7QJ2y0y', 'fannie02@yahoo.com', '5511 Kacie Mall Suite 533', '2005-11-04', '697626778', 'usuario.png', 10, 'Augustus', 'Sauer', '1978-05-04', '292-89-9550', 2926.78, 9),
(46, 'dlabadie', '$2y$10$fNOlnstfLfsHE/XZJ9HVgen2GS3.zcQ5XU9AIjNtkSWrB0eQ4ykl6', 'lesch.zaria@hotmail.com', '425 Tracey Hills Suite 681', '2019-07-16', '683164829', 'usuario.png', 9, 'Noemie', 'Runolfsdottir', '1981-10-18', '010-91-6781', 1833.81, 1),
(47, 'twintheiser', '$2y$10$DpVRav/TgG4puyeVn7UF6.K7x6R9GZ/LIxyHjDXWgxsWGqSIs63XC', 'ines.brekke@yahoo.com', '9892 Austen Summit Suite 367', '2019-10-25', '650314474', 'usuario.png', 8, 'Alexandrine', 'Sipes', '1988-09-30', '794-05-3826', 3807.97, 1),
(48, 'rlemke', '$2y$10$ZRStxXIKaYI6T553uTYwCuxOZuyVO.jEwy0OeEO9SpfMOUt3GzbBC', 'ustiedemann@kertzmann.com', '412 Kassulke Road', '1977-12-06', '636628738', 'usuario.png', 8, 'Marcelle', 'Strosin', '1996-05-09', '822-85-9848', 4168.07, 7),
(49, 'kaya32', '$2y$10$C2IMA/CTuqUgvHfXF5moA.muVAPlL5hq.DAgR8mZKvjD0C0VsOy1W', 'glittel@yahoo.com', '791 Pfeffer Cliffs Suite 309', '1985-06-15', '687658532', 'usuario.png', 4, 'Damion', 'Wilderman', '1983-03-26', '872-15-3996', 2541.18, 8),
(50, 'rosanna10', '$2y$10$6EfQbaRVrZrBOhK5D1ZA7eA/XbIdPCSA2A1Zp8Wwm1a6naoVvjdR2', 'witting.earnestine@gmail.com', '885 Alfredo Lake', '2015-08-16', '613110107', 'usuario.png', 6, 'Laura', 'Koelpin', '1991-04-03', '622-77-6784', 3002.54, 2),
(51, 'smith.werner', '$2y$10$pN/TDP8yyKpFwDnxonXxtu0Mzl2PpEL7iO28L7XmeN0mqnivLsvf6', 'emmerich.jalen@ratke.com', '2563 Pacocha Corner Apt. 747', '1993-01-31', '609691459', 'usuario.png', 10, 'Rosario', 'Kihn', '1975-07-26', '226-04-0096', 4896.69, 5),
(52, 'cferry', '$2y$10$lNMKfnF1esSdMC251nPPpukGHLoqsX/Kk37BOROnEHOHsRj3B6Liu', 'demetris.glover@yahoo.com', '76597 Beer Knoll', '1970-11-03', '617630309', 'usuario.png', 9, 'Laurianne', 'Upton', '1988-06-08', '294-52-4081', 3387.33, 5),
(53, 'zemlak.enrique', '$2y$10$mJr6hkMxomhtHP0nk8gxs.IOThMNcbP0zrPiD6.8/jiS1o5ZsYO7G', 'kirstin32@yahoo.com', '4334 Hegmann Cape Suite 568', '1972-10-07', '655667856', 'usuario.png', 3, 'Austen', 'Hoeger', '1973-05-24', '289-34-5015', 2143.43, 1),
(54, 'dedric12', '$2y$10$W.TOz/FqmT6AgZUjfScunOwtmrC3mEJxC5PMz7RRyiPeJDBUQrHxG', 'zlowe@gmail.com', '32767 Vicky Alley', '1978-03-20', '606585807', 'usuario.png', 3, 'Travon', 'Veum', '1983-09-29', '448-03-3329', 2399.85, 2),
(55, 'cornell.kutch', '$2y$10$D6OwnekqeOGbPdKg0ZBcuOcMz/G/uKPyjJOlmvYamUw/GheLKHt2G', 'matt32@hotmail.com', '43964 Logan Grove', '1988-06-05', '611399664', 'usuario.png', 3, 'Eloisa', 'Jones', '1974-08-28', '801-05-6956', 3439.42, 3),
(56, 'bartell.jena', '$2y$10$fbbCwSWZgAuSMHnOoq85kedqXZ.MgSdGe.Mg.wETVWIL2GrM.mQiy', 'jmertz@hayes.biz', '93313 Heidi Common Suite 991', '2008-12-09', '610875592', 'usuario.png', 3, 'Raegan', 'Prosacco', '1982-11-07', '757-25-1806', 2780.39, 4),
(57, 'jaime.welch', '$2y$10$61el7VFBvOh/yzij9YnM1u66ZbQiESgAV5L9ZWpqx7Schwe5Rhu3G', 'arjun48@bernhard.biz', '29922 Devonte Greens', '1977-12-23', '601964781', 'usuario.png', 3, 'Bruce', 'Roberts', '1986-04-17', '259-34-8416', 4892.61, 5),
(58, 'ufriesen', '$2y$10$tu.nQqYprj2ciE3uhzHJ4eNDaPqHK91Y9Y8bykj54PssFGD8tKpnO', 'smith.buford@kassulke.com', '30990 Cleve Cliffs', '1978-04-26', '694903624', 'usuario.png', 3, 'Keven', 'Breitenberg', '1991-06-15', '763-13-4138', 808.43, 6),
(59, 'muhammad.koss', '$2y$10$2WxNsSwPX8s3ZNctchFGgeHrO490anDMUHKOm/jaLjCzlulbsD2YG', 'macie.yost@wolf.com', '5518 Schulist Shore Apt. 183', '1972-09-24', '681688640', 'usuario.png', 3, 'Alicia', 'Kshlerin', '1977-02-28', '891-65-3893', 1430.02, 7),
(60, 'robel.kareem', '$2y$10$Gri8.9BztFAwN3XMkig9j.ORAcdx5q.Ki4rkdLr7cLsE.mU23tRzW', 'fritsch.kyle@bergnaum.com', '42187 Weimann Crescent', '1990-03-22', '645509685', 'usuario.png', 3, 'Gabriel', 'Waelchi', '1975-09-11', '064-64-0935', 513.79, 8),
(61, 'cindy.kshlerin', '$2y$10$USDQH1Uuv6WCf2IseMWhZ.xNc4Iwc/ZVkEcNpkZ.ypLP.hHN45iYm', 'rollin13@gmail.com', '6259 Alena Street Apt. 549', '1980-01-28', '648470436', 'usuario.png', 3, 'Marques', 'Bernhard', '1970-08-08', '872-96-6853', 4211.33, 9),
(62, 'keyon.wilderman', '$2y$10$pBlAmjlv/KPsJhFRtoHoaOD/m0IXwsr7U43yQEV08ZGT78fZds.kK', 'imogene45@berge.com', '537 Thelma Inlet', '1993-02-07', '642595317', 'usuario.png', 3, 'Eldon', 'Kemmer', '1971-02-02', '777-02-5208', 3166.65, 10),
(63, 'porter61', '$2y$10$j8aPhDMNgQloVB1X6pGXOOJTbJrZqI7z8eRri.tNYAQTGZBBzrg7e', 'zfunk@balistreri.com', '52481 Norbert Course Suite 857', '1974-06-18', '693099403', 'usuario.png', 2, NULL, NULL, NULL, NULL, NULL, NULL),
(64, 'kennedi.kub', '$2y$10$UJcOnSyJiFIvMMim0y2N5OwxPtQf2KUV8Fl25k0UWVJmygiU6uari', 'jhessel@labadie.net', '810 Gus Expressway', '1999-09-07', '663021357', 'usuario.png', 2, NULL, NULL, NULL, NULL, NULL, NULL),
(65, 'estella49', '$2y$10$QLkrIR7Vxwk3dBWOK71oWueyT31XCj2.1HRnJcR0a9WaaBt6wL8.u', 'darryl.reichert@hotmail.com', '426 Cathy Views', '1980-11-18', '684255765', 'usuario.png', 2, NULL, NULL, NULL, NULL, NULL, NULL),
(66, 'willie83', '$2y$10$9gXWQ/u2Jbu/TcIPUith7.QrpkVE5Y9nWT1AdfduKDCkVBRLkndai', 'zkuhlman@hotmail.com', '16092 Ebert Curve', '2010-09-16', '686787384', 'usuario.png', 2, NULL, NULL, NULL, NULL, NULL, NULL),
(67, 'isabel.bayer', '$2y$10$YFDTCClsiv0sam5BNDM.He4fTb1YM8xFgzYH.PJcnFuFROyRtSIzq', 'kerluke.zora@maggio.com', '17416 Turcotte Parkways', '2018-08-06', '653201479', 'usuario.png', 2, NULL, NULL, NULL, NULL, NULL, NULL),
(68, 'wschimmel', '$2y$10$SFHOwpjYFSQBqwVa8A3h9O3N5d1j0MYgbqX.PqK74eEsZh8yjkaUm', 'rau.ron@adams.info', '13718 Paucek Highway Apt. 141', '1995-03-03', '690051381', 'usuario.png', 2, NULL, NULL, NULL, NULL, NULL, NULL),
(69, 'kianna.metz', '$2y$10$f0YkBDhf.WEc9jbLRspMjeVNGlXqoBWWNgnMYu1BHhS1hDAfV3PUS', 'hdach@yahoo.com', '6157 Jamal Trail', '2013-12-27', '645868070', 'usuario.png', 2, NULL, NULL, NULL, NULL, NULL, NULL),
(70, 'terrill48', '$2y$10$U/5.vkm0yn8KXQCArhINZeOo0BvC2pqwDbcoYyNPx0x6EnnOFoRaa', 'leonie25@kub.biz', '33105 Laurence Passage', '1981-08-08', '629492710', 'usuario.png', 2, NULL, NULL, NULL, NULL, NULL, NULL),
(71, 'vlesch', '$2y$10$B4RjU1y7rt4wMTAHPaZl8.V4j9.lk1epQ2yiWqlAoG0ejOQm/YYEu', 'alarson@morar.com', '60745 O\'Reilly Streets', '2009-08-30', '687830581', 'usuario.png', 2, NULL, NULL, NULL, NULL, NULL, NULL),
(72, 'nbins', '$2y$10$/0raon7444.rH6rXiAlm8uYhMa2CO7yv0SW1siouk.fmvaTWDZgqa', 'rmccullough@yahoo.com', '28602 Senger Knolls Suite 955', '1982-02-28', '644191287', 'usuario.png', 2, NULL, NULL, NULL, NULL, NULL, NULL),
(73, 'bianka27', '$2y$10$PlWQ9TjE29X.6Fmle3XqwekTwcPW3AcXZaM3uByDRGWOyrgUCr33C', 'moses.littel@koelpin.com', '282 Jacinto Light', '1979-08-29', '626398256', 'usuario.png', 2, NULL, NULL, NULL, NULL, NULL, NULL),
(74, 'ofritsch', '$2y$10$iFxaYd0/o6wigmGM3wbFuOrS3854436bjat5jPENfcgrsXnBvXtzC', 'preston.turcotte@yahoo.com', '8399 Metz Place', '1988-12-09', '600779934', 'usuario.png', 2, NULL, NULL, NULL, NULL, NULL, NULL),
(75, 'rfunk', '$2y$10$rs1HzeB7xzHeFBmT3jjPTeoffMWvQcvwOB6Ibfl8d2x6xZnBEDHKO', 'xrutherford@hoeger.net', '97005 Hackett Spring Apt. 465', '1984-10-25', '676230133', 'usuario.png', 2, NULL, NULL, NULL, NULL, NULL, NULL),
(76, 'emayert', '$2y$10$I9hxSuwwwWKd3KzXSA/XQ.FC7bpGuQKFA3gGBJ44VxoAgYqUZus4a', 'karine09@gmail.com', '846 Assunta Coves Apt. 492', '1989-08-08', '698777705', 'usuario.png', 2, NULL, NULL, NULL, NULL, NULL, NULL),
(77, 'melisa.mitchell', '$2y$10$FcmtIcoVC/xVeVnsCtBVm.HboPFRq5EZYDAs0kdeoB1HzfTa/N.m.', 'ygleichner@yahoo.com', '7905 Crona Lodge', '1978-01-24', '603966707', 'usuario.png', 2, NULL, NULL, NULL, NULL, NULL, NULL),
(78, 'llynch', '$2y$10$BWRP4MGY04fHbCZo.WKgs.uPyvyGMTjhMi/TD7BO.Fx9uhzgjRw2O', 'annamae19@hotmail.com', '9550 Schamberger Port', '1977-01-22', '673891309', 'usuario.png', 2, NULL, NULL, NULL, NULL, NULL, NULL),
(79, 'lauren.rice', '$2y$10$vl65i7ICD2/sjHBcU/lnce/g7alesu93bBnhU1k108dIMNe4cpIpW', 'ellsworth92@gmail.com', '2120 Will Courts Suite 596', '1979-03-07', '633908999', 'usuario.png', 2, NULL, NULL, NULL, NULL, NULL, NULL),
(80, 'heber66', '$2y$10$NyigEDQiLenR0HZLwvM3iOapabIrNyvlX9IcGGwl2iqWbciIpOUX2', 'kyle.purdy@hotmail.com', '689 West Island', '1986-02-09', '617678411', 'usuario.png', 2, NULL, NULL, NULL, NULL, NULL, NULL),
(81, 'abdullah.harvey', '$2y$10$73Fsg5J2P2APhP1FqBgZuOtrJfHkDUSdyIlzhyZZ0QeeMyyeArFzO', 'baylee.fisher@hotmail.com', '38568 Sporer Crest Apt. 430', '1978-05-01', '606543498', 'usuario.png', 2, NULL, NULL, NULL, NULL, NULL, NULL),
(82, 'nakia.russel', '$2y$10$fz9AtH3qRFnhJDsG7FiJmuvrV67bOXjW2jSbJ2gdwqiAu0AYTnzMK', 'carroll26@gmail.com', '486 Ansley Vista', '2000-04-04', '691927720', 'usuario.png', 2, NULL, NULL, NULL, NULL, NULL, NULL),
(83, 'dejuan.wolff', '$2y$10$/Am/ofpoOomOfOZ47BWmj.L31GpEVL8mDYBC64p4ANnIFR6I26G7O', 'kaycee10@murray.biz', '784 Felipe Pine', '2004-07-16', '612981484', 'usuario.png', 2, NULL, NULL, NULL, NULL, NULL, NULL),
(84, 'marquardt.isaac', '$2y$10$GFk3xgoUoXKUfSPs8HfYX.PnqCVVf5QnTOzbVUxm9ncjzjn/0pqRm', 'kkautzer@schulist.com', '50542 Nathanial Turnpike Apt. 055', '1985-06-16', '691709238', 'usuario.png', 2, NULL, NULL, NULL, NULL, NULL, NULL),
(85, 'aliyah.reynolds', '$2y$10$umPFOytbylNf831AQ0vRTOnhl2eRBmoPItjOVnVj5Gx.UwgvE73bW', 'lcruickshank@rau.com', '3628 Dena Road', '2000-05-21', '688073826', 'usuario.png', 2, NULL, NULL, NULL, NULL, NULL, NULL),
(86, 'scot23', '$2y$10$KFYfGlrqTo7DKzTXXaJMXuvb7NEcgS2QOSIm2HhE8JR46Ui.kErO2', 'ucrona@crona.com', '629 Labadie Forge Apt. 236', '2006-10-03', '647468806', 'usuario.png', 2, NULL, NULL, NULL, NULL, NULL, NULL),
(87, 'alphonso.wuckert', '$2y$10$yOHJJzvwdtzGOTLVwdLrX.3LoUlNNrMZmcr9RUugoaoR40E8dUjbS', 'cathy.abshire@lueilwitz.org', '9148 Deckow Views Apt. 410', '1994-01-10', '651624160', 'usuario.png', 2, NULL, NULL, NULL, NULL, NULL, NULL),
(88, 'lehner.stephania', '$2y$10$FThN4ANLQTIJ2IbjHYP7Uu1eOkKqaxlmJ3k8dp2.YopyCQu/pSAl.', 'angelica01@cartwright.com', '48362 Bartell Camp', '2017-08-24', '677795724', 'usuario.png', 2, NULL, NULL, NULL, NULL, NULL, NULL),
(89, 'brenna07', '$2y$10$4W7DCLaIOD2cE3Q1Fl4xQuOth/WuoAzdtl6rY/ZWEs0IArDv3gQ4y', 'delfina60@yahoo.com', '18397 Erich Vista Suite 222', '1981-01-08', '633791048', 'usuario.png', 2, NULL, NULL, NULL, NULL, NULL, NULL),
(90, 'kovacek.arvilla', '$2y$10$8zqu6qDdFtQU1qjIcz9/iu3VnVzNjka4W6zZ6R2x.twbLkV9JVX2m', 'dustin42@mohr.com', '890 Ora Squares Suite 131', '1981-04-14', '682449427', 'usuario.png', 2, NULL, NULL, NULL, NULL, NULL, NULL),
(91, 'okris', '$2y$10$eZGE6KtS4Q7GdZjFjhNEn.HQhigw/2aFc.hTcVuM4Hq4..t7ThnIq', 'arely87@hartmann.org', '4020 Hammes Ways Apt. 644', '2019-05-07', '619774148', 'usuario.png', 2, NULL, NULL, NULL, NULL, NULL, NULL),
(92, 'norris40', '$2y$10$Kh6tm9M5HAtrQSh.iFKxneMRpfoSPTtO7WQdIM9WnLRDwfsQRDaW2', 'emraz@hotmail.com', '19522 Cormier Vista', '1973-09-03', '671579392', 'usuario.png', 2, NULL, NULL, NULL, NULL, NULL, NULL),
(93, 'omitchell', '$2y$10$.KJ6VtCrerfko6kX3UgQCueE3bvCgSzvQ8Nr0Lc1sJhb.LImXp1Bq', 'bennie.veum@dietrich.com', '6188 Oma Pines', '2008-11-20', '699177987', 'usuario.png', 2, NULL, NULL, NULL, NULL, NULL, NULL),
(94, 'arvilla67', '$2y$10$J9X.kGHSoXzFjAd8qmEVEe5JZrgsVBk82VC/fX7LHDTHxyhkZjARq', 'delmer.cormier@bechtelar.com', '573 Ortiz Extension Apt. 615', '1990-04-30', '653791367', 'usuario.png', 2, NULL, NULL, NULL, NULL, NULL, NULL),
(95, 'rose79', '$2y$10$7FjoN0xmgVzjUgoz9Ji32e/o4aquLG6BLIUQ3WSosi8MzNyeNcJJ2', 'dominique.hackett@gmail.com', '4534 Maximillian Inlet Suite 167', '1991-04-05', '661476270', 'usuario.png', 2, NULL, NULL, NULL, NULL, NULL, NULL),
(96, 'estefania.weber', '$2y$10$jA2Kja3bGFKMiO91DNF33uKLZjfiq81YQTmiPVy8OX6Q4kcFswSw2', 'luciano96@kshlerin.com', '273 Peyton Squares', '1998-02-09', '605242006', 'usuario.png', 2, NULL, NULL, NULL, NULL, NULL, NULL),
(97, 'dewitt20', '$2y$10$jPodhR/3gHrrxaDm6Y503.dOH4DYCXcKqkO2ZbUXFbanxIQZdXD6G', 'gilberto69@hotmail.com', '28492 Evalyn Cape', '1973-03-16', '680608554', 'usuario.png', 2, NULL, NULL, NULL, NULL, NULL, NULL),
(98, 'jeremie61', '$2y$10$wC0pIdoK7IEDQx8yghsveObBmYkpYyept2e9UMAT4ZzuBANVQCso6', 'retha04@rath.com', '57361 Zemlak Stravenue', '2013-05-12', '696845752', 'usuario.png', 2, NULL, NULL, NULL, NULL, NULL, NULL),
(99, 'rita.oreilly', '$2y$10$DYOZif8gfmLfDntuEcDWYeO8Vvt4ifkyyWLswEk99BNySf/6mykN6', 'dagmar22@nienow.com', '93007 Dayne Drives Apt. 527', '2011-08-26', '611276659', 'usuario.png', 2, NULL, NULL, NULL, NULL, NULL, NULL),
(100, 'cyril89', '$2y$10$Axgq0X1nWvivA24uVTvWGOSP1y9pmlfSY0Fr5jRYquuiVnxJUkd6W', 'carolina.dare@funk.net', '1688 Kayli Trafficway', '1973-01-07', '653091842', 'usuario.png', 2, NULL, NULL, NULL, NULL, NULL, NULL),
(101, 'tokuneva', '$2y$10$0o1r0Eq3arl0pifAs1RoT.13znKAQpeTlWMqtTIJwdamcj4aVLf8e', 'clemens.sawayn@hotmail.com', '24352 Bechtelar Expressway', '1976-10-22', '699449443', 'usuario.png', 2, NULL, NULL, NULL, NULL, NULL, NULL),
(102, 'lklocko', '$2y$10$mkv0FLd0VMtE6bO9ERO28e.fIQdRXAmdU9IE1wgWNrdc6MQkLdHcO', 'ima77@hamill.org', '92028 Waldo Fork Apt. 704', '1998-11-18', '637849331', 'usuario.png', 2, NULL, NULL, NULL, NULL, NULL, NULL),
(103, 'theodora.schiller', '$2y$10$PMD0JivWyai/vcSyaNRNKOKXOStSfnqCeaEJ/iF1Xb114gP99m7aS', 'tate.schmidt@hotmail.com', '4839 Huel Lake', '2016-10-03', '616225941', 'usuario.png', 2, NULL, NULL, NULL, NULL, NULL, NULL),
(104, 'jenkins.savanah', '$2y$10$kZjI55LXlmdaJdJcr88r3OZWUmurmAb89cIzZvExx9Z8ob/G6ZzIK', 'lucy52@gmail.com', '7987 Jeanette Burg', '2004-04-21', '641327882', 'usuario.png', 2, NULL, NULL, NULL, NULL, NULL, NULL),
(105, 'daniel.greg', '$2y$10$O.XSBjYb120401lepp6VSenGilFNgfi812H3Q3pZ6w2VZM6FF2Mp2', 'rmcclure@hotmail.com', '60592 Willms Underpass', '1983-05-07', '684163175', 'usuario.png', 2, NULL, NULL, NULL, NULL, NULL, NULL),
(106, 'bjacobson', '$2y$10$p9WwfI/N5ZUI.NBJjwA/ZObI881o94W6/h3GWlbxl69nDRnJOCeeC', 'jose30@hotmail.com', '5390 Chandler Turnpike Suite 824', '1991-04-28', '649550280', 'usuario.png', 2, NULL, NULL, NULL, NULL, NULL, NULL),
(107, 'lhowell', '$2y$10$bfYKau2lhu4/fKshING6Zepy90FHGTjWr.Un/8dZrKsUeQ0RqFwe.', 'gay49@schulist.com', '43034 Ruecker Canyon Suite 832', '1976-04-15', '646694881', 'usuario.png', 2, NULL, NULL, NULL, NULL, NULL, NULL),
(108, 'bernhard.lauryn', '$2y$10$s/uMcTTN0OhaH64egQ83OO0ztChWrIITqgV7x2cHwvnq1JM9Zvbxy', 'mayra.stark@hotmail.com', '79670 Bernardo Shoal Apt. 940', '1986-01-23', '691362494', 'usuario.png', 2, NULL, NULL, NULL, NULL, NULL, NULL),
(109, 'kay21', '$2y$10$2iEjV4/ogydXENINePaChu/6o3bUq2VphzsEXdroZ/S25wLf68gIq', 'dpollich@hotmail.com', '946 Susanna Plaza', '1976-12-19', '686435385', 'usuario.png', 2, NULL, NULL, NULL, NULL, NULL, NULL),
(110, 'chauck', '$2y$10$FIt6RRsMuy2KyUpBI6JQYe417JoPkI5G/U0MpL9P8ROi2QMpbd5L.', 'gzulauf@hotmail.com', '84052 Ortiz Drives', '1992-10-02', '664262555', 'usuario.png', 2, NULL, NULL, NULL, NULL, NULL, NULL),
(111, 'eichmann.marcelle', '$2y$10$ZHIc.3UjCVTgSdIwIkbjr.cGrexDaHYYm0omMge1DZvigrc/Xkdwi', 'pollich.kailey@nitzsche.info', '18745 Fleta Plains Suite 249', '1996-08-10', '639143793', 'usuario.png', 2, NULL, NULL, NULL, NULL, NULL, NULL),
(112, 'jerrold39', '$2y$10$Q6WhS0/5tum3EAi6am4kFuUg4Y/ujKIbV.GbptKkfLXQxUpk1PTNG', 'gulgowski.laurine@schmitt.com', '577 Leffler Crossroad Suite 559', '1994-06-09', '665951250', 'usuario.png', 2, NULL, NULL, NULL, NULL, NULL, NULL),
(113, 'pedro', '$2y$10$2I6FlEHlDPGoKXPYuI6Fi.cYJBh1Lnri..SE0VzOya4vBwPlTQwMu', 'pedroj130798@gmail.com', 'asdf', '2020-06-13', '12345678', 'usuario.png', 2, NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `criticas`
--
ALTER TABLE `criticas`
  ADD CONSTRAINT `criticas_id_restaurante_foreign` FOREIGN KEY (`id_restaurante`) REFERENCES `restaurantes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `criticas_id_usuario_foreign` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `facturas_clientes`
--
ALTER TABLE `facturas_clientes`
  ADD CONSTRAINT `facturas_clientes_id_cliente_foreign` FOREIGN KEY (`id_cliente`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `facturas_clientes_id_empleado_foreign` FOREIGN KEY (`id_empleado`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `facturas_clientes_id_restaurante_foreign` FOREIGN KEY (`id_restaurante`) REFERENCES `restaurantes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `facturas_proveedores`
--
ALTER TABLE `facturas_proveedores`
  ADD CONSTRAINT `facturas_proveedores_id_empleado_foreign` FOREIGN KEY (`id_empleado`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `facturas_proveedores_id_proveedor_foreign` FOREIGN KEY (`id_proveedor`) REFERENCES `proveedores` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `ingredientes_facturas`
--
ALTER TABLE `ingredientes_facturas`
  ADD CONSTRAINT `ingredientes_facturas_id_factura_foreign` FOREIGN KEY (`id_factura`) REFERENCES `facturas_proveedores` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ingredientes_facturas_id_ingrediente_foreign` FOREIGN KEY (`id_ingrediente`) REFERENCES `ingredientes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `ingredientes_platos`
--
ALTER TABLE `ingredientes_platos`
  ADD CONSTRAINT `ingredientes_platos_id_ingrediente_foreign` FOREIGN KEY (`id_ingrediente`) REFERENCES `ingredientes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ingredientes_platos_id_plato_foreign` FOREIGN KEY (`id_plato`) REFERENCES `platos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `ingredientes_proveedores`
--
ALTER TABLE `ingredientes_proveedores`
  ADD CONSTRAINT `ingredientes_proveedores_id_ingrediente_foreign` FOREIGN KEY (`id_ingrediente`) REFERENCES `ingredientes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ingredientes_proveedores_id_proveedor_foreign` FOREIGN KEY (`id_proveedor`) REFERENCES `proveedores` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `ingredientes_restaurantes`
--
ALTER TABLE `ingredientes_restaurantes`
  ADD CONSTRAINT `ingredientes_restaurantes_id_ingrediente_foreign` FOREIGN KEY (`id_ingrediente`) REFERENCES `ingredientes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ingredientes_restaurantes_id_restaurante_foreign` FOREIGN KEY (`id_restaurante`) REFERENCES `restaurantes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `menu_platos`
--
ALTER TABLE `menu_platos`
  ADD CONSTRAINT `menu_platos_id_menu_foreign` FOREIGN KEY (`id_menu`) REFERENCES `menus` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `menu_platos_id_plato_foreign` FOREIGN KEY (`id_plato`) REFERENCES `platos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `mesas`
--
ALTER TABLE `mesas`
  ADD CONSTRAINT `mesas_id_restaurante_foreign` FOREIGN KEY (`id_restaurante`) REFERENCES `restaurantes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedidos_id_cliente_foreign` FOREIGN KEY (`id_cliente`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pedidos_id_factura_foreign` FOREIGN KEY (`id_factura`) REFERENCES `facturas_clientes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pedidos_id_restaurante_foreign` FOREIGN KEY (`id_restaurante`) REFERENCES `restaurantes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `platos`
--
ALTER TABLE `platos`
  ADD CONSTRAINT `platos_id_categoria_foreign` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `platos_facturas`
--
ALTER TABLE `platos_facturas`
  ADD CONSTRAINT `platos_facturas_id_factura_foreign` FOREIGN KEY (`id_factura`) REFERENCES `facturas_clientes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `platos_facturas_id_plato_foreign` FOREIGN KEY (`id_plato`) REFERENCES `platos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `quejas`
--
ALTER TABLE `quejas`
  ADD CONSTRAINT `quejas_id_restaurante_foreign` FOREIGN KEY (`id_restaurante`) REFERENCES `restaurantes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `quejas_id_usuario_foreign` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD CONSTRAINT `reservas_id_cliente_foreign` FOREIGN KEY (`id_cliente`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reservas_id_mesa_foreign` FOREIGN KEY (`id_mesa`) REFERENCES `mesas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `restaurantes`
--
ALTER TABLE `restaurantes`
  ADD CONSTRAINT `restaurantes_id_menu_foreign` FOREIGN KEY (`id_menu`) REFERENCES `menus` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_id_restaurante_foreign` FOREIGN KEY (`id_restaurante`) REFERENCES `restaurantes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usuarios_id_role_foreign` FOREIGN KEY (`id_role`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
