-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 22, 2020 at 08:17 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Home_Startup_DB`
--

-- --------------------------------------------------------

--
-- Table structure for table `History`
--

CREATE TABLE `History` (
  `Id` int(11) NOT NULL,
  `User_Id` int(11) NOT NULL,
  `Home_Id` int(11) NOT NULL,
  `Start_Date` text COLLATE utf8_persian_ci NOT NULL,
  `End_Date` text COLLATE utf8_persian_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Home`
--

CREATE TABLE `Home` (
  `Id` int(11) NOT NULL,
  `Title` text COLLATE utf8_persian_ci,
  `Phone` text COLLATE utf8_persian_ci,
  `Tax_Code` text COLLATE utf8_persian_ci,
  `Meters` text COLLATE utf8_persian_ci,
  `Price_Money` text COLLATE utf8_persian_ci,
  `Image` text COLLATE utf8_persian_ci,
  `Area` text COLLATE utf8_persian_ci,
  `City` text COLLATE utf8_persian_ci,
  `Parking` int(11) DEFAULT NULL,
  `Anbar` int(11) DEFAULT NULL,
  `Type_Id` int(11) DEFAULT NULL,
  `Document_Image` text COLLATE utf8_persian_ci,
  `Address` text COLLATE utf8_persian_ci,
  `Enable_User` int(11) DEFAULT NULL,
  `Done_User_Id` int(11) NOT NULL,
  `Start_Date` text COLLATE utf8_persian_ci NOT NULL,
  `Start_Time` text COLLATE utf8_persian_ci NOT NULL,
  `Is_Pay_Money` text COLLATE utf8_persian_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Home_Types`
--

CREATE TABLE `Home_Types` (
  `Id` int(11) NOT NULL,
  `Name` varchar(255) COLLATE utf8_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Log_History`
--

CREATE TABLE `Log_History` (
  `Id` int(11) NOT NULL,
  `User_Id` int(11) NOT NULL,
  `Date` text COLLATE utf8_persian_ci NOT NULL,
  `Time` text COLLATE utf8_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Search_History`
--

CREATE TABLE `Search_History` (
  `Id` int(11) NOT NULL,
  `User_Id` int(11) NOT NULL,
  `Search_Value` text COLLATE utf8_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `User`
--

CREATE TABLE `User` (
  `Id` int(11) NOT NULL,
  `Name` text COLLATE utf8_persian_ci NOT NULL,
  `Family` text COLLATE utf8_persian_ci NOT NULL,
  `National_Id` text COLLATE utf8_persian_ci NOT NULL,
  `National_Card` text COLLATE utf8_persian_ci NOT NULL,
  `Phone` text COLLATE utf8_persian_ci NOT NULL,
  `Birth_Day` text COLLATE utf8_persian_ci NOT NULL,
  `User_Image` text COLLATE utf8_persian_ci NOT NULL,
  `Area` text COLLATE utf8_persian_ci NOT NULL,
  `City` text COLLATE utf8_persian_ci NOT NULL,
  `Job` text COLLATE utf8_persian_ci NOT NULL,
  `Address` text COLLATE utf8_persian_ci NOT NULL,
  `User_Type` int(11) NOT NULL,
  `Enabled` int(11) NOT NULL,
  `Done_User_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `User_Types`
--

CREATE TABLE `User_Types` (
  `Id` int(11) NOT NULL,
  `Name` varchar(255) CHARACTER SET utf32 COLLATE utf32_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `History`
--
ALTER TABLE `History`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `User_Id__` (`User_Id`);

--
-- Indexes for table `Home`
--
ALTER TABLE `Home`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Home_Id` (`Type_Id`);

--
-- Indexes for table `Home_Types`
--
ALTER TABLE `Home_Types`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `Log_History`
--
ALTER TABLE `Log_History`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `User_Id_` (`User_Id`);

--
-- Indexes for table `Search_History`
--
ALTER TABLE `Search_History`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `User_Id` (`User_Id`);

--
-- Indexes for table `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `User_Type` (`User_Type`);

--
-- Indexes for table `User_Types`
--
ALTER TABLE `User_Types`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `History`
--
ALTER TABLE `History`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Home`
--
ALTER TABLE `Home`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Home_Types`
--
ALTER TABLE `Home_Types`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Log_History`
--
ALTER TABLE `Log_History`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Search_History`
--
ALTER TABLE `Search_History`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `User`
--
ALTER TABLE `User`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `User_Types`
--
ALTER TABLE `User_Types`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `History`
--
ALTER TABLE `History`
  ADD CONSTRAINT `User_Id__` FOREIGN KEY (`User_Id`) REFERENCES `User` (`Id`) ON DELETE NO ACTION;

--
-- Constraints for table `Home`
--
ALTER TABLE `Home`
  ADD CONSTRAINT `Home_Id` FOREIGN KEY (`Type_Id`) REFERENCES `Home_Types` (`Id`) ON DELETE NO ACTION;

--
-- Constraints for table `Log_History`
--
ALTER TABLE `Log_History`
  ADD CONSTRAINT `User_Id_` FOREIGN KEY (`User_Id`) REFERENCES `User` (`Id`) ON DELETE NO ACTION;

--
-- Constraints for table `Search_History`
--
ALTER TABLE `Search_History`
  ADD CONSTRAINT `User_Id` FOREIGN KEY (`User_Id`) REFERENCES `User` (`Id`) ON DELETE NO ACTION;

--
-- Constraints for table `User`
--
ALTER TABLE `User`
  ADD CONSTRAINT `User_Type` FOREIGN KEY (`User_Type`) REFERENCES `User_Types` (`Id`) ON DELETE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
