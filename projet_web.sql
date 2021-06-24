-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 22 avr. 2021 à 15:47
-- Version du serveur :  5.7.24
-- Version de PHP :  7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `projet_web`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(26, 'Roman historique'),
(25, ' Roman'),
(23, 'fiction'),
(24, 'Drame'),
(27, 'Thriller'),
(28, 'Roman Ã  Ã©nigme'),
(29, 'bibliographie');

-- --------------------------------------------------------

--
-- Structure de la table `livres`
--

DROP TABLE IF EXISTS `livres`;
CREATE TABLE IF NOT EXISTS `livres` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `reference` varchar(30) NOT NULL,
  `titre` varchar(30) CHARACTER SET utf8 COLLATE utf8_czech_ci NOT NULL,
  `dateS` date NOT NULL,
  `nomAuteur` varchar(50) NOT NULL,
  `categorie` varchar(50) NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_czech_ci NOT NULL,
  `stock` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `prix` float NOT NULL,
  `note` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `livres`
--

INSERT INTO `livres` (`ID`, `reference`, `titre`, `dateS`, `nomAuteur`, `categorie`, `description`, `stock`, `image`, `prix`, `note`) VALUES
(3, '  Rf2554', '  Le pelerin  ', '2021-04-06', '  Paulo Coelho', ' Roman', ' Santiago, un jeune berger andalou, part Ã  la recherche d\'un trÃ©sor enfoui au pied des Pyramides.\r\n\r\nLorsqu\'il rencontre l\'Alchimiste dans le dÃ©sert, celui-ci lui apprend Ã  Ã©couter son cÅ“ur, Ã  lire les signes du destin et, par-dessus tout, Ã  aller au bout de son rÃªve.', 10, '1.jpg', 25, NULL),
(4, ' Rf4586', ' Le Demon ', '2021-04-28', ' Paulo Coelho', 'Roman historique', '\"Esther, le Zahir. Elle a tout rempli. Elle est la seule raison pour laquelle je suis en vie. [...] Je dois me reconstruire et, pour la premiÃ¨re fois de toute mon existence, accepter que j\'aime un Ãªtre humain plus que moi-mÃªme.\" ', 9, '2.jpg', 50, NULL),
(5, 'Rf4522', 'Le Zahir', '2021-04-01', 'Paulo Coelho', 'fiction', ' Un Ã©crivain cÃ©lÃ¨bre remet en cause tous les principes qui ont gouvernÃ© sa vie lorsque sa femme disparaÃ®t sans laisser de traces. Au fil dâ€™un pÃ©riple qui le conduira de Paris jusquâ€™en Asie centrale, il traverse la steppe, son dÃ©sert, sa magie et ses lÃ©gendes pour retrouver celle qui donne plus que jamais un sens Ã  sa vie. ', 50, '4.jpg', 40, NULL),
(6, 'Rf6548', 'Le PÃ¨lerin de Compostelle', '2021-04-21', 'Paulo Coelho', 'Drame', ' A cette Ã©poque, ma quÃªte spirituelle Ã©tait liÃ©e Ã  lâ€™idÃ©e quâ€™il existait des secrets, des chemins mystÃ©rieuxâ€¦ Je croyais que ce qui est difficile et compliquÃ© mÃ¨ne toujours Ã  la comprÃ©hension du mystÃ¨re et de la vieâ€¦ ', 5, '8.jpg', 40, 0),
(7, 'Rf8754', 'Brida', '2021-04-04', 'Paulo Coelho', 'Thriller', ' Brida, une jeune Irlandaise Ã  la recherche de la Connaissance, s\'intÃ©resse depuis toujours aux diffÃ©rents aspects de la magie, mais elle aspire Ã  quelque chose de plus. Sa quÃªte l\'amÃ¨ne Ã  rencontrer des personnes d\'une grande sagesse, qui lui font dÃ©couvrir le monde spirituel ', 2, '3.jpg', 80, 0),
(8, 'Rf9586', 'AdultÃ¨re', '2021-04-21', 'Paulo Coelho', 'Roman Ã  Ã©nigme', ' Linda a 31 ans et, aux yeux de tous, une vie parfaite : elle a un mari aimant, des enfants bien Ã©levÃ©s, un mÃ©tier gratifiant de journaliste et habite dans une magnifique propriÃ©tÃ© Ã  GenÃ¨ve', 40, '9.jpg', 20, NULL),
(9, 'Rf12522', 'Aleph', '2021-04-20', 'Paulo Coelho', 'fiction', ' DÃ©cider. Changer. Se rÃ©inventer. Agir. ExpÃ©rimenter. RÃ©ussir. Oser. RÃªver. Gagner. DÃ©couvrir. Exiger. S\'engager.\r\nPenser. Croire. Grandir. Appartenir. S\'Ã©veiller.', 4, '6.jpg', 40, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `note`
--

DROP TABLE IF EXISTS `note`;
CREATE TABLE IF NOT EXISTS `note` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `id_livre` int(11) NOT NULL,
  `id_client` varchar(200) NOT NULL,
  `note` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `id_livre` (`id_livre`)
) ENGINE=MyISAM AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
