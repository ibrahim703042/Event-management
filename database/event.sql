-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 01, 2023 at 11:30 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `event`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `ID` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telephone` varchar(50) NOT NULL,
  `profile` varchar(50) NOT NULL,
  `role_as` tinyint(1) NOT NULL,
  `status_admin` int(11) DEFAULT 0,
  `mot_passe` varchar(255) NOT NULL,
  `date_admin` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`ID`, `nom`, `email`, `telephone`, `profile`, `role_as`, `status_admin`, `mot_passe`, `date_admin`) VALUES
(1, 'Ibrahim703042', 'kwizera.ibrahim@gmail.com', '75703042', 'assets/img/avatars/profile/20220705_210905.jpg', 1, 1, '$2y$10$to/zVGKVCAVXtUILeQMc6OZ8fuhxMkKaFVSxNJjEMM.Wqhpj/VFL.', '2023-02-01 22:28:46'),
(2, 'Ibrahim', 'kwizera.ibrahim6@gmail.com', '75703042', 'assets/img/avatars/profile/messages-2.jpg', 0, 0, '$2y$10$kamTqzXeEep7iWnClNcZXOQO9Vu4TKliuu4UPcR0tmpETkYhJqS7K', '2023-02-01 23:22:38'),
(3, 'Hafsa', 'kwizera.ibrahim52@gmail.com', '75703042', 'assets/img/avatars/profile/logo.png', 0, 0, '$2y$10$cXhHJ7JMlL/QyUUB5VEaUun82wdJw9taJ/2Gms85wVe1crfwS9TYS', '2023-02-01 23:22:25'),
(4, 'Administrateur', 'kwib@biu.bi', '75703042', 'assets/img/avatars/profile/_MG_1960.jpg', 0, 1, '$2y$10$HiEUWbD3J1nXNKbZuDLPAuUvpeEoM614LxOW/m1AAqLaUs0wpgwH2', '2023-02-01 23:22:19');

-- --------------------------------------------------------

--
-- Table structure for table `chauffeurs`
--

CREATE TABLE `chauffeurs` (
  `id_chauffeur` int(11) NOT NULL,
  `nom_complet` varchar(100) NOT NULL,
  `numero_telephone` int(11) NOT NULL,
  `numero_permis_conduir` varchar(50) NOT NULL,
  `photo` varchar(200) DEFAULT NULL,
  `addresse` varchar(100) NOT NULL,
  `date_chauffeur` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chauffeurs`
--

INSERT INTO `chauffeurs` (`id_chauffeur`, `nom_complet`, `numero_telephone`, `numero_permis_conduir`, `photo`, `addresse`, `date_chauffeur`) VALUES
(1, 'ibrahim', 55, '666', NULL, '7777', '2023-02-01 18:09:20');

-- --------------------------------------------------------

--
-- Table structure for table `hotels`
--

CREATE TABLE `hotels` (
  `id_hotel` int(11) NOT NULL,
  `hotel` varchar(20) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `addresse` varchar(100) NOT NULL,
  `link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hotels`
--

INSERT INTO `hotels` (`id_hotel`, `hotel`, `photo`, `addresse`, `link`) VALUES
(17, '11', 'assets/img/20210607-INNOUTBURGERS-JANJIGIAN-seriouseats-23-b2b8a505ff414272aab71590a8985b85.jpg', 'asdfgh', 'SS');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(11) NOT NULL,
  `permission` int(11) NOT NULL,
  `view` tinyint(4) NOT NULL,
  `create` tinyint(4) NOT NULL DEFAULT 0,
  `delete` tinyint(4) NOT NULL DEFAULT 0,
  `createByID` tinyint(4) NOT NULL DEFAULT 0,
  `update` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `programmes`
--

CREATE TABLE `programmes` (
  `id_programme` int(11) NOT NULL,
  `upload` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `publications`
--

CREATE TABLE `publications` (
  `id_not` int(11) NOT NULL,
  `titre` varchar(30) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `publications`
--

INSERT INTO `publications` (`id_not`, `titre`, `content`) VALUES
(2, 'tyui', 'sdrhj\r\n\\jinoij');

-- --------------------------------------------------------

--
-- Table structure for table `soiree`
--

CREATE TABLE `soiree` (
  `id_soiree` int(11) NOT NULL,
  `nom_soiree` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `prix` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `date_heure` int(11) NOT NULL,
  `whatsapp` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `soiree`
--

INSERT INTO `soiree` (`id_soiree`, `nom_soiree`, `address`, `prix`, `id_utilisateur`, `date_heure`, `whatsapp`) VALUES
(1, 'Ndihokubwayo', '1st kavumu road, Kamenge-Ntahangwa', 1800, 3, 2023, '+25761552799');

-- --------------------------------------------------------

--
-- Table structure for table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id_utilisateur` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `numero_telephone` varchar(50) NOT NULL,
  `passport` varchar(70) NOT NULL,
  `photo` varchar(50) NOT NULL,
  `pays` varchar(50) NOT NULL,
  `rotary` varchar(50) NOT NULL,
  `status` varchar(100) NOT NULL,
  `role` int(11) NOT NULL DEFAULT 0,
  `mot_de_passe` varchar(50) NOT NULL,
  `date_utilisateur` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id_utilisateur`, `nom`, `prenom`, `email`, `numero_telephone`, `passport`, `photo`, `pays`, `rotary`, `status`, `role`, `mot_de_passe`, `date_utilisateur`) VALUES
(3, 'Ibrahim4444444', 'Kwizera', 'kwib@biu.bi', '75703042', 'PO25007', 'product-2.jpg', 'Burundi', 'Ngozi', '1', 0, 'admin', '2023-01-31 14:43:33'),
(4, 'Ibrahim', 'Kwizera', 'kwizera.ibrahim@gmail.com', '75703042', 'PO25007', 'product-1.jpg', 'Burundi', 'Bubanza', '1', 0, 'admin', '2023-01-30 22:06:17'),
(5, 'Ibrahim', 'Kwizera', 'kwizera.ibrahim529@gmail.com', '75703042', 'PO25007', 'product-3.jpg', 'Burundi', 'Kayanza', '1', 0, 'admin', '2023-01-29 11:16:16');

-- --------------------------------------------------------

--
-- Table structure for table `voitures`
--

CREATE TABLE `voitures` (
  `id_voiture` int(11) NOT NULL,
  `nom_marque` varchar(100) NOT NULL,
  `modele` varchar(10) NOT NULL,
  `photo_vehicule` text NOT NULL,
  `plaque` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `id_chauffeur` int(11) NOT NULL,
  `whatsapp` varchar(100) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `date_voiture` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `chauffeurs`
--
ALTER TABLE `chauffeurs`
  ADD PRIMARY KEY (`id_chauffeur`);

--
-- Indexes for table `hotels`
--
ALTER TABLE `hotels`
  ADD PRIMARY KEY (`id_hotel`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD KEY `FK_permission` (`permission`);

--
-- Indexes for table `programmes`
--
ALTER TABLE `programmes`
  ADD PRIMARY KEY (`id_programme`);

--
-- Indexes for table `publications`
--
ALTER TABLE `publications`
  ADD PRIMARY KEY (`id_not`);

--
-- Indexes for table `soiree`
--
ALTER TABLE `soiree`
  ADD PRIMARY KEY (`id_soiree`),
  ADD KEY `Fk_utilisateurs` (`id_utilisateur`);

--
-- Indexes for table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id_utilisateur`);

--
-- Indexes for table `voitures`
--
ALTER TABLE `voitures`
  ADD PRIMARY KEY (`id_voiture`),
  ADD KEY `Fk_chauffeur` (`id_chauffeur`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `chauffeurs`
--
ALTER TABLE `chauffeurs`
  MODIFY `id_chauffeur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hotels`
--
ALTER TABLE `hotels`
  MODIFY `id_hotel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `programmes`
--
ALTER TABLE `programmes`
  MODIFY `id_programme` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `publications`
--
ALTER TABLE `publications`
  MODIFY `id_not` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `soiree`
--
ALTER TABLE `soiree`
  MODIFY `id_soiree` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `voitures`
--
ALTER TABLE `voitures`
  MODIFY `id_voiture` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `permissions`
--
ALTER TABLE `permissions`
  ADD CONSTRAINT `FK_permission` FOREIGN KEY (`permission`) REFERENCES `admins` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `soiree`
--
ALTER TABLE `soiree`
  ADD CONSTRAINT `Fk_utilisateurs` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateurs` (`id_utilisateur`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `voitures`
--
ALTER TABLE `voitures`
  ADD CONSTRAINT `Fk_chauffeur` FOREIGN KEY (`id_chauffeur`) REFERENCES `chauffeurs` (`id_chauffeur`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
