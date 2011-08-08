-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 24, 2011 at 12:22 AM
-- Server version: 5.1.36
-- PHP Version: 5.2.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `electrologus_ro`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_autologin`
--

CREATE TABLE IF NOT EXISTS `admin_autologin` (
  `key_id` char(32) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `admin_user_id` int(11) NOT NULL DEFAULT '0',
  `admin_user_agent` varchar(150) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `last_ip` varchar(40) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `last_login` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`key_id`,`admin_user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin_autologin`
--

INSERT INTO `admin_autologin` (`key_id`, `admin_user_id`, `admin_user_agent`, `last_ip`, `last_login`) VALUES
('13cde1a95937fea130845255f62bf8da', 1, 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.9.2.13) Gecko/20101203 Firefox/3.6.13', '127.0.0.1', '2010-12-14 22:17:47');

-- --------------------------------------------------------

--
-- Table structure for table `admin_user`
--

CREATE TABLE IF NOT EXISTS `admin_user` (
  `id` smallint(5) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) NOT NULL,
  `email` varchar(128) NOT NULL,
  `phone` varchar(16) NOT NULL,
  `password` varchar(32) NOT NULL,
  `first_name` varchar(128) NOT NULL,
  `last_name` varchar(128) NOT NULL,
  `recv_emails` tinyint(1) NOT NULL DEFAULT '0',
  `is_super_admin` tinyint(1) NOT NULL DEFAULT '0',
  `last_ip` varchar(40) NOT NULL,
  `last_login` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin_user`
--

INSERT INTO `admin_user` (`id`, `username`, `email`, `phone`, `password`, `first_name`, `last_name`, `recv_emails`, `is_super_admin`, `last_ip`, `last_login`, `created_at`) VALUES
(1, 'admin', 'electrologus.instalatii@gmail.com', '', '7ddb8026f3bf72a72febfa9ab9a66ffb', '', '', 0, 1, '127.0.0.1', '2010-12-14 22:17:48', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE IF NOT EXISTS `images` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_category` smallint(6) unsigned NOT NULL,
  `filename` varchar(255) NOT NULL,
  `sort` smallint(5) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `id_category`, `filename`, `sort`) VALUES
(1, 1, 'instalatii-electrice02.jpg', 1),
(2, 1, 'instalatii-electrice01-1.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `images_categories`
--

CREATE TABLE IF NOT EXISTS `images_categories` (
  `id` smallint(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `sort` smallint(5) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `images_categories`
--

INSERT INTO `images_categories` (`id`, `name`, `sort`) VALUES
(1, 'Instalatii electrice interioare', 1),
(2, 'Instalatii electrice exterioare', 2);

-- --------------------------------------------------------

--
-- Table structure for table `portofoliu`
--

CREATE TABLE IF NOT EXISTS `portofoliu` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_category` smallint(6) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `sort` smallint(5) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `portofoliu`
--

INSERT INTO `portofoliu` (`id`, `id_category`, `name`, `sort`) VALUES
(1, 1, 'Colegiul National Coriolan Brediceanu, Lugoj - Cladirea Informatica', 1),
(2, 1, 'Iulia Hasdeu, Lugoj', 2),
(3, 1, 'Gradinita cu program prelungit I.T.L., Lugoj', 3),
(4, 1, 'BRD Unic, Lugoj', 4),
(5, 1, 'Bloc 17 apartamente, Blascovici - Timisoara', 5),
(6, 2, 'Nocturna Stadion Lugoj', 1),
(7, 3, 'Biserica Greco-Catolica, Petrosani', 1);

-- --------------------------------------------------------

--
-- Table structure for table `portofoliu_categories`
--

CREATE TABLE IF NOT EXISTS `portofoliu_categories` (
  `id` smallint(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `sort` smallint(5) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `portofoliu_categories`
--

INSERT INTO `portofoliu_categories` (`id`, `name`, `sort`) VALUES
(1, 'Instalatii electrice interioare', 1),
(2, 'Instalatii electrice exterioare', 2),
(3, 'Instalatii paratraznet', 3);
