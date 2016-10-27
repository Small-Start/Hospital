-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 29, 2016 at 07:24 PM
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
-- Table structure for table `doc_report`
--

CREATE TABLE IF NOT EXISTS `doc_report` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `p_id` varchar(10) NOT NULL,
  `sreport` longblob NOT NULL,
  `comment` varchar(1000) NOT NULL,
  `d_name` varchar(25) NOT NULL,
  `ddept` varchar(30) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `doc_report`
--

INSERT INTO `doc_report` (`id`, `p_id`, `sreport`, `comment`, `d_name`, `ddept`, `timestamp`) VALUES
(3, '3455667', 0x353663343930386264323363322e706e67, 'exercise regularly', 'DR Devender Sharma', 'Physiotherapy', '2016-04-29 23:56:16'),
(4, '3455667', 0x353663343930386264323363322e706e67, 'maintain blood pressure', 'DR. roopali das', 'cardiology', '2016-04-29 23:57:22');
