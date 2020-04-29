-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-04-2020 a las 17:52:04
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `servsocial`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estatus`
--

CREATE TABLE `estatus` (
  `id` int(11) NOT NULL,
  `clave` varchar(5) NOT NULL,
  `descripcion` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `dependencias`(
  `id` int(11) NOT NULL,
  `nombre` varchar(120) NOT NULL,
  `calle` varchar(30) NOT NULL,
  `noCalle` varchar(10) NOT NULL,
  `col` varchar(50) NOT NULL,
  `tel` varchar(10) NOT NULL,
   CONSTRAINT pk_dependencias PRIMARY KEY(id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


CREATE TABLE `tipoprograma`(
  `id` int(11) NOT NULL ,
  `nombre` varchar(40) NOT NULL,
  `idDependencia` int(11) NOT NULL,
  CONSTRAINT pk_tipoprog PRIMARY KEY(id),
  CONSTRAINT fk_idDep FOREIGN KEY(idDependencia) references dependencias(id))ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
--
-- Volcado de datos para la tabla `estatus`
--

INSERT INTO `estatus` (`id`, `clave`, `descripcion`) VALUES
(72, '01', 'Activo'),
(73, '02', 'Baja temporal'),
(74, '03', 'Baja definitiva');


INSERT INTO `dependencias`(`id`,`nombre`,`calle`,`noCalle`,`col`,`tel`) VALUES 
(01,'Secretaría de la Función Pública','Insurgentes Sur ','No. 1735', 'Delegación Álvaro Obregón','2000300045'),
(02,'Programas internos','Insurgentes Sur ','No. 1735', 'Delegación Álvaro Obregón','2000300045'),
(03,'Programas externos','Insurgentes Sur ','No. 1735', 'Delegación Álvaro Obregón','2000300045');

INSERT INTO `tipoprograma`(`id`,`nombre`,`idDependencia`) VALUES
(10,'SFP',01),
(11,'Curso Primeros Auxilios',02),
(12,'Becario',03);
--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `estatus`
--
ALTER TABLE `estatus`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `indxClave` (`clave`),
  ADD UNIQUE KEY `5` (`id`);

ALTER TABLE `dependencias`
  ADD UNIQUE KEY `indxDep`(`nombre`),
  ADD UNIQUE KEY `5` (`id`);

ALTER TABLE `tipoprograma`
  ADD UNIQUE KEY `indxTipo`(`nombre`),
  ADD UNIQUE KEY `5`(`id`);
--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `estatus`
--
ALTER TABLE `estatus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;
COMMIT;
ALTER TABLE `tipoprograma`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
