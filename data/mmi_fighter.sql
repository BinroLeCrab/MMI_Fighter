-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : dim. 25 fév. 2024 à 16:31
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `mmi_fighter`
--

-- --------------------------------------------------------

--
-- Structure de la table `personnages`
--

DROP TABLE IF EXISTS `personnages`;
CREATE TABLE IF NOT EXISTS `personnages` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `cri` varchar(255) NOT NULL,
  `atk` int NOT NULL,
  `pv` int NOT NULL,
  `mana` int NOT NULL,
  `S1` varchar(255) NOT NULL,
  `S2` varchar(255) NOT NULL,
  `S3` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `personnages`
--

INSERT INTO `personnages` (`id`, `name`, `cri`, `atk`, `pv`, `mana`, `S1`, `S2`, `S3`) VALUES
(15, 'Arthur', 'TU VOIS C\'EST ÇA TON PROBLEME !', 60, 250, 30, '_image_8.png', 'S2Arthur_Sprite_Combat_-_4.png', 'S3Arthur_Sprite_Win_-_1.png'),
(4, 'Robin', 'FIGMAAAAA', 65, 200, 45, 'S1Robin_beluga_3.png', 'S2Robin_Sprite_Combat_-_5.png', 'S3Robin_Sprite_Win_-_5.png'),
(7, 'Caroline', 'CHIPI CHIPI CHAPA CHAPA', 80, 200, 20, 'Caro_beluga_1.png', 'S2Caroline_Sprite_Combat_-_3.png', 'S3Caroline_Sprite_Win_-_3.png'),
(16, 'Konan', 'CRIII', 40, 170, 70, 'S1Konan_image_3.png', 'S2Konan_Sprite_Combat_-_71.png', 'S3Konan_Sprite_Win_-_4.png'),
(14, 'Morgan', 'LES C******* A MA TATA !', 85, 180, 15, '_image_7.png', 'S2Morgan_Sprite_Combat_-_1.png', 'S3Morgan_Sprite_Win_-_2.png'),
(17, 'Thomas', 'Philippe Etchebest', 35, 160, 75, 'S1_beluga_4.png', 'S2_Sprite_Combat_-_2.png', 'S3Thomas_Sprite_Win_-_6.png'),
(19, 'Yannick', ' CRIII', 75, 190, 25, 'S1Yannick_beluga_5.png', 'S2Yannick_Sprite_Combat_-_6.png', 'S3Yannick_Sprite_Win_-_7.png');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
