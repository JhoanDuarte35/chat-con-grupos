-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-02-2023 a las 22:54:35
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
(86, 'BBVA 2', 451926526),
(87, 'Grupo2', 605042291);

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
(63, 86, 451926526),
(64, 86, 1543513836),
(65, 87, 701764960),
(66, 87, 1543513836),
(67, 87, 605042291),
(68, 87, 451926526);

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
(1, 451926526, '2023-02-27', '14:20:35', '::1'),
(2, 605042291, '2023-02-27', '09:01:06', '::1'),
(3, 451926526, '2023-02-27', '09:17:58', '::1'),
(4, 605042291, '2023-02-27', '10:47:20', '::1'),
(5, 451926526, '2023-02-27', '10:51:23', '::1'),
(6, 605042291, '2023-02-27', '12:29:42', '::1'),
(7, 451926526, '2023-02-27', '13:41:13', '::1'),
(8, 605042291, '2023-02-27', '13:43:12', '::1'),
(9, 605042291, '2023-02-27', '16:46:34', '::1'),
(10, 605042291, '2023-02-27', '16:49:28', '::1');

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
  `hora` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `messages`
--

INSERT INTO `messages` (`msg_id`, `incoming_msg_id`, `outgoing_msg_id`, `msg`, `imagen`, `tipo`, `fecha`, `hora`) VALUES
(121, 86, 451926526, '', '1677500424img1.jpg', 1, '2023-02-27', '07:20:24'),
(122, 86, 1543513836, 'hey', '', 0, '2023-02-27', '07:20:47'),
(123, 1543513836, 451926526, 'Hey', '', 0, '2023-02-27', '07:26:59'),
(124, 451926526, 1543513836, 'hi', '', 0, '2023-02-27', '07:27:05'),
(125, 86, 451926526, 'hey', '', 0, '2023-02-27', '13:47:57'),
(126, 86, 451926526, 'hey', '', 0, '2023-02-27', '13:48:01'),
(127, 87, 451926526, 'hey', '', 0, '2023-02-27', '13:51:49');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `unique_id` int(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `rol` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`user_id`, `unique_id`, `fname`, `lname`, `email`, `password`, `img`, `status`, `rol`) VALUES
(11, 451926526, 'Jhoan', 'Duarte', 'admin@admin.com', 'c93ccd78b2076528346216b3b2f701e6', '1677335960uchuva-20211014.jpg', 'Disponible', 2),
(13, 1543513836, 'Juan ', 'Perez', 'admin2@admin.com', 'c93ccd78b2076528346216b3b2f701e6', '1677499870img2.jpeg', 'Offline now', 1),
(14, 605042291, 'Julio', 'Lopez', 'admin3@admin.com', 'c93ccd78b2076528346216b3b2f701e6', '1677500014img1.jpg', 'Disponible', 2),
(15, 701764960, 'Pepe', 'Duarte', 'usuario@usuario.com', 'c93ccd78b2076528346216b3b2f701e6', '1677523618img1.jpg', 'Disponible', 1);

--
-- Índices para tablas volcadas
--

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
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `grupos`
--
ALTER TABLE `grupos`
  MODIFY `id_grupo` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT de la tabla `grupo_integrante`
--
ALTER TABLE `grupo_integrante`
  MODIFY `id_integrante_grupo` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT de la tabla `log_sesiones`
--
ALTER TABLE `log_sesiones`
  MODIFY `id_log` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `messages`
--
ALTER TABLE `messages`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
