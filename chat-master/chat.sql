-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-03-2023 a las 22:53:29
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `chat`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `areas`
--

CREATE TABLE `areas` (
  `id_area` int(10) NOT NULL,
  `n_area` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `areas`
--

INSERT INTO `areas` (`id_area`, `n_area`) VALUES
(224, 'Sistemas'),
(225, 'Area x');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `area_grupo`
--

CREATE TABLE `area_grupo` (
  `id` int(11) NOT NULL,
  `id_area` int(11) NOT NULL,
  `id_grupo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `config_generales`
--

CREATE TABLE `config_generales` (
  `id_config` int(10) NOT NULL,
  `t_imgs` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `config_generales`
--

INSERT INTO `config_generales` (`id_config`, `t_imgs`) VALUES
(1, 500000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresas`
--

CREATE TABLE `empresas` (
  `id_empresa` int(11) NOT NULL,
  `n_empresa` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `empresas`
--

INSERT INTO `empresas` (`id_empresa`, `n_empresa`) VALUES
(1, 'Puntualmente'),
(2, 'CLAB');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa_grupos`
--

CREATE TABLE `empresa_grupos` (
  `id_grupo` int(11) NOT NULL,
  `n_grupo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `empresa_grupos`
--

INSERT INTO `empresa_grupos` (`id_grupo`, `n_grupo`) VALUES
(7, 'grupo1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `etiquetas`
--

CREATE TABLE `etiquetas` (
  `id_etiqueta` int(10) NOT NULL,
  `id_area` int(10) NOT NULL,
  `descrip_etiq` varchar(500) NOT NULL,
  `t_estimado` int(3) NOT NULL,
  `tipo_t` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `etiquetas`
--

INSERT INTO `etiquetas` (`id_etiqueta`, `id_area`, `descrip_etiq`, `t_estimado`, `tipo_t`) VALUES
(36, 225, 'Certificaciones laborales', 2, 'horas'),
(37, 225, 'Desprendibles de nómina', 1, 'horas'),
(38, 225, 'Plantilla seguridad social (prestación de servicios)', 5, 'horas'),
(39, 225, 'Solicitud de prestamos internos', 8, 'dias'),
(40, 224, 'Cambio de diademas', 1, 'horas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupos`
--

CREATE TABLE `grupos` (
  `id_grupo` int(10) NOT NULL,
  `ngrupo` varchar(200) NOT NULL,
  `propietario` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `grupos`
--

INSERT INTO `grupos` (`id_grupo`, `ngrupo`, `propietario`) VALUES
(105, 'Grupo1', 439402045),
(106, 'Grupo A', 739631376),
(107, 'Grupo con Andres', 519515490);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo_integrante`
--

CREATE TABLE `grupo_integrante` (
  `id_integrante_grupo` int(50) NOT NULL,
  `id_grupo` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `grupo_integrante`
--

INSERT INTO `grupo_integrante` (`id_integrante_grupo`, `id_grupo`, `id_usuario`) VALUES
(113, 105, 1272492351),
(114, 105, 931285856),
(115, 105, 439402045),
(116, 106, 718950861),
(117, 106, 829925637),
(118, 106, 199019888),
(119, 106, 1463495958),
(120, 106, 739631376),
(121, 107, 478897994),
(122, 107, 519515490);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `log_sesiones`
--

CREATE TABLE `log_sesiones` (
  `id_log` int(10) NOT NULL,
  `id_usuario` int(10) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `ip` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `log_sesiones`
--

INSERT INTO `log_sesiones` (`id_log`, `id_usuario`, `fecha`, `hora`, `ip`) VALUES
(75, 439402045, '2023-03-03', '14:52:29', '127.0.0.1'),
(76, 439402045, '2023-03-03', '16:07:37', '127.0.0.1'),
(77, 439402045, '2023-03-03', '16:11:32', '127.0.0.1'),
(78, 439402045, '2023-03-03', '16:32:05', '127.0.0.1'),
(79, 439402045, '2023-03-04', '08:22:41', '::1'),
(80, 439402045, '2023-03-04', '08:36:43', '::1'),
(81, 439402045, '2023-03-04', '08:38:42', '::1'),
(82, 439402045, '2023-03-04', '09:51:43', '::1'),
(83, 439402045, '2023-03-04', '09:58:57', '127.0.0.1'),
(84, 439402045, '2023-03-04', '10:07:04', '127.0.0.1'),
(85, 439402045, '2023-03-04', '11:01:55', '::1'),
(86, 931285856, '2023-03-06', '08:58:54', '::1'),
(87, 439402045, '2023-03-06', '10:29:25', '127.0.0.1'),
(88, 439402045, '2023-03-06', '11:50:34', '127.0.0.1'),
(89, 931285856, '2023-03-06', '12:12:17', '::1'),
(90, 931285856, '2023-03-06', '15:41:08', '127.0.0.1'),
(91, 439402045, '2023-03-06', '15:43:16', '127.0.0.1'),
(92, 439402045, '2023-03-06', '16:45:03', '127.0.0.1'),
(93, 439402045, '2023-03-07', '07:35:08', '127.0.0.1'),
(94, 439402045, '2023-03-07', '07:47:30', '127.0.0.1'),
(95, 439402045, '2023-03-07', '08:08:55', '::1'),
(96, 439402045, '2023-03-07', '08:50:20', '127.0.0.1'),
(97, 439402045, '2023-03-07', '09:00:35', '127.0.0.1'),
(98, 439402045, '2023-03-07', '09:20:44', '127.0.0.1'),
(99, 931285856, '2023-03-07', '09:21:31', '::1'),
(100, 439402045, '2023-03-07', '10:21:56', '::1'),
(101, 439402045, '2023-03-07', '10:24:17', '127.0.0.1'),
(102, 439402045, '2023-03-07', '10:34:52', '127.0.0.1'),
(103, 439402045, '2023-03-07', '10:36:29', '127.0.0.1'),
(104, 439402045, '2023-03-07', '11:31:48', '127.0.0.1'),
(105, 439402045, '2023-03-07', '11:51:44', '127.0.0.1'),
(106, 1272492351, '2023-03-07', '12:25:28', '::1'),
(107, 439402045, '2023-03-07', '12:27:28', '172.16.3.5'),
(108, 439402045, '2023-03-07', '12:31:58', '127.0.0.1'),
(109, 439402045, '2023-03-07', '13:49:19', '127.0.0.1'),
(110, 545464209, '2023-03-07', '14:12:13', '::1'),
(111, 545464209, '2023-03-07', '14:12:45', '::1'),
(112, 1069766798, '2023-03-07', '14:14:39', '::1'),
(113, 380872290, '2023-03-07', '14:16:34', '::1'),
(114, 1516938660, '2023-03-07', '14:18:11', '172.16.3.5'),
(115, 545464209, '2023-03-07', '14:59:38', '127.0.0.1'),
(116, 380872290, '2023-03-07', '15:00:10', '127.0.0.1'),
(117, 199019888, '2023-03-07', '15:01:35', '127.0.0.1'),
(118, 380872290, '2023-03-07', '15:04:21', '127.0.0.1'),
(119, 739631376, '2023-03-07', '15:05:40', '127.0.0.1'),
(120, 829925637, '2023-03-07', '15:12:52', '172.16.3.5'),
(121, 739631376, '2023-03-07', '15:15:07', '::1'),
(122, 199019888, '2023-03-07', '16:31:10', '127.0.0.1'),
(123, 199019888, '2023-03-07', '16:36:14', '127.0.0.1'),
(124, 739631376, '2023-03-07', '16:36:28', '::1'),
(125, 739631376, '2023-03-07', '16:38:28', '::1'),
(126, 478897994, '2023-03-07', '16:44:19', '::1'),
(127, 519515490, '2023-03-07', '16:45:18', '127.0.0.1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `messages`
--

CREATE TABLE `messages` (
  `msg_id` int(11) NOT NULL,
  `incoming_msg_id` int(255) NOT NULL,
  `outgoing_msg_id` int(255) NOT NULL,
  `msg` varchar(1000) NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `tipo` tinyint(1) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `ip` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `messages`
--

INSERT INTO `messages` (`msg_id`, `incoming_msg_id`, `outgoing_msg_id`, `msg`, `imagen`, `tipo`, `fecha`, `hora`, `ip`) VALUES
(173, 1272492351, 439402045, 'sad', '', 0, '2023-03-03', '16:27:40', '127.0.0.1'),
(174, 105, 439402045, 'hey', '', 0, '2023-03-03', '16:31:11', '127.0.0.1'),
(175, 1272492351, 439402045, '', '1677880036img1.jpg', 1, '2023-03-03', '16:47:16', '127.0.0.1'),
(176, 1272492351, 439402045, 'hey', '', 0, '2023-03-04', '08:22:49', '::1'),
(177, 1272492351, 439402045, 'hey', '', 0, '2023-03-06', '07:26:01', '::1'),
(178, 1272492351, 439402045, 'hey', '', 0, '2023-03-06', '07:47:32', '::1'),
(179, 105, 439402045, 'hi', '', 0, '2023-03-06', '07:47:45', '::1'),
(180, 105, 439402045, 'Hola', '', 0, '2023-03-06', '08:08:28', '::1'),
(181, 105, 931285856, 'hey', '', 0, '2023-03-06', '09:02:11', '::1'),
(182, 105, 439402045, 'hi', '', 0, '2023-03-07', '08:13:46', '::1'),
(183, 1272492351, 439402045, 'Hola', '', 0, '2023-03-07', '12:27:38', '172.16.3.5'),
(184, 1272492351, 439402045, 'Como estas ?', '', 0, '2023-03-07', '12:27:41', '172.16.3.5'),
(185, 439402045, 1272492351, '', '1678210121img2.jpeg', 1, '2023-03-07', '12:28:41', '::1'),
(186, 739631376, 829925637, 'Hola Jhoan como estas ?', '', 0, '2023-03-07', '15:13:20', '172.16.3.5'),
(187, 739631376, 829925637, 'Hoal', '', 0, '2023-03-07', '15:50:33', '172.16.3.5'),
(188, 718950861, 739631376, 'hey', '', 0, '2023-03-07', '16:07:33', '127.0.0.1'),
(189, 106, 739631376, 'Hey', '', 0, '2023-03-07', '16:29:55', '::1'),
(190, 739631376, 199019888, 'hey', '', 0, '2023-03-07', '16:32:21', '127.0.0.1'),
(191, 199019888, 739631376, '', '1678224758img2.jpeg', 1, '2023-03-07', '16:32:38', '::1'),
(192, 107, 478897994, 'hey', '', 0, '2023-03-07', '16:45:56', '::1'),
(193, 107, 519515490, 'hi', '', 0, '2023-03-07', '16:46:05', '127.0.0.1'),
(194, 478897994, 519515490, 'hi', '', 0, '2023-03-07', '16:46:24', '127.0.0.1'),
(195, 519515490, 478897994, 'hola', '', 0, '2023-03-07', '16:46:31', '::1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tareas`
--

CREATE TABLE `tareas` (
  `id_tarea` int(50) NOT NULL,
  `id_autor` int(10) NOT NULL,
  `titulo_tarea` varchar(100) NOT NULL,
  `per_delegar` tinyint(1) NOT NULL,
  `f_ini` date NOT NULL,
  `f_fin` date NOT NULL,
  `descrip` varchar(1000) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `unique_id` int(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `rol` int(2) NOT NULL,
  `id_empresa` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`user_id`, `unique_id`, `fname`, `lname`, `username`, `password`, `img`, `status`, `rol`, `id_empresa`) VALUES
(42, 478897994, 'Andres', 'Moreno', 'andres.moreno', 'c93ccd78b2076528346216b3b2f701e6', 'puntual.png', 'Desconectado', 2, 1),
(43, 519515490, 'Jhoan', 'Duarte', 'jhoan.duarte', 'c93ccd78b2076528346216b3b2f701e6', 'clab.jpeg', 'Disponible', 2, 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `areas`
--
ALTER TABLE `areas`
  ADD PRIMARY KEY (`id_area`);

--
-- Indices de la tabla `config_generales`
--
ALTER TABLE `config_generales`
  ADD PRIMARY KEY (`id_config`);

--
-- Indices de la tabla `empresas`
--
ALTER TABLE `empresas`
  ADD PRIMARY KEY (`id_empresa`);

--
-- Indices de la tabla `empresa_grupos`
--
ALTER TABLE `empresa_grupos`
  ADD PRIMARY KEY (`id_grupo`);

--
-- Indices de la tabla `etiquetas`
--
ALTER TABLE `etiquetas`
  ADD PRIMARY KEY (`id_etiqueta`);

--
-- Indices de la tabla `grupos`
--
ALTER TABLE `grupos`
  ADD PRIMARY KEY (`id_grupo`);

--
-- Indices de la tabla `grupo_integrante`
--
ALTER TABLE `grupo_integrante`
  ADD PRIMARY KEY (`id_integrante_grupo`);

--
-- Indices de la tabla `log_sesiones`
--
ALTER TABLE `log_sesiones`
  ADD PRIMARY KEY (`id_log`);

--
-- Indices de la tabla `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indices de la tabla `tareas`
--
ALTER TABLE `tareas`
  ADD PRIMARY KEY (`id_tarea`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `areas`
--
ALTER TABLE `areas`
  MODIFY `id_area` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=226;

--
-- AUTO_INCREMENT de la tabla `config_generales`
--
ALTER TABLE `config_generales`
  MODIFY `id_config` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `empresas`
--
ALTER TABLE `empresas`
  MODIFY `id_empresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `empresa_grupos`
--
ALTER TABLE `empresa_grupos`
  MODIFY `id_grupo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `etiquetas`
--
ALTER TABLE `etiquetas`
  MODIFY `id_etiqueta` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de la tabla `grupos`
--
ALTER TABLE `grupos`
  MODIFY `id_grupo` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT de la tabla `grupo_integrante`
--
ALTER TABLE `grupo_integrante`
  MODIFY `id_integrante_grupo` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT de la tabla `log_sesiones`
--
ALTER TABLE `log_sesiones`
  MODIFY `id_log` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT de la tabla `messages`
--
ALTER TABLE `messages`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=196;

--
-- AUTO_INCREMENT de la tabla `tareas`
--
ALTER TABLE `tareas`
  MODIFY `id_tarea` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
