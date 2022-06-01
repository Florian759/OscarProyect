-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 31-05-2022 a las 15:48:43
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
-- Base de datos: `doginside`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `conocenos`
--

DROP TABLE IF EXISTS `conocenos`;
CREATE TABLE IF NOT EXISTS `conocenos` (
  `ID` int(255) NOT NULL AUTO_INCREMENT,
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
  `perros_id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) DEFAULT NULL,
  `description` mediumtext NOT NULL,
  `raza` varchar(30) DEFAULT NULL,
  `edad` int(11) DEFAULT NULL,
  `id` int(11) DEFAULT NULL,
  `foto` varchar(50) CHARACTER SET utf16 COLLATE utf16_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`perros_id`),
  KEY `FK_PerrosUsuarios` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `perros`
--

INSERT INTO `perros` (`perros_id`, `nombre`, `description`, `raza`, `edad`, `id`, `foto`) VALUES
(1, 'Ñigu', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eleifend auctor sapien, rhoncus auctor arcu. Ut in felis sem. Proin nec eros eu erat consectetur egestas a vel augue. Nullam vestibulum, magna in convallis scelerisque, nisl nisl pellentesque lectus, nec hendrerit dui mi nec turpis. Nunc ultrices purus eget dui pretium, in feugiat metus malesuada. Cras felis leo, scelerisque at porta id, interdum eu mi. Praesent non facilisis leo. Aliquam erat volutpat. Donec a sagittis ex. In cursus congue nibh sit amet cursus. Aenean fringilla nulla sed massa maximus vehicula.', 'Ñagu', 3, NULL, './assets/images/perroheader2.jpg'),
(2, 'Ñigu 2', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eleifend auctor sapien, rhoncus auctor arcu. Ut in felis sem. Proin nec eros eu erat consectetur egestas a vel augue. Nullam vestibulum, magna in convallis scelerisque, nisl nisl pellentesque lectus, nec hendrerit dui mi nec turpis. Nunc ultrices purus eget dui pretium, in feugiat metus malesuada. Cras felis leo, scelerisque at porta id, interdum eu mi. Praesent non facilisis leo. Aliquam erat volutpat. Donec a sagittis ex. In cursus congue nibh sit amet cursus. Aenean fringilla nulla sed massa maximus vehicula.', 'Ñagu 2', 3, 16, './assets/images/perroheader2.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuarios` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `isadmin` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuarios`, `password`, `isadmin`) VALUES
(1, 'ADMIN', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', 1),
(11, 'UBU', 'ubu', 0),
(12, 'UBU', 'ubu', 0),
(14, '', 'cf83e1357eefb8bdf1542850d66d8007d620e4050b5715dc83f4a921d36ce9ce47d0d13c5d85f2b0ff8318d2877eec2f63b931bd47417a81a538327af927da3e', 0),
(15, 'intento', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', 0),
(16, 'testing', '521b9ccefbcd14d179e7a1bb877752870a6d620938b28a66a107eac6e6805b9d0989f45b5730508041aa5e710847d439ea74cd312c9355f1f2dae08d40e41d50', 1),
(17, 'user', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', 0);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `perros`
--
ALTER TABLE `perros`
  ADD CONSTRAINT `FK_PerrosUsuarios` FOREIGN KEY (`id`) REFERENCES `usuarios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
