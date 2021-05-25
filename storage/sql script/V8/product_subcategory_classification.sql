-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-05-2021 a las 16:01:43
-- Versión del servidor: 10.1.30-MariaDB
-- Versión de PHP: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `modulartop`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `product_subcategory_classification`
--

CREATE TABLE `product_subcategory_classification` (
  `id` int(11) NOT NULL,
  `id_product_subcategory` int(11) NOT NULL,
  `name` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `product_subcategory_classification`
--

INSERT INTO `product_subcategory_classification` (`id`, `id_product_subcategory`, `name`) VALUES
(1, 1, 'Premium'),
(2, 1, 'Estándar'),
(3, 2, 'Alto Brillo'),
(4, 2, 'Super Mate'),
(5, 2, 'Estándar'),
(6, 3, 'MDF'),
(7, 3, 'MDP'),
(8, 4, 'Importado'),
(9, 4, 'Nacional'),
(10, 5, 'Estándar'),
(11, 5, 'Hidrófugos'),
(12, 5, 'Ignífugos'),
(13, 5, 'Kompac'),
(14, 6, 'Planos'),
(15, 6, 'Maderas'),
(16, 6, 'Piedras'),
(17, 6, 'Metalicos'),
(18, 6, 'Oxidos'),
(19, 6, 'Stucco');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `product_subcategory_classification`
--
ALTER TABLE `product_subcategory_classification`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `product_subcategory_classification`
--
ALTER TABLE `product_subcategory_classification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
