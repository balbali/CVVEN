--
-- Base de données: `cvven`
--
CREATE DATABASE IF NOT EXISTS `cvven` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `cvven`;


--
-- Structure de la table `attribuer_heberg`
--

CREATE TABLE IF NOT EXISTS `attribuer_heberg` (
  `idReserv` int(11) NOT NULL DEFAULT '0',
  `idHeberg` int(11) NOT NULL DEFAULT '0',
  `date_attribution` date DEFAULT NULL,
  PRIMARY KEY (`idReserv`,`idHeberg`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE IF NOT EXISTS `reservation` (
  `idReserv` int(11) NOT NULL AUTO_INCREMENT,
  `Date_Arrivee` date NOT NULL,
  `Date_Depart` date NOT NULL,
  `Nb_Personnes` int(11) NOT NULL,
  `Menage` tinyint(1) NOT NULL,
  `EtatReservation` varchar(20) NOT NULL,
  `idUtil` int(11) DEFAULT NULL,
  PRIMARY KEY (`idReserv`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;


--
-- Structure de la table `utilisateur`
--

CREATE TABLE IF NOT EXISTS `utilisateur` (
  `idUtil` int(11) NOT NULL AUTO_INCREMENT,
  `Login` varchar(32) NOT NULL,
  `MdP` varchar(32) DEFAULT NULL,
  `Nom` varchar(50) DEFAULT NULL,
  `Prenom` varchar(50) DEFAULT NULL,
  `Admin` int(11) DEFAULT NULL,
  PRIMARY KEY (`idUtil`),
  UNIQUE KEY `Login` (`Login`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

