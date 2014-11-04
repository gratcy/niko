-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 24, 2014 at 09:27 AM
-- Server version: 5.5.32
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `distribution_db`
--
CREATE DATABASE IF NOT EXISTS `distribution_db` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `distribution_db`;

-- --------------------------------------------------------

--
-- Table structure for table `access_tab`
--

CREATE TABLE IF NOT EXISTS `access_tab` (
  `aid` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `agid` int(4) unsigned NOT NULL,
  `apid` int(10) DEFAULT NULL,
  `aaccess` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`aid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `access_tab`
--

INSERT INTO `access_tab` (`aid`, `agid`, `apid`, `aaccess`) VALUES
(1, 2, 1, 1),
(2, 2, 2, 0),
(3, 2, 3, 1),
(4, 2, 4, 0),
(5, 2, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `branch_tab`
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `branch_tab`
--

INSERT INTO `branch_tab` (`bid`, `buid`, `bluid`, `bname`, `bnpwp`, `baddr`, `bcity`, `bprovince`, `bphone`, `bstatus`) VALUES
(1, 1, 1, 'Pusat', NULL, 'wew', 1, 1, '989898*121212', 1),
(2, 1, 1, 'Semarang', 'aaaa', 'aasas', 1, 2, '989898*121212', 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories_tab`
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
-- Dumping data for table `categories_tab`
--

INSERT INTO `categories_tab` (`cid`, `cuid`, `cluid`, `ctype`, `cname`, `cdesc`, `cdiscount`, `cstatus`) VALUES
(1, 1, 1, 1, 'wew', 'wew', '90', 1),
(2, 1, 1, 2, 'qqww', 'qqww', '', 1),
(3, 1, 1, 3, 'Pcs', 'Pcs', '', 1),
(4, NULL, NULL, 1, 'kat1', 'kategori 1', NULL, 1),
(5, NULL, NULL, 1, 'kat2', 'kategori 2', NULL, 1),
(6, NULL, NULL, 1, 'kat3', 'kategori 3', NULL, 1),
(7, NULL, NULL, 1, 'kat4', 'kategori 4', NULL, 1),
(8, NULL, NULL, 1, 'kat5', 'kategori 5', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `coa_tab`
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `coa_tab`
--

INSERT INTO `coa_tab` (`cid`, `catype`, `ctype`, `ccode`, `cname`, `csaldo`, `cdebet`, `ccredit`, `cdesc`, `cparent`, `cstatus`) VALUES
(1, 1, 0, 'XSA232', 'admins', 10000, NULL, NULL, '', 0, 0),
(2, 2, 1, 'asas', 'BANK', 0, NULL, NULL, 'BANK', 0, 1),
(3, 2, 0, 'MnDr', 'Mandiri', 1000, NULL, NULL, 'test', 2, 1),
(4, 1, 0, 'bca', 'BCA', 1111, NULL, NULL, 'test', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `customers_tab`
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
  `csid` int(10) DEFAULT NULL,
  `ccash` int(10) DEFAULT NULL,
  `ccredit` int(10) DEFAULT NULL,
  `climit` int(10) DEFAULT NULL,
  `cnpwp` varchar(50) DEFAULT NULL,
  `cpkp` varchar(15) DEFAULT NULL,
  `cspecial` tinyint(1) DEFAULT '0',
  `cstatus` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `customers_tab`
--

INSERT INTO `customers_tab` (`cid`, `cuid`, `cluid`, `cbid`, `ccat`, `cname`, `caddr`, `ccity`, `cprov`, `cdeliver`, `cphone`, `csid`, `ccash`, `ccredit`, `climit`, `cnpwp`, `cpkp`, `cspecial`, `cstatus`) VALUES
(1, 1, 1, 1, 1, 'palma', 'jakarta*semarang', 1, 1, 1, '909090*232323', 1, 15, 45, 10000, '1212', '1', 1, 1),
(2, 1, 1, 1, 3, 'customer 1', '    jakarta*    semarang', 1, 1, 0, '909090*232323', 1, 15, 45, 10000, '1212', '1', 1, 1),
(3, 1, 1, 2, 0, 'CUST002', 'jakarta*jakarta', 1, 2, 0, '987979*797987', 1, 18, 48, 667, '68788789899898', '0', 0, 1),
(4, 1, 1, 2, 1, 'CUST003', ' semarang* semarang', 1, 2, 0, '4444444*5555555', 1, 10, 30, 3000000, '80098089080909', '0', 1, 1),
(5, 1, 1, 1, 2, 'CUST004', 'Jakarta*Jakarta', 1, 1, 0, '7777777777*8888888888', 1, 10, 30, 7000000, '888866666666', '0', 0, 1),
(6, 1, 1, 1, 3, 'CUST005', 'Jakarta*Jakarta', 1, 1, 0, '79878989890*6787888888', 1, 15, 45, 1000000, '80800', '0', 1, 1),
(7, NULL, NULL, 1, 0, 'CUST007', 'Jakarta*Jakarta', 1, 1, 0, '987099009*76576878', 1, 200000, 300000, 400000, '7658778978789', '0', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `groups_tab`
--

CREATE TABLE IF NOT EXISTS `groups_tab` (
  `gid` int(4) unsigned NOT NULL AUTO_INCREMENT,
  `gname` varchar(50) NOT NULL,
  `gdesc` text NOT NULL,
  `gstatus` int(1) DEFAULT '0',
  PRIMARY KEY (`gid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `groups_tab`
--

INSERT INTO `groups_tab` (`gid`, `gname`, `gdesc`, `gstatus`) VALUES
(1, 'Root', 'Root', 1),
(2, 'admins', 'aaaaaaa', 1);

-- --------------------------------------------------------

--
-- Table structure for table `inventory_tab`
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `inventory_tab`
--

INSERT INTO `inventory_tab` (`iid`, `iuid`, `iluid`, `ibid`, `iiid`, `itype`, `istockbegining`, `istockin`, `istockout`, `istock`, `istatus`) VALUES
(1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 1),
(2, 1, 1, 1, 1, 2, 10, 10, 10, 10, 1),
(3, 1, 1, 1, 1, 3, NULL, NULL, NULL, 100, 1);

-- --------------------------------------------------------

--
-- Table structure for table `moq_tab`
--

CREATE TABLE IF NOT EXISTS `moq_tab` (
  `mid` int(10) NOT NULL AUTO_INCREMENT,
  `muid` int(10) DEFAULT NULL,
  `mluid` int(10) DEFAULT NULL,
  `mbid` int(10) DEFAULT NULL,
  `mpid` int(10) DEFAULT NULL,
  `mqty` int(10) DEFAULT NULL,
  PRIMARY KEY (`mid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `moq_tab`
--

INSERT INTO `moq_tab` (`mid`, `muid`, `mluid`, `mbid`, `mpid`, `mqty`) VALUES
(1, 1, 1, 1, 1, 10),
(2, 1, 1, 2, 1, 20),
(3, 1, 1, 1, 2, 15),
(4, 1, 1, 2, 2, 17),
(5, 1, 1, 1, 3, 20),
(6, 1, 1, 2, 3, 25);

-- --------------------------------------------------------

--
-- Table structure for table `opname_tab`
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
-- Dumping data for table `opname_tab`
--

INSERT INTO `opname_tab` (`oid`, `oidid`, `otype`, `odate`, `ostockbegining`, `ostockin`, `ostockout`, `ostock`) VALUES
(2, 1, 1, 1397310166, 0, 0, 0, 0),
(3, 2, 2, 1397310166, 0, 0, 0, 0),
(4, 2, 2, 1397310166, 0, 0, 0, 0),
(5, 2, 2, 1397310166, 10, 10, 10, 10);

-- --------------------------------------------------------

--
-- Table structure for table `permission_tab`
--

CREATE TABLE IF NOT EXISTS `permission_tab` (
  `pid` int(10) NOT NULL AUTO_INCREMENT,
  `pname` varchar(45) DEFAULT NULL,
  `pdesc` varchar(150) DEFAULT NULL,
  `purl` varchar(45) DEFAULT NULL,
  `pparent` int(10) DEFAULT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `permission_tab`
--

INSERT INTO `permission_tab` (`pid`, `pname`, `pdesc`, `purl`, `pparent`) VALUES
(1, 'wew', 'wew', 'wew', 0),
(2, 'wew1', 'wew1', 'wew', 1),
(3, 'wew2', 'wew2', 'wew', 1),
(4, 'aww', 'aww', 'aww', 0),
(5, 'aww', 'aww', 'aww', 4);

-- --------------------------------------------------------

--
-- Table structure for table `pm_tab`
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
-- Dumping data for table `pm_tab`
--

INSERT INTO `pm_tab` (`pid`, `pdate`, `pfrom`, `pto`, `psubject`, `pmsg`, `pstatus`, `pfdelete`, `ptdelete`) VALUES
(1, 1397310166, 2, 1, 'test', 'asasaskaskansknaksnaks an ksnaksnaksna ks naks an skna', 1, 0, 0),
(2, 1397310166, 1, 2, 'testw', 'papspasas as as ', 0, 0, 0),
(3, 1402771900, 1, 2, 'aa', 'aaa', 0, 0, 0),
(4, 1402773166, 1, 2, 'qqqqqq', 'qqqqqqqqqq\n\n-------\ntest\nasasaskaskansknaksnaks an ksnaksnaksna ks naks an skna                        ', 0, 0, 0),
(5, 1403422074, 1, 1, 'qqqqqq', 'aaaaa', 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `products_tab`
--

CREATE TABLE IF NOT EXISTS `products_tab` (
  `pid` int(10) NOT NULL,
  `puid` int(10) DEFAULT NULL,
  `pluid` int(10) DEFAULT NULL,
  `pcid` int(10) DEFAULT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products_tab`
--

INSERT INTO `products_tab` (`pid`, `puid`, `pluid`, `pcid`, `ppid`, `pcode`, `pname`, `pdesc`, `phpp`, `pdist`, `psemi`, `pkey`, `pstore`, `pconsume`, `ppoint`, `pdisc`, `pstatus`) VALUES
(1, 1, 1, 6, 3, 'PROD000', 'prod000', 'ok', 10000, 11000, 11500, 12000, 12500, 13000, 10, 15, 1),
(2, 1, 1, 4, 3, 'PROD001', 'prod001', 'ok', 100000, 150000, 200000, 250000, 300000, 350000, 1000, 15, 1),
(3, 1, 1, 5, 3, 'PROD002', 'PROD002', 'ok', 100000, 140000, 170000, 200000, 250000, 300000, 10, 15, 1);

-- --------------------------------------------------------

--
-- Table structure for table `purchase_order_detail_tab`
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
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `purchase_order_tab`
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
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `purchase_order_tab`
--

INSERT INTO `purchase_order_tab` (`pid`, `pbid`, `pnobukti`, `pref`, `ptgl`, `psid`, `pgudang`, `pstatus`, `pcdate`) VALUES
(1, 1, '123', 'tes', '2014-06-14', 1, '1', 2, NULL),
(2, 0, '123', 'kjhkjjk', '2000-02-01', 2, 'ABC', 2, NULL),
(4, 1, '1234', 'sandi', '2014-06-15', 1, '0', 2, NULL),
(15, 2, '8999', 'nnn', '2014-05-28', 1, 'ZZ', 0, NULL),
(16, 1, '123', 'dhafir', '2014-06-16', 1, 'ABC', 0, '2014-06-15'),
(17, 2, '4', 'sansan', '2014-06-15', 1, 'GEDE', 0, '2014-06-15'),
(18, 2, '5', 'sansan ok', '2014-06-15', 1, 'GEDE', 0, '2014-06-15'),
(19, 2, '1', 'HHH', '2014-07-03', 1, 'X', 0, '2014-06-15');

-- --------------------------------------------------------

--
-- Table structure for table `raw_material_tab`
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
-- Dumping data for table `raw_material_tab`
--

INSERT INTO `raw_material_tab` (`rid`, `ruid`, `rluid`, `rbid`, `rtype`, `rcode`, `rname`, `rstatus`) VALUES
(1, 1, 1, 1, 2, 'xws', 'mom', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sales_commision_tab`
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
-- Dumping data for table `sales_commision_tab`
--

INSERT INTO `sales_commision_tab` (`sid`, `suid`, `sluid`, `sbid`, `scid`, `scoma`, `scomb`, `scomc`, `scomd`, `scome`, `scredita`, `screditb`, `screditc`, `screditd`, `scredite`, `sstatus`) VALUES
(1, 1, 1, 1, 1, 90.00, 90.00, 90.00, 90.00, 90.00, 90.00, 90.00, 90.00, 90.00, 90.00, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sales_order_detail_tab`
--

CREATE TABLE IF NOT EXISTS `sales_order_detail_tab` (
  `sid` int(11) NOT NULL AUTO_INCREMENT,
  `ssid` int(11) DEFAULT NULL,
  `spid` int(11) DEFAULT NULL,
  `sqty` int(11) DEFAULT NULL,
  `sprice` double DEFAULT NULL,
  `sdisc` double DEFAULT NULL,
  PRIMARY KEY (`sid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `sales_order_detail_tab`
--

INSERT INTO `sales_order_detail_tab` (`sid`, `ssid`, `spid`, `sqty`, `sprice`, `sdisc`) VALUES
(4, 20, 2, 12, 300000, NULL),
(5, 20, 3, 17, 220000, NULL),
(6, 20, 2, 10, 350000, 15);

-- --------------------------------------------------------

--
-- Table structure for table `sales_order_tab`
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
  PRIMARY KEY (`sid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `sales_order_tab`
--

INSERT INTO `sales_order_tab` (`sid`, `sbid`, `snoso`, `snopo`, `sreff`, `stgl`, `scid`, `stype`, `ssid`, `sppn`, `sfreeppn`, `sstatus`, `scdate`, `sketerangan`) VALUES
(1, 1, '123', '', 'tes', '2014-06-14', 0, NULL, 1, '', 0, 2, NULL, ''),
(2, 0, '123', '', 'kjhkjjk', '2000-02-01', 0, NULL, 2, '', 0, 2, NULL, ''),
(4, 1, '1234', '', 'sandi', '2014-06-15', 0, NULL, 1, '', 0, 2, NULL, ''),
(15, 2, '8999', '', 'nnn', '2014-05-28', 0, NULL, 1, '', 0, 0, NULL, ''),
(16, 1, '123', '', 'dhafir', '2014-06-16', 0, NULL, 1, '', 0, 0, '2014-06-15', ''),
(17, 2, '4', '', 'sansan', '2014-06-15', 0, NULL, 1, '', 0, 0, '2014-06-15', ''),
(18, 2, '5', '', 'sansan ok', '2014-06-15', 0, NULL, 1, '', 0, 0, '2014-06-15', ''),
(19, 2, '1', '', 'HHH', '2014-07-03', 0, NULL, 1, '', 0, 0, '2014-06-15', ''),
(20, 2, '2', '', '0', '2014-07-24', 6, '', 1, '0', 0, 1, '2014-07-24', 'ok');

-- --------------------------------------------------------

--
-- Table structure for table `sales_tab`
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
  `sstatus` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`sid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `sales_tab`
--

INSERT INTO `sales_tab` (`sid`, `suid`, `sluid`, `sbid`, `scode`, `sname`, `sphone`, `semail`, `sstatus`) VALUES
(1, 1, 1, 1, 'sal001', 'sales1', '1212212*121212', 'admin@admin.com', 1),
(2, 1, 1, 1, 'sal002', 'sales2', '89999*77777', 'sales@admin.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sales_target_omset_tab`
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
-- Table structure for table `sales_target_tab`
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
-- Table structure for table `services_sparepart_tab`
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
-- Table structure for table `services_tab`
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `services_tab`
--

INSERT INTO `services_tab` (`sid`, `suid`, `sluid`, `sdate`, `spid`, `sbid`, `sqty`, `snoseri`, `scondition`, `sdatefrom`, `sdateto`, `sstatus`) VALUES
(1, 1, 1, 1397310166, 1, 1, 1, '1212asa', 1, 1397310166, 1397310166, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sparepart_tab`
--

CREATE TABLE IF NOT EXISTS `sparepart_tab` (
  `sid` int(10) NOT NULL AUTO_INCREMENT,
  `suid` int(10) DEFAULT NULL,
  `sluid` int(10) DEFAULT NULL,
  `spid` int(10) DEFAULT NULL,
  `scode` varchar(50) DEFAULT NULL,
  `sname` varchar(150) DEFAULT NULL,
  `snocomponent` varchar(10) DEFAULT NULL,
  `spriceagent` int(10) DEFAULT NULL,
  `spriceretail` int(10) DEFAULT NULL,
  `sstatus` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`sid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `sparepart_tab`
--

INSERT INTO `sparepart_tab` (`sid`, `suid`, `sluid`, `spid`, `scode`, `sname`, `snocomponent`, `spriceagent`, `spriceretail`, `sstatus`) VALUES
(1, 1, 1, 1, 'asasx', 'asas', '1021902', 10, 10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `suplier_tab`
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `suplier_tab`
--

INSERT INTO `suplier_tab` (`sid`, `suid`, `sluid`, `scode`, `sname`, `scp`, `snpwp`, `saddr`, `sphone`, `scity`, `sprov`, `sstatus`) VALUES
(1, 1, 1, 'axax', 'palma', 'asas', '2323', 'asasasas*asas', '12121212*121313', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `target_tab`
--

CREATE TABLE IF NOT EXISTS `target_tab` (
  `tid` int(10) NOT NULL AUTO_INCREMENT,
  `tbid` int(10) DEFAULT NULL,
  `tsid` int(10) DEFAULT NULL,
  `tmy` varchar(10) DEFAULT NULL,
  `ttarget` int(20) DEFAULT NULL,
  `tstatus` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`tid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `target_tab`
--

INSERT INTO `target_tab` (`tid`, `tbid`, `tsid`, `tmy`, `ttarget`, `tstatus`) VALUES
(1, 1, 1, '06/2004', 1000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `technical_tab`
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
  `tstatus` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`tid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `technical_tab`
--

INSERT INTO `technical_tab` (`tid`, `tuid`, `tluid`, `tbid`, `tcode`, `tname`, `tphone`, `temail`, `tstatus`) VALUES
(1, 1, 1, 1, 'sasas', 'palma', '098128192*121212', 'palma@admin.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users_tab`
--

CREATE TABLE IF NOT EXISTS `users_tab` (
  `uid` int(10) NOT NULL AUTO_INCREMENT,
  `ugid` int(10) DEFAULT NULL,
  `ubid` int(10) DEFAULT NULL,
  `uemail` varchar(50) DEFAULT NULL,
  `upass` varchar(50) DEFAULT NULL,
  `ulastlogin` varchar(21) DEFAULT NULL,
  `ustatus` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `users_tab`
--

INSERT INTO `users_tab` (`uid`, `ugid`, `ubid`, `uemail`, `upass`, `ulastlogin`, `ustatus`) VALUES
(1, 1, 1, 'admin@admin.com', 'e89591ee9b8e7018511649a2146ae279', '*1406183560', 1),
(2, 1, 1, 'admin@dluxor.com', 'e89591ee9b8e7018511649a2146ae279', NULL, 1),
(3, 1, 1, 'admin@dluxor.com', '4f71fccac43c73545ddd9cd772f37598', NULL, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
