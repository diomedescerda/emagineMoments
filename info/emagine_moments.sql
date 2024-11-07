-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2024 at 10:59 PM
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
(1, 5, 4, '2024-11-07 01:57:28', NULL),
(2, 6, 5, '2024-11-07 15:24:40', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `estadoscontrato`
--
ALTER TABLE `estadoscontrato`
  ADD PRIMARY KEY (`IdEstadoContrato`),
  ADD KEY `IdTipoEstadoContrato` (`IdTipoEstadoContrato`),
  ADD KEY `fk_IdContrato` (`IdContrato`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `estadoscontrato`
--
ALTER TABLE `estadoscontrato`
  MODIFY `IdEstadoContrato` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `estadoscontrato`
--
ALTER TABLE `estadoscontrato`
  ADD CONSTRAINT `estadoscontrato_ibfk_1` FOREIGN KEY (`IdContrato`) REFERENCES `contratos` (`IdContrato`),
  ADD CONSTRAINT `estadoscontrato_ibfk_2` FOREIGN KEY (`IdTipoEstadoContrato`) REFERENCES `tiposestadocontrato` (`IdTipoEstadoContrato`),
  ADD CONSTRAINT `fk_IdContrato` FOREIGN KEY (`IdContrato`) REFERENCES `contratos` (`IdContrato`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
