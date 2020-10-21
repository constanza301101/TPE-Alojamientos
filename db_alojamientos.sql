-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-10-2020 a las 00:57:36
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_alojamientos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `habitacion`
--

CREATE TABLE `habitacion` (
  `id` int(11) NOT NULL,
  `id_hotel` int(11) NOT NULL,
  `capacidadMax` int(11) NOT NULL,
  `cantCamas` int(11) NOT NULL,
  `cantBanios` int(11) NOT NULL,
  `wifi` tinyint(1) NOT NULL,
  `tv` tinyint(1) NOT NULL,
  `descripcion` varchar(256) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `habitacion`
--

INSERT INTO `habitacion` (`id`, `id_hotel`, `capacidadMax`, `cantCamas`, `cantBanios`, `wifi`, `tv`, `descripcion`, `estado`) VALUES
(1, 1, 5, 3, 1, 1, 1, 'Habitación para 5 personas, cuenta con una cama matrimonial y 3 camas de una plaza, cuenta con Televisión por cable, WiFi, un baño y vista a las sierras', NULL),
(1, 2, 3, 2, 2, 1, 1, 'NULL', NULL),
(1, 4, 3, 3, 1, 1, 1, NULL, NULL),
(1, 5, 2, 3, 1, 1, 1, NULL, NULL),
(2, 1, 3, 3, 2, 1, 1, 'NULL', NULL),
(2, 3, 2, 2, 1, 0, 0, 'NULL', NULL),
(2, 5, 3, 2, 2, 1, 1, 'NULL', NULL),
(3, 2, 3, 3, 1, 1, 1, NULL, NULL),
(3, 4, 1, 1, 1, 0, 0, 'NULL', NULL),
(3, 5, 1, 1, 1, 1, 0, 'NULL', NULL),
(3, 6, 5, 4, 1, 0, 1, NULL, NULL),
(4, 2, 3, 2, 2, 1, 1, 'NULL', NULL),
(4, 3, 2, 2, 1, 1, 1, 'NULL', NULL),
(4, 4, 5, 4, 2, 1, 1, 'NULL', NULL),
(4, 6, 5, 3, 1, 0, 1, NULL, NULL),
(5, 1, 2, 1, 1, 1, 1, 'Habitación para 2 con cama matrimonial, con televisión por cable, WiFi, un baño', NULL),
(5, 4, 2, 1, 1, 1, 1, NULL, NULL),
(5, 5, 5, 4, 3, 1, 0, 'NULL', NULL),
(5, 6, 3, 2, 1, 1, 1, 'NULL', NULL),
(6, 1, 2, 1, 1, 0, 0, 'NULL', NULL),
(6, 3, 5, 3, 1, 1, 1, NULL, NULL),
(7, 2, 4, 3, 2, 1, 0, 'NULL', NULL),
(8, 2, 3, 2, 1, 1, 1, NULL, NULL),
(8, 5, 2, 2, 2, 1, 0, NULL, NULL),
(9, 3, 5, 3, 1, 1, 1, NULL, NULL),
(10, 1, 2, 2, 1, 1, 1, 'Habitación para 2 con camas individuales, con televisión por cable, WiFi, un baño', NULL),
(10, 3, 1, 3, 1, 1, 1, NULL, NULL),
(10, 4, 4, 2, 1, 1, 1, NULL, NULL),
(10, 6, 2, 2, 2, 1, 1, 'NULL', NULL),
(11, 6, 2, 2, 1, 0, 0, 'NULL', NULL),
(12, 2, 4, 4, 1, 1, 1, NULL, NULL),
(12, 5, 2, 3, 1, 1, 1, NULL, NULL),
(12, 6, 5, 4, 1, 0, 1, NULL, NULL),
(13, 2, 2, 2, 1, 0, 0, 'NULL', NULL),
(13, 3, 2, 3, 1, 1, 1, NULL, NULL),
(13, 5, 3, 3, 1, 1, 1, NULL, NULL),
(13, 6, 5, 3, 1, 0, 1, NULL, NULL),
(14, 1, 1, 1, 1, 1, 1, 'NULL', NULL),
(14, 5, 4, 3, 1, 1, 1, NULL, NULL),
(15, 3, 3, 3, 1, 1, 1, NULL, NULL),
(15, 4, 2, 1, 1, 1, 1, 'NULL\r\n', NULL),
(16, 3, 4, 3, 1, 1, 1, NULL, NULL),
(16, 4, 2, 1, 1, 1, 0, 'NULL\r\n', NULL),
(17, 1, 4, 3, 1, 1, 0, 'Habitación amplia, con una cama matrimonial y 2 camas individuales, cuenta con un baño, WiFi y vista al centro de la ciudad', NULL),
(17, 4, 3, 3, 1, 1, 0, NULL, NULL),
(17, 5, 1, 2, 1, 1, 0, NULL, NULL),
(18, 1, 1, 1, 1, 1, 1, 'NULL', NULL),
(18, 2, 2, 2, 2, 1, 0, 'NULL', NULL),
(18, 4, 1, 1, 1, 1, 1, 'NULL', NULL),
(18, 6, 1, 1, 1, 0, 0, 'NULL', NULL),
(19, 2, 2, 1, 1, 1, 1, NULL, NULL),
(19, 3, 3, 2, 3, 1, 1, 'NULL', NULL),
(20, 2, 4, 3, 1, 1, 1, NULL, NULL),
(20, 4, 3, 2, 2, 1, 1, 'NULL', NULL),
(21, 1, 4, 3, 2, 1, 0, 'NULL', NULL),
(21, 5, 4, 3, 1, 1, 1, NULL, NULL),
(21, 6, 5, 2, 1, 0, 1, NULL, NULL),
(22, 1, 4, 3, 2, 1, 0, 'NULL', NULL),
(22, 3, 5, 4, 2, 1, 1, 'NULL', NULL),
(22, 6, 5, 4, 1, 0, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hotel`
--

CREATE TABLE `hotel` (
  `id_hotel` int(11) NOT NULL,
  `localidad` varchar(256) NOT NULL,
  `nombre` varchar(256) NOT NULL,
  `direccion` varchar(256) NOT NULL,
  `telContacto` varchar(256) NOT NULL,
  `valoracion` decimal(5,0) DEFAULT NULL,
  `descripcion` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `hotel`
--

INSERT INTO `hotel` (`id_hotel`, `localidad`, `nombre`, `direccion`, `telContacto`, `valoracion`, `descripcion`) VALUES
(1, 'Tandil', 'Mulen Hotel', 'Av. Santamarina 380', '0249 422-1718', '4', NULL),
(2, 'Tandil', 'Hotel Elegance', ' Km. 160.5, RN226', '0249 440-6982', '4', NULL),
(3, 'Tandil', 'Las Pircas Cabañas & Spal', 'Las Orquideas 1237', '0249 420-8023', '4', NULL),
(4, 'Mar del Plata', 'Hotel Las Rocas', 'Alberti 9', '0223 451-5362', '4', NULL),
(5, 'Mar del Plata', 'Hotel Sainte Jeanne', 'Martín Miguel de Güemes 2850', '0223 420-9200', '5', NULL),
(6, 'Mar del Plata', 'Hotel Nuit', 'Alvarado 1452', '0223 451-7360', '5', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `email` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `id` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`email`, `password`, `id`) VALUES
('maga@gmail.com', '$2y$10$3OWZUMXUHdnK0KJ/HqM0bedM7Xy7HorIxX/lL2q0SVJLHTFxiD/tS', '0');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `habitacion`
--
ALTER TABLE `habitacion`
  ADD PRIMARY KEY (`id`,`id_hotel`),
  ADD KEY `id_hotel` (`id_hotel`);

--
-- Indices de la tabla `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`id_hotel`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `habitacion`
--
ALTER TABLE `habitacion`
  ADD CONSTRAINT `habitacion_ibfk_1` FOREIGN KEY (`id_hotel`) REFERENCES `hotel` (`id_hotel`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
