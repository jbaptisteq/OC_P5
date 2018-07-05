-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 04 juil. 2018 à 09:32
-- Version du serveur :  5.7.19
-- Version de PHP :  7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `p5jbq`
--

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `author` varchar(200) NOT NULL,
  `content` text NOT NULL,
  `comment_date` datetime NOT NULL,
  `authorized` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `comment`
--

INSERT INTO `comment` (`id`, `post_id`, `author`, `content`, `comment_date`, `authorized`) VALUES
(42, 1, 'admin', 'test Comment Article validated', '2018-07-03 18:36:32', 1),
(43, 1, 'admin', 'test Comment Article no validated', '2018-07-03 18:36:43', 0);

-- --------------------------------------------------------

--
-- Structure de la table `post`
--

DROP TABLE IF EXISTS `post`;
CREATE TABLE IF NOT EXISTS `post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `content` text NOT NULL,
  `post_date` datetime NOT NULL,
  `edit_date` datetime DEFAULT NULL,
  `edit_author` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `post`
--

INSERT INTO `post` (`id`, `user_id`, `title`, `content`, `post_date`, `edit_date`, `edit_author`) VALUES
(1, 9, 'Premier Post', '<p><span style=\"font-family: Lato, \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 20px;\">Et quoniam inedia gravi adflictabantur, locum petivere Paleas nomine, vergentem in mare, valido muro firmatum, ubi conduntur nunc usque commeatus distribui militibus omne latus Isauriae defendentibus adsueti. circumstetere igitur hoc munimentum per triduum et trinoctium et cum neque adclivitas ipsa sine discrimine adiri letali, nec cuniculis quicquam geri posset, nec procederet ullum obsidionale commentum, maesti excedunt postrema vi subigente maiora viribus adgressuri.\r\n\r\nAccenderat super his incitatum propositum ad nocendum aliqua mulier vilis, quae ad palatium ut poposcerat intromissa insidias ei latenter obtendi prodiderat a militibus obscurissimis. quam Constantina exultans ut in tuto iam locata mariti salute muneratam vehiculoque inpositam per regiae ianuas emisit in publicum, ut his inlecebris alios quoque ad indicanda proliceret paria vel maiora.</span></p>', '2018-07-03 18:23:31', NULL, NULL),
(2, 9, 'Deuxième post Admin', '<p><span style=\"font-family: Lato, \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 20px;\">Et quoniam inedia gravi adflictabantur, locum petivere Paleas nomine, vergentem in mare, valido muro firmatum, ubi conduntur nunc usque commeatus distribui militibus omne latus Isauriae defendentibus adsueti. circumstetere igitur hoc munimentum per triduum et trinoctium et cum neque adclivitas ipsa sine discrimine adiri letali, nec cuniculis quicquam geri posset, nec procederet ullum obsidionale commentum, maesti excedunt postrema vi subigente maiora viribus adgressuri.</span><br style=\"box-sizing: border-box; font-family: Lato, \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 20px;\" /><br style=\"box-sizing: border-box; font-family: Lato, \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 20px;\" /><span style=\"font-family: Lato, \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 20px;\">Accenderat super his incitatum propositum ad nocendum aliqua mulier vilis, quae ad palatium ut poposcerat intromissa insidias ei latenter obtendi prodiderat a militibus obscurissimis. quam Constantina exultans ut in tuto iam locata mariti salute muneratam vehiculoque inpositam per regiae ianuas emisit in publicum, ut his inlecebris alios quoque ad indicanda proliceret paria vel maiora.</span></p>', '2018-07-03 18:30:42', NULL, NULL),
(3, 9, 'Troisième post Admin édité', '<p><span style=\"font-family: Lato, \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 20px;\">Et quoniam inedia gravi adflictabantur, locum petivere Paleas nomine, vergentem in mare, valido muro firmatum, ubi conduntur nunc usque commeatus distribui militibus omne latus Isauriae defendentibus adsueti. circumstetere igitur hoc munimentum per triduum et trinoctium et cum neque adclivitas ipsa sine discrimine adiri letali, nec cuniculis quicquam geri posset, nec procederet ullum obsidionale commentum, maesti excedunt postrema vi subigente maiora viribus adgressuri.</span><br style=\"box-sizing: border-box; font-family: Lato, \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 20px;\" /><br style=\"box-sizing: border-box; font-family: Lato, \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 20px;\" /><span style=\"font-family: Lato, \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 20px;\">Accenderat super his incitatum propositum ad nocendum aliqua mulier vilis, quae ad palatium ut poposcerat intromissa insidias ei latenter obtendi prodiderat a militibus obscurissimis. quam Constantina exultans ut in tuto iam locata mariti salute muneratam vehiculoque inpositam per regiae ianuas emisit in publicum, ut his inlecebris alios quoque ad indicanda proliceret paria vel maiora.</span></p>', '2018-07-03 18:30:57', '2018-07-03 18:31:37', 'admin_editeur');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(200) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(200) NOT NULL,
  `validated` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `validated`) VALUES
(9, 'admin', '$2y$10$tmaOz3n0sW/b5cuKXdF06uMwvSx7RV/Svtjm4nnEnsfgAI0JmFCAm', 'admin@admin.com', 1),
(10, 'user', '$2y$10$ycBW.XGzLnIEsbh7vsrzcuA6MXEWcqvfGMGdPbrGE7DpTBTVzAnKu', 'user@user.com', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
