--
-- Base de données :  `tp_quiz`
--
DROP DATABASE IF EXISTS tp_quiz;
CREATE DATABASE IF NOT EXISTS `tp_quiz` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `tp_quiz`;

-- --------------------------------------------------------

--
-- Structure de la table `explication`
--

DROP TABLE IF EXISTS `explication`;
CREATE TABLE IF NOT EXISTS `explication` (
  `id` int(100) UNSIGNED NOT NULL AUTO_INCREMENT,
  `intitulé` varchar(255) NOT NULL,
  `reponse_id` int(100) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `reponse_id` (`reponse_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `explication`
--

INSERT INTO `explication` (`id`, `intitulé`, `reponse_id`) VALUES
(1, 'Le nom du chien de Mickey est Pluto', 2),
(2, 'Le prénom de Disney était Walter Elias Disney dit Walt', 4),
(3, 'Le prénom de Disney était Walter Elias Disney dit Walt', 5),
(4, 'Le prénom de Disney était Walter Elias Disney dit Walt', 6),
(5, 'Le prénom de Disney était Walter Elias Disney dit Walt', 7),
(6, 'L''équipe de France de football a été championne du monde en 1998', 9),
(7, 'L''équipe de France de football a été championne du monde en 1998', 10),
(8, 'L''équipe de France de football a été championne du monde en 1998', 11),
(9, 'L''équipe de France de football a été championne du monde en 1998', 12),
(10, 'Le meilleur buteur de l''équipe de France de Football est Thierry Henry', 14),
(11, 'Le meilleur buteur de l''équipe de France de Football est Thierry Henry', 15),
(12, 'Le meilleur buteur de l''équipe de France de Football est Thierry Henry', 16),
(13, 'Le meilleur buteur de l''équipe de France de Football est Thierry Henry', 17),
(14, 'Le meilleur buteur de l''équipe de France de Handball est Jérôme Fernandez', 19),
(15, 'Le meilleur buteur de l''équipe de France de Handball est Jérôme Fernandez', 20),
(16, 'Le meilleur buteur de l''équipe de France de Handball est Jérôme Fernandez', 21);

-- --------------------------------------------------------

--
-- Structure de la table `historique`
--

DROP TABLE IF EXISTS `historique`;
CREATE TABLE IF NOT EXISTS `historique` (
  `id` int(100) UNSIGNED NOT NULL AUTO_INCREMENT,
  `quiz_id` int(100) UNSIGNED NOT NULL,
  `user_id` int(100) UNSIGNED NOT NULL,
  `score_brute` int(100) NOT NULL,
  `nb_question` int(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_histo_user` (`user_id`),
  KEY `fk_histo_quiz` (`quiz_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `question`
--

DROP TABLE IF EXISTS `question`;
CREATE TABLE IF NOT EXISTS `question` (
  `id` int(100) UNSIGNED NOT NULL AUTO_INCREMENT,
  `intitulé` varchar(255) NOT NULL,
  `quiz_id` int(100) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `quiz_id` (`quiz_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `question`
--

INSERT INTO `question` (`id`, `intitulé`, `quiz_id`) VALUES
(1, 'Quel est le nom du chien de mickey?', 1),
(2, 'Comment s’appelait Disney?', 1),
(3, 'En quelle année l''équipe de France de Football fût elle championne du monde?', 3),
(4, 'Qui est/fût le meilleur buteur de l''équipe de France de football?', 3),
(5, 'Quel joueur de handball est / a été le plus prolifique en équipe de France de Handball?', 3);

-- --------------------------------------------------------

--
-- Structure de la table `quiz`
--

DROP TABLE IF EXISTS `quiz`;
CREATE TABLE IF NOT EXISTS `quiz` (
  `id` int(100) UNSIGNED NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `quiz`
--

INSERT INTO `quiz` (`id`, `titre`) VALUES
(1, 'Dessin animé'),
(2, 'Culture générale'),
(3, 'Sport');

-- --------------------------------------------------------

--
-- Structure de la table `reponse`
--

DROP TABLE IF EXISTS `reponse`;
CREATE TABLE IF NOT EXISTS `reponse` (
  `id` int(100) UNSIGNED NOT NULL AUTO_INCREMENT,
  `intitule` varchar(255) NOT NULL,
  `question_id` int(100) UNSIGNED NOT NULL,
  `bonne_reponse` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `question_id` (`question_id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `reponse`
--

INSERT INTO `reponse` (`id`, `intitule`, `question_id`, `bonne_reponse`) VALUES
(1, 'Pluto', 1, 1),
(2, 'Rantanplan', 1, 0),
(3, 'Walt', 2, 1),
(4, 'Mickey', 2, 0),
(5, 'Luke', 2, 0),
(6, 'Roy', 2, 0),
(7, 'Mark', 2, 0),
(8, '1998', 3, 1),
(9, '2012', 3, 0),
(10, '1984', 3, 0),
(11, '1994', 3, 0),
(12, '2002', 3, 0),
(13, 'Thierry Henry', 4, 1),
(14, 'Michel Platini', 4, 0),
(15, 'David Trezeguet', 4, 0),
(16, 'Zinedine Zidane', 4, 0),
(17, 'Just Fontaine', 4, 0),
(18, 'Jérôme Fernandez', 5, 1),
(19, 'Frédéric Volle', 5, 0),
(20, 'Nikola Karabatic', 5, 0),
(21, 'Stéphane Stoecklin', 5, 0);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(100) UNSIGNED NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `avg_score` int(255) NOT NULL,
  `nb_quiz` int(100) NOT NULL,
  `date_inscription` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `ind_pseudo` (`pseudo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `explication`
--
ALTER TABLE `explication`
  ADD CONSTRAINT `fk_reponse_explication` FOREIGN KEY (`reponse_id`) REFERENCES `reponse` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `historique`
--
ALTER TABLE `historique`
  ADD CONSTRAINT `fk_histo_quiz` FOREIGN KEY (`quiz_id`) REFERENCES `quiz` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_histo_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `fk_quiz_question` FOREIGN KEY (`quiz_id`) REFERENCES `quiz` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `reponse`
--
ALTER TABLE `reponse`
  ADD CONSTRAINT `fk_question_reponse` FOREIGN KEY (`question_id`) REFERENCES `question` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
