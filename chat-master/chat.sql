-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-02-2023 a las 22:47:50
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
(82, 'Grupo con toods', 1222197857),
(83, 'Grupo con Juan', 922397712);

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
(50, 82, 153032514),
(51, 82, 371933368),
(52, 82, 922397712),
(53, 82, 1222197857),
(54, 83, 153032514),
(55, 83, 922397712);

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
  `tipo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `messages`
--

INSERT INTO `messages` (`msg_id`, `incoming_msg_id`, `outgoing_msg_id`, `msg`, `imagen`, `tipo`) VALUES
(77, 82, 922397712, '', '1677255682img2.jpeg', 1),
(78, 82, 922397712, 'Hola', '', 0),
(79, 82, 153032514, 'Hey', '', 0),
(80, 153032514, 1222197857, 'Hola', '', 0),
(81, 1222197857, 153032514, 'Buenas tardes', '', 0),
(82, 1222197857, 153032514, '', '1677268782img1.jpg', 1),
(83, 153032514, 1222197857, '', '1677268794img2.jpeg', 1),
(84, 153032514, 1222197857, 'ok', '', 0),
(85, 82, 1222197857, '', '1677268847img1.jpg', 1),
(86, 82, 1222197857, 'ok', '', 0),
(87, 82, 153032514, 'hi', '', 0),
(88, 82, 371933368, '', '1677273121img2.jpeg', 1);

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
(7, 1222197857, 'Jhoan', 'Duarte', 'admin@admin.com', 'c93ccd78b2076528346216b3b2f701e6', '1677154641img2.jpeg', 'Offline now', 0),
(8, 922397712, 'Pepito', 'Perez', 'admin2@admin.com', 'c93ccd78b2076528346216b3b2f701e6', '1677154719img1.jpg', 'Offline now', 0),
(9, 371933368, 'Carlos', 'Sanchez', 'admin3@admin.com', 'c93ccd78b2076528346216b3b2f701e6', '1677155077img2.jpeg', 'Disponible', 0),
(10, 153032514, 'Juan', 'Perez', 'usuario@usuario.com', 'c93ccd78b2076528346216b3b2f701e6', '1677158090img1.jpg', 'Offline now', 1);

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
  MODIFY `id_grupo` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT de la tabla `grupo_integrante`
--
ALTER TABLE `grupo_integrante`
  MODIFY `id_integrante_grupo` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT de la tabla `messages`
--
ALTER TABLE `messages`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
