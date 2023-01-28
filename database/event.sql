-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 28, 2023 at 09:00 PM
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
(1, 'Kwizera Ibrahim', 68274651, 'A001123', '20220705_210905.jpg', 'Buyenzi', '2023-01-28 19:15:24'),
(2, 'Simbananiye Hafsa', 68274651, 'B001123', '20220705_210905.jpg', 'Buyenzi', '2023-01-28 19:46:27');

-- --------------------------------------------------------

--
-- Table structure for table `hotels`
--

CREATE TABLE `hotels` (
  `id_hotel` int(11) NOT NULL,
  `nom-hotel` varchar(20) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id_notification` int(11) NOT NULL,
  `titre` varchar(100) NOT NULL,
  `message` text NOT NULL
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
-- Table structure for table `soiree`
--

CREATE TABLE `soiree` (
  `id_soiree` int(11) NOT NULL,
  `nom-soiree` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `prix` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `date_heure` int(11) NOT NULL,
  `whatsapp` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(3, 'Ibrahim', 'Kwizera', 'kwib@biu.bi', '75703042', 'PO25007', 'product-2.jpg', 'Burundi', 'Ngozi', 'Participant', 0, 'admin', '2023-01-28 15:49:26'),
(4, 'Ibrahim', 'Kwizera', 'kwizera.ibrahim@gmail.com', '75703042', 'PO25007', 'product-1.jpg', 'Burundi', 'Bubanza', 'Administrateur', 0, 'admin', '2023-01-28 15:51:57'),
(5, 'Ibrahim', 'Kwizera', 'kwizera.ibrahim529@gmail.com', '75703042', 'PO25007', 'product-3.jpg', 'Burundi', 'Kayanza', 'Super administrateur', 0, 'admin', '2023-01-28 16:01:39');

-- --------------------------------------------------------

--
-- Table structure for table `voitures`
--

CREATE TABLE `voitures` (
  `id_voiture` int(11) NOT NULL,
  `nom_marque` varchar(100) NOT NULL,
  `modele` varchar(10) NOT NULL,
  `photo_vehicule` varchar(255) DEFAULT NULL,
  `plaque` varchar(50) NOT NULL,
  `id_chauffeur` int(11) NOT NULL,
  `whatsapp` varchar(100) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `date_voiture` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `voitures`
--

INSERT INTO `voitures` (`id_voiture`, `nom_marque`, `modele`, `photo_vehicule`, `plaque`, `id_chauffeur`, `whatsapp`, `status`, `date_voiture`) VALUES
(1, 'Tx', 'Prado', 'tp-link-m7200-4g-lte-mobile-wi-fi.jpg', 'A0123467', 1, NULL, 'Libre', '2023-01-28 19:48:03'),
(2, 'sdfgh', '55', '_MG_1960.jpg', 'a', 1, NULL, 'Libre', '2023-01-28 19:50:47'),
(3, 'sajdh', 'q', '5f4cb93ab92c2e39678b4567_1618396971.jpg', '4', 2, NULL, 'Reserver', '2023-01-28 19:56:50');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id_notification`);

--
-- Indexes for table `programmes`
--
ALTER TABLE `programmes`
  ADD PRIMARY KEY (`id_programme`);

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
-- AUTO_INCREMENT for table `chauffeurs`
--
ALTER TABLE `chauffeurs`
  MODIFY `id_chauffeur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `hotels`
--
ALTER TABLE `hotels`
  MODIFY `id_hotel` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id_notification` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `programmes`
--
ALTER TABLE `programmes`
  MODIFY `id_programme` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `soiree`
--
ALTER TABLE `soiree`
  MODIFY `id_soiree` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `voitures`
--
ALTER TABLE `voitures`
  MODIFY `id_voiture` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

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
