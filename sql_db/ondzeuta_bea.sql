-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 07, 2019 at 08:27 PM
-- Server version: 5.6.43
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ondzeuta_bea`
--

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `event_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(300) NOT NULL,
  `image` text,
  `date` date NOT NULL,
  `time` text,
  `location` text NOT NULL,
  `type` varchar(20) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `deleted_by` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` date DEFAULT NULL,
  `deleted` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`event_id`, `name`, `description`, `image`, `date`, `time`, `location`, `type`, `created_by`, `updated_by`, `deleted_by`, `created`, `updated`, `deleted`) VALUES
(1, 'John Oliver does a UTA Talk', 'Some description', 'header.jpg', '2019-05-24', '2:00 PM - 5: 45 PM', 'Blue Bonnet Theatre', 'event', 2, 0, 7, '2019-05-06 22:58:06', NULL, '2019-05-07'),
(2, 'Another Event', 'fadsfadf', '_1557183652.png', '2019-05-17', '2:00 PM - 5: 45 PM', 'Blue Bonnet Theatre', 'meeting', 2, 0, 7, '2019-05-06 23:00:52', NULL, '2019-05-07'),
(3, 'adsfadsf', 'adfadsfa', '_1557183896.png', '2019-05-25', '2:00 PM - 5: 45 PM', 'Blue Bonnet Theatre', 'event', 2, 0, 7, '2019-05-06 23:04:56', NULL, '2019-05-07'),
(4, 'adsfadsf', 'adfadsfa', 'adsfadsf_1557183990.png', '2019-05-25', '2:00 PM - 5: 45 PM', 'Blue Bonnet Theatre', 'event', 2, 0, 7, '2019-05-06 23:06:30', NULL, '2019-05-07'),
(5, 'Some Event 1', 'adsfasdfasdf', '__1557186934.png', '2019-05-30', '2:00 PM - 5: 45 PM', 'Blue Bonnet Theatre', 'meeting', 3, 3, 7, '2019-05-06 23:51:49', NULL, '2019-05-07');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `bio` text,
  `major` varchar(100) DEFAULT NULL,
  `user_name` varchar(100) NOT NULL,
  `password` varchar(80) NOT NULL,
  `email` varchar(100) NOT NULL,
  `group_id` int(5) NOT NULL,
  `title` varchar(45) NOT NULL,
  `image` text,
  `start_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `end_date` date DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` date DEFAULT NULL,
  `deleted` date DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `bio`, `major`, `user_name`, `password`, `email`, `group_id`, `title`, `image`, `start_date`, `end_date`, `created`, `updated`, `deleted`, `created_by`, `deleted_by`, `updated_by`) VALUES
(9, 'Kimberly', 'Barroteran', 'Kimberly enjoys soccer.BEA has played a huge role in her college career and connections.', 'Broadcasting', 'kimberly_b', '$2y$10$QQLyLcsj/gImun8zTnR9e.w2zLeXxoz/sRS5lju6iMn7Iue6XreWa', 'kimberly.barroteran@mavs.uta.edu', 2, 'Vice President', 'Kimberly_Barroteran_1557254537.jpg', '2019-05-07 18:42:16', '2019-11-07', '2019-05-07 18:42:16', NULL, NULL, 6, NULL, NULL),
(8, 'Cassie', 'Munoz', 'Cassie has been a member for BEA UTA for 2 years. Now holding the President position.', 'Broadcasting', 'cassie_munoz', '$2y$10$pnJrjp4L.Q/dR8ReEMlXn./yqHODSw/m4PwRl/e.HBim54kfT/cuu', 'cassie.munoz@mavs.uta.edu', 2, 'President', 'Cassie_Munoz_1557254370.jpg', '2019-05-07 18:39:29', '2019-11-07', '2019-05-07 18:39:29', NULL, NULL, 6, NULL, NULL),
(7, 'Jefferson', 'Ondze Mangha', 'Jefferson is a CTEC student and will be an admin for this website.', 'Communication Tech', 'jeffersonondze', '$2y$10$meZOoRKG2VcGgRiyRThZK.xT/DJUfb7QQ.d2H45H.zxUOmDJL5hOK', 'jefferson.ondzemangha@mavs.uta.edu', 0, 'Admin', 'Jefferson_Ondze_Mangha_1557245903.jpg', '2019-05-07 16:11:37', '2019-11-07', '2019-05-07 16:11:37', NULL, NULL, 2, 6, 2),
(6, 'Karla', 'Valdez', 'Karla is a CTEC Student and will be the super admin for this site.', 'Communication Tech', 'karla_valdez', '$2y$10$JS/HlOu1H2/vxCtQKZ.5XOVanMCgAXblw/5FuRhQROwgZikjamPtu', 'karla.valdez@uta.edu', 0, 'Admin', 'Karla_Valdez_1557249700.jpg', '2019-05-07 16:08:06', '2019-11-07', '2019-05-07 16:08:06', NULL, NULL, 2, NULL, 6),
(10, 'Mark', 'Castloo', 'Mark is a freshman and is ready to take on his role as Secretary for the 2019 -2020 school year.', 'Broadcasting', 'mark_castloo', '$2y$10$kyAxa/muZ/ew/joXeIhJAuot9Zg46g6bql16QVI7A5S21yrHccdIa', 'mark.castloo@mavs.uta.edu', 2, 'Secretary', 'Mark_Castloo_1557254784.jpg', '2019-05-07 18:46:24', '2019-11-07', '2019-05-07 18:46:24', NULL, NULL, 6, NULL, NULL),
(11, 'Jackilyn', 'Reininga', 'Jacky is very excited and ambitious to promote the BEA chapter through social media, radio, and broadcasting. She says the website will be a hit.', 'Broadcasting', 'jacky_reininga', '$2y$10$cpZ6tt8hWiu5O5B..lTFVux8ZoZbTlyt6gQb2LVGYuV0lCHTkZaDm', 'jackilyn.reininga@mavs.uta.edu', 2, 'PR Chair', 'Jackilyn_Reininga_1557255028.jpg', '2019-05-07 18:50:28', '2019-11-07', '2019-05-07 18:50:28', NULL, NULL, 6, NULL, NULL),
(12, 'LaDonna', 'Aiken', 'LaDonna Aiken is a broadcasting legend. She has been the advisor for  BEA UTA Chapter for five years now always going above and beyond her duties.', 'Broadcasting', 'ladonna_aiken', '$2y$10$7NhEZI3JX5jJJIi9HwLqNORyBB/ICx6bmw.27t8PDwnQnMwWyD4rS', 'laiken@uta.edu', 2, 'Advisor', 'LaDonna_Aiken_1557255272.jpeg', '2019-05-07 18:54:31', '2019-11-07', '2019-05-07 18:54:31', NULL, NULL, 6, NULL, 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`event_id`),
  ADD UNIQUE KEY `event_id_UNIQUE` (`event_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_name` (`user_name`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
