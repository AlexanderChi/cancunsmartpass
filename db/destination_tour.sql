-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 22-08-2022 a las 18:17:49
-- Versión del servidor: 10.3.35-MariaDB
-- Versión de PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cancunpass`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `destination_tour`
--

CREATE TABLE `destination_tour` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `destination_id` int(10) UNSIGNED NOT NULL,
  `tour_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `destination_tour`
--

INSERT INTO `destination_tour` (`id`, `destination_id`, `tour_id`) VALUES
(1, 22, 4),
(2, 26, 4),
(3, 22, 5),
(4, 22, 6),
(5, 22, 7),
(6, 26, 7),
(7, 27, 7),
(8, 22, 9),
(9, 26, 9),
(10, 22, 10),
(11, 26, 10),
(12, 22, 11),
(13, 22, 12),
(14, 26, 12),
(15, 22, 13),
(16, 26, 13),
(17, 27, 13),
(18, 22, 14),
(19, 26, 14),
(20, 27, 14),
(21, 22, 15),
(22, 26, 15),
(23, 27, 15),
(24, 22, 16),
(25, 26, 16),
(26, 27, 16),
(27, 22, 17),
(28, 26, 17),
(29, 22, 18),
(30, 22, 19),
(31, 22, 20),
(32, 22, 21),
(33, 22, 22),
(34, 26, 22),
(35, 27, 22),
(36, 22, 24),
(37, 22, 25),
(38, 26, 25),
(39, 27, 25),
(40, 22, 26),
(41, 22, 27),
(42, 22, 28),
(43, 23, 29),
(44, 22, 30),
(45, 22, 31),
(46, 26, 31),
(47, 27, 31),
(48, 22, 32),
(49, 26, 32),
(50, 27, 32),
(51, 22, 34),
(52, 22, 35),
(53, 26, 35),
(54, 27, 35),
(55, 22, 36),
(56, 26, 36),
(57, 26, 37),
(58, 22, 38),
(59, 23, 39),
(60, 22, 40),
(61, 26, 41),
(62, 22, 42),
(63, 26, 43),
(64, 22, 44),
(65, 26, 44),
(66, 27, 44),
(67, 22, 45),
(68, 26, 45),
(69, 27, 45),
(70, 22, 46),
(71, 25, 46),
(72, 26, 46),
(73, 27, 46),
(74, 22, 47),
(75, 26, 47),
(76, 27, 47),
(77, 22, 48),
(78, 26, 48),
(79, 27, 48),
(80, 22, 49),
(81, 26, 49),
(82, 27, 49),
(83, 22, 50),
(84, 26, 50),
(85, 27, 50),
(86, 22, 51),
(87, 26, 51),
(88, 27, 51),
(89, 26, 52),
(90, 27, 52),
(91, 26, 53),
(92, 22, 54),
(93, 22, 55),
(94, 23, 55);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `destination_tour`
--
ALTER TABLE `destination_tour`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `destination_tour`
--
ALTER TABLE `destination_tour`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
