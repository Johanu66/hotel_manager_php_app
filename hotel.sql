-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  lun. 26 juil. 2021 à 12:04
-- Version du serveur :  10.1.30-MariaDB
-- Version de PHP :  7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `hotel`
--

-- --------------------------------------------------------

--
-- Structure de la table `addlog_table`
--

CREATE TABLE `addlog_table` (
  `id_addlog_table` int(11) NOT NULL,
  `CodeEvenement` text NOT NULL,
  `ParametresEvenement` text NOT NULL,
  `MessageEvenement` text NOT NULL,
  `DateEvenement` date NOT NULL,
  `HeureEvenement` time NOT NULL,
  `PseudoUtilisateur` text NOT NULL,
  `AdresseIP` text NOT NULL,
  `IdCompte` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `addlog_table`
--

INSERT INTO `addlog_table` (`id_addlog_table`, `CodeEvenement`, `ParametresEvenement`, `MessageEvenement`, `DateEvenement`, `HeureEvenement`, `PseudoUtilisateur`, `AdresseIP`, `IdCompte`) VALUES
(1, 'Cons-01-dashboard', '', '', '2021-06-05', '03:13:33', 'Abdou Majeed ALIDOU', '::1', 0),
(2, 'Cons-01-type-chambre', '', '', '2021-06-05', '03:13:48', 'Abdou Majeed ALIDOU', '::1', 0),
(3, 'Cons-01-carac-chambre', '', '', '2021-06-05', '03:14:14', 'Abdou Majeed ALIDOU', '::1', 0),
(4, 'Cons-01-chambre', '', '', '2021-06-05', '03:14:19', 'Abdou Majeed ALIDOU', '::1', 0),
(5, 'Cons-01-carac-chambre', '', '', '2021-06-05', '03:14:30', 'Abdou Majeed ALIDOU', '::1', 0),
(6, 'Cons-01-chambre', '', '', '2021-06-05', '03:14:36', 'Abdou Majeed ALIDOU', '::1', 0),
(7, 'Cons-01-carac-conf', '', '', '2021-06-05', '03:14:44', 'Abdou Majeed ALIDOU', '::1', 0),
(8, 'Cons-01-service-conf', '', '', '2021-06-05', '03:14:52', 'Abdou Majeed ALIDOU', '::1', 0),
(9, 'Cons-01-salle-conf', '', '', '2021-06-05', '05:37:13', 'Abdou Majeed ALIDOU', '::1', 0),
(10, 'Cons-01-salle-conf', '', '', '2021-06-05', '05:37:52', 'Abdou Majeed ALIDOU', '::1', 0),
(11, 'Cons-01-salle-conf', '', '', '2021-06-05', '05:39:22', 'Abdou Majeed ALIDOU', '::1', 0),
(12, 'Cons-01-carac-conf', '', '', '2021-06-05', '05:39:31', 'Abdou Majeed ALIDOU', '::1', 0),
(13, 'Modif-01-carac-conf', 'Table rondes', '', '2021-06-05', '05:39:42', 'Abdou Majeed ALIDOU', '::1', 0),
(14, 'Cons-01-salle-conf', '', '', '2021-06-05', '05:39:58', 'Abdou Majeed ALIDOU', '::1', 0),
(15, 'Cons-01-salle-conf', '', '', '2021-06-05', '05:55:59', 'Abdou Majeed ALIDOU', '::1', 0),
(16, 'Cons-01-salle-conf', '', '', '2021-06-05', '06:00:06', 'Abdou Majeed ALIDOU', '::1', 0),
(17, 'Cons-01-salle-conf', '', '', '2021-06-05', '06:00:34', 'Abdou Majeed ALIDOU', '::1', 0),
(18, 'Cons-01-salle-conf', '', '', '2021-06-05', '06:00:50', 'Abdou Majeed ALIDOU', '::1', 0),
(19, 'Cons-01-salle-conf', '', '', '2021-06-05', '06:03:01', 'Abdou Majeed ALIDOU', '::1', 0),
(20, 'Cons-01-salle-conf', '', '', '2021-06-05', '06:03:16', 'Abdou Majeed ALIDOU', '::1', 0),
(21, 'Cons-01-salle-conf', '', '', '2021-06-05', '06:03:37', 'Abdou Majeed ALIDOU', '::1', 0),
(22, 'Cons-01-salle-conf', '', '', '2021-06-05', '06:04:51', 'Abdou Majeed ALIDOU', '::1', 0),
(23, 'Cons-01-salle-conf', '', '', '2021-06-05', '06:05:13', 'Abdou Majeed ALIDOU', '::1', 0),
(24, 'Cons-01-salle-conf', '', '', '2021-06-05', '06:05:44', 'Abdou Majeed ALIDOU', '::1', 0),
(25, 'Cons-01-salle-conf', '', '', '2021-06-05', '06:05:55', 'Abdou Majeed ALIDOU', '::1', 0),
(26, 'Cons-01-salle-conf', '', '', '2021-06-05', '06:06:14', 'Abdou Majeed ALIDOU', '::1', 0),
(27, 'Cons-01-salle-conf', '', '', '2021-06-05', '06:07:05', 'Abdou Majeed ALIDOU', '::1', 0),
(28, 'Cons-01-salle-conf', '', '', '2021-06-05', '06:07:26', 'Abdou Majeed ALIDOU', '::1', 0),
(29, 'Cons-01-salle-conf', '', '', '2021-06-05', '06:07:35', 'Abdou Majeed ALIDOU', '::1', 0),
(30, 'Cons-01-salle-conf', '', '', '2021-06-05', '06:07:52', 'Abdou Majeed ALIDOU', '::1', 0),
(31, 'Cons-01-salle-conf', '', '', '2021-06-05', '06:08:00', 'Abdou Majeed ALIDOU', '::1', 0),
(32, 'Cons-01-salle-conf', '', '', '2021-06-05', '06:08:10', 'Abdou Majeed ALIDOU', '::1', 0),
(33, 'Cons-01-salle-conf', '', '', '2021-06-05', '06:08:26', 'Abdou Majeed ALIDOU', '::1', 0),
(34, 'Cons-01-salle-conf', '', '', '2021-06-05', '06:08:32', 'Abdou Majeed ALIDOU', '::1', 0),
(35, 'Cons-01-salle-conf', '', '', '2021-06-05', '06:09:01', 'Abdou Majeed ALIDOU', '::1', 0),
(36, 'Cons-01-salle-conf', '', '', '2021-06-05', '06:09:06', 'Abdou Majeed ALIDOU', '::1', 0),
(37, 'Cons-01-salle-conf', '', '', '2021-06-05', '06:09:24', 'Abdou Majeed ALIDOU', '::1', 0),
(38, 'Cons-01-salle-conf', '', '', '2021-06-05', '06:09:34', 'Abdou Majeed ALIDOU', '::1', 0),
(39, 'Cons-01-salle-conf', '', '', '2021-06-05', '06:09:45', 'Abdou Majeed ALIDOU', '::1', 0),
(40, 'Cons-01-salle-conf', '', '', '2021-06-05', '06:10:51', 'Abdou Majeed ALIDOU', '::1', 0),
(41, 'Cons-01-salle-conf', '', '', '2021-06-05', '06:11:02', 'Abdou Majeed ALIDOU', '::1', 0),
(42, 'Cons-01-salle-conf', '', '', '2021-06-05', '06:11:13', 'Abdou Majeed ALIDOU', '::1', 0),
(43, 'Cons-01-salle-conf', '', '', '2021-06-05', '06:11:37', 'Abdou Majeed ALIDOU', '::1', 0),
(44, 'Cons-01-salle-conf', '', '', '2021-06-05', '06:11:47', 'Abdou Majeed ALIDOU', '::1', 0),
(45, 'Cons-01-salle-conf', '', '', '2021-06-05', '06:12:05', 'Abdou Majeed ALIDOU', '::1', 0),
(46, 'Cons-01-salle-conf', '', '', '2021-06-05', '06:12:45', 'Abdou Majeed ALIDOU', '::1', 0),
(47, 'Cons-01-salle-conf', '', '', '2021-06-05', '06:13:02', 'Abdou Majeed ALIDOU', '::1', 0),
(48, 'Cons-01-salle-conf', '', '', '2021-06-05', '06:13:13', 'Abdou Majeed ALIDOU', '::1', 0),
(49, 'Cons-01-salle-conf', '', '', '2021-06-05', '06:13:50', 'Abdou Majeed ALIDOU', '::1', 0),
(50, 'Cons-01-salle-conf', '', '', '2021-06-05', '06:14:06', 'Abdou Majeed ALIDOU', '::1', 0),
(51, 'Cons-01-salle-conf', '', '', '2021-06-05', '06:15:16', 'Abdou Majeed ALIDOU', '::1', 0),
(52, 'Cons-01-salle-conf', '', '', '2021-06-05', '06:15:55', 'Abdou Majeed ALIDOU', '::1', 0),
(53, 'Cons-01-salle-conf', '', '', '2021-06-05', '06:16:12', 'Abdou Majeed ALIDOU', '::1', 0),
(54, 'Cons-01-salle-conf', '', '', '2021-06-05', '06:17:51', 'Abdou Majeed ALIDOU', '::1', 0),
(55, 'Cons-01-salle-conf', '', '', '2021-06-05', '06:19:26', 'Abdou Majeed ALIDOU', '::1', 0),
(56, 'Cons-01-salle-conf', '', '', '2021-06-05', '06:21:02', 'Abdou Majeed ALIDOU', '::1', 0),
(57, 'Cons-01-salle-conf', '', '', '2021-06-05', '06:21:32', 'Abdou Majeed ALIDOU', '::1', 0),
(58, 'Cons-01-salle-conf', '', '', '2021-06-05', '06:23:30', 'Abdou Majeed ALIDOU', '::1', 0),
(59, 'Cons-01-salle-conf', '', '', '2021-06-05', '06:23:35', 'Abdou Majeed ALIDOU', '::1', 0),
(60, 'Cons-01-salle-conf', '', '', '2021-06-05', '06:24:24', 'Abdou Majeed ALIDOU', '::1', 0),
(61, 'Cons-01-salle-conf', '', '', '2021-06-05', '06:24:47', 'Abdou Majeed ALIDOU', '::1', 0),
(62, 'Cons-01-salle-conf', '', '', '2021-06-05', '06:38:24', 'Abdou Majeed ALIDOU', '::1', 0),
(63, 'Cons-01-salle-conf', '', '', '2021-06-05', '06:38:36', 'Abdou Majeed ALIDOU', '::1', 0),
(64, 'Cons-01-salle-conf', '', '', '2021-06-05', '06:39:33', 'Abdou Majeed ALIDOU', '::1', 0),
(65, 'Cons-01-salle-conf', '', '', '2021-06-05', '06:40:29', 'Abdou Majeed ALIDOU', '::1', 0),
(66, 'Cons-01-salle-conf', '', '', '2021-06-05', '06:45:21', 'Abdou Majeed ALIDOU', '::1', 0),
(67, 'Cons-01-salle-conf', '', '', '2021-06-05', '06:45:49', 'Abdou Majeed ALIDOU', '::1', 0),
(68, 'Cons-01-carac-conf', '', '', '2021-06-05', '06:49:04', 'Abdou Majeed ALIDOU', '::1', 0),
(69, 'Exp-01-carac-conf', 'PDF', '', '2021-06-05', '06:49:11', 'Abdou Majeed ALIDOU', '::1', 0),
(70, 'Cons-01-carac-conf', '', '', '2021-06-05', '06:49:19', 'Abdou Majeed ALIDOU', '::1', 0),
(71, 'Cons-01-salle-conf', '', '', '2021-06-05', '06:49:20', 'Abdou Majeed ALIDOU', '::1', 0),
(72, 'Cons-01-carac-conf', '', '', '2021-06-05', '06:51:38', 'Abdou Majeed ALIDOU', '::1', 0),
(73, 'Exp-01-carac-conf', 'PDF', '', '2021-06-05', '06:51:40', 'Abdou Majeed ALIDOU', '::1', 0),
(74, 'Cons-01-carac-conf', '', '', '2021-06-05', '06:52:10', 'Abdou Majeed ALIDOU', '::1', 0),
(75, 'Exp-01-carac-conf', 'PDF', '', '2021-06-05', '06:52:12', 'Abdou Majeed ALIDOU', '::1', 0),
(76, 'Cons-01-carac-conf', '', '', '2021-06-05', '06:52:27', 'Abdou Majeed ALIDOU', '::1', 0),
(77, 'Exp-01-carac-conf', 'PDF', '', '2021-06-05', '06:52:28', 'Abdou Majeed ALIDOU', '::1', 0),
(78, 'Cons-01-carac-conf', '', '', '2021-06-05', '07:00:24', 'Abdou Majeed ALIDOU', '::1', 0),
(79, 'Cons-01-salle-conf', '', '', '2021-06-05', '07:00:44', 'Abdou Majeed ALIDOU', '::1', 0),
(80, 'Cons-01-salle-conf', '', '', '2021-06-05', '07:01:02', 'Abdou Majeed ALIDOU', '::1', 0),
(81, 'Cons-01-salle-conf', '', '', '2021-06-05', '07:01:24', 'Abdou Majeed ALIDOU', '::1', 0),
(82, 'Cons-01-salle-conf', '', '', '2021-06-05', '07:01:50', 'Abdou Majeed ALIDOU', '::1', 0),
(83, 'Cons-01-salle-conf', '', '', '2021-06-05', '07:06:09', 'Abdou Majeed ALIDOU', '::1', 0),
(84, 'Cons-01-carac-conf', '', '', '2021-06-05', '07:16:58', 'Abdou Majeed ALIDOU', '::1', 0),
(85, 'Cons-01-salle-conf', '', '', '2021-06-05', '07:17:45', 'Abdou Majeed ALIDOU', '::1', 0),
(86, 'Cons-01-salle-conf', '', '', '2021-06-05', '07:29:03', 'Abdou Majeed ALIDOU', '::1', 0),
(87, 'Cons-01-salle-conf', '', '', '2021-06-05', '07:29:16', 'Abdou Majeed ALIDOU', '::1', 0),
(88, 'Cons-01-salle-conf', '', '', '2021-06-05', '19:16:00', 'Abdou Majeed ALIDOU', '::1', 0),
(89, 'Cons-01-salle-conf', '', '', '2021-06-05', '19:45:52', 'Abdou Majeed ALIDOU', '::1', 0),
(90, 'Cons-01-salle-conf', '', '', '2021-06-05', '19:47:05', 'Abdou Majeed ALIDOU', '::1', 0),
(91, 'Cons-01-salle-conf', '', '', '2021-06-05', '19:47:13', 'Abdou Majeed ALIDOU', '::1', 0),
(92, 'Cons-01-salle-conf', '', '', '2021-06-05', '19:48:05', 'Abdou Majeed ALIDOU', '::1', 0),
(93, 'Cons-01-salle-conf', '', '', '2021-06-05', '19:49:05', 'Abdou Majeed ALIDOU', '::1', 0),
(94, 'Cons-01-chambre', '', '', '2021-06-06', '11:38:23', 'Abdou Majeed ALIDOU', '::1', 0),
(95, 'Cons-01-salle-conf', '', '', '2021-06-06', '11:38:31', 'Abdou Majeed ALIDOU', '::1', 0),
(96, 'Cons-01-salle-conf', '', '', '2021-06-06', '11:40:21', 'Abdou Majeed ALIDOU', '::1', 0),
(97, 'Exp-01-salle-conf', 'PDF', '', '2021-06-06', '11:40:25', 'Abdou Majeed ALIDOU', '::1', 0),
(98, 'Cons-01-salle-conf', '', '', '2021-06-06', '11:41:30', 'Abdou Majeed ALIDOU', '::1', 0),
(99, 'Exp-01-salle-conf', 'PDF', '', '2021-06-06', '11:41:32', 'Abdou Majeed ALIDOU', '::1', 0),
(100, 'Cons-01-salle-conf', '', '', '2021-06-06', '11:41:35', 'Abdou Majeed ALIDOU', '::1', 0),
(101, 'Exp-01-salle-conf', 'Word', '', '2021-06-06', '11:41:40', 'Abdou Majeed ALIDOU', '::1', 0),
(102, 'Cons-01-salle-conf', '', '', '2021-06-06', '11:43:38', 'Abdou Majeed ALIDOU', '::1', 0),
(103, 'Cons-01-salle-conf', '', '', '2021-06-06', '11:49:17', 'Abdou Majeed ALIDOU', '::1', 0),
(104, 'Chg-01-salle-conf', 'modern,Inactif', '', '2021-06-06', '11:49:22', 'Abdou Majeed ALIDOU', '::1', 0),
(105, 'Chg-01-salle-conf', 'modern,Actif', '', '2021-06-06', '11:49:31', 'Abdou Majeed ALIDOU', '::1', 0),
(106, 'Chg-01-salle-conf', 'modern,Inactif', '', '2021-06-06', '11:49:42', 'Abdou Majeed ALIDOU', '::1', 0),
(107, 'Exp-01-salle-conf', 'PDF', '', '2021-06-06', '11:49:45', 'Abdou Majeed ALIDOU', '::1', 0),
(108, 'Cons-01-salle-conf', '', '', '2021-06-06', '11:49:49', 'Abdou Majeed ALIDOU', '::1', 0),
(109, 'Info-01-salle-conf', 'Large', '', '2021-06-06', '12:01:54', 'Abdou Majeed ALIDOU', '::1', 0),
(110, 'Info-01-salle-conf', 'Large', '', '2021-06-06', '12:05:00', 'Abdou Majeed ALIDOU', '::1', 0),
(111, 'Info-01-salle-conf', 'Large', '', '2021-06-06', '12:06:24', 'Abdou Majeed ALIDOU', '::1', 0),
(112, 'Info-01-salle-conf', 'Large', '', '2021-06-06', '12:06:38', 'Abdou Majeed ALIDOU', '::1', 0),
(113, 'Info-01-salle-conf', 'Large', '', '2021-06-06', '12:07:57', 'Abdou Majeed ALIDOU', '::1', 0),
(114, 'Info-01-salle-conf', 'Large', '', '2021-06-06', '12:08:08', 'Abdou Majeed ALIDOU', '::1', 0),
(115, 'Cons-01-chambre', '', '', '2021-06-06', '12:08:23', 'Abdou Majeed ALIDOU', '::1', 0),
(116, 'Cons-01-chambre', '', '', '2021-06-06', '12:08:33', 'Abdou Majeed ALIDOU', '::1', 0),
(117, 'Info-01-chambre', 'q', '', '2021-06-06', '12:08:44', 'Abdou Majeed ALIDOU', '::1', 0),
(118, 'Cons-01-chambre', '', '', '2021-06-06', '12:09:35', 'Abdou Majeed ALIDOU', '::1', 0),
(119, 'Cons-01-salle-conf', '', '', '2021-06-06', '12:09:48', 'Abdou Majeed ALIDOU', '::1', 0),
(120, 'Info-01-salle-conf', 'Large', '', '2021-06-06', '12:09:53', 'Abdou Majeed ALIDOU', '::1', 0),
(121, 'Info-01-salle-conf', 'Large', '', '2021-06-06', '12:11:14', 'Abdou Majeed ALIDOU', '::1', 0),
(122, 'Info-01-salle-conf', 'Large', '', '2021-06-06', '12:11:26', 'Abdou Majeed ALIDOU', '::1', 0),
(123, 'Info-01-salle-conf', 'modern', '', '2021-06-06', '12:11:40', 'Abdou Majeed ALIDOU', '::1', 0),
(124, 'Info-01-salle-conf', 'Large', '', '2021-06-06', '12:11:51', 'Abdou Majeed ALIDOU', '::1', 0),
(125, 'Info-01-salle-conf', 'Salle Medium', '', '2021-06-06', '12:12:04', 'Abdou Majeed ALIDOU', '::1', 0),
(126, 'Cons-01-salle-conf', '', '', '2021-06-06', '12:18:58', 'Abdou Majeed ALIDOU', '::1', 0),
(127, 'Cons-01-salle-conf', '', '', '2021-06-06', '12:24:06', 'Abdou Majeed ALIDOU', '::1', 0),
(128, 'Enr-01-salle-conf', 'Xtra', '', '2021-06-06', '12:24:31', 'Abdou Majeed ALIDOU', '::1', 0),
(129, 'Info-01-salle-conf', 'Xtra', '', '2021-06-06', '12:24:38', 'Abdou Majeed ALIDOU', '::1', 0),
(130, 'Chg-01-salle-conf', 'Xtra,Inactif', '', '2021-06-06', '12:25:15', 'Abdou Majeed ALIDOU', '::1', 0),
(131, 'Info-01-salle-conf', 'Xtra', '', '2021-06-06', '12:25:20', 'Abdou Majeed ALIDOU', '::1', 0),
(132, 'Chg-01-salle-conf', 'Xtra,Actif', '', '2021-06-06', '12:25:31', 'Abdou Majeed ALIDOU', '::1', 0),
(133, 'Exp-01-salle-conf', 'PDF', '', '2021-06-06', '12:25:48', 'Abdou Majeed ALIDOU', '::1', 0),
(134, 'Cons-01-salle-conf', '', '', '2021-06-06', '12:25:53', 'Abdou Majeed ALIDOU', '::1', 0),
(135, 'Cons-01-salle-conf', '', '', '2021-06-06', '12:29:03', 'Abdou Majeed ALIDOU', '::1', 0),
(136, 'Cons-01-salle-conf', '', '', '2021-06-06', '12:37:50', 'Abdou Majeed ALIDOU', '::1', 0),
(137, 'Cons-01-salle-conf', '', '', '2021-06-06', '12:39:07', 'Abdou Majeed ALIDOU', '::1', 0),
(138, 'Cons-01-salle-conf', '', '', '2021-06-06', '12:39:42', 'Abdou Majeed ALIDOU', '::1', 0),
(139, 'Cons-01-salle-conf', '', '', '2021-06-06', '12:43:10', 'Abdou Majeed ALIDOU', '::1', 0),
(140, 'Exp-01-salle-conf', 'PDF', '', '2021-06-06', '12:43:12', 'Abdou Majeed ALIDOU', '::1', 0),
(141, 'Cons-01-salle-conf', '', '', '2021-06-06', '12:43:15', 'Abdou Majeed ALIDOU', '::1', 0),
(142, 'Cons-01-salle-conf', '', '', '2021-06-06', '12:43:30', 'Abdou Majeed ALIDOU', '::1', 0),
(143, 'Exp-01-salle-conf', 'PDF', '', '2021-06-06', '12:43:35', 'Abdou Majeed ALIDOU', '::1', 0),
(144, 'Cons-01-salle-conf', '', '', '2021-06-06', '12:43:46', 'Abdou Majeed ALIDOU', '::1', 0),
(145, 'Modif-01-salle-conf', 'Large', '', '2021-06-06', '12:45:59', 'Abdou Majeed ALIDOU', '::1', 0),
(146, 'Modif-01-salle-conf', 'La', '', '2021-06-06', '12:46:30', 'Abdou Majeed ALIDOU', '::1', 0),
(147, 'Modif-01-salle-conf', 'Large', '', '2021-06-06', '12:46:39', 'Abdou Majeed ALIDOU', '::1', 0),
(148, 'Cons-01-log', '', '', '2021-06-06', '12:52:24', 'Abdou Majeed ALIDOU', '::1', 0),
(149, 'Cons-01-log', '', '', '2021-06-06', '12:52:49', 'Abdou Majeed ALIDOU', '::1', 0),
(150, 'Cons-01-salle-conf', '', '', '2021-06-06', '12:52:54', 'Abdou Majeed ALIDOU', '::1', 0),
(151, 'Info-01-salle-conf', 'Large', '', '2021-06-06', '12:53:51', 'Abdou Majeed ALIDOU', '::1', 0),
(152, 'Info-01-salle-conf', 'Large', '', '2021-06-06', '12:54:16', 'Abdou Majeed ALIDOU', '::1', 0),
(153, 'Cons-01-salle-conf', '', '', '2021-06-06', '16:24:42', 'Abdou Majeed ALIDOU', '::1', 0),
(154, 'Cons-01-salle-conf', '', '', '2021-06-06', '16:49:49', 'Abdou Majeed ALIDOU', '::1', 0),
(155, 'Cons-01-salle-conf', '', '', '2021-06-06', '16:50:52', 'Abdou Majeed ALIDOU', '::1', 0),
(156, 'Cons-01-salle-conf', '', '', '2021-06-06', '16:51:16', 'Abdou Majeed ALIDOU', '::1', 0),
(157, 'Cons-01-salle-conf', '', '', '2021-06-06', '16:54:17', 'Abdou Majeed ALIDOU', '::1', 0),
(158, 'Cons-01-salle-conf', '', '', '2021-06-06', '16:58:23', 'Abdou Majeed ALIDOU', '::1', 0),
(159, 'Cons-01-salle-conf', '', '', '2021-06-06', '16:59:38', 'Abdou Majeed ALIDOU', '::1', 0),
(160, 'Cons-01-salle-conf', '', '', '2021-06-06', '17:00:12', 'Abdou Majeed ALIDOU', '::1', 0),
(161, 'Cons-01-salle-conf', '', '', '2021-06-06', '17:00:16', 'Abdou Majeed ALIDOU', '::1', 0),
(162, 'Cons-01-salle-conf', '', '', '2021-06-06', '17:00:47', 'Abdou Majeed ALIDOU', '::1', 0),
(163, 'Cons-01-salle-conf', '', '', '2021-06-06', '17:00:57', 'Abdou Majeed ALIDOU', '::1', 0),
(164, 'Cons-01-salle-conf', '', '', '2021-06-06', '17:00:59', 'Abdou Majeed ALIDOU', '::1', 0),
(165, 'Cons-01-salle-conf', '', '', '2021-06-06', '17:02:00', 'Abdou Majeed ALIDOU', '::1', 0),
(166, 'Cons-01-salle-conf', '', '', '2021-06-06', '17:02:05', 'Abdou Majeed ALIDOU', '::1', 0),
(167, 'Cons-01-salle-conf', '', '', '2021-06-06', '17:09:45', 'Abdou Majeed ALIDOU', '::1', 0),
(168, 'Cons-01-salle-conf', '', '', '2021-06-06', '17:11:32', 'Abdou Majeed ALIDOU', '::1', 0),
(169, 'Cons-01-salle-conf', '', '', '2021-06-06', '17:19:25', 'Abdou Majeed ALIDOU', '::1', 0),
(170, 'Cons-01-salle-conf', '', '', '2021-06-06', '17:21:25', 'Abdou Majeed ALIDOU', '::1', 0),
(171, 'Cons-01-salle-conf', '', '', '2021-06-06', '17:21:35', 'Abdou Majeed ALIDOU', '::1', 0),
(172, 'Cons-01-salle-conf', '', '', '2021-06-06', '17:23:53', 'Abdou Majeed ALIDOU', '::1', 0),
(173, 'Cons-01-salle-conf', '', '', '2021-06-06', '17:24:38', 'Abdou Majeed ALIDOU', '::1', 0),
(174, 'Cons-01-salle-conf', '', '', '2021-06-06', '17:24:46', 'Abdou Majeed ALIDOU', '::1', 0),
(175, 'Exp-01-salle-conf', 'PDF', '', '2021-06-06', '17:25:18', 'Abdou Majeed ALIDOU', '::1', 0),
(176, 'Cons-01-salle-conf', '', '', '2021-06-06', '17:25:21', 'Abdou Majeed ALIDOU', '::1', 0),
(177, 'Cons-01-salle-conf', '', '', '2021-06-06', '18:07:16', 'Abdou Majeed ALIDOU', '::1', 0),
(178, 'Cons-01-salle-conf', '', '', '2021-06-06', '18:07:40', 'Abdou Majeed ALIDOU', '::1', 0),
(179, 'Cons-01-salle-conf', '', '', '2021-06-06', '18:07:55', 'Abdou Majeed ALIDOU', '::1', 0),
(180, 'Cons-01-salle-conf', '', '', '2021-06-06', '18:38:31', 'Abdou Majeed ALIDOU', '::1', 0),
(181, 'Cons-01-salle-conf', '', '', '2021-06-06', '18:38:44', 'Abdou Majeed ALIDOU', '::1', 0),
(182, 'Cons-01-salle-conf', '', '', '2021-06-06', '18:39:15', 'Abdou Majeed ALIDOU', '::1', 0),
(183, 'Cons-01-salle-conf', '', '', '2021-06-06', '18:40:19', 'Abdou Majeed ALIDOU', '::1', 0),
(184, 'Cons-01-salle-conf', '', '', '2021-06-06', '18:42:09', 'Abdou Majeed ALIDOU', '::1', 0),
(185, 'Cons-01-salle-conf', '', '', '2021-06-06', '18:42:41', 'Abdou Majeed ALIDOU', '::1', 0),
(186, 'Cons-01-salle-conf', '', '', '2021-06-06', '18:47:37', 'Abdou Majeed ALIDOU', '::1', 0),
(187, 'Cons-01-salle-conf', '', '', '2021-06-06', '18:47:55', 'Abdou Majeed ALIDOU', '::1', 0),
(188, 'Cons-01-salle-conf', '', '', '2021-06-06', '18:48:13', 'Abdou Majeed ALIDOU', '::1', 0),
(189, 'Cons-01-salle-conf', '', '', '2021-06-06', '18:48:33', 'Abdou Majeed ALIDOU', '::1', 0),
(190, 'Cons-01-salle-conf', '', '', '2021-06-06', '18:49:02', 'Abdou Majeed ALIDOU', '::1', 0),
(191, 'Cons-01-salle-conf', '', '', '2021-06-06', '18:49:23', 'Abdou Majeed ALIDOU', '::1', 0),
(192, 'Cons-01-salle-conf', '', '', '2021-06-06', '18:49:34', 'Abdou Majeed ALIDOU', '::1', 0),
(193, 'Cons-01-salle-conf', '', '', '2021-06-06', '19:13:35', 'Abdou Majeed ALIDOU', '::1', 0),
(194, 'Cons-01-salle-conf', '', '', '2021-06-06', '19:14:14', 'Abdou Majeed ALIDOU', '::1', 0),
(195, 'Cons-01-salle-conf', '', '', '2021-06-06', '19:14:37', 'Abdou Majeed ALIDOU', '::1', 0),
(196, 'Cons-01-salle-conf', '', '', '2021-06-06', '19:15:28', 'Abdou Majeed ALIDOU', '::1', 0),
(197, 'Cons-01-salle-conf', '', '', '2021-06-06', '19:16:52', 'Abdou Majeed ALIDOU', '::1', 0),
(198, 'Cons-01-salle-conf', '', '', '2021-06-06', '19:17:15', 'Abdou Majeed ALIDOU', '::1', 0),
(199, 'Cons-01-salle-conf', '', '', '2021-06-06', '19:20:20', 'Abdou Majeed ALIDOU', '::1', 0),
(200, 'Cons-01-salle-conf', '', '', '2021-06-06', '19:20:49', 'Abdou Majeed ALIDOU', '::1', 0),
(201, 'Cons-01-salle-conf', '', '', '2021-06-06', '19:59:35', 'Abdou Majeed ALIDOU', '::1', 0),
(202, 'Cons-01-salle-conf', '', '', '2021-06-06', '19:59:59', 'Abdou Majeed ALIDOU', '::1', 0),
(203, 'Cons-01-salle-conf', '', '', '2021-06-06', '20:01:15', 'Abdou Majeed ALIDOU', '::1', 0),
(204, 'Cons-01-salle-conf', '', '', '2021-06-06', '20:01:54', 'Abdou Majeed ALIDOU', '::1', 0),
(205, 'Cons-01-salle-conf', '', '', '2021-06-06', '20:02:08', 'Abdou Majeed ALIDOU', '::1', 0),
(206, 'Cons-01-salle-conf', '', '', '2021-06-06', '20:02:19', 'Abdou Majeed ALIDOU', '::1', 0),
(207, 'Cons-01-salle-conf', '', '', '2021-06-06', '20:02:50', 'Abdou Majeed ALIDOU', '::1', 0),
(208, 'Cons-01-salle-conf', '', '', '2021-06-06', '20:04:34', 'Abdou Majeed ALIDOU', '::1', 0),
(209, 'Cons-01-salle-conf', '', '', '2021-06-06', '20:04:46', 'Abdou Majeed ALIDOU', '::1', 0),
(210, 'Cons-01-salle-conf', '', '', '2021-06-06', '20:17:24', 'Abdou Majeed ALIDOU', '::1', 0),
(211, 'Cons-01-salle-conf', '', '', '2021-06-06', '20:18:20', 'Abdou Majeed ALIDOU', '::1', 0),
(212, 'Cons-01-salle-conf', '', '', '2021-06-06', '20:18:28', 'Abdou Majeed ALIDOU', '::1', 0),
(213, 'Cons-01-salle-conf', '', '', '2021-06-06', '20:20:25', 'Abdou Majeed ALIDOU', '::1', 0),
(214, 'Cons-01-salle-conf', '', '', '2021-06-06', '20:21:06', 'Abdou Majeed ALIDOU', '::1', 0),
(215, 'Cons-01-salle-conf', '', '', '2021-06-06', '20:22:29', 'Abdou Majeed ALIDOU', '::1', 0),
(216, 'Cons-01-salle-conf', '', '', '2021-06-06', '20:23:30', 'Abdou Majeed ALIDOU', '::1', 0),
(217, 'Cons-01-salle-conf', '', '', '2021-06-06', '20:30:46', 'Abdou Majeed ALIDOU', '::1', 0),
(218, 'Cons-01-salle-conf', '', '', '2021-06-06', '20:30:58', 'Abdou Majeed ALIDOU', '::1', 0),
(219, 'Cons-01-salle-conf', '', '', '2021-06-06', '20:33:36', 'Abdou Majeed ALIDOU', '::1', 0),
(220, 'Cons-01-salle-conf', '', '', '2021-06-06', '20:34:10', 'Abdou Majeed ALIDOU', '::1', 0),
(221, 'Cons-01-salle-conf', '', '', '2021-06-06', '20:36:02', 'Abdou Majeed ALIDOU', '::1', 0),
(222, 'Cons-01-salle-conf', '', '', '2021-06-06', '20:37:08', 'Abdou Majeed ALIDOU', '::1', 0),
(223, 'Cons-01-salle-conf', '', '', '2021-06-06', '20:41:29', 'Abdou Majeed ALIDOU', '::1', 0),
(224, 'Cons-01-salle-conf', '', '', '2021-06-06', '20:44:33', 'Abdou Majeed ALIDOU', '::1', 0),
(225, 'Cons-01-salle-conf', '', '', '2021-06-06', '20:45:30', 'Abdou Majeed ALIDOU', '::1', 0),
(226, 'Cons-01-salle-conf', '', '', '2021-06-06', '20:51:50', 'Abdou Majeed ALIDOU', '::1', 0),
(227, 'Cons-01-salle-conf', '', '', '2021-06-06', '20:52:12', 'Abdou Majeed ALIDOU', '::1', 0),
(228, 'Cons-01-salle-conf', '', '', '2021-06-06', '20:52:31', 'Abdou Majeed ALIDOU', '::1', 0),
(229, 'Cons-01-salle-conf', '', '', '2021-06-06', '20:54:22', 'Abdou Majeed ALIDOU', '::1', 0),
(230, 'Cons-01-salle-conf', '', '', '2021-06-06', '21:00:37', 'Abdou Majeed ALIDOU', '::1', 0),
(231, 'Cons-01-salle-conf', '', '', '2021-06-06', '21:00:55', 'Abdou Majeed ALIDOU', '::1', 0),
(232, 'Cons-01-salle-conf', '', '', '2021-06-06', '21:04:53', 'Abdou Majeed ALIDOU', '::1', 0),
(233, 'Cons-01-salle-conf', '', '', '2021-06-06', '21:06:16', 'Abdou Majeed ALIDOU', '::1', 0),
(234, 'Cons-01-salle-conf', '', '', '2021-06-06', '21:08:57', 'Abdou Majeed ALIDOU', '::1', 0),
(235, 'Cons-01-salle-conf', '', '', '2021-06-06', '21:09:40', 'Abdou Majeed ALIDOU', '::1', 0),
(236, 'Cons-01-salle-conf', '', '', '2021-06-06', '21:12:06', 'Abdou Majeed ALIDOU', '::1', 0),
(237, 'Cons-01-salle-conf', '', '', '2021-06-06', '21:14:18', 'Abdou Majeed ALIDOU', '::1', 0),
(238, 'Cons-01-salle-conf', '', '', '2021-06-06', '21:15:08', 'Abdou Majeed ALIDOU', '::1', 0),
(239, 'Cons-01-salle-conf', '', '', '2021-06-06', '21:16:41', 'Abdou Majeed ALIDOU', '::1', 0),
(240, 'Cons-01-salle-conf', '', '', '2021-06-06', '21:31:39', 'Abdou Majeed ALIDOU', '::1', 0),
(241, 'Cons-01-salle-conf', '', '', '2021-06-06', '21:31:59', 'Abdou Majeed ALIDOU', '::1', 0),
(242, 'Cons-01-salle-conf', '', '', '2021-06-06', '21:32:25', 'Abdou Majeed ALIDOU', '::1', 0),
(243, 'Cons-01-salle-conf', '', '', '2021-06-06', '21:34:29', 'Abdou Majeed ALIDOU', '::1', 0),
(244, 'Cons-01-salle-conf', '', '', '2021-06-06', '21:39:13', 'Abdou Majeed ALIDOU', '::1', 0),
(245, 'Cons-01-salle-conf', '', '', '2021-06-06', '21:40:08', 'Abdou Majeed ALIDOU', '::1', 0),
(246, 'Cons-01-salle-conf', '', '', '2021-06-06', '21:44:12', 'Abdou Majeed ALIDOU', '::1', 0),
(247, 'Cons-01-salle-conf', '', '', '2021-06-06', '22:00:27', 'Abdou Majeed ALIDOU', '::1', 0),
(248, 'Cons-01-salle-conf', '', '', '2021-06-06', '22:01:43', 'Abdou Majeed ALIDOU', '::1', 0),
(249, 'Cons-01-salle-conf', '', '', '2021-06-06', '22:03:15', 'Abdou Majeed ALIDOU', '::1', 0),
(250, 'Cons-01-salle-conf', '', '', '2021-06-06', '22:03:45', 'Abdou Majeed ALIDOU', '::1', 0),
(251, 'Cons-01-salle-conf', '', '', '2021-06-06', '22:05:12', 'Abdou Majeed ALIDOU', '::1', 0),
(252, 'Cons-01-salle-conf', '', '', '2021-06-06', '22:05:33', 'Abdou Majeed ALIDOU', '::1', 0),
(253, 'Cons-01-salle-conf', '', '', '2021-06-06', '22:05:49', 'Abdou Majeed ALIDOU', '::1', 0),
(254, 'Cons-01-salle-conf', '', '', '2021-06-06', '22:06:03', 'Abdou Majeed ALIDOU', '::1', 0),
(255, 'Cons-01-salle-conf', '', '', '2021-06-06', '22:06:17', 'Abdou Majeed ALIDOU', '::1', 0),
(256, 'Cons-01-salle-conf', '', '', '2021-06-06', '22:12:27', 'Abdou Majeed ALIDOU', '::1', 0),
(257, 'Cons-01-salle-conf', '', '', '2021-06-06', '22:13:19', 'Abdou Majeed ALIDOU', '::1', 0),
(258, 'Cons-01-salle-conf', '', '', '2021-06-06', '22:14:10', 'Abdou Majeed ALIDOU', '::1', 0),
(259, 'Cons-01-salle-conf', '', '', '2021-06-06', '22:14:26', 'Abdou Majeed ALIDOU', '::1', 0),
(260, 'Cons-01-salle-conf', '', '', '2021-06-06', '22:16:32', 'Abdou Majeed ALIDOU', '::1', 0),
(261, 'Cons-01-salle-conf', '', '', '2021-06-06', '22:19:33', 'Abdou Majeed ALIDOU', '::1', 0),
(262, 'Cons-01-salle-conf', '', '', '2021-06-06', '22:20:26', 'Abdou Majeed ALIDOU', '::1', 0),
(263, 'Cons-01-salle-conf', '', '', '2021-06-06', '22:22:04', 'Abdou Majeed ALIDOU', '::1', 0),
(264, 'Cons-01-salle-conf', '', '', '2021-06-06', '22:24:56', 'Abdou Majeed ALIDOU', '::1', 0),
(265, 'Cons-01-salle-conf', '', '', '2021-06-06', '22:25:43', 'Abdou Majeed ALIDOU', '::1', 0),
(266, 'Cons-01-salle-conf', '', '', '2021-06-06', '22:28:06', 'Abdou Majeed ALIDOU', '::1', 0),
(267, 'Cons-01-salle-conf', '', '', '2021-06-06', '22:31:29', 'Abdou Majeed ALIDOU', '::1', 0),
(268, 'Cons-01-salle-conf', '', '', '2021-06-06', '22:37:52', 'Abdou Majeed ALIDOU', '::1', 0),
(269, 'Cons-01-salle-conf', '', '', '2021-06-06', '22:38:48', 'Abdou Majeed ALIDOU', '::1', 0),
(270, 'Cons-01-salle-conf', '', '', '2021-06-06', '22:39:29', 'Abdou Majeed ALIDOU', '::1', 0),
(271, 'Cons-01-salle-conf', '', '', '2021-06-06', '22:39:47', 'Abdou Majeed ALIDOU', '::1', 0),
(272, 'Cons-01-salle-conf', '', '', '2021-06-06', '22:40:03', 'Abdou Majeed ALIDOU', '::1', 0),
(273, 'Cons-01-salle-conf', '', '', '2021-06-06', '22:40:23', 'Abdou Majeed ALIDOU', '::1', 0),
(274, 'Cons-01-salle-conf', '', '', '2021-06-06', '22:40:46', 'Abdou Majeed ALIDOU', '::1', 0),
(275, 'Cons-01-salle-conf', '', '', '2021-06-06', '22:42:49', 'Abdou Majeed ALIDOU', '::1', 0),
(276, 'Cons-01-salle-conf', '', '', '2021-06-06', '22:44:42', 'Abdou Majeed ALIDOU', '::1', 0),
(277, 'Cons-01-salle-conf', '', '', '2021-06-06', '22:46:07', 'Abdou Majeed ALIDOU', '::1', 0),
(278, 'Cons-01-salle-conf', '', '', '2021-06-06', '22:50:47', 'Abdou Majeed ALIDOU', '::1', 0),
(279, 'Cons-01-salle-conf', '', '', '2021-06-06', '22:53:00', 'Abdou Majeed ALIDOU', '::1', 0),
(280, 'Enr-01-salle-conf', 'h', '', '2021-06-06', '22:54:15', 'Abdou Majeed ALIDOU', '::1', 0),
(281, 'Cons-01-salle-conf', '', '', '2021-06-06', '22:57:42', 'Abdou Majeed ALIDOU', '::1', 0),
(282, 'Cons-01-salle-conf', '', '', '2021-06-06', '22:59:33', 'Abdou Majeed ALIDOU', '::1', 0),
(283, 'Cons-01-salle-conf', '', '', '2021-06-06', '23:02:05', 'Abdou Majeed ALIDOU', '::1', 0),
(284, 'Cons-01-salle-conf', '', '', '2021-06-06', '23:03:02', 'Abdou Majeed ALIDOU', '::1', 0),
(285, 'Enr-01-salle-conf', 'q', '', '2021-06-06', '23:03:10', 'Abdou Majeed ALIDOU', '::1', 0),
(286, 'Cons-01-salle-conf', '', '', '2021-06-06', '23:03:45', 'Abdou Majeed ALIDOU', '::1', 0),
(287, 'Cons-01-salle-conf', '', '', '2021-06-06', '23:04:15', 'Abdou Majeed ALIDOU', '::1', 0),
(288, 'Enr-01-salle-conf', 'bbbb', '', '2021-06-06', '23:22:09', 'Abdou Majeed ALIDOU', '::1', 0),
(289, 'Enr-01-salle-conf', 'v', '', '2021-06-06', '23:22:45', 'Abdou Majeed ALIDOU', '::1', 0),
(290, 'Cons-01-salle-conf', '', '', '2021-06-06', '23:24:45', 'Abdou Majeed ALIDOU', '::1', 0),
(291, 'Cons-01-salle-conf', '', '', '2021-06-06', '23:25:41', 'Abdou Majeed ALIDOU', '::1', 0),
(292, 'Cons-01-salle-conf', '', '', '2021-06-06', '23:39:09', 'Abdou Majeed ALIDOU', '::1', 0),
(293, 'Cons-01-salle-conf', '', '', '2021-06-06', '23:50:09', 'Abdou Majeed ALIDOU', '::1', 0),
(294, 'Enr-01-salle-conf', 'wwww', '', '2021-06-06', '23:54:21', 'Abdou Majeed ALIDOU', '::1', 0),
(295, 'Cons-01-salle-conf', '', '', '2021-06-06', '23:54:58', 'Abdou Majeed ALIDOU', '::1', 0),
(296, 'Cons-01-salle-conf', '', '', '2021-06-06', '23:55:49', 'Abdou Majeed ALIDOU', '::1', 0),
(297, 'Enr-01-salle-conf', 'nova', '', '2021-06-06', '23:56:03', 'Abdou Majeed ALIDOU', '::1', 0),
(298, 'Info-01-salle-conf', 'nova', '', '2021-06-06', '23:57:14', 'Abdou Majeed ALIDOU', '::1', 0),
(299, 'Cons-01-carac-conf', '', '', '2021-06-06', '23:57:23', 'Abdou Majeed ALIDOU', '::1', 0),
(300, 'Modif-01-carac-conf', 'Tables rondes', '', '2021-06-06', '23:57:32', 'Abdou Majeed ALIDOU', '::1', 0),
(301, 'Cons-01-salle-conf', '', '', '2021-06-06', '23:57:35', 'Abdou Majeed ALIDOU', '::1', 0),
(302, 'Cons-01-salle-conf', '', '', '2021-06-06', '23:59:07', 'Abdou Majeed ALIDOU', '::1', 0),
(303, 'Enr-01-salle-conf', 'Small', '', '2021-06-06', '23:59:56', 'Abdou Majeed ALIDOU', '::1', 0),
(304, 'Modif-01-salle-conf', 'Small', '', '2021-06-07', '00:00:54', 'Abdou Majeed ALIDOU', '::1', 0),
(305, 'Enr-01-salle-conf', 'Medium', '', '2021-06-07', '00:01:44', 'Abdou Majeed ALIDOU', '::1', 0),
(306, 'Enr-01-salle-conf', 'Large', '', '2021-06-07', '00:03:03', 'Abdou Majeed ALIDOU', '::1', 0),
(307, 'Cons-01-carac-conf', '', '', '2021-06-07', '00:03:11', 'Abdou Majeed ALIDOU', '::1', 0),
(308, 'Enr-01-carac-conf', 'Micro', '', '2021-06-07', '00:03:31', 'Abdou Majeed ALIDOU', '::1', 0),
(309, 'Cons-01-salle-conf', '', '', '2021-06-07', '00:03:40', 'Abdou Majeed ALIDOU', '::1', 0),
(310, 'Enr-01-salle-conf', 'Xtra', '', '2021-06-07', '00:04:19', 'Abdou Majeed ALIDOU', '::1', 0),
(311, 'Cons-01-carac-conf', '', '', '2021-06-07', '00:05:17', 'Abdou Majeed ALIDOU', '::1', 0),
(312, 'Cons-01-service-conf', '', '', '2021-06-07', '00:05:26', 'Abdou Majeed ALIDOU', '::1', 0),
(313, 'Cons-01-carac-conf', '', '', '2021-06-07', '00:05:33', 'Abdou Majeed ALIDOU', '::1', 0),
(314, 'Cons-01-service-conf', '', '', '2021-06-07', '00:05:50', 'Abdou Majeed ALIDOU', '::1', 0),
(315, 'Modif-01-service-conf', 'Sonorisation', '', '2021-06-07', '00:06:36', 'Abdou Majeed ALIDOU', '::1', 0),
(316, 'Modif-01-service-conf', 'Décoration', '', '2021-06-07', '00:06:50', 'Abdou Majeed ALIDOU', '::1', 0),
(317, 'Cons-01-carac-conf', '', '', '2021-06-07', '00:06:56', 'Abdou Majeed ALIDOU', '::1', 0),
(318, 'Cons-01-salle-conf', '', '', '2021-06-07', '00:07:24', 'Abdou Majeed ALIDOU', '::1', 0),
(319, 'Cons-01-carac-conf', '', '', '2021-06-07', '00:07:56', 'Abdou Majeed ALIDOU', '::1', 0),
(320, 'Enr-01-carac-conf', 'Podium', '', '2021-06-07', '00:08:05', 'Abdou Majeed ALIDOU', '::1', 0),
(321, 'Cons-01-salle-conf', '', '', '2021-06-07', '00:08:07', 'Abdou Majeed ALIDOU', '::1', 0),
(322, 'Enr-01-salle-conf', 'Xtra', '', '2021-06-07', '00:09:40', 'Abdou Majeed ALIDOU', '::1', 0),
(323, 'Cons-01-salle-conf', '', '', '2021-06-07', '00:09:49', 'Abdou Majeed ALIDOU', '::1', 0),
(324, 'Cons-01-salle-conf', '', '', '2021-06-07', '07:09:27', 'Abdou Majeed ALIDOU', '::1', 0),
(325, 'Cons-01-salle-conf', '', '', '2021-06-07', '07:10:14', 'Abdou Majeed ALIDOU', '::1', 0),
(326, 'Cons-01-salle-conf', '', '', '2021-06-07', '07:27:21', 'Abdou Majeed ALIDOU', '::1', 0),
(327, 'Cons-01-salle-conf', '', '', '2021-06-07', '07:27:42', 'Abdou Majeed ALIDOU', '::1', 0),
(328, 'Cons-01-salle-conf', '', '', '2021-06-07', '07:30:10', 'Abdou Majeed ALIDOU', '::1', 0),
(329, 'Cons-01-salle-conf', '', '', '2021-06-07', '07:32:08', 'Abdou Majeed ALIDOU', '::1', 0),
(330, 'Cons-01-salle-conf', '', '', '2021-06-07', '07:33:02', 'Abdou Majeed ALIDOU', '::1', 0),
(331, 'Cons-01-salle-conf', '', '', '2021-06-07', '07:33:32', 'Abdou Majeed ALIDOU', '::1', 0),
(332, 'Cons-01-salle-conf', '', '', '2021-06-07', '07:34:00', 'Abdou Majeed ALIDOU', '::1', 0),
(333, 'Enr-01-salle-conf', 'futur', '', '2021-06-07', '07:36:45', 'Abdou Majeed ALIDOU', '::1', 0),
(334, 'Enr-01-salle-conf', 'a', '', '2021-06-07', '07:38:19', 'Abdou Majeed ALIDOU', '::1', 0),
(335, 'Cons-01-salle-conf', '', '', '2021-06-07', '07:42:13', 'Abdou Majeed ALIDOU', '::1', 0),
(336, 'Cons-01-salle-conf', '', '', '2021-06-07', '08:09:30', 'Abdou Majeed ALIDOU', '::1', 0),
(337, 'Cons-01-salle-conf', '', '', '2021-06-07', '08:14:02', 'Abdou Majeed ALIDOU', '::1', 0),
(338, 'Cons-01-salle-conf', '', '', '2021-06-07', '08:28:00', 'Abdou Majeed ALIDOU', '::1', 0),
(339, 'Enr-01-salle-conf', 'n', '', '2021-06-07', '08:28:35', 'Abdou Majeed ALIDOU', '::1', 0),
(340, 'Cons-01-salle-conf', '', '', '2021-06-07', '08:33:07', 'Abdou Majeed ALIDOU', '::1', 0),
(341, 'Info-01-salle-conf', 'a', '', '2021-06-07', '08:33:10', 'Abdou Majeed ALIDOU', '::1', 0),
(342, 'Cons-01-salle-conf', '', '', '2021-06-07', '08:37:12', 'Abdou Majeed ALIDOU', '::1', 0),
(343, 'Cons-01-salle-conf', '', '', '2021-06-07', '08:38:24', 'Abdou Majeed ALIDOU', '::1', 0),
(344, 'Cons-01-salle-conf', '', '', '2021-06-07', '08:40:17', 'Abdou Majeed ALIDOU', '::1', 0),
(345, 'Cons-01-dashboard', '', '', '2021-06-07', '09:48:17', 'Abdou Majeed ALIDOU', '::1', 0),
(346, 'Deconnex-01', '', '', '2021-06-07', '09:48:26', 'Abdou Majeed ALIDOU', '::1', 0),
(347, 'Connex-01', '', '', '2021-06-07', '09:48:33', 'Abdou Majeed ALIDOU', '::1', 0),
(348, 'Cons-01-dashboard', '', '', '2021-06-07', '09:48:33', 'Abdou Majeed ALIDOU', '::1', 0),
(349, 'Cons-01-type-plat', '', '', '2021-06-07', '09:48:42', 'Abdou Majeed ALIDOU', '::1', 0),
(350, 'Cons-01-type-plat', '', '', '2021-06-07', '09:53:58', 'Abdou Majeed ALIDOU', '::1', 0),
(351, 'Enr-01-type-plat', 't', '', '2021-06-07', '09:54:11', 'Abdou Majeed ALIDOU', '::1', 0),
(352, 'Exp-01-type-plat', 'PDF', '', '2021-06-07', '09:54:17', 'Abdou Majeed ALIDOU', '::1', 0),
(353, 'Cons-01-type-plat', '', '', '2021-06-07', '09:54:23', 'Abdou Majeed ALIDOU', '::1', 0),
(354, 'Modif-01-type-plat', 't', '', '2021-06-07', '09:54:42', 'Abdou Majeed ALIDOU', '::1', 0),
(355, 'Chg-01-type-plat', 't,Inactif', '', '2021-06-07', '09:54:46', 'Abdou Majeed ALIDOU', '::1', 0),
(356, 'Cons-01-log', '', '', '2021-06-07', '09:54:57', 'Abdou Majeed ALIDOU', '::1', 0),
(357, 'Cons-01-type-plat', '', '', '2021-06-07', '09:55:15', 'Abdou Majeed ALIDOU', '::1', 0),
(358, 'Info-01-type-plat', 't', '', '2021-06-07', '09:55:21', 'Abdou Majeed ALIDOU', '::1', 0),
(359, 'Cons-01-boisson', '', '', '2021-06-07', '09:55:52', 'Abdou Majeed ALIDOU', '::1', 0),
(360, 'Cons-01-boisson', '', '', '2021-06-07', '09:57:20', 'Abdou Majeed ALIDOU', '::1', 0),
(361, 'Exp-01-boisson', 'PDF', '', '2021-06-07', '09:57:26', 'Abdou Majeed ALIDOU', '::1', 0),
(362, 'Cons-01-boisson', '', '', '2021-06-07', '09:57:29', 'Abdou Majeed ALIDOU', '::1', 0),
(363, 'Enr-01-boisson', 'the', '', '2021-06-07', '09:57:44', 'Abdou Majeed ALIDOU', '::1', 0),
(364, 'Info-01-boisson', 'the', '', '2021-06-07', '09:57:50', 'Abdou Majeed ALIDOU', '::1', 0),
(365, 'Modif-01-boisson', 'the', '', '2021-06-07', '09:58:00', 'Abdou Majeed ALIDOU', '::1', 0),
(366, 'Chg-01-boisson', 'no,Actif', '', '2021-06-07', '09:58:10', 'Abdou Majeed ALIDOU', '::1', 0),
(367, 'Chg-01-boisson', 'the,Inactif', '', '2021-06-07', '09:58:14', 'Abdou Majeed ALIDOU', '::1', 0),
(368, 'Cons-01-voiture', '', '', '2021-06-07', '09:58:36', 'Abdou Majeed ALIDOU', '::1', 0),
(369, 'Exp-01-voiture', 'PDF', '', '2021-06-07', '09:58:44', 'Abdou Majeed ALIDOU', '::1', 0),
(370, 'Cons-01-voiture', '', '', '2021-06-07', '09:58:46', 'Abdou Majeed ALIDOU', '::1', 0),
(371, 'Modif-01-voiture', 'Toyota Yaris', '', '2021-06-07', '09:59:20', 'Abdou Majeed ALIDOU', '::1', 0),
(372, 'Modif-01-voiture', 'Toyota Yaris', '', '2021-06-07', '09:59:27', 'Abdou Majeed ALIDOU', '::1', 0),
(373, 'Enr-01-voiture', 'zion', '', '2021-06-07', '10:00:43', 'Abdou Majeed ALIDOU', '::1', 0),
(374, 'Info-01-voiture', 'zion', '', '2021-06-07', '10:00:48', 'Abdou Majeed ALIDOU', '::1', 0),
(375, 'Modif-01-voiture', 'zion', '', '2021-06-07', '10:01:38', 'Abdou Majeed ALIDOU', '::1', 0),
(376, 'Exp-01-voiture', 'PDF', '', '2021-06-07', '10:02:04', 'Abdou Majeed ALIDOU', '::1', 0),
(377, 'Cons-01-voiture', '', '', '2021-06-07', '10:02:08', 'Abdou Majeed ALIDOU', '::1', 0),
(378, 'Cons-01-marque-voiture', '', '', '2021-06-07', '10:02:11', 'Abdou Majeed ALIDOU', '::1', 0),
(379, 'Chg-01-marque-voiture', 'volkswagen,Inactif', '', '2021-06-07', '10:02:17', 'Abdou Majeed ALIDOU', '::1', 0),
(380, 'Exp-01-marque-voiture', 'PDF', '', '2021-06-07', '10:02:20', 'Abdou Majeed ALIDOU', '::1', 0),
(381, 'Cons-01-marque-voiture', '', '', '2021-06-07', '10:02:25', 'Abdou Majeed ALIDOU', '::1', 0),
(382, 'Enr-01-marque-voiture', 'qwe', '', '2021-06-07', '10:02:36', 'Abdou Majeed ALIDOU', '::1', 0),
(383, 'Cons-01-plat', '', '', '2021-06-07', '10:02:52', 'Abdou Majeed ALIDOU', '::1', 0),
(384, 'Chg-01-plat', 'youki,Inactif', '', '2021-06-07', '10:03:01', 'Abdou Majeed ALIDOU', '::1', 0),
(385, 'Modif-01-plat', 'youki', '', '2021-06-07', '10:03:15', 'Abdou Majeed ALIDOU', '::1', 0),
(386, 'Cons-01-article-restau', '', '', '2021-06-07', '10:03:19', 'Abdou Majeed ALIDOU', '::1', 0),
(387, 'Cons-01-plat', '', '', '2021-06-07', '10:03:21', 'Abdou Majeed ALIDOU', '::1', 0),
(388, 'Exp-01-plat', 'PDF', '', '2021-06-07', '10:03:23', 'Abdou Majeed ALIDOU', '::1', 0),
(389, 'Cons-01-plat', '', '', '2021-06-07', '10:03:27', 'Abdou Majeed ALIDOU', '::1', 0),
(390, 'Cons-01-article-restau', '', '', '2021-06-07', '10:03:30', 'Abdou Majeed ALIDOU', '::1', 0),
(391, 'Cons-01-plat', '', '', '2021-06-07', '10:03:42', 'Abdou Majeed ALIDOU', '::1', 0),
(392, 'Enr-01-plat', 'b', '', '2021-06-07', '10:03:56', 'Abdou Majeed ALIDOU', '::1', 0),
(393, 'Exp-01-plat', 'PDF', '', '2021-06-07', '10:04:04', 'Abdou Majeed ALIDOU', '::1', 0),
(394, 'Cons-01-plat', '', '', '2021-06-07', '10:04:16', 'Abdou Majeed ALIDOU', '::1', 0),
(395, 'Exp-01-plat', 'PDF', '', '2021-06-07', '10:04:27', 'Abdou Majeed ALIDOU', '::1', 0),
(396, 'Cons-01-plat', '', '', '2021-06-07', '10:04:39', 'Abdou Majeed ALIDOU', '::1', 0),
(397, 'Exp-01-plat', 'PDF', '', '2021-06-07', '10:04:43', 'Abdou Majeed ALIDOU', '::1', 0),
(398, 'Cons-01-plat', '', '', '2021-06-07', '10:05:06', 'Abdou Majeed ALIDOU', '::1', 0),
(399, 'Cons-01-log', '', '', '2021-06-07', '10:06:27', 'Abdou Majeed ALIDOU', '::1', 0),
(400, 'Cons-01-dashboard', '', '', '2021-06-07', '10:06:57', 'Abdou Majeed ALIDOU', '::1', 0),
(401, 'Cons-01-service-conf', '', '', '2021-06-07', '10:20:32', 'Abdou Majeed ALIDOU', '::1', 0),
(402, 'Chg-01-service-conf', 'Décoration,Inactif', '', '2021-06-07', '10:20:42', 'Abdou Majeed ALIDOU', '::1', 0),
(403, 'Cons-01-salle-conf', '', '', '2021-06-07', '10:56:39', 'Abdou Majeed ALIDOU', '::1', 0),
(404, 'Chg-01-salle-conf', 'a,Inactif', '', '2021-06-07', '10:57:17', 'Abdou Majeed ALIDOU', '::1', 0),
(405, 'Cons-01-carac-conf', '', '', '2021-06-07', '11:06:52', 'Abdou Majeed ALIDOU', '::1', 0),
(406, 'Cons-01-service-conf', '', '', '2021-06-07', '11:07:04', 'Abdou Majeed ALIDOU', '::1', 0),
(407, 'Cons-01-carac-conf', '', '', '2021-06-07', '11:07:09', 'Abdou Majeed ALIDOU', '::1', 0),
(408, 'Cons-01-salle-conf', '', '', '2021-06-07', '11:07:14', 'Abdou Majeed ALIDOU', '::1', 0),
(409, 'Cons-01-salle-conf', '', '', '2021-06-07', '11:07:18', 'Abdou Majeed ALIDOU', '::1', 0),
(410, 'Cons-01-marque-voiture', '', '', '2021-06-07', '11:45:42', 'Abdou Majeed ALIDOU', '::1', 0),
(411, 'Cons-01-voiture', '', '', '2021-06-07', '11:45:45', 'Abdou Majeed ALIDOU', '::1', 0),
(412, 'Cons-01-marque-voiture', '', '', '2021-06-07', '11:45:51', 'Abdou Majeed ALIDOU', '::1', 0),
(413, 'Cons-01-voiture', '', '', '2021-06-07', '11:45:53', 'Abdou Majeed ALIDOU', '::1', 0),
(414, 'Cons-01-voiture', '', '', '2021-06-07', '11:46:58', 'Abdou Majeed ALIDOU', '::1', 0),
(415, 'Deconnex-01', '', '', '2021-06-07', '11:47:10', 'Abdou Majeed ALIDOU', '::1', 0),
(416, 'Connex-01', '', '', '2021-06-07', '11:47:15', 'Abdou Majeed ALIDOU', '::1', 0),
(417, 'Cons-01-dashboard', '', '', '2021-06-07', '11:47:15', 'Abdou Majeed ALIDOU', '::1', 0),
(418, 'Cons-01-voiture', '', '', '2021-06-07', '11:47:18', 'Abdou Majeed ALIDOU', '::1', 0),
(419, 'Exp-01-voiture', 'PDF', '', '2021-06-07', '11:47:27', 'Abdou Majeed ALIDOU', '::1', 0),
(420, 'Cons-01-voiture', '', '', '2021-06-07', '11:47:48', 'Abdou Majeed ALIDOU', '::1', 0),
(421, 'Cons-01-voiture', '', '', '2021-06-07', '11:50:08', 'Abdou Majeed ALIDOU', '::1', 0),
(422, 'Chg-01-voiture', 'Toyota Yaris,Inactif', '', '2021-06-07', '11:50:14', 'Abdou Majeed ALIDOU', '::1', 0),
(423, 'Enr-01-voiture', 'rr', '', '2021-06-07', '11:50:39', 'Abdou Majeed ALIDOU', '::1', 0),
(424, 'Modif-01-voiture', 'rrf', '', '2021-06-07', '11:51:00', 'Abdou Majeed ALIDOU', '::1', 0),
(425, 'Info-01-voiture', 'rrf', '', '2021-06-07', '11:51:06', 'Abdou Majeed ALIDOU', '::1', 0),
(426, 'Exp-01-voiture', 'PDF', '', '2021-06-07', '11:51:10', 'Abdou Majeed ALIDOU', '::1', 0),
(427, 'Cons-01-voiture', '', '', '2021-06-07', '11:51:16', 'Abdou Majeed ALIDOU', '::1', 0),
(428, 'Exp-01-voiture', 'PDF', '', '2021-06-07', '11:56:21', 'Abdou Majeed ALIDOU', '::1', 0),
(429, 'Cons-01-voiture', '', '', '2021-06-07', '11:56:26', 'Abdou Majeed ALIDOU', '::1', 0),
(430, 'Cons-01-salle-conf', '', '', '2021-06-07', '12:05:41', 'Abdou Majeed ALIDOU', '::1', 0),
(431, 'Cons-01-salle-conf', '', '', '2021-06-07', '12:06:08', 'Abdou Majeed ALIDOU', '::1', 0),
(432, 'Cons-01-salle-conf', '', '', '2021-06-07', '12:07:38', 'Abdou Majeed ALIDOU', '::1', 0),
(433, 'Cons-01-salle-conf', '', '', '2021-06-07', '12:08:18', 'Abdou Majeed ALIDOU', '::1', 0),
(434, 'Cons-01-salle-conf', '', '', '2021-06-07', '12:12:27', 'Abdou Majeed ALIDOU', '::1', 0),
(435, 'Cons-01-salle-conf', '', '', '2021-06-07', '12:29:59', 'Abdou Majeed ALIDOU', '::1', 0),
(436, 'Cons-01-carac-conf', '', '', '2021-06-07', '12:31:55', 'Abdou Majeed ALIDOU', '::1', 0),
(437, 'Cons-01-salle-conf', '', '', '2021-06-07', '12:32:11', 'Abdou Majeed ALIDOU', '::1', 0),
(438, 'Cons-01-salle-conf', '', '', '2021-06-07', '12:55:31', 'Abdou Majeed ALIDOU', '::1', 0),
(439, 'Info-01-salle-conf', 'a', '', '2021-06-07', '13:12:11', 'Abdou Majeed ALIDOU', '::1', 0),
(440, 'Info-01-salle-conf', 'a', '', '2021-06-07', '13:12:14', 'Abdou Majeed ALIDOU', '::1', 0),
(441, 'Cons-01-salle-conf', '', '', '2021-06-07', '13:12:16', 'Abdou Majeed ALIDOU', '::1', 0),
(442, 'Info-01-salle-conf', 'a', '', '2021-06-07', '13:12:21', 'Abdou Majeed ALIDOU', '::1', 0),
(443, 'Info-01-salle-conf', 'futur', '', '2021-06-07', '13:12:24', 'Abdou Majeed ALIDOU', '::1', 0),
(444, 'Cons-01-salle-conf', '', '', '2021-06-07', '13:12:56', 'Abdou Majeed ALIDOU', '::1', 0),
(445, 'Info-01-salle-conf', 'a', '', '2021-06-07', '13:12:59', 'Abdou Majeed ALIDOU', '::1', 0),
(446, 'Info-01-salle-conf', 'futur', '', '2021-06-07', '13:13:16', 'Abdou Majeed ALIDOU', '::1', 0),
(447, 'Info-01-salle-conf', 'a', '', '2021-06-07', '13:17:35', 'Abdou Majeed ALIDOU', '::1', 0),
(448, 'Cons-01-salle-conf', '', '', '2021-06-07', '13:18:03', 'Abdou Majeed ALIDOU', '::1', 0),
(449, 'Enr-01-salle-conf', 'qqww', '', '2021-06-07', '13:22:09', 'Abdou Majeed ALIDOU', '::1', 0),
(450, 'Info-01-salle-conf', 'Large', '', '2021-06-07', '13:22:48', 'Abdou Majeed ALIDOU', '::1', 0),
(451, 'Cons-01-carac-conf', '', '', '2021-06-07', '13:24:13', 'Abdou Majeed ALIDOU', '::1', 0),
(452, 'Enr-01-carac-conf', 'bn', '', '2021-06-07', '13:24:25', 'Abdou Majeed ALIDOU', '::1', 0),
(453, 'Info-01-carac-conf', 'bn', '', '2021-06-07', '13:24:30', 'Abdou Majeed ALIDOU', '::1', 0),
(454, 'Modif-01-carac-conf', 'bn', '', '2021-06-07', '13:24:40', 'Abdou Majeed ALIDOU', '::1', 0),
(455, 'Cons-01-service-conf', '', '', '2021-06-07', '13:25:03', 'Abdou Majeed ALIDOU', '::1', 0),
(456, 'Cons-01-reserv-dispo', '', '', '2021-06-07', '13:31:34', 'Abdou Majeed ALIDOU', '::1', 0),
(457, 'Cons-01-salle-conf', '', '', '2021-06-07', '13:34:44', 'Abdou Majeed ALIDOU', '::1', 0),
(458, 'Cons-01-marque-voiture', '', '', '2021-06-07', '14:09:44', 'Abdou Majeed ALIDOU', '::1', 0),
(459, 'Cons-01-service-conf', '', '', '2021-06-07', '14:16:26', 'Abdou Majeed ALIDOU', '::1', 0),
(460, 'Cons-01-carac-conf', '', '', '2021-06-07', '14:16:39', 'Abdou Majeed ALIDOU', '::1', 0),
(461, 'Cons-01-salle-conf', '', '', '2021-06-07', '14:17:12', 'Abdou Majeed ALIDOU', '::1', 0),
(462, 'Info-01-salle-conf', 'a', '', '2021-06-07', '14:17:48', 'Abdou Majeed ALIDOU', '::1', 0),
(463, 'Deconnex-01', '', '', '2021-06-07', '14:49:14', 'Abdou Majeed ALIDOU', '::1', 0),
(464, 'Connex-01', '', '', '2021-06-07', '14:49:20', 'Abdou Majeed ALIDOU', '::1', 0),
(465, 'Cons-01-dashboard', '', '', '2021-06-07', '14:49:20', 'Abdou Majeed ALIDOU', '::1', 0),
(466, 'Cons-01-type-chambre', '', '', '2021-06-07', '14:49:33', 'Abdou Majeed ALIDOU', '::1', 0),
(467, 'Cons-01-location-conf', '', '', '2021-06-07', '14:58:10', 'Abdou Majeed ALIDOU', '::1', 0),
(468, 'Cons-01-reserv-dispo', '', '', '2021-06-07', '14:58:42', 'Abdou Majeed ALIDOU', '::1', 0),
(469, 'Cons-01-reserv-dispo', '', '', '2021-06-07', '15:15:51', 'Abdou Majeed ALIDOU', '::1', 0),
(470, 'Cons-01-location-conf', '', '', '2021-06-07', '15:15:59', 'Abdou Majeed ALIDOU', '::1', 0),
(471, 'Cons-01-location-conf', '', '', '2021-06-07', '15:16:36', 'Abdou Majeed ALIDOU', '::1', 0),
(472, 'Cons-01-location-conf', '', '', '2021-06-07', '15:18:36', 'Abdou Majeed ALIDOU', '::1', 0),
(473, 'Connex-01', '', '', '2021-06-08', '08:55:18', 'Abdou Majeed ALIDOU', '::1', 0),
(474, 'Cons-01-dashboard', '', '', '2021-06-08', '08:55:19', 'Abdou Majeed ALIDOU', '::1', 0),
(475, 'Cons-01-salle-conf', '', '', '2021-06-08', '08:55:23', 'Abdou Majeed ALIDOU', '::1', 0),
(476, 'Cons-01-location-conf', '', '', '2021-06-08', '09:04:58', 'Abdou Majeed ALIDOU', '::1', 0),
(477, 'Cons-01-location-conf', '', '', '2021-06-08', '09:05:37', 'Abdou Majeed ALIDOU', '::1', 0),
(478, 'Cons-01-location-conf', '', '', '2021-06-08', '09:05:50', 'Abdou Majeed ALIDOU', '::1', 0),
(479, 'Cons-01-location-conf', '', '', '2021-06-08', '09:08:53', 'Abdou Majeed ALIDOU', '::1', 0),
(480, 'Cons-01-location-conf', '', '', '2021-06-08', '09:09:23', 'Abdou Majeed ALIDOU', '::1', 0),
(481, 'Cons-01-location-conf', '', '', '2021-06-08', '09:11:46', 'Abdou Majeed ALIDOU', '::1', 0),
(482, 'Cons-01-location-conf', '', '', '2021-06-08', '09:46:51', 'Abdou Majeed ALIDOU', '::1', 0),
(483, 'Cons-01-location-conf', '', '', '2021-06-08', '09:47:11', 'Abdou Majeed ALIDOU', '::1', 0),
(484, 'Cons-01-location-conf', '', '', '2021-06-08', '09:47:33', 'Abdou Majeed ALIDOU', '::1', 0),
(485, 'Cons-01-location-conf', '', '', '2021-06-08', '09:47:43', 'Abdou Majeed ALIDOU', '::1', 0),
(486, 'Cons-01-location-conf', '', '', '2021-06-08', '09:49:27', 'Abdou Majeed ALIDOU', '::1', 0),
(487, 'Cons-01-location-conf', '', '', '2021-06-08', '09:56:04', 'Abdou Majeed ALIDOU', '::1', 0),
(488, 'Cons-01-location-conf', '', '', '2021-06-08', '09:56:17', 'Abdou Majeed ALIDOU', '::1', 0),
(489, 'Cons-01-location-conf', '', '', '2021-06-08', '10:01:40', 'Abdou Majeed ALIDOU', '::1', 0),
(490, 'Cons-01-location-conf', '', '', '2021-06-08', '10:02:20', 'Abdou Majeed ALIDOU', '::1', 0),
(491, 'Cons-01-location-conf', '', '', '2021-06-08', '10:04:23', 'Abdou Majeed ALIDOU', '::1', 0),
(492, 'Cons-01-location-conf', '', '', '2021-06-08', '10:06:57', 'Abdou Majeed ALIDOU', '::1', 0),
(493, 'Cons-01-location-conf', '', '', '2021-06-08', '10:08:32', 'Abdou Majeed ALIDOU', '::1', 0),
(494, 'Info-01-type-chambre', '', '', '2021-06-08', '10:08:46', 'Abdou Majeed ALIDOU', '::1', 0),
(495, 'Cons-01-location-conf', '', '', '2021-06-08', '10:08:48', 'Abdou Majeed ALIDOU', '::1', 0),
(496, 'Cons-01-location-conf', '', '', '2021-06-08', '10:11:04', 'Abdou Majeed ALIDOU', '::1', 0),
(497, 'Cons-01-location-conf', '', '', '2021-06-08', '10:12:40', 'Abdou Majeed ALIDOU', '::1', 0),
(498, 'Cons-01-location-conf', '', '', '2021-06-08', '10:18:38', 'Abdou Majeed ALIDOU', '::1', 0),
(499, 'Cons-01-location-conf', '', '', '2021-06-08', '10:22:01', 'Abdou Majeed ALIDOU', '::1', 0),
(500, 'Cons-01-location-conf', '', '', '2021-06-08', '10:22:03', 'Abdou Majeed ALIDOU', '::1', 0),
(501, 'Cons-01-location-conf', '', '', '2021-06-08', '11:48:06', 'Abdou Majeed ALIDOU', '::1', 0),
(502, 'Cons-01-location-conf', '', '', '2021-06-08', '11:50:44', 'Abdou Majeed ALIDOU', '::1', 0),
(503, 'Exp-01-location-conf', 'PDF', '', '2021-06-08', '12:03:52', 'Abdou Majeed ALIDOU', '::1', 0),
(504, 'Exp-01-location-conf', 'PDF', '', '2021-06-08', '12:05:00', 'Abdou Majeed ALIDOU', '::1', 0),
(505, 'Cons-01-location-conf', '', '', '2021-06-08', '12:05:42', 'Abdou Majeed ALIDOU', '::1', 0),
(506, 'Exp-01-location-conf', 'Word', '', '2021-06-08', '12:05:50', 'Abdou Majeed ALIDOU', '::1', 0),
(507, 'Exp-01-location-conf', 'Excel', '', '2021-06-08', '12:05:51', 'Abdou Majeed ALIDOU', '::1', 0),
(508, 'Chg-01-type-chambre', ',Inactif', '', '2021-06-08', '12:13:48', 'Abdou Majeed ALIDOU', '::1', 0),
(509, 'Cons-01-location-conf', '', '', '2021-06-08', '12:14:07', 'Abdou Majeed ALIDOU', '::1', 0),
(510, 'Cons-01-location-conf', '', '', '2021-06-08', '12:21:11', 'Abdou Majeed ALIDOU', '::1', 0),
(511, 'Cons-01-location-conf', '', '', '2021-06-08', '12:23:19', 'Abdou Majeed ALIDOU', '::1', 0),
(512, 'Cons-01-location-conf', '', '', '2021-06-08', '12:59:12', 'Abdou Majeed ALIDOU', '::1', 0),
(513, 'Cons-01-location-conf', '', '', '2021-06-08', '13:05:42', 'Abdou Majeed ALIDOU', '::1', 0),
(514, 'Cons-01-location-conf', '', '', '2021-06-08', '13:07:26', 'Abdou Majeed ALIDOU', '::1', 0),
(515, 'Exp-01-location-conf', 'PDF', '', '2021-06-08', '13:07:35', 'Abdou Majeed ALIDOU', '::1', 0),
(516, 'Exp-01-location-conf', 'PDF', '', '2021-06-08', '13:09:07', 'Abdou Majeed ALIDOU', '::1', 0),
(517, 'Cons-01-location-conf', '', '', '2021-06-08', '13:09:12', 'Abdou Majeed ALIDOU', '::1', 0),
(518, 'Chg-01-location-conf', '3,Inactif', '', '2021-06-08', '13:47:57', 'Abdou Majeed ALIDOU', '::1', 0),
(519, 'Chg-01-location-conf', '2,Inactif', '', '2021-06-08', '13:48:05', 'Abdou Majeed ALIDOU', '::1', 0),
(520, 'Cons-01-location-conf', '', '', '2021-06-08', '13:49:11', 'Abdou Majeed ALIDOU', '::1', 0),
(521, 'Cons-01-reserv-dispo', '', '', '2021-06-08', '13:58:50', 'Abdou Majeed ALIDOU', '::1', 0),
(522, 'Info-01-reserv-dispo', '101', '', '2021-06-08', '13:58:53', 'Abdou Majeed ALIDOU', '::1', 0),
(523, 'Cons-01-reserv-attente', '', '', '2021-06-08', '13:59:07', 'Abdou Majeed ALIDOU', '::1', 0),
(524, 'Cons-01-reserv-dispo', '', '', '2021-06-08', '13:59:13', 'Abdou Majeed ALIDOU', '::1', 0),
(525, 'Cons-01-salle-conf', '', '', '2021-06-08', '13:59:19', 'Abdou Majeed ALIDOU', '::1', 0);
INSERT INTO `addlog_table` (`id_addlog_table`, `CodeEvenement`, `ParametresEvenement`, `MessageEvenement`, `DateEvenement`, `HeureEvenement`, `PseudoUtilisateur`, `AdresseIP`, `IdCompte`) VALUES
(526, 'Info-01-salle-conf', 'a', '', '2021-06-08', '13:59:23', 'Abdou Majeed ALIDOU', '::1', 0),
(527, 'Cons-01-location-conf', '', '', '2021-06-08', '14:00:20', 'Abdou Majeed ALIDOU', '::1', 0),
(528, 'Cons-01-salle-conf', '', '', '2021-06-08', '14:04:22', 'Abdou Majeed ALIDOU', '::1', 0),
(529, 'Cons-01-reserv-dispo', '', '', '2021-06-08', '14:04:26', 'Abdou Majeed ALIDOU', '::1', 0),
(530, 'Info-01-reserv-dispo', '101', '', '2021-06-08', '14:04:30', 'Abdou Majeed ALIDOU', '::1', 0),
(531, 'Cons-01-location-conf', '', '', '2021-06-08', '14:05:53', 'Abdou Majeed ALIDOU', '::1', 0),
(532, 'Info-01-reserv-dispo', '101', '', '2021-06-08', '14:06:09', 'Abdou Majeed ALIDOU', '::1', 0),
(533, 'Info-01-reserv-dispo', '101', '', '2021-06-08', '14:07:35', 'Abdou Majeed ALIDOU', '::1', 0),
(534, 'Cons-01-log', '', '', '2021-06-08', '15:19:24', 'Abdou Majeed ALIDOU', '::1', 0),
(535, 'Cons-01-voiture', '', '', '2021-06-08', '15:19:43', 'Abdou Majeed ALIDOU', '::1', 0),
(536, 'Chg-01-voiture', 'Toyota Yaris,Actif', '', '2021-06-08', '15:20:04', 'Abdou Majeed ALIDOU', '::1', 0),
(537, 'Cons-01-salle-conf', '', '', '2021-06-08', '15:20:48', 'Abdou Majeed ALIDOU', '::1', 0),
(538, 'Cons-01-salle-conf', '', '', '2021-06-08', '15:20:52', 'Abdou Majeed ALIDOU', '::1', 0),
(539, 'Cons-01-location-conf', '', '', '2021-06-08', '15:20:58', 'Abdou Majeed ALIDOU', '::1', 0),
(540, 'Chg-01-location-conf', '3,Inactif', '', '2021-06-08', '15:21:07', 'Abdou Majeed ALIDOU', '::1', 0),
(541, 'Chg-01-location-conf', '2,Inactif', '', '2021-06-08', '15:21:29', 'Abdou Majeed ALIDOU', '::1', 0),
(542, 'Cons-01-location-conf', '', '', '2021-06-08', '15:21:43', 'Abdou Majeed ALIDOU', '::1', 0),
(543, 'Cons-01-location-conf', '', '', '2021-06-08', '15:22:40', 'Abdou Majeed ALIDOU', '::1', 0),
(544, 'Chg-01-location-conf', '3,Inactif', '', '2021-06-08', '15:22:54', 'Abdou Majeed ALIDOU', '::1', 0),
(545, 'Deconnex-01', '', '', '2021-06-09', '12:19:32', 'Abdou Majeed ALIDOU', '::1', 0),
(546, 'Connex-01', '', '', '2021-06-09', '12:19:57', 'Abdou Majeed ALIDOU', '::1', 0),
(547, 'Cons-01-dashboard', '', '', '2021-06-09', '12:19:57', 'Abdou Majeed ALIDOU', '::1', 0),
(548, 'Cons-01-dashboard', '', '', '2021-06-09', '12:22:10', 'Abdou Majeed ALIDOU', '::1', 0),
(549, 'Cons-01-type-chambre', '', '', '2021-06-09', '12:22:21', 'Abdou Majeed ALIDOU', '::1', 0),
(550, 'Cons-01-facture-conf', '', '', '2021-06-09', '12:25:07', 'Abdou Majeed ALIDOU', '::1', 0),
(551, 'Cons-01-facture-conf', '', '', '2021-06-10', '09:19:03', 'Abdou Majeed ALIDOU', '::1', 0),
(552, 'Cons-01-facture-conf', '', '', '2021-06-10', '09:23:05', 'Abdou Majeed ALIDOU', '::1', 0),
(553, 'Cons-01-facture-conf', '', '', '2021-06-10', '09:41:58', 'Abdou Majeed ALIDOU', '::1', 0),
(554, 'Cons-01-facture-conf', '', '', '2021-06-10', '09:42:46', 'Abdou Majeed ALIDOU', '::1', 0),
(555, 'Cons-01-facture-conf', '', '', '2021-06-10', '09:43:31', 'Abdou Majeed ALIDOU', '::1', 0),
(556, 'Cons-01-voiture', '', '', '2021-06-10', '09:44:11', 'Abdou Majeed ALIDOU', '::1', 0),
(557, 'Cons-01-facture-conf', '', '', '2021-06-10', '09:44:15', 'Abdou Majeed ALIDOU', '::1', 0),
(558, 'Cons-01-facture-conf', '', '', '2021-06-10', '09:44:51', 'Abdou Majeed ALIDOU', '::1', 0),
(559, 'Cons-01-facture-conf', '', '', '2021-06-10', '09:45:12', 'Abdou Majeed ALIDOU', '::1', 0),
(560, 'Cons-01-location-conf', '', '', '2021-06-10', '09:45:15', 'Abdou Majeed ALIDOU', '::1', 0),
(561, 'Cons-01-location-conf', '', '', '2021-06-10', '09:45:22', 'Abdou Majeed ALIDOU', '::1', 0),
(562, 'Cons-01-facture-conf', '', '', '2021-06-10', '09:45:28', 'Abdou Majeed ALIDOU', '::1', 0),
(563, 'Cons-01-facture-conf', '', '', '2021-06-10', '09:45:30', 'Abdou Majeed ALIDOU', '::1', 0),
(564, 'Cons-01-location-conf', '', '', '2021-06-10', '09:45:32', 'Abdou Majeed ALIDOU', '::1', 0),
(565, 'Cons-01-location-conf', '', '', '2021-06-10', '09:46:09', 'Abdou Majeed ALIDOU', '::1', 0),
(566, 'Cons-01-location-conf', '', '', '2021-06-10', '09:46:40', 'Abdou Majeed ALIDOU', '::1', 0),
(567, 'Cons-01-location-conf', '', '', '2021-06-10', '09:50:10', 'Abdou Majeed ALIDOU', '::1', 0),
(568, 'Cons-01-location-conf', '', '', '2021-06-10', '09:51:13', 'Abdou Majeed ALIDOU', '::1', 0),
(569, 'Cons-01-location-conf', '', '', '2021-06-10', '09:52:07', 'Abdou Majeed ALIDOU', '::1', 0),
(570, 'Cons-01-facture-conf', '', '', '2021-06-10', '09:52:11', 'Abdou Majeed ALIDOU', '::1', 0),
(571, 'Cons-01-location-conf', '', '', '2021-06-10', '09:52:26', 'Abdou Majeed ALIDOU', '::1', 0),
(572, 'Cons-01-location-conf', '', '', '2021-06-10', '09:56:44', 'Abdou Majeed ALIDOU', '::1', 0),
(573, 'Cons-01-location-conf', '', '', '2021-06-10', '10:13:11', 'Abdou Majeed ALIDOU', '::1', 0),
(574, 'Cons-01-location-conf', '', '', '2021-06-10', '10:22:17', 'Abdou Majeed ALIDOU', '::1', 0),
(575, 'Cons-01-location-conf', '', '', '2021-06-10', '10:37:41', 'Abdou Majeed ALIDOU', '::1', 0),
(576, 'Cons-01-location-conf', '', '', '2021-06-10', '10:46:20', 'Abdou Majeed ALIDOU', '::1', 0),
(577, 'Cons-01-location-conf', '', '', '2021-06-10', '10:48:17', 'Abdou Majeed ALIDOU', '::1', 0),
(578, 'Cons-01-location-conf', '', '', '2021-06-10', '10:48:34', 'Abdou Majeed ALIDOU', '::1', 0),
(579, 'Cons-01-location-conf', '', '', '2021-06-10', '10:54:20', 'Abdou Majeed ALIDOU', '::1', 0),
(580, 'Cons-01-location-conf', '', '', '2021-06-10', '11:01:38', 'Abdou Majeed ALIDOU', '::1', 0),
(581, 'Cons-01-location-conf', '', '', '2021-06-10', '11:03:30', 'Abdou Majeed ALIDOU', '::1', 0),
(582, 'Cons-01-location-conf', '', '', '2021-06-10', '11:04:13', 'Abdou Majeed ALIDOU', '::1', 0),
(583, 'Cons-01-location-conf', '', '', '2021-06-10', '11:08:08', 'Abdou Majeed ALIDOU', '::1', 0),
(584, 'Cons-01-location-conf', '', '', '2021-06-10', '11:09:16', 'Abdou Majeed ALIDOU', '::1', 0),
(585, 'Cons-01-location-conf', '', '', '2021-06-10', '11:10:57', 'Abdou Majeed ALIDOU', '::1', 0),
(586, 'Cons-01-location-conf', '', '', '2021-06-10', '11:28:25', 'Abdou Majeed ALIDOU', '::1', 0),
(587, 'Cons-01-location-conf', '', '', '2021-06-10', '11:29:25', 'Abdou Majeed ALIDOU', '::1', 0),
(588, 'Cons-01-location-conf', '', '', '2021-06-10', '11:29:57', 'Abdou Majeed ALIDOU', '::1', 0),
(589, 'Cons-01-location-conf', '', '', '2021-06-10', '11:31:12', 'Abdou Majeed ALIDOU', '::1', 0),
(590, 'Cons-01-location-conf', '', '', '2021-06-10', '11:31:56', 'Abdou Majeed ALIDOU', '::1', 0),
(591, 'Cons-01-location-conf', '', '', '2021-06-10', '11:33:34', 'Abdou Majeed ALIDOU', '::1', 0),
(592, 'Cons-01-location-conf', '', '', '2021-06-10', '11:35:03', 'Abdou Majeed ALIDOU', '::1', 0),
(593, 'Cons-01-location-conf', '', '', '2021-06-10', '11:36:03', 'Abdou Majeed ALIDOU', '::1', 0),
(594, 'Cons-01-location-conf', '', '', '2021-06-10', '11:36:50', 'Abdou Majeed ALIDOU', '::1', 0),
(595, 'Cons-01-location-conf', '', '', '2021-06-10', '11:39:46', 'Abdou Majeed ALIDOU', '::1', 0),
(596, 'Cons-01-location-conf', '', '', '2021-06-10', '11:40:53', 'Abdou Majeed ALIDOU', '::1', 0),
(597, 'Cons-01-location-conf', '', '', '2021-06-10', '11:41:46', 'Abdou Majeed ALIDOU', '::1', 0),
(598, 'Cons-01-reserv-dispo', '', '', '2021-06-10', '11:42:52', 'Abdou Majeed ALIDOU', '::1', 0),
(599, 'Cons-01-location-conf', '', '', '2021-06-10', '11:45:46', 'Abdou Majeed ALIDOU', '::1', 0),
(600, 'Cons-01-location-conf', '', '', '2021-06-10', '11:46:37', 'Abdou Majeed ALIDOU', '::1', 0),
(601, 'Cons-01-location-conf', '', '', '2021-06-10', '11:48:21', 'Abdou Majeed ALIDOU', '::1', 0),
(602, 'Cons-01-location-conf', '', '', '2021-06-10', '11:49:59', 'Abdou Majeed ALIDOU', '::1', 0),
(603, 'Cons-01-location-conf', '', '', '2021-06-10', '11:51:51', 'Abdou Majeed ALIDOU', '::1', 0),
(604, 'Cons-01-location-conf', '', '', '2021-06-10', '11:53:20', 'Abdou Majeed ALIDOU', '::1', 0),
(605, 'Cons-01-facture-conf', '', '', '2021-06-10', '11:54:06', 'Abdou Majeed ALIDOU', '::1', 0),
(606, 'Cons-01-salle-conf', '', '', '2021-06-10', '11:54:49', 'Abdou Majeed ALIDOU', '::1', 0),
(607, 'Cons-01-location-conf', '', '', '2021-06-10', '11:54:55', 'Abdou Majeed ALIDOU', '::1', 0),
(608, 'Cons-01-location-conf', '', '', '2021-06-10', '12:50:44', 'Abdou Majeed ALIDOU', '::1', 0),
(609, 'Cons-01-location-conf', '', '', '2021-06-10', '12:52:56', 'Abdou Majeed ALIDOU', '::1', 0),
(610, 'Cons-01-location-conf', '', '', '2021-06-10', '12:54:22', 'Abdou Majeed ALIDOU', '::1', 0),
(611, 'Cons-01-location-conf', '', '', '2021-06-10', '12:56:47', 'Abdou Majeed ALIDOU', '::1', 0),
(612, 'Cons-01-location-conf', '', '', '2021-06-10', '13:07:37', 'Abdou Majeed ALIDOU', '::1', 0),
(613, 'Cons-01-facture-conf', '', '', '2021-06-10', '13:10:28', 'Abdou Majeed ALIDOU', '::1', 0),
(614, 'Exp-01-location-conf', 'PDF', '', '2021-06-10', '13:13:05', 'Abdou Majeed ALIDOU', '::1', 0),
(615, 'Exp-01-facture-conf', 'PDF', '', '2021-06-10', '13:13:09', 'Abdou Majeed ALIDOU', '::1', 0),
(616, 'Cons-01-facture-conf', '', '', '2021-06-10', '13:13:12', 'Abdou Majeed ALIDOU', '::1', 0),
(617, 'Cons-01-location-conf', '', '', '2021-06-10', '13:14:04', 'Abdou Majeed ALIDOU', '::1', 0),
(618, 'Cons-01-location-conf', '', '', '2021-06-10', '13:15:35', 'Abdou Majeed ALIDOU', '::1', 0),
(619, 'Cons-01-location-conf', '', '', '2021-06-10', '13:21:02', 'Abdou Majeed ALIDOU', '::1', 0),
(620, 'Cons-01-location-conf', '', '', '2021-06-10', '13:21:12', 'Abdou Majeed ALIDOU', '::1', 0),
(621, 'Cons-01-facture-conf', '', '', '2021-06-10', '13:22:09', 'Abdou Majeed ALIDOU', '::1', 0),
(622, 'Cons-01-location-conf', '', '', '2021-06-10', '13:27:06', 'Abdou Majeed ALIDOU', '::1', 0),
(623, 'Cons-01-location-conf', '', '', '2021-06-10', '13:30:44', 'Abdou Majeed ALIDOU', '::1', 0),
(624, 'Cons-01-facture-conf', '', '', '2021-06-10', '13:33:34', 'Abdou Majeed ALIDOU', '::1', 0),
(625, 'Cons-01-location-conf', '', '', '2021-06-10', '13:33:51', 'Abdou Majeed ALIDOU', '::1', 0),
(626, 'Cons-01-facture-conf', '', '', '2021-06-10', '13:37:41', 'Abdou Majeed ALIDOU', '::1', 0),
(627, 'Cons-01-location-conf', '', '', '2021-06-10', '13:37:45', 'Abdou Majeed ALIDOU', '::1', 0),
(628, 'Cons-01-location-conf', '', '', '2021-06-10', '13:38:26', 'Abdou Majeed ALIDOU', '::1', 0),
(629, 'Cons-01-location-conf', '', '', '2021-06-10', '13:39:14', 'Abdou Majeed ALIDOU', '::1', 0),
(630, 'Cons-01-location-conf', '', '', '2021-06-10', '13:39:52', 'Abdou Majeed ALIDOU', '::1', 0),
(631, 'Cons-01-location-conf', '', '', '2021-06-10', '13:41:07', 'Abdou Majeed ALIDOU', '::1', 0),
(632, 'Cons-01-facture-conf', '', '', '2021-06-10', '13:41:20', 'Abdou Majeed ALIDOU', '::1', 0),
(633, 'Cons-01-location-conf', '', '', '2021-06-10', '13:41:32', 'Abdou Majeed ALIDOU', '::1', 0),
(634, 'Chg-01-location-conf', '4,Inactif', '', '2021-06-10', '13:41:40', 'Abdou Majeed ALIDOU', '::1', 0),
(635, 'Cons-01-location-conf', '', '', '2021-06-10', '13:42:27', 'Abdou Majeed ALIDOU', '::1', 0),
(636, 'Cons-01-location-conf', '', '', '2021-06-10', '13:44:15', 'Abdou Majeed ALIDOU', '::1', 0),
(637, 'Cons-01-location-conf', '', '', '2021-06-10', '14:35:28', 'Abdou Majeed ALIDOU', '::1', 0),
(638, 'Cons-01-location-conf', '', '', '2021-06-10', '14:36:16', 'Abdou Majeed ALIDOU', '::1', 0),
(639, 'Cons-01-location-conf', '', '', '2021-06-10', '14:39:33', 'Abdou Majeed ALIDOU', '::1', 0),
(640, 'Cons-01-location-conf', '', '', '2021-06-10', '14:53:32', 'Abdou Majeed ALIDOU', '::1', 0),
(641, 'Chg-01-location-conf', '6,Inactif', '', '2021-06-10', '15:03:43', 'Abdou Majeed ALIDOU', '::1', 0),
(642, 'Cons-01-facture-conf', '', '', '2021-06-10', '15:06:48', 'Abdou Majeed ALIDOU', '::1', 0),
(643, 'Cons-01-location-conf', '', '', '2021-06-10', '15:09:36', 'Abdou Majeed ALIDOU', '::1', 0),
(644, 'Cons-01-facture-conf', '', '', '2021-06-10', '15:10:03', 'Abdou Majeed ALIDOU', '::1', 0),
(645, 'Cons-01-location-conf', '', '', '2021-06-10', '15:10:30', 'Abdou Majeed ALIDOU', '::1', 0),
(646, 'Cons-01-location-conf', '', '', '2021-06-10', '15:10:42', 'Abdou Majeed ALIDOU', '::1', 0),
(647, 'Cons-01-facture-conf', '', '', '2021-06-10', '15:10:44', 'Abdou Majeed ALIDOU', '::1', 0),
(648, 'Cons-01-location-conf', '', '', '2021-06-10', '15:11:30', 'Abdou Majeed ALIDOU', '::1', 0),
(649, 'Cons-01-facture-conf', '', '', '2021-06-10', '15:12:12', 'Abdou Majeed ALIDOU', '::1', 0),
(650, 'Cons-01-location-conf', '', '', '2021-06-10', '15:12:36', 'Abdou Majeed ALIDOU', '::1', 0),
(651, 'Cons-01-location-conf', '', '', '2021-06-10', '15:18:42', 'Abdou Majeed ALIDOU', '::1', 0),
(652, 'Cons-01-chambre', '', '', '2021-06-10', '15:20:25', 'Abdou Majeed ALIDOU', '::1', 0),
(653, 'Cons-01-chambre', '', '', '2021-06-10', '15:21:26', 'Abdou Majeed ALIDOU', '::1', 0),
(654, 'Cons-01-chambre', '', '', '2021-06-10', '15:21:30', 'Abdou Majeed ALIDOU', '::1', 0),
(655, 'Cons-01-location-conf', '', '', '2021-06-10', '15:21:35', 'Abdou Majeed ALIDOU', '::1', 0),
(656, 'Cons-01-facture-conf', '', '', '2021-06-10', '15:24:19', 'Abdou Majeed ALIDOU', '::1', 0),
(657, 'Cons-01-reserv-dispo', '', '', '2021-06-10', '15:29:26', 'Abdou Majeed ALIDOU', '::1', 0),
(658, 'Cons-01-reserv-attente', '', '', '2021-06-10', '15:29:30', 'Abdou Majeed ALIDOU', '::1', 0),
(659, 'Cons-01-location-conf', '', '', '2021-06-10', '15:31:56', 'Abdou Majeed ALIDOU', '::1', 0),
(660, 'Cons-01-location-conf', '', '', '2021-06-10', '15:32:08', 'Abdou Majeed ALIDOU', '::1', 0),
(661, 'Cons-01-facture-conf', '', '', '2021-06-10', '15:37:04', 'Abdou Majeed ALIDOU', '::1', 0),
(662, 'Cons-01-location-conf', '', '', '2021-06-10', '15:41:40', 'Abdou Majeed ALIDOU', '::1', 0),
(663, 'Cons-01-facture-conf', '', '', '2021-06-10', '15:45:07', 'Abdou Majeed ALIDOU', '::1', 0),
(664, 'Cons-01-location-conf', '', '', '2021-06-10', '15:45:32', 'Abdou Majeed ALIDOU', '::1', 0),
(665, 'Cons-01-facture-conf', '', '', '2021-06-10', '15:45:39', 'Abdou Majeed ALIDOU', '::1', 0),
(666, 'Cons-01-location-conf', '', '', '2021-06-10', '15:46:01', 'Abdou Majeed ALIDOU', '::1', 0),
(667, 'Cons-01-location-conf', '', '', '2021-06-10', '15:51:56', 'Abdou Majeed ALIDOU', '::1', 0),
(668, 'Cons-01-location-conf', '', '', '2021-06-10', '15:52:21', 'Abdou Majeed ALIDOU', '::1', 0),
(669, 'Cons-01-facture-conf', '', '', '2021-06-10', '15:54:54', 'Abdou Majeed ALIDOU', '::1', 0),
(670, 'Cons-01-facture-conf', '', '', '2021-06-10', '16:01:41', 'Abdou Majeed ALIDOU', '::1', 0),
(671, 'Cons-01-location-conf', '', '', '2021-06-10', '16:02:06', 'Abdou Majeed ALIDOU', '::1', 0),
(672, 'Cons-01-location-conf', '', '', '2021-06-10', '16:10:33', 'Abdou Majeed ALIDOU', '::1', 0),
(673, 'Cons-01-facture-conf', '', '', '2021-06-10', '16:10:37', 'Abdou Majeed ALIDOU', '::1', 0),
(674, 'Cons-01-facture-conf', '', '', '2021-06-10', '16:12:34', 'Abdou Majeed ALIDOU', '::1', 0),
(675, 'Cons-01-location-conf', '', '', '2021-06-10', '16:14:09', 'Abdou Majeed ALIDOU', '::1', 0),
(676, 'Cons-01-location-conf', '', '', '2021-06-10', '16:17:44', 'Abdou Majeed ALIDOU', '::1', 0),
(677, 'Cons-01-location-conf', '', '', '2021-06-10', '16:18:36', 'Abdou Majeed ALIDOU', '::1', 0),
(678, 'Cons-01-location-conf', '', '', '2021-06-10', '16:23:16', 'Abdou Majeed ALIDOU', '::1', 0),
(679, 'Cons-01-facture-conf', '', '', '2021-06-10', '16:28:14', 'Abdou Majeed ALIDOU', '::1', 0),
(680, 'Cons-01-facture-conf', '', '', '2021-06-10', '16:33:57', 'Abdou Majeed ALIDOU', '::1', 0),
(681, 'Cons-01-location-conf', '', '', '2021-06-10', '16:34:01', 'Abdou Majeed ALIDOU', '::1', 0),
(682, 'Cons-01-location-conf', '', '', '2021-06-10', '16:34:48', 'Abdou Majeed ALIDOU', '::1', 0),
(683, 'Cons-01-location-conf', '', '', '2021-06-10', '16:36:35', 'Abdou Majeed ALIDOU', '::1', 0),
(684, 'Cons-01-location-conf', '', '', '2021-06-11', '06:26:55', 'Abdou Majeed ALIDOU', '::1', 0),
(685, 'Cons-01-location-conf', '', '', '2021-06-11', '06:27:03', 'Abdou Majeed ALIDOU', '::1', 0),
(686, 'Cons-01-location-conf', '', '', '2021-06-11', '06:27:37', 'Abdou Majeed ALIDOU', '::1', 0),
(687, 'Cons-01-location-conf', '', '', '2021-06-11', '06:29:35', 'Abdou Majeed ALIDOU', '::1', 0),
(688, 'Cons-01-location-conf', '', '', '2021-06-11', '06:30:27', 'Abdou Majeed ALIDOU', '::1', 0),
(689, 'Cons-01-facture-conf', '', '', '2021-06-11', '06:30:38', 'Abdou Majeed ALIDOU', '::1', 0),
(690, 'Cons-01-location-conf', '', '', '2021-06-11', '06:34:09', 'Abdou Majeed ALIDOU', '::1', 0),
(691, 'Cons-01-location-conf', '', '', '2021-06-11', '06:34:44', 'Abdou Majeed ALIDOU', '::1', 0),
(692, 'Cons-01-location-conf', '', '', '2021-06-11', '06:35:38', 'Abdou Majeed ALIDOU', '::1', 0),
(693, 'Cons-01-location-conf', '', '', '2021-06-11', '06:41:46', 'Abdou Majeed ALIDOU', '::1', 0),
(694, 'Cons-01-location-conf', '', '', '2021-06-11', '06:43:35', 'Abdou Majeed ALIDOU', '::1', 0),
(695, 'Cons-01-location-conf', '', '', '2021-06-11', '06:43:52', 'Abdou Majeed ALIDOU', '::1', 0),
(696, 'Cons-01-location-conf', '', '', '2021-06-11', '06:44:39', 'Abdou Majeed ALIDOU', '::1', 0),
(697, 'Cons-01-location-conf', '', '', '2021-06-11', '06:47:29', 'Abdou Majeed ALIDOU', '::1', 0),
(698, 'Cons-01-location-conf', '', '', '2021-06-11', '06:51:53', 'Abdou Majeed ALIDOU', '::1', 0),
(699, 'Cons-01-location-conf', '', '', '2021-06-11', '06:55:45', 'Abdou Majeed ALIDOU', '::1', 0),
(700, 'Cons-01-location-conf', '', '', '2021-06-11', '06:56:58', 'Abdou Majeed ALIDOU', '::1', 0),
(701, 'Cons-01-location-conf', '', '', '2021-06-11', '06:59:59', 'Abdou Majeed ALIDOU', '::1', 0),
(702, 'Cons-01-location-conf', '', '', '2021-06-11', '07:00:17', 'Abdou Majeed ALIDOU', '::1', 0),
(703, 'Cons-01-location-conf', '', '', '2021-06-11', '07:01:29', 'Abdou Majeed ALIDOU', '::1', 0),
(704, 'Cons-01-location-conf', '', '', '2021-06-11', '07:02:22', 'Abdou Majeed ALIDOU', '::1', 0),
(705, 'Cons-01-location-conf', '', '', '2021-06-11', '07:05:47', 'Abdou Majeed ALIDOU', '::1', 0),
(706, 'Cons-01-location-conf', '', '', '2021-06-11', '07:08:32', 'Abdou Majeed ALIDOU', '::1', 0),
(707, 'Cons-01-facture-conf', '', '', '2021-06-11', '07:09:45', 'Abdou Majeed ALIDOU', '::1', 0),
(708, 'Cons-01-facture-conf', '', '', '2021-06-11', '07:09:53', 'Abdou Majeed ALIDOU', '::1', 0),
(709, 'Cons-01-facture-conf', '', '', '2021-06-11', '07:20:01', 'Abdou Majeed ALIDOU', '::1', 0),
(710, 'Cons-01-location-conf', '', '', '2021-06-11', '07:20:05', 'Abdou Majeed ALIDOU', '::1', 0),
(711, 'Cons-01-facture-conf', '', '', '2021-06-11', '07:20:57', 'Abdou Majeed ALIDOU', '::1', 0),
(712, 'Cons-01-location-conf', '', '', '2021-06-11', '07:21:16', 'Abdou Majeed ALIDOU', '::1', 0),
(713, 'Cons-01-location-conf', '', '', '2021-06-11', '07:31:00', 'Abdou Majeed ALIDOU', '::1', 0),
(714, 'Cons-01-location-conf', '', '', '2021-06-11', '07:32:10', 'Abdou Majeed ALIDOU', '::1', 0),
(715, 'Cons-01-chambre', '', '', '2021-06-11', '07:59:44', 'Abdou Majeed ALIDOU', '::1', 0),
(716, 'Info-01-chambre', 'q', '', '2021-06-11', '07:59:47', 'Abdou Majeed ALIDOU', '::1', 0),
(717, 'Cons-01-location-conf', '', '', '2021-06-11', '08:00:00', 'Abdou Majeed ALIDOU', '::1', 0),
(718, 'Cons-01-facture-conf', '', '', '2021-06-11', '08:19:13', 'Abdou Majeed ALIDOU', '::1', 0),
(719, 'Cons-01-location-conf', '', '', '2021-06-11', '08:19:17', 'Abdou Majeed ALIDOU', '::1', 0),
(720, 'Cons-01-facture-conf', '', '', '2021-06-11', '08:19:22', 'Abdou Majeed ALIDOU', '::1', 0),
(721, 'Cons-01-location-conf', '', '', '2021-06-11', '08:19:32', 'Abdou Majeed ALIDOU', '::1', 0),
(722, 'Cons-01-facture-conf', '', '', '2021-06-11', '08:21:37', 'Abdou Majeed ALIDOU', '::1', 0),
(723, 'Cons-01-location-conf', '', '', '2021-06-11', '08:22:02', 'Abdou Majeed ALIDOU', '::1', 0),
(724, 'Cons-01-location-conf', '', '', '2021-06-11', '08:39:44', 'Abdou Majeed ALIDOU', '::1', 0),
(725, 'Info-01-location-conf', '3', '', '2021-06-11', '08:39:47', 'Abdou Majeed ALIDOU', '::1', 0),
(726, 'Info-01-location-conf', '3', '', '2021-06-11', '08:43:34', 'Abdou Majeed ALIDOU', '::1', 0),
(727, 'Info-01-location-conf', '3', '', '2021-06-11', '08:48:14', 'Abdou Majeed ALIDOU', '::1', 0),
(728, 'Info-01-location-conf', '3', '', '2021-06-11', '08:48:36', 'Abdou Majeed ALIDOU', '::1', 0),
(729, 'Info-01-location-conf', '3', '', '2021-06-11', '08:49:06', 'Abdou Majeed ALIDOU', '::1', 0),
(730, 'Info-01-location-conf', '3', '', '2021-06-11', '08:49:27', 'Abdou Majeed ALIDOU', '::1', 0),
(731, 'Info-01-location-conf', '3', '', '2021-06-11', '08:51:02', 'Abdou Majeed ALIDOU', '::1', 0),
(732, 'Info-01-location-conf', '3', '', '2021-06-11', '08:51:20', 'Abdou Majeed ALIDOU', '::1', 0),
(733, 'Info-01-location-conf', '3', '', '2021-06-11', '08:55:46', 'Abdou Majeed ALIDOU', '::1', 0),
(734, 'Info-01-location-conf', '3', '', '2021-06-11', '08:56:01', 'Abdou Majeed ALIDOU', '::1', 0),
(735, 'Info-01-location-conf', '3', '', '2021-06-11', '08:57:25', 'Abdou Majeed ALIDOU', '::1', 0),
(736, 'Info-01-location-conf', '5', '', '2021-06-11', '08:57:50', 'Abdou Majeed ALIDOU', '::1', 0),
(737, 'Info-01-location-conf', '3', '', '2021-06-11', '08:58:19', 'Abdou Majeed ALIDOU', '::1', 0),
(738, 'Cons-01-location-conf', '', '', '2021-06-11', '09:01:50', 'Abdou Majeed ALIDOU', '::1', 0),
(739, 'Info-01-location-conf', '3', '', '2021-06-11', '09:01:54', 'Abdou Majeed ALIDOU', '::1', 0),
(740, 'Info-01-location-conf', '5', '', '2021-06-11', '09:02:00', 'Abdou Majeed ALIDOU', '::1', 0),
(741, 'Info-01-location-conf', '3', '', '2021-06-11', '09:02:12', 'Abdou Majeed ALIDOU', '::1', 0),
(742, 'Info-01-location-conf', '2', '', '2021-06-11', '09:02:20', 'Abdou Majeed ALIDOU', '::1', 0),
(743, 'Cons-01-location-conf', '', '', '2021-06-11', '09:03:16', 'Abdou Majeed ALIDOU', '::1', 0),
(744, 'Info-01-location-conf', '5', '', '2021-06-11', '09:03:27', 'Abdou Majeed ALIDOU', '::1', 0),
(745, 'Info-01-location-conf', '3', '', '2021-06-11', '09:10:21', 'Abdou Majeed ALIDOU', '::1', 0),
(746, 'Cons-01-location-conf', '', '', '2021-06-11', '09:15:08', 'Abdou Majeed ALIDOU', '::1', 0),
(747, 'Cons-01-location-conf', '', '', '2021-06-11', '09:17:34', 'Abdou Majeed ALIDOU', '::1', 0),
(748, 'Cons-01-location-conf', '', '', '2021-06-11', '09:18:12', 'Abdou Majeed ALIDOU', '::1', 0),
(749, 'Cons-01-location-conf', '', '', '2021-06-11', '09:18:29', 'Abdou Majeed ALIDOU', '::1', 0),
(750, 'Cons-01-location-conf', '', '', '2021-06-11', '09:19:23', 'Abdou Majeed ALIDOU', '::1', 0),
(751, 'Cons-01-location-conf', '', '', '2021-06-11', '09:19:36', 'Abdou Majeed ALIDOU', '::1', 0),
(752, 'Cons-01-location-conf', '', '', '2021-06-11', '09:20:18', 'Abdou Majeed ALIDOU', '::1', 0),
(753, 'Cons-01-location-conf', '', '', '2021-06-11', '09:23:15', 'Abdou Majeed ALIDOU', '::1', 0),
(754, 'Cons-01-location-conf', '', '', '2021-06-11', '09:51:40', 'Abdou Majeed ALIDOU', '::1', 0),
(755, 'Info-01-location-conf', '3', '', '2021-06-11', '09:53:32', 'Abdou Majeed ALIDOU', '::1', 0),
(756, 'Info-01-location-conf', '5', '', '2021-06-11', '09:53:38', 'Abdou Majeed ALIDOU', '::1', 0),
(757, 'Info-01-location-conf', '4', '', '2021-06-11', '09:53:45', 'Abdou Majeed ALIDOU', '::1', 0),
(758, 'Cons-01-facture-conf', '', '', '2021-06-11', '11:09:59', 'Abdou Majeed ALIDOU', '::1', 0),
(759, 'Cons-01-facture-conf', '', '', '2021-06-11', '11:36:04', 'Abdou Majeed ALIDOU', '::1', 0),
(760, 'Cons-01-facture-conf', '', '', '2021-06-11', '11:36:11', 'Abdou Majeed ALIDOU', '::1', 0),
(761, 'Cons-01-location-conf', '', '', '2021-06-11', '11:36:13', 'Abdou Majeed ALIDOU', '::1', 0),
(762, 'Cons-01-location-conf', '', '', '2021-06-11', '11:41:01', 'Abdou Majeed ALIDOU', '::1', 0),
(763, 'Cons-01-location-conf', '', '', '2021-06-11', '11:52:23', 'Abdou Majeed ALIDOU', '::1', 0),
(764, 'Cons-01-location-conf', '', '', '2021-06-11', '11:52:27', 'Abdou Majeed ALIDOU', '::1', 0),
(765, 'Cons-01-location-conf', '', '', '2021-06-11', '11:53:07', 'Abdou Majeed ALIDOU', '::1', 0),
(766, 'Cons-01-location-conf', '', '', '2021-06-11', '11:53:10', 'Abdou Majeed ALIDOU', '::1', 0),
(767, 'Cons-01-location-conf', '', '', '2021-06-11', '11:53:19', 'Abdou Majeed ALIDOU', '::1', 0),
(768, 'Cons-01-location-conf', '', '', '2021-06-11', '11:53:41', 'Abdou Majeed ALIDOU', '::1', 0),
(769, 'Cons-01-location-conf', '', '', '2021-06-11', '11:53:47', 'Abdou Majeed ALIDOU', '::1', 0),
(770, 'Cons-01-location-conf', '', '', '2021-06-11', '11:54:35', 'Abdou Majeed ALIDOU', '::1', 0),
(771, 'Cons-01-location-conf', '', '', '2021-06-11', '11:54:46', 'Abdou Majeed ALIDOU', '::1', 0),
(772, 'Cons-01-location-conf', '', '', '2021-06-11', '11:54:55', 'Abdou Majeed ALIDOU', '::1', 0),
(773, 'Cons-01-location-conf', '', '', '2021-06-11', '11:55:00', 'Abdou Majeed ALIDOU', '::1', 0),
(774, 'Cons-01-location-conf', '', '', '2021-06-11', '12:27:42', 'Abdou Majeed ALIDOU', '::1', 0),
(775, 'Cons-01-location-conf', '', '', '2021-06-11', '12:57:20', 'Abdou Majeed ALIDOU', '::1', 0),
(776, 'Cons-01-location-conf', '', '', '2021-06-11', '13:12:30', 'Abdou Majeed ALIDOU', '::1', 0),
(777, 'Cons-01-location-conf', '', '', '2021-06-11', '13:13:02', 'Abdou Majeed ALIDOU', '::1', 0),
(778, 'Cons-01-location-conf', '', '', '2021-06-11', '13:13:10', 'Abdou Majeed ALIDOU', '::1', 0),
(779, 'Cons-01-location-conf', '', '', '2021-06-11', '13:15:02', 'Abdou Majeed ALIDOU', '::1', 0),
(780, 'Cons-01-location-conf', '', '', '2021-06-11', '13:18:21', 'Abdou Majeed ALIDOU', '::1', 0),
(781, 'Cons-01-location-conf', '', '', '2021-06-11', '13:23:37', 'Abdou Majeed ALIDOU', '::1', 0),
(782, 'Cons-01-location-conf', '', '', '2021-06-11', '13:23:58', 'Abdou Majeed ALIDOU', '::1', 0),
(783, 'Cons-01-location-conf', '', '', '2021-06-11', '13:26:20', 'Abdou Majeed ALIDOU', '::1', 0),
(784, 'Cons-01-location-conf', '', '', '2021-06-11', '13:29:39', 'Abdou Majeed ALIDOU', '::1', 0),
(785, 'Cons-01-location-conf', '', '', '2021-06-11', '13:43:29', 'Abdou Majeed ALIDOU', '::1', 0),
(786, 'Cons-01-location-conf', '', '', '2021-06-11', '13:47:01', 'Abdou Majeed ALIDOU', '::1', 0),
(787, 'Cons-01-salle-conf', '', '', '2021-06-11', '13:49:01', 'Abdou Majeed ALIDOU', '::1', 0),
(788, 'Cons-01-salle-conf', '', '', '2021-06-11', '13:56:20', 'Abdou Majeed ALIDOU', '::1', 0),
(789, 'Cons-01-location-conf', '', '', '2021-06-11', '13:56:28', 'Abdou Majeed ALIDOU', '::1', 0),
(790, 'Cons-01-salle-conf', '', '', '2021-06-11', '13:56:45', 'Abdou Majeed ALIDOU', '::1', 0),
(791, 'Cons-01-service-conf', '', '', '2021-06-11', '13:56:48', 'Abdou Majeed ALIDOU', '::1', 0),
(792, 'Cons-01-service-conf', '', '', '2021-06-11', '13:57:51', 'Abdou Majeed ALIDOU', '::1', 0),
(793, 'Cons-01-location-conf', '', '', '2021-06-11', '13:57:54', 'Abdou Majeed ALIDOU', '::1', 0),
(794, 'Cons-01-location-conf', '', '', '2021-06-11', '15:07:25', 'Abdou Majeed ALIDOU', '::1', 0),
(795, 'Cons-01-location-conf', '', '', '2021-06-11', '15:10:26', 'Abdou Majeed ALIDOU', '::1', 0),
(796, 'Cons-01-location-conf', '', '', '2021-06-11', '15:12:08', 'Abdou Majeed ALIDOU', '::1', 0),
(797, 'Cons-01-location-conf', '', '', '2021-06-11', '15:12:46', 'Abdou Majeed ALIDOU', '::1', 0),
(798, 'Cons-01-location-conf', '', '', '2021-06-11', '15:13:17', 'Abdou Majeed ALIDOU', '::1', 0),
(799, 'Cons-01-location-conf', '', '', '2021-06-11', '15:13:49', 'Abdou Majeed ALIDOU', '::1', 0),
(800, 'Cons-01-location-conf', '', '', '2021-06-11', '15:29:21', 'Abdou Majeed ALIDOU', '::1', 0),
(801, 'Info-01-location-conf', '3', '', '2021-06-11', '16:08:28', 'Abdou Majeed ALIDOU', '::1', 0),
(802, 'Cons-01-location-conf', '', '', '2021-06-11', '16:13:50', 'Abdou Majeed ALIDOU', '::1', 0),
(803, 'Cons-01-location-conf', '', '', '2021-06-11', '16:20:44', 'Abdou Majeed ALIDOU', '::1', 0),
(804, 'Cons-01-location-conf', '', '', '2021-06-11', '16:22:14', 'Abdou Majeed ALIDOU', '::1', 0),
(805, 'Connex-01', '', '', '2021-06-11', '16:42:16', 'Abdou Majeed ALIDOU', '127.0.0.1', 0),
(806, 'Cons-01-dashboard', '', '', '2021-06-11', '16:42:16', 'Abdou Majeed ALIDOU', '127.0.0.1', 0),
(807, 'Cons-01-location-conf', '', '', '2021-06-11', '16:42:25', 'Abdou Majeed ALIDOU', '127.0.0.1', 0),
(808, 'Cons-01-location-conf', '', '', '2021-06-11', '16:52:53', 'Abdou Majeed ALIDOU', '127.0.0.1', 0),
(809, 'Cons-01-location-conf', '', '', '2021-06-11', '16:53:16', 'Abdou Majeed ALIDOU', '::1', 0),
(810, 'Cons-01-location-conf', '', '', '2021-06-12', '20:03:02', 'Abdou Majeed ALIDOU', '::1', 0),
(811, 'Cons-01-location-conf', '', '', '2021-06-12', '20:09:57', 'Abdou Majeed ALIDOU', '::1', 0),
(812, 'Cons-01-location-conf', '', '', '2021-06-12', '20:12:18', 'Abdou Majeed ALIDOU', '::1', 0),
(813, 'Cons-01-location-conf', '', '', '2021-06-12', '20:20:56', 'Abdou Majeed ALIDOU', '::1', 0),
(814, 'Cons-01-location-conf', '', '', '2021-06-12', '20:23:45', 'Abdou Majeed ALIDOU', '::1', 0),
(815, 'Cons-01-location-conf', '', '', '2021-06-12', '21:28:25', 'Abdou Majeed ALIDOU', '::1', 0),
(816, 'Cons-01-location-conf', '', '', '2021-06-12', '21:31:08', 'Abdou Majeed ALIDOU', '::1', 0),
(817, 'Cons-01-location-conf', '', '', '2021-06-12', '21:56:04', 'Abdou Majeed ALIDOU', '::1', 0),
(818, 'Info-01-location-conf', '9', '', '2021-06-12', '21:57:52', 'Abdou Majeed ALIDOU', '::1', 0),
(819, 'Info-01-location-conf', '10', '', '2021-06-12', '22:01:21', 'Abdou Majeed ALIDOU', '::1', 0),
(820, 'Exp-01-location-conf', 'PDF', '', '2021-06-12', '22:02:06', 'Abdou Majeed ALIDOU', '::1', 0),
(821, 'Cons-01-location-conf', '', '', '2021-06-12', '22:02:15', 'Abdou Majeed ALIDOU', '::1', 0),
(822, 'Info-01-location-conf', '11', '', '2021-06-12', '22:03:18', 'Abdou Majeed ALIDOU', '::1', 0),
(823, 'Info-01-location-conf', '12', '', '2021-06-12', '22:04:34', 'Abdou Majeed ALIDOU', '::1', 0),
(824, 'Info-01-location-conf', '13', '', '2021-06-12', '22:05:12', 'Abdou Majeed ALIDOU', '::1', 0),
(825, 'Info-01-location-conf', '14', '', '2021-06-12', '22:06:08', 'Abdou Majeed ALIDOU', '::1', 0),
(826, 'Info-01-location-conf', '15', '', '2021-06-12', '22:07:07', 'Abdou Majeed ALIDOU', '::1', 0),
(827, 'Info-01-location-conf', '14', '', '2021-06-12', '22:07:19', 'Abdou Majeed ALIDOU', '::1', 0),
(828, 'Cons-01-location-conf', '', '', '2021-06-12', '22:07:39', 'Abdou Majeed ALIDOU', '::1', 0),
(829, 'Info-01-location-conf', '15', '', '2021-06-12', '22:07:58', 'Abdou Majeed ALIDOU', '::1', 0),
(830, 'Info-01-location-conf', '16', '', '2021-06-12', '22:09:49', 'Abdou Majeed ALIDOU', '::1', 0),
(831, 'Cons-01-location-conf', '', '', '2021-06-12', '22:11:10', 'Abdou Majeed ALIDOU', '::1', 0),
(832, 'Cons-01-location-conf', '', '', '2021-06-12', '22:12:26', 'Abdou Majeed ALIDOU', '::1', 0),
(833, 'Info-01-location-conf', '12', '', '2021-06-12', '22:14:17', 'Abdou Majeed ALIDOU', '::1', 0),
(834, 'Info-01-location-conf', '17', '', '2021-06-12', '22:14:30', 'Abdou Majeed ALIDOU', '::1', 0),
(835, 'Info-01-location-conf', '21', '', '2021-06-12', '22:14:36', 'Abdou Majeed ALIDOU', '::1', 0),
(836, 'Info-01-location-conf', '18', '', '2021-06-12', '22:14:42', 'Abdou Majeed ALIDOU', '::1', 0),
(837, 'Info-01-location-conf', '27', '', '2021-06-12', '22:15:15', 'Abdou Majeed ALIDOU', '::1', 0),
(838, 'Info-01-location-conf', '28', '', '2021-06-12', '22:15:48', 'Abdou Majeed ALIDOU', '::1', 0),
(839, 'Info-01-location-conf', '29', '', '2021-06-12', '22:16:24', 'Abdou Majeed ALIDOU', '::1', 0),
(840, 'Info-01-location-conf', '30', '', '2021-06-12', '22:17:59', 'Abdou Majeed ALIDOU', '::1', 0),
(841, 'Info-01-location-conf', '31', '', '2021-06-12', '22:18:54', 'Abdou Majeed ALIDOU', '::1', 0),
(842, 'Cons-01-location-conf', '', '', '2021-06-12', '22:36:57', 'Abdou Majeed ALIDOU', '::1', 0),
(843, 'Cons-01-location-conf', '', '', '2021-06-12', '22:47:29', 'Abdou Majeed ALIDOU', '::1', 0),
(844, 'Cons-01-location-conf', '', '', '2021-06-12', '22:49:52', 'Abdou Majeed ALIDOU', '::1', 0),
(845, 'Cons-01-location-conf', '', '', '2021-06-12', '22:50:12', 'Abdou Majeed ALIDOU', '::1', 0),
(846, 'Cons-01-location-conf', '', '', '2021-06-12', '22:55:26', 'Abdou Majeed ALIDOU', '::1', 0),
(847, 'Cons-01-location-conf', '', '', '2021-06-12', '23:00:21', 'Abdou Majeed ALIDOU', '::1', 0),
(848, 'Cons-01-salle-conf', '', '', '2021-06-12', '23:00:43', 'Abdou Majeed ALIDOU', '::1', 0),
(849, 'Cons-01-salle-conf', '', '', '2021-06-12', '23:00:43', 'Abdou Majeed ALIDOU', '::1', 0),
(850, 'Enr-01-salle-conf', 'cc', '', '2021-06-12', '23:01:12', 'Abdou Majeed ALIDOU', '::1', 0),
(851, 'Enr-01-salle-conf', 'dd', '', '2021-06-12', '23:01:30', 'Abdou Majeed ALIDOU', '::1', 0),
(852, 'Cons-01-salle-conf', '', '', '2021-06-12', '23:03:59', 'Abdou Majeed ALIDOU', '::1', 0),
(853, 'Info-01-salle-conf', 'futur', '', '2021-06-12', '23:04:04', 'Abdou Majeed ALIDOU', '::1', 0),
(854, 'Cons-01-salle-conf', '', '', '2021-06-12', '23:05:25', 'Abdou Majeed ALIDOU', '::1', 0),
(855, 'Cons-01-salle-conf', '', '', '2021-06-12', '23:08:57', 'Abdou Majeed ALIDOU', '::1', 0),
(856, 'Cons-01-salle-conf', '', '', '2021-06-12', '23:10:21', 'Abdou Majeed ALIDOU', '::1', 0),
(857, 'Cons-01-salle-conf', '', '', '2021-06-12', '23:12:05', 'Abdou Majeed ALIDOU', '::1', 0),
(858, 'Cons-01-salle-conf', '', '', '2021-06-12', '23:13:05', 'Abdou Majeed ALIDOU', '::1', 0),
(859, 'Cons-01-salle-conf', '', '', '2021-06-12', '23:13:18', 'Abdou Majeed ALIDOU', '::1', 0),
(860, 'Cons-01-salle-conf', '', '', '2021-06-12', '23:13:26', 'Abdou Majeed ALIDOU', '::1', 0),
(861, 'Cons-01-salle-conf', '', '', '2021-06-12', '23:13:30', 'Abdou Majeed ALIDOU', '::1', 0),
(862, 'Cons-01-salle-conf', '', '', '2021-06-12', '23:13:35', 'Abdou Majeed ALIDOU', '::1', 0),
(863, 'Info-01-salle-conf', 'futur', '', '2021-06-12', '23:13:44', 'Abdou Majeed ALIDOU', '::1', 0),
(864, 'Info-01-salle-conf', 'Large', '', '2021-06-12', '23:16:00', 'Abdou Majeed ALIDOU', '::1', 0),
(865, 'Cons-01-salle-conf', '', '', '2021-06-12', '23:17:30', 'Abdou Majeed ALIDOU', '::1', 0),
(866, 'Info-01-salle-conf', 'futur', '', '2021-06-12', '23:17:32', 'Abdou Majeed ALIDOU', '::1', 0),
(867, 'Cons-01-salle-conf', '', '', '2021-06-12', '23:17:54', 'Abdou Majeed ALIDOU', '::1', 0),
(868, 'Info-01-salle-conf', 'futur', '', '2021-06-12', '23:17:57', 'Abdou Majeed ALIDOU', '::1', 0),
(869, 'Modif-01-salle-conf', 'futur', '', '2021-06-12', '23:18:15', 'Abdou Majeed ALIDOU', '::1', 0),
(870, 'Info-01-salle-conf', 'futur', '', '2021-06-12', '23:18:19', 'Abdou Majeed ALIDOU', '::1', 0),
(871, 'Cons-01-salle-conf', '', '', '2021-06-12', '23:18:36', 'Abdou Majeed ALIDOU', '::1', 0),
(872, 'Cons-01-salle-conf', '', '', '2021-06-13', '11:07:55', 'Abdou Majeed ALIDOU', '::1', 0),
(873, 'Cons-01-salle-conf', '', '', '2021-06-13', '11:14:07', 'Abdou Majeed ALIDOU', '::1', 0),
(874, 'Deconnex-01', '', '', '2021-06-13', '11:15:37', 'Abdou Majeed ALIDOU', '::1', 0),
(875, 'Connex-01', '', '', '2021-06-13', '11:15:45', 'Abdou Majeed ALIDOU', '::1', 0),
(876, 'Cons-01-dashboard', '', '', '2021-06-13', '11:15:45', 'Abdou Majeed ALIDOU', '::1', 0),
(877, 'Deconnex-01', '', '', '2021-06-13', '11:16:44', 'Abdou Majeed ALIDOU', '::1', 0),
(878, 'Connex-01', '', '', '2021-06-13', '11:16:50', 'Abdou Majeed ALIDOU', '::1', 0),
(879, 'Cons-01-dashboard', '', '', '2021-06-13', '11:16:50', 'Abdou Majeed ALIDOU', '::1', 0),
(880, 'Cons-01-type-chambre', '', '', '2021-06-13', '11:20:48', 'Abdou Majeed ALIDOU', '::1', 0),
(881, 'Deconnex-01', '', '', '2021-06-13', '11:23:10', 'Abdou Majeed ALIDOU', '::1', 0),
(882, 'Connex-01', '', '', '2021-06-13', '11:23:20', 'Abdou Majeed ALIDOU', '::1', 0),
(883, 'Cons-01-dashboard', '', '', '2021-06-13', '11:23:20', 'Abdou Majeed ALIDOU', '::1', 0),
(884, 'Deconnex-01', '', '', '2021-06-13', '17:43:22', 'Abdou Majeed ALIDOU', '::1', 0),
(885, 'Connex-01', '', '', '2021-06-13', '17:43:27', 'Abdou Majeed ALIDOU', '::1', 0),
(886, 'Cons-01-dashboard', '', '', '2021-06-13', '17:43:28', 'Abdou Majeed ALIDOU', '::1', 0),
(887, 'Cons-01-location-conf', '', '', '2021-06-13', '17:43:31', 'Abdou Majeed ALIDOU', '::1', 0),
(888, 'Enr-01-location-conf', '1', '', '2021-06-13', '18:09:20', 'Abdou Majeed ALIDOU', '::1', 0),
(889, 'Cons-01-location-conf', '', '', '2021-06-13', '21:47:33', 'Abdou Majeed ALIDOU', '::1', 0),
(890, 'Cons-01-location-conf', '', '', '2021-06-13', '21:51:55', 'Abdou Majeed ALIDOU', '::1', 0),
(891, 'Cons-01-location-conf', '', '', '2021-06-13', '21:52:43', 'Abdou Majeed ALIDOU', '::1', 0),
(892, 'Cons-01-location-conf', '', '', '2021-06-13', '21:52:58', 'Abdou Majeed ALIDOU', '::1', 0),
(893, 'Cons-01-location-conf', '', '', '2021-06-13', '21:53:47', 'Abdou Majeed ALIDOU', '::1', 0),
(894, 'Enr-01-location-conf', '2', '', '2021-06-13', '21:57:05', 'Abdou Majeed ALIDOU', '::1', 0),
(895, 'Cons-01-location-conf', '', '', '2021-06-13', '21:58:51', 'Abdou Majeed ALIDOU', '::1', 0),
(896, 'Cons-01-location-conf', '', '', '2021-06-13', '22:01:38', 'Abdou Majeed ALIDOU', '::1', 0),
(897, 'Cons-01-location-conf', '', '', '2021-06-13', '22:09:17', 'Abdou Majeed ALIDOU', '::1', 0),
(898, 'Cons-01-location-conf', '', '', '2021-06-13', '22:12:52', 'Abdou Majeed ALIDOU', '::1', 0),
(899, 'Cons-01-location-conf', '', '', '2021-06-13', '22:13:20', 'Abdou Majeed ALIDOU', '::1', 0),
(900, 'Cons-01-location-conf', '', '', '2021-06-13', '22:21:19', 'Abdou Majeed ALIDOU', '::1', 0),
(901, 'Cons-01-location-conf', '', '', '2021-06-13', '22:22:45', 'Abdou Majeed ALIDOU', '::1', 0),
(902, 'Cons-01-location-conf', '', '', '2021-06-13', '22:23:49', 'Abdou Majeed ALIDOU', '::1', 0),
(903, 'Cons-01-location-conf', '', '', '2021-06-13', '22:27:08', 'Abdou Majeed ALIDOU', '::1', 0),
(904, 'Cons-01-location-conf', '', '', '2021-06-13', '22:27:46', 'Abdou Majeed ALIDOU', '::1', 0),
(905, 'Cons-01-location-conf', '', '', '2021-06-13', '22:32:13', 'Abdou Majeed ALIDOU', '::1', 0),
(906, 'Cons-01-location-conf', '', '', '2021-06-13', '22:32:36', 'Abdou Majeed ALIDOU', '::1', 0),
(907, 'Cons-01-location-conf', '', '', '2021-06-13', '22:33:04', 'Abdou Majeed ALIDOU', '::1', 0),
(908, 'Cons-01-location-conf', '', '', '2021-06-13', '22:33:21', 'Abdou Majeed ALIDOU', '::1', 0),
(909, 'Cons-01-location-conf', '', '', '2021-06-13', '22:36:48', 'Abdou Majeed ALIDOU', '::1', 0),
(910, 'Cons-01-location-conf', '', '', '2021-06-13', '22:38:13', 'Abdou Majeed ALIDOU', '::1', 0),
(911, 'Cons-01-location-conf', '', '', '2021-06-13', '22:39:37', 'Abdou Majeed ALIDOU', '::1', 0),
(912, 'Cons-01-salle-conf', '', '', '2021-06-13', '22:42:03', 'Abdou Majeed ALIDOU', '::1', 0),
(913, 'Modif-01-salle-conf', 'Small', '', '2021-06-13', '22:42:35', 'Abdou Majeed ALIDOU', '::1', 0),
(914, 'Cons-01-salle-conf', '', '', '2021-06-13', '22:50:47', 'Abdou Majeed ALIDOU', '::1', 0),
(915, 'Cons-01-location-conf', '', '', '2021-06-13', '22:50:49', 'Abdou Majeed ALIDOU', '::1', 0),
(916, 'Cons-01-location-conf', '', '', '2021-06-13', '22:52:01', 'Abdou Majeed ALIDOU', '::1', 0),
(917, 'Cons-01-location-conf', '', '', '2021-06-13', '23:02:43', 'Abdou Majeed ALIDOU', '::1', 0),
(918, 'Cons-01-location-conf', '', '', '2021-06-13', '23:04:28', 'Abdou Majeed ALIDOU', '::1', 0),
(919, 'Cons-01-location-conf', '', '', '2021-06-13', '23:05:06', 'Abdou Majeed ALIDOU', '::1', 0),
(920, 'Cons-01-location-conf', '', '', '2021-06-13', '23:08:30', 'Abdou Majeed ALIDOU', '::1', 0),
(921, 'Cons-01-location-conf', '', '', '2021-06-13', '23:09:31', 'Abdou Majeed ALIDOU', '::1', 0),
(922, 'Cons-01-location-conf', '', '', '2021-06-13', '23:11:01', 'Abdou Majeed ALIDOU', '::1', 0),
(923, 'Cons-01-location-conf', '', '', '2021-06-13', '23:14:52', 'Abdou Majeed ALIDOU', '::1', 0),
(924, 'Cons-01-location-conf', '', '', '2021-06-13', '23:26:06', 'Abdou Majeed ALIDOU', '::1', 0),
(925, 'Cons-01-location-conf', '', '', '2021-06-13', '23:26:44', 'Abdou Majeed ALIDOU', '::1', 0),
(926, 'Cons-01-location-conf', '', '', '2021-06-13', '23:27:37', 'Abdou Majeed ALIDOU', '::1', 0),
(927, 'Cons-01-location-conf', '', '', '2021-06-14', '07:36:25', 'Abdou Majeed ALIDOU', '::1', 0),
(928, 'Enr-01-location-conf', '0', '', '2021-06-14', '07:38:40', 'Abdou Majeed ALIDOU', '::1', 0),
(929, 'Enr-01-location-conf', '0', '', '2021-06-14', '07:38:42', 'Abdou Majeed ALIDOU', '::1', 0),
(930, 'Enr-01-location-conf', '0', '', '2021-06-14', '07:38:45', 'Abdou Majeed ALIDOU', '::1', 0),
(931, 'Enr-01-location-conf', '0', '', '2021-06-14', '07:38:50', 'Abdou Majeed ALIDOU', '::1', 0),
(932, 'Cons-01-location-conf', '', '', '2021-06-14', '07:38:53', 'Abdou Majeed ALIDOU', '::1', 0),
(933, 'Enr-01-location-conf', '0', '', '2021-06-14', '07:39:04', 'Abdou Majeed ALIDOU', '::1', 0),
(934, 'Enr-01-location-conf', '0', '', '2021-06-14', '07:39:05', 'Abdou Majeed ALIDOU', '::1', 0),
(935, 'Enr-01-location-conf', '0', '', '2021-06-14', '07:39:06', 'Abdou Majeed ALIDOU', '::1', 0),
(936, 'Enr-01-location-conf', '0', '', '2021-06-14', '07:39:09', 'Abdou Majeed ALIDOU', '::1', 0),
(937, 'Enr-01-location-conf', '0', '', '2021-06-14', '07:39:10', 'Abdou Majeed ALIDOU', '::1', 0),
(938, 'Enr-01-location-conf', '0', '', '2021-06-14', '07:39:15', 'Abdou Majeed ALIDOU', '::1', 0),
(939, 'Enr-01-location-conf', '0', '', '2021-06-14', '07:39:16', 'Abdou Majeed ALIDOU', '::1', 0),
(940, 'Enr-01-location-conf', '0', '', '2021-06-14', '07:39:16', 'Abdou Majeed ALIDOU', '::1', 0),
(941, 'Enr-01-location-conf', '0', '', '2021-06-14', '07:39:16', 'Abdou Majeed ALIDOU', '::1', 0),
(942, 'Modif-01-location-conf', '2', '', '2021-06-14', '08:01:14', 'Abdou Majeed ALIDOU', '::1', 0),
(943, 'Info-01-location-conf', '2', '', '2021-06-14', '08:01:21', 'Abdou Majeed ALIDOU', '::1', 0),
(944, 'Cons-01-location-conf', '', '', '2021-06-14', '08:03:18', 'Abdou Majeed ALIDOU', '::1', 0),
(945, 'Info-01-location-conf', '2', '', '2021-06-14', '08:03:24', 'Abdou Majeed ALIDOU', '::1', 0),
(946, 'Info-01-location-conf', '2', '', '2021-06-14', '08:06:24', 'Abdou Majeed ALIDOU', '::1', 0),
(947, 'Cons-01-location-conf', '', '', '2021-06-14', '08:06:31', 'Abdou Majeed ALIDOU', '::1', 0),
(948, 'Cons-01-location-conf', '', '', '2021-06-14', '08:07:50', 'Abdou Majeed ALIDOU', '::1', 0),
(949, 'Cons-01-location-conf', '', '', '2021-06-14', '08:09:31', 'Abdou Majeed ALIDOU', '::1', 0),
(950, 'Cons-01-location-conf', '', '', '2021-06-14', '08:21:24', 'Abdou Majeed ALIDOU', '::1', 0),
(951, 'Modif-01-location-conf', '2', '', '2021-06-14', '08:21:49', 'Abdou Majeed ALIDOU', '::1', 0),
(952, 'Cons-01-location-conf', '', '', '2021-06-14', '08:23:15', 'Abdou Majeed ALIDOU', '::1', 0),
(953, 'Cons-01-location-conf', '', '', '2021-06-14', '08:26:46', 'Abdou Majeed ALIDOU', '::1', 0),
(954, 'Modif-01-location-conf', '2', '', '2021-06-14', '08:27:07', 'Abdou Majeed ALIDOU', '::1', 0),
(955, 'Cons-01-location-conf', '', '', '2021-06-14', '09:54:27', 'Abdou Majeed ALIDOU', '::1', 0),
(956, 'Cons-01-location-conf', '', '', '2021-06-14', '09:57:35', 'Abdou Majeed ALIDOU', '::1', 0),
(957, 'Modif-01-location-conf', '1', '', '2021-06-14', '09:57:45', 'Abdou Majeed ALIDOU', '::1', 0),
(958, 'Cons-01-location-conf', '', '', '2021-06-14', '09:58:25', 'Abdou Majeed ALIDOU', '::1', 0),
(959, 'Cons-01-location-conf', '', '', '2021-06-14', '09:58:55', 'Abdou Majeed ALIDOU', '::1', 0),
(960, 'Modif-01-location-conf', '1', '', '2021-06-14', '09:59:05', 'Abdou Majeed ALIDOU', '::1', 0),
(961, 'Modif-01-location-conf', '1', '', '2021-06-14', '09:59:56', 'Abdou Majeed ALIDOU', '::1', 0),
(962, 'Cons-01-location-conf', '', '', '2021-06-14', '10:00:53', 'Abdou Majeed ALIDOU', '::1', 0),
(963, 'Modif-01-location-conf', '1', '', '2021-06-14', '10:01:22', 'Abdou Majeed ALIDOU', '::1', 0),
(964, 'Cons-01-location-conf', '', '', '2021-06-14', '10:03:32', 'Abdou Majeed ALIDOU', '::1', 0),
(965, 'Cons-01-location-conf', '', '', '2021-06-14', '10:04:36', 'Abdou Majeed ALIDOU', '::1', 0),
(966, 'Cons-01-location-conf', '', '', '2021-06-14', '10:04:59', 'Abdou Majeed ALIDOU', '::1', 0),
(967, 'Modif-01-location-conf', '1', '', '2021-06-14', '10:05:57', 'Abdou Majeed ALIDOU', '::1', 0),
(968, 'Cons-01-location-conf', '', '', '2021-06-14', '10:12:53', 'Abdou Majeed ALIDOU', '::1', 0),
(969, 'Cons-01-location-conf', '', '', '2021-06-14', '10:16:13', 'Abdou Majeed ALIDOU', '::1', 0),
(970, 'Cons-01-location-conf', '', '', '2021-06-14', '10:16:25', 'Abdou Majeed ALIDOU', '::1', 0),
(971, 'Cons-01-location-conf', '', '', '2021-06-14', '10:17:48', 'Abdou Majeed ALIDOU', '::1', 0),
(972, 'Cons-01-location-conf', '', '', '2021-06-14', '10:18:04', 'Abdou Majeed ALIDOU', '::1', 0),
(973, 'Cons-01-location-conf', '', '', '2021-06-14', '10:18:54', 'Abdou Majeed ALIDOU', '::1', 0),
(974, 'Cons-01-location-conf', '', '', '2021-06-14', '10:20:12', 'Abdou Majeed ALIDOU', '::1', 0),
(975, 'Chg-01-location-conf', '2,Inactif', '', '2021-06-14', '10:20:19', 'Abdou Majeed ALIDOU', '::1', 0),
(976, 'Exp-01-location-conf', 'PDF', '', '2021-06-14', '10:20:26', 'Abdou Majeed ALIDOU', '::1', 0),
(977, 'Cons-01-location-conf', '', '', '2021-06-14', '10:20:35', 'Abdou Majeed ALIDOU', '::1', 0),
(978, 'Info-01-location-conf', '1', '', '2021-06-14', '10:20:39', 'Abdou Majeed ALIDOU', '::1', 0),
(979, 'Cons-01-location-conf', '', '', '2021-06-14', '10:59:17', 'Abdou Majeed ALIDOU', '::1', 0),
(980, 'Info-01-location-conf', '1', '', '2021-06-14', '11:13:38', 'Abdou Majeed ALIDOU', '::1', 0),
(981, 'Modif-01-location-conf', '1', '', '2021-06-14', '11:32:12', 'Abdou Majeed ALIDOU', '::1', 0),
(982, 'Enr-01-location-conf', '3', '', '2021-06-14', '11:34:50', 'Abdou Majeed ALIDOU', '::1', 0),
(983, 'Cons-01-location-conf', '', '', '2021-06-14', '11:38:06', 'Abdou Majeed ALIDOU', '::1', 0),
(984, 'Cons-01-location-conf', '', '', '2021-06-14', '11:38:21', 'Abdou Majeed ALIDOU', '::1', 0),
(985, 'Enr-01-location-conf', '4', '', '2021-06-14', '11:39:03', 'Abdou Majeed ALIDOU', '::1', 0),
(986, 'Chg-01-location-conf', '3,Inactif', '', '2021-06-14', '12:09:26', 'Abdou Majeed ALIDOU', '::1', 0),
(987, 'Chg-01-location-conf', '4,Inactif', '', '2021-06-14', '12:09:32', 'Abdou Majeed ALIDOU', '::1', 0),
(988, 'Cons-01-location-conf', '', '', '2021-06-14', '13:21:30', 'Abdou Majeed ALIDOU', '::1', 0),
(989, 'Cons-01-location-conf', '', '', '2021-06-14', '13:48:50', 'Abdou Majeed ALIDOU', '::1', 0),
(990, 'Cons-01-location-conf', '', '', '2021-06-14', '13:50:19', 'Abdou Majeed ALIDOU', '::1', 0),
(991, 'Cons-01-location-conf', '', '', '2021-06-14', '13:55:42', 'Abdou Majeed ALIDOU', '::1', 0),
(992, 'Modif-01-location-conf', '1', '', '2021-06-14', '13:56:02', 'Abdou Majeed ALIDOU', '::1', 0),
(993, 'Enr-01-location-conf', '5', '', '2021-06-14', '13:56:32', 'Abdou Majeed ALIDOU', '::1', 0),
(994, 'Cons-01-location-conf', '', '', '2021-06-14', '14:00:32', 'Abdou Majeed ALIDOU', '::1', 0),
(995, 'Cons-01-location-conf', '', '', '2021-06-14', '14:06:39', 'Abdou Majeed ALIDOU', '::1', 0),
(996, 'Cons-01-location-conf', '', '', '2021-06-14', '14:07:30', 'Abdou Majeed ALIDOU', '::1', 0),
(997, 'Cons-01-location-conf', '', '', '2021-06-14', '14:08:09', 'Abdou Majeed ALIDOU', '::1', 0),
(998, 'Cons-01-location-conf', '', '', '2021-06-14', '14:39:54', 'Abdou Majeed ALIDOU', '::1', 0),
(999, 'Cons-01-location-conf', '', '', '2021-06-14', '14:40:47', 'Abdou Majeed ALIDOU', '::1', 0),
(1000, 'Cons-01-location-conf', '', '', '2021-06-14', '14:49:04', 'Abdou Majeed ALIDOU', '::1', 0),
(1001, 'Cons-01-location-conf', '', '', '2021-06-14', '14:51:14', 'Abdou Majeed ALIDOU', '::1', 0),
(1002, 'Cons-01-location-conf', '', '', '2021-06-14', '15:02:48', 'Abdou Majeed ALIDOU', '::1', 0),
(1003, 'Cons-01-location-conf', '', '', '2021-06-14', '21:05:11', 'Abdou Majeed ALIDOU', '::1', 0),
(1004, 'Cons-01-location-conf', '', '', '2021-06-14', '21:08:02', 'Abdou Majeed ALIDOU', '::1', 0),
(1005, 'Cons-01-location-conf', '', '', '2021-06-14', '21:08:21', 'Abdou Majeed ALIDOU', '::1', 0),
(1006, 'Cons-01-location-conf', '', '', '2021-06-14', '21:08:33', 'Abdou Majeed ALIDOU', '::1', 0),
(1007, 'Cons-01-location-conf', '', '', '2021-06-14', '21:14:02', 'Abdou Majeed ALIDOU', '::1', 0),
(1008, 'Cons-01-location-conf', '', '', '2021-06-14', '21:14:49', 'Abdou Majeed ALIDOU', '::1', 0),
(1009, 'Cons-01-location-conf', '', '', '2021-06-14', '21:16:35', 'Abdou Majeed ALIDOU', '::1', 0),
(1010, 'Cons-01-location-conf', '', '', '2021-06-14', '21:18:12', 'Abdou Majeed ALIDOU', '::1', 0),
(1011, 'Cons-01-location-conf', '', '', '2021-06-14', '21:18:43', 'Abdou Majeed ALIDOU', '::1', 0),
(1012, 'Cons-01-location-conf', '', '', '2021-06-14', '21:19:08', 'Abdou Majeed ALIDOU', '::1', 0),
(1013, 'Cons-01-location-conf', '', '', '2021-06-14', '21:22:30', 'Abdou Majeed ALIDOU', '::1', 0),
(1014, 'Cons-01-location-conf', '', '', '2021-06-14', '21:23:29', 'Abdou Majeed ALIDOU', '::1', 0),
(1015, 'Cons-01-location-conf', '', '', '2021-06-14', '21:23:43', 'Abdou Majeed ALIDOU', '::1', 0),
(1016, 'Cons-01-location-conf', '', '', '2021-06-14', '21:24:17', 'Abdou Majeed ALIDOU', '::1', 0),
(1017, 'Cons-01-location-conf', '', '', '2021-06-14', '21:25:17', 'Abdou Majeed ALIDOU', '::1', 0),
(1018, 'Cons-01-location-conf', '', '', '2021-06-14', '21:25:32', 'Abdou Majeed ALIDOU', '::1', 0),
(1019, 'Cons-01-location-conf', '', '', '2021-06-14', '21:25:54', 'Abdou Majeed ALIDOU', '::1', 0),
(1020, 'Cons-01-location-conf', '', '', '2021-06-14', '21:26:12', 'Abdou Majeed ALIDOU', '::1', 0),
(1021, 'Cons-01-location-conf', '', '', '2021-06-14', '21:26:29', 'Abdou Majeed ALIDOU', '::1', 0),
(1022, 'Cons-01-location-conf', '', '', '2021-06-14', '21:26:49', 'Abdou Majeed ALIDOU', '::1', 0),
(1023, 'Cons-01-location-conf', '', '', '2021-06-14', '21:27:07', 'Abdou Majeed ALIDOU', '::1', 0),
(1024, 'Cons-01-location-conf', '', '', '2021-06-14', '21:27:33', 'Abdou Majeed ALIDOU', '::1', 0),
(1025, 'Cons-01-location-conf', '', '', '2021-06-14', '21:28:47', 'Abdou Majeed ALIDOU', '::1', 0),
(1026, 'Cons-01-location-conf', '', '', '2021-06-14', '21:53:49', 'Abdou Majeed ALIDOU', '::1', 0),
(1027, 'Cons-01-location-conf', '', '', '2021-06-15', '08:01:16', 'Abdou Majeed ALIDOU', '::1', 0),
(1028, 'Cons-01-location-conf', '', '', '2021-06-15', '08:01:47', 'Abdou Majeed ALIDOU', '::1', 0),
(1029, 'Cons-01-location-conf', '', '', '2021-06-15', '08:08:41', 'Abdou Majeed ALIDOU', '::1', 0),
(1030, 'Exp-01-location-conf', 'PDF', '', '2021-06-15', '08:08:45', 'Abdou Majeed ALIDOU', '::1', 0),
(1031, 'Exp-01-location-conf', 'PDF', '', '2021-06-15', '08:09:40', 'Abdou Majeed ALIDOU', '::1', 0),
(1032, 'Cons-01-location-conf', '', '', '2021-06-15', '08:09:45', 'Abdou Majeed ALIDOU', '::1', 0),
(1033, 'Cons-01-location-conf', '', '', '2021-06-15', '08:15:16', 'Abdou Majeed ALIDOU', '::1', 0),
(1034, 'Info-01-location-conf', '5', '', '2021-06-15', '08:15:19', 'Abdou Majeed ALIDOU', '::1', 0),
(1035, 'Cons-01-location-conf', '', '', '2021-06-15', '08:15:35', 'Abdou Majeed ALIDOU', '::1', 0),
(1036, 'Cons-01-location-conf', '', '', '2021-06-15', '08:24:17', 'Abdou Majeed ALIDOU', '::1', 0),
(1037, 'Cons-01-location-conf', '', '', '2021-06-15', '08:24:58', 'Abdou Majeed ALIDOU', '::1', 0),
(1038, 'Modif-01-location-conf', '5', '', '2021-06-15', '08:25:07', 'Abdou Majeed ALIDOU', '::1', 0),
(1039, 'Modif-01-location-conf', '1', '', '2021-06-15', '08:25:13', 'Abdou Majeed ALIDOU', '::1', 0);
INSERT INTO `addlog_table` (`id_addlog_table`, `CodeEvenement`, `ParametresEvenement`, `MessageEvenement`, `DateEvenement`, `HeureEvenement`, `PseudoUtilisateur`, `AdresseIP`, `IdCompte`) VALUES
(1040, 'Cons-01-location-conf', '', '', '2021-06-15', '08:25:35', 'Abdou Majeed ALIDOU', '::1', 0),
(1041, 'Cons-01-location-conf', '', '', '2021-06-15', '08:26:08', 'Abdou Majeed ALIDOU', '::1', 0),
(1042, 'Modif-01-location-conf', '2', '', '2021-06-15', '08:26:16', 'Abdou Majeed ALIDOU', '::1', 0),
(1043, 'Cons-01-location-conf', '', '', '2021-06-15', '08:26:21', 'Abdou Majeed ALIDOU', '::1', 0),
(1044, 'Modif-01-location-conf', '2', '', '2021-06-15', '08:26:28', 'Abdou Majeed ALIDOU', '::1', 0),
(1045, 'Info-01-location-conf', '2', '', '2021-06-15', '08:26:32', 'Abdou Majeed ALIDOU', '::1', 0),
(1046, 'Cons-01-location-conf', '', '', '2021-06-15', '08:37:03', 'Abdou Majeed ALIDOU', '::1', 0),
(1047, 'Cons-01-location-conf', '', '', '2021-06-15', '08:39:12', 'Abdou Majeed ALIDOU', '::1', 0),
(1048, 'Cons-01-location-conf', '', '', '2021-06-15', '08:48:42', 'Abdou Majeed ALIDOU', '::1', 0),
(1049, 'Cons-01-location-conf', '', '', '2021-06-15', '08:48:57', 'Abdou Majeed ALIDOU', '::1', 0),
(1050, 'Cons-01-location-conf', '', '', '2021-06-15', '08:49:46', 'Abdou Majeed ALIDOU', '::1', 0),
(1051, 'Cons-01-location-conf', '', '', '2021-06-15', '08:52:00', 'Abdou Majeed ALIDOU', '::1', 0),
(1052, 'Modif-01-location-conf', '2', '', '2021-06-15', '08:52:09', 'Abdou Majeed ALIDOU', '::1', 0),
(1053, 'Cons-01-location-conf', '', '', '2021-06-15', '08:52:20', 'Abdou Majeed ALIDOU', '::1', 0),
(1054, 'Modif-01-location-conf', '2', '', '2021-06-15', '08:52:31', 'Abdou Majeed ALIDOU', '::1', 0),
(1055, 'Cons-01-location-conf', '', '', '2021-06-15', '08:53:10', 'Abdou Majeed ALIDOU', '::1', 0),
(1056, 'Modif-01-location-conf', '2', '', '2021-06-15', '08:53:26', 'Abdou Majeed ALIDOU', '::1', 0),
(1057, 'Modif-01-location-conf', '2', '', '2021-06-15', '08:53:48', 'Abdou Majeed ALIDOU', '::1', 0),
(1058, 'Cons-01-location-conf', '', '', '2021-06-15', '08:55:04', 'Abdou Majeed ALIDOU', '::1', 0),
(1059, 'Modif-01-location-conf', '2', '', '2021-06-15', '08:55:18', 'Abdou Majeed ALIDOU', '::1', 0),
(1060, 'Modif-01-location-conf', '2', '', '2021-06-15', '09:09:58', 'Abdou Majeed ALIDOU', '::1', 0),
(1061, 'Cons-01-location-conf', '', '', '2021-06-15', '09:12:12', 'Abdou Majeed ALIDOU', '::1', 0),
(1062, 'Cons-01-location-conf', '', '', '2021-06-15', '09:23:52', 'Abdou Majeed ALIDOU', '::1', 0),
(1063, 'Cons-01-location-conf', '', '', '2021-06-15', '09:24:52', 'Abdou Majeed ALIDOU', '::1', 0),
(1064, 'Cons-01-location-conf', '', '', '2021-06-15', '09:26:19', 'Abdou Majeed ALIDOU', '::1', 0),
(1065, 'Cons-01-location-conf', '', '', '2021-06-15', '09:26:57', 'Abdou Majeed ALIDOU', '::1', 0),
(1066, 'Cons-01-location-conf', '', '', '2021-06-15', '09:27:20', 'Abdou Majeed ALIDOU', '::1', 0),
(1067, 'Cons-01-location-conf', '', '', '2021-06-15', '09:28:04', 'Abdou Majeed ALIDOU', '::1', 0),
(1068, 'Cons-01-location-conf', '', '', '2021-06-15', '09:28:53', 'Abdou Majeed ALIDOU', '::1', 0),
(1069, 'Cons-01-location-conf', '', '', '2021-06-15', '09:30:30', 'Abdou Majeed ALIDOU', '::1', 0),
(1070, 'Cons-01-location-conf', '', '', '2021-06-15', '09:36:37', 'Abdou Majeed ALIDOU', '::1', 0),
(1071, 'Cons-01-location-conf', '', '', '2021-06-15', '11:24:33', 'Abdou Majeed ALIDOU', '::1', 0),
(1072, 'Cons-01-location-conf', '', '', '2021-06-15', '11:25:12', 'Abdou Majeed ALIDOU', '::1', 0),
(1073, 'Cons-01-location-conf', '', '', '2021-06-15', '12:33:46', 'Abdou Majeed ALIDOU', '::1', 0),
(1074, 'Cons-01-location-conf', '', '', '2021-06-15', '12:37:02', 'Abdou Majeed ALIDOU', '::1', 0),
(1075, 'Cons-01-location-conf', '', '', '2021-06-15', '12:38:11', 'Abdou Majeed ALIDOU', '::1', 0),
(1076, 'Cons-01-location-conf', '', '', '2021-06-15', '12:52:08', 'Abdou Majeed ALIDOU', '::1', 0),
(1077, 'Cons-01-location-conf', '', '', '2021-06-15', '12:52:57', 'Abdou Majeed ALIDOU', '::1', 0),
(1078, 'Cons-01-location-conf', '', '', '2021-06-15', '12:57:35', 'Abdou Majeed ALIDOU', '::1', 0),
(1079, 'Cons-01-location-conf', '', '', '2021-06-15', '13:00:29', 'Abdou Majeed ALIDOU', '::1', 0),
(1080, 'Cons-01-location-conf', '', '', '2021-06-15', '13:01:04', 'Abdou Majeed ALIDOU', '::1', 0),
(1081, 'Cons-01-location-conf', '', '', '2021-06-15', '13:06:43', 'Abdou Majeed ALIDOU', '::1', 0),
(1082, 'Cons-01-location-conf', '', '', '2021-06-15', '13:07:37', 'Abdou Majeed ALIDOU', '::1', 0),
(1083, 'Cons-01-location-conf', '', '', '2021-06-15', '13:08:00', 'Abdou Majeed ALIDOU', '::1', 0),
(1084, 'Cons-01-location-conf', '', '', '2021-06-15', '13:08:19', 'Abdou Majeed ALIDOU', '::1', 0),
(1085, 'Modif-01-location-conf', '2', '', '2021-06-15', '13:09:01', 'Abdou Majeed ALIDOU', '::1', 0),
(1086, 'Cons-01-location-conf', '', '', '2021-06-15', '13:31:03', 'Abdou Majeed ALIDOU', '::1', 0),
(1087, 'Cons-01-location-conf', '', '', '2021-06-15', '14:34:41', 'Abdou Majeed ALIDOU', '::1', 0),
(1088, 'Enr-01-location-conf', '6', '', '2021-06-15', '14:36:24', 'Abdou Majeed ALIDOU', '::1', 0),
(1089, 'Info-01-location-conf', '6', '', '2021-06-15', '14:36:34', 'Abdou Majeed ALIDOU', '::1', 0),
(1090, 'Modif-01-location-conf', '6', '', '2021-06-15', '14:38:39', 'Abdou Majeed ALIDOU', '::1', 0),
(1091, 'Chg-01-location-conf', '5,Inactif', '', '2021-06-15', '14:38:50', 'Abdou Majeed ALIDOU', '::1', 0),
(1092, 'Chg-01-location-conf', '2,Inactif', '', '2021-06-15', '14:39:27', 'Abdou Majeed ALIDOU', '::1', 0),
(1093, 'Exp-01-location-conf', 'PDF', '', '2021-06-15', '14:39:39', 'Abdou Majeed ALIDOU', '::1', 0),
(1094, 'Cons-01-location-conf', '', '', '2021-06-15', '14:39:48', 'Abdou Majeed ALIDOU', '::1', 0),
(1095, 'Cons-01-location-conf', '', '', '2021-06-15', '14:41:04', 'Abdou Majeed ALIDOU', '::1', 0),
(1096, 'Cons-01-location-conf', '', '', '2021-06-15', '14:50:02', 'Abdou Majeed ALIDOU', '::1', 0),
(1097, 'Modif-01-location-conf', '6', '', '2021-06-15', '15:32:45', 'Abdou Majeed ALIDOU', '::1', 0),
(1098, 'Connex-01', '', '', '2021-06-16', '08:04:04', 'Abdou Majeed ALIDOU', '::1', 0),
(1099, 'Cons-01-dashboard', '', '', '2021-06-16', '08:04:04', 'Abdou Majeed ALIDOU', '::1', 0),
(1100, 'Cons-01-location-conf', '', '', '2021-06-16', '08:04:33', 'Abdou Majeed ALIDOU', '::1', 0),
(1101, 'Cons-01-location-conf', '', '', '2021-06-16', '08:04:54', 'Abdou Majeed ALIDOU', '::1', 0),
(1102, 'Cons-01-location-conf', '', '', '2021-06-16', '08:05:07', 'Abdou Majeed ALIDOU', '::1', 0),
(1103, 'Exp-01-location-conf', 'PDF', '', '2021-06-16', '08:05:16', 'Abdou Majeed ALIDOU', '::1', 0),
(1104, 'Cons-01-location-conf', '', '', '2021-06-16', '08:05:31', 'Abdou Majeed ALIDOU', '::1', 0),
(1105, 'Connex-01', '', '', '2021-06-16', '08:06:24', 'Abdou Majeed ALIDOU', '::1', 0),
(1106, 'Cons-01-dashboard', '', '', '2021-06-16', '08:06:24', 'Abdou Majeed ALIDOU', '::1', 0),
(1107, 'Cons-01-location-conf', '', '', '2021-06-16', '08:06:33', 'Abdou Majeed ALIDOU', '::1', 0),
(1108, 'Cons-01-location-conf', '', '', '2021-06-16', '08:10:12', 'Abdou Majeed ALIDOU', '::1', 0),
(1109, 'Cons-01-location-conf', '', '', '2021-06-16', '08:10:34', 'Abdou Majeed ALIDOU', '::1', 0),
(1110, 'Cons-01-location-conf', '', '', '2021-06-16', '08:40:54', 'Abdou Majeed ALIDOU', '::1', 0),
(1111, 'Cons-01-location-conf', '', '', '2021-06-16', '08:46:30', 'Abdou Majeed ALIDOU', '::1', 0),
(1112, 'Cons-01-location-conf', '', '', '2021-06-16', '08:47:16', 'Abdou Majeed ALIDOU', '::1', 0),
(1113, 'Cons-01-location-conf', '', '', '2021-06-16', '08:47:33', 'Abdou Majeed ALIDOU', '::1', 0),
(1114, 'Cons-01-location-conf', '', '', '2021-06-16', '08:49:03', 'Abdou Majeed ALIDOU', '::1', 0),
(1115, 'Cons-01-location-conf', '', '', '2021-06-16', '08:49:23', 'Abdou Majeed ALIDOU', '::1', 0),
(1116, 'Cons-01-location-conf', '', '', '2021-06-16', '08:49:32', 'Abdou Majeed ALIDOU', '::1', 0),
(1117, 'Cons-01-location-conf', '', '', '2021-06-16', '08:51:53', 'Abdou Majeed ALIDOU', '::1', 0),
(1118, 'Cons-01-location-conf', '', '', '2021-06-16', '08:52:57', 'Abdou Majeed ALIDOU', '::1', 0),
(1119, 'Cons-01-location-conf', '', '', '2021-06-16', '08:53:48', 'Abdou Majeed ALIDOU', '::1', 0),
(1120, 'Cons-01-location-conf', '', '', '2021-06-16', '08:53:57', 'Abdou Majeed ALIDOU', '::1', 0),
(1121, 'Cons-01-location-conf', '', '', '2021-06-16', '08:54:16', 'Abdou Majeed ALIDOU', '::1', 0),
(1122, 'Cons-01-location-conf', '', '', '2021-06-16', '08:56:10', 'Abdou Majeed ALIDOU', '::1', 0),
(1123, 'Cons-01-location-conf', '', '', '2021-06-16', '08:56:47', 'Abdou Majeed ALIDOU', '::1', 0),
(1124, 'Cons-01-location-conf', '', '', '2021-06-16', '08:59:33', 'Abdou Majeed ALIDOU', '::1', 0),
(1125, 'Cons-01-location-conf', '', '', '2021-06-16', '09:52:00', 'Abdou Majeed ALIDOU', '::1', 0),
(1126, 'Enr-01-location-conf', '0', '', '2021-06-16', '09:52:51', 'Abdou Majeed ALIDOU', '::1', 0),
(1127, 'Enr-01-location-conf', '0', '', '2021-06-16', '09:56:35', 'Abdou Majeed ALIDOU', '::1', 0),
(1128, 'Cons-01-location-conf', '', '', '2021-06-16', '09:56:48', 'Abdou Majeed ALIDOU', '::1', 0),
(1129, 'Enr-01-location-conf', '9', '', '2021-06-16', '09:59:37', 'Abdou Majeed ALIDOU', '::1', 0),
(1130, 'Cons-01-location-conf', '', '', '2021-06-16', '10:42:28', 'Abdou Majeed ALIDOU', '::1', 0),
(1131, 'Cons-01-location-conf', '', '', '2021-06-16', '10:42:53', 'Abdou Majeed ALIDOU', '::1', 0),
(1132, 'Cons-01-location-conf', '', '', '2021-06-16', '10:45:10', 'Abdou Majeed ALIDOU', '::1', 0),
(1133, 'Cons-01-location-conf', '', '', '2021-06-16', '10:51:15', 'Abdou Majeed ALIDOU', '::1', 0),
(1134, 'Cons-01-location-conf', '', '', '2021-06-16', '11:01:01', 'Abdou Majeed ALIDOU', '::1', 0),
(1135, 'Cons-01-location-conf', '', '', '2021-06-16', '11:02:00', 'Abdou Majeed ALIDOU', '::1', 0),
(1136, 'Cons-01-location-conf', '', '', '2021-06-16', '11:03:02', 'Abdou Majeed ALIDOU', '::1', 0),
(1137, 'Cons-01-location-conf', '', '', '2021-06-16', '11:04:29', 'Abdou Majeed ALIDOU', '::1', 0),
(1138, 'Cons-01-location-conf', '', '', '2021-06-16', '11:04:43', 'Abdou Majeed ALIDOU', '::1', 0),
(1139, 'Cons-01-location-conf', '', '', '2021-06-16', '11:05:18', 'Abdou Majeed ALIDOU', '::1', 0),
(1140, 'Cons-01-location-conf', '', '', '2021-06-16', '11:05:45', 'Abdou Majeed ALIDOU', '::1', 0),
(1141, 'Cons-01-location-conf', '', '', '2021-06-16', '11:06:08', 'Abdou Majeed ALIDOU', '::1', 0),
(1142, 'Cons-01-location-conf', '', '', '2021-06-16', '11:06:24', 'Abdou Majeed ALIDOU', '::1', 0),
(1143, 'Cons-01-location-conf', '', '', '2021-06-16', '11:06:39', 'Abdou Majeed ALIDOU', '::1', 0),
(1144, 'Cons-01-location-conf', '', '', '2021-06-16', '11:07:14', 'Abdou Majeed ALIDOU', '::1', 0),
(1145, 'Cons-01-location-conf', '', '', '2021-06-16', '11:13:34', 'Abdou Majeed ALIDOU', '::1', 0),
(1146, 'Cons-01-location-conf', '', '', '2021-06-16', '11:13:45', 'Abdou Majeed ALIDOU', '::1', 0),
(1147, 'Cons-01-location-conf', '', '', '2021-06-16', '11:13:58', 'Abdou Majeed ALIDOU', '::1', 0),
(1148, 'Cons-01-location-conf', '', '', '2021-06-16', '11:14:20', 'Abdou Majeed ALIDOU', '::1', 0),
(1149, 'Cons-01-location-conf', '', '', '2021-06-16', '11:15:43', 'Abdou Majeed ALIDOU', '::1', 0),
(1150, 'Cons-01-location-conf', '', '', '2021-06-16', '11:16:19', 'Abdou Majeed ALIDOU', '::1', 0),
(1151, 'Cons-01-location-conf', '', '', '2021-06-16', '11:17:01', 'Abdou Majeed ALIDOU', '::1', 0),
(1152, 'Cons-01-location-conf', '', '', '2021-06-16', '11:18:11', 'Abdou Majeed ALIDOU', '::1', 0),
(1153, 'Cons-01-location-conf', '', '', '2021-06-16', '11:20:15', 'Abdou Majeed ALIDOU', '::1', 0),
(1154, 'Cons-01-location-conf', '', '', '2021-06-16', '11:20:51', 'Abdou Majeed ALIDOU', '::1', 0),
(1155, 'Cons-01-location-conf', '', '', '2021-06-16', '11:21:35', 'Abdou Majeed ALIDOU', '::1', 0),
(1156, 'Cons-01-location-conf', '', '', '2021-06-16', '11:22:20', 'Abdou Majeed ALIDOU', '::1', 0),
(1157, 'Enr-01-location-conf', '0', '', '2021-06-16', '11:22:32', 'Abdou Majeed ALIDOU', '::1', 0),
(1158, 'Cons-01-location-conf', '', '', '2021-06-16', '11:23:13', 'Abdou Majeed ALIDOU', '::1', 0),
(1159, 'Cons-01-location-conf', '', '', '2021-06-16', '11:24:23', 'Abdou Majeed ALIDOU', '::1', 0),
(1160, 'Cons-01-location-conf', '', '', '2021-06-16', '11:24:51', 'Abdou Majeed ALIDOU', '::1', 0),
(1161, 'Cons-01-location-conf', '', '', '2021-06-16', '11:25:42', 'Abdou Majeed ALIDOU', '::1', 0),
(1162, 'Cons-01-location-conf', '', '', '2021-06-16', '11:26:17', 'Abdou Majeed ALIDOU', '::1', 0),
(1163, 'Cons-01-location-conf', '', '', '2021-06-16', '11:28:46', 'Abdou Majeed ALIDOU', '::1', 0),
(1164, 'Cons-01-location-conf', '', '', '2021-06-16', '11:29:32', 'Abdou Majeed ALIDOU', '::1', 0),
(1165, 'Cons-01-location-conf', '', '', '2021-06-16', '11:29:55', 'Abdou Majeed ALIDOU', '::1', 0),
(1166, 'Cons-01-location-conf', '', '', '2021-06-16', '11:32:17', 'Abdou Majeed ALIDOU', '::1', 0),
(1167, 'Modif-01-location-conf', '9', '', '2021-06-16', '11:32:43', 'Abdou Majeed ALIDOU', '::1', 0),
(1168, 'Chg-01-location-conf', '9,Inactif', '', '2021-06-16', '11:32:50', 'Abdou Majeed ALIDOU', '::1', 0),
(1169, 'Cons-01-location-conf', '', '', '2021-06-16', '11:33:22', 'Abdou Majeed ALIDOU', '::1', 0),
(1170, 'Cons-01-location-conf', '', '', '2021-06-16', '11:37:03', 'Abdou Majeed ALIDOU', '::1', 0),
(1171, 'Cons-01-location-conf', '', '', '2021-06-16', '11:37:44', 'Abdou Majeed ALIDOU', '::1', 0),
(1172, 'Cons-01-location-conf', '', '', '2021-06-16', '11:38:07', 'Abdou Majeed ALIDOU', '::1', 0),
(1173, 'Cons-01-location-conf', '', '', '2021-06-16', '11:42:01', 'Abdou Majeed ALIDOU', '::1', 0),
(1174, 'Cons-01-location-conf', '', '', '2021-06-16', '11:42:39', 'Abdou Majeed ALIDOU', '::1', 0),
(1175, 'Cons-01-location-conf', '', '', '2021-06-16', '11:46:16', 'Abdou Majeed ALIDOU', '::1', 0),
(1176, 'Cons-01-location-conf', '', '', '2021-06-16', '11:47:16', 'Abdou Majeed ALIDOU', '::1', 0),
(1177, 'Info-01-location-conf', '6', '', '2021-06-16', '11:48:01', 'Abdou Majeed ALIDOU', '::1', 0),
(1178, 'Enr-01-location-conf', '11', '', '2021-06-16', '11:49:30', 'Abdou Majeed ALIDOU', '::1', 0),
(1179, 'Cons-01-location-conf', '', '', '2021-06-16', '11:52:29', 'Abdou Majeed ALIDOU', '::1', 0),
(1180, 'Cons-01-location-conf', '', '', '2021-06-16', '11:54:44', 'Abdou Majeed ALIDOU', '::1', 0),
(1181, 'Enr-01-location-conf', '12', '', '2021-06-16', '11:56:41', 'Abdou Majeed ALIDOU', '::1', 0),
(1182, 'Cons-01-location-conf', '', '', '2021-06-16', '12:00:19', 'Abdou Majeed ALIDOU', '::1', 0),
(1183, 'Cons-01-location-conf', '', '', '2021-06-16', '12:02:42', 'Abdou Majeed ALIDOU', '::1', 0),
(1184, 'Cons-01-location-conf', '', '', '2021-06-16', '12:03:06', 'Abdou Majeed ALIDOU', '::1', 0),
(1185, 'Cons-01-location-conf', '', '', '2021-06-16', '12:04:06', 'Abdou Majeed ALIDOU', '::1', 0),
(1186, 'Cons-01-location-conf', '', '', '2021-06-16', '12:06:59', 'Abdou Majeed ALIDOU', '::1', 0),
(1187, 'Cons-01-location-conf', '', '', '2021-06-16', '12:08:35', 'Abdou Majeed ALIDOU', '::1', 0),
(1188, 'Cons-01-location-conf', '', '', '2021-06-16', '12:09:27', 'Abdou Majeed ALIDOU', '::1', 0),
(1189, 'Cons-01-location-conf', '', '', '2021-06-16', '12:10:10', 'Abdou Majeed ALIDOU', '::1', 0),
(1190, 'Cons-01-location-conf', '', '', '2021-06-16', '12:10:52', 'Abdou Majeed ALIDOU', '::1', 0),
(1191, 'Cons-01-location-conf', '', '', '2021-06-16', '12:12:54', 'Abdou Majeed ALIDOU', '::1', 0),
(1192, 'Cons-01-location-conf', '', '', '2021-06-16', '12:14:19', 'Abdou Majeed ALIDOU', '::1', 0),
(1193, 'Cons-01-location-conf', '', '', '2021-06-16', '12:15:03', 'Abdou Majeed ALIDOU', '::1', 0),
(1194, 'Cons-01-location-conf', '', '', '2021-06-16', '12:15:30', 'Abdou Majeed ALIDOU', '::1', 0),
(1195, 'Cons-01-location-conf', '', '', '2021-06-16', '12:15:49', 'Abdou Majeed ALIDOU', '::1', 0),
(1196, 'Cons-01-location-conf', '', '', '2021-06-16', '12:16:13', 'Abdou Majeed ALIDOU', '::1', 0),
(1197, 'Chg-01-location-conf', '12,Inactif', '', '2021-06-16', '12:17:22', 'Abdou Majeed ALIDOU', '::1', 0),
(1198, 'Cons-01-location-conf', '', '', '2021-06-16', '12:18:26', 'Abdou Majeed ALIDOU', '::1', 0),
(1199, 'Cons-01-location-conf', '', '', '2021-06-16', '12:20:41', 'Abdou Majeed ALIDOU', '::1', 0),
(1200, 'Cons-01-location-conf', '', '', '2021-06-16', '12:21:01', 'Abdou Majeed ALIDOU', '::1', 0),
(1201, 'Cons-01-location-conf', '', '', '2021-06-16', '12:33:53', 'Abdou Majeed ALIDOU', '::1', 0),
(1202, 'Cons-01-location-conf', '', '', '2021-06-16', '12:36:25', 'Abdou Majeed ALIDOU', '::1', 0),
(1203, 'Cons-01-location-conf', '', '', '2021-06-16', '12:37:54', 'Abdou Majeed ALIDOU', '::1', 0),
(1204, 'Cons-01-location-conf', '', '', '2021-06-16', '12:39:14', 'Abdou Majeed ALIDOU', '::1', 0),
(1205, 'Cons-01-location-conf', '', '', '2021-06-16', '12:43:00', 'Abdou Majeed ALIDOU', '::1', 0),
(1206, 'Cons-01-location-conf', '', '', '2021-06-16', '14:15:27', 'Abdou Majeed ALIDOU', '::1', 0),
(1207, 'Cons-01-location-conf', '', '', '2021-06-16', '14:16:08', 'Abdou Majeed ALIDOU', '::1', 0),
(1208, 'Cons-01-location-conf', '', '', '2021-06-16', '14:16:53', 'Abdou Majeed ALIDOU', '::1', 0),
(1209, 'Cons-01-location-conf', '', '', '2021-06-16', '14:21:04', 'Abdou Majeed ALIDOU', '::1', 0),
(1210, 'Cons-01-facture-conf', '', '', '2021-06-16', '14:26:24', 'Abdou Majeed ALIDOU', '::1', 0),
(1211, 'Cons-01-location-conf', '', '', '2021-06-16', '14:26:41', 'Abdou Majeed ALIDOU', '::1', 0),
(1212, 'FacEdit-01-location-conf', '', '', '2021-06-16', '14:27:45', 'Abdou Majeed ALIDOU', '::1', 0),
(1213, 'FacEdit-01-location-conf', '', '', '2021-06-16', '14:30:20', 'Abdou Majeed ALIDOU', '::1', 0),
(1214, 'Cons-01-facture-conf', '', '', '2021-06-16', '14:37:29', 'Abdou Majeed ALIDOU', '::1', 0),
(1215, 'Cons-01-location-conf', '', '', '2021-06-16', '14:38:36', 'Abdou Majeed ALIDOU', '::1', 0),
(1216, 'Cons-01-facture-conf', '', '', '2021-06-16', '14:40:09', 'Abdou Majeed ALIDOU', '::1', 0),
(1217, 'Cons-01-location-conf', '', '', '2021-06-16', '14:40:26', 'Abdou Majeed ALIDOU', '::1', 0),
(1218, 'Cons-01-facture-conf', '', '', '2021-06-16', '14:41:19', 'Abdou Majeed ALIDOU', '::1', 0),
(1219, 'Cons-01-location-conf', '', '', '2021-06-16', '14:41:41', 'Abdou Majeed ALIDOU', '::1', 0),
(1220, 'Cons-01-facture-conf', '', '', '2021-06-16', '14:43:26', 'Abdou Majeed ALIDOU', '::1', 0),
(1221, 'Cons-01-location-conf', '', '', '2021-06-16', '14:44:43', 'Abdou Majeed ALIDOU', '::1', 0),
(1222, 'Cons-01-facture-conf', '', '', '2021-06-16', '14:44:54', 'Abdou Majeed ALIDOU', '::1', 0),
(1223, 'Cons-01-location-conf', '', '', '2021-06-16', '14:45:08', 'Abdou Majeed ALIDOU', '::1', 0),
(1224, 'Cons-01-location-conf', '', '', '2021-06-16', '14:46:01', 'Abdou Majeed ALIDOU', '::1', 0),
(1225, 'Cons-01-facture-conf', '', '', '2021-06-16', '14:47:30', 'Abdou Majeed ALIDOU', '::1', 0),
(1226, 'Cons-01-location-conf', '', '', '2021-06-16', '14:48:23', 'Abdou Majeed ALIDOU', '::1', 0),
(1227, 'Cons-01-facture-conf', '', '', '2021-06-16', '14:51:24', 'Abdou Majeed ALIDOU', '::1', 0),
(1228, 'Cons-01-location-conf', '', '', '2021-06-16', '14:54:45', 'Abdou Majeed ALIDOU', '::1', 0),
(1229, 'Cons-01-facture-conf', '', '', '2021-06-16', '14:55:04', 'Abdou Majeed ALIDOU', '::1', 0),
(1230, 'Cons-01-location-conf', '', '', '2021-06-16', '14:55:24', 'Abdou Majeed ALIDOU', '::1', 0),
(1231, 'Info-01-location-conf', '11', '', '2021-06-16', '14:55:58', 'Abdou Majeed ALIDOU', '::1', 0),
(1232, 'Info-01-location-conf', '11', '', '2021-06-16', '14:56:32', 'Abdou Majeed ALIDOU', '::1', 0),
(1233, 'Info-01-location-conf', '6', '', '2021-06-16', '14:56:48', 'Abdou Majeed ALIDOU', '::1', 0),
(1234, 'Info-01-location-conf', '11', '', '2021-06-16', '14:56:53', 'Abdou Majeed ALIDOU', '::1', 0),
(1235, 'Info-01-location-conf', '11', '', '2021-06-16', '14:57:27', 'Abdou Majeed ALIDOU', '::1', 0),
(1236, 'Cons-01-facture-conf', '', '', '2021-06-16', '15:10:44', 'Abdou Majeed ALIDOU', '::1', 0),
(1237, 'Cons-01-location-conf', '', '', '2021-06-16', '16:05:23', 'Abdou Majeed ALIDOU', '::1', 0),
(1238, 'Info-01-location-conf', '6', '', '2021-06-16', '16:06:52', 'Abdou Majeed ALIDOU', '::1', 0),
(1239, 'Info-01-location-conf', '6', '', '2021-06-16', '16:06:55', 'Abdou Majeed ALIDOU', '::1', 0),
(1240, 'Cons-01-dashboard', '', '', '2021-06-16', '16:19:59', 'Abdou Majeed ALIDOU', '::1', 0),
(1241, 'Cons-01-location-conf', '', '', '2021-06-16', '16:24:01', 'Abdou Majeed ALIDOU', '::1', 0),
(1242, 'Cons-01-salle-conf', '', '', '2021-06-16', '16:24:51', 'Abdou Majeed ALIDOU', '::1', 0),
(1243, 'Info-01-salle-conf', 'futur', '', '2021-06-16', '16:25:09', 'Abdou Majeed ALIDOU', '::1', 0),
(1244, 'Cons-01-carac-conf', '', '', '2021-06-16', '16:25:28', 'Abdou Majeed ALIDOU', '::1', 0),
(1245, 'Cons-01-salle-conf', '', '', '2021-06-16', '16:25:31', 'Abdou Majeed ALIDOU', '::1', 0),
(1246, 'Cons-01-service-conf', '', '', '2021-06-16', '16:25:33', 'Abdou Majeed ALIDOU', '::1', 0),
(1247, 'Info-01-service-conf', 'Décoration', '', '2021-06-16', '16:25:38', 'Abdou Majeed ALIDOU', '::1', 0),
(1248, 'Cons-01-facture-conf', '', '', '2021-06-16', '16:25:55', 'Abdou Majeed ALIDOU', '::1', 0),
(1249, 'Cons-01-location-conf', '', '', '2021-06-16', '16:26:02', 'Abdou Majeed ALIDOU', '::1', 0),
(1250, 'Cons-01-carac-conf', '', '', '2021-06-16', '16:26:07', 'Abdou Majeed ALIDOU', '::1', 0),
(1251, 'Cons-01-location-conf', '', '', '2021-06-16', '16:26:42', 'Abdou Majeed ALIDOU', '::1', 0),
(1252, 'Cons-01-location-conf', '', '', '2021-06-17', '09:52:51', 'Abdou Majeed ALIDOU', '::1', 0),
(1253, 'Cons-01-location-conf', '', '', '2021-06-17', '10:01:39', 'Abdou Majeed ALIDOU', '::1', 0),
(1254, 'FacEdit-01-location-conf', '11', '', '2021-06-17', '10:01:54', 'Abdou Majeed ALIDOU', '::1', 0),
(1255, 'Cons-01-location-conf', '', '', '2021-06-17', '10:02:18', 'Abdou Majeed ALIDOU', '::1', 0),
(1256, 'Cons-01-location-conf', '', '', '2021-06-17', '10:02:52', 'Abdou Majeed ALIDOU', '::1', 0),
(1257, 'Cons-01-location-conf', '', '', '2021-06-17', '10:03:28', 'Abdou Majeed ALIDOU', '::1', 0),
(1258, 'FacEdit-01-location-conf', '11', '', '2021-06-17', '10:04:03', 'Abdou Majeed ALIDOU', '::1', 0),
(1259, 'Cons-01-location-conf', '', '', '2021-06-17', '10:04:56', 'Abdou Majeed ALIDOU', '::1', 0),
(1260, 'FacEdit-01-location-conf', '6', '', '2021-06-17', '10:05:18', 'Abdou Majeed ALIDOU', '::1', 0),
(1261, 'FacEdit-01-location-conf', '1', '', '2021-06-17', '10:05:55', 'Abdou Majeed ALIDOU', '::1', 0),
(1262, 'Cons-01-location-conf', '', '', '2021-06-17', '10:09:20', 'Abdou Majeed ALIDOU', '::1', 0),
(1263, 'Cons-01-location-conf', '', '', '2021-06-17', '10:10:44', 'Abdou Majeed ALIDOU', '::1', 0),
(1264, 'Cons-01-location-conf', '', '', '2021-06-17', '10:21:23', 'Abdou Majeed ALIDOU', '::1', 0),
(1265, 'Cons-01-location-conf', '', '', '2021-06-17', '10:22:35', 'Abdou Majeed ALIDOU', '::1', 0),
(1266, 'Cons-01-location-conf', '', '', '2021-06-17', '10:23:05', 'Abdou Majeed ALIDOU', '::1', 0),
(1267, 'Cons-01-location-conf', '', '', '2021-06-17', '10:23:52', 'Abdou Majeed ALIDOU', '::1', 0),
(1268, 'Cons-01-location-conf', '', '', '2021-06-17', '10:40:12', 'Abdou Majeed ALIDOU', '::1', 0),
(1269, 'Cons-01-location-conf', '', '', '2021-06-17', '10:40:55', 'Abdou Majeed ALIDOU', '::1', 0),
(1270, 'Cons-01-location-conf', '', '', '2021-06-17', '10:41:09', 'Abdou Majeed ALIDOU', '::1', 0),
(1271, 'Cons-01-location-conf', '', '', '2021-06-17', '10:41:35', 'Abdou Majeed ALIDOU', '::1', 0),
(1272, 'Cons-01-location-conf', '', '', '2021-06-17', '10:43:24', 'Abdou Majeed ALIDOU', '::1', 0),
(1273, 'Cons-01-location-conf', '', '', '2021-06-17', '10:45:54', 'Abdou Majeed ALIDOU', '::1', 0),
(1274, 'Cons-01-location-conf', '', '', '2021-06-17', '10:46:10', 'Abdou Majeed ALIDOU', '::1', 0),
(1275, 'Cons-01-location-conf', '', '', '2021-06-17', '10:46:54', 'Abdou Majeed ALIDOU', '::1', 0),
(1276, 'Cons-01-location-conf', '', '', '2021-06-17', '10:47:24', 'Abdou Majeed ALIDOU', '::1', 0),
(1277, 'Cons-01-location-conf', '', '', '2021-06-17', '10:47:35', 'Abdou Majeed ALIDOU', '::1', 0),
(1278, 'Cons-01-location-conf', '', '', '2021-06-17', '10:47:48', 'Abdou Majeed ALIDOU', '::1', 0),
(1279, 'Cons-01-location-conf', '', '', '2021-06-17', '10:52:24', 'Abdou Majeed ALIDOU', '::1', 0),
(1280, 'Cons-01-location-conf', '', '', '2021-06-17', '10:52:41', 'Abdou Majeed ALIDOU', '::1', 0),
(1281, 'Cons-01-location-conf', '', '', '2021-06-17', '10:52:54', 'Abdou Majeed ALIDOU', '::1', 0),
(1282, 'Cons-01-location-conf', '', '', '2021-06-17', '10:53:00', 'Abdou Majeed ALIDOU', '::1', 0),
(1283, 'Cons-01-location-conf', '', '', '2021-06-17', '10:53:27', 'Abdou Majeed ALIDOU', '::1', 0),
(1284, 'Cons-01-location-conf', '', '', '2021-06-17', '10:53:42', 'Abdou Majeed ALIDOU', '::1', 0),
(1285, 'Cons-01-location-conf', '', '', '2021-06-17', '10:53:57', 'Abdou Majeed ALIDOU', '::1', 0),
(1286, 'Cons-01-location-conf', '', '', '2021-06-17', '10:54:37', 'Abdou Majeed ALIDOU', '::1', 0),
(1287, 'Cons-01-location-conf', '', '', '2021-06-17', '10:56:03', 'Abdou Majeed ALIDOU', '::1', 0),
(1288, 'Cons-01-location-conf', '', '', '2021-06-17', '10:58:23', 'Abdou Majeed ALIDOU', '::1', 0),
(1289, 'Cons-01-location-conf', '', '', '2021-06-17', '10:59:03', 'Abdou Majeed ALIDOU', '::1', 0),
(1290, 'Cons-01-location-conf', '', '', '2021-06-17', '11:03:37', 'Abdou Majeed ALIDOU', '::1', 0),
(1291, 'Cons-01-location-conf', '', '', '2021-06-17', '11:04:14', 'Abdou Majeed ALIDOU', '::1', 0),
(1292, 'Cons-01-location-conf', '', '', '2021-06-17', '11:05:55', 'Abdou Majeed ALIDOU', '::1', 0),
(1293, 'Cons-01-location-conf', '', '', '2021-06-17', '11:08:44', 'Abdou Majeed ALIDOU', '::1', 0),
(1294, 'Enr-01-location-conf', '13', '', '2021-06-17', '11:09:08', 'Abdou Majeed ALIDOU', '::1', 0),
(1295, 'Cons-01-location-conf', '', '', '2021-06-17', '11:11:13', 'Abdou Majeed ALIDOU', '::1', 0),
(1296, 'Cons-01-location-conf', '', '', '2021-06-17', '11:12:01', 'Abdou Majeed ALIDOU', '::1', 0),
(1297, 'Cons-01-location-conf', '', '', '2021-06-17', '11:14:03', 'Abdou Majeed ALIDOU', '::1', 0),
(1298, 'Exp-01-location-conf', 'PDF', '', '2021-06-17', '11:14:58', 'Abdou Majeed ALIDOU', '::1', 0),
(1299, 'Cons-01-location-conf', '', '', '2021-06-17', '11:15:01', 'Abdou Majeed ALIDOU', '::1', 0),
(1300, 'Cons-01-location-conf', '', '', '2021-06-17', '11:17:25', 'Abdou Majeed ALIDOU', '::1', 0),
(1301, 'Enr-01-location-conf', '14', '', '2021-06-17', '11:17:39', 'Abdou Majeed ALIDOU', '::1', 0),
(1302, 'Enr-01-location-conf', '15', '', '2021-06-17', '11:20:20', 'Abdou Majeed ALIDOU', '::1', 0),
(1303, 'Cons-01-location-conf', '', '', '2021-06-17', '11:20:41', 'Abdou Majeed ALIDOU', '::1', 0),
(1304, 'Enr-01-location-conf', '0', '', '2021-06-17', '11:21:00', 'Abdou Majeed ALIDOU', '::1', 0),
(1305, 'Enr-01-location-conf', '0', '', '2021-06-17', '11:21:04', 'Abdou Majeed ALIDOU', '::1', 0),
(1306, 'Enr-01-location-conf', '16', '', '2021-06-17', '11:21:30', 'Abdou Majeed ALIDOU', '::1', 0),
(1307, 'Enr-01-location-conf', '17', '', '2021-06-17', '11:24:53', 'Abdou Majeed ALIDOU', '::1', 0),
(1308, 'Cons-01-location-conf', '', '', '2021-06-17', '11:33:12', 'Abdou Majeed ALIDOU', '::1', 0),
(1309, 'Cons-01-location-conf', '', '', '2021-06-17', '11:36:11', 'Abdou Majeed ALIDOU', '::1', 0),
(1310, 'Cons-01-location-conf', '', '', '2021-06-17', '11:37:34', 'Abdou Majeed ALIDOU', '::1', 0),
(1311, 'Cons-01-location-conf', '', '', '2021-06-17', '11:44:30', 'Abdou Majeed ALIDOU', '::1', 0),
(1312, 'Info-01-location-conf', '17', '', '2021-06-17', '11:44:34', 'Abdou Majeed ALIDOU', '::1', 0),
(1313, 'Info-01-location-conf', '17', '', '2021-06-17', '11:45:12', 'Abdou Majeed ALIDOU', '::1', 0),
(1314, 'Info-01-location-conf', '17', '', '2021-06-17', '11:45:26', 'Abdou Majeed ALIDOU', '::1', 0),
(1315, 'Info-01-location-conf', '16', '', '2021-06-17', '11:46:12', 'Abdou Majeed ALIDOU', '::1', 0),
(1316, 'Cons-01-location-conf', '', '', '2021-06-17', '11:51:18', 'Abdou Majeed ALIDOU', '::1', 0),
(1317, 'Modif-01-location-conf', '16', '', '2021-06-17', '11:51:36', 'Abdou Majeed ALIDOU', '::1', 0),
(1318, 'Modif-01-location-conf', '16', '', '2021-06-17', '11:52:01', 'Abdou Majeed ALIDOU', '::1', 0),
(1319, 'Chg-01-location-conf', '17,Inactif', '', '2021-06-17', '11:55:49', 'Abdou Majeed ALIDOU', '::1', 0),
(1320, 'Chg-01-location-conf', '16,Inactif', '', '2021-06-17', '11:55:55', 'Abdou Majeed ALIDOU', '::1', 0),
(1321, 'Chg-01-location-conf', '11,Inactif', '', '2021-06-17', '11:56:01', 'Abdou Majeed ALIDOU', '::1', 0),
(1322, 'Chg-01-location-conf', '15,Inactif', '', '2021-06-17', '11:56:05', 'Abdou Majeed ALIDOU', '::1', 0),
(1323, 'Chg-01-location-conf', '14,Inactif', '', '2021-06-17', '11:56:10', 'Abdou Majeed ALIDOU', '::1', 0),
(1324, 'Chg-01-location-conf', '13,Inactif', '', '2021-06-17', '11:56:14', 'Abdou Majeed ALIDOU', '::1', 0),
(1325, 'Cons-01-location-conf', '', '', '2021-06-17', '11:56:20', 'Abdou Majeed ALIDOU', '::1', 0),
(1326, 'Cons-01-location-conf', '', '', '2021-06-17', '11:57:10', 'Abdou Majeed ALIDOU', '::1', 0),
(1327, 'Cons-01-location-conf', '', '', '2021-06-17', '11:57:13', 'Abdou Majeed ALIDOU', '::1', 0),
(1328, 'Cons-01-salle-conf', '', '', '2021-06-17', '11:57:47', 'Abdou Majeed ALIDOU', '::1', 0),
(1329, 'Modif-01-salle-conf', 'Futur', '', '2021-06-17', '11:58:24', 'Abdou Majeed ALIDOU', '::1', 0),
(1330, 'Chg-01-salle-conf', 'Xtra,Inactif', '', '2021-06-17', '11:58:38', 'Abdou Majeed ALIDOU', '::1', 0),
(1331, 'Cons-01-location-conf', '', '', '2021-06-17', '11:58:42', 'Abdou Majeed ALIDOU', '::1', 0),
(1332, 'Cons-01-salle-conf', '', '', '2021-06-17', '11:58:46', 'Abdou Majeed ALIDOU', '::1', 0),
(1333, 'Chg-01-salle-conf', 'Xtra,Actif', '', '2021-06-17', '11:58:51', 'Abdou Majeed ALIDOU', '::1', 0),
(1334, 'Cons-01-location-conf', '', '', '2021-06-17', '11:58:54', 'Abdou Majeed ALIDOU', '::1', 0),
(1335, 'Cons-01-dashboard', '', '', '2021-06-17', '12:01:28', 'Abdou Majeed ALIDOU', '::1', 0),
(1336, 'Cons-01-location-conf', '', '', '2021-06-17', '12:02:27', 'Abdou Majeed ALIDOU', '::1', 0),
(1337, 'Cons-01-location-conf', '', '', '2021-06-17', '12:16:38', 'Abdou Majeed ALIDOU', '::1', 0),
(1338, 'Enr-01-location-conf', '18', '', '2021-06-17', '12:17:07', 'Abdou Majeed ALIDOU', '::1', 0),
(1339, 'Cons-01-location-conf', '', '', '2021-06-17', '12:17:29', 'Abdou Majeed ALIDOU', '::1', 0),
(1340, 'Cons-01-location-conf', '', '', '2021-06-17', '12:17:35', 'Abdou Majeed ALIDOU', '::1', 0),
(1341, 'Cons-01-location-conf', '', '', '2021-06-17', '12:24:07', 'Abdou Majeed ALIDOU', '::1', 0),
(1342, 'Cons-01-location-conf', '', '', '2021-06-17', '13:13:26', 'Abdou Majeed ALIDOU', '::1', 0),
(1343, 'Cons-01-location-conf', '', '', '2021-06-17', '13:16:08', 'Abdou Majeed ALIDOU', '::1', 0),
(1344, 'Cons-01-location-conf', '', '', '2021-06-17', '13:18:25', 'Abdou Majeed ALIDOU', '::1', 0),
(1345, 'Cons-01-location-conf', '', '', '2021-06-17', '13:19:12', 'Abdou Majeed ALIDOU', '::1', 0),
(1346, 'Cons-01-location-conf', '', '', '2021-06-17', '13:19:59', 'Abdou Majeed ALIDOU', '::1', 0),
(1347, 'Cons-01-location-conf', '', '', '2021-06-17', '13:21:02', 'Abdou Majeed ALIDOU', '::1', 0),
(1348, 'Cons-01-location-conf', '', '', '2021-06-17', '13:22:16', 'Abdou Majeed ALIDOU', '::1', 0),
(1349, 'Cons-01-location-conf', '', '', '2021-06-17', '13:22:52', 'Abdou Majeed ALIDOU', '::1', 0),
(1350, 'Cons-01-location-conf', '', '', '2021-06-17', '13:23:23', 'Abdou Majeed ALIDOU', '::1', 0),
(1351, 'Cons-01-location-conf', '', '', '2021-06-17', '13:24:04', 'Abdou Majeed ALIDOU', '::1', 0),
(1352, 'Cons-01-location-conf', '', '', '2021-06-17', '13:24:43', 'Abdou Majeed ALIDOU', '::1', 0),
(1353, 'Cons-01-location-conf', '', '', '2021-06-17', '13:24:57', 'Abdou Majeed ALIDOU', '::1', 0),
(1354, 'Cons-01-location-conf', '', '', '2021-06-17', '13:25:08', 'Abdou Majeed ALIDOU', '::1', 0),
(1355, 'Cons-01-location-conf', '', '', '2021-06-17', '13:26:54', 'Abdou Majeed ALIDOU', '::1', 0),
(1356, 'Cons-01-location-conf', '', '', '2021-06-17', '13:27:32', 'Abdou Majeed ALIDOU', '::1', 0),
(1357, 'Cons-01-location-conf', '', '', '2021-06-17', '13:28:10', 'Abdou Majeed ALIDOU', '::1', 0),
(1358, 'Cons-01-location-conf', '', '', '2021-06-17', '13:28:39', 'Abdou Majeed ALIDOU', '::1', 0),
(1359, 'Cons-01-location-conf', '', '', '2021-06-17', '13:33:53', 'Abdou Majeed ALIDOU', '::1', 0),
(1360, 'Cons-01-location-conf', '', '', '2021-06-17', '13:36:54', 'Abdou Majeed ALIDOU', '::1', 0),
(1361, 'Cons-01-location-conf', '', '', '2021-06-17', '13:38:42', 'Abdou Majeed ALIDOU', '::1', 0),
(1362, 'IndiqPrix-01-location-conf', '18', '', '2021-06-17', '13:47:27', 'Abdou Majeed ALIDOU', '::1', 0),
(1363, 'Cons-01-location-conf', '', '', '2021-06-17', '14:40:49', 'Abdou Majeed ALIDOU', '::1', 0),
(1364, 'Info-01-location-conf', '6', '', '2021-06-17', '14:41:12', 'Abdou Majeed ALIDOU', '::1', 0),
(1365, 'Enr-01-location-conf', '19', '', '2021-06-17', '14:41:36', 'Abdou Majeed ALIDOU', '::1', 0),
(1366, 'Cons-01-location-conf', '', '', '2021-06-17', '14:42:24', 'Abdou Majeed ALIDOU', '::1', 0),
(1367, 'Cons-01-location-conf', '', '', '2021-06-17', '14:54:35', 'Abdou Majeed ALIDOU', '::1', 0),
(1368, 'Info-01-location-conf', '19', '', '2021-06-17', '14:57:36', 'Abdou Majeed ALIDOU', '::1', 0),
(1369, 'Info-01-location-conf', '19', '', '2021-06-17', '14:59:26', 'Abdou Majeed ALIDOU', '::1', 0),
(1370, 'Cons-01-facture-conf', '', '', '2021-06-17', '14:59:43', 'Abdou Majeed ALIDOU', '::1', 0),
(1371, 'Cons-01-location-conf', '', '', '2021-06-17', '15:01:02', 'Abdou Majeed ALIDOU', '::1', 0),
(1372, 'Cons-01-facture-conf', '', '', '2021-06-17', '15:01:04', 'Abdou Majeed ALIDOU', '::1', 0),
(1373, 'Cons-01-location-conf', '', '', '2021-06-17', '15:04:53', 'Abdou Majeed ALIDOU', '::1', 0),
(1374, 'FacEdit-01-location-conf', '18', '', '2021-06-17', '15:12:18', 'Abdou Majeed ALIDOU', '::1', 0),
(1375, 'Connex-01', '', '', '2021-06-28', '07:31:41', 'Abdou Majeed ALIDOU', '::1', 0),
(1376, 'Cons-01-dashboard', '', '', '2021-06-28', '07:31:42', 'Abdou Majeed ALIDOU', '::1', 0),
(1377, 'Cons-01-location-conf', '', '', '2021-06-28', '07:40:06', 'Abdou Majeed ALIDOU', '::1', 0),
(1378, 'Cons-01-facture-conf', '', '', '2021-06-28', '07:44:06', 'Abdou Majeed ALIDOU', '::1', 0),
(1379, 'Cons-01-location-conf', '', '', '2021-06-28', '07:44:11', 'Abdou Majeed ALIDOU', '::1', 0),
(1380, 'Cons-01-facture-conf', '', '', '2021-06-28', '07:48:41', 'Abdou Majeed ALIDOU', '::1', 0),
(1381, 'Cons-01-location-conf', '', '', '2021-06-28', '08:10:14', 'Abdou Majeed ALIDOU', '::1', 0),
(1382, 'Cons-01-facture-conf', '', '', '2021-06-28', '08:14:39', 'Abdou Majeed ALIDOU', '::1', 0),
(1383, 'Cons-01-facture-conf', '', '', '2021-06-28', '08:15:38', 'Abdou Majeed ALIDOU', '::1', 0),
(1384, 'Exp-01-facture-conf', 'PDF', '', '2021-06-28', '08:15:45', 'Abdou Majeed ALIDOU', '::1', 0),
(1385, 'Cons-01-facture-conf', '', '', '2021-06-28', '08:15:47', 'Abdou Majeed ALIDOU', '::1', 0),
(1386, 'Cons-01-facture-conf', '', '', '2021-06-28', '08:19:32', 'Abdou Majeed ALIDOU', '::1', 0),
(1387, 'Cons-01-facture-conf', '', '', '2021-06-28', '08:28:34', 'Abdou Majeed ALIDOU', '::1', 0),
(1388, 'Chg-01-facture-conf', ',Actif', '', '2021-06-28', '08:28:45', 'Abdou Majeed ALIDOU', '::1', 0),
(1389, 'Cons-01-facture-conf', '', '', '2021-06-28', '08:29:22', 'Abdou Majeed ALIDOU', '::1', 0),
(1390, 'Chg-01-facture-conf', '7', '', '2021-06-28', '08:32:19', 'Abdou Majeed ALIDOU', '::1', 0),
(1391, 'Cons-01-facture-conf', '', '', '2021-06-28', '08:34:11', 'Abdou Majeed ALIDOU', '::1', 0),
(1392, 'Cons-01-facture-conf', '', '', '2021-06-28', '08:38:49', 'Abdou Majeed ALIDOU', '::1', 0),
(1393, 'Chg-01-facture-conf', '6', '', '2021-06-28', '08:40:09', 'Abdou Majeed ALIDOU', '::1', 0),
(1394, 'Cons-01-location-conf', '', '', '2021-06-28', '08:40:15', 'Abdou Majeed ALIDOU', '::1', 0),
(1395, 'Cons-01-location-conf', '', '', '2021-06-28', '08:40:20', 'Abdou Majeed ALIDOU', '::1', 0),
(1396, 'Cons-01-location-conf', '', '', '2021-06-28', '08:40:58', 'Abdou Majeed ALIDOU', '::1', 0),
(1397, 'Cons-01-location-conf', '', '', '2021-06-28', '08:45:04', 'Abdou Majeed ALIDOU', '::1', 0),
(1398, 'Cons-01-location-conf', '', '', '2021-06-28', '08:59:15', 'Abdou Majeed ALIDOU', '::1', 0),
(1399, 'Cons-01-facture-conf', '', '', '2021-06-28', '08:59:17', 'Abdou Majeed ALIDOU', '::1', 0),
(1400, 'Cons-01-facture-conf', '', '', '2021-06-28', '09:01:04', 'Abdou Majeed ALIDOU', '::1', 0),
(1401, 'Cons-01-location-conf', '', '', '2021-06-28', '09:01:06', 'Abdou Majeed ALIDOU', '::1', 0),
(1402, 'Cons-01-location-conf', '', '', '2021-06-28', '09:01:21', 'Abdou Majeed ALIDOU', '::1', 0),
(1403, 'Cons-01-location-conf', '', '', '2021-06-28', '09:01:36', 'Abdou Majeed ALIDOU', '::1', 0),
(1404, 'Cons-01-facture-conf', '', '', '2021-06-28', '09:01:46', 'Abdou Majeed ALIDOU', '::1', 0),
(1405, 'Cons-01-facture-conf', '', '', '2021-06-28', '09:01:50', 'Abdou Majeed ALIDOU', '::1', 0),
(1406, 'Cons-01-facture-conf', '', '', '2021-06-28', '09:27:07', 'Abdou Majeed ALIDOU', '::1', 0),
(1407, 'Cons-01-location-conf', '', '', '2021-06-28', '10:26:57', 'Abdou Majeed ALIDOU', '::1', 0),
(1408, 'Cons-01-facture-conf', '', '', '2021-06-28', '10:33:52', 'Abdou Majeed ALIDOU', '::1', 0),
(1409, 'Cons-01-location-conf', '', '', '2021-06-28', '10:33:56', 'Abdou Majeed ALIDOU', '::1', 0),
(1410, 'Info-01-location-conf', '19', '', '2021-06-28', '10:33:59', 'Abdou Majeed ALIDOU', '::1', 0),
(1411, 'Cons-01-location-conf', '', '', '2021-06-28', '10:52:50', 'Abdou Majeed ALIDOU', '::1', 0),
(1412, 'Cons-01-location-conf', '', '', '2021-06-28', '10:54:29', 'Abdou Majeed ALIDOU', '::1', 0),
(1413, 'Cons-01-location-conf', '', '', '2021-06-28', '10:55:37', 'Abdou Majeed ALIDOU', '::1', 0),
(1414, 'Cons-01-location-conf', '', '', '2021-06-28', '10:57:55', 'Abdou Majeed ALIDOU', '::1', 0),
(1415, 'IndiqPrix-01-location-conf', '19', '', '2021-06-28', '10:58:12', 'Abdou Majeed ALIDOU', '::1', 0),
(1416, 'Cons-01-location-conf', '', '', '2021-06-28', '10:58:48', 'Abdou Majeed ALIDOU', '::1', 0),
(1417, 'Cons-01-location-conf', '', '', '2021-06-28', '10:59:10', 'Abdou Majeed ALIDOU', '::1', 0),
(1418, 'Cons-01-location-conf', '', '', '2021-06-28', '11:05:04', 'Abdou Majeed ALIDOU', '::1', 0),
(1419, 'Cons-01-location-conf', '', '', '2021-06-28', '11:05:12', 'Abdou Majeed ALIDOU', '::1', 0),
(1420, 'Cons-01-location-conf', '', '', '2021-06-28', '11:05:23', 'Abdou Majeed ALIDOU', '::1', 0),
(1421, 'Cons-01-location-conf', '', '', '2021-06-28', '11:06:50', 'Abdou Majeed ALIDOU', '::1', 0),
(1422, 'Cons-01-location-conf', '', '', '2021-06-28', '11:07:33', 'Abdou Majeed ALIDOU', '::1', 0),
(1423, 'Cons-01-location-conf', '', '', '2021-06-28', '11:07:42', 'Abdou Majeed ALIDOU', '::1', 0),
(1424, 'Cons-01-facture-conf', '', '', '2021-06-28', '11:08:27', 'Abdou Majeed ALIDOU', '::1', 0),
(1425, 'Cons-01-facture-conf', '', '', '2021-06-28', '11:10:55', 'Abdou Majeed ALIDOU', '::1', 0),
(1426, 'Cons-01-facture-conf', '', '', '2021-06-28', '11:11:02', 'Abdou Majeed ALIDOU', '::1', 0),
(1427, 'Cons-01-facture-conf', '', '', '2021-06-28', '11:11:11', 'Abdou Majeed ALIDOU', '::1', 0),
(1428, 'Chg-01-facture-conf', '5', '', '2021-06-28', '12:49:20', 'Abdou Majeed ALIDOU', '::1', 0),
(1429, 'Cons-01-location-conf', '', '', '2021-06-28', '12:49:35', 'Abdou Majeed ALIDOU', '::1', 0),
(1430, 'Cons-01-facture-conf', '', '', '2021-06-28', '13:24:31', 'Abdou Majeed ALIDOU', '::1', 0),
(1431, 'Cons-01-facture-conf', '', '', '2021-06-28', '13:26:20', 'Abdou Majeed ALIDOU', '::1', 0),
(1432, 'Cons-01-facture-conf', '', '', '2021-06-28', '13:26:38', 'Abdou Majeed ALIDOU', '::1', 0),
(1433, 'Exp-01-facture-conf', 'PDF', '', '2021-06-28', '13:39:59', 'Abdou Majeed ALIDOU', '::1', 0),
(1434, 'Cons-01-facture-conf', '', '', '2021-06-28', '13:40:03', 'Abdou Majeed ALIDOU', '::1', 0),
(1435, 'Exp-01-facture-conf', 'PDF', '', '2021-06-28', '13:41:13', 'Abdou Majeed ALIDOU', '::1', 0),
(1436, 'Exp-01-facture-conf', 'PDF', '', '2021-06-28', '13:41:51', 'Abdou Majeed ALIDOU', '::1', 0),
(1437, 'Cons-01-facture-conf', '', '', '2021-06-28', '13:44:19', 'Abdou Majeed ALIDOU', '::1', 0),
(1438, 'Exp-01-facture-conf', 'Word', '', '2021-06-28', '13:44:25', 'Abdou Majeed ALIDOU', '::1', 0),
(1439, 'Exp-01-facture-conf', 'Excel', '', '2021-06-28', '13:45:09', 'Abdou Majeed ALIDOU', '::1', 0),
(1440, 'Exp-01-facture-conf', 'Excel', '', '2021-06-28', '13:45:24', 'Abdou Majeed ALIDOU', '::1', 0),
(1441, 'Cons-01-facture-conf', '', '', '2021-06-28', '13:48:49', 'Abdou Majeed ALIDOU', '::1', 0),
(1442, 'Cons-01-location-conf', '', '', '2021-06-28', '13:48:52', 'Abdou Majeed ALIDOU', '::1', 0),
(1443, 'Cons-01-salle-conf', '', '', '2021-06-28', '13:48:56', 'Abdou Majeed ALIDOU', '::1', 0),
(1444, 'Cons-01-location-conf', '', '', '2021-06-28', '13:49:05', 'Abdou Majeed ALIDOU', '::1', 0),
(1445, 'Cons-01-facture-conf', '', '', '2021-06-28', '13:49:12', 'Abdou Majeed ALIDOU', '::1', 0),
(1446, 'Cons-01-facture-conf', '', '', '2021-06-28', '13:49:23', 'Abdou Majeed ALIDOU', '::1', 0),
(1447, 'Cons-01-service-conf', '', '', '2021-06-28', '13:51:45', 'Abdou Majeed ALIDOU', '::1', 0),
(1448, 'Cons-01-location-conf', '', '', '2021-06-28', '13:52:02', 'Abdou Majeed ALIDOU', '::1', 0),
(1449, 'Cons-01-facture-conf', '', '', '2021-06-28', '13:52:04', 'Abdou Majeed ALIDOU', '::1', 0),
(1450, 'Cons-01-salle-conf', '', '', '2021-06-28', '13:52:05', 'Abdou Majeed ALIDOU', '::1', 0),
(1451, 'Cons-01-carac-conf', '', '', '2021-06-28', '13:52:07', 'Abdou Majeed ALIDOU', '::1', 0),
(1452, 'Cons-01-service-conf', '', '', '2021-06-28', '13:52:09', 'Abdou Majeed ALIDOU', '::1', 0),
(1453, 'Cons-01-service-conf', '', '', '2021-06-28', '14:04:01', 'Abdou Majeed ALIDOU', '::1', 0),
(1454, 'Cons-01-service-conf', '', '', '2021-06-28', '14:04:29', 'Abdou Majeed ALIDOU', '::1', 0),
(1455, 'Cons-01-carac-conf', '', '', '2021-06-28', '14:04:34', 'Abdou Majeed ALIDOU', '::1', 0),
(1456, 'Cons-01-salle-conf', '', '', '2021-06-28', '14:04:36', 'Abdou Majeed ALIDOU', '::1', 0),
(1457, 'Cons-01-facture-conf', '', '', '2021-06-28', '14:04:37', 'Abdou Majeed ALIDOU', '::1', 0),
(1458, 'Cons-01-location-conf', '', '', '2021-06-28', '14:04:39', 'Abdou Majeed ALIDOU', '::1', 0),
(1459, 'Cons-01-service-conf', '', '', '2021-06-28', '14:04:43', 'Abdou Majeed ALIDOU', '::1', 0),
(1460, 'Cons-01-carac-conf', '', '', '2021-06-28', '14:04:49', 'Abdou Majeed ALIDOU', '::1', 0),
(1461, 'Cons-01-salle-conf', '', '', '2021-06-28', '14:04:53', 'Abdou Majeed ALIDOU', '::1', 0),
(1462, 'Cons-01-service-conf', '', '', '2021-06-28', '14:04:56', 'Abdou Majeed ALIDOU', '::1', 0),
(1463, 'Cons-01-carac-conf', '', '', '2021-06-28', '14:05:07', 'Abdou Majeed ALIDOU', '::1', 0),
(1464, 'Cons-01-service-conf', '', '', '2021-06-28', '14:07:43', 'Abdou Majeed ALIDOU', '::1', 0),
(1465, 'Cons-01-carac-conf', '', '', '2021-06-28', '14:12:18', 'Abdou Majeed ALIDOU', '::1', 0),
(1466, 'Cons-01-carac-conf', '', '', '2021-06-28', '14:20:51', 'Abdou Majeed ALIDOU', '::1', 0),
(1467, 'Cons-01-carac-conf', '', '', '2021-06-28', '14:50:45', 'Abdou Majeed ALIDOU', '::1', 0),
(1468, 'Cons-01-carac-conf', '', '', '2021-06-28', '14:58:30', 'Abdou Majeed ALIDOU', '::1', 0),
(1469, 'Cons-01-location-conf', '', '', '2021-06-28', '15:02:18', 'Abdou Majeed ALIDOU', '::1', 0),
(1470, 'Cons-01-location-conf', '', '', '2021-06-29', '07:19:50', 'Abdou Majeed ALIDOU', '::1', 0),
(1471, 'Cons-01-location-conf', '', '', '2021-06-29', '07:22:54', 'Abdou Majeed ALIDOU', '::1', 0),
(1472, 'Cons-01-location-conf', '', '', '2021-06-29', '07:23:04', 'Abdou Majeed ALIDOU', '::1', 0),
(1473, 'Cons-01-location-conf', '', '', '2021-06-29', '07:23:10', 'Abdou Majeed ALIDOU', '::1', 0),
(1474, 'Cons-01-location-conf', '', '', '2021-06-29', '07:23:28', 'Abdou Majeed ALIDOU', '::1', 0),
(1475, 'Cons-01-location-conf', '', '', '2021-06-29', '07:29:59', 'Abdou Majeed ALIDOU', '::1', 0),
(1476, 'Cons-01-location-conf', '', '', '2021-06-29', '07:55:52', 'Abdou Majeed ALIDOU', '::1', 0),
(1477, 'Cons-01-location-conf', '', '', '2021-06-29', '08:07:15', 'Abdou Majeed ALIDOU', '::1', 0),
(1478, 'Enr-01-location-conf', '20', '', '2021-06-29', '08:08:34', 'Abdou Majeed ALIDOU', '::1', 0),
(1479, 'Cons-01-location-conf', '', '', '2021-06-29', '08:30:15', 'Abdou Majeed ALIDOU', '::1', 0),
(1480, 'Chg-01-location-conf', '19,Inactif', '', '2021-06-29', '08:30:21', 'Abdou Majeed ALIDOU', '::1', 0),
(1481, 'Cons-01-location-conf', '', '', '2021-06-29', '08:31:43', 'Abdou Majeed ALIDOU', '::1', 0),
(1482, 'Cons-01-location-conf', '', '', '2021-06-29', '09:07:24', 'Abdou Majeed ALIDOU', '::1', 0),
(1483, 'Cons-01-location-conf', '', '', '2021-06-29', '09:19:13', 'Abdou Majeed ALIDOU', '::1', 0),
(1484, 'Cons-01-location-conf', '', '', '2021-06-29', '09:24:24', 'Abdou Majeed ALIDOU', '::1', 0),
(1485, 'Cons-01-location-conf', '', '', '2021-06-29', '09:27:50', 'Abdou Majeed ALIDOU', '::1', 0),
(1486, 'Cons-01-location-conf', '', '', '2021-06-29', '09:28:58', 'Abdou Majeed ALIDOU', '::1', 0),
(1487, 'Cons-01-location-conf', '', '', '2021-06-29', '09:30:40', 'Abdou Majeed ALIDOU', '::1', 0),
(1488, 'Modif-01-location-conf', '20', '', '2021-06-29', '09:31:21', 'Abdou Majeed ALIDOU', '::1', 0),
(1489, 'Cons-01-location-conf', '', '', '2021-06-29', '09:31:54', 'Abdou Majeed ALIDOU', '::1', 0),
(1490, 'Enr-01-location-conf', '21', '', '2021-06-29', '09:32:52', 'Abdou Majeed ALIDOU', '::1', 0),
(1491, 'Modif-01-location-conf', '21', '', '2021-06-29', '09:33:02', 'Abdou Majeed ALIDOU', '::1', 0),
(1492, 'Cons-01-location-conf', '', '', '2021-06-29', '09:33:36', 'Abdou Majeed ALIDOU', '::1', 0),
(1493, 'Cons-01-location-conf', '', '', '2021-06-29', '09:53:49', 'Abdou Majeed ALIDOU', '::1', 0),
(1494, 'Cons-01-location-conf', '', '', '2021-06-29', '09:54:14', 'Abdou Majeed ALIDOU', '::1', 0),
(1495, 'Cons-01-location-conf', '', '', '2021-06-29', '09:57:58', 'Abdou Majeed ALIDOU', '::1', 0),
(1496, 'Cons-01-location-conf', '', '', '2021-06-29', '10:00:00', 'Abdou Majeed ALIDOU', '::1', 0),
(1497, 'Cons-01-location-conf', '', '', '2021-06-29', '10:02:22', 'Abdou Majeed ALIDOU', '::1', 0),
(1498, 'Cons-01-location-conf', '', '', '2021-06-29', '10:03:59', 'Abdou Majeed ALIDOU', '::1', 0),
(1499, 'Cons-01-facture-conf', '', '', '2021-06-29', '10:04:53', 'Abdou Majeed ALIDOU', '::1', 0),
(1500, 'Cons-01-facture-conf', '', '', '2021-06-29', '10:05:05', 'Abdou Majeed ALIDOU', '::1', 0),
(1501, 'Cons-01-location-conf', '', '', '2021-06-29', '10:05:11', 'Abdou Majeed ALIDOU', '::1', 0),
(1502, 'Cons-01-salle-conf', '', '', '2021-06-29', '10:05:13', 'Abdou Majeed ALIDOU', '::1', 0),
(1503, 'Info-01-salle-conf', 'Futur', '', '2021-06-29', '10:05:27', 'Abdou Majeed ALIDOU', '::1', 0),
(1504, 'Cons-01-carac-conf', '', '', '2021-06-29', '10:06:02', 'Abdou Majeed ALIDOU', '::1', 0),
(1505, 'Cons-01-service-conf', '', '', '2021-06-29', '10:06:05', 'Abdou Majeed ALIDOU', '::1', 0),
(1506, 'Cons-01-location-conf', '', '', '2021-06-29', '10:06:18', 'Abdou Majeed ALIDOU', '::1', 0),
(1507, 'Cons-01-log', '', '', '2021-06-29', '10:10:10', 'Abdou Majeed ALIDOU', '::1', 0),
(1508, 'Cons-01-log', '', '', '2021-06-29', '10:11:03', 'Abdou Majeed ALIDOU', '::1', 0),
(1509, 'Cons-01-location-conf', '', '', '2021-06-29', '10:11:47', 'Abdou Majeed ALIDOU', '::1', 0),
(1510, 'Exp-01-location-conf', 'PDF', '', '2021-06-29', '10:11:51', 'Abdou Majeed ALIDOU', '::1', 0),
(1511, 'Cons-01-location-conf', '', '', '2021-06-29', '10:11:53', 'Abdou Majeed ALIDOU', '::1', 0),
(1512, 'Cons-01-location-conf', '', '', '2021-06-29', '10:11:58', 'Abdou Majeed ALIDOU', '::1', 0),
(1513, 'Cons-01-dashboard', '', '', '2021-06-29', '10:12:00', 'Abdou Majeed ALIDOU', '::1', 0),
(1514, 'Cons-01-location-conf', '', '', '2021-06-29', '10:12:12', 'Abdou Majeed ALIDOU', '::1', 0),
(1515, 'Cons-01-facture-conf', '', '', '2021-06-29', '10:50:43', 'Abdou Majeed ALIDOU', '::1', 0),
(1516, 'Cons-01-location-conf', '', '', '2021-06-29', '11:01:09', 'Abdou Majeed ALIDOU', '::1', 0),
(1517, 'Cons-01-facture-conf', '', '', '2021-06-29', '11:01:13', 'Abdou Majeed ALIDOU', '::1', 0),
(1518, 'Cons-01-facture-conf', '', '', '2021-06-29', '11:01:59', 'Abdou Majeed ALIDOU', '::1', 0),
(1519, 'Cons-01-location-conf', '', '', '2021-06-29', '11:04:49', 'Abdou Majeed ALIDOU', '::1', 0),
(1520, 'Cons-01-location-conf', '', '', '2021-06-29', '11:06:25', 'Abdou Majeed ALIDOU', '::1', 0),
(1521, 'Cons-01-facture-conf', '', '', '2021-06-29', '11:06:50', 'Abdou Majeed ALIDOU', '::1', 0),
(1522, 'Chg-01-facture-conf', '7', '', '2021-06-29', '11:07:07', 'Abdou Majeed ALIDOU', '::1', 0),
(1523, 'Cons-01-facture-conf', '', '', '2021-06-29', '11:07:18', 'Abdou Majeed ALIDOU', '::1', 0),
(1524, 'Cons-01-facture-conf', '', '', '2021-06-29', '11:07:47', 'Abdou Majeed ALIDOU', '::1', 0),
(1525, 'Exp-01-facture-conf', 'PDF', '', '2021-06-29', '11:10:10', 'Abdou Majeed ALIDOU', '::1', 0),
(1526, 'Cons-01-facture-conf', '', '', '2021-06-29', '11:10:25', 'Abdou Majeed ALIDOU', '::1', 0),
(1527, 'Exp-01-facture-conf', 'PDF', '', '2021-06-29', '11:11:08', 'Abdou Majeed ALIDOU', '::1', 0),
(1528, 'Cons-01-facture-conf', '', '', '2021-06-29', '11:11:14', 'Abdou Majeed ALIDOU', '::1', 0),
(1529, 'Cons-01-location-conf', '', '', '2021-06-29', '11:11:38', 'Abdou Majeed ALIDOU', '::1', 0),
(1530, 'Cons-01-salle-conf', '', '', '2021-06-29', '11:11:46', 'Abdou Majeed ALIDOU', '::1', 0),
(1531, 'Cons-01-carac-conf', '', '', '2021-06-29', '11:11:55', 'Abdou Majeed ALIDOU', '::1', 0),
(1532, 'Cons-01-service-conf', '', '', '2021-06-29', '11:12:01', 'Abdou Majeed ALIDOU', '::1', 0),
(1533, 'Cons-01-location-conf', '', '', '2021-06-29', '12:50:37', 'Abdou Majeed ALIDOU', '::1', 0),
(1534, 'Cons-01-log', '', '', '2021-06-29', '12:55:19', 'Abdou Majeed ALIDOU', '::1', 0),
(1535, 'Cons-01-location-conf', '', '', '2021-06-29', '12:56:22', 'Abdou Majeed ALIDOU', '::1', 0),
(1536, 'Cons-01-facture-conf', '', '', '2021-06-29', '12:56:23', 'Abdou Majeed ALIDOU', '::1', 0),
(1537, 'Deconnex-01', '', '', '2021-06-29', '13:06:55', 'Abdou Majeed ALIDOU', '::1', 0),
(1538, 'Connex-01', '', '', '2021-06-29', '13:07:00', 'Abdou Majeed ALIDOU', '::1', 0),
(1539, 'Cons-01-dashboard', '', '', '2021-06-29', '13:07:00', 'Abdou Majeed ALIDOU', '::1', 0),
(1540, 'Cons-01-type-chambre', '', '', '2021-06-29', '13:07:03', 'Abdou Majeed ALIDOU', '::1', 0),
(1541, 'Cons-01-stat-conf', '', '', '2021-06-29', '13:23:38', 'Abdou Majeed ALIDOU', '::1', 0),
(1542, 'Cons-01-stat-conf', '', '', '2021-06-29', '13:26:21', 'Abdou Majeed ALIDOU', '::1', 0),
(1543, 'Cons-01-stat-conf', '', '', '2021-06-29', '13:27:01', 'Abdou Majeed ALIDOU', '::1', 0),
(1544, 'Cons-01-stat-conf', '', '', '2021-06-29', '13:28:31', 'Abdou Majeed ALIDOU', '::1', 0),
(1545, 'Cons-01-stat-conf', '', '', '2021-06-29', '13:29:39', 'Abdou Majeed ALIDOU', '::1', 0),
(1546, 'Cons-01-stat-conf', '', '', '2021-06-29', '13:30:42', 'Abdou Majeed ALIDOU', '::1', 0),
(1547, 'Cons-01-stat-conf', '', '', '2021-06-29', '13:31:04', 'Abdou Majeed ALIDOU', '::1', 0);
INSERT INTO `addlog_table` (`id_addlog_table`, `CodeEvenement`, `ParametresEvenement`, `MessageEvenement`, `DateEvenement`, `HeureEvenement`, `PseudoUtilisateur`, `AdresseIP`, `IdCompte`) VALUES
(1548, 'Cons-01-stat-conf', '', '', '2021-06-29', '13:31:55', 'Abdou Majeed ALIDOU', '::1', 0),
(1549, 'Cons-01-stat-conf', '', '', '2021-06-29', '13:33:05', 'Abdou Majeed ALIDOU', '::1', 0),
(1550, 'Cons-01-stat-conf', '', '', '2021-06-29', '13:33:46', 'Abdou Majeed ALIDOU', '::1', 0),
(1551, 'Cons-01-stat-conf', '', '', '2021-06-29', '13:36:08', 'Abdou Majeed ALIDOU', '::1', 0),
(1552, 'Cons-01-stat-conf', '', '', '2021-06-29', '13:36:13', 'Abdou Majeed ALIDOU', '::1', 0),
(1553, 'Cons-01-location-conf', '', '', '2021-06-29', '13:36:17', 'Abdou Majeed ALIDOU', '::1', 0),
(1554, 'Cons-01-stat-conf', '', '', '2021-06-29', '13:36:20', 'Abdou Majeed ALIDOU', '::1', 0),
(1555, 'Cons-01-stat-conf', '', '', '2021-06-29', '13:37:48', 'Abdou Majeed ALIDOU', '::1', 0),
(1556, 'Cons-01-stat-conf', '', '', '2021-06-29', '13:41:58', 'Abdou Majeed ALIDOU', '::1', 0),
(1557, 'Cons-01-stat-conf', '', '', '2021-06-29', '13:54:29', 'Abdou Majeed ALIDOU', '::1', 0),
(1558, 'Cons-01-stat-conf', '', '', '2021-06-29', '13:54:36', 'Abdou Majeed ALIDOU', '::1', 0),
(1559, 'Cons-01-stat-conf', '', '', '2021-06-29', '13:54:42', 'Abdou Majeed ALIDOU', '::1', 0),
(1560, 'Cons-01-stat-conf', '', '', '2021-06-29', '13:54:52', 'Abdou Majeed ALIDOU', '::1', 0),
(1561, 'Cons-01-stat-conf', '', '', '2021-06-29', '14:02:19', 'Abdou Majeed ALIDOU', '::1', 0),
(1562, 'Cons-01-stat-conf', '', '', '2021-06-29', '14:09:20', 'Abdou Majeed ALIDOU', '::1', 0),
(1563, 'Cons-01-stat-conf', '', '', '2021-06-29', '14:10:21', 'Abdou Majeed ALIDOU', '::1', 0),
(1564, 'Cons-01-stat-conf', '', '', '2021-06-29', '14:13:19', 'Abdou Majeed ALIDOU', '::1', 0),
(1565, 'Cons-01-stat-conf', '', '', '2021-06-29', '14:19:05', 'Abdou Majeed ALIDOU', '::1', 0),
(1566, 'Cons-01-stat-conf', '', '', '2021-06-29', '14:21:23', 'Abdou Majeed ALIDOU', '::1', 0),
(1567, 'Cons-01-stat-conf', '', '', '2021-06-29', '14:21:55', 'Abdou Majeed ALIDOU', '::1', 0),
(1568, 'Cons-01-location-conf', '', '', '2021-06-29', '14:24:17', 'Abdou Majeed ALIDOU', '::1', 0),
(1569, 'Cons-01-stat-conf', '', '', '2021-06-29', '14:28:59', 'Abdou Majeed ALIDOU', '::1', 0),
(1570, 'Cons-01-location-conf', '', '', '2021-06-29', '16:28:15', 'Abdou Majeed ALIDOU', '::1', 0),
(1571, 'Cons-01-dashboard', '', '', '2021-06-29', '16:28:21', 'Abdou Majeed ALIDOU', '::1', 0),
(1572, 'Cons-01-log', '', '', '2021-06-29', '16:28:55', 'Abdou Majeed ALIDOU', '::1', 0),
(1573, 'Cons-01-reserv-dispo', '', '', '2021-06-29', '16:29:05', 'Abdou Majeed ALIDOU', '::1', 0),
(1574, 'Cons-01-reserv-termine', '', '', '2021-06-29', '16:29:18', 'Abdou Majeed ALIDOU', '::1', 0),
(1575, 'Cons-01-type-plat', '', '', '2021-06-29', '16:29:26', 'Abdou Majeed ALIDOU', '::1', 0),
(1576, 'Cons-01-facture-conf', '', '', '2021-06-29', '16:29:52', 'Abdou Majeed ALIDOU', '::1', 0),
(1577, 'Cons-01-salle-conf', '', '', '2021-06-29', '16:30:02', 'Abdou Majeed ALIDOU', '::1', 0),
(1578, 'Cons-01-dashboard', '', '', '2021-06-29', '16:30:18', 'Abdou Majeed ALIDOU', '::1', 0),
(1579, 'Cons-01-stat-conf', '', '', '2021-06-30', '07:18:09', 'Abdou Majeed ALIDOU', '::1', 0),
(1580, 'Cons-01-location-conf', '', '', '2021-06-30', '08:20:26', 'Abdou Majeed ALIDOU', '::1', 0),
(1581, 'Cons-01-location-conf', '', '', '2021-06-30', '08:21:36', 'Abdou Majeed ALIDOU', '::1', 0),
(1582, 'Cons-01-location-conf', '', '', '2021-06-30', '08:23:20', 'Abdou Majeed ALIDOU', '::1', 0),
(1583, 'Cons-01-location-conf', '', '', '2021-06-30', '08:25:01', 'Abdou Majeed ALIDOU', '::1', 0),
(1584, 'Cons-01-location-conf', '', '', '2021-06-30', '08:25:22', 'Abdou Majeed ALIDOU', '::1', 0),
(1585, 'Cons-01-location-conf', '', '', '2021-06-30', '08:26:22', 'Abdou Majeed ALIDOU', '::1', 0),
(1586, 'Cons-01-facture-conf', '', '', '2021-06-30', '08:28:21', 'Abdou Majeed ALIDOU', '::1', 0),
(1587, 'Cons-01-stat-conf', '', '', '2021-06-30', '08:28:23', 'Abdou Majeed ALIDOU', '::1', 0),
(1588, 'Cons-01-stat-conf', '', '', '2021-06-30', '08:35:47', 'Abdou Majeed ALIDOU', '::1', 0),
(1589, 'Cons-01-stat-conf', '', '', '2021-06-30', '08:36:57', 'Abdou Majeed ALIDOU', '::1', 0),
(1590, 'Cons-01-stat-conf', '', '', '2021-06-30', '08:46:20', 'Abdou Majeed ALIDOU', '::1', 0),
(1591, 'Cons-01-stat-conf', '', '', '2021-06-30', '09:06:22', 'Abdou Majeed ALIDOU', '::1', 0),
(1592, 'Cons-01-stat-conf', '', '', '2021-06-30', '09:06:43', 'Abdou Majeed ALIDOU', '::1', 0),
(1593, 'Cons-01-stat-conf', '', '', '2021-06-30', '09:09:13', 'Abdou Majeed ALIDOU', '::1', 0),
(1594, 'Cons-01-stat-conf', '', '', '2021-06-30', '09:09:24', 'Abdou Majeed ALIDOU', '::1', 0),
(1595, 'Cons-01-stat-conf', '', '', '2021-06-30', '09:11:20', 'Abdou Majeed ALIDOU', '::1', 0),
(1596, 'Cons-01-stat-conf', '', '', '2021-06-30', '09:12:19', 'Abdou Majeed ALIDOU', '::1', 0),
(1597, 'Cons-01-location-conf', '', '', '2021-06-30', '09:12:26', 'Abdou Majeed ALIDOU', '::1', 0),
(1598, 'Cons-01-facture-conf', '', '', '2021-06-30', '09:12:29', 'Abdou Majeed ALIDOU', '::1', 0),
(1599, 'Cons-01-salle-conf', '', '', '2021-06-30', '09:12:30', 'Abdou Majeed ALIDOU', '::1', 0),
(1600, 'Cons-01-carac-conf', '', '', '2021-06-30', '09:12:34', 'Abdou Majeed ALIDOU', '::1', 0),
(1601, 'Cons-01-stat-conf', '', '', '2021-06-30', '09:12:39', 'Abdou Majeed ALIDOU', '::1', 0),
(1602, 'Cons-01-service-conf', '', '', '2021-06-30', '09:12:43', 'Abdou Majeed ALIDOU', '::1', 0),
(1603, 'Cons-01-stat-conf', '', '', '2021-06-30', '09:12:47', 'Abdou Majeed ALIDOU', '::1', 0),
(1604, 'Cons-01-stat-conf', '', '', '2021-06-30', '09:16:12', 'Abdou Majeed ALIDOU', '::1', 0),
(1605, 'Cons-01-location-conf', '', '', '2021-06-30', '09:16:14', 'Abdou Majeed ALIDOU', '::1', 0),
(1606, 'Cons-01-stat-conf', '', '', '2021-06-30', '09:17:35', 'Abdou Majeed ALIDOU', '::1', 0),
(1607, 'Cons-01-stat-conf', '', '', '2021-06-30', '09:18:09', 'Abdou Majeed ALIDOU', '::1', 0),
(1608, 'Cons-01-stat-conf', '', '', '2021-06-30', '09:18:48', 'Abdou Majeed ALIDOU', '::1', 0),
(1609, 'Cons-01-location-conf', '', '', '2021-06-30', '09:20:08', 'Abdou Majeed ALIDOU', '::1', 0),
(1610, 'Cons-01-stat-conf', '', '', '2021-06-30', '09:28:33', 'Abdou Majeed ALIDOU', '::1', 0),
(1611, 'Cons-01-stat-conf', '', '', '2021-06-30', '09:29:13', 'Abdou Majeed ALIDOU', '::1', 0),
(1612, 'Cons-01-stat-conf', '', '', '2021-06-30', '09:29:41', 'Abdou Majeed ALIDOU', '::1', 0),
(1613, 'Cons-01-stat-conf', '', '', '2021-06-30', '09:29:47', 'Abdou Majeed ALIDOU', '::1', 0),
(1614, 'Cons-01-stat-conf', '', '', '2021-06-30', '09:30:40', 'Abdou Majeed ALIDOU', '::1', 0),
(1615, 'Cons-01-stat-conf', '', '', '2021-06-30', '09:54:24', 'Abdou Majeed ALIDOU', '::1', 0),
(1616, 'Cons-01-stat-conf', '', '', '2021-06-30', '10:13:32', 'Abdou Majeed ALIDOU', '::1', 0),
(1617, 'Cons-01-stat-conf', '', '', '2021-06-30', '10:17:29', 'Abdou Majeed ALIDOU', '::1', 0),
(1618, 'Cons-01-stat-conf', '', '', '2021-06-30', '10:20:34', 'Abdou Majeed ALIDOU', '::1', 0),
(1619, 'Cons-01-stat-conf', '', '', '2021-06-30', '10:30:38', 'Abdou Majeed ALIDOU', '::1', 0),
(1620, 'Cons-01-stat-conf', '', '', '2021-06-30', '10:35:46', 'Abdou Majeed ALIDOU', '::1', 0),
(1621, 'Cons-01-stat-conf', '', '', '2021-06-30', '10:35:59', 'Abdou Majeed ALIDOU', '::1', 0),
(1622, 'Cons-01-stat-conf', '', '', '2021-06-30', '10:39:48', 'Abdou Majeed ALIDOU', '::1', 0),
(1623, 'Cons-01-stat-conf', '', '', '2021-06-30', '11:23:08', 'Abdou Majeed ALIDOU', '::1', 0),
(1624, 'Cons-01-stat-conf', '', '', '2021-06-30', '11:24:10', 'Abdou Majeed ALIDOU', '::1', 0),
(1625, 'Cons-01-stat-conf', '', '', '2021-06-30', '11:26:25', 'Abdou Majeed ALIDOU', '::1', 0),
(1626, 'Cons-01-stat-conf', '', '', '2021-06-30', '11:28:30', 'Abdou Majeed ALIDOU', '::1', 0),
(1627, 'Cons-01-stat-conf', '', '', '2021-06-30', '11:41:22', 'Abdou Majeed ALIDOU', '::1', 0),
(1628, 'Cons-01-stat-conf', '', '', '2021-06-30', '11:42:08', 'Abdou Majeed ALIDOU', '::1', 0),
(1629, 'Cons-01-stat-conf', '', '', '2021-06-30', '11:42:24', 'Abdou Majeed ALIDOU', '::1', 0),
(1630, 'Cons-01-stat-conf', '', '', '2021-06-30', '11:42:51', 'Abdou Majeed ALIDOU', '::1', 0),
(1631, 'Cons-01-stat-conf', '', '', '2021-06-30', '11:43:18', 'Abdou Majeed ALIDOU', '::1', 0),
(1632, 'Cons-01-location-conf', '', '', '2021-06-30', '11:46:27', 'Abdou Majeed ALIDOU', '::1', 0),
(1633, 'Cons-01-location-conf', '', '', '2021-06-30', '11:48:08', 'Abdou Majeed ALIDOU', '::1', 0),
(1634, 'Cons-01-location-conf', '', '', '2021-06-30', '11:48:45', 'Abdou Majeed ALIDOU', '::1', 0),
(1635, 'Cons-01-facture-conf', '', '', '2021-06-30', '11:48:48', 'Abdou Majeed ALIDOU', '::1', 0),
(1636, 'Cons-01-carac-conf', '', '', '2021-06-30', '11:48:50', 'Abdou Majeed ALIDOU', '::1', 0),
(1637, 'Cons-01-stat-conf', '', '', '2021-06-30', '11:48:51', 'Abdou Majeed ALIDOU', '::1', 0),
(1638, 'Cons-01-stat-conf', '', '', '2021-06-30', '11:49:58', 'Abdou Majeed ALIDOU', '::1', 0),
(1639, 'Cons-01-stat-conf', '', '', '2021-06-30', '11:51:26', 'Abdou Majeed ALIDOU', '::1', 0),
(1640, 'Cons-01-stat-conf', '', '', '2021-06-30', '11:51:38', 'Abdou Majeed ALIDOU', '::1', 0),
(1641, 'Cons-01-location-conf', '', '', '2021-06-30', '11:52:19', 'Abdou Majeed ALIDOU', '::1', 0),
(1642, 'Cons-01-stat-conf', '', '', '2021-06-30', '11:52:22', 'Abdou Majeed ALIDOU', '::1', 0),
(1643, 'Cons-01-stat-conf', '', '', '2021-06-30', '11:57:00', 'Abdou Majeed ALIDOU', '::1', 0),
(1644, 'Cons-01-stat-conf', '', '', '2021-06-30', '11:57:38', 'Abdou Majeed ALIDOU', '::1', 0),
(1645, 'Cons-01-stat-conf', '', '', '2021-06-30', '12:20:23', 'Abdou Majeed ALIDOU', '::1', 0),
(1646, 'Cons-01-location-conf', '', '', '2021-06-30', '12:20:43', 'Abdou Majeed ALIDOU', '::1', 0),
(1647, 'Cons-01-location-conf', '', '', '2021-06-30', '12:21:20', 'Abdou Majeed ALIDOU', '::1', 0),
(1648, 'Cons-01-location-conf', '', '', '2021-06-30', '12:23:00', 'Abdou Majeed ALIDOU', '::1', 0),
(1649, 'Cons-01-location-conf', '', '', '2021-06-30', '12:23:46', 'Abdou Majeed ALIDOU', '::1', 0),
(1650, 'Cons-01-location-conf', '', '', '2021-06-30', '12:26:07', 'Abdou Majeed ALIDOU', '::1', 0),
(1651, 'Cons-01-stat-conf', '', '', '2021-06-30', '12:26:09', 'Abdou Majeed ALIDOU', '::1', 0),
(1652, 'Cons-01-stat-conf', '', '', '2021-06-30', '12:26:26', 'Abdou Majeed ALIDOU', '::1', 0),
(1653, 'Cons-01-stat-conf', '', '', '2021-06-30', '12:27:00', 'Abdou Majeed ALIDOU', '::1', 0),
(1654, 'Cons-01-stat-conf', '', '', '2021-06-30', '12:30:21', 'Abdou Majeed ALIDOU', '::1', 0),
(1655, 'Cons-01-stat-conf', '', '', '2021-06-30', '12:30:52', 'Abdou Majeed ALIDOU', '::1', 0),
(1656, 'Cons-01-stat-conf', '', '', '2021-06-30', '12:33:25', 'Abdou Majeed ALIDOU', '::1', 0),
(1657, 'Cons-01-stat-conf', '', '', '2021-06-30', '12:33:35', 'Abdou Majeed ALIDOU', '::1', 0),
(1658, 'Cons-01-stat-conf', '', '', '2021-06-30', '12:34:34', 'Abdou Majeed ALIDOU', '::1', 0),
(1659, 'Cons-01-stat-conf', '', '', '2021-06-30', '12:34:56', 'Abdou Majeed ALIDOU', '::1', 0),
(1660, 'Cons-01-stat-conf', '', '', '2021-06-30', '12:36:17', 'Abdou Majeed ALIDOU', '::1', 0),
(1661, 'Cons-01-stat-conf', '', '', '2021-06-30', '12:38:34', 'Abdou Majeed ALIDOU', '::1', 0),
(1662, 'Cons-01-location-conf', '', '', '2021-06-30', '13:09:11', 'Abdou Majeed ALIDOU', '::1', 0),
(1663, 'Cons-01-stat-conf', '', '', '2021-06-30', '13:11:02', 'Abdou Majeed ALIDOU', '::1', 0),
(1664, 'Cons-01-stat-conf', '', '', '2021-06-30', '13:12:32', 'Abdou Majeed ALIDOU', '::1', 0),
(1665, 'Cons-01-stat-conf', '', '', '2021-06-30', '13:12:45', 'Abdou Majeed ALIDOU', '::1', 0),
(1666, 'Cons-01-stat-conf', '', '', '2021-06-30', '13:13:20', 'Abdou Majeed ALIDOU', '::1', 0),
(1667, 'Cons-01-stat-conf', '', '', '2021-06-30', '13:14:30', 'Abdou Majeed ALIDOU', '::1', 0),
(1668, 'Cons-01-location-conf', '', '', '2021-06-30', '13:17:13', 'Abdou Majeed ALIDOU', '::1', 0),
(1669, 'Cons-01-stat-conf', '', '', '2021-06-30', '13:20:35', 'Abdou Majeed ALIDOU', '::1', 0),
(1670, 'Cons-01-stat-conf', '', '', '2021-06-30', '13:21:10', 'Abdou Majeed ALIDOU', '::1', 0),
(1671, 'Cons-01-stat-conf', '', '', '2021-06-30', '13:21:24', 'Abdou Majeed ALIDOU', '::1', 0),
(1672, 'Cons-01-stat-conf', '', '', '2021-06-30', '13:24:42', 'Abdou Majeed ALIDOU', '::1', 0),
(1673, 'Cons-01-stat-conf', '', '', '2021-06-30', '13:25:00', 'Abdou Majeed ALIDOU', '::1', 0),
(1674, 'Cons-01-stat-conf', '', '', '2021-06-30', '13:29:12', 'Abdou Majeed ALIDOU', '::1', 0),
(1675, 'Cons-01-stat-conf', '', '', '2021-06-30', '13:31:09', 'Abdou Majeed ALIDOU', '::1', 0),
(1676, 'Cons-01-stat-conf', '', '', '2021-06-30', '13:32:40', 'Abdou Majeed ALIDOU', '::1', 0),
(1677, 'Cons-01-stat-conf', '', '', '2021-06-30', '13:32:55', 'Abdou Majeed ALIDOU', '::1', 0),
(1678, 'Cons-01-stat-conf', '', '', '2021-06-30', '13:33:03', 'Abdou Majeed ALIDOU', '::1', 0),
(1679, 'Cons-01-stat-conf', '', '', '2021-06-30', '13:33:27', 'Abdou Majeed ALIDOU', '::1', 0),
(1680, 'Cons-01-service-conf', '', '', '2021-06-30', '13:33:30', 'Abdou Majeed ALIDOU', '::1', 0),
(1681, 'Cons-01-stat-conf', '', '', '2021-06-30', '13:33:32', 'Abdou Majeed ALIDOU', '::1', 0),
(1682, 'Cons-01-facture-conf', '', '', '2021-06-30', '13:35:51', 'Abdou Majeed ALIDOU', '::1', 0),
(1683, 'Cons-01-stat-conf', '', '', '2021-06-30', '13:37:34', 'Abdou Majeed ALIDOU', '::1', 0),
(1684, 'Cons-01-stat-conf', '', '', '2021-06-30', '13:37:45', 'Abdou Majeed ALIDOU', '::1', 0),
(1685, 'Cons-01-stat-conf', '', '', '2021-06-30', '13:37:58', 'Abdou Majeed ALIDOU', '::1', 0),
(1686, 'Cons-01-stat-conf', '', '', '2021-06-30', '13:38:28', 'Abdou Majeed ALIDOU', '::1', 0),
(1687, 'Cons-01-stat-conf', '', '', '2021-06-30', '13:39:47', 'Abdou Majeed ALIDOU', '::1', 0),
(1688, 'Cons-01-stat-conf', '', '', '2021-06-30', '13:39:56', 'Abdou Majeed ALIDOU', '::1', 0),
(1689, 'Cons-01-stat-conf', '', '', '2021-06-30', '13:42:27', 'Abdou Majeed ALIDOU', '::1', 0),
(1690, 'Cons-01-stat-conf', '', '', '2021-06-30', '13:43:26', 'Abdou Majeed ALIDOU', '::1', 0),
(1691, 'Cons-01-stat-conf', '', '', '2021-06-30', '13:44:16', 'Abdou Majeed ALIDOU', '::1', 0),
(1692, 'Cons-01-stat-conf', '', '', '2021-06-30', '13:45:35', 'Abdou Majeed ALIDOU', '::1', 0),
(1693, 'Cons-01-stat-conf', '', '', '2021-06-30', '13:46:00', 'Abdou Majeed ALIDOU', '::1', 0),
(1694, 'Cons-01-stat-conf', '', '', '2021-06-30', '13:50:47', 'Abdou Majeed ALIDOU', '::1', 0),
(1695, 'Cons-01-stat-conf', '', '', '2021-06-30', '13:53:28', 'Abdou Majeed ALIDOU', '::1', 0),
(1696, 'Cons-01-stat-conf', '', '', '2021-06-30', '13:58:11', 'Abdou Majeed ALIDOU', '::1', 0),
(1697, 'Cons-01-stat-conf', '', '', '2021-06-30', '14:00:00', 'Abdou Majeed ALIDOU', '::1', 0),
(1698, 'Cons-01-stat-conf', '', '', '2021-06-30', '14:00:16', 'Abdou Majeed ALIDOU', '::1', 0),
(1699, 'Cons-01-stat-conf', '', '', '2021-06-30', '14:00:37', 'Abdou Majeed ALIDOU', '::1', 0),
(1700, 'Cons-01-stat-conf', '', '', '2021-06-30', '14:02:40', 'Abdou Majeed ALIDOU', '::1', 0),
(1701, 'Cons-01-stat-conf', '', '', '2021-06-30', '14:02:50', 'Abdou Majeed ALIDOU', '::1', 0),
(1702, 'Cons-01-stat-conf', '', '', '2021-06-30', '14:03:03', 'Abdou Majeed ALIDOU', '::1', 0),
(1703, 'Cons-01-stat-conf', '', '', '2021-06-30', '14:03:04', 'Abdou Majeed ALIDOU', '::1', 0),
(1704, 'Cons-01-stat-conf', '', '', '2021-06-30', '14:03:20', 'Abdou Majeed ALIDOU', '::1', 0),
(1705, 'Cons-01-stat-conf', '', '', '2021-06-30', '14:03:53', 'Abdou Majeed ALIDOU', '::1', 0),
(1706, 'Cons-01-stat-conf', '', '', '2021-07-01', '07:59:48', 'Abdou Majeed ALIDOU', '::1', 0),
(1707, 'Cons-01-stat-conf', '', '', '2021-07-01', '08:03:22', 'Abdou Majeed ALIDOU', '::1', 0),
(1708, 'Cons-01-stat-conf', '', '', '2021-07-01', '08:24:02', 'Abdou Majeed ALIDOU', '::1', 0),
(1709, 'Cons-01-stat-conf', '', '', '2021-07-01', '08:25:11', 'Abdou Majeed ALIDOU', '::1', 0),
(1710, 'Cons-01-stat-conf', '', '', '2021-07-01', '08:30:07', 'Abdou Majeed ALIDOU', '::1', 0),
(1711, 'Cons-01-stat-conf', '', '', '2021-07-01', '08:30:13', 'Abdou Majeed ALIDOU', '::1', 0),
(1712, 'Cons-01-stat-conf', '', '', '2021-07-01', '08:32:07', 'Abdou Majeed ALIDOU', '::1', 0),
(1713, 'Cons-01-facture-conf', '', '', '2021-07-01', '08:35:04', 'Abdou Majeed ALIDOU', '::1', 0),
(1714, 'Exp-01-facture-conf', 'PDF', '', '2021-07-01', '08:35:15', 'Abdou Majeed ALIDOU', '::1', 0),
(1715, 'Exp-01-facture-conf', 'PDF', '', '2021-07-01', '08:35:15', 'Abdou Majeed ALIDOU', '::1', 0),
(1716, 'Cons-01-facture-conf', '', '', '2021-07-01', '08:35:55', 'Abdou Majeed ALIDOU', '::1', 0),
(1717, 'Cons-01-stat-conf', '', '', '2021-07-01', '08:39:42', 'Abdou Majeed ALIDOU', '::1', 0),
(1718, 'Cons-01-stat-conf', '', '', '2021-07-01', '08:39:57', 'Abdou Majeed ALIDOU', '::1', 0),
(1719, 'Cons-01-stat-conf', '', '', '2021-07-01', '08:43:34', 'Abdou Majeed ALIDOU', '::1', 0),
(1720, 'Cons-01-stat-conf', '', '', '2021-07-01', '08:43:53', 'Abdou Majeed ALIDOU', '::1', 0),
(1721, 'Cons-01-stat-conf', '', '', '2021-07-01', '08:54:53', 'Abdou Majeed ALIDOU', '::1', 0),
(1722, 'Cons-01-stat-conf', '', '', '2021-07-01', '08:55:52', 'Abdou Majeed ALIDOU', '::1', 0),
(1723, 'Cons-01-stat-conf', '', '', '2021-07-01', '08:58:55', 'Abdou Majeed ALIDOU', '::1', 0),
(1724, 'Cons-01-stat-conf', '', '', '2021-07-01', '09:05:34', 'Abdou Majeed ALIDOU', '::1', 0),
(1725, 'Cons-01-stat-conf', '', '', '2021-07-01', '09:08:58', 'Abdou Majeed ALIDOU', '::1', 0),
(1726, 'Cons-01-location-conf', '', '', '2021-07-01', '09:09:06', 'Abdou Majeed ALIDOU', '::1', 0),
(1727, 'Cons-01-stat-conf', '', '', '2021-07-01', '09:10:04', 'Abdou Majeed ALIDOU', '::1', 0),
(1728, 'Cons-01-stat-conf', '', '', '2021-07-01', '09:10:34', 'Abdou Majeed ALIDOU', '::1', 0),
(1729, 'Cons-01-location-conf', '', '', '2021-07-01', '09:39:39', 'Abdou Majeed ALIDOU', '::1', 0),
(1730, 'Enr-01-location-conf', '22', '', '2021-07-01', '09:40:20', 'Abdou Majeed ALIDOU', '::1', 0),
(1731, 'Cons-01-salle-conf', '', '', '2021-07-01', '09:40:52', 'Abdou Majeed ALIDOU', '::1', 0),
(1732, 'Cons-01-location-conf', '', '', '2021-07-01', '09:41:44', 'Abdou Majeed ALIDOU', '::1', 0),
(1733, 'Chg-01-location-conf', '22,Inactif', '', '2021-07-01', '09:42:00', 'Abdou Majeed ALIDOU', '::1', 0),
(1734, 'Cons-01-location-conf', '', '', '2021-07-01', '09:42:18', 'Abdou Majeed ALIDOU', '::1', 0),
(1735, 'Cons-01-location-conf', '', '', '2021-07-01', '09:47:42', 'Abdou Majeed ALIDOU', '::1', 0),
(1736, 'Cons-01-stat-conf', '', '', '2021-07-01', '09:47:45', 'Abdou Majeed ALIDOU', '::1', 0),
(1737, 'Cons-01-stat-conf', '', '', '2021-07-01', '09:49:24', 'Abdou Majeed ALIDOU', '::1', 0),
(1738, 'Cons-01-location-conf', '', '', '2021-07-01', '10:00:02', 'Abdou Majeed ALIDOU', '::1', 0),
(1739, 'Modif-01-location-conf', '21', '', '2021-07-01', '10:00:27', 'Abdou Majeed ALIDOU', '::1', 0),
(1740, 'Cons-01-stat-conf', '', '', '2021-07-01', '10:05:36', 'Abdou Majeed ALIDOU', '::1', 0),
(1741, 'Cons-01-stat-conf', '', '', '2021-07-01', '10:07:56', 'Abdou Majeed ALIDOU', '::1', 0),
(1742, 'Cons-01-stat-conf', '', '', '2021-07-01', '10:12:06', 'Abdou Majeed ALIDOU', '::1', 0),
(1743, 'Cons-01-stat-conf', '', '', '2021-07-01', '10:25:10', 'Abdou Majeed ALIDOU', '::1', 0),
(1744, 'Cons-01-stat-conf', '', '', '2021-07-01', '10:26:10', 'Abdou Majeed ALIDOU', '::1', 0),
(1745, 'Cons-01-stat-conf', '', '', '2021-07-01', '10:26:21', 'Abdou Majeed ALIDOU', '::1', 0),
(1746, 'Cons-01-stat-conf', '', '', '2021-07-01', '10:32:06', 'Abdou Majeed ALIDOU', '::1', 0),
(1747, 'Cons-01-stat-conf', '', '', '2021-07-01', '11:04:54', 'Abdou Majeed ALIDOU', '::1', 0),
(1748, 'Cons-01-stat-conf', '', '', '2021-07-01', '11:07:45', 'Abdou Majeed ALIDOU', '::1', 0),
(1749, 'Cons-01-stat-conf', '', '', '2021-07-01', '11:07:51', 'Abdou Majeed ALIDOU', '::1', 0),
(1750, 'Cons-01-stat-conf', '', '', '2021-07-01', '11:07:57', 'Abdou Majeed ALIDOU', '::1', 0),
(1751, 'Cons-01-stat-conf', '', '', '2021-07-01', '11:11:53', 'Abdou Majeed ALIDOU', '::1', 0),
(1752, 'Cons-01-stat-conf', '', '', '2021-07-01', '11:13:30', 'Abdou Majeed ALIDOU', '::1', 0),
(1753, 'Cons-01-stat-conf', '', '', '2021-07-01', '11:24:58', 'Abdou Majeed ALIDOU', '::1', 0),
(1754, 'Cons-01-stat-conf', '', '', '2021-07-01', '11:25:15', 'Abdou Majeed ALIDOU', '::1', 0),
(1755, 'Cons-01-stat-conf', '', '', '2021-07-01', '11:41:42', 'Abdou Majeed ALIDOU', '::1', 0),
(1756, 'Cons-01-stat-conf', '', '', '2021-07-01', '12:18:07', 'Abdou Majeed ALIDOU', '::1', 0),
(1757, 'Cons-01-stat-conf', '', '', '2021-07-01', '12:19:36', 'Abdou Majeed ALIDOU', '::1', 0),
(1758, 'Cons-01-stat-conf', '', '', '2021-07-01', '12:20:12', 'Abdou Majeed ALIDOU', '::1', 0),
(1759, 'Cons-01-location-conf', '', '', '2021-07-01', '12:20:29', 'Abdou Majeed ALIDOU', '::1', 0),
(1760, 'Enr-01-location-conf', '23', '', '2021-07-01', '12:21:09', 'Abdou Majeed ALIDOU', '::1', 0),
(1761, 'Cons-01-stat-conf', '', '', '2021-07-01', '12:21:11', 'Abdou Majeed ALIDOU', '::1', 0),
(1762, 'Cons-01-stat-conf', '', '', '2021-07-01', '12:26:17', 'Abdou Majeed ALIDOU', '::1', 0),
(1763, 'Cons-01-stat-conf', '', '', '2021-07-01', '12:27:00', 'Abdou Majeed ALIDOU', '::1', 0),
(1764, 'Cons-01-stat-conf', '', '', '2021-07-01', '12:28:04', 'Abdou Majeed ALIDOU', '::1', 0),
(1765, 'Cons-01-stat-conf', '', '', '2021-07-01', '12:28:22', 'Abdou Majeed ALIDOU', '::1', 0),
(1766, 'Cons-01-stat-conf', '', '', '2021-07-01', '12:28:51', 'Abdou Majeed ALIDOU', '::1', 0),
(1767, 'Cons-01-stat-conf', '', '', '2021-07-01', '13:54:21', 'Abdou Majeed ALIDOU', '::1', 0),
(1768, 'Cons-01-stat-conf', '', '', '2021-07-01', '13:54:47', 'Abdou Majeed ALIDOU', '::1', 0),
(1769, 'Cons-01-stat-conf', '', '', '2021-07-01', '14:06:54', 'Abdou Majeed ALIDOU', '::1', 0),
(1770, 'Cons-01-stat-conf', '', '', '2021-07-01', '14:07:19', 'Abdou Majeed ALIDOU', '::1', 0),
(1771, 'Cons-01-stat-conf', '', '', '2021-07-01', '14:07:35', 'Abdou Majeed ALIDOU', '::1', 0),
(1772, 'Cons-01-stat-conf', '', '', '2021-07-01', '14:07:47', 'Abdou Majeed ALIDOU', '::1', 0),
(1773, 'Cons-01-stat-conf', '', '', '2021-07-01', '14:07:53', 'Abdou Majeed ALIDOU', '::1', 0),
(1774, 'Cons-01-stat-conf', '', '', '2021-07-01', '14:08:03', 'Abdou Majeed ALIDOU', '::1', 0),
(1775, 'Cons-01-stat-conf', '', '', '2021-07-01', '14:08:36', 'Abdou Majeed ALIDOU', '::1', 0),
(1776, 'Cons-01-stat-conf', '', '', '2021-07-01', '14:13:30', 'Abdou Majeed ALIDOU', '::1', 0),
(1777, 'Cons-01-stat-conf', '', '', '2021-07-01', '14:14:02', 'Abdou Majeed ALIDOU', '::1', 0),
(1778, 'Cons-01-stat-conf', '', '', '2021-07-01', '14:18:46', 'Abdou Majeed ALIDOU', '::1', 0),
(1779, 'Cons-01-stat-conf', '', '', '2021-07-01', '14:19:35', 'Abdou Majeed ALIDOU', '::1', 0),
(1780, 'Cons-01-stat-conf', '', '', '2021-07-01', '14:19:47', 'Abdou Majeed ALIDOU', '::1', 0),
(1781, 'Cons-01-stat-conf', '', '', '2021-07-01', '14:20:27', 'Abdou Majeed ALIDOU', '::1', 0),
(1782, 'Cons-01-stat-conf', '', '', '2021-07-01', '14:20:41', 'Abdou Majeed ALIDOU', '::1', 0),
(1783, 'Cons-01-stat-conf', '', '', '2021-07-01', '14:21:50', 'Abdou Majeed ALIDOU', '::1', 0),
(1784, 'Cons-01-stat-conf', '', '', '2021-07-01', '14:23:12', 'Abdou Majeed ALIDOU', '::1', 0),
(1785, 'Cons-01-stat-conf', '', '', '2021-07-01', '14:23:18', 'Abdou Majeed ALIDOU', '::1', 0),
(1786, 'Cons-01-stat-conf', '', '', '2021-07-01', '14:23:47', 'Abdou Majeed ALIDOU', '::1', 0),
(1787, 'Cons-01-stat-conf', '', '', '2021-07-01', '14:48:38', 'Abdou Majeed ALIDOU', '::1', 0),
(1788, 'Cons-01-stat-conf', '', '', '2021-07-01', '14:50:28', 'Abdou Majeed ALIDOU', '::1', 0),
(1789, 'Cons-01-stat-conf', '', '', '2021-07-01', '14:50:47', 'Abdou Majeed ALIDOU', '::1', 0),
(1790, 'Cons-01-stat-conf', '', '', '2021-07-01', '14:51:05', 'Abdou Majeed ALIDOU', '::1', 0),
(1791, 'Cons-01-stat-conf', '', '', '2021-07-01', '14:51:43', 'Abdou Majeed ALIDOU', '::1', 0),
(1792, 'Cons-01-stat-conf', '', '', '2021-07-01', '14:52:50', 'Abdou Majeed ALIDOU', '::1', 0),
(1793, 'Cons-01-stat-conf', '', '', '2021-07-01', '14:53:01', 'Abdou Majeed ALIDOU', '::1', 0),
(1794, 'Cons-01-stat-conf', '', '', '2021-07-01', '14:54:01', 'Abdou Majeed ALIDOU', '::1', 0),
(1795, 'Cons-01-stat-conf', '', '', '2021-07-01', '14:56:14', 'Abdou Majeed ALIDOU', '::1', 0),
(1796, 'Cons-01-stat-conf', '', '', '2021-07-01', '14:56:59', 'Abdou Majeed ALIDOU', '::1', 0),
(1797, 'Cons-01-stat-conf', '', '', '2021-07-01', '14:57:18', 'Abdou Majeed ALIDOU', '::1', 0),
(1798, 'Cons-01-stat-conf', '', '', '2021-07-01', '14:57:24', 'Abdou Majeed ALIDOU', '::1', 0),
(1799, 'Cons-01-stat-conf', '', '', '2021-07-01', '14:57:29', 'Abdou Majeed ALIDOU', '::1', 0),
(1800, 'Cons-01-stat-conf', '', '', '2021-07-01', '14:59:13', 'Abdou Majeed ALIDOU', '::1', 0),
(1801, 'Cons-01-stat-conf', '', '', '2021-07-01', '15:04:22', 'Abdou Majeed ALIDOU', '::1', 0),
(1802, 'Cons-01-stat-conf', '', '', '2021-07-01', '15:05:47', 'Abdou Majeed ALIDOU', '::1', 0),
(1803, 'Cons-01-stat-conf', '', '', '2021-07-01', '15:06:02', 'Abdou Majeed ALIDOU', '::1', 0),
(1804, 'Cons-01-stat-conf', '', '', '2021-07-01', '15:06:09', 'Abdou Majeed ALIDOU', '::1', 0),
(1805, 'Cons-01-stat-conf', '', '', '2021-07-01', '15:06:27', 'Abdou Majeed ALIDOU', '::1', 0),
(1806, 'Cons-01-stat-conf', '', '', '2021-07-01', '15:07:05', 'Abdou Majeed ALIDOU', '::1', 0),
(1807, 'Cons-01-stat-conf', '', '', '2021-07-01', '15:11:15', 'Abdou Majeed ALIDOU', '::1', 0),
(1808, 'Cons-01-stat-conf', '', '', '2021-07-01', '15:11:38', 'Abdou Majeed ALIDOU', '::1', 0),
(1809, 'Cons-01-stat-conf', '', '', '2021-07-01', '15:12:03', 'Abdou Majeed ALIDOU', '::1', 0),
(1810, 'Cons-01-stat-conf', '', '', '2021-07-01', '15:12:28', 'Abdou Majeed ALIDOU', '::1', 0),
(1811, 'Cons-01-stat-conf', '', '', '2021-07-01', '15:15:52', 'Abdou Majeed ALIDOU', '::1', 0),
(1812, 'Cons-01-stat-conf', '', '', '2021-07-01', '15:16:19', 'Abdou Majeed ALIDOU', '::1', 0),
(1813, 'Cons-01-stat-conf', '', '', '2021-07-01', '15:18:10', 'Abdou Majeed ALIDOU', '::1', 0),
(1814, 'Cons-01-stat-conf', '', '', '2021-07-01', '15:18:24', 'Abdou Majeed ALIDOU', '::1', 0),
(1815, 'Cons-01-stat-conf', '', '', '2021-07-01', '15:19:10', 'Abdou Majeed ALIDOU', '::1', 0),
(1816, 'Cons-01-stat-conf', '', '', '2021-07-02', '08:44:52', 'Abdou Majeed ALIDOU', '::1', 0),
(1817, 'Cons-01-stat-conf', '', '', '2021-07-02', '08:45:45', 'Abdou Majeed ALIDOU', '::1', 0),
(1818, 'Cons-01-stat-conf', '', '', '2021-07-02', '08:45:49', 'Abdou Majeed ALIDOU', '::1', 0),
(1819, 'Cons-01-stat-conf', '', '', '2021-07-02', '08:46:00', 'Abdou Majeed ALIDOU', '::1', 0),
(1820, 'Cons-01-stat-conf', '', '', '2021-07-02', '08:48:57', 'Abdou Majeed ALIDOU', '::1', 0),
(1821, 'Cons-01-stat-conf', '', '', '2021-07-02', '08:57:35', 'Abdou Majeed ALIDOU', '::1', 0),
(1822, 'Cons-01-stat-conf', '', '', '2021-07-02', '08:58:58', 'Abdou Majeed ALIDOU', '::1', 0),
(1823, 'Cons-01-stat-conf', '', '', '2021-07-02', '08:59:38', 'Abdou Majeed ALIDOU', '::1', 0),
(1824, 'Cons-01-stat-conf', '', '', '2021-07-02', '09:02:27', 'Abdou Majeed ALIDOU', '::1', 0),
(1825, 'Cons-01-stat-conf', '', '', '2021-07-02', '09:03:39', 'Abdou Majeed ALIDOU', '::1', 0),
(1826, 'Cons-01-facture-conf', '', '', '2021-07-02', '09:18:59', 'Abdou Majeed ALIDOU', '::1', 0),
(1827, 'Cons-01-facture-conf', '', '', '2021-07-02', '09:21:02', 'Abdou Majeed ALIDOU', '::1', 0),
(1828, 'Cons-01-stat-conf', '', '', '2021-07-02', '09:21:48', 'Abdou Majeed ALIDOU', '::1', 0),
(1829, 'Cons-01-stat-conf', '', '', '2021-07-02', '09:23:42', 'Abdou Majeed ALIDOU', '::1', 0),
(1830, 'Cons-01-stat-conf', '', '', '2021-07-02', '09:23:43', 'Abdou Majeed ALIDOU', '::1', 0),
(1831, 'Cons-01-location-conf', '', '', '2021-07-02', '09:24:00', 'Abdou Majeed ALIDOU', '::1', 0),
(1832, 'Modif-01-location-conf', '20', '', '2021-07-02', '09:24:20', 'Abdou Majeed ALIDOU', '::1', 0),
(1833, 'Cons-01-stat-conf', '', '', '2021-07-02', '09:24:22', 'Abdou Majeed ALIDOU', '::1', 0),
(1834, 'Cons-01-stat-conf', '', '', '2021-07-02', '09:26:44', 'Abdou Majeed ALIDOU', '::1', 0),
(1835, 'Cons-01-stat-conf', '', '', '2021-07-02', '09:26:48', 'Abdou Majeed ALIDOU', '::1', 0),
(1836, 'Cons-01-stat-conf', '', '', '2021-07-02', '09:38:24', 'Abdou Majeed ALIDOU', '::1', 0),
(1837, 'Cons-01-stat-conf', '', '', '2021-07-02', '09:40:02', 'Abdou Majeed ALIDOU', '::1', 0),
(1838, 'Cons-01-stat-conf', '', '', '2021-07-02', '09:41:32', 'Abdou Majeed ALIDOU', '::1', 0),
(1839, 'Cons-01-stat-conf', '', '', '2021-07-02', '09:46:47', 'Abdou Majeed ALIDOU', '::1', 0),
(1840, 'Cons-01-stat-conf', '', '', '2021-07-02', '09:47:15', 'Abdou Majeed ALIDOU', '::1', 0),
(1841, 'Cons-01-stat-conf', '', '', '2021-07-02', '09:47:44', 'Abdou Majeed ALIDOU', '::1', 0),
(1842, 'Cons-01-stat-conf', '', '', '2021-07-02', '10:02:00', 'Abdou Majeed ALIDOU', '::1', 0),
(1843, 'Cons-01-stat-conf', '', '', '2021-07-02', '10:04:53', 'Abdou Majeed ALIDOU', '::1', 0),
(1844, 'Cons-01-stat-conf', '', '', '2021-07-02', '10:05:45', 'Abdou Majeed ALIDOU', '::1', 0),
(1845, 'Cons-01-stat-conf', '', '', '2021-07-02', '10:06:34', 'Abdou Majeed ALIDOU', '::1', 0),
(1846, 'Cons-01-stat-conf', '', '', '2021-07-02', '10:07:47', 'Abdou Majeed ALIDOU', '::1', 0),
(1847, 'Cons-01-facture-conf', '', '', '2021-07-02', '10:09:08', 'Abdou Majeed ALIDOU', '::1', 0),
(1848, 'Cons-01-facture-conf', '', '', '2021-07-02', '10:13:00', 'Abdou Majeed ALIDOU', '::1', 0),
(1849, 'Cons-01-carac-conf', '', '', '2021-07-02', '10:13:04', 'Abdou Majeed ALIDOU', '::1', 0),
(1850, 'Cons-01-stat-conf', '', '', '2021-07-02', '10:13:05', 'Abdou Majeed ALIDOU', '::1', 0),
(1851, 'Cons-01-stat-conf', '', '', '2021-07-02', '10:13:35', 'Abdou Majeed ALIDOU', '::1', 0),
(1852, 'Cons-01-stat-conf', '', '', '2021-07-02', '10:14:20', 'Abdou Majeed ALIDOU', '::1', 0),
(1853, 'Cons-01-stat-conf', '', '', '2021-07-02', '10:15:54', 'Abdou Majeed ALIDOU', '::1', 0),
(1854, 'Cons-01-stat-conf', '', '', '2021-07-02', '10:16:25', 'Abdou Majeed ALIDOU', '::1', 0),
(1855, 'Cons-01-stat-conf', '', '', '2021-07-02', '10:16:47', 'Abdou Majeed ALIDOU', '::1', 0),
(1856, 'Cons-01-stat-conf', '', '', '2021-07-02', '10:19:06', 'Abdou Majeed ALIDOU', '::1', 0),
(1857, 'Cons-01-stat-conf', '', '', '2021-07-02', '10:19:16', 'Abdou Majeed ALIDOU', '::1', 0),
(1858, 'Cons-01-stat-conf', '', '', '2021-07-02', '10:19:36', 'Abdou Majeed ALIDOU', '::1', 0),
(1859, 'Cons-01-stat-conf', '', '', '2021-07-02', '10:20:13', 'Abdou Majeed ALIDOU', '::1', 0),
(1860, 'Cons-01-stat-conf', '', '', '2021-07-02', '10:22:02', 'Abdou Majeed ALIDOU', '::1', 0),
(1861, 'Cons-01-stat-conf', '', '', '2021-07-02', '10:22:44', 'Abdou Majeed ALIDOU', '::1', 0),
(1862, 'Cons-01-stat-conf', '', '', '2021-07-02', '10:22:47', 'Abdou Majeed ALIDOU', '::1', 0),
(1863, 'Cons-01-stat-conf', '', '', '2021-07-02', '10:23:30', 'Abdou Majeed ALIDOU', '::1', 0),
(1864, 'Cons-01-stat-conf', '', '', '2021-07-02', '10:23:48', 'Abdou Majeed ALIDOU', '::1', 0),
(1865, 'Cons-01-stat-conf', '', '', '2021-07-02', '10:24:00', 'Abdou Majeed ALIDOU', '::1', 0),
(1866, 'Cons-01-stat-conf', '', '', '2021-07-02', '10:24:26', 'Abdou Majeed ALIDOU', '::1', 0),
(1867, 'Cons-01-stat-conf', '', '', '2021-07-02', '10:25:27', 'Abdou Majeed ALIDOU', '::1', 0),
(1868, 'Cons-01-stat-conf', '', '', '2021-07-02', '10:25:39', 'Abdou Majeed ALIDOU', '::1', 0),
(1869, 'Cons-01-stat-conf', '', '', '2021-07-02', '10:26:01', 'Abdou Majeed ALIDOU', '::1', 0),
(1870, 'Cons-01-stat-conf', '', '', '2021-07-02', '10:26:17', 'Abdou Majeed ALIDOU', '::1', 0),
(1871, 'Cons-01-stat-conf', '', '', '2021-07-02', '10:26:30', 'Abdou Majeed ALIDOU', '::1', 0),
(1872, 'Cons-01-stat-conf', '', '', '2021-07-02', '10:26:55', 'Abdou Majeed ALIDOU', '::1', 0),
(1873, 'Cons-01-stat-conf', '', '', '2021-07-02', '10:27:03', 'Abdou Majeed ALIDOU', '::1', 0),
(1874, 'Cons-01-stat-conf', '', '', '2021-07-02', '10:27:14', 'Abdou Majeed ALIDOU', '::1', 0),
(1875, 'Cons-01-stat-conf', '', '', '2021-07-02', '10:27:48', 'Abdou Majeed ALIDOU', '::1', 0),
(1876, 'Cons-01-stat-conf', '', '', '2021-07-02', '10:30:35', 'Abdou Majeed ALIDOU', '::1', 0),
(1877, 'Cons-01-stat-conf', '', '', '2021-07-02', '10:31:52', 'Abdou Majeed ALIDOU', '::1', 0),
(1878, 'Cons-01-stat-conf', '', '', '2021-07-02', '10:32:15', 'Abdou Majeed ALIDOU', '::1', 0),
(1879, 'Cons-01-stat-conf', '', '', '2021-07-02', '10:34:51', 'Abdou Majeed ALIDOU', '::1', 0),
(1880, 'Cons-01-stat-conf', '', '', '2021-07-02', '10:35:40', 'Abdou Majeed ALIDOU', '::1', 0),
(1881, 'Cons-01-stat-conf', '', '', '2021-07-02', '10:38:42', 'Abdou Majeed ALIDOU', '::1', 0),
(1882, 'Cons-01-stat-conf', '', '', '2021-07-02', '10:43:49', 'Abdou Majeed ALIDOU', '::1', 0),
(1883, 'Cons-01-stat-conf', '', '', '2021-07-02', '10:54:22', 'Abdou Majeed ALIDOU', '::1', 0),
(1884, 'Cons-01-stat-conf', '', '', '2021-07-02', '10:54:46', 'Abdou Majeed ALIDOU', '::1', 0),
(1885, 'Cons-01-stat-conf', '', '', '2021-07-02', '10:54:57', 'Abdou Majeed ALIDOU', '::1', 0),
(1886, 'Cons-01-stat-conf', '', '', '2021-07-02', '10:56:59', 'Abdou Majeed ALIDOU', '::1', 0),
(1887, 'Cons-01-stat-conf', '', '', '2021-07-02', '12:57:52', 'Abdou Majeed ALIDOU', '::1', 0),
(1888, 'Cons-01-location-conf', '', '', '2021-07-02', '13:55:21', 'Abdou Majeed ALIDOU', '::1', 0),
(1889, 'Cons-01-stat-conf', '', '', '2021-07-02', '14:37:43', 'Abdou Majeed ALIDOU', '::1', 0),
(1890, 'Cons-01-location-conf', '', '', '2021-07-02', '14:57:12', 'Abdou Majeed ALIDOU', '::1', 0),
(1891, 'Cons-01-stat-conf', '', '', '2021-07-02', '15:36:39', 'Abdou Majeed ALIDOU', '::1', 0),
(1892, 'Cons-01-stat-conf', '', '', '2021-07-02', '15:39:49', 'Abdou Majeed ALIDOU', '::1', 0),
(1893, 'Cons-01-stat-conf', '', '', '2021-07-02', '15:40:53', 'Abdou Majeed ALIDOU', '::1', 0),
(1894, 'Cons-01-stat-conf', '', '', '2021-07-02', '15:41:04', 'Abdou Majeed ALIDOU', '::1', 0),
(1895, 'Cons-01-stat-conf', '', '', '2021-07-02', '15:41:26', 'Abdou Majeed ALIDOU', '::1', 0),
(1896, 'Cons-01-stat-conf', '', '', '2021-07-02', '15:41:48', 'Abdou Majeed ALIDOU', '::1', 0),
(1897, 'Cons-01-stat-conf', '', '', '2021-07-02', '15:42:19', 'Abdou Majeed ALIDOU', '::1', 0),
(1898, 'Cons-01-stat-conf', '', '', '2021-07-02', '15:42:55', 'Abdou Majeed ALIDOU', '::1', 0),
(1899, 'Cons-01-stat-conf', '', '', '2021-07-02', '15:44:13', 'Abdou Majeed ALIDOU', '::1', 0),
(1900, 'Cons-01-stat-conf', '', '', '2021-07-02', '15:44:21', 'Abdou Majeed ALIDOU', '::1', 0),
(1901, 'Cons-01-stat-conf', '', '', '2021-07-02', '15:44:56', 'Abdou Majeed ALIDOU', '::1', 0),
(1902, 'Cons-01-stat-conf', '', '', '2021-07-02', '15:45:17', 'Abdou Majeed ALIDOU', '::1', 0),
(1903, 'Cons-01-stat-conf', '', '', '2021-07-02', '15:45:27', 'Abdou Majeed ALIDOU', '::1', 0),
(1904, 'Cons-01-stat-conf', '', '', '2021-07-02', '15:45:37', 'Abdou Majeed ALIDOU', '::1', 0),
(1905, 'Cons-01-stat-conf', '', '', '2021-07-02', '15:45:48', 'Abdou Majeed ALIDOU', '::1', 0),
(1906, 'Cons-01-stat-conf', '', '', '2021-07-05', '10:08:33', 'Abdou Majeed ALIDOU', '::1', 0),
(1907, 'Cons-01-stat-conf', '', '', '2021-07-05', '10:15:58', 'Abdou Majeed ALIDOU', '::1', 0),
(1908, 'Cons-01-stat-conf', '', '', '2021-07-05', '10:19:20', 'Abdou Majeed ALIDOU', '::1', 0),
(1909, 'Cons-01-stat-conf', '', '', '2021-07-05', '10:20:36', 'Abdou Majeed ALIDOU', '::1', 0),
(1910, 'Cons-01-stat-conf', '', '', '2021-07-05', '10:24:09', 'Abdou Majeed ALIDOU', '::1', 0),
(1911, 'Cons-01-stat-conf', '', '', '2021-07-05', '10:30:19', 'Abdou Majeed ALIDOU', '::1', 0),
(1912, 'Cons-01-stat-conf', '', '', '2021-07-05', '10:30:35', 'Abdou Majeed ALIDOU', '::1', 0),
(1913, 'Cons-01-stat-conf', '', '', '2021-07-05', '11:43:41', 'Abdou Majeed ALIDOU', '::1', 0),
(1914, 'Cons-01-stat-conf', '', '', '2021-07-05', '13:02:18', 'Abdou Majeed ALIDOU', '::1', 0),
(1915, 'Cons-01-location-conf', '', '', '2021-07-05', '13:08:55', 'Abdou Majeed ALIDOU', '::1', 0),
(1916, 'Cons-01-stat-conf', '', '', '2021-07-05', '13:16:18', 'Abdou Majeed ALIDOU', '::1', 0),
(1917, 'Cons-01-location-conf', '', '', '2021-07-05', '13:56:42', 'Abdou Majeed ALIDOU', '::1', 0),
(1918, 'Cons-01-stat-conf', '', '', '2021-07-05', '13:56:55', 'Abdou Majeed ALIDOU', '::1', 0),
(1919, 'Cons-01-location-conf', '', '', '2021-07-05', '13:57:11', 'Abdou Majeed ALIDOU', '::1', 0),
(1920, 'Cons-01-stat-conf', '', '', '2021-07-05', '13:57:16', 'Abdou Majeed ALIDOU', '::1', 0),
(1921, 'Cons-01-location-conf', '', '', '2021-07-05', '14:05:32', 'Abdou Majeed ALIDOU', '::1', 0),
(1922, 'Cons-01-stat-conf', '', '', '2021-07-05', '14:07:11', 'Abdou Majeed ALIDOU', '::1', 0),
(1923, 'Cons-01-location-conf', '', '', '2021-07-05', '14:07:50', 'Abdou Majeed ALIDOU', '::1', 0),
(1924, 'Cons-01-stat-conf', '', '', '2021-07-05', '14:15:27', 'Abdou Majeed ALIDOU', '::1', 0),
(1925, 'Cons-01-location-conf', '', '', '2021-07-05', '14:27:26', 'Abdou Majeed ALIDOU', '::1', 0),
(1926, 'Cons-01-salle-conf', '', '', '2021-07-05', '14:29:26', 'Abdou Majeed ALIDOU', '::1', 0),
(1927, 'Enr-01-salle-conf', 'qqq', '', '2021-07-05', '14:29:32', 'Abdou Majeed ALIDOU', '::1', 0),
(1928, 'Cons-01-location-conf', '', '', '2021-07-05', '14:29:58', 'Abdou Majeed ALIDOU', '::1', 0),
(1929, 'Cons-01-salle-conf', '', '', '2021-07-05', '14:30:02', 'Abdou Majeed ALIDOU', '::1', 0),
(1930, 'Chg-01-salle-conf', 'qqq,Inactif', '', '2021-07-05', '14:30:14', 'Abdou Majeed ALIDOU', '::1', 0),
(1931, 'Cons-01-salle-conf', '', '', '2021-07-05', '14:31:04', 'Abdou Majeed ALIDOU', '::1', 0),
(1932, 'Cons-01-location-conf', '', '', '2021-07-05', '14:31:35', 'Abdou Majeed ALIDOU', '::1', 0),
(1933, 'Cons-01-stat-conf', '', '', '2021-07-05', '14:31:38', 'Abdou Majeed ALIDOU', '::1', 0),
(1934, 'Cons-01-type-chambre', '', '', '2021-07-05', '14:53:28', 'Abdou Majeed ALIDOU', '::1', 0),
(1935, 'Cons-01-stat-conf', '', '', '2021-07-05', '15:03:49', 'Abdou Majeed ALIDOU', '::1', 0),
(1936, 'Cons-01-location-conf', '', '', '2021-07-05', '16:12:05', 'Abdou Majeed ALIDOU', '::1', 0),
(1937, 'Cons-01-stat-conf', '', '', '2021-07-05', '16:13:32', 'Abdou Majeed ALIDOU', '::1', 0),
(1938, 'Cons-01-facture-conf', '', '', '2021-07-05', '16:28:40', 'Abdou Majeed ALIDOU', '::1', 0),
(1939, 'Cons-01-location-conf', '', '', '2021-07-05', '16:29:48', 'Abdou Majeed ALIDOU', '::1', 0),
(1940, 'Cons-01-location-conf', '', '', '2021-07-05', '16:42:57', 'Abdou Majeed ALIDOU', '::1', 0),
(1941, 'Cons-01-facture-conf', '', '', '2021-07-05', '16:43:33', 'Abdou Majeed ALIDOU', '::1', 0),
(1942, 'Cons-01-location-conf', '', '', '2021-07-05', '16:43:42', 'Abdou Majeed ALIDOU', '::1', 0),
(1943, 'Cons-01-stat-conf', '', '', '2021-07-05', '16:45:44', 'Abdou Majeed ALIDOU', '::1', 0),
(1944, 'Cons-01-location-conf', '', '', '2021-07-05', '16:48:08', 'Abdou Majeed ALIDOU', '::1', 0),
(1945, 'Cons-01-stat-conf', '', '', '2021-07-05', '16:49:07', 'Abdou Majeed ALIDOU', '::1', 0),
(1946, 'Cons-01-location-conf', '', '', '2021-07-05', '16:57:07', 'Abdou Majeed ALIDOU', '::1', 0),
(1947, 'Cons-01-stat-conf', '', '', '2021-07-05', '21:27:55', 'Abdou Majeed ALIDOU', '::1', 0),
(1948, 'Cons-01-stat-conf', '', '', '2021-07-05', '21:28:14', 'Abdou Majeed ALIDOU', '::1', 0),
(1949, 'Cons-01-stat-conf', '', '', '2021-07-05', '21:28:27', 'Abdou Majeed ALIDOU', '::1', 0),
(1950, 'Cons-01-stat-conf', '', '', '2021-07-05', '21:29:22', 'Abdou Majeed ALIDOU', '::1', 0),
(1951, 'Cons-01-stat-conf', '', '', '2021-07-05', '21:37:24', 'Abdou Majeed ALIDOU', '::1', 0),
(1952, 'Cons-01-stat-conf', '', '', '2021-07-05', '21:37:35', 'Abdou Majeed ALIDOU', '::1', 0),
(1953, 'Cons-01-stat-conf', '', '', '2021-07-05', '22:00:33', 'Abdou Majeed ALIDOU', '::1', 0),
(1954, 'Cons-01-stat-conf', '', '', '2021-07-05', '22:03:11', 'Abdou Majeed ALIDOU', '::1', 0),
(1955, 'Cons-01-stat-conf', '', '', '2021-07-05', '22:06:00', 'Abdou Majeed ALIDOU', '::1', 0),
(1956, 'Cons-01-location-conf', '', '', '2021-07-05', '22:06:12', 'Abdou Majeed ALIDOU', '::1', 0),
(1957, 'Enr-01-location-conf', '24', '', '2021-07-05', '22:06:54', 'Abdou Majeed ALIDOU', '::1', 0),
(1958, 'IndiqPrix-01-location-conf', '24', '', '2021-07-05', '22:07:07', 'Abdou Majeed ALIDOU', '::1', 0),
(1959, 'Cons-01-stat-conf', '', '', '2021-07-05', '22:07:10', 'Abdou Majeed ALIDOU', '::1', 0),
(1960, 'Cons-01-location-conf', '', '', '2021-07-05', '22:08:03', 'Abdou Majeed ALIDOU', '::1', 0),
(1961, 'Chg-01-location-conf', '24,Inactif', '', '2021-07-05', '22:08:08', 'Abdou Majeed ALIDOU', '::1', 0),
(1962, 'Cons-01-stat-conf', '', '', '2021-07-05', '22:08:11', 'Abdou Majeed ALIDOU', '::1', 0),
(1963, 'Cons-01-stat-conf', '', '', '2021-07-06', '09:08:04', 'Abdou Majeed ALIDOU', '::1', 0),
(1964, 'Cons-01-stat-conf', '', '', '2021-07-06', '09:09:46', 'Abdou Majeed ALIDOU', '::1', 0),
(1965, 'Cons-01-stat-conf', '', '', '2021-07-06', '09:09:53', 'Abdou Majeed ALIDOU', '::1', 0),
(1966, 'Cons-01-stat-conf', '', '', '2021-07-06', '09:11:59', 'Abdou Majeed ALIDOU', '::1', 0),
(1967, 'Cons-01-stat-conf', '', '', '2021-07-06', '09:12:23', 'Abdou Majeed ALIDOU', '::1', 0),
(1968, 'Cons-01-stat-conf', '', '', '2021-07-06', '09:12:38', 'Abdou Majeed ALIDOU', '::1', 0),
(1969, 'Cons-01-stat-conf', '', '', '2021-07-06', '09:12:49', 'Abdou Majeed ALIDOU', '::1', 0),
(1970, 'Cons-01-stat-conf', '', '', '2021-07-06', '09:13:11', 'Abdou Majeed ALIDOU', '::1', 0),
(1971, 'Cons-01-stat-conf', '', '', '2021-07-06', '09:21:25', 'Abdou Majeed ALIDOU', '::1', 0),
(1972, 'Cons-01-location-conf', '', '', '2021-07-06', '09:22:27', 'Abdou Majeed ALIDOU', '::1', 0),
(1973, 'Chg-01-location-conf', '21,Inactif', '', '2021-07-06', '09:22:37', 'Abdou Majeed ALIDOU', '::1', 0),
(1974, 'Cons-01-stat-conf', '', '', '2021-07-06', '09:22:40', 'Abdou Majeed ALIDOU', '::1', 0),
(1975, 'Cons-01-stat-conf', '', '', '2021-07-06', '09:22:50', 'Abdou Majeed ALIDOU', '::1', 0),
(1976, 'Cons-01-location-conf', '', '', '2021-07-06', '09:22:56', 'Abdou Majeed ALIDOU', '::1', 0),
(1977, 'Chg-01-location-conf', '22,Inactif', '', '2021-07-06', '09:23:19', 'Abdou Majeed ALIDOU', '::1', 0),
(1978, 'Cons-01-stat-conf', '', '', '2021-07-06', '09:23:21', 'Abdou Majeed ALIDOU', '::1', 0),
(1979, 'Cons-01-stat-conf', '', '', '2021-07-06', '09:23:29', 'Abdou Majeed ALIDOU', '::1', 0),
(1980, 'Cons-01-stat-conf', '', '', '2021-07-06', '09:25:03', 'Abdou Majeed ALIDOU', '::1', 0),
(1981, 'Cons-01-stat-conf', '', '', '2021-07-06', '09:25:46', 'Abdou Majeed ALIDOU', '::1', 0),
(1982, 'Cons-01-stat-conf', '', '', '2021-07-06', '09:26:20', 'Abdou Majeed ALIDOU', '::1', 0),
(1983, 'Cons-01-stat-conf', '', '', '2021-07-06', '09:26:41', 'Abdou Majeed ALIDOU', '::1', 0),
(1984, 'Cons-01-stat-conf', '', '', '2021-07-06', '09:26:46', 'Abdou Majeed ALIDOU', '::1', 0),
(1985, 'Cons-01-stat-conf', '', '', '2021-07-06', '09:29:10', 'Abdou Majeed ALIDOU', '::1', 0),
(1986, 'Cons-01-stat-conf', '', '', '2021-07-06', '09:29:24', 'Abdou Majeed ALIDOU', '::1', 0),
(1987, 'Cons-01-stat-conf', '', '', '2021-07-06', '09:29:38', 'Abdou Majeed ALIDOU', '::1', 0),
(1988, 'Cons-01-stat-conf', '', '', '2021-07-06', '09:29:48', 'Abdou Majeed ALIDOU', '::1', 0),
(1989, 'Cons-01-stat-conf', '', '', '2021-07-06', '09:31:41', 'Abdou Majeed ALIDOU', '::1', 0),
(1990, 'Cons-01-stat-conf', '', '', '2021-07-06', '09:33:07', 'Abdou Majeed ALIDOU', '::1', 0),
(1991, 'Cons-01-stat-conf', '', '', '2021-07-06', '09:34:20', 'Abdou Majeed ALIDOU', '::1', 0),
(1992, 'Cons-01-stat-conf', '', '', '2021-07-06', '09:38:49', 'Abdou Majeed ALIDOU', '::1', 0),
(1993, 'Cons-01-stat-conf', '', '', '2021-07-06', '09:40:03', 'Abdou Majeed ALIDOU', '::1', 0),
(1994, 'Cons-01-stat-conf', '', '', '2021-07-06', '09:41:24', 'Abdou Majeed ALIDOU', '::1', 0),
(1995, 'Cons-01-location-conf', '', '', '2021-07-06', '09:41:54', 'Abdou Majeed ALIDOU', '::1', 0),
(1996, 'Cons-01-stat-conf', '', '', '2021-07-06', '09:46:04', 'Abdou Majeed ALIDOU', '::1', 0),
(1997, 'Cons-01-stat-conf', '', '', '2021-07-06', '09:54:25', 'Abdou Majeed ALIDOU', '::1', 0),
(1998, 'Cons-01-stat-conf', '', '', '2021-07-06', '09:55:53', 'Abdou Majeed ALIDOU', '::1', 0),
(1999, 'Cons-01-stat-conf', '', '', '2021-07-06', '10:06:31', 'Abdou Majeed ALIDOU', '::1', 0),
(2000, 'Cons-01-stat-conf', '', '', '2021-07-06', '10:07:12', 'Abdou Majeed ALIDOU', '::1', 0),
(2001, 'Cons-01-stat-conf', '', '', '2021-07-06', '10:11:49', 'Abdou Majeed ALIDOU', '::1', 0),
(2002, 'Cons-01-stat-conf', '', '', '2021-07-06', '10:19:59', 'Abdou Majeed ALIDOU', '::1', 0),
(2003, 'Cons-01-stat-conf', '', '', '2021-07-06', '10:20:25', 'Abdou Majeed ALIDOU', '::1', 0),
(2004, 'Cons-01-stat-conf', '', '', '2021-07-06', '10:24:51', 'Abdou Majeed ALIDOU', '::1', 0),
(2005, 'Cons-01-stat-conf', '', '', '2021-07-06', '10:29:20', 'Abdou Majeed ALIDOU', '::1', 0),
(2006, 'Cons-01-stat-conf', '', '', '2021-07-06', '10:29:22', 'Abdou Majeed ALIDOU', '::1', 0),
(2007, 'Cons-01-stat-conf', '', '', '2021-07-06', '10:29:50', 'Abdou Majeed ALIDOU', '::1', 0),
(2008, 'Cons-01-stat-conf', '', '', '2021-07-06', '10:31:14', 'Abdou Majeed ALIDOU', '::1', 0),
(2009, 'Cons-01-stat-conf', '', '', '2021-07-06', '10:32:41', 'Abdou Majeed ALIDOU', '::1', 0),
(2010, 'Cons-01-stat-conf', '', '', '2021-07-06', '10:33:14', 'Abdou Majeed ALIDOU', '::1', 0),
(2011, 'Cons-01-stat-conf', '', '', '2021-07-06', '10:33:52', 'Abdou Majeed ALIDOU', '::1', 0),
(2012, 'Cons-01-stat-conf', '', '', '2021-07-06', '10:36:09', 'Abdou Majeed ALIDOU', '::1', 0),
(2013, 'Cons-01-stat-conf', '', '', '2021-07-06', '10:37:54', 'Abdou Majeed ALIDOU', '::1', 0),
(2014, 'Cons-01-stat-conf', '', '', '2021-07-06', '10:38:33', 'Abdou Majeed ALIDOU', '::1', 0),
(2015, 'Cons-01-stat-conf', '', '', '2021-07-06', '10:40:15', 'Abdou Majeed ALIDOU', '::1', 0),
(2016, 'Cons-01-stat-conf', '', '', '2021-07-06', '10:41:51', 'Abdou Majeed ALIDOU', '::1', 0),
(2017, 'Cons-01-stat-conf', '', '', '2021-07-06', '10:43:49', 'Abdou Majeed ALIDOU', '::1', 0),
(2018, 'Cons-01-stat-conf', '', '', '2021-07-06', '10:44:53', 'Abdou Majeed ALIDOU', '::1', 0),
(2019, 'Cons-01-location-conf', '', '', '2021-07-06', '10:45:02', 'Abdou Majeed ALIDOU', '::1', 0),
(2020, 'Cons-01-stat-conf', '', '', '2021-07-06', '10:45:27', 'Abdou Majeed ALIDOU', '::1', 0),
(2021, 'Cons-01-stat-conf', '', '', '2021-07-06', '10:46:04', 'Abdou Majeed ALIDOU', '::1', 0),
(2022, 'Cons-01-stat-conf', '', '', '2021-07-06', '10:48:39', 'Abdou Majeed ALIDOU', '::1', 0),
(2023, 'Cons-01-stat-conf', '', '', '2021-07-06', '10:52:39', 'Abdou Majeed ALIDOU', '::1', 0),
(2024, 'Cons-01-stat-conf', '', '', '2021-07-06', '10:53:29', 'Abdou Majeed ALIDOU', '::1', 0),
(2025, 'Cons-01-stat-conf', '', '', '2021-07-06', '11:02:45', 'Abdou Majeed ALIDOU', '::1', 0),
(2026, 'Cons-01-stat-conf', '', '', '2021-07-06', '11:05:01', 'Abdou Majeed ALIDOU', '::1', 0),
(2027, 'Cons-01-stat-conf', '', '', '2021-07-06', '11:05:20', 'Abdou Majeed ALIDOU', '::1', 0),
(2028, 'Cons-01-stat-conf', '', '', '2021-07-06', '11:05:52', 'Abdou Majeed ALIDOU', '::1', 0),
(2029, 'Cons-01-stat-conf', '', '', '2021-07-06', '11:06:11', 'Abdou Majeed ALIDOU', '::1', 0),
(2030, 'Cons-01-stat-conf', '', '', '2021-07-06', '11:06:51', 'Abdou Majeed ALIDOU', '::1', 0),
(2031, 'Cons-01-stat-conf', '', '', '2021-07-06', '11:07:09', 'Abdou Majeed ALIDOU', '::1', 0),
(2032, 'Cons-01-stat-conf', '', '', '2021-07-06', '11:07:22', 'Abdou Majeed ALIDOU', '::1', 0),
(2033, 'Cons-01-stat-conf', '', '', '2021-07-06', '11:07:51', 'Abdou Majeed ALIDOU', '::1', 0),
(2034, 'Cons-01-stat-conf', '', '', '2021-07-06', '11:09:05', 'Abdou Majeed ALIDOU', '::1', 0),
(2035, 'Cons-01-stat-conf', '', '', '2021-07-06', '11:09:23', 'Abdou Majeed ALIDOU', '::1', 0),
(2036, 'Cons-01-stat-conf', '', '', '2021-07-06', '11:11:29', 'Abdou Majeed ALIDOU', '::1', 0),
(2037, 'Cons-01-stat-conf', '', '', '2021-07-06', '11:13:03', 'Abdou Majeed ALIDOU', '::1', 0),
(2038, 'Cons-01-stat-conf', '', '', '2021-07-06', '11:13:52', 'Abdou Majeed ALIDOU', '::1', 0),
(2039, 'Cons-01-stat-conf', '', '', '2021-07-06', '11:18:06', 'Abdou Majeed ALIDOU', '::1', 0),
(2040, 'Cons-01-stat-conf', '', '', '2021-07-06', '11:19:47', 'Abdou Majeed ALIDOU', '::1', 0),
(2041, 'Cons-01-stat-conf', '', '', '2021-07-06', '11:27:26', 'Abdou Majeed ALIDOU', '::1', 0),
(2042, 'Cons-01-location-conf', '', '', '2021-07-06', '11:28:28', 'Abdou Majeed ALIDOU', '::1', 0),
(2043, 'Enr-01-location-conf', '25', '', '2021-07-06', '11:29:09', 'Abdou Majeed ALIDOU', '::1', 0),
(2044, 'Cons-01-stat-conf', '', '', '2021-07-06', '11:29:12', 'Abdou Majeed ALIDOU', '::1', 0),
(2045, 'Cons-01-location-conf', '', '', '2021-07-06', '11:49:34', 'Abdou Majeed ALIDOU', '::1', 0),
(2046, 'Enr-01-location-conf', '26', '', '2021-07-06', '11:49:53', 'Abdou Majeed ALIDOU', '::1', 0),
(2047, 'Cons-01-stat-conf', '', '', '2021-07-06', '11:57:29', 'Abdou Majeed ALIDOU', '::1', 0),
(2048, 'Cons-01-stat-conf', '', '', '2021-07-06', '11:58:09', 'Abdou Majeed ALIDOU', '::1', 0),
(2049, 'Cons-01-stat-conf', '', '', '2021-07-06', '12:04:43', 'Abdou Majeed ALIDOU', '::1', 0),
(2050, 'Cons-01-stat-conf', '', '', '2021-07-06', '12:15:52', 'Abdou Majeed ALIDOU', '::1', 0),
(2051, 'Cons-01-stat-conf', '', '', '2021-07-06', '12:20:46', 'Abdou Majeed ALIDOU', '::1', 0),
(2052, 'Cons-01-stat-conf', '', '', '2021-07-06', '12:21:51', 'Abdou Majeed ALIDOU', '::1', 0),
(2053, 'Cons-01-location-conf', '', '', '2021-07-06', '15:18:28', 'Abdou Majeed ALIDOU', '::1', 0),
(2054, 'Cons-01-location-conf', '', '', '2021-07-06', '15:34:43', 'Abdou Majeed ALIDOU', '::1', 0),
(2055, 'FacEdit-01-location-conf', '25', '', '2021-07-06', '15:35:58', 'Abdou Majeed ALIDOU', '::1', 0),
(2056, 'FacEdit-01-location-conf', '25', '', '2021-07-06', '15:36:02', 'Abdou Majeed ALIDOU', '::1', 0),
(2057, 'FacEdit-01-location-conf', '25', '', '2021-07-06', '15:36:02', 'Abdou Majeed ALIDOU', '::1', 0),
(2058, 'FacEdit-01-location-conf', '25', '', '2021-07-06', '15:36:03', 'Abdou Majeed ALIDOU', '::1', 0),
(2059, 'FacEdit-01-location-conf', '25', '', '2021-07-06', '15:36:05', 'Abdou Majeed ALIDOU', '::1', 0),
(2060, 'FacEdit-01-location-conf', '25', '', '2021-07-06', '15:36:05', 'Abdou Majeed ALIDOU', '::1', 0),
(2061, 'Cons-01-location-conf', '', '', '2021-07-06', '15:37:15', 'Abdou Majeed ALIDOU', '::1', 0),
(2062, 'FacEdit-01-location-conf', '23', '', '2021-07-06', '15:37:53', 'Abdou Majeed ALIDOU', '::1', 0),
(2063, 'FacEdit-01-location-conf', '23', '', '2021-07-06', '15:40:06', 'Abdou Majeed ALIDOU', '::1', 0),
(2064, 'Cons-01-location-conf', '', '', '2021-07-06', '15:41:50', 'Abdou Majeed ALIDOU', '::1', 0),
(2065, 'FacEdit-01-location-conf', '20', '', '2021-07-06', '15:42:27', 'Abdou Majeed ALIDOU', '::1', 0),
(2066, 'FacEdit-01-location-conf', '20', '', '2021-07-06', '15:43:13', 'Abdou Majeed ALIDOU', '::1', 0),
(2067, 'FacEdit-01-location-conf', '20', '', '2021-07-06', '15:43:14', 'Abdou Majeed ALIDOU', '::1', 0),
(2068, 'FacEdit-01-location-conf', '20', '', '2021-07-06', '15:43:14', 'Abdou Majeed ALIDOU', '::1', 0),
(2069, 'FacEdit-01-location-conf', '20', '', '2021-07-06', '15:43:14', 'Abdou Majeed ALIDOU', '::1', 0),
(2070, 'FacEdit-01-location-conf', '20', '', '2021-07-06', '15:43:15', 'Abdou Majeed ALIDOU', '::1', 0);
INSERT INTO `addlog_table` (`id_addlog_table`, `CodeEvenement`, `ParametresEvenement`, `MessageEvenement`, `DateEvenement`, `HeureEvenement`, `PseudoUtilisateur`, `AdresseIP`, `IdCompte`) VALUES
(2071, 'Cons-01-location-conf', '', '', '2021-07-06', '15:47:30', 'Abdou Majeed ALIDOU', '::1', 0),
(2072, 'Cons-01-location-conf', '', '', '2021-07-06', '15:47:55', 'Abdou Majeed ALIDOU', '::1', 0),
(2073, 'Cons-01-stat-conf', '', '', '2021-07-06', '15:49:26', 'Abdou Majeed ALIDOU', '::1', 0),
(2074, 'Cons-01-stat-conf', '', '', '2021-07-06', '15:50:39', 'Abdou Majeed ALIDOU', '::1', 0),
(2075, 'Cons-01-location-conf', '', '', '2021-07-06', '15:53:32', 'Abdou Majeed ALIDOU', '::1', 0),
(2076, 'IndiqPrix-01-location-conf', '26', '', '2021-07-06', '15:53:49', 'Abdou Majeed ALIDOU', '::1', 0),
(2077, 'Cons-01-location-conf', '', '', '2021-07-06', '16:01:38', 'Abdou Majeed ALIDOU', '::1', 0),
(2078, 'Cons-01-stat-conf', '', '', '2021-07-06', '16:15:35', 'Abdou Majeed ALIDOU', '::1', 0),
(2079, 'Cons-01-location-conf', '', '', '2021-07-06', '16:17:40', 'Abdou Majeed ALIDOU', '::1', 0),
(2080, 'FacEdit-01-location-conf', '26', '', '2021-07-06', '16:17:59', 'Abdou Majeed ALIDOU', '::1', 0),
(2081, 'Cons-01-location-conf', '', '', '2021-07-06', '16:18:39', 'Abdou Majeed ALIDOU', '::1', 0),
(2082, 'Info-01-location-conf', '26', '', '2021-07-06', '16:18:45', 'Abdou Majeed ALIDOU', '::1', 0),
(2083, 'Cons-01-stat-conf', '', '', '2021-07-06', '16:19:24', 'Abdou Majeed ALIDOU', '::1', 0),
(2084, 'Cons-01-stat-conf', '', '', '2021-07-06', '16:20:12', 'Abdou Majeed ALIDOU', '::1', 0),
(2085, 'Cons-01-stat-conf', '', '', '2021-07-06', '20:35:46', 'Abdou Majeed ALIDOU', '::1', 0),
(2086, 'Cons-01-stat-conf', '', '', '2021-07-06', '20:39:21', 'Abdou Majeed ALIDOU', '::1', 0),
(2087, 'Cons-01-stat-conf', '', '', '2021-07-06', '20:56:47', 'Abdou Majeed ALIDOU', '::1', 0),
(2088, 'Cons-01-location-conf', '', '', '2021-07-07', '08:30:17', 'Abdou Majeed ALIDOU', '::1', 0),
(2089, 'Cons-01-location-conf', '', '', '2021-07-07', '09:24:59', 'Abdou Majeed ALIDOU', '::1', 0),
(2090, 'Cons-01-facture-conf', '', '', '2021-07-07', '09:25:02', 'Abdou Majeed ALIDOU', '::1', 0),
(2091, 'Cons-01-salle-conf', '', '', '2021-07-07', '09:25:03', 'Abdou Majeed ALIDOU', '::1', 0),
(2092, 'Cons-01-carac-conf', '', '', '2021-07-07', '09:25:06', 'Abdou Majeed ALIDOU', '::1', 0),
(2093, 'Cons-01-service-conf', '', '', '2021-07-07', '09:25:09', 'Abdou Majeed ALIDOU', '::1', 0),
(2094, 'Cons-01-stat-conf', '', '', '2021-07-07', '09:25:11', 'Abdou Majeed ALIDOU', '::1', 0),
(2095, 'Cons-01-carac-conf', '', '', '2021-07-07', '09:25:28', 'Abdou Majeed ALIDOU', '::1', 0),
(2096, 'Enr-01-carac-conf', 'Climatisé', '', '2021-07-07', '09:25:56', 'Abdou Majeed ALIDOU', '::1', 0),
(2097, 'Enr-01-carac-conf', 'Ventilé', '', '2021-07-07', '09:26:08', 'Abdou Majeed ALIDOU', '::1', 0),
(2098, 'Enr-01-carac-conf', 'Table ronde', '', '2021-07-07', '09:27:23', 'Abdou Majeed ALIDOU', '::1', 0),
(2099, 'Enr-01-carac-conf', 'Grand écran', '', '2021-07-07', '09:28:49', 'Abdou Majeed ALIDOU', '::1', 0),
(2100, 'Enr-01-carac-conf', 'Projecteur', '', '2021-07-07', '09:29:13', 'Abdou Majeed ALIDOU', '::1', 0),
(2101, 'Info-01-carac-conf', 'Projecteur', '', '2021-07-07', '09:29:18', 'Abdou Majeed ALIDOU', '::1', 0),
(2102, 'Modif-01-carac-conf', 'Projecteur', '', '2021-07-07', '09:29:45', 'Abdou Majeed ALIDOU', '::1', 0),
(2103, 'Info-01-carac-conf', 'Projecteur', '', '2021-07-07', '09:29:49', 'Abdou Majeed ALIDOU', '::1', 0),
(2104, 'Modif-01-carac-conf', 'Projecteur', '', '2021-07-07', '09:30:24', 'Abdou Majeed ALIDOU', '::1', 0),
(2105, 'Info-01-carac-conf', 'Projecteur', '', '2021-07-07', '09:30:33', 'Abdou Majeed ALIDOU', '::1', 0),
(2106, 'Chg-01-carac-conf', 'Projecteur,Inactif', '', '2021-07-07', '09:31:07', 'Abdou Majeed ALIDOU', '::1', 0),
(2107, 'Info-01-carac-conf', 'Climatisé', '', '2021-07-07', '09:31:15', 'Abdou Majeed ALIDOU', '::1', 0),
(2108, 'Exp-01-carac-conf', 'PDF', '', '2021-07-07', '09:31:20', 'Abdou Majeed ALIDOU', '::1', 0),
(2109, 'Cons-01-carac-conf', '', '', '2021-07-07', '09:31:31', 'Abdou Majeed ALIDOU', '::1', 0),
(2110, 'Cons-01-stat-conf', '', '', '2021-07-07', '09:31:35', 'Abdou Majeed ALIDOU', '::1', 0),
(2111, 'Cons-01-carac-conf', '', '', '2021-07-07', '09:31:43', 'Abdou Majeed ALIDOU', '::1', 0),
(2112, 'Cons-01-salle-conf', '', '', '2021-07-07', '09:31:52', 'Abdou Majeed ALIDOU', '::1', 0),
(2113, 'Exp-01-salle-conf', 'PDF', '', '2021-07-07', '09:32:00', 'Abdou Majeed ALIDOU', '::1', 0),
(2114, 'Cons-01-salle-conf', '', '', '2021-07-07', '09:32:04', 'Abdou Majeed ALIDOU', '::1', 0),
(2115, 'Cons-01-carac-conf', '', '', '2021-07-07', '09:32:16', 'Abdou Majeed ALIDOU', '::1', 0),
(2116, 'Cons-01-salle-conf', '', '', '2021-07-07', '09:32:39', 'Abdou Majeed ALIDOU', '::1', 0),
(2117, 'Enr-01-salle-conf', 'Small', '', '2021-07-07', '09:34:48', 'Abdou Majeed ALIDOU', '::1', 0),
(2118, 'Enr-01-salle-conf', 'Medium', '', '2021-07-07', '09:42:34', 'Abdou Majeed ALIDOU', '::1', 0),
(2119, 'Info-01-salle-conf', 'Small', '', '2021-07-07', '09:42:45', 'Abdou Majeed ALIDOU', '::1', 0),
(2120, 'Cons-01-salle-conf', '', '', '2021-07-07', '09:42:59', 'Abdou Majeed ALIDOU', '::1', 0),
(2121, 'Info-01-salle-conf', 'Medium', '', '2021-07-07', '09:43:04', 'Abdou Majeed ALIDOU', '::1', 0),
(2122, 'Modif-01-salle-conf', 'Medium', '', '2021-07-07', '09:43:35', 'Abdou Majeed ALIDOU', '::1', 0),
(2123, 'Info-01-salle-conf', 'Medium', '', '2021-07-07', '09:43:41', 'Abdou Majeed ALIDOU', '::1', 0),
(2124, 'Modif-01-salle-conf', 'Medium', '', '2021-07-07', '09:44:41', 'Abdou Majeed ALIDOU', '::1', 0),
(2125, 'Cons-01-carac-conf', '', '', '2021-07-07', '09:45:10', 'Abdou Majeed ALIDOU', '::1', 0),
(2126, 'Cons-01-salle-conf', '', '', '2021-07-07', '09:45:12', 'Abdou Majeed ALIDOU', '::1', 0),
(2127, 'Enr-01-salle-conf', 'Large', '', '2021-07-07', '09:47:27', 'Abdou Majeed ALIDOU', '::1', 0),
(2128, 'Modif-01-salle-conf', 'Medium', '', '2021-07-07', '09:47:49', 'Abdou Majeed ALIDOU', '::1', 0),
(2129, 'Modif-01-salle-conf', 'Medium', '', '2021-07-07', '09:48:10', 'Abdou Majeed ALIDOU', '::1', 0),
(2130, 'Cons-01-carac-conf', '', '', '2021-07-07', '09:48:21', 'Abdou Majeed ALIDOU', '::1', 0),
(2131, 'Enr-01-carac-conf', 'Podium', '', '2021-07-07', '09:48:34', 'Abdou Majeed ALIDOU', '::1', 0),
(2132, 'Cons-01-salle-conf', '', '', '2021-07-07', '09:48:38', 'Abdou Majeed ALIDOU', '::1', 0),
(2133, 'Modif-01-salle-conf', 'Large', '', '2021-07-07', '09:48:53', 'Abdou Majeed ALIDOU', '::1', 0),
(2134, 'Exp-01-salle-conf', 'PDF', '', '2021-07-07', '09:49:27', 'Abdou Majeed ALIDOU', '::1', 0),
(2135, 'Cons-01-salle-conf', '', '', '2021-07-07', '09:49:43', 'Abdou Majeed ALIDOU', '::1', 0),
(2136, 'Cons-01-carac-conf', '', '', '2021-07-07', '09:50:28', 'Abdou Majeed ALIDOU', '::1', 0),
(2137, 'Cons-01-salle-conf', '', '', '2021-07-07', '09:50:41', 'Abdou Majeed ALIDOU', '::1', 0),
(2138, 'Enr-01-salle-conf', 'Xtra', '', '2021-07-07', '09:52:53', 'Abdou Majeed ALIDOU', '::1', 0),
(2139, 'Modif-01-salle-conf', 'Large', '', '2021-07-07', '09:53:23', 'Abdou Majeed ALIDOU', '::1', 0),
(2140, 'Modif-01-salle-conf', 'Xtra', '', '2021-07-07', '09:54:04', 'Abdou Majeed ALIDOU', '::1', 0),
(2141, 'Info-01-salle-conf', 'Small', '', '2021-07-07', '09:54:34', 'Abdou Majeed ALIDOU', '::1', 0),
(2142, 'Info-01-salle-conf', 'Xtra', '', '2021-07-07', '09:54:47', 'Abdou Majeed ALIDOU', '::1', 0),
(2143, 'Exp-01-salle-conf', 'PDF', '', '2021-07-07', '09:54:54', 'Abdou Majeed ALIDOU', '::1', 0),
(2144, 'Cons-01-salle-conf', '', '', '2021-07-07', '09:54:57', 'Abdou Majeed ALIDOU', '::1', 0),
(2145, 'Enr-01-salle-conf', 'Plein air', '', '2021-07-07', '09:55:59', 'Abdou Majeed ALIDOU', '::1', 0),
(2146, 'Cons-01-carac-conf', '', '', '2021-07-07', '09:57:50', 'Abdou Majeed ALIDOU', '::1', 0),
(2147, 'Cons-01-salle-conf', '', '', '2021-07-07', '09:57:55', 'Abdou Majeed ALIDOU', '::1', 0),
(2148, 'Cons-01-salle-conf', '', '', '2021-07-07', '10:00:00', 'Abdou Majeed ALIDOU', '::1', 0),
(2149, 'Cons-01-carac-conf', '', '', '2021-07-07', '10:00:11', 'Abdou Majeed ALIDOU', '::1', 0),
(2150, 'Cons-01-salle-conf', '', '', '2021-07-07', '10:04:14', 'Abdou Majeed ALIDOU', '::1', 0),
(2151, 'Chg-01-salle-conf', 'Plein air,Inactif', '', '2021-07-07', '10:04:24', 'Abdou Majeed ALIDOU', '::1', 0),
(2152, 'Cons-01-carac-conf', '', '', '2021-07-07', '10:07:00', 'Abdou Majeed ALIDOU', '::1', 0),
(2153, 'Cons-01-carac-conf', '', '', '2021-07-07', '10:07:01', 'Abdou Majeed ALIDOU', '::1', 0),
(2154, 'Cons-01-salle-conf', '', '', '2021-07-07', '10:07:08', 'Abdou Majeed ALIDOU', '::1', 0),
(2155, 'Cons-01-salle-conf', '', '', '2021-07-07', '10:07:33', 'Abdou Majeed ALIDOU', '::1', 0),
(2156, 'Info-01-salle-conf', 'Plein air', '', '2021-07-07', '10:07:41', 'Abdou Majeed ALIDOU', '::1', 0),
(2157, 'Exp-01-salle-conf', 'PDF', '', '2021-07-07', '10:08:07', 'Abdou Majeed ALIDOU', '::1', 0),
(2158, 'Cons-01-salle-conf', '', '', '2021-07-07', '10:08:11', 'Abdou Majeed ALIDOU', '::1', 0),
(2159, 'Cons-01-stat-conf', '', '', '2021-07-07', '10:08:21', 'Abdou Majeed ALIDOU', '::1', 0),
(2160, 'Cons-01-salle-conf', '', '', '2021-07-07', '10:08:24', 'Abdou Majeed ALIDOU', '::1', 0),
(2161, 'Cons-01-stat-conf', '', '', '2021-07-07', '10:08:28', 'Abdou Majeed ALIDOU', '::1', 0),
(2162, 'Cons-01-facture-conf', '', '', '2021-07-07', '10:08:39', 'Abdou Majeed ALIDOU', '::1', 0),
(2163, 'Cons-01-location-conf', '', '', '2021-07-07', '10:08:42', 'Abdou Majeed ALIDOU', '::1', 0),
(2164, 'Cons-01-service-conf', '', '', '2021-07-07', '10:08:46', 'Abdou Majeed ALIDOU', '::1', 0),
(2165, 'Enr-01-service-conf', 'Sonorisation', '', '2021-07-07', '10:09:57', 'Abdou Majeed ALIDOU', '::1', 0),
(2166, 'Enr-01-service-conf', 'Décoration', '', '2021-07-07', '10:13:42', 'Abdou Majeed ALIDOU', '::1', 0),
(2167, 'Cons-01-service-conf', '', '', '2021-07-07', '10:13:45', 'Abdou Majeed ALIDOU', '::1', 0),
(2168, 'Enr-01-service-conf', 'Pause Café', '', '2021-07-07', '10:14:51', 'Abdou Majeed ALIDOU', '::1', 0),
(2169, 'Info-01-service-conf', 'Décoration', '', '2021-07-07', '10:15:26', 'Abdou Majeed ALIDOU', '::1', 0),
(2170, 'Enr-01-service-conf', 'wifi', '', '2021-07-07', '10:16:17', 'Abdou Majeed ALIDOU', '::1', 0),
(2171, 'Cons-01-salle-conf', '', '', '2021-07-07', '10:17:06', 'Abdou Majeed ALIDOU', '::1', 0),
(2172, 'Cons-01-carac-conf', '', '', '2021-07-07', '10:17:18', 'Abdou Majeed ALIDOU', '::1', 0),
(2173, 'Enr-01-carac-conf', 'projecteur', '', '2021-07-07', '10:17:37', 'Abdou Majeed ALIDOU', '::1', 0),
(2174, 'Chg-01-carac-conf', 'projecteur,Inactif', '', '2021-07-07', '10:17:44', 'Abdou Majeed ALIDOU', '::1', 0),
(2175, 'Cons-01-service-conf', '', '', '2021-07-07', '10:17:53', 'Abdou Majeed ALIDOU', '::1', 0),
(2176, 'Cons-01-service-conf', '', '', '2021-07-07', '10:19:19', 'Abdou Majeed ALIDOU', '::1', 0),
(2177, 'Chg-01-service-conf', 'wifi,Inactif', '', '2021-07-07', '10:19:25', 'Abdou Majeed ALIDOU', '::1', 0),
(2178, 'Enr-01-service-conf', 'wifi', '', '2021-07-07', '10:19:33', 'Abdou Majeed ALIDOU', '::1', 0),
(2179, 'Chg-01-service-conf', 'wifi,Inactif', '', '2021-07-07', '10:19:39', 'Abdou Majeed ALIDOU', '::1', 0),
(2180, 'Info-01-service-conf', 'Décoration', '', '2021-07-07', '10:20:22', 'Abdou Majeed ALIDOU', '::1', 0),
(2181, 'Cons-01-stat-conf', '', '', '2021-07-07', '10:20:27', 'Abdou Majeed ALIDOU', '::1', 0),
(2182, 'Cons-01-service-conf', '', '', '2021-07-07', '10:20:40', 'Abdou Majeed ALIDOU', '::1', 0),
(2183, 'Cons-01-carac-conf', '', '', '2021-07-07', '10:20:41', 'Abdou Majeed ALIDOU', '::1', 0),
(2184, 'Cons-01-salle-conf', '', '', '2021-07-07', '10:20:44', 'Abdou Majeed ALIDOU', '::1', 0),
(2185, 'Cons-01-facture-conf', '', '', '2021-07-07', '10:20:45', 'Abdou Majeed ALIDOU', '::1', 0),
(2186, 'Cons-01-location-conf', '', '', '2021-07-07', '10:20:53', 'Abdou Majeed ALIDOU', '::1', 0),
(2187, 'Cons-01-salle-conf', '', '', '2021-07-07', '10:23:32', 'Abdou Majeed ALIDOU', '::1', 0),
(2188, 'Cons-01-location-conf', '', '', '2021-07-07', '10:23:49', 'Abdou Majeed ALIDOU', '::1', 0),
(2189, 'Cons-01-service-conf', '', '', '2021-07-07', '10:25:17', 'Abdou Majeed ALIDOU', '::1', 0),
(2190, 'Exp-01-service-conf', 'PDF', '', '2021-07-07', '10:25:20', 'Abdou Majeed ALIDOU', '::1', 0),
(2191, 'Cons-01-service-conf', '', '', '2021-07-07', '10:25:24', 'Abdou Majeed ALIDOU', '::1', 0),
(2192, 'Cons-01-location-conf', '', '', '2021-07-07', '10:25:26', 'Abdou Majeed ALIDOU', '::1', 0),
(2193, 'Enr-01-location-conf', '27', '', '2021-07-07', '10:33:59', 'Abdou Majeed ALIDOU', '::1', 0),
(2194, 'Exp-01-location-conf', 'PDF', '', '2021-07-07', '10:40:01', 'Abdou Majeed ALIDOU', '::1', 0),
(2195, 'Cons-01-location-conf', '', '', '2021-07-07', '10:41:02', 'Abdou Majeed ALIDOU', '::1', 0),
(2196, 'Info-01-location-conf', '27', '', '2021-07-07', '10:41:08', 'Abdou Majeed ALIDOU', '::1', 0),
(2197, 'Modif-01-location-conf', '27', '', '2021-07-07', '10:42:17', 'Abdou Majeed ALIDOU', '::1', 0),
(2198, 'Modif-01-location-conf', '27', '', '2021-07-07', '10:42:30', 'Abdou Majeed ALIDOU', '::1', 0),
(2199, 'Cons-01-location-conf', '', '', '2021-07-07', '10:48:10', 'Abdou Majeed ALIDOU', '::1', 0),
(2200, 'Cons-01-location-conf', '', '', '2021-07-07', '10:48:13', 'Abdou Majeed ALIDOU', '::1', 0),
(2201, 'Modif-01-location-conf', '27', '', '2021-07-07', '10:48:19', 'Abdou Majeed ALIDOU', '::1', 0),
(2202, 'Info-01-location-conf', '27', '', '2021-07-07', '10:48:26', 'Abdou Majeed ALIDOU', '::1', 0),
(2203, 'Exp-01-location-conf', 'PDF', '', '2021-07-07', '12:29:17', 'Abdou Majeed ALIDOU', '::1', 0),
(2204, 'Cons-01-location-conf', '', '', '2021-07-07', '12:29:20', 'Abdou Majeed ALIDOU', '::1', 0),
(2205, 'Enr-01-location-conf', '28', '', '2021-07-07', '12:32:05', 'Abdou Majeed ALIDOU', '::1', 0),
(2206, 'Modif-01-location-conf', '28', '', '2021-07-07', '12:33:01', 'Abdou Majeed ALIDOU', '::1', 0),
(2207, 'Modif-01-location-conf', '28', '', '2021-07-07', '12:33:33', 'Abdou Majeed ALIDOU', '::1', 0),
(2208, 'Modif-01-location-conf', '28', '', '2021-07-07', '12:33:52', 'Abdou Majeed ALIDOU', '::1', 0),
(2209, 'Modif-01-location-conf', '28', '', '2021-07-07', '12:34:06', 'Abdou Majeed ALIDOU', '::1', 0),
(2210, 'Enr-01-location-conf', '29', '', '2021-07-07', '12:35:08', 'Abdou Majeed ALIDOU', '::1', 0),
(2211, 'Chg-01-location-conf', '29,Inactif', '', '2021-07-07', '12:35:15', 'Abdou Majeed ALIDOU', '::1', 0),
(2212, 'Enr-01-location-conf', '30', '', '2021-07-07', '12:39:17', 'Abdou Majeed ALIDOU', '::1', 0),
(2213, 'Modif-01-location-conf', '30', '', '2021-07-07', '12:39:36', 'Abdou Majeed ALIDOU', '::1', 0),
(2214, 'Modif-01-location-conf', '30', '', '2021-07-07', '12:39:52', 'Abdou Majeed ALIDOU', '::1', 0),
(2215, 'Enr-01-location-conf', '31', '', '2021-07-07', '12:41:25', 'Abdou Majeed ALIDOU', '::1', 0),
(2216, 'Enr-01-location-conf', '32', '', '2021-07-07', '12:44:49', 'Abdou Majeed ALIDOU', '::1', 0),
(2217, 'Modif-01-location-conf', '32', '', '2021-07-07', '12:46:57', 'Abdou Majeed ALIDOU', '::1', 0),
(2218, 'Modif-01-location-conf', '27', '', '2021-07-07', '12:47:27', 'Abdou Majeed ALIDOU', '::1', 0),
(2219, 'Cons-01-location-conf', '', '', '2021-07-07', '12:49:45', 'Abdou Majeed ALIDOU', '::1', 0),
(2220, 'IndiqPrix-01-location-conf', '32', '', '2021-07-07', '12:51:07', 'Abdou Majeed ALIDOU', '::1', 0),
(2221, 'Info-01-location-conf', '32', '', '2021-07-07', '12:51:41', 'Abdou Majeed ALIDOU', '::1', 0),
(2222, 'Info-01-location-conf', '27', '', '2021-07-07', '12:53:07', 'Abdou Majeed ALIDOU', '::1', 0),
(2223, 'Info-01-location-conf', '27', '', '2021-07-07', '12:55:39', 'Abdou Majeed ALIDOU', '::1', 0),
(2224, 'Cons-01-location-conf', '', '', '2021-07-07', '12:57:32', 'Abdou Majeed ALIDOU', '::1', 0),
(2225, 'Chg-01-location-conf', '28,Inactif', '', '2021-07-07', '12:58:12', 'Abdou Majeed ALIDOU', '::1', 0),
(2226, 'Cons-01-stat-conf', '', '', '2021-07-07', '12:59:30', 'Abdou Majeed ALIDOU', '::1', 0),
(2227, 'Cons-01-location-conf', '', '', '2021-07-07', '12:59:39', 'Abdou Majeed ALIDOU', '::1', 0),
(2228, 'Cons-01-stat-conf', '', '', '2021-07-07', '12:59:57', 'Abdou Majeed ALIDOU', '::1', 0),
(2229, 'Cons-01-carac-conf', '', '', '2021-07-07', '13:00:04', 'Abdou Majeed ALIDOU', '::1', 0),
(2230, 'Cons-01-stat-conf', '', '', '2021-07-07', '13:00:08', 'Abdou Majeed ALIDOU', '::1', 0),
(2231, 'Cons-01-location-conf', '', '', '2021-07-07', '13:02:54', 'Abdou Majeed ALIDOU', '::1', 0),
(2232, 'Modif-01-location-conf', '32', '', '2021-07-07', '13:04:43', 'Abdou Majeed ALIDOU', '::1', 0),
(2233, 'Modif-01-location-conf', '32', '', '2021-07-07', '13:05:02', 'Abdou Majeed ALIDOU', '::1', 0),
(2234, 'Cons-01-stat-conf', '', '', '2021-07-07', '13:05:11', 'Abdou Majeed ALIDOU', '::1', 0),
(2235, 'Cons-01-location-conf', '', '', '2021-07-07', '13:06:32', 'Abdou Majeed ALIDOU', '::1', 0),
(2236, 'Chg-01-location-conf', '31,Inactif', '', '2021-07-07', '13:06:44', 'Abdou Majeed ALIDOU', '::1', 0),
(2237, 'Cons-01-stat-conf', '', '', '2021-07-07', '13:06:47', 'Abdou Majeed ALIDOU', '::1', 0),
(2238, 'Cons-01-location-conf', '', '', '2021-07-07', '13:07:29', 'Abdou Majeed ALIDOU', '::1', 0),
(2239, 'Cons-01-location-conf', '', '', '2021-07-07', '13:08:15', 'Abdou Majeed ALIDOU', '::1', 0),
(2240, 'Cons-01-stat-conf', '', '', '2021-07-07', '13:08:22', 'Abdou Majeed ALIDOU', '::1', 0),
(2241, 'Cons-01-location-conf', '', '', '2021-07-07', '13:18:05', 'Abdou Majeed ALIDOU', '::1', 0),
(2242, 'Exp-01-location-conf', 'PDF', '', '2021-07-07', '13:19:15', 'Abdou Majeed ALIDOU', '::1', 0),
(2243, 'Cons-01-location-conf', '', '', '2021-07-07', '13:20:01', 'Abdou Majeed ALIDOU', '::1', 0),
(2244, 'Cons-01-stat-conf', '', '', '2021-07-07', '13:21:49', 'Abdou Majeed ALIDOU', '::1', 0),
(2245, 'Cons-01-location-conf', '', '', '2021-07-07', '14:45:36', 'Abdou Majeed ALIDOU', '::1', 0),
(2246, 'Cons-01-location-conf', '', '', '2021-07-07', '14:46:52', 'Abdou Majeed ALIDOU', '::1', 0),
(2247, 'Enr-01-location-conf', '33', '', '2021-07-07', '14:47:37', 'Abdou Majeed ALIDOU', '::1', 0),
(2248, 'Chg-01-location-conf', '33,Inactif', '', '2021-07-07', '14:48:08', 'Abdou Majeed ALIDOU', '::1', 0),
(2249, 'Exp-01-location-conf', 'PDF', '', '2021-07-07', '14:53:30', 'Abdou Majeed ALIDOU', '::1', 0),
(2250, 'Cons-01-location-conf', '', '', '2021-07-07', '14:56:34', 'Abdou Majeed ALIDOU', '::1', 0),
(2251, 'Cons-01-stat-conf', '', '', '2021-07-07', '14:57:37', 'Abdou Majeed ALIDOU', '::1', 0),
(2252, 'Cons-01-stat-conf', '', '', '2021-07-07', '15:04:03', 'Abdou Majeed ALIDOU', '::1', 0),
(2253, 'Cons-01-stat-conf', '', '', '2021-07-07', '15:04:45', 'Abdou Majeed ALIDOU', '::1', 0),
(2254, 'Cons-01-stat-conf', '', '', '2021-07-07', '15:05:39', 'Abdou Majeed ALIDOU', '::1', 0),
(2255, 'Cons-01-location-conf', '', '', '2021-07-07', '15:05:56', 'Abdou Majeed ALIDOU', '::1', 0),
(2256, 'Cons-01-stat-conf', '', '', '2021-07-07', '15:06:06', 'Abdou Majeed ALIDOU', '::1', 0),
(2257, 'Cons-01-location-conf', '', '', '2021-07-07', '15:06:56', 'Abdou Majeed ALIDOU', '::1', 0),
(2258, 'IndiqPrix-01-location-conf', '31', '', '2021-07-07', '15:07:24', 'Abdou Majeed ALIDOU', '::1', 0),
(2259, 'Cons-01-stat-conf', '', '', '2021-07-07', '15:07:31', 'Abdou Majeed ALIDOU', '::1', 0),
(2260, 'Cons-01-stat-conf', '', '', '2021-07-07', '15:11:30', 'Abdou Majeed ALIDOU', '::1', 0),
(2261, 'Cons-01-stat-conf', '', '', '2021-07-07', '15:12:59', 'Abdou Majeed ALIDOU', '::1', 0),
(2262, 'Cons-01-stat-conf', '', '', '2021-07-07', '15:28:31', 'Abdou Majeed ALIDOU', '::1', 0),
(2263, 'Cons-01-stat-conf', '', '', '2021-07-07', '15:28:43', 'Abdou Majeed ALIDOU', '::1', 0),
(2264, 'Cons-01-stat-conf', '', '', '2021-07-07', '15:29:41', 'Abdou Majeed ALIDOU', '::1', 0),
(2265, 'Cons-01-stat-conf', '', '', '2021-07-07', '15:30:19', 'Abdou Majeed ALIDOU', '::1', 0),
(2266, 'Cons-01-stat-conf', '', '', '2021-07-07', '15:30:50', 'Abdou Majeed ALIDOU', '::1', 0),
(2267, 'Cons-01-stat-conf', '', '', '2021-07-07', '15:32:36', 'Abdou Majeed ALIDOU', '::1', 0),
(2268, 'Cons-01-location-conf', '', '', '2021-07-07', '15:34:14', 'Abdou Majeed ALIDOU', '::1', 0),
(2269, 'Info-01-location-conf', '32', '', '2021-07-07', '15:34:17', 'Abdou Majeed ALIDOU', '::1', 0),
(2270, 'Info-01-location-conf', '31', '', '2021-07-07', '15:34:23', 'Abdou Majeed ALIDOU', '::1', 0),
(2271, 'Info-01-location-conf', '30', '', '2021-07-07', '15:34:31', 'Abdou Majeed ALIDOU', '::1', 0),
(2272, 'Info-01-location-conf', '27', '', '2021-07-07', '15:34:36', 'Abdou Majeed ALIDOU', '::1', 0),
(2273, 'Cons-01-location-conf', '', '', '2021-07-07', '15:35:22', 'Abdou Majeed ALIDOU', '::1', 0),
(2274, 'Enr-01-location-conf', '34', '', '2021-07-07', '15:37:36', 'Abdou Majeed ALIDOU', '::1', 0),
(2275, 'Cons-01-location-conf', '', '', '2021-07-07', '15:37:49', 'Abdou Majeed ALIDOU', '::1', 0),
(2276, 'Info-01-location-conf', '34', '', '2021-07-07', '15:37:57', 'Abdou Majeed ALIDOU', '::1', 0),
(2277, 'Cons-01-salle-conf', '', '', '2021-07-07', '15:38:16', 'Abdou Majeed ALIDOU', '::1', 0),
(2278, 'Info-01-salle-conf', 'Large', '', '2021-07-07', '15:38:21', 'Abdou Majeed ALIDOU', '::1', 0),
(2279, 'Cons-01-salle-conf', '', '', '2021-07-07', '15:39:13', 'Abdou Majeed ALIDOU', '::1', 0),
(2280, 'Info-01-salle-conf', 'Large', '', '2021-07-07', '15:39:16', 'Abdou Majeed ALIDOU', '::1', 0),
(2281, 'Cons-01-salle-conf', '', '', '2021-07-07', '15:40:19', 'Abdou Majeed ALIDOU', '::1', 0),
(2282, 'Info-01-salle-conf', 'Large', '', '2021-07-07', '15:40:23', 'Abdou Majeed ALIDOU', '::1', 0),
(2283, 'Cons-01-location-conf', '', '', '2021-07-07', '15:40:30', 'Abdou Majeed ALIDOU', '::1', 0),
(2284, 'Modif-01-location-conf', '31', '', '2021-07-07', '15:42:17', 'Abdou Majeed ALIDOU', '::1', 0),
(2285, 'Info-01-location-conf', '31', '', '2021-07-07', '15:42:23', 'Abdou Majeed ALIDOU', '::1', 0),
(2286, 'Modif-01-location-conf', '27', '', '2021-07-07', '15:43:07', 'Abdou Majeed ALIDOU', '::1', 0),
(2287, 'Cons-01-stat-conf', '', '', '2021-07-07', '15:44:03', 'Abdou Majeed ALIDOU', '::1', 0),
(2288, 'Cons-01-stat-conf', '', '', '2021-07-07', '15:48:30', 'Abdou Majeed ALIDOU', '::1', 0),
(2289, 'Cons-01-location-conf', '', '', '2021-07-07', '15:53:03', 'Abdou Majeed ALIDOU', '::1', 0),
(2290, 'Cons-01-stat-conf', '', '', '2021-07-07', '15:53:19', 'Abdou Majeed ALIDOU', '::1', 0),
(2291, 'Cons-01-location-conf', '', '', '2021-07-07', '15:53:26', 'Abdou Majeed ALIDOU', '::1', 0),
(2292, 'FacEdit-01-location-conf', '32', '', '2021-07-07', '16:03:41', 'Abdou Majeed ALIDOU', '::1', 0),
(2293, 'Cons-01-location-conf', '', '', '2021-07-07', '16:04:28', 'Abdou Majeed ALIDOU', '::1', 0),
(2294, 'Info-01-location-conf', '32', '', '2021-07-07', '16:04:42', 'Abdou Majeed ALIDOU', '::1', 0),
(2295, 'Cons-01-facture-conf', '', '', '2021-07-07', '16:04:52', 'Abdou Majeed ALIDOU', '::1', 0),
(2296, 'Cons-01-location-conf', '', '', '2021-07-07', '16:06:46', 'Abdou Majeed ALIDOU', '::1', 0),
(2297, 'Cons-01-location-conf', '', '', '2021-07-07', '16:07:50', 'Abdou Majeed ALIDOU', '::1', 0),
(2298, 'Cons-01-facture-conf', '', '', '2021-07-07', '16:07:57', 'Abdou Majeed ALIDOU', '::1', 0),
(2299, 'Cons-01-facture-conf', '', '', '2021-07-07', '16:08:05', 'Abdou Majeed ALIDOU', '::1', 0),
(2300, 'Cons-01-location-conf', '', '', '2021-07-07', '16:08:06', 'Abdou Majeed ALIDOU', '::1', 0),
(2301, 'Cons-01-facture-conf', '', '', '2021-07-07', '16:08:16', 'Abdou Majeed ALIDOU', '::1', 0),
(2302, 'Chg-01-facture-conf', '1', '', '2021-07-07', '16:08:27', 'Abdou Majeed ALIDOU', '::1', 0),
(2303, 'Cons-01-facture-conf', '', '', '2021-07-07', '16:08:35', 'Abdou Majeed ALIDOU', '::1', 0),
(2304, 'Cons-01-location-conf', '', '', '2021-07-07', '16:08:48', 'Abdou Majeed ALIDOU', '::1', 0),
(2305, 'Info-01-location-conf', '32', '', '2021-07-07', '16:08:53', 'Abdou Majeed ALIDOU', '::1', 0),
(2306, 'Info-01-location-conf', '32', '', '2021-07-07', '16:08:58', 'Abdou Majeed ALIDOU', '::1', 0),
(2307, 'Cons-01-location-conf', '', '', '2021-07-07', '16:10:32', 'Abdou Majeed ALIDOU', '::1', 0),
(2308, 'Info-01-location-conf', '32', '', '2021-07-07', '16:10:35', 'Abdou Majeed ALIDOU', '::1', 0),
(2309, 'Cons-01-location-conf', '', '', '2021-07-07', '16:11:12', 'Abdou Majeed ALIDOU', '::1', 0),
(2310, 'Exp-01-location-conf', 'PDF', '', '2021-07-07', '16:12:45', 'Abdou Majeed ALIDOU', '::1', 0),
(2311, 'Cons-01-location-conf', '', '', '2021-07-07', '16:12:51', 'Abdou Majeed ALIDOU', '::1', 0),
(2312, 'Cons-01-stat-conf', '', '', '2021-07-08', '08:59:03', 'Abdou Majeed ALIDOU', '::1', 0),
(2313, 'Cons-01-stat-conf', '', '', '2021-07-08', '09:00:23', 'Abdou Majeed ALIDOU', '::1', 0),
(2314, 'Cons-01-stat-conf', '', '', '2021-07-08', '09:01:06', 'Abdou Majeed ALIDOU', '::1', 0),
(2315, 'Cons-01-stat-conf', '', '', '2021-07-08', '09:03:55', 'Abdou Majeed ALIDOU', '::1', 0),
(2316, 'Cons-01-stat-conf', '', '', '2021-07-08', '09:04:17', 'Abdou Majeed ALIDOU', '::1', 0),
(2317, 'Cons-01-stat-conf', '', '', '2021-07-08', '09:06:33', 'Abdou Majeed ALIDOU', '::1', 0),
(2318, 'Cons-01-stat-conf', '', '', '2021-07-08', '09:08:35', 'Abdou Majeed ALIDOU', '::1', 0),
(2319, 'Cons-01-location-conf', '', '', '2021-07-08', '09:11:04', 'Abdou Majeed ALIDOU', '::1', 0),
(2320, 'Cons-01-location-conf', '', '', '2021-07-08', '09:14:46', 'Abdou Majeed ALIDOU', '::1', 0),
(2321, 'Cons-01-stat-conf', '', '', '2021-07-08', '09:14:48', 'Abdou Majeed ALIDOU', '::1', 0),
(2322, 'Cons-01-stat-conf', '', '', '2021-07-08', '09:31:23', 'Abdou Majeed ALIDOU', '::1', 0),
(2323, 'Cons-01-stat-conf', '', '', '2021-07-08', '10:20:34', 'Abdou Majeed ALIDOU', '::1', 0),
(2324, 'Cons-01-location-conf', '', '', '2021-07-08', '10:26:09', 'Abdou Majeed ALIDOU', '::1', 0),
(2325, 'Cons-01-facture-conf', '', '', '2021-07-08', '10:26:17', 'Abdou Majeed ALIDOU', '::1', 0),
(2326, 'Cons-01-facture-conf', '', '', '2021-07-08', '11:10:50', 'Abdou Majeed ALIDOU', '::1', 0),
(2327, 'Cons-01-stat-conf', '', '', '2021-07-08', '11:10:51', 'Abdou Majeed ALIDOU', '::1', 0),
(2328, 'Cons-01-stat-conf', '', '', '2021-07-08', '11:12:05', 'Abdou Majeed ALIDOU', '::1', 0),
(2329, 'Cons-01-stat-conf', '', '', '2021-07-08', '11:17:44', 'Abdou Majeed ALIDOU', '::1', 0),
(2330, 'Cons-01-stat-conf', '', '', '2021-07-08', '11:17:53', 'Abdou Majeed ALIDOU', '::1', 0),
(2331, 'Cons-01-location-conf', '', '', '2021-07-08', '11:19:10', 'Abdou Majeed ALIDOU', '::1', 0),
(2332, 'Modif-01-location-conf', '31', '', '2021-07-08', '11:19:19', 'Abdou Majeed ALIDOU', '::1', 0),
(2333, 'Cons-01-stat-conf', '', '', '2021-07-08', '11:19:23', 'Abdou Majeed ALIDOU', '::1', 0),
(2334, 'Cons-01-stat-conf', '', '', '2021-07-08', '11:20:39', 'Abdou Majeed ALIDOU', '::1', 0),
(2335, 'Cons-01-stat-conf', '', '', '2021-07-08', '11:25:14', 'Abdou Majeed ALIDOU', '::1', 0),
(2336, 'Cons-01-stat-conf', '', '', '2021-07-08', '11:25:53', 'Abdou Majeed ALIDOU', '::1', 0),
(2337, 'Cons-01-location-conf', '', '', '2021-07-08', '11:26:28', 'Abdou Majeed ALIDOU', '::1', 0),
(2338, 'IndiqPrix-01-location-conf', '31', '', '2021-07-08', '11:26:43', 'Abdou Majeed ALIDOU', '::1', 0),
(2339, 'Cons-01-stat-conf', '', '', '2021-07-08', '11:26:45', 'Abdou Majeed ALIDOU', '::1', 0),
(2340, 'Cons-01-location-conf', '', '', '2021-07-08', '11:27:18', 'Abdou Majeed ALIDOU', '::1', 0),
(2341, 'Cons-01-stat-conf', '', '', '2021-07-08', '11:27:26', 'Abdou Majeed ALIDOU', '::1', 0),
(2342, 'Cons-01-stat-conf', '', '', '2021-07-08', '11:36:04', 'Abdou Majeed ALIDOU', '::1', 0),
(2343, 'Cons-01-stat-conf', '', '', '2021-07-08', '11:40:32', 'Abdou Majeed ALIDOU', '::1', 0),
(2344, 'Cons-01-stat-conf', '', '', '2021-07-08', '11:42:25', 'Abdou Majeed ALIDOU', '::1', 0),
(2345, 'Cons-01-stat-conf', '', '', '2021-07-08', '11:44:09', 'Abdou Majeed ALIDOU', '::1', 0),
(2346, 'Cons-01-location-conf', '', '', '2021-07-08', '11:44:18', 'Abdou Majeed ALIDOU', '::1', 0),
(2347, 'Modif-01-location-conf', '30', '', '2021-07-08', '11:45:16', 'Abdou Majeed ALIDOU', '::1', 0),
(2348, 'Cons-01-stat-conf', '', '', '2021-07-08', '11:45:19', 'Abdou Majeed ALIDOU', '::1', 0),
(2349, 'Cons-01-stat-conf', '', '', '2021-07-08', '12:06:00', 'Abdou Majeed ALIDOU', '::1', 0),
(2350, 'Cons-01-stat-conf', '', '', '2021-07-08', '12:08:24', 'Abdou Majeed ALIDOU', '::1', 0),
(2351, 'Cons-01-stat-conf', '', '', '2021-07-08', '12:09:08', 'Abdou Majeed ALIDOU', '::1', 0),
(2352, 'Cons-01-stat-conf', '', '', '2021-07-08', '12:09:22', 'Abdou Majeed ALIDOU', '::1', 0),
(2353, 'Cons-01-stat-conf', '', '', '2021-07-08', '12:26:14', 'Abdou Majeed ALIDOU', '::1', 0),
(2354, 'Cons-01-stat-conf', '', '', '2021-07-08', '12:27:23', 'Abdou Majeed ALIDOU', '::1', 0),
(2355, 'Cons-01-stat-conf', '', '', '2021-07-08', '12:30:21', 'Abdou Majeed ALIDOU', '::1', 0),
(2356, 'Cons-01-stat-conf', '', '', '2021-07-08', '12:42:33', 'Abdou Majeed ALIDOU', '::1', 0),
(2357, 'Cons-01-stat-conf', '', '', '2021-07-08', '12:43:25', 'Abdou Majeed ALIDOU', '::1', 0),
(2358, 'Cons-01-stat-conf', '', '', '2021-07-08', '12:43:47', 'Abdou Majeed ALIDOU', '::1', 0),
(2359, 'Cons-01-stat-conf', '', '', '2021-07-08', '12:43:56', 'Abdou Majeed ALIDOU', '::1', 0),
(2360, 'Cons-01-stat-conf', '', '', '2021-07-08', '12:44:01', 'Abdou Majeed ALIDOU', '::1', 0),
(2361, 'Cons-01-stat-conf', '', '', '2021-07-08', '12:46:06', 'Abdou Majeed ALIDOU', '::1', 0),
(2362, 'Cons-01-stat-conf', '', '', '2021-07-08', '12:49:28', 'Abdou Majeed ALIDOU', '::1', 0),
(2363, 'Cons-01-stat-conf', '', '', '2021-07-08', '12:58:18', 'Abdou Majeed ALIDOU', '::1', 0),
(2364, 'Cons-01-stat-conf', '', '', '2021-07-08', '12:58:38', 'Abdou Majeed ALIDOU', '::1', 0),
(2365, 'Cons-01-stat-conf', '', '', '2021-07-08', '12:59:11', 'Abdou Majeed ALIDOU', '::1', 0),
(2366, 'Cons-01-stat-conf', '', '', '2021-07-08', '12:59:22', 'Abdou Majeed ALIDOU', '::1', 0),
(2367, 'Cons-01-stat-conf', '', '', '2021-07-08', '12:59:28', 'Abdou Majeed ALIDOU', '::1', 0),
(2368, 'Cons-01-stat-conf', '', '', '2021-07-08', '13:03:09', 'Abdou Majeed ALIDOU', '::1', 0),
(2369, 'Cons-01-stat-conf', '', '', '2021-07-08', '13:04:59', 'Abdou Majeed ALIDOU', '::1', 0),
(2370, 'Cons-01-stat-conf', '', '', '2021-07-08', '13:07:48', 'Abdou Majeed ALIDOU', '::1', 0),
(2371, 'Cons-01-stat-conf', '', '', '2021-07-08', '14:32:40', 'Abdou Majeed ALIDOU', '::1', 0),
(2372, 'Cons-01-stat-conf', '', '', '2021-07-08', '14:33:54', 'Abdou Majeed ALIDOU', '::1', 0),
(2373, 'Cons-01-stat-conf', '', '', '2021-07-08', '14:36:00', 'Abdou Majeed ALIDOU', '::1', 0),
(2374, 'Cons-01-stat-conf', '', '', '2021-07-08', '14:37:39', 'Abdou Majeed ALIDOU', '::1', 0),
(2375, 'Cons-01-stat-conf', '', '', '2021-07-08', '14:39:12', 'Abdou Majeed ALIDOU', '::1', 0),
(2376, 'Cons-01-stat-conf', '', '', '2021-07-08', '14:42:52', 'Abdou Majeed ALIDOU', '::1', 0),
(2377, 'Cons-01-stat-conf', '', '', '2021-07-08', '14:44:05', 'Abdou Majeed ALIDOU', '::1', 0),
(2378, 'Cons-01-stat-conf', '', '', '2021-07-08', '14:46:39', 'Abdou Majeed ALIDOU', '::1', 0),
(2379, 'Cons-01-stat-conf', '', '', '2021-07-08', '14:47:17', 'Abdou Majeed ALIDOU', '::1', 0),
(2380, 'Cons-01-stat-conf', '', '', '2021-07-08', '14:52:13', 'Abdou Majeed ALIDOU', '::1', 0),
(2381, 'Cons-01-stat-conf', '', '', '2021-07-08', '14:52:59', 'Abdou Majeed ALIDOU', '::1', 0),
(2382, 'Cons-01-location-conf', '', '', '2021-07-08', '14:53:31', 'Abdou Majeed ALIDOU', '::1', 0),
(2383, 'Cons-01-stat-conf', '', '', '2021-07-08', '14:53:42', 'Abdou Majeed ALIDOU', '::1', 0),
(2384, 'Cons-01-stat-conf', '', '', '2021-07-08', '14:55:39', 'Abdou Majeed ALIDOU', '::1', 0),
(2385, 'Cons-01-location-conf', '', '', '2021-07-08', '15:16:43', 'Abdou Majeed ALIDOU', '::1', 0),
(2386, 'Cons-01-facture-conf', '', '', '2021-07-08', '15:16:47', 'Abdou Majeed ALIDOU', '::1', 0),
(2387, 'Cons-01-location-conf', '', '', '2021-07-08', '15:16:51', 'Abdou Majeed ALIDOU', '::1', 0),
(2388, 'Cons-01-location-conf', '', '', '2021-07-08', '15:35:48', 'Abdou Majeed ALIDOU', '::1', 0),
(2389, 'Cons-01-location-conf', '', '', '2021-07-08', '15:36:13', 'Abdou Majeed ALIDOU', '::1', 0),
(2390, 'Cons-01-location-conf', '', '', '2021-07-08', '15:36:42', 'Abdou Majeed ALIDOU', '::1', 0),
(2391, 'Cons-01-location-conf', '', '', '2021-07-08', '15:37:38', 'Abdou Majeed ALIDOU', '::1', 0),
(2392, 'Cons-01-location-conf', '', '', '2021-07-08', '15:38:36', 'Abdou Majeed ALIDOU', '::1', 0),
(2393, 'Cons-01-location-conf', '', '', '2021-07-08', '15:38:50', 'Abdou Majeed ALIDOU', '::1', 0),
(2394, 'Cons-01-location-conf', '', '', '2021-07-08', '15:40:17', 'Abdou Majeed ALIDOU', '::1', 0),
(2395, 'Cons-01-stat-conf', '', '', '2021-07-08', '15:40:20', 'Abdou Majeed ALIDOU', '::1', 0),
(2396, 'Cons-01-stat-conf', '', '', '2021-07-08', '15:41:33', 'Abdou Majeed ALIDOU', '::1', 0),
(2397, 'Cons-01-stat-conf', '', '', '2021-07-08', '15:41:50', 'Abdou Majeed ALIDOU', '::1', 0),
(2398, 'Cons-01-stat-conf', '', '', '2021-07-08', '16:12:56', 'Abdou Majeed ALIDOU', '127.0.0.1', 0),
(2399, 'Cons-01-stat-conf', '', '', '2021-07-08', '16:14:11', 'Abdou Majeed ALIDOU', '::1', 0),
(2400, 'Cons-01-stat-conf', '', '', '2021-07-08', '16:19:44', 'Abdou Majeed ALIDOU', '::1', 0),
(2401, 'Cons-01-stat-conf', '', '', '2021-07-09', '08:25:46', 'Abdou Majeed ALIDOU', '::1', 0),
(2402, 'Cons-01-stat-conf', '', '', '2021-07-09', '09:00:52', 'Abdou Majeed ALIDOU', '::1', 0),
(2403, 'Cons-01-stat-conf', '', '', '2021-07-09', '09:18:18', 'Abdou Majeed ALIDOU', '::1', 0),
(2404, 'Cons-01-stat-conf', '', '', '2021-07-09', '09:26:23', 'Abdou Majeed ALIDOU', '::1', 0),
(2405, 'Cons-01-stat-conf', '', '', '2021-07-09', '09:29:06', 'Abdou Majeed ALIDOU', '::1', 0),
(2406, 'Cons-01-stat-conf', '', '', '2021-07-09', '09:29:55', 'Abdou Majeed ALIDOU', '::1', 0),
(2407, 'Cons-01-stat-conf', '', '', '2021-07-09', '09:31:20', 'Abdou Majeed ALIDOU', '::1', 0),
(2408, 'Cons-01-location-conf', '', '', '2021-07-09', '09:31:31', 'Abdou Majeed ALIDOU', '::1', 0),
(2409, 'Cons-01-stat-conf', '', '', '2021-07-09', '09:31:36', 'Abdou Majeed ALIDOU', '::1', 0),
(2410, 'Cons-01-stat-conf', '', '', '2021-07-09', '09:34:44', 'Abdou Majeed ALIDOU', '::1', 0),
(2411, 'Cons-01-stat-conf', '', '', '2021-07-09', '09:36:47', 'Abdou Majeed ALIDOU', '::1', 0),
(2412, 'Cons-01-stat-conf', '', '', '2021-07-09', '09:38:12', 'Abdou Majeed ALIDOU', '::1', 0),
(2413, 'Cons-01-stat-conf', '', '', '2021-07-09', '09:49:11', 'Abdou Majeed ALIDOU', '::1', 0),
(2414, 'Cons-01-stat-conf', '', '', '2021-07-09', '09:52:01', 'Abdou Majeed ALIDOU', '::1', 0),
(2415, 'Cons-01-stat-conf', '', '', '2021-07-09', '09:52:12', 'Abdou Majeed ALIDOU', '::1', 0),
(2416, 'Cons-01-stat-conf', '', '', '2021-07-09', '09:52:31', 'Abdou Majeed ALIDOU', '::1', 0),
(2417, 'Cons-01-stat-conf', '', '', '2021-07-09', '09:53:39', 'Abdou Majeed ALIDOU', '::1', 0),
(2418, 'Cons-01-stat-conf', '', '', '2021-07-09', '09:53:55', 'Abdou Majeed ALIDOU', '::1', 0),
(2419, 'Cons-01-stat-conf', '', '', '2021-07-09', '09:54:18', 'Abdou Majeed ALIDOU', '::1', 0),
(2420, 'Cons-01-stat-conf', '', '', '2021-07-09', '09:57:38', 'Abdou Majeed ALIDOU', '::1', 0),
(2421, 'Cons-01-stat-conf', '', '', '2021-07-09', '09:58:27', 'Abdou Majeed ALIDOU', '::1', 0),
(2422, 'Cons-01-stat-conf', '', '', '2021-07-09', '10:02:01', 'Abdou Majeed ALIDOU', '::1', 0),
(2423, 'Cons-01-stat-conf', '', '', '2021-07-09', '10:02:22', 'Abdou Majeed ALIDOU', '::1', 0),
(2424, 'Cons-01-stat-conf', '', '', '2021-07-09', '10:24:14', 'Abdou Majeed ALIDOU', '::1', 0),
(2425, 'Cons-01-stat-conf', '', '', '2021-07-09', '10:24:28', 'Abdou Majeed ALIDOU', '::1', 0),
(2426, 'Cons-01-stat-conf', '', '', '2021-07-09', '10:26:05', 'Abdou Majeed ALIDOU', '::1', 0),
(2427, 'Cons-01-stat-conf', '', '', '2021-07-09', '10:26:14', 'Abdou Majeed ALIDOU', '::1', 0),
(2428, 'Cons-01-stat-conf', '', '', '2021-07-09', '10:26:21', 'Abdou Majeed ALIDOU', '::1', 0),
(2429, 'Cons-01-stat-conf', '', '', '2021-07-09', '10:26:47', 'Abdou Majeed ALIDOU', '::1', 0),
(2430, 'Cons-01-stat-conf', '', '', '2021-07-09', '10:26:54', 'Abdou Majeed ALIDOU', '::1', 0),
(2431, 'Cons-01-stat-conf', '', '', '2021-07-09', '10:28:45', 'Abdou Majeed ALIDOU', '::1', 0),
(2432, 'Cons-01-stat-conf', '', '', '2021-07-09', '10:28:53', 'Abdou Majeed ALIDOU', '::1', 0),
(2433, 'Cons-01-stat-conf', '', '', '2021-07-09', '10:31:04', 'Abdou Majeed ALIDOU', '::1', 0),
(2434, 'Cons-01-stat-conf', '', '', '2021-07-09', '10:31:11', 'Abdou Majeed ALIDOU', '::1', 0),
(2435, 'Cons-01-stat-conf', '', '', '2021-07-09', '10:31:54', 'Abdou Majeed ALIDOU', '::1', 0),
(2436, 'Cons-01-stat-conf', '', '', '2021-07-09', '10:43:22', 'Abdou Majeed ALIDOU', '::1', 0),
(2437, 'Cons-01-stat-conf', '', '', '2021-07-09', '10:44:03', 'Abdou Majeed ALIDOU', '::1', 0),
(2438, 'Cons-01-stat-conf', '', '', '2021-07-09', '10:45:58', 'Abdou Majeed ALIDOU', '::1', 0),
(2439, 'Cons-01-stat-conf', '', '', '2021-07-09', '10:46:18', 'Abdou Majeed ALIDOU', '::1', 0),
(2440, 'Cons-01-stat-conf', '', '', '2021-07-09', '10:54:20', 'Abdou Majeed ALIDOU', '::1', 0),
(2441, 'Cons-01-stat-conf', '', '', '2021-07-09', '11:16:05', 'Abdou Majeed ALIDOU', '::1', 0),
(2442, 'Cons-01-stat-conf', '', '', '2021-07-09', '11:16:53', 'Abdou Majeed ALIDOU', '::1', 0),
(2443, 'Cons-01-location-conf', '', '', '2021-07-09', '11:20:47', 'Abdou Majeed ALIDOU', '::1', 0),
(2444, 'Info-01-location-conf', '32', '', '2021-07-09', '11:20:51', 'Abdou Majeed ALIDOU', '::1', 0),
(2445, 'Cons-01-location-conf', '', '', '2021-07-09', '11:33:12', 'Abdou Majeed ALIDOU', '::1', 0),
(2446, 'Cons-01-stat-conf', '', '', '2021-07-09', '11:33:14', 'Abdou Majeed ALIDOU', '::1', 0),
(2447, 'Cons-01-stat-conf', '', '', '2021-07-09', '11:39:21', 'Abdou Majeed ALIDOU', '::1', 0),
(2448, 'Cons-01-stat-conf', '', '', '2021-07-09', '11:39:36', 'Abdou Majeed ALIDOU', '::1', 0),
(2449, 'Cons-01-stat-conf', '', '', '2021-07-09', '12:18:21', 'Abdou Majeed ALIDOU', '::1', 0),
(2450, 'Cons-01-location-conf', '', '', '2021-07-09', '13:28:53', 'Abdou Majeed ALIDOU', '::1', 0),
(2451, 'Cons-01-location-conf', '', '', '2021-07-09', '14:28:57', 'Abdou Majeed ALIDOU', '::1', 0),
(2452, 'Cons-01-location-conf', '', '', '2021-07-09', '14:29:44', 'Abdou Majeed ALIDOU', '::1', 0),
(2453, 'Cons-01-location-conf', '', '', '2021-07-09', '14:30:00', 'Abdou Majeed ALIDOU', '::1', 0),
(2454, 'Cons-01-location-conf', '', '', '2021-07-09', '14:49:50', 'Abdou Majeed ALIDOU', '::1', 0),
(2455, 'Cons-01-location-conf', '', '', '2021-07-09', '14:51:18', 'Abdou Majeed ALIDOU', '::1', 0),
(2456, 'Cons-01-location-conf', '', '', '2021-07-09', '14:51:45', 'Abdou Majeed ALIDOU', '::1', 0),
(2457, 'Cons-01-location-conf', '', '', '2021-07-09', '14:52:20', 'Abdou Majeed ALIDOU', '::1', 0),
(2458, 'Cons-01-location-conf', '', '', '2021-07-09', '14:52:31', 'Abdou Majeed ALIDOU', '::1', 0),
(2459, 'Cons-01-location-conf', '', '', '2021-07-09', '14:52:40', 'Abdou Majeed ALIDOU', '::1', 0),
(2460, 'Cons-01-location-conf', '', '', '2021-07-09', '14:52:50', 'Abdou Majeed ALIDOU', '::1', 0),
(2461, 'Cons-01-location-conf', '', '', '2021-07-09', '14:53:39', 'Abdou Majeed ALIDOU', '::1', 0),
(2462, 'Cons-01-location-conf', '', '', '2021-07-09', '14:53:49', 'Abdou Majeed ALIDOU', '::1', 0),
(2463, 'Cons-01-location-conf', '', '', '2021-07-09', '14:54:03', 'Abdou Majeed ALIDOU', '::1', 0),
(2464, 'Cons-01-location-conf', '', '', '2021-07-09', '14:54:42', 'Abdou Majeed ALIDOU', '::1', 0),
(2465, 'Info-01-location-conf', '34', '', '2021-07-09', '14:59:22', 'Abdou Majeed ALIDOU', '::1', 0),
(2466, 'Cons-01-location-conf', '', '', '2021-07-09', '14:59:38', 'Abdou Majeed ALIDOU', '::1', 0),
(2467, 'Info-01-location-conf', '34', '', '2021-07-09', '14:59:41', 'Abdou Majeed ALIDOU', '::1', 0),
(2468, 'Cons-01-location-conf', '', '', '2021-07-09', '15:02:10', 'Abdou Majeed ALIDOU', '::1', 0),
(2469, 'Exp-01-location-conf', 'PDF', '', '2021-07-09', '15:02:15', 'Abdou Majeed ALIDOU', '::1', 0),
(2470, 'Cons-01-location-conf', '', '', '2021-07-09', '15:02:22', 'Abdou Majeed ALIDOU', '::1', 0),
(2471, 'Cons-01-facture-conf', '', '', '2021-07-09', '15:03:58', 'Abdou Majeed ALIDOU', '::1', 0),
(2472, 'Cons-01-facture-conf', '', '', '2021-07-09', '15:06:59', 'Abdou Majeed ALIDOU', '::1', 0),
(2473, 'Cons-01-facture-conf', '', '', '2021-07-09', '15:09:31', 'Abdou Majeed ALIDOU', '::1', 0),
(2474, 'Exp-01-facture-conf', 'PDF', '', '2021-07-09', '15:09:34', 'Abdou Majeed ALIDOU', '::1', 0),
(2475, 'Cons-01-facture-conf', '', '', '2021-07-09', '15:09:38', 'Abdou Majeed ALIDOU', '::1', 0),
(2476, 'Cons-01-facture-conf', '', '', '2021-07-09', '15:10:01', 'Abdou Majeed ALIDOU', '::1', 0),
(2477, 'Cons-01-stat-conf', '', '', '2021-07-09', '15:24:05', 'Abdou Majeed ALIDOU', '::1', 0),
(2478, 'Cons-01-dashboard', '', '', '2021-07-09', '16:34:39', 'Abdou Majeed ALIDOU', '::1', 0),
(2479, 'Cons-01-stat-conf', '', '', '2021-07-09', '16:35:37', 'Abdou Majeed ALIDOU', '::1', 0),
(2480, 'Cons-01-location-conf', '', '', '2021-07-10', '07:16:54', 'Abdou Majeed ALIDOU', '::1', 0),
(2481, 'Cons-01-location-conf', '', '', '2021-07-10', '09:36:32', 'Abdou Majeed ALIDOU', '::1', 0),
(2482, 'Cons-01-stat-conf', '', '', '2021-07-10', '09:36:33', 'Abdou Majeed ALIDOU', '::1', 0),
(2483, 'Cons-01-stat-conf', '', '', '2021-07-10', '09:37:47', 'Abdou Majeed ALIDOU', '::1', 0),
(2484, 'Cons-01-stat-conf', '', '', '2021-07-10', '09:43:29', 'Abdou Majeed ALIDOU', '::1', 0),
(2485, 'Cons-01-stat-conf', '', '', '2021-07-10', '09:50:18', 'Abdou Majeed ALIDOU', '::1', 0),
(2486, 'Cons-01-stat-conf', '', '', '2021-07-10', '10:08:48', 'Abdou Majeed ALIDOU', '::1', 0),
(2487, 'Cons-01-stat-conf', '', '', '2021-07-10', '10:11:10', 'Abdou Majeed ALIDOU', '::1', 0),
(2488, 'Cons-01-stat-conf', '', '', '2021-07-10', '10:30:35', 'Abdou Majeed ALIDOU', '::1', 0),
(2489, 'Connex-01', '', '', '2021-07-11', '23:29:59', 'Abdou Majeed ALIDOU', '::1', 0),
(2490, 'Cons-01-dashboard', '', '', '2021-07-11', '23:29:59', 'Abdou Majeed ALIDOU', '::1', 0),
(2491, 'Cons-01-stat-conf', '', '', '2021-07-11', '23:30:04', 'Abdou Majeed ALIDOU', '::1', 0),
(2492, 'Cons-01-stat-conf', '', '', '2021-07-12', '09:13:33', 'Abdou Majeed ALIDOU', '::1', 0),
(2493, 'Cons-01-salle-conf', '', '', '2021-07-12', '09:14:59', 'Abdou Majeed ALIDOU', '::1', 0),
(2494, 'Cons-01-salle-conf', '', '', '2021-07-12', '09:18:36', 'Abdou Majeed ALIDOU', '::1', 0),
(2495, 'Cons-01-salle-conf', '', '', '2021-07-12', '09:20:18', 'Abdou Majeed ALIDOU', '::1', 0),
(2496, 'Info-01-salle-conf', 'Large', '', '2021-07-12', '09:20:22', 'Abdou Majeed ALIDOU', '::1', 0),
(2497, 'Exp-01-salle-conf', 'PDF', '', '2021-07-12', '09:22:33', 'Abdou Majeed ALIDOU', '::1', 0),
(2498, 'Cons-01-salle-conf', '', '', '2021-07-12', '09:26:07', 'Abdou Majeed ALIDOU', '::1', 0),
(2499, 'Exp-01-salle-conf', 'PDF', '', '2021-07-12', '09:26:38', 'Abdou Majeed ALIDOU', '::1', 0),
(2500, 'Cons-01-salle-conf', '', '', '2021-07-12', '09:29:42', 'Abdou Majeed ALIDOU', '::1', 0),
(2501, 'Info-01-salle-conf', 'Large', '', '2021-07-12', '09:30:08', 'Abdou Majeed ALIDOU', '::1', 0),
(2502, 'Cons-01-location-conf', '', '', '2021-07-12', '09:30:44', 'Abdou Majeed ALIDOU', '::1', 0),
(2503, 'Cons-01-location-conf', '', '', '2021-07-12', '09:37:08', 'Abdou Majeed ALIDOU', '::1', 0),
(2504, 'Cons-01-location-conf', '', '', '2021-07-12', '09:38:33', 'Abdou Majeed ALIDOU', '::1', 0),
(2505, 'Cons-01-location-conf', '', '', '2021-07-12', '09:41:56', 'Abdou Majeed ALIDOU', '::1', 0),
(2506, 'Cons-01-location-conf', '', '', '2021-07-12', '09:42:14', 'Abdou Majeed ALIDOU', '::1', 0),
(2507, 'Cons-01-location-conf', '', '', '2021-07-12', '09:50:30', 'Abdou Majeed ALIDOU', '::1', 0),
(2508, 'Cons-01-location-conf', '', '', '2021-07-12', '10:00:46', 'Abdou Majeed ALIDOU', '::1', 0),
(2509, 'Cons-01-location-conf', '', '', '2021-07-12', '10:01:40', 'Abdou Majeed ALIDOU', '::1', 0),
(2510, 'Cons-01-location-conf', '', '', '2021-07-12', '10:02:23', 'Abdou Majeed ALIDOU', '::1', 0),
(2511, 'Cons-01-location-conf', '', '', '2021-07-12', '10:03:09', 'Abdou Majeed ALIDOU', '::1', 0),
(2512, 'Cons-01-location-conf', '', '', '2021-07-12', '10:06:15', 'Abdou Majeed ALIDOU', '::1', 0),
(2513, 'Cons-01-location-conf', '', '', '2021-07-12', '10:06:44', 'Abdou Majeed ALIDOU', '::1', 0),
(2514, 'Cons-01-location-conf', '', '', '2021-07-12', '10:07:17', 'Abdou Majeed ALIDOU', '::1', 0),
(2515, 'Cons-01-location-conf', '', '', '2021-07-12', '10:10:04', 'Abdou Majeed ALIDOU', '::1', 0),
(2516, 'Cons-01-location-conf', '', '', '2021-07-12', '10:21:06', 'Abdou Majeed ALIDOU', '::1', 0),
(2517, 'Cons-01-location-conf', '', '', '2021-07-12', '10:23:06', 'Abdou Majeed ALIDOU', '::1', 0),
(2518, 'Cons-01-location-conf', '', '', '2021-07-12', '10:23:17', 'Abdou Majeed ALIDOU', '::1', 0),
(2519, 'Info-01-location-conf', '34', '', '2021-07-12', '10:23:31', 'Abdou Majeed ALIDOU', '::1', 0),
(2520, 'Cons-01-service-conf', '', '', '2021-07-12', '10:23:49', 'Abdou Majeed ALIDOU', '::1', 0),
(2521, 'Info-01-service-conf', 'Décoration', '', '2021-07-12', '10:24:00', 'Abdou Majeed ALIDOU', '::1', 0),
(2522, 'Cons-01-location-conf', '', '', '2021-07-12', '10:25:51', 'Abdou Majeed ALIDOU', '::1', 0),
(2523, 'Cons-01-location-conf', '', '', '2021-07-12', '10:37:18', 'Abdou Majeed ALIDOU', '::1', 0),
(2524, 'Cons-01-location-conf', '', '', '2021-07-12', '10:41:21', 'Abdou Majeed ALIDOU', '::1', 0),
(2525, 'Cons-01-location-conf', '', '', '2021-07-12', '10:41:36', 'Abdou Majeed ALIDOU', '::1', 0),
(2526, 'Cons-01-location-conf', '', '', '2021-07-12', '10:44:00', 'Abdou Majeed ALIDOU', '::1', 0),
(2527, 'Cons-01-location-conf', '', '', '2021-07-12', '10:45:42', 'Abdou Majeed ALIDOU', '::1', 0),
(2528, 'Cons-01-location-conf', '', '', '2021-07-12', '11:07:17', 'Abdou Majeed ALIDOU', '::1', 0),
(2529, 'Cons-01-location-conf', '', '', '2021-07-12', '11:07:49', 'Abdou Majeed ALIDOU', '::1', 0),
(2530, 'Cons-01-location-conf', '', '', '2021-07-12', '11:08:43', 'Abdou Majeed ALIDOU', '::1', 0),
(2531, 'Cons-01-location-conf', '', '', '2021-07-12', '11:09:12', 'Abdou Majeed ALIDOU', '::1', 0),
(2532, 'Cons-01-location-conf', '', '', '2021-07-12', '11:09:44', 'Abdou Majeed ALIDOU', '::1', 0),
(2533, 'Cons-01-location-conf', '', '', '2021-07-12', '11:10:47', 'Abdou Majeed ALIDOU', '::1', 0),
(2534, 'Cons-01-location-conf', '', '', '2021-07-12', '11:11:00', 'Abdou Majeed ALIDOU', '::1', 0),
(2535, 'Cons-01-location-conf', '', '', '2021-07-12', '11:12:12', 'Abdou Majeed ALIDOU', '::1', 0),
(2536, 'Cons-01-location-conf', '', '', '2021-07-12', '11:12:35', 'Abdou Majeed ALIDOU', '::1', 0),
(2537, 'Cons-01-location-conf', '', '', '2021-07-12', '11:13:44', 'Abdou Majeed ALIDOU', '::1', 0),
(2538, 'Cons-01-location-conf', '', '', '2021-07-12', '11:14:59', 'Abdou Majeed ALIDOU', '::1', 0),
(2539, 'Cons-01-location-conf', '', '', '2021-07-12', '11:15:17', 'Abdou Majeed ALIDOU', '::1', 0),
(2540, 'Cons-01-location-conf', '', '', '2021-07-12', '11:18:52', 'Abdou Majeed ALIDOU', '::1', 0),
(2541, 'Cons-01-location-conf', '', '', '2021-07-12', '11:28:26', 'Abdou Majeed ALIDOU', '::1', 0),
(2542, 'Cons-01-location-conf', '', '', '2021-07-12', '11:40:37', 'Abdou Majeed ALIDOU', '::1', 0),
(2543, 'Cons-01-location-conf', '', '', '2021-07-12', '11:41:18', 'Abdou Majeed ALIDOU', '::1', 0),
(2544, 'Cons-01-location-conf', '', '', '2021-07-12', '11:41:25', 'Abdou Majeed ALIDOU', '::1', 0),
(2545, 'Cons-01-location-conf', '', '', '2021-07-12', '12:06:43', 'Abdou Majeed ALIDOU', '::1', 0),
(2546, 'Cons-01-location-conf', '', '', '2021-07-12', '12:08:04', 'Abdou Majeed ALIDOU', '::1', 0),
(2547, 'Cons-01-location-conf', '', '', '2021-07-12', '12:10:28', 'Abdou Majeed ALIDOU', '::1', 0),
(2548, 'Cons-01-location-conf', '', '', '2021-07-12', '12:10:53', 'Abdou Majeed ALIDOU', '::1', 0),
(2549, 'Cons-01-location-conf', '', '', '2021-07-12', '12:11:08', 'Abdou Majeed ALIDOU', '::1', 0),
(2550, 'Cons-01-location-conf', '', '', '2021-07-12', '12:12:33', 'Abdou Majeed ALIDOU', '::1', 0),
(2551, 'Cons-01-location-conf', '', '', '2021-07-12', '12:12:41', 'Abdou Majeed ALIDOU', '::1', 0),
(2552, 'Cons-01-location-conf', '', '', '2021-07-12', '12:14:07', 'Abdou Majeed ALIDOU', '::1', 0),
(2553, 'Cons-01-location-conf', '', '', '2021-07-12', '12:14:22', 'Abdou Majeed ALIDOU', '::1', 0),
(2554, 'Cons-01-location-conf', '', '', '2021-07-12', '12:18:01', 'Abdou Majeed ALIDOU', '::1', 0),
(2555, 'Cons-01-location-conf', '', '', '2021-07-12', '12:18:20', 'Abdou Majeed ALIDOU', '::1', 0),
(2556, 'Cons-01-location-conf', '', '', '2021-07-12', '12:18:54', 'Abdou Majeed ALIDOU', '::1', 0),
(2557, 'Cons-01-location-conf', '', '', '2021-07-12', '12:19:06', 'Abdou Majeed ALIDOU', '::1', 0),
(2558, 'Cons-01-location-conf', '', '', '2021-07-12', '12:19:58', 'Abdou Majeed ALIDOU', '::1', 0),
(2559, 'Cons-01-location-conf', '', '', '2021-07-12', '12:20:52', 'Abdou Majeed ALIDOU', '::1', 0),
(2560, 'Cons-01-location-conf', '', '', '2021-07-12', '12:21:27', 'Abdou Majeed ALIDOU', '::1', 0),
(2561, 'Cons-01-location-conf', '', '', '2021-07-12', '12:21:56', 'Abdou Majeed ALIDOU', '::1', 0),
(2562, 'Cons-01-location-conf', '', '', '2021-07-12', '12:22:40', 'Abdou Majeed ALIDOU', '::1', 0),
(2563, 'Cons-01-stat-conf', '', '', '2021-07-12', '12:24:12', 'Abdou Majeed ALIDOU', '::1', 0),
(2564, 'Cons-01-location-conf', '', '', '2021-07-12', '12:25:21', 'Abdou Majeed ALIDOU', '::1', 0),
(2565, 'Cons-01-location-conf', '', '', '2021-07-12', '12:27:19', 'Abdou Majeed ALIDOU', '::1', 0),
(2566, 'Cons-01-location-conf', '', '', '2021-07-12', '12:27:49', 'Abdou Majeed ALIDOU', '::1', 0),
(2567, 'Cons-01-location-conf', '', '', '2021-07-12', '12:28:17', 'Abdou Majeed ALIDOU', '::1', 0),
(2568, 'Cons-01-location-conf', '', '', '2021-07-12', '12:31:02', 'Abdou Majeed ALIDOU', '::1', 0),
(2569, 'Cons-01-location-conf', '', '', '2021-07-12', '12:58:54', 'Abdou Majeed ALIDOU', '::1', 0),
(2570, 'Cons-01-location-conf', '', '', '2021-07-12', '13:37:41', 'Abdou Majeed ALIDOU', '::1', 0),
(2571, 'Cons-01-location-conf', '', '', '2021-07-12', '13:39:28', 'Abdou Majeed ALIDOU', '::1', 0),
(2572, 'Cons-01-location-conf', '', '', '2021-07-12', '13:40:17', 'Abdou Majeed ALIDOU', '::1', 0),
(2573, 'Cons-01-location-conf', '', '', '2021-07-12', '13:41:02', 'Abdou Majeed ALIDOU', '::1', 0),
(2574, 'Cons-01-location-conf', '', '', '2021-07-12', '13:44:14', 'Abdou Majeed ALIDOU', '::1', 0),
(2575, 'Cons-01-location-conf', '', '', '2021-07-12', '13:45:28', 'Abdou Majeed ALIDOU', '::1', 0),
(2576, 'Cons-01-location-conf', '', '', '2021-07-12', '13:47:38', 'Abdou Majeed ALIDOU', '::1', 0),
(2577, 'Cons-01-location-conf', '', '', '2021-07-12', '13:49:42', 'Abdou Majeed ALIDOU', '::1', 0),
(2578, 'Cons-01-location-conf', '', '', '2021-07-12', '13:50:02', 'Abdou Majeed ALIDOU', '::1', 0),
(2579, 'Cons-01-location-conf', '', '', '2021-07-12', '13:50:24', 'Abdou Majeed ALIDOU', '::1', 0),
(2580, 'Cons-01-location-conf', '', '', '2021-07-12', '13:51:09', 'Abdou Majeed ALIDOU', '::1', 0),
(2581, 'Cons-01-location-conf', '', '', '2021-07-12', '13:53:53', 'Abdou Majeed ALIDOU', '::1', 0),
(2582, 'Cons-01-location-conf', '', '', '2021-07-12', '13:54:32', 'Abdou Majeed ALIDOU', '::1', 0);
INSERT INTO `addlog_table` (`id_addlog_table`, `CodeEvenement`, `ParametresEvenement`, `MessageEvenement`, `DateEvenement`, `HeureEvenement`, `PseudoUtilisateur`, `AdresseIP`, `IdCompte`) VALUES
(2583, 'Cons-01-location-conf', '', '', '2021-07-12', '13:55:11', 'Abdou Majeed ALIDOU', '::1', 0),
(2584, 'Cons-01-location-conf', '', '', '2021-07-12', '14:04:57', 'Abdou Majeed ALIDOU', '::1', 0),
(2585, 'Cons-01-location-conf', '', '', '2021-07-12', '14:07:59', 'Abdou Majeed ALIDOU', '::1', 0),
(2586, 'Cons-01-location-conf', '', '', '2021-07-12', '14:08:38', 'Abdou Majeed ALIDOU', '::1', 0),
(2587, 'Cons-01-location-conf', '', '', '2021-07-12', '14:09:21', 'Abdou Majeed ALIDOU', '::1', 0),
(2588, 'Cons-01-location-conf', '', '', '2021-07-12', '14:19:08', 'Abdou Majeed ALIDOU', '::1', 0),
(2589, 'Cons-01-location-conf', '', '', '2021-07-12', '14:19:25', 'Abdou Majeed ALIDOU', '::1', 0),
(2590, 'Cons-01-location-conf', '', '', '2021-07-12', '14:20:45', 'Abdou Majeed ALIDOU', '::1', 0),
(2591, 'Cons-01-location-conf', '', '', '2021-07-12', '14:24:28', 'Abdou Majeed ALIDOU', '::1', 0),
(2592, 'Cons-01-location-conf', '', '', '2021-07-12', '14:25:19', 'Abdou Majeed ALIDOU', '::1', 0),
(2593, 'Cons-01-location-conf', '', '', '2021-07-13', '10:01:29', 'Abdou Majeed ALIDOU', '::1', 0),
(2594, 'Cons-01-dashboard', '', '', '2021-07-13', '10:22:01', 'Abdou Majeed ALIDOU', '::1', 0),
(2595, 'Deconnex-01', '', '', '2021-07-13', '10:22:11', 'Abdou Majeed ALIDOU', '::1', 0),
(2596, 'Connex-01', '', '', '2021-07-13', '10:22:24', 'Abdou Majeed ALIDOU', '::1', 0),
(2597, 'Cons-01-dashboard', '', '', '2021-07-13', '10:22:24', 'Abdou Majeed ALIDOU', '::1', 0),
(2598, 'Cons-01-dashboard', '', '', '2021-07-13', '10:22:31', 'Abdou Majeed ALIDOU', '::1', 0),
(2599, 'Cons-01-log', '', '', '2021-07-13', '10:40:44', 'Abdou Majeed ALIDOU', '::1', 0),
(2600, 'Cons-01-dashboard', '', '', '2021-07-13', '12:23:28', 'Abdou Majeed ALIDOU', '::1', 0),
(2601, 'Deconnex-01', '', '', '2021-07-13', '12:24:39', 'Abdou Majeed ALIDOU', '::1', 0),
(2602, 'Connex-01', '', '', '2021-07-13', '12:24:44', 'Abdou Majeed ALIDOU', '::1', 0),
(2603, 'Cons-01-dashboard', '', '', '2021-07-13', '12:24:44', 'Abdou Majeed ALIDOU', '::1', 0),
(2604, 'Cons-01-dashboard', '', '', '2021-07-13', '12:24:49', 'Abdou Majeed ALIDOU', '::1', 0),
(2605, 'Deconnex-01', '', '', '2021-07-13', '12:25:41', 'Abdou Majeed ALIDOU', '::1', 0),
(2606, 'Connex-01', '', '', '2021-07-13', '12:25:45', 'Abdou Majeed ALIDOU', '::1', 0),
(2607, 'Cons-01-dashboard', '', '', '2021-07-13', '12:25:45', 'Abdou Majeed ALIDOU', '::1', 0),
(2608, 'Cons-01-soins', '', '', '2021-07-13', '12:26:53', '', '::1', 0),
(2609, 'Cons-01-soins', '', '', '2021-07-13', '12:28:07', '', '::1', 1),
(2610, 'Cons-01-soins', '', '', '2021-07-13', '12:48:53', '', '::1', 1),
(2611, 'Deconnex-01', '', '', '2021-07-13', '12:49:04', 'Abdou Majeed ALIDOU', '::1', 0),
(2612, 'Connex-01', '', '', '2021-07-13', '12:58:58', 'Abdou Majeed ALIDOU', '::1', 0),
(2613, 'Cons-01-dashboard', '', '', '2021-07-13', '12:58:58', 'Abdou Majeed ALIDOU', '::1', 0),
(2614, 'Cons-01-soins', '', '', '2021-07-13', '12:59:02', '', '::1', 1),
(2615, 'Cons-01-soins', '', '', '2021-07-13', '13:01:00', '', '::1', 1),
(2616, 'Cons-01-soins', '', '', '2021-07-13', '13:02:12', '', '::1', 1),
(2617, 'Cons-01-soins', '', '', '2021-07-13', '13:04:17', '', '::1', 1),
(2618, 'Cons-01-location-conf', '', '', '2021-07-13', '13:08:20', 'Abdou Majeed ALIDOU', '::1', 0),
(2619, 'Cons-01-location-conf', '', '', '2021-07-13', '13:08:25', 'Abdou Majeed ALIDOU', '::1', 0),
(2620, 'Cons-01-location-conf', '', '', '2021-07-13', '13:31:35', 'Abdou Majeed ALIDOU', '::1', 0),
(2621, 'Deconnex-01', '', '', '2021-07-13', '13:31:47', 'Abdou Majeed ALIDOU', '::1', 0),
(2622, 'Connex-01', '', '', '2021-07-13', '13:31:51', 'Abdou Majeed ALIDOU', '::1', 0),
(2623, 'Cons-01-dashboard', '', '', '2021-07-13', '13:31:51', 'Abdou Majeed ALIDOU', '::1', 0),
(2624, 'Cons-01-soins_spa', '', '', '2021-07-13', '13:31:58', '', '::1', 1),
(2625, 'Cons-01-soins_spa', '', '', '2021-07-13', '13:34:37', '', '::1', 1),
(2626, 'Cons-01-soins_spa', '', '', '2021-07-13', '13:34:45', '', '::1', 1),
(2627, 'Cons-01-soins_spa', '', '', '2021-07-13', '13:36:51', '', '::1', 1),
(2628, 'Cons-01-dashboard', '', '', '2021-07-13', '13:37:14', 'Abdou Majeed ALIDOU', '::1', 0),
(2629, 'Cons-01-dashboard', '', '', '2021-07-13', '13:37:22', 'Abdou Majeed ALIDOU', '::1', 0),
(2630, 'Cons-01-soins_spa', '', '', '2021-07-13', '13:37:26', '', '::1', 1),
(2631, 'Cons-01-soins_spa', '', '', '2021-07-13', '13:38:27', '', '::1', 1),
(2632, 'Cons-01-soins_spa', '', '', '2021-07-13', '15:47:55', '', '::1', 1),
(2633, 'Cons-01-location-conf', '', '', '2021-07-13', '15:48:40', 'Abdou Majeed ALIDOU', '::1', 0),
(2634, 'Cons-01-salle-conf', '', '', '2021-07-13', '15:48:44', 'Abdou Majeed ALIDOU', '::1', 0),
(2635, 'Cons-01-soins_spa', '', '', '2021-07-13', '15:49:53', '', '::1', 1),
(2636, 'Cons-01-soins_spa', '', '', '2021-07-13', '15:51:42', '', '::1', 1),
(2637, 'Cons-01-soins_spa', '', '', '2021-07-14', '09:27:20', '', '::1', 1),
(2638, 'Cons-01-soins_spa', '', '', '2021-07-14', '09:29:25', '', '::1', 1),
(2639, 'Cons-01-soins_spa', '', '', '2021-07-14', '09:29:33', '', '::1', 1),
(2640, 'Cons-01-soins_spa', '', '', '2021-07-14', '09:56:11', '', '::1', 1),
(2641, 'Cons-01-soins_spa', '', '', '2021-07-14', '09:56:45', '', '::1', 1),
(2642, 'Cons-01-soins_spa', '', '', '2021-07-14', '09:56:50', '', '::1', 1),
(2643, 'Cons-01-soins_spa', '', '', '2021-07-14', '09:58:51', '', '::1', 1),
(2644, 'Cons-01-soins_spa', '', '', '2021-07-14', '09:59:15', '', '::1', 1),
(2645, 'Cons-01-soins_spa', '', '', '2021-07-14', '09:59:34', '', '::1', 1),
(2646, 'Cons-01-soins_spa', '', '', '2021-07-14', '10:03:54', '', '::1', 1),
(2647, 'Cons-01-soins_spa', '', '', '2021-07-14', '10:19:00', '', '::1', 1),
(2648, 'Cons-01-soins_spa', '', '', '2021-07-14', '10:19:10', '', '::1', 1),
(2649, 'Cons-01-soins_spa', '', '', '2021-07-14', '10:36:53', '', '::1', 1),
(2650, 'Cons-01-location-conf', '', '', '2021-07-14', '10:43:00', 'Abdou Majeed ALIDOU', '::1', 0),
(2651, 'Cons-01-location-conf', '', '', '2021-07-14', '10:43:09', 'Abdou Majeed ALIDOU', '::1', 0),
(2652, 'Cons-01-soins_spa', '', '', '2021-07-14', '11:06:35', '', '::1', 1),
(2653, 'Cons-01-soins_spa', '', '', '2021-07-14', '11:06:56', '', '::1', 1),
(2654, 'Cons-01-soins_spa', '', '', '2021-07-14', '11:08:13', '', '::1', 1),
(2655, 'Cons-01-soins_spa', '', '', '2021-07-14', '11:08:30', '', '::1', 1),
(2656, 'Cons-01-soins_spa', '', '', '2021-07-14', '11:08:38', '', '::1', 1),
(2657, 'Cons-01-soins_spa', '', '', '2021-07-14', '11:09:08', '', '::1', 1),
(2658, 'Cons-01-soins_spa', '', '', '2021-07-14', '15:49:33', '', '::1', 1),
(2659, 'Cons-01-soins_spa', '', '', '2021-07-14', '15:50:32', '', '::1', 1),
(2660, 'Deconnex-01', '', '', '2021-07-15', '12:06:29', 'Abdou Majeed ALIDOU', '::1', 0),
(2661, 'Connex-01', '', '', '2021-07-15', '12:06:38', 'Abdou Majeed ALIDOU', '::1', 0),
(2662, 'Cons-01-dashboard', '', '', '2021-07-15', '12:06:39', 'Abdou Majeed ALIDOU', '::1', 0),
(2663, 'Cons-01-dashboard', '', '', '2021-07-15', '12:06:52', 'Abdou Majeed ALIDOU', '::1', 0),
(2664, 'Cons-01-dashboard', '', '', '2021-07-15', '12:06:57', 'Abdou Majeed ALIDOU', '::1', 0),
(2665, 'Cons-01-dashboard', '', '', '2021-07-15', '12:07:32', 'Abdou Majeed ALIDOU', '::1', 0),
(2666, 'Cons-01-dashboard', '', '', '2021-07-15', '12:07:47', 'Abdou Majeed ALIDOU', '::1', 0),
(2667, 'Cons-01-dashboard', '', '', '2021-07-15', '12:07:54', 'Abdou Majeed ALIDOU', '::1', 0),
(2668, 'Cons-01-dashboard', '', '', '2021-07-15', '12:12:21', 'Abdou Majeed ALIDOU', '::1', 0),
(2669, 'Cons-01-dashboard', '', '', '2021-07-15', '12:12:26', 'Abdou Majeed ALIDOU', '::1', 0),
(2670, 'Cons-01-dashboard', '', '', '2021-07-15', '12:12:29', 'Abdou Majeed ALIDOU', '::1', 0),
(2671, 'Cons-01-soins_spa', '', '', '2021-07-15', '12:13:46', '', '::1', 1),
(2672, 'Cons-01-dashboard', '', '', '2021-07-15', '12:15:00', 'Abdou Majeed ALIDOU', '::1', 0),
(2673, 'Cons-01-soins_spa', '', '', '2021-07-15', '12:15:23', '', '::1', 1),
(2674, 'Cons-01-location-conf', '', '', '2021-07-15', '14:55:56', 'Abdou Majeed ALIDOU', '::1', 0),
(2675, 'Cons-01-soins_spa', '', '', '2021-07-15', '15:48:36', '', '::1', 1),
(2676, 'Cons-01-soins_spa', '', '', '2021-07-15', '15:49:00', '', '::1', 1),
(2677, 'Cons-01-soins_spa', '', '', '2021-07-15', '15:49:42', '', '::1', 1),
(2678, 'Cons-01-soins_spa', '', '', '2021-07-15', '15:50:21', '', '::1', 1),
(2679, 'Cons-01-soins_spa', '', '', '2021-07-15', '15:50:57', '', '::1', 1),
(2680, 'Cons-01-soins_spa', '', '', '2021-07-15', '15:55:14', '', '::1', 1),
(2681, 'Cons-01-soins_spa', '', '', '2021-07-15', '16:02:07', '', '::1', 1),
(2682, 'Cons-01-soins_spa', '', '', '2021-07-15', '16:05:58', '', '::1', 1),
(2683, 'Cons-01-soins_spa', '', '', '2021-07-15', '16:08:14', '', '::1', 1),
(2684, 'Cons-01-soins_spa', '', '', '2021-07-15', '16:15:47', '', '::1', 1),
(2685, 'Enr-01-soins_spa', '{\"id_soins_spa\":\"4\"}', '', '2021-07-15', '22:51:39', '', '::1', 1),
(2686, 'Enr-01-soins_spa', '{\"id_soins_spa\":\"5\"}', '', '2021-07-15', '22:52:07', '', '::1', 1),
(2687, 'Cons-01-salle-conf', '', '', '2021-07-16', '09:13:48', 'Abdou Majeed ALIDOU', '::1', 0),
(2688, 'Info-01-salle-conf', 'Large', '', '2021-07-16', '09:13:54', 'Abdou Majeed ALIDOU', '::1', 0),
(2689, 'Cons-01-soins_spa', '', '', '2021-07-16', '09:14:19', '', '::1', 1),
(2690, 'Cons-01-soins_spa', '', '', '2021-07-16', '11:07:23', '', '::1', 1),
(2691, 'Cons-01-soins_spa', '', '', '2021-07-16', '11:19:15', '', '::1', 1),
(2692, 'Cons-01-location-conf', '', '', '2021-07-16', '11:19:21', 'Abdou Majeed ALIDOU', '::1', 0),
(2693, 'Info-01-location-conf', '34', '', '2021-07-16', '11:19:27', 'Abdou Majeed ALIDOU', '::1', 0),
(2694, 'Cons-01-soins_spa', '', '', '2021-07-16', '11:31:04', '', '::1', 1),
(2695, 'Cons-01-soins_spa', '', '', '2021-07-16', '11:32:37', '', '::1', 1),
(2696, 'Cons-01-soins_spa', '', '', '2021-07-16', '11:33:28', '', '::1', 1),
(2697, 'Cons-01-soins_spa', '', '', '2021-07-16', '11:47:15', '', '::1', 1),
(2698, 'Cons-01-soins_spa', '', '', '2021-07-16', '11:47:49', '', '::1', 1),
(2699, 'Cons-01-soins_spa', '', '', '2021-07-16', '11:51:19', '', '::1', 1),
(2700, 'Cons-01-soins_spa', '', '', '2021-07-16', '11:52:13', '', '::1', 1),
(2701, 'Cons-01-soins_spa', '', '', '2021-07-16', '11:52:43', '', '::1', 1),
(2702, 'Cons-01-soins_spa', '', '', '2021-07-16', '11:53:35', '', '::1', 1),
(2703, 'Cons-01-soins_spa', '', '', '2021-07-16', '11:53:50', '', '::1', 1),
(2704, 'Cons-01-soins_spa', '', '', '2021-07-16', '11:54:25', '', '::1', 1),
(2705, 'Cons-01-soins_spa', '', '', '2021-07-16', '11:54:38', '', '::1', 1),
(2706, 'Cons-01-soins_spa', '', '', '2021-07-16', '11:55:48', '', '::1', 1),
(2707, 'Cons-01-soins_spa', '', '', '2021-07-16', '11:56:02', '', '::1', 1),
(2708, 'Cons-01-soins_spa', '', '', '2021-07-16', '11:56:18', '', '::1', 1),
(2709, 'Cons-01-soins_spa', '', '', '2021-07-16', '11:57:12', '', '::1', 1),
(2710, 'Cons-01-soins_spa', '', '', '2021-07-16', '12:02:42', '', '::1', 1),
(2711, 'Cons-01-soins_spa', '', '', '2021-07-16', '12:03:52', '', '::1', 1),
(2712, 'Cons-01-soins_spa', '', '', '2021-07-16', '13:09:05', '', '::1', 1),
(2713, 'Cons-01-soins_spa', '', '', '2021-07-16', '13:09:24', '', '::1', 1),
(2714, 'Cons-01-soins_spa', '', '', '2021-07-16', '13:46:08', '', '::1', 1),
(2715, 'Cons-01-soins_spa', '', '', '2021-07-16', '16:05:45', '', '::1', 1),
(2716, 'Cons-01-soins_spa', '', '', '2021-07-16', '16:06:06', '', '::1', 1),
(2717, 'Cons-01-soins_spa', '', '', '2021-07-16', '16:08:29', '', '::1', 1),
(2718, 'Cons-01-soins_spa', '', '', '2021-07-16', '16:08:41', '', '::1', 1),
(2719, 'Deconnex-01', '', '', '2021-07-19', '07:51:34', 'Abdou Majeed ALIDOU', '::1', 0),
(2720, 'Connex-01', '', '', '2021-07-19', '07:51:41', 'Abdou Majeed ALIDOU', '::1', 0),
(2721, 'Cons-01-dashboard', '', '', '2021-07-19', '07:51:41', 'Abdou Majeed ALIDOU', '::1', 0),
(2722, 'Cons-01-soins_spa', '', '', '2021-07-19', '07:55:52', '', '::1', 1),
(2723, 'Enr-01-soins_spa', '{\"id_soins_spa\":\"6\"}', '', '2021-07-19', '07:58:25', '', '::1', 1),
(2724, 'Cons-01-soins_spa', '', '', '2021-07-19', '08:01:18', '', '::1', 1),
(2725, 'Enr-01-soins_spa', '{\"id_soins_spa\":\"7\"}', '', '2021-07-19', '08:01:33', '', '::1', 1),
(2726, 'Cons-01-soins_spa', '', '', '2021-07-19', '08:43:16', '', '::1', 1),
(2727, 'Cons-01-soins_spa', '', '', '2021-07-19', '08:48:31', '', '::1', 1),
(2728, 'Cons-01-soins_spa', '', '', '2021-07-19', '08:49:07', '', '::1', 1),
(2729, 'Cons-01-soins_spa', '', '', '2021-07-19', '08:52:26', '', '::1', 1),
(2730, 'Cons-01-soins_spa', '', '', '2021-07-19', '08:53:02', '', '::1', 1),
(2731, 'Enr-01-soins_spa', '{\"id_soins_spa\":null}', '', '2021-07-19', '08:53:05', '', '::1', 1),
(2732, 'Cons-01-soins_spa', '', '', '2021-07-19', '08:53:53', '', '::1', 1),
(2733, 'Enr-01-soins_spa', '{\"id_soins_spa\":null}', '', '2021-07-19', '08:53:57', '', '::1', 1),
(2734, 'Cons-01-soins_spa', '', '', '2021-07-19', '09:52:48', '', '::1', 1),
(2735, 'Cons-01-soins_spa', '', '', '2021-07-19', '09:54:01', '', '::1', 1),
(2736, 'Cons-01-stat-conf', '', '', '2021-07-19', '09:56:05', 'Abdou Majeed ALIDOU', '::1', 0),
(2737, 'Cons-01-stat-conf', '', '', '2021-07-19', '09:56:56', 'Abdou Majeed ALIDOU', '::1', 0),
(2738, 'Cons-01-soins_spa', '', '', '2021-07-19', '10:02:11', '', '::1', 1),
(2739, 'Cons-01-stat-conf', '', '', '2021-07-19', '10:04:18', 'Abdou Majeed ALIDOU', '::1', 0),
(2740, 'Cons-01-soins_spa', '', '', '2021-07-19', '10:04:46', '', '::1', 1),
(2741, 'Enr-01-soins_spa', '{\"id_soins_spa\":null}', '', '2021-07-19', '10:05:57', '', '::1', 1),
(2742, 'Enr-01-soins_spa', '{\"id_soins_spa\":null}', '', '2021-07-19', '10:06:45', '', '::1', 1),
(2743, 'Enr-01-soins_spa', '{\"id_soins_spa\":null}', '', '2021-07-19', '10:09:18', '', '::1', 1),
(2744, 'Enr-01-soins_spa', '{\"id_soins_spa\":null}', '', '2021-07-19', '10:09:37', '', '::1', 1),
(2745, 'Enr-01-soins_spa', '{\"id_soins_spa\":null}', '', '2021-07-19', '10:09:47', '', '::1', 1),
(2746, 'Enr-01-soins_spa', '{\"id_soins_spa\":null}', '', '2021-07-19', '10:10:28', '', '::1', 1),
(2747, 'Enr-01-soins_spa', '{\"id_soins_spa\":null}', '', '2021-07-19', '10:10:45', '', '::1', 1),
(2748, 'Enr-01-soins_spa', '{\"id_soins_spa\":\"20\"}', '', '2021-07-19', '10:11:07', '', '::1', 1),
(2749, 'Enr-01-soins_spa', '{\"id_soins_spa\":\"21\"}', '', '2021-07-19', '10:11:59', '', '::1', 1),
(2750, 'Enr-01-soins_spa', '{\"id_soins_spa\":\"22\"}', '', '2021-07-19', '10:20:21', '', '::1', 1),
(2751, 'Cons-01-soins_spa', '', '', '2021-07-19', '10:20:23', '', '::1', 1),
(2752, 'Enr-01-soins_spa', '{\"id_soins_spa\":\"23\"}', '', '2021-07-19', '10:20:41', '', '::1', 1),
(2753, 'Enr-01-soins_spa', '{\"id_soins_spa\":\"24\"}', '', '2021-07-19', '10:56:54', '', '::1', 1),
(2754, 'Cons-01-soins_spa', '', '', '2021-07-19', '10:57:25', '', '::1', 1),
(2755, 'Cons-01-soins_spa', '', '', '2021-07-19', '10:57:38', '', '::1', 1),
(2756, 'Cons-01-soins_spa', '', '', '2021-07-19', '10:59:11', '', '::1', 1),
(2757, 'Cons-01-soins_spa', '', '', '2021-07-19', '11:00:14', '', '::1', 1),
(2758, 'Enr-01-soins_spa', '{\"id_soins_spa\":\"25\"}', '', '2021-07-19', '11:00:20', '', '::1', 1),
(2759, 'Enr-01-soins_spa', '{\"id_soins_spa\":\"26\"}', '', '2021-07-19', '11:01:13', '', '::1', 1),
(2760, 'Cons-01-soins_spa', '', '', '2021-07-19', '11:01:16', '', '::1', 1),
(2761, 'Cons-01-soins_spa', '', '', '2021-07-19', '11:01:38', '', '::1', 1),
(2762, 'Enr-01-soins_spa', '{\"id_soins_spa\":\"27\"}', '', '2021-07-19', '11:01:44', '', '::1', 1),
(2763, 'Cons-01-chambre', '', '', '2021-07-19', '11:32:58', 'Abdou Majeed ALIDOU', '::1', 0),
(2764, 'Info-01-chambre', 'q', '', '2021-07-19', '11:33:05', 'Abdou Majeed ALIDOU', '::1', 0),
(2765, 'Cons-01-soins_spa', '', '', '2021-07-19', '11:43:59', '', '::1', 1),
(2766, 'Info-01-soins_spa', '{\"id_soins_spa\":null,\"nom_soins_spa\":\"tom\"}', '', '2021-07-19', '11:44:03', '', '::1', 1),
(2767, 'Cons-01-location-conf', '', '', '2021-07-19', '11:59:35', 'Abdou Majeed ALIDOU', '::1', 0),
(2768, 'Info-01-location-conf', '34', '', '2021-07-19', '11:59:39', 'Abdou Majeed ALIDOU', '::1', 0),
(2769, 'Cons-01-soins_spa', '', '', '2021-07-19', '12:01:14', '', '::1', 1),
(2770, 'Info-01-soins_spa', '{\"id_soins_spa\":null,\"nom_soins_spa\":null}', '', '2021-07-19', '12:01:17', '', '::1', 1),
(2771, 'Cons-01-soins_spa', '', '', '2021-07-19', '12:06:37', '', '::1', 1),
(2772, 'Info-01-soins_spa', '{\"id_soins_spa\":null,\"nom_soins_spa\":null}', '', '2021-07-19', '12:06:40', '', '::1', 1),
(2773, 'Info-01-soins_spa', '{\"id_soins_spa\":\"1\",\"nom_soins_spa\":\"Soins du visage\"}', '', '2021-07-19', '12:12:46', '', '::1', 1),
(2774, 'Info-01-soins_spa', '{\"id_soins_spa\":\"1\",\"nom_soins_spa\":\"Soins du visage\"}', '', '2021-07-19', '12:13:26', '', '::1', 1),
(2775, 'Info-01-soins_spa', '{\"id_soins_spa\":\"2\",\"nom_soins_spa\":\"Soins du corps\"}', '', '2021-07-19', '12:13:34', '', '::1', 1),
(2776, 'Info-01-soins_spa', '{\"id_soins_spa\":\"4\",\"nom_soins_spa\":\"qqqq\"}', '', '2021-07-19', '12:13:41', '', '::1', 1),
(2777, 'Info-01-soins_spa', '{\"id_soins_spa\":\"22\",\"nom_soins_spa\":\"new\"}', '', '2021-07-19', '12:13:50', '', '::1', 1),
(2778, 'Cons-01-soins_spa', '', '', '2021-07-19', '12:47:36', '', '::1', 1),
(2779, 'Info-01-soins_spa', '{\"id_soins_spa\":\"17\",\"nom_soins_spa\":\"cnd\"}', '', '2021-07-19', '12:47:40', '', '::1', 1),
(2780, 'Cons-01-soins_spa', '', '', '2021-07-19', '12:49:04', '', '::1', 1),
(2781, 'Info-01-soins_spa', '{\"id_soins_spa\":\"2\",\"nom_soins_spa\":\"Soins du corps\"}', '', '2021-07-19', '12:49:40', '', '::1', 1),
(2782, 'Cons-01-soins_spa', '', '', '2021-07-19', '13:09:35', '', '::1', 1),
(2783, 'Cons-01-soins_spa', '', '', '2021-07-19', '13:12:15', '', '::1', 1),
(2784, 'Cons-01-soins_spa', '', '', '2021-07-19', '13:12:26', '', '::1', 1),
(2785, 'Cons-01-soins_spa', '', '', '2021-07-19', '13:12:41', '', '::1', 1),
(2786, 'Cons-01-soins_spa', '', '', '2021-07-19', '13:15:11', '', '::1', 1),
(2787, 'Cons-01-soins_spa', '', '', '2021-07-21', '08:10:15', '', '::1', 1),
(2788, 'Cons-01-soins_spa', '', '', '2021-07-21', '10:57:42', '', '::1', 1),
(2789, 'Cons-01-soins_spa', '', '', '2021-07-21', '10:58:40', '', '::1', 1),
(2790, 'Cons-01-soins_spa', '', '', '2021-07-21', '10:59:10', '', '::1', 1),
(2791, 'Cons-01-soins_spa', '', '', '2021-07-21', '10:59:38', '', '::1', 1),
(2792, 'Cons-01-soins_spa', '', '', '2021-07-21', '11:09:11', '', '::1', 1),
(2793, 'Cons-01-soins_spa', '', '', '2021-07-21', '11:09:50', '', '::1', 1),
(2794, 'Cons-01-soins_spa', '', '', '2021-07-21', '11:18:58', '', '::1', 1),
(2795, 'Cons-01-soins_spa', '', '', '2021-07-21', '11:20:59', '', '::1', 1),
(2796, 'Cons-01-soins_spa', '', '', '2021-07-21', '14:58:43', '', '::1', 1),
(2797, 'Cons-01-soins_spa', '', '', '2021-07-21', '15:37:20', '', '::1', 1),
(2798, 'Cons-01-soins_spa', '', '', '2021-07-21', '15:59:48', '', '::1', 1),
(2799, 'Info-01-soins_spa', '{\"id_soins_spa\":\"1\",\"nom_soins_spa\":\"Soins du visage\"}', '', '2021-07-21', '15:59:53', '', '::1', 1),
(2800, 'Info-01-soins_spa', '{\"id_soins_spa\":\"1\",\"nom_soins_spa\":\"Soins du visage\"}', '', '2021-07-21', '16:00:03', '', '::1', 1),
(2801, 'Cons-01-soins_spa', '', '', '2021-07-21', '16:07:48', 'Abdou Majeed ALIDOU', '::1', 1),
(2802, 'Cons-01-stat-conf', '', '', '2021-07-21', '16:12:47', 'Abdou Majeed ALIDOU', '::1', 0),
(2803, 'Cons-01-stat-conf', '', '', '2021-07-21', '16:13:54', 'Abdou Majeed ALIDOU', '::1', 0),
(2804, 'Cons-01-location-conf', '', '', '2021-07-21', '16:15:17', 'Abdou Majeed ALIDOU', '::1', 0),
(2805, 'Info-01-location-conf', '34', '', '2021-07-21', '16:15:27', 'Abdou Majeed ALIDOU', '::1', 0),
(2806, 'Cons-01-log', '', '', '2021-07-21', '22:10:57', 'Abdou Majeed ALIDOU', '::1', 0),
(2807, 'Cons-01-soins_spa', '', '', '2021-07-21', '22:42:19', 'Abdou Majeed ALIDOU', '::1', 1),
(2808, 'Cons-01-soins_spa', '', '', '2021-07-22', '08:22:05', 'Abdou Majeed ALIDOU', '::1', 1),
(2809, 'Cons-01-soins_spa', '[]', '', '2021-07-22', '09:55:28', '1', '::1', 0),
(2810, 'Info-01-soins_spa', '[\"{\\\"id_soins_spa\\\":\\\"1\\\",\\\"nom_soins_spa\\\":\\\"Soins du visage\\\"}\"]', '', '2021-07-22', '09:55:31', '1', '::1', 0),
(2811, 'Enr-01-soins_spa', '[\"{\\\"id_soins_spa\\\":\\\"28\\\",\\\"nom_soins_spa\\\":\\\"ew\\\"}\"]', '', '2021-07-22', '09:55:39', '1', '::1', 0),
(2812, 'Cons-01-log', '', '', '2021-07-22', '09:55:42', 'Abdou Majeed ALIDOU', '::1', 0),
(2813, 'Cons-01-soins_spa', '[]', '', '2021-07-22', '10:00:35', '1', '::1', 0),
(2814, 'Cons-01-soins_spa', '[]', '', '2021-07-22', '10:00:39', '1', '::1', 0),
(2815, 'Info-01-soins_spa', '{\"id_soins_spa\":\"1\",\"nom_soins_spa\":\"Soins du visage\"}', '', '2021-07-22', '10:00:42', '1', '::1', 0),
(2816, 'Enr-01-soins_spa', '{\"id_soins_spa\":\"29\",\"nom_soins_spa\":\"a\"}', '', '2021-07-22', '10:00:52', '1', '::1', 0),
(2817, 'Enr-01-soins_spa', '{\"id_soins_spa\":\"30\",\"nom_soins_spa\":\"bvgn\'kk\"}', '', '2021-07-22', '10:02:46', '1', '::1', 0),
(2818, 'Enr-01-soins_spa', '{\"id_soins_spa\":\"31\",\"nom_soins_spa\":\"hjbhjb bj\\\"jccf\"}', '', '2021-07-22', '10:03:06', '1', '::1', 0),
(2819, 'Cons-01-soins_spa', '[]', '', '2021-07-22', '10:04:00', '1', '::1', 0),
(2820, 'Cons-01-soins_spa', '[]', '', '2021-07-22', '10:04:29', 'tucoffndd\'ffmf\"fkfm', '::1', 1),
(2821, 'Cons-01-soins_spa', '[]', '', '2021-07-22', '10:05:28', 'tucoffndd\\\'ffmffkfm', '::1', 1),
(2822, 'Cons-01-soins_spa', '[]', '', '2021-07-22', '10:30:44', 'Abdou Majeed ALIDOU', '::1', 1),
(2823, 'Cons-01-location-conf', '', '', '2021-07-22', '11:06:12', 'Abdou Majeed ALIDOU', '::1', 0),
(2824, 'Cons-01-location-conf', '', '', '2021-07-22', '13:51:37', 'Abdou Majeed ALIDOU', '::1', 0),
(2825, 'Cons-01-stat-conf', '', '', '2021-07-22', '13:51:41', 'Abdou Majeed ALIDOU', '::1', 0),
(2826, 'Cons-01-soins_sp', 'ree', 'hhhhh', '2021-07-22', '13:51:45', 'Abdou Majeed ALIDOU', '::1', 1),
(2827, 'Cons-01-soins_spa', '[]', '', '2021-07-23', '09:16:58', 'Abdou Majeed ALIDOU', '::1', 1),
(2828, 'Info-01-soins_spa', '{\"id_soins_spa\":\"1\",\"nom_soins_spa\":\"Soins du visage\"}', '', '2021-07-23', '09:17:01', 'Abdou Majeed ALIDOU', '::1', 1),
(2829, 'Cons-01-soins_spa', '[]', '', '2021-07-23', '09:20:00', 'Abdou Majeed ALIDOU', '::1', 1),
(2830, 'Cons-01-soins_spa', '[]', '', '2021-07-23', '09:20:27', 'Abdou Majeed ALIDOU', '::1', 1),
(2831, 'Cons-01-soins_spa', '[]', '', '2021-07-23', '09:20:44', 'Abdou Majeed ALIDOU', '::1', 1),
(2832, 'Info-01-soins_spa', '{\"id_soins_spa\":\"1\",\"nom_soins_spa\":\"Soins du visage\"}', '', '2021-07-23', '09:20:47', 'Abdou Majeed ALIDOU', '::1', 1),
(2833, 'Cons-01-soins_spa', '[]', '', '2021-07-23', '09:21:02', 'Abdou Majeed ALIDOU', '::1', 1),
(2834, 'Cons-01-soins_spa', '[]', '', '2021-07-23', '09:21:13', 'Abdou Majeed ALIDOU', '::1', 1),
(2835, 'Cons-01-soins_spa', '[]', '', '2021-07-23', '09:21:45', 'Abdou Majeed ALIDOU', '::1', 1),
(2836, 'Cons-01-soins_spa', '[]', '', '2021-07-23', '09:22:11', 'Abdou Majeed ALIDOU', '::1', 1),
(2837, 'Info-01-soins_spa', '{\"id_soins_spa\":\"1\",\"nom_soins_spa\":\"Soins du visage\"}', '', '2021-07-23', '09:22:23', 'Abdou Majeed ALIDOU', '::1', 1),
(2838, 'Info-01-soins_spa', '{\"id_soins_spa\":\"5\",\"nom_soins_spa\":\"note\"}', '', '2021-07-23', '09:22:28', 'Abdou Majeed ALIDOU', '::1', 1),
(2839, 'Info-01-soins_spa', '{\"id_soins_spa\":\"28\",\"nom_soins_spa\":\"ew\"}', '', '2021-07-23', '09:22:36', 'Abdou Majeed ALIDOU', '::1', 1),
(2840, 'Cons-01-soins_spa', '[]', '', '2021-07-23', '09:34:45', 'Abdou Majeed ALIDOU', '::1', 1),
(2841, 'Cons-01-soins_spa', '[]', '', '2021-07-23', '09:35:15', 'Abdou Majeed ALIDOU', '::1', 1),
(2842, 'Cons-01-soins_spa', '[]', '', '2021-07-23', '09:37:18', 'Abdou Majeed ALIDOU', '::1', 1),
(2843, 'Cons-01-soins_spa', '[]', '', '2021-07-23', '09:42:11', 'Abdou Majeed ALIDOU', '::1', 1),
(2844, 'Modif-01-soins_spa', '{\"id_soins_spa\":\"1\",\"nom_soins_spa\":\"Soins du \",\"desc_soins_spa\":\"smth\"}', '', '2021-07-23', '10:31:06', 'Abdou Majeed ALIDOU', '::1', 1),
(2845, 'Cons-01-soins_spa', '[]', '', '2021-07-23', '10:31:10', 'Abdou Majeed ALIDOU', '::1', 1),
(2846, 'Modif-01-soins_spa', '{\"id_soins_spa\":\"1\",\"nom_soins_spa\":\"Soins du \",\"desc_soins_spa\":\"\"}', '', '2021-07-23', '10:31:19', 'Abdou Majeed ALIDOU', '::1', 1),
(2847, 'Cons-01-soins_spa', '[]', '', '2021-07-23', '10:31:21', 'Abdou Majeed ALIDOU', '::1', 1),
(2848, 'Modif-01-soins_spa', '{\"id_soins_spa\":\"1\",\"nom_soins_spa\":\"Soins\",\"desc_soins_spa\":\"\"}', '', '2021-07-23', '10:32:20', 'Abdou Majeed ALIDOU', '::1', 1),
(2849, 'Cons-01-soins_spa', '[]', '', '2021-07-23', '10:33:17', 'Abdou Majeed ALIDOU', '::1', 1),
(2850, 'Modif-01-soins_spa', '{\"id_soins_spa\":\"1\",\"nom_soins_spa\":\"Soin\",\"desc_soins_spa\":\"\"}', '', '2021-07-23', '10:33:26', 'Abdou Majeed ALIDOU', '::1', 1),
(2851, 'Modif-01-soins_spa', '{\"id_soins_spa\":\"1\",\"nom_soins_spa\":\"tomhhhhsjsn\",\"desc_soins_spa\":\"\"}', '', '2021-07-23', '10:35:52', 'Abdou Majeed ALIDOU', '::1', 1),
(2852, 'Modif-01-soins_spa', '{\"id_soins_spa\":\"1\",\"nom_soins_spa\":\"b\",\"desc_soins_spa\":\"\"}', '', '2021-07-23', '10:36:33', 'Abdou Majeed ALIDOU', '::1', 1),
(2853, 'Cons-01-soins_spa', '[]', '', '2021-07-23', '10:41:57', 'Abdou Majeed ALIDOU', '::1', 1),
(2854, 'Cons-01-soins_spa', '[]', '', '2021-07-23', '10:42:56', 'Abdou Majeed ALIDOU', '::1', 1),
(2855, 'Cons-01-soins_spa', '[]', '', '2021-07-23', '10:43:05', 'Abdou Majeed ALIDOU', '::1', 1),
(2856, 'Cons-01-soins_spa', '[]', '', '2021-07-23', '10:43:15', 'Abdou Majeed ALIDOU', '::1', 1),
(2857, 'Cons-01-soins_spa', '[]', '', '2021-07-23', '10:43:32', 'Abdou Majeed ALIDOU', '::1', 1),
(2858, 'Cons-01-soins_spa', '[]', '', '2021-07-23', '10:43:35', 'Abdou Majeed ALIDOU', '::1', 1),
(2859, 'Cons-01-soins_spa', '[]', '', '2021-07-23', '10:45:00', 'Abdou Majeed ALIDOU', '::1', 1),
(2860, 'Cons-01-soins_spa', '[]', '', '2021-07-23', '10:45:17', 'Abdou Majeed ALIDOU', '::1', 1),
(2861, 'Cons-01-soins_spa', '[]', '', '2021-07-23', '10:47:17', 'Abdou Majeed ALIDOU', '::1', 1),
(2862, 'Cons-01-soins_spa', '[]', '', '2021-07-23', '10:47:24', 'Abdou Majeed ALIDOU', '::1', 1),
(2863, 'Cons-01-soins_spa', '[]', '', '2021-07-23', '10:52:57', 'Abdou Majeed ALIDOU', '::1', 1),
(2864, 'Cons-01-soins_spa', '[]', '', '2021-07-23', '11:05:45', 'Abdou Majeed ALIDOU', '::1', 1),
(2865, 'Cons-01-soins_spa', '[]', '', '2021-07-23', '11:06:56', 'Abdou Majeed ALIDOU', '::1', 1),
(2866, 'Cons-01-soins_spa', '[]', '', '2021-07-23', '11:07:19', 'Abdou Majeed ALIDOU', '::1', 1),
(2867, 'Cons-01-soins_spa', '[]', '', '2021-07-23', '11:08:21', 'Abdou Majeed ALIDOU', '::1', 1),
(2868, 'Cons-01-soins_spa', '[]', '', '2021-07-23', '11:08:40', 'Abdou Majeed ALIDOU', '::1', 1),
(2869, 'Cons-01-soins_spa', '[]', '', '2021-07-23', '11:08:58', 'Abdou Majeed ALIDOU', '::1', 1),
(2870, 'Cons-01-soins_spa', '[]', '', '2021-07-23', '11:09:30', 'Abdou Majeed ALIDOU', '::1', 1),
(2871, 'Cons-01-soins_spa', '[]', '', '2021-07-23', '11:10:27', 'Abdou Majeed ALIDOU', '::1', 1),
(2872, 'Cons-01-soins_spa', '[]', '', '2021-07-23', '11:13:44', 'Abdou Majeed ALIDOU', '::1', 1),
(2873, 'Cons-01-soins_spa', '[]', '', '2021-07-23', '11:14:06', 'Abdou Majeed ALIDOU', '::1', 1),
(2874, 'Cons-01-soins_spa', '[]', '', '2021-07-23', '11:14:45', 'Abdou Majeed ALIDOU', '::1', 1),
(2875, 'Cons-01-soins_spa', '[]', '', '2021-07-23', '11:15:04', 'Abdou Majeed ALIDOU', '::1', 1),
(2876, 'Cons-01-soins_spa', '[]', '', '2021-07-23', '11:15:50', 'Abdou Majeed ALIDOU', '::1', 1),
(2877, 'Cons-01-soins_spa', '[]', '', '2021-07-23', '11:15:53', 'Abdou Majeed ALIDOU', '::1', 1),
(2878, 'Cons-01-soins_spa', '[]', '', '2021-07-23', '11:16:22', 'Abdou Majeed ALIDOU', '::1', 1),
(2879, 'Cons-01-soins_spa', '[]', '', '2021-07-23', '11:16:24', 'Abdou Majeed ALIDOU', '::1', 1),
(2880, 'Cons-01-soins_spa', '[]', '', '2021-07-23', '11:17:19', 'Abdou Majeed ALIDOU', '::1', 1),
(2881, 'Cons-01-soins_spa', '[]', '', '2021-07-23', '11:18:20', 'Abdou Majeed ALIDOU', '::1', 1),
(2882, 'Cons-01-soins_spa', '[]', '', '2021-07-23', '11:18:30', 'Abdou Majeed ALIDOU', '::1', 1),
(2883, 'Cons-01-soins_spa', '[]', '', '2021-07-23', '11:19:55', 'Abdou Majeed ALIDOU', '::1', 1),
(2884, 'Cons-01-soins_spa', '[]', '', '2021-07-23', '11:20:59', 'Abdou Majeed ALIDOU', '::1', 1),
(2885, 'Cons-01-soins_spa', '[]', '', '2021-07-23', '11:21:12', 'Abdou Majeed ALIDOU', '::1', 1),
(2886, 'Cons-01-soins_spa', '[]', '', '2021-07-23', '11:21:22', 'Abdou Majeed ALIDOU', '::1', 1),
(2887, 'Cons-01-soins_spa', '[]', '', '2021-07-23', '11:23:15', 'Abdou Majeed ALIDOU', '::1', 1),
(2888, 'Cons-01-soins_spa', '[]', '', '2021-07-23', '11:23:24', 'Abdou Majeed ALIDOU', '::1', 1),
(2889, 'Cons-01-soins_spa', '[]', '', '2021-07-23', '11:23:59', 'Abdou Majeed ALIDOU', '::1', 1),
(2890, 'Cons-01-soins_spa', '[]', '', '2021-07-23', '11:24:25', 'Abdou Majeed ALIDOU', '::1', 1),
(2891, 'Cons-01-soins_spa', '[]', '', '2021-07-23', '11:25:08', 'Abdou Majeed ALIDOU', '::1', 1),
(2892, 'Cons-01-soins_spa', '[]', '', '2021-07-23', '11:25:43', 'Abdou Majeed ALIDOU', '::1', 1),
(2893, 'Info-01-soins_spa', '{\"id_soins_spa\":\"1\",\"nom_soins_spa\":\"b\"}', '', '2021-07-23', '11:25:47', 'Abdou Majeed ALIDOU', '::1', 1),
(2894, 'Modif-01-soins_spa', '{\"id_soins_spa\":\"4\",\"nom_soins_spa\":\"asq\",\"desc_soins_spa\":\"aaaaa\"}', '', '2021-07-23', '11:25:55', 'Abdou Majeed ALIDOU', '::1', 1),
(2895, 'Enr-01-soins_spa', '{\"id_soins_spa\":\"32\",\"nom_soins_spa\":\"tomyr\"}', '', '2021-07-23', '11:26:17', 'Abdou Majeed ALIDOU', '::1', 1),
(2896, 'Cons-01-soins_spa', '[]', '', '2021-07-23', '11:38:06', 'Abdou Majeed ALIDOU', '::1', 1),
(2897, 'Cons-01-prestation_spa', '[]', '', '2021-07-23', '11:38:08', 'Abdou Majeed ALIDOU', '::1', 1),
(2898, 'Cons-01-prestation_spa', '[]', '', '2021-07-23', '11:58:32', 'Abdou Majeed ALIDOU', '::1', 1),
(2899, 'Cons-01-soins_spa', '[]', '', '2021-07-23', '11:58:53', 'Abdou Majeed ALIDOU', '::1', 1),
(2900, 'Cons-01-prestation_spa', '[]', '', '2021-07-23', '11:58:57', 'Abdou Majeed ALIDOU', '::1', 1),
(2901, 'Cons-01-prestation_spa', '[]', '', '2021-07-23', '14:01:45', 'Abdou Majeed ALIDOU', '::1', 1),
(2902, 'Cons-01-prestation_spa', '[]', '', '2021-07-23', '14:09:06', 'Abdou Majeed ALIDOU', '::1', 1),
(2903, 'Cons-01-prestation_spa', '[]', '', '2021-07-23', '14:09:09', 'Abdou Majeed ALIDOU', '::1', 1),
(2904, 'Cons-01-prestation_spa', '[]', '', '2021-07-23', '14:09:34', 'Abdou Majeed ALIDOU', '::1', 1),
(2905, 'Cons-01-prestation_spa', '[]', '', '2021-07-23', '14:10:29', 'Abdou Majeed ALIDOU', '::1', 1),
(2906, 'Cons-01-prestation_spa', '[]', '', '2021-07-23', '14:11:33', 'Abdou Majeed ALIDOU', '::1', 1),
(2907, 'Cons-01-prestation_spa', '[]', '', '2021-07-23', '14:11:46', 'Abdou Majeed ALIDOU', '::1', 1),
(2908, 'Cons-01-prestation_spa', '[]', '', '2021-07-23', '14:11:52', 'Abdou Majeed ALIDOU', '::1', 1),
(2909, 'Cons-01-prestation_spa', '[]', '', '2021-07-23', '14:12:26', 'Abdou Majeed ALIDOU', '::1', 1),
(2910, 'Cons-01-prestation_spa', '[]', '', '2021-07-23', '14:14:51', 'Abdou Majeed ALIDOU', '::1', 1),
(2911, 'Cons-01-prestation_spa', '[]', '', '2021-07-23', '14:15:51', 'Abdou Majeed ALIDOU', '::1', 1),
(2912, 'Cons-01-prestation_spa', '[]', '', '2021-07-23', '14:16:29', 'Abdou Majeed ALIDOU', '::1', 1),
(2913, 'Cons-01-prestation_spa', '[]', '', '2021-07-23', '14:24:26', 'Abdou Majeed ALIDOU', '::1', 1),
(2914, 'Cons-01-prestation_spa', '[]', '', '2021-07-23', '14:26:33', 'Abdou Majeed ALIDOU', '::1', 1),
(2915, 'Cons-01-prestation_spa', '[]', '', '2021-07-23', '14:27:29', 'Abdou Majeed ALIDOU', '::1', 1),
(2916, 'Cons-01-prestation_spa', '[]', '', '2021-07-23', '14:28:51', 'Abdou Majeed ALIDOU', '::1', 1),
(2917, 'Cons-01-location-conf', '', '', '2021-07-23', '14:30:29', 'Abdou Majeed ALIDOU', '::1', 0),
(2918, 'Cons-01-prestation_spa', '[]', '', '2021-07-23', '14:32:31', 'Abdou Majeed ALIDOU', '::1', 1),
(2919, 'Cons-01-prestation_spa', '[]', '', '2021-07-23', '14:35:11', 'Abdou Majeed ALIDOU', '::1', 1),
(2920, 'Info-01-prestation_spa', '{\"id_prestation_spa\":null,\"client\":\" \"}', '', '2021-07-23', '15:06:11', 'Abdou Majeed ALIDOU', '::1', 1),
(2921, 'Info-01-prestation_spa', '{\"id_prestation_spa\":\"1\",\"client\":\"Johnson SATIL\"}', '', '2021-07-23', '15:08:41', 'Abdou Majeed ALIDOU', '::1', 1),
(2922, 'Info-01-prestation_spa', '{\"id_prestation_spa\":\"1\",\"client\":\"Johnson SATIL\"}', '', '2021-07-23', '15:09:09', 'Abdou Majeed ALIDOU', '::1', 1),
(2923, 'Cons-01-prestation_spa', '[]', '', '2021-07-23', '15:09:19', 'Abdou Majeed ALIDOU', '::1', 1),
(2924, 'Info-01-prestation_spa', '{\"id_prestation_spa\":\"1\",\"client\":\"Johnson SATIL\"}', '', '2021-07-23', '15:09:25', 'Abdou Majeed ALIDOU', '::1', 1),
(2925, 'Cons-01-prestation_spa', '[]', '', '2021-07-23', '15:16:39', 'Abdou Majeed ALIDOU', '::1', 1),
(2926, 'Cons-01-prestation_spa', '[]', '', '2021-07-23', '15:28:10', 'Abdou Majeed ALIDOU', '::1', 1),
(2927, 'Cons-01-prestation_spa', '[]', '', '2021-07-23', '15:30:28', 'Abdou Majeed ALIDOU', '::1', 1),
(2928, 'Cons-01-prestation_spa', '[]', '', '2021-07-23', '15:36:58', 'Abdou Majeed ALIDOU', '::1', 1),
(2929, 'Cons-01-prestation_spa', '[]', '', '2021-07-23', '15:38:32', 'Abdou Majeed ALIDOU', '::1', 1),
(2930, 'Cons-01-prestation_spa', '[]', '', '2021-07-23', '15:41:14', 'Abdou Majeed ALIDOU', '::1', 1),
(2931, 'Cons-01-prestation_spa', '[]', '', '2021-07-23', '15:44:22', 'Abdou Majeed ALIDOU', '::1', 1),
(2932, 'Cons-01-prestation_spa', '[]', '', '2021-07-23', '15:44:41', 'Abdou Majeed ALIDOU', '::1', 1),
(2933, 'Cons-01-prestation_spa', '[]', '', '2021-07-23', '15:45:08', 'Abdou Majeed ALIDOU', '::1', 1),
(2934, 'Cons-01-prestation_spa', '[]', '', '2021-07-23', '15:46:02', 'Abdou Majeed ALIDOU', '::1', 1),
(2935, 'Cons-01-prestation_spa', '[]', '', '2021-07-23', '15:47:27', 'Abdou Majeed ALIDOU', '::1', 1),
(2936, 'Cons-01-prestation_spa', '[]', '', '2021-07-23', '15:47:54', 'Abdou Majeed ALIDOU', '::1', 1),
(2937, 'Cons-01-prestation_spa', '[]', '', '2021-07-23', '15:48:08', 'Abdou Majeed ALIDOU', '::1', 1),
(2938, 'Cons-01-prestation_spa', '[]', '', '2021-07-23', '15:48:17', 'Abdou Majeed ALIDOU', '::1', 1),
(2939, 'Cons-01-prestation_spa', '[]', '', '2021-07-23', '15:48:58', 'Abdou Majeed ALIDOU', '::1', 1),
(2940, 'Cons-01-prestation_spa', '[]', '', '2021-07-23', '15:49:29', 'Abdou Majeed ALIDOU', '::1', 1),
(2941, 'Cons-01-prestation_spa', '[]', '', '2021-07-23', '15:53:39', 'Abdou Majeed ALIDOU', '::1', 1),
(2942, 'Cons-01-prestation_spa', '[]', '', '2021-07-23', '15:55:06', 'Abdou Majeed ALIDOU', '::1', 1),
(2943, 'Cons-01-prestation_spa', '[]', '', '2021-07-23', '15:58:21', 'Abdou Majeed ALIDOU', '::1', 1),
(2944, 'Cons-01-prestation_spa', '[]', '', '2021-07-23', '16:05:58', 'Abdou Majeed ALIDOU', '::1', 1),
(2945, 'Cons-01-prestation_spa', '[]', '', '2021-07-23', '16:06:35', 'Abdou Majeed ALIDOU', '::1', 1),
(2946, 'Cons-01-prestation_spa', '[]', '', '2021-07-23', '16:17:41', 'Abdou Majeed ALIDOU', '::1', 1),
(2947, 'Cons-01-prestation_spa', '[]', '', '2021-07-23', '16:18:26', 'Abdou Majeed ALIDOU', '::1', 1),
(2948, 'Cons-01-prestation_spa', '[]', '', '2021-07-24', '19:47:50', 'Abdou Majeed ALIDOU', '::1', 1),
(2949, 'Info-01-prestation_spa', '{\"id_prestation_spa\":\"1\",\"client\":\"Johnson SATIL\"}', '', '2021-07-24', '20:49:16', 'Abdou Majeed ALIDOU', '::1', 1),
(2950, 'Enr-01-prestation_spa', '{\"id_prestation_spa\":\"2\"}', '', '2021-07-24', '21:00:10', 'Abdou Majeed ALIDOU', '::1', 1),
(2951, 'Info-01-prestation_spa', '{\"id_prestation_spa\":\"2\",\"client\":\"NOH Joachim\"}', '', '2021-07-24', '21:00:32', 'Abdou Majeed ALIDOU', '::1', 1),
(2952, 'Info-01-prestation_spa', '{\"id_prestation_spa\":\"2\",\"client\":\"NOH Joachim\"}', '', '2021-07-24', '21:00:37', 'Abdou Majeed ALIDOU', '::1', 1),
(2953, 'Cons-01-prestation_spa', '[]', '', '2021-07-24', '21:22:48', 'Abdou Majeed ALIDOU', '::1', 1),
(2954, 'Cons-01-prestation_spa', '[]', '', '2021-07-24', '21:23:09', 'Abdou Majeed ALIDOU', '::1', 1),
(2955, 'Cons-01-prestation_spa', '[]', '', '2021-07-24', '21:30:12', 'Abdou Majeed ALIDOU', '::1', 1),
(2956, 'Cons-01-prestation_spa', '[]', '', '2021-07-24', '21:40:59', 'Abdou Majeed ALIDOU', '::1', 1),
(2957, 'Cons-01-prestation_spa', '[]', '', '2021-07-24', '21:41:26', 'Abdou Majeed ALIDOU', '::1', 1),
(2958, 'Cons-01-prestation_spa', '[]', '', '2021-07-24', '21:41:46', 'Abdou Majeed ALIDOU', '::1', 1),
(2959, 'Cons-01-prestation_spa', '[]', '', '2021-07-24', '21:42:09', 'Abdou Majeed ALIDOU', '::1', 1),
(2960, 'Cons-01-prestation_spa', '[]', '', '2021-07-24', '21:42:36', 'Abdou Majeed ALIDOU', '::1', 1),
(2961, 'Cons-01-prestation_spa', '[]', '', '2021-07-24', '21:45:34', 'Abdou Majeed ALIDOU', '::1', 1),
(2962, 'Cons-01-prestation_spa', '[]', '', '2021-07-24', '21:46:17', 'Abdou Majeed ALIDOU', '::1', 1),
(2963, 'Cons-01-prestation_spa', '[]', '', '2021-07-24', '21:47:12', 'Abdou Majeed ALIDOU', '::1', 1),
(2964, 'Cons-01-prestation_spa', '[]', '', '2021-07-24', '21:48:12', 'Abdou Majeed ALIDOU', '::1', 1),
(2965, 'Cons-01-location-conf', '', '', '2021-07-24', '21:48:51', 'Abdou Majeed ALIDOU', '::1', 0),
(2966, 'Cons-01-prestation_spa', '[]', '', '2021-07-24', '21:49:16', 'Abdou Majeed ALIDOU', '::1', 1),
(2967, 'Enr-01-prestation_spa', '{\"id_prestation_spa\":\"4\"}', '', '2021-07-24', '21:50:44', 'Abdou Majeed ALIDOU', '::1', 1),
(2968, 'Cons-01-prestation_spa', '[]', '', '2021-07-24', '22:16:08', 'Abdou Majeed ALIDOU', '::1', 1),
(2969, 'Enr-01-prestation_spa', '{\"id_prestation_spa\":\"5\"}', '', '2021-07-24', '22:16:30', 'Abdou Majeed ALIDOU', '::1', 1),
(2970, 'Cons-01-prestation_spa', '[]', '', '2021-07-24', '22:21:36', 'Abdou Majeed ALIDOU', '::1', 1),
(2971, 'Cons-01-prestation_spa', '[]', '', '2021-07-24', '22:23:43', 'Abdou Majeed ALIDOU', '::1', 1),
(2972, 'Enr-01-prestation_spa', '{\"id_prestation_spa\":\"6\"}', '', '2021-07-24', '22:25:34', 'Abdou Majeed ALIDOU', '::1', 1),
(2973, 'Cons-01-prestation_spa', '[]', '', '2021-07-24', '22:36:20', 'Abdou Majeed ALIDOU', '::1', 1),
(2974, 'Cons-01-prestation_spa', '[]', '', '2021-07-24', '22:37:48', 'Abdou Majeed ALIDOU', '::1', 1),
(2975, 'Cons-01-prestation_spa', '[]', '', '2021-07-24', '22:39:26', 'Abdou Majeed ALIDOU', '::1', 1),
(2976, 'Cons-01-prestation_spa', '[]', '', '2021-07-24', '22:39:43', 'Abdou Majeed ALIDOU', '::1', 1),
(2977, 'Cons-01-prestation_spa', '[]', '', '2021-07-24', '22:42:55', 'Abdou Majeed ALIDOU', '::1', 1),
(2978, 'Cons-01-prestation_spa', '[]', '', '2021-07-24', '22:43:29', 'Abdou Majeed ALIDOU', '::1', 1),
(2979, 'Info-01-prestation_spa', '{\"id_prestation_spa\":\"6\",\"client\":\"qqqq qqqqq\"}', '', '2021-07-24', '22:48:32', 'Abdou Majeed ALIDOU', '::1', 1),
(2980, 'Cons-01-prestation_spa', '[]', '', '2021-07-24', '22:52:55', 'Abdou Majeed ALIDOU', '::1', 1),
(2981, 'Cons-01-soins_spa', '[]', '', '2021-07-24', '22:53:01', 'Abdou Majeed ALIDOU', '::1', 1),
(2982, 'Modif-01-soins_spa', '{\"id_soins_spa\":\"1\"}', '', '2021-07-24', '22:53:13', 'Abdou Majeed ALIDOU', '::1', 1),
(2983, 'Cons-01-prestation_spa', '[]', '', '2021-07-24', '22:53:17', 'Abdou Majeed ALIDOU', '::1', 1),
(2984, 'Cons-01-prestation_spa', '[]', '', '2021-07-24', '22:56:46', 'Abdou Majeed ALIDOU', '::1', 1),
(2985, 'Modif-01-prestation_spa', '{\"id_prestation_spa\":\"6\"}', '', '2021-07-24', '22:57:00', 'Abdou Majeed ALIDOU', '::1', 1),
(2986, 'Modif-01-prestation_spa', '{\"id_prestation_spa\":\"6\"}', '', '2021-07-24', '22:57:25', 'Abdou Majeed ALIDOU', '::1', 1),
(2987, 'Modif-01-prestation_spa', '{\"id_prestation_spa\":\"6\"}', '', '2021-07-24', '22:57:44', 'Abdou Majeed ALIDOU', '::1', 1),
(2988, 'Cons-01-prestation_spa', '[]', '', '2021-07-24', '22:59:10', 'Abdou Majeed ALIDOU', '::1', 1),
(2989, 'Info-01-prestation_spa', '{\"id_prestation_spa\":\"6\",\"client\":\"qqqqqqqqqqqqq aaaaaaaaaaaaaaa\"}', '', '2021-07-24', '23:08:17', 'Abdou Majeed ALIDOU', '::1', 1),
(2990, 'Info-01-prestation_spa', '{\"id_prestation_spa\":\"6\",\"client\":\"qqqqqqqqqqqqq aaaaaaaaaaaaaaa\"}', '', '2021-07-24', '23:09:32', 'Abdou Majeed ALIDOU', '::1', 1),
(2991, 'Info-01-prestation_spa', '{\"id_prestation_spa\":\"6\",\"client\":\"qqqqqqqqqqqqq aaaaaaaaaaaaaaa\"}', '', '2021-07-24', '23:12:10', 'Abdou Majeed ALIDOU', '::1', 1),
(2992, 'Cons-01-prestation_spa', '[]', '', '2021-07-24', '23:20:35', 'Abdou Majeed ALIDOU', '::1', 1),
(2993, 'Info-01-prestation_spa', '{\"id_prestation_spa\":\"6\",\"client\":\"qqqqqqqqqqqqq aaaaaaaaaaaaaaa\"}', '', '2021-07-24', '23:20:49', 'Abdou Majeed ALIDOU', '::1', 1),
(2994, 'Info-01-prestation_spa', '{\"id_prestation_spa\":\"6\",\"client\":\"qqqqqqqqqqqqq aaaaaaaaaaaaaaa\"}', '', '2021-07-24', '23:34:00', 'Abdou Majeed ALIDOU', '::1', 1),
(2995, 'Info-01-prestation_spa', '{\"id_prestation_spa\":\"5\",\"client\":\"Abdou Majeed ALIDOU\"}', '', '2021-07-24', '23:34:08', 'Abdou Majeed ALIDOU', '::1', 1),
(2996, 'Cons-01-location-conf', '', '', '2021-07-24', '23:46:10', 'Abdou Majeed ALIDOU', '::1', 0),
(2997, 'Cons-01-location-conf', '', '', '2021-07-24', '23:50:14', 'Abdou Majeed ALIDOU', '::1', 0),
(2998, 'Cons-01-prestation_spa', '[]', '', '2021-07-24', '23:50:26', 'Abdou Majeed ALIDOU', '::1', 1),
(2999, 'Cons-01-prestation_spa', '[]', '', '2021-07-24', '23:54:42', 'Abdou Majeed ALIDOU', '::1', 1),
(3000, 'Cons-01-prestation_spa', '[]', '', '2021-07-24', '23:55:52', 'Abdou Majeed ALIDOU', '::1', 1),
(3001, 'Cons-01-prestation_spa', '[]', '', '2021-07-25', '00:09:06', 'Abdou Majeed ALIDOU', '::1', 1),
(3002, 'Cons-01-prestation_spa', '[]', '', '2021-07-25', '00:09:08', 'Abdou Majeed ALIDOU', '::1', 1),
(3003, 'Prix-01-prestation_spa', '{\"id_prestation_spa\":\"\"}', '', '2021-07-25', '00:09:49', 'Abdou Majeed ALIDOU', '::1', 1),
(3004, 'Cons-01-prestation_spa', '[]', '', '2021-07-25', '00:09:55', 'Abdou Majeed ALIDOU', '::1', 1),
(3005, 'Prix-01-prestation_spa', '{\"id_prestation_spa\":\"\"}', '', '2021-07-25', '00:10:09', 'Abdou Majeed ALIDOU', '::1', 1),
(3006, 'Prix-01-prestation_spa', '{\"id_prestation_spa\":\"\"}', '', '2021-07-25', '00:11:31', 'Abdou Majeed ALIDOU', '::1', 1),
(3007, 'Cons-01-prestation_spa', '[]', '', '2021-07-25', '00:11:35', 'Abdou Majeed ALIDOU', '::1', 1),
(3008, 'Prix-01-prestation_spa', '{\"id_prestation_spa\":\"\"}', '', '2021-07-25', '00:11:49', 'Abdou Majeed ALIDOU', '::1', 1),
(3009, 'Cons-01-prestation_spa', '[]', '', '2021-07-25', '00:13:55', 'Abdou Majeed ALIDOU', '::1', 1),
(3010, 'Prix-01-prestation_spa', '{\"id_prestation_spa\":\"\"}', '', '2021-07-25', '00:14:16', 'Abdou Majeed ALIDOU', '::1', 1),
(3011, 'Cons-01-prestation_spa', '[]', '', '2021-07-25', '00:15:25', 'Abdou Majeed ALIDOU', '::1', 1),
(3012, 'Prix-01-prestation_spa', '{\"id_prestation_spa\":\"4\"}', '', '2021-07-25', '00:15:50', 'Abdou Majeed ALIDOU', '::1', 1),
(3013, 'Modif-01-prestation_spa', '{\"id_prestation_spa\":\"4\"}', '', '2021-07-25', '00:16:06', 'Abdou Majeed ALIDOU', '::1', 1),
(3014, 'Connex-01', '', '', '2021-07-25', '11:11:07', 'Abdou Majeed ALIDOU', '::1', 0),
(3015, 'Cons-01-dashboard', '', '', '2021-07-25', '11:11:07', 'Abdou Majeed ALIDOU', '::1', 0),
(3016, 'Cons-01-location-conf', '', '', '2021-07-25', '11:17:31', 'Abdou Majeed ALIDOU', '::1', 0),
(3017, 'Cons-01-location-conf', '', '', '2021-07-25', '11:35:19', 'Abdou Majeed ALIDOU', '::1', 0),
(3018, 'Cons-01-prestation_spa', '[]', '', '2021-07-25', '11:47:35', 'Abdou Majeed ALIDOU', '::1', 1),
(3019, 'Cons-01-prestation_spa', '[]', '', '2021-07-25', '11:50:54', 'Abdou Majeed ALIDOU', '::1', 1),
(3020, 'Cons-01-prestation_spa', '[]', '', '2021-07-25', '13:30:36', 'Abdou Majeed ALIDOU', '::1', 1),
(3021, 'Cons-01-prestation_spa', '[]', '', '2021-07-25', '13:31:25', 'Abdou Majeed ALIDOU', '::1', 1),
(3022, 'Cons-01-prestation_spa', '[]', '', '2021-07-25', '13:32:17', 'Abdou Majeed ALIDOU', '::1', 1),
(3023, 'Cons-01-prestation_spa', '[]', '', '2021-07-25', '13:32:47', 'Abdou Majeed ALIDOU', '::1', 1),
(3024, 'Cons-01-prestation_spa', '[]', '', '2021-07-25', '13:33:01', 'Abdou Majeed ALIDOU', '::1', 1),
(3025, 'Cons-01-prestation_spa', '[]', '', '2021-07-25', '13:33:11', 'Abdou Majeed ALIDOU', '::1', 1),
(3026, 'Cons-01-prestation_spa', '[]', '', '2021-07-25', '13:34:00', 'Abdou Majeed ALIDOU', '::1', 1),
(3027, 'Cons-01-prestation_spa', '[]', '', '2021-07-25', '13:36:15', 'Abdou Majeed ALIDOU', '::1', 1),
(3028, 'Cons-01-prestation_spa', '[]', '', '2021-07-25', '13:36:23', 'Abdou Majeed ALIDOU', '::1', 1),
(3029, 'Cons-01-prestation_spa', '[]', '', '2021-07-25', '13:38:30', 'Abdou Majeed ALIDOU', '::1', 1),
(3030, 'Cons-01-prestation_spa', '[]', '', '2021-07-25', '13:39:20', 'Abdou Majeed ALIDOU', '::1', 1),
(3031, 'Cons-01-prestation_spa', '[]', '', '2021-07-25', '13:39:59', 'Abdou Majeed ALIDOU', '::1', 1),
(3032, 'Cons-01-prestation_spa', '[]', '', '2021-07-25', '13:40:30', 'Abdou Majeed ALIDOU', '::1', 1),
(3033, 'Cons-01-prestation_spa', '[]', '', '2021-07-25', '13:40:57', 'Abdou Majeed ALIDOU', '::1', 1),
(3034, 'Cons-01-prestation_spa', '[]', '', '2021-07-25', '13:41:48', 'Abdou Majeed ALIDOU', '::1', 1),
(3035, 'Cons-01-prestation_spa', '[]', '', '2021-07-25', '13:41:59', 'Abdou Majeed ALIDOU', '::1', 1),
(3036, 'Cons-01-prestation_spa', '[]', '', '2021-07-25', '13:42:36', 'Abdou Majeed ALIDOU', '::1', 1),
(3037, 'Cons-01-prestation_spa', '[]', '', '2021-07-25', '13:43:06', 'Abdou Majeed ALIDOU', '::1', 1),
(3038, 'Cons-01-prestation_spa', '[]', '', '2021-07-25', '13:43:30', 'Abdou Majeed ALIDOU', '::1', 1),
(3039, 'Cons-01-prestation_spa', '[]', '', '2021-07-25', '13:43:50', 'Abdou Majeed ALIDOU', '::1', 1),
(3040, 'Cons-01-prestation_spa', '[]', '', '2021-07-25', '13:44:57', 'Abdou Majeed ALIDOU', '::1', 1),
(3041, 'Cons-01-prestation_spa', '[]', '', '2021-07-25', '13:45:13', 'Abdou Majeed ALIDOU', '::1', 1),
(3042, 'Cons-01-prestation_spa', '[]', '', '2021-07-25', '13:45:35', 'Abdou Majeed ALIDOU', '::1', 1),
(3043, 'Cons-01-prestation_spa', '[]', '', '2021-07-25', '13:47:52', 'Abdou Majeed ALIDOU', '::1', 1),
(3044, 'Cons-01-prestation_spa', '[]', '', '2021-07-25', '13:50:03', 'Abdou Majeed ALIDOU', '::1', 1),
(3045, 'Cons-01-prestation_spa', '[]', '', '2021-07-25', '13:50:49', 'Abdou Majeed ALIDOU', '::1', 1),
(3046, 'Cons-01-prestation_spa', '[]', '', '2021-07-25', '13:52:33', 'Abdou Majeed ALIDOU', '::1', 1),
(3047, 'Cons-01-prestation_spa', '[]', '', '2021-07-25', '13:53:55', 'Abdou Majeed ALIDOU', '::1', 1),
(3048, 'Cons-01-prestation_spa', '[]', '', '2021-07-25', '13:55:36', 'Abdou Majeed ALIDOU', '::1', 1),
(3049, 'Connex-01', '', '', '2021-07-26', '07:28:55', 'Abdou Majeed ALIDOU', '::1', 0),
(3050, 'Cons-01-dashboard', '', '', '2021-07-26', '07:28:55', 'Abdou Majeed ALIDOU', '::1', 0),
(3051, 'Cons-01-salle-conf', '', '', '2021-07-26', '07:28:59', 'Abdou Majeed ALIDOU', '::1', 0),
(3052, 'Cons-01-prestation_spa', '[]', '', '2021-07-26', '07:50:19', 'Abdou Majeed ALIDOU', '::1', 1),
(3053, 'Deconnex-01', '', '', '2021-07-26', '09:33:16', 'Abdou Majeed ALIDOU', '::1', 0),
(3054, 'Connex-01', '', '', '2021-07-26', '09:43:36', 'Abdou Majeed ALIDOU', '::1', 0),
(3055, 'Cons-01-dashboard', '', '', '2021-07-26', '09:43:36', 'Abdou Majeed ALIDOU', '::1', 0),
(3056, 'Cons-01-log', '', '', '2021-07-26', '09:43:38', 'Abdou Majeed ALIDOU', '::1', 0),
(3057, 'Cons-01-type-chambre', '', '', '2021-07-26', '09:46:15', 'Abdou Majeed ALIDOU', '::1', 0),
(3058, 'Cons-01-type-chambre', '', '', '2021-07-26', '09:47:09', 'Abdou Majeed ALIDOU', '::1', 0),
(3059, 'Cons-01-type-chambre', '', '', '2021-07-26', '09:48:59', 'Abdou Majeed ALIDOU', '::1', 0),
(3060, 'Info-01-type-chambre', 'type', '', '2021-07-26', '09:55:13', 'Abdou Majeed ALIDOU', '::1', 0),
(3061, 'Info-01-type-chambre', 'type', '', '2021-07-26', '09:56:15', 'Abdou Majeed ALIDOU', '::1', 0),
(3062, 'Cons-01-chambre', '', '', '2021-07-26', '09:58:49', 'Abdou Majeed ALIDOU', '::1', 0);

-- --------------------------------------------------------

--
-- Structure de la table `article_restau`
--

CREATE TABLE `article_restau` (
  `id_article_restau` int(11) NOT NULL,
  `nom_article_restau` text NOT NULL,
  `desc_article_restau` text NOT NULL,
  `date_create_article_restau` datetime NOT NULL,
  `user_create_article_restau` text NOT NULL,
  `date_last_modif_article_restau` datetime NOT NULL,
  `user_last_modif_article_restau` text NOT NULL,
  `date_del_article_restau` datetime NOT NULL,
  `user_del_article_restau` text NOT NULL,
  `statut_article_restau` enum('Actif','Inactif') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `article_restau`
--

INSERT INTO `article_restau` (`id_article_restau`, `nom_article_restau`, `desc_article_restau`, `date_create_article_restau`, `user_create_article_restau`, `date_last_modif_article_restau`, `user_last_modif_article_restau`, `date_del_article_restau`, `user_del_article_restau`, `statut_article_restau`) VALUES
(1, 'fishes', 'saumon', '2021-06-04 12:03:00', 'Abdou Majeed ALIDOU', '2021-06-04 12:03:37', 'Abdou Majeed ALIDOU', '2021-06-04 12:03:45', 'Abdou Majeed ALIDOU', 'Inactif');

-- --------------------------------------------------------

--
-- Structure de la table `assoc_bar_produit_and_bar_cmde`
--

CREATE TABLE `assoc_bar_produit_and_bar_cmde` (
  `id_bar_produit_fk_assoc_bar_produit_and_bar_cmde` int(11) NOT NULL,
  `id_bar_cmde_fk_assoc_bar_produit_and_bar_cmde` int(11) NOT NULL,
  `qte_cmde_assoc_bar_produit_and_bar_cmde` int(11) NOT NULL,
  `prix_total_assoc_bar_produit_and_bar_cmde` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `assoc_client_and_chambre`
--

CREATE TABLE `assoc_client_and_chambre` (
  `id_client_fk_assoc_client_and_chambre` int(11) NOT NULL,
  `id_chambre_fk_assoc_client_and_chambre` int(11) NOT NULL,
  `desc_sejour_assoc_client_and_chambre` text NOT NULL,
  `duree_sejour_assoc_client_and_chambre` text NOT NULL,
  `montant_sejour_assoc_client_and_chambre` double NOT NULL,
  `avance_sejour_assoc_client_and_chambre` double NOT NULL,
  `date_entree_assoc_client_and_chambre` datetime NOT NULL,
  `date_sortie_assoc_client_and_chambre` datetime NOT NULL,
  `reservation_assoc_client_and_chambre` enum('Oui','Non') NOT NULL,
  `date_create_assoc_client_and_chambre` int(11) NOT NULL,
  `date_last_assoc_client_and_chambre` int(11) NOT NULL,
  `date_del_assoc_client_and_chambre` int(11) NOT NULL,
  `etat_reservation_assoc_client_and_chambre` enum('Effectué','Annulé') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `assoc_client_and_chambre_occupee`
--

CREATE TABLE `assoc_client_and_chambre_occupee` (
  `id_assoc_client_and_chambre_occupee` int(11) NOT NULL,
  `id_client_fk_assoc_client_and_chambre_occupee` int(11) NOT NULL,
  `id_chambre_occupee_fk_assoc_client_and_chambre_occupee` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `assoc_compte_and_menu`
--

CREATE TABLE `assoc_compte_and_menu` (
  `id_compte_fk_assoc_compte_and_menu` int(11) NOT NULL,
  `id_menu_fk_assoc_compte_and_menu` int(11) NOT NULL,
  `statut_assoc_compte_and_menu` enum('Inactif','Actif') NOT NULL,
  `date_create_assoc_compte_and_menu` datetime NOT NULL,
  `user_create_assoc_compte_and_menu` text NOT NULL,
  `date_last_modif_assoc_compte_and_menu` datetime NOT NULL,
  `user_last_modif_assoc_compte_and_menu` text NOT NULL,
  `date_del_assoc_compte_and_menu` datetime NOT NULL,
  `user_del_assoc_compte_and_menu` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `assoc_compte_and_menu`
--

INSERT INTO `assoc_compte_and_menu` (`id_compte_fk_assoc_compte_and_menu`, `id_menu_fk_assoc_compte_and_menu`, `statut_assoc_compte_and_menu`, `date_create_assoc_compte_and_menu`, `user_create_assoc_compte_and_menu`, `date_last_modif_assoc_compte_and_menu`, `user_last_modif_assoc_compte_and_menu`, `date_del_assoc_compte_and_menu`, `user_del_assoc_compte_and_menu`) VALUES
(1, 1, 'Actif', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1, 2, 'Actif', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1, 3, 'Actif', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1, 4, 'Actif', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1, 5, 'Actif', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1, 6, 'Actif', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1, 7, 'Actif', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1, 8, 'Actif', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1, 9, 'Actif', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1, 10, 'Actif', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1, 11, 'Actif', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1, 12, 'Actif', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1, 13, 'Actif', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1, 14, 'Actif', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1, 15, 'Actif', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1, 16, 'Actif', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1, 17, 'Actif', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1, 18, 'Actif', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1, 19, 'Actif', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1, 20, 'Actif', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1, 21, 'Actif', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1, 22, 'Actif', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1, 23, 'Actif', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1, 24, 'Actif', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1, 25, 'Actif', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(1, 26, 'Actif', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(2, 1, 'Actif', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(2, 2, 'Actif', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(2, 3, 'Actif', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(2, 4, 'Actif', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(2, 5, 'Actif', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(2, 6, 'Actif', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(2, 7, 'Actif', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(2, 8, 'Actif', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(2, 9, 'Actif', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(2, 10, 'Actif', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(2, 11, 'Actif', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(2, 12, 'Actif', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(2, 13, 'Actif', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(2, 14, 'Actif', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(2, 15, 'Actif', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(2, 16, 'Actif', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(2, 17, 'Actif', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(2, 18, 'Actif', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(2, 19, 'Actif', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(2, 22, 'Actif', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(2, 23, 'Actif', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(2, 24, 'Actif', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(2, 25, 'Actif', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(2, 26, 'Actif', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Structure de la table `assoc_location_conf_and_service_conf`
--

CREATE TABLE `assoc_location_conf_and_service_conf` (
  `id_location_conf_fk_assoc_location_conf_and_service_conf` int(11) NOT NULL,
  `id_service_conf_fk_assoc_location_conf_and_service_conf` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `assoc_location_conf_and_service_conf`
--

INSERT INTO `assoc_location_conf_and_service_conf` (`id_location_conf_fk_assoc_location_conf_and_service_conf`, `id_service_conf_fk_assoc_location_conf_and_service_conf`) VALUES
(27, 11),
(30, 11),
(31, 10),
(31, 11),
(32, 9),
(34, 9),
(34, 10),
(34, 11);

-- --------------------------------------------------------

--
-- Structure de la table `assoc_salle_conf_and_carac_conf`
--

CREATE TABLE `assoc_salle_conf_and_carac_conf` (
  `id_salle_conf_fk_assoc_salle_conf_and_carac_conf` int(11) NOT NULL,
  `id_carac_conf_fk_assoc_salle_conf_and_carac_conf` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `assoc_salle_conf_and_carac_conf`
--

INSERT INTO `assoc_salle_conf_and_carac_conf` (`id_salle_conf_fk_assoc_salle_conf_and_carac_conf`, `id_carac_conf_fk_assoc_salle_conf_and_carac_conf`) VALUES
(18, 13),
(18, 14),
(19, 12),
(19, 13),
(19, 14),
(20, 12),
(20, 15),
(20, 17),
(21, 12),
(21, 17),
(22, 17);

-- --------------------------------------------------------

--
-- Structure de la table `assoc_type_chambre_and_carac_chambre`
--

CREATE TABLE `assoc_type_chambre_and_carac_chambre` (
  `id_type_chambre_fk_assoc_type_chambre_and_carac_chambre` int(11) NOT NULL,
  `id_carac_chambre_fk_assoc_type_chambre_and_carac_chambre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `bar_cmde`
--

CREATE TABLE `bar_cmde` (
  `id_bar_cmde` int(11) NOT NULL,
  `num_bar_cmde` text NOT NULL,
  `desc_bar_cmde` text NOT NULL,
  `date_cmde_bar_cmde` datetime NOT NULL,
  `montant_total_bar_cmde` double NOT NULL,
  `date_create_bar_cmde` datetime NOT NULL,
  `date_last_modif_bar_cmde` datetime NOT NULL,
  `date_del_bar_cmde` datetime NOT NULL,
  `etat_cmde_bar_cmde` enum('En cours','Livré','Annulé') NOT NULL,
  `statut_bar_cmde` enum('Actif','Inactif') NOT NULL,
  `id_client_fk_bar_cmde` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `bar_produit`
--

CREATE TABLE `bar_produit` (
  `id_bar_produit` int(11) NOT NULL,
  `codebarre_bar_produit` text NOT NULL,
  `lib_bar_produit` text NOT NULL,
  `pu_bar_produit` double NOT NULL,
  `date_create_bar_produit` datetime NOT NULL,
  `date_last_modif_bar_produit` datetime NOT NULL,
  `date_del_bar_produit` datetime NOT NULL,
  `statut_bar_produit` enum('Actif','Inactif') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `boisson`
--

CREATE TABLE `boisson` (
  `id_boisson` int(11) NOT NULL,
  `lib_boisson` text NOT NULL,
  `desc_boisson` text NOT NULL,
  `prix_unite_boisson` double NOT NULL,
  `date_create_boisson` datetime NOT NULL,
  `date_last_modif_boisson` datetime NOT NULL,
  `date_del_boisson` datetime NOT NULL,
  `user_create_boisson` text NOT NULL,
  `user_last_modif_boisson` text NOT NULL,
  `user_del_boisson` text NOT NULL,
  `statut_boisson` enum('Actif','Inactif') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `boisson`
--

INSERT INTO `boisson` (`id_boisson`, `lib_boisson`, `desc_boisson`, `prix_unite_boisson`, `date_create_boisson`, `date_last_modif_boisson`, `date_del_boisson`, `user_create_boisson`, `user_last_modif_boisson`, `user_del_boisson`, `statut_boisson`) VALUES
(1, 'fanta', 'lkjhhgf', 1000, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2021-06-03 17:54:42', '', '', 'Abdou Majeed ALIDOU', 'Actif'),
(2, 'ojhghfgdhjkkfx', 'knhjhgftgyhuijok', 0, '2021-06-03 17:20:32', '2021-06-04 12:52:06', '0000-00-00 00:00:00', 'Abdou Majeed ALIDOU', 'Abdou Majeed ALIDOU', '', 'Actif'),
(3, 'eee', '', 0, '2021-06-03 17:54:50', '2021-06-04 12:57:50', '0000-00-00 00:00:00', 'Abdou Majeed ALIDOU', 'Abdou Majeed ALIDOU', '', 'Actif'),
(4, 'wpop', '', 100, '2021-06-04 11:42:26', '2021-06-04 13:14:17', '0000-00-00 00:00:00', 'Abdou Majeed ALIDOU', 'Abdou Majeed ALIDOU', '', 'Actif'),
(5, 'peps', 'cola', 250, '2021-06-04 11:42:47', '2021-06-04 13:05:40', '2021-06-04 11:42:56', 'Abdou Majeed ALIDOU', 'Abdou Majeed ALIDOU', 'Abdou Majeed ALIDOU', 'Inactif'),
(6, 'no', '', 0, '2021-06-04 12:53:22', '2021-06-04 13:13:25', '2021-06-07 11:58:10', 'Abdou Majeed ALIDOU', 'Abdou Majeed ALIDOU', 'Abdou Majeed ALIDOU', 'Actif'),
(7, 'the', 'c', 0, '2021-06-07 11:57:44', '2021-06-07 11:58:00', '2021-06-07 11:58:14', 'Abdou Majeed ALIDOU', 'Abdou Majeed ALIDOU', 'Abdou Majeed ALIDOU', 'Inactif');

-- --------------------------------------------------------

--
-- Structure de la table `carac_chambre`
--

CREATE TABLE `carac_chambre` (
  `id_carac_chambre` int(11) NOT NULL,
  `nom_carac_chambre` text NOT NULL,
  `desc_carac_chambre` text NOT NULL,
  `date_create_carac_chambre` datetime NOT NULL,
  `user_create_carac_chambre` text NOT NULL,
  `date_last_modif_carac_chambre` datetime NOT NULL,
  `user_last_modif_carac_chambre` text NOT NULL,
  `date_del_carac_chambre` datetime NOT NULL,
  `user_del_carac_chambre` text NOT NULL,
  `statut_carac_chambre` enum('Actif','Inactif') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `carac_chambre`
--

INSERT INTO `carac_chambre` (`id_carac_chambre`, `nom_carac_chambre`, `desc_carac_chambre`, `date_create_carac_chambre`, `user_create_carac_chambre`, `date_last_modif_carac_chambre`, `user_last_modif_carac_chambre`, `date_del_carac_chambre`, `user_del_carac_chambre`, `statut_carac_chambre`) VALUES
(1, 'climatiseur', 'VIP', '2021-05-18 09:45:02', '', '2021-05-18 09:46:03', '', '0000-00-00 00:00:00', '', 'Actif'),
(2, '2-lits', '', '2021-05-18 09:45:18', '', '2021-05-31 17:18:28', '', '2021-06-01 16:41:31', 'John DOE', 'Inactif'),
(3, 'baignoire', 'jaune avec point noir', '2021-05-18 11:30:57', '', '2021-05-18 11:31:18', '', '0000-00-00 00:00:00', '', 'Actif'),
(4, 'to', '', '2021-05-30 03:33:58', '', '2021-05-30 03:52:46', '', '2021-06-01 15:55:19', 'John DOE', 'Actif'),
(5, 'eee', '', '2021-05-31 17:19:37', '', '2021-06-01 12:48:48', 'Abdou Majeed ALIDOU', '0000-00-00 00:00:00', '', 'Actif'),
(6, 'la bellas', '', '2021-06-01 12:49:22', 'Abdou Majeed ALIDOU', '2021-06-01 15:55:27', 'John DOE', '2021-06-01 17:03:57', 'Abdou Majeed ALIDOU', 'Inactif'),
(7, 'tac tac saute', 'tic', '2021-06-01 15:55:40', 'John DOE', '2021-06-01 17:05:18', 'Abdou Majeed ALIDOU', '2021-06-01 17:05:11', 'Abdou Majeed ALIDOU', 'Inactif'),
(8, 'mimi s', '', '2021-06-01 16:40:40', 'John DOE', '2021-06-01 16:40:40', 'John DOE', '0000-00-00 00:00:00', '', 'Actif');

-- --------------------------------------------------------

--
-- Structure de la table `carac_conf`
--

CREATE TABLE `carac_conf` (
  `id_carac_conf` int(11) NOT NULL,
  `nom_carac_conf` text NOT NULL,
  `desc_carac_conf` text NOT NULL,
  `statut_carac_conf` enum('Actif','Inactif') NOT NULL,
  `date_create_carac_conf` datetime NOT NULL,
  `user_create_carac_conf` text NOT NULL,
  `date_last_modif_carac_conf` datetime NOT NULL,
  `user_last_modif_carac_conf` text NOT NULL,
  `date_del_carac_conf` datetime NOT NULL,
  `user_del_carac_conf` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `carac_conf`
--

INSERT INTO `carac_conf` (`id_carac_conf`, `nom_carac_conf`, `desc_carac_conf`, `statut_carac_conf`, `date_create_carac_conf`, `user_create_carac_conf`, `date_last_modif_carac_conf`, `user_last_modif_carac_conf`, `date_del_carac_conf`, `user_del_carac_conf`) VALUES
(12, 'Climatisé', '', 'Actif', '2021-07-07 11:25:55', 'Abdou Majeed ALIDOU', '2021-07-07 11:25:55', 'Abdou Majeed ALIDOU', '0000-00-00 00:00:00', ''),
(13, 'Ventilé', '', 'Actif', '2021-07-07 11:26:08', 'Abdou Majeed ALIDOU', '2021-07-07 11:26:08', 'Abdou Majeed ALIDOU', '0000-00-00 00:00:00', ''),
(14, 'Table ronde', 'Une large table ronde.', 'Actif', '2021-07-07 11:27:23', 'Abdou Majeed ALIDOU', '2021-07-07 11:27:23', 'Abdou Majeed ALIDOU', '0000-00-00 00:00:00', ''),
(15, 'Grand écran', '', 'Actif', '2021-07-07 11:28:49', 'Abdou Majeed ALIDOU', '2021-07-07 11:28:49', 'Abdou Majeed ALIDOU', '0000-00-00 00:00:00', ''),
(16, 'Projecteur', 'un projecteur.', 'Inactif', '2021-07-07 11:29:13', 'Abdou Majeed ALIDOU', '2021-07-07 11:30:24', 'Abdou Majeed ALIDOU', '2021-07-07 11:31:07', 'Abdou Majeed ALIDOU'),
(17, 'Podium', '', 'Actif', '2021-07-07 11:48:33', 'Abdou Majeed ALIDOU', '2021-07-07 11:48:33', 'Abdou Majeed ALIDOU', '0000-00-00 00:00:00', ''),
(18, 'projecteur', '', 'Inactif', '2021-07-07 12:17:36', 'Abdou Majeed ALIDOU', '2021-07-07 12:17:36', 'Abdou Majeed ALIDOU', '2021-07-07 12:17:44', 'Abdou Majeed ALIDOU');

-- --------------------------------------------------------

--
-- Structure de la table `chambre`
--

CREATE TABLE `chambre` (
  `id_chambre` int(11) NOT NULL,
  `num_chambre` text NOT NULL,
  `nom_chambre` text NOT NULL,
  `desc_chambre` text NOT NULL,
  `aire_chambre` text NOT NULL,
  `date_create_chambre` datetime NOT NULL,
  `user_create_chambre` text NOT NULL,
  `date_last_modif_chambre` datetime NOT NULL,
  `user_last_modif_chambre` text NOT NULL,
  `date_del_chambre` datetime NOT NULL,
  `user_del_chambre` text NOT NULL,
  `statut_chambre` enum('Actif','Inactif') NOT NULL,
  `id_type_chambre_fk_chambre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `chambre`
--

INSERT INTO `chambre` (`id_chambre`, `num_chambre`, `nom_chambre`, `desc_chambre`, `aire_chambre`, `date_create_chambre`, `user_create_chambre`, `date_last_modif_chambre`, `user_last_modif_chambre`, `date_del_chambre`, `user_del_chambre`, `statut_chambre`, `id_type_chambre_fk_chambre`) VALUES
(2, '', '101', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', 'Actif', 4),
(3, '', '302', 'Good', '205', '2021-05-27 09:53:30', '', '2021-05-27 10:39:56', '', '0000-00-00 00:00:00', '', 'Actif', 5),
(4, '', '306', '', '', '2021-05-27 10:40:37', '', '2021-05-27 10:40:37', '', '0000-00-00 00:00:00', '', 'Actif', 4),
(5, '', '202', '', '300m2', '2021-05-28 15:57:57', '', '2021-05-28 15:57:57', '', '0000-00-00 00:00:00', '', 'Actif', 5),
(6, '', 'top', 'ejjd', 'ddd', '2021-05-30 03:58:25', '', '2021-05-30 03:58:25', '', '0000-00-00 00:00:00', '', 'Actif', 5),
(7, '', 'ee\'d', '', '', '2021-05-31 17:02:12', '', '2021-05-31 17:02:12', '', '2021-06-01 12:54:44', 'Abdou Majeed ALIDOU', 'Inactif', 6),
(8, '', 'dd', '', '', '2021-05-31 17:03:43', '', '2021-06-01 15:56:17', 'John DOE', '0000-00-00 00:00:00', '', 'Actif', 5),
(9, '', 'sssff', '', '', '2021-05-31 17:05:46', '', '2021-06-01 12:55:03', 'Abdou Majeed ALIDOU', '0000-00-00 00:00:00', '', 'Actif', 25),
(10, '', 'wee', '', '', '2021-05-31 17:11:58', '', '2021-06-01 15:58:24', 'John DOE', '2021-06-01 15:55:50', 'John DOE', 'Actif', 5),
(11, '', 'Ahvgcfxzdd', 'cool', '', '2021-06-01 12:54:21', 'Abdou Majeed ALIDOU', '2021-06-01 12:54:21', 'Abdou Majeed ALIDOU', '0000-00-00 00:00:00', '', 'Actif', 29),
(12, '', 'ru', 'dffg', 'tyui', '2021-06-01 16:42:22', 'John DOE', '2021-06-01 16:42:22', 'John DOE', '2021-06-02 13:08:09', 'Abdou Majeed ALIDOU', 'Inactif', 24),
(13, '', 'xy', 'xfxhye6ryfh', '', '2021-06-01 16:44:28', 'John DOE', '2021-06-01 16:44:28', 'John DOE', '0000-00-00 00:00:00', '', 'Actif', 4),
(14, '', 'thys5t', 'tye6r7iutu', '', '2021-06-01 16:45:14', 'John DOE', '2021-06-01 16:45:14', 'John DOE', '0000-00-00 00:00:00', '', 'Actif', 25),
(15, '', 'seuriukgjmvcnxbfgsye6rukgjmv', 'fhuriukvmcngxhfsryeuriukgj', ' hsyeur7iutkhmchdeuriuk', '2021-06-01 16:45:34', 'John DOE', '2021-06-01 16:45:34', 'John DOE', '0000-00-00 00:00:00', '', 'Actif', 30),
(16, '', 'ggg', '', '', '2021-06-01 16:46:25', 'John DOE', '2021-06-01 16:46:25', 'John DOE', '2021-06-01 16:48:41', 'John DOE', 'Inactif', 30),
(17, '', 'rty78u890', 'rsyeyturyiyretuysfhduyrieutdshg', '', '2021-06-01 16:47:21', 'John DOE', '2021-06-01 16:48:34', 'John DOE', '2021-06-01 17:05:27', 'Abdou Majeed ALIDOU', 'Inactif', 24),
(18, '', 'q', '', '', '2021-06-01 17:05:36', 'Abdou Majeed ALIDOU', '2021-06-01 17:05:36', 'Abdou Majeed ALIDOU', '0000-00-00 00:00:00', '', 'Actif', 27);

-- --------------------------------------------------------

--
-- Structure de la table `chambre_occupee`
--

CREATE TABLE `chambre_occupee` (
  `id_chambre_occupee` int(11) NOT NULL,
  `date_entree_chambre_occupee` datetime NOT NULL,
  `date_sortie_chambre_occupee` datetime NOT NULL,
  `date_create_chambre_occupee` datetime NOT NULL,
  `date_last_modif_chambre_occupee` datetime NOT NULL,
  `date_del_chambre_occupee` datetime NOT NULL,
  `statut_chambre_occupee` enum('Occupé','Libéré') NOT NULL,
  `id_chambre_fk_chambre_occupee` int(11) NOT NULL,
  `id_reservation_fk_chambre_occupee` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `chambre_reservee`
--

CREATE TABLE `chambre_reservee` (
  `id_chambre_reservee` int(11) NOT NULL,
  `tarif_periode_chambre_reservee` text NOT NULL,
  `tarif_montant_chambre_reservee` double NOT NULL,
  `occupe_chambre_reservee` enum('Oui','Non') NOT NULL,
  `date_entree_chambre_reservee` datetime NOT NULL,
  `libere_chambre_reservee` enum('Oui','Non') NOT NULL,
  `date_sortie_chambre_reservee` datetime NOT NULL,
  `id_chambre_fk_chambre_reservee` int(11) NOT NULL,
  `id_reservation_fk_chambre_reservee` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `chambre_reservee`
--

INSERT INTO `chambre_reservee` (`id_chambre_reservee`, `tarif_periode_chambre_reservee`, `tarif_montant_chambre_reservee`, `occupe_chambre_reservee`, `date_entree_chambre_reservee`, `libere_chambre_reservee`, `date_sortie_chambre_reservee`, `id_chambre_fk_chambre_reservee`, `id_reservation_fk_chambre_reservee`) VALUES
(33, '', 0, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 2, 69),
(38, '', 4555, 'Oui', '0000-00-00 00:00:00', 'Non', '0000-00-00 00:00:00', 4, 74),
(39, '23333', 0, 'Non', '0000-00-00 00:00:00', 'Oui', '0000-00-00 00:00:00', 5, 75),
(40, '100000', 0, 'Non', '0000-00-00 00:00:00', 'Oui', '0000-00-00 00:00:00', 5, 76);

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `id_client` int(11) NOT NULL,
  `num_client` text NOT NULL,
  `nom_client` text NOT NULL,
  `prenom_client` text NOT NULL,
  `id_personne_fk_client` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`id_client`, `num_client`, `nom_client`, `prenom_client`, `id_personne_fk_client`) VALUES
(50, '', 'Ali', 'Johnson', 1),
(53, '', 'SATIL', 'Johnson', 5),
(54, '', 'Joachim', 'NOH', 6),
(56, '', '', '', 8),
(57, '', '', '', 9),
(58, '', '', '', 10),
(59, '', '', '', 11),
(60, '', '', '', 12),
(61, '', '', '', 13);

-- --------------------------------------------------------

--
-- Structure de la table `compte`
--

CREATE TABLE `compte` (
  `id_compte` int(11) NOT NULL,
  `pseudo_compte` text NOT NULL,
  `mdp_compte` text NOT NULL,
  `statut_compte` enum('Actif','Inactif') NOT NULL,
  `date_create_compte` datetime NOT NULL,
  `user_create_compte` text NOT NULL,
  `date_last_modif_compte` datetime NOT NULL,
  `user_last_modif_compte` text NOT NULL,
  `date_del_compte` datetime NOT NULL,
  `user_del_compte` text NOT NULL,
  `id_personne_fk_compte` int(11) NOT NULL,
  `id_type_compte_fk_compte` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `compte`
--

INSERT INTO `compte` (`id_compte`, `pseudo_compte`, `mdp_compte`, `statut_compte`, `date_create_compte`, `user_create_compte`, `date_last_modif_compte`, `user_last_modif_compte`, `date_del_compte`, `user_del_compte`, `id_personne_fk_compte`, `id_type_compte_fk_compte`) VALUES
(1, 'amalidou', '$2y$10$NyFLNj4OopN397bE71t.Ru0HtRDixBDFxP/AIK0IfNVyU5o/yLxZK', 'Actif', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', 1, 1),
(2, 'jdoe', '$2y$10$sZuu56T9WyYojq9aMKQVW.s6kvZrbc1LAu9YkBpnRaGhnUy2sKBry', 'Actif', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', 2, 1);

-- --------------------------------------------------------

--
-- Structure de la table `facture_conf`
--

CREATE TABLE `facture_conf` (
  `id_facture_conf` int(11) NOT NULL,
  `num_facture_conf` text NOT NULL,
  `date_facture_conf` datetime NOT NULL,
  `methode_paiement_facture_conf` text NOT NULL,
  `tva_facture_conf` enum('Oui','Non') NOT NULL,
  `valeur_tva_facture_conf` double NOT NULL,
  `montant_ht_facture_conf` double NOT NULL,
  `montant_ttc_facture_conf` double NOT NULL,
  `montant_ttc_en_lettre_facture_conf` text NOT NULL,
  `statut_facture_conf` enum('Actif','Annulé') NOT NULL,
  `date_create_facture_conf` datetime NOT NULL,
  `user_create_facture_conf` text NOT NULL,
  `date_last_modif_facture_conf` datetime NOT NULL,
  `user_last_modif_facture_conf` text NOT NULL,
  `date_del_facture_conf` datetime NOT NULL,
  `user_del_facture_conf` text NOT NULL,
  `id_location_conf_fk_facture_conf` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `facture_conf`
--

INSERT INTO `facture_conf` (`id_facture_conf`, `num_facture_conf`, `date_facture_conf`, `methode_paiement_facture_conf`, `tva_facture_conf`, `valeur_tva_facture_conf`, `montant_ht_facture_conf`, `montant_ttc_facture_conf`, `montant_ttc_en_lettre_facture_conf`, `statut_facture_conf`, `date_create_facture_conf`, `user_create_facture_conf`, `date_last_modif_facture_conf`, `user_last_modif_facture_conf`, `date_del_facture_conf`, `user_del_facture_conf`, `id_location_conf_fk_facture_conf`) VALUES
(1, 'FC/LOC-26', '2021-07-07 16:54:00', 'Espèce', 'Oui', 2, 30000, 30600, 'Trente mille six cents francs CFA', 'Annulé', '2021-07-07 18:03:41', 'Abdou Majeed ALIDOU', '2021-07-07 18:03:41', 'Abdou Majeed ALIDOU', '2021-07-07 18:08:27', 'Abdou Majeed ALIDOU', 32);

-- --------------------------------------------------------

--
-- Structure de la table `facture_spa`
--

CREATE TABLE `facture_spa` (
  `id_facture_spa` int(11) NOT NULL,
  `date_facture_spa` datetime NOT NULL,
  `num_facture_spa` text NOT NULL,
  `tva_facture_spa` enum('Non','Oui') NOT NULL,
  `valeur_tva_facture_spa` double NOT NULL,
  `montant_ht_facture_spa` double NOT NULL,
  `montant_ttc_facture_spa` double NOT NULL,
  `montant_ttc_en_lettre_facture_spa` text NOT NULL,
  `statut_facture_spa` enum('Actif','Inactif') NOT NULL,
  `date_create_facture_spa` datetime NOT NULL,
  `date_last_modif_facture_spa` datetime NOT NULL,
  `date_del_facture_spa` datetime NOT NULL,
  `user_create_facture_spa` text NOT NULL,
  `user_last_modif_facture_spa` text NOT NULL,
  `user_del_facture_spa` text NOT NULL,
  `id_methode_paiement_fk_facture_spa` int(11) NOT NULL,
  `id_prestation_spa_fk_facture_spa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `location_conf`
--

CREATE TABLE `location_conf` (
  `id_location_conf` int(11) NOT NULL,
  `date_debut_location_conf` datetime NOT NULL,
  `date_fin_location_conf` datetime NOT NULL,
  `motif_location_conf` text NOT NULL,
  `facture_location_conf` enum('Non','Oui','Annulé') NOT NULL,
  `prix_location_conf` double DEFAULT NULL,
  `statut_location_conf` enum('Actif','Inactif') NOT NULL,
  `date_create_location_conf` datetime NOT NULL,
  `user_create_location_conf` text NOT NULL,
  `date_last_modif_location_conf` datetime NOT NULL,
  `user_last_modif_location_conf` text NOT NULL,
  `date_del_location_conf` datetime NOT NULL,
  `user_del_location_conf` text NOT NULL,
  `id_salle_conf_fk_location_conf` int(11) NOT NULL,
  `id_client_fk_location_conf` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `location_conf`
--

INSERT INTO `location_conf` (`id_location_conf`, `date_debut_location_conf`, `date_fin_location_conf`, `motif_location_conf`, `facture_location_conf`, `prix_location_conf`, `statut_location_conf`, `date_create_location_conf`, `user_create_location_conf`, `date_last_modif_location_conf`, `user_last_modif_location_conf`, `date_del_location_conf`, `user_del_location_conf`, `id_salle_conf_fk_location_conf`, `id_client_fk_location_conf`) VALUES
(27, '2021-01-04 08:00:00', '2021-01-06 13:00:00', 'Formation: Introduction au Javascript.', 'Non', NULL, 'Actif', '2021-07-07 12:33:59', 'Abdou Majeed ALIDOU', '2021-07-07 17:43:07', 'Abdou Majeed ALIDOU', '0000-00-00 00:00:00', '', 18, 54),
(28, '2021-01-05 01:00:00', '2021-01-09 13:31:00', '', 'Non', NULL, 'Inactif', '2021-07-07 14:32:05', 'Abdou Majeed ALIDOU', '2021-07-07 14:34:06', 'Abdou Majeed ALIDOU', '2021-07-07 14:58:12', 'Abdou Majeed ALIDOU', 18, 57),
(29, '2021-07-05 13:34:00', '2021-07-09 13:34:00', '', 'Non', NULL, 'Inactif', '2021-07-07 14:35:08', 'Abdou Majeed ALIDOU', '2021-07-07 14:35:08', 'Abdou Majeed ALIDOU', '2021-07-07 14:35:15', 'Abdou Majeed ALIDOU', 18, 53),
(30, '2018-03-05 08:00:00', '2018-03-05 18:30:00', '', 'Non', 22000, 'Actif', '2021-07-07 14:39:17', 'Abdou Majeed ALIDOU', '2021-07-08 13:45:15', 'Abdou Majeed ALIDOU', '0000-00-00 00:00:00', '', 19, 57),
(31, '2021-07-05 09:00:00', '2021-07-09 16:00:00', '', 'Non', 100000, 'Actif', '2021-07-07 14:41:25', 'Abdou Majeed ALIDOU', '2021-07-08 13:19:19', 'Abdou Majeed ALIDOU', '2021-07-07 15:06:44', 'Abdou Majeed ALIDOU', 19, 58),
(32, '2021-01-04 14:00:00', '2021-01-04 18:00:00', 'Assemblé générale mensuelle IFFA.', 'Annulé', 30000, 'Actif', '2021-07-07 14:44:49', 'Abdou Majeed ALIDOU', '2021-07-07 18:03:41', 'Abdou Majeed ALIDOU', '0000-00-00 00:00:00', '', 20, 57),
(33, '2021-07-07 15:47:00', '2021-07-07 15:47:00', '', 'Non', NULL, 'Inactif', '2021-07-07 16:47:37', 'Abdou Majeed ALIDOU', '2021-07-07 16:47:37', 'Abdou Majeed ALIDOU', '2021-07-07 16:48:07', 'Abdou Majeed ALIDOU', 18, 50),
(34, '2021-06-14 09:00:00', '2021-06-19 13:00:00', 'Réunion CIFA 2021', 'Non', 800000, 'Actif', '2021-07-07 17:37:35', 'Abdou Majeed ALIDOU', '2021-07-07 17:37:35', 'Abdou Majeed ALIDOU', '0000-00-00 00:00:00', '', 20, 53);

-- --------------------------------------------------------

--
-- Structure de la table `location_voiture`
--

CREATE TABLE `location_voiture` (
  `id_location_voiture` int(11) NOT NULL,
  `debut_location_voiture` date NOT NULL,
  `fin_location_voiture` date NOT NULL,
  `prix_location_voiture` double NOT NULL,
  `facture_location_voiture` enum('Non','Oui') NOT NULL,
  `motif_location_voiture` text NOT NULL,
  `statut_location_voiture` enum('Actif','Inactif') NOT NULL,
  `date_create_location_voiture` datetime NOT NULL,
  `user_create_location_voiture` text NOT NULL,
  `date_last_modif_location_voiture` datetime NOT NULL,
  `date_del_location_voiture` datetime NOT NULL,
  `user_del_location_voiture` text NOT NULL,
  `id_voiture_fk_location_voiture` int(11) NOT NULL,
  `id_client_fk_location_voiture` int(11) NOT NULL,
  `id_voiturier_fk_location_voiture` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `location_voiture`
--

INSERT INTO `location_voiture` (`id_location_voiture`, `debut_location_voiture`, `fin_location_voiture`, `prix_location_voiture`, `facture_location_voiture`, `motif_location_voiture`, `statut_location_voiture`, `date_create_location_voiture`, `user_create_location_voiture`, `date_last_modif_location_voiture`, `date_del_location_voiture`, `user_del_location_voiture`, `id_voiture_fk_location_voiture`, `id_client_fk_location_voiture`, `id_voiturier_fk_location_voiture`) VALUES
(5, '2021-06-07', '2021-06-09', 100000, 'Non', 'balade', 'Actif', '2021-06-08 00:00:00', '', '0000-00-00 00:00:00', '2021-06-13 13:22:54', 'Abdou Majeed ALIDOU', 14, 50, 1),
(6, '0000-00-00', '0000-00-00', 0, 'Oui', '', 'Actif', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '2021-06-13 13:24:39', 'Abdou Majeed ALIDOU', 14, 50, 1);

-- --------------------------------------------------------

--
-- Structure de la table `marque_voiture`
--

CREATE TABLE `marque_voiture` (
  `id_marque_voiture` int(11) NOT NULL,
  `nom_marque_voiture` text NOT NULL,
  `desc_marque_voiture` text NOT NULL,
  `date_create_marque_voiture` datetime NOT NULL,
  `user_create_marque_voiture` text NOT NULL,
  `date_last_modif_marque_voiture` datetime NOT NULL,
  `user_last_modif_marque_voiture` text NOT NULL,
  `date_del_marque_voiture` datetime NOT NULL,
  `user_del_marque_voiture` text NOT NULL,
  `statut_marque_voiture` enum('Actif','Inactif') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `marque_voiture`
--

INSERT INTO `marque_voiture` (`id_marque_voiture`, `nom_marque_voiture`, `desc_marque_voiture`, `date_create_marque_voiture`, `user_create_marque_voiture`, `date_last_modif_marque_voiture`, `user_last_modif_marque_voiture`, `date_del_marque_voiture`, `user_del_marque_voiture`, `statut_marque_voiture`) VALUES
(13, 'Peugeot', 'Bonne marque', '0000-00-00 00:00:00', '', '2021-06-04 17:03:34', 'Abdou Majeed ALIDOU', '2021-06-04 17:10:27', 'Abdou Majeed ALIDOU', 'Inactif'),
(14, 'Renault', 'Disponible dans le monde entier', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '2021-06-04 17:12:23', 'Abdou Majeed ALIDOU', 'Actif'),
(15, 'Opel', 'Bonne marque', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', 'Actif'),
(16, 'Toyota', 'Rapide', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '2021-06-04 17:03:28', 'Abdou Majeed ALIDOU', 'Inactif'),
(17, 'Mercedes', 'Bon pour le voyage', '2021-06-04 16:59:39', 'Abdou Majeed ALIDOU', '2021-06-04 16:59:39', 'Abdou Majeed ALIDOU', '0000-00-00 00:00:00', '', 'Actif'),
(18, 'Fiat', 'Bonne vitesse', '2021-06-04 17:03:20', 'Abdou Majeed ALIDOU', '2021-06-04 17:03:20', 'Abdou Majeed ALIDOU', '0000-00-00 00:00:00', '', 'Actif'),
(19, 'volkswagen', 'Ancienne', '2021-06-04 17:09:30', 'Abdou Majeed ALIDOU', '2021-06-04 17:11:47', 'Abdou Majeed ALIDOU', '2021-06-07 12:02:17', 'Abdou Majeed ALIDOU', 'Inactif'),
(20, 'Venza', 'Nouvelle', '2021-06-04 17:12:12', 'Abdou Majeed ALIDOU', '2021-06-04 17:12:12', 'Abdou Majeed ALIDOU', '0000-00-00 00:00:00', '', 'Actif'),
(21, 'qwe', '', '2021-06-07 12:02:36', 'Abdou Majeed ALIDOU', '2021-06-07 12:02:36', 'Abdou Majeed ALIDOU', '0000-00-00 00:00:00', '', 'Actif');

-- --------------------------------------------------------

--
-- Structure de la table `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL,
  `lib_menu` text NOT NULL,
  `statut_menu` enum('Actif','Inactif') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `menu`
--

INSERT INTO `menu` (`id_menu`, `lib_menu`, `statut_menu`) VALUES
(1, 'type_chambre', 'Actif'),
(2, 'chambre', 'Actif'),
(3, 'carac_chambre', 'Actif'),
(4, 'reserv_dispo', 'Actif'),
(5, 'reserv_attente', 'Actif'),
(6, 'reserv_confirme', 'Actif'),
(7, 'reserv_termine', 'Actif'),
(8, 'reserv_annule', 'Actif'),
(9, 'carac_conf', 'Actif'),
(10, 'service_conf', 'Actif'),
(11, 'salle_conf', 'Actif'),
(12, 'article_restau', 'Actif'),
(13, 'plat', 'Actif'),
(14, 'type_plat', 'Actif'),
(15, 'marque_voiture', 'Actif'),
(16, 'voiture', 'Actif'),
(17, 'boisson', 'Actif'),
(18, 'location_conf', 'Actif'),
(19, 'facture_conf', 'Actif'),
(20, 'location_voiture', 'Actif'),
(21, 'facture_voiture', 'Actif'),
(22, 'stat_conf', 'Actif'),
(23, 'soins_spa', 'Actif'),
(24, 'prestation_spa', 'Actif'),
(25, 'facture_spa', 'Actif'),
(26, 'stat_spa', 'Actif');

-- --------------------------------------------------------

--
-- Structure de la table `methode_paiement`
--

CREATE TABLE `methode_paiement` (
  `id_methode_paiement` int(11) NOT NULL,
  `nom_methode_paiement` text NOT NULL,
  `statut_methode_paiement` enum('Actif','Inactif') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `methode_paiement`
--

INSERT INTO `methode_paiement` (`id_methode_paiement`, `nom_methode_paiement`, `statut_methode_paiement`) VALUES
(1, 'VISA', 'Actif'),
(2, 'MaterCard', 'Actif'),
(3, 'Espèce', 'Actif');

-- --------------------------------------------------------

--
-- Structure de la table `parametre`
--

CREATE TABLE `parametre` (
  `nom_hotel` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `parametre`
--

INSERT INTO `parametre` (`nom_hotel`) VALUES
('Hôtel BelleVue');

-- --------------------------------------------------------

--
-- Structure de la table `personne`
--

CREATE TABLE `personne` (
  `id_personne` int(11) NOT NULL,
  `nom_personne` text NOT NULL,
  `prenom_personne` text NOT NULL,
  `tel_personne` text NOT NULL,
  `addresse_personne` text NOT NULL,
  `email_personne` text NOT NULL,
  `nationalite_personne` text NOT NULL,
  `id_card_personne` text NOT NULL,
  `passeport_personne` text NOT NULL,
  `date_naiss_personne` date NOT NULL,
  `sexe_personne` enum('-','Masculin','Féminin') NOT NULL,
  `statut_personne` enum('Actif','Inactif') NOT NULL,
  `date_create_personne` datetime NOT NULL,
  `user_create_personne` text NOT NULL,
  `date_last_modif_personne` datetime NOT NULL,
  `user_last_modif_personne` text NOT NULL,
  `date_del_personne` datetime NOT NULL,
  `user_del_personne` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `personne`
--

INSERT INTO `personne` (`id_personne`, `nom_personne`, `prenom_personne`, `tel_personne`, `addresse_personne`, `email_personne`, `nationalite_personne`, `id_card_personne`, `passeport_personne`, `date_naiss_personne`, `sexe_personne`, `statut_personne`, `date_create_personne`, `user_create_personne`, `date_last_modif_personne`, `user_last_modif_personne`, `date_del_personne`, `user_del_personne`) VALUES
(1, 'ALIDOU', 'Abdou Majeed', '', '', '', '', '', '', '0000-00-00', 'Masculin', 'Actif', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(2, 'DOE', 'John', '', '', '', '', '', '', '0000-00-00', 'Féminin', 'Actif', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(5, 'SATIL', 'Johnson', '43344334', '', 'someone@something.com', '', '', '', '0000-00-00', 'Masculin', 'Actif', '2021-06-12 23:57:32', 'Abdou Majeed ALIDOU', '2021-06-12 23:57:32', 'Abdou Majeed ALIDOU', '0000-00-00 00:00:00', ''),
(6, 'Joachim', 'NOH', '32', '', '', '', '', '', '0000-00-00', 'Masculin', 'Actif', '2021-06-13 23:57:04', 'Abdou Majeed ALIDOU', '2021-06-13 23:57:04', 'Abdou Majeed ALIDOU', '0000-00-00 00:00:00', ''),
(7, 'ab', 'b', '2', '', '', '', '', '', '0000-00-00', '-', 'Actif', '2021-06-16 13:25:10', 'Abdou Majeed ALIDOU', '2021-06-16 13:25:10', 'Abdou Majeed ALIDOU', '0000-00-00 00:00:00', ''),
(8, 'g', 'j', '13', '', '', '', '', '', '0000-00-00', '-', 'Actif', '2021-06-16 13:56:40', 'Abdou Majeed ALIDOU', '2021-06-16 13:56:40', 'Abdou Majeed ALIDOU', '0000-00-00 00:00:00', ''),
(9, 'SMILEY', 'Lizard', '62271704', '', 'smilinglizard@sth.com', '', '', '', '0000-00-00', '-', 'Actif', '2021-07-07 12:33:59', 'Abdou Majeed ALIDOU', '2021-07-07 12:33:59', 'Abdou Majeed ALIDOU', '0000-00-00 00:00:00', ''),
(10, 'SNOW', 'John', '33322277', '', 'jsnow@got.com', '', '', '', '0000-00-00', '-', 'Actif', '2021-07-07 14:39:17', 'Abdou Majeed ALIDOU', '2021-07-07 14:39:17', 'Abdou Majeed ALIDOU', '0000-00-00 00:00:00', ''),
(11, 'SNOW', 'John', '33344477', '', 'jsnow@got.com', '', '', '', '0000-00-00', '-', 'Actif', '2021-07-07 14:41:25', 'Abdou Majeed ALIDOU', '2021-07-07 14:41:25', 'Abdou Majeed ALIDOU', '0000-00-00 00:00:00', ''),
(12, 'qqqqq', 'qqqq', '121212', '', '', '', '', '', '0000-00-00', '-', 'Actif', '2021-07-25 00:25:33', 'Abdou Majeed ALIDOU', '2021-07-25 00:25:33', 'Abdou Majeed ALIDOU', '0000-00-00 00:00:00', ''),
(13, 'aaaaaaaaaaaaaaa', 'qqqqqqqqqqqqq', '1111111111111111', '', '', '', '', '', '0000-00-00', '-', 'Actif', '2021-07-25 00:57:44', 'Abdou Majeed ALIDOU', '2021-07-25 00:57:44', 'Abdou Majeed ALIDOU', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Structure de la table `plat`
--

CREATE TABLE `plat` (
  `id_plat` int(11) NOT NULL,
  `nom_plat` text NOT NULL,
  `desc_plat` text NOT NULL,
  `prix_unit_plat` double NOT NULL,
  `date_create_plat` datetime NOT NULL,
  `user_create_plat` text NOT NULL,
  `date_last_modif_plat` datetime NOT NULL,
  `user_last_modif_plat` text NOT NULL,
  `date_del_plat` datetime NOT NULL,
  `user_del_plat` text NOT NULL,
  `statut_plat` enum('Actif','Inactif') NOT NULL,
  `id_type_plat_fk_plat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `plat`
--

INSERT INTO `plat` (`id_plat`, `nom_plat`, `desc_plat`, `prix_unit_plat`, `date_create_plat`, `user_create_plat`, `date_last_modif_plat`, `user_last_modif_plat`, `date_del_plat`, `user_del_plat`, `statut_plat`, `id_type_plat_fk_plat`) VALUES
(1, 'smoothie ananas', 'fruit sucrée', 1500, '2021-06-03 13:28:50', 'Abdou Majeed ALIDOU', '2021-06-03 13:28:50', 'Abdou Majeed ALIDOU', '2021-06-03 17:13:08', 'Abdou Majeed ALIDOU', 'Actif', 1),
(2, 'youki', 'pamplemousse', 550, '2021-06-03 17:48:02', 'Abdou Majeed ALIDOU', '2021-06-07 12:03:15', 'Abdou Majeed ALIDOU', '2021-06-07 12:03:01', 'Abdou Majeed ALIDOU', 'Inactif', 2),
(3, 'b', 'n', 900, '2021-06-07 12:03:56', 'Abdou Majeed ALIDOU', '2021-06-07 12:03:56', 'Abdou Majeed ALIDOU', '0000-00-00 00:00:00', '', 'Actif', 1);

-- --------------------------------------------------------

--
-- Structure de la table `prestation_spa`
--

CREATE TABLE `prestation_spa` (
  `id_prestation_spa` int(11) NOT NULL,
  `date_debut_prestation_spa` datetime NOT NULL,
  `date_fin_prestation_spa` datetime NOT NULL,
  `montant_prestation_spa` double NOT NULL,
  `note_prestation_spa` text NOT NULL,
  `facture_prestation_spa` enum('Non','Oui','Annulé') NOT NULL,
  `statut_prestation_spa` enum('Actif','Inactif') NOT NULL,
  `date_create_prestation_spa` datetime NOT NULL,
  `date_last_modif_prestation_spa` datetime NOT NULL,
  `date_del_prestation_spa` datetime NOT NULL,
  `user_create_prestation_spa` text NOT NULL,
  `user_last_modif_prestation_spa` text NOT NULL,
  `user_del_prestation_spa` text NOT NULL,
  `id_client_fk_prestation_spa` int(11) NOT NULL,
  `id_soins_spa_fk_prestation_spa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `prestation_spa`
--

INSERT INTO `prestation_spa` (`id_prestation_spa`, `date_debut_prestation_spa`, `date_fin_prestation_spa`, `montant_prestation_spa`, `note_prestation_spa`, `facture_prestation_spa`, `statut_prestation_spa`, `date_create_prestation_spa`, `date_last_modif_prestation_spa`, `date_del_prestation_spa`, `user_create_prestation_spa`, `user_last_modif_prestation_spa`, `user_del_prestation_spa`, `id_client_fk_prestation_spa`, `id_soins_spa_fk_prestation_spa`) VALUES
(1, '2021-07-21 00:00:00', '2021-07-24 09:21:00', 30000, 'Top', 'Non', 'Actif', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', 53, 2),
(2, '2021-07-23 21:53:00', '2021-07-29 21:53:00', 30020, 'trop top', 'Non', 'Actif', '2021-07-24 23:00:10', '2021-07-24 23:00:10', '0000-00-00 00:00:00', 'Abdou Majeed ALIDOU', 'Abdou Majeed ALIDOU', '', 54, 26),
(4, '2021-07-29 22:50:00', '2021-08-07 22:50:00', 0, '', 'Non', 'Actif', '2021-07-24 23:50:44', '2021-07-25 02:16:06', '0000-00-00 00:00:00', 'Abdou Majeed ALIDOU', 'Abdou Majeed ALIDOU', '', 56, 30),
(5, '2021-07-07 23:16:00', '2021-07-10 23:16:00', 12, 'qqq', 'Non', 'Actif', '2021-07-25 00:16:30', '2021-07-25 00:16:30', '0000-00-00 00:00:00', 'Abdou Majeed ALIDOU', 'Abdou Majeed ALIDOU', '', 50, 27),
(6, '2021-07-15 23:23:00', '2021-07-22 23:23:00', 300200, 'qaw', 'Non', 'Actif', '2021-07-25 00:25:33', '2021-07-25 00:57:44', '0000-00-00 00:00:00', 'Abdou Majeed ALIDOU', 'Abdou Majeed ALIDOU', '', 61, 31);

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE `reservation` (
  `id_reservation` int(11) NOT NULL,
  `date_debut_reservation` datetime NOT NULL,
  `date_fin_reservation` datetime NOT NULL,
  `nbre_adulte_reservation` int(11) NOT NULL,
  `nbre_enfant_reservation` int(11) NOT NULL,
  `provenance_reservation` text NOT NULL,
  `destination_reservation` text NOT NULL,
  `date_create_reservation` datetime NOT NULL,
  `user_create_reservation` text NOT NULL,
  `date_last_modif_reservation` datetime NOT NULL,
  `user_last_modif_reservation` text NOT NULL,
  `date_del_reservation` datetime NOT NULL,
  `user_del_reservation` text NOT NULL,
  `statut_reservation` enum('En attente','Confirmé','Terminé','Annulé') NOT NULL,
  `id_client_fk_reservation` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `reservation`
--

INSERT INTO `reservation` (`id_reservation`, `date_debut_reservation`, `date_fin_reservation`, `nbre_adulte_reservation`, `nbre_enfant_reservation`, `provenance_reservation`, `destination_reservation`, `date_create_reservation`, `user_create_reservation`, `date_last_modif_reservation`, `user_last_modif_reservation`, `date_del_reservation`, `user_del_reservation`, `statut_reservation`, `id_client_fk_reservation`) VALUES
(69, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', 'En attente', 50),
(70, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, '', '', '2021-05-31 10:33:28', '', '2021-05-31 10:33:28', '', '0000-00-00 00:00:00', '', 'En attente', 50),
(71, '2021-05-30 09:33:00', '2021-06-03 09:33:00', 0, 0, '', '', '2021-05-31 10:34:00', '', '2021-05-31 10:34:00', '', '0000-00-00 00:00:00', '', 'En attente', 50),
(72, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, '', '', '2021-05-31 10:57:52', '', '2021-05-31 10:57:52', '', '0000-00-00 00:00:00', '', 'En attente', 50),
(73, '2021-05-18 10:00:00', '2021-05-21 12:00:00', 2, 1, 'Paris', 'Milan', '2021-05-31 11:01:02', '', '2021-05-31 11:01:02', '', '0000-00-00 00:00:00', '', 'En attente', 50),
(74, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 12, 2, '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', 'Confirmé', 50),
(75, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 3, 2, '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', 'Terminé', 50),
(76, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0, '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', 'Annulé', 50),
(77, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, '', '', '2021-06-01 11:05:23', '', '2021-06-01 11:05:23', '', '0000-00-00 00:00:00', '', 'En attente', 50),
(78, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, '', '', '2021-06-01 11:16:05', '', '2021-06-01 11:16:05', '', '0000-00-00 00:00:00', '', 'En attente', 50),
(79, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, '', '', '2021-06-01 11:26:08', '', '2021-06-01 11:26:08', '', '0000-00-00 00:00:00', '', 'En attente', 50),
(80, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, '', '', '2021-06-01 11:26:09', '', '2021-06-01 11:26:09', '', '0000-00-00 00:00:00', '', 'En attente', 50),
(81, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, '', '', '2021-06-01 11:26:10', '', '2021-06-01 11:26:10', '', '0000-00-00 00:00:00', '', 'En attente', 50),
(82, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, '', '', '2021-06-01 11:26:11', '', '2021-06-01 11:26:11', '', '0000-00-00 00:00:00', '', 'En attente', 50),
(83, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, '', '', '2021-06-01 11:26:12', '', '2021-06-01 11:26:12', '', '0000-00-00 00:00:00', '', 'En attente', 50),
(84, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, '', '', '2021-06-01 11:26:12', '', '2021-06-01 11:26:12', '', '0000-00-00 00:00:00', '', 'En attente', 50),
(85, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, '', '', '2021-06-01 11:26:13', '', '2021-06-01 11:26:13', '', '0000-00-00 00:00:00', '', 'En attente', 50),
(86, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, '', '', '2021-06-01 11:26:13', '', '2021-06-01 11:26:13', '', '0000-00-00 00:00:00', '', 'En attente', 50),
(87, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, '', '', '2021-06-01 11:26:13', '', '2021-06-01 11:26:13', '', '0000-00-00 00:00:00', '', 'En attente', 50),
(88, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, '', '', '2021-06-01 11:26:13', '', '2021-06-01 11:26:13', '', '0000-00-00 00:00:00', '', 'En attente', 50),
(89, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, '', '', '2021-06-01 11:26:14', '', '2021-06-01 11:26:14', '', '0000-00-00 00:00:00', '', 'En attente', 50),
(90, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, '', '', '2021-06-01 11:26:14', '', '2021-06-01 11:26:14', '', '0000-00-00 00:00:00', '', 'En attente', 50),
(91, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, '', '', '2021-06-01 11:26:14', '', '2021-06-01 11:26:14', '', '0000-00-00 00:00:00', '', 'En attente', 50),
(92, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, '', '', '2021-06-01 11:26:17', '', '2021-06-01 11:26:17', '', '0000-00-00 00:00:00', '', 'En attente', 50),
(93, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, '', '', '2021-06-01 11:26:18', '', '2021-06-01 11:26:18', '', '0000-00-00 00:00:00', '', 'En attente', 50),
(94, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, '', '', '2021-06-01 11:26:18', '', '2021-06-01 11:26:18', '', '0000-00-00 00:00:00', '', 'En attente', 50),
(95, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, '', '', '2021-06-01 11:26:18', '', '2021-06-01 11:26:18', '', '0000-00-00 00:00:00', '', 'En attente', 50),
(96, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, '', '', '2021-06-01 11:26:18', '', '2021-06-01 11:26:18', '', '0000-00-00 00:00:00', '', 'En attente', 50),
(97, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, '', '', '2021-06-01 11:26:19', '', '2021-06-01 11:26:19', '', '0000-00-00 00:00:00', '', 'En attente', 50),
(98, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, '', '', '2021-06-01 11:26:19', '', '2021-06-01 11:26:19', '', '0000-00-00 00:00:00', '', 'En attente', 50),
(99, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, '', '', '2021-06-01 11:26:19', '', '2021-06-01 11:26:19', '', '0000-00-00 00:00:00', '', 'En attente', 50),
(100, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, '', '', '2021-06-01 11:26:20', '', '2021-06-01 11:26:20', '', '0000-00-00 00:00:00', '', 'En attente', 50),
(101, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, '', '', '2021-06-01 11:26:20', '', '2021-06-01 11:26:20', '', '0000-00-00 00:00:00', '', 'En attente', 50),
(102, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, '', '', '2021-06-01 11:26:20', '', '2021-06-01 11:26:20', '', '0000-00-00 00:00:00', '', 'En attente', 50),
(103, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, '', '', '2021-06-01 11:26:21', '', '2021-06-01 11:26:21', '', '0000-00-00 00:00:00', '', 'En attente', 50),
(104, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, '', '', '2021-06-01 11:26:21', '', '2021-06-01 11:26:21', '', '0000-00-00 00:00:00', '', 'En attente', 50),
(105, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, '', '', '2021-06-01 11:26:21', '', '2021-06-01 11:26:21', '', '0000-00-00 00:00:00', '', 'En attente', 50),
(106, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, '', '', '2021-06-01 11:26:21', '', '2021-06-01 11:26:21', '', '0000-00-00 00:00:00', '', 'En attente', 50),
(107, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, '', '', '2021-06-01 11:26:21', '', '2021-06-01 11:26:21', '', '0000-00-00 00:00:00', '', 'En attente', 50),
(108, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, '', '', '2021-06-01 11:26:39', '', '2021-06-01 11:26:39', '', '0000-00-00 00:00:00', '', 'En attente', 50),
(109, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, '', '', '2021-06-01 11:26:40', '', '2021-06-01 11:26:40', '', '0000-00-00 00:00:00', '', 'En attente', 50),
(110, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, '', '', '2021-06-01 11:26:40', '', '2021-06-01 11:26:40', '', '0000-00-00 00:00:00', '', 'En attente', 50),
(111, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, '', '', '2021-06-01 11:26:41', '', '2021-06-01 11:26:41', '', '0000-00-00 00:00:00', '', 'En attente', 50),
(112, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, '', '', '2021-06-01 11:26:41', '', '2021-06-01 11:26:41', '', '0000-00-00 00:00:00', '', 'En attente', 50),
(113, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, '', '', '2021-06-01 11:26:41', '', '2021-06-01 11:26:41', '', '0000-00-00 00:00:00', '', 'En attente', 50),
(114, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, '', '', '2021-06-01 11:26:42', '', '2021-06-01 11:26:42', '', '0000-00-00 00:00:00', '', 'En attente', 50),
(115, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, '', '', '2021-06-01 11:28:25', '', '2021-06-01 11:28:25', '', '0000-00-00 00:00:00', '', 'En attente', 50),
(116, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, '', '', '2021-06-01 11:28:27', '', '2021-06-01 11:28:27', '', '0000-00-00 00:00:00', '', 'En attente', 50),
(117, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, '', '', '2021-06-01 11:28:28', '', '2021-06-01 11:28:28', '', '0000-00-00 00:00:00', '', 'En attente', 50),
(118, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, '', '', '2021-06-01 11:28:29', '', '2021-06-01 11:28:29', '', '0000-00-00 00:00:00', '', 'En attente', 50),
(119, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, '', '', '2021-06-01 11:28:29', '', '2021-06-01 11:28:29', '', '0000-00-00 00:00:00', '', 'En attente', 50),
(120, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, '', '', '2021-06-01 11:28:30', '', '2021-06-01 11:28:30', '', '0000-00-00 00:00:00', '', 'En attente', 50),
(121, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, '', '', '2021-06-01 11:28:30', '', '2021-06-01 11:28:30', '', '0000-00-00 00:00:00', '', 'En attente', 50),
(122, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, '', '', '2021-06-01 11:28:31', '', '2021-06-01 11:28:31', '', '0000-00-00 00:00:00', '', 'En attente', 50),
(123, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, '', '', '2021-06-01 11:28:31', '', '2021-06-01 11:28:31', '', '0000-00-00 00:00:00', '', 'En attente', 50),
(124, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, '', '', '2021-06-01 11:28:31', '', '2021-06-01 11:28:31', '', '0000-00-00 00:00:00', '', 'En attente', 50),
(125, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, '', '', '2021-06-01 11:28:32', '', '2021-06-01 11:28:32', '', '0000-00-00 00:00:00', '', 'En attente', 50),
(126, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, '', '', '2021-06-01 11:28:32', '', '2021-06-01 11:28:32', '', '0000-00-00 00:00:00', '', 'En attente', 50),
(127, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, '', '', '2021-06-01 11:28:34', '', '2021-06-01 11:28:34', '', '0000-00-00 00:00:00', '', 'En attente', 50),
(128, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, '', '', '2021-06-01 11:28:34', '', '2021-06-01 11:28:34', '', '0000-00-00 00:00:00', '', 'En attente', 50),
(129, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, '', '', '2021-06-01 11:28:34', '', '2021-06-01 11:28:34', '', '0000-00-00 00:00:00', '', 'En attente', 50),
(130, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, '', '', '2021-06-01 11:28:35', '', '2021-06-01 11:28:35', '', '0000-00-00 00:00:00', '', 'En attente', 50),
(131, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, '', '', '2021-06-01 11:32:27', '', '2021-06-01 11:32:27', '', '0000-00-00 00:00:00', '', 'En attente', 50),
(132, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, '', '', '2021-06-02 10:52:45', '', '2021-06-02 10:52:45', '', '0000-00-00 00:00:00', '', 'En attente', 50),
(133, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, '', '', '2021-06-02 11:15:52', '', '2021-06-02 11:15:52', '', '0000-00-00 00:00:00', '', 'En attente', 50);

-- --------------------------------------------------------

--
-- Structure de la table `salle_conf`
--

CREATE TABLE `salle_conf` (
  `id_salle_conf` int(11) NOT NULL,
  `nom_salle_conf` text NOT NULL,
  `desc_salle_conf` text NOT NULL,
  `capacite_salle_conf` text NOT NULL,
  `statut_salle_conf` enum('Actif','Inactif') NOT NULL,
  `date_create_salle_conf` datetime NOT NULL,
  `user_create_salle_conf` text NOT NULL,
  `date_last_modif_salle_conf` datetime NOT NULL,
  `user_last_modif_salle_conf` text NOT NULL,
  `date_del_salle_conf` datetime NOT NULL,
  `user_del_salle_conf` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `salle_conf`
--

INSERT INTO `salle_conf` (`id_salle_conf`, `nom_salle_conf`, `desc_salle_conf`, `capacite_salle_conf`, `statut_salle_conf`, `date_create_salle_conf`, `user_create_salle_conf`, `date_last_modif_salle_conf`, `user_last_modif_salle_conf`, `date_del_salle_conf`, `user_del_salle_conf`) VALUES
(18, 'Small', 'Une salle de petite taille.', '12 personnes', 'Actif', '2021-07-07 11:34:48', 'Abdou Majeed ALIDOU', '2021-07-07 11:34:48', 'Abdou Majeed ALIDOU', '0000-00-00 00:00:00', ''),
(19, 'Medium', 'Une salle de taille moyenne. Tables rondes disponibles.', '40 personnes', 'Actif', '2021-07-07 11:42:33', 'Abdou Majeed ALIDOU', '2021-07-07 11:48:09', 'Abdou Majeed ALIDOU', '0000-00-00 00:00:00', ''),
(20, 'Large', 'Une très grande salle.', '200 personnes', 'Actif', '2021-07-07 11:47:27', 'Abdou Majeed ALIDOU', '2021-07-07 11:53:22', 'Abdou Majeed ALIDOU', '0000-00-00 00:00:00', ''),
(21, 'Xtra', 'La salle des grands événements.', '3000 personnes', 'Actif', '2021-07-07 11:52:53', 'Abdou Majeed ALIDOU', '2021-07-07 11:54:03', 'Abdou Majeed ALIDOU', '0000-00-00 00:00:00', ''),
(22, 'Plein air', '', '5000+', 'Inactif', '2021-07-07 11:55:58', 'Abdou Majeed ALIDOU', '2021-07-07 11:55:58', 'Abdou Majeed ALIDOU', '2021-07-07 12:04:24', 'Abdou Majeed ALIDOU');

-- --------------------------------------------------------

--
-- Structure de la table `service_conf`
--

CREATE TABLE `service_conf` (
  `id_service_conf` int(11) NOT NULL,
  `nom_service_conf` text NOT NULL,
  `desc_service_conf` text NOT NULL,
  `statut_service_conf` enum('Actif','Inactif') NOT NULL,
  `date_create_service_conf` datetime NOT NULL,
  `user_create_service_conf` text NOT NULL,
  `date_last_modif_service_conf` datetime NOT NULL,
  `user_last_modif_service_conf` text NOT NULL,
  `date_del_service_conf` datetime NOT NULL,
  `user_del_service_conf` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `service_conf`
--

INSERT INTO `service_conf` (`id_service_conf`, `nom_service_conf`, `desc_service_conf`, `statut_service_conf`, `date_create_service_conf`, `user_create_service_conf`, `date_last_modif_service_conf`, `user_last_modif_service_conf`, `date_del_service_conf`, `user_del_service_conf`) VALUES
(9, 'Sonorisation', 'Installation de micros et de hauts-parleurs.', 'Actif', '2021-07-07 12:09:57', 'Abdou Majeed ALIDOU', '2021-07-07 12:09:57', 'Abdou Majeed ALIDOU', '0000-00-00 00:00:00', ''),
(10, 'Décoration', 'Assistance des décorateurs pour adapter la salle à chaque événement, suivant les goûts du client.', 'Actif', '2021-07-07 12:13:41', 'Abdou Majeed ALIDOU', '2021-07-07 12:13:41', 'Abdou Majeed ALIDOU', '0000-00-00 00:00:00', ''),
(11, 'Pause Café', 'Boissons, Pâtisserie, etc.', 'Actif', '2021-07-07 12:14:51', 'Abdou Majeed ALIDOU', '2021-07-07 12:14:51', 'Abdou Majeed ALIDOU', '0000-00-00 00:00:00', ''),
(12, 'wifi', '', 'Inactif', '2021-07-07 12:16:16', 'Abdou Majeed ALIDOU', '2021-07-07 12:16:16', 'Abdou Majeed ALIDOU', '2021-07-07 12:19:25', 'Abdou Majeed ALIDOU'),
(13, 'wifi', '', 'Inactif', '2021-07-07 12:19:32', 'Abdou Majeed ALIDOU', '2021-07-07 12:19:32', 'Abdou Majeed ALIDOU', '2021-07-07 12:19:38', 'Abdou Majeed ALIDOU');

-- --------------------------------------------------------

--
-- Structure de la table `soins_spa`
--

CREATE TABLE `soins_spa` (
  `id_soins_spa` int(11) NOT NULL,
  `nom_soins_spa` text NOT NULL,
  `desc_soins_spa` text NOT NULL,
  `statut_soins_spa` enum('Actif','Inactif') NOT NULL,
  `date_create_soins_spa` datetime NOT NULL,
  `date_last_modif_soins_spa` datetime NOT NULL,
  `date_del_soins_spa` datetime NOT NULL,
  `user_create_soins_spa` text NOT NULL,
  `user_last_modif_soins_spa` text NOT NULL,
  `user_del_soins_spa` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `soins_spa`
--

INSERT INTO `soins_spa` (`id_soins_spa`, `nom_soins_spa`, `desc_soins_spa`, `statut_soins_spa`, `date_create_soins_spa`, `date_last_modif_soins_spa`, `date_del_soins_spa`, `user_create_soins_spa`, `user_last_modif_soins_spa`, `user_del_soins_spa`) VALUES
(1, 'bw', '', 'Actif', '0000-00-00 00:00:00', '2021-07-25 00:53:13', '0000-00-00 00:00:00', '', 'Abdou Majeed ALIDOU', ''),
(2, 'Soins du corps', '', 'Actif', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', ''),
(3, '{\"tom\":\"von\",\"Ali\":25}', '', 'Actif', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', ''),
(4, 'asq', 'aaaaa', 'Actif', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', ''),
(5, 'tom', 'jerry', 'Actif', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', ''),
(6, 'tom', 'jerry', 'Actif', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', ''),
(7, 'wqa', '', 'Actif', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', ''),
(8, 'ee', '', 'Actif', '2021-07-19 10:53:05', '2021-07-19 10:53:05', '0000-00-00 00:00:00', 'Abdou Majeed ALIDOU', 'Abdou Majeed ALIDOU', ''),
(9, 'eeee', '', 'Actif', '2021-07-19 10:53:57', '2021-07-19 10:53:57', '0000-00-00 00:00:00', 'Abdou Majeed ALIDOU', 'Abdou Majeed ALIDOU', ''),
(10, 'jjjj', '', 'Actif', '2021-07-19 12:05:57', '2021-07-19 12:05:57', '0000-00-00 00:00:00', 'Abdou Majeed ALIDOU', 'Abdou Majeed ALIDOU', ''),
(11, 'jjjjssss', 'xxx', 'Actif', '2021-07-19 12:06:45', '2021-07-19 12:06:45', '0000-00-00 00:00:00', 'Abdou Majeed ALIDOU', 'Abdou Majeed ALIDOU', ''),
(12, 'jjjjssssdcc', 'xxx', 'Actif', '2021-07-19 12:08:16', '2021-07-19 12:08:16', '0000-00-00 00:00:00', 'Abdou Majeed ALIDOU', 'Abdou Majeed ALIDOU', ''),
(13, 'd', 'xxx', 'Actif', '2021-07-19 12:08:35', '2021-07-19 12:08:35', '0000-00-00 00:00:00', 'Abdou Majeed ALIDOU', 'Abdou Majeed ALIDOU', ''),
(14, 'vfd', 'xxx', 'Actif', '2021-07-19 12:09:18', '2021-07-19 12:09:18', '0000-00-00 00:00:00', 'Abdou Majeed ALIDOU', 'Abdou Majeed ALIDOU', ''),
(15, 'ss,,cd', 'xxx', 'Actif', '2021-07-19 12:09:37', '2021-07-19 12:09:37', '0000-00-00 00:00:00', 'Abdou Majeed ALIDOU', 'Abdou Majeed ALIDOU', ''),
(16, 'ss,,cdxxx', 'xxx', 'Actif', '2021-07-19 12:09:47', '2021-07-19 12:09:47', '0000-00-00 00:00:00', 'Abdou Majeed ALIDOU', 'Abdou Majeed ALIDOU', ''),
(17, 'cnd', 'xxx', 'Actif', '2021-07-19 12:10:00', '2021-07-19 12:10:00', '0000-00-00 00:00:00', 'Abdou Majeed ALIDOU', 'Abdou Majeed ALIDOU', ''),
(18, 'x,c', 'xxx', 'Actif', '2021-07-19 12:10:28', '2021-07-19 12:10:28', '0000-00-00 00:00:00', 'Abdou Majeed ALIDOU', 'Abdou Majeed ALIDOU', ''),
(19, 'x,cdddd', 'xxx', 'Actif', '2021-07-19 12:10:44', '2021-07-19 12:10:44', '0000-00-00 00:00:00', 'Abdou Majeed ALIDOU', 'Abdou Majeed ALIDOU', ''),
(20, 'ds', 'xxx', 'Actif', '2021-07-19 12:11:07', '2021-07-19 12:11:07', '0000-00-00 00:00:00', 'Abdou Majeed ALIDOU', 'Abdou Majeed ALIDOU', ''),
(21, 'dsc', 'xxx', 'Actif', '2021-07-19 12:11:59', '2021-07-19 12:11:59', '0000-00-00 00:00:00', 'Abdou Majeed ALIDOU', 'Abdou Majeed ALIDOU', ''),
(22, 'new', 'xxx', 'Actif', '2021-07-19 12:20:21', '2021-07-19 12:20:21', '0000-00-00 00:00:00', 'Abdou Majeed ALIDOU', 'Abdou Majeed ALIDOU', ''),
(23, 'nonono', 'qwerty', 'Actif', '2021-07-19 12:20:41', '2021-07-19 12:20:41', '0000-00-00 00:00:00', 'Abdou Majeed ALIDOU', 'Abdou Majeed ALIDOU', ''),
(24, 'sssssssssssssssssssssssssssssssssssssssssssssss', 'nopsp', 'Actif', '2021-07-19 12:56:54', '2021-07-19 12:56:54', '0000-00-00 00:00:00', 'Abdou Majeed ALIDOU', 'Abdou Majeed ALIDOU', ''),
(25, 'qsww', '', 'Actif', '2021-07-19 13:00:20', '2021-07-19 13:00:20', '0000-00-00 00:00:00', 'Abdou Majeed ALIDOU', 'Abdou Majeed ALIDOU', ''),
(26, 'aa', '', 'Actif', '2021-07-19 13:01:13', '2021-07-19 13:01:13', '0000-00-00 00:00:00', 'Abdou Majeed ALIDOU', 'Abdou Majeed ALIDOU', ''),
(27, 'aswq', '', 'Actif', '2021-07-19 13:01:44', '2021-07-19 13:01:44', '0000-00-00 00:00:00', 'Abdou Majeed ALIDOU', 'Abdou Majeed ALIDOU', ''),
(28, 'ew', 'qw', 'Actif', '2021-07-22 11:55:38', '2021-07-22 11:55:38', '0000-00-00 00:00:00', 'Abdou Majeed ALIDOU', 'Abdou Majeed ALIDOU', ''),
(29, 'a', 'q', 'Actif', '2021-07-22 12:00:52', '2021-07-22 12:00:52', '0000-00-00 00:00:00', 'Abdou Majeed ALIDOU', 'Abdou Majeed ALIDOU', ''),
(30, 'bvgn\'kk', '', 'Actif', '2021-07-22 12:02:46', '2021-07-22 12:02:46', '0000-00-00 00:00:00', 'Abdou Majeed ALIDOU', 'Abdou Majeed ALIDOU', ''),
(31, 'hjbhjb bj\"jccf', '', 'Actif', '2021-07-22 12:03:05', '2021-07-22 12:03:05', '0000-00-00 00:00:00', 'Abdou Majeed ALIDOU', 'Abdou Majeed ALIDOU', ''),
(32, 'tomyr', 'der', 'Actif', '2021-07-23 13:26:17', '2021-07-23 13:26:17', '0000-00-00 00:00:00', 'Abdou Majeed ALIDOU', 'Abdou Majeed ALIDOU', '');

-- --------------------------------------------------------

--
-- Structure de la table `tarif_chambre`
--

CREATE TABLE `tarif_chambre` (
  `id_tarif_chambre` int(11) NOT NULL,
  `montant_tarif_chambre` double NOT NULL,
  `periode_tarif_chambre` text NOT NULL,
  `id_chambre_fk_tarif_chambre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tarif_chambre`
--

INSERT INTO `tarif_chambre` (`id_tarif_chambre`, `montant_tarif_chambre`, `periode_tarif_chambre`, `id_chambre_fk_tarif_chambre`) VALUES
(1, 70000, 'Hebdo', 2),
(2, 500000, 'Mensuel', 2);

-- --------------------------------------------------------

--
-- Structure de la table `type_chambre`
--

CREATE TABLE `type_chambre` (
  `id_type_chambre` int(11) NOT NULL,
  `nom_type_chambre` text NOT NULL,
  `desc_type_chambre` text NOT NULL,
  `date_create_type_chambre` datetime NOT NULL,
  `user_create_type_chambre` text NOT NULL,
  `date_last_modif_type_chambre` datetime NOT NULL,
  `user_last_modif_type_chambre` text NOT NULL,
  `date_del_type_chambre` datetime NOT NULL,
  `user_del_type_chambre` text NOT NULL,
  `statut_type_chambre` enum('Actif','Inactif') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `type_chambre`
--

INSERT INTO `type_chambre` (`id_type_chambre`, `nom_type_chambre`, `desc_type_chambre`, `date_create_type_chambre`, `user_create_type_chambre`, `date_last_modif_type_chambre`, `user_last_modif_type_chambre`, `date_del_type_chambre`, `user_del_type_chambre`, `statut_type_chambre`) VALUES
(4, 'Familiale', '', '2021-05-18 17:50:34', '', '2021-05-18 17:50:34', '', '0000-00-00 00:00:00', '', 'Actif'),
(5, 'Suite Presidentielle', '', '2021-05-28 12:10:09', '', '2021-05-28 12:10:09', '', '0000-00-00 00:00:00', '', 'Actif'),
(6, 'Single', '', '2021-05-28 12:10:30', '', '2021-05-28 12:10:30', '', '0000-00-00 00:00:00', '', 'Actif'),
(24, 't', '', '2021-05-28 17:55:38', '', '2021-06-01 12:35:36', 'Abdou Majeed ALIDOU', '0000-00-00 00:00:00', '', 'Actif'),
(25, 'new', '', '2021-05-28 17:56:07', '', '2021-05-28 17:56:07', '', '0000-00-00 00:00:00', '', 'Actif'),
(26, 'er', '', '2021-05-30 02:24:54', '', '2021-05-30 03:52:29', '', '0000-00-00 00:00:00', '', 'Actif'),
(27, 'tomy', '', '2021-05-30 16:49:58', '', '2021-05-30 16:49:58', '', '2021-06-01 16:06:28', 'John DOE', 'Actif'),
(28, 'type', 'chambre chic', '2021-05-30 16:51:28', '', '2021-06-01 16:34:42', 'John DOE', '2021-06-01 16:35:12', 'John DOE', 'Inactif'),
(29, 'aassaa', '', '2021-06-01 12:20:14', 'Abdou Majeed ALIDOU', '2021-06-01 15:55:05', 'John DOE', '2021-06-01 12:33:02', 'Abdou Majeed ALIDOU', 'Actif'),
(30, 'top top', '', '2021-06-01 14:51:02', 'Abdou Majeed ALIDOU', '2021-06-01 16:35:02', 'John DOE', '0000-00-00 00:00:00', '', 'Actif'),
(31, 'bbb', 'ggbb\r\nhhbnn\r\nhhhh\r\nhjnjn\r\njjnjjggbb\r\nhhbnn\r\nhhhh\r\nhjnjn\r\njjnjjggbb\r\nhhbnn\r\nhhhh\r\nhjnjn\r\njjnjjggbb\r\nhhbnn\r\nhhhh\r\nhjnjn\r\njjnjjggbb\r\nhhbnn\r\nhhhh\r\nhjnjn\r\njjnjjggbb\r\nhhbnn\r\nhhhh\r\nhjnjn\r\njjnjj', '2021-06-01 16:55:03', 'John DOE', '2021-06-01 16:55:42', 'John DOE', '0000-00-00 00:00:00', '', 'Actif');

-- --------------------------------------------------------

--
-- Structure de la table `type_compte`
--

CREATE TABLE `type_compte` (
  `id_type_compte` int(11) NOT NULL,
  `lib_type_compte` text NOT NULL,
  `statut_type_compte` enum('Actif','Inactif') NOT NULL,
  `date_create_type_compte` datetime NOT NULL,
  `user_create_type_compte` text NOT NULL,
  `date_last_modif_type_compte` datetime NOT NULL,
  `user_last_modif_type_compte` text NOT NULL,
  `date_del_type_compte` datetime NOT NULL,
  `user_del_type_compte` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `type_compte`
--

INSERT INTO `type_compte` (`id_type_compte`, `lib_type_compte`, `statut_type_compte`, `date_create_type_compte`, `user_create_type_compte`, `date_last_modif_type_compte`, `user_last_modif_type_compte`, `date_del_type_compte`, `user_del_type_compte`) VALUES
(1, 'Super Admin', 'Actif', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(2, 'Admin', 'Actif', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(3, 'Editeur', 'Actif', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(4, 'Auteur', 'Actif', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(5, 'Lecteur', 'Actif', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Structure de la table `type_plat`
--

CREATE TABLE `type_plat` (
  `id_type_plat` int(11) NOT NULL,
  `nom_type_plat` text NOT NULL,
  `desc_type_plat` text NOT NULL,
  `statut_type_plat` enum('Actif','Inactif') NOT NULL,
  `date_create_type_plat` datetime NOT NULL,
  `user_create_type_plat` text NOT NULL,
  `date_last_modif_type_plat` datetime NOT NULL,
  `user_last_modif_type_plat` text NOT NULL,
  `date_del_type_plat` datetime NOT NULL,
  `user_del_type_plat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `type_plat`
--

INSERT INTO `type_plat` (`id_type_plat`, `nom_type_plat`, `desc_type_plat`, `statut_type_plat`, `date_create_type_plat`, `user_create_type_plat`, `date_last_modif_type_plat`, `user_last_modif_type_plat`, `date_del_type_plat`, `user_del_type_plat`) VALUES
(1, 'dessert', 'mousseux', 'Actif', '2021-06-03 12:49:21', 'Abdou Majeed ALIDOU', '2021-06-03 17:44:07', 'Abdou Majeed ALIDOU', '0000-00-00 00:00:00', ''),
(2, 'sucrerie', 'sobebra', 'Actif', '2021-06-03 17:46:25', 'Abdou Majeed ALIDOU', '2021-06-03 17:46:25', 'Abdou Majeed ALIDOU', '0000-00-00 00:00:00', ''),
(3, 't', 'gg', 'Inactif', '2021-06-07 11:54:11', 'Abdou Majeed ALIDOU', '2021-06-07 11:54:42', 'Abdou Majeed ALIDOU', '2021-06-07 11:54:46', 'Abdou Majeed ALIDOU');

-- --------------------------------------------------------

--
-- Structure de la table `type_user`
--

CREATE TABLE `type_user` (
  `id_type_user` int(11) NOT NULL,
  `lib_type_user` text NOT NULL,
  `date_create_type_user` datetime NOT NULL,
  `date_last_modif_type_user` datetime NOT NULL,
  `date_del_type_user` datetime NOT NULL,
  `statut_type_user` enum('Actif','Inactif') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `type_user`
--

INSERT INTO `type_user` (`id_type_user`, `lib_type_user`, `date_create_type_user`, `date_last_modif_type_user`, `date_del_type_user`, `statut_type_user`) VALUES
(1, 'Super Admin', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Actif'),
(2, 'client', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Actif');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `pseudo_user` text NOT NULL,
  `nom_user` text NOT NULL,
  `prenom_user` text NOT NULL,
  `tel_user` text NOT NULL,
  `adresse_user` text NOT NULL,
  `email_user` text NOT NULL,
  `nationalite_user` text NOT NULL,
  `mdp_user` text NOT NULL,
  `idcard_user` text NOT NULL,
  `passeport_user` text NOT NULL,
  `date_create_user` datetime NOT NULL,
  `date_last_modif_user` datetime NOT NULL,
  `date_del_user` datetime NOT NULL,
  `statut_user` enum('Actif','Inactif') NOT NULL,
  `id_type_user_fk_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id_user`, `pseudo_user`, `nom_user`, `prenom_user`, `tel_user`, `adresse_user`, `email_user`, `nationalite_user`, `mdp_user`, `idcard_user`, `passeport_user`, `date_create_user`, `date_last_modif_user`, `date_del_user`, `statut_user`, `id_type_user_fk_user`) VALUES
(1, 'jps', 'Sessinou', 'Jean Pierre', '', '', 'jpsessinou@gmail.com', '', '$2y$10$p4OJ02Mfbb1evgPFbJndDuzs7n9A9Wo3.PssSPWCax2CM3IR4c9ia', '', '', '2021-05-16 00:00:00', '2021-05-16 00:00:00', '0000-00-00 00:00:00', 'Actif', 1),
(2, '', 'LAWANI', 'Aduni', '61567890', '', 'docteur@gmail.com', '', '', '101', 'un', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Actif', 2),
(3, '', 'babadoudou', 'olive', '90786545', '', 'reste@gmail.com', '', '', '0007', '000009', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Actif', 2),
(4, '', 'aaaa', 'bbbbb', '11111111', '', 'as@com', '', '', '0000', '0001', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Actif', 2),
(23, '', '', '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Actif', 2),
(24, '', '', '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Actif', 2),
(25, '', '', '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Actif', 2),
(26, '', '', '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Actif', 2),
(27, '', '', '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Actif', 2),
(28, '', '', '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Actif', 2),
(29, '', '', '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Actif', 2),
(30, '', '', '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Actif', 2),
(31, '', '', '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Actif', 2),
(32, '', 'Tom', 'Jerry', '1212', '', 'hg@jj', '', '', '112', '222', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Actif', 2),
(33, '', 'Tom', 'Jerry', '1212', '', 'hg@jj', '', '', '112', '222', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Actif', 2),
(34, '', 'r', 'q', '', '', '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Actif', 2),
(35, '', '', '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Actif', 2),
(36, '', 'f', 'sd', '', '', '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Actif', 2),
(37, '', 'babadoudou', 'roni', '90786545', '', '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Actif', 2),
(38, '', 'f', 'g', 'f', '', '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Actif', 2),
(39, '', '', '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Actif', 2),
(40, '', '', '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Actif', 2),
(41, '', '', '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Actif', 2),
(42, '', 'babadoudou', 'andre', '90786545', '', '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Actif', 2),
(43, '', '', '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Actif', 2),
(44, '', '', '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Actif', 2),
(45, '', 'f', 's', '2', '', '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Actif', 2),
(46, '', 'e', 's', 'dd', '', '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Actif', 2),
(47, '', 'e', 's', 'd', '', '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Actif', 2),
(48, '', '', '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Actif', 2),
(49, '', '', '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Actif', 2),
(50, '', '', '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Actif', 2),
(51, '', 'fc', 'c111', '11', '', '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Actif', 2),
(52, '', '', '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Actif', 2),
(53, '', '', '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Actif', 2),
(54, '', '', '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Actif', 2),
(55, '', 'John', 'Doe', '14432124', '', '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Actif', 2),
(56, '', '', '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Actif', 2),
(57, '', '', '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Actif', 2),
(58, '', '', '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Actif', 2),
(59, '', '', '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Actif', 2),
(60, '', '', '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Actif', 2),
(61, '', '', '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Actif', 2),
(62, '', '', '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Actif', 2),
(63, '', '', '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Actif', 2),
(64, '', '', '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Actif', 2),
(65, '', '', '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Actif', 2),
(66, '', '', '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Actif', 2),
(67, '', '', '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Actif', 2),
(68, '', '', '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Actif', 2),
(69, '', '', '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Actif', 2),
(70, '', '', '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Actif', 2),
(71, '', '', '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Actif', 2),
(72, '', '', '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Actif', 2),
(73, '', '', '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Actif', 2),
(74, '', '', '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Actif', 2),
(75, '', '', '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Actif', 2),
(76, '', '', '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Actif', 2),
(77, '', '', '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Actif', 2),
(78, '', '', '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Actif', 2),
(79, '', '', '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Actif', 2),
(80, '', '', '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Actif', 2),
(81, '', '', '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Actif', 2),
(82, '', '', '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Actif', 2),
(83, '', '', '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Actif', 2),
(84, '', '', '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Actif', 2),
(85, '', '', '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Actif', 2),
(86, '', '', '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Actif', 2),
(87, '', '', '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Actif', 2),
(88, '', '', '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Actif', 2),
(89, '', '', '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Actif', 2),
(90, '', '', '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Actif', 2),
(91, '', '', '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Actif', 2),
(92, '', '', '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Actif', 2),
(93, '', '', '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Actif', 2),
(94, '', '', '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Actif', 2),
(95, '', '', '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Actif', 2),
(96, '', '', '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Actif', 2),
(97, '', '', '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Actif', 2),
(98, '', '', '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Actif', 2),
(99, '', '', '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Actif', 2),
(100, '', '', '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Actif', 2),
(101, '', '', '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Actif', 2),
(102, '', '', '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Actif', 2),
(103, '', '', '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Actif', 2),
(104, '', '', '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Actif', 2),
(105, '', '', '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Actif', 2),
(106, '', '', '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Actif', 2),
(107, '', '', '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Actif', 2),
(108, '', '', '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Actif', 2),
(109, '', '', '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Actif', 2),
(110, '', '', '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Actif', 2),
(111, '', '', '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Actif', 2),
(112, '', '', '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Actif', 2);

-- --------------------------------------------------------

--
-- Structure de la table `voiture`
--

CREATE TABLE `voiture` (
  `id_voiture` int(11) NOT NULL,
  `modele_voiture` text NOT NULL,
  `immatriculation_voiture` text NOT NULL,
  `prix_achat_voiture` double NOT NULL,
  `desc_voiture` text NOT NULL,
  `date_achat_voiture` date NOT NULL,
  `etat_voiture` enum('Neuve','Occasion') NOT NULL,
  `statut_voiture` enum('Actif','Inactif') NOT NULL,
  `date_create_voiture` datetime NOT NULL,
  `user_create_voiture` text NOT NULL,
  `date_last_modif_voiture` datetime NOT NULL,
  `user_last_modif_voiture` text NOT NULL,
  `date_del_voiture` datetime NOT NULL,
  `user_del_voiture` text NOT NULL,
  `id_marque_voiture_fk_voiture` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `voiture`
--

INSERT INTO `voiture` (`id_voiture`, `modele_voiture`, `immatriculation_voiture`, `prix_achat_voiture`, `desc_voiture`, `date_achat_voiture`, `etat_voiture`, `statut_voiture`, `date_create_voiture`, `user_create_voiture`, `date_last_modif_voiture`, `user_last_modif_voiture`, `date_del_voiture`, `user_del_voiture`, `id_marque_voiture_fk_voiture`) VALUES
(14, 'Mercedes-Benz', '102589AM', 1000000, 'Vehicule ancien Heckflosse- w111', '2021-05-03', '', 'Actif', '2021-06-04 17:07:05', 'Abdou Majeed ALIDOU', '2021-06-04 17:07:52', 'Abdou Majeed ALIDOU', '0000-00-00 00:00:00', '', 17),
(15, 'Toyota Yaris', '120ZA41', 9000000, 'Petit modele', '2021-06-02', 'Neuve', 'Actif', '2021-06-04 17:14:24', 'Abdou Majeed ALIDOU', '2021-06-07 11:59:27', 'Abdou Majeed ALIDOU', '2021-06-08 17:20:04', 'Abdou Majeed ALIDOU', 15),
(16, 'zion', '122d32', 3000, '', '2021-06-17', 'Neuve', 'Actif', '2021-06-07 12:00:43', 'Abdou Majeed ALIDOU', '2021-06-07 12:01:37', 'Abdou Majeed ALIDOU', '0000-00-00 00:00:00', '', 15),
(17, 'rrf', 'rr', 23, 're', '2021-06-11', 'Neuve', 'Actif', '2021-06-07 13:50:39', 'Abdou Majeed ALIDOU', '2021-06-07 13:51:00', 'Abdou Majeed ALIDOU', '0000-00-00 00:00:00', '', 18);

-- --------------------------------------------------------

--
-- Structure de la table `voiturier`
--

CREATE TABLE `voiturier` (
  `id_voiturier` int(11) NOT NULL,
  `permis_voiturier` text NOT NULL,
  `id_personne_fk_voiturier` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `voiturier`
--

INSERT INTO `voiturier` (`id_voiturier`, `permis_voiturier`, `id_personne_fk_voiturier`) VALUES
(1, '1023956', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `addlog_table`
--
ALTER TABLE `addlog_table`
  ADD PRIMARY KEY (`id_addlog_table`);

--
-- Index pour la table `article_restau`
--
ALTER TABLE `article_restau`
  ADD PRIMARY KEY (`id_article_restau`);

--
-- Index pour la table `assoc_bar_produit_and_bar_cmde`
--
ALTER TABLE `assoc_bar_produit_and_bar_cmde`
  ADD PRIMARY KEY (`id_bar_produit_fk_assoc_bar_produit_and_bar_cmde`,`id_bar_cmde_fk_assoc_bar_produit_and_bar_cmde`),
  ADD KEY `id_bar_produit_fk_assoc_bar_produit_and_bar_cmde` (`id_bar_produit_fk_assoc_bar_produit_and_bar_cmde`),
  ADD KEY `id_bar_cmde_fk_assoc_bar_produit_and_bar_cmde` (`id_bar_cmde_fk_assoc_bar_produit_and_bar_cmde`);

--
-- Index pour la table `assoc_client_and_chambre`
--
ALTER TABLE `assoc_client_and_chambre`
  ADD PRIMARY KEY (`id_client_fk_assoc_client_and_chambre`,`id_chambre_fk_assoc_client_and_chambre`),
  ADD KEY `id_client_fk_assoc_client_and_chambre` (`id_client_fk_assoc_client_and_chambre`),
  ADD KEY `id_chambre_fk_assoc_client_and_chambre` (`id_chambre_fk_assoc_client_and_chambre`);

--
-- Index pour la table `assoc_client_and_chambre_occupee`
--
ALTER TABLE `assoc_client_and_chambre_occupee`
  ADD PRIMARY KEY (`id_assoc_client_and_chambre_occupee`,`id_client_fk_assoc_client_and_chambre_occupee`,`id_chambre_occupee_fk_assoc_client_and_chambre_occupee`),
  ADD KEY `id_client_fk_assoc_client_and_chambre_occupee` (`id_client_fk_assoc_client_and_chambre_occupee`,`id_chambre_occupee_fk_assoc_client_and_chambre_occupee`),
  ADD KEY `Rel Chambre Occupee et Assoc` (`id_chambre_occupee_fk_assoc_client_and_chambre_occupee`);

--
-- Index pour la table `assoc_compte_and_menu`
--
ALTER TABLE `assoc_compte_and_menu`
  ADD PRIMARY KEY (`id_compte_fk_assoc_compte_and_menu`,`id_menu_fk_assoc_compte_and_menu`),
  ADD KEY `id_compte_fk_assoc_compte_and_menu` (`id_compte_fk_assoc_compte_and_menu`,`id_menu_fk_assoc_compte_and_menu`),
  ADD KEY `Rel Menu et Assoc` (`id_menu_fk_assoc_compte_and_menu`);

--
-- Index pour la table `assoc_location_conf_and_service_conf`
--
ALTER TABLE `assoc_location_conf_and_service_conf`
  ADD PRIMARY KEY (`id_location_conf_fk_assoc_location_conf_and_service_conf`,`id_service_conf_fk_assoc_location_conf_and_service_conf`),
  ADD KEY `id_location_conf_fk_assoc_location_conf_and_service_conf` (`id_location_conf_fk_assoc_location_conf_and_service_conf`,`id_service_conf_fk_assoc_location_conf_and_service_conf`),
  ADD KEY `Rel Service Conf et Assoc` (`id_service_conf_fk_assoc_location_conf_and_service_conf`);

--
-- Index pour la table `assoc_salle_conf_and_carac_conf`
--
ALTER TABLE `assoc_salle_conf_and_carac_conf`
  ADD PRIMARY KEY (`id_salle_conf_fk_assoc_salle_conf_and_carac_conf`,`id_carac_conf_fk_assoc_salle_conf_and_carac_conf`),
  ADD KEY `id_salle_conf_fk_assoc_salle_conf_and_carac_conf` (`id_salle_conf_fk_assoc_salle_conf_and_carac_conf`,`id_carac_conf_fk_assoc_salle_conf_and_carac_conf`),
  ADD KEY `Rel Carac Conf et Assoc` (`id_carac_conf_fk_assoc_salle_conf_and_carac_conf`);

--
-- Index pour la table `assoc_type_chambre_and_carac_chambre`
--
ALTER TABLE `assoc_type_chambre_and_carac_chambre`
  ADD PRIMARY KEY (`id_type_chambre_fk_assoc_type_chambre_and_carac_chambre`,`id_carac_chambre_fk_assoc_type_chambre_and_carac_chambre`),
  ADD KEY `id_type_chambre_fk_assoc_type_chambre_and_carac_chambre` (`id_type_chambre_fk_assoc_type_chambre_and_carac_chambre`),
  ADD KEY `id_carac_chambre_fk_assoc_type_chambre_and_carac_chambre` (`id_carac_chambre_fk_assoc_type_chambre_and_carac_chambre`);

--
-- Index pour la table `bar_cmde`
--
ALTER TABLE `bar_cmde`
  ADD PRIMARY KEY (`id_bar_cmde`),
  ADD KEY `id_client_fk_bar_cmde` (`id_client_fk_bar_cmde`);

--
-- Index pour la table `bar_produit`
--
ALTER TABLE `bar_produit`
  ADD PRIMARY KEY (`id_bar_produit`);

--
-- Index pour la table `boisson`
--
ALTER TABLE `boisson`
  ADD PRIMARY KEY (`id_boisson`);

--
-- Index pour la table `carac_chambre`
--
ALTER TABLE `carac_chambre`
  ADD PRIMARY KEY (`id_carac_chambre`);

--
-- Index pour la table `carac_conf`
--
ALTER TABLE `carac_conf`
  ADD PRIMARY KEY (`id_carac_conf`);

--
-- Index pour la table `chambre`
--
ALTER TABLE `chambre`
  ADD PRIMARY KEY (`id_chambre`),
  ADD KEY `id_type_chambre_fk_chambre` (`id_type_chambre_fk_chambre`);

--
-- Index pour la table `chambre_occupee`
--
ALTER TABLE `chambre_occupee`
  ADD PRIMARY KEY (`id_chambre_occupee`),
  ADD KEY `id_chambre_fk_chambre_occupee` (`id_chambre_fk_chambre_occupee`),
  ADD KEY `id_reservation_fk_chambre_occupee` (`id_reservation_fk_chambre_occupee`);

--
-- Index pour la table `chambre_reservee`
--
ALTER TABLE `chambre_reservee`
  ADD PRIMARY KEY (`id_chambre_reservee`),
  ADD KEY `id_reservation_chambre_reservee` (`id_reservation_fk_chambre_reservee`),
  ADD KEY `id_chambre_fk_chambre_reservee` (`id_chambre_fk_chambre_reservee`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id_client`),
  ADD KEY `id_personne_fk_client` (`id_personne_fk_client`);

--
-- Index pour la table `compte`
--
ALTER TABLE `compte`
  ADD PRIMARY KEY (`id_compte`),
  ADD KEY `id_personne_fk_compte` (`id_personne_fk_compte`),
  ADD KEY `id_type_compte_fk_compte` (`id_type_compte_fk_compte`);

--
-- Index pour la table `facture_conf`
--
ALTER TABLE `facture_conf`
  ADD PRIMARY KEY (`id_facture_conf`),
  ADD KEY `id_location_conf_fk_facture_conf` (`id_location_conf_fk_facture_conf`);

--
-- Index pour la table `facture_spa`
--
ALTER TABLE `facture_spa`
  ADD PRIMARY KEY (`id_facture_spa`),
  ADD KEY `id_methode_paiement_fk_facture_spa` (`id_methode_paiement_fk_facture_spa`),
  ADD KEY `id_prestation_spa_fk_facture_spa` (`id_prestation_spa_fk_facture_spa`);

--
-- Index pour la table `location_conf`
--
ALTER TABLE `location_conf`
  ADD PRIMARY KEY (`id_location_conf`),
  ADD KEY `id_salle_conf_fk_location_conf` (`id_salle_conf_fk_location_conf`),
  ADD KEY `id_client_fk_location_conf` (`id_client_fk_location_conf`);

--
-- Index pour la table `location_voiture`
--
ALTER TABLE `location_voiture`
  ADD PRIMARY KEY (`id_location_voiture`),
  ADD KEY `id_voiture_fk_location_voiture` (`id_voiture_fk_location_voiture`),
  ADD KEY `id_client_fk_location_voiture` (`id_client_fk_location_voiture`),
  ADD KEY `id_voiturier_fk_location_voiture` (`id_voiturier_fk_location_voiture`);

--
-- Index pour la table `marque_voiture`
--
ALTER TABLE `marque_voiture`
  ADD PRIMARY KEY (`id_marque_voiture`);

--
-- Index pour la table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Index pour la table `methode_paiement`
--
ALTER TABLE `methode_paiement`
  ADD PRIMARY KEY (`id_methode_paiement`);

--
-- Index pour la table `personne`
--
ALTER TABLE `personne`
  ADD PRIMARY KEY (`id_personne`);

--
-- Index pour la table `plat`
--
ALTER TABLE `plat`
  ADD PRIMARY KEY (`id_plat`),
  ADD KEY `id_type_plat_fk_plat` (`id_type_plat_fk_plat`);

--
-- Index pour la table `prestation_spa`
--
ALTER TABLE `prestation_spa`
  ADD PRIMARY KEY (`id_prestation_spa`),
  ADD KEY `id_client_fk_prestation_spa` (`id_client_fk_prestation_spa`),
  ADD KEY `id_soins_spa_fk_prestation_spa` (`id_soins_spa_fk_prestation_spa`);

--
-- Index pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id_reservation`),
  ADD KEY `id_client_fk` (`id_client_fk_reservation`);

--
-- Index pour la table `salle_conf`
--
ALTER TABLE `salle_conf`
  ADD PRIMARY KEY (`id_salle_conf`);

--
-- Index pour la table `service_conf`
--
ALTER TABLE `service_conf`
  ADD PRIMARY KEY (`id_service_conf`);

--
-- Index pour la table `soins_spa`
--
ALTER TABLE `soins_spa`
  ADD PRIMARY KEY (`id_soins_spa`);

--
-- Index pour la table `tarif_chambre`
--
ALTER TABLE `tarif_chambre`
  ADD PRIMARY KEY (`id_tarif_chambre`),
  ADD KEY `id_chambre_fk_tarif_chambre` (`id_chambre_fk_tarif_chambre`);

--
-- Index pour la table `type_chambre`
--
ALTER TABLE `type_chambre`
  ADD PRIMARY KEY (`id_type_chambre`);

--
-- Index pour la table `type_compte`
--
ALTER TABLE `type_compte`
  ADD PRIMARY KEY (`id_type_compte`);

--
-- Index pour la table `type_plat`
--
ALTER TABLE `type_plat`
  ADD PRIMARY KEY (`id_type_plat`);

--
-- Index pour la table `type_user`
--
ALTER TABLE `type_user`
  ADD PRIMARY KEY (`id_type_user`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_type_user_fk_user` (`id_type_user_fk_user`);

--
-- Index pour la table `voiture`
--
ALTER TABLE `voiture`
  ADD PRIMARY KEY (`id_voiture`),
  ADD KEY `id_marque_voiture_fk_voiture` (`id_marque_voiture_fk_voiture`);

--
-- Index pour la table `voiturier`
--
ALTER TABLE `voiturier`
  ADD PRIMARY KEY (`id_voiturier`),
  ADD KEY `id_personne_fk_voiturier` (`id_personne_fk_voiturier`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `addlog_table`
--
ALTER TABLE `addlog_table`
  MODIFY `id_addlog_table` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3063;

--
-- AUTO_INCREMENT pour la table `article_restau`
--
ALTER TABLE `article_restau`
  MODIFY `id_article_restau` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `bar_cmde`
--
ALTER TABLE `bar_cmde`
  MODIFY `id_bar_cmde` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `bar_produit`
--
ALTER TABLE `bar_produit`
  MODIFY `id_bar_produit` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `boisson`
--
ALTER TABLE `boisson`
  MODIFY `id_boisson` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `carac_chambre`
--
ALTER TABLE `carac_chambre`
  MODIFY `id_carac_chambre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `carac_conf`
--
ALTER TABLE `carac_conf`
  MODIFY `id_carac_conf` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `chambre`
--
ALTER TABLE `chambre`
  MODIFY `id_chambre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `chambre_occupee`
--
ALTER TABLE `chambre_occupee`
  MODIFY `id_chambre_occupee` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `chambre_reservee`
--
ALTER TABLE `chambre_reservee`
  MODIFY `id_chambre_reservee` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `id_client` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT pour la table `compte`
--
ALTER TABLE `compte`
  MODIFY `id_compte` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `facture_conf`
--
ALTER TABLE `facture_conf`
  MODIFY `id_facture_conf` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `facture_spa`
--
ALTER TABLE `facture_spa`
  MODIFY `id_facture_spa` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `location_conf`
--
ALTER TABLE `location_conf`
  MODIFY `id_location_conf` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT pour la table `location_voiture`
--
ALTER TABLE `location_voiture`
  MODIFY `id_location_voiture` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `marque_voiture`
--
ALTER TABLE `marque_voiture`
  MODIFY `id_marque_voiture` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT pour la table `methode_paiement`
--
ALTER TABLE `methode_paiement`
  MODIFY `id_methode_paiement` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `personne`
--
ALTER TABLE `personne`
  MODIFY `id_personne` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `plat`
--
ALTER TABLE `plat`
  MODIFY `id_plat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `prestation_spa`
--
ALTER TABLE `prestation_spa`
  MODIFY `id_prestation_spa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id_reservation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- AUTO_INCREMENT pour la table `salle_conf`
--
ALTER TABLE `salle_conf`
  MODIFY `id_salle_conf` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT pour la table `service_conf`
--
ALTER TABLE `service_conf`
  MODIFY `id_service_conf` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `soins_spa`
--
ALTER TABLE `soins_spa`
  MODIFY `id_soins_spa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT pour la table `tarif_chambre`
--
ALTER TABLE `tarif_chambre`
  MODIFY `id_tarif_chambre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `type_chambre`
--
ALTER TABLE `type_chambre`
  MODIFY `id_type_chambre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT pour la table `type_compte`
--
ALTER TABLE `type_compte`
  MODIFY `id_type_compte` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `type_plat`
--
ALTER TABLE `type_plat`
  MODIFY `id_type_plat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `type_user`
--
ALTER TABLE `type_user`
  MODIFY `id_type_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT pour la table `voiture`
--
ALTER TABLE `voiture`
  MODIFY `id_voiture` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `voiturier`
--
ALTER TABLE `voiturier`
  MODIFY `id_voiturier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `assoc_bar_produit_and_bar_cmde`
--
ALTER TABLE `assoc_bar_produit_and_bar_cmde`
  ADD CONSTRAINT `Rel Bar Cmde Assoc` FOREIGN KEY (`id_bar_cmde_fk_assoc_bar_produit_and_bar_cmde`) REFERENCES `bar_cmde` (`id_bar_cmde`),
  ADD CONSTRAINT `Rel Bar Produit Assoc` FOREIGN KEY (`id_bar_produit_fk_assoc_bar_produit_and_bar_cmde`) REFERENCES `bar_produit` (`id_bar_produit`);

--
-- Contraintes pour la table `assoc_client_and_chambre`
--
ALTER TABLE `assoc_client_and_chambre`
  ADD CONSTRAINT `Rel Chambre Assoc` FOREIGN KEY (`id_chambre_fk_assoc_client_and_chambre`) REFERENCES `chambre` (`id_chambre`),
  ADD CONSTRAINT `Rel Client Assoc` FOREIGN KEY (`id_client_fk_assoc_client_and_chambre`) REFERENCES `client` (`id_client`);

--
-- Contraintes pour la table `assoc_client_and_chambre_occupee`
--
ALTER TABLE `assoc_client_and_chambre_occupee`
  ADD CONSTRAINT `Rel Chambre Occupee et Assoc` FOREIGN KEY (`id_chambre_occupee_fk_assoc_client_and_chambre_occupee`) REFERENCES `chambre_occupee` (`id_chambre_occupee`),
  ADD CONSTRAINT `Rel Client et Assoc` FOREIGN KEY (`id_client_fk_assoc_client_and_chambre_occupee`) REFERENCES `client` (`id_client`);

--
-- Contraintes pour la table `assoc_compte_and_menu`
--
ALTER TABLE `assoc_compte_and_menu`
  ADD CONSTRAINT `Rel Compte et Assoc` FOREIGN KEY (`id_compte_fk_assoc_compte_and_menu`) REFERENCES `compte` (`id_compte`),
  ADD CONSTRAINT `Rel Menu et Assoc` FOREIGN KEY (`id_menu_fk_assoc_compte_and_menu`) REFERENCES `menu` (`id_menu`);

--
-- Contraintes pour la table `assoc_location_conf_and_service_conf`
--
ALTER TABLE `assoc_location_conf_and_service_conf`
  ADD CONSTRAINT `Rel Location Conf et Assoc` FOREIGN KEY (`id_location_conf_fk_assoc_location_conf_and_service_conf`) REFERENCES `location_conf` (`id_location_conf`),
  ADD CONSTRAINT `Rel Service Conf et Assoc` FOREIGN KEY (`id_service_conf_fk_assoc_location_conf_and_service_conf`) REFERENCES `service_conf` (`id_service_conf`);

--
-- Contraintes pour la table `assoc_salle_conf_and_carac_conf`
--
ALTER TABLE `assoc_salle_conf_and_carac_conf`
  ADD CONSTRAINT `Rel Carac Conf et Assoc` FOREIGN KEY (`id_carac_conf_fk_assoc_salle_conf_and_carac_conf`) REFERENCES `carac_conf` (`id_carac_conf`),
  ADD CONSTRAINT `Rel Salle Conf et Assoc` FOREIGN KEY (`id_salle_conf_fk_assoc_salle_conf_and_carac_conf`) REFERENCES `salle_conf` (`id_salle_conf`);

--
-- Contraintes pour la table `assoc_type_chambre_and_carac_chambre`
--
ALTER TABLE `assoc_type_chambre_and_carac_chambre`
  ADD CONSTRAINT `Rel Carac chambre Assoc` FOREIGN KEY (`id_carac_chambre_fk_assoc_type_chambre_and_carac_chambre`) REFERENCES `carac_chambre` (`id_carac_chambre`),
  ADD CONSTRAINT `Rel Type chambre Assoc` FOREIGN KEY (`id_type_chambre_fk_assoc_type_chambre_and_carac_chambre`) REFERENCES `type_chambre` (`id_type_chambre`);

--
-- Contraintes pour la table `bar_cmde`
--
ALTER TABLE `bar_cmde`
  ADD CONSTRAINT `Rel Client Bar Cmde` FOREIGN KEY (`id_client_fk_bar_cmde`) REFERENCES `client` (`id_client`);

--
-- Contraintes pour la table `chambre`
--
ALTER TABLE `chambre`
  ADD CONSTRAINT `Rel Type chambre Et Chambre` FOREIGN KEY (`id_type_chambre_fk_chambre`) REFERENCES `type_chambre` (`id_type_chambre`);

--
-- Contraintes pour la table `chambre_occupee`
--
ALTER TABLE `chambre_occupee`
  ADD CONSTRAINT `Rel Chambre Occupee et Chambre` FOREIGN KEY (`id_chambre_fk_chambre_occupee`) REFERENCES `chambre` (`id_chambre`),
  ADD CONSTRAINT `Rel Chambre Occupee et Reservation` FOREIGN KEY (`id_reservation_fk_chambre_occupee`) REFERENCES `reservation` (`id_reservation`);

--
-- Contraintes pour la table `chambre_reservee`
--
ALTER TABLE `chambre_reservee`
  ADD CONSTRAINT `Rel Chambre Reservee et Chambre` FOREIGN KEY (`id_chambre_fk_chambre_reservee`) REFERENCES `chambre` (`id_chambre`),
  ADD CONSTRAINT `Rel Chambre Reservee et Reservation` FOREIGN KEY (`id_reservation_fk_chambre_reservee`) REFERENCES `reservation` (`id_reservation`);

--
-- Contraintes pour la table `client`
--
ALTER TABLE `client`
  ADD CONSTRAINT `Rel Personne et Client` FOREIGN KEY (`id_personne_fk_client`) REFERENCES `personne` (`id_personne`);

--
-- Contraintes pour la table `compte`
--
ALTER TABLE `compte`
  ADD CONSTRAINT `Rel Personne et Compte` FOREIGN KEY (`id_personne_fk_compte`) REFERENCES `personne` (`id_personne`),
  ADD CONSTRAINT `Rel Type Compte et Compte` FOREIGN KEY (`id_type_compte_fk_compte`) REFERENCES `type_compte` (`id_type_compte`);

--
-- Contraintes pour la table `facture_conf`
--
ALTER TABLE `facture_conf`
  ADD CONSTRAINT `Rel Location Conf et Facture Conf` FOREIGN KEY (`id_location_conf_fk_facture_conf`) REFERENCES `location_conf` (`id_location_conf`);

--
-- Contraintes pour la table `facture_spa`
--
ALTER TABLE `facture_spa`
  ADD CONSTRAINT `Rel Methode Paiement et Facture Spa` FOREIGN KEY (`id_methode_paiement_fk_facture_spa`) REFERENCES `methode_paiement` (`id_methode_paiement`),
  ADD CONSTRAINT `Rel Prestation et Facture Spa` FOREIGN KEY (`id_prestation_spa_fk_facture_spa`) REFERENCES `prestation_spa` (`id_prestation_spa`);

--
-- Contraintes pour la table `location_conf`
--
ALTER TABLE `location_conf`
  ADD CONSTRAINT `Rel Location Conf et Client` FOREIGN KEY (`id_client_fk_location_conf`) REFERENCES `client` (`id_client`),
  ADD CONSTRAINT `Rel Location Conf et Salle Conf` FOREIGN KEY (`id_salle_conf_fk_location_conf`) REFERENCES `salle_conf` (`id_salle_conf`);

--
-- Contraintes pour la table `plat`
--
ALTER TABLE `plat`
  ADD CONSTRAINT `rel type plat et plat` FOREIGN KEY (`id_type_plat_fk_plat`) REFERENCES `plat` (`id_plat`);

--
-- Contraintes pour la table `prestation_spa`
--
ALTER TABLE `prestation_spa`
  ADD CONSTRAINT `Rel Client et Prestation Spa` FOREIGN KEY (`id_client_fk_prestation_spa`) REFERENCES `client` (`id_client`),
  ADD CONSTRAINT `Rel Soins Spa et Prestation Spa` FOREIGN KEY (`id_soins_spa_fk_prestation_spa`) REFERENCES `soins_spa` (`id_soins_spa`);

--
-- Contraintes pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `Rel Client et Reservation` FOREIGN KEY (`id_client_fk_reservation`) REFERENCES `client` (`id_client`);

--
-- Contraintes pour la table `tarif_chambre`
--
ALTER TABLE `tarif_chambre`
  ADD CONSTRAINT `Rel Chambre et Tarif` FOREIGN KEY (`id_chambre_fk_tarif_chambre`) REFERENCES `chambre` (`id_chambre`);

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `Rel Type User et User` FOREIGN KEY (`id_type_user_fk_user`) REFERENCES `type_user` (`id_type_user`);

--
-- Contraintes pour la table `voiture`
--
ALTER TABLE `voiture`
  ADD CONSTRAINT `rel voiture et marque_voiture` FOREIGN KEY (`id_marque_voiture_fk_voiture`) REFERENCES `marque_voiture` (`id_marque_voiture`);

--
-- Contraintes pour la table `voiturier`
--
ALTER TABLE `voiturier`
  ADD CONSTRAINT `rel personne et voiturier` FOREIGN KEY (`id_personne_fk_voiturier`) REFERENCES `personne` (`id_personne`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
