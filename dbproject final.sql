-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2023 at 08:19 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `athlete`
--

CREATE TABLE `athlete` (
  `id` int(11) NOT NULL,
  `height` decimal(10,0) NOT NULL,
  `weight` decimal(10,0) NOT NULL,
  `teamID` int(11) NOT NULL,
  `position` varchar(50) NOT NULL,
  `dob` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `athlete`
--

INSERT INTO `athlete` (`id`, `height`, `weight`, `teamID`, `position`, `dob`) VALUES
(38, 179, 80, 2, 'Center-Back', '2003-09-10'),
(39, 176, 74, 3, 'Player', '2004-06-01'),
(42, 181, 67, 3, 'Player', '2003-01-19'),
(52, 183, 82, 1, 'Striker', '2003-03-05');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `bookingID` int(11) NOT NULL,
  `bookerID` int(11) NOT NULL,
  `courtID` int(11) NOT NULL,
  `sport` varchar(50) NOT NULL,
  `startTime` time NOT NULL,
  `endTime` time NOT NULL,
  `bookingDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`bookingID`, `bookerID`, `courtID`, `sport`, `startTime`, `endTime`, `bookingDate`) VALUES
(2, 35, 5, 'basketball', '00:30:00', '02:00:00', '2023-12-19'),
(3, 35, 9, 'tabletennis', '10:00:00', '23:00:00', '2023-12-19');

-- --------------------------------------------------------

--
-- Table structure for table `coach`
--

CREATE TABLE `coach` (
  `id` int(11) NOT NULL,
  `sport` varchar(50) NOT NULL,
  `inTeam` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `coach`
--

INSERT INTO `coach` (`id`, `sport`, `inTeam`) VALUES
(29, 'tabletennis', 1),
(50, 'football', 0),
(51, 'football', 1);

-- --------------------------------------------------------

--
-- Table structure for table `courts`
--

CREATE TABLE `courts` (
  `courtID` int(11) NOT NULL,
  `courtSport` varchar(50) NOT NULL,
  `courtSize` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courts`
--

INSERT INTO `courts` (`courtID`, `courtSport`, `courtSize`) VALUES
(1, 'football', 'small'),
(2, 'football', 'medium'),
(3, 'football', 'big'),
(4, 'basketball', 'half'),
(5, 'basketball', 'half'),
(6, 'basketball', 'standard'),
(7, 'tabletennis', 'standard'),
(8, 'tabletennis', 'standard'),
(9, 'tabletennis', 'standard');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `id` int(11) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `status` enum('s','m','c','a') NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `number` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `firstName`, `lastName`, `status`, `email`, `password`, `number`) VALUES
(21, 'Omar', 'Al Taki', 'm', 'omar.altaki1@lau.edu', '$2y$10$rSZ2LV2Tj7ssgq82fLOzset4VhO2YXRBvLuE6rEn9Pa0hC97J.VZW', 70064537),
(22, 'Haya', 'Al Taki', 'm', 'haya.altaki@lau.edu', '$2y$10$N8gDrwkExCj.2GbywTPUcekMcKzd1S/mES.M5tPPthJHIGpVf14t2', 81534658),
(24, 'Hana', 'Al Taki', 'c', 'hana.altaki@lau.edu', '$2y$10$EzuP2vfCg4eGQei5Q.cybeMuQ7lihDfw9T.otehnkBxTYLvcSzSHK', 81563214),
(26, 'Omar', 'Al Taki', 'm', 'omar5.altaki@lau.edu', '$2y$10$Cl0RHzCC2wQm4W7LoEGtYODP/RDAaS8oC9EayLhVT6jZQMHGejvmC', 70064537),
(27, 'Noor', 'Halabi', 's', 'noor.halabi@lau.edu', '$2y$10$Mo3kfwLWFB/XkjuZduGZdeALs6.KB/Gx0ilc38QzwVkgkusHlpRxm', 3424656),
(28, 'John', 'Doe', 'm', 'john.doe@lau.edu', '$2y$10$GHaMbhrRM7xm85HqZsrXF.Jd0PfPlvEd73RPq8vL7MClBe1Ft7y0.', 81756984),
(29, 'Wafic', 'Alayli', 'c', 'wafic.alayli@lau.edu', '$2y$10$71K6/a38kLgU4e7qU6AjHO1QMD0pd.jWzaRLQVGORw.cxrLTnIQQ6', 81234567),
(30, 'Jane', 'Doe', 's', 'jane.doe@lau.edu', '$2y$10$7Z/J.ftdVP1IiiBrmg.ExOb67PLDp9mSigz60q/OPE3n.Dzc81EDi', 81234789),
(31, 'Jane', 'Doe', 's', 'jane1.doe@lau.edu', '$2y$10$QF6o5nltn.jwzXVQHUB30umbo343IjeD4ydSTwTk1JIUFQTeqAWYS', 81234789),
(32, 'Jane', 'Doe', 's', 'jane2.doe@lau.edu', '$2y$10$Hs6wbiGoriN2syxJ/MsLA.gDyaMCR1FMcgGgwG0zD03JsNnF8Rkji', 81234789),
(33, 'Hadi', 'hariri', 's', 'hadi.hariri@lau.edu', '$2y$10$96aOingY74Qiiq7/Ss2/levlv0vcJq4RAIgnlW.NENEX1Cd41RZjy', 81452367),
(34, 'jameel', 'mughtasab', 's', 'jameel.mughtasab@lau.edu', '$2y$10$82uIVffSC0w4pGzoqHA/iOiYsoDfc0VvDqBz7pr722CwmFAG.RSOK', 81239789),
(35, 'Aam', 'Basam', 'm', '3am.bassam@lau.edu', '$2y$10$uwmDq.sF5bRXzAg2rZeGc.GJ8fY0kqnjMp/esGXXVp5MdriBKv6tG', 81456782),
(36, 'Mohammad', 'Sumbul', 's', 'mohammad.sumbul@lau.edu', '$2y$10$MNU8XYSv6bhkMErBB.9XRukcQ6aBF53z5sIWTWiAPq2LnTZ4n9iyG', 81245678),
(38, 'Mohammad', 'Shatila', 'a', 'mohammad.shatila@lau.edu', '$2y$10$f5SigBc6lO32oREkQHMVtupcpVhBKalIuWKqX0c5SA.scwYYAKYYu', 81656789),
(39, 'Ardag', 'Assadurian', 'a', 'ardag.assadurian@lau.edu', '$2y$10$BY44qo5r7FdFPCf3FJy4JOpilnjOvUrg8StWDGlE/lsuNJ8qmklme', 81452789),
(42, 'Mahmoud', 'Kibbeh', 'a', 'mahmoud.kibbeh@lau.edu', '$2y$10$zejvIN3NLUFwDwdAygetl.2teHTu1EidhLh26JGQMSgKjKILYKOVm', 81452367),
(43, 'Abed', 'Al Taki', 'c', 'abed.altaki@lau.edu', '$2y$10$3XS085vK.frJuYtreqxQI.JdMN4MFOOQZQmJTYpXtleud7B1FvEki', 70900109),
(44, 'Joe', 'Tekli', 'm', 'joe.tekli@lau.edu', '$2y$10$.07wIXOn.ZGoae4OkZhMmOrv0MfM9DCNQpdsHxm0M.AsF9ZUrA2/K', 81452783),
(46, 'Adam', 'Al Kotob', 'm', 'adam.alkotob@lau.edu', '$2y$10$WoVry9843Q.BMFPPSlg8besxyKktFWB4i7wRaurH/cHXGJGDEDqT2', 81256478),
(50, 'Yusuf', 'Kalash', 'c', 'yusuf.kalash@lau.edu', '$2y$10$BPDhaI.Obz8A/AtlL3KCXeBpDJzygp7Vtycm8D.kagjvr8b3pr2li', 81234785),
(51, 'Kamal', 'Al Taki', 'c', 'kamal.altaki@lau.edu', '$2y$10$i43IeXjJitEuu1.3ahKBwexYu5jFNJf/Fk/MfBM4kKKTqokrnvFGe', 81754235),
(52, 'Joey', 'Angelil', 'a', 'joey.angelil@lau.edu', '$2y$10$ZY003yNRUKeAvKf5h1EjFOjh.cja6OS/FI5HB1haydeUOWBrlw..O', 86321547);

-- --------------------------------------------------------

--
-- Table structure for table `sessionparticipation`
--

CREATE TABLE `sessionparticipation` (
  `sessionID` int(11) NOT NULL,
  `bookerID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sessionparticipation`
--

INSERT INTO `sessionparticipation` (`sessionID`, `bookerID`) VALUES
(2, 35);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `sessionID` int(11) NOT NULL,
  `coachID` int(11) NOT NULL,
  `court` enum('1','2','3','4','5','6','7','8','9') NOT NULL,
  `sport` varchar(50) NOT NULL,
  `startTime` time NOT NULL,
  `endTime` time NOT NULL,
  `sessionDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`sessionID`, `coachID`, `court`, `sport`, `startTime`, `endTime`, `sessionDate`) VALUES
(1, 51, '1', 'football', '13:30:00', '15:00:00', '2023-12-19'),
(2, 51, '1', 'football', '13:30:00', '15:00:00', '2023-12-19'),
(3, 29, '7', 'tabletennis', '18:00:00', '19:30:00', '2023-12-19'),
(4, 29, '8', 'tabletennis', '18:30:00', '20:00:00', '2023-12-19');

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `teamID` int(11) NOT NULL,
  `teamSport` varchar(255) NOT NULL,
  `coachID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`teamID`, `teamSport`, `coachID`) VALUES
(1, 'football team', 51),
(2, 'basketball team', 43),
(3, 'table tennis team', 29);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `athlete`
--
ALTER TABLE `athlete`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk3` (`teamID`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`bookingID`);

--
-- Indexes for table `coach`
--
ALTER TABLE `coach`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courts`
--
ALTER TABLE `courts`
  ADD PRIMARY KEY (`courtID`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `sessionparticipation`
--
ALTER TABLE `sessionparticipation`
  ADD KEY `fk6` (`sessionID`),
  ADD KEY `fk7` (`bookerID`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`sessionID`),
  ADD KEY `fk5` (`coachID`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`teamID`),
  ADD UNIQUE KEY `teamSport` (`teamSport`),
  ADD UNIQUE KEY `coachID` (`coachID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `bookingID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `courts`
--
ALTER TABLE `courts`
  MODIFY `courtID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `sessionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `teamID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `athlete`
--
ALTER TABLE `athlete`
  ADD CONSTRAINT `fk2` FOREIGN KEY (`id`) REFERENCES `registration` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk3` FOREIGN KEY (`teamID`) REFERENCES `teams` (`teamID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `coach`
--
ALTER TABLE `coach`
  ADD CONSTRAINT `fk4` FOREIGN KEY (`id`) REFERENCES `registration` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sessionparticipation`
--
ALTER TABLE `sessionparticipation`
  ADD CONSTRAINT `fk6` FOREIGN KEY (`sessionID`) REFERENCES `sessions` (`sessionID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk7` FOREIGN KEY (`bookerID`) REFERENCES `registration` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sessions`
--
ALTER TABLE `sessions`
  ADD CONSTRAINT `fk5` FOREIGN KEY (`coachID`) REFERENCES `registration` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `teams`
--
ALTER TABLE `teams`
  ADD CONSTRAINT `fk1` FOREIGN KEY (`coachID`) REFERENCES `registration` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
