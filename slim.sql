-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 07, 2015 at 11:00 PM
-- Server version: 5.5.41-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `slim`
--

-- --------------------------------------------------------

--
-- Table structure for table `api_users`
--

CREATE TABLE IF NOT EXISTS `api_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `api_token` varchar(60) NOT NULL,
  `expired_time` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `api_users`
--

INSERT INTO `api_users` (`id`, `user_id`, `api_token`, `expired_time`) VALUES
(3, 1, 'de6f80f88e270a536424e5ca4ed4c2', '1423303087'),
(4, 1, 'ae27f528651810951ea80d7c5c954a35', '1423303152'),
(5, 1, '8e620662032835b7fffb4a53557d0c15', '1423304493'),
(6, 4, 'e1a53d9345d7e14a9d9e4df4766acf84', '1423327448'),
(7, 4, 'b1a99879600c69d4ee40711a8ddd5398', '1423327462'),
(8, 6, '8a9f2a80c2a729194c24cf62dfdf8b54', '1423327882'),
(9, 6, '42cae4d93b43db1f9cd41872e4a34600', '1423328050'),
(10, 6, '1d1eb1be83de5635db8bc1a45f22645b', '1423328072'),
(11, 6, '235010b0dcc7a322feb01250f5d536f1', '1423328131'),
(12, 6, '9e17da1f7e454e7da792f7e3cade9275', '1423328223'),
(13, 6, '1ab78fe2a829f3167a967c48bc488aee', '1423328246'),
(14, 6, 'af473f16aab9d4110c1a1244b0520ce4', '1423328277'),
(15, 6, '8a6b3b1759c44272b40369e9145d6332', '1423328290'),
(16, 6, '39951d9e316eafcdc8d84fed066ca6fb', '1423328339'),
(17, 6, '734c76c133fccaac3ef0ec8092fdc7c2', '1423328358'),
(18, 6, 'e9f9b7b5e89704f4b0cd1ebc11e406c7', '1423328492'),
(19, 6, '3081296669d35378b769b26db310af3a', '1423328589'),
(20, 6, '6132cabbf6459b427d539d17e4d5bdc4', '1423328590'),
(21, 6, 'e38aace5faf87909e5a5d0cfc84fa7ee', '1423328603'),
(22, 6, '1d78d34b2b5dbfa93a905a20c0c769cd', '1423328605');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `email` varchar(35) NOT NULL,
  `password` varchar(50) NOT NULL,
  `api_key` varchar(80) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `api_key`) VALUES
(1, 'user1', 'user1@gmail.com', '24c9e15e52afc47c225b757e7bee1f9d', '39081345a40a01f32ceb885b2b1bbef5'),
(2, 'user', 'user@gmail.com', 'ee11cbb19052e40b07aac0ca060c23ee', '988b75c1f98644f862d2aa125e9223ea'),
(3, 'name', 'email@gmail.com', '662f707d5491e9bce8238a6c0be92190', 'b068931cc450442b63f5b3d276ea4297'),
(4, 'user', 'email@gmail.com', 'ee11cbb19052e40b07aac0ca060c23ee', 'ee11cbb19052e40b07aac0ca060c23ee'),
(5, 'name2', 'email@gmail.com', '47bce5c74f589f4867dbd57e9ca9f808', '5a7fcd4f1c785c8ef4931a5a9c698ac0'),
(6, 'user5', 'email@gmail.com', '3c5c7ef80bf7defa378f561073d3ec43', 'b61af1e69fdd8b55cc199799d0e1fcaa');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
