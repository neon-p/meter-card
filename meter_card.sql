-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 12, 2019 at 08:24 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `meter_card`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`email`, `password`) VALUES
('admin', 'password');

-- --------------------------------------------------------

--
-- Table structure for table `card_details`
--

CREATE TABLE `card_details` (
  `card_details_id` int(100) NOT NULL,
  `card_number` bigint(12) NOT NULL,
  `exp_date` date NOT NULL,
  `card_unit_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `card_details`
--

INSERT INTO `card_details` (`card_details_id`, `card_number`, `exp_date`, `card_unit_id`) VALUES
(8, 1259293201212, '2018-01-12', 7),
(9, 1259293201212, '2018-12-05', 8);

-- --------------------------------------------------------

--
-- Table structure for table `card_price`
--

CREATE TABLE `card_price` (
  `card_price_id` int(100) NOT NULL,
  `card_number_id` int(100) NOT NULL,
  `price` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `card_price`
--

INSERT INTO `card_price` (`card_price_id`, `card_number_id`, `price`) VALUES
(4, 8, '200'),
(5, 9, '200');

-- --------------------------------------------------------

--
-- Table structure for table `card_unit`
--

CREATE TABLE `card_unit` (
  `card_unit_id` int(10) NOT NULL,
  `unit_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `card_unit`
--

INSERT INTO `card_unit` (`card_unit_id`, `unit_id`) VALUES
(7, 4),
(8, 5);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(100) NOT NULL,
  `trx_id` bigint(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `card_id` int(10) NOT NULL,
  `user_id` int(100) NOT NULL,
  `account` bigint(100) NOT NULL,
  `meter_no` bigint(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `trx_id`, `status`, `card_id`, `user_id`, `account`, `meter_no`) VALUES
(1, 123, 'Approved', 8, 1, 1, 1),
(3, 12345, 'Approved', 8, 1, 2, 2),
(4, 12345, 'Done', 9, 1, 3, 3),
(10, 12345, 'Done', 8, 1, 4, 5);

-- --------------------------------------------------------

--
-- Table structure for table `unit`
--

CREATE TABLE `unit` (
  `unit_id` int(10) NOT NULL,
  `unit_value` bigint(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `unit`
--

INSERT INTO `unit` (`unit_id`, `unit_value`) VALUES
(1, 10),
(2, 20),
(3, 30),
(4, 40),
(5, 50),
(6, 60),
(7, 70),
(8, 80),
(9, 90),
(10, 100);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(100) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `mobile` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `mobile`) VALUES
(1, 'Polash', 'polashbaidya01@gmail.com', '3', 1111111);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `card_details`
--
ALTER TABLE `card_details`
  ADD PRIMARY KEY (`card_details_id`),
  ADD KEY `card_unit_id` (`card_unit_id`);

--
-- Indexes for table `card_price`
--
ALTER TABLE `card_price`
  ADD PRIMARY KEY (`card_price_id`),
  ADD KEY `card_details_id` (`card_number_id`);

--
-- Indexes for table `card_unit`
--
ALTER TABLE `card_unit`
  ADD PRIMARY KEY (`card_unit_id`),
  ADD KEY `unit_id` (`unit_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`),
  ADD UNIQUE KEY `a/c` (`account`),
  ADD UNIQUE KEY `meter_no` (`meter_no`),
  ADD KEY `card_id` (`card_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`unit_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `card_details`
--
ALTER TABLE `card_details`
  MODIFY `card_details_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `card_price`
--
ALTER TABLE `card_price`
  MODIFY `card_price_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `card_unit`
--
ALTER TABLE `card_unit`
  MODIFY `card_unit_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `unit`
--
ALTER TABLE `unit`
  MODIFY `unit_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `card_details`
--
ALTER TABLE `card_details`
  ADD CONSTRAINT `card_unit_id` FOREIGN KEY (`card_unit_id`) REFERENCES `card_unit` (`card_unit_id`);

--
-- Constraints for table `card_price`
--
ALTER TABLE `card_price`
  ADD CONSTRAINT `card_details_id` FOREIGN KEY (`card_number_id`) REFERENCES `card_details` (`card_details_id`);

--
-- Constraints for table `card_unit`
--
ALTER TABLE `card_unit`
  ADD CONSTRAINT `unit_id` FOREIGN KEY (`unit_id`) REFERENCES `unit` (`unit_id`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `card_id` FOREIGN KEY (`card_id`) REFERENCES `card_price` (`card_number_id`),
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
