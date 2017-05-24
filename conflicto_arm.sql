-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-05-2017 a las 02:40:12
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

--
-- Volcado de datos para la tabla `preguntas`
--

INSERT INTO `preguntas` (`id`, `nombre_pregunta`, `texto_pregunta`, `subtema_id`, `respuesta_1`, `respuesta_2`, `respuesta_3`, `respuesta_4`, `pregunta_correcta`, `activo`) VALUES
(1, 'inicio conflicto', 'En que aÃ±o inicio el conflicto armado en colombia', 1, '1994', '1895', '1800', '1500', '1895', ''),
(2, 'grupo armado', 'cual fue el primer grupo armado del conflicto', 1, 'auc', 'farc', 'eln', 'm19', 'auc', ''),
(3, 'pelea', 'porque peleaban los grupos aramdos', 3, 'oro', 'territorio', 'enemistad', 'ninguna de las anteriores', 'territorio', ''),
(4, 'toma', 'Que tomaban los grupos armados de la sociedad', 3, 'secuestrados', 'tierras', 'dinero', 'familias', 'secuestrados', ''),
(5, 'inicio proceso', 'En que gobierno inicio el proceso de paz', 5, 'uribe', 'santos', 'pastrana', 'bolivar', 'pastrana', ''),
(6, 'fin procesos', 'En que gobierno se culminaron los procesos de paz con las farc', 5, 'uribe', 'santos', 'pastrana', 'maduro', 'santos', '');

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
(1, 'Inicion del conflicto', 'http://www.youtube.com', 'el conflicto armado inicion en el aÃ±o de 1895 y el principal grupo armado fue auc', '1', 'inicio'),
(3, 'Guerra', 'http://www.youtube.com', 'grupos armado peleaban principalmente por el territorio y toamaban secuestrados', '1', 'nudo'),
(5, 'Proceso', 'http://www.youtube.com', 'Los procesos de paz iniciaron desde la presidencia de pastrana pero en el gobierno santos se culminaron', '1', 'desenlace');

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
(2, 'Santiago', 'Quevedo', 'Nas', '', '1994-04-20', 'M', 'nasquevedo@gmail.com', 'skatewayteam', 'skatewayteam', '2'),
(3, 'DAni', 'umbarila', 'dani891122', '', '1989-11-22', 'M', 'dani@mail.com', '12345678', '12345678', '2'),
(4, 'paco', 'casual', 'paco123', '', '1900-02-02', 'M', 'aaa@ss.com', 'aaa123', 'aaa123', '2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_respuestas`
--

CREATE TABLE `usuario_respuestas` (
  `id` int(12) NOT NULL,
  `usuario_id` int(12) NOT NULL,
  `pregunta_id` int(12) NOT NULL,
  `respuesta` varchar(200) NOT NULL,
  `puntuacion` int(1) NOT NULL,
  `activo` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario_respuestas`
--

INSERT INTO `usuario_respuestas` (`id`, `usuario_id`, `pregunta_id`, `respuesta`, `puntuacion`, `activo`) VALUES
(7, 4, 1, '1895', 1, 1),
(8, 4, 2, 'auc', 1, 1),
(9, 4, 3, 'territorio', 1, 1),
(10, 4, 4, 'tierras', 0, 1),
(11, 4, 5, 'pastrana', 1, 1),
(12, 4, 6, 'santos', 1, 1);

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
-- Indices de la tabla `usuario_respuestas`
--
ALTER TABLE `usuario_respuestas`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `subtemas`
--
ALTER TABLE `subtemas`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `usuario_respuestas`
--
ALTER TABLE `usuario_respuestas`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
