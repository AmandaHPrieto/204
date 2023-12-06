-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 20, 2017 at 12:18 AM
-- Server version: 5.7.20-0ubuntu0.17.10.1
-- PHP Version: 7.1.8-1ubuntu1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `agence_immobiliere`
--

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `identifiant` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `motdepasse` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mail` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `identifiant`, `motdepasse`, `mail`) VALUES
(1, 'Administrateur', '83CCutv8', 'admin@airphp.com'),
(2, 'Paulo87', 'paulo', 'paulo87@gmail.com'),
(3, 'jackie458', 'motdepasse', 'jackie458@mail.fr'),
(4, 'mickeline', 'micke', 'maickeline87@yahoo.fr'),
(5, 'josette28', 'lenomdemonchat', 'josette28@gmail.com'),
(6, 'Manudu95', '1234', 'manudu95@gmail.com'),
(7, 'Kyzywyx', 'tokiohotel4ever', 'kyzywyx@hotmail.fr'),
(8, 'CrazyFrog', 'bebebebep', 'crazyfrog@gmail.com');


-- --------------------------------------------------------

--
-- Table structure for table `logements`
--

CREATE TABLE `logements` (
  `id` int(11) NOT NULL,
  `adresse` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ville`varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `surface` int(11) NOT NULL,
  `prix` int (11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `logements`
--

INSERT INTO `logements` (`id`, `adresse`, `ville`, `type`, `surface`,`prix`) VALUES
(1, '12 avenue Albert Thomas, 87000 Limoges', 'Limoges', 'appartement', 67, 175000),
(2, '3 avenue de Landouge, 87100 Limoges', 'Limoges', 'maison', 137, 230000),
(3, '7 rue d` Alsace, 87220 Feytiat', 'Feytiat', 'appartement', 48, 90000),
(4, '47 avenue du Limousin, 87220 Feytiat', 'Feytiat', 'maison', 98, 182000),
(5, '31 rue de la Garde, 87270 Couzeix', 'Couzeix', 'maison', 75, 190000),
(6, '8, rue de la Garenne, 87430 Verneuil-sur-Vienne', 'Verneuil-sur-Vienne', 'maison', 125, 260000),
(7, '14 rue de Bellevue, 87270 Couzeix', 'Couzeix', 'appartement', 45, 85000),
(8, '16 allée des troubadours, 87430 Verneuil-sur-Vienne', 'Verneuil-sur-Vienne', 'maison', 180, 320000),
(9, '12 avenue Jean Zay, 87350 Panazol', 'Panazol','appartement', 50, 92000),
(10, '4 rue Albert Calmette, 87350 Panazol', 'Panazol', 'maison', 89, 80000),
(11, '8 rue Paul Bert, 87350 Panazol', 'Panazol', 'maison', 135, 299000),
(12, '22 rue François Perrin, 87350 Panazol', 'Panazol', 'appartement', 90, 255000),
(13, '67 boulevard de la Corderie, 87000 Limoges', 'Limoges','appartement', 110, 400000),
(14, '75 rue du Général du Cray, 87000 Limoges', 'Limoges', 'maison', 125, 375000),
(15,'6 rue Elsa Triolet, 87000 Limoges', 'Limoges', 'maison', 112, 302000),
(16, '7 rue André Fourcade, 87000 Limoges', 'Limoges', 'maison', 165, 420000),
(17, '13 Rue Jean Jaurès, 87920 Condat-sur-Vienne','Condat-sur-Vienne', 'appartement', 63, 110000),
(18, '2 Rue Alexandre Dumas, 87920 Condat-sur-Vienne','Condat-sur-Vienne','maison', 145, 160000),
(19, '18 Rue Wagner, 87920 Condat-sur-Vienne','Condat-sur-Vienne','maison',220, 310000),
(20, '1 Rue du Moulin Neuf, 87920 Condat-sur-Vienne','Condat-sur-Vienne','appartement', 75, 200000),
(21, '16 Chem. de la Vigne, 87110 Le Vigen','Le Vigen','maison', 170, 230000),
(22, '8 Imp. Joseph Mazabraud, 87110 Le Vigen', 'Le Vigen', 'appartement', 85, 180000),
(23, '4 Imp. Joseph Mazabraud, 87110 Le Vigen','Le Vigen', 'maison', 135, 160000),
(24, '3 Rue 19 Mars 1962, 87110 Le Vigen', 'Le Vigen', 'appartement', 65, 80000);
--
-- Indexes for dumped tables
--

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `identifiant` (`identifiant`);

--
-- Indexes for table `logements`
--
ALTER TABLE `logements`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `logements`
--
ALTER TABLE `logements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
