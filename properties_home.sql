-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2023 at 03:52 PM
-- Server version: 8.0.29
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `properties_home`
--


DROP DATABASE IF EXISTS properties_home;
CREATE DATABASE properties_home;
USE properties_home;

-- --------------------------------------------------------

--
-- Table structure for table `applicationstatus`
--

CREATE TABLE `applicationstatus` (
  `id` int NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `applicationstatus`
--

INSERT INTO `applicationstatus` (`id`, `status`) VALUES
(1, 'Accepted'),
(2, 'Declined'),
(3, 'under consideration');

-- --------------------------------------------------------

--
-- Table structure for table `homeowner`
--

CREATE TABLE `homeowner` (
  `id` int NOT NULL,
  `name` varchar(30) NOT NULL,
  `phone_number` int NOT NULL,
  `email_address` varchar(70) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `homeowner`
--

INSERT INTO `homeowner` (`id`, `name`, `phone_number`, `email_address`, `password`) VALUES
(1, 'Sarah', 538584757, 'sarah@gmail.com', '$2y$10$HRoSHUYviiqvlAPaPp4Xc.ucfW0i34VlAdbdQC5Z26DBAE6OpdLIW'),
(2, 'Dana', 5483746, 'dana@gmail.com', '$2y$10$1K1ivHxZjsXwcX42P1Bbou09T8JQUAWUerNlCzhbVPeYVPRMLDLmG'),
(3, 'Salah', 576435432, 'salah@gmail.com', '$2y$10$PS3oo8D/nqcttfTbbHAAk.Tl4uoUU8sf.HNlnD2uJ2vVdOuLdWpBe');

-- --------------------------------------------------------

--
-- Table structure for table `homeseeker`
--

CREATE TABLE `homeseeker` (
  `id` int NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `age` int NOT NULL,
  `family_members` int NOT NULL,
  `income` int NOT NULL,
  `job` varchar(40) NOT NULL,
  `phone_number` int NOT NULL,
  `email_address` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `homeseeker`
--

INSERT INTO `homeseeker` (`id`, `first_name`, `last_name`, `age`, `family_members`, `income`, `job`, `phone_number`, `email_address`, `password`) VALUES
(1, 'Ahamd', 'khalid', 25, 4, 1000, 'Office manager', 543765439, 'ahmad@gmail.com', '$2y$10$wvUv8ZqPNEtHLCxgBw.voOlEL051PN.XwbtEN0DxHfrbQ./INMC5e'),
(2, 'Lama', 'Muhammad', 32, 4, 8500, 'Writer', 543876543, 'lama@gmail.com', '$2y$10$3ZSWzImFVUB3ZkuGd/UXSuA01q1N.VcEuAQbKaEQAwIXl9gX1uwxa'),
(3, 'Fatima', 'hamad', 43, 5, 13000, 'Project manager', 564876543, 'Fatima@gmail.com', '$2y$10$.TwxhjXDUU7SBTTDmaBMNeQsUqybZBtyj5yXj6GEbjW0Tzvc4o3Pa'),
(4, 'sa', 'rer', 34, 34, 34, 'fg', 4543, 'dfsd', 'dsf'),
(5, 'sfgha', 'rer', 34, 34, 34, 'fg', 4543, 'dfsd', 'dsf');

-- --------------------------------------------------------

--
-- Table structure for table `property`
--

CREATE TABLE `property` (
  `id` int NOT NULL,
  `homeowner_id` int NOT NULL,
  `property_category_id` int NOT NULL,
  `name` varchar(30) NOT NULL,
  `rooms` int NOT NULL,
  `rent_cost` int NOT NULL,
  `location` varchar(40) NOT NULL,
  `max_tenants` int NOT NULL,
  `description` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `property`
--

INSERT INTO `property` (`id`, `homeowner_id`, `property_category_id`, `name`, `rooms`, `rent_cost`, `location`, `max_tenants`, `description`) VALUES
(1, 1, 1, 'Home', 5, 30000, 'Riyadh,Al-Naries District', 4, 'modren villa with 5 bedrooms , 4 bathroms , basment , pool , 2 living room , kitchen\r\n\r\n'),
(2, 2, 3, '   apart5   ', 3, 10000, '   Riyadh,Al-Olaya District   ', 2, '   apartment with 3 bedrooms,2 bathroms , 1 living room , kitchen\r\n\r\n   '),
(3, 3, 3, 'majd', 4, 12000, 'Riyadh,Al-Nafl District', 3, 'apartment with 3 bedrooms , 2 bathroms , 1 living room , kitchen\r\n\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `propertycategory`
--

CREATE TABLE `propertycategory` (
  `id` int NOT NULL,
  `category` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `propertycategory`
--

INSERT INTO `propertycategory` (`id`, `category`) VALUES
(1, 'Villa'),
(2, 'Apartment'),
(3, 'apartment');

-- --------------------------------------------------------

--
-- Table structure for table `propertyimage`
--

CREATE TABLE `propertyimage` (
  `id` int NOT NULL,
  `property_id` int NOT NULL,
  `path` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `propertyimage`
--

INSERT INTO `propertyimage` (`id`, `property_id`, `path`) VALUES
(1, 1, 'images\\house.jpg'),
(3, 1, 'images\\house3.jpg'),
(5, 2, 'images\\house5.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `rentalapplication`
--

CREATE TABLE `rentalapplication` (
  `id` int NOT NULL,
  `property_id` int NOT NULL,
  `home_seeker_id` int NOT NULL,
  `application_status_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `rentalapplication`
--

INSERT INTO `rentalapplication` (`id`, `property_id`, `home_seeker_id`, `application_status_id`) VALUES
(1, 1, 3, 2),
(2, 2, 2, 1),
(3, 3, 1, 3),
(4, 1, 1, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applicationstatus`
--
ALTER TABLE `applicationstatus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `homeowner`
--
ALTER TABLE `homeowner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `homeseeker`
--
ALTER TABLE `homeseeker`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `property`
--
ALTER TABLE `property`
  ADD PRIMARY KEY (`id`),
  ADD KEY `homeowner_id` (`homeowner_id`),
  ADD KEY `property_category_id` (`property_category_id`);

--
-- Indexes for table `propertycategory`
--
ALTER TABLE `propertycategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `propertyimage`
--
ALTER TABLE `propertyimage`
  ADD PRIMARY KEY (`id`),
  ADD KEY `property_id` (`property_id`);

--
-- Indexes for table `rentalapplication`
--
ALTER TABLE `rentalapplication`
  ADD PRIMARY KEY (`id`),
  ADD KEY `property_id` (`property_id`),
  ADD KEY `home_seeker_id` (`home_seeker_id`),
  ADD KEY `application_status_id` (`application_status_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applicationstatus`
--
ALTER TABLE `applicationstatus`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `homeowner`
--
ALTER TABLE `homeowner`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `homeseeker`
--
ALTER TABLE `homeseeker`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `property`
--
ALTER TABLE `property`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `propertycategory`
--
ALTER TABLE `propertycategory`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `propertyimage`
--
ALTER TABLE `propertyimage`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `rentalapplication`
--
ALTER TABLE `rentalapplication`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
