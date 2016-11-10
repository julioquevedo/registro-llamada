-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-03-2016 a las 00:27:44
-- Versión del servidor: 10.1.9-MariaDB
-- Versión de PHP: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `registro-llamadas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `banners`
--

CREATE TABLE `banners` (
  `idbanner` int(10) NOT NULL,
  `frase_1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `frase_2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `frase_3` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `titulo` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `imagen` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `orden` int(11) NOT NULL,
  `estado` char(1) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `banners`
--

INSERT INTO `banners` (`idbanner`, `frase_1`, `frase_2`, `frase_3`, `titulo`, `imagen`, `orden`, `estado`) VALUES
(1, 'Is a long established fact that', 'he generated Lorem Ipsum is therefore always free', 'The standard chunk of', '', '8323615160043_1.jpg', 1, 'A'),
(2, 'Is a long established fact that', 'he generated Lorem Ipsum is therefore always free', 'The standard chunk of', '', '4228378_1.png', 2, 'A'),
(3, 'Is a long established fact that', 'he generated Lorem Ipsum is therefore always free', 'The standard chunk of', '', '8650492_1.png', 3, 'A'),
(4, 'Is a long established fact that', 'he generated Lorem Ipsum is therefore always free', 'The standard chunk of', '', '4822921308405_1.jpg', 4, 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` int(3) NOT NULL,
  `nombres` varchar(100) COLLATE utf8_spanish_ci NOT NULL DEFAULT '',
  `apellidos` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `dni` int(8) NOT NULL,
  `telefonos` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `estado` char(1) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_registro` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `nombres`, `apellidos`, `dni`, `telefonos`, `estado`, `fecha_registro`) VALUES
(1, 'Doralice', 'RAMPAS LINARES', 46229221, '999999999', 'A', '0000-00-00 00:00:00'),
(2, 'Delia Jovita', 'MEZA BACA', 46384183, '999999999', 'A', '0000-00-00 00:00:00'),
(3, 'Harold Yvanhoe', 'JARAMILLO CHIRINOS', 40638119, '999999999', 'A', '0000-00-00 00:00:00'),
(4, 'Orion Antares', 'ARELLANO HUAMAN', 42104523, '999999999', 'A', '0000-00-00 00:00:00'),
(5, 'William Alexander', 'APOLAYA RUIZ', 45688720, '999999999', 'A', '0000-00-00 00:00:00'),
(6, 'Julio Isidro', 'QUEVEDO GOMEZ', 41716444, '999999999', 'A', '0000-00-00 00:00:00'),
(7, 'Armando Roger', 'MI', 9522740, '999999999', 'A', '0000-00-00 00:00:00'),
(8, 'Judith', 'MERINO NATORCE', 45258261, '999999999', 'A', '0000-00-00 00:00:00'),
(9, 'Patrick', 'MATOS LEANDRO', 42900045, '999999999', 'A', '0000-00-00 00:00:00'),
(10, 'Jose Alfredo', 'MATAMOROS CARRANZA', 42169099, '999999999', 'A', '0000-00-00 00:00:00'),
(11, 'Luis Miguel', 'MACHUCA MELENDEZ', 10590100, '999999999', 'A', '0000-00-00 00:00:00'),
(12, 'Joe Francisco', 'LESCANO GASTELU', 40643794, '999999999', 'A', '0000-00-00 00:00:00'),
(13, 'Luis Humberto', 'HUAPAYA RIVERA', 12345678, '96587451456', 'I', '0000-00-00 00:00:00'),
(14, 'Hernan Alex', 'FLORES VILCHEZ', 10528695, '999999999', 'A', '0000-00-00 00:00:00'),
(16, 'fw', 'fwf', 0, 'r24r42', 'A', '2016-03-11 10:54:30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `configuracion`
--

CREATE TABLE `configuracion` (
  `id` int(5) NOT NULL,
  `llave` varchar(150) COLLATE utf8_spanish_ci DEFAULT NULL,
  `valor` text COLLATE utf8_spanish_ci,
  `descripcion` text COLLATE utf8_spanish_ci,
  `tipo` tinyint(1) NOT NULL DEFAULT '0',
  `orden` int(11) NOT NULL,
  `visible` int(1) NOT NULL COMMENT '0: No visible para editarlo ; 1: si visible para editarlo'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `configuracion`
--

INSERT INTO `configuracion` (`id`, `llave`, `valor`, `descripcion`, `tipo`, `orden`, `visible`) VALUES
(23, 'correo_notificaciones', 'julioquevedog@gmail.com', 'Correo al que llegaran las notificaciones de la web.eguinea@markarinaeirl.com', 0, 3, 1),
(22, 'correo_portada', 'info@sistemasdetiempo.com', 'Es el correo que se mostrara y estará visible en el Portal Web.', 0, 2, 1),
(14, 'enlace_facebook', 'https://www.facebook.com/SistemasdeTiempo', 'Se coloca la ruta url completa hacia la cuenta de Facebook.', 0, 11, 1),
(10, 'categorias_x_pagina', '3', 'Es el numero de categorias que se mostraran en la seccion catalogo', 0, 6, 1),
(7, 'telefonos_portada', '506 2248-3636', 'Es el numero de telefono que ira en el cabecera del portal o pie de pagina', 0, 1, 1),
(3, 'productos_x_pagina', '3', 'Es el numero de productos que iran en la seccion de productos', 0, 4, 1),
(27, 'destacados_inicio', '6', 'Es el numero de productos destacados que apareceran en el HOME de laweb\n', 0, 9, 1),
(28, 'num_pag_adm', '10', 'Es el numero de elementos dentro de los listados en el administrador', 0, 5, 0),
(32, 'enlace_youtube', 'https://www.youtube.com/watch?v=Cmo6mNxV8Sw', 'Direccion url completa del video en youtube', 0, 1, 1),
(31, 'enlace_twitter', 'https://twitter.com/Capital967', 'Se coloca la ruta url completa hacia la cuenta de Twitter.', 0, 11, 1),
(30, 'direccion_portada', 'San José, Costa Rica. La Uruca frente a Faco, contigua a DHL. Apartado Postal: 223-1100 Tibas.', 'Es la direccion que ira en el portal web', 0, 1, 1),
(35, 'suministros_x_pagina', '3', 'Es el numero de suministros que se mostraran en la seccion suministros', 0, 6, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `encuesta1`
--

CREATE TABLE `encuesta1` (
  `id` int(11) NOT NULL,
  `id_trabajo` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_lista` int(11) NOT NULL,
  `p1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `p2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `p3` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `p4` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `p5` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `p6` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `p7` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lista`
--

CREATE TABLE `lista` (
  `id_lista` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `lista`
--

INSERT INTO `lista` (`id_lista`) VALUES
(1),
(2),
(3),
(4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lista_detalle`
--

CREATE TABLE `lista_detalle` (
  `id_detalle` int(11) NOT NULL,
  `id_lista` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `lista_detalle`
--

INSERT INTO `lista_detalle` (`id_detalle`, `id_lista`, `id_cliente`) VALUES
(9, 2, 5),
(10, 2, 6),
(11, 2, 7),
(12, 2, 8),
(13, 1, 3),
(14, 1, 6),
(15, 3, 1),
(16, 3, 3),
(17, 3, 4),
(18, 3, 5),
(19, 3, 6),
(20, 3, 7),
(21, 3, 9),
(27, 4, 7),
(28, 4, 8),
(29, 4, 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trabajos`
--

CREATE TABLE `trabajos` (
  `id_trabajo` int(3) NOT NULL,
  `id_usuario` int(3) NOT NULL,
  `f_inicio` date NOT NULL,
  `f_registro` date NOT NULL,
  `id_lista` int(11) NOT NULL,
  `encuesta` int(11) NOT NULL DEFAULT '1',
  `estado` char(1) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `trabajos`
--

INSERT INTO `trabajos` (`id_trabajo`, `id_usuario`, `f_inicio`, `f_registro`, `id_lista`, `encuesta`, `estado`) VALUES
(1, 2, '2016-03-14', '0000-00-00', 1, 1, 'I'),
(2, 4, '2016-03-12', '2016-03-11', 2, 1, 'A'),
(4, 5, '2016-03-12', '2016-03-11', 4, 2, 'I');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` mediumint(5) NOT NULL,
  `password` varchar(12) COLLATE utf8_spanish_ci DEFAULT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `usuario` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `estado` char(1) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_registro` datetime NOT NULL,
  `nivel` int(1) NOT NULL,
  `delete` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `password`, `nombre`, `usuario`, `email`, `telefono`, `estado`, `fecha_registro`, `nivel`, `delete`) VALUES
(1, '123', 'Administrador', 'admin', 'julioquevedog@gmail.com', '', 'A', '2015-08-15 09:35:46', 1, 0),
(2, '12', 'Cecilia Caballero', 'usuario1', 'julioquevedog@gmail.com', '992852798', 'A', '2015-08-17 17:09:20', 0, 0),
(3, '12', 'Violeta Ramos', 'usuario2', 'violeta@gmail.com', '999999', 'I', '2016-03-06 17:58:05', 0, 1),
(4, 'kiloman', 'Leonardo Cespedes', 'leonardoc', 'leonardo@gmail.com', '0099999', 'A', '2016-03-06 22:17:32', 0, 0),
(5, '123', 'Julio Quevedo', 'julioq', 'julioquevedog@gmail.com', '992852798', 'I', '2016-03-09 04:01:59', 0, 1),
(7, 'dasdqq', 'sdqqqq', 'sadasqq', 'julioquevedog@gmail.comqq', 'asdsadqq', 'I', '2016-03-11 10:52:50', 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuariosbk`
--

CREATE TABLE `usuariosbk` (
  `id` mediumint(5) NOT NULL,
  `usuario` varchar(12) COLLATE utf8_spanish_ci DEFAULT NULL,
  `password` varchar(12) COLLATE utf8_spanish_ci DEFAULT NULL,
  `nombre` varchar(250) COLLATE utf8_spanish_ci DEFAULT NULL,
  `estado` char(1) COLLATE utf8_spanish_ci NOT NULL,
  `nivel` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0:normal - 1:admin'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuariosbk`
--

INSERT INTO `usuariosbk` (`id`, `usuario`, `password`, `nombre`, `estado`, `nivel`) VALUES
(1, 'admin', '12', 'Administrator', 'A', 1),
(4, 'usuario1', '123', 'Eduardo Rosadio', 'A', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`idbanner`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indices de la tabla `configuracion`
--
ALTER TABLE `configuracion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `encuesta1`
--
ALTER TABLE `encuesta1`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lista`
--
ALTER TABLE `lista`
  ADD PRIMARY KEY (`id_lista`);

--
-- Indices de la tabla `lista_detalle`
--
ALTER TABLE `lista_detalle`
  ADD PRIMARY KEY (`id_detalle`);

--
-- Indices de la tabla `trabajos`
--
ALTER TABLE `trabajos`
  ADD PRIMARY KEY (`id_trabajo`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuariosbk`
--
ALTER TABLE `usuariosbk`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `banners`
--
ALTER TABLE `banners`
  MODIFY `idbanner` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT de la tabla `configuracion`
--
ALTER TABLE `configuracion`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT de la tabla `encuesta1`
--
ALTER TABLE `encuesta1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `lista`
--
ALTER TABLE `lista`
  MODIFY `id_lista` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `lista_detalle`
--
ALTER TABLE `lista_detalle`
  MODIFY `id_detalle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT de la tabla `trabajos`
--
ALTER TABLE `trabajos`
  MODIFY `id_trabajo` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` mediumint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `usuariosbk`
--
ALTER TABLE `usuariosbk`
  MODIFY `id` mediumint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
