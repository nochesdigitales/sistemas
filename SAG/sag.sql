-- phpMyAdmin SQL Dump
-- version 4.6.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 13-06-2017 a las 19:06:40
-- Versión del servidor: 5.7.12-log
-- Versión de PHP: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sag`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno`
--

CREATE TABLE `alumno` (
  `cedula` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `clave` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `nombre` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `lugarnac` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `fechanac` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `edad` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `sexo` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `telefono` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `direccion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `nombreconta` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `celconta` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `telconta` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `direconta` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `emailconta` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `expectativas` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `conocimientos` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cursos` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `alumno`
--

INSERT INTO `alumno` (`cedula`, `clave`, `nombre`, `lugarnac`, `fechanac`, `edad`, `sexo`, `telefono`, `direccion`, `email`, `nombreconta`, `celconta`, `telconta`, `direconta`, `emailconta`, `expectativas`, `conocimientos`, `cursos`) VALUES
('1', '1', '1', '1', '1', '1', '1', '1', '1', 'rafa@gmail.com', '1', '1', '1', '1', '1', '1', '1', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notas`
--

CREATE TABLE `notas` (
  `idnota` int(10) NOT NULL,
  `idcurso` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `nommodulo` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `idalumno` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `nombre` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `nota` varchar(3) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `notas`
--

INSERT INTO `notas` (`idnota`, `idcurso`, `nommodulo`, `idalumno`, `nombre`, `nota`) VALUES
(24, '1', 'AYUDANTE DE COCINA', '15620262', 'RAFAEL PEREZ', '20'),
(23, '1', 'COCINERO A Y B', '15620262', 'RAFAEL PEREZ', '15'),
(22, '1', 'PRIMER COCINERO', '15620262', 'RAFAEL PEREZ', '20');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD PRIMARY KEY (`cedula`);

--
-- Indices de la tabla `notas`
--
ALTER TABLE `notas`
  ADD PRIMARY KEY (`idnota`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
