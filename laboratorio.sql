-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-09-2016 a las 04:57:15
-- Versión del servidor: 5.6.17
-- Versión de PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `laboratorio`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acidezlibre`
--

CREATE TABLE IF NOT EXISTS `acidezlibre` (
  `codigoInterno` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `fechaRecepcion` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `fechaEnsayo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `codigoMuestra` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `gMlMuestra1` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `gMlMuestra2` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `vFinal1` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `vFinal2` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `nNaOh1` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `nNaOh2` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `vNaOh1` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `vNaOh2` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `resultado1` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `resultado2` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `promedio` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `responsable` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`codigoMuestra`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acideztotal`
--

CREATE TABLE IF NOT EXISTS `acideztotal` (
  `codigoInterno` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `fechaRecepcion` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `fechaEnsayo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `codigoMuestra` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `gMlMuestra1` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `gMlMuestra2` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `vFinal1` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `vFinal2` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `nNaOh1` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `nNaOh2` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `vNaOh1` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `vNaOh2` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `resultado1` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `resultado2` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `promedio` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `responsable` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`codigoMuestra`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acidezvolatil`
--

CREATE TABLE IF NOT EXISTS `acidezvolatil` (
  `codigoInterno` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `fechaRecepcion` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `fechaEnsayo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `codigoMuestra` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `vMuestra1` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `vMuestra2` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `vNaOh1` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `vNaOh2` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `nNaOh1` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `nNaOh2` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `acidezVolatil1` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `acidezVolatil2` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `acidezFija1` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `acidezFija2` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `promedio` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `responsable` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`codigoInterno`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividades`
--

CREATE TABLE IF NOT EXISTS `actividades` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `actividad` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `nombreId` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `codigo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `usuario` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `fecha` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=74 ;

--
-- Volcado de datos para la tabla `actividades`
--

INSERT INTO `actividades` (`id`, `actividad`, `nombreId`, `codigo`, `usuario`, `fecha`) VALUES
(1, 'Cotización Eliminada', 'No. Cotización', '1-16', 'alexander221b@hotmail.com', '09-08-2016 01:15:57'),
(2, 'Extracción Soxhlet Registrada', 'Código Interno', '3', 'alexander221b@hotmail.com', '09-08-2016 01:19:04'),
(3, 'Extracción Soxhlet Actualizado', 'Código Interno', '3', 'alexander221b@hotmail.com', '09-08-2016 01:19:37'),
(4, 'Cotización Registrada', 'No. Cotización', '1-16', 'alexander221b@hotmail.com', '09-08-2016 01:20:58'),
(5, 'Recepción Registrada', 'No. Cotización', '1-16', 'alexander221b@hotmail.com', '09-08-2016 01:21:40'),
(6, 'Cotización Registrada', 'No. Cotización', '2-16', 'alexander221b@hotmail.com', '09-08-2016 01:21:58'),
(7, 'Recepción Registrada', 'No. Cotización', '2-16', 'alexander221b@hotmail.com', '09-08-2016 01:39:44'),
(8, 'Recepción Actualizada', 'No. Cotización', '2-16', 'alexander221b@hotmail.com', '09-08-2016 01:52:16'),
(9, 'Informe Registrado', 'No. Cotización', '34', 'alexander221b@hotmail.com', '09-08-2016 01:54:37'),
(10, 'Informe Actualizado', 'No. Cotización', '34', 'alexander221b@hotmail.com', '09-08-2016 01:54:58'),
(11, 'Cotización Actualizada', 'No. Cotización', '2-16', 'alexander221b@hotmail.com', '09-08-2016 02:13:27'),
(12, 'Informe Actualizado', 'No. Cotización', '34', 'alexander221b@hotmail.com', '09-08-2016 02:20:41'),
(13, 'Informe Actualizado', 'No. Cotización', '34', 'alexander221b@hotmail.com', '09-08-2016 02:20:43'),
(14, 'Informe Actualizado', 'No. Cotización', '34', 'alexander221b@hotmail.com', '09-08-2016 02:20:46'),
(15, 'Análisis Físico Registrado', 'Código Interno', '2', 'alexander221b@hotmail.com', '09-08-2016 02:20:58'),
(16, 'Solicitud Registrada', 'Id', '1', 'alexander221b@hotmail.com', '09-08-2016 02:35:50'),
(17, 'Cotización Eliminada', 'No. Cotización', '2-16', 'alexander221b@hotmail.com', '09-08-2016 02:36:12'),
(18, 'Cotización Eliminada', 'No. Cotización', '1-16', 'alexander221b@hotmail.com', '09-08-2016 02:36:14'),
(19, 'Cotización Registrada', 'No. Cotización', '1-16', 'alexander221b@hotmail.com', '09-08-2016 02:45:19'),
(20, 'Cotización Actualizada', 'No. Cotización', '1-16', 'alexander221b@hotmail.com', '09-08-2016 02:45:57'),
(21, 'Cotización Actualizada', 'No. Cotización', '1-16', 'alexander221b@hotmail.com', '09-08-2016 02:54:14'),
(22, 'Recepción Registrada', 'No. Cotización', '1-17', 'alexander221b@hotmail.com', '09-08-2016 03:05:08'),
(23, 'Recepción Eliminada', 'No. Cotización', '2-16', 'alexander221b@hotmail.com', '09-08-2016 03:05:21'),
(24, 'Recepción Eliminada', 'No. Cotización', '1-17', 'alexander221b@hotmail.com', '09-08-2016 03:05:34'),
(25, 'Recepción Eliminada', 'No. Cotización', '1-16', 'alexander221b@hotmail.com', '09-08-2016 03:05:40'),
(26, 'Recepción Registrada', 'No. Cotización', '1-16', 'alexander221b@hotmail.com', '09-08-2016 03:09:08'),
(27, 'Recepción Registrada', 'No. Cotización', '11', 'alexander221b@hotmail.com', '09-08-2016 03:10:53'),
(28, 'Informe Registrado', 'No. Cotización', '1-16', 'alexander221b@hotmail.com', '09-08-2016 03:12:59'),
(29, 'Informe Eliminado', 'No. Cotización', '1-16', 'alexander221b@hotmail.com', '09-08-2016 03:14:55'),
(30, 'Informe Eliminado', 'No. Cotización', '34', 'alexander221b@hotmail.com', '09-08-2016 03:14:57'),
(31, 'Recepción Eliminada', 'No. Cotización', '11', 'alexander221b@hotmail.com', '09-08-2016 03:15:02'),
(32, 'Recepción Eliminada', 'No. Cotización', '1-16', 'alexander221b@hotmail.com', '09-08-2016 03:15:04'),
(33, 'Recepción Registrada', 'No. Cotización', '1-16', 'alexander221b@hotmail.com', '09-08-2016 03:25:04'),
(34, 'Recepción Actualizada', 'No. Cotización', '1-16', 'alexander221b@hotmail.com', '09-08-2016 03:39:28'),
(35, 'Recepción Eliminada', 'No. Cotización', '1-16', 'alexander221b@hotmail.com', '09-08-2016 03:39:51'),
(36, 'Recepción Registrada', 'No. Cotización', '1-16', 'alexander221b@hotmail.com', '09-08-2016 03:40:28'),
(37, 'Recepción Actualizada', 'No. Cotización', '1-16', 'alexander221b@hotmail.com', '09-08-2016 03:41:41'),
(38, 'Recepción Registrada', 'No. Cotización', '1', 'alexander221b@hotmail.com', '09-08-2016 03:46:04'),
(39, 'Recepción Eliminada', 'No. Cotización', '1', 'alexander221b@hotmail.com', '09-08-2016 03:46:22'),
(40, 'Recepción Eliminada', 'No. Cotización', '1-16', 'alexander221b@hotmail.com', '09-08-2016 03:46:24'),
(41, 'Cotización Actualizada', 'No. Cotización', '1-16', 'alexander221b@hotmail.com', '09-08-2016 03:48:26'),
(42, 'Recepción Registrada', 'No. Cotización', '1-16', 'alexander221b@hotmail.com', '09-08-2016 03:49:22'),
(43, 'Informe Registrado', 'No. Cotización', '1-16', 'alexander221b@hotmail.com', '09-08-2016 03:57:57'),
(44, 'Informe Actualizado', 'No. Cotización', '1-16', 'alexander221b@hotmail.com', '09-08-2016 03:59:07'),
(45, 'Informe Actualizado', 'No. Cotización', '1-16', 'alexander221b@hotmail.com', '09-08-2016 04:01:59'),
(46, 'Registro de Usuario', 'Nombre Usuario Registrado', 'sherlock1883@hotmail.com', 'alexander221b@hotmail.com', '09-08-2016 04:19:17'),
(47, 'Registro de Usuario', 'Nombre Usuario Registrado', 'sherlock1884@hotmail.com', 'alexander221b@hotmail.com', '09-08-2016 04:21:12'),
(48, 'Solicitud Actualizada', 'Id', '1', 'alexander221b@hotmail.com', '09-08-2016 04:24:39'),
(49, 'Análisis Físicos Eliminado', 'Código Interno', '2', 'alexander221b@hotmail.com', '09-08-2016 04:25:33'),
(50, 'Extracción Soxhlet Eliminado', 'Código Interno', '3', 'alexander221b@hotmail.com', '09-08-2016 04:25:36'),
(51, 'Análisis Físico Registrado', 'Código Interno', '1', 'alexander221b@hotmail.com', '09-08-2016 04:26:13'),
(52, 'Análisis Físico Actualizado', 'Código Interno', '1', 'alexander221b@hotmail.com', '09-08-2016 04:26:29'),
(53, 'Análisis Físico Actualizado', 'Código Interno', '1', 'alexander221b@hotmail.com', '09-08-2016 04:26:42'),
(54, 'Durabilidad Registrada', 'Código Interno', '12', 'alexander221b@hotmail.com', '09-08-2016 04:27:33'),
(55, 'Durabilidad Actualizado', 'Código Interno', '12', 'alexander221b@hotmail.com', '09-08-2016 04:28:03'),
(56, 'Análisis Físicos Eliminado', 'Código Interno', '1', 'alexander221b@hotmail.com', '09-08-2016 04:28:34'),
(57, 'Durabilidad Actualizado', 'Código Interno', '12', 'alexander221b@hotmail.com', '09-08-2016 04:29:36'),
(58, 'Registro de Usuario', 'Nombre Usuario Registrado', 'sherlock1881@hotmail.com', 'alexander221b@hotmail.com', '09-08-2016 04:35:36'),
(59, 'Envío de contraseña fallida', 'sherlock1881@hotmail.com', 'sherlock1881@hotmail.com', 'sherlock1881@hotmail.com', '09-08-2016 04:46:25'),
(60, 'Envío de contraseña fallida', 'Correo', 'sherlock1881@hotmail.com', 'sherlock1881@hotmail.com', '09-08-2016 04:47:34'),
(61, 'Envío de contraseña exitoso', 'Correo', 'alexander221b@hotmail.com', 'alexander221b@hotmail.com', '09-08-2016 04:48:22'),
(62, 'Envío de contraseña exitoso', 'Correo', 'sherlock1881@hotmail.com', 'sherlock1881@hotmail.com', '09-08-2016 04:48:46'),
(63, 'Envío de contraseña fallido', 'Correo', 'sherlock1881@hotmail.com6', 'sherlock1881@hotmail.com6', '09-08-2016 04:50:21'),
(64, 'Registro de Usuario', 'Nombre Usuario', 'sherlock1884@hotmail.com', 'alexander221b@hotmail.com', '09-08-2016 05:09:53'),
(65, 'Solicitud Registrada', 'Id', '2', 'alexander221b@hotmail.com', '09-08-2016 05:24:58'),
(66, 'Solicitud Actualizada', 'Id', '2', 'alexander221b@hotmail.com', '09-08-2016 05:25:35'),
(67, 'Envío de contraseña fallido', 'Correo', 'alexander221b@hotmail.com', 'alexander221b@hotmail.com', '09-08-2016 14:09:23'),
(68, 'Envío de contraseña exitoso', 'Correo', 'alexander221b@hotmail.com', 'alexander221b@hotmail.com', '09-08-2016 14:10:56'),
(69, 'Envío de contraseña fallido', 'Correo', 'sherlock1881@hotmail.com', 'sherlock1881@hotmail.com', '09-08-2016 14:57:42'),
(70, 'Solicitud Actualizada', 'Id', '2', 'alexander221b@hotmail.com', '09-08-2016 14:59:51'),
(71, 'Recepción Actualizada', 'No. Cotización', '1-16', 'alexander221b@hotmail.com', '09-08-2016 15:03:00'),
(72, 'Recepción Actualizada', 'No. Cotización', '1-16', 'alexander221b@hotmail.com', '09-08-2016 15:04:22'),
(73, 'Envío de contraseña exitoso', 'Correo', 'alexander221b@hotmail.com', 'alexander221b@hotmail.com', '09-08-2016 15:11:44');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE IF NOT EXISTS `administrador` (
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `contrasena` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`nombre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`nombre`, `contrasena`) VALUES
('alexander221b@hotmail.com', '11235811');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alcalinidadtotal`
--

CREATE TABLE IF NOT EXISTS `alcalinidadtotal` (
  `codigoInterno` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `fechaRecepcion` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `fechaEnsayo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `codigoMuestra` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `vMuestraBlanco` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `vMuestra1` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `vMuestra2` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `vMuestraSolucionCartaControl` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `nH2SO4Blanco` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `nH2SO41` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `nH2SO42` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `nH2SO4SolucionCartaControl` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `vH2SO4Blanco` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `vH2SO41` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `vH2SO42` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `vH2SO4SolucionCartaControl` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `phBlanco` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `ph1` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `ph2` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `phSolucionCartaControl` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `resultadoBlanco` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `resultado1` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `resultado2` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `resultadoSolucionCartaControl` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `promedioBlanco` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `promedio1` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `promedio2` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `promedioSolucionCartaControl` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `responsable` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`codigoInterno`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aluminio`
--

CREATE TABLE IF NOT EXISTS `aluminio` (
  `codigoInterno` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `fechaRecepcion` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `fechaEnsayo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `codigoMuestra` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `vMuestra1` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `vMuestra2` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `vMuestraSolucionCartaControl` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `vFinal1` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `vFinal2` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `vFinalSolucionCartaControl` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `absorbancia1` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `absorbancia2` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `absorbanciaSolucionCartaControl` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `concentracion1` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `concentracion2` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `concentracionSolucionCartaControl` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `concentracionCorregida1` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `concentracionCorregida2` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `concentracionCorregidaSolucionCartaControl` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `concentracionPromedio` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `concentracionPromedioSolucionCartaControl` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `responsable` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`codigoInterno`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `analisisfisicos`
--

CREATE TABLE IF NOT EXISTS `analisisfisicos` (
  `codigoInterno` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `fechaRecepcion` date NOT NULL,
  `fechaEnsayo` date NOT NULL,
  `codigoMuestra` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `ph1` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `ph2` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `phPromedio` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `phSolucionCartaControl` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `phResponsable` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `temperatura1` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `temperatura2` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `temperaturaPromedio` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `temperaturaSolucionCartaControl` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `temperaturaResponsable` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `colorAparente1` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `colorAparente2` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `colorAparentePromedio` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `colorAparenteSolucionCartaControl` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `colorAparenteResponsable` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `colorVerdadero1` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `colorVerdadero2` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `colorVerdaderoPromedio` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `colorVerdaderoSolucionCartaControl` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `colorVerdaderoResponsable` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `turbiedad1` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `turbiedad2` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `turbiedadPromedio` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `turbiedadSolucionCartaControl` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `turbiedadResponsable` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `sustanciasFlotantes1` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `sustanciasFlotantes2` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `sustanciasFlotantesPromedio` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `sustanciasFlotantesSolucionCartaControl` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `sustanciasFlotantesResponsable` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `olor1` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `olor2` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `olorPromedio` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `olorSolucionCartaControl` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `olorResponsable` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `oxigenoDisuelto1` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `oxigenoDisuelto2` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `oxigenoDisueltoPromedio` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `oxigenoDisueltoSolucionCartaControl` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `oxigenoDisueltoResponsable` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `conductividad1` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `conductividad2` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `conductividadPromedio` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `conductividadSolucionCartaControl` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `conductividadResponsable` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `temperaturaSegunda1` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `temperaturaSegunda2` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `temperaturaSegundaPromedio` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `temperaturaSegundaSolucionCartaControl` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `temperaturaSegundaResponsable` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `fluoruros1` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `fluoruros2` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `fluorurosPromedio` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `fluorurosSolucionCartaControl` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `fluorurosResponsable` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`codigoInterno`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `basicidad`
--

CREATE TABLE IF NOT EXISTS `basicidad` (
  `codigoInterno` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `fechaRecepcion` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `fechaEnsayo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `codigoMuestra` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `gMlMuestra1` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `gMlMuestra2` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `vFinal1` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `vFinal2` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `nNaOH1` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `nNaOH2` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `vNaOH1` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `vNaOH2` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `resultado1` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `resultado2` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `promedio` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `responsable` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`codigoInterno`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bicarbonatos`
--

CREATE TABLE IF NOT EXISTS `bicarbonatos` (
  `codigoInterno` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `fechaRecepcion` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `fechaEnsayo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `codigoMuestra` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `vMuestraBlanco` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `vMuestra1` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `vMuestra2` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `vMuestraSolucionCartaControl` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `nH2SO4Blanco` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `nH2SO41` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `nH2SO42` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `nH2SO4SolucionCartaControl` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `vH2SO4Blanco` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `vH2SO41` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `vH2SO42` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `vH2SO4SolucionCartaControl` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `phBlanco` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `ph1` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `ph2` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `phSolucionCartaControl` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `resultadoBlanco` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `resultado1` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `resultado2` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `resultadoSolucionCartaControl` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `vH2SO4SegundoBlanco` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `vH2SO4Segundo1` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `vH2SO4Segundo2` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `vH2SO4SegundoSolucionCartaControl` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `phSegundoBlanco` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `phSegundo1` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `phSegundo2` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `phSegundoSolucionCartaControl` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `resultadoCarbonatosBlanco` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `resultadoCarbonatos1` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `resultadoCarbonatos2` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `resultadoCarbonatosSolucionCartaControl` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `promedioCarbonatosBlanco` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `promedioCarbonatos1` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `promedioCarbonatosSolucionCartaControl` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `responsable` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`codigoInterno`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carbonatos`
--

CREATE TABLE IF NOT EXISTS `carbonatos` (
  `codigoInterno` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `fechaRecepcion` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `fechaEnsayo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `codigoMuestra` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `vMuestraBlanco` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `vMuestra1` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `vMuestra2` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `vMuestraSolucionCartaControl` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `nH2SO4Blanco` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `nH2SO41` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `nH2SO42` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `nH2SO4SolucionCartaControl` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `vH2SO4Blanco` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `vH2SO41` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `vH2SO42` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `vH2SO4SolucionCartaControl` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `phBlanco` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `ph1` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `ph2` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `phSolucionCartaControl` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `resultadoBlanco` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `resultado1` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `resultado2` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `resultadoSolucionCartaControl` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `vH2SO4SegundoBlanco` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `vH2SO4Segundo1` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `vH2SO4Segundo2` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `vH2SO4SegundoSolucionCartaControl` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `phSegundoBlanco` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `phSegundo1` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `phSegundo2` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `phSegundoSolucionCartaControl` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `resultadoCarbonatosBlanco` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `resultadoCarbonatos1` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `resultadoCarbonatos2` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `resultadoCarbonatosSolucionCartaControl` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `promedioCarbonatosBlanco` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `promedioCarbonatos1` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `promedioCarbonatosSolucionCartaControl` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `responsable` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`codigoInterno`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) COLLATE utf8_spanish_ci NOT NULL DEFAULT '0',
  `ip_address` varchar(45) COLLATE utf8_spanish_ci NOT NULL DEFAULT '0',
  `user_agent` varchar(120) COLLATE utf8_spanish_ci NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('2bf5654906cea9c6e25c3e3de8054fb3', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.116 Safari/537.36', 1472551019, ''),
('336ede583c52b6a38f60d0173e3660f5', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.116 Safari/537.36', 1470773456, ''),
('df72d385056b12581bdb2317c7d999e3', '127.0.0.1', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1; Win64; x64; Trident/4.0; .NET CLR 2.0.50727; SLCC2; .NET CLR 3.5.3072', 1470770011, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clororesidual`
--

CREATE TABLE IF NOT EXISTS `clororesidual` (
  `codigoInterno` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `fechaRecepcion` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `fechaEnsayo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `codigoMuestra1` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `codigoMuestra2` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `vMuestra1` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `vMuestra2` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `vMuestraSolucionCartaControl` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `vFas1` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `vFas2` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `vFasSolucionCartaControl` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `nFas1` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `nFas2` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `nFasSolucionCartaControl` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `resultado1` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `resultado2` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `resultadoSolucionCartaControl` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `promedio` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `promedioSolucionCartaControl` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `responsable1` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `responsable2` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`codigoInterno`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cloruros`
--

CREATE TABLE IF NOT EXISTS `cloruros` (
  `codigoInterno` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `fechaRecepcion` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `fechaEnsayo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `codigoMuestra` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `codigoMuestra1` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `codigoMuestra2` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `vMuestraBlanco` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `vMuestra1` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `vMuestra2` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `vMuestraSolucionCartaControl` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `vFinalBlanco` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `vFinal1` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `vFinal2` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `vFinalSolucionCartaControl` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `nAgno3Blanco` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `nAgno31` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `nAgno32` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `nAgno3SolucionCartaControl` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `vAgno3Blanco` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `vAgno31` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `vAgno32` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `vAgno3SolucionCartaControl` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `concentracionBlanco` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `concentracion1` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `concentracion2` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `concentracionSolucionCartaControl` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `concentracionPromedioBlanco` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `concentracionPromedio` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `concentracionPromedioSolucionCartaControl` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `responsable` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`codigoInterno`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cotizacion`
--

CREATE TABLE IF NOT EXISTS `cotizacion` (
  `id` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `nitCc` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `metodoSolicitud` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `fecha` date NOT NULL,
  `cotizacionNo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `razonSocial` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `solicitante` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `cargo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `telefonoFax` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `municipioDepartamento` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `correoElectronico` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `observaciones` mediumtext COLLATE utf8_spanish_ci NOT NULL,
  `totalPagar` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `operacion` varchar(1000) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`cotizacionNo`),
  KEY `cedulaNit` (`nitCc`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `cotizacion`
--

INSERT INTO `cotizacion` (`id`, `nitCc`, `metodoSolicitud`, `fecha`, `cotizacionNo`, `razonSocial`, `solicitante`, `cargo`, `direccion`, `telefonoFax`, `municipioDepartamento`, `correoElectronico`, `observaciones`, `totalPagar`, `operacion`) VALUES
('1', '816003606-7', 'telefonico', '2016-08-09', '1-16', 'CONJUNTO RESIDENCIAL EL TULCAN CASAS', 'Damaris Jiménez valencia ', 'Administradora', 'Calle 21 No 29-140', '(6) 321 02 66', 'Pereira/Risaralda ', 'dajiva2000@yahoo.con', 'El descuento es otorgado sobre el valor de los análisis.', '59500', '<a class="ask" href="//localhost/laboratorio/index.php/welcome/verCotizacion/1-16" target="_blank" onClick="window.open(this.href, this.target, ''width=800, height=600''); return false;">Ver </a><a href="http://localhost/laboratorio/index.php/welcome/EditarCotizacion/1-16">Editar </a><a href="//localhost/laboratorio/index.php/welcome/eliminarCotizacion/1-16" class="confirmacion" >Eliminar </a><a href="http://localhost/laboratorio/index.php/welcome/cargarCotizacionRecepcion/1-16"> Cargar Recepción</a><a href="http://localhost/laboratorio/index.php/welcome/cargarCotizacionInforme/1-16"> Cargar Informe</a>');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datosmuestrarecepcion`
--

CREATE TABLE IF NOT EXISTS `datosmuestrarecepcion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cotizacionNo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `descripcionMuestra` text COLLATE utf8_spanish_ci NOT NULL,
  `consecutivo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `tipoMuestra` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `horaToma` time NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cotizacionNo` (`cotizacionNo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=15 ;

--
-- Volcado de datos para la tabla `datosmuestrarecepcion`
--

INSERT INTO `datosmuestrarecepcion` (`id`, `cotizacionNo`, `descripcionMuestra`, `consecutivo`, `tipoMuestra`, `horaToma`) VALUES
(14, '1-16', 'Agua de Piscina Principal\r\nTemperatura 24,7°C\r\nCloro Residual: 1,89 mg/L', '1', 'Agua Piscina ', '13:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datosmuestras`
--

CREATE TABLE IF NOT EXISTS `datosmuestras` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cotizacionNo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `tipoMuestra` varchar(5000) COLLATE utf8_spanish_ci NOT NULL,
  `parametro` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `metodo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `precioMuestra` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `noMuestras` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `valorTotal` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `nitCc` (`cotizacionNo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=19 ;

--
-- Volcado de datos para la tabla `datosmuestras`
--

INSERT INTO `datosmuestras` (`id`, `cotizacionNo`, `tipoMuestra`, `parametro`, `metodo`, `precioMuestra`, `noMuestras`, `valorTotal`) VALUES
(11, '1-16', 'Agua Piscina ', 'pH ', 'SM: 4500 H+-B. Electrométrico', '6000', '1', '6000'),
(12, '1-16', 'Agua Piscina ', 'Turbiedad ', 'SM: 2130 B. Nefelométrico', '6000', '1', '6000'),
(13, '1-16', 'Agua Piscina ', 'Temperatura', 'Sensor Térmico', '2000', '1', '2000'),
(14, '1-16', 'Agua Piscina ', 'Color Aparente', 'SM: 2120 B. Comparación Visual ', '4500', '1', '4500'),
(15, '1-16', 'Agua Piscina ', 'Conductividad ', 'SM: 2510-B. Electrométrico', '7000', '1', '7000'),
(16, '1-16', 'Agua Piscina ', 'Cloro residual ', 'SM: 4500- Cl G. Colorimétrico DPD', '17000', '1', '17000'),
(17, '1-16', 'Agua Piscina ', 'Cloro Combinado ', 'SM: 4500- Cl G. Colorimétrico DPD', '17000', '1', '17000'),
(18, '1-16', 'Agua Piscina ', 'Cloro Total', 'Cálculo', '0', '0', '0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dbo5`
--

CREATE TABLE IF NOT EXISTS `dbo5` (
  `codigoInterno` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `fechaRecepcion` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `fechaEnsayo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `codigoMuestra` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `winklerNo1` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `winklerNo2` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `winklerNo3` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `winklerNoSolucionCartaControl` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `factorDilucion1` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `factorDilucion2` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `factorDilucion3` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `factorDilucionSolucionCartaControl` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `vMuestra1` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `vMuestra2` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `vMuestra3` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `vMuestraSolucionCartaControl` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `odInicial1` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `odInicial2` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `odInicial3` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `odInicialSolucionCartaControl` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `odFinal1` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `odFinal2` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `odFinal3` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `odFinalSolucionCartaControl` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `concentracion1` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `concentracion2` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `concentracion3` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `concentracionSolucionCartaControl` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `concentracionPromedio` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `concentracionPromedioSolucionCartaControl` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `responsable` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`codigoInterno`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dqo`
--

CREATE TABLE IF NOT EXISTS `dqo` (
  `codigoInterno` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `fechaRecepcion` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `fechaAnalisis` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `codigoMuestra` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `vAlicuota1` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `vAlicuota2` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `vFas11` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `vFas12` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `normalidadFas1` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `normalidadFas2` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `normalidadPromedioFas` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `vConsumidoBlanco1` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `vConsumidoBlanco2` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `vMuestra` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `vMuestraSolucionCartaControl` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `factorDilucion1` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `factorDilucion2` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `factorDilucion3` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `factorDilucionSolucionCartaControl` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `vFas21` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `vFas22` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `vFas23` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `vFas2SolucionCartaControl` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `concentracion1` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `concentracion2` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `concentracion3` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `concentracionSolucionCartaControl` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `concentracionPromedio` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `concentracionPromedioSolucionCartaControl` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `responsable` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`codigoInterno`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `durabilidad`
--

CREATE TABLE IF NOT EXISTS `durabilidad` (
  `codigoInterno` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `fechaRecepcion` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `fechaEnsayo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `codigoMuestra` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `gMuestra1` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `gMuestra2` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `gMuestraBlanco` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `volumenH2SO41` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `volumenH2SO42` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `volumenH2SO4Blanco` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `nH2SO41` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `nH2SO42` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `nH2SO4Blanco` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `volumenNaOH1` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `volumenNaOH2` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `volumenNaOHBlanco` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `resutadoH2SO41` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `resutadoH2SO42` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `resutadoH2SO4Blanco` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `promedioH2SO4` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `promedioH2SO4Blanco` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `responsable` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`codigoInterno`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `durabilidad`
--

INSERT INTO `durabilidad` (`codigoInterno`, `fechaRecepcion`, `fechaEnsayo`, `codigoMuestra`, `gMuestra1`, `gMuestra2`, `gMuestraBlanco`, `volumenH2SO41`, `volumenH2SO42`, `volumenH2SO4Blanco`, `nH2SO41`, `nH2SO42`, `nH2SO4Blanco`, `volumenNaOH1`, `volumenNaOH2`, `volumenNaOHBlanco`, `resutadoH2SO41`, `resutadoH2SO42`, `resutadoH2SO4Blanco`, `promedioH2SO4`, `promedioH2SO4Blanco`, `responsable`) VALUES
('12', '2016-08-09', '2016-08-09', '12-1', '1.2', '1.4', '2.3', '1.2', '2.4', '1.2', '1.4', '3.5', '1.2', '2.3', '8.9', '1.2', '5.4', '12.3', '1.4', '4.5', '2.3', 'olga martinez');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `durezacalcicamagnesica`
--

CREATE TABLE IF NOT EXISTS `durezacalcicamagnesica` (
  `codigoInterno` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `fechaRecepcion` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `fechaEnsayo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `codigoMuestra` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `codigoMuestra1` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `codigoMuestra2` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `vMuestraBlanco` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `vMuestra1` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `vMuestra2` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `vMuestraSolucionCartaControl` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `vFinalBlanco` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `vFinal1` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `vFinal2` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `vFinalSolucionCartaControl` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `concentracionEdtaBlanco` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `concentracionEdta1` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `concentracionEdta2` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `concentracionEdtaSolucionCartaControl` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `vEdtaBlanco` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `vEdta1` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `vEdta2` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `vEdtaSolucionCartaControl` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `durezaCalcicaBlanco` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `durezaCalcica` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `durezaCalcicaSolucionCartaControl` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `durezaMagnesicaBlanco` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `durezaMagnesica` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `durezaMagnesicaSolucionCartaControl` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `responsable` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`codigoInterno`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `durezatotal`
--

CREATE TABLE IF NOT EXISTS `durezatotal` (
  `codigoInterno` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `fechaRecepcion` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `fechaEnsayo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `codigoMuestra` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `vMuestraBlanco` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `vMuestra1` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `vMuestra2` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `vMuestraSolucionCartaControl` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `vFinalBlanco` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `vFinal1` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `vFinal2` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `vFinalSolucionCartaControl` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `concentracionEdtaBlanco` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `concentracionEdta1` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `concentracionEdta2` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `concentracionEdtaSolucionCartaControl` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `vEdtaBlanco` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `vEdta1` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `vEdta2` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `vEdtaSolucionCartaControl` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `resultadoBlanco` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `resultado1` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `resultado2` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `resultadoSolucionCartaControl` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `promedioBlanco` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `promedio` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `promedioSolucionCartaControl` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `responsable` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`codigoInterno`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `extraccionsoxhlet`
--

CREATE TABLE IF NOT EXISTS `extraccionsoxhlet` (
  `codigoInterno` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `fechaRecepcion` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `fechaEnsayo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `codigoMuestra` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `cantidadMuestra` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `noCrisol` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `pesoCrisolVacio` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `pesoCrisolMuestra` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `resultado` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `responsable` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`codigoInterno`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `extractosecodesengrasado`
--

CREATE TABLE IF NOT EXISTS `extractosecodesengrasado` (
  `codigoInterno` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `fechaRecepcion` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `fechaEnsayo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `codigoMuestra` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `est1` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `est2` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `grasa1` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `grasa2` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `cantidadMuestra1` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `cantidadMuestra2` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `densidad1` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `densidad2` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `resultado1` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `resultado2` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `promedio` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `responsable` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`codigoInterno`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `extractosecorm`
--

CREATE TABLE IF NOT EXISTS `extractosecorm` (
  `codigoInterno` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `fechaRecepcion` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `fechaEnsayo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `codigoMuestra` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `densidad1` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `densidad2` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `grasa1` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `grasa2` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `resultado1` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `resultado2` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `promedio` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `responsable` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`codigoInterno`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `extractosecototal`
--

CREATE TABLE IF NOT EXISTS `extractosecototal` (
  `codigoInterno` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `fechaRecepcion` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `fechaEnsayo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `codigoMuestra` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `NoCapsula1` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `NoCapsula2` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `McapsulaVacia1` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `McapsulaVacia2` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `cantidadMuestra1` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `cantidadMuestra2` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `mDespuesSecado11` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `mDespuesSecado12` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `mdespuesSecado21` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `mdespuesSecado22` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `extractoSecoTotal1` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `extractoSecoTotal2` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `promedioEst` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `responsable` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`codigoInterno`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fosfatos`
--

CREATE TABLE IF NOT EXISTS `fosfatos` (
  `codigoInterno` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `fechaRecepcion` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `fechaEnsayo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `codigoMuestra` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `digestion1` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `digestion2` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `digestionSolucionCartaControl` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `vFinalDigestion1` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `vFinalDigestion2` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `vFinalDigestionSolucionCartaControl` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `vAlicuota1` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `vAlicuota2` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `vAlicuotaSolucionCartaControl` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `vFinal1` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `vFinal2` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `vFinalSolucionCartaControl` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `absorbancia1` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `absorbancia2` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `absorbanciaSolucionCartaControl` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `concentracion1` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `concentracion2` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `concentracionSolucionCartaControl` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `concentracionPo1` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `concentracionPo2` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `concentracionPoSolucionCartaControl` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `concentracionPromedio` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `concentracionPromedioSolucionCartaControl` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `responsable` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`codigoInterno`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hidrocarburos`
--

CREATE TABLE IF NOT EXISTS `hidrocarburos` (
  `codigoInterno` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `fechaRecepcion` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `fechaEnsayo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `codigoMuestra` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `vMuestraFiltrada` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `noCapsula` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `capsulaVacia` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `capsulaMuestra` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `resultado` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `responsable` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`codigoInterno`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hidroxidos`
--

CREATE TABLE IF NOT EXISTS `hidroxidos` (
  `codigoInterno` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `fechaRecepcion` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `fechaEnsayo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `codigoMuestra` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `vMuestraBlanco` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `vMuestra1` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `vMuestra2` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `vMuestraSolucionCartaControl` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `nH2SO4Blanco` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `nH2SO41` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `nH2SO42` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `nH2SO4SolucionCartaControl` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `vH2SO4Blanco` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `vH2SO41` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `vH2SO42` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `vH2SO4SolucionCartaControl` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `phBlanco` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `ph1` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `ph2` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `phSolucionCartaControl` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `resultadoBlanco` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `resultado1` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `resultado2` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `resultadoSolucionCartaControl` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `vH2SO4SegundoBlanco` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `vH2SO4Segundo1` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `vH2SO4Segundo2` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `vH2SO4SegundoSolucionCartaControl` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `phSegundoBlanco` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `phSegundo1` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `phSegundo2` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `phSegundoSolucionCartaControl` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `resultadoCarbonatosBlanco` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `resultadoCarbonatos1` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `resultadoCarbonatos2` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `resultadoCarbonatosSolucionCartaControl` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `promedioCarbonatosBlanco` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `promedioCarbonatos1` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `promedioCarbonatosSolucionCartaControl` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `responsable` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`codigoInterno`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `informe`
--

CREATE TABLE IF NOT EXISTS `informe` (
  `cotizacionNo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `fecha` date NOT NULL,
  `noPaginas` int(11) NOT NULL,
  `razonSocial` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `nitCc` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `solicitante` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `cargo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `telefonoFax` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `municipioDpto` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `correoElectronico` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `lugarTomaMuestra` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `fechaTomaMuestra` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `muestraTomadaPor` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `fechaRecepcionMuestra` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `operacion` varchar(1000) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`cotizacionNo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `informe`
--

INSERT INTO `informe` (`cotizacionNo`, `fecha`, `noPaginas`, `razonSocial`, `nitCc`, `solicitante`, `cargo`, `direccion`, `telefonoFax`, `municipioDpto`, `correoElectronico`, `lugarTomaMuestra`, `fechaTomaMuestra`, `muestraTomadaPor`, `fechaRecepcionMuestra`, `operacion`) VALUES
('1-16', '2016-08-09', 4, 'CONJUNTO RESIDENCIAL EL TULCAN CASAS', '816003606-7', 'Damaris Jiménez valencia ', 'Administradora', 'Calle 21 No 29-140', '(6) 321 02 66', 'Pereira/Risaralda ', 'dajiva2000@yahoo.con', 'Instalaciones de la empresa', '2016-08-09', 'William Hernández ', '2016-08-09', '<a class="ask" href="//localhost/laboratorio/index.php/welcome/verInforme/1-16" target="_blank" onClick="window.open(this.href, this.target, ''width=800, height=600''); return false;">Ver </a><a href="http://localhost/laboratorio/index.php/welcome/EditarInforme/1-16">Editar </a><a href="//localhost/laboratorio/index.php/welcome/eliminarInforme/1-16" class="confirmacion" >Eliminar </a>');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `informecaracteristicasmuestra`
--

CREATE TABLE IF NOT EXISTS `informecaracteristicasmuestra` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cotizacionNo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `tipo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `fechaToma` date NOT NULL,
  `horaToma` time NOT NULL,
  `fechaHoraRecepcion` date NOT NULL,
  `codigoInterno` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `observaciones` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cotizacionNo` (`cotizacionNo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `informecaracteristicasmuestra`
--

INSERT INTO `informecaracteristicasmuestra` (`id`, `cotizacionNo`, `descripcion`, `tipo`, `fechaToma`, `horaToma`, `fechaHoraRecepcion`, `codigoInterno`, `observaciones`) VALUES
(4, '1-16', 'Agua de Piscina Principal\r\nTemperatura 24,7°C\r\nClo', 'Agua Tratada', '2016-08-09', '01:00:00', '2016-08-09', '1-1', 'Muestras tomadas por William Hernández bajo superv');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `informeresultados`
--

CREATE TABLE IF NOT EXISTS `informeresultados` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cotizacionNo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `fechaEnsayo` date NOT NULL,
  `ensayo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `metodoUtilizado` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `rangoPermitido` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `unidades` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `xxxXx` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `xxxXx1` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `xxxXx11` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `uExpa` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `uExpa1` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `uExpa11` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cotizacionNo` (`cotizacionNo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `informeresultados`
--

INSERT INTO `informeresultados` (`id`, `cotizacionNo`, `fechaEnsayo`, `ensayo`, `metodoUtilizado`, `rangoPermitido`, `unidades`, `xxxXx`, `xxxXx1`, `xxxXx11`, `uExpa`, `uExpa1`, `uExpa11`) VALUES
(4, '1-16', '2016-08-09', 'pH ', 'SM: 4500 H+-B. Electrométrico', '7,0-8,0', 'UNIDADES', '6,91 (22,7°C)', '---', '---', '±0,02', '---', '---'),
(5, '1-16', '2016-08-09', 'Turbiedad', 'SM: 2130 B. Nefelométrico', '<2', 'NTU', '0,518', '---', '---', '±0,03', '---', '---'),
(6, '1-16', '2016-08-09', 'Color Aparente', 'SM: 2120 B. Comparación Visual', '---', 'UND. Pt – Co', '0', '---', '---', '---', '---', '---'),
(7, '1-16', '2016-08-09', 'Conductividad', 'SM: 2510-B. Electrométrico', '<2400', 'µS/cm', '438 (25°C)', '---', '---', '±3,76', '---', '---'),
(8, '1-16', '2016-08-09', 'Cloro Residual', 'SM: 4500- Cl G. Colorimétrico DPD', '1,0 - 3,0', 'mg  Cl2/ L', '2,22', '---', '---', '---', '---', '---'),
(9, '1-16', '2016-08-09', 'Cloro Combinado', 'SM: 4500- Cl G. Colorimétrico DPD', '<0,3', 'mg  Cl2/ L', '0,20', '---', '---', '---', '---', '---'),
(10, '1-16', '2016-08-09', 'Cloro Total', 'cálculo', '---', 'mg  Cl2/ L', '2,42', '---', '---', '---', '---', '---');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `metales`
--

CREATE TABLE IF NOT EXISTS `metales` (
  `codigoInterno` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `fechaRecepcion` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `fechaEnsayo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `codigoMuestra` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `metal` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `metalSolucionCartaControl` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `tecnica` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `tecnicaSolucionCartaControl` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `cantidadMuestra` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `cantidadMuestraSolucionCartaControl` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `vFinal` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `vFinalSolucionCartaControl` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `factorDilucion` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `factorDilucionSolucionCartaControl` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `absorbancia` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `absorbanciaSolucionCartaControl` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `concentracionLeida` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `concentracionLeidaSolucionCartaControl` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `concentracionMgUg` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `concentracionMgUgSolucionCartaControl` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `concentracionCorregida` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `concentracionCorregidaSolucionCartaControl` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `unidades` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `unidadesSolucionCartaControl` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `responsable` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`codigoInterno`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nitratos`
--

CREATE TABLE IF NOT EXISTS `nitratos` (
  `codigoInterno` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `fechaRecepcion` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `fechaEnsayo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `codigoMuestra` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `vMuestra1` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `vMuestra2` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `vMuestraSolucionCartaControl` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `abs2201` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `abs2202` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `abs220SolucionCartaControl` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `abs2751` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `abs2752` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `abs275SolucionCartaControl` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `concentracion1` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `concentracion2` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `concentracionSolucionCartaControl` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `concentracionPromedio` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `concentracionPromedioSolucionCartaControl` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `responsable` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`codigoInterno`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nitritos`
--

CREATE TABLE IF NOT EXISTS `nitritos` (
  `codigoInterno` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `fechaRecepcion` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `fechaEnsayo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `codigoMuestra` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `vMuestra1` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `vMuestra2` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `vMuestraSolucionCartaControl` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `vFinal1` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `vFinal2` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `vFinalSolucionCartaControl` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `absorbancia1` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `absorbancia2` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `absorbanciaSolucionCartaControl` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `concentracion1` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `concentracion2` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `concentracionSolucionCartaControl` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `concentracionCorregida1` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `concentracionCorregida2` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `concentracionCorregidaSolucionCartaControl` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `concentracionPromedio` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `concentracionPromedioSolucionCartaControl` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `responsable` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`codigoInterno`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parametrosrecepcion`
--

CREATE TABLE IF NOT EXISTS `parametrosrecepcion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cotizacionNo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `parametro` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `consecutivoA` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `consecutivoB` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `consecutivoC` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `consecutivoD` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `consecutivoE` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `consecutivoF` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `consecutivoG` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `consecutivoH` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `consecutivoI` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `consecutivoJ` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `consecutivoK` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `consecutivoL` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cotizacionNo` (`cotizacionNo`),
  KEY `cotizacionNo_2` (`cotizacionNo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=27 ;

--
-- Volcado de datos para la tabla `parametrosrecepcion`
--

INSERT INTO `parametrosrecepcion` (`id`, `cotizacionNo`, `parametro`, `consecutivoA`, `consecutivoB`, `consecutivoC`, `consecutivoD`, `consecutivoE`, `consecutivoF`, `consecutivoG`, `consecutivoH`, `consecutivoI`, `consecutivoJ`, `consecutivoK`, `consecutivoL`) VALUES
(19, '1-16', 'pH ', 'x', '', '', '', '', '', '', '', '', '', '', ''),
(20, '1-16', 'Turbiedad', 'x', '', '', '', '', '', '', '', '', '', '', ''),
(23, '1-16', 'Conductividad', 'x', '', '', '', '', '', '', '', '', '', '', ''),
(24, '1-16', 'Cloro residual ', 'x', '', '', '', '', '', '', '', '', '', '', ''),
(25, '1-16', 'Cloro combinado', 'x', '', '', '', '', '', '', '', '', '', '', ''),
(26, '1-16', 'Cloro Total', 'x', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recepcion`
--

CREATE TABLE IF NOT EXISTS `recepcion` (
  `cotizacionNo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `codigoInterno` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `fecha` date NOT NULL,
  `numeroMuestras` int(11) NOT NULL,
  `observacionesCliente` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `condicionesMuestra` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `refrigerada` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `operacion` varchar(1000) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`cotizacionNo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `recepcion`
--

INSERT INTO `recepcion` (`cotizacionNo`, `codigoInterno`, `fecha`, `numeroMuestras`, `observacionesCliente`, `condicionesMuestra`, `refrigerada`, `operacion`) VALUES
('1-16', '1', '2016-08-09', 1, 'Muestras tomadas por William Hernández', 'normal', 'si', '<a class="ask" href="//localhost/laboratorio/index.php/welcome/verRecepcion/1-16" target="_blank" onClick="window.open(this.href, this.target, ''width=800, height=600''); return false;">Ver </a><a href="http://localhost/laboratorio/index.php/welcome/EditarRecepcion/1-16">Editar </a><a href="//localhost/laboratorio/index.php/welcome/eliminarRecepcion/1-16" class="confirmacion" >Eliminar </a>');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resultados`
--

CREATE TABLE IF NOT EXISTS `resultados` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `analisis` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `codigoInterno` int(11) NOT NULL,
  `fechaRecepcion` date NOT NULL,
  `fechaEnsayo` date NOT NULL,
  `codigoMuestra` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `operacion` varchar(1000) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `resultados`
--

INSERT INTO `resultados` (`id`, `analisis`, `codigoInterno`, `fechaRecepcion`, `fechaEnsayo`, `codigoMuestra`, `operacion`) VALUES
(8, 'durabilidad', 12, '2016-08-09', '2016-08-09', '12-1', '<a href="//localhost/laboratorio/index.php/welcome/verResultado/12/durabilidad" target="_blank" onClick="window.open(this.href, this.target, ''width=800, height=600''); return false;">Ver </a><a href="http://localhost/laboratorio/index.php/welcome/EditarResultado/12/durabilidad">Editar </a><a href="//localhost/laboratorio/index.php/welcome/eliminarResultado/12/durabilidad" class="confirmacion" >Eliminar </a>');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rosegottlie`
--

CREATE TABLE IF NOT EXISTS `rosegottlie` (
  `codigoInterno` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `fechaRecepcion` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `fechaEnsayo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `codigoMuestra` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `cantidadMuestra1` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `cantidadMuestra2` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `noBeaker1` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `noBeaker2` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `pesoBeakerVacio1` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `pesoBeakerVacio2` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `pesoBeakerMuestra1` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `pesoBeakerMuestra2` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `resultado1` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `resultado2` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `responsable` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`codigoInterno`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitudes`
--

CREATE TABLE IF NOT EXISTS `solicitudes` (
  `id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `razonSocial` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `nitCc` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `solicitante` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `cargo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `telefonoFax` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `municipioDepartamento` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `correoElectronico` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `numeroMuestras` int(11) NOT NULL,
  `tipoMuestras` mediumtext COLLATE utf8_spanish_ci NOT NULL,
  `parametros` mediumtext COLLATE utf8_spanish_ci NOT NULL,
  `observaciones` varchar(5000) COLLATE utf8_spanish_ci NOT NULL,
  `cotizacionElaboradaPor` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `operacion` varchar(1000) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `solicitudes`
--

INSERT INTO `solicitudes` (`id`, `fecha`, `razonSocial`, `nitCc`, `solicitante`, `cargo`, `direccion`, `telefonoFax`, `municipioDepartamento`, `correoElectronico`, `numeroMuestras`, `tipoMuestras`, `parametros`, `observaciones`, `cotizacionElaboradaPor`, `operacion`) VALUES
(1, '2016-08-09', 'CONJUNTO RESIDENCIAL EL TULCAN CASAS', '816003606-7', 'Damaris Jiménez valencia ', 'Administradora', 'Calle 21 No 29-140', '(6) 321 02 66', 'Pereira/Risaralda ', 'dajiva2000@yahoo.con', 1, ' Agua Piscina (Resolución 1618 de 2010)', 'pH \r\nTurbiedad \r\nTemperatura\r\nColor Aparente\r\nConductividad \r\nCloro residual \r\n', 'El descuento es otorgado sobre el valor de los análisis.', 'diego ramírez', '<a href="//localhost/laboratorio/index.php/welcome/verSolicitud/1" target="_blank" onClick="window.open(this.href, this.target, ''width=800, height=600''); return false;">Ver </a><a href="http://localhost/laboratorio/index.php/welcome/EditarSolicitud/1">Editar </a><a href="//localhost/laboratorio/index.php/welcome/eliminarSolicitud/1" class="confirmacion" >Eliminar </a><a href="http://localhost/laboratorio/index.php/welcome/cargarCotizacionSolicitud/816003606-7"> Cargar Cotización</a>'),
(2, '2016-08-09', '1', '1', '1', '1', '1', '1', '1', 'alexander@hotmail.com', 1, '1 ', '1', '1', '11', '<a href="//localhost/laboratorio/index.php/welcome/verSolicitud/2" target="_blank" onClick="window.open(this.href, this.target, ''width=800, height=600''); return false;">Ver </a><a href="http://localhost/laboratorio/index.php/welcome/EditarSolicitud/2">Editar </a><a href="//localhost/laboratorio/index.php/welcome/eliminarSolicitud/2" class="confirmacion" >Eliminar </a><a href="http://localhost/laboratorio/index.php/welcome/cargarCotizacionSolicitud/1"> Cargar Cotización</a>');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solidosdisueltostotales`
--

CREATE TABLE IF NOT EXISTS `solidosdisueltostotales` (
  `codigoInterno` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `fechaRecepcion` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `fechaEnsayo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `codigoMuestra` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `vMuestra1` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `vMuestra2` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `noCapsula1` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `noCapsula2` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `capsulaVacia1` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `capsulaVacia2` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `capsulaMuestra1` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `capsulaMuestra2` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `concentracionSdt1` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `concentracionSdt2` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `concentracionPromedioSdt` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `responsable` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`codigoInterno`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solidosdisueltosvolatiles`
--

CREATE TABLE IF NOT EXISTS `solidosdisueltosvolatiles` (
  `codigoInterno` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `fechaRecepcion` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `fechaEnsayo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `codigoMuestra` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `vAlicuotaMuestraFiltrada1` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `vAlicuotaMuestraFiltrada2` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `noCapsula1` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `noCapsula2` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `capsulaVacia1` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `capsulaVacia2` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `crisolMuestra1` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `crisolMuestra2` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `capsulaMuestra1` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `capsulaMuestra2` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `concentracionSdv1` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `concentracionSdv2` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `concentracionPromedioSdv` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `responsable` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`codigoInterno`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solidosinsolubles`
--

CREATE TABLE IF NOT EXISTS `solidosinsolubles` (
  `codigoInterno` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `fechaRecepcion` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `fechaEnsayo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `codigoMuestra` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `cantidadMuestra1` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `cantidadMuestra2` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `noCrisol1` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `noCrisol2` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `crisolVacio1` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `crisolVacio2` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `crisolMuestra1051` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `crisolMuestra1052` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `conentracionSi1` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `conentracionSi2` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `concentracionPromedioSi` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `responsable` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`codigoInterno`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solidossedimentables`
--

CREATE TABLE IF NOT EXISTS `solidossedimentables` (
  `codigoInterno` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `fechaRecepcion` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `fechaEnsayo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `codigoMuestra` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `vMuestra` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `ss10` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `ss60` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `responsable` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`codigoInterno`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solidossuspendidostotales`
--

CREATE TABLE IF NOT EXISTS `solidossuspendidostotales` (
  `codigoInterno` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `fechaRecepcion` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `fechaEnsayo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `codigoMuestra` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `VmuestraFiltrada1` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `VmuestraFiltrada2` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `VmuestraFiltradaSolucionCartaControl` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `noCrisol1` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `noCrisol2` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `noCrisolSolucionCartaControl` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `crisolVacio1` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `crisolVacio2` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `crisolVacioSolucionCartaControl` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `crisolMuestra1` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `crisolMuestra2` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `crisolMuestraSolucionCartaControl` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `concentracionSst1` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `concentracionSst2` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `concentracionSstSolucionCartaControl` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `concentracionPromedioSst` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `concentracionPromedioSstSolucionCartaControl` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `responsable` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`codigoInterno`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solidossuspendidosvolatiles`
--

CREATE TABLE IF NOT EXISTS `solidossuspendidosvolatiles` (
  `codigoInterno` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `fechaRecepcion` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `fechaEnsayo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `codigoMuestra` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `vMuestraFiltrada1` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `vMuestraFiltrada2` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `noCrisol1` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `noCrisol2` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `crisolVacio1` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `crisolVacio2` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `crisolMuestra1051` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `crisolMuestra1052` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `crisolMuestra5501` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `crisolMuestra5502` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `concentracionSsv1` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `concentracionSsv2` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `concentracionPromedioSsv` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `responsable` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`codigoInterno`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solidostotales`
--

CREATE TABLE IF NOT EXISTS `solidostotales` (
  `codigoInterno` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `fechaRecepcion` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `fechaEnsayo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `codigoMuestra` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `vMuestra1` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `vMuestra2` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `noCapsula1` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `noCapsula2` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `capsulaVacia1` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `capsulaVacia2` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `capsulaMuestra1` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `capsulaMuestra2` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `concentracionSt1` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `concentracionSt2` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `concentracionPromedioSt` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `responsable` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`codigoInterno`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sulfatos`
--

CREATE TABLE IF NOT EXISTS `sulfatos` (
  `codigoInterno` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `fechaRecepcion` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `fechaEnsayo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `codigoMuestra` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `vMuestra1` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `vMuestra2` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `vMuestraSolucionCartaControl` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `vFinal1` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `vFinal2` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `vFinalSolucionCartaControl` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `turbiedad1` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `turbiedad2` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `turbiedadSolucionCartaControl` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `tBlanco` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `tBlancoSolucionCartaControl` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `concentracion1` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `concentracion2` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `concentracionSolucionCartaControl` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `promedio` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `promedioSolucionCartaControl` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `responsable` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`codigoInterno`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `nombre` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `contrasena` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`nombre`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`nombre`, `contrasena`) VALUES
('alexander221b@hotmail.com', '11235811');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `volumetricogerberbabcock`
--

CREATE TABLE IF NOT EXISTS `volumetricogerberbabcock` (
  `codigoInterno` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `fechaRecepcion` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `fechaEnsayo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `codigoMuestra` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `cantidadMuestra` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `butirometro` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `resultado` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `responsable` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`codigoInterno`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `datosmuestrarecepcion`
--
ALTER TABLE `datosmuestrarecepcion`
  ADD CONSTRAINT `datosmuestrarecepcion_ibfk_1` FOREIGN KEY (`cotizacionNo`) REFERENCES `recepcion` (`cotizacionNo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `datosmuestras`
--
ALTER TABLE `datosmuestras`
  ADD CONSTRAINT `datosmuestras_ibfk_1` FOREIGN KEY (`cotizacionNo`) REFERENCES `cotizacion` (`cotizacionNo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `informecaracteristicasmuestra`
--
ALTER TABLE `informecaracteristicasmuestra`
  ADD CONSTRAINT `informecaracteristicasmuestra_ibfk_1` FOREIGN KEY (`cotizacionNo`) REFERENCES `informe` (`cotizacionNo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `informeresultados`
--
ALTER TABLE `informeresultados`
  ADD CONSTRAINT `informeresultados_ibfk_1` FOREIGN KEY (`cotizacionNo`) REFERENCES `informe` (`cotizacionNo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `parametrosrecepcion`
--
ALTER TABLE `parametrosrecepcion`
  ADD CONSTRAINT `parametrosrecepcion_ibfk_1` FOREIGN KEY (`cotizacionNo`) REFERENCES `recepcion` (`cotizacionNo`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
