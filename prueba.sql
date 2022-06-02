-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 02-06-2022 a las 21:29:05
-- Versión del servidor: 5.7.36
-- Versión de PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `prueba`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `adopciones`
--

DROP TABLE IF EXISTS `adopciones`;
CREATE TABLE IF NOT EXISTS `adopciones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_id` int(11) NOT NULL,
  `perro_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_perro` (`perro_id`),
  KEY `FK_usuario` (`usuario_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `conocenos`
--

DROP TABLE IF EXISTS `conocenos`;
CREATE TABLE IF NOT EXISTS `conocenos` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `quienes_somos` longtext,
  `objetivo` mediumtext,
  `ubicacion` longtext,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `conocenos`
--

INSERT INTO `conocenos` (`ID`, `quienes_somos`, `objetivo`, `ubicacion`) VALUES
(1, 'Test', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perros`
--

DROP TABLE IF EXISTS `perros`;
CREATE TABLE IF NOT EXISTS `perros` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) DEFAULT NULL,
  `description` mediumtext,
  `raza` int(30) DEFAULT NULL,
  `edad` int(11) DEFAULT NULL,
  `foto` varchar(50) CHARACTER SET utf16 COLLATE utf16_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `raza` (`raza`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `perros`
--

INSERT INTO `perros` (`id`, `nombre`, `description`, `raza`, `edad`, `foto`) VALUES
(1, '&Ntilde;igu', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eleifend auctor sapien, rhoncus auctor arcu. Ut in felis sem. Proin nec eros eu erat consectetur egestas a vel augue. Nullam vestibulum, magna in convallis scelerisque, nisl nisl pellentesque lectus, nec hendrerit dui mi nec turpis. Nunc ultrices purus eget dui pretium, in feugiat metus malesuada. Cras felis leo, scelerisque at porta id, interdum eu mi. Praesent non facilisis leo. Aliquam erat volutpat. Donec a sagittis ex. In cursus congue nibh sit amet cursus. Aenean fringilla nulla sed massa maximus vehicula.', 1, 3, './assets/images/perroheader2.jpg'),
(2, '&Ntilde;igu 2', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eleifend auctor sapien, rhoncus auctor arcu. Ut in felis sem. Proin nec eros eu erat consectetur egestas a vel augue. Nullam vestibulum, magna in convallis scelerisque, nisl nisl pellentesque lectus, nec hendrerit dui mi nec turpis. Nunc ultrices purus eget dui pretium, in feugiat metus malesuada. Cras felis leo, scelerisque at porta id, interdum eu mi. Praesent non facilisis leo. Aliquam erat volutpat. Donec a sagittis ex. In cursus congue nibh sit amet cursus. Aenean fringilla nulla sed massa maximus vehicula.', 2, 3, './assets/images/perroheader2.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `razas`
--

DROP TABLE IF EXISTS `razas`;
CREATE TABLE IF NOT EXISTS `razas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `razas`
--

INSERT INTO `razas` (`id`, `nombre`) VALUES
(1, 'Pitbull'),
(2, 'akita');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `isadmin` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellidos`, `telefono`, `email`, `password`, `isadmin`) VALUES
(1, 'ADMIN', 'sin apellidos', '6000000', 'admin@test.com', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', 1),
(22, 'Test', 'ape', '0000', 'test@test.com', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', 0);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `adopciones`
--
ALTER TABLE `adopciones`
  ADD CONSTRAINT `adopciones_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `adopciones_ibfk_2` FOREIGN KEY (`perro_id`) REFERENCES `perros` (`id`);

--
-- Filtros para la tabla `perros`
--
ALTER TABLE `perros`
  ADD CONSTRAINT `perros_ibfk_1` FOREIGN KEY (`raza`) REFERENCES `razas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
