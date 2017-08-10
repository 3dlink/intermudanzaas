-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 11-05-2017 a las 16:05:22
-- Versión del servidor: 5.6.33-cll-lve
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dlinkcom_intermudanzas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `boxes`
--

CREATE TABLE `boxes` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `unit` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tooltip` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `vmin` int(11) NOT NULL,
  `vmax` int(11) NOT NULL,
  `factor` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `boxes`
--

INSERT INTO `boxes` (`id`, `name`, `unit`, `tooltip`, `description`, `vmin`, `vmax`, `factor`, `created_at`, `updated_at`) VALUES
(2, 'Adornos', 'pzas', 'Caja de adornos', 'Muchas cosas pequeñas dentro', 1, 20, 0.12, '2017-04-06 01:21:36', '2017-04-06 01:21:36'),
(3, 'Arte', 'pzas', 'Arte valorado', 'Cualquier cosa de arte', 1, 15, 0.12, '2017-04-06 01:22:58', '2017-04-06 01:22:58'),
(4, 'Lenceria', 'pzas', 'Telas', 'Cualquier cosa con telas no frágil', 1, 20, 0.12, '2017-04-06 01:24:18', '2017-04-06 01:24:18');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contains`
--

CREATE TABLE `contains` (
  `room_id` int(11) NOT NULL,
  `contained_id` int(11) NOT NULL,
  `contained_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `contains`
--

INSERT INTO `contains` (`room_id`, `contained_id`, `contained_type`) VALUES
(1, 11, 'App\\Models\\Object'),
(5, 11, 'App\\Models\\Object'),
(6, 11, 'App\\Models\\Object'),
(7, 11, 'App\\Models\\Object'),
(3, 12, 'App\\Models\\Object'),
(4, 12, 'App\\Models\\Object'),
(9, 12, 'App\\Models\\Object'),
(2, 2, 'App\\Models\\Box'),
(3, 2, 'App\\Models\\Box'),
(4, 2, 'App\\Models\\Box'),
(8, 2, 'App\\Models\\Box'),
(3, 3, 'App\\Models\\Box'),
(4, 3, 'App\\Models\\Box'),
(9, 3, 'App\\Models\\Box'),
(1, 9, 'App\\Models\\Object'),
(3, 9, 'App\\Models\\Object'),
(5, 9, 'App\\Models\\Object'),
(6, 9, 'App\\Models\\Object'),
(7, 9, 'App\\Models\\Object'),
(9, 9, 'App\\Models\\Object'),
(1, 8, 'App\\Models\\Object'),
(3, 8, 'App\\Models\\Object'),
(4, 8, 'App\\Models\\Object'),
(5, 8, 'App\\Models\\Object'),
(6, 8, 'App\\Models\\Object'),
(7, 8, 'App\\Models\\Object'),
(9, 8, 'App\\Models\\Object'),
(3, 7, 'App\\Models\\Object'),
(4, 7, 'App\\Models\\Object'),
(9, 7, 'App\\Models\\Object'),
(1, 13, 'App\\Models\\Object'),
(3, 13, 'App\\Models\\Object'),
(5, 13, 'App\\Models\\Object'),
(7, 13, 'App\\Models\\Object'),
(2, 14, 'App\\Models\\Object'),
(6, 14, 'App\\Models\\Object'),
(1, 15, 'App\\Models\\Object'),
(3, 15, 'App\\Models\\Object'),
(1, 4, 'App\\Models\\Box'),
(2, 4, 'App\\Models\\Box'),
(3, 4, 'App\\Models\\Box'),
(4, 4, 'App\\Models\\Box'),
(6, 4, 'App\\Models\\Box'),
(7, 4, 'App\\Models\\Box'),
(8, 4, 'App\\Models\\Box'),
(1, 10, 'App\\Models\\Object'),
(3, 10, 'App\\Models\\Object'),
(5, 10, 'App\\Models\\Object'),
(6, 10, 'App\\Models\\Object'),
(7, 10, 'App\\Models\\Object'),
(9, 10, 'App\\Models\\Object'),
(1, 16, 'App\\Models\\Object'),
(3, 16, 'App\\Models\\Object'),
(4, 16, 'App\\Models\\Object'),
(5, 16, 'App\\Models\\Object'),
(6, 16, 'App\\Models\\Object'),
(7, 16, 'App\\Models\\Object'),
(9, 16, 'App\\Models\\Object'),
(3, 17, 'App\\Models\\Object'),
(4, 17, 'App\\Models\\Object'),
(6, 18, 'App\\Models\\Object'),
(7, 18, 'App\\Models\\Object'),
(8, 18, 'App\\Models\\Object'),
(1, 19, 'App\\Models\\Object'),
(6, 19, 'App\\Models\\Object'),
(7, 19, 'App\\Models\\Object'),
(8, 19, 'App\\Models\\Object'),
(1, 20, 'App\\Models\\Object'),
(6, 20, 'App\\Models\\Object'),
(7, 20, 'App\\Models\\Object'),
(1, 21, 'App\\Models\\Object'),
(3, 21, 'App\\Models\\Object'),
(5, 21, 'App\\Models\\Object'),
(6, 21, 'App\\Models\\Object'),
(1, 22, 'App\\Models\\Object'),
(3, 22, 'App\\Models\\Object'),
(5, 22, 'App\\Models\\Object'),
(1, 23, 'App\\Models\\Object'),
(3, 23, 'App\\Models\\Object'),
(5, 23, 'App\\Models\\Object'),
(7, 23, 'App\\Models\\Object'),
(3, 24, 'App\\Models\\Object'),
(1, 5, 'App\\Models\\Object'),
(2, 5, 'App\\Models\\Object'),
(3, 5, 'App\\Models\\Object'),
(4, 5, 'App\\Models\\Object'),
(5, 5, 'App\\Models\\Object'),
(6, 5, 'App\\Models\\Object'),
(7, 5, 'App\\Models\\Object'),
(8, 5, 'App\\Models\\Object'),
(9, 5, 'App\\Models\\Object'),
(2, 25, 'App\\Models\\Object'),
(4, 25, 'App\\Models\\Object'),
(1, 26, 'App\\Models\\Object'),
(3, 26, 'App\\Models\\Object'),
(5, 26, 'App\\Models\\Object'),
(6, 26, 'App\\Models\\Object'),
(7, 26, 'App\\Models\\Object'),
(1, 27, 'App\\Models\\Object'),
(6, 27, 'App\\Models\\Object'),
(7, 27, 'App\\Models\\Object'),
(8, 27, 'App\\Models\\Object'),
(1, 28, 'App\\Models\\Object'),
(3, 28, 'App\\Models\\Object'),
(4, 28, 'App\\Models\\Object'),
(6, 28, 'App\\Models\\Object'),
(7, 28, 'App\\Models\\Object'),
(9, 28, 'App\\Models\\Object'),
(3, 29, 'App\\Models\\Object'),
(3, 29, 'App\\Models\\Object'),
(3, 30, 'App\\Models\\Object'),
(3, 31, 'App\\Models\\Object'),
(3, 32, 'App\\Models\\Object'),
(9, 32, 'App\\Models\\Object'),
(2, 33, 'App\\Models\\Object'),
(4, 33, 'App\\Models\\Object'),
(5, 33, 'App\\Models\\Object'),
(2, 34, 'App\\Models\\Object'),
(4, 34, 'App\\Models\\Object'),
(2, 35, 'App\\Models\\Object'),
(4, 35, 'App\\Models\\Object'),
(2, 37, 'App\\Models\\Object'),
(1, 38, 'App\\Models\\Object'),
(6, 38, 'App\\Models\\Object'),
(7, 38, 'App\\Models\\Object'),
(1, 39, 'App\\Models\\Object'),
(3, 39, 'App\\Models\\Object'),
(7, 39, 'App\\Models\\Object'),
(8, 40, 'App\\Models\\Object'),
(8, 41, 'App\\Models\\Object'),
(8, 42, 'App\\Models\\Object'),
(1, 6, 'App\\Models\\Object'),
(5, 6, 'App\\Models\\Object'),
(6, 6, 'App\\Models\\Object'),
(7, 6, 'App\\Models\\Object'),
(8, 6, 'App\\Models\\Object'),
(6, 43, 'App\\Models\\Object'),
(7, 43, 'App\\Models\\Object'),
(6, 44, 'App\\Models\\Object'),
(7, 44, 'App\\Models\\Object'),
(6, 45, 'App\\Models\\Object'),
(7, 45, 'App\\Models\\Object'),
(1, 46, 'App\\Models\\Object'),
(5, 46, 'App\\Models\\Object'),
(5, 47, 'App\\Models\\Object'),
(5, 48, 'App\\Models\\Object'),
(8, 48, 'App\\Models\\Object'),
(5, 49, 'App\\Models\\Object'),
(8, 49, 'App\\Models\\Object'),
(5, 50, 'App\\Models\\Object'),
(8, 50, 'App\\Models\\Object'),
(5, 51, 'App\\Models\\Object'),
(8, 51, 'App\\Models\\Object'),
(4, 52, 'App\\Models\\Object'),
(4, 53, 'App\\Models\\Object'),
(1, 54, 'App\\Models\\Object'),
(5, 54, 'App\\Models\\Object'),
(6, 54, 'App\\Models\\Object'),
(7, 54, 'App\\Models\\Object'),
(1, 55, 'App\\Models\\Object'),
(6, 55, 'App\\Models\\Object'),
(7, 55, 'App\\Models\\Object'),
(8, 55, 'App\\Models\\Object'),
(1, 56, 'App\\Models\\Object'),
(6, 56, 'App\\Models\\Object'),
(7, 56, 'App\\Models\\Object'),
(8, 56, 'App\\Models\\Object'),
(2, 57, 'App\\Models\\Object'),
(8, 57, 'App\\Models\\Object'),
(2, 58, 'App\\Models\\Object'),
(8, 58, 'App\\Models\\Object'),
(2, 59, 'App\\Models\\Object'),
(8, 59, 'App\\Models\\Object'),
(2, 60, 'App\\Models\\Object'),
(8, 60, 'App\\Models\\Object'),
(2, 61, 'App\\Models\\Object'),
(8, 61, 'App\\Models\\Object'),
(2, 62, 'App\\Models\\Object'),
(8, 62, 'App\\Models\\Object'),
(2, 64, 'App\\Models\\Object'),
(8, 64, 'App\\Models\\Object'),
(2, 63, 'App\\Models\\Object'),
(8, 63, 'App\\Models\\Object'),
(2, 65, 'App\\Models\\Object'),
(8, 65, 'App\\Models\\Object'),
(2, 66, 'App\\Models\\Object'),
(8, 66, 'App\\Models\\Object'),
(2, 67, 'App\\Models\\Object'),
(8, 67, 'App\\Models\\Object'),
(2, 68, 'App\\Models\\Object'),
(8, 68, 'App\\Models\\Object'),
(2, 69, 'App\\Models\\Object'),
(8, 69, 'App\\Models\\Object'),
(2, 70, 'App\\Models\\Object'),
(8, 70, 'App\\Models\\Object'),
(2, 71, 'App\\Models\\Object'),
(8, 71, 'App\\Models\\Object'),
(2, 72, 'App\\Models\\Object'),
(8, 72, 'App\\Models\\Object'),
(2, 73, 'App\\Models\\Object'),
(8, 73, 'App\\Models\\Object'),
(2, 74, 'App\\Models\\Object'),
(8, 74, 'App\\Models\\Object'),
(1, 76, 'App\\Models\\Object'),
(7, 76, 'App\\Models\\Object'),
(8, 76, 'App\\Models\\Object'),
(3, 75, 'App\\Models\\Object'),
(5, 75, 'App\\Models\\Object'),
(8, 75, 'App\\Models\\Object'),
(9, 75, 'App\\Models\\Object'),
(1, 77, 'App\\Models\\Object'),
(5, 77, 'App\\Models\\Object'),
(7, 77, 'App\\Models\\Object'),
(8, 77, 'App\\Models\\Object'),
(2, 78, 'App\\Models\\Object'),
(8, 78, 'App\\Models\\Object'),
(2, 79, 'App\\Models\\Object'),
(8, 79, 'App\\Models\\Object'),
(2, 80, 'App\\Models\\Object'),
(8, 80, 'App\\Models\\Object'),
(2, 81, 'App\\Models\\Object'),
(8, 81, 'App\\Models\\Object'),
(2, 82, 'App\\Models\\Object'),
(8, 82, 'App\\Models\\Object'),
(2, 83, 'App\\Models\\Object'),
(8, 83, 'App\\Models\\Object'),
(1, 84, 'App\\Models\\Object'),
(6, 84, 'App\\Models\\Object'),
(7, 84, 'App\\Models\\Object'),
(8, 84, 'App\\Models\\Object'),
(1, 85, 'App\\Models\\Object'),
(6, 85, 'App\\Models\\Object'),
(7, 85, 'App\\Models\\Object'),
(4, 36, 'App\\Models\\Object'),
(4, 86, 'App\\Models\\Object');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especiales`
--

CREATE TABLE `especiales` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `img_orig_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `estimacion_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `especiales`
--

INSERT INTO `especiales` (`id`, `name`, `description`, `img_orig_name`, `image`, `estimacion_id`, `created_at`, `updated_at`) VALUES
(100, 'Montacarga', 'es una maquina', 'almacenaje.png', '/images/19/especiales/img_489_1_PIA.png', 489, '2017-04-13 03:40:59', '2017-04-13 03:40:59'),
(101, 'caja de sorpresa', 'caja 1', 'almacenamiento 2.png', '/images/19/especiales/img_489_2_ORW.png', 489, '2017-04-13 03:40:59', '2017-04-13 03:40:59'),
(102, 'Kayak', 'es de fibra de vidrio muho cuidado', 'estado de serviocios.PNG', '/images/20/especiales/img_493_1_P0H.PNG', 493, '2017-04-22 01:25:29', '2017-04-22 01:25:29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados`
--

CREATE TABLE `estados` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lt_color` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bg_color` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `estados`
--

INSERT INTO `estados` (`id`, `name`, `descripcion`, `lt_color`, `bg_color`, `created_at`, `updated_at`) VALUES
(0, '', 'NO ESTA ESPECIFICADO', '', '', '2017-04-03 04:00:00', '2017-04-03 04:00:00'),
(1, 'Contacto', 'cuando se crea un cliente desde la web (formulario) o creandolo manualmente.', 'black', '#5292f9', '2017-04-03 04:00:00', '2017-04-03 04:00:00'),
(2, 'Estimación', 'cuando se activa un cliente (se envia el correo y cuando el cliente entra en la app por primera vez se cambia de estado 1 a 2 esa primera estimacion base que se creo automaticamente); cuando un cliente ya registrado crea una nueva estimacion', 'black', '#e3ff2d', '2017-04-03 04:00:00', '2017-04-03 04:00:00'),
(3, 'Analizando costos', 'el cliente guarda la estimación y se deshabilita el editar, solo los administradores de intermudanzas pueden echar para atras el proceso a estimacion de nuevo', 'black', '#f9bc93', '2017-04-03 04:00:00', '2017-04-03 04:00:00'),
(4, 'Cotizado', 'el cliente analiza el costo de la mudanza y si devuelven la cotización se puede habilitar de nuevo para llegar al estado 2, y reestime. esto desde el personal de intermudanzas.', 'white', '#f76c0e', '2017-04-03 04:00:00', '2017-04-03 04:00:00'),
(5, 'Aprobado', 'una vez que el cliente esta satisfecho con el presupuesto, pasa a este estado, y se deshabilita la posibilidad de reestimación.', 'white', '#3abf35', '2017-04-03 04:00:00', '2017-04-03 04:00:00'),
(6, 'Stand by', 'cliente que pide tiempo para pagar o para ordenar sus cosas, entonces puede estar habilitado el recotizar (cambio al estado 2).', 'white', '#50505b', '2017-04-03 04:00:00', '2017-04-03 04:00:00'),
(7, 'Rechazado', 'estado que puede quedar inactiva la cotización.', 'white', '#c90000', '2017-04-03 04:00:00', '2017-04-03 04:00:00'),
(8, 'Orden de trabajo', ' se le dió el go al equipo de trabajo para buscar las cosas en la casa.', 'white', '#d10202', '2017-04-03 04:00:00', '2017-04-03 04:00:00'),
(9, 'Empacando', 'el equipo de trabajo se encuentra en el sitio trabajando a empaquetar lo estimado.', 'black', '#bfbdbd', '2017-04-03 04:00:00', '2017-04-03 04:00:00'),
(10, 'Cargando', 'ya está empacada, ahora movilizan las cajas y/o objetos al camión.', 'white', '#b7389c', '2017-04-03 04:00:00', '2017-04-03 04:00:00'),
(11, 'En ruta', 'el camión partió a su destino proximo. ', 'black', '#91ff9f', '2017-04-03 04:00:00', '2017-04-03 04:00:00'),
(12, 'Aduana', 'estado de la exportación, trámites, revisiones, etc.', 'white', 'black', '2017-04-03 04:00:00', '2017-04-03 04:00:00'),
(13, 'En ruta destino', 'ya el camión esta en la ruta que conecta el destino final.', 'white', '#009b13', '2017-04-03 04:00:00', '2017-04-03 04:00:00'),
(14, 'Entrega', 'el camión ha llegado al destino de entrega, para recibido.', 'white', '#398eb2', '2017-04-03 04:00:00', '2017-04-03 04:00:00'),
(15, 'Desembalando', 'los objetos estan dentro del destino y estan en proceso de desembalaje.', 'black', '#ff93be', '2017-04-03 04:00:00', '2017-04-03 04:00:00'),
(16, 'Control de calidad', 'revisando que todo este en orden y en buen estado, para que el cliente quede satisfecho con el servicio', 'white', '#ff5d00', '2017-04-03 04:00:00', '2017-04-03 04:00:00'),
(17, 'Cierre del servicio', '', 'black', '#00ddff', '2017-04-03 04:00:00', '2017-04-03 04:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estimaciones`
--

CREATE TABLE `estimaciones` (
  `id` int(10) UNSIGNED NOT NULL,
  `cliente` int(11) NOT NULL,
  `fecha_estimada` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tipo_mudanza` int(11) DEFAULT NULL,
  `alcance` int(11) DEFAULT NULL,
  `comentario` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telf_origen` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telf_destino` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `p_origen` int(11) DEFAULT NULL,
  `p_destino` int(11) DEFAULT NULL,
  `c_destino` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `c_origen` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dir_origen` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dir_destino` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `estado` int(11) NOT NULL,
  `cambio` tinyint(1) NOT NULL,
  `mtrs3` double DEFAULT NULL,
  `valor_total` double DEFAULT NULL,
  `moneda` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `a_cargo` int(11) NOT NULL,
  `logistica` int(11) NOT NULL,
  `archivo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `estimaciones`
--

INSERT INTO `estimaciones` (`id`, `cliente`, `fecha_estimada`, `tipo_mudanza`, `alcance`, `comentario`, `telf_origen`, `telf_destino`, `p_origen`, `p_destino`, `c_destino`, `c_origen`, `dir_origen`, `dir_destino`, `estado`, `cambio`, `mtrs3`, `valor_total`, `moneda`, `a_cargo`, `logistica`, `archivo`, `created_at`, `updated_at`) VALUES
(489, 19, 'mediados de abril', 1, 1, 'Este es tremendo cliente', '04129986725', '4129986725', 1, 1, 'los ruices', 'Chacao', 'aaaaaa', 'bbbbbb', 10, 0, NULL, NULL, 'VEF', 20, 16, '/home/dlinkcom/public_html/intermudanzas/public/uploads/cotizacion_YWW42_489.pdf', '2017-04-06 01:47:26', '2017-04-18 02:19:23'),
(491, 21, '', 0, 0, '', '', '', 0, 0, '', '', NULL, NULL, 2, 0, NULL, NULL, 'VEF', 20, 0, NULL, '2017-04-17 23:28:57', '2017-04-22 00:08:15'),
(493, 23, 'agosto 2017', 3, 2, 'Enviar informacion por ahora, solo brochure', '5555555', '555555', 1, 3, 'quito', 'caraas', 'fgghgh  ghfghfhfghg', 'fdfdfdfdd dfdfdfff\r\nf\r\nf\r\nf\r\nfffffffff', 4, 0, NULL, NULL, 'COP', 20, 0, '/home/dlinkcom/public_html/intermudanzas/public/uploads/cotizacion_UHDOS_493.pdf', '2017-04-21 23:38:12', '2017-04-22 01:32:06'),
(494, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 0, NULL, NULL, NULL, 0, 0, NULL, '2017-04-22 02:03:16', '2017-04-22 02:03:16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fotos`
--

CREATE TABLE `fotos` (
  `id` int(10) UNSIGNED NOT NULL,
  `img_orig_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `estimacion_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2015_05_15_124334_update_users_table', 1),
('2015_10_21_173121_create_users_roles', 1),
('2015_11_02_004932_create_profiles_table', 1),
('2015_12_25_010553_add_signup_ip_address_to_users_table', 1),
('2015_12_25_011117_add_signup_confirmation_ip_address_to_users_table', 1),
('2015_12_25_025231_add_signup_sm_ip_address_to_users_table', 1),
('2016_04_19_045644_add_signup_admin_ip_address_to_users_table', 1),
('2016_09_01_202529_add_user_profile_bg_to_user_profiles_table', 1),
('2017_03_15_131540_create_rooms_table', 2),
('2017_03_15_131928_create_objects_table', 2),
('2017_03_15_135926_create_boxes_table', 2),
('2017_03_15_141825_create_contains_table', 2),
('2017_03_21_140026_create_estimaciones_table', 3),
('2017_03_21_151555_create_mudanza_table', 4),
('2017_03_21_192213_create_pais_table', 5),
('2017_03_21_221913_create_especiales_table', 6),
('2017_03_22_175757_create_fotos_table', 7),
('2017_04_03_200044_CreateEstadosTable', 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mudanza`
--

CREATE TABLE `mudanza` (
  `estimacion_id` int(11) NOT NULL,
  `contained_id` int(11) NOT NULL,
  `contained_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cantidad` int(11) NOT NULL,
  `room_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `mudanza`
--

INSERT INTO `mudanza` (`estimacion_id`, `contained_id`, `contained_type`, `cantidad`, `room_id`) VALUES
(489, 11, 'App\\Models\\Object', 1, 1),
(489, 9, 'App\\Models\\Object', 1, 1),
(489, 13, 'App\\Models\\Object', 1, 1),
(489, 4, 'App\\Models\\Box', 1, 1),
(489, 14, 'App\\Models\\Object', 1, 2),
(489, 5, 'App\\Models\\Object', 1, 2),
(489, 25, 'App\\Models\\Object', 1, 2),
(489, 37, 'App\\Models\\Object', 2, 2),
(489, 57, 'App\\Models\\Object', 2, 2),
(489, 60, 'App\\Models\\Object', 2, 2),
(489, 82, 'App\\Models\\Object', 2, 2),
(489, 2, 'App\\Models\\Box', 6, 2),
(489, 4, 'App\\Models\\Box', 1, 2),
(489, 15, 'App\\Models\\Object', 2, 3),
(489, 3, 'App\\Models\\Box', 4, 3),
(489, 12, 'App\\Models\\Object', 1, 4),
(489, 55, 'App\\Models\\Object', 3, 8),
(493, 11, 'App\\Models\\Object', 3, 1),
(493, 9, 'App\\Models\\Object', 3, 1),
(493, 6, 'App\\Models\\Object', 2, 1),
(493, 14, 'App\\Models\\Object', 1, 2),
(493, 5, 'App\\Models\\Object', 4, 2),
(493, 25, 'App\\Models\\Object', 6, 2),
(493, 34, 'App\\Models\\Object', 1, 2),
(493, 2, 'App\\Models\\Box', 1, 2),
(493, 4, 'App\\Models\\Box', 5, 2),
(493, 7, 'App\\Models\\Object', 1, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `objects`
--

CREATE TABLE `objects` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `unit` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tooltip` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `vmin` int(11) NOT NULL,
  `vmax` int(11) NOT NULL,
  `factor` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `objects`
--

INSERT INTO `objects` (`id`, `name`, `unit`, `tooltip`, `description`, `vmin`, `vmax`, `factor`, `created_at`, `updated_at`) VALUES
(5, 'Silla sencilla', 'pzas', 'Silla de una persona standard', 'Silla multiuso', 1, 20, 0.101, '2017-04-06 00:59:54', '2017-04-13 00:01:36'),
(6, 'Puff', 'pzas', 'Cojín cómodo irregular', 'Lo más cómodo que existe en una casa para recostarse o hacer una siesta corta', 1, 8, 0.1, '2017-04-06 01:02:06', '2017-04-13 01:02:45'),
(7, 'Cuadro grande', 'plg', 'Cuadros más grande de la casa', 'Normalmente están en salas y espacios grandes', 1, 5, 0.33, '2017-04-06 01:06:42', '2017-04-12 21:35:17'),
(8, 'Cuadro mediano', 'plg', 'Cuadros decorativos en áreas comunes', 'Cuadros más pequeños que los principales', 1, 5, 0.19, '2017-04-06 01:08:34', '2017-04-12 21:34:10'),
(9, 'Cuadro chico', 'plg', 'Cuadros sencillos', 'Cuadros colocados en los espacios más pequeños de la casa', 1, 10, 0.15, '2017-04-06 01:09:57', '2017-04-12 21:30:11'),
(10, 'Alfombra chica ', 'm2', 'Alfombra de 1 a 2 m2 ', 'No es alfombra completa, solo es decorativa', 1, 10, 0.036, '2017-04-06 01:12:35', '2017-04-12 23:22:43'),
(11, 'Espejo', 'm2', 'Espejo sencillo', 'Está para ayuda en los cuartos', 1, 8, 0.09, '2017-04-06 01:15:12', '2017-04-06 01:15:12'),
(12, 'Espejo decorativo', 'm2', 'Espejo grande', 'Puede estar en sitios estratégicos de decoración', 1, 5, 0.12, '2017-04-06 01:16:15', '2017-04-06 01:16:15'),
(13, 'TV led mediano', 'plg', 'TV de 40 a 43 pulgadas', 'TV más común en áreas de habitaciones', 1, 8, 0.105, '2017-04-12 21:39:17', '2017-04-12 21:39:17'),
(14, 'TV led chico', 'plg', 'TV de 26 a 32 pulgadas', 'TV para áreas pequeñas en la casa', 1, 8, 0.075, '2017-04-12 21:40:44', '2017-04-12 21:40:44'),
(15, 'TV led grande', 'plg', 'TV de 47 a 55 pulgadas', 'TV muy grande para áreas de entretenimiento y compartir', 1, 8, 0.115, '2017-04-12 21:43:04', '2017-04-12 21:43:04'),
(16, 'Alfombra mediana', 'm2', 'Alfombra de 2 a 3 m2 ', 'Alfombra mediana', 1, 10, 0.09, '2017-04-12 23:24:49', '2017-04-12 23:24:49'),
(17, ' Alfombra grande', 'm2', 'Alfombra de 4m2 aprox.', 'Alfombra grande ', 1, 6, 0.15, '2017-04-12 23:26:25', '2017-04-12 23:26:25'),
(18, 'Cama individual', 'm3', 'Cama para 1 persona', 'Individual', 1, 6, 1, '2017-04-12 23:28:49', '2017-04-12 23:28:49'),
(19, 'Cama matrimonial', 'm3', 'Cama de 2 personas', 'Clásicas camas matrimoniales o queen', 1, 6, 1.6, '2017-04-12 23:34:13', '2017-04-12 23:34:13'),
(20, 'Cama king size', 'm3', 'Cama tipo king ', 'Cama gigante', 1, 5, 2, '2017-04-12 23:35:29', '2017-04-12 23:35:29'),
(21, 'Sofá individual', 'pzas', 'Sofá de 1 persona', 'Sofá sencillo', 1, 5, 1, '2017-04-12 23:37:50', '2017-04-12 23:37:50'),
(22, 'Sofá doble', 'pzas', 'Sofá de 2 personas', 'Doble', 1, 5, 2, '2017-04-12 23:39:00', '2017-04-12 23:39:00'),
(23, 'Sofá tres puestos', 'pzas', 'Sofá de 3 personas aprox.', 'Sofá puede ser sofá cama', 1, 5, 3, '2017-04-12 23:40:47', '2017-04-12 23:40:47'),
(24, 'Sofá tipo L', 'pzas', 'Sofá de 4 a 5 personas', 'Sofá tipo L convertible', 1, 3, 5, '2017-04-12 23:42:26', '2017-04-12 23:42:26'),
(25, 'Silla comedor', 'pzas', 'Silla de 1 persona en comedor', 'Sillas de comedor', 1, 12, 0.63, '2017-04-13 00:03:00', '2017-04-13 00:03:00'),
(26, 'Silla isabelina ', 'pzas', 'Silla poltrona', 'Silla isabelina tipo poltrona', 1, 10, 0.343, '2017-04-13 00:04:35', '2017-04-13 00:04:35'),
(27, 'Mesa de noche', 'pzas', 'Mesita acompañante de noche', 'Clásica mesa tipo arturito acompañante de la cama', 1, 10, 0.125, '2017-04-13 00:08:59', '2017-04-13 00:08:59'),
(28, 'Mesa auxiliar', 'pzas', 'Mesa pequeña decorativa', 'Mesa decorativa pequeña que se usa en espacios comunes para colocar lámparas, objetos, recuerdos, fotos, etc.', 1, 10, 0.18, '2017-04-13 00:11:57', '2017-04-13 00:11:57'),
(29, 'Mesa de centro chica', 'pzas', 'Mesa de 0,8m x 0,5m', 'Mesa de centro pequeña', 1, 5, 0.16, '2017-04-13 00:14:58', '2017-04-13 00:14:58'),
(30, 'Mesa de centro mediana', 'pzas', 'Mesa de 1m x 1m', 'Mesa de centro ', 1, 5, 0.4, '2017-04-13 00:16:38', '2017-04-13 00:16:38'),
(31, 'Mesa de centro grande', 'pzas', 'Mesa de 1,2m x 1,2m', 'Mesa de centro mas grande de toda la casa', 1, 5, 0.576, '2017-04-13 00:17:45', '2017-04-13 00:17:45'),
(32, 'Mesa cómoda', 'pzas', 'Mesa auxiliar del hall', 'Mesa cómoda, normalmente no cuadrar, pegada a la pared del hall', 1, 5, 0.48, '2017-04-13 00:24:38', '2017-04-13 00:24:38'),
(33, 'Mesa cuatro plazas', 'm3', 'Mesa de 4 puestos', 'Mesa de comedor pequeña 4 personas', 1, 5, 0.96, '2017-04-13 00:28:26', '2017-04-13 00:30:31'),
(34, 'Mesa seis plazas', 'm3', 'Mesa de 6 personas', 'Mesa mas grande para 6 personas normalmente de comedor', 1, 5, 1.32, '2017-04-13 00:31:48', '2017-04-13 00:31:48'),
(35, 'Mesa ocho plazas', 'm3', 'Mesa de 8 puestos', '8 puestos', 1, 3, 1.58, '2017-04-13 00:35:12', '2017-04-13 00:35:12'),
(36, 'Mesa diez plazas', 'm3', 'Mesa de 10 personas', 'enorme', 1, 3, 2.35, '2017-04-13 00:44:18', '2017-04-22 02:01:30'),
(37, 'Mesa pantry', 'pzas', 'Mesa en cocina', 'Mesa para comer en la cocina ', 1, 3, 0.48, '2017-04-13 00:45:47', '2017-04-13 00:45:47'),
(38, 'Mesa Peinadora o Tocador', 'm3', 'Mesa de peinar ', 'Mesa de maquillaje, para peinar, normalmente tiene un espejo.', 1, 10, 0.576, '2017-04-13 00:52:08', '2017-04-13 00:52:53'),
(39, 'Mesa de entretenimiento', 'm3', 'Mesa de TV con gavetas y espacios para cornetas', 'Mesa típica donde se coloca el TV más grande con el sistema de audio, y video juegos.', 1, 5, 1.3, '2017-04-13 00:54:49', '2017-04-13 00:54:49'),
(40, 'Mesa de ping pong', 'pzas', 'Mesa de juego ', 'Tenis de mesa', 1, 4, 0.7, '2017-04-13 00:57:29', '2017-04-13 00:57:29'),
(41, 'Mesa de pool', 'm3', 'Juego de billar, pool, etc.', 'Pesada', 1, 4, 3, '2017-04-13 00:59:24', '2017-04-13 00:59:24'),
(42, 'Juego de Jardín', 'm3', 'Mesas y sillas decorativas con paraguas', 'Mesas de jardin con sillas (4), paraguas, poof, etc.', 1, 5, 3, '2017-04-13 01:01:29', '2017-04-13 01:01:29'),
(43, 'Litera sencilla', 'm3', 'Dos individuales', 'dos individuales sencillas', 1, 5, 2, '2017-04-13 01:11:44', '2017-04-13 01:11:44'),
(44, 'Litera mixta', 'm3', 'Litera de matrimonial con individual', 'Litera donde abajo es matrimonial y arriba individual', 1, 4, 4.8, '2017-04-13 01:23:46', '2017-04-13 01:23:46'),
(45, 'Litera triple', 'm3', 'Litera de 3 camas inviduales', 'Litera normal con cama extra tipo gavetero', 1, 4, 4.6, '2017-04-13 01:24:57', '2017-04-13 01:24:57'),
(46, 'Escritorio sencillo', 'm3', 'Escritorio individual', 'sencillo en estudio', 1, 5, 0.64, '2017-04-13 01:40:24', '2017-04-13 01:40:24'),
(47, 'Escritorio tipo L', 'm3', 'Escritorio grande', 'Escritorio cómodo de repente para 2 personas', 1, 5, 1.536, '2017-04-13 01:41:08', '2017-04-13 01:41:08'),
(48, 'Archivador 2 cajones', 'm3', 'Arturito pequeño de 2 cajones', 'Archivador pequeño', 1, 10, 0.1, '2017-04-13 01:43:12', '2017-04-13 01:43:12'),
(49, 'Archivador 4 cajones', 'm3', 'Arturito pequeño de 4 cajones', 'Gavetero grande ', 1, 5, 0.396, '2017-04-13 01:45:36', '2017-04-13 01:45:36'),
(50, 'Biblioteca sencilla', 'm3', 'Biblioteca de 1,2m x 0,8m', 'Biblioteca pequeña', 1, 4, 0.288, '2017-04-13 01:48:04', '2017-04-13 01:48:04'),
(51, 'Biblioteca alta', 'm3', 'Biblioteca de 1,8m x 0,8m (1 solo módulo) ¡indique cantidad de módulos!', 'Un solo módulo', 1, 5, 0.648, '2017-04-13 01:49:38', '2017-04-13 01:49:38'),
(52, 'Vidrio comedor', 'pzas', 'Vidrio o piedra de tope para comedor', 'Muy frágil y cuidadoso para embalar', 1, 5, 0.36, '2017-04-13 01:52:03', '2017-04-13 01:52:03'),
(53, 'Ceibó', 'm3', 'Mueble multiuso de madera para guardar vajilla, lencería, etc.', 'Mueble multiuso de madera para guardar vajilla, lencería, etc.', 1, 5, 0.672, '2017-04-13 01:54:32', '2017-04-13 01:54:32'),
(54, 'PC Juego Desktop ', 'pzas', 'PC, Teclado, ratón y monitor.', 'Con PC', 1, 10, 0.24, '2017-04-13 01:56:35', '2017-04-13 01:56:35'),
(55, 'Cuna', 'm3', 'Cama para bebé', 'Cuna pequeña de 1 bebé', 1, 4, 0.81, '2017-04-13 02:02:19', '2017-04-13 02:02:19'),
(56, 'Vestidor pañalera', 'm3', 'Pañalera para cosas de bebé', 'Mueble para vestir, bañar y colocar artículos de un bebé', 1, 4, 0.54, '2017-04-13 02:04:19', '2017-04-13 02:04:19'),
(57, 'Nevera sencilla', 'm3', 'nevera de 1 puerta', '', 1, 5, 1.08, '2017-04-13 02:50:55', '2017-04-13 02:50:55'),
(58, 'Nevera 2 puertas vertical', 'pzas', '2 puertas verticales', '', 1, 5, 1.52, '2017-04-13 02:51:48', '2017-04-13 02:51:48'),
(59, 'Nevecon', 'pzas', 'Nevera de 2 cuerpos', '', 1, 5, 2.43, '2017-04-13 02:52:21', '2017-04-13 02:52:21'),
(60, 'Congelador vertical', 'pzas', 'Freezer vertical ', 'congelador de alimentos de puerta vertical', 1, 5, 0.88, '2017-04-13 02:53:56', '2017-04-13 02:53:56'),
(61, 'Congelador horizontal', 'pzas', 'Freezer horizontal', '', 1, 5, 0.36, '2017-04-13 02:54:41', '2017-04-13 02:54:41'),
(62, 'Nevera de vinos', 'pzas', 'Nevera para enfriar botellas de licor', '', 1, 5, 0.175, '2017-04-13 02:56:14', '2017-04-13 02:56:14'),
(63, 'Dispensador de agua', 'pzas', 'Enfría o calienta el agua normalmente', '', 1, 5, 0.96, '2017-04-13 02:57:03', '2017-04-13 02:58:39'),
(64, 'Cava pequeña', 'pzas', 'Cava 6 botellas', '', 1, 10, 0.036, '2017-04-13 02:58:22', '2017-04-13 02:58:22'),
(65, 'Cava mediana', 'pzas', 'Cava de 36 botellas', '', 1, 10, 0.12, '2017-04-13 02:59:22', '2017-04-13 02:59:22'),
(66, 'Cava grande', 'pzas', 'Cava grande de 2 cajas de cerveza', '', 1, 10, 0.21, '2017-04-13 03:01:02', '2017-04-13 03:01:02'),
(67, 'Microondas u horno', 'pzas', 'Calentador de comida', 'Calentador u horno', 1, 8, 0.06, '2017-04-13 03:01:59', '2017-04-13 03:01:59'),
(68, 'Extractor de jugos', 'pzas', 'Extractor', '', 1, 5, 0.05, '2017-04-13 03:03:42', '2017-04-13 03:03:42'),
(69, 'Licuadora', 'pzas', 'Licuadora', '', 1, 8, 0.04, '2017-04-13 03:04:46', '2017-04-13 03:04:46'),
(70, 'Sanduchera', 'pzas', 'Calentador de panes', '', 1, 8, 0.03, '2017-04-13 03:06:01', '2017-04-13 03:06:01'),
(71, 'Ayudante de cocina', 'pzas', 'Máquina multiuso de cocina', '', 1, 8, 0.06, '2017-04-13 03:07:20', '2017-04-13 03:07:20'),
(72, 'Vaporera', 'pzas', 'Máquina para cocinar al vapor', '', 1, 5, 0.06, '2017-04-13 03:08:32', '2017-04-13 03:08:32'),
(73, 'Horno tostador', 'pzas', 'Horno tostador de pan', '', 1, 5, 0.04, '2017-04-13 03:09:15', '2017-04-13 03:09:15'),
(74, 'Cafetera', 'pzas', 'Máquina de hacer café', '', 1, 5, 0.04, '2017-04-13 03:09:53', '2017-04-13 03:09:53'),
(75, 'Pecera o acuario', 'm3', 'Pecera decorativa ', '', 1, 5, 0.36, '2017-04-13 03:12:59', '2017-04-13 03:12:59'),
(76, 'Caminadora', 'pzas', 'Máquina de hacer ejercicios', '', 1, 5, 1.54, '2017-04-13 03:14:02', '2017-04-13 03:14:02'),
(77, 'Bicileta de spinning', 'pzas', 'Máquina de bicicleta estática', '', 1, 5, 1.68, '2017-04-13 03:16:02', '2017-04-13 03:16:02'),
(78, 'Batidora', 'pzas', 'Máquina de batir', '', 1, 5, 0.18, '2017-04-13 03:16:47', '2017-04-13 03:16:47'),
(79, 'Lavadora', 'pzas', 'Máquina de lavar ropa', '', 1, 5, 0.73, '2017-04-13 03:17:46', '2017-04-13 03:17:46'),
(80, 'Secadora', 'pzas', 'Secadora de ropa', '', 1, 5, 0.73, '2017-04-13 03:18:25', '2017-04-13 03:18:25'),
(81, 'Lavadora secadora auto', 'pzas', 'Lavadora y secadora integrada en 1 solo equipo ', '', 1, 5, 0.81, '2017-04-13 03:19:58', '2017-04-13 03:19:58'),
(82, 'Morocha', 'pzas', 'Lavadora y secadora acopladas verticalmente', '', 1, 5, 1.46, '2017-04-13 03:20:38', '2017-04-13 03:20:38'),
(83, 'DUO', 'pzas', 'Lavadora y secadora moderna', '', 1, 5, 1.54, '2017-04-13 03:21:44', '2017-04-13 03:21:44'),
(84, 'Mueble semanario', 'm3', 'Mueble de multiples gavetas', '', 1, 5, 0.6, '2017-04-13 03:23:26', '2017-04-13 03:23:26'),
(85, 'Mueble de lencería', 'm3', 'Mueble de gavetas grande', '', 1, 5, 0.7, '2017-04-13 03:24:50', '2017-04-13 03:24:50'),
(86, 'Mesa doce plazas', 'm3', 'Mesa familiar de 12 puestos', 'Mesa gigante de familia', 1, 3, 3.14, '2017-04-22 02:03:00', '2017-04-22 02:03:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pais`
--

CREATE TABLE `pais` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `pais`
--

INSERT INTO `pais` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'venezuela', '2017-03-21 23:37:20', '2017-03-21 23:37:20'),
(2, 'colombia', '2017-03-21 23:37:38', '2017-03-21 23:37:38'),
(3, 'ecuador', '2017-03-21 23:37:50', '2017-03-21 23:37:50'),
(4, 'brasil', '2017-03-21 23:38:21', '2017-03-21 23:38:21'),
(5, 'panama', '2017-03-21 23:38:28', '2017-03-21 23:40:32'),
(6, 'EEUU', '2017-03-21 23:38:45', '2017-03-21 23:38:45'),
(25, 'canada', '2017-04-03 23:06:07', '2017-04-03 23:06:07'),
(28, 'costa rica', '2017-04-03 23:06:15', '2017-04-03 23:06:15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profiles`
--

CREATE TABLE `profiles` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `bio` text COLLATE utf8_unicode_ci,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `skype_user` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `profile_pic` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_profile_bg` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'default-user-bg.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `profiles`
--

INSERT INTO `profiles` (`id`, `user_id`, `bio`, `phone`, `skype_user`, `profile_pic`, `created_at`, `updated_at`, `user_profile_bg`) VALUES
(1, 4, 'admin bio test ', '04242337767', 'admin.admin', '/images/profile/4/pics/user-pic.gif', '2017-03-13 22:10:17', '2017-04-18 00:13:47', 'default-user-bg.jpg'),
(13, 16, '', '', '', NULL, '2017-04-04 21:44:19', '2017-04-04 21:44:19', 'default-user-bg.jpg'),
(14, 17, '', '', '', NULL, '2017-04-04 21:44:43', '2017-04-04 21:44:43', 'default-user-bg.jpg'),
(15, 18, '', '', '', NULL, '2017-04-04 21:45:17', '2017-04-04 21:45:17', 'default-user-bg.jpg'),
(16, 19, NULL, '4129986725', NULL, NULL, '2017-04-06 01:47:25', '2017-04-06 01:47:25', 'default-user-bg.jpg'),
(17, 20, 'Ana Glorimar Cárdenas', '+584147049758', 'AnaGCardenasP', '/images/profile/20/pics/user-pic.PNG', '2017-04-17 21:42:43', '2017-04-17 21:42:43', 'default-user-bg.jpg'),
(18, 21, NULL, '+584129986726', NULL, NULL, '2017-04-17 23:28:57', '2017-04-17 23:28:57', 'default-user-bg.jpg'),
(19, 22, 'Tiffany Martinez Coordinadora y atención al cliente', '+584242082327', 'NA', '/images/profile/22/pics/user-pic.PNG', '2017-04-17 23:46:24', '2017-04-17 23:55:17', 'default-user-bg.jpg'),
(20, 23, NULL, '+584242082325', NULL, NULL, '2017-04-21 23:38:12', '2017-04-21 23:38:12', 'default-user-bg.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'administrador', '2017-03-13 21:18:00', '2017-03-13 21:18:00'),
(2, 'logistica', '2017-03-13 21:18:00', '2017-03-13 21:18:00'),
(3, 'ventas', '2017-03-13 21:18:00', '2017-03-13 21:18:00'),
(4, 'coordinacion', '2017-03-23 04:00:00', '2017-03-23 04:00:00'),
(5, 'cliente', '2017-03-23 04:00:00', '2017-03-23 04:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rooms`
--

CREATE TABLE `rooms` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `rooms`
--

INSERT INTO `rooms` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Alcoba principal', 'cuarto principal del hogar', '2017-03-15 19:12:07', '2017-03-15 19:12:07'),
(2, 'Cocina', 'cocina del hogar', '2017-03-15 21:43:41', '2017-03-15 21:43:41'),
(3, 'recibo', 'primer cuarto al entrar a la casa', '2017-03-16 20:31:42', '2017-03-16 20:31:42'),
(4, 'Comedor', 'cuarto donde se supone que se deberia comer pero nunca se hace', '2017-03-16 20:32:05', '2017-03-16 20:32:05'),
(5, 'estudio u oficina', 'cuarto de gente ocupada', '2017-03-16 20:32:18', '2017-04-13 02:02:59'),
(6, 'cuarto del infante', 'cuarto de los mas pequeños de la casa', '2017-03-16 20:32:44', '2017-03-16 20:32:44'),
(7, 'alcoba', 'cuarto que no es el principal pero tampoco es de los mas pequeños de la casa', '2017-03-16 20:33:16', '2017-03-16 20:33:16'),
(8, 'Servicio o Garage', 'Depósito o cuarto de servicio donde hay muchas cosas', '2017-04-06 00:54:14', '2017-04-06 00:54:14'),
(9, 'Hall', 'Pasillo o lugar de paso común', '2017-04-06 00:56:41', '2017-04-06 00:56:41');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `documento_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `defaultPwd` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ingreso_por` int(11) NOT NULL,
  `activation_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `resent` tinyint(3) UNSIGNED NOT NULL,
  `role_id` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `signup_ip_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `signup_confirmation_ip_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `signup_sm_ip_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `admin_ip_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `documento_id`, `first_name`, `last_name`, `email`, `password`, `defaultPwd`, `ingreso_por`, `activation_code`, `active`, `resent`, `role_id`, `remember_token`, `signup_ip_address`, `signup_confirmation_ip_address`, `signup_sm_ip_address`, `admin_ip_address`, `created_at`, `updated_at`) VALUES
(4, '', 'admin', 'admin', 'admin@admin.com', '$2y$10$A88Isut7BecbcVP9WqCNjutF8pReu/qLbzfhwUVvvo3SpudBMh7Aa', '', 0, '', 1, 0, 1, 'pcYGmSjaRL4wGglsbOw3XBhlAtf1DzmRkfgpdVud7xp7PjVHFXmED2UMmYUQ', '::1', '::1', '', '', '2017-03-13 22:10:14', '2017-04-21 23:25:38'),
(16, '', 'logistica', 'log', 'log@log.com', '$2y$10$aa1UZADCf5zD969E5RP9EuCvaMfWqZXQEOUpApY3rHDm58xL81Mc2', '', 0, 'NCNZfDtXDGoNCC8reGkyQervDVQd5OxGRprDEUmQ9PB5ciX6X6C1TY9pxyEWlog@log.com', 1, 0, 2, 'fAMnXpohDb3NMf9PZ7b4fY3eOLZnFty7oetj1IW7lx9npB3gQzXwUdbaBVOx', '', '', '', '::1', '2017-04-04 21:44:19', '2017-04-05 01:48:27'),
(17, '', 'ventas', 'ven', 'ven@ven.com', '$2y$10$SR55GT7wXDOp97pO8bW3ZuUuGyUNC2tklxIiFmgbmZGLyaxfmA8r.', '', 0, 'WSJjRQ2bCGYo2yt2vyGcjYasZ6xVvFgqseXgmcTVhrDCrvhPrIuXvM3ggGNBven@ven.com', 1, 0, 3, 'IB7w6Tef9LPh0fteeZeeLt84ho10aSnNlglD2qdOBfgcbUq5tcaX4OyzXPmt', '', '', '', '::1', '2017-04-04 21:44:42', '2017-04-17 23:29:35'),
(18, '', 'coordinacion', 'coor', 'coor@coor.com', '$2y$10$kV1oYDiBSXdAHZ6rrL65FuGYvldFZkKEJEMKzidrSxsSwuyht43Ey', '', 0, 'nr119suZdWpIV1ZpiujRMsCwmchtCiz3EgPni4hzjSzNAYTcQ0gYfcLBfTxOcoor@coor.com', 1, 0, 4, 'RGioQyxut76irZgFwXfFZR3sOVAdJ1xWeoJWUB8YgtQeFHX4H7BPCgdwDAbF', '', '', '', '::1', '2017-04-04 21:45:16', '2017-04-22 02:09:38'),
(19, '19693588', 'Diego', 'Torrealba', 'dietorrealba@gmail.com', '$2y$10$fm3yeqT3lRCfU0sLxm9LqeQW4z5G/ukFy7cNIEeLYbDeEgK6BADMC', '', 2, '', 1, 0, 5, 'wlMgpOhBg6Da8xmsN30dJpsyE5B20IjtBshWyKCn0jddPd62JKMA98d3M1wX', '', '186.167.250.163', '', '', '2017-04-06 01:47:25', '2017-04-18 04:13:50'),
(20, '', 'Ana', 'Cardenas', 'anagc@intermudanzas.com', '$2y$10$ergC90FleqFU3BwETOLV9e8J410zUSFjFieABVPR.Ar7Yo8geC9/y', '', 0, 'UtKpa2hjdmAw4ynmhZv5Fet3SvbMfziip4HnimwxHtcMrsutdiYk7dnk8T0danagc@intermudanzas.com', 1, 0, 3, 'wnvpEHKiAei9ByNUQ9Q8VHnV697I0uaElfJYYcj35S1G6dMezF9y4R3xxFZO', '', '', '', '201.234.224.163', '2017-04-17 21:42:40', '2017-04-22 01:51:32'),
(21, '19693589', 'Armando', 'González', 'dtorrealba@3dlinkweb.com', '$2y$10$QCoXG6YGUIaRiKvgfv1MqObbScKTAX/SetNKiNniAlfC6nl8M5j.W', '', 1, '', 1, 0, 5, 'bEJkuYTERcaj3ABLHXWu54XWQ5GfpoBttoSAUrBYG0ht3PsgTvoVtwLps8Kd', '', '201.234.224.163', '', '', '2017-04-17 23:28:57', '2017-04-22 01:08:36'),
(22, '', 'Tiffany', 'Martinez', 'tiffany.martinez39@gmail.com', '$2y$10$OVV8fVQUpqCfEB454K7DCe3XLm4GKTPyMLEw8FJ34gusrSc1JqffC', '', 0, 'SDz0SPtisJuLtU9qUxTZSzoWvXkzkhFXOErdrbZNmHnQfP21spwTi3dQavSbtiffany.martinez39@gmail.com', 1, 0, 4, 'rAykK9c0GMUzaGCB6vNOByQc9iDC08Ll0guFKNwj0KpXP0WF62DKk9VT74hT', '', '', '', '201.234.224.163', '2017-04-17 23:46:23', '2017-04-22 00:16:30'),
(23, '19509816', 'Tiffany', 'Martinez', 'a@a.com', '$2y$10$b4taCfL57QO.3XVHM.VUieAxpirW1JC7DMZGCEEWgf8ed4IOxG3Vy', 'CKadO3wT', 3, 'NKxx8IDgbNBU760FwpeEI4V8zE3qWoUKWeHZOkN5qhwMq0OPibYwKRBTs4sma@a.com', 0, 0, 5, NULL, '', '', '', '', '2017-04-21 23:38:12', '2017-04-21 23:38:12');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `boxes`
--
ALTER TABLE `boxes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `especiales`
--
ALTER TABLE `especiales`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `estados`
--
ALTER TABLE `estados`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `estimaciones`
--
ALTER TABLE `estimaciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `fotos`
--
ALTER TABLE `fotos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `objects`
--
ALTER TABLE `objects`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pais`
--
ALTER TABLE `pais`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indices de la tabla `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `profiles_user_id_index` (`user_id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `boxes`
--
ALTER TABLE `boxes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `especiales`
--
ALTER TABLE `especiales`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;
--
-- AUTO_INCREMENT de la tabla `estados`
--
ALTER TABLE `estados`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT de la tabla `estimaciones`
--
ALTER TABLE `estimaciones`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=495;
--
-- AUTO_INCREMENT de la tabla `fotos`
--
ALTER TABLE `fotos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `objects`
--
ALTER TABLE `objects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;
--
-- AUTO_INCREMENT de la tabla `pais`
--
ALTER TABLE `pais`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `profiles`
--
ALTER TABLE `profiles`
  ADD CONSTRAINT `profiles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
