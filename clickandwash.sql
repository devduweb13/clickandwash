-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 14 Mars 2016 à 07:48
-- Version du serveur :  10.1.8-MariaDB
-- Version de PHP :  5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `clickandwash`
--

-- --------------------------------------------------------

--
-- Structure de la table `adresseclients`
--

CREATE TABLE `adresseclients` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `cp` int(5) NOT NULL,
  `ville` varchar(255) NOT NULL,
  `lat` varchar(255) NOT NULL,
  `lon` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `adresseclients`
--

INSERT INTO `adresseclients` (`id`, `name`, `adresse`, `cp`, `ville`, `lat`, `lon`) VALUES
(1, 'Maison', '10 route de galice', 13100, 'Aix en provence', '43.5286111', '5.4341207'),
(2, 'Bureau', '25 av du prado', 13006, 'Marseille', '43.2842901', '5.3851302'),
(3, 'Maison', '27 ter av des benezits', 13720, 'La bouilladisse', '43.4008456', '5.5873855'),
(4, 'Travail', '1 rue du rome', 13006, 'marseille', '43.2957666', '5.3783087');

-- --------------------------------------------------------

--
-- Structure de la table `adresses`
--

CREATE TABLE `adresses` (
  `id` int(11) NOT NULL,
  `preparateur_id` int(11) NOT NULL,
  `lat` varchar(25) NOT NULL,
  `lon` varchar(25) NOT NULL,
  `rayon` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `adresses`
--

INSERT INTO `adresses` (`id`, `preparateur_id`, `lat`, `lon`, `rayon`) VALUES
(16, 46, '43.254568', '5.550559', 60),
(17, 47, '43.2891514', '5.3642087', 15),
(18, 48, '43.2926781', '5.5676425', 10),
(19, 49, '43.2700929', '5.3872172', 2),
(20, 56, '43.2926781', '5.5676425', 60);

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `name` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `vehiculeclient_id` varchar(250) NOT NULL,
  `adresseclient_id` varchar(250) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `tel` int(10) NOT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `clients`
--

INSERT INTO `clients` (`id`, `username`, `password`, `name`, `prenom`, `vehiculeclient_id`, `adresseclient_id`, `mail`, `tel`, `active`) VALUES
(18, 'jim', '$2y$10$YSn111HVeaFXyP8F2fe2yuc4/RXBnShI7Sviob1gVy6A.V08jhw7y', 'Turkemenian', 'Berengere', '', '', 'test@test.fre', 624991274, 1);

-- --------------------------------------------------------

--
-- Structure de la table `configurations`
--

CREATE TABLE `configurations` (
  `id` int(11) NOT NULL,
  `nom_exp` varchar(255) NOT NULL,
  `email_exp` varchar(255) NOT NULL,
  `taux_tva` float NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `configurations`
--

INSERT INTO `configurations` (`id`, `nom_exp`, `email_exp`, `taux_tva`, `created`, `modified`) VALUES
(1, 'Click And Wash', 'contact@clickandwash.com', 2, '2016-03-02 13:57:32', '2016-03-02 15:01:55');

-- --------------------------------------------------------

--
-- Structure de la table `horraires`
--

CREATE TABLE `horraires` (
  `id` int(11) NOT NULL,
  `preparateur_id` int(11) NOT NULL,
  `lm1` varchar(8) NOT NULL,
  `lm2` varchar(8) NOT NULL,
  `la1` varchar(8) NOT NULL,
  `la2` varchar(8) NOT NULL,
  `mm1` varchar(8) NOT NULL,
  `mm2` varchar(8) NOT NULL,
  `ma1` varchar(8) NOT NULL,
  `ma2` varchar(8) NOT NULL,
  `mem1` varchar(8) NOT NULL,
  `mem2` varchar(8) NOT NULL,
  `mea1` varchar(8) NOT NULL,
  `mea2` varchar(8) NOT NULL,
  `jm1` varchar(8) NOT NULL,
  `jm2` varchar(8) NOT NULL,
  `ja1` varchar(8) NOT NULL,
  `ja2` varchar(8) NOT NULL,
  `vm1` varchar(8) NOT NULL,
  `vm2` varchar(8) NOT NULL,
  `va1` varchar(8) NOT NULL,
  `va2` varchar(8) NOT NULL,
  `sm1` varchar(8) NOT NULL,
  `sm2` varchar(8) NOT NULL,
  `sa1` varchar(8) NOT NULL,
  `sa2` varchar(8) NOT NULL,
  `dm1` varchar(8) NOT NULL,
  `dm2` varchar(8) NOT NULL,
  `da1` varchar(8) NOT NULL,
  `da2` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `horraires`
--

INSERT INTO `horraires` (`id`, `preparateur_id`, `lm1`, `lm2`, `la1`, `la2`, `mm1`, `mm2`, `ma1`, `ma2`, `mem1`, `mem2`, `mea1`, `mea2`, `jm1`, `jm2`, `ja1`, `ja2`, `vm1`, `vm2`, `va1`, `va2`, `sm1`, `sm2`, `sa1`, `sa2`, `dm1`, `dm2`, `da1`, `da2`) VALUES
(5, 47, '10:00', '13:00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(6, 48, '09:00', '13:00', '14:00', '18:00', '09:00', '13:00', '14:00', '18:00', '09:00', '13:00', '14:00', '20:00', '09:00', '12:00', '', '', '', '', '17:15', '', '', '', '', '', '', '', '', ''),
(7, 49, '17:45', '16:15', '', '', '10:00', '14:30', '', '', '10:00', '14:15', '', '', '18:15', '', '', '', '', '', '', '', '', '', '', '', '', '', '17:15', ''),
(8, 56, '09:00', '13:15', '14:30', '19:00', '09:00', '13:00', '14:00', '18:00', '09:00', '12:30', '14:15', '17:00', '09:00', '13:00', '14:15', '17:00', '', ' ', '14:15', '18:00', '', '', '13:00', '20:00', '', '', '', ''),
(46, 46, '09:00', '13:00', '14:30', '18:00', '10:00', '13:00', '14:30', '19:00', '10:00', '13:00', '14:30', '19:00', '10:00', '13:00', '14:30', '19:00', '10:00', '13:00  ', '14:30', '19:00', '09:00', '13:00', '14:30', '20:00', '', '', '', '');

-- --------------------------------------------------------

--
-- Structure de la table `marques`
--

CREATE TABLE `marques` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `marques`
--

INSERT INTO `marques` (`id`, `name`) VALUES
(1, 'Citroën'),
(2, 'Peugeot'),
(3, 'Renault'),
(4, 'Abarth'),
(5, 'Aleko'),
(6, 'Alfa Romeo'),
(7, 'Alpina'),
(8, 'Aro'),
(9, 'Aston Martin'),
(10, 'Audi'),
(11, 'Austin'),
(12, 'Autres'),
(13, 'Auverland'),
(14, 'BMW'),
(15, 'Bentley'),
(16, 'Bertone'),
(17, 'Buggy'),
(18, 'Buick'),
(19, 'Cadillac'),
(20, 'Caterham'),
(21, 'Chevrolet'),
(22, 'Chrysler'),
(23, 'Citroën'),
(24, 'Corvette'),
(25, 'Dacia'),
(26, 'Daewoo'),
(27, 'Daihatsu'),
(28, 'Daimler'),
(29, 'Dangel'),
(30, 'De la Chapelle'),
(31, 'Dodge'),
(32, 'Donkervoort'),
(33, 'Ferrari'),
(34, 'Fiat'),
(35, 'Ford'),
(36, 'GMC'),
(37, 'Honda'),
(38, 'Hummer'),
(39, 'Hyundai'),
(40, 'Infiniti'),
(41, 'Isuzu'),
(42, 'Jaguar'),
(43, 'Jeep'),
(44, 'Kia'),
(45, 'Lada'),
(46, 'Lamborghini'),
(47, 'Lancia'),
(48, 'Land-Rover'),
(49, 'Landwin'),
(50, 'Lexus'),
(51, 'Lotus'),
(52, 'MG'),
(53, 'Mahindra'),
(54, 'Maruti'),
(55, 'Maserati'),
(56, 'Maybach'),
(57, 'Mazda'),
(58, 'Mega'),
(59, 'Mercedes'),
(60, 'Mini'),
(61, 'Mitsubishi'),
(62, 'Morgan'),
(63, 'Nissan'),
(64, 'Opel'),
(65, 'PGO'),
(66, 'Peugeot'),
(67, 'Polski/FSO'),
(68, 'Pontiac'),
(69, 'Porsche'),
(70, 'Proton'),
(71, 'Renault'),
(72, 'Rolls-Royce'),
(73, 'Rover'),
(74, 'Saab'),
(75, 'Santana'),
(76, 'Seat'),
(77, 'Shuanghuan'),
(78, 'Skoda'),
(79, 'Smart'),
(80, 'Ssangyong'),
(81, 'Subaru'),
(82, 'Suzuki'),
(83, 'TVR'),
(84, 'Talbot'),
(85, 'Tata'),
(86, 'Tesla'),
(87, 'Toyota'),
(88, 'Venturi'),
(89, 'Volkswagen'),
(90, 'Volvo');

-- --------------------------------------------------------

--
-- Structure de la table `modeles`
--

CREATE TABLE `modeles` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `marque_id` int(11) NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `modeles`
--

INSERT INTO `modeles` (`id`, `name`, `marque_id`, `type`) VALUES
(1, '1007', 2, 1),
(2, '104', 2, 2),
(3, '106', 2, 0),
(4, '107', 2, 0),
(5, '108', 2, 3),
(6, '2008', 2, 0),
(7, '205', 2, 0),
(8, '206', 2, 0),
(9, '206 CC', 2, 0),
(10, '206 SW', 2, 0),
(11, '207', 2, 0),
(12, '207 CC', 2, 0),
(13, '207 SW', 2, 0),
(14, '208', 2, 0),
(15, '3008', 2, 0),
(16, '301', 2, 0),
(17, '305', 2, 0),
(18, '306', 2, 0),
(19, '307', 2, 0),
(20, '307 CC', 2, 0),
(21, '307 SW', 2, 0),
(22, '308', 2, 0),
(23, '308 CC', 2, 0),
(24, '308 SW', 2, 0),
(25, '309', 2, 0),
(26, '4007', 2, 0),
(27, '4008', 2, 0),
(28, '405', 2, 0),
(29, '406', 2, 0),
(30, '406 Coupe', 2, 0),
(31, '407', 2, 0),
(32, '407 Coupe', 2, 0),
(33, '407 SW', 2, 0),
(34, '5008', 2, 0),
(35, '504', 2, 0),
(36, '505', 2, 0),
(37, '508', 2, 0),
(38, '508 SW', 2, 0),
(39, '605', 2, 0),
(40, '607', 2, 0),
(41, '806', 2, 0),
(42, '807', 2, 0),
(43, 'Bipper tepee', 2, 0),
(44, 'Expert tepee', 2, 0),
(45, 'iOn', 2, 0),
(46, 'Partner', 2, 0),
(47, 'Partner Tepee', 2, 0),
(48, 'RCZ', 2, 0),
(49, 'Divers', 2, 0),
(50, 'Alpine', 3, 0),
(51, 'Avantime', 3, 0),
(52, 'Captur', 3, 0),
(53, 'Clio', 3, 0),
(54, 'Clio II', 3, 0),
(55, 'Clio III', 3, 0),
(56, 'Clio III Estate', 3, 0),
(57, 'Clio IV', 3, 0),
(58, 'Clio IV Estate', 3, 0),
(59, 'Espace', 3, 0),
(60, 'Express', 3, 0),
(61, 'Fluence', 3, 0),
(62, 'Grand Espace', 3, 0),
(63, 'Grand Modus', 3, 0),
(64, 'Grand Scénic II', 3, 0),
(65, 'Grand Scénic III', 3, 0),
(66, 'Kadjar', 3, 0),
(67, 'Kangoo', 3, 0),
(68, 'Koleos', 3, 0),
(69, 'Laguna', 3, 0),
(70, 'Laguna II', 3, 0),
(71, 'Laguna II Estate', 3, 0),
(72, 'Laguna III', 3, 0),
(73, 'Laguna III Coupé', 3, 0),
(74, 'Laguna III Estate', 3, 0),
(75, 'Latitude', 3, 0),
(76, 'Mégane', 3, 0),
(77, 'Mégane Cabriolet', 3, 0),
(78, 'Mégane Classic', 3, 0),
(79, 'Mégane Coupé', 3, 0),
(80, 'Mégane II', 3, 0),
(81, 'Mégane II CC', 3, 0),
(82, 'Mégane II Coupé', 3, 0),
(83, 'Mégane II Estate', 3, 0),
(84, 'Mégane III', 3, 0),
(85, 'Mégane III CC', 3, 0),
(86, 'Mégane III Coupé', 3, 0),
(87, 'Mégane III Estate', 3, 0),
(88, 'Megane IV', 3, 0),
(89, 'Modus', 3, 0),
(90, 'Nevada', 3, 0),
(91, 'R11', 3, 0),
(92, 'R18', 3, 0),
(93, 'R19', 3, 0),
(94, 'R20', 3, 0),
(95, 'R21', 3, 0),
(96, 'R25', 3, 0),
(97, 'R30', 3, 0),
(98, 'R4', 3, 0),
(99, 'R5', 3, 0),
(100, 'R9', 3, 0),
(101, 'Rodéo', 3, 0),
(102, 'Safrane', 3, 0),
(103, 'Scénic', 3, 0),
(104, 'Scénic II', 3, 0),
(105, 'Scénic III', 3, 0),
(106, 'Scenic xmod', 3, 0),
(107, 'Spider Sport', 3, 0),
(108, 'Super 5', 3, 0),
(109, 'Talisman', 3, 0),
(110, 'Trafic', 3, 0),
(111, 'Twingo', 3, 0),
(112, 'Twingo II', 3, 0),
(113, 'Twingo III', 3, 0),
(114, 'Twizy', 3, 0),
(115, 'Vel Satis', 3, 0),
(116, 'Wind', 3, 0),
(117, 'Zoé', 3, 0),
(118, 'Divers', 3, 0),
(119, '500', 4, 0),
(120, 'Grande Punto', 4, 0),
(121, '2141', 5, 0),
(122, 'Divers', 5, 0),
(123, 'B10', 7, 0),
(124, 'B12', 7, 0),
(125, 'B3', 7, 0),
(126, 'B6', 7, 0),
(127, 'Divers', 7, 0),
(128, 'Aro 10', 8, 0),
(129, 'Aro 24', 8, 0),
(130, 'Cross Lander', 8, 0),
(131, 'Forester', 8, 0),
(132, 'Pick-up', 8, 0),
(133, 'Spartana', 8, 0),
(134, 'Trapeurs', 8, 0),
(135, 'Divers', 8, 0),
(136, '100', 10, 0),
(137, '200', 10, 0),
(138, '80', 10, 0),
(139, '90', 10, 0),
(140, 'A1', 10, 0),
(141, 'A2', 10, 0),
(142, 'A3', 10, 0),
(143, 'A4', 10, 0),
(144, 'A5', 10, 0),
(145, 'A6', 10, 0),
(146, 'A7', 10, 0),
(147, 'A8', 10, 0),
(148, 'Allroad', 10, 0),
(149, 'Coupé', 10, 0),
(150, 'Q3', 10, 0),
(151, 'Q5', 10, 0),
(152, 'Q7', 10, 0),
(153, 'R8', 10, 0),
(154, 'RS3', 10, 0),
(155, 'RS4', 10, 0),
(156, 'RS5', 10, 0),
(157, 'RS6', 10, 0),
(158, 'S3', 10, 0),
(159, 'S4', 10, 0),
(160, 'S5', 10, 0),
(161, 'S6', 10, 0),
(162, 'S8', 10, 0),
(163, 'SQ5', 10, 0),
(164, 'TT', 10, 0),
(165, 'V8', 10, 0),
(166, 'Divers', 10, 0),
(167, 'Autres', 11, 0),
(168, 'Mini', 11, 0),
(169, 'Autres', 12, 0),
(170, 'A3', 13, 0),
(171, 'A4', 13, 0),
(172, 'Divers', 13, 0),
(173, 'i3', 14, 0),
(174, 'I8', 14, 0),
(175, 'M2', 14, 0),
(176, 'M3', 14, 0),
(177, 'M4', 14, 0),
(178, 'M5', 14, 0),
(179, 'M6', 14, 0),
(180, 'Série 1', 14, 0),
(181, 'Serie 2', 14, 0),
(182, 'Série 3', 14, 0),
(183, 'Série 4', 14, 0),
(184, 'Série 5', 14, 0),
(185, 'Série 6', 14, 0),
(186, 'Série 7', 14, 0),
(187, 'Série 8', 14, 0),
(188, 'X1', 14, 0),
(189, 'X3', 14, 0),
(190, 'X4', 14, 0),
(191, 'X5', 14, 0),
(192, 'X6', 14, 0),
(193, 'Z1', 14, 0),
(194, 'Z3', 14, 0),
(195, 'Z4', 14, 0),
(196, 'Z8', 14, 0),
(197, 'Divers', 14, 0),
(198, 'Arnage', 15, 0),
(199, 'Azure', 15, 0),
(200, 'Brooklands', 15, 0),
(201, 'Continental', 15, 0),
(202, 'Continental GT', 15, 0),
(203, 'Eight', 15, 0),
(204, 'Mulsanne', 15, 0),
(205, 'Turbo R', 15, 0),
(206, 'Divers', 15, 0),
(207, 'Free Climber', 16, 0),
(208, 'Autres', 17, 0),
(209, 'Baboulin', 17, 0),
(210, 'DuneBuggy', 17, 0),
(211, 'LM1', 17, 0),
(212, 'Park Avenue', 18, 0),
(213, 'Divers', 18, 0),
(214, 'Allante', 19, 0),
(215, 'ATS', 19, 0),
(216, 'BLS', 19, 0),
(217, 'CTS', 19, 0),
(218, 'Eldorado', 19, 0),
(219, 'Escalade', 19, 0),
(220, 'Fleetwood', 19, 0),
(221, 'Seville', 19, 0),
(222, 'SRX', 19, 0),
(223, 'STS', 19, 0),
(224, 'XLR', 19, 0),
(225, 'Divers', 19, 0),
(226, 'Super Seven', 20, 0),
(227, 'Alero', 21, 0),
(228, 'Aveo', 21, 0),
(229, 'Beretta', 21, 0),
(230, 'Blazer', 21, 0),
(231, 'Camaro', 21, 0),
(232, 'Captiva', 21, 0),
(233, 'Corsica', 21, 0),
(234, 'Corvette', 21, 0),
(235, 'Cruze', 21, 0),
(236, 'Epica', 21, 0),
(237, 'Evanda', 21, 0),
(238, 'Kalos', 21, 0),
(239, 'Lacetti', 21, 0),
(240, 'Malibu', 21, 0),
(241, 'Matiz', 21, 0),
(242, 'Nubira', 21, 0),
(243, 'Nubira SW', 21, 0),
(244, 'Orlando', 21, 0),
(245, 'Rezzo', 21, 0),
(246, 'Spark', 21, 0),
(247, 'Tahoe', 21, 0),
(248, 'Trans Sport', 21, 0),
(249, 'Trax', 21, 0),
(250, 'Volt', 21, 0),
(251, 'Divers', 21, 0),
(252, '300C', 22, 0),
(253, '300M', 22, 0),
(254, 'Crossfire', 22, 0),
(255, 'Es', 22, 0),
(256, 'Grand Voyager', 22, 0),
(257, 'Le Baron', 22, 0),
(258, 'Neon', 22, 0),
(259, 'New Yorker', 22, 0),
(260, 'PT Cruiser', 22, 0),
(261, 'Saratoga', 22, 0),
(262, 'Sebring', 22, 0),
(263, 'Stratus', 22, 0),
(264, 'Viper', 22, 0),
(265, 'Vision', 22, 0),
(266, 'Voyager', 22, 0),
(267, 'Divers', 22, 0),
(268, 'C6', 24, 0),
(269, 'Z6', 24, 0),
(270, 'ZR1', 24, 0),
(271, 'Divers', 24, 0),
(272, 'Dokker', 25, 0),
(273, 'Duster', 25, 0),
(274, 'Lodgy', 25, 0),
(275, 'Logan', 25, 0),
(276, 'Sandero', 25, 0),
(277, 'Divers', 25, 0),
(278, 'Espero', 26, 0),
(279, 'Evanda', 26, 0),
(280, 'Feroza', 26, 0),
(281, 'Kalos', 26, 0),
(282, 'Korando', 26, 0),
(283, 'Lacetti', 26, 0),
(284, 'Lanos', 26, 0),
(285, 'Leganza', 26, 0),
(286, 'Matiz', 26, 0),
(287, 'Musso', 26, 0),
(288, 'Nexia', 26, 0),
(289, 'Nubira', 26, 0),
(290, 'Rexton', 26, 0),
(291, 'Rezzo', 26, 0),
(292, 'Divers', 26, 0),
(293, 'Applause', 27, 0),
(294, 'Charade', 27, 0),
(295, 'Copen', 27, 0),
(296, 'Cuore', 27, 0),
(297, 'D-Compact X-Over', 27, 0),
(298, 'Feroza', 27, 0),
(299, 'Gran Move', 27, 0),
(300, 'Materia', 27, 0),
(301, 'Move', 27, 0),
(302, 'Rocky', 27, 0),
(303, 'Sirion', 27, 0),
(304, 'Terios', 27, 0),
(305, 'Trevis', 27, 0),
(306, 'YRV', 27, 0),
(307, 'Divers', 27, 0),
(308, 'Avenger', 31, 0),
(309, 'Caliber', 31, 0),
(310, 'Journey', 31, 0),
(311, 'Nitro', 31, 0),
(312, 'RAM', 31, 0),
(313, 'Viper', 31, 0),
(314, 'Divers', 31, 0),
(315, '308', 33, 0),
(316, '328', 33, 0),
(317, '348', 33, 0),
(318, '400', 33, 0),
(319, '412', 33, 0),
(320, '456', 33, 0),
(321, '458', 33, 0),
(322, '575 Maranello', 33, 0),
(323, '599', 33, 0),
(324, '612', 33, 0),
(325, 'BB 512', 33, 0),
(326, 'California', 33, 0),
(327, 'F 550 Maranello', 33, 0),
(328, 'F355', 33, 0),
(329, 'F360', 33, 0),
(330, 'F430', 33, 0),
(331, 'Mondial', 33, 0),
(332, 'Testarossa', 33, 0),
(333, '127', 34, 0),
(334, '500', 34, 0),
(335, '500 C', 34, 0),
(336, '500 L', 34, 0),
(337, '500 X', 34, 0),
(338, 'Argenta', 34, 0),
(339, 'Barchetta', 34, 0),
(340, 'Bertone', 34, 0),
(341, 'Brava', 34, 0),
(342, 'Bravo', 34, 0),
(343, 'Cinquecento', 34, 0),
(344, 'Coupé', 34, 0),
(345, 'Croma', 34, 0),
(346, 'Croma SW', 34, 0),
(347, 'Doblo', 34, 0),
(348, 'Fiat 600', 34, 0),
(349, 'Fiorino', 34, 0),
(350, 'Freemont', 34, 0),
(351, 'Grande Punto', 34, 0),
(352, 'Idea', 34, 0),
(353, 'Marea', 34, 0),
(354, 'Multipla', 34, 0),
(355, 'Palio', 34, 0),
(356, 'Panda', 34, 0),
(357, 'Punto', 34, 0),
(358, 'QUBO', 34, 0),
(359, 'Regata', 34, 0),
(360, 'Ritmo', 34, 0),
(361, 'Sedici', 34, 0),
(362, 'Seicento', 34, 0),
(363, 'Stilo', 34, 0),
(364, 'Tempra', 34, 0),
(365, 'Tipo', 34, 0),
(366, 'Ulysse', 34, 0),
(367, 'Uno', 34, 0),
(368, 'Divers', 34, 0),
(369, 'Aerostar', 35, 0),
(370, 'B-max', 35, 0),
(371, 'C-max', 35, 0),
(372, 'Cougar', 35, 0),
(373, 'Ecosport', 35, 0),
(374, 'Edge', 35, 0),
(375, 'Escort', 35, 0),
(376, 'Explorer', 35, 0),
(377, 'Fiesta', 35, 0),
(378, 'Focus', 35, 0),
(379, 'Focus C-MAX', 35, 0),
(380, 'Fusion', 35, 0),
(381, 'Galaxy', 35, 0),
(382, 'Grand C-MAX', 35, 0),
(383, 'GT', 35, 0),
(384, 'Ka', 35, 0),
(385, 'Kuga', 35, 0),
(386, 'Maverick', 35, 0),
(387, 'Mondeo', 35, 0),
(388, 'Mustang', 35, 0),
(389, 'Orion', 35, 0),
(390, 'Probe', 35, 0),
(391, 'Puma', 35, 0),
(392, 'Ranger', 35, 0),
(393, 'Scorpio', 35, 0),
(394, 'Sierra', 35, 0),
(395, 'S-MAX', 35, 0),
(396, 'Streetka', 35, 0),
(397, 'Tourneo VP', 35, 0),
(398, 'Transit', 35, 0),
(399, 'Divers', 35, 0),
(400, 'Acadia', 36, 0),
(401, 'Canyon', 36, 0),
(402, 'Enjoy', 36, 0),
(403, 'Jimmy', 36, 0),
(404, 'Sierra', 36, 0),
(405, 'Sonoma', 36, 0),
(406, 'Tracker', 36, 0),
(407, 'Yukon', 36, 0),
(408, 'Accord', 37, 0),
(409, 'Civic', 37, 0),
(410, 'Concerto', 37, 0),
(411, 'CR-V', 37, 0),
(412, 'CRX', 37, 0),
(413, 'CR-Z', 37, 0),
(414, 'FR-V', 37, 0),
(415, 'HR-V', 37, 0),
(416, 'Insight', 37, 0),
(417, 'Integra', 37, 0),
(418, 'Jazz', 37, 0),
(419, 'Legend', 37, 0),
(420, 'Logo', 37, 0),
(421, 'NSX', 37, 0),
(422, 'Prélude', 37, 0),
(423, 'S2000', 37, 0),
(424, 'Shuttle', 37, 0),
(425, 'Stream', 37, 0),
(426, 'Divers', 37, 0),
(427, 'H1', 38, 0),
(428, 'H2', 38, 0),
(429, 'H3', 38, 0),
(430, 'Accent', 39, 0),
(431, 'Atos', 39, 0),
(432, 'Azera', 39, 0),
(433, 'Coupé', 39, 0),
(434, 'Elantra', 39, 0),
(435, 'Galloper', 39, 0),
(436, 'Genesis', 39, 0),
(437, 'Getz', 39, 0),
(438, 'i10', 39, 0),
(439, 'i20', 39, 0),
(440, 'i30', 39, 0),
(441, 'i40', 39, 0),
(442, 'iX20', 39, 0),
(443, 'iX35', 39, 0),
(444, 'iX55', 39, 0),
(445, 'Lantra', 39, 0),
(446, 'Matrix', 39, 0),
(447, 'Pony', 39, 0),
(448, 'Santa Fe', 39, 0),
(449, 'Satellite', 39, 0),
(450, 'Scoupe', 39, 0),
(451, 'Sonata', 39, 0),
(452, 'Terracan', 39, 0),
(453, 'Trajet', 39, 0),
(454, 'Tucson', 39, 0),
(455, 'Veloster', 39, 0),
(456, 'XG', 39, 0),
(457, 'Divers', 39, 0),
(458, 'EX37', 40, 0),
(459, 'FX', 40, 0),
(460, 'G37', 40, 0),
(461, 'G37 Coupé', 40, 0),
(462, 'M37', 40, 0),
(463, 'Q30', 40, 0),
(464, 'Q50', 40, 0),
(465, 'Q70', 40, 0),
(466, 'Qx50', 40, 0),
(467, 'Autres', 40, 0),
(468, 'D-MAX', 41, 0),
(469, 'Trooper', 41, 0),
(470, 'Divers', 41, 0),
(471, 'Daimler', 42, 0),
(472, 'F-PACE', 42, 0),
(473, 'F-Type', 42, 0),
(474, 'Sovereign', 42, 0),
(475, 'S-Type', 42, 0),
(476, 'XE', 42, 0),
(477, 'XF', 42, 0),
(478, 'XJ', 42, 0),
(479, 'XJ 12', 42, 0),
(480, 'XJ 6', 42, 0),
(481, 'XJ 8', 42, 0),
(482, 'XJR', 42, 0),
(483, 'XJS', 42, 0),
(484, 'XK', 42, 0),
(485, 'XK8', 42, 0),
(486, 'XKR', 42, 0),
(487, 'X-Type', 42, 0),
(488, 'Divers', 42, 0),
(489, 'Cherokee', 43, 0),
(490, 'Commander', 43, 0),
(491, 'Compass', 43, 0),
(492, 'Grand Cherokee', 43, 0),
(493, 'Laredo', 43, 0),
(494, 'Patriot', 43, 0),
(495, 'Renegade', 43, 0),
(496, 'Willys', 43, 0),
(497, 'Wrangler', 43, 0),
(498, 'Divers', 43, 0),
(499, 'Carens', 44, 0),
(500, 'Carnival', 44, 0),
(501, 'Ceed', 44, 0),
(502, 'Ceed SW', 44, 0),
(503, 'Cerato', 44, 0),
(504, 'Clarus', 44, 0),
(505, 'Cutback', 44, 0),
(506, 'Korando', 44, 0),
(507, 'Magentis', 44, 0),
(508, 'Opirus', 44, 0),
(509, 'OPTIMA', 44, 0),
(510, 'Picanto', 44, 0),
(511, 'Pride', 44, 0),
(512, 'Pro_cee d ii', 44, 0),
(513, 'Rio', 44, 0),
(514, 'Sephia', 44, 0),
(515, 'Shuma', 44, 0),
(516, 'Sorento', 44, 0),
(517, 'Soul', 44, 0),
(518, 'Sportage', 44, 0),
(519, 'Venga', 44, 0),
(520, 'Divers', 44, 0),
(521, '110', 45, 0),
(522, '111', 45, 0),
(523, '1118', 45, 0),
(524, '112', 45, 0),
(525, '1500 Break', 45, 0),
(526, 'Kalina', 45, 0),
(527, 'Kalinka', 45, 0),
(528, 'Natacha', 45, 0),
(529, 'Niva', 45, 0),
(530, 'Priora', 45, 0),
(531, 'Sagona', 45, 0),
(532, 'Samara', 45, 0),
(533, 'Divers', 45, 0),
(534, 'Aventador', 46, 0),
(535, 'Diablo', 46, 0),
(536, 'Gallardo', 46, 0),
(537, 'Huracan', 46, 0),
(538, 'Murcielago', 46, 0),
(539, 'Divers', 46, 0),
(540, 'Dedra', 47, 0),
(541, 'Delta', 47, 0),
(542, 'Flavia', 47, 0),
(543, 'Kappa', 47, 0),
(544, 'Lybra', 47, 0),
(545, 'Musa', 47, 0),
(546, 'Phedra', 47, 0),
(547, 'Prisma', 47, 0),
(548, 'Thema', 47, 0),
(549, 'Thesis', 47, 0),
(550, 'VOYAGER', 47, 0),
(551, 'Y10', 47, 0),
(552, 'Ypsilon', 47, 0),
(553, 'Zeta', 47, 0),
(554, 'Divers', 47, 0),
(555, 'Defender', 48, 0),
(556, 'Discovery', 48, 0),
(557, 'Freelander', 48, 0),
(558, 'Range Rover', 48, 0),
(559, 'Range Rover Evoque', 48, 0),
(560, 'Range Sport', 48, 0),
(561, 'Divers', 48, 0),
(562, 'CT', 50, 0),
(563, 'GS', 50, 0),
(564, 'IS', 50, 0),
(565, 'LS', 50, 0),
(566, 'NX', 50, 0),
(567, 'RC', 50, 0),
(568, 'RX', 50, 0),
(569, 'SC', 50, 0),
(570, 'Divers', 50, 0),
(571, 'Elan', 51, 0),
(572, 'Elise', 51, 0),
(573, 'Esprit', 51, 0),
(574, 'Evora', 51, 0),
(575, 'Exige', 51, 0),
(576, 'Divers', 51, 0),
(577, 'MG.F', 52, 0),
(578, 'MG.TF', 52, 0),
(579, 'MG.ZR', 52, 0),
(580, 'MG.ZS', 52, 0),
(581, 'MG.ZT', 52, 0),
(582, 'Divers', 52, 0),
(583, 'Bolero', 53, 0),
(584, 'CJ 340', 53, 0),
(585, 'CJ 540', 53, 0),
(586, 'Goa', 53, 0),
(587, 'Goa Pick-up', 53, 0),
(588, 'Divers', 53, 0),
(589, '222 Coupe', 55, 0),
(590, '3200', 55, 0),
(591, '430 biturbo', 55, 0),
(592, 'Coupe', 55, 0),
(593, 'Ghibli', 55, 0),
(594, 'Grancabrio', 55, 0),
(595, 'Grandsport', 55, 0),
(596, 'Granturismo', 55, 0),
(597, 'Quattroporte', 55, 0),
(598, 'Shamal', 55, 0),
(599, 'Spider cabriolet', 55, 0),
(600, 'Spyder', 55, 0),
(601, 'Divers', 55, 0),
(602, '121', 57, 0),
(603, '323', 57, 0),
(604, '626', 57, 0),
(605, '929', 57, 0),
(606, 'Bt-50 Pick-up', 57, 0),
(607, 'Cx-3', 57, 0),
(608, 'CX-5', 57, 0),
(609, 'Cx-7', 57, 0),
(610, 'Demio', 57, 0),
(611, 'Mazda2', 57, 0),
(612, 'Mazda3', 57, 0),
(613, 'Mazda5', 57, 0),
(614, 'Mazda6', 57, 0),
(615, 'MPV', 57, 0),
(616, 'MX-3', 57, 0),
(617, 'MX-5', 57, 0),
(618, 'MX-6', 57, 0),
(619, 'Premacy', 57, 0),
(620, 'RX-7', 57, 0),
(621, 'RX-8', 57, 0),
(622, 'Tribute', 57, 0),
(623, 'Xedos', 57, 0),
(624, 'Divers', 57, 0),
(625, 'Break', 58, 0),
(626, 'Club Berline', 58, 0),
(627, 'Club Cabriolet', 58, 0),
(628, 'Club Fourgon', 58, 0),
(629, 'Divers', 58, 0),
(630, '126', 59, 0),
(631, '190', 59, 0),
(632, '200', 59, 0),
(633, '230', 59, 0),
(634, '250', 59, 0),
(635, '260', 59, 0),
(636, '280', 59, 0),
(637, '300', 59, 0),
(638, '500', 59, 0),
(639, '560', 59, 0),
(640, 'Citan', 59, 0),
(641, 'Classe A', 59, 0),
(642, 'Classe B', 59, 0),
(643, 'Classe C', 59, 0),
(644, 'Classe CL', 59, 0),
(645, 'Classe CLA', 59, 0),
(646, 'Classe CLC', 59, 0),
(647, 'Classe CLS', 59, 0),
(648, 'Classe E', 59, 0),
(649, 'Classe G', 59, 0),
(650, 'Classe GL', 59, 0),
(651, 'Classe GLA', 59, 0),
(652, 'Classe GLC', 59, 0),
(653, 'Classe GLE', 59, 0),
(654, 'Classe GLK', 59, 0),
(655, 'Classe GLS', 59, 0),
(656, 'Classe M', 59, 0),
(657, 'Classe R', 59, 0),
(658, 'Classe S', 59, 0),
(659, 'Classe V', 59, 0),
(660, 'CLK', 59, 0),
(661, 'SL', 59, 0),
(662, 'SLC', 59, 0),
(663, 'SLK', 59, 0),
(664, 'SLR', 59, 0),
(665, 'SLS', 59, 0),
(666, 'Vaneo', 59, 0),
(667, 'Viano', 59, 0),
(668, 'Divers', 59, 0),
(669, 'Clubman', 60, 0),
(670, 'Cooper', 60, 0),
(671, 'Cooper D', 60, 0),
(672, 'Cooper S', 60, 0),
(673, 'Countryman', 60, 0),
(674, 'Mini clubvan', 60, 0),
(675, 'MINI COUPE', 60, 0),
(676, 'MINI ROADSTER', 60, 0),
(677, 'One', 60, 0),
(678, 'One D', 60, 0),
(679, 'Paceman', 60, 0),
(680, 'Divers', 60, 0),
(681, '3000 GT', 61, 0),
(682, 'Asx', 61, 0),
(683, 'Carisma', 61, 0),
(684, 'Colt', 61, 0),
(685, 'Galant', 61, 0),
(686, 'Grandis', 61, 0),
(687, 'I-Miev', 61, 0),
(688, 'L200', 61, 0),
(689, 'Lancer', 61, 0),
(690, 'Montero', 61, 0),
(691, 'Outlander', 61, 0),
(692, 'Pajero', 61, 0),
(693, 'Space Runner', 61, 0),
(694, 'Space Star', 61, 0),
(695, 'Space Wagon', 61, 0),
(696, 'Divers', 61, 0),
(697, 'Plus 4', 62, 0),
(698, 'Plus 8', 62, 0),
(699, 'Divers', 62, 0),
(700, '100 NX', 63, 0),
(701, '200', 63, 0),
(702, '300 ZX', 63, 0),
(703, '350 Z', 63, 0),
(704, '370 Z', 63, 0),
(705, 'Almera', 63, 0),
(706, 'Almera Tino', 63, 0),
(707, 'Bluebird', 63, 0),
(708, 'Cube', 63, 0),
(709, 'Evalia', 63, 0),
(710, 'GT-R', 63, 0),
(711, 'Juke', 63, 0),
(712, 'Leaf', 63, 0),
(713, 'Maxima', 63, 0),
(714, 'Micra', 63, 0),
(715, 'Murano', 63, 0),
(716, 'Navara', 63, 0),
(717, 'Note', 63, 0),
(718, 'Pathfinder', 63, 0),
(719, 'Patrol', 63, 0),
(720, 'Pick-up', 63, 0),
(721, 'Pixo', 63, 0),
(722, 'Prairie', 63, 0),
(723, 'Primastar', 63, 0),
(724, 'Primera', 63, 0),
(725, 'Pulsar', 63, 0),
(726, 'Qashqai', 63, 0),
(727, 'Qashqai +2', 63, 0),
(728, 'Serena', 63, 0),
(729, 'Sunny', 63, 0),
(730, 'Terrano', 63, 0),
(731, 'Vanette', 63, 0),
(732, 'X-Trail', 63, 0),
(733, 'Divers', 63, 0),
(734, 'Adam', 64, 0),
(735, 'Agila', 64, 0),
(736, 'Ampera', 64, 0),
(737, 'Antara', 64, 0),
(738, 'Ascona', 64, 0),
(739, 'Astra', 64, 0),
(740, 'Calibra', 64, 0),
(741, 'Cascada', 64, 0),
(742, 'Combo VP', 64, 0),
(743, 'Corsa', 64, 0),
(744, 'Frontera', 64, 0),
(745, 'GT', 64, 0),
(746, 'Insignia', 64, 0),
(747, 'Kadett', 64, 0),
(748, 'Karl', 64, 0),
(749, 'Meriva', 64, 0),
(750, 'Mokka', 64, 0),
(751, 'Monterey', 64, 0),
(752, 'Omega', 64, 0),
(753, 'Signum', 64, 0),
(754, 'Sintra', 64, 0),
(755, 'Speedster', 64, 0),
(756, 'Tigra', 64, 0),
(757, 'Vectra', 64, 0),
(758, 'Zafira', 64, 0),
(759, 'Divers', 64, 0),
(760, '180 Cévennes', 65, 0),
(761, 'Speedster II', 65, 0),
(762, 'Divers', 65, 0),
(763, '1007', 66, 0),
(764, '104', 66, 0),
(765, '106', 66, 0),
(766, '107', 66, 0),
(767, '108', 66, 0),
(768, '2008', 66, 0),
(769, '205', 66, 0),
(770, '206', 66, 0),
(771, '206 CC', 66, 0),
(772, '206 SW', 66, 0),
(773, '207', 66, 0),
(774, '207 CC', 66, 0),
(775, '207 SW', 66, 0),
(776, '208', 66, 0),
(777, '3008', 66, 0),
(778, '301', 66, 0),
(779, '305', 66, 0),
(780, '306', 66, 0),
(781, '307', 66, 0),
(782, '307 CC', 66, 0),
(783, '307 SW', 66, 0),
(784, '308', 66, 0),
(785, '308 CC', 66, 0),
(786, '308 SW', 66, 0),
(787, '309', 66, 0),
(788, '4007', 66, 0),
(789, '4008', 66, 0),
(790, '405', 66, 0),
(791, '406', 66, 0),
(792, '406 Coupe', 66, 0),
(793, '407', 66, 0),
(794, '407 Coupe', 66, 0),
(795, '407 SW', 66, 0),
(796, '5008', 66, 0),
(797, '504', 66, 0),
(798, '505', 66, 0),
(799, '508', 66, 0),
(800, '508 SW', 66, 0),
(801, '605', 66, 0),
(802, '607', 66, 0),
(803, '806', 66, 0),
(804, '807', 66, 0),
(805, 'Bipper tepee', 66, 0),
(806, 'Expert tepee', 66, 0),
(807, 'iOn', 66, 0),
(808, 'Partner', 66, 0),
(809, 'Partner Tepee', 66, 0),
(810, 'RCZ', 66, 0),
(811, 'Divers', 66, 0),
(812, 'Firebird', 68, 0),
(813, 'Grand Prix', 68, 0),
(814, 'TransSport', 68, 0),
(815, 'Divers', 68, 0),
(816, '356', 69, 0),
(817, '911', 69, 0),
(818, '911 (964)', 69, 0),
(819, '911 (991)', 69, 0),
(820, '911 (993)', 69, 0),
(821, '911 (996)', 69, 0),
(822, '911 (997)', 69, 0),
(823, '911 Carrera 3.2', 69, 0),
(824, '911 GTS', 69, 0),
(825, '911 SC', 69, 0),
(826, '912', 69, 0),
(827, '914', 69, 0),
(828, '924', 69, 0),
(829, '928', 69, 0),
(830, '930 Turbo', 69, 0),
(831, '944', 69, 0),
(832, '959', 69, 0),
(833, '968', 69, 0),
(834, 'Boxster', 69, 0),
(835, 'Boxster (986)', 69, 0),
(836, 'Boxster (987)', 69, 0),
(837, 'Carrera GT', 69, 0),
(838, 'Cayenne', 69, 0),
(839, 'Cayman', 69, 0),
(840, 'Macan', 69, 0),
(841, 'Panamera', 69, 0),
(842, 'Divers', 69, 0),
(843, 'Alpine', 71, 0),
(844, 'Avantime', 71, 0),
(845, 'Captur', 71, 0),
(846, 'Clio', 71, 0),
(847, 'Clio II', 71, 0),
(848, 'Clio III', 71, 0),
(849, 'Clio III Estate', 71, 0),
(850, 'Clio IV', 71, 0),
(851, 'Clio IV Estate', 71, 0),
(852, 'Espace', 71, 0),
(853, 'Express', 71, 0),
(854, 'Fluence', 71, 0),
(855, 'Grand Espace', 71, 0),
(856, 'Grand Modus', 71, 0),
(857, 'Grand Scénic II', 71, 0),
(858, 'Grand Scénic III', 71, 0),
(859, 'Kadjar', 71, 0),
(860, 'Kangoo', 71, 0),
(861, 'Koleos', 71, 0),
(862, 'Laguna', 71, 0),
(863, 'Laguna II', 71, 0),
(864, 'Laguna II Estate', 71, 0),
(865, 'Laguna III', 71, 0),
(866, 'Laguna III Coupé', 71, 0),
(867, 'Laguna III Estate', 71, 0),
(868, 'Latitude', 71, 0),
(869, 'Mégane', 71, 0),
(870, 'Mégane Cabriolet', 71, 0),
(871, 'Mégane Classic', 71, 0),
(872, 'Mégane Coupé', 71, 0),
(873, 'Mégane II', 71, 0),
(874, 'Mégane II CC', 71, 0),
(875, 'Mégane II Coupé', 71, 0),
(876, 'Mégane II Estate', 71, 0),
(877, 'Mégane III', 71, 0),
(878, 'Mégane III CC', 71, 0),
(879, 'Mégane III Coupé', 71, 0),
(880, 'Mégane III Estate', 71, 0),
(881, 'Megane IV', 71, 0),
(882, 'Modus', 71, 0),
(883, 'Nevada', 71, 0),
(884, 'R11', 71, 0),
(885, 'R18', 71, 0),
(886, 'R19', 71, 0),
(887, 'R20', 71, 0),
(888, 'R21', 71, 0),
(889, 'R25', 71, 0),
(890, 'R30', 71, 0),
(891, 'R4', 71, 0),
(892, 'R5', 71, 0),
(893, 'R9', 71, 0),
(894, 'Rodéo', 71, 0),
(895, 'Safrane', 71, 0),
(896, 'Scénic', 71, 0),
(897, 'Scénic II', 71, 0),
(898, 'Scénic III', 71, 0),
(899, 'Scenic xmod', 71, 0),
(900, 'Spider Sport', 71, 0),
(901, 'Super 5', 71, 0),
(902, 'Talisman', 71, 0),
(903, 'Trafic', 71, 0),
(904, 'Twingo', 71, 0),
(905, 'Twingo II', 71, 0),
(906, 'Twingo III', 71, 0),
(907, 'Twizy', 71, 0),
(908, 'Vel Satis', 71, 0),
(909, 'Wind', 71, 0),
(910, 'Zoé', 71, 0),
(911, 'Divers', 71, 0),
(912, 'Corniche', 72, 0),
(913, 'Flying Spur', 72, 0),
(914, 'Ghost', 72, 0),
(915, 'Park', 72, 0),
(916, 'Phantom', 72, 0),
(917, 'Silver Dawn', 72, 0),
(918, 'Silver Seraph', 72, 0),
(919, 'Silver Spirit', 72, 0),
(920, 'Silver Spur', 72, 0),
(921, 'Touring-Limousine', 72, 0),
(922, 'Divers', 72, 0),
(923, '25', 73, 0),
(924, '45', 73, 0),
(925, '75', 73, 0),
(926, 'Metro', 73, 0),
(927, 'Mini', 73, 0),
(928, 'Montego', 73, 0),
(929, 'Série 100', 73, 0),
(930, 'Série 200', 73, 0),
(931, 'Série 400', 73, 0),
(932, 'Série 600', 73, 0),
(933, 'Série 800', 73, 0),
(934, 'Streetwise', 73, 0),
(935, 'Divers', 73, 0),
(936, '900', 74, 0),
(937, '9000', 74, 0),
(938, '9-3', 74, 0),
(939, '9-3X', 74, 0),
(940, '9-4X', 74, 0),
(941, '9-5', 74, 0),
(942, '9-7X', 74, 0),
(943, 'Divers', 74, 0),
(944, 'PS 10', 75, 0),
(945, 'S 300/350', 75, 0),
(946, 'Samurai', 75, 0),
(947, 'Vitara', 75, 0),
(948, 'Divers', 75, 0),
(949, 'Alhambra', 76, 0),
(950, 'Altea', 76, 0),
(951, 'Altea XL', 76, 0),
(952, 'Arosa', 76, 0),
(953, 'Cordoba', 76, 0),
(954, 'Exeo', 76, 0),
(955, 'Ibiza', 76, 0),
(956, 'Leon', 76, 0),
(957, 'Malaga', 76, 0),
(958, 'Marbella', 76, 0),
(959, 'Mii', 76, 0),
(960, 'Terra', 76, 0),
(961, 'Toledo', 76, 0),
(962, 'Divers', 76, 0),
(963, 'Citigo', 78, 0),
(964, 'Fabia', 78, 0),
(965, 'Favorit', 78, 0),
(966, 'Felicia', 78, 0),
(967, 'Octavia', 78, 0),
(968, 'Rapid', 78, 0),
(969, 'Roomster', 78, 0),
(970, 'Superb', 78, 0),
(971, 'Yeti', 78, 0),
(972, 'Divers', 78, 0),
(973, 'ForFour', 79, 0),
(974, 'ForTwo', 79, 0),
(975, 'Roadster', 79, 0),
(976, 'Roadster Coupé', 79, 0),
(977, 'Divers', 79, 0),
(978, 'Actyon', 80, 0),
(979, 'Family', 80, 0),
(980, 'Korando', 80, 0),
(981, 'Kyron', 80, 0),
(982, 'Musso', 80, 0),
(983, 'Rexton', 80, 0),
(984, 'Rodius', 80, 0),
(985, 'Tivoli', 80, 0),
(986, 'Divers', 80, 0),
(987, 'B9 Tribeca', 81, 0),
(988, 'Brz', 81, 0),
(989, 'E 12', 81, 0),
(990, 'Forester', 81, 0),
(991, 'G3X Justy', 81, 0),
(992, 'Impreza', 81, 0),
(993, 'Justy', 81, 0),
(994, 'Legacy', 81, 0),
(995, 'Outback', 81, 0),
(996, 'SVX', 81, 0),
(997, 'Trezia', 81, 0),
(998, 'Vanille', 81, 0),
(999, 'WRX', 81, 0),
(1000, 'XV', 81, 0),
(1001, 'Divers', 81, 0),
(1002, 'Alto', 82, 0),
(1003, 'Baleno', 82, 0),
(1004, 'Celerio', 82, 0),
(1005, 'Grand Vitara', 82, 0),
(1006, 'Ignis', 82, 0),
(1007, 'Jimny', 82, 0),
(1008, 'Kizashi', 82, 0),
(1009, 'Liana', 82, 0),
(1010, 'Samuraï', 82, 0),
(1011, 'Santana', 82, 0),
(1012, 'Splash', 82, 0),
(1013, 'Swift', 82, 0),
(1014, 'SX4', 82, 0),
(1015, 'Vitara', 82, 0),
(1016, 'Wagon R', 82, 0),
(1017, 'Divers', 82, 0),
(1018, 'Samba', 84, 0),
(1019, '4Runner', 87, 0),
(1020, 'Auris', 87, 0),
(1021, 'Avensis', 87, 0),
(1022, 'Avensis Verso', 87, 0),
(1023, 'Aygo', 87, 0),
(1024, 'Camry', 87, 0),
(1025, 'Carina', 87, 0),
(1026, 'Celica', 87, 0),
(1027, 'Corolla', 87, 0),
(1028, 'Corolla Verso', 87, 0),
(1029, 'Escape', 87, 0),
(1030, 'GT86', 87, 0),
(1031, 'Hiace', 87, 0),
(1032, 'Hilux', 87, 0),
(1033, 'IQ', 87, 0),
(1034, 'Land Cruiser', 87, 0),
(1035, 'Land Cruiser SW', 87, 0),
(1036, 'Lite Ace', 87, 0),
(1037, 'MR', 87, 0),
(1038, 'Paseo', 87, 0),
(1039, 'Picnic', 87, 0),
(1040, 'Previa', 87, 0),
(1041, 'Prius', 87, 0),
(1042, 'RAV 4', 87, 0),
(1043, 'Runner', 87, 0),
(1044, 'Starlet', 87, 0),
(1045, 'Supra', 87, 0),
(1046, 'Tercel', 87, 0),
(1047, 'Urban cruiser', 87, 0),
(1048, 'Verso', 87, 0),
(1049, 'Yaris', 87, 0),
(1050, 'Yaris Verso', 87, 0),
(1051, 'Divers', 87, 0),
(1052, 'Amarok', 89, 0),
(1053, 'Beetle', 89, 0),
(1054, 'Bora', 89, 0),
(1055, 'Caddy', 89, 0),
(1056, 'Caravelle', 89, 0),
(1057, 'COCCINELLE II', 89, 0),
(1058, 'Corrado', 89, 0),
(1059, 'EOS', 89, 0),
(1060, 'Fox', 89, 0),
(1061, 'Golf', 89, 0),
(1062, 'Golf Plus', 89, 0),
(1063, 'Golf SW', 89, 0),
(1064, 'Jetta', 89, 0),
(1065, 'Lupo', 89, 0),
(1066, 'MULTIVAN', 89, 0),
(1067, 'Multivan', 89, 0),
(1068, 'Passat', 89, 0),
(1069, 'Phaeton', 89, 0),
(1070, 'Polo', 89, 0),
(1071, 'Scirocco', 89, 0),
(1072, 'Sharan', 89, 0),
(1073, 'Tiguan', 89, 0),
(1074, 'Touareg', 89, 0),
(1075, 'Touran', 89, 0),
(1076, 'UP', 89, 0),
(1077, 'Vento', 89, 0),
(1078, 'Divers', 89, 0),
(1079, '240', 90, 0),
(1080, '340', 90, 0),
(1081, '360', 90, 0),
(1082, '440', 90, 0),
(1083, '460', 90, 0),
(1084, '480', 90, 0),
(1085, '740', 90, 0),
(1086, '760', 90, 0),
(1087, '850', 90, 0),
(1088, '940', 90, 0),
(1089, '960', 90, 0),
(1090, 'C30', 90, 0),
(1091, 'C70', 90, 0),
(1092, 'S40', 90, 0),
(1093, 'S60', 90, 0),
(1094, 'S70', 90, 0),
(1095, 'S80', 90, 0),
(1096, 'S90', 90, 0),
(1097, 'V40', 90, 0),
(1098, 'V50', 90, 0),
(1099, 'V60', 90, 0),
(1100, 'V70', 90, 0),
(1101, 'XC60', 90, 0),
(1102, 'XC70', 90, 0),
(1103, 'XC90', 90, 0),
(1104, 'Divers', 90, 0),
(1105, '2 CV - Dyane', 1, 0),
(1106, 'AX', 1, 0),
(1107, 'Berlingo', 1, 0),
(1108, 'BX', 1, 0),
(1109, 'C1', 1, 0),
(1110, 'C2', 1, 0),
(1111, 'C3', 1, 0),
(1112, 'C3 Picasso', 1, 0),
(1113, 'C3 Pluriel', 1, 0),
(1114, 'C4', 1, 0),
(1115, 'C4 Aircross', 1, 0),
(1116, 'C4 cactus', 1, 0),
(1117, 'C4 Picasso', 1, 0),
(1118, 'C5', 1, 0),
(1119, 'C6', 1, 0),
(1120, 'C8', 1, 0),
(1121, 'C-Crosser', 1, 0),
(1122, 'C-Elysée', 1, 0),
(1123, 'CX', 1, 0),
(1124, 'C-zero', 1, 0),
(1125, 'DS3', 1, 0),
(1126, 'DS4', 1, 0),
(1127, 'DS5', 1, 0),
(1128, 'Evasion', 1, 0),
(1129, 'Grand C4 Picasso', 1, 0),
(1130, 'GS', 1, 0),
(1131, 'LNA', 1, 0),
(1132, 'Méhari', 1, 0),
(1133, 'Nemo', 1, 0),
(1134, 'Picasso', 1, 0),
(1135, 'Saxo', 1, 0),
(1136, 'Visa', 1, 0),
(1137, 'Xantia', 1, 0),
(1138, 'XM', 1, 0),
(1139, 'Xsara', 1, 0),
(1140, 'Xsara Coupe', 1, 0),
(1141, 'ZX', 1, 0),
(1142, 'Divers', 1, 0),
(1143, 'Alpine', 3, 0),
(1144, 'Avantime', 3, 0),
(1145, 'Captur', 3, 0),
(1146, 'Clio', 3, 0),
(1147, 'Clio II', 3, 0),
(1148, 'Clio III', 3, 0),
(1149, 'Clio III Estate', 3, 0),
(1150, 'Clio IV', 3, 0),
(1151, 'Clio IV Estate', 3, 0),
(1152, 'Espace', 3, 0),
(1153, 'Express', 3, 0),
(1154, 'Fluence', 3, 0),
(1155, 'Grand Espace', 3, 0),
(1156, 'Grand Modus', 3, 0),
(1157, 'Grand Scénic II', 3, 0),
(1158, 'Grand Scénic III', 3, 0),
(1159, 'Kadjar', 3, 0),
(1160, 'Kangoo', 3, 0),
(1161, 'Koleos', 3, 0),
(1162, 'Laguna', 3, 0),
(1163, 'Laguna II', 3, 0),
(1164, 'Laguna II Estate', 3, 0),
(1165, 'Laguna III', 3, 0),
(1166, 'Laguna III Coupé', 3, 0),
(1167, 'Laguna III Estate', 3, 0),
(1168, 'Latitude', 3, 0),
(1169, 'Mégane', 3, 0),
(1170, 'Mégane Cabriolet', 3, 0),
(1171, 'Mégane Classic', 3, 0),
(1172, 'Mégane Coupé', 3, 0),
(1173, 'Mégane II', 3, 0),
(1174, 'Mégane II CC', 3, 0),
(1175, 'Mégane II Coupé', 3, 0),
(1176, 'Mégane II Estate', 3, 0),
(1177, 'Mégane III', 3, 0),
(1178, 'Mégane III CC', 3, 0),
(1179, 'Mégane III Coupé', 3, 0),
(1180, 'Mégane III Estate', 3, 0),
(1181, 'Megane IV', 3, 0),
(1182, 'Modus', 3, 0),
(1183, 'Nevada', 3, 0),
(1184, 'R11', 3, 0),
(1185, 'R18', 3, 0),
(1186, 'R19', 3, 0),
(1187, 'R20', 3, 0),
(1188, 'R21', 3, 0),
(1189, 'R25', 3, 0),
(1190, 'R30', 3, 0),
(1191, 'R4', 3, 0),
(1192, 'R5', 3, 0),
(1193, 'R9', 3, 0),
(1194, 'Rodéo', 3, 0),
(1195, 'Safrane', 3, 0),
(1196, 'Scénic', 3, 0),
(1197, 'Scénic II', 3, 0),
(1198, 'Scénic III', 3, 0),
(1199, 'Scenic xmod', 3, 0),
(1200, 'Spider Sport', 3, 0),
(1201, 'Super 5', 3, 0),
(1202, 'Talisman', 3, 0),
(1203, 'Trafic', 3, 0),
(1204, 'Twingo', 3, 0),
(1205, 'Twingo II', 3, 0),
(1206, 'Twingo III', 3, 0),
(1207, 'Twizy', 3, 0),
(1208, 'Vel Satis', 3, 0),
(1209, 'Wind', 3, 0),
(1210, 'Zoé', 3, 0),
(1211, 'Divers', 3, 0),
(1212, 'Alpine', 3, 0),
(1213, 'Avantime', 3, 0),
(1214, 'Captur', 3, 0),
(1215, 'Clio', 3, 0),
(1216, 'Clio II', 3, 0),
(1217, 'Clio III', 3, 0),
(1218, 'Clio III Estate', 3, 0),
(1219, 'Clio IV', 3, 0),
(1220, 'Clio IV Estate', 3, 0),
(1221, 'Espace', 3, 0),
(1222, 'Express', 3, 0),
(1223, 'Fluence', 3, 0),
(1224, 'Grand Espace', 3, 0),
(1225, 'Grand Modus', 3, 0),
(1226, 'Grand Scénic II', 3, 0),
(1227, 'Grand Scénic III', 3, 0),
(1228, 'Kadjar', 3, 0),
(1229, 'Kangoo', 3, 0),
(1230, 'Koleos', 3, 0),
(1231, 'Laguna', 3, 0),
(1232, 'Laguna II', 3, 0),
(1233, 'Laguna II Estate', 3, 0),
(1234, 'Laguna III', 3, 0),
(1235, 'Laguna III Coupé', 3, 0),
(1236, 'Laguna III Estate', 3, 0),
(1237, 'Latitude', 3, 0),
(1238, 'Mégane', 3, 0),
(1239, 'Mégane Cabriolet', 3, 0),
(1240, 'Mégane Classic', 3, 0),
(1241, 'Mégane Coupé', 3, 0),
(1242, 'Mégane II', 3, 0),
(1243, 'Mégane II CC', 3, 0),
(1244, 'Mégane II Coupé', 3, 0),
(1245, 'Mégane II Estate', 3, 0),
(1246, 'Mégane III', 3, 0),
(1247, 'Mégane III CC', 3, 0),
(1248, 'Mégane III Coupé', 3, 0),
(1249, 'Mégane III Estate', 3, 0),
(1250, 'Megane IV', 3, 0),
(1251, 'Modus', 3, 0),
(1252, 'Nevada', 3, 0),
(1253, 'R11', 3, 0),
(1254, 'R18', 3, 0),
(1255, 'R19', 3, 0),
(1256, 'R20', 3, 0),
(1257, 'R21', 3, 0),
(1258, 'R25', 3, 0),
(1259, 'R30', 3, 0),
(1260, 'R4', 3, 0),
(1261, 'R5', 3, 0),
(1262, 'R9', 3, 0),
(1263, 'Rodéo', 3, 0),
(1264, 'Safrane', 3, 0),
(1265, 'Scénic', 3, 0),
(1266, 'Scénic II', 3, 0),
(1267, 'Scénic III', 3, 0),
(1268, 'Scenic xmod', 3, 0),
(1269, 'Spider Sport', 3, 0),
(1270, 'Super 5', 3, 0),
(1271, 'Talisman', 3, 0),
(1272, 'Trafic', 3, 0),
(1273, 'Twingo', 3, 0),
(1274, 'Twingo II', 3, 0),
(1275, 'Twingo III', 3, 0),
(1276, 'Twizy', 3, 0),
(1277, 'Vel Satis', 3, 0),
(1278, 'Wind', 3, 0),
(1279, 'Zoé', 3, 0),
(1280, 'Divers', 3, 0);

-- --------------------------------------------------------

--
-- Structure de la table `phinxlog`
--

CREATE TABLE `phinxlog` (
  `version` bigint(20) NOT NULL,
  `start_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `end_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `phinxlog`
--

INSERT INTO `phinxlog` (`version`, `start_time`, `end_time`) VALUES
(20160216151859, '2016-02-16 15:01:05', '2016-02-16 15:01:05'),
(20160222163043, '2016-02-22 15:38:02', '2016-02-22 15:38:03'),
(20160223083130, '2016-02-23 07:32:23', '2016-02-23 07:32:23'),
(20160223084402, '2016-02-23 07:44:09', '2016-02-23 07:44:09'),
(20160223090603, '2016-02-23 08:06:06', '2016-02-23 08:06:07'),
(20160223090821, '2016-02-23 08:08:27', '2016-02-23 08:08:28'),
(20160224163758, '2016-02-24 15:39:18', '2016-02-24 15:39:19'),
(20160224164613, '2016-02-24 15:46:34', '2016-02-24 15:46:35'),
(20160224165052, '2016-02-24 15:50:55', '2016-02-24 15:50:55'),
(20160224165416, '2016-02-24 15:54:18', '2016-02-24 15:54:19'),
(20160302135344, '2016-03-02 12:54:40', '2016-03-02 12:54:40'),
(20160302142702, '2016-03-02 13:27:07', '2016-03-02 13:27:07'),
(20160302154307, '2016-03-02 14:45:42', '2016-03-02 14:45:42'),
(20160302154406, '2016-03-02 14:45:42', '2016-03-02 14:45:42'),
(20160302154530, '2016-03-02 14:45:42', '2016-03-02 14:45:43'),
(20160303140324, '2016-03-03 13:11:07', '2016-03-03 13:11:07'),
(20160303140543, '2016-03-03 13:11:54', '2016-03-03 13:11:54'),
(20160303140902, '2016-03-03 13:11:55', '2016-03-03 13:11:55');

-- --------------------------------------------------------

--
-- Structure de la table `preparateurs`
--

CREATE TABLE `preparateurs` (
  `id` int(11) NOT NULL,
  `society_id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `adresse` varchar(250) NOT NULL,
  `ville` varchar(255) NOT NULL,
  `cp` varchar(11) NOT NULL,
  `tel` varchar(255) NOT NULL,
  `fax` varchar(255) NOT NULL,
  `prestation_id` varchar(255) NOT NULL,
  `lavagesec` int(11) NOT NULL,
  `lavageeau` int(11) NOT NULL,
  `rayon` int(11) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `preparateurs`
--

INSERT INTO `preparateurs` (`id`, `society_id`, `nom`, `adresse`, `ville`, `cp`, `tel`, `fax`, `prestation_id`, `lavagesec`, `lavageeau`, `rayon`, `password`) VALUES
(46, 24, 'Point de vente 2', 'Les hauts de carnoux', 'Carnoux', '13470', '0606060606', '0606060606', 'a:1:{i:0;s:1:"4";}', 1, 1, 60, '$2y$10$RAm6NkQuXc38L1DL9FxJAeuhNqnc2nriY04XZyF3UMyvkFZ5Ygdoa'),
(47, 28, 'Point de vente 4', '25 av de la corse', 'Marseille', '13006', '0442734202', '0491202505', 'a:2:{i:0;s:1:"4";i:1;s:1:"7";}', 1, 0, 15, '$2y$10$pSUKKRpk/UigoqgGdb3h1.iipjP/ELdPiMKxjSu3FBn/VOS67Cvt6'),
(48, 24, 'Jimmy publicom', 'route de galice', 'Aubagne', '13400', '0442734569', '+33781682726', 'a:2:{i:0;s:1:"4";i:1;s:1:"7";}', 1, 0, 10, ''),
(49, 30, 'Laino Scheil', 'Av Du Prado', 'Marseille', '13008', '0781682726', '0625252698', 'a:1:{i:0;s:1:"4";}', 1, 1, 2, ''),
(56, 24, 'Jimmy publicom', 'route de galice', 'Aubagne', '13400', '0781682726', '0781682726', 'a:1:{i:0;s:1:"7";}', 1, 1, 60, '');

-- --------------------------------------------------------

--
-- Structure de la table `prestations`
--

CREATE TABLE `prestations` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `tarif1` float NOT NULL,
  `tarif2` float NOT NULL,
  `tarif3` float NOT NULL,
  `duree1` float NOT NULL,
  `duree2` float NOT NULL,
  `duree3` float NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `prestations`
--

INSERT INTO `prestations` (`id`, `name`, `tarif1`, `tarif2`, `tarif3`, `duree1`, `duree2`, `duree3`, `description`) VALUES
(4, 'Prestation 1', 10, 20, 30, 15, 25, 35, 'Description prestation #1'),
(7, 'prestation 2', 25, 35, 50, 30, 45, 60, 'lavage a froid');

-- --------------------------------------------------------

--
-- Structure de la table `societys`
--

CREATE TABLE `societys` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `adresse` varchar(250) NOT NULL,
  `mail` varchar(120) NOT NULL,
  `cp` int(11) NOT NULL,
  `tel` varchar(255) NOT NULL,
  `fax` varchar(255) NOT NULL,
  `taux_comission` float NOT NULL,
  `tva` varchar(50) DEFAULT NULL,
  `iban` varchar(27) NOT NULL,
  `siret` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `tva_ass` tinyint(1) DEFAULT NULL,
  `passwordconfirm` varchar(255) NOT NULL,
  `ville` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `societys`
--

INSERT INTO `societys` (`id`, `name`, `contact`, `adresse`, `mail`, `cp`, `tel`, `fax`, `taux_comission`, `tva`, `iban`, `siret`, `password`, `tva_ass`, `passwordconfirm`, `ville`) VALUES
(10, 'société1', 'Jimmy publicom', 'route de galice', 'devduweb13@gmail.com', 13410, '+33781682726', '+33781682726', 5, '2147483647', '123456789012345978912345678', '12345673901234', '$2y$10$Z0naMkLTlAu67BCwRPEOieJbZfTGcSAiIrxSwLLcYm22Q15gE/gvi', 1, '$2y$10$ojN2Cm2e7XnyCsYc807PF.uHJCZ3H55NUxglFffjqwHed9aC6Trny', 'Aubagne'),
(24, 'société3', 'Jimmy publicom', 'route de galice', 'devduweb13@gmail.com2', 13400, '+33781682726', '+33781682726', 16, '', '023456789012345678912345678', '12345678901230', '$2y$10$ZO55hfQdlpQ1Jq3Efp3u/ugZVCiDZg.kvuFuBaQF.vkiun98oEKjO', NULL, '$2y$10$rVNpZpyM6u3/xTWQ5kObOOb5aVfhFzBX9vGRrA7jxMEDB4ScCEJe6', 'Aubagne'),
(27, 'publicom', 'Jimmy publicom', 'route de galice', 'devduweb13@gmail.com1', 13400, '+33781682726', '+33781682726', 0, '', '123456789012345678912345678', '12345678901234', '$2y$10$A6CQYybZlTZD6KUBh/7yQeIFoQOMQ2mBVZ4dHFJfAGXfoDsksbbru', NULL, '$2y$10$r1tvaq.1HlKGG.y.gYJG2.3Gv1CXO.R2h4Z0t7smrK355Mb.WWtnq', 'Aubagne'),
(28, 'société4', 'Jimmy publicom', 'route de galice', 'devduweb13@gmail.com56', 13400, '+33781682726', '+33781682726', 0, '', '123456789012345678919345678', '12345678901934', '$2y$10$ImDF7mNk5O1KJlnazsYK4eC9vRn64JOQR7PBXKteXpZvuzg/FUIIi', NULL, '$2y$10$a9lQxdLC120/PwrIO3csdOO0X9gebNCghrSG.FG/RYXvjTmWtvOQe', 'Aubagne'),
(29, 'Société5', 'Antho', 'route de galice', 'devduweb13@gmail.com5', 13400, '+33781682726', '+33781682726', 0, '', '123456789912345678912345678', '12345678961234', '$2y$10$sBqwgxirr7ClgYybuq5dMeJCHKO4RqnikXZGq9q9c4IPhiUedeBKy', NULL, '$2y$10$c9P719Usl.eGYjvNY3gIhehqkasgmnQPrX2di/Cdv89fxdf4fspPm', 'Aubagne'),
(30, 'societe25', 'Jimmy publicom', 'route de galice', 'devduweb13@gmail.com69', 13400, '+33781682726', '+33781682726', 0, '', '123456789012395678912345678', '12345678001234', '$2y$10$V0czxysx7BGjzoROFOLJ4u/Qnmtr.3GmSIsc1QdOeF//S.9AU9ZG2', NULL, '$2y$10$SvaeKr3kb3e39y3p8boWdeRhZS/XmJDENUk3zNzapga34Z3JlbtnC', 'Aubagne');

-- --------------------------------------------------------

--
-- Structure de la table `tvas`
--

CREATE TABLE `tvas` (
  `id` int(11) NOT NULL,
  `taux` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `tvas`
--

INSERT INTO `tvas` (`id`, `taux`) VALUES
(1, 19.6),
(2, 20),
(3, 5.5);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(250) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` varchar(20) DEFAULT NULL,
  `created` datetime DEFAULT CURRENT_TIMESTAMP,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `created`, `modified`) VALUES
(2, 'admin', '$2y$10$4RshiEEUwsUtC6LcV8IE7OsHaccCLRGtDeZHwHFf7jI.pEa1QAPRu', 'admin', '2016-02-15 14:40:51', '2016-02-15 14:41:18'),
(5, 'client1', '$2y$10$1.PEaEjLwbH78RpDVdzyVuBAds7q5eE.rmCULtewVEQeaAWY4fCXG', 'client', '2016-02-16 10:58:32', NULL),
(7, 'devduweb13@gmail.com5', '$2y$10$b4jcGJhY20Ybg0mHKkIewO2rPDWjcIKCx3Ml.lAqM5cvOYMHdSnP6', 'preparateur', '2016-02-25 10:51:36', NULL),
(8, 'devduweb13@gmail.com69', '$2y$10$AsvGF8WoDBbxdYageUGhLe7ZwpdTvdyh36IUoeL2suG9RBuYfElNi', 'preparateur', '2016-02-26 16:22:47', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `vehiculeclients`
--

CREATE TABLE `vehiculeclients` (
  `id` int(11) NOT NULL,
  `vehicule_id` int(11) NOT NULL,
  `annee` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `vehiculeclients`
--

INSERT INTO `vehiculeclients` (`id`, `vehicule_id`, `annee`) VALUES
(1, 4, 1998),
(2, 5, 2010);

-- --------------------------------------------------------

--
-- Structure de la table `vehicules`
--

CREATE TABLE `vehicules` (
  `id` int(11) NOT NULL,
  `marque_id` int(11) NOT NULL,
  `modele_id` int(11) NOT NULL,
  `annee` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `vehicules`
--

INSERT INTO `vehicules` (`id`, `marque_id`, `modele_id`, `annee`) VALUES
(4, 2, 1, '1998'),
(5, 3, 56, '2010');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `adresseclients`
--
ALTER TABLE `adresseclients`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `adresses`
--
ALTER TABLE `adresses`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `EMAIL_INDEX` (`mail`);

--
-- Index pour la table `configurations`
--
ALTER TABLE `configurations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `horraires`
--
ALTER TABLE `horraires`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `marques`
--
ALTER TABLE `marques`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `modeles`
--
ALTER TABLE `modeles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `phinxlog`
--
ALTER TABLE `phinxlog`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `preparateurs`
--
ALTER TABLE `preparateurs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `prestations`
--
ALTER TABLE `prestations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `societys`
--
ALTER TABLE `societys`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `EMAIL_INDEX` (`mail`);

--
-- Index pour la table `tvas`
--
ALTER TABLE `tvas`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `vehiculeclients`
--
ALTER TABLE `vehiculeclients`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `vehicules`
--
ALTER TABLE `vehicules`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `adresseclients`
--
ALTER TABLE `adresseclients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `adresses`
--
ALTER TABLE `adresses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT pour la table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT pour la table `configurations`
--
ALTER TABLE `configurations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `horraires`
--
ALTER TABLE `horraires`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT pour la table `marques`
--
ALTER TABLE `marques`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;
--
-- AUTO_INCREMENT pour la table `modeles`
--
ALTER TABLE `modeles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1281;
--
-- AUTO_INCREMENT pour la table `preparateurs`
--
ALTER TABLE `preparateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
--
-- AUTO_INCREMENT pour la table `prestations`
--
ALTER TABLE `prestations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `societys`
--
ALTER TABLE `societys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT pour la table `tvas`
--
ALTER TABLE `tvas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `vehiculeclients`
--
ALTER TABLE `vehiculeclients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `vehicules`
--
ALTER TABLE `vehicules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
