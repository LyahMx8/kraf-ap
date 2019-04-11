-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-12-2017 a las 21:20:05
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


--
-- Base de datos: `cmskrafdb`
--
-- CREATE DATABASE IF NOT EXISTS `cmskrafdb` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `cmskrafdb`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `TBLCNTRLTPUSR`
--

CREATE TABLE `TBLCNTRLTPUSR` (
  `cmpidtpusr` int(5) NOT NULL,
  `cmpnbmrtp` varchar(15) NOT NULL,
  `cmpstdtip` int(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `TBLCNTRLTPUSR`
--

INSERT INTO `TBLCNTRLTPUSR` (`cmpidtpusr`, `cmpnbmrtp`, `cmpstdtip`) VALUES
(1, 'Administrador', 1),
(2, 'Usuario', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `TBLCNTRLUSRS`
--

CREATE TABLE `TBLCNTRLUSRS` (
  `cmpidusr` int(10) NOT NULL,
  `cmpnmbrusr` varchar(15) NOT NULL,
  `cmppssusr` varchar(128) NOT NULL,
  `cmpnmbrsusr` varchar(30) NOT NULL,
  `cmpapllusr` varchar(30) NOT NULL,
  `cmpnmrtlfnusr` bigint(10) NOT NULL,
  `cmpcrrelctrusr` varchar(45) NOT NULL,
  `cmpfchingulusr` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cmpidtpusr` int(5) NOT NULL DEFAULT '0',
  `cmpstddusr` smallint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `TBLCNTRLUSRS`
--

INSERT INTO `TBLCNTRLUSRS` (`cmpidusr`, `cmpnmbrusr`, `cmppssusr`, `cmpnmbrsusr`, `cmpapllusr`, `cmpnmrtlfnusr`, `cmpcrrelctrusr`, `cmpfchingulusr`, `cmpidtpusr`, `cmpstddusr`) VALUES
(1, 'jimmycareculo', 'lamasputa', '', '',0, '', '0000-00-00 00:00:00', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `TBLDTSINCFOTR`
--

CREATE TABLE `TBLDTSINCFOTR` (
  `cmpidprtinc` int(10) NOT NULL,
  `cmptitlnstrs` varchar(120) NOT NULL,
  `cmpcntndinc` text NOT NULL,
  `cmpnmbrpgn` text NOT NULL,
  `cmpfchacntd` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cmpstdcntnd` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `TBLDTSINCFOTR`
--

INSERT INTO `TBLDTSINCFOTR` (`cmpidprtinc`, `cmptitlnstrs`, `cmpcntndinc`, `cmpnmbrpgn`, `cmpfchacntd`, `cmpstdcntnd`) VALUES
(1, 'Conocimiento es poder', 'El relato es simple cada quien puede manejar lo que desea, asÃ­ mismo se ve obligado a repeler lo que no le consierne.', '<h1>Hablabamos sobre Nosotros - Kraf</h1>', '2017-11-27 20:42:16', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `TBLDTSSERVCSOPCN`
--

CREATE TABLE `TBLDTSSERVCSOPCN` (
  `cmpidservcicnt` int(5) NOT NULL,
  `cmpclsiconserv` varchar(30) NOT NULL,
  `cmpnombservco` varchar(40) NOT NULL,
  `cmpcontndsrvc` text NOT NULL,
  `cmpidservco` int(5) NOT NULL,
  `cmpstdservcio` smallint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `TBLDTSSERVCSOPCN`
--

INSERT INTO `TBLDTSSERVCSOPCN` (`cmpidservcicnt`, `cmpclsiconserv`, `cmpnombservco`, `cmpcontndsrvc`, `cmpidservco`, `cmpstdservcio`) VALUES
(1, 'icon-printer', 'Impresión Digital', '<h1>HolaMundo! Probando si se puede modificar<br></h1>', 1, 1),
(2, 'icon-page-break', 'Corte Láser', '<h1>Corte Laser LALALALA Prueba<br></h1>', 1, 1),
(3, 'pulse icon-mobile', 'Desarrollo Web', '<h1>Desarrollo Web</h1>', 1, 1),
(4, 'icon-stack', 'Sublimación Transfer', '<h1>Sublimacion</h1>', 1, 1),
(5, 'pulse icon-user-tie', 'Asesorías y Charlas', '', 2, 1),
(6, 'pulse icon-target', 'Señalización', '', 2, 1),
(7, 'pulse icon-aid-kit', 'Elementos de Seguridad', '', 2, 1),
(8, 'pulse icon-bug', 'Fumigaciones', '', 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `TBLDTSSERVCSTIP`
--

CREATE TABLE `TBLDTSSERVCSTIP` (
  `cmpidservco` int(5) NOT NULL,
  `cmpnombrsrvco` varchar(35) NOT NULL,
  `cmpstdservco` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `TBLDTSSERVCSTIP`
--

INSERT INTO `TBLDTSSERVCSTIP` (`cmpidservco`, `cmpnombrsrvco`, `cmpstdservco`) VALUES
(1, 'Agencia Publicitaria', 1),
(2, 'Seguridad Industrial', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `TBLCNTRLTPUSR`
--
ALTER TABLE `TBLCNTRLTPUSR`
  ADD PRIMARY KEY (`cmpidtpusr`);

--
-- Indices de la tabla `TBLCNTRLUSRS`
--
ALTER TABLE `TBLCNTRLUSRS`
  ADD PRIMARY KEY (`cmpidusr`);

--
-- Indices de la tabla `TBLDTSINCFOTR`
--
ALTER TABLE `TBLDTSINCFOTR`
  ADD PRIMARY KEY (`cmpidprtinc`);

--
-- Indices de la tabla `TBLDTSSERVCSOPCN`
--
ALTER TABLE `TBLDTSSERVCSOPCN`
  ADD PRIMARY KEY (`cmpidservcicnt`);

--
-- Indices de la tabla `TBLDTSSERVCSTIP`
--
ALTER TABLE `TBLDTSSERVCSTIP`
  ADD PRIMARY KEY (`cmpidservco`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `TBLCNTRLTPUSR`
--
ALTER TABLE `TBLCNTRLTPUSR`
  MODIFY `cmpidtpusr` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `TBLCNTRLUSRS`
--
ALTER TABLE `TBLCNTRLUSRS`
  MODIFY `cmpidusr` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `TBLDTSINCFOTR`
--
ALTER TABLE `TBLDTSINCFOTR`
  MODIFY `cmpidprtinc` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `TBLDTSSERVCSOPCN`
--
ALTER TABLE `TBLDTSSERVCSOPCN`
  MODIFY `cmpidservcicnt` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `TBLDTSSERVCSTIP`
--
ALTER TABLE `TBLDTSSERVCSTIP`
  MODIFY `cmpidservco` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
