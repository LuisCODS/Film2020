-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 27-Nov-2020 às 23:12
-- Versão do servidor: 10.4.10-MariaDB
-- versão do PHP: 7.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bdfilms_spa`
--
CREATE DATABASE IF NOT EXISTS `bdfilms_spa` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `bdfilms_spa`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `film`
--

DROP TABLE IF EXISTS `film`;
CREATE TABLE IF NOT EXISTS `film` (
  `PK_ID_Film` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `prix` decimal(10,2) NOT NULL,
  `categorie` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `realisateur` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(400) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pochette` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `url` text COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`PK_ID_Film`)
) ENGINE=InnoDB AUTO_INCREMENT=408 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `film`
--

INSERT INTO `film` (`PK_ID_Film`, `titre`, `prix`, `categorie`, `realisateur`, `description`, `pochette`, `url`) VALUES
(400, 'Teste data film', '5.00', 'Horreur', 'Rambo', 'cxsAcAcac', 'avatar.jpg', 'https://www.youtube.com/watch?v=y_KCK-pHzqk');

-- --------------------------------------------------------

--
-- Estrutura da tabela `film_location`
--

DROP TABLE IF EXISTS `film_location`;
CREATE TABLE IF NOT EXISTS `film_location` (
  `id_location` int(11) NOT NULL AUTO_INCREMENT,
  `films` int(11) DEFAULT NULL,
  `id_membre` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_location`),
  KEY `fk_id_film` (`films`),
  KEY `fk_id_membre` (`id_membre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `membre`
--

DROP TABLE IF EXISTS `membre`;
CREATE TABLE IF NOT EXISTS `membre` (
  `PK_ID_Membre` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `profil` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `courriel` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `tel_membre` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `MDP_membre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`PK_ID_Membre`)
) ENGINE=InnoDB AUTO_INCREMENT=259 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `membre`
--

INSERT INTO `membre` (`PK_ID_Membre`, `nom`, `prenom`, `profil`, `courriel`, `tel_membre`, `MDP_membre`) VALUES
(237, 'admin', 'admin', 'admin', 'admin@admin.com', NULL, '$2y$10$K749jVxWRGDxKR6SILO3Le1ozgtz8IXz6Eg7jEGdrRhCjggmdtbtG'),
(257, 'Santos', 'Luis', 'membre', 'tennis.bresil@gmail.com', '514-546-0521', '$2y$10$ZJecXq2H88/qf3Xk3f5ofeZNActmrqcmsXVZKZ.klEE2k7wiZQ1AW');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
