-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 06, 2019 at 02:07 AM
-- Server version: 5.7.22-0ubuntu0.17.10.1
-- PHP Version: 7.1.17-0ubuntu0.17.10.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mydatabase`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `name` text NOT NULL,
  `id` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `type` int(11) NOT NULL DEFAULT '0',
  `details` text,
  `urgency` int(11) NOT NULL DEFAULT '0',
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `completed` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`name`, `id`, `timestamp`, `type`, `details`, `urgency`, `start_date`, `end_date`, `completed`) VALUES
('Evento-1', 199, '2019-06-05 12:14:18', 1, 'prova', 3, '2019-06-05 14:18:00', '2019-06-08 14:18:00', 1),
('Evento-2', 200, '2019-06-05 12:40:49', 1, 'lala e lala', 3, '2019-06-05 14:40:00', '2019-06-08 14:18:00', 0),
('Evento-3', 205, '2019-06-05 17:44:59', 1, '', 3, '2019-06-02 18:45:00', '2019-06-05 22:51:00', 0),
('prova1', 207, '2019-06-05 20:57:42', 1, '', 3, '2019-06-02 21:57:00', '2019-06-06 00:15:00', 0),
('ngklre', 208, '2019-06-05 21:52:04', 1, '', 3, '2019-06-02 22:52:00', '2019-06-05 22:52:00', 1),
('dndndn', 209, '2019-06-05 23:17:02', 5, '', 3, '2019-06-05 22:16:00', '2019-06-06 00:17:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `events_old`
--

CREATE TABLE `events_old` (
  `name` text,
  `id` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `type` int(11) DEFAULT '0',
  `start_time` text,
  `end_time` text,
  `details` text,
  `urgency` int(11) NOT NULL DEFAULT '0',
  `start_date` varchar(20) NOT NULL,
  `end_date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events_old`
--

INSERT INTO `events_old` (`name`, `id`, `timestamp`, `type`, `start_time`, `end_time`, `details`, `urgency`, `start_date`, `end_date`) VALUES
('m', 82, '2019-05-16 14:18:39', 1, '01:00 AM', '01:30 AM', 'm', 1, '16/05/2019', '16/05/2019');

-- --------------------------------------------------------

--
-- Table structure for table `events_old_2`
--

CREATE TABLE `events_old_2` (
  `name` text,
  `id` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `type` int(11) DEFAULT '0',
  `start_time` text,
  `end_time` text,
  `details` text,
  `urgency` int(11) NOT NULL DEFAULT '0',
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events_old_2`
--

INSERT INTO `events_old_2` (`name`, `id`, `timestamp`, `type`, `start_time`, `end_time`, `details`, `urgency`, `start_date`, `end_date`) VALUES
('aiutok', 4, '2019-05-18 13:53:47', 1, NULL, NULL, 'asd', 3, '2019-05-18 15:53:00', '2019-05-21 15:53:00'),
('safff', 5, '2019-05-18 14:59:47', 2, NULL, NULL, 'asdafsdfff', 1, '2019-06-27 11:55:00', '2019-06-30 11:55:00'),
('aiuto', 6, '2019-05-18 15:37:43', 5, NULL, NULL, 'asfd', 1, '2019-05-14 17:37:00', '2019-05-18 21:37:00'),
('aiutolo', 7, '2019-05-18 15:55:09', 2, NULL, NULL, 'asdasdas', 1, '2019-05-16 17:54:00', '2019-05-18 18:56:00'),
('prova ', 8, '2019-05-18 15:59:13', 1, NULL, NULL, 'prova', 3, '2019-05-21 17:58:00', '2019-05-24 18:00:00'),
('hh', 11, '2019-05-18 18:46:41', 2, NULL, NULL, 'hhhhn', 1, '2019-05-18 22:47:00', '2019-05-19 16:18:00');

-- --------------------------------------------------------

--
-- Table structure for table `events_old_3`
--

CREATE TABLE `events_old_3` (
  `name` text,
  `id` int(11) NOT NULL,
  `date` text NOT NULL,
  `details` text,
  `urgency` int(11) DEFAULT '1',
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `start_event` varchar(20) DEFAULT NULL,
  `deadline` text,
  `end_event` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events_old_3`
--

INSERT INTO `events_old_3` (`name`, `id`, `date`, `details`, `urgency`, `timestamp`, `start_event`, `deadline`, `end_event`) VALUES
('Meeting aziendale', 13, '15/06/2019', 'Meeting dei Direttori e Segretari', 1, '2019-05-08 22:05:44', '15/06/2019', 'no', '15/06/2019'),
('evento', 55, '15/05/2019', 'dettagli', 1, '2019-05-10 07:01:38', '15/06/2019', 'no', '15/05/2019'),
(NULL, 58, '2019-05-30', '  nuovo evento', 1, '2019-05-10 09:22:38', NULL, NULL, NULL),
(NULL, 59, '2019-05-16', '  evento2', 1, '2019-05-10 09:43:41', NULL, NULL, NULL),
(NULL, 60, '2019-05-29', ' evento importante', 1, '2019-05-10 12:48:23', NULL, NULL, NULL),
(NULL, 61, '2019-05-18', '  jfjgf', 1, '2019-05-10 13:04:39', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `CF` varchar(16) DEFAULT NULL,
  `role` int(11) DEFAULT '1',
  `surname` text,
  `nation` varchar(20) DEFAULT NULL,
  `province` varchar(20) DEFAULT NULL,
  `city` varchar(20) DEFAULT NULL,
  `CAP` varchar(20) DEFAULT NULL,
  `street` varchar(20) DEFAULT NULL,
  `house_number` varchar(20) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `name` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `CF`, `role`, `surname`, `nation`, `province`, `city`, `CAP`, `street`, `house_number`, `email`, `phone_number`, `name`) VALUES
(19, 'RSSMAR3243435', 1, 'Rossi', 'Italia', 'UD', 'Udine', '33100', 'Roma', '37', 'mario.rossi@gmail.it', '333 555 7777', 'Mario'),
(20, 'STVHST1234566', 1, 'Stevanovska', 'Macedonia', 'EE', 'Ohrid', '6000', 'Marko Nestoroski', '134', 'kikaa.oh@hotmail.com', '393 725 1385', 'Hristina'),
(21, 'RCCMAR12321', 3, 'Ricci', 'Italia', 'UD', 'Udine', '33100', 'Manzini', '12', 'maria.ricci@gmail.it', '333 444 5555', 'Maria'),
(33, 'codice', 1, 'Markovski', 'Macedonia', 'EE', 'Ohrid', '6000', 'Marko Nestoroski', '222', 'vlatko@hotmail.com', '333 222 1111', 'Vlatko'),
(34, 'MIALTS1352281', 3, 'Loteska', 'Croazia', 'EE', 'Ohrid', '6000', 'Galicica', '1', 'mia.laki@hotmail.com', '3937251384', 'Mia'),
(35, 'VTRPTR34242334', 1, 'Petreska', 'Macedonia', 'OH', 'Ohrid', '6000', 'Zheleznichka ', '141', 'viktorijapetreska5@gmail.com', '39377', 'Viktorija'),
(36, 'FMSMRA732583', 2, 'Fumuso', 'Italy', 'TP', 'Alcamo', '91011', 'Antonio Cordici', '9', 'mauro.fumuso@gmail.it', '3935550000', 'Mauro'),
(37, 'asdasdsad', 1, 'Dal Cin', 'Australia', 'Victoria', 'Heidelberg West', '3083', '185 Southern Rd', 'asddsa', 'dalciosan@gmail.com', '449536127', 'Antonio');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD KEY `id` (`id`);

--
-- Indexes for table `events_old`
--
ALTER TABLE `events_old`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events_old_2`
--
ALTER TABLE `events_old_2`
  ADD KEY `id` (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `CF` (`CF`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=210;
--
-- AUTO_INCREMENT for table `events_old`
--
ALTER TABLE `events_old`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;
--
-- AUTO_INCREMENT for table `events_old_2`
--
ALTER TABLE `events_old_2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
