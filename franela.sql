-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-10-2016 a las 02:08:39
-- Versión del servidor: 10.1.13-MariaDB
-- Versión de PHP: 5.5.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `franela`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagen`
--

CREATE TABLE `imagen` (
  `path` varchar(50) NOT NULL,
  `fk_id_turno` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `imagen`
--

INSERT INTO `imagen` (`path`, `fk_id_turno`) VALUES
('images/57fbfb7ba510c_20160720_130405.jpg', 37),
('images/57fbfe63d8c09_14045580_1459555067394647_518', 38),
('images/57fbfe85eefa8_', 39),
('images/57fbfecc33db2_', 40),
('images/57fbffdbb2b86_', 41),
('images/57fc0c3f3a95b_20160720_130405.jpg', 42),
('images/57fc0c5b25c40_IMG-20161004-WA0001.jpg', 43),
('images/57fc10ae14296_', 44),
('images/57fc10d9867dc_', 45),
('images/580260437108f_20160812_173034.jpg', 46),
('images/58026043792e9_20160819_123529.jpg', 46),
('images/580264c8a4f27_20160820_122050.jpg', 47),
('images/5803f07272ec0_limpieza.png', 48),
('images/5803f3d02b7d5_Sintitulo.png', 49),
('images/5803f4025610a_Sintitulo.png', 50),
('images/580401017cb46_Sintitulo.png', 1),
('images/580405303f7bb_Sintitulo.png', 2),
('images/5804056e233f1_home-photo1.jpg', 3),
('images/5804062e899d2_Sintitulo.png', 4),
('images/580407473cb1d_Sintitulo.png', 5),
('images/5804075281b28_Sintitulo.png', 6),
('images/58040957c1389_Sintitulo.png', 10),
('images/58040ff7bd2e7_home-photo1.jpg', 12),
('images/58040ff7c4274_limpieza.png', 12),
('images/5804114e57a39_home-photo1.jpg', 13),
('images/5804114e7b681_limpieza.png', 13);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paquete`
--

CREATE TABLE `paquete` (
  `id_paquete` int(11) NOT NULL,
  `paquete` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `paquete`
--

INSERT INTO `paquete` (`id_paquete`, `paquete`) VALUES
(1, 'PACK FULL'),
(2, 'PACK MEDIUM'),
(3, 'PACK BASICO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `turno`
--

CREATE TABLE `turno` (
  `id_turno` int(11) NOT NULL,
  `cliente` varchar(40) NOT NULL,
  `turno` varchar(30) NOT NULL,
  `fk_paquete` int(11) NOT NULL,
  `finalizado` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `paquete`
--
ALTER TABLE `paquete`
  ADD PRIMARY KEY (`id_paquete`);

--
-- Indices de la tabla `turno`
--
ALTER TABLE `turno`
  ADD PRIMARY KEY (`id_turno`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `paquete`
--
ALTER TABLE `paquete`
  MODIFY `id_paquete` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `turno`
--
ALTER TABLE `turno`
  MODIFY `id_turno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;