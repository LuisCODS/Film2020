-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 23-Out-2020 às 05:01
-- Versão do servidor: 10.4.10-MariaDB
-- versão do PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `blogphp`
--
CREATE DATABASE IF NOT EXISTS `blogphp` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `blogphp`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `Categorie_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `NomCategorie` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`Categorie_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `categorie`
--

INSERT INTO `categorie` (`Categorie_ID`, `NomCategorie`) VALUES
(1, 'Sport'),
(4, 'Sante'),
(9, 'Politique');

-- --------------------------------------------------------

--
-- Estrutura da tabela `commentaire`
--

DROP TABLE IF EXISTS `commentaire`;
CREATE TABLE IF NOT EXISTS `commentaire` (
  `Commentaire_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `Post_ID` int(10) UNSIGNED NOT NULL,
  `Commentaire` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `DateDebut` datetime NOT NULL,
  PRIMARY KEY (`Commentaire_ID`),
  KEY `Commentaire_FKIndex1` (`Post_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `post`
--

DROP TABLE IF EXISTS `post`;
CREATE TABLE IF NOT EXISTS `post` (
  `Post_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `Categorie_ID` int(10) UNSIGNED NOT NULL,
  `Title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Resume` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Contenu` text COLLATE utf8_unicode_ci NOT NULL,
  `DateDebut` date NOT NULL,
  `DateFin` date DEFAULT NULL,
  PRIMARY KEY (`Post_ID`),
  KEY `Post_FKIndex1` (`Categorie_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `post`
--

INSERT INTO `post` (`Post_ID`, `Categorie_ID`, `Title`, `Resume`, `Contenu`, `DateDebut`, `DateFin`) VALUES
(18, 4, 'Teste Add', 'tshtrs', 'brtbtr', '2020-02-02', '2020-02-02'),
(19, 10, 'TESTE DATA ', 'grgr', 'grgr', '2020-02-22', '2020-02-22'),
(20, 10, 'bfb', 'bfdb', 'fbfdb', '2020-02-29', '2020-02-29');

-- --------------------------------------------------------

--
-- Estrutura da tabela `profil`
--

DROP TABLE IF EXISTS `profil`;
CREATE TABLE IF NOT EXISTS `profil` (
  `Profil_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `ProfilNom` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT 'Nom du perfil',
  PRIMARY KEY (`Profil_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=272 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `profil`
--

INSERT INTO `profil` (`Profil_ID`, `ProfilNom`) VALUES
(1, 'Visiteur'),
(2, 'Admin'),
(271, 'Membre');

-- --------------------------------------------------------

--
-- Estrutura da tabela `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `Utilisateur_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'son ID',
  `Profil_ID` int(10) UNSIGNED NOT NULL,
  `UtilisateurName` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Nom utilisateur',
  `UtilisateurNickName` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Login',
  `UtilisateurMDP` varchar(10) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Mot de passe',
  `UtilisateurEmail` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Email',
  PRIMARY KEY (`Utilisateur_ID`),
  KEY `Utilisateur_FKIndex1` (`Profil_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `utilisateur`
--

INSERT INTO `utilisateur` (`Utilisateur_ID`, `Profil_ID`, `UtilisateurName`, `UtilisateurNickName`, `UtilisateurMDP`, `UtilisateurEmail`) VALUES
(1, 4, 'Almeida', 'Admin', '123456', 'admin@gmail.com'),
(39, 4, 'Luis Santos', 'lili', 'hghhghg', 'tennis.bresil@gmail.com'),
(42, 4, 'Luis Claudio Oliveira Dos Santos', 'lulu', '66666', 'tennis.bresil@gmail.com');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
