-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 17, 2023 at 02:24 PM
-- Server version: 8.0.31
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ledenadministratie`
--
CREATE DATABASE IF NOT EXISTS `ledenadministratie` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `ledenadministratie`;

-- --------------------------------------------------------

--
-- Table structure for table `age_groups`
--

CREATE TABLE `age_groups` (
  `group_id` int NOT NULL,
  `group_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `group_description` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `discount` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `age_groups`
--

INSERT INTO `age_groups` (`group_id`, `group_name`, `group_description`, `discount`) VALUES
(1, 'Jeugd', 'Jonger dan 8 jaar', 50),
(2, 'Aspirant', '8 - 12 jaar', 40),
(3, 'Junioren', '13 - 17 jaar', 25),
(4, 'Senioren', '18 - 50 jaar', 0),
(5, 'Ouderen', 'Ouder dan 50 jaar', 45);

-- --------------------------------------------------------

--
-- Table structure for table `booking_years`
--

CREATE TABLE `booking_years` (
  `year_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking_years`
--

INSERT INTO `booking_years` (`year_id`) VALUES
(2010),
(2011),
(2012),
(2013),
(2014),
(2015),
(2016),
(2017),
(2018),
(2019),
(2020),
(2021),
(2022),
(2023);

-- --------------------------------------------------------

--
-- Table structure for table `contributions`
--

CREATE TABLE `contributions` (
  `contribution_id` int NOT NULL,
  `age` int NOT NULL,
  `group_id` int NOT NULL,
  `amount` float(100,2) DEFAULT NULL,
  `year_id` int NOT NULL,
  `member_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contributions`
--

INSERT INTO `contributions` (`contribution_id`, `age`, `group_id`, `amount`, `year_id`, `member_id`) VALUES
(1, 4, 1, 50.00, 2020, 1),
(2, 5, 1, 50.00, 2021, 1),
(3, 6, 1, 50.00, 2022, 1),
(4, 7, 1, 50.00, 2023, 1),
(5, 4, 1, 50.00, 2013, 8),
(6, 5, 1, 50.00, 2014, 8),
(7, 6, 1, 50.00, 2015, 8),
(8, 7, 1, 50.00, 2016, 8),
(9, 12, 2, 60.00, 2021, 8),
(10, 13, 3, 75.00, 2022, 8),
(11, 14, 3, 75.00, 2023, 8),
(12, 4, 1, 50.00, 2023, 9),
(13, 12, 2, 60.00, 2016, 17),
(14, 13, 3, 75.00, 2017, 17),
(15, 14, 3, 75.00, 2018, 17),
(16, 15, 3, 75.00, 2019, 17),
(17, 16, 3, 75.00, 2020, 17),
(18, 17, 3, 75.00, 2021, 17),
(19, 19, 4, 100.00, 2023, 17),
(20, 13, 3, 75.00, 2010, 21),
(21, 14, 3, 75.00, 2011, 21),
(22, 18, 4, 100.00, 2015, 21),
(23, 19, 4, 100.00, 2016, 21),
(24, 20, 4, 100.00, 2017, 21),
(25, 8, 2, 60.00, 2019, 27),
(26, 9, 2, 60.00, 2020, 27),
(27, 31, 4, 100.00, 2010, 30),
(28, 32, 4, 100.00, 2011, 30),
(29, 33, 4, 100.00, 2012, 30),
(30, 34, 4, 100.00, 2013, 30),
(31, 40, 4, 100.00, 2019, 30),
(32, 41, 4, 100.00, 2020, 30),
(33, 42, 4, 100.00, 2021, 30),
(34, 3, 1, 50.00, 2021, 41),
(35, 30, 4, 100.00, 2020, 49),
(36, 31, 4, 100.00, 2021, 49),
(37, 32, 4, 100.00, 2022, 49),
(38, 7, 1, 50.00, 2017, 54),
(39, 9, 2, 60.00, 2018, 55),
(40, 10, 2, 60.00, 2019, 55),
(41, 11, 2, 60.00, 2020, 55),
(42, 28, 4, 100.00, 2021, 56),
(43, 29, 4, 100.00, 2022, 56),
(44, 30, 4, 100.00, 2023, 56),
(45, 10, 2, 60.00, 2012, 57),
(46, 11, 2, 60.00, 2013, 57),
(47, 12, 2, 60.00, 2014, 57),
(48, 50, 4, 100.00, 2017, 58),
(49, 51, 5, 55.00, 2018, 58),
(50, 52, 5, 55.00, 2019, 58),
(51, 53, 5, 55.00, 2020, 58),
(52, 54, 5, 55.00, 2021, 58),
(53, 7, 1, 50.00, 2019, 60),
(54, 10, 2, 60.00, 2019, 62),
(55, 11, 2, 60.00, 2020, 62),
(56, 14, 3, 75.00, 2023, 62),
(57, 5, 1, 50.00, 2022, 63),
(58, 16, 3, 75.00, 2017, 64),
(59, 17, 3, 75.00, 2018, 64),
(60, 18, 4, 100.00, 2019, 64),
(61, 19, 4, 100.00, 2020, 64),
(62, 40, 4, 100.00, 2010, 65),
(63, 41, 4, 100.00, 2011, 65),
(64, 42, 4, 100.00, 2012, 65),
(65, 49, 4, 100.00, 2019, 65),
(66, 50, 4, 100.00, 2020, 65),
(67, 51, 5, 55.00, 2021, 65),
(68, 52, 5, 55.00, 2022, 65),
(69, 53, 5, 55.00, 2023, 65),
(70, 5, 1, 50.00, 2015, 66),
(71, 16, 3, 75.00, 2020, 67),
(72, 17, 3, 75.00, 2021, 67),
(73, 3, 1, 50.00, 2022, 82);

-- --------------------------------------------------------

--
-- Table structure for table `families`
--

CREATE TABLE `families` (
  `family_id` int NOT NULL,
  `surname` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `adress` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `families`
--

INSERT INTO `families` (`family_id`, `surname`, `adress`) VALUES
(1, 'Janssen', 'Hogestraat 234'),
(2, 'Hogeveen', 'Lieresstraat 20'),
(3, 'Kommara', 'Heilooveen 56'),
(5, 'Marnix', 'Hierzo 4'),
(6, 'Hormans', 'Kaneelbril 53'),
(7, 'Berkenrode', 'Berkenlaan 1'),
(10, 'Hosan', 'Herenlaan 23'),
(11, 'Huismus', 'Vissenstraat 1'),
(12, 'Beer', 'Berenlaan 98'),
(22, 'Melvin', 'Waarook 3'),
(23, 'Gertjes', 'Samson 32'),
(25, 'Hellmans', 'Richterstraat 433'),
(26, 'Doolaard', 'Herengracht 54'),
(27, 'Plemmer', 'Thuis 344');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `member_id` int NOT NULL,
  `name` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `birthday` date NOT NULL,
  `group_id` int NOT NULL,
  `family_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`member_id`, `name`, `birthday`, `group_id`, `family_id`) VALUES
(1, 'Hans', '2015-02-16', 2, 1),
(8, 'Boris', '2008-02-07', 3, 5),
(9, 'Herman', '2018-06-30', 1, 26),
(17, 'Fred', '2003-01-15', 4, 2),
(19, 'Thijs', '2002-07-19', 4, 3),
(21, 'Daniel', '1996-04-08', 4, 2),
(27, 'Ilse', '2010-02-10', 3, 1),
(30, 'Roy', '1978-05-17', 4, 27),
(41, 'Kelsey', '2017-02-01', 1, 1),
(49, 'Job', '1989-10-19', 4, 10),
(54, 'Kerel', '2009-02-01', 3, 6),
(55, 'Max', '2008-05-09', 3, 5),
(56, 'Nick', '1992-10-21', 4, 11),
(57, 'Beertje', '2001-11-01', 4, 12),
(58, 'Iker', '1966-11-01', 5, 25),
(60, 'Barry', '2012-01-01', 1, 6),
(62, 'Gert', '2008-10-01', 3, 23),
(63, 'Kitta', '2016-01-15', 1, 11),
(64, 'Brock', '2000-02-15', 4, 12),
(65, 'Jesse', '1969-11-13', 5, 5),
(66, 'Begamo', '2009-01-24', 3, 23),
(67, 'Joshua', '2003-06-01', 4, 7),
(82, 'Killian', '2018-02-13', 1, 26);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`) VALUES
(14, 'admin', '$2y$10$xc2PeFft03D/KahqhMaSpu1zbgo00edBHzYv/k.EVV5KOc7aQS85S');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `age_groups`
--
ALTER TABLE `age_groups`
  ADD PRIMARY KEY (`group_id`),
  ADD KEY `discount` (`discount`);

--
-- Indexes for table `booking_years`
--
ALTER TABLE `booking_years`
  ADD PRIMARY KEY (`year_id`);

--
-- Indexes for table `contributions`
--
ALTER TABLE `contributions`
  ADD PRIMARY KEY (`contribution_id`),
  ADD KEY `group_id` (`group_id`),
  ADD KEY `year` (`year_id`),
  ADD KEY `member_id` (`member_id`);

--
-- Indexes for table `families`
--
ALTER TABLE `families`
  ADD PRIMARY KEY (`family_id`),
  ADD KEY `surname` (`surname`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`member_id`),
  ADD KEY `family_id` (`family_id`),
  ADD KEY `group_id` (`group_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `age_groups`
--
ALTER TABLE `age_groups`
  MODIFY `group_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `contributions`
--
ALTER TABLE `contributions`
  MODIFY `contribution_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `families`
--
ALTER TABLE `families`
  MODIFY `family_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `member_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `contributions`
--
ALTER TABLE `contributions`
  ADD CONSTRAINT `contributions_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `age_groups` (`group_id`),
  ADD CONSTRAINT `contributions_ibfk_3` FOREIGN KEY (`member_id`) REFERENCES `members` (`member_id`),
  ADD CONSTRAINT `contributions_ibfk_4` FOREIGN KEY (`year_id`) REFERENCES `booking_years` (`year_id`);

--
-- Constraints for table `members`
--
ALTER TABLE `members`
  ADD CONSTRAINT `members_ibfk_2` FOREIGN KEY (`family_id`) REFERENCES `families` (`family_id`),
  ADD CONSTRAINT `members_ibfk_3` FOREIGN KEY (`group_id`) REFERENCES `age_groups` (`group_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
