-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: sql2.njit.edu
-- Generation Time: Apr 18, 2017 at 01:58 AM
-- Server version: 5.5.29-log
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `rlc9`
--

-- --------------------------------------------------------

--
-- Table structure for table `p4Data`
--

CREATE TABLE IF NOT EXISTS `p4Data` (
  `username1` text NOT NULL,
  `password1` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `p4Data`
--

INSERT INTO `p4Data` (`username1`, `password1`) VALUES
('abc1', 'qwer1'),
('abc2', 'qwer2'),
('abc3', 'qwer3'),
('abc4', 'qwer4'),
('abc5', 'qwer5'),
('abc6', 'qwer6'),
('abc7', 'qwer7'),
('abc8', 'qwer8'),
('abc9', 'qwer9'),
('def1', 'asd1'),
('def2', 'asd2'),
('def3', 'asd3'),
('def4', 'asd4'),
('def5', 'asd5'),
('def6', 'asd6'),
('def7', 'asd7'),
('def8', 'asd8'),
('def9', 'asd9'),
('ghi1', 'zxc1'),
('ghi2', 'zxc2'),
('ghi3', 'zxc3'),
('ghi4', 'zxc4'),
('ghi5', 'zxc5'),
('ghi6', 'zxc6'),
('ghi7', 'zxc6'),
('ghi8', 'zxc8'),
('ghi9', 'zxc9'),
('jkl1', 'qaz1'),
('jkl2', 'qaz2'),
('jkl3', 'qaz3');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
