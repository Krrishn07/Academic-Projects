-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 29, 2019 at 08:17 PM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `trial`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `Id` int(4) NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`Id`, `Username`, `Password`) VALUES
(100, 'root', 'root');


-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `Name` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`Name`) VALUES
('Bangalore'),
('Chennai'),
('Delhi'),
('Dubai'),
('Goa'),
('Iceland'),
('Italy'),
('Kolkata'),
('Kullu Manali'),
('London'),
('Maldives'),
('Miami'),
('Mumbai'),
('Nepal'),
('New York'),
('Switzerland');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `Name` text NOT NULL,
  `Contact` bigint(10) NOT NULL,
  `Email` varchar(20) NOT NULL,
  `Message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`Name`, `Contact`, `Email`, `Message`) VALUES
('Ashwaqulla Baig', 6985214554, 'ashwaq011@gmail.com', 'Helpful & User-friendly!'),
('Asha K', 7584444369, 'asha010@gmail.com', 'Enjoyed!'),
('Ananya R', 9009788542, 'ananya003@gmail.com', 'Best Policy!');
('Bal Kishan Reddy', 6525241894, 'bkrreddy07@gmail.com', 'Flamboyant!'),

-- --------------------------------------------------------

--
-- Table structure for table `flights`
--

CREATE TABLE `flights` (
  `Id` int(11) NOT NULL,
  `Name` text NOT NULL,
  `Source` text NOT NULL,
  `Destination` text NOT NULL,
  `Departure` date NOT NULL,
  `Arrival` date NOT NULL,
  `Fair_Economic` int(11) NOT NULL,
  `Fair_Business` int(11) NOT NULL,
  `Available_seats` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `flights`
--

INSERT INTO `flights` (`Id`, `Name`, `Source`, `Destination`, `Departure`, `Arrival`, `Fair_Economic`, `Fair_Business`, `Available_seats`) VALUES
(101, 'Emirates', 'Bangalore', 'Dubai', '2022-03-26', '2022-04-01', 12000, 24000, 44),
(102, 'Emirates', 'Delhi', 'Italy', '2022-03-26', '2022-04-25', 25000, 50000, 22),
(107, 'SpiceJet', 'Bangalore', 'Delhi', '2022-03-26', '2022-04-08', 4000, 8000, 60),
(500, 'GoAir', 'Bangalore', 'Chennai', '2022-03-26', '2022-03-27', 3500, 7000, 50),
(786, 'Indigo', 'Delhi', 'Bangalore', '2022-03-26', '2022-03-30', 3000, 5500, 48),
(1001, 'Indigo', 'Bangalore', 'Delhi', '2022-03-26', '2022-03-30', 3500, 6000, 43),
(2120, 'Emirates', 'Bangalore', 'Switzerland', '2022-03-26', '2022-05-07', 30000, 55000, 25);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserId` int(4) NOT NULL,
  `FirstName` text NOT NULL,
  `LastName` text NOT NULL,
  `MobileNo` bigint(10) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Flight_Id` int(11) NOT NULL,
  `Seats_booked` int(11) NOT NULL,
  `Total_Cost` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserId`, `FirstName`, `LastName`, `MobileNo`, `Email`, `Flight_Id`, `Seats_booked`, `Total_Cost`) VALUES
(110, 'Ashwaqulla', 'Baig', 6985214554, 'ashwaq011@gmail.com', 101, 1, 48000),
(199, 'Asha', 'K', 7584444369, 'asha010@gmail.com', 500, 4, 14000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD UNIQUE KEY `Name` (`Name`);

--
-- Indexes for table `flights`
--
ALTER TABLE `flights`
  ADD UNIQUE KEY `Id` (`Id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserId`),
  ADD KEY `Flight_Id` (`Flight_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `Id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserId` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`Flight_Id`) REFERENCES `flights` (`Id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
