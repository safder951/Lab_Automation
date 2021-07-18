-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 16, 2021 at 10:22 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lab_auto`
--

-- --------------------------------------------------------

--
-- Table structure for table `cpri`
--

CREATE TABLE `cpri` (
  `cpri_id` int(11) NOT NULL,
  `pro_id_Fk` int(11) NOT NULL,
  `test_id_Fk` int(11) NOT NULL,
  `cpri_remark` varchar(200) NOT NULL,
  `cpri_status` varchar(200) NOT NULL,
  `cpri_datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `pro_id` int(11) NOT NULL,
  `pro_name` varchar(100) NOT NULL,
  `pro_image` varchar(300) NOT NULL,
  `pro_detail` text NOT NULL,
  `pro_add_datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`pro_id`, `pro_name`, `pro_image`, `pro_detail`, `pro_add_datetime`) VALUES
(121, 'switch gears', 'images.jfif', 'switching equipment used in the transmission of electricity.', '2021-02-15 19:19:49'),
(122, 'Fuses', 'download.jfif', 'In electronics and electrical engineering, a fuse is an electrical safety device that operates to provide overcurrent protection of an electrical circuit.', '2021-02-15 19:21:38'),
(123, 'Capacitor', 'capacitor.jfif', 'A capacitor is a device that stores electrical energy in an electric field. It is a passive electronic component with two terminals. ', '2021-02-15 19:27:14'),
(124, 'resistor', 'download (3).jfif', 'A resistor is a passive two-terminal electrical component that implements electrical resistance as a circuit element.', '2021-02-15 19:31:58'),
(125, 'Circuit Breaker', 'download (2).jfif', 'A circuit breaker is an automatically operated electrical switch designed to protect an electrical circuit from damage caused by excess current from an overload or short circuit.', '2021-02-15 20:32:31'),
(128, 'Capisitor', 'capacitor.jfif', 'switching equipment used in the transmission of electricity..', '2021-02-16 13:43:41');

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `res_id` int(11) NOT NULL,
  `res_name` varchar(100) NOT NULL,
  `res_remark` varchar(100) NOT NULL,
  `user_id_Fk` int(11) NOT NULL,
  `testing_id_Fk` int(11) NOT NULL,
  `pro_id_Fk` int(11) NOT NULL,
  `res_add_datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`res_id`, `res_name`, `res_remark`, `user_id_Fk`, `testing_id_Fk`, `pro_id_Fk`, `res_add_datetime`) VALUES
(7, 'TRT Pass', 'Good ', 1, 11, 122, '2021-02-15 20:40:50');

-- --------------------------------------------------------

--
-- Table structure for table `testing`
--

CREATE TABLE `testing` (
  `test_id` int(11) NOT NULL,
  `testing_type_Fk` int(11) NOT NULL,
  `test_revision` int(10) NOT NULL,
  `user_id_Fk` int(11) NOT NULL,
  `test_descp` text NOT NULL,
  `pro_id_Fk` int(11) NOT NULL,
  `test_status` varchar(255) NOT NULL,
  `test_add_datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `testing`
--

INSERT INTO `testing` (`test_id`, `testing_type_Fk`, `test_revision`, `user_id_Fk`, `test_descp`, `pro_id_Fk`, `test_status`, `test_add_datetime`) VALUES
(11, 5, 2, 1, 'The initial temperature rise is directly proportional to the square of the applied current and inversely proportional to frequency (ΔT α I2/f) over the range of frequencies tested. As the DC bias voltage applied to an X7R capacitor is increased from zero, the temperature rise (for a given applied current) decreases.', 123, 'Approve', '2021-02-15 20:37:14'),
(12, 3, 2, 1, ' Automatic Test System For Miniature Circuit Breakers. The SMC-12 system is designed to meet the needs established by the International Standards for the routine and quality control test of MCB with regards to their Thermal and Magnetic (Instantaneous) response.', 122, 'Approve', '2021-02-15 20:38:34'),
(13, 2, 10, 1, 'good resistor', 124, 'Pending', '2021-02-16 13:45:27');

-- --------------------------------------------------------

--
-- Table structure for table `test_type`
--

CREATE TABLE `test_type` (
  `test_type_id` int(11) NOT NULL,
  `test_type` varchar(200) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `test_type`
--

INSERT INTO `test_type` (`test_type_id`, `test_type`, `datetime`) VALUES
(1, 'High Power Direct tests', '2021-02-01 10:45:01'),
(2, 'High Power Synthetic tests', '2021-02-01 10:45:01'),
(3, 'Low voltage short circuit tests', '2021-02-01 10:45:31'),
(4, 'Short circuit tests on power transformers', '2021-02-01 10:45:31'),
(5, 'Temperature rise tests', '2021-02-01 10:46:00'),
(6, 'Dielectric tests', '2021-02-01 10:46:00'),
(7, 'Cable ageing and pre-qualification tests', '2021-02-01 10:46:40');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_reg_datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_password`, `user_email`, `user_reg_datetime`) VALUES
(1, 'safdarrehman', '123', 'safderawan951@gmail.com', '2021-01-21 13:01:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cpri`
--
ALTER TABLE `cpri`
  ADD PRIMARY KEY (`cpri_id`),
  ADD KEY `pro_id_Fk` (`pro_id_Fk`),
  ADD KEY `test_id_Fk` (`test_id_Fk`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`pro_id`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`res_id`),
  ADD KEY `pro_id_Fk` (`pro_id_Fk`),
  ADD KEY `testing_id_Fk` (`testing_id_Fk`),
  ADD KEY `user_id_Fk` (`user_id_Fk`);

--
-- Indexes for table `testing`
--
ALTER TABLE `testing`
  ADD PRIMARY KEY (`test_id`),
  ADD KEY `pro_id_Fk` (`pro_id_Fk`),
  ADD KEY `user_id_Fk` (`user_id_Fk`),
  ADD KEY `testing_type_Fk` (`testing_type_Fk`);

--
-- Indexes for table `test_type`
--
ALTER TABLE `test_type`
  ADD PRIMARY KEY (`test_type_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cpri`
--
ALTER TABLE `cpri`
  MODIFY `cpri_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `pro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `res_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `testing`
--
ALTER TABLE `testing`
  MODIFY `test_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `test_type`
--
ALTER TABLE `test_type`
  MODIFY `test_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cpri`
--
ALTER TABLE `cpri`
  ADD CONSTRAINT `cpri_ibfk_1` FOREIGN KEY (`pro_id_Fk`) REFERENCES `product` (`pro_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cpri_ibfk_2` FOREIGN KEY (`test_id_Fk`) REFERENCES `testing` (`test_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `result`
--
ALTER TABLE `result`
  ADD CONSTRAINT `result_ibfk_1` FOREIGN KEY (`pro_id_Fk`) REFERENCES `product` (`pro_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `result_ibfk_2` FOREIGN KEY (`testing_id_Fk`) REFERENCES `testing` (`test_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `result_ibfk_3` FOREIGN KEY (`user_id_Fk`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `testing`
--
ALTER TABLE `testing`
  ADD CONSTRAINT `testing_ibfk_1` FOREIGN KEY (`pro_id_Fk`) REFERENCES `product` (`pro_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `testing_ibfk_2` FOREIGN KEY (`user_id_Fk`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `testing_ibfk_3` FOREIGN KEY (`testing_type_Fk`) REFERENCES `test_type` (`test_type_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
