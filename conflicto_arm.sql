-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-05-2017 a las 06:20:57
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 7.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `conflicto_arm`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE `permisos` (
  `id` int(12) NOT NULL,
  `codigo_permiso` varchar(200) NOT NULL,
  `nombre_permiso` varchar(200) NOT NULL,
  `activo` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `permisos`
--

INSERT INTO `permisos` (`id`, `codigo_permiso`, `nombre_permiso`, `activo`) VALUES
(1, 'ADMIN', 'Administrador', 1),
(2, 'PLAYER', 'Jugador', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preguntas`
--

CREATE TABLE `preguntas` (
  `id` int(12) NOT NULL,
  `nombre_pregunta` varchar(200) NOT NULL,
  `texto_pregunta` text NOT NULL,
  `subtema_id` int(12) NOT NULL,
  `respuesta_1` varchar(500) NOT NULL,
  `respuesta_2` varchar(500) NOT NULL,
  `respuesta_3` varchar(500) NOT NULL,
  `respuesta_4` varchar(500) NOT NULL,
  `pregunta_correcta` varchar(500) NOT NULL,
  `activo` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subtemas`
--

CREATE TABLE `subtemas` (
  `id` int(12) NOT NULL,
  `nombre_subtema` varchar(200) NOT NULL,
  `video` varchar(500) NOT NULL,
  `texto` text NOT NULL,
  `activo` varchar(1) NOT NULL,
  `tema` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `subtemas`
--

INSERT INTO `subtemas` (`id`, `nombre_subtema`, `video`, `texto`, `activo`, `tema`) VALUES
(1, 'montes de maria', 'http://www.youtube.com.co', 'en ese lugar los campesinos se alzaron en armas y asi nacieron las farc', '1', 'inicio'),
(2, 'subtema prueba', 'http://www.youtube.com', 'subtema de prueba', '1', 'nudo'),
(3, 'Proceso', 'http://www.youtube.com', 'Proceso de Paz Uribe', '1', 'desenlace'),
(4, 'farc', '', 'las farc se alzaron en armas por los derechos del peblo', '1', 'inicio'),
(5, 'fuerza publica', '', 'colombia', '1', 'inicio');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(12) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `apellido` varchar(200) NOT NULL,
  `nombre_avatar` varchar(200) NOT NULL,
  `avatar` varchar(200) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `sexo` varchar(200) NOT NULL,
  `correo_electronico` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `confirmar_password` varchar(200) NOT NULL,
  `permisos_id` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `nombre_avatar`, `avatar`, `fecha_nacimiento`, `sexo`, `correo_electronico`, `password`, `confirmar_password`, `permisos_id`) VALUES
(1, 'Dago', 'Arias', 'dagoa', '', '0000-00-00', 'M', 'dago@gmail.com', 'skate', 'skate', '1'),
(2, 'Santiago', 'Quevedo', 'Nas', '', '1994-04-20', 'M', 'nasquevedo@gmail.com', 'skatewayteam', 'skatewayteam', '2');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idx_nombre_pregunta` (`nombre_pregunta`);

--
-- Indices de la tabla `subtemas`
--
ALTER TABLE `subtemas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idx_nombre_subtema` (`nombre_subtema`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idx_nombre_avatar` (`nombre_avatar`),
  ADD UNIQUE KEY `idx_correo_electronico` (`correo_electronico`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `permisos`
--
ALTER TABLE `permisos`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `subtemas`
--
ALTER TABLE `subtemas`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
