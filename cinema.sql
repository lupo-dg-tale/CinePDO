-- --------------------------------------------------------
-- Hôte :                        localhost
-- Version du serveur:           5.7.24 - MySQL Community Server (GPL)
-- SE du serveur:                Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Listage de la structure de la base pour cinema
CREATE DATABASE IF NOT EXISTS `cinema` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_bin */;
USE `cinema`;

-- Listage de la structure de la table cinema. acteur
CREATE TABLE IF NOT EXISTS `acteur` (
  `id_acteur` int(11) NOT NULL AUTO_INCREMENT,
  `nom_acteur` varchar(50) NOT NULL,
  `prenom_acteur` varchar(50) NOT NULL,
  `sexe` varchar(50) NOT NULL,
  `date_naissance` date NOT NULL,
  PRIMARY KEY (`id_acteur`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

-- Listage des données de la table cinema.acteur : ~6 rows (environ)
/*!40000 ALTER TABLE `acteur` DISABLE KEYS */;
INSERT INTO `acteur` (`id_acteur`, `nom_acteur`, `prenom_acteur`, `sexe`, `date_naissance`) VALUES
	(1, 'Peña', 'Michael', 'h', '1920-09-16'),
	(2, 'Q', 'Maggie', 'f', '1989-05-16'),
	(3, 'Foxx', 'Jamie', 'h', '1990-09-16'),
	(4, 'Levitt', 'Joseph Gordon', 'h', '1978-09-16'),
	(5, 'Landecker', 'Amy', 'f', '1990-08-14'),
	(6, 'Santoro', 'Rodrigo', 'h', '1950-09-16'),
	(7, 'Casas', 'Mario', 'h', '1996-06-12'),
	(8, 'François', 'Déborah', 'f', '2017-02-02'),
	(9, 'Affleck', 'Ben', 'h', '2004-02-27'),
	(10, 'Willis', 'Bruce', 'h', '1970-11-20'),
	(11, 'Lenoir', 'Alban', 'h', '1997-09-30'),
	(12, 'Bedia', 'Ramzy', 'h', '1983-06-22');
/*!40000 ALTER TABLE `acteur` ENABLE KEYS */;

-- Listage de la structure de la table cinema. appartient
CREATE TABLE IF NOT EXISTS `appartient` (
  `id_genre` int(11) NOT NULL,
  `id_film` int(11) NOT NULL,
  PRIMARY KEY (`id_genre`,`id_film`),
  KEY `appartient_Film0_FK` (`id_film`),
  CONSTRAINT `appartient_Film0_FK` FOREIGN KEY (`id_film`) REFERENCES `film` (`id_film`),
  CONSTRAINT `appartient_Genre_FK` FOREIGN KEY (`id_genre`) REFERENCES `genre` (`id_genre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Listage des données de la table cinema.appartient : ~6 rows (environ)
/*!40000 ALTER TABLE `appartient` DISABLE KEYS */;
INSERT INTO `appartient` (`id_genre`, `id_film`) VALUES
	(1, 1),
	(1, 2),
	(1, 3),
	(2, 4),
	(2, 5),
	(2, 6);
/*!40000 ALTER TABLE `appartient` ENABLE KEYS */;

-- Listage de la structure de la table cinema. casting
CREATE TABLE IF NOT EXISTS `casting` (
  `id_film` int(11) NOT NULL,
  `id_acteur` int(11) NOT NULL,
  `id_role` int(11) NOT NULL,
  PRIMARY KEY (`id_film`,`id_acteur`,`id_role`),
  KEY `casting_Acteur0_FK` (`id_acteur`),
  KEY `casting_Role1_FK` (`id_role`),
  CONSTRAINT `casting_Acteur0_FK` FOREIGN KEY (`id_acteur`) REFERENCES `acteur` (`id_acteur`),
  CONSTRAINT `casting_Film_FK` FOREIGN KEY (`id_film`) REFERENCES `film` (`id_film`),
  CONSTRAINT `casting_Role1_FK` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Listage des données de la table cinema.casting : ~14 rows (environ)
/*!40000 ALTER TABLE `casting` DISABLE KEYS */;
INSERT INTO `casting` (`id_film`, `id_acteur`, `id_role`) VALUES
	(1, 1, 1),
	(1, 2, 2),
	(2, 3, 4),
	(2, 4, 5),
	(2, 5, 10),
	(2, 6, 3),
	(3, 7, 8),
	(3, 8, 9),
	(4, 9, 12),
	(5, 10, 13),
	(6, 11, 11),
	(6, 12, 14);
/*!40000 ALTER TABLE `casting` ENABLE KEYS */;

-- Listage de la structure de la table cinema. film
CREATE TABLE IF NOT EXISTS `film` (
  `id_film` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(50) NOT NULL,
  `annee` year(4) NOT NULL,
  `synopsis` varchar(5000) DEFAULT NULL,
  `duree` int(11) NOT NULL DEFAULT '0',
  `affiche` varchar(500) DEFAULT NULL,
  `note` varchar(50) DEFAULT NULL,
  `id_real` int(11) NOT NULL,
  PRIMARY KEY (`id_film`),
  KEY `Film_Realisateur_FK` (`id_real`),
  CONSTRAINT `Film_Realisateur_FK` FOREIGN KEY (`id_real`) REFERENCES `realisateur` (`id_real`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

-- Listage des données de la table cinema.film : ~6 rows (environ)
/*!40000 ALTER TABLE `film` DISABLE KEYS */;
INSERT INTO `film` (`id_film`, `titre`, `annee`, `synopsis`, `duree`, `affiche`, `note`, `id_real`) VALUES
	(1, 'NIGHTMARE ISLAND', '2020', 'L’énigmatique M. Roarke donne vie aux rêves de ses chanceux invités dans un complexe hôtelier luxurieux et isolé. Mais quand leurs fantasmes les plus fous se transforment en véritables cauchemars, les invités n’ont d’autre choix que de résoudre les mystères de cette île pour en sortir vivants.', 140, 'http://fr.web.img6.acsta.net/c_215_290/pictures/19/12/04/15/26/0979818.jpg', NULL, 1),
	(2, 'PROJECT POWER', '1999', 'Qu\'êtes-vous prêt à risquer pour cinq minutes de pouvoirs extraordinaires ?', 145, 'http://fr.web.img6.acsta.net/f_png/c_215_290/o_logo-netflix-n.png_5_se/pictures/20/07/15/17/25/0296135.jpg', NULL, 2),
	(3, 'IRRÉMÉDIABLE', '2019', 'Condamné à vivre en fauteuil après un accident, Ángel décide de se venger de ceux qui l\'ont trahi, en particulier de la femme qui l\'a quitté au pire moment.', 130, 'http://fr.web.img3.acsta.net/f_png/c_215_290/o_logo-netflix-n.png_5_se/pictures/20/08/25/14/40/2556861.jpg', NULL, 4),
	(4, 'THE WAY BACK', '1942', 'Jack Cunningham avait tout pour lui. Star incontestée du basket-ball dans son lycée, il avait un avenir tout tracé à l\'université ou même en pro, avant de se détourner du jeu et de mettre définitivement un terme à sa carrière de sportif. Si les jours de gloire et de matchs de Jack sont loin, il ne les a jamais vraiment oubliés. Quelques années plus tard, il se voit offrir une chance de reprendre sa vie en main en devenant le coach de l\'équipe de basket, en pleine difficulté, de son ancien lycée. S\'il accepte le poste à contrecœur, s\'étonnant lui même de ce choix, Jack y aperçoit une dernière chance de salut quand l\'équipe est enfin unie et commence à remporter les matchs les uns après les autres.', 100, 'http://fr.web.img4.acsta.net/c_215_290/pictures/20/02/05/09/02/0338739.jpg', NULL, 5),
	(5, 'SURVIVRE', '1958', 'Deux criminels font irruption dans la maison d’un médecin disgracié afin de se faire soigner après que l’un d’entre eux se soit fait tirer dessus lors d’un vol. Sachant qu\'il n\'a pas l\'expertise nécessaire pour soigner l\'intrus blessé, le médecin doit protéger sa famille à tout prix...', 95, 'http://fr.web.img2.acsta.net/c_215_290/pictures/20/06/17/09/51/0581813.jpg', NULL, 3),
	(6, 'BALLE PERDUE', '1990', 'Petit génie de la mécanique, Lino est réputé pour ses voitures-bélier. Jusqu\'au jour où il se fait arrêter pour un braquage qui tourne mal. Repéré par le chef d\'une unité de flics de choc, il se voit proposer un marché pour éviter la prison. 9 mois plus tard, Lino a largement fait ses preuves. Mais soudain accusé à tort de meurtre, il n\'a d\'autre choix que de retrouver l\'unique preuve de son innocence : la balle du crime, coincée dans une voiture disparue.', 90, 'http://fr.web.img5.acsta.net/f_png/c_215_290/o_logo-netflix-n.png_5_se/pictures/20/06/08/09/46/5225954.jpg', NULL, 6);
/*!40000 ALTER TABLE `film` ENABLE KEYS */;

-- Listage de la structure de la table cinema. genre
CREATE TABLE IF NOT EXISTS `genre` (
  `id_genre` int(11) NOT NULL AUTO_INCREMENT,
  `nom_genre` varchar(50) NOT NULL,
  PRIMARY KEY (`id_genre`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

-- Listage des données de la table cinema.genre : ~4 rows (environ)
/*!40000 ALTER TABLE `genre` DISABLE KEYS */;
INSERT INTO `genre` (`id_genre`, `nom_genre`) VALUES
	(1, 'Horreur'),
	(2, 'Fantastique'),
	(3, 'Action'),
	(4, 'Thriller'),
	(5, 'Comédie');
/*!40000 ALTER TABLE `genre` ENABLE KEYS */;

-- Listage de la structure de la table cinema. realisateur
CREATE TABLE IF NOT EXISTS `realisateur` (
  `id_real` int(11) NOT NULL AUTO_INCREMENT,
  `nom_realisateur` varchar(50) NOT NULL,
  `prenom_realisateur` varchar(50) NOT NULL,
  `date_naissance` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_real`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

-- Listage des données de la table cinema.realisateur : ~3 rows (environ)
/*!40000 ALTER TABLE `realisateur` DISABLE KEYS */;
INSERT INTO `realisateur` (`id_real`, `nom_realisateur`, `prenom_realisateur`, `date_naissance`) VALUES
	(1, 'Waldow', 'Jeff', NULL),
	(2, 'Joost', 'Henry', NULL),
	(3, 'Eskandari', 'Matt', NULL),
	(4, 'Torras', 'Carles', NULL),
	(5, 'O\'connor', 'Gavin', NULL),
	(6, 'Pierret', 'Guillaume', NULL);
/*!40000 ALTER TABLE `realisateur` ENABLE KEYS */;

-- Listage de la structure de la table cinema. role
CREATE TABLE IF NOT EXISTS `role` (
  `id_role` int(11) NOT NULL AUTO_INCREMENT,
  `nom_role` varchar(50) NOT NULL,
  PRIMARY KEY (`id_role`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;

-- Listage des données de la table cinema.role : ~12 rows (environ)
/*!40000 ALTER TABLE `role` DISABLE KEYS */;
INSERT INTO `role` (`id_role`, `nom_role`) VALUES
	(1, 'Mr.Roarke'),
	(2, 'Gwen Olsen'),
	(3, 'Biggie'),
	(4, 'Art'),
	(5, 'Frank'),
	(6, 'role6'),
	(7, 'role7'),
	(8, 'Angel'),
	(9, 'Vane'),
	(10, 'Gardner'),
	(11, 'Lino'),
	(12, 'Jack Cunningham'),
	(13, 'Frank'),
	(14, 'Charas');
/*!40000 ALTER TABLE `role` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
