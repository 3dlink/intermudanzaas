-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-04-2017 a las 00:29:38
-- Versión del servidor: 10.1.19-MariaDB
-- Versión de PHP: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `intermudanzas`
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
(1, 'caja test', 'pzas', 'texto de ayuda', '', 1, 10, 3.14, '2017-03-16 00:49:58', '2017-03-16 00:49:58');

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
(1, 1, 'App\\Models\\Box'),
(1, 3, 'App\\Models\\Object'),
(2, 3, 'App\\Models\\Object');

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
(97, 'nombre1', 'd1', '7HsLUJL - Imgur.jpg', '/images/4/especiales/img_8_97_6XN.jpg', 8, '2017-03-22 06:02:18', '2017-03-23 00:44:05'),
(99, 'nombre3', 'd3', 'LeeSinPoro_1440x900.jpg', '/images/4/especiales/img_8_99_32W.jpg', 8, '2017-03-22 06:02:18', '2017-03-23 00:43:19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados`
--

CREATE TABLE `estados` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lt-color` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bg-color` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `estados`
--

INSERT INTO `estados` (`id`, `name`, `descripcion`, `lt-color`, `bg-color`, `created_at`, `updated_at`) VALUES
(0, '', 'NO ESTA ESPECIFICADO', '', '', '2017-04-03 04:00:00', '2017-04-03 04:00:00'),
(1, 'Contacto', 'cuando se crea un cliente desde la web (formulario) o creandolo manualmente.', '', '', '2017-04-03 04:00:00', '2017-04-03 04:00:00'),
(2, 'Estimación', 'cuando se activa un cliente (se envia el correo y cuando el cliente entra en la app por primera vez se cambia de estado 1 a 2 esa primera estimacion base que se creo automaticamente); cuando un cliente ya registrado crea una nueva estimacion', '', '', '2017-04-03 04:00:00', '2017-04-03 04:00:00'),
(3, 'Analizando costos', 'el cliente guarda la estimación y se deshabilita el editar, solo los administradores de intermudanzas pueden echar para atras el proceso a estimacion de nuevo', '', '', '2017-04-03 04:00:00', '2017-04-03 04:00:00'),
(4, 'Cotizado', 'el cliente analiza el costo de la mudanza y si devuelven la cotización se puede habilitar de nuevo para llegar al estado 2, y reestime. esto desde el personal de intermudanzas.', '', '', '2017-04-03 04:00:00', '2017-04-03 04:00:00'),
(5, 'Aprobado', 'una vez que el cliente esta satisfecho con el presupuesto, pasa a este estado, y se deshabilita la posibilidad de reestimación.', '', '', '2017-04-03 04:00:00', '2017-04-03 04:00:00'),
(6, 'Stand by', 'cliente que pide tiempo para pagar o para ordenar sus cosas, entonces puede estar habilitado el recotizar (cambio al estado 2).', '', '', '2017-04-03 04:00:00', '2017-04-03 04:00:00'),
(7, 'Rechazado', 'estado que puede quedar inactiva la cotización.', '', '', '2017-04-03 04:00:00', '2017-04-03 04:00:00'),
(8, 'Orden de trabajo', ' se le dió el go al equipo de trabajo para buscar las cosas en la casa.', '', '', '2017-04-03 04:00:00', '2017-04-03 04:00:00'),
(9, 'Empacando', 'el equipo de trabajo se encuentra en el sitio trabajando a empaquetar lo estimado.', '', '', '2017-04-03 04:00:00', '2017-04-03 04:00:00'),
(10, 'Cargando', 'ya está empacada, ahora movilizan las cajas y/o objetos al camión.', '', '', '2017-04-03 04:00:00', '2017-04-03 04:00:00'),
(11, 'en ruta', 'el camión partió a su destino proximo. ', '', '', '2017-04-03 04:00:00', '2017-04-03 04:00:00'),
(12, 'Aduana', 'estado de la exportación, trámites, revisiones, etc.', '', '', '2017-04-03 04:00:00', '2017-04-03 04:00:00'),
(13, 'en ruta destino', 'ya el camión esta en la ruta que conecta el destino final.', '', '', '2017-04-03 04:00:00', '2017-04-03 04:00:00'),
(14, 'Entrega', 'el camión ha llegado al destino de entrega, para recibido.', '', '', '2017-04-03 04:00:00', '2017-04-03 04:00:00'),
(15, 'Desembalando', 'los objetos estan dentro del destino y estan en proceso de desembalaje.', '', '', '2017-04-03 04:00:00', '2017-04-03 04:00:00'),
(16, 'Control de calidad', 'revisando que todo este en orden y en buen estado, para que el cliente quede satisfecho con el servicio', '', '', '2017-04-03 04:00:00', '2017-04-03 04:00:00'),
(17, 'Cierre del servicio', '', '', '', '2017-04-03 04:00:00', '2017-04-03 04:00:00');

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `estimaciones`
--

INSERT INTO `estimaciones` (`id`, `cliente`, `fecha_estimada`, `tipo_mudanza`, `alcance`, `comentario`, `telf_origen`, `telf_destino`, `p_origen`, `p_destino`, `c_destino`, `c_origen`, `dir_origen`, `dir_destino`, `estado`, `cambio`, `mtrs3`, `valor_total`, `moneda`, `a_cargo`, `logistica`, `created_at`, `updated_at`) VALUES
(8, 4, 'marzo', 1, 2, '', '1', '1', 1, 2, 'bogota', 'caracas', 'caracas', 'bogota', 3, 1, 0, 0, '', 17, 16, '2017-03-22 06:02:18', '2017-04-04 23:31:20'),
(17, 15, '', 0, 0, '', '', '', 0, 0, '', '', '', '', 2, 0, 0, 0, 'VEF', 17, 0, '2017-02-28 23:54:58', '2017-04-05 02:21:30'),
(485, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, 0, NULL, NULL, NULL, 17, 0, '2017-04-04 01:15:27', '2017-04-04 01:15:27'),
(486, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 0, NULL, NULL, NULL, 17, 0, '2017-04-04 01:19:27', '2017-04-04 01:19:27'),
(487, 17, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 0, NULL, NULL, NULL, 0, 0, '2017-04-04 23:27:14', '2017-04-04 23:27:14');

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

--
-- Volcado de datos para la tabla `fotos`
--

INSERT INTO `fotos` (`id`, `img_orig_name`, `image`, `estimacion_id`, `created_at`, `updated_at`) VALUES
(1, 'AmumuPoro_1440x900.jpg', '/images/4/img_8_XFH.jpg', 8, '2017-03-23 23:36:20', '2017-03-23 23:36:20'),
(2, 'cnFIU6w - Imgur.jpg', '/images/4/img_8_97J.jpg', 8, '2017-03-23 23:36:20', '2017-03-23 23:36:20');

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
(8, 3, 'App\\Models\\Object', 5, 1),
(8, 3, 'App\\Models\\Object', 2, 2);

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
(3, 'test', 'pzas', 'texto de ayuda', '', 1, 10, 3.14, '2017-03-15 23:50:02', '2017-03-15 23:50:02');

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
(19, 'argentina', '2017-04-03 23:05:57', '2017-04-03 23:05:57'),
(20, 'alemania', '2017-04-03 23:05:59', '2017-04-03 23:05:59'),
(21, 'españa', '2017-04-03 23:06:04', '2017-04-03 23:06:04'),
(22, 'uruguay', '2017-04-03 23:06:05', '2017-04-03 23:06:05'),
(23, 'chile', '2017-04-03 23:06:06', '2017-04-03 23:06:06'),
(24, 'mexico', '2017-04-03 23:06:07', '2017-04-03 23:06:07'),
(25, 'canada', '2017-04-03 23:06:07', '2017-04-03 23:06:07'),
(26, 'peru', '2017-04-03 23:06:08', '2017-04-03 23:06:08'),
(27, 'republica dominicana', '2017-04-03 23:06:15', '2017-04-03 23:06:15'),
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
(1, 4, 'admin bio test ', '04242337767', 'daniel.corcega', '/images/profile/4/pics/user-pic.gif', '2017-03-13 22:10:17', '2017-03-13 22:17:21', 'default-user-bg.jpg'),
(12, 15, NULL, '04242337767', NULL, NULL, '2017-03-28 23:54:58', '2017-03-28 23:54:58', 'default-user-bg.jpg'),
(13, 16, '', '', '', NULL, '2017-04-04 21:44:19', '2017-04-04 21:44:19', 'default-user-bg.jpg'),
(14, 17, '', '', '', NULL, '2017-04-04 21:44:43', '2017-04-04 21:44:43', 'default-user-bg.jpg'),
(15, 18, '', '', '', NULL, '2017-04-04 21:45:17', '2017-04-04 21:45:17', 'default-user-bg.jpg');

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
(5, 'estudio', 'cuarto de gente ocupada', '2017-03-16 20:32:18', '2017-03-16 20:32:18'),
(6, 'cuarto del infante', 'cuarto de los mas pequeños de la casa', '2017-03-16 20:32:44', '2017-03-16 20:32:44'),
(7, 'alcoba', 'cuarto que no es el principal pero tampoco es de los mas pequeños de la casa', '2017-03-16 20:33:16', '2017-03-16 20:33:16');

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
(4, '', 'admin', 'admin', 'admin@admin.com', '$2y$10$A88Isut7BecbcVP9WqCNjutF8pReu/qLbzfhwUVvvo3SpudBMh7Aa', '', 0, '', 1, 0, 1, 'G4ewZoE6RjHYSlObEGvWQjtIqZdEgAMqxOboJbb4cbpBv3l0Q3f2khYoPmcn', '::1', '::1', '', '', '2017-03-13 22:10:14', '2017-03-29 23:12:07'),
(15, '123456789', 'cliente', 'cli', 'client@client.com', '$2y$10$F27AvRBkYUVQEFzKRRmH3.72FhV70s2C9bm7/g/X/m8MSxIb1NVMO', '', 1, '', 1, 0, 5, 'by1PpPFO9urMaVcJxxIaDrDXr8KtU7PsL9i3V2yWhur485ITmQkGzZBEjFq8', '', '::1', '', '', '2017-03-28 23:54:58', '2017-03-28 23:58:23'),
(16, '', 'logistica', 'log', 'log@log.com', '$2y$10$aa1UZADCf5zD969E5RP9EuCvaMfWqZXQEOUpApY3rHDm58xL81Mc2', '', 0, 'NCNZfDtXDGoNCC8reGkyQervDVQd5OxGRprDEUmQ9PB5ciX6X6C1TY9pxyEWlog@log.com', 1, 0, 2, 'fAMnXpohDb3NMf9PZ7b4fY3eOLZnFty7oetj1IW7lx9npB3gQzXwUdbaBVOx', '', '', '', '::1', '2017-04-04 21:44:19', '2017-04-05 01:48:27'),
(17, '', 'ventas', 'ven', 'ven@ven.com', '$2y$10$SR55GT7wXDOp97pO8bW3ZuUuGyUNC2tklxIiFmgbmZGLyaxfmA8r.', '', 0, 'WSJjRQ2bCGYo2yt2vyGcjYasZ6xVvFgqseXgmcTVhrDCrvhPrIuXvM3ggGNBven@ven.com', 1, 0, 3, '5ln4w9ffAix1ZgGJuFLKc9xfP8hgmhwfnz5D4hoqtrRl1wk6oiNUZiWcgwwg', '', '', '', '::1', '2017-04-04 21:44:42', '2017-04-05 00:29:58'),
(18, '', 'coordinacion', 'coor', 'coor@coor.com', '$2y$10$kV1oYDiBSXdAHZ6rrL65FuGYvldFZkKEJEMKzidrSxsSwuyht43Ey', '', 0, 'nr119suZdWpIV1ZpiujRMsCwmchtCiz3EgPni4hzjSzNAYTcQ0gYfcLBfTxOcoor@coor.com', 1, 0, 4, 'BBRE7L0mB3roFOxZmRJ4hg3u9QJTqW5mchaqwakpqVoED6TadRNM2YTpYtTb', '', '', '', '::1', '2017-04-04 21:45:16', '2017-04-05 02:12:04');

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `especiales`
--
ALTER TABLE `especiales`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;
--
-- AUTO_INCREMENT de la tabla `estados`
--
ALTER TABLE `estados`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT de la tabla `estimaciones`
--
ALTER TABLE `estimaciones`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=489;
--
-- AUTO_INCREMENT de la tabla `fotos`
--
ALTER TABLE `fotos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `objects`
--
ALTER TABLE `objects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
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
