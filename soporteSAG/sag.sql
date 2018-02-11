-- phpMyAdmin SQL Dump
-- version 4.6.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 11-02-2018 a las 20:39:59
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
  `edad` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `sexo` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `telefono` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `direccion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `alumno`
--

INSERT INTO `alumno` (`cedula`, `clave`, `nombre`, `lugarnac`, `fechanac`, `edad`, `sexo`, `telefono`, `direccion`, `email`) VALUES
('15620262', '15620262', 'RAFAEL PEREZ', 'MERIDA', '1', '35', 'M', '0414', 'MERIDA', 'RAFA@GMAIL.COM'),
('22986613', '1233', 'Luis Izarra', '', '12-12-2004', '23', 'S', '04247774919', 'merida', 'w@gmail.com'),
('', '', '', '', '', '2017', 'S', '', '', ''),
('13901901', '1211', 'MIGUEL OMAÑA', '', '1995-11-06', '2016.99999', 'E', '04246561723', 'MERIDA', 'RAFA@GMAIL.COM'),
('4701242', '1211', 'MARIA GUERERRO', '', '1950-01-08', '2016.9999996528', 'E', '0426', 'MERIDA', 'MARIA@GMAIL.COM');

--
-- Disparadores `alumno`
--
DELIMITER $$
CREATE TRIGGER `trigger_alumno_del` AFTER DELETE ON `alumno` FOR EACH ROW INSERT INTO bitacora (clave, nombre, usuario, modificado, accion, modulo) VALUES (OLD.clave, OLD.nombre, CURRENT_USER(), NOW(), 'Borrado' , 'alumno')
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `trigger_alumno_ins` AFTER INSERT ON `alumno` FOR EACH ROW INSERT INTO bitacora (clave, nombre, usuario, modificado, accion, modulo) VALUES (NEW.clave, NEW.nombre, CURRENT_USER(), NOW(), 'Guardado' , 'alumno')
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `trigger_alumno_upd` AFTER UPDATE ON `alumno` FOR EACH ROW INSERT INTO bitacora (clave, nombre, usuario, modificado, accion, modulo) VALUES (OLD.clave, OLD.nombre, CURRENT_USER(), NOW(), 'Editado' , 'alumno')
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bitacora`
--

CREATE TABLE `bitacora` (
  `id` int(11) NOT NULL,
  `clave` varchar(100) DEFAULT NULL,
  `nombre` varchar(10) DEFAULT NULL,
  `usuario` varchar(40) DEFAULT NULL,
  `modificado` datetime DEFAULT NULL,
  `accion` varchar(100) DEFAULT NULL,
  `modulo` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `bitacora`
--

INSERT INTO `bitacora` (`id`, `clave`, `nombre`, `usuario`, `modificado`, `accion`, `modulo`) VALUES
(1, '123', 'Luis Izarr', 'root@localhost', '2017-11-13 19:02:33', 'Editado', 'alumno'),
(2, '1211', 'ANDRES ENR', 'root@localhost', '2017-11-13 19:02:38', 'Borrado', 'alumno'),
(3, '45', '2017C', 'root@localhost', '2017-11-13 19:08:25', 'Editado', 'cursos'),
(4, '2', '2017A', 'root@localhost', '2017-11-13 19:08:30', 'Borrado', 'cursos'),
(5, '1211', 'MIGUEL RUI', 'root@localhost', '2017-11-13 19:10:27', 'Editado', 'alumno'),
(6, '5', '2017C', 'root@localhost', '2017-11-13 19:10:36', 'Borrado', 'cursos'),
(7, '9', '', 'root@localhost', '2017-11-13 20:07:21', 'Borrado', 'E/S'),
(8, '10', '11', 'root@localhost', '2017-11-13 20:07:21', 'Borrado', 'E/S'),
(9, '11', '3', 'root@localhost', '2017-11-13 20:07:21', 'Borrado', 'E/S'),
(10, '12', '1', 'root@localhost', '2017-11-13 20:07:21', 'Borrado', 'E/S'),
(11, '13', '1', 'root@localhost', '2017-11-13 20:07:21', 'Borrado', 'E/S'),
(12, '14', '1', 'root@localhost', '2017-11-13 20:07:21', 'Borrado', 'E/S'),
(13, '22', '1', 'root@localhost', '2017-11-13 20:07:34', 'Borrado', 'nota'),
(14, '23', '2', 'root@localhost', '2017-11-13 20:07:34', 'Borrado', 'nota'),
(15, '24', '1', 'root@localhost', '2017-11-13 20:07:34', 'Borrado', 'nota'),
(16, '1', 'IUTCM', 'root@localhost', '2017-11-13 20:08:08', 'Editado', 'empresa'),
(17, '123', '2017B', 'root@localhost', '2017-11-13 20:08:17', 'Borrado', 'cursos'),
(18, '', '', 'root@localhost', '2017-11-19 22:17:15', 'Guardado', 'alumno');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos`
--

CREATE TABLE `cursos` (
  `idcurso` int(11) NOT NULL,
  `periodo` varchar(25) NOT NULL,
  `fechacurso` varchar(25) NOT NULL,
  `idfacilitador` varchar(50) NOT NULL,
  `nombrefac` varchar(80) NOT NULL,
  `estatus` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cursos`
--

INSERT INTO `cursos` (`idcurso`, `periodo`, `fechacurso`, `idfacilitador`, `nombrefac`, `estatus`) VALUES
(1, '2017A', '12-12-2017', '15620262', 'JESUS JUAREZ', 'A'),
(4, '2017B', '12-12-2016', '10106333', 'ILDEMARO MOLINA', 'I'),
(45, '2017B', '12-11-2017', '10106333', 'Lenix OmaÃƒÂ±a', 'A');

--
-- Disparadores `cursos`
--
DELIMITER $$
CREATE TRIGGER `trigger_cursos_del` AFTER DELETE ON `cursos` FOR EACH ROW INSERT INTO bitacora (clave, nombre, usuario, modificado, accion, modulo) VALUES (OLD.idcurso, OLD.periodo, CURRENT_USER(), NOW(), 'Borrado' , 'cursos')
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `trigger_cursos_ins` AFTER INSERT ON `cursos` FOR EACH ROW INSERT INTO bitacora (clave, nombre, usuario, modificado, accion, modulo) VALUES (NEW.idcurso, NEW.periodo, CURRENT_USER(), NOW(), 'Guardado' , 'cursos')
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `trigger_cursos_upd` AFTER UPDATE ON `cursos` FOR EACH ROW INSERT INTO bitacora (clave, nombre, usuario, modificado, accion, modulo) VALUES (OLD.idcurso, OLD.periodo, CURRENT_USER(), NOW(), 'Editado' , 'cursos')
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `id` int(11) NOT NULL,
  `empresa` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `pais` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ciudad` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `direccion` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `correo` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `director` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `coordinador` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `nit` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tel` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `fax` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `web` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `instagram` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `twitter` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `facebook` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`id`, `empresa`, `pais`, `ciudad`, `direccion`, `correo`, `director`, `coordinador`, `nit`, `tel`, `fax`, `web`, `instagram`, `twitter`, `facebook`) VALUES
(1, 'IUTCM', 'Venezuela', 'Merida', 'Av. Urdaneta Calle 17', 'gastronomia@iutcm.edu.ve', 'Dr. Carlos J. Ojeda S.', 'Lcda. Milagros Zambrano', '1235', '23456789', '234567', 'www.iutcm.edu.ve', 'www.instagram.com/gastronomia', 'www.twitter.com/gastronomia', 'www.facebook.com/gastronomia');

--
-- Disparadores `empresa`
--
DELIMITER $$
CREATE TRIGGER `trigger_empresa_del` AFTER DELETE ON `empresa` FOR EACH ROW INSERT INTO bitacora (clave, nombre, usuario, modificado, accion, modulo) VALUES (OLD.id, OLD.empresa, CURRENT_USER(), NOW(), 'Borrado' , 'empresa')
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `trigger_empresa_ins` AFTER INSERT ON `empresa` FOR EACH ROW INSERT INTO bitacora (clave, nombre, usuario, modificado, accion, modulo) VALUES (NEW.id, NEW.empresa, CURRENT_USER(), NOW(), 'Guardado' , 'empresa')
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `trigger_empresa_upd` AFTER UPDATE ON `empresa` FOR EACH ROW INSERT INTO bitacora (clave, nombre, usuario, modificado, accion, modulo) VALUES (OLD.id, OLD.empresa, CURRENT_USER(), NOW(), 'Editado' , 'empresa')
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facilitador`
--

CREATE TABLE `facilitador` (
  `idfacilitador` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `nombrefac` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `emailfac` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `telfac` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `grado` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `disponibilidad` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `facilitador`
--

INSERT INTO `facilitador` (`idfacilitador`, `nombrefac`, `emailfac`, `telfac`, `grado`, `disponibilidad`) VALUES
('10106333', 'Lenix OmaÃƒÂ±a', 'lenix@gmail.com', '0424', 'Chef', '40'),
('17862342', 'Anthony Perez', 'anto@gmail.com', '0212', 'Ch', '34'),
('4', '4', '4', '4', 'Ch', '45'),
('14312965', 'MARIA AUXILIADORA GUERRERO', 'MARIAGUERRERO@GMAIL.COM', '04247774919', 'Chef', '20'),
('765432', 'MARCA', 'RAFA@GMAIL.VOM', '9171', 'CHEF', '12');

--
-- Disparadores `facilitador`
--
DELIMITER $$
CREATE TRIGGER `trigger_facilitador_del` AFTER DELETE ON `facilitador` FOR EACH ROW INSERT INTO bitacora (clave, nombre, usuario, modificado, accion, modulo) VALUES (OLD.idfacilitador, OLD.nombrefac, CURRENT_USER(), NOW(), 'Borrado' , 'facilitador')
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `trigger_facilitador_ins` AFTER INSERT ON `facilitador` FOR EACH ROW INSERT INTO bitacora (clave, nombre, usuario, modificado, accion, modulo) VALUES (NEW.idfacilitador, NEW.nombrefac, CURRENT_USER(), NOW(), 'Guardado' , 'facilitador')
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `trigger_facilitador_upd` AFTER UPDATE ON `facilitador` FOR EACH ROW INSERT INTO bitacora (clave, nombre, usuario, modificado, accion, modulo) VALUES (OLD.idfacilitador, OLD.nombrefac, CURRENT_USER(), NOW(), 'Editado' , 'facilitador')
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscripcion`
--

CREATE TABLE `inscripcion` (
  `idinscripcion` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `idcurso` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `horario` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `dia` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `horac` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `idalumno` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `nombre` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `pago` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `fecha` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `recaudos` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `inscripcion`
--

INSERT INTO `inscripcion` (`idinscripcion`, `idcurso`, `horario`, `dia`, `horac`, `idalumno`, `nombre`, `pago`, `fecha`, `recaudos`) VALUES
('2', '1', 'MODULO II', 'VIERNES', '2PM A 4PM', '30000000', 'PEREZ DALLAS LIZ ALEXANDRA', 'pago', '', ''),
('3', '1', 'MODULO II', 'VIERNES', '2PM A 4PM', '20000000', 'MAYRA PEÃƒÆ’Ã¢â‚¬ËœA', 'pago', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscripciones`
--

CREATE TABLE `inscripciones` (
  `idinsc` int(11) NOT NULL,
  `idcurso` int(11) NOT NULL,
  `periodo` varchar(100) NOT NULL,
  `fechacurso` varchar(100) NOT NULL,
  `idfacilitador` int(11) NOT NULL,
  `nombrefac` varchar(100) NOT NULL,
  `cedula` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `pago` int(11) NOT NULL,
  `fechainsc` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `inscripciones`
--

INSERT INTO `inscripciones` (`idinsc`, `idcurso`, `periodo`, `fechacurso`, `idfacilitador`, `nombrefac`, `cedula`, `nombre`, `pago`, `fechainsc`) VALUES
(1, 1, '2017B', '2017-10-18', 1, 'Rafa', 15620262, 'Rafa', 0, '2017-11-13'),
(23, 1, '2017A', '12-12-2017', 15620262, 'JESUS JUAREZ', 21457624, 'ANDRES ENRIQUE RAMIREZ OMAÑA', 0, '2017-11-20'),
(24, 1, '2017A', '12-12-2017', 15620262, 'JESUS JUAREZ', 15620262, 'RAFAEL PEREZ', 0, '0000-00-00'),
(25, 1, '2017A', '12-12-2017', 15620262, 'JESUS JUAREZ', 15620262, 'RAFAEL PEREZ', 0, '0000-00-00'),
(26, 2, '2017A', '12-12-2016', 15620262, 'JESUS JUAREZ', 15620262, 'RAFAEL PEREZ', 0, '0000-00-00'),
(27, 1, '2017A', '12-12-2017', 15620262, 'JESUS JUAREZ', 15620262, 'RAFAEL PEREZ', 0, '0000-00-00');

--
-- Disparadores `inscripciones`
--
DELIMITER $$
CREATE TRIGGER `trigger_inscripciones_del` AFTER DELETE ON `inscripciones` FOR EACH ROW INSERT INTO bitacora (clave, nombre, usuario, modificado, accion, modulo) VALUES (OLD.idinsc, OLD.idcurso, CURRENT_USER(), NOW(), 'Borrado' , 'inscripciones')
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `trigger_inscripciones_ins` AFTER INSERT ON `inscripciones` FOR EACH ROW INSERT INTO bitacora (clave, nombre, usuario, modificado, accion, modulo) VALUES (NEW.idinsc, NEW.idcurso, CURRENT_USER(), NOW(), 'Guardado' , 'inscripciones')
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `trigger_inscripciones_upd` AFTER UPDATE ON `inscripciones` FOR EACH ROW INSERT INTO bitacora (clave, nombre, usuario, modificado, accion, modulo) VALUES (OLD.idinsc, OLD.idcurso, CURRENT_USER(), NOW(), 'Editado' , 'inscripciones')
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nota`
--

CREATE TABLE `nota` (
  `idnota` int(10) NOT NULL,
  `idcurso` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `idfacilitador` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `periodo` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `cedula` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `nombre` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `nota1` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `nota2` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `nota3` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `nota4` varchar(3) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `nota`
--

INSERT INTO `nota` (`idnota`, `idcurso`, `idfacilitador`, `periodo`, `cedula`, `nombre`, `nota1`, `nota2`, `nota3`, `nota4`) VALUES
(21, '1', '15620262', '2017A', '15620262', 'RAFAEL PEREZ', '11', '17', '15', '3');

--
-- Disparadores `nota`
--
DELIMITER $$
CREATE TRIGGER `trigger_nota_del` AFTER DELETE ON `nota` FOR EACH ROW INSERT INTO bitacora (clave, nombre, usuario, modificado, accion, modulo) VALUES (OLD.idnota, OLD.idcurso, CURRENT_USER(), NOW(), 'Borrado' , 'nota')
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `trigger_nota_ins` AFTER INSERT ON `nota` FOR EACH ROW INSERT INTO bitacora (clave, nombre, usuario, modificado, accion, modulo) VALUES (NEW.idnota, NEW.idcurso, CURRENT_USER(), NOW(), 'Guardado' , 'nota')
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `trigger_nota_upd` AFTER UPDATE ON `nota` FOR EACH ROW INSERT INTO bitacora (clave, nombre, usuario, modificado, accion, modulo) VALUES (OLD.idnota, OLD.idcurso, CURRENT_USER(), NOW(), 'Editado' , 'nota')
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `operation`
--

CREATE TABLE `operation` (
  `id` int(3) NOT NULL,
  `concept` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `amount` float DEFAULT NULL,
  `date_at` date DEFAULT NULL,
  `kind` int(11) DEFAULT NULL,
  `created_at` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `operation`
--

INSERT INTO `operation` (`id`, `concept`, `description`, `amount`, `date_at`, `kind`, `created_at`) VALUES
(1, '10', 'ventas', 20000, '2017-06-08', 2, 'RAFA'),
(4, '8', 'ventas', 20000, '2017-06-20', 2, 'RAFA'),
(5, '0', 'compra', 35000, '2017-06-15', 2, 'RAFA'),
(6, '4', 'compra', 45000, '2017-05-30', 1, 'RAFA'),
(7, '10', 'ROJA', 2000, '2017-10-31', 2, 'MARIA'),
(8, '10', 'ROJA', 2000, '2017-10-31', 2, 'MARIA');

--
-- Disparadores `operation`
--
DELIMITER $$
CREATE TRIGGER `trigger_operation_del` AFTER DELETE ON `operation` FOR EACH ROW INSERT INTO bitacora (clave, nombre, usuario, modificado, accion, modulo) VALUES (OLD.id, OLD.concept, CURRENT_USER(), NOW(), 'Borrado' , 'E/S')
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `trigger_operation_ins` AFTER INSERT ON `operation` FOR EACH ROW INSERT INTO bitacora (clave, nombre, usuario, modificado, accion, modulo) VALUES (NEW.id, NEW.concept, CURRENT_USER(), NOW(), 'Guardado' , 'E/S')
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `trigger_operation_upd` AFTER UPDATE ON `operation` FOR EACH ROW INSERT INTO bitacora (clave, nombre, usuario, modificado, accion, modulo) VALUES (OLD.id, OLD.concept, CURRENT_USER(), NOW(), 'Editado' , 'E/S')
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `login_usuario` varchar(100) NOT NULL,
  `clave_usuario` varchar(100) DEFAULT NULL,
  `nivel_usuario` varchar(15) DEFAULT NULL,
  `nombre_usuario` varchar(100) NOT NULL,
  `confirma_clave_usuario` varchar(100) NOT NULL,
  `estado_usuario` varchar(100) NOT NULL,
  `pregunta_usuario` varchar(255) NOT NULL,
  `respuesta_usuario` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`login_usuario`, `clave_usuario`, `nivel_usuario`, `nombre_usuario`, `confirma_clave_usuario`, `estado_usuario`, `pregunta_usuario`, `respuesta_usuario`) VALUES
('15620262', '1211', 'A', 'RAFA', '', '', '', ''),
('2', '2', 'U', '2', '', 'D', 'A', '2'),
('67', '67', 'A', 'Rafael Perez', '67', 'D', 'D', '1995');

--
-- Disparadores `usuarios`
--
DELIMITER $$
CREATE TRIGGER `trigger_usuarios_del` AFTER DELETE ON `usuarios` FOR EACH ROW INSERT INTO bitacora (clave, nombre, usuario, modificado, accion, modulo) VALUES (OLD.login_usuario, OLD.clave_usuario, CURRENT_USER(), NOW(), 'Borrado' , 'usuarios')
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `trigger_usuarios_ins` AFTER INSERT ON `usuarios` FOR EACH ROW INSERT INTO bitacora (clave, nombre, usuario, modificado, accion, modulo) VALUES (NEW.login_usuario, NEW.clave_usuario, CURRENT_USER(), NOW(), 'Guardado' , 'usuarios')
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `trigger_usuarios_upd` AFTER UPDATE ON `usuarios` FOR EACH ROW INSERT INTO bitacora (clave, nombre, usuario, modificado, accion, modulo) VALUES (OLD.login_usuario, OLD.clave_usuario, CURRENT_USER(), NOW(), 'Editado' , 'usuarios')
$$
DELIMITER ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD PRIMARY KEY (`cedula`);

--
-- Indices de la tabla `bitacora`
--
ALTER TABLE `bitacora`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`idcurso`);

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `facilitador`
--
ALTER TABLE `facilitador`
  ADD PRIMARY KEY (`idfacilitador`);

--
-- Indices de la tabla `inscripciones`
--
ALTER TABLE `inscripciones`
  ADD PRIMARY KEY (`idinsc`);

--
-- Indices de la tabla `nota`
--
ALTER TABLE `nota`
  ADD PRIMARY KEY (`idnota`);

--
-- Indices de la tabla `operation`
--
ALTER TABLE `operation`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`login_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `bitacora`
--
ALTER TABLE `bitacora`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT de la tabla `inscripciones`
--
ALTER TABLE `inscripciones`
  MODIFY `idinsc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT de la tabla `nota`
--
ALTER TABLE `nota`
  MODIFY `idnota` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT de la tabla `operation`
--
ALTER TABLE `operation`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
