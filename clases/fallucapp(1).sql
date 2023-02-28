-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 27, 2023 at 06:20 PM
-- Server version: 10.9.4-MariaDB
-- PHP Version: 8.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fallucapp`
--
CREATE DATABASE IF NOT EXISTS `fallucapp` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `fallucapp`;

-- --------------------------------------------------------

--
-- Table structure for table `dispositivos`
--

CREATE TABLE `dispositivos` (
  `idDispositivo` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `ubicacion` varchar(45) NOT NULL,
  `descripcion` longtext NOT NULL,
  `configuracion` varchar(45) NOT NULL,
  `idTipoDisp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dispositivos`
--

INSERT INTO `dispositivos` (`idDispositivo`, `nombre`, `ubicacion`, `descripcion`, `configuracion`, `idTipoDisp`) VALUES
(1, 'Router Cisco', 'Edificio A - Site 1', 'Router principal de la red', 'configrouter1.pdf', 1),
(2, 'Switch HP', 'Edificio B - Site 2', 'Switch de acceso en el piso 2', 'configswitch2.txt', 2),
(3, 'Firewall Fortinet', 'Edificio C - Site 3', 'Firewall de borde para la red corporativa', 'configfw3.txt', 3),
(4, 'Router Juniper', 'Edificio D - Site 4', 'Router de enlace de fibra óptica', 'configrouter4.xml', 1),
(5, 'Switch Aruba', 'Edificio E - Site 5', 'Switch de distribución de red', 'configswitch5.xml', 2),
(6, 'Firewall Palo Alto', 'Edificio F - Site 6', 'Firewall para segmento de servidores', 'configfw6.txt', 3),
(7, 'Router MikroTik', 'Edificio G - Site 7', 'Router para red de oficinas remotas', 'configrouter7.xml', 1),
(8, 'Switch D-Link', 'Edificio H - Site 8', 'Switch de acceso en el piso 3', 'configswitch8.txt', 2),
(9, 'Firewall Check Point', 'Edificio I - Site 9', 'Firewall para segmento de almacenamiento', 'configfw9.xml', 3),
(10, 'Router Huawei', 'Edificio J - Site 10', 'Router de enlace de fibra óptica', 'configrouter10.txt', 1),
(11, 'Switch Netgear', 'Edificio K - Site 11', 'Switch de distribución de red', 'configswitch11.xml', 2),
(12, 'Firewall SonicWall', 'Edificio L - Site 12', 'Firewall de borde para la red de invitados', 'configfw12.txt', 3),
(13, 'Router Ubiquiti', 'Edificio M - Site 13', 'Router de enlace de radiofrecuencia', 'configrouter13.xml', 1),
(14, 'Switch TP-Link', 'Edificio N - Site 14', 'Switch de acceso en el piso 1', 'configswitch14.txt', 2),
(15, 'Firewall Cisco ASA', 'Edificio O - Site 15', 'Firewall para segmento de seguridad de red', 'configfw15.xml', 3),
(16, 'Modem ADSL', 'Edificio A', 'Modem ADSL 2+', 'modemadsl.cfg', 4),
(17, 'Bridge TP-Link', 'Edificio B', 'Bridge punto a punto', 'bridgetplink.cfg', 5),
(18, 'Repetidor WiFi', 'Edificio C', 'Repetidor inalámbrico 300 Mbps', 'repetidorwifi300.cfg', 6),
(19, 'Hub 3Com', 'Edificio D', 'Hub Ethernet 8 puertos', 'hub3com.cfg', 7),
(20, 'Router MikroTik', 'Edificio E', 'Router WiFi 2.4 GHz', 'routermikrotik.cfg', 1),
(21, 'Switch Cisco Catalyst', 'Edificio F', 'Switch 2960X 24 puertos', 'switchciscocat.cfg', 2),
(22, 'Firewall Sophos', 'Edificio G', 'Firewall XG 85', 'firewallsophos.cfg', 3),
(23, 'Bridge Ubiquiti', 'Edificio H', 'Bridge de largo alcance', 'bridgeubiquiti.cfg', 5),
(24, 'Repetidor TP-Link', 'Edificio I', 'Repetidor inalámbrico 750 Mbps', 'repetidortplink.cfg', 6),
(25, 'Hub D-Link', 'Edificio J', 'Hub Ethernet 16 puertos', 'hubdlink.cfg', 7);

--
-- Triggers `dispositivos`
--
DELIMITER $$
CREATE TRIGGER `ACTUALIZAR_INVENTARIO` AFTER INSERT ON `dispositivos` FOR EACH ROW UPDATE `inventario` SET cantidad = cantidad + 1 WHERE idTipoDisp = new.idTipoDisp
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `DISMINUIR_INVENTARIO` AFTER DELETE ON `dispositivos` FOR EACH ROW UPDATE `inventario` SET cantidad = cantidad - 1
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `fallas`
--

CREATE TABLE `fallas` (
  `idFalla` int(11) NOT NULL,
  `codigo` varchar(45) NOT NULL,
  `ubicacion` varchar(45) NOT NULL,
  `descripcion` longtext NOT NULL,
  `idDispositivo` int(11) NOT NULL,
  `idTipoF` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `inventario`
--

CREATE TABLE `inventario` (
  `id` int(11) NOT NULL,
  `cantidad` int(5) NOT NULL DEFAULT 0,
  `idTipoDisp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inventario`
--

INSERT INTO `inventario` (`id`, `cantidad`, `idTipoDisp`) VALUES
(2, 2, 1),
(3, 2, 2),
(4, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `protocolos`
--

CREATE TABLE `protocolos` (
  `idProtocolo` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tipos_dispositivos`
--

CREATE TABLE `tipos_dispositivos` (
  `idTipoDisp` int(11) NOT NULL,
  `tipo` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tipos_dispositivos`
--

INSERT INTO `tipos_dispositivos` (`idTipoDisp`, `tipo`) VALUES
(1, 'Router'),
(2, 'Switch'),
(3, 'Firewall'),
(4, 'Modem'),
(5, 'Bridge'),
(6, 'Repetidor'),
(7, 'Hub');

--
-- Triggers `tipos_dispositivos`
--
DELIMITER $$
CREATE TRIGGER `AGREGAR_INVENTARIO` AFTER INSERT ON `tipos_dispositivos` FOR EACH ROW INSERT INTO `inventario`(cantidad, idTipoDisp) VALUES(0, new.idTipoDisp)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tipo_fallas`
--

CREATE TABLE `tipo_fallas` (
  `idTipoF` int(11) NOT NULL,
  `tipo` varchar(45) NOT NULL,
  `descripcion` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dispositivos`
--
ALTER TABLE `dispositivos`
  ADD PRIMARY KEY (`idDispositivo`),
  ADD KEY `idTipoDisp` (`idTipoDisp`);

--
-- Indexes for table `fallas`
--
ALTER TABLE `fallas`
  ADD PRIMARY KEY (`idFalla`);

--
-- Indexes for table `inventario`
--
ALTER TABLE `inventario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idTipoDisp` (`idTipoDisp`);

--
-- Indexes for table `protocolos`
--
ALTER TABLE `protocolos`
  ADD PRIMARY KEY (`idProtocolo`);

--
-- Indexes for table `tipos_dispositivos`
--
ALTER TABLE `tipos_dispositivos`
  ADD PRIMARY KEY (`idTipoDisp`);

--
-- Indexes for table `tipo_fallas`
--
ALTER TABLE `tipo_fallas`
  ADD PRIMARY KEY (`idTipoF`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dispositivos`
--
ALTER TABLE `dispositivos`
  MODIFY `idDispositivo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `fallas`
--
ALTER TABLE `fallas`
  MODIFY `idFalla` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inventario`
--
ALTER TABLE `inventario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `protocolos`
--
ALTER TABLE `protocolos`
  MODIFY `idProtocolo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tipos_dispositivos`
--
ALTER TABLE `tipos_dispositivos`
  MODIFY `idTipoDisp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tipo_fallas`
--
ALTER TABLE `tipo_fallas`
  MODIFY `idTipoF` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dispositivos`
--
ALTER TABLE `dispositivos`
  ADD CONSTRAINT `dispositivos_ibfk_1` FOREIGN KEY (`idTipoDisp`) REFERENCES `tipos_dispositivos` (`idTipoDisp`);

--
-- Constraints for table `inventario`
--
ALTER TABLE `inventario`
  ADD CONSTRAINT `inventario_ibfk_1` FOREIGN KEY (`idTipoDisp`) REFERENCES `tipos_dispositivos` (`idTipoDisp`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;