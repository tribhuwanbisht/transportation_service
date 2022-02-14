-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 14, 2022 at 08:35 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `goods_transportation_service`
--

-- --------------------------------------------------------

--
-- Table structure for table `dealers`
--

CREATE TABLE `dealers` (
  `dealer_id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `mobile_number` varchar(20) NOT NULL,
  `nature_of_material` varchar(255) NOT NULL,
  `weight_of_material` int(100) NOT NULL,
  `quantity` int(100) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `user_type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dealers`
--

INSERT INTO `dealers` (`dealer_id`, `name`, `email`, `password`, `mobile_number`, `nature_of_material`, `weight_of_material`, `quantity`, `city`, `state`, `user_type`) VALUES
(1, 'Tanmay Bisht', 'tanmaybisht321@gmail.com', 'asss', '121212121', 'asasasa', 121, 145, 'Almora', 'Uttarakhand', 'dealer'),
(2, 'Priyanka Bangari', 'pryanka1234@gmail.com', '1234', '8232567865', 'asasasa', 121, 12121, 'Kashipur', 'Uttarakhand', 'dealer'),
(3, 'Manjari Sharma', 'manjarisharma@gmail.com', '12345', '2345678909', 'asasasa', 12, 1211, 'Indore', 'Madhya Pradesh', '');

-- --------------------------------------------------------

--
-- Table structure for table `drivers`
--

CREATE TABLE `drivers` (
  `driver_id` int(100) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `mobile_number` varchar(20) NOT NULL,
  `age` int(3) NOT NULL,
  `truck_number` varchar(20) NOT NULL,
  `truck_capacity` int(100) NOT NULL,
  `transporter_name` varchar(40) NOT NULL,
  `driving_experience` int(3) NOT NULL,
  `route_1` varchar(255) NOT NULL,
  `route_2` varchar(255) NOT NULL,
  `route_3` varchar(255) NOT NULL,
  `user_type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `drivers`
--

INSERT INTO `drivers` (`driver_id`, `name`, `email`, `password`, `mobile_number`, `age`, `truck_number`, `truck_capacity`, `transporter_name`, `driving_experience`, `route_1`, `route_2`, `route_3`, `user_type`) VALUES
(1, 'Tanmay Bisht', 'tanmaybisht321@gmail.com', '123', '7895559861', 22, '1212', 34, 'erre', 4, '', '', '', 'driver'),
(2, 'Tanmay', 'tanmaybisht321@gmail.com', 'we', '34343443', 23, '2323', 23222, '23223', 4, '', '', '', 'driver'),
(3, 'Shivam Shrivastav', 'tanmaybisht321@gmail.com', 'as', '23', 32, '23', 3232, '23232', 4, '', '', 'Akhnoor,Jammu and Kashmir-Almora,Uttarakhand', 'driver'),
(4, 'Nimish Lohumi', 'pryanka1234@gmail.com', '121', '212121', 21, '21', 2121, '1221', 4, 'Adimaly,Kerala-Achampet,Andhra Pradesh', 'Bagodar,Jharkhand-Chatra,Jharkhand', 'Dehradun,Uttarakhand-Almora,Uttarakhand', 'driver'),
(5, 'Manjari Sharma', 'manjarisharma1314@gmail.com', 'manjari123', '8789876785', 22, 'MP09455', 23, 'Sharma Travels', 2, 'Kashipur,Uttarakhand-Indore,Madhya Pradesh', 'Dehradun,Uttarakhand-Raibareli,Uttar Pradesh', 'Lucknow,Uttar Pradesh-Bangalore,Karnataka', 'driver');

-- --------------------------------------------------------

--
-- Table structure for table `drivers_dealers`
--

CREATE TABLE `drivers_dealers` (
  `id` int(10) NOT NULL,
  `dealer_id` int(10) NOT NULL,
  `driver_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `drivers_dealers`
--

INSERT INTO `drivers_dealers` (`id`, `dealer_id`, `driver_id`) VALUES
(2, 1, 4),
(4, 1, 4),
(5, 1, 4),
(6, 1, 4),
(7, 1, 4),
(8, 1, 4),
(9, 1, 4),
(10, 1, 4),
(11, 1, 4),
(12, 1, 4),
(13, 1, 4),
(14, 1, 4),
(15, 1, 4),
(16, 1, 4),
(17, 1, 4),
(18, 1, 4),
(19, 1, 4),
(20, 1, 4),
(21, 1, 4),
(22, 1, 4),
(23, 1, 4),
(24, 1, 4),
(25, 1, 4),
(26, 1, 4),
(27, 1, 4),
(28, 1, 4),
(29, 1, 4),
(30, 1, 4),
(31, 1, 4),
(32, 1, 4),
(33, 1, 4),
(34, 1, 4),
(35, 1, 4),
(36, 1, 4),
(37, 1, 4),
(38, 1, 4),
(39, 1, 4),
(40, 1, 4),
(41, 1, 4),
(42, 1, 4),
(43, 1, 4),
(44, 1, 4),
(45, 1, 4),
(46, 1, 4),
(47, 1, 4),
(48, 1, 4),
(49, 1, 4),
(50, 1, 4),
(51, 1, 4),
(52, 1, 4),
(53, 1, 4),
(54, 1, 4),
(55, 1, 4),
(56, 1, 4),
(57, 1, 4),
(58, 1, 4),
(59, 1, 4),
(60, 1, 4),
(61, 1, 4),
(62, 1, 4),
(63, 1, 4),
(64, 1, 4),
(65, 1, 4),
(66, 1, 4),
(67, 1, 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dealers`
--
ALTER TABLE `dealers`
  ADD PRIMARY KEY (`dealer_id`);

--
-- Indexes for table `drivers`
--
ALTER TABLE `drivers`
  ADD PRIMARY KEY (`driver_id`);

--
-- Indexes for table `drivers_dealers`
--
ALTER TABLE `drivers_dealers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dealers`
--
ALTER TABLE `dealers`
  MODIFY `dealer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `drivers`
--
ALTER TABLE `drivers`
  MODIFY `driver_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `drivers_dealers`
--
ALTER TABLE `drivers_dealers`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
