-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 15, 2024 at 12:40 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `emagine_moments`
--

-- --------------------------------------------------------

--
-- Table structure for table `clientes`
--

CREATE TABLE `clientes` (
  `IdCliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clientes`
--

INSERT INTO `clientes` (`IdCliente`) VALUES
(18);

-- --------------------------------------------------------

--
-- Table structure for table `contratos`
--

CREATE TABLE `contratos` (
  `IdContrato` int(11) NOT NULL,
  `IdCliente` int(11) NOT NULL,
  `IdServicio` int(11) NOT NULL,
  `FechaYHora` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contratos`
--

INSERT INTO `contratos` (`IdContrato`, `IdCliente`, `IdServicio`, `FechaYHora`) VALUES
(7, 18, 2, '2024-11-13 14:21:01'),
(8, 18, 2, '2024-11-14 21:03:54'),
(9, 18, 11, '2024-11-14 23:36:14'),
(10, 18, 12, '2024-11-14 23:39:12'),
(11, 18, 11, '2024-11-14 23:40:13');

-- --------------------------------------------------------

--
-- Table structure for table `estadoscontrato`
--

CREATE TABLE `estadoscontrato` (
  `IdEstadoContrato` int(11) NOT NULL,
  `IdContrato` int(11) NOT NULL,
  `IdTipoEstadoContrato` int(11) NOT NULL,
  `FechaInicioEstado` timestamp NOT NULL DEFAULT current_timestamp(),
  `FechaFinEstado` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `estadoscontrato`
--

INSERT INTO `estadoscontrato` (`IdEstadoContrato`, `IdContrato`, `IdTipoEstadoContrato`, `FechaInicioEstado`, `FechaFinEstado`) VALUES
(3, 7, 1, '2024-11-13 14:21:01', NULL),
(4, 8, 1, '2024-11-14 21:03:54', NULL),
(5, 9, 1, '2024-11-14 23:36:14', NULL),
(6, 10, 1, '2024-11-14 23:39:12', NULL),
(7, 11, 1, '2024-11-14 23:40:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `estadostransaccion`
--

CREATE TABLE `estadostransaccion` (
  `IdEstadoTransaccion` int(11) NOT NULL,
  `IdTransaccion` int(11) NOT NULL,
  `IdTipoEstadoTransaccion` int(11) NOT NULL,
  `FechaInicioEstado` timestamp NOT NULL DEFAULT current_timestamp(),
  `FechaFinEstado` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `prestadores`
--

CREATE TABLE `prestadores` (
  `IdPrestador` int(11) NOT NULL,
  `IdTipoPrestador` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `prestadores`
--

INSERT INTO `prestadores` (`IdPrestador`, `IdTipoPrestador`) VALUES
(13, 2),
(10, 3),
(39, 8);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `IdReview` int(11) NOT NULL,
  `IdCliente` int(11) NOT NULL,
  `IdContrato` int(11) NOT NULL,
  `Comentario` varchar(500) DEFAULT NULL,
  `Calificacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `IdRol` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Descripcion` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`IdRol`, `Nombre`, `Descripcion`) VALUES
(1, 'Administrador', 'Rol con acceso total al sistema'),
(2, 'Cliente', 'Rol para los que buscan organizar eventos.'),
(3, 'Prestador', 'Rol para quienes ofrecen servicios de eventos');

-- --------------------------------------------------------

--
-- Table structure for table `servicios`
--

CREATE TABLE `servicios` (
  `IdServicio` int(11) NOT NULL,
  `IdTipoServicio` int(11) NOT NULL,
  `IdPrestador` int(11) NOT NULL,
  `Costo` decimal(10,2) NOT NULL,
  `Descripcion` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `servicios`
--

INSERT INTO `servicios` (`IdServicio`, `IdTipoServicio`, `IdPrestador`, `Costo`, `Descripcion`) VALUES
(2, 1, 10, 1000.00, 'Concierto de Mariachis'),
(4, 2, 10, 500.00, 'Buffet italiano'),
(8, 1, 13, 1000.00, 'Pianistas'),
(9, 1, 10, 10000.00, 'Solista con guitarra'),
(10, 4, 39, 100.00, 'Estilo elegante'),
(11, 3, 39, 2000.00, 'Stand-Up'),
(12, 5, 39, 100.00, 'Mesas y sillas');

-- --------------------------------------------------------

--
-- Table structure for table `tiposestadocontrato`
--

CREATE TABLE `tiposestadocontrato` (
  `IdTipoEstadoContrato` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Descripcion` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tiposestadocontrato`
--

INSERT INTO `tiposestadocontrato` (`IdTipoEstadoContrato`, `Nombre`, `Descripcion`) VALUES
(1, 'Pendiente', 'El contrato está pendiente de ser aprobado'),
(2, 'En Ejecución', 'El contrato está activo y en proceso de ejecución'),
(3, 'Aceptado', 'El contrato ha sido aceptado y está en espera de la transacción.'),
(4, 'Finalizado', 'El contrato ha llegado a su fin y se ha completado con éxito.'),
(5, 'Cancelado', 'El contrato ha sido cancelado y no se ejecutará');

-- --------------------------------------------------------

--
-- Table structure for table `tiposestadotransaccion`
--

CREATE TABLE `tiposestadotransaccion` (
  `IdTipoEstadoTransaccion` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Descripcion` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tiposprestador`
--

CREATE TABLE `tiposprestador` (
  `IdTipoPrestador` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Descripcion` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tiposprestador`
--

INSERT INTO `tiposprestador` (`IdTipoPrestador`, `Nombre`, `Descripcion`) VALUES
(1, 'Solista', 'Artista musical que se presenta individualmente.'),
(2, 'Banda', 'Grupo de músicos que tocan diferentes instrumentos.'),
(3, 'DJ', 'Disc Jockey que mezcla música para eventos.'),
(4, 'Chef', 'Profesional de la cocina especializado en preparaciones culinarias.'),
(5, 'Comediante', 'Artista que realiza espectáculos de comedia.'),
(6, 'Decorador', 'Profesional especializado en decoración de eventos.'),
(7, 'Alquiler de Mobiliario', 'Servicio de alquiler de muebles y equipamiento para eventos.'),
(8, 'Animador', 'Profesional que dirige actividades recreativas en eventos.');

-- --------------------------------------------------------

--
-- Table structure for table `tiposservicio`
--

CREATE TABLE `tiposservicio` (
  `IdTipoServicio` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Descripcion` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tiposservicio`
--

INSERT INTO `tiposservicio` (`IdTipoServicio`, `Nombre`, `Descripcion`) VALUES
(1, 'Música y Entretenimiento', 'Artistas dedicados a proveer música en vivo para eventos, ya sea como solistas, bandas o DJs.'),
(2, 'Gastronomía y Bebidas', 'Profesionales de la cocina y mixología que preparan menús y bebidas según las necesidades del evento'),
(3, 'Espectáculo y Animación', 'Artistas y animadores que ofrecen espectáculos y actividades para entretener a los asistentes.'),
(4, 'Decoración y Ambientación', 'Especialistas en diseño y montaje de ambientes para crear la estética ideal del evento.'),
(5, 'Logística y Mobiliario', 'Proveedores de mobiliario y equipo necesario para montar el espacio del evento.');

-- --------------------------------------------------------

--
-- Table structure for table `transacciones`
--

CREATE TABLE `transacciones` (
  `IdTransaccion` int(11) NOT NULL,
  `IdContrato` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `IdUsuario` int(11) NOT NULL,
  `IdRol` int(11) NOT NULL,
  `PrimerNombre` varchar(50) NOT NULL,
  `OtrosNombres` varchar(100) DEFAULT NULL,
  `PrimerApellido` varchar(50) NOT NULL,
  `OtrosApellidos` varchar(100) DEFAULT NULL,
  `Email` varchar(100) NOT NULL,
  `Contrasena` varchar(255) DEFAULT NULL,
  `Direccion` varchar(100) NOT NULL,
  `Telefono` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`IdUsuario`, `IdRol`, `PrimerNombre`, `OtrosNombres`, `PrimerApellido`, `OtrosApellidos`, `Email`, `Contrasena`, `Direccion`, `Telefono`) VALUES
(2, 1, 'Diomedes', 'Farid', 'Cerda', 'Torres', 'diomedes@admin.com', '$2y$10$3QTKCLi7g.d06oQ0us4cK.V0BCpqGqcDC9zfBX.9fxT5Gl1tou3L2', 'Carrera 53 # 70 - 86', '3010000000'),
(10, 3, 'Mauricio', 'Marcos', 'Polo', 'Martinez', 'mauri@gmail.com', '$2y$10$mCWWLJqRnk4mPvauNqAPvuNjbIXfcA3zxsqqZ/H3xkkd.6VtoBDRi', 'Carrera 53 # 70 - 86', '3010000001'),
(13, 3, 'Jairos', 'Junior', 'Guetes', 'Miranda', 'jairo@archlinux.com', '$2y$10$J7EBSnm/lifV65tk422EduCi5Ry0wec3aoiYYg4xVGdM87JJIMy3q', '47 W 13th St, New York, NY 10011, USA', '3056123502'),
(18, 2, 'Alexander', 'David', 'Ruidiaz', 'Carrascal', 'alexander@gmail.com', '$2y$10$9bY3t2LbhIK2VS05di9eBOMQ6odpOx/4vwgCr2Fotmwjr4MQ8.736', 'Carrera 5 # 23 - 83', '3010000043'),
(39, 3, 'Johan', 'Albert', 'Robles', 'Solano', 'johan@gmail.com', '$2y$10$qR.VkNzUI66Rg5ree4Tmo.lqzuFIHnXmFHmxewHj9NNJvJwtIVU.G', 'Carrera 53 # 70 - 86', '3032425322');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`IdCliente`);

--
-- Indexes for table `contratos`
--
ALTER TABLE `contratos`
  ADD PRIMARY KEY (`IdContrato`),
  ADD KEY `IdCliente` (`IdCliente`),
  ADD KEY `IdServicio` (`IdServicio`);

--
-- Indexes for table `estadoscontrato`
--
ALTER TABLE `estadoscontrato`
  ADD PRIMARY KEY (`IdEstadoContrato`),
  ADD KEY `IdTipoEstadoContrato` (`IdTipoEstadoContrato`),
  ADD KEY `fk_IdContrato` (`IdContrato`);

--
-- Indexes for table `estadostransaccion`
--
ALTER TABLE `estadostransaccion`
  ADD PRIMARY KEY (`IdEstadoTransaccion`),
  ADD KEY `IdTransaccion` (`IdTransaccion`),
  ADD KEY `IdTipoEstadoTransaccion` (`IdTipoEstadoTransaccion`);

--
-- Indexes for table `prestadores`
--
ALTER TABLE `prestadores`
  ADD PRIMARY KEY (`IdPrestador`),
  ADD KEY `IdTipoPrestador` (`IdTipoPrestador`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`IdReview`),
  ADD KEY `IdCliente` (`IdCliente`),
  ADD KEY `IdContrato` (`IdContrato`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`IdRol`),
  ADD UNIQUE KEY `Nombre` (`Nombre`);

--
-- Indexes for table `servicios`
--
ALTER TABLE `servicios`
  ADD PRIMARY KEY (`IdServicio`),
  ADD KEY `IdPrestador` (`IdPrestador`),
  ADD KEY `IdTipoServicio` (`IdTipoServicio`,`IdPrestador`) USING BTREE;

--
-- Indexes for table `tiposestadocontrato`
--
ALTER TABLE `tiposestadocontrato`
  ADD PRIMARY KEY (`IdTipoEstadoContrato`),
  ADD UNIQUE KEY `Nombre` (`Nombre`);

--
-- Indexes for table `tiposestadotransaccion`
--
ALTER TABLE `tiposestadotransaccion`
  ADD PRIMARY KEY (`IdTipoEstadoTransaccion`),
  ADD UNIQUE KEY `Nombre` (`Nombre`);

--
-- Indexes for table `tiposprestador`
--
ALTER TABLE `tiposprestador`
  ADD PRIMARY KEY (`IdTipoPrestador`),
  ADD UNIQUE KEY `Nombre` (`Nombre`);

--
-- Indexes for table `tiposservicio`
--
ALTER TABLE `tiposservicio`
  ADD PRIMARY KEY (`IdTipoServicio`),
  ADD UNIQUE KEY `Nombre` (`Nombre`);

--
-- Indexes for table `transacciones`
--
ALTER TABLE `transacciones`
  ADD PRIMARY KEY (`IdTransaccion`),
  ADD KEY `IdContrato` (`IdContrato`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`IdUsuario`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD UNIQUE KEY `Telefono` (`Telefono`),
  ADD KEY `IdRol` (`IdRol`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contratos`
--
ALTER TABLE `contratos`
  MODIFY `IdContrato` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `estadoscontrato`
--
ALTER TABLE `estadoscontrato`
  MODIFY `IdEstadoContrato` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `estadostransaccion`
--
ALTER TABLE `estadostransaccion`
  MODIFY `IdEstadoTransaccion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `IdReview` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `IdRol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `servicios`
--
ALTER TABLE `servicios`
  MODIFY `IdServicio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tiposestadocontrato`
--
ALTER TABLE `tiposestadocontrato`
  MODIFY `IdTipoEstadoContrato` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tiposestadotransaccion`
--
ALTER TABLE `tiposestadotransaccion`
  MODIFY `IdTipoEstadoTransaccion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tiposprestador`
--
ALTER TABLE `tiposprestador`
  MODIFY `IdTipoPrestador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tiposservicio`
--
ALTER TABLE `tiposservicio`
  MODIFY `IdTipoServicio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `transacciones`
--
ALTER TABLE `transacciones`
  MODIFY `IdTransaccion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `IdUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `clientes_ibfk_1` FOREIGN KEY (`IdCliente`) REFERENCES `usuarios` (`IdUsuario`);

--
-- Constraints for table `contratos`
--
ALTER TABLE `contratos`
  ADD CONSTRAINT `contratos_ibfk_1` FOREIGN KEY (`IdCliente`) REFERENCES `clientes` (`IdCliente`),
  ADD CONSTRAINT `contratos_ibfk_2` FOREIGN KEY (`IdServicio`) REFERENCES `servicios` (`IdServicio`);

--
-- Constraints for table `estadoscontrato`
--
ALTER TABLE `estadoscontrato`
  ADD CONSTRAINT `estadoscontrato_ibfk_1` FOREIGN KEY (`IdContrato`) REFERENCES `contratos` (`IdContrato`),
  ADD CONSTRAINT `estadoscontrato_ibfk_2` FOREIGN KEY (`IdTipoEstadoContrato`) REFERENCES `tiposestadocontrato` (`IdTipoEstadoContrato`),
  ADD CONSTRAINT `fk_IdContrato` FOREIGN KEY (`IdContrato`) REFERENCES `contratos` (`IdContrato`);

--
-- Constraints for table `estadostransaccion`
--
ALTER TABLE `estadostransaccion`
  ADD CONSTRAINT `estadostransaccion_ibfk_1` FOREIGN KEY (`IdTransaccion`) REFERENCES `transacciones` (`IdTransaccion`),
  ADD CONSTRAINT `estadostransaccion_ibfk_2` FOREIGN KEY (`IdTipoEstadoTransaccion`) REFERENCES `tiposestadotransaccion` (`IdTipoEstadoTransaccion`);

--
-- Constraints for table `prestadores`
--
ALTER TABLE `prestadores`
  ADD CONSTRAINT `prestadores_ibfk_1` FOREIGN KEY (`IdPrestador`) REFERENCES `usuarios` (`IdUsuario`),
  ADD CONSTRAINT `prestadores_ibfk_2` FOREIGN KEY (`IdTipoPrestador`) REFERENCES `tiposprestador` (`IdTipoPrestador`);

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`IdCliente`) REFERENCES `clientes` (`IdCliente`),
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`IdContrato`) REFERENCES `contratos` (`IdContrato`);

--
-- Constraints for table `servicios`
--
ALTER TABLE `servicios`
  ADD CONSTRAINT `servicios_ibfk_1` FOREIGN KEY (`IdTipoServicio`) REFERENCES `tiposservicio` (`IdTipoServicio`),
  ADD CONSTRAINT `servicios_ibfk_2` FOREIGN KEY (`IdPrestador`) REFERENCES `prestadores` (`IdPrestador`);

--
-- Constraints for table `transacciones`
--
ALTER TABLE `transacciones`
  ADD CONSTRAINT `transacciones_ibfk_1` FOREIGN KEY (`IdContrato`) REFERENCES `contratos` (`IdContrato`);

--
-- Constraints for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`IdRol`) REFERENCES `roles` (`IdRol`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;