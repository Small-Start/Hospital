-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 19, 2015 at 10:18 AM
-- Server version: 5.1.36
-- PHP Version: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `healthcare`
--

-- --------------------------------------------------------

--
-- Table structure for table `user_primary`
--

CREATE TABLE IF NOT EXISTS `user_primary` (
  `username` varchar(40) NOT NULL,
  `address` varchar(80) NOT NULL,
  `mhosname` varchar(30) NOT NULL,
  `password` varchar(40) NOT NULL,
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_primary`
--

INSERT INTO `user_primary` (`username`, `address`, `mhosname`, `password`) VALUES
('janchetna', 'xyz,abc road,new delhi', 'CGHS Hospital', 'abc123'),
(' rao tula ram hospital', 'Jaffarpur Kalan, New Delhi', 'Safdarjung Hospital', 'abc123'),
(' Rural Health Training Centre', 'Najafgarh, New Delhi', 'Safdarjung Hospital', 'abc123'),
('DEEPAN HOSPITAL', 'Kapashera Village, New Delhi', 'Safdarjung Hospital', 'abc123');
