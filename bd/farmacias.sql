-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-06-2025 a las 21:12:30
-- Versión del servidor: 5.6.17
-- Versión de PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `farmacias`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `farmacia`
--

CREATE TABLE IF NOT EXISTS `farmacia` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `correo` varchar(100) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `farmacia`
--

INSERT INTO `farmacia` (`id`, `correo`, `nombre`, `direccion`) VALUES
(2, 'yamairin@gamil.com', 'Farmavida', 'Calle. Sucre'),
(3, 'yamairin@gmail.com', 'Farmavida', 'Calle Sucre');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medicamentos`
--

CREATE TABLE IF NOT EXISTS `medicamentos` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `correo` varchar(100) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `presentacion` varchar(100) NOT NULL,
  `categoria` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `medicamentos`
--

INSERT INTO `medicamentos` (`id`, `correo`, `nombre`, `presentacion`, `categoria`) VALUES
(2, 'mariapadilla@gmail.com', 'Ibuprofeno', 'CÃ¡psulas 400mg', 'Antiinflamatorio'),
(3, 'yamairin@gamil.com', 'Paracetamol', 'Tabletas 500mg', 'AnalgÃ©sico');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tratamientos`
--

CREATE TABLE IF NOT EXISTS `tratamientos` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `correo` varchar(100) NOT NULL,
  `tratamientos` varchar(100) NOT NULL,
  `horarios` varchar(100) NOT NULL,
  `medicamentos` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `tratamientos`
--

INSERT INTO `tratamientos` (`id`, `correo`, `tratamientos`, `horarios`, `medicamentos`) VALUES
(2, 'yamairin@gamil.com', 'Gripe', '8:00am', 'Teragrip'),
(4, 'yamairin@gmail.com', 'MigraÃ±a', '10:00am', 'Migrem');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `clave` varchar(100) NOT NULL,
  `confirmarClave` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `correo`, `clave`, `confirmarClave`) VALUES
(1, '', '', '', '', ''),
(2, 'Yamairin', 'AcuÃ±a', 'yamairin@gamil.com', 'guasdualito12', 'guasdualito12'),
(3, 'MarÃ­a', 'AcuÃ±a', 'yamairin@gmail.com', 'guasdualito12', 'guasdualito12'),
(4, 'MarÃ­a', 'Padilla', 'mariapadilla@gmail.com', '1234', '1234');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
