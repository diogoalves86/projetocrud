-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 12, 2014 at 07:41 AM
-- Server version: 5.5.37-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Dumping data for table `Admin`
--

INSERT INTO `Admin` (`id`, `name`, `email`, `login`, `password`) VALUES
(25, 'Diogo ALves Testr', 'diogoalves86@yahoo.com.br', 'novo', 'novo'),
(35, 'usuario2', 'usuario2@teste.com', 'usuario2', 'usuario2'),
(36, 'usuario 3', 'usuario3@teste.com', 'usuario3', 'usuario3'),
(38, 'usuario4', 'usuario4@teste.com', 'usuario4', 'usuario4');

-- --------------------------------------------------------

--
-- Table structure for table `Category`
--

CREATE TABLE IF NOT EXISTS `Category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `name` (`name`),
  KEY `name_2` (`name`),
  KEY `name_3` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `Category`
--

INSERT INTO `Category` (`id`, `name`) VALUES
(2, 'Cardiologia'),
(5, 'Nefrologia'),
(4, 'Neurologia'),
(1, 'Odontologia'),
(3, 'Ortopedia');

-- --------------------------------------------------------

--
-- Table structure for table `Doctor`
--

CREATE TABLE IF NOT EXISTS `Doctor` (
  `id` int(110) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `id_category` int(200) NOT NULL,
  `telephone` varchar(15) NOT NULL,
  `birthday` varchar(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `category` (`id_category`),
  KEY `id_category` (`id_category`),
  KEY `id_category_2` (`id_category`),
  KEY `id_category_3` (`id_category`),
  KEY `category_2` (`id_category`),
  KEY `id_category_4` (`id_category`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=54 ;

--
-- Dumping data for table `Doctor`
--

INSERT INTO `Doctor` (`id`, `name`, `id_category`, `telephone`, `birthday`) VALUES
(1, 'Medico 1', 2, '(21)2435-2134', '25-04-1890'),
(44, 'Medico2', 2, '(21)2533-4678', '22-02-1990'),
(49, 'Medico3', 4, '(21)2612-0989', '25-12-1973'),
(50, 'Medico4', 4, '(21)3254-7632', '21-04-1990'),
(53, 'Medico5', 1, '(21)2313-0403', '24-05-1976');

-- --------------------------------------------------------

--
-- Table structure for table `Exam`
--

CREATE TABLE IF NOT EXISTS `Exam` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cpf_patient` varchar(24) NOT NULL,
  `id_doctor` int(11) NOT NULL,
  `scheduled` varchar(10) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `id_patient` (`cpf_patient`),
  KEY `id_doctor` (`id_doctor`),
  KEY `crm_doctor` (`id_doctor`),
  KEY `id_doctor_2` (`id_doctor`),
  KEY `id_doctor_3` (`id_doctor`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=57 ;

--
-- Dumping data for table `Exam`
--

INSERT INTO `Exam` (`id`, `cpf_patient`, `id_doctor`, `scheduled`) VALUES
(54, '164.122.017-18', 44, '10-07-2014'),
(55, '164.122.017-19', 53, '20-08-2014'),
(56, '124.122.020-32', 44, '13-07-2014');

-- --------------------------------------------------------

--
-- Table structure for table `Patient`
--

CREATE TABLE IF NOT EXISTS `Patient` (
  `cpf` varchar(24) NOT NULL,
  `name` varchar(300) NOT NULL,
  `adress` varchar(400) NOT NULL,
  `birthday` varchar(15) NOT NULL,
  `telephone` varchar(20) NOT NULL,
  PRIMARY KEY (`cpf`),
  UNIQUE KEY `cpf` (`cpf`),
  KEY `cpf_2` (`cpf`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Patient`
--

INSERT INTO `Patient` (`cpf`, `name`, `adress`, `birthday`, `telephone`) VALUES
('', '', '', '', ''),
('111.111.111-11', 'Paciente 2', 'Rua do paciente 2', '24-04-1978', '(22)2222-2222'),
('124.122.020-32', 'Outro Paciente 2', 'Rua do Outro Paciente 2', '20-04-1995', '(21)3363-4221'),
('164.122.017-18', 'Diogo Alves', 'Rua Dias da Cruz', '25-03-1996', '(21)7906-3256'),
('164.122.017-19', 'Outro Paciente', 'Rua Dias da Cruzes', '25-03-1999', '(21)7806-3256'),
('222.222.222-22', 'Paciente 1', 'Rua do paciente 1', '08-05-1990', '(11)1111-1111'),
('949.393.958-98', 'Diogo ALves Testr', 'sddfefte', '99-49-3939', '(99)8932-9892');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Doctor`
--
ALTER TABLE `Doctor`
  ADD CONSTRAINT `fk_id` FOREIGN KEY (`id_category`) REFERENCES `Category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Exam`
--
ALTER TABLE `Exam`
  ADD CONSTRAINT `fk_cpf` FOREIGN KEY (`cpf_patient`) REFERENCES `Patient` (`cpf`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_doctor` FOREIGN KEY (`id_doctor`) REFERENCES `Doctor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
