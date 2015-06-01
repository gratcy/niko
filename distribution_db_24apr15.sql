-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Inang: 127.0.0.1
-- Waktu pembuatan: 24 Apr 2015 pada 05.34
-- Versi Server: 5.5.32
-- Versi PHP: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Basis data: `distribution_db`
--
CREATE DATABASE IF NOT EXISTS `distribution_db` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `distribution_db`;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=261 ;

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
(129, 1, 129, 1),
(130, 1, 130, 1),
(131, 2, 1, 1),
(132, 2, 2, 1),
(133, 2, 3, 1),
(134, 2, 4, 1),
(135, 2, 5, 1),
(136, 2, 6, 1),
(137, 2, 7, 1),
(138, 2, 8, 1),
(139, 2, 9, 1),
(140, 2, 10, 1),
(141, 2, 11, 1),
(142, 2, 12, 1),
(143, 2, 13, 1),
(144, 2, 14, 1),
(145, 2, 15, 1),
(146, 2, 16, 1),
(147, 2, 17, 1),
(148, 2, 18, 1),
(149, 2, 19, 1),
(150, 2, 20, 1),
(151, 2, 21, 1),
(152, 2, 22, 1),
(153, 2, 23, 1),
(154, 2, 24, 1),
(155, 2, 25, 1),
(156, 2, 26, 1),
(157, 2, 27, 1),
(158, 2, 28, 1),
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
(223, 2, 93, 1),
(224, 2, 94, 1),
(225, 2, 95, 1),
(226, 2, 96, 1),
(227, 2, 97, 1),
(228, 2, 98, 1),
(229, 2, 99, 1),
(230, 2, 100, 1),
(231, 2, 101, 1),
(232, 2, 102, 1),
(233, 2, 103, 1),
(234, 2, 104, 1),
(235, 2, 105, 1),
(236, 2, 106, 1),
(237, 2, 107, 1),
(238, 2, 108, 1),
(239, 2, 109, 1),
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
(260, 2, 130, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data untuk tabel `branch_tab`
--

INSERT INTO `branch_tab` (`bid`, `buid`, `bluid`, `bname`, `bnpwp`, `baddr`, `bcity`, `bprovince`, `bphone`, `bstatus`) VALUES
(1, 1, 1, 'Pusat', NULL, 'wew', 1, 1, '989898*121212', 1),
(2, 1, 1, 'Semarang', 'aaaa', 'aasas*aw', 1, 2, '989898*121212', 1),
(3, NULL, NULL, 'Bandung', '98987898', 'jakarta', 2, 2, '870900*080980980', 1),
(4, NULL, NULL, 'Balikpapan', '97979879', 'Jl Kalimantan Balikpapan', 1, 1, '8799890*79890090', 1),
(5, NULL, NULL, 'BALI', '86876799898', 'Bali satu*Bali Dua', 3, 3, '98798798789*8798797', 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data untuk tabel `categories_tab`
--

INSERT INTO `categories_tab` (`cid`, `cuid`, `cluid`, `ctype`, `cname`, `cdesc`, `cdiscount`, `cstatus`) VALUES
(1, 1, 1, 1, 'k1', 'k1', '0', 1),
(2, 1, 1, 2, 'qqww', 'qqww', '', 1),
(3, 1, 1, 3, 'Pcs', 'Pcs', '', 1),
(4, NULL, NULL, 4, 'palmaa', 'wewa', NULL, 1),
(5, NULL, NULL, 5, 'Perwakilan C', 'aaaaaa', NULL, 1),
(6, NULL, NULL, 4, 'admins', 'aaaaaaa', NULL, 1),
(7, NULL, NULL, 1, 'k2', 'k2', '10', 1),
(8, NULL, NULL, 3, 'koli', 'koli', NULL, 1);

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
  `csaldo` int(10) DEFAULT NULL,
  `cdebet` int(10) DEFAULT NULL,
  `ccredit` int(10) DEFAULT NULL,
  `cdesc` varchar(300) DEFAULT NULL,
  `cparent` int(10) DEFAULT NULL,
  `cstatus` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data untuk tabel `coa_tab`
--

INSERT INTO `coa_tab` (`cid`, `catype`, `ctype`, `ccode`, `cname`, `csaldo`, `cdebet`, `ccredit`, `cdesc`, `cparent`, `cstatus`) VALUES
(1, 9, 0, 'XSA232', 'admins', 10000, NULL, NULL, '', 0, 1),
(2, 2, 1, 'asas', 'BANK', 0, NULL, NULL, 'BANK', 0, 1),
(3, 2, 0, 'MnDr', 'Mandiri', 1000, NULL, NULL, 'test', 2, 1),
(4, 1, 0, 'bca', 'BCA', 1111, NULL, NULL, 'test', 2, 1),
(5, 1, 0, 'AXAAS', 'wewe', 11111111, NULL, NULL, 'wewe', 2, 1);

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
  `climit` int(10) DEFAULT NULL,
  `cnpwp` varchar(50) DEFAULT NULL,
  `cpkp` varchar(15) DEFAULT NULL,
  `cspecial` tinyint(1) DEFAULT '0',
  `ctyperetur` int(11) NOT NULL,
  `cstatus` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data untuk tabel `customers_tab`
--

INSERT INTO `customers_tab` (`cid`, `cuid`, `cluid`, `cbid`, `ccat`, `cname`, `caddr`, `ccity`, `cprov`, `cdeliver`, `cphone`, `cemail`, `ccontactname`, `csid`, `ccash`, `ccredit`, `climit`, `cnpwp`, `cpkp`, `cspecial`, `ctyperetur`, `cstatus`) VALUES
(1, 1, 1, 2, 3, 'palma', '   jakarta*   semarang', 1, 1, 0, '909090*232323*1212', 'gratcypalma@gmail.com', 'asasa', 1, 10, 15, 4583692, '1212', '1aa', 1, 1, 1),
(2, NULL, NULL, 2, 0, 'Bareksa Portal Investasi', '            jakarta*            bandung', 2, 3, 0, '8798798979*8799898798*2333', 'gratcypalma@gmail.com', 'asasa', 1, 5, 10, 6739000, '86788767', '1aa', 0, 1, 1),
(3, NULL, NULL, 2, 2, 'Customer Semarang', '  JAKARTA*  JAKARTA', 1, 2, 0, '09900*566778*', 'ariessandi7@gmail.com', 'aaa', 1, 10, 20, 12000000, '877979879', '989809', 1, 1, 1),
(4, NULL, NULL, 2, 0, 'SEMARANG JAYA', '    Semaran 1*    Semarang 2', 2, 2, 0, '987898979*78979890*89789790889', 'sandi@yahoo.com', 'sandi', 1, 10, 15, 10000000, '86876799898', '123', 0, 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `delivery_order_detail_tab`
--

CREATE TABLE IF NOT EXISTS `delivery_order_detail_tab` (
  `did` int(11) NOT NULL AUTO_INCREMENT,
  `sid` int(11) NOT NULL,
  `ssid` int(11) DEFAULT NULL,
  `spid` int(11) DEFAULT NULL,
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Dumping data untuk tabel `delivery_order_detail_tab`
--

INSERT INTO `delivery_order_detail_tab` (`did`, `sid`, `ssid`, `spid`, `sqty`, `snodo`, `snopol`, `stgldo`, `snomor`, `driver`, `dstatus`, `sno_invoice`, `stgl_invoice`, `sduedate_invoice`, `sssid`, `samount`, `sdate_pay`, `sdate_lunas`, `sduration`, `samount_com`, `pno_pm`, `tamount`) VALUES
(26, 12, 7, 2, 5, '7-260115055742', 'B 4321 A', '2015-01-27', '123', '', 3, 'INV-7-260115055742', '2015-01-26', '2015-02-05', 1, 550000, '0000-00-00', NULL, 0, 0, '', NULL),
(27, 0, 8, 0, 0, '8-260115074807', 'B 4321 A', '2015-01-26', '12345', 'Driver A', 3, 'INV-8-260115074807', '2015-01-26', '2015-02-05', 1, 220000, '2015-01-26', '2015-01-26', 0, 90, '123', 22000),
(28, 14, 8, 1, 5, '8-260115074807', 'B 4321 A', '2015-01-26', '12345', '', 3, 'INV-8-260115074807', '2015-01-26', '2015-02-05', 1, 220000, '2015-01-26', '2015-01-26', 0, 90, '123', 22000),
(29, 13, 8, 2, 2, '8-260115074807', 'B 4321 A', '2015-01-26', '12345', '', 3, 'INV-8-260115074807', '2015-01-26', '2015-02-05', 1, 220000, '2015-01-26', '2015-01-26', 0, 90, '123', 22000),
(30, 0, 8, 0, 0, '8-260115075016', 'B 4322 A', '2015-01-26', '1111', 'Driver B', 3, 'INV-8-260115075016', NULL, '2015-02-05', 1, 330000, '0000-00-00', NULL, 0, 0, '', NULL),
(31, 14, 8, 1, 5, '8-260115075016', 'B 4322 A', '2015-01-26', '1111', '', 3, 'INV-8-260115075016', NULL, '2015-02-05', 1, 330000, '0000-00-00', NULL, 0, 0, '', NULL),
(32, 13, 8, 2, 3, '8-260115075016', 'B 4322 A', '2015-01-26', '1111', '', 3, 'INV-8-260115075016', NULL, '2015-02-05', 1, 330000, '0000-00-00', NULL, 0, 0, '', NULL),
(33, 0, 1, 0, 0, '1-270315111922', 'AB 777 CC', '2015-03-28', '12345', 'DO001', 3, '', NULL, '0000-00-00', 1, 55605, NULL, NULL, 0, 90, 'p002', 5560.5),
(34, 1, 1, 1, 2, '1-270315111922', 'AB 777 CC', '2015-03-28', '12345', '', 3, '', NULL, '0000-00-00', 1, 55605, NULL, NULL, 0, 90, 'p002', 5560.5),
(35, 2, 1, 3, 55, '1-270315111922', 'AB 777 CC', '2015-03-28', '12345', '', 3, '', NULL, '0000-00-00', 1, 55605, NULL, NULL, 0, 90, 'p002', 5560.5),
(36, 0, 1, 0, 0, '1-280315012230', 'A 678', '2015-04-02', '12345', 'driver001', 3, '', NULL, '0000-00-00', 1, 0, NULL, NULL, 0, 0, '', NULL),
(37, 1, 1, 1, 3, '1-280315012230', 'A 678', '2015-04-02', '12345', '', 3, '', NULL, '0000-00-00', 1, 0, NULL, NULL, 0, 0, '', NULL),
(38, 2, 1, 3, 0, '1-280315012230', 'A 678', '2015-04-02', '12345', '', 3, '', NULL, '0000-00-00', 1, 0, NULL, NULL, 0, 0, '', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `duration_com_tab`
--

CREATE TABLE IF NOT EXISTS `duration_com_tab` (
  `idd` int(11) NOT NULL AUTO_INCREMENT,
  `dday_start` int(11) NOT NULL,
  `dday_end` int(11) NOT NULL,
  `dname` varchar(35) NOT NULL,
  `dket` varchar(35) NOT NULL,
  PRIMARY KEY (`idd`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data untuk tabel `duration_com_tab`
--

INSERT INTO `duration_com_tab` (`idd`, `dday_start`, `dday_end`, `dname`, `dket`) VALUES
(1, 0, 7, 'scoma', '0-7'),
(2, 8, 14, 'scomb', '8-14'),
(3, 15, 21, 'scomc', '15-21'),
(4, 22, 30, 'scomd', '22-30'),
(5, 31, 10000, 'scome', '>30'),
(6, 0, 90, 'scredita', '0-90'),
(7, 91, 100, 'screditb', '91-100'),
(8, 101, 110, 'screditc', '101-110'),
(9, 111, 120, 'screditd', '111-120'),
(10, 121, 100000, 'scredite', '>120');

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
  PRIMARY KEY (`iid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data untuk tabel `inventory_tab`
--

INSERT INTO `inventory_tab` (`iid`, `iuid`, `iluid`, `ibid`, `iiid`, `itype`, `istockbegining`, `istockin`, `istockout`, `istock`, `istatus`) VALUES
(1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 1),
(2, 1, 1, 1, 1, 2, 10, 10, 10, 10, 1),
(3, 1, 1, 1, 1, 3, NULL, NULL, NULL, 100, 1),
(4, NULL, NULL, 2, 1, 1, 111, 111, 11, 11, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=241 ;

--
-- Dumping data untuk tabel `log_inventory_tab`
--

INSERT INTO `log_inventory_tab` (`lid`, `iid`, `iuid`, `iluid`, `ibid`, `iiid`, `itype`, `istockbegining`, `istockin`, `istockout`, `istock`, `istatus`) VALUES
(1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 1),
(2, 2, 1, 1, 1, 1, 2, 10, 10, 10, 10, 1),
(3, 3, 1, 1, 1, 1, 3, NULL, NULL, NULL, 100, 1),
(4, 4, NULL, NULL, 2, 1, 1, 111, 111, 11, 11, 1),
(5, 5, NULL, NULL, 2, 1, 1, 0, 0, 8, 0, 0),
(6, 0, NULL, NULL, 2, 12, 1, 0, 2, 0, 0, 1),
(7, 0, NULL, NULL, 2, 14, 1, 0, 3, 0, 0, 1),
(8, 0, NULL, NULL, 2, 12, 1, 0, 3, 0, 0, 1),
(9, 0, NULL, NULL, 2, 14, 1, 0, 4, 0, 0, 1),
(10, 0, NULL, NULL, 0, 1, 1, 0, 0, 9, 0, 1),
(11, 0, NULL, NULL, 0, 1, 1, 0, 0, 6, 0, 1),
(12, 0, NULL, NULL, 0, 1, 1, 0, 0, 4, 0, 1),
(13, 0, NULL, NULL, 2, 9, 1, 0, 7, 0, 0, 1),
(14, 0, NULL, NULL, 2, 10, 1, 0, 4, 0, 0, 1),
(15, 0, NULL, NULL, 2, 14, 1, 0, 5, 0, 0, 1),
(16, 0, NULL, NULL, 2, 15, 1, 0, 5, 0, 0, 1),
(17, 0, NULL, NULL, 3, 9, 1, 0, 3, 0, 0, 1),
(18, 0, NULL, NULL, 3, 10, 1, 0, 4, 0, 0, 1),
(19, 0, NULL, NULL, 3, 9, 1, 0, 9, 0, 0, 1),
(20, 0, NULL, NULL, 3, 10, 1, 0, 1, 0, 0, 1),
(21, 0, NULL, NULL, 0, 1, 1, 0, 0, 4, 0, 1),
(22, 0, NULL, NULL, 0, 2, 1, 0, 0, 3, 0, 1),
(23, 0, NULL, NULL, 0, 1, 1, 0, 0, 8, 0, 1),
(24, 0, NULL, NULL, 0, 1, 1, 0, 0, 4, 0, 1),
(25, 0, NULL, NULL, 0, 2, 1, 0, 0, 3, 0, 1),
(26, 0, NULL, NULL, 0, 1, 1, 0, 0, 8, 0, 1),
(27, 0, NULL, NULL, 0, 1, 1, 0, 0, 4, 0, 1),
(28, 0, NULL, NULL, 0, 2, 1, 0, 0, 3, 0, 1),
(29, 0, NULL, NULL, 0, 1, 1, 0, 0, 8, 0, 1),
(30, 0, NULL, NULL, 0, 1, 1, 0, 0, 4, 0, 1),
(31, 0, NULL, NULL, 0, 2, 1, 0, 0, 2, 0, 1),
(32, 0, NULL, NULL, 0, 1, 1, 0, 0, 0, 0, 1),
(33, 0, NULL, NULL, 0, 1, 1, 0, 0, 4, 0, 1),
(34, 0, NULL, NULL, 0, 2, 1, 0, 0, 2, 0, 1),
(35, 0, NULL, NULL, 0, 1, 1, 0, 0, 0, 0, 1),
(36, 0, NULL, NULL, 0, 1, 1, 0, 0, 4, 0, 1),
(37, 0, NULL, NULL, 0, 2, 1, 0, 0, 2, 0, 1),
(38, 0, NULL, NULL, 0, 1, 1, 0, 0, 0, 0, 1),
(39, 0, NULL, NULL, 2, 11, 1, 0, 1, 0, 0, 1),
(40, 0, NULL, NULL, 2, 12, 1, 0, 1, 0, 0, 1),
(41, 0, NULL, NULL, 2, 11, 1, 0, 6, 0, 0, 1),
(42, 0, NULL, NULL, 2, 12, 1, 0, 4, 0, 0, 1),
(43, 0, NULL, NULL, 0, 1, 1, 0, 0, 4, 0, 1),
(44, 0, NULL, NULL, 0, 1, 1, 0, 0, 10, 0, 1),
(45, 0, NULL, NULL, 0, 1, 1, 0, 0, 4, 0, 1),
(46, 0, NULL, NULL, 0, 1, 1, 0, 0, 10, 0, 1),
(47, 0, NULL, NULL, 0, 1, 1, 0, 0, 5, 0, 1),
(48, 0, NULL, NULL, 0, 1, 1, 0, 0, 2, 0, 1),
(49, 0, NULL, NULL, 0, 1, 1, 0, 0, 5, 0, 1),
(50, 0, NULL, NULL, 0, 1, 1, 0, 0, 2, 0, 1),
(51, 0, NULL, NULL, 0, 1, 1, 0, 0, 4, 0, 1),
(52, 0, NULL, NULL, 0, 1, 1, 0, 0, 10, 0, 1),
(53, 0, NULL, NULL, 0, 1, 1, 0, 0, 4, 0, 1),
(54, 0, NULL, NULL, 0, 1, 1, 0, 0, 10, 0, 1),
(55, 0, NULL, NULL, 0, 1, 1, 0, 0, 5, 0, 1),
(56, 0, NULL, NULL, 0, 1, 1, 0, 0, 2, 0, 1),
(57, 0, NULL, NULL, 0, 1, 1, 0, 0, 5, 0, 1),
(58, 0, NULL, NULL, 0, 1, 1, 0, 0, 2, 0, 1),
(59, 0, NULL, NULL, 0, 1, 1, 0, 0, 5, 0, 1),
(60, 0, NULL, NULL, 0, 1, 1, 0, 0, 2, 0, 1),
(61, 0, NULL, NULL, 0, 1, 1, 0, 0, 4, 0, 1),
(62, 0, NULL, NULL, 0, 1, 1, 0, 0, 10, 0, 1),
(63, 0, NULL, NULL, 0, 1, 1, 0, 0, 4, 0, 1),
(64, 0, NULL, NULL, 0, 1, 1, 0, 0, 10, 0, 1),
(65, 0, NULL, NULL, 0, 1, 1, 0, 0, 4, 0, 1),
(66, 0, NULL, NULL, 0, 2, 1, 0, 0, 3, 0, 1),
(67, 0, NULL, NULL, 0, 1, 1, 0, 0, 8, 0, 1),
(68, 0, NULL, NULL, 0, 1, 1, 0, 0, 1, 0, 1),
(69, 0, NULL, NULL, 0, 2, 1, 0, 0, 1, 0, 1),
(70, 0, NULL, NULL, 0, 1, 1, 0, 0, 1, 0, 1),
(71, 0, NULL, NULL, 0, 1, 1, 0, 0, 7, 0, 1),
(72, 0, NULL, NULL, 0, 2, 1, 0, 0, 4, 0, 1),
(73, 0, NULL, NULL, 0, 1, 1, 0, 0, 7, 0, 1),
(74, 0, NULL, NULL, 0, 1, 1, 0, 0, 7, 0, 1),
(75, 0, NULL, NULL, 0, 2, 1, 0, 0, 4, 0, 1),
(76, 0, NULL, NULL, 0, 1, 1, 0, 0, 7, 0, 1),
(77, 0, NULL, NULL, 0, 1, 1, 0, 0, 1, 0, 1),
(78, 0, NULL, NULL, 0, 2, 1, 0, 0, 1, 0, 1),
(79, 0, NULL, NULL, 0, 1, 1, 0, 0, 1, 0, 1),
(80, 0, NULL, NULL, 0, 1, 1, 0, 0, 1, 0, 1),
(81, 0, NULL, NULL, 0, 2, 1, 0, 0, 1, 0, 1),
(82, 0, NULL, NULL, 0, 1, 1, 0, 0, 1, 0, 1),
(83, 0, NULL, NULL, 0, 1, 1, 0, 0, 7, 0, 1),
(84, 0, NULL, NULL, 0, 2, 1, 0, 0, 4, 0, 1),
(85, 0, NULL, NULL, 0, 1, 1, 0, 0, 7, 0, 1),
(86, 0, NULL, NULL, 0, 1, 1, 0, 0, 1, 0, 1),
(87, 0, NULL, NULL, 0, 2, 1, 0, 0, 2, 0, 1),
(88, 0, NULL, NULL, 0, 1, 1, 0, 0, 1, 0, 1),
(89, 0, NULL, NULL, 0, 1, 1, 0, 0, 1, 0, 1),
(90, 0, NULL, NULL, 0, 2, 1, 0, 0, 2, 0, 1),
(91, 0, NULL, NULL, 0, 1, 1, 0, 0, 3, 0, 1),
(92, 0, NULL, NULL, 0, 1, 1, 0, 0, 1, 0, 1),
(93, 0, NULL, NULL, 0, 2, 1, 0, 0, 2, 0, 1),
(94, 0, NULL, NULL, 0, 1, 1, 0, 0, 3, 0, 1),
(95, 0, NULL, NULL, 0, 1, 1, 0, 0, 1, 0, 1),
(96, 0, NULL, NULL, 0, 2, 1, 0, 0, 2, 0, 1),
(97, 0, NULL, NULL, 0, 1, 1, 0, 0, 3, 0, 1),
(98, 0, NULL, NULL, 0, 1, 1, 0, 0, 1, 0, 1),
(99, 0, NULL, NULL, 0, 2, 1, 0, 0, 2, 0, 1),
(100, 0, NULL, NULL, 0, 1, 1, 0, 0, 3, 0, 1),
(101, 0, NULL, NULL, 0, 1, 1, 0, 0, 1, 0, 1),
(102, 0, NULL, NULL, 0, 2, 1, 0, 0, 2, 0, 1),
(103, 0, NULL, NULL, 0, 1, 1, 0, 0, 3, 0, 1),
(104, 0, NULL, NULL, 0, 1, 1, 0, 0, 7, 0, 1),
(105, 0, NULL, NULL, 0, 2, 1, 0, 0, 3, 0, 1),
(106, 0, NULL, NULL, 0, 1, 1, 0, 0, 5, 0, 1),
(107, 0, NULL, NULL, 0, 1, 1, 0, 0, 7, 0, 1),
(108, 0, NULL, NULL, 0, 2, 1, 0, 0, 3, 0, 1),
(109, 0, NULL, NULL, 0, 1, 1, 0, 0, 5, 0, 1),
(110, 0, NULL, NULL, 0, 1, 1, 0, 0, 5, 0, 1),
(111, 0, NULL, NULL, 0, 1, 1, 0, 0, 5, 0, 1),
(112, 0, NULL, NULL, 0, 1, 1, 0, 0, 3, 0, 1),
(113, 0, NULL, NULL, 0, 1, 1, 0, 0, 3, 0, 1),
(114, 0, NULL, NULL, 2, 13, 1, 0, 300, 0, 0, 1),
(115, 0, NULL, NULL, 2, 14, 1, 0, 200, 0, 0, 1),
(116, 0, NULL, NULL, 2, 13, 1, 0, 200, 0, 0, 1),
(117, 0, NULL, NULL, 2, 14, 1, 0, 100, 0, 0, 1),
(118, 0, NULL, NULL, 2, 15, 1, 0, 4983, 0, 0, 1),
(119, 0, NULL, NULL, 0, 1, 1, 0, 0, 4, 0, 1),
(120, 0, NULL, NULL, 0, 1, 1, 0, 0, 4, 0, 1),
(121, 0, NULL, NULL, 0, 1, 1, 0, 0, 3, 0, 1),
(122, 0, NULL, NULL, 0, 2, 1, 0, 0, 34, 0, 1),
(123, 0, NULL, NULL, 0, 1, 1, 0, 0, 3, 0, 1),
(124, 0, NULL, NULL, 0, 2, 1, 0, 0, 34, 0, 1),
(125, 0, NULL, NULL, 0, 1, 1, 0, 0, 5, 0, 1),
(126, 0, NULL, NULL, 0, 2, 1, 0, 0, 16, 0, 1),
(127, 0, NULL, NULL, 0, 1, 1, 0, 0, 5, 0, 1),
(128, 0, NULL, NULL, 0, 2, 1, 0, 0, 16, 0, 1),
(129, 0, NULL, NULL, 0, 1, 1, 0, 0, 4, 0, 1),
(130, 0, NULL, NULL, 0, 1, 1, 0, 0, 4, 0, 1),
(131, 0, NULL, NULL, 0, 1, 1, 0, 0, 9, 0, 1),
(132, 0, NULL, NULL, 0, 1, 1, 0, 0, 12, 0, 1),
(133, 0, NULL, NULL, 0, 1, 1, 0, 0, 9, 0, 1),
(134, 0, NULL, NULL, 0, 1, 1, 0, 0, 12, 0, 1),
(135, 0, NULL, NULL, 2, 16, 1, 0, 5, 0, 0, 1),
(136, 0, NULL, NULL, 2, 17, 1, 0, 3, 0, 0, 1),
(137, 0, NULL, NULL, 2, 16, 1, 0, 10, 0, 0, 1),
(138, 0, NULL, NULL, 2, 17, 1, 0, 5, 0, 0, 1),
(139, 0, NULL, NULL, 0, 1, 1, 0, 0, 15, 0, 1),
(140, 0, NULL, NULL, 0, 1, 1, 0, 0, 15, 0, 1),
(141, 0, NULL, NULL, 0, 1, 1, 0, 0, 10, 0, 1),
(142, 0, NULL, NULL, 0, 1, 1, 0, 0, 10, 0, 1),
(143, 0, NULL, NULL, 0, 1, 1, 0, 0, 15, 0, 1),
(144, 0, NULL, NULL, 0, 2, 1, 0, 0, 20, 0, 1),
(145, 0, NULL, NULL, 0, 1, 1, 0, 0, 15, 0, 1),
(146, 0, NULL, NULL, 0, 2, 1, 0, 0, 20, 0, 1),
(147, 0, NULL, NULL, 0, 1, 1, 0, 0, 4, 0, 1),
(148, 0, NULL, NULL, 0, 2, 1, 0, 0, 3, 0, 1),
(149, 0, NULL, NULL, 0, 1, 1, 0, 0, 4, 0, 1),
(150, 0, NULL, NULL, 0, 2, 1, 0, 0, 3, 0, 1),
(151, 0, NULL, NULL, 0, 1, 1, 0, 0, 2, 0, 1),
(152, 0, NULL, NULL, 0, 2, 1, 0, 0, 2, 0, 1),
(153, 0, NULL, NULL, 0, 1, 1, 0, 0, 2, 0, 1),
(154, 0, NULL, NULL, 0, 2, 1, 0, 0, 2, 0, 1),
(155, 0, NULL, NULL, 0, 1, 1, 0, 0, 3, 0, 1),
(156, 0, NULL, NULL, 0, 2, 1, 0, 0, 0, 0, 1),
(157, 0, NULL, NULL, 0, 1, 1, 0, 0, 3, 0, 1),
(158, 0, NULL, NULL, 0, 2, 1, 0, 0, 0, 0, 1),
(159, 0, NULL, NULL, 0, 2, 1, 0, 0, 5, 0, 1),
(160, 0, NULL, NULL, 0, 1, 1, 0, 0, 4, 0, 1),
(161, 0, NULL, NULL, 0, 2, 1, 0, 0, 5, 0, 1),
(162, 0, NULL, NULL, 0, 1, 1, 0, 0, 4, 0, 1),
(163, 0, NULL, NULL, 0, 2, 1, 0, 0, 5, 0, 1),
(164, 0, NULL, NULL, 0, 1, 1, 0, 0, 4, 0, 1),
(165, 0, NULL, NULL, 0, 2, 1, 0, 0, 5, 0, 1),
(166, 0, NULL, NULL, 0, 1, 1, 0, 0, 4, 0, 1),
(167, 0, NULL, NULL, 0, 2, 1, 0, 0, 3, 0, 1),
(168, 0, NULL, NULL, 0, 1, 1, 0, 0, 2, 0, 1),
(169, 0, NULL, NULL, 0, 1, 1, 0, 0, 2, 0, 1),
(170, 0, NULL, NULL, 0, 2, 1, 0, 0, 3, 0, 1),
(171, 0, NULL, NULL, 0, 1, 1, 0, 0, 1, 0, 1),
(172, 0, NULL, NULL, 0, 2, 1, 0, 0, 1, 0, 1),
(173, 0, NULL, NULL, 0, 1, 1, 0, 0, 1, 0, 1),
(174, 0, NULL, NULL, 0, 2, 1, 0, 0, 1, 0, 1),
(175, 0, NULL, NULL, 0, 1, 1, 0, 0, 2, 0, 1),
(176, 0, NULL, NULL, 0, 2, 1, 0, 0, 3, 0, 1),
(177, 0, NULL, NULL, 0, 1, 1, 0, 0, 3, 0, 1),
(178, 0, NULL, NULL, 0, 2, 1, 0, 0, 2, 0, 1),
(179, 0, NULL, NULL, 0, 1, 1, 0, 0, 3, 0, 1),
(180, 0, NULL, NULL, 0, 2, 1, 0, 0, 2, 0, 1),
(181, 0, NULL, NULL, 0, 1, 1, 0, 0, 1, 0, 1),
(182, 0, NULL, NULL, 0, 2, 1, 0, 0, 1, 0, 1),
(183, 0, NULL, NULL, 0, 1, 1, 0, 0, 1, 0, 1),
(184, 0, NULL, NULL, 0, 2, 1, 0, 0, 1, 0, 1),
(185, 0, NULL, NULL, 0, 1, 1, 0, 0, 3, 0, 1),
(186, 0, NULL, NULL, 0, 2, 1, 0, 0, 3, 0, 1),
(187, 0, NULL, NULL, 0, 1, 1, 0, 0, 3, 0, 1),
(188, 0, NULL, NULL, 0, 2, 1, 0, 0, 3, 0, 1),
(189, 0, NULL, NULL, 0, 1, 1, 0, 0, 12, 0, 1),
(190, 0, NULL, NULL, 0, 2, 1, 0, 0, 3, 0, 1),
(191, 0, NULL, NULL, 0, 1, 1, 0, 0, 12, 0, 1),
(192, 0, NULL, NULL, 0, 2, 1, 0, 0, 3, 0, 1),
(193, 0, NULL, NULL, 0, 1, 1, 0, 0, 15, 0, 1),
(194, 0, NULL, NULL, 0, 2, 1, 0, 0, 12, 0, 1),
(195, 0, NULL, NULL, 0, 1, 1, 0, 0, 15, 0, 1),
(196, 0, NULL, NULL, 0, 2, 1, 0, 0, 12, 0, 1),
(197, 0, NULL, NULL, 0, 1, 1, 0, 0, 15, 0, 1),
(198, 0, NULL, NULL, 0, 2, 1, 0, 0, 8, 0, 1),
(199, 0, NULL, NULL, 0, 1, 1, 0, 0, 15, 0, 1),
(200, 0, NULL, NULL, 0, 2, 1, 0, 0, 8, 0, 1),
(201, 0, NULL, NULL, 0, 2, 1, 0, 0, 4, 0, 1),
(202, 0, NULL, NULL, 0, 2, 1, 0, 0, 4, 0, 1),
(203, 0, NULL, NULL, 0, 2, 1, 0, 0, 3, 0, 1),
(204, 0, NULL, NULL, 0, 2, 1, 0, 0, 3, 0, 1),
(205, 0, NULL, NULL, 0, 2, 1, 0, 0, 2, 0, 1),
(206, 0, NULL, NULL, 0, 2, 1, 0, 0, 2, 0, 1),
(207, 0, NULL, NULL, 0, 2, 1, 0, 0, 2, 0, 1),
(208, 0, NULL, NULL, 0, 2, 1, 0, 0, 2, 0, 1),
(209, 0, NULL, NULL, 0, 2, 1, 0, 0, 3, 0, 1),
(210, 0, NULL, NULL, 0, 2, 1, 0, 0, 3, 0, 1),
(211, 0, NULL, NULL, 0, 2, 1, 0, 0, 3, 0, 1),
(212, 0, NULL, NULL, 0, 2, 1, 0, 0, 3, 0, 1),
(213, 0, NULL, NULL, 0, 2, 1, 0, 0, 4, 0, 1),
(214, 0, NULL, NULL, 0, 2, 1, 0, 0, 4, 0, 1),
(215, 0, NULL, NULL, 0, 2, 1, 0, 0, 2, 0, 1),
(216, 0, NULL, NULL, 0, 2, 1, 0, 0, 2, 0, 1),
(217, 0, NULL, NULL, 0, 2, 1, 0, 0, 2, 0, 1),
(218, 0, NULL, NULL, 0, 2, 1, 0, 0, 2, 0, 1),
(219, 0, NULL, NULL, 0, 2, 1, 0, 0, 5, 0, 1),
(220, 0, NULL, NULL, 0, 2, 1, 0, 0, 5, 0, 1),
(221, 0, NULL, NULL, 2, 22, 1, 0, 8, 0, 0, 1),
(222, 0, NULL, NULL, 2, 23, 1, 0, 5, 0, 0, 1),
(223, 0, NULL, NULL, 2, 22, 1, 0, 2, 0, 0, 1),
(224, 0, NULL, NULL, 2, 23, 1, 0, 10, 0, 0, 1),
(225, 0, NULL, NULL, 0, 1, 1, 0, 0, 5, 0, 1),
(226, 0, NULL, NULL, 0, 2, 1, 0, 0, 2, 0, 1),
(227, 0, NULL, NULL, 0, 1, 1, 0, 0, 5, 0, 1),
(228, 0, NULL, NULL, 0, 2, 1, 0, 0, 2, 0, 1),
(229, 0, NULL, NULL, 0, 1, 1, 0, 0, 5, 0, 1),
(230, 0, NULL, NULL, 0, 2, 1, 0, 0, 3, 0, 1),
(231, 0, NULL, NULL, 0, 1, 1, 0, 0, 5, 0, 1),
(232, 0, NULL, NULL, 0, 2, 1, 0, 0, 3, 0, 1),
(233, 0, NULL, NULL, 0, 1, 1, 0, 0, 2, 0, 1),
(234, 0, NULL, NULL, 0, 3, 1, 0, 0, 55, 0, 1),
(235, 0, NULL, NULL, 0, 1, 1, 0, 0, 2, 0, 1),
(236, 0, NULL, NULL, 0, 3, 1, 0, 0, 55, 0, 1),
(237, 0, NULL, NULL, 0, 1, 1, 0, 0, 3, 0, 1),
(238, 0, NULL, NULL, 0, 3, 1, 0, 0, 0, 0, 1),
(239, 0, NULL, NULL, 0, 1, 1, 0, 0, 3, 0, 1),
(240, 0, NULL, NULL, 0, 3, 1, 0, 0, 0, 0, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data untuk tabel `moq_tab`
--

INSERT INTO `moq_tab` (`mid`, `muid`, `mluid`, `mbid`, `mpid`, `mqty`) VALUES
(1, 1, 1, 1, 1, 7),
(2, 1, 1, 2, 1, 9),
(3, NULL, NULL, 1, 2, 4),
(4, NULL, NULL, 2, 2, 5),
(5, NULL, NULL, 1, 3, 44),
(6, NULL, NULL, 2, 3, 55),
(10, NULL, NULL, 5, 3, 31),
(11, NULL, NULL, 4, 3, 22),
(12, NULL, NULL, 3, 3, 33),
(13, NULL, NULL, 5, 2, 1),
(14, NULL, NULL, 4, 2, 2),
(15, NULL, NULL, 3, 2, 3),
(16, NULL, NULL, 5, 1, 0),
(17, NULL, NULL, 4, 1, 0),
(18, NULL, NULL, 3, 1, 0);

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
  PRIMARY KEY (`oid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data untuk tabel `opname_tab`
--

INSERT INTO `opname_tab` (`oid`, `oidid`, `otype`, `odate`, `ostockbegining`, `ostockin`, `ostockout`, `ostock`) VALUES
(2, 1, 1, 1397310166, 0, 0, 0, 0),
(3, 2, 2, 1397310166, 0, 0, 0, 0),
(4, 2, 2, 1397310166, 0, 0, 0, 0),
(5, 2, 2, 1397310166, 10, 10, 10, 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran_detail_tab`
--

CREATE TABLE IF NOT EXISTS `pembayaran_detail_tab` (
  `pinid` int(11) NOT NULL AUTO_INCREMENT,
  `pmid` int(11) NOT NULL,
  `pno_inv` varchar(20) NOT NULL,
  `ptotal_inv` double NOT NULL,
  `ptgl_bayar_inv` date NOT NULL,
  `ptgl_lunas` date NOT NULL,
  `pduration` int(11) NOT NULL,
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
  `no_inv` varchar(25) NOT NULL,
  PRIMARY KEY (`pmid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data untuk tabel `pembayaran_tab`
--

INSERT INTO `pembayaran_tab` (`pmid`, `pno_pm`, `pcid`, `pm_tgl`, `pcash`, `pgiro`, `piutang`, `ptgl_giro`, `pwrite_off`, `sreff`, `status`, `kurang_bayar`, `no_inv`) VALUES
(1, 'p001', 1, '2015-05-02', 0, 0, 0, '0000-00-00', 0, 'gratcy', 1, 0, ''),
(2, 'p002', 1, '2015-03-28', 10000, 5000, 765605, '2015-03-12', 750605, 'ok', 1, 0, ''),
(3, 'nn', 2, '2015-03-28', 0, 0, 0, '0000-00-00', 0, 'gratcy', 1, 0, ''),
(4, 'p003', 1, '2015-03-28', 0, 0, 0, '0000-00-00', 0, 'Sandi', 1, 0, ''),
(5, 'P003', 1, '2015-03-28', 0, 0, 0, '0000-00-00', 0, 'sandi', 1, 0, ''),
(6, 'P99', 1, '2015-03-28', 0, 0, 0, '0000-00-00', 0, 'sandi', 1, 0, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penerimaan_detail_tab`
--

CREATE TABLE IF NOT EXISTS `penerimaan_detail_tab` (
  `pnid` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL,
  `ppid` int(11) NOT NULL,
  `pppid` int(11) NOT NULL,
  `pcurrency` varchar(15) NOT NULL,
  `pqty` int(11) NOT NULL,
  `pharga` int(11) NOT NULL,
  `pdisc` double NOT NULL,
  `pketerangan` text NOT NULL,
  `pstatus` tinyint(1) NOT NULL DEFAULT '0',
  `pno_penerimaan` varchar(20) NOT NULL,
  PRIMARY KEY (`pnid`)
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=131 ;

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
(57, 'InventoryServicesView', 'Inventory Services View', 'inventory/3', 0),
(58, 'InventoryServicesAdd', 'Inventory Services Add', 'inventory/inventory_add/3', 57),
(59, 'InventoryServicesUpdate', 'Inventory Services Update', 'inventory/inventory_update/3', 57),
(60, 'InventoryServicesDelete', 'Inventory Services Delete', 'inventory/inventory_delete/3', 57),
(61, 'InventoryReturnView', 'Inventory Return View', 'inventory/4', 0),
(62, 'InventoryReturnAdd', 'Inventory Return Add', 'inventory/inventory_add/4', 61),
(63, 'InventoryReturnUpdate', 'Inventory Return Update', 'inventory/inventory_update/4', 61),
(64, 'InventoryReturnDelete', 'Inventory Return Delete', 'inventory/inventory_delete/4', 61),
(65, 'OpnameProductView', 'Opname Product View', 'opname/1', 0),
(66, 'OpnameProductAdd', 'Opname Product Add', 'opname/opname_add/1', 65),
(67, 'OpnameProductUpdate', 'Opname Product Update', 'opname/opname_update/1', 65),
(68, 'OpnameProductDelete', 'Opname Product Delete', 'opname/opname_delete/1', 65),
(69, 'OpnameSparepartView', 'Opname Sparepart View', 'opname/2', 0),
(70, 'OpnameSparepartAdd', 'Opname Sparepart Add', 'opname/opname_add/2', 69),
(71, 'OpnameSparepartUpdate', 'Opname Sparepart Update', 'opname/opname_update/2', 69),
(72, 'OpnameSparepartDelete', 'Opname Sparepart Delete', 'opname/opname_delete/2', 69),
(73, 'OpnameServicesView', 'Opname Services View', 'opname/3', 0),
(74, 'OpnameServicesAdd', 'Opname Services Add', 'opname/opname_add/3', 73),
(75, 'OpnameServicesUpdate', 'Opname Services Update', 'opname/opname_update/3', 73),
(76, 'OpnameServicesDelete', 'Opname Services Delete', 'opname/opname_delete/3', 73),
(77, 'OpnameReturnView', 'Opname Return View', 'opname/4', 0),
(78, 'OpnameReturnAdd', 'Opname Return Add', 'opname/opname_add/4', 77),
(79, 'OpnameReturnUpdate', 'Opname Return Update', 'opname/opname_update/4', 77),
(80, 'OpnameReturnDelete', 'Opname Return Delete', 'opname/opname_delete/4', 77),
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
(101, 'ExecuteAllBranchInventoryServices', 'Execute All Branch Inventory Services', 'inventory/3/*', 0),
(102, 'ExecuteAllBranchInventoryReturn', 'Execute All Branch Inventory Return', 'inventory/4/*', 0),
(103, 'ExecuteAllBranchOpnameProduct', 'Execute All Branch Opname Product', 'opname/1/*', 0),
(104, 'ExecuteAllBranchOpnameSparepart', 'Execute All Branch Opname Sparepart', 'opname/2/*', 0),
(105, 'ExecuteAllBranchOpnameServices', 'Execute All Branch Opname Services', 'opname/3/*', 0),
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
(130, 'ProductViewAsBranch', 'Group Sparepart Add', 'product', 9);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data untuk tabel `pm_tab`
--

INSERT INTO `pm_tab` (`pid`, `pdate`, `pfrom`, `pto`, `psubject`, `pmsg`, `pstatus`, `pfdelete`, `ptdelete`) VALUES
(1, 1397310166, 2, 1, 'test', 'asasaskaskansknaksnaks an ksnaksnaksna ks naks an skna', 1, 0, 0),
(2, 1397310166, 1, 2, 'testw', 'papspasas as as ', 0, 0, 0),
(3, 1402771900, 1, 2, 'aa', 'aaa', 0, 0, 0),
(4, 1402773166, 1, 2, 'qqqqqq', 'qqqqqqqqqq\n\n-------\ntest\nasasaskaskansknaksnaks an ksnaksnaksna ks naks an skna                        ', 0, 0, 0),
(5, 1403422074, 1, 1, 'qqqqqq', 'aaaaa', 1, 0, 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `products_tab`
--

INSERT INTO `products_tab` (`pid`, `puid`, `pluid`, `pcid`, `pvolume`, `pgroup`, `ptype`, `ppid`, `pcode`, `pname`, `pdesc`, `phpp`, `pdist`, `psemi`, `pkey`, `pstore`, `pconsume`, `ppoint`, `pdisc`, `pstatus`) VALUES
(1, 1, 1, 7, 0, 0, 2, 3, 'prod002', 'Produk 2', 'ere', 10000, 100000, 200000, 300000, 400000, 500000, 0, 15, 1),
(2, NULL, NULL, 1, 20, 4, 0, 3, 'prod001', 'Produk1', 'produk bagus', 111000, 110000, 111100, 101000, 100000, 105000, 1, 15, 1),
(3, NULL, NULL, 7, 111111, 4, 2, 3, 'prod000', 'prod A', '111111', 1111, 1111, 1011, 1011, 1011, 1011, 111, 11, 1);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
  `sstatus` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`sid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `retur_order_detail_tab`
--

INSERT INTO `retur_order_detail_tab` (`sid`, `ssid`, `spid`, `sqty`, `sprice`, `sdisc`, `saccept`, `sreject`, `ssisa`, `sstatus`) VALUES
(1, 1, 1, 3, 30000, 0, 3, 0, 3, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `retur_order_tab`
--

CREATE TABLE IF NOT EXISTS `retur_order_tab` (
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
  `spotong` int(11) NOT NULL DEFAULT '0',
  `status_potong` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`sid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `retur_order_tab`
--

INSERT INTO `retur_order_tab` (`sid`, `sbid`, `snoso`, `snopo`, `sreff`, `stgl`, `scid`, `stype`, `ssid`, `sppn`, `sfreeppn`, `sstatus`, `scdate`, `sketerangan`, `sduedate`, `spotong`, `status_potong`) VALUES
(1, 0, '1', '', 'sss', '2015-03-28', 1, '', 1, '0', 0, 4, '2015-03-28', 'ok', '2015-04-12', 90000, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `sales_commision_tab`
--

INSERT INTO `sales_commision_tab` (`sid`, `suid`, `sluid`, `sbid`, `scid`, `scoma`, `scomb`, `scomc`, `scomd`, `scome`, `scredita`, `screditb`, `screditc`, `screditd`, `scredite`, `sstatus`) VALUES
(1, 1, 1, 1, 1, 90.00, 90.00, 90.00, 0.00, 90.00, 90.00, 90.00, 90.00, 90.00, 90.00, 1),
(2, NULL, NULL, 2, 7, 90.00, 90.00, 90.00, 0.00, 90.00, 90.00, 90.00, 90.00, 90.00, 90.00, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data untuk tabel `sales_order_detail_tab`
--

INSERT INTO `sales_order_detail_tab` (`sid`, `ssid`, `spid`, `sqty`, `sprice`, `sdisc`, `ssisa`) VALUES
(1, 1, 1, 5, 400000, 0, 0),
(2, 1, 3, 55, 1011, 0, 0),
(3, 2, 2, 7, 105000, 15, 7),
(4, 2, 1, 9, 500000, 15, 9);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `sales_order_tab`
--

INSERT INTO `sales_order_tab` (`sid`, `sbid`, `snoso`, `snopo`, `sreff`, `stgl`, `scid`, `stype`, `ssid`, `sppn`, `sfreeppn`, `sstatus`, `scdate`, `sketerangan`, `sduedate`, `stypepay`) VALUES
(1, 4, '0', '', 'Sandi', '2015-03-28', 1, '', 1, '0', 0, 3, '2015-03-27', 'ok', '2015-04-12', 'credit'),
(2, 4, '2', '', 'gratcy', '2015-03-23', 1, '', 1, '0', 0, 1, '2015-03-27', 'ok', '2015-04-07', 'auto'),
(3, 0, '3', '', 'gratcy', '2015-03-28', 1, '', 1, '0', 0, 1, '2015-03-28', 'ok', '2015-04-12', 'auto');

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
  `sarea` tinyint(1) DEFAULT '0',
  `sstatus` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`sid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `sales_tab`
--

INSERT INTO `sales_tab` (`sid`, `suid`, `sluid`, `sbid`, `scode`, `sname`, `sphone`, `semail`, `sjoindate`, `sarea`, `sstatus`) VALUES
(1, 1, 1, 1, 'wewe', 'dsd', '1212212*121212', 'admin@admin.com', NULL, 0, 1),
(2, 1, 1, 2, 'sales2', 'sales002', '1212212*121212', 'admin@admin.com', NULL, 0, 1),
(3, NULL, NULL, 2, '3', 'sales003', '9798798*989898798', 'sss@szss.com', -111600, 1, 1);

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
-- Struktur dari tabel `services_sparepart_tab`
--

CREATE TABLE IF NOT EXISTS `services_sparepart_tab` (
  `sid` int(10) NOT NULL AUTO_INCREMENT,
  `suid` int(10) DEFAULT NULL,
  `sluid` int(10) DEFAULT NULL,
  `ssid` int(10) DEFAULT NULL,
  `sssid` int(10) DEFAULT NULL,
  `sstatus` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`sid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `services_tab`
--

CREATE TABLE IF NOT EXISTS `services_tab` (
  `sid` int(10) NOT NULL AUTO_INCREMENT,
  `suid` int(10) DEFAULT NULL,
  `sluid` int(10) DEFAULT NULL,
  `sdate` int(10) DEFAULT NULL,
  `spid` int(10) DEFAULT NULL,
  `sbid` int(10) DEFAULT NULL,
  `sqty` int(3) DEFAULT NULL,
  `snoseri` varchar(50) DEFAULT NULL,
  `scondition` tinyint(1) DEFAULT '0',
  `sdatefrom` int(10) DEFAULT NULL,
  `sdateto` int(10) DEFAULT NULL,
  `sstatus` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`sid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `services_tab`
--

INSERT INTO `services_tab` (`sid`, `suid`, `sluid`, `sdate`, `spid`, `sbid`, `sqty`, `snoseri`, `scondition`, `sdatefrom`, `sdateto`, `sstatus`) VALUES
(1, 1, 1, 1397310166, 1, 1, 1, '1212asa', 1, 1397310166, 1397310166, 1),
(2, NULL, NULL, 1411476990, 1, 2, 11, '2323aas', 1, 1388505600, 1420646400, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sparepart_tab`
--

CREATE TABLE IF NOT EXISTS `sparepart_tab` (
  `sid` int(10) NOT NULL AUTO_INCREMENT,
  `suid` int(10) DEFAULT NULL,
  `sluid` int(10) DEFAULT NULL,
  `spid` int(10) DEFAULT NULL,
  `scode` varchar(50) DEFAULT NULL,
  `sname` varchar(150) DEFAULT NULL,
  `snocomponent` varchar(10) DEFAULT NULL,
  `sgeneral` tinyint(1) DEFAULT '0',
  `sgroup` tinyint(1) DEFAULT '0',
  `spriceagent` int(10) DEFAULT NULL,
  `spriceretail` int(10) DEFAULT NULL,
  `sstatus` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`sid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `sparepart_tab`
--

INSERT INTO `sparepart_tab` (`sid`, `suid`, `sluid`, `spid`, `scode`, `sname`, `snocomponent`, `sgeneral`, `sgroup`, `spriceagent`, `spriceretail`, `sstatus`) VALUES
(1, 1, 1, 1, 'asasx', 'asas', '1021902', 1, 0, 10, 10, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `technical_tab`
--

INSERT INTO `technical_tab` (`tid`, `tuid`, `tluid`, `tbid`, `tcode`, `tname`, `tphone`, `temail`, `tjoindate`, `tstatus`) VALUES
(1, 1, 1, 2, 'sasas', 'palma', '098128192*121212', 'palma@admin.com', 1391616000, 1),
(2, NULL, NULL, 2, 'asasx', 'palma', '8909809*121212', 'palma@admin.com', 1415808000, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `users_tab`
--

INSERT INTO `users_tab` (`uid`, `ugid`, `ubid`, `uemail`, `udivision`, `uposition`, `upass`, `ulastlogin`, `ustatus`) VALUES
(1, 1, 1, 'admin@admin.com', 'IT', 'Programmer', 'e89591ee9b8e7018511649a2146ae279', '*1427527515', 1),
(2, 2, 2, 'admin@dluxor.com', 'web', 'programmer', 'e89591ee9b8e7018511649a2146ae279', '*1416437009', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
