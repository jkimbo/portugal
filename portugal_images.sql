-- phpMyAdmin SQL Dump
-- version 3.3.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 18, 2011 at 11:29 PM
-- Server version: 5.1.54
-- PHP Version: 5.3.5-1ubuntu7.2

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `family`
--

-- --------------------------------------------------------

--
-- Table structure for table `portugal_images`
--

CREATE TABLE IF NOT EXISTS `portugal_images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(60) DEFAULT NULL,
  `filename` varchar(60) DEFAULT NULL,
  `file_order` int(10) DEFAULT NULL,
  `model` varchar(60) DEFAULT NULL,
  `exposuretime` varchar(60) DEFAULT NULL,
  `fnumber` varchar(60) DEFAULT NULL,
  `iso` varchar(60) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `width` int(20) DEFAULT NULL,
  `height` int(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;
