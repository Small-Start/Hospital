-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 22, 2015 at 03:08 AM
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
  `gender` text NOT NULL,
  `dob` text NOT NULL,
  `disease` varchar(40) NOT NULL,
  `p_file` longblob NOT NULL,
  `ph_name` varchar(40) NOT NULL,
  `sreport` longblob NOT NULL,
  `comment` varchar(1000) NOT NULL,
  `status` mediumtext NOT NULL,
  `d_name` varchar(25) NOT NULL,
  `ddept` varchar(30) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`p_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient_file`
--

INSERT INTO `patient_file` (`p_id`, `p_name`, `gender`, `dob`, `disease`, `p_file`, `ph_name`, `sreport`, `comment`, `status`, `d_name`, `ddept`, `timestamp`) VALUES
('24342', 'prabhat singh', 'Male', '25-10-1991', 'hernia', 0x53616d706c655f5265706f72745f4c756d6261725f5370696e652e706466, ' Rural Health Training Centre', 0x707265736372697074696f6e3030312e6a7067, 'Eat less...', 'Active', 'DR. Pankaj Singh', 'NEUROLOGY', '2015-11-22 08:28:02'),
('23443654', 'Aman Verma', 'Male', '15-04-1975', 'cloting', 0x53616d706c655f5265706f72745f4c6566745f4b6e65652e706466, 'Janchetna Hospital', '', '', 'Pending', '', '', '2015-11-22 08:06:38'),
('12312', 'sheela dixit', 'Female', '97-07-1988', 'Dengue', 0x785261795f302e6a7067, 'Janchetna Hospital', '', '', 'Pending', '', '', '2015-11-22 08:04:45'),
('12415', 'shiv verma', 'Male', '09-09-1999', 'dengue', 0x6563675f31326c6561643031322e676966, ' Rao tula ram hospital', '', '', 'Pending', '', '', '2015-11-22 08:02:06'),
('345666', 'Ram Kumar', 'Male', '09-05-1990', 'bone fracture', 0x785261795f30332e4a5047, ' Rao tula ram hospital', '', '', 'Pending', '', '', '2015-11-22 06:12:17'),
('325244', 'Mohan yadav', 'Male', '23-12-1988', 'malaria', 0x505245534352495054494f4e20464f524d2052696368696520427261636520526576204465632032303130642e646f63, ' Rao tula ram hospital', '', '', 'Pending', '', '', '2015-11-22 06:27:05');
