-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 20 nov. 2023 à 14:12
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `e-sahti`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nom_admin` varchar(20) DEFAULT NULL,
  `prenom_admin` varchar(20) DEFAULT NULL,
  `role` varchar(20) DEFAULT NULL,
  `mdp_admin` varchar(20) DEFAULT NULL,
  `cin_admin` int(8) DEFAULT NULL,
  `email_admin` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `chauffeur`
--

CREATE TABLE `chauffeur` (
  `id_chauff` int(10) NOT NULL,
  `nom_chauff` varchar(20) DEFAULT NULL,
  `prenom_chauff` varchar(20) DEFAULT NULL,
  `cin_chauff` int(8) DEFAULT NULL,
  `tel_chauff` int(8) DEFAULT NULL,
  `email_chauff` int(20) DEFAULT NULL,
  `zone` varchar(25) DEFAULT NULL,
  `mdp_chauff` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `coach`
--

CREATE TABLE `coach` (
  `id_coach` int(10) NOT NULL,
  `nom_coach` int(20) DEFAULT NULL,
  `prenom_coach` int(20) DEFAULT NULL,
  `cin_coach` int(8) DEFAULT NULL,
  `tel_coach` int(8) DEFAULT NULL,
  `email_coach` varchar(20) DEFAULT NULL,
  `type_sport` varchar(20) DEFAULT NULL,
  `mdp_coach` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `medecin`
--

CREATE TABLE `medecin` (
  `id_med` int(11) NOT NULL,
  `nom_med` varchar(15) NOT NULL,
  `prenom_med` varchar(15) NOT NULL,
  `cin_med` int(8) NOT NULL,
  `tel_med` int(8) NOT NULL,
  `e_mail_med` varchar(20) NOT NULL,
  `specialite_med` varchar(20) NOT NULL,
  `mdp_med` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `medecin`
--

INSERT INTO `medecin` (`id_med`, `nom_med`, `prenom_med`, `cin_med`, `tel_med`, `e_mail_med`, `specialite_med`, `mdp_med`) VALUES
(5, 'fggjn', 'v dfk v', 55555, 587464, '1cyrine.rou@gmaim.co', 'dfcsdfssss', 'ddddd'),
(7, 'ggggg', 'tmarr', 75398416, 55555555, 'rania@esprit.tn', 'psychologue ', '123456rania');

-- --------------------------------------------------------

--
-- Structure de la table `patient`
--

CREATE TABLE `patient` (
  `id_pat` int(11) NOT NULL,
  `nom_pat` varchar(20) NOT NULL,
  `prenom_pat` varchar(20) NOT NULL,
  `cin_pat` int(8) NOT NULL,
  `tel_pat` int(8) NOT NULL,
  `email_pat` varchar(20) NOT NULL,
  `maladie_pat` varchar(20) NOT NULL,
  `mdp_pat` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `nom_u` varchar(20) NOT NULL,
  `prenom_u` varchar(20) NOT NULL,
  `cin_u` int(8) NOT NULL,
  `tel_u` int(8) NOT NULL,
  `email_u` varchar(50) NOT NULL,
  `mdp_u` varchar(20) NOT NULL,
  `role_u` varchar(20) NOT NULL,
  `id_u` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`nom_u`, `prenom_u`, `cin_u`, `tel_u`, `email_u`, `mdp_u`, `role_u`, `id_u`) VALUES
('fgb', 'vfg', 1111, 94875, 'fddd@gggf.com', 'ccccc', 'cccccc', 1),
('azouz', 'benaissa', 12365874, 50821963, 'azouz.benaissa@gmail.com', 'azouz123', 'medecin', 2),
('nour', 'romdhani', 85697420, 12389572, 'nour.romdhani@gmail.com', '147856nour', 'chauffeur', 3),
('baligh', 'laouini', 2154789, 58296473, 'baligh.laouini@gmail.com', 'bailghos123', 'coach', 4),
('rania', 'tmar', 12398756, 50369745, 'rania.tmar@gmail.com', 'ranou12333', 'medecin', 5),
('syrine', 'toumi', 412569, 92821394, 'syrine.toumi@gmail.com', '159syrine753', 'admin', 6);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Index pour la table `chauffeur`
--
ALTER TABLE `chauffeur`
  ADD PRIMARY KEY (`id_chauff`);

--
-- Index pour la table `coach`
--
ALTER TABLE `coach`
  ADD PRIMARY KEY (`id_coach`);

--
-- Index pour la table `medecin`
--
ALTER TABLE `medecin`
  ADD PRIMARY KEY (`id_med`);

--
-- Index pour la table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`id_pat`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_u`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `chauffeur`
--
ALTER TABLE `chauffeur`
  MODIFY `id_chauff` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `coach`
--
ALTER TABLE `coach`
  MODIFY `id_coach` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `medecin`
--
ALTER TABLE `medecin`
  MODIFY `id_med` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `patient`
--
ALTER TABLE `patient`
  MODIFY `id_pat` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id_u` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
