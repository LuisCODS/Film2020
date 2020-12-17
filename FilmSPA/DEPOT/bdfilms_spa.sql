-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 06-Dez-2020 às 01:49
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
) ENGINE=InnoDB AUTO_INCREMENT=453 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `film`
--

INSERT INTO `film` (`PK_ID_Film`, `titre`, `prix`, `categorie`, `realisateur`, `description`, `pochette`, `url`) VALUES
(443, 'Justice leangue', '5.00', '', 'OUTLANDER', 'Fueled by his restored faith in humanity and inspired by Supermanâ€™s selfless act, Bruce Wayne enlists the help of his newfound ally, Diana', 'efbc49640bc610dc1f8d2c3d63b342e21ed68995.jpg', 'https://www.youtube.com/watch?v=3cxixDgHUYw'),
(444, 'Lion', '10.00', 'Drame', 'OUTLANDER', 'Texte....', '94e6cab5f73203bb8278f9eb5c65d6c9b7311f29.jpg', 'https://www.youtube.com/watch?v=-RNI9o06vqo'),
(445, 'Shutter Island', '22.00', 'Action', 'OUTLANDER', 'Texte...', '47ae24f395f27b0a8f14dcd8d5b59ff8e7ebd3b1.jpg', 'https://www.youtube.com/watch?v=-F1-sTyGvwA'),
(446, 'Jumanji', '6.20', 'Comedie', 'OUTLANDER', 'The game has changed, but the legend continues. Watch the official trailer for #JUMANJI: Welcome To The Jungle now and bring home the movie', '045146e96fa25ff06bff9a3c7cf6ed4a6976cc7c.jpg', 'https://www.youtube.com/watch?v=2QKg5SZ_35I'),
(447, 'Kingsman', '5.00', 'Drame', 'OUTLANDER', 'Texte', '3070fc51a63a2a4d47b957c531bbb2f840799780.jpg', 'https://www.youtube.com/watch?v=5zdBG-iGfes'),
(448, 'Blade runnner', '6.00', 'Action', 'OUTLANDER', 'Thirty years after the events of the first film, a new blade runner, LAPD Officer K (Ryan Gosling), unearths a long-buried secret that ...', '8d36494e15391130e457b38a3d7685a89c82c29d.jpg', 'https://www.youtube.com/watch?v=gCcx85zbxz4'),
(449, 'Martian', '5.00', 'Romance', 'OUTLANDER', 'THE MARTIAN | Official Trailer: During a manned mission to Mars, Astronaut Mark Watney (Matt Damon) is presumed dead after a fi', '09ec95f91560823ec8bc84675043d1d837f88107.jpg', 'https://www.youtube.com/watch?v=ej3ioOneTy8'),
(450, 'Batman v Superman', '6.55', 'Horreur', 'OUTLANDER', 'Holy hell the fight scenes between Batman and Superman look absolutely badas', '5e8df098324054e7d910693c3386260b47f45f51.jpg', 'https://www.youtube.com/watch?v=0WWzgGyAH6Y'),
(451, 'Schindlers list', '12.50', 'Horreur', 'OUTLANDER', 'In Poland during World War II, Oskar Schindler gradually becomes concerned for his Jewish workforce after witnessing their persecution by the Nazis.', 'e298f136144eac9434c6b4b976204801c76f60ff.jpg', 'https://www.youtube.com/watch?v=gG22XNhtnoY'),
(452, 'Teste avatar', '0.00', 'Action', 'OUTLANDER', 'Teste avatar', 'avatar.jpg', '');

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
) ENGINE=InnoDB AUTO_INCREMENT=329 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `membre`
--

INSERT INTO `membre` (`PK_ID_Membre`, `nom`, `prenom`, `profil`, `courriel`, `tel_membre`, `MDP_membre`) VALUES
(237, 'admin', 'admin', 'admin', 'admin@admin.com', NULL, '$2y$10$K749jVxWRGDxKR6SILO3Le1ozgtz8IXz6Eg7jEGdrRhCjggmdtbtG'),
(278, 'Janie', 'Racine', 'membre', 'janie@gmail.com', NULL, '$2y$10$7aW.xaIceAwyfdU1Dch5KOL89JD7gw/eerAZ0z1HXxTyxNKx7FZlu'),
(302, 'Lucas', 'Bastos', 'membre', 'lucasbastos@gmail.com', '333-333-4444', '$2y$10$1nRQ//Y9vtlFKCTE3Hp.B./rs7AqUaMHaSxNTiKy4Dbb.CivLWcTG'),
(306, 'Tavares', 'Antonio', 'membre', 'antoniotavares@gmail.com', NULL, '$2y$10$PKIgpE2Pwi2WOaEqgm6JwuiEa6OS7l2TWFz23DsH2DKu0p0FRd1Zy'),
(328, 'Santos', 'Luis', 'membre', 'tennis.bresil@gmail.com', NULL, '$2y$10$cOc41GcoJ9gaO.d.xEcfBOKJ1g0IHjtXX68mKJjNUjKkzQHeD3XFC');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
