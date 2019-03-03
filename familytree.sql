-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 03, 2019 at 11:01 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `familytree`
--

-- --------------------------------------------------------

--
-- Table structure for table `person`
--

CREATE TABLE `person` (
  `id` int(11) NOT NULL,
  `firstname` text NOT NULL,
  `born_into_family` tinyint(1) NOT NULL,
  `lastname_maidenname` varchar(50) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `deathdate` date DEFAULT NULL,
  `birthplace` varchar(50) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `phone` bigint(25) DEFAULT NULL,
  `father` int(11) DEFAULT NULL,
  `mother` int(11) DEFAULT NULL,
  `spouse` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `person`
--

INSERT INTO `person` (`id`, `firstname`, `born_into_family`, `lastname_maidenname`, `birthdate`, `deathdate`, `birthplace`, `email`, `phone`, `father`, `mother`, `spouse`) VALUES
(1, 'William Dennis', 1, NULL, '1931-06-04', '2018-05-21', 'Nemiskam, Alberta, Canada', NULL, NULL, 21, NULL, 2),
(2, 'Delores', 0, NULL, NULL, NULL, 'Nemiskam, Alberta, Canada', NULL, NULL, NULL, NULL, 1),
(3, 'Beverly Allan', 1, NULL, '1952-11-25', '2016-04-23', 'Lethbridge, Alberta, Canada', NULL, NULL, 1, 2, 4),
(4, 'Cynthia', 0, 'Thompson', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3),
(5, 'Randy', 1, NULL, NULL, NULL, NULL, NULL, NULL, 1, 2, NULL),
(6, 'Dan', 1, NULL, NULL, NULL, NULL, NULL, NULL, 1, 2, NULL),
(7, 'Jason Shane', 1, NULL, NULL, NULL, NULL, NULL, NULL, 3, 4, 12),
(8, 'Ryan', 1, NULL, NULL, NULL, NULL, NULL, NULL, 3, 4, 18),
(9, 'Norma', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5),
(10, 'Jordan William', 1, NULL, '1997-07-01', NULL, 'Calgary, Alberta, Canada', 'jordanwbutterwick@gmail.com', 4038133173, 7, 12, NULL),
(11, 'Robert Daniel', 1, NULL, '1999-05-12', NULL, 'Calgary, Alberta, Canada', 'butterwick2@gmail.com', NULL, 7, 12, NULL),
(12, 'Heather Isabel', 0, 'Burns', '1972-02-04', NULL, NULL, 'butter@persona.ca', 4038147805, NULL, NULL, 7),
(13, 'Jamie', 1, 'Starner', NULL, NULL, NULL, NULL, NULL, 3, 4, 14),
(14, 'Jody', 0, 'Starner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 13),
(15, 'Jaxson', 1, 'Starner', NULL, NULL, NULL, NULL, NULL, 14, 13, NULL),
(16, 'Parker Quinn', 1, 'Starner', NULL, NULL, NULL, NULL, NULL, 14, 13, NULL),
(17, 'Preslee', 1, 'Starner', NULL, NULL, NULL, NULL, NULL, 14, 13, NULL),
(18, 'Angie ', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8),
(19, 'Taylor', 1, NULL, NULL, NULL, NULL, NULL, NULL, 8, 18, NULL),
(20, 'Hope Victoria', 1, NULL, '2007-07-02', NULL, NULL, NULL, NULL, 8, 18, NULL),
(21, 'Ashley C', 1, NULL, '1898-01-01', '1974-07-18', 'Norwich, City of Norwich, Norfolk, England', NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `person`
--
ALTER TABLE `person`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
