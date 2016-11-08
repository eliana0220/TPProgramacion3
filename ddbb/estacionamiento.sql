-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-11-2016 a las 17:55:40
-- Versión del servidor: 5.6.25
-- Versión de PHP: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `estacionamiento`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estacionados`
--

CREATE TABLE IF NOT EXISTS `estacionados` (
  `patente` varchar(6) NOT NULL,
  `hora_ingreso` datetime NOT NULL,
  `playero` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estacionados`
--

INSERT INTO `estacionados` (`patente`, `hora_ingreso`, `playero`) VALUES
('AAA864', '2016-11-08 16:37:16', 'Da Silva'),
('BBB452', '2016-11-08 16:38:58', 'Sueldo'),
('CDR981', '2016-11-08 16:55:47', 'Sueldo'),
('FDA761', '2016-11-08 16:56:13', 'Da Silva'),
('LSJ039', '2016-11-08 16:56:27', 'Vera'),
('OAK652', '2016-11-08 16:55:56', 'Vera');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `importes`
--

CREATE TABLE IF NOT EXISTS `importes` (
  `patente` varchar(6) NOT NULL,
  `hora_ingreso` datetime NOT NULL,
  `hora_egreso` datetime NOT NULL,
  `tarifa` decimal(10,0) NOT NULL,
  `importe_cobrado` decimal(10,0) NOT NULL,
  `playero` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `importes`
--

INSERT INTO `importes` (`patente`, `hora_ingreso`, `hora_egreso`, `tarifa`, `importe_cobrado`, `playero`) VALUES
('AAA867', '2016-11-08 16:37:04', '2016-11-08 16:56:47', '36', '11', 'Vera');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `usuario` varchar(15) NOT NULL,
  `clave` varchar(10) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `tipo` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`usuario`, `clave`, `nombre`, `apellido`, `tipo`) VALUES
('evera', '123', 'Eliana', 'Vera', 'admin'),
('fdasilva', '123', 'Florencia', 'Da Silva', 'user'),
('Nicolas', 'Sueldo', 'admin', 'nsueldo', '123');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `estacionados`
--
ALTER TABLE `estacionados`
  ADD PRIMARY KEY (`patente`);

--
-- Indices de la tabla `importes`
--
ALTER TABLE `importes`
  ADD PRIMARY KEY (`patente`,`hora_ingreso`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`usuario`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
