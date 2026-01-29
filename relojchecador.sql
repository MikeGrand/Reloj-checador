-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-11-2024 a las 05:46:06
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `relojchecador`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entradassalidas`
--

CREATE TABLE `entradassalidas` (
  `idTrabajador` int(5) NOT NULL,
  `entrada` datetime NOT NULL,
  `salidaComer` datetime NOT NULL,
  `regresoComer` datetime NOT NULL,
  `salida` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `entradassalidas`
--

INSERT INTO `entradassalidas` (`idTrabajador`, `entrada`, `salidaComer`, `regresoComer`, `salida`) VALUES
(12345, '2024-11-29 19:42:06', '2024-11-29 22:02:28', '2024-11-30 01:39:57', '2024-11-29 22:09:24'),
(0, '2024-11-30 01:40:32', '2024-11-30 01:40:32', '2024-11-30 01:40:32', '2024-11-30 01:40:32'),
(0, '2024-11-30 01:40:32', '2024-11-30 01:40:32', '2024-11-30 01:40:32', '2024-11-30 01:40:32'),
(12346, '2024-11-29 19:42:29', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12347, '2024-11-29 22:10:04', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2024-11-29 22:24:19'),
(12348, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2024-11-29 22:27:33', '0000-00-00 00:00:00'),
(12350, '2024-11-29 22:25:06', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12351, '0000-00-00 00:00:00', '2024-11-29 22:05:42', '0000-00-00 00:00:00', '2024-11-29 22:02:45');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
