-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 14-06-2025 a las 21:55:54
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `crud_htmx_php`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_alumnos`
--

CREATE TABLE `tbl_alumnos` (
  `id_alumno` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `sexo` enum('Masculino','Femenino','Otro') NOT NULL,
  `curso` varchar(100) NOT NULL,
  `habla_ingles` tinyint(1) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp(),
  `fecha_actualizacion` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tbl_alumnos`
--

INSERT INTO `tbl_alumnos` (`id_alumno`, `nombre`, `email`, `sexo`, `curso`, `habla_ingles`, `status`, `fecha_creacion`, `fecha_actualizacion`) VALUES
(1, 'Urian viera', 'uriany@gmail.com', 'Masculino', 'REACT', 1, 1, '2025-05-19 00:05:39', '2025-06-14 18:58:58'),
(29, 'Braudin', 'iamfullstackdev2023@gmail.com', 'Femenino', 'JS', 0, 1, '2025-05-22 02:00:18', '2025-06-14 18:38:33'),
(71, 'Midudev', 'Midudev@gmail.com', 'Masculino', 'JS', 1, 1, '2025-05-22 02:00:18', '2025-06-14 19:55:35'),
(72, 'Fernando', 'fernando@gmail.com', 'Masculino', 'JS', 1, 0, '2025-05-22 02:00:18', '2025-06-14 19:55:02'),
(73, 'Luis', 'uri6756any@gmail.com', 'Masculino', 'REACT', 1, 1, '2025-05-19 00:05:39', '2025-06-14 18:52:23'),
(75, 'Felipe', 'felipe@gmail.com', 'Masculino', 'JS', 1, 1, '2025-06-14 16:51:37', '2025-06-14 19:53:35'),
(76, 'Carlos', 'carlos@gmail.com', 'Masculino', 'PHP', 1, 1, '2025-06-14 16:52:58', '2025-06-14 19:53:54'),
(77, 'Brenda', 'brenda@gmail.com', 'Femenino', 'REACT', 1, 0, '2025-06-14 16:54:35', '2025-06-14 19:54:23'),
(78, 'Camilo', 'camilo@gmail.com', 'Masculino', 'HTML', 1, 0, '2025-06-14 17:00:03', '2025-06-14 19:54:42');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_alumnos`
--
ALTER TABLE `tbl_alumnos`
  ADD PRIMARY KEY (`id_alumno`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_alumnos`
--
ALTER TABLE `tbl_alumnos`
  MODIFY `id_alumno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
