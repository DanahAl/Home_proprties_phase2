-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 18, 2023 at 07:56 PM
-- Server version: 5.7.24
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `home properties`
--

-- --------------------------------------------------------

--
-- Table structure for table `applicationstatus`
--

CREATE TABLE `applicationstatus` (
  `id` int(11) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `applicationstatus`
--

INSERT INTO `applicationstatus` (`id`, `status`) VALUES
(1, 'Accept'),
(2, 'under consideration'),
(3, 'under consideration');

-- --------------------------------------------------------

--
-- Table structure for table `homeowner`
--

CREATE TABLE `homeowner` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `phone_number` int(11) NOT NULL,
  `email_address` varchar(70) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `id` int(11) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `age` int(11) NOT NULL,
  `family_members` int(11) NOT NULL,
  `income` int(11) NOT NULL,
  `job` varchar(40) NOT NULL,
  `phone_number` int(11) NOT NULL,
  `email_address` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `homeseeker`
--

INSERT INTO `homeseeker` (`id`, `first_name`, `last_name`, `age`, `family_members`, `income`, `job`, `phone_number`, `email_address`, `password`) VALUES
(1, 'Ahamd', 'khalid', 25, 4, 1000, 'Office manager', 543765439, 'ahmad@gmail.com', '$2y$10$wvUv8ZqPNEtHLCxgBw.voOlEL051PN.XwbtEN0DxHfrbQ./INMC5e'),
(2, 'Lama', 'Muhammad', 32, 4, 8500, 'Writer', 543876543, 'lama@gmail.com', '$2y$10$3ZSWzImFVUB3ZkuGd/UXSuA01q1N.VcEuAQbKaEQAwIXl9gX1uwxa'),
(3, 'Fatima', 'hamad', 43, 5, 13000, 'Project manager', 564876543, 'Fatima@gmail.com', '$2y$10$.TwxhjXDUU7SBTTDmaBMNeQsUqybZBtyj5yXj6GEbjW0Tzvc4o3Pa');

-- --------------------------------------------------------

--
-- Table structure for table `property`
--

CREATE TABLE `property` (
  `id` int(11) NOT NULL,
  `homeowner_id` int(11) NOT NULL,
  `property_category_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `rooms` int(11) NOT NULL,
  `rent_cost` int(11) NOT NULL,
  `location` varchar(40) NOT NULL,
  `max_tenants` int(11) NOT NULL,
  `description` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `property`
--

INSERT INTO `property` (`id`, `homeowner_id`, `property_category_id`, `name`, `rooms`, `rent_cost`, `location`, `max_tenants`, `description`) VALUES
(1, 1, 1, 'Home', 5, 30000, 'Riyadh,Al-Naries District', 4, 'modren villa with 5 bedrooms , 4 bathroms , basment , pool , 2 living room , kitchen\r\n\r\n'),
(2, 2, 2, 'apart5', 3, 10000, 'Riyadh,Al-Olaya District', 2, 'apartment with 3 bedrooms,2 bathroms , 1 living room , kitchen\r\n\r\n'),
(3, 3, 3, 'majd', 4, 12000, 'Riyadh,Al-Nafl District', 3, 'apartment with 3 bedrooms , 2 bathroms , 1 living room , kitchen\r\n\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `propertycategory`
--

CREATE TABLE `propertycategory` (
  `id` int(11) NOT NULL,
  `category` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `id` int(11) NOT NULL,
  `property_id` int(11) NOT NULL,
  `path` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `rentalapplication`
--

CREATE TABLE `rentalapplication` (
  `id` int(11) NOT NULL,
  `property_id` int(11) NOT NULL,
  `home_seeker_id` int(11) NOT NULL,
  `application_status_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rentalapplication`
--

INSERT INTO `rentalapplication` (`id`, `property_id`, `home_seeker_id`, `application_status_id`) VALUES
(1, 1, 3, 2),
(2, 2, 2, 1),
(3, 3, 1, 3);

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
-- Constraints for dumped tables
--

--
-- Constraints for table `property`
--
ALTER TABLE `property`
  ADD CONSTRAINT `property_ibfk_1` FOREIGN KEY (`homeowner_id`) REFERENCES `homeowner` (`id`),
  ADD CONSTRAINT `property_ibfk_2` FOREIGN KEY (`property_category_id`) REFERENCES `propertycategory` (`id`);

--
-- Constraints for table `propertyimage`
--
ALTER TABLE `propertyimage`
  ADD CONSTRAINT `propertyimage_ibfk_1` FOREIGN KEY (`property_id`) REFERENCES `property` (`id`);

--
-- Constraints for table `rentalapplication`
--
ALTER TABLE `rentalapplication`
  ADD CONSTRAINT `rentalapplication_ibfk_1` FOREIGN KEY (`property_id`) REFERENCES `property` (`id`),
  ADD CONSTRAINT `rentalapplication_ibfk_2` FOREIGN KEY (`home_seeker_id`) REFERENCES `homeseeker` (`id`),
  ADD CONSTRAINT `rentalapplication_ibfk_3` FOREIGN KEY (`application_status_id`) REFERENCES `applicationstatus` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
