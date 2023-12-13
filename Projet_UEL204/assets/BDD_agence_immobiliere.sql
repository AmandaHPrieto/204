-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mar. 12 déc. 2023 à 12:50
-- Version du serveur : 10.6.12-MariaDB-0ubuntu0.22.04.1
-- Version de PHP : 8.1.2-1ubuntu2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `BDD_agence_immobiliere`
--

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `identifiant` varchar(255) NOT NULL,
  `motdepasse` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Déchargement des données de la table `clients`
--

INSERT INTO `clients` (`id`, `identifiant`, `motdepasse`, `mail`) VALUES
(1, 'Administrateur', '83CCutv8', 'admin@airphp.com'),
(2, 'Paulo87', 'paulo', 'paulo87@gmail.com'),
(3, 'jackie458', 'motdepasse', 'jackie458@mail.fr'),
(4, 'mickeline', 'micke', 'maickeline87@yahoo.fr'),
(5, 'josette28', 'lenomdemonchat', 'josette28@gmail.com'),
(6, 'dédé87350', 'fazer600', 'dede.lejeune@hotmail.fr'),
(7, 'GerardM', 'chantal1971', 'gerard.menvussaa@hotmail.com'),
(8, 'celine23', 'coquelicot2012', 'celine20@gmail.com'),
(9, 'Michael Jaquesson', 'mobidick31', 'michael.j@yahoo.fr'),
(10, 'Manudu95', '1234', 'manudu95@gmail.com'),
(11, 'Kyzywyx', 'tokiohotel4ever', 'kyzywyx@hotmail.fr'),
(12, 'CrazyFrog', 'bebebebep', 'crazyfrog@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `logements`
--

CREATE TABLE `logements` (
  `id` int(11) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `ville` varchar(255) NOT NULL,
  `categorie` varchar(255) NOT NULL,
  `surface` int(11) NOT NULL,
  `prix` int(11) NOT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Déchargement des données de la table `logements`
--

INSERT INTO `logements` (`id`, `adresse`, `ville`, `categorie`, `surface`, `prix`, `photo`) VALUES
(1, '12 avenue Albert Thomas, 87000 Limoges', 'Limoges', 'appartement', 67, 175000, 'appartThomas.jpg'),
(2, '3 avenue de Landouge, 87100 Limoges', 'Limoges', 'maison', 137, 230000, 'mainsonLandouge'),
(3, '7 rue d` Alsace, 87220 Feytiat', 'Feytiat', 'appartement', 48, 90000, 'appartAlsace.jpg'),
(4, '47 avenue du Limousin, 87220 Feytiat', 'Feytiat', 'maison', 98, 182000, 'maisonLimousin'),
(5, '31 rue de la Garde, 87270 Couzeix', 'Couzeix', 'maison', 75, 190000, 'maisonGarde'),
(6, '8, rue de la Garenne, 87430 Verneuil-sur-Vienne', 'Verneuil-sur-Vienne', 125, 260000, 'maisonGarenne'),
(7, '14 rue de Bellevue, 87270 Couzeix', 'Couzeix', 'appartement', 45, 85000, 'appartBellevue.jpg'),
(8, '16 allée des troubadours, 87430 Verneuil-sur-Vienne', 'Verneuil-sur-Vienne', 'maisonTroubadours', 180, 320000),
(9, '12 avenue Jean Zay, 87350 Panazol', 'Panazol', 'appartement', 50, 92000, 'appartZay.jpg'),
(10, '4 rue Albert Calmette, 87350 Panazol', 'Panazol', 'maison', 89, 80000, 'maisonCalmette'),
(11, '8 rue Paul Bert, 87350 Panazol', 'Panazol', 'maison', 135, 299000, 'maisonBert'),
(12, '22 rue François Perrin, 87350 Panazol', 'Panazol', 'appartement', 90, 255000, 'appartPerrin.jpg'),
(13, '67 boulevard de la Corderie, 87000 Limoges', 'Limoges', 'appartement', 110, 400000, 'appartCorderie.jpg'),
(14, '75 rue du Général du Cray, 87000 Limoges', 'Limoges', 'maison', 125, 375000, 'maisonCray'),
(15, '6 rue Elsa Triolet, 87000 Limoges', 'Limoges', 'maison', 112, 302000, 'maisonTriolet'),
(16, '7 rue André Fourcade, 87000 Limoges', 'Limoges', 'maison', 165, 420000, 'maisonFourcade'),
(17, '13 Rue Jean Jaurès, 87920 Condat-sur-Vienne', 'Condat-sur-Vienne', 'appartement', 63, 110000, 'appartJaures.jpg'),
(18, '2 Rue Alexandre Dumas, 87920 Condat-sur-Vienne', 'Condat-sur-Vienne', 'maison', 145, 160000, 'maisonDumas'),
(19, '18 Rue Wagner, 87920 Condat-sur-Vienne', 'Condat-sur-Vienne', 'maison', 220, 310000, 'maisonWagner'),
(20, '1 Rue du Moulin Neuf, 87920 Condat-sur-Vienne', 'Condat-sur-Vienne', 'appartement', 75, 200000, 'appartMoulin.jpg'),
(21, '16 Chem. de la Vigne, 87110 Le Vigen', 'Le Vigen', 'maison', 170, 230000, 'maisonVigne'),
(22, '8 Imp. Joseph Mazabraud, 87110 Le Vigen', 'Le Vigen', 'appartement', 85, 180000, 'appartMazabraud.jpg'),
(23, '4 Imp. Joseph Mazabraud, 87110 Le Vigen', 'Le Vigen', 'maison', 135, 160000, 'maisonMazabraud'),
(24, '3 Rue 19 Mars 1962, 87110 Le Vigen', 'Le Vigen', 'appartement', 65, 80000, 'appartMars.jpg'),
(25, '10 rue Jules Michelet, 87125 Rilhac-Rancon', 'Rilhac-Rancon', 'maison', 155, 296800, 'maisonMichelet'),
(26, '6 route de Toulouse, 87220 Boisseuil', 'Boisseuil', 'maison', 90, 184000, 'maisonToulouse'),
(27, '2 route de Crouzy, 87220 Boisseuil', 'Boisseuil', 'maison', 60, 98000, 'maisonCrouzy'),
(28, '10 route du Buisson, 87220 Boisseuil', 'Boisseuil', 'maison', 164, 388500, 'maisonBuisson');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `identifiant` (`identifiant`);

--
-- Index pour la table `logements`
--
ALTER TABLE `logements`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `logements`
--
ALTER TABLE `logements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
