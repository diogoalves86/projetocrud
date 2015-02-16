-- phpMyAdmin SQL Dump
-- version 4.1.13
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 23, 2014 at 03:51 PM
-- Server version: 5.5.37-0ubuntu0.12.04.1
-- PHP Version: 5.3.10-1ubuntu3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ProjetoCrud`
--

-- --------------------------------------------------------

--
-- Table structure for table `Admin`
--

CREATE TABLE IF NOT EXISTS `Admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(300) NOT NULL,
  `email` varchar(200) NOT NULL,
  `login` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `Admin`
--

INSERT INTO `Admin` (`id`, `name`, `email`, `login`, `password`) VALUES
(16, 'Diogo', 'diogo', 'diogo', 'diogo'),
(20, 'kk', 'kkk', 'kkkkk', 'k'),
(21, 'haaahahahahaah', 'hahahahaah', 'hahaahhah', 'hahaahaahah'),
(22, 'haaahahahahaah', 'hahahahaah', 'hahaahhah', 'hahaahaahah'),
(23, 'novo', 'novo', 'novo', 'novo'),
(24, 'Teste', 'Teste@teste.com', 'jsjsj', 'kkk');

-- --------------------------------------------------------

--
-- Table structure for table `Doctor`
--

CREATE TABLE IF NOT EXISTS `Doctor` (
  `crm` int(20) NOT NULL,
  `name` varchar(200) NOT NULL,
  `telephone` varchar(12) NOT NULL,
  `birthday` date NOT NULL,
  PRIMARY KEY (`crm`),
  UNIQUE KEY `CRM` (`crm`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Doctor`
--

INSERT INTO `Doctor` (`crm`, `name`, `telephone`, `birthday`) VALUES
(12344, 'kkkk', 'kkkk', '2014-04-02');

-- --------------------------------------------------------

--
-- Table structure for table `Exam`
--

CREATE TABLE IF NOT EXISTS `Exam` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cpf_patient` int(11) NOT NULL,
  `crm_doctor` int(11) NOT NULL,
  `scheduled` date NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `id_patient` (`cpf_patient`),
  KEY `id_doctor` (`crm_doctor`),
  KEY `crm_doctor` (`crm_doctor`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `Exam`
--

INSERT INTO `Exam` (`id`, `cpf_patient`, `crm_doctor`, `scheduled`) VALUES
(1, 766, 12344, '2014-04-11'),
(2, 8999, 12344, '2014-04-22');

-- --------------------------------------------------------

--
-- Table structure for table `Patient`
--

CREATE TABLE IF NOT EXISTS `Patient` (
  `cpf` int(11) NOT NULL,
  `name` varchar(300) NOT NULL,
  `convenio` varchar(200) NOT NULL,
  `adress` varchar(400) NOT NULL,
  `birthday` date NOT NULL,
  `telephone` varchar(20) NOT NULL,
  PRIMARY KEY (`cpf`),
  UNIQUE KEY `cpf` (`cpf`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Patient`
--

INSERT INTO `Patient` (`cpf`, `name`, `convenio`, `adress`, `birthday`, `telephone`) VALUES
(766, 'jjjjjjj', 'jjjjjjjj', 'jjjjjj', '2014-04-17', 'jjjjjjj'),
(8999, 'iijjhhh', 'hghghgh', 'hghghghg', '2014-04-22', 'hhghghg');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Exam`
--
ALTER TABLE `Exam`
  ADD CONSTRAINT `cpf` FOREIGN KEY (`cpf_patient`) REFERENCES `Patient` (`cpf`),
  ADD CONSTRAINT `Exam_ibfk_1` FOREIGN KEY (`crm_doctor`) REFERENCES `Doctor` (`crm`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
