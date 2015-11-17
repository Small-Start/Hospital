-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 17, 2015 at 05:04 PM
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
-- Table structure for table `patient_file`
--

CREATE TABLE IF NOT EXISTS `patient_file` (
  `p_id` varchar(10) NOT NULL,
  `p_name` varchar(30) NOT NULL,
  `p_file` longblob NOT NULL,
  PRIMARY KEY (`p_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient_file`
--

INSERT INTO `patient_file` (`p_id`, `p_name`, `p_file`) VALUES
('cghvhv', 'fbfbdfb', 0x6a65616e7061756c7373636f72652e676966),
('fdtfyt', 'drftyu', 0x6a65616e7061756c7373636f72652e676966),
('xccvgv', 'cghvhv', 0x64626d73206c6162322e646f6378),
('hfghhj', 'dgf', 0x3136322d537465656c792e646f6378),
('fgyyy', 'dfhgvh', 0x70657a7373636f72652e676966);
