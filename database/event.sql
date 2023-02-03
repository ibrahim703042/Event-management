-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 03, 2023 at 11:27 AM
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
(1, 'Ibrahim', 'kwizera.ibrahim@gmail.com', '68274651', '5f4cb93ab92c2e39678b4567_1618396971.jpg', 1, 1, '$2y$10$fxSLs0IkZTXGTqUb9XeXO.TP6a25tSwnZ1vMGN28dPJpsPhQO6NOS', '2023-02-03 11:13:55'),
(2, 'Administrateur', 'kwizera.ibrahim529@gmail.com', '75703042', '05a7339343ae37be6d78a6bbc8567812.jpg', 0, 1, '$2y$10$3dojjTgF8wbF1wojoJJl2OeCUUgTgR0GaJIYfpxqqhFZXZAyxCHK6', '2023-02-03 12:23:23'),
(3, 'ahishakiye yvan', 'ahishakiye@gmail.com', '79230712', '5f4cb93ab92c2e39678b4567_1618396971.jpg', 0, 1, '$2y$10$Dklb4.3wCIkB12S1jaPCE.pYc4TnSk6/sERq1R8pWa5cEmfwgAtw.', '2023-02-03 12:24:17'),
(4, 'kwizera.ibrahim@gmail.com', 'kwizera.ibrahim529b@gmail.com', '11', '5f4cb93ab92c2e39678b4567_1618396971.jpg', 0, 1, '$2y$10$vWLfee8VnwnQWNUi6/4YQePK4b8HybFC.Q/HK/Qev94ut8iQLiWpO', '2023-02-03 11:14:10'),
(5, 'kwizera.ibrahim@gmail.com', 'kwizera.ibrahimss529@gmail.com', '1', '5f4cb93ab92c2e39678b4567_1618396971.jpg', 1, 0, '$2y$10$/.08juib.sLYJnefeLemUu6RUXv1QBr5KI8tS8PO/y2ncXkfGtW7W', '2023-02-03 11:14:14'),
(6, 'kwizera.ibrahim@gmail.com', 'kwizera.ibrahimsdhgdhgh529@gmail.com', '3', '5f4cb93ab92c2e39678b4567_1618397010.jpg', 0, 1, '$2y$10$I6cFQuNKG9PVvhKIwxP0SepWlj/CsEtrhPLIbh/PXDkWREoOzT9Ui', '2023-02-03 09:55:58');

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
-- Table structure for table `payement`
--

CREATE TABLE `payement` (
  `id_payement` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payement`
--

INSERT INTO `payement` (`id_payement`, `id_utilisateur`, `id_admin`) VALUES
(1, 4, 1),
(2, 3, 3);

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
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `date_utilisateur` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id_utilisateur`, `nom`, `prenom`, `email`, `numero_telephone`, `passport`, `photo`, `pays`, `rotary`, `status`, `date_utilisateur`) VALUES
(3, 'Ibrahim4444444', 'Kwizera', 'kwib@biu.bi', '75703042', 'PO25007', 'product-2.jpg', 'Burundi', 'Ngozi', 0, '2023-02-03 09:59:29'),
(4, 'Ibrahim', 'Kwizera', 'kwizera.ibrahim@gmail.com', '75703042', 'PO25007', '5f3d3305ac1bc27ac703d048710ccdd6.jpg', 'Burundi', 'Bubanza', 0, '2023-02-03 07:30:04'),
(5, 'Ibrahim', 'Kwizera', 'kwizera.ibrahim529@gmail.com', '75703042', 'PO25007', 'product-3.jpg', 'Burundi', 'Kayanza', 0, '2023-01-29 11:16:16'),
(6, 'kj', 'jh', 'kwizera.ibrahim5277@gmail.com', '3456', '4567', '5f4cb93ab92c2e39678b4567_1618396971.jpg', 'Burundi', '34567', 0, '2023-02-02 22:59:49'),
(7, 'sgss', 'asj', 'kwizera.ibrahimsssss@gmail.com', '234', '11', '5f4cb93ab92c2e39678b4567_1618396971.jpg', 'Burundi', '111', 1, '2023-02-02 23:26:36'),
(8, 'asghgv', 'shfyjh', 'kwizera.ibrahim70@gmail.com', '1', '11', '5f3d3305ac1bc27ac703d048710ccdd6.jpg', 'Rwanda', '155', 1, '2023-02-02 23:44:13');

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
-- Indexes for table `payement`
--
ALTER TABLE `payement`
  ADD PRIMARY KEY (`id_payement`);

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
  ADD KEY `FK_driver` (`id_chauffeur`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `chauffeurs`
--
ALTER TABLE `chauffeurs`
  MODIFY `id_chauffeur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `hotels`
--
ALTER TABLE `hotels`
  MODIFY `id_hotel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `payement`
--
ALTER TABLE `payement`
  MODIFY `id_payement` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `voitures`
--
ALTER TABLE `voitures`
  MODIFY `id_voiture` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  ADD CONSTRAINT `FK_driver` FOREIGN KEY (`id_chauffeur`) REFERENCES `chauffeurs` (`id_chauffeur`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
