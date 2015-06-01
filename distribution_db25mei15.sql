-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Inang: localhost
-- Waktu pembuatan: 30 Mei 2015 pada 14.39
-- Versi Server: 5.5.43-0ubuntu0.14.04.1
-- Versi PHP: 5.5.9-1ubuntu4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Basis data: `distribution_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `access_tab`
--

CREATE TABLE IF NOT EXISTS `access_tab` (
  `aid` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `agid` int(4) unsigned NOT NULL,
  `apid` int(10) DEFAULT NULL,
  `aaccess` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`aid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=328 ;

--
-- Dumping data untuk tabel `access_tab`
--

INSERT INTO `access_tab` (`aid`, `agid`, `apid`, `aaccess`) VALUES
(1, 1, 1, 1),
(2, 1, 2, 1),
(3, 1, 3, 1),
(4, 1, 4, 1),
(5, 1, 5, 1),
(6, 1, 6, 1),
(7, 1, 7, 1),
(8, 1, 8, 1),
(9, 1, 9, 1),
(10, 1, 10, 1),
(11, 1, 11, 1),
(12, 1, 12, 1),
(13, 1, 13, 1),
(14, 1, 14, 1),
(15, 1, 15, 1),
(16, 1, 16, 1),
(17, 1, 17, 1),
(18, 1, 18, 1),
(19, 1, 19, 1),
(20, 1, 20, 1),
(21, 1, 21, 1),
(22, 1, 22, 1),
(23, 1, 23, 1),
(24, 1, 24, 1),
(25, 1, 25, 1),
(26, 1, 26, 1),
(27, 1, 27, 1),
(28, 1, 28, 1),
(29, 1, 29, 1),
(30, 1, 30, 1),
(31, 1, 31, 1),
(32, 1, 32, 1),
(33, 1, 33, 1),
(34, 1, 34, 1),
(35, 1, 35, 1),
(36, 1, 36, 1),
(37, 1, 37, 1),
(38, 1, 38, 1),
(39, 1, 39, 1),
(40, 1, 40, 1),
(41, 1, 41, 1),
(42, 1, 42, 1),
(43, 1, 43, 1),
(44, 1, 44, 1),
(45, 1, 45, 1),
(46, 1, 46, 1),
(47, 1, 47, 1),
(48, 1, 48, 1),
(49, 1, 49, 1),
(50, 1, 50, 1),
(51, 1, 51, 1),
(52, 1, 52, 1),
(53, 1, 53, 1),
(54, 1, 54, 1),
(55, 1, 55, 1),
(56, 1, 56, 1),
(57, 1, 57, 1),
(58, 1, 58, 1),
(59, 1, 59, 1),
(60, 1, 60, 1),
(61, 1, 61, 1),
(62, 1, 62, 1),
(63, 1, 63, 1),
(64, 1, 64, 1),
(65, 1, 65, 1),
(66, 1, 66, 1),
(67, 1, 67, 1),
(68, 1, 68, 1),
(69, 1, 69, 1),
(70, 1, 70, 1),
(71, 1, 71, 1),
(72, 1, 72, 1),
(73, 1, 73, 1),
(74, 1, 74, 1),
(75, 1, 75, 1),
(76, 1, 76, 1),
(77, 1, 77, 1),
(78, 1, 78, 1),
(79, 1, 79, 1),
(80, 1, 80, 1),
(81, 1, 81, 1),
(82, 1, 82, 1),
(83, 1, 83, 1),
(84, 1, 84, 1),
(85, 1, 85, 1),
(86, 1, 86, 1),
(87, 1, 87, 1),
(88, 1, 88, 1),
(89, 1, 89, 1),
(90, 1, 90, 1),
(91, 1, 91, 1),
(92, 1, 92, 1),
(93, 1, 93, 1),
(94, 1, 94, 1),
(95, 1, 95, 1),
(96, 1, 96, 1),
(97, 1, 97, 1),
(98, 1, 98, 1),
(99, 1, 99, 1),
(100, 1, 100, 1),
(101, 1, 101, 1),
(102, 1, 102, 1),
(103, 1, 103, 1),
(104, 1, 104, 1),
(105, 1, 105, 1),
(106, 1, 106, 1),
(107, 1, 107, 1),
(108, 1, 108, 1),
(109, 1, 109, 1),
(110, 1, 110, 1),
(111, 1, 111, 1),
(112, 1, 112, 1),
(113, 1, 113, 1),
(114, 1, 114, 1),
(115, 1, 115, 1),
(116, 1, 116, 1),
(117, 1, 117, 1),
(118, 1, 118, 1),
(119, 1, 119, 1),
(120, 1, 120, 1),
(121, 1, 121, 1),
(122, 1, 122, 1),
(123, 1, 123, 1),
(124, 1, 124, 1),
(125, 1, 125, 1),
(126, 1, 126, 1),
(127, 1, 127, 1),
(128, 1, 128, 1),
(129, 1, 129, 0),
(130, 1, 130, 0),
(131, 2, 1, 1),
(132, 2, 2, 0),
(133, 2, 3, 0),
(134, 2, 4, 0),
(135, 2, 5, 1),
(136, 2, 6, 1),
(137, 2, 7, 0),
(138, 2, 8, 0),
(139, 2, 9, 1),
(140, 2, 10, 0),
(141, 2, 11, 0),
(142, 2, 12, 0),
(143, 2, 13, 1),
(144, 2, 14, 0),
(145, 2, 15, 0),
(146, 2, 16, 0),
(147, 2, 17, 1),
(148, 2, 18, 0),
(149, 2, 19, 0),
(150, 2, 20, 0),
(151, 2, 21, 1),
(152, 2, 22, 0),
(153, 2, 23, 0),
(154, 2, 24, 0),
(155, 2, 25, 1),
(156, 2, 26, 0),
(157, 2, 27, 0),
(158, 2, 28, 0),
(159, 2, 29, 1),
(160, 2, 30, 1),
(161, 2, 31, 1),
(162, 2, 32, 1),
(163, 2, 33, 1),
(164, 2, 34, 1),
(165, 2, 35, 1),
(166, 2, 36, 1),
(167, 2, 37, 1),
(168, 2, 38, 1),
(169, 2, 39, 1),
(170, 2, 40, 1),
(171, 2, 41, 1),
(172, 2, 42, 1),
(173, 2, 43, 1),
(174, 2, 44, 1),
(175, 2, 45, 1),
(176, 2, 46, 1),
(177, 2, 47, 1),
(178, 2, 48, 1),
(179, 2, 49, 1),
(180, 2, 50, 1),
(181, 2, 51, 1),
(182, 2, 52, 1),
(183, 2, 53, 1),
(184, 2, 54, 1),
(185, 2, 55, 1),
(186, 2, 56, 1),
(187, 2, 57, 1),
(188, 2, 58, 1),
(189, 2, 59, 1),
(190, 2, 60, 1),
(191, 2, 61, 1),
(192, 2, 62, 1),
(193, 2, 63, 1),
(194, 2, 64, 1),
(195, 2, 65, 1),
(196, 2, 66, 1),
(197, 2, 67, 1),
(198, 2, 68, 1),
(199, 2, 69, 1),
(200, 2, 70, 1),
(201, 2, 71, 1),
(202, 2, 72, 1),
(203, 2, 73, 1),
(204, 2, 74, 1),
(205, 2, 75, 1),
(206, 2, 76, 1),
(207, 2, 77, 1),
(208, 2, 78, 1),
(209, 2, 79, 1),
(210, 2, 80, 1),
(211, 2, 81, 1),
(212, 2, 82, 1),
(213, 2, 83, 1),
(214, 2, 84, 1),
(215, 2, 85, 1),
(216, 2, 86, 1),
(217, 2, 87, 1),
(218, 2, 88, 1),
(219, 2, 89, 1),
(220, 2, 90, 1),
(221, 2, 91, 1),
(222, 2, 92, 1),
(223, 2, 93, 0),
(224, 2, 94, 0),
(225, 2, 95, 0),
(226, 2, 96, 0),
(227, 2, 97, 0),
(228, 2, 98, 0),
(229, 2, 99, 0),
(230, 2, 100, 0),
(231, 2, 101, 0),
(232, 2, 102, 0),
(233, 2, 103, 0),
(234, 2, 104, 0),
(235, 2, 105, 0),
(236, 2, 106, 0),
(237, 2, 107, 0),
(238, 2, 108, 0),
(239, 2, 109, 0),
(240, 2, 110, 1),
(241, 2, 111, 1),
(242, 2, 112, 1),
(243, 2, 113, 1),
(244, 2, 114, 1),
(245, 2, 115, 1),
(246, 2, 116, 1),
(247, 2, 117, 1),
(248, 2, 118, 1),
(249, 2, 119, 1),
(250, 2, 120, 1),
(251, 2, 121, 1),
(252, 2, 122, 1),
(253, 2, 123, 1),
(254, 2, 124, 1),
(255, 2, 125, 1),
(256, 2, 126, 1),
(257, 2, 127, 1),
(258, 2, 128, 1),
(259, 2, 129, 1),
(260, 2, 130, 1),
(261, 1, 131, 1),
(262, 1, 132, 1),
(263, 1, 133, 1),
(264, 1, 134, 1),
(265, 1, 135, 1),
(266, 1, 136, 1),
(267, 1, 137, 1),
(268, 1, 138, 1),
(269, 1, 139, 1),
(272, 2, 132, 0),
(273, 2, 133, 0),
(274, 2, 134, 0),
(275, 2, 135, 0),
(276, 2, 136, 1),
(277, 2, 137, 1),
(278, 2, 138, 1),
(279, 2, 139, 1),
(281, 2, 131, 0),
(282, 1, 140, 1),
(283, 1, 141, 1),
(284, 1, 142, 1),
(285, 1, 143, 1),
(286, 1, 144, 1),
(287, 2, 140, 1),
(288, 2, 141, 1),
(289, 2, 142, 1),
(290, 2, 143, 1),
(291, 2, 144, 1),
(292, 1, 145, 1),
(293, 1, 146, 1),
(294, 1, 147, 1),
(295, 1, 148, 1),
(296, 1, 149, 1),
(297, 2, 145, 1),
(298, 2, 146, 1),
(299, 2, 147, 1),
(300, 2, 148, 1),
(301, 2, 149, 1),
(302, 1, 150, 1),
(303, 2, 150, 1),
(304, 1, 151, 1),
(305, 1, 152, 1),
(306, 1, 153, 1),
(307, 1, 154, 1),
(308, 1, 155, 1),
(309, 2, 151, 1),
(310, 2, 152, 1),
(311, 2, 153, 1),
(312, 2, 154, 1),
(313, 2, 155, 1),
(314, 1, 156, 1),
(315, 2, 156, 1),
(316, 1, 157, 1),
(317, 2, 157, 1),
(318, 1, 158, 1),
(319, 1, 159, 0),
(320, 1, 160, 0),
(321, 1, 161, 0),
(322, 1, 162, 0),
(323, 2, 158, 1),
(324, 2, 159, 0),
(325, 2, 160, 0),
(326, 2, 161, 0),
(327, 2, 162, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `account_period_tab`
--

CREATE TABLE IF NOT EXISTS `account_period_tab` (
  `aid` int(10) NOT NULL AUTO_INCREMENT,
  `auid` int(10) DEFAULT NULL,
  `aname` varchar(50) DEFAULT NULL,
  `astart` int(10) DEFAULT NULL,
  `aend` int(10) DEFAULT NULL,
  `adesc` varchar(350) DEFAULT NULL,
  `astatus` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`aid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data untuk tabel `account_period_tab`
--

INSERT INTO `account_period_tab` (`aid`, `auid`, `aname`, `astart`, `aend`, `adesc`, `astatus`) VALUES
(1, 1, '2013-2014', 1356969600, 1432611667, 'Period 2013-2014', 0),
(8, 1, '2015 - 2016', 1432659600, 1432611686, 'Period 2015 - 2016', 0),
(9, 1, '2015 - 2016', 1432659600, NULL, 'Period 2015 - 2016', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `branch_tab`
--

CREATE TABLE IF NOT EXISTS `branch_tab` (
  `bid` int(10) NOT NULL AUTO_INCREMENT,
  `buid` int(10) DEFAULT NULL,
  `bluid` int(10) DEFAULT NULL,
  `bname` varchar(150) DEFAULT NULL,
  `bnpwp` varchar(20) DEFAULT NULL,
  `baddr` text,
  `bcity` int(10) DEFAULT NULL,
  `bprovince` int(10) DEFAULT NULL,
  `bphone` varchar(50) DEFAULT NULL,
  `bstatus` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`bid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data untuk tabel `branch_tab`
--

INSERT INTO `branch_tab` (`bid`, `buid`, `bluid`, `bname`, `bnpwp`, `baddr`, `bcity`, `bprovince`, `bphone`, `bstatus`) VALUES
(1, 1, 1, 'Pusat', NULL, 'wew', 1, 1, '989898*121212', 1),
(2, 1, 1, 'SEMARANG', 'aaaa', 'aasas*aw', 1, 2, '989898*121212', 1),
(3, NULL, NULL, 'Bandung', '98987898', 'jakarta', 2, 2, '870900*080980980', 2),
(4, NULL, NULL, 'Balikpapan', '97979879', 'Jl Kalimantan Balikpapan', 1, 1, '8799890*79890090', 2),
(5, NULL, NULL, 'SURABAYA', '86876799898', 'Bali satu*Bali Dua', 3, 3, '98798798789*8798797', 1),
(6, NULL, NULL, 'BANDUNG', '1', 'JL. KOPO BANDUNG*JL KOPO 2', 175, 9, '083888233884*081300000000', 1),
(7, NULL, NULL, 'sumbawa', '1', 'jl. ada lah*jl. ada lah', 4, 5, '5554484*444747474', 2),
(8, NULL, NULL, 'JAKARTA', '12345', 'jl kamal raya*jl prancis dadap', 157, 7, '02129526260*02129526261', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `categories_tab`
--

CREATE TABLE IF NOT EXISTS `categories_tab` (
  `cid` int(10) NOT NULL AUTO_INCREMENT,
  `cuid` int(10) DEFAULT NULL,
  `cluid` int(10) DEFAULT NULL,
  `ctype` tinyint(1) DEFAULT '1',
  `cname` varchar(150) DEFAULT NULL,
  `cdesc` varchar(300) DEFAULT NULL,
  `cdiscount` varchar(45) DEFAULT NULL,
  `cstatus` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

--
-- Dumping data untuk tabel `categories_tab`
--

INSERT INTO `categories_tab` (`cid`, `cuid`, `cluid`, `ctype`, `cname`, `cdesc`, `cdiscount`, `cstatus`) VALUES
(1, 1, 1, 1, 'K2', 'HOME APPLIANCE', '4', 1),
(2, 1, 1, 2, 'qqww', 'qqww', '', 1),
(3, 1, 1, 3, 'Pcs', 'Pcs', '', 1),
(4, NULL, NULL, 4, 'DVD MP4 PLAYER', 'ELECTRONIC', NULL, 1),
(5, NULL, NULL, 5, 'IC', 'IC', NULL, 1),
(6, NULL, NULL, 4, 'WASHING MACHINE', 'ELECTRONIC', NULL, 1),
(7, NULL, NULL, 3, 'Koli', 'Koli', NULL, 1),
(8, NULL, NULL, 5, 'Kabel', 'Kabel', NULL, 1),
(9, NULL, NULL, 1, 'K1', 'ELECTRONIC', '3', 1),
(10, NULL, NULL, 4, 'AIR CONDITIONER', 'ELECTRONIC', NULL, 1),
(11, NULL, NULL, 4, 'antena', 'antena', NULL, 2),
(12, NULL, NULL, 4, '2.1 SPEAKER', 'ELEKTRONIK', NULL, 1),
(13, NULL, NULL, 4, 'ALLOY PREASURA COOKER', 'HOME APPLIANCE', NULL, 1),
(14, NULL, NULL, 4, 'ANTENA', 'HOME APPLIANCE', NULL, 1),
(15, NULL, NULL, 4, 'COLOR TELEVISION', 'ELECTRONIC', NULL, 1),
(16, NULL, NULL, 4, 'DIGITAL SATELITE RECEIVER', 'ELECTRONIC', NULL, 1),
(17, NULL, NULL, 4, 'BLENDER', 'HOME APPLIANCE', NULL, 1),
(18, NULL, NULL, 4, 'COAXIAL CABLE', 'HOME APPLIANCE', NULL, 1),
(19, NULL, NULL, 4, 'COOKWARE SET', 'HOME APPLIANCE', NULL, 1),
(20, NULL, NULL, 4, 'FAN DESK', 'HOME APPLIANCE', NULL, 1),
(21, NULL, NULL, 4, 'FAN BOX', 'HOME APPLIANCE', NULL, 1),
(22, NULL, NULL, 4, 'FAN WALL', 'HOME APPLIANCE', NULL, 1),
(23, NULL, NULL, 4, 'FAN AUTO', 'HOME APPLIANCE', NULL, 1),
(24, NULL, NULL, 4, 'FAN STAND', 'HOME APPLIANCE', NULL, 1),
(25, NULL, NULL, 4, 'FAN CEILING', 'HOME APPLIANCE', NULL, 1),
(26, NULL, NULL, 4, 'FAN INDUSTRIAL', 'HOME APPLIANCE', NULL, 1),
(27, NULL, NULL, 4, 'FAN FLOOR', 'HOME APPLIANCE', NULL, 1),
(28, NULL, NULL, 4, 'GAS STOVE', 'HOME APPLIANCE', NULL, 1),
(29, NULL, NULL, 4, 'GAS WATER HEATER', 'HOME APPLIANCE', NULL, 1),
(30, NULL, NULL, 4, 'HAIR DRYER', 'HOME APPLIANCE', NULL, 1),
(31, NULL, NULL, 4, 'IRON', 'HOME APPLIANCE', NULL, 1),
(32, NULL, NULL, 4, 'LNB', 'HOME APPLIANCE', NULL, 1),
(33, NULL, NULL, 4, 'LPG REGULATOR', 'HOME APPLIANCE', NULL, 1),
(34, NULL, NULL, 4, 'MIXER', 'HOME APPLIANCE', NULL, 1),
(35, NULL, NULL, 4, 'MOSQUITO KILLER', 'HOME APPLIANCE', NULL, 1),
(36, NULL, NULL, 4, 'RICE COOKER', 'HOME APPLIANCE', NULL, 1),
(37, NULL, NULL, 4, 'VOLTAGE STABILISER', 'HOME APPLIANCE', NULL, 1),
(38, NULL, NULL, 4, 'WATER DISPENSER', 'HOME APPLIANCE', NULL, 1),
(39, NULL, NULL, 1, '100000', 'weewewe', '0', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `coa_detail_tab`
--

CREATE TABLE IF NOT EXISTS `coa_detail_tab` (
  `cid` int(10) NOT NULL AUTO_INCREMENT,
  `cbid` int(10) NOT NULL,
  `cidid` int(11) NOT NULL,
  `csaldo` double NOT NULL,
  `cdebet` double NOT NULL,
  `ccredit` double NOT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data untuk tabel `coa_detail_tab`
--

INSERT INTO `coa_detail_tab` (`cid`, `cbid`, `cidid`, `csaldo`, `cdebet`, `ccredit`) VALUES
(1, 1, 1, 0, 0, 0),
(2, 1, 2, 0, 0, 0),
(3, 1, 3, 0, 0, 0),
(4, 1, 4, 0, 0, 0),
(5, 1, 5, 0, 0, 0),
(6, 1, 6, 0, 0, 0),
(7, 1, 7, 0, 0, 0),
(8, 1, 8, 0, 0, 0),
(9, 1, 9, 0, 0, 0),
(10, 1, 10, 0, 0, 0),
(11, 1, 11, 0, 0, 0),
(12, 1, 12, 0, 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `coa_group_tab`
--

CREATE TABLE IF NOT EXISTS `coa_group_tab` (
  `cid` int(10) NOT NULL AUTO_INCREMENT,
  `cname` varchar(150) NOT NULL,
  `cdesc` varchar(350) NOT NULL,
  `cclass` tinyint(4) NOT NULL DEFAULT '0',
  `cstatus` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data untuk tabel `coa_group_tab`
--

INSERT INTO `coa_group_tab` (`cid`, `cname`, `cdesc`, `cclass`, `cstatus`) VALUES
(1, 'AKTIVA LANCAR', 'AKTIVA LANCAR', 0, 1),
(2, 'AKTIVA TETAP', 'AKTIVA TETAP', 0, 1),
(3, 'AKTIVA TETAP TAKBERWUJUD', 'AKTIVA TETAP TAKBERWUJUD', 0, 1),
(4, 'AKTIVA LAIN-LAIN', 'AKTIVA LAIN-LAIN', 0, 1),
(5, 'HUTANG NON BANK', 'HUTANG NON BANK', 1, 1),
(6, 'HUTANG USAHA', 'HUTANG USAHA', 1, 1),
(7, 'BIAYA YANG MASIH HARUS DIBAYAR', 'BIAYA YANG MASIH HARUS DIBAYAR', 1, 1),
(8, 'HUTANG PAJAK', 'HUTANG PAJAK', 1, 1),
(9, 'PENERIMAAN DI MUKA', 'PENERIMAAN DI MUKA', 1, 1),
(10, 'HUTANG KEPADA PEMEGANG SAHAM', 'HUTANG KEPADA PEMEGANG SAHAM', 1, 1),
(11, 'HUTANG LAIN-LAIN', 'HUTANG LAIN-LAIN', 1, 1),
(12, 'MODAL DISETOR', 'MODAL DISETOR', 2, 1),
(13, 'PENDAPATAN USAHA', 'PENDAPATAN USAHA', 3, 1),
(14, 'PENDAPATAN LAIN-LAIN', 'PENDAPATAN LAIN-LAIN', 3, 1),
(15, 'BEBAN POKOK PENJUALAN', 'BEBAN POKOK PENJUALAN', 4, 1),
(16, 'BEBAN LAIN-LAIN', 'BEBAN LAIN-LAIN', 4, 1),
(17, 'PAJAK PENGHASILAN', 'PAJAK PENGHASILAN', 4, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `coa_tab`
--

CREATE TABLE IF NOT EXISTS `coa_tab` (
  `cid` int(10) NOT NULL AUTO_INCREMENT,
  `catype` int(2) DEFAULT NULL,
  `ctype` tinyint(1) DEFAULT '0',
  `ccode` varchar(50) DEFAULT NULL,
  `cname` varchar(150) DEFAULT NULL,
  `cdesc` varchar(300) DEFAULT NULL,
  `cparent` int(10) DEFAULT NULL,
  `cstatus` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data untuk tabel `coa_tab`
--

INSERT INTO `coa_tab` (`cid`, `catype`, `ctype`, `ccode`, `cname`, `cdesc`, `cparent`, `cstatus`) VALUES
(1, 1, 0, '10000', 'ASET LANCAR', 'ASET LANCAR', 0, 1),
(2, 4, 0, '10100', 'KAS', 'KAS', 1, 1),
(3, 4, 0, '10101', 'KAS KANTOR', 'KAS KANTOR', 2, 1),
(4, 4, 0, '10102', 'KAS GUDANG', 'KAS GUDANG', 2, 1),
(5, 4, 0, '10103', 'KAS PABRIK', 'KAS PABRIK', 2, 1),
(6, 4, 0, '10200', 'BANK', 'Kas Pabrik', 1, 1),
(7, 4, 0, '10201', 'BANK A (IDR)', 'BANK A (IDR)', 6, 1),
(8, 4, 0, '10202', 'BANK B (IDR)', 'BANK B (IDR)', 6, 1),
(9, 4, 0, '10203', 'BANK C (USD)', 'BANK C (USD)', 6, 1),
(10, 4, 0, '10300', 'SETARA DENGAN KAS', 'SETARA DENGAN KAS', 1, 1),
(11, 4, 0, '10301', 'CEK', 'CEK', 10, 1),
(12, 4, 0, '10302', 'BILYET GIRO', 'BILYET GIRO', 10, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `customers_tab`
--

CREATE TABLE IF NOT EXISTS `customers_tab` (
  `cid` int(10) NOT NULL AUTO_INCREMENT,
  `cuid` int(10) DEFAULT NULL,
  `cluid` int(10) DEFAULT NULL,
  `cbid` int(10) DEFAULT NULL,
  `ccat` int(1) DEFAULT NULL,
  `cname` varchar(150) DEFAULT NULL,
  `caddr` text,
  `ccity` int(10) DEFAULT NULL,
  `cprov` int(10) DEFAULT NULL,
  `cdeliver` tinyint(1) DEFAULT NULL,
  `cphone` varchar(50) DEFAULT NULL,
  `cemail` varchar(50) DEFAULT NULL,
  `ccontactname` varchar(150) DEFAULT NULL,
  `csid` int(10) DEFAULT NULL,
  `ccash` int(10) DEFAULT NULL,
  `ccredit` int(10) DEFAULT NULL,
  `climit` double DEFAULT NULL,
  `cnpwp` varchar(50) DEFAULT NULL,
  `cpkp` varchar(15) DEFAULT NULL,
  `cspecial` tinyint(1) DEFAULT '0',
  `ctyperetur` int(11) NOT NULL,
  `cstatus` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `delivery_order_detail_tab`
--

CREATE TABLE IF NOT EXISTS `delivery_order_detail_tab` (
  `did` int(11) NOT NULL AUTO_INCREMENT,
  `sid` int(11) NOT NULL,
  `ssid` int(11) DEFAULT NULL,
  `spid` int(11) DEFAULT NULL,
  `scid` int(11) NOT NULL,
  `sqty` int(11) DEFAULT NULL,
  `snodo` varchar(20) NOT NULL,
  `snopol` varchar(10) NOT NULL,
  `stgldo` date NOT NULL,
  `snomor` varchar(20) NOT NULL,
  `driver` varchar(25) NOT NULL,
  `dstatus` int(11) NOT NULL,
  `sno_invoice` varchar(25) NOT NULL,
  `stgl_invoice` date DEFAULT NULL,
  `sduedate_invoice` date NOT NULL,
  `sssid` int(11) NOT NULL,
  `samount` double NOT NULL,
  `sdate_pay` date DEFAULT NULL,
  `sdate_lunas` date DEFAULT NULL,
  `sduration` int(11) NOT NULL,
  `samount_com` double NOT NULL,
  `pno_pm` varchar(25) NOT NULL,
  `tamount` double DEFAULT NULL,
  PRIMARY KEY (`did`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data untuk tabel `delivery_order_detail_tab`
--

INSERT INTO `delivery_order_detail_tab` (`did`, `sid`, `ssid`, `spid`, `scid`, `sqty`, `snodo`, `snopol`, `stgldo`, `snomor`, `driver`, `dstatus`, `sno_invoice`, `stgl_invoice`, `sduedate_invoice`, `sssid`, `samount`, `sdate_pay`, `sdate_lunas`, `sduration`, `samount_com`, `pno_pm`, `tamount`) VALUES
(1, 0, 1, 0, 2, 0, '1-230515035250', 'B 5678 X', '2015-05-23', '988', 'Driver A', 3, 'INV-1-230515035250', '2015-05-23', '2015-06-02', 1, 0, NULL, NULL, 0, 0, '', NULL),
(2, 2, 1, 1, 2, 3, '1-230515035250', 'B 5678 X', '2015-05-23', '988', '', 3, 'INV-1-230515035250', '2015-05-23', '2015-06-02', 1, 100000, NULL, NULL, 0, 0, '', 300000),
(3, 1, 1, 3, 2, 30, '1-230515035250', 'B 5678 X', '2015-05-23', '988', '', 3, 'INV-1-230515035250', '2015-05-23', '2015-06-02', 1, 1200, NULL, NULL, 0, 0, '', 36000),
(4, 0, 1, 0, 2, 0, '1-230515035441', 'AB 6777 H', '2015-05-23', '876', 'Driver B', 3, 'INV-1-230515035441', '2015-05-23', '2015-06-02', 1, 0, NULL, NULL, 0, 0, '', NULL),
(5, 2, 1, 1, 2, 5, '1-230515035441', 'AB 6777 H', '2015-05-23', '876', '', 3, 'INV-1-230515035441', '2015-05-23', '2015-06-02', 1, 100000, NULL, NULL, 0, 0, '', 500000),
(6, 1, 1, 3, 2, 15, '1-230515035441', 'AB 6777 H', '2015-05-23', '876', '', 3, 'INV-1-230515035441', '2015-05-23', '2015-06-02', 1, 1200, NULL, NULL, 0, 0, '', 18000),
(7, 0, 3, 0, 2, 0, '3-230515062236', 'AB 6777', '2015-05-23', '1234', 'sss', 3, 'INV-3-230515062236', '2015-05-23', '2015-06-02', 1, 0, NULL, NULL, 0, 0, '', NULL),
(8, 3, 3, 3, 2, 50, '3-230515062236', 'AB 6777', '2015-05-23', '1234', '', 3, 'INV-3-230515062236', '2015-05-23', '2015-06-02', 1, 1200, NULL, NULL, 0, 0, '', 60000),
(9, 0, 3, 0, 2, 0, '3-230515062340', 'AB 6777', '2015-05-29', '1234', 'Driver B', 3, 'INV-3-230515062340', '2015-05-23', '2015-06-02', 0, 0, NULL, NULL, 0, 0, '', NULL),
(10, 3, 3, 3, 2, 6, '3-230515062340', 'AB 6777', '2015-05-29', '1234', '', 3, 'INV-3-230515062340', '2015-05-23', '2015-06-02', 1, 1200, NULL, NULL, 0, 0, '', 7200),
(11, 0, 25, 0, 4, 0, '25-250515053053', 'wewewe', '2015-05-25', '2323', 'wewew', 3, 'INV-25-250515053053', '2015-05-25', '3985-06-25', 0, 0, NULL, NULL, 0, 0, '', NULL),
(13, 37, 25, 2, 4, 2, '25-250515053053', 'wewewe', '2015-05-25', '2323', '', 3, 'INV-25-250515053053', '2015-05-25', '3985-06-25', 1, 110, NULL, NULL, 0, 0, '', 220),
(14, 42, 25, 2, 4, 6, '25-250515053053', 'wewewe', '2015-05-25', '2323', '', 3, 'INV-25-250515053053', '2015-05-25', '3985-06-25', 1, 110, NULL, NULL, 0, 0, '', 660);

-- --------------------------------------------------------

--
-- Struktur dari tabel `gl_detail_tab`
--

CREATE TABLE IF NOT EXISTS `gl_detail_tab` (
  `gid` int(10) NOT NULL AUTO_INCREMENT,
  `ggid` int(10) DEFAULT NULL,
  `gcid` int(10) DEFAULT NULL,
  `gdebet` double DEFAULT NULL,
  `gcredit` double DEFAULT NULL,
  `gdesc` varchar(350) NOT NULL,
  `gstatus` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`gid`),
  KEY `fk_gl_detail_tab_1_idx` (`ggid`),
  KEY `fk_gl_detail_tab_2_idx` (`gcid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data untuk tabel `gl_detail_tab`
--

INSERT INTO `gl_detail_tab` (`gid`, `ggid`, `gcid`, `gdebet`, `gcredit`, `gdesc`, `gstatus`) VALUES
(1, 3, 7, 1000000, 0, 'test 1', 1),
(2, 3, 8, 0, 500000, 'test 2', 1),
(5, 4, 7, 1000000, 0, 'wew', 1),
(6, 4, 4, 0, 50000, 'rerer', 1),
(7, 4, 7, 5000, 0, 'ytyt', 1),
(8, 4, 8, 10000, 0, 'wewew', 1),
(9, 1, 7, 1000000, 0, 'wewew', 1),
(10, 1, 12, 0, 10000000, 'wew', 1),
(11, 2, 4, 500000, 0, 'test', 1),
(12, 2, 3, 0, 500000, 'test', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `gl_tab`
--

CREATE TABLE IF NOT EXISTS `gl_tab` (
  `gid` int(10) NOT NULL AUTO_INCREMENT,
  `gbid` int(10) DEFAULT NULL,
  `guid` int(10) DEFAULT NULL,
  `gaid` int(10) DEFAULT NULL,
  `gtype` int(2) DEFAULT NULL,
  `gtitle` varchar(200) DEFAULT NULL,
  `gdesc` varchar(350) DEFAULT NULL,
  `gdate` int(10) DEFAULT NULL,
  `gpdate` int(10) DEFAULT NULL,
  `grefid` int(10) DEFAULT NULL,
  `gdocref` varchar(45) DEFAULT NULL,
  `gstatus` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`gid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data untuk tabel `gl_tab`
--

INSERT INTO `gl_tab` (`gid`, `gbid`, `guid`, `gaid`, `gtype`, `gtitle`, `gdesc`, `gdate`, `gpdate`, `grefid`, `gdocref`, `gstatus`) VALUES
(1, 1, 1, 9, 1, 'Jurnal Test', 'Jurnal Test123', 1432720192, 1432720192, 1, 'weww', 1),
(2, 1, 1, 9, 0, 'Streaming Bareksa Fund Academy', 'aaaaaaaaaaaaaaaaaaa', 1432720222, 1432720222, NULL, 'eeeeeee', 1),
(3, 1, 1, 9, 0, 'Streaming Bareksa Fund Academy', 'aaaaaaaaaaaaaaaaaaa', 1432720227, 1432720227, NULL, '232323', 1),
(4, 1, 1, 9, 5, 'palma', 'erere', 1432720233, 1432720233, NULL, 'trasf234', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `groups_tab`
--

CREATE TABLE IF NOT EXISTS `groups_tab` (
  `gid` int(4) unsigned NOT NULL AUTO_INCREMENT,
  `gname` varchar(50) NOT NULL,
  `gdesc` text NOT NULL,
  `gstatus` int(1) DEFAULT '0',
  PRIMARY KEY (`gid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `groups_tab`
--

INSERT INTO `groups_tab` (`gid`, `gname`, `gdesc`, `gstatus`) VALUES
(1, 'Root', 'Root', 1),
(2, 'Admins', 'aaaaaaa', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `inventory_tab`
--

CREATE TABLE IF NOT EXISTS `inventory_tab` (
  `iid` int(10) NOT NULL AUTO_INCREMENT,
  `iuid` int(10) DEFAULT '0',
  `iluid` int(10) DEFAULT '0',
  `ibid` int(10) DEFAULT '1',
  `iiid` int(10) DEFAULT '0',
  `itype` tinyint(1) DEFAULT '0',
  `istockbegining` int(10) DEFAULT '0',
  `istockin` int(10) DEFAULT '0',
  `istockout` int(10) DEFAULT '0',
  `istock` int(10) DEFAULT '0',
  `istatus` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`iid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=45 ;

--
-- Dumping data untuk tabel `inventory_tab`
--

INSERT INTO `inventory_tab` (`iid`, `iuid`, `iluid`, `ibid`, `iiid`, `itype`, `istockbegining`, `istockin`, `istockout`, `istock`, `istatus`) VALUES
(1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 1),
(3, 1, 1, 1, 1, 3, 0, 0, 0, 100, 1),
(4, NULL, NULL, 2, 1, 1, 111, 111, 11, 11, 1),
(5, NULL, NULL, 1, 1, 4, 0, 105, 0, 116, 1),
(6, NULL, NULL, 1, 3, 4, 5, 5, 32, -27, 1),
(7, NULL, NULL, 1, 3, 4, NULL, NULL, 0, NULL, 2),
(13, NULL, NULL, 1, 3, 2, 10, 10, 33, -23, 1),
(14, NULL, NULL, 1, 2, 2, 10, 10, 42, -32, 1),
(15, NULL, NULL, 1, 1, 2, 10, 10, 41, -31, 1),
(16, NULL, NULL, 1, 3, 1, 100, 131, 0, 123, 1),
(17, NULL, NULL, 1, 2, 1, 1000, 1000, 0, 1000, 1),
(18, NULL, NULL, 2, 3, 1, 1000, 90, 0, 1090, 0),
(19, NULL, NULL, 2, 2, 1, 1000, 0, 0, 1000, 1),
(20, NULL, NULL, 5, 5, 1, 0, 0, 0, 0, 1),
(21, NULL, NULL, 4, 5, 1, 0, 0, 0, 0, 1),
(22, NULL, NULL, 3, 5, 1, 0, 0, 0, 0, 1),
(23, NULL, NULL, 2, 5, 1, 0, 100, 0, 100, 1),
(24, NULL, NULL, 5, 4, 2, 0, 0, 0, 0, 1),
(25, NULL, NULL, 4, 4, 2, 0, 0, 0, 0, 1),
(26, NULL, NULL, 3, 4, 2, 0, 0, 0, 0, 1),
(27, NULL, NULL, 1, 4, 2, 0, 0, 27, -27, 1),
(28, NULL, NULL, 2, 4, 2, 0, 0, 0, 0, 1),
(29, NULL, NULL, 1, 3, 3, 1, 5, 0, 13, 1),
(30, 0, 0, 2, 5, 3, 1, 1, 0, 1, 1),
(31, 0, 0, 2, 3, 3, 10, 10, 0, 10, 1),
(32, 0, 0, 2, 5, 4, 100, 100, 0, 100, 1),
(33, 0, 0, 2, 3, 4, 90, 90, 0, 90, 1),
(34, 0, 0, 1, 5, 3, 0, 0, 0, 0, 1),
(35, 0, 0, 1, 5, 4, 10, 10, 20, -10, 1),
(36, 0, 0, 1, 5, 1, 0, 10, 0, 20, 1),
(37, 0, 0, 5, 6, 1, 0, 0, 0, 0, 1),
(38, 0, 0, 4, 6, 1, 0, 0, 0, 0, 1),
(39, 0, 0, 6, 6, 1, 0, 0, 0, 0, 1),
(40, 0, 0, 2, 6, 1, 0, 0, 0, 0, 1),
(41, 0, 0, 5, 7, 1, 0, 0, 0, 0, 1),
(42, 0, 0, 4, 7, 1, 0, 0, 0, 0, 1),
(43, 0, 0, 6, 7, 1, 0, 0, 0, 0, 1),
(44, 0, 0, 2, 7, 1, 0, 0, 0, 0, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `log_inventory_tab`
--

CREATE TABLE IF NOT EXISTS `log_inventory_tab` (
  `lid` int(10) NOT NULL AUTO_INCREMENT,
  `iid` int(11) NOT NULL,
  `iuid` int(10) DEFAULT NULL,
  `iluid` int(10) DEFAULT NULL,
  `ibid` int(10) DEFAULT NULL,
  `iiid` int(10) DEFAULT NULL,
  `itype` tinyint(1) DEFAULT NULL,
  `istockbegining` int(10) DEFAULT NULL,
  `istockin` int(10) DEFAULT NULL,
  `istockout` int(10) DEFAULT NULL,
  `istock` int(10) DEFAULT NULL,
  `istatus` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`lid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=329 ;

--
-- Dumping data untuk tabel `log_inventory_tab`
--

INSERT INTO `log_inventory_tab` (`lid`, `iid`, `iuid`, `iluid`, `ibid`, `iiid`, `itype`, `istockbegining`, `istockin`, `istockout`, `istock`, `istatus`) VALUES
(325, 0, NULL, NULL, 0, 2, 1, 0, 0, 2, 0, 1),
(326, 0, NULL, NULL, 0, 2, 1, 0, 0, 6, 0, 1),
(327, 0, NULL, NULL, 0, 2, 1, 0, 0, 2, 0, 1),
(328, 0, NULL, NULL, 0, 2, 1, 0, 0, 6, 0, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `moq_tab`
--

CREATE TABLE IF NOT EXISTS `moq_tab` (
  `mid` int(10) NOT NULL AUTO_INCREMENT,
  `muid` int(10) DEFAULT NULL,
  `mluid` int(10) DEFAULT NULL,
  `mbid` int(10) DEFAULT NULL,
  `mpid` int(10) DEFAULT NULL,
  `mqty` int(10) DEFAULT NULL,
  PRIMARY KEY (`mid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data untuk tabel `moq_tab`
--

INSERT INTO `moq_tab` (`mid`, `muid`, `mluid`, `mbid`, `mpid`, `mqty`) VALUES
(1, 1, 1, 1, 1, 7),
(2, 1, 1, 2, 1, 150000),
(3, NULL, NULL, 1, 2, 4),
(4, NULL, NULL, 2, 2, 5),
(5, NULL, NULL, 1, 3, 44444),
(6, NULL, NULL, 2, 3, 55555),
(10, NULL, NULL, 5, 3, 3111113),
(11, NULL, NULL, 4, 3, 22222),
(12, NULL, NULL, 3, 3, 33333),
(13, NULL, NULL, 5, 2, 1),
(14, NULL, NULL, 4, 2, 2),
(15, NULL, NULL, 3, 2, 3),
(16, NULL, NULL, 5, 1, 150000),
(17, NULL, NULL, 4, 1, 150000),
(18, NULL, NULL, 3, 1, 150000),
(19, NULL, NULL, 5, 5, 50),
(20, NULL, NULL, 4, 5, 50),
(21, NULL, NULL, 3, 5, 300),
(22, NULL, NULL, 2, 5, 50),
(23, NULL, NULL, 6, 5, 50),
(24, NULL, NULL, 5, 6, 100),
(25, NULL, NULL, 4, 6, 20),
(26, NULL, NULL, 6, 6, 60),
(27, NULL, NULL, 2, 6, 30),
(28, NULL, NULL, 5, 7, 0),
(29, NULL, NULL, 4, 7, 0),
(30, NULL, NULL, 6, 7, 0),
(31, NULL, NULL, 2, 7, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `opname_tab`
--

CREATE TABLE IF NOT EXISTS `opname_tab` (
  `oid` int(10) NOT NULL AUTO_INCREMENT,
  `oidid` int(10) DEFAULT NULL,
  `otype` tinyint(1) DEFAULT '1',
  `odate` int(10) DEFAULT NULL,
  `ostockbegining` int(10) DEFAULT NULL,
  `ostockin` int(10) DEFAULT NULL,
  `ostockout` int(10) DEFAULT NULL,
  `ostock` int(10) DEFAULT NULL,
  `odesc` varchar(350) DEFAULT NULL,
  PRIMARY KEY (`oid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data untuk tabel `opname_tab`
--

INSERT INTO `opname_tab` (`oid`, `oidid`, `otype`, `odate`, `ostockbegining`, `ostockin`, `ostockout`, `ostock`, `odesc`) VALUES
(2, 1, 1, 1397310166, 0, 0, 0, 0, NULL),
(3, 2, 2, 1397310166, 0, 0, 0, 0, NULL),
(4, 2, 2, 1397310166, 0, 0, 0, 0, NULL),
(5, 2, 2, 1397310166, 10, 10, 10, 10, NULL),
(6, 29, 3, 1421480889, 1, 1, 0, 1, 'test'),
(7, 3, 3, 1421667086, 0, 0, 0, 100, ''),
(8, 29, 3, 1421667096, 1, 2, 0, 10, 'test doang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran_detail_tab`
--

CREATE TABLE IF NOT EXISTS `pembayaran_detail_tab` (
  `pinid` int(11) NOT NULL AUTO_INCREMENT,
  `pbid` int(11) NOT NULL,
  `pno_inv` varchar(20) NOT NULL,
  `ptotal_inv` double NOT NULL,
  PRIMARY KEY (`pinid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran_tab`
--

CREATE TABLE IF NOT EXISTS `pembayaran_tab` (
  `pmid` int(11) NOT NULL AUTO_INCREMENT,
  `pno_pm` varchar(25) NOT NULL,
  `pcid` int(11) NOT NULL,
  `pm_tgl` date NOT NULL,
  `pcash` double NOT NULL,
  `pgiro` double NOT NULL,
  `piutang` double NOT NULL,
  `ptgl_giro` date DEFAULT NULL,
  `pwrite_off` double NOT NULL,
  `sreff` varchar(20) NOT NULL,
  `status` int(11) NOT NULL,
  `kurang_bayar` double NOT NULL,
  `no_invoice` varchar(25) NOT NULL,
  `type_bayar` int(11) NOT NULL,
  `tgl_bayar` date NOT NULL,
  `status_bayar` int(11) NOT NULL,
  `jum_pending` double NOT NULL,
  `jum_bayar` double NOT NULL,
  PRIMARY KEY (`pmid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penerimaan_tab`
--

CREATE TABLE IF NOT EXISTS `penerimaan_tab` (
  `pid` int(11) NOT NULL AUTO_INCREMENT,
  `pnobukti` varchar(20) NOT NULL,
  `ptgl` date DEFAULT NULL,
  `pstatus` tinyint(1) NOT NULL DEFAULT '0',
  `pcdate` date DEFAULT NULL,
  `dpp` double NOT NULL,
  `ppn` double NOT NULL,
  `disc` double NOT NULL,
  `total` double NOT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `permission_tab`
--

CREATE TABLE IF NOT EXISTS `permission_tab` (
  `pid` int(10) NOT NULL AUTO_INCREMENT,
  `pname` varchar(45) DEFAULT NULL,
  `pdesc` varchar(150) DEFAULT NULL,
  `purl` varchar(45) DEFAULT NULL,
  `pparent` int(10) DEFAULT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=163 ;

--
-- Dumping data untuk tabel `permission_tab`
--

INSERT INTO `permission_tab` (`pid`, `pname`, `pdesc`, `purl`, `pparent`) VALUES
(1, 'BranchView', 'Branch View', 'branch', 0),
(2, 'BranchAdd', 'Branch Add', 'branch/branch_add', 1),
(3, 'BranchUpdate', 'Branch Update', 'branch/branch_update', 1),
(4, 'BranchDelete', 'Branch Delete', 'branch/branch_delete', 1),
(5, 'CustomersView', 'Customers View', 'customers', 0),
(6, 'CustomersAdd', 'Customers Add', 'customers/customers_add', 5),
(7, 'CustomersUpdate', 'Customers Update', 'customers/customers_update', 5),
(8, 'CustomersDelete', 'Customers Delete', 'customers/customers_delete', 5),
(9, 'ProductsView', 'Products View', 'products', 0),
(10, 'ProductsAdd', 'Products Add', 'products/products_add', 9),
(11, 'ProductsUpdate', 'Products Update', 'products/products_update', 9),
(12, 'ProductsDelete', 'Products Delete', 'products/products_delete', 9),
(13, 'PackagingView', 'Packaging View', 'packaging', 0),
(14, 'PackagingAdd', 'Packaging Add', 'packaging/packaging_add', 13),
(15, 'PackagingUpdate', 'Packaging Update', 'packaging/packaging_update', 13),
(16, 'PackagingDelete', 'Packaging Delete', 'packaging/packaging_delete', 13),
(17, 'CategoriesProductView', 'Categories Product View', 'categories', 0),
(18, 'CategoriesProductAdd', 'Categories Product Add', 'categories/categories_add', 17),
(19, 'CategoriesProductUpdate', 'Categories Product Update', 'categories/categories_update', 17),
(20, 'CategoriesProductDelete', 'Categories Product Delete', 'categories/categories_delete', 17),
(21, 'SparepartView', 'Sparepart View', 'sparepart', 0),
(22, 'SparepartAdd', 'Sparepart Add', 'sparepart/sparepart_add', 21),
(23, 'SparepartUpdate', 'Sparepart Update', 'sparepart/sparepart_update', 21),
(24, 'SparepartDelete', 'Sparepart Delete', 'sparepart/sparepart_delete', 21),
(25, 'TargetOmsetView', 'Target Omset View', 'target', 0),
(26, 'TargetOmsetAdd', 'Target Omset Add', 'target/target_add', 25),
(27, 'TargetOmsetUpdate', 'Target Omset Update', 'target/target_update', 25),
(28, 'TargetOmsetDelete', 'Target Omset Delete', 'target/target_delete', 25),
(29, 'SalesView', 'Sales View', 'sales', 0),
(30, 'SalesAdd', 'Sales Add', 'sales/sales_add', 29),
(31, 'SalesUpdate', 'Sales Update', 'sales/sales_update', 29),
(32, 'SalesDelete', 'Sales Delete', 'sales/sales_delete', 29),
(33, 'SalesCommisionView', 'Sales Commision View', 'sales_commision', 0),
(34, 'SalesCommisionAdd', 'Sales Commision Add', 'sales_commision/sales_commision_add', 33),
(35, 'SalesCommisionUpdate', 'Sales Commision Update', 'sales_commision/sales_commision_update', 33),
(36, 'SalesCommisionDelete', 'Sales Commision Delete', 'sales_commision/sales_commision_delete', 33),
(37, 'TechnicalView', 'Technical View', 'technical', 0),
(38, 'TechnicalAdd', 'Technical Add', 'technical/technical_add', 37),
(39, 'TechnicalUpdate', 'Technical Update', 'technical/technical_update', 37),
(40, 'TechnicalDelete', 'Technical Delete', 'technical/technical_delete', 37),
(41, 'SuplierView', 'Suplier View', 'suplier/suplier_view', 0),
(42, 'SuplierAdd', 'Suplier Add', 'suplier/suplier_add', 41),
(43, 'SuplierUpdate', 'Suplier Update', 'suplier/suplier_update', 41),
(44, 'SuplierDelete', 'Suplier Delete', 'suplier/suplier_delete', 41),
(45, 'ServicesView', 'Services View', 'services', 0),
(46, 'ServicesAdd', 'Services Add', 'services/services_add', 45),
(47, 'ServicesUpdate', 'Services Update', 'services/services_update', 45),
(48, 'ServicesDelete', 'Services Delete', 'services/services_delete', 45),
(49, 'InventoryProductView', 'Inventory Product View', 'inventory/1', 0),
(50, 'InventoryProductAdd', 'Inventory Product Add', 'inventory/inventory_add/1', 49),
(51, 'InventoryProductUpdate', 'Inventory Product Update', 'inventory/inventory_update/1', 49),
(52, 'InventoryProductDelete', 'Inventory Product Delete', 'inventory/inventory_delete/1', 49),
(53, 'InventorySparepartView', 'Inventory Sparepart View', 'inventory/2', 0),
(54, 'InventorySparepartAdd', 'Inventory Sparepart Add', 'inventory/inventory_add/2', 53),
(55, 'InventorySparepartUpdate', 'Inventory Sparepart Update', 'inventory/inventory_update/2', 53),
(56, 'InventorySparepartDelete', 'Inventory Sparepart Delete', 'inventory/inventory_delete/2', 53),
(57, 'InventoryRejectProductView', 'Inventory Reject Product View', 'inventory/3', 0),
(58, 'InventoryRejectProductAdd', 'Inventory Reject Product Add', 'inventory/inventory_add/3', 57),
(59, 'InventoryRejectProductUpdate', 'Inventory Reject Product Update', 'inventory/inventory_update/3', 57),
(60, 'InventoryRejectProductDelete', 'Inventory Reject Product Delete', 'inventory/inventory_delete/3', 57),
(61, 'InventoryReturnView', 'Inventory Return View', 'inventory/4', 0),
(62, 'InventoryReturnAdd', 'Inventory Return Add', 'inventory/inventory_add/4', 61),
(63, 'InventoryReturnUpdate', 'Inventory Return Update', 'inventory/inventory_update/4', 61),
(64, 'InventoryReturnDelete', 'Inventory Return Delete', 'inventory/inventory_delete/4', 61),
(65, 'OpnameProductView', 'Opname Product View', 'opname/1', 0),
(67, 'OpnameProductUpdate', 'Opname Product Update', 'opname/opname_update/1', 65),
(69, 'OpnameSparepartView', 'Opname Sparepart View', 'opname/2', 0),
(71, 'OpnameSparepartUpdate', 'Opname Sparepart Update', 'opname/opname_update/2', 69),
(73, 'OpnameRejectProductView', 'Opname Reject Product View', 'opname/3', 0),
(75, 'OpnameRejectProductUpdate', 'Opname Reject Product Update', 'opname/opname_update/3', 73),
(77, 'OpnameReturnView', 'Opname Return View', 'opname/4', 0),
(79, 'OpnameReturnUpdate', 'Opname Return Update', 'opname/opname_update/4', 77),
(81, 'PurchaseOrderView', 'Purchase Order View', 'purchase_order/home', 0),
(82, 'PurchaseOrderAdd', 'Purchase Order Add', 'purchase_order/home/purchase_order_add', 81),
(83, 'PurchaseOrderUpdate', 'Purchase Order Update', 'purchase_order/home/purchase_order_update', 81),
(84, 'PurchaseOrderDelete', 'Purchase Order Delete', 'purchase_order/home/purchase_order_delete', 81),
(85, 'SalesOrderView', 'Sales Order View', 'sales_order/home', 0),
(86, 'SalesOrderAdd', 'Sales Order Add', 'sales_order/home/sales_order_add', 85),
(87, 'SalesOrderUpdate', 'Sales Order Update', 'sales_order/home/sales_order_update', 85),
(88, 'SalesOrderDelete', 'Sales Order Delete', 'sales_order/home/sales_order_delete', 85),
(89, 'DeliveryOrderView', 'Delivery Order View', 'delivery_order/home', 0),
(90, 'DeliveryOrderAdd', 'Delivery Order Add', 'delivery_order/home/delivery_order_add', 89),
(91, 'DeliveryOrderUpdate', 'Delivery Order Update', 'delivery_order/home/delivery_order_update', 89),
(92, 'DeliveryOrderDelete', 'Delivery Order Delete', 'delivery_order/home/delivery_order_delete', 89),
(93, 'ExecuteAllBranchCustomers', 'Execute All Branch Customers', 'customers/*', 0),
(94, 'ExecuteAllBranchTargetOmset', 'Execute All Branch Target Omset', 'target/*', 0),
(95, 'ExecuteAllBranchSales', 'Execute All Branch Sales', 'sales/*', 0),
(96, 'ExecuteAllBranchSalesCommision', 'Execute All Branch Sales Commision', 'sales_commision/*', 0),
(97, 'ExecuteAllBranchTechnical', 'Execute All Branch Technical', 'technical/*', 0),
(98, 'ExecuteAllBranchServices', 'Execute All Branch Services', 'services/*', 0),
(99, 'ExecuteAllBranchInventoryProduct', 'Execute All Branch Inventory Product', 'inventory/1/*', 0),
(100, 'ExecuteAllBranchInventorySparepart', 'Execute All Branch Inventory Sparepart', 'inventory/2/*', 0),
(101, 'ExecuteAllBranchInventoryRejectProduct', 'Execute All Branch Inventory Reject Product', 'inventory/3/*', 0),
(102, 'ExecuteAllBranchInventoryReturn', 'Execute All Branch Inventory Return', 'inventory/4/*', 0),
(103, 'ExecuteAllBranchOpnameProduct', 'Execute All Branch Opname Product', 'opname/1/*', 0),
(104, 'ExecuteAllBranchOpnameSparepart', 'Execute All Branch Opname Sparepart', 'opname/2/*', 0),
(105, 'ExecuteAllBranchOpnameRejectProduct', 'Execute All Branch Opname Reject Product', 'opname/3/*', 0),
(106, 'ExecuteAllBranchOpnameReturn', 'Execute All Branch Opname Return', 'opname/4/*', 0),
(107, 'ExecuteAllBranchPurchaseOrder', 'Execute All Branch Purchase Order', 'purchase_order/home/*', 0),
(108, 'ExecuteAllBranchSalesOrder', 'Execute All Branch Sales Order', 'sales_order/home/*', 0),
(109, 'ExecuteAllBranchDeliveryOrder', 'Execute All Branch Delivery Order', 'delivery_order/home/*', 0),
(110, 'COAView', 'COA View', 'coa', 0),
(111, 'COAAdd', 'COA Add', 'coa/coa_add', 110),
(112, 'COAUpdate', 'COA Update', 'coa/coa_update', 110),
(113, 'COADelete', 'COA Delete', 'coa/coa_delte', 110),
(114, 'JournalView', 'Journal View', 'journal', 0),
(115, 'JournalAdd', 'Journal Add', 'journal/journal_add', 114),
(116, 'JournalUpdate', 'Journal Update', 'journal/journal_update', 114),
(117, 'JournalDelete', 'Journal Delete', 'journal/journal_delete', 114),
(118, 'ExecuteAllBranch', 'Execute All Branch', 'branch/*', 0),
(119, 'GroupProductView', 'Group Product View', 'group_product', 0),
(120, 'GroupProductAdd', 'Group Product Add', 'group_product/group_product_add', 119),
(121, 'GroupProductUpdate', 'Group Product Update', 'group_product/group_product_update', 119),
(122, 'GroupProductDelete', 'Group Product Delete', 'group_product/group_product_delete', 119),
(123, 'ExecuteAllGroupProduct', 'Execute All Group Product', 'group_product/*', 0),
(124, 'GroupSparepartView', 'Group Sparepart View', 'group_sparepart', 0),
(125, 'GroupSparepartAdd', 'Group Sparepart Add', 'group_sparepart/group_sparepart_add', 124),
(126, 'GroupSparepartUpdate', 'Group Sparepart Update', 'group_sparepart/group_sparepart_update', 124),
(127, 'GroupSparepartDelete', 'Group Sparepart Delete', 'group_sparepart/group_sparepart_delete', 124),
(128, 'ExecuteAllGroupSparepart', 'Execute All Group Sparepart', 'group_sparepart/*', 0),
(129, 'BranchViewAsBranch', 'Branch View As Branch', 'branch', 1),
(130, 'ProductViewAsBranch', 'Group Sparepart Add', 'product', 9),
(131, 'UsersView', 'Users View', 'users', 0),
(132, 'UsersAdd', 'Users Add', 'users/users_add', 131),
(133, 'UsersUpdate', 'Users Update', 'users/users_update', 131),
(134, 'UsersDelete', 'Users Delete', 'users/users_delete', 131),
(135, 'ExecuteAllBranchUsers', 'Execute All Branch Users', 'users/*', 0),
(136, 'UsersGroupView', 'Users Group View', 'users/users_group', 0),
(137, 'UsersGroupAdd', 'Users Group Add', 'users/users_group_add', 136),
(138, 'UsersGroupUpdate', 'Users Group Update', 'users/users_group_update', 136),
(139, 'UsersGroupDelete', 'Users Group Delete', 'users/users_group_delete', 136),
(140, 'ServicesWOView', 'Services Work Order View', 'services_wo', 0),
(141, 'ServicesWOAdd', 'Services Work Order Add', 'services_wo/services_wo_add', 140),
(142, 'ServicesWOUpdate', 'Services Work Order Update', 'services_wo/services_wo_update', 140),
(143, 'ServicesWODelete', 'Services Work Order Delete', 'services_wo/services_wo_delete', 140),
(144, 'ExecuteAllBranchServicesWO', 'Execute All Branch Services Work Order', 'services_wo/*', 0),
(145, 'ServicesSparepartView', 'Services Sparepart View', 'services_sparepart', 0),
(146, 'ServicesSparepartAdd', 'Services Sparepart Add', 'services_sparepart/services_sparepart_add', 145),
(147, 'ServicesSparepartUpdate', 'Services Sparepart Update', 'services_sparepart/services_sparepart_update', 145),
(148, 'ServicesSparepartDelete', 'Services Sparepart Delete', 'services_sparepart/services_sparepart_delete', 145),
(149, 'ExecuteAllBranchServicesSparepart', 'Execute All Branch Services Sparepart', 'services_sparepart/*', 0),
(150, 'ServicesApproval', 'Services Approval', 'services/services_update', 45),
(151, 'ServicesReportView', 'Services Report View', 'services_report', 0),
(152, 'ServicesReportAdd', 'Services Report Add', 'services_report/services_report_add', 151),
(153, 'ServicesReportUpdate', 'Services Report Update', 'services_report/services_report_update', 151),
(154, 'ServicesReportDelete', 'Services Report Delete', 'services_report/services_report_delete', 151),
(155, 'ExecuteAllBranchServicesReport', 'Execute All Branch Services Report', 'services_report/*', 0),
(156, 'ServicesReportApproval', 'Services Report Approval', 'services_report/services_report_update', 151),
(157, 'ServicesSparepartApproval', 'Services Sparepart Approval', 'services_sparepart/services_sparepart_update', 145),
(158, 'InventoryRejectSparepartView', 'Inventory Reject Sparepart View', 'inventory/5', 0),
(159, 'InventoryRejectSparepartAdd', 'Inventory Reject Sparepart Add', 'inventory/inventory_add/5', 158),
(160, 'InventoryRejectSparepartUpdate', 'Inventory Reject Sparepart Update', 'inventory/inventory_update/5', 158),
(161, 'InventoryRejectSparepartDelete', 'Inventory Reject Sparepart Delete', 'inventory/inventory_delete/5', 158),
(162, 'ExecuteAllBranchInventoryRejectSparepart', 'Execute All Branch Inventory Reject Sparepart', 'inventory/5/*', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pm_tab`
--

CREATE TABLE IF NOT EXISTS `pm_tab` (
  `pid` int(10) NOT NULL AUTO_INCREMENT,
  `pdate` int(10) DEFAULT NULL,
  `pfrom` int(10) DEFAULT NULL,
  `pto` int(10) DEFAULT NULL,
  `psubject` varchar(150) DEFAULT NULL,
  `pmsg` text,
  `pstatus` tinyint(1) DEFAULT '0',
  `pfdelete` tinyint(1) DEFAULT '0',
  `ptdelete` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data untuk tabel `pm_tab`
--

INSERT INTO `pm_tab` (`pid`, `pdate`, `pfrom`, `pto`, `psubject`, `pmsg`, `pstatus`, `pfdelete`, `ptdelete`) VALUES
(1, 1397310166, 2, 1, 'test', 'asasaskaskansknaksnaks an ksnaksnaksna ks naks an skna', 1, 0, 0),
(2, 1397310166, 1, 2, 'testw', 'papspasas as as ', 0, 0, 0),
(3, 1402771900, 1, 2, 'aa', 'aaa', 0, 0, 0),
(4, 1402773166, 1, 2, 'qqqqqq', 'qqqqqqqqqq\n\n-------\ntest\nasasaskaskansknaksnaks an ksnaksnaksna ks naks an skna                        ', 0, 0, 0),
(5, 1403422074, 1, 1, 'qqqqqq', 'aaaaa', 1, 0, 0),
(6, 1417071429, 1, 1, 'wew', 'wew', 1, 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `products_tab`
--

CREATE TABLE IF NOT EXISTS `products_tab` (
  `pid` int(10) NOT NULL AUTO_INCREMENT,
  `puid` int(10) DEFAULT NULL,
  `pluid` int(10) DEFAULT NULL,
  `pcid` int(10) DEFAULT NULL,
  `pvolume` int(10) DEFAULT NULL,
  `pgroup` tinyint(1) DEFAULT '0',
  `ptype` tinyint(1) DEFAULT '0',
  `ppid` int(10) DEFAULT '1',
  `pcode` varchar(50) DEFAULT NULL,
  `pname` varchar(150) DEFAULT NULL,
  `pdesc` varchar(300) DEFAULT NULL,
  `phpp` int(10) DEFAULT NULL,
  `pdist` int(10) DEFAULT NULL,
  `psemi` int(10) DEFAULT NULL,
  `pkey` int(10) DEFAULT NULL,
  `pstore` int(10) DEFAULT NULL,
  `pconsume` int(10) DEFAULT NULL,
  `ppoint` int(3) DEFAULT NULL,
  `pdisc` int(10) DEFAULT NULL,
  `pstatus` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data untuk tabel `products_tab`
--

INSERT INTO `products_tab` (`pid`, `puid`, `pluid`, `pcid`, `pvolume`, `pgroup`, `ptype`, `ppid`, `pcode`, `pname`, `pdesc`, `phpp`, `pdist`, `psemi`, `pkey`, `pstore`, `pconsume`, `ppoint`, `pdisc`, `pstatus`) VALUES
(1, 1, 1, 1, 1, 4, 2, 3, 'KG0281', 'Kompor Gas', 'testing', 10000, 100000, 200000, 300000, 400000, 500000, 1, NULL, 1),
(2, NULL, NULL, 1, 20, 4, 0, 3, 'T21CH01', 'TV 21 Inch', '111', 111, 110, 11110, 101, 10, 10, 1, NULL, 1),
(3, NULL, NULL, 1, 111111, 4, 2, 3, 'DP0102', 'DVD Player', '111111', 1111, 1111, 1011, 1011, 1011, 1011, 111, NULL, 1),
(4, NULL, NULL, 1, 100, 4, 0, 3, 'AWA102', 'Kipas Angin', 'Kipas Angin', 100, 100, 100, 100, 100, 100, 2, NULL, 1),
(5, NULL, NULL, 1, 1, 4, 0, 3, 'NK-1113SP', 'COOKWARE SET', 'Alat Rumah Tangga', 200000, 242500, 242500, 242500, 257500, 283250, 2, NULL, 1),
(6, NULL, NULL, 1, 1, 10, 0, 3, 'nk18', 'magic com', 'magic com', 120000, 125000, 100500, 90000, 85000, 70500, 1, NULL, 1),
(7, NULL, NULL, 9, 1, 6, 0, 7, 'NK-75LW/BS', 'AC', 'ELEKTRONIK', 0, 6850000, 6850000, 6850000, 6090000, 7590000, 5, NULL, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `purchase_order_detail_tab`
--

CREATE TABLE IF NOT EXISTS `purchase_order_detail_tab` (
  `pid` int(11) NOT NULL AUTO_INCREMENT,
  `ppid` int(11) NOT NULL,
  `pppid` int(11) NOT NULL,
  `pcurrency` varchar(15) NOT NULL,
  `pqty` int(11) NOT NULL,
  `pharga` int(11) NOT NULL,
  `pdisc` double NOT NULL,
  `pketerangan` text NOT NULL,
  `pstatus` tinyint(1) NOT NULL DEFAULT '0',
  `psisa` int(11) NOT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data untuk tabel `purchase_order_detail_tab`
--

INSERT INTO `purchase_order_detail_tab` (`pid`, `ppid`, `pppid`, `pcurrency`, `pqty`, `pharga`, `pdisc`, `pketerangan`, `pstatus`, `psisa`) VALUES
(6, 3, 1, 'IDR', 2, 10000, 0, 'ok', 1, 0),
(7, 3, 2, 'IDR', 9, 111, 0, '', 1, 5),
(8, 5, 1, 'IDR', 5, 10000, 0, '', 1, 5),
(9, 6, 1, 'IDR', 12, 10000, 0, '', 1, 0),
(10, 6, 2, 'IDR', 5, 111, 0, '', 1, 0),
(11, 7, 1, 'IDR', 7, 10000, 0, '', 1, 0),
(12, 7, 2, 'IDR', 5, 111, 0, '', 1, 0),
(13, 8, 1, 'IDR', 500, 10000, 0, 'ok', 1, 0),
(14, 8, 2, 'IDR', 300, 111, 0, 'ok', 1, 0),
(15, 9, 1, 'IDR', 5000, 10000, 0, 'ok', 1, 17);

-- --------------------------------------------------------

--
-- Struktur dari tabel `purchase_order_tab`
--

CREATE TABLE IF NOT EXISTS `purchase_order_tab` (
  `pid` int(11) NOT NULL AUTO_INCREMENT,
  `pbid` int(11) NOT NULL,
  `pnobukti` varchar(20) NOT NULL,
  `pref` varchar(20) NOT NULL,
  `ptgl` date DEFAULT NULL,
  `psid` int(11) NOT NULL,
  `pgudang` varchar(15) NOT NULL,
  `pstatus` tinyint(1) NOT NULL DEFAULT '0',
  `pcdate` date DEFAULT NULL,
  `pcid` tinyint(4) NOT NULL,
  `ptype` varchar(5) NOT NULL,
  `pssid` int(11) NOT NULL,
  `dpp` double NOT NULL,
  `ppn` double NOT NULL,
  `disc` double NOT NULL,
  `total` double NOT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data untuk tabel `purchase_order_tab`
--

INSERT INTO `purchase_order_tab` (`pid`, `pbid`, `pnobukti`, `pref`, `ptgl`, `psid`, `pgudang`, `pstatus`, `pcdate`, `pcid`, `ptype`, `pssid`, `dpp`, `ppn`, `disc`, `total`) VALUES
(3, 2, '1', 'sandi', '2014-11-02', 0, 'aasas', 3, '2014-11-02', 0, 'in', 0, 0, 0, 0, 0),
(4, 2, '2', 'vvv', '2014-11-04', 0, 'aasas', 1, '2014-11-03', 0, 'in', 0, 0, 0, 0, 0),
(5, 2, '3', 'zzz', '2014-11-04', 0, 'aasas', 1, '2014-11-03', 0, 'in', 0, 0, 0, 0, 0),
(6, 3, '4', 'sandi', '2014-11-15', 0, 'Jakarta', 3, '2014-11-15', 0, 'in', 0, 0, 0, 0, 0),
(7, 2, '5', 'ok', '2014-11-20', 0, 'aw', 3, '2014-11-19', 0, 'in', 0, 0, 0, 0, 0),
(8, 2, '6', 'sandi', '2014-11-24', 0, 'aw', 3, '2014-11-24', 0, 'in', 0, 0, 0, 0, 0),
(9, 2, '7', 'sss', '2014-11-24', 0, 'aw', 3, '2014-11-24', 0, 'in', 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `raw_material_tab`
--

CREATE TABLE IF NOT EXISTS `raw_material_tab` (
  `rid` int(10) NOT NULL AUTO_INCREMENT,
  `ruid` int(10) DEFAULT NULL,
  `rluid` int(10) DEFAULT NULL,
  `rbid` int(10) DEFAULT NULL,
  `rtype` int(10) DEFAULT NULL,
  `rcode` varchar(50) DEFAULT NULL,
  `rname` varchar(150) DEFAULT NULL,
  `rstatus` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`rid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `raw_material_tab`
--

INSERT INTO `raw_material_tab` (`rid`, `ruid`, `rluid`, `rbid`, `rtype`, `rcode`, `rname`, `rstatus`) VALUES
(1, 1, 1, 1, 2, 'xws', 'mom', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `retur_order_detail_tab`
--

CREATE TABLE IF NOT EXISTS `retur_order_detail_tab` (
  `sid` int(11) NOT NULL AUTO_INCREMENT,
  `ssid` int(11) DEFAULT NULL,
  `spid` int(11) DEFAULT NULL,
  `sqty` int(11) DEFAULT NULL,
  `sprice` double DEFAULT NULL,
  `sdisc` double DEFAULT NULL,
  `saccept` int(11) NOT NULL,
  `sreject` int(11) NOT NULL,
  `ssisa` int(11) NOT NULL,
  PRIMARY KEY (`sid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data untuk tabel `retur_order_detail_tab`
--

INSERT INTO `retur_order_detail_tab` (`sid`, `ssid`, `spid`, `sqty`, `sprice`, `sdisc`, `saccept`, `sreject`, `ssisa`) VALUES
(3, 1, 1, 12, 110000, 0, 9, 3, 12),
(4, 1, 2, 19, 120, 0, 16, 3, 19),
(5, 2, 1, 12, 100000, 0, 9, 3, 12),
(6, 3, 1, 12, 100500, 0, 7, 5, 12),
(7, 5, 2, 8, 110, 0, 6, 2, 8),
(8, 4, 1, 20, 100000, 0, 16, 4, 20),
(9, 6, 1, 5, 110000, 0, 2, 3, 5),
(10, 7, 1, 20, 110000, 0, 10, 10, 20);

-- --------------------------------------------------------

--
-- Struktur dari tabel `retur_order_tab`
--

CREATE TABLE IF NOT EXISTS `retur_order_tab` (
  `sid` int(11) NOT NULL AUTO_INCREMENT,
  `sbid` int(11) NOT NULL,
  `snoro` varchar(20) NOT NULL,
  `snopo` varchar(30) NOT NULL,
  `sreff` varchar(20) NOT NULL,
  `stgl` date DEFAULT NULL,
  `scid` int(11) NOT NULL,
  `stype` varchar(12) DEFAULT NULL,
  `ssid` int(11) NOT NULL,
  `sppn` varchar(15) NOT NULL,
  `sfreeppn` tinyint(1) NOT NULL,
  `sstatus` tinyint(1) NOT NULL DEFAULT '0',
  `scdate` date DEFAULT NULL,
  `sketerangan` varchar(50) NOT NULL,
  `sduedate` date DEFAULT NULL,
  `spotong` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`sid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data untuk tabel `retur_order_tab`
--

INSERT INTO `retur_order_tab` (`sid`, `sbid`, `snoro`, `snopo`, `sreff`, `stgl`, `scid`, `stype`, `ssid`, `sppn`, `sfreeppn`, `sstatus`, `scdate`, `sketerangan`, `sduedate`, `spotong`) VALUES
(1, 0, '1', '', 'aaa', '2014-12-05', 1, '', 3, '0', 0, 4, '2014-12-05', 'kkk', '2014-12-20', 0),
(2, 0, '2', '', 'kkk', '2014-12-05', 2, '', 2, '0', 0, 3, '2014-12-05', 'koko', '2014-12-15', 0),
(3, 0, '3', '', 'ddd', '2014-12-12', 2, '', 2, '0', 0, 4, '2014-12-12', 'ok', '2014-12-22', 0),
(4, 0, '4', '', 'sss', '2014-12-12', 2, '', 2, '0', 0, 3, '2014-12-12', '                        okk                       ', '2014-12-22', 0),
(5, 0, '5', '', 'jjjj', '2014-12-12', 2, '', 2, '0', 0, 3, '2014-12-12', 'koko', '2014-12-22', 0),
(6, 0, '6', '', 'aaa', '2014-12-13', 2, '', 2, '0', 0, 4, '2014-12-13', '', '2014-12-23', 0),
(7, 0, '7', '', 'sandi', '2014-12-13', 2, '', 2, '0', 0, 4, '2014-12-13', '', '2014-12-23', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `retur_tab`
--

CREATE TABLE IF NOT EXISTS `retur_tab` (
  `rid` int(11) NOT NULL AUTO_INCREMENT,
  `rbid` int(11) NOT NULL,
  `rnoretur` varchar(20) NOT NULL,
  `snopo` varchar(30) NOT NULL,
  `sreff` varchar(20) NOT NULL,
  `stgl` date DEFAULT NULL,
  `scid` int(11) NOT NULL,
  `stype` varchar(12) DEFAULT NULL,
  `ssid` int(11) NOT NULL,
  `sppn` varchar(15) NOT NULL,
  `sfreeppn` tinyint(1) NOT NULL,
  `sstatus` tinyint(1) NOT NULL DEFAULT '0',
  `scdate` date DEFAULT NULL,
  `sketerangan` varchar(50) NOT NULL,
  `sduedate` date DEFAULT NULL,
  `stypepay` enum('auto','cash','credit') NOT NULL,
  PRIMARY KEY (`rid`),
  KEY `sbid` (`rbid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sales_commision_tab`
--

CREATE TABLE IF NOT EXISTS `sales_commision_tab` (
  `sid` int(10) NOT NULL AUTO_INCREMENT,
  `suid` int(10) DEFAULT NULL,
  `sluid` int(10) DEFAULT NULL,
  `sbid` int(10) DEFAULT NULL,
  `scid` int(10) DEFAULT NULL,
  `scoma` double(10,2) DEFAULT NULL,
  `scomb` double(10,2) DEFAULT NULL,
  `scomc` double(10,2) DEFAULT NULL,
  `scomd` double(10,2) DEFAULT NULL,
  `scome` double(10,2) DEFAULT NULL,
  `scredita` double(10,2) DEFAULT NULL,
  `screditb` double(10,2) DEFAULT NULL,
  `screditc` double(10,2) DEFAULT NULL,
  `screditd` double(10,2) DEFAULT NULL,
  `scredite` double(10,2) DEFAULT NULL,
  `sstatus` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`sid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `sales_commision_tab`
--

INSERT INTO `sales_commision_tab` (`sid`, `suid`, `sluid`, `sbid`, `scid`, `scoma`, `scomb`, `scomc`, `scomd`, `scome`, `scredita`, `screditb`, `screditc`, `screditd`, `scredite`, `sstatus`) VALUES
(1, 1, 1, 1, 1, -90.00, 90.00, 90.00, 0.00, 90.00, 90.00, 90.00, 90.00, 90.00, 90.00, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sales_order_detail_tab`
--

CREATE TABLE IF NOT EXISTS `sales_order_detail_tab` (
  `sid` int(11) NOT NULL AUTO_INCREMENT,
  `ssid` int(11) DEFAULT NULL,
  `spid` int(11) DEFAULT NULL,
  `sqty` int(11) DEFAULT NULL,
  `sprice` double DEFAULT NULL,
  `sdisc` double DEFAULT NULL,
  `ssisa` int(11) NOT NULL,
  PRIMARY KEY (`sid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=43 ;

--
-- Dumping data untuk tabel `sales_order_detail_tab`
--

INSERT INTO `sales_order_detail_tab` (`sid`, `ssid`, `spid`, `sqty`, `sprice`, `sdisc`, `ssisa`) VALUES
(19, 16, 1, 9, 500000, 0, 9),
(20, 16, 2, 3, 10, 0, 3),
(22, 18, 1, 9, 100000, 0, 0),
(23, 18, 1, 12, 100000, 0, 0),
(24, 19, 1, 8, 100000, 0, 0),
(25, 19, 2, 5, 110, 0, 0),
(27, 19, 1, 8, 90000, 0, 0),
(28, 20, 1, 8, 100000, 0, 0),
(30, 20, 0, 0, 0, 0, 0),
(31, 20, 0, 0, 0, 0, 0),
(32, 21, 1, 8, 100000, 0, 0),
(33, 22, 1, 8, 100000, 0, 0),
(34, 22, 2, 50, 110, 0, 0),
(35, 14, 0, 0, 0, 0, 0),
(36, 14, 0, 0, 0, 0, 0),
(37, 25, 2, 2, 110, 0, 0),
(38, 25, 0, 0, 0, 0, 0),
(39, 25, 0, 0, 0, 0, 0),
(40, 25, 0, 0, 0, 0, 0),
(42, 25, 2, 6, 110, 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sales_order_tab`
--

CREATE TABLE IF NOT EXISTS `sales_order_tab` (
  `sid` int(11) NOT NULL AUTO_INCREMENT,
  `sbid` int(11) NOT NULL,
  `snoso` varchar(20) NOT NULL,
  `snopo` varchar(30) NOT NULL,
  `sreff` varchar(20) NOT NULL,
  `stgl` date DEFAULT NULL,
  `scid` int(11) NOT NULL,
  `stype` varchar(12) DEFAULT NULL,
  `ssid` int(11) NOT NULL,
  `sppn` varchar(15) NOT NULL,
  `sfreeppn` tinyint(1) NOT NULL,
  `sstatus` tinyint(1) NOT NULL DEFAULT '0',
  `scdate` date DEFAULT NULL,
  `sketerangan` varchar(50) NOT NULL,
  `sduedate` date DEFAULT NULL,
  `stypepay` enum('auto','cash','credit') NOT NULL,
  PRIMARY KEY (`sid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data untuk tabel `sales_order_tab`
--

INSERT INTO `sales_order_tab` (`sid`, `sbid`, `snoso`, `snopo`, `sreff`, `stgl`, `scid`, `stype`, `ssid`, `sppn`, `sfreeppn`, `sstatus`, `scdate`, `sketerangan`, `sduedate`, `stypepay`) VALUES
(16, 2, '2', '', 'ggg', '2014-11-04', 2, '', 2, '1', 1, 3, '2014-11-04', 'ok', '2014-11-14', 'auto'),
(18, 2, '2', '', 'sandi', '2014-11-05', 2, '', 2, '1', 1, 3, '2014-11-05', 'ok', '2014-11-15', 'auto'),
(19, 2, '3', '', 'sandi aries', '2014-11-15', 2, '', 2, '1', 1, 3, '2014-11-15', 'ok', '2014-11-25', 'auto'),
(20, 2, '4', '', 'sandii', '2014-11-15', 2, '', 2, '1', 1, 3, '2014-11-23', 'jkt      ok      ', '2014-12-03', 'auto'),
(21, 2, '5', '', 'ssss', '2014-11-24', 2, '', 2, '0', 0, 3, '2014-11-24', 'ok', '2014-12-04', 'auto'),
(22, 2, '6', '', 'sandi', '2014-11-27', 2, '', 2, '0', 0, 3, '2014-11-27', '', '2014-12-07', 'auto'),
(23, 0, '1', '', 'zzz', '2014-12-07', 2, '', 2, '0', 0, 0, '2014-12-07', '0', '2014-12-17', ''),
(24, 0, '2', '', 'sss', '2014-12-07', 2, '', 2, '0', 0, 0, '2014-12-07', '0', '2014-12-17', ''),
(25, 1, '1', '', '', '0000-00-00', 4, '', 1, '0', 0, 3, '2015-05-25', '', '1970-01-01', 'auto');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sales_tab`
--

CREATE TABLE IF NOT EXISTS `sales_tab` (
  `sid` int(10) NOT NULL AUTO_INCREMENT,
  `suid` int(10) DEFAULT NULL,
  `sluid` int(10) DEFAULT NULL,
  `sbid` int(10) DEFAULT NULL,
  `scode` varchar(50) DEFAULT NULL,
  `sname` varchar(150) DEFAULT NULL,
  `sphone` varchar(50) DEFAULT NULL,
  `semail` varchar(50) DEFAULT NULL,
  `sjoindate` int(10) DEFAULT NULL,
  `sarea` varchar(10) DEFAULT NULL,
  `sstatus` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`sid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data untuk tabel `sales_tab`
--

INSERT INTO `sales_tab` (`sid`, `suid`, `sluid`, `sbid`, `scode`, `sname`, `sphone`, `semail`, `sjoindate`, `sarea`, `sstatus`) VALUES
(1, 1, 1, 1, 'wewe', 'Sales 001', '1212212*121212', 'admin@admin.com', -25200, NULL, 2),
(2, 1, 1, 1, 'sales2', 'sales002', '1212212*121212', 'admin@admin.com', -25200, NULL, 2),
(3, NULL, NULL, 2, '3', 'sales003', '9798798*989898798', 'sss@szss.com', -25200, '0,1', 2),
(4, NULL, NULL, 8, 'leo', 'leony chandrawati', '08128068791*081905141732', 'leony@nikoelectronic.com', 1236099600, '0,1,2', 1),
(5, NULL, NULL, 8, 'ir', 'irwan dermawan', '081380012255*00', 'irwandermawan333@yahoo.com', 0, '0,2', 1),
(6, NULL, NULL, 8, 'al', 'alex soetoyo', '085213027599*08159648010', '-', 1131469200, '0,2', 1),
(7, NULL, NULL, 1, 'PBS02', 'Gratcy Palma P Hutapea', '8909809*121212', 'admin@admin.com', 1432314000, '0', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sales_target_omset_tab`
--

CREATE TABLE IF NOT EXISTS `sales_target_omset_tab` (
  `sid` int(10) NOT NULL AUTO_INCREMENT,
  `suid` int(10) DEFAULT NULL,
  `sluid` int(10) DEFAULT NULL,
  `sbid` int(10) DEFAULT NULL,
  `sdate` int(10) DEFAULT NULL,
  `starget` int(10) DEFAULT NULL,
  `sstatus` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`sid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sales_target_tab`
--

CREATE TABLE IF NOT EXISTS `sales_target_tab` (
  `sid` int(10) NOT NULL AUTO_INCREMENT,
  `suid` int(10) DEFAULT NULL,
  `sluid` int(10) DEFAULT NULL,
  `stid` int(10) DEFAULT NULL,
  `ssid` int(10) DEFAULT NULL,
  `sbid` int(10) DEFAULT NULL,
  `stotal` int(10) DEFAULT NULL,
  `sstatus` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`sid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `services_products_tab`
--

CREATE TABLE IF NOT EXISTS `services_products_tab` (
  `sid` int(10) NOT NULL AUTO_INCREMENT,
  `ssid` int(10) DEFAULT NULL,
  `spid` int(10) DEFAULT NULL,
  `sqty` int(10) DEFAULT NULL,
  `sstatus` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`sid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `services_products_tab`
--

INSERT INTO `services_products_tab` (`sid`, `ssid`, `spid`, `sqty`, `sstatus`) VALUES
(1, 1, 5, 10, 1),
(2, 1, 3, 10, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `services_report_product_tab`
--

CREATE TABLE IF NOT EXISTS `services_report_product_tab` (
  `sid` int(10) NOT NULL AUTO_INCREMENT,
  `ssid` int(10) DEFAULT NULL,
  `spid` int(10) DEFAULT '0',
  `sqty` int(10) DEFAULT '0',
  `sstatus` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`sid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `services_report_product_tab`
--

INSERT INTO `services_report_product_tab` (`sid`, `ssid`, `spid`, `sqty`, `sstatus`) VALUES
(1, 1, 5, 10, 1),
(2, 1, 3, 9, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `services_report_sparepart_tab`
--

CREATE TABLE IF NOT EXISTS `services_report_sparepart_tab` (
  `sid` int(10) NOT NULL AUTO_INCREMENT,
  `ssid` int(10) DEFAULT NULL,
  `sssid` int(10) DEFAULT NULL,
  `sqty` int(10) DEFAULT NULL,
  `sstatus` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`sid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `services_report_sparepart_tab`
--

INSERT INTO `services_report_sparepart_tab` (`sid`, `ssid`, `sssid`, `sqty`, `sstatus`) VALUES
(1, 1, 4, 9, 1),
(2, 1, 3, 8, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `services_report_tab`
--

CREATE TABLE IF NOT EXISTS `services_report_tab` (
  `sid` int(10) NOT NULL AUTO_INCREMENT,
  `ssid` int(10) DEFAULT NULL,
  `sdate` int(10) DEFAULT NULL,
  `sdesc` varchar(300) DEFAULT NULL,
  `sstatus` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`sid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `services_report_tab`
--

INSERT INTO `services_report_tab` (`sid`, `ssid`, `sdate`, `sdesc`, `sstatus`) VALUES
(1, 1, 1422036408, 'wewewe', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `services_sparepart_detail_tab`
--

CREATE TABLE IF NOT EXISTS `services_sparepart_detail_tab` (
  `sid` int(10) NOT NULL AUTO_INCREMENT,
  `suid` int(10) DEFAULT NULL,
  `sluid` int(10) DEFAULT NULL,
  `ssid` int(10) DEFAULT NULL,
  `sssid` int(10) DEFAULT NULL,
  `sqty` int(10) DEFAULT NULL,
  `sstatus` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`sid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `services_sparepart_detail_tab`
--

INSERT INTO `services_sparepart_detail_tab` (`sid`, `suid`, `sluid`, `ssid`, `sssid`, `sqty`, `sstatus`) VALUES
(1, NULL, NULL, 1, 4, 10, 1),
(2, NULL, NULL, 1, 3, 10, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `services_sparepart_tab`
--

CREATE TABLE IF NOT EXISTS `services_sparepart_tab` (
  `sid` int(10) NOT NULL AUTO_INCREMENT,
  `ssid` int(10) DEFAULT NULL,
  `sdesc` varchar(350) DEFAULT NULL,
  `sstatus` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`sid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `services_sparepart_tab`
--

INSERT INTO `services_sparepart_tab` (`sid`, `ssid`, `sdesc`, `sstatus`) VALUES
(1, 1, 'wewewe', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `services_tecnical_tab`
--

CREATE TABLE IF NOT EXISTS `services_tecnical_tab` (
  `sid` int(10) NOT NULL AUTO_INCREMENT,
  `ssid` int(10) DEFAULT NULL,
  `stid` int(10) DEFAULT NULL,
  `sstatus` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`sid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `services_tecnical_tab`
--

INSERT INTO `services_tecnical_tab` (`sid`, `ssid`, `stid`, `sstatus`) VALUES
(1, 1, 2, 1),
(2, 1, 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `services_workorder_tab`
--

CREATE TABLE IF NOT EXISTS `services_workorder_tab` (
  `sid` int(10) NOT NULL AUTO_INCREMENT,
  `sno` varchar(20) DEFAULT NULL,
  `sbid` int(10) DEFAULT NULL,
  `sdate` int(10) DEFAULT NULL,
  `sdatefrom` int(10) DEFAULT NULL,
  `sdateto` int(10) DEFAULT NULL,
  `sdesc` varchar(350) DEFAULT NULL,
  `sstatus` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`sid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `services_workorder_tab`
--

INSERT INTO `services_workorder_tab` (`sid`, `sno`, `sbid`, `sdate`, `sdatefrom`, `sdateto`, `sdesc`, `sstatus`) VALUES
(1, '0001/01/01/2015/002', 1, 1422036312, 1422028800, 1424707200, 'eeeewww', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sparepart_tab`
--

CREATE TABLE IF NOT EXISTS `sparepart_tab` (
  `sid` int(10) NOT NULL AUTO_INCREMENT,
  `suid` int(10) DEFAULT NULL,
  `sluid` int(10) DEFAULT NULL,
  `sgroupproduct` int(10) DEFAULT NULL,
  `scode` varchar(50) DEFAULT NULL,
  `sname` varchar(150) DEFAULT NULL,
  `snocomponent` varchar(10) DEFAULT NULL,
  `spriceagent` int(10) DEFAULT NULL,
  `spriceretail` int(10) DEFAULT NULL,
  `sspecial` tinyint(1) DEFAULT '0',
  `sstatus` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`sid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data untuk tabel `sparepart_tab`
--

INSERT INTO `sparepart_tab` (`sid`, `suid`, `sluid`, `sgroupproduct`, `scode`, `sname`, `snocomponent`, `spriceagent`, `spriceretail`, `sspecial`, `sstatus`) VALUES
(1, 1, 1, 4, 'D018d', 'Dioda Penyearah', '1021902', 10, 10, 0, 1),
(2, NULL, NULL, 4, 'LDV20', 'Lensa DVD', '34wsdsds', 2, 15, 0, 1),
(3, NULL, NULL, 4, 'D018d1', 'SCR (Silicon Control Rectifier)', 'A21O90', 100, 200, 0, 1),
(4, NULL, NULL, 6, 'CK102YZQ', 'Kapasitor', 'A21O90101', 110000, 2000000, 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `suplier_tab`
--

CREATE TABLE IF NOT EXISTS `suplier_tab` (
  `sid` int(10) NOT NULL AUTO_INCREMENT,
  `suid` int(10) DEFAULT NULL,
  `sluid` int(10) DEFAULT NULL,
  `scode` varchar(50) DEFAULT NULL,
  `sname` varchar(150) DEFAULT NULL,
  `scp` varchar(150) DEFAULT NULL,
  `snpwp` varchar(20) DEFAULT NULL,
  `saddr` text,
  `sphone` varchar(50) DEFAULT NULL,
  `scity` int(10) DEFAULT NULL,
  `sprov` int(10) DEFAULT NULL,
  `sstatus` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`sid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `suplier_tab`
--

INSERT INTO `suplier_tab` (`sid`, `suid`, `sluid`, `scode`, `sname`, `scp`, `snpwp`, `saddr`, `sphone`, `scity`, `sprov`, `sstatus`) VALUES
(1, 1, 1, 'axax', 'palma', 'asas', '2323', 'asasasas*asas', '12121212*121313', 1, 1, 1),
(2, NULL, NULL, '77', 'SUP007', 'suplier7', '76878998', 'jakarta*jakarta', '098809*0900089898', 1, 1, 1),
(3, NULL, NULL, 'sup004', 'PT NIKO', 'saya', '90080', 'TANGERANG*tangerang', '080980809*98098098', 2, 2, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `target_tab`
--

CREATE TABLE IF NOT EXISTS `target_tab` (
  `tid` int(10) NOT NULL AUTO_INCREMENT,
  `tbid` int(10) DEFAULT NULL,
  `tsid` int(10) DEFAULT NULL,
  `tmy` varchar(10) DEFAULT NULL,
  `ttarget` int(20) DEFAULT NULL,
  `tpaytarget` int(10) DEFAULT NULL,
  `tstatus` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`tid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `target_tab`
--

INSERT INTO `target_tab` (`tid`, `tbid`, `tsid`, `tmy`, `ttarget`, `tpaytarget`, `tstatus`) VALUES
(1, 1, 1, '06/2004', 1000, NULL, 1),
(2, 2, 2, '02/2014', 222, 101, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `technical_tab`
--

CREATE TABLE IF NOT EXISTS `technical_tab` (
  `tid` int(10) NOT NULL AUTO_INCREMENT,
  `tuid` int(10) DEFAULT NULL,
  `tluid` int(10) DEFAULT NULL,
  `tbid` int(10) DEFAULT NULL,
  `tcode` varchar(50) DEFAULT NULL,
  `tname` varchar(150) DEFAULT NULL,
  `tphone` varchar(50) DEFAULT NULL,
  `temail` varchar(50) DEFAULT NULL,
  `tjoindate` int(10) DEFAULT NULL,
  `tstatus` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`tid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `technical_tab`
--

INSERT INTO `technical_tab` (`tid`, `tuid`, `tluid`, `tbid`, `tcode`, `tname`, `tphone`, `temail`, `tjoindate`, `tstatus`) VALUES
(1, 1, 1, 1, 'D10A2', 'Gratcy Palma P Hutapea', '098128192*121212', 'palma@admin.com', 1391616000, 1),
(2, NULL, NULL, 1, '01D21', 'Untung Ariesandi', '8909809*121212', 'untung@admin.com', 1356969600, 1),
(3, NULL, NULL, 8, 'sm', 'suminto', '081511373055*00', '-', 1362758400, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users_tab`
--

CREATE TABLE IF NOT EXISTS `users_tab` (
  `uid` int(10) NOT NULL AUTO_INCREMENT,
  `ugid` int(10) DEFAULT NULL,
  `ubid` int(10) DEFAULT NULL,
  `uemail` varchar(50) DEFAULT NULL,
  `udivision` varchar(150) DEFAULT NULL,
  `uposition` varchar(150) DEFAULT NULL,
  `upass` varchar(50) DEFAULT NULL,
  `ulastlogin` varchar(21) DEFAULT NULL,
  `ustatus` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data untuk tabel `users_tab`
--

INSERT INTO `users_tab` (`uid`, `ugid`, `ubid`, `uemail`, `udivision`, `uposition`, `upass`, `ulastlogin`, `ustatus`) VALUES
(1, 1, 1, 'admin@admin.com', 'IT', 'Programmer', 'e89591ee9b8e7018511649a2146ae279', '2130706433*1432970203', 1),
(2, 2, 2, 'admin@dluxor.com', 'web', 'programmer', 'e89591ee9b8e7018511649a2146ae279', '2130706433*1422075906', 1),
(3, 2, 1, 'pusat@admin.com', 'Finance', 'Finance', 'e89591ee9b8e7018511649a2146ae279', '3232236145*1429952100', 1),
(4, 2, 3, 'bandung@admin.com', 'Finance', 'Finance', '6f83286fce007c0cb22aa2beaae66165', NULL, 1),
(5, 2, 4, 'bandung@admin.com', 'Finance', 'Finance', 'e89591ee9b8e7018511649a2146ae279', NULL, 2);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `gl_detail_tab`
--
ALTER TABLE `gl_detail_tab`
  ADD CONSTRAINT `fk_gl_detail_tab_1` FOREIGN KEY (`ggid`) REFERENCES `gl_tab` (`gid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_gl_detail_tab_2` FOREIGN KEY (`gcid`) REFERENCES `coa_tab` (`cid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
