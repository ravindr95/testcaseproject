-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 26, 2023 at 04:17 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `testcasedb`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `fname` varchar(200) NOT NULL,
  `lname` varchar(200) NOT NULL,
  `social_userid` varchar(1000) DEFAULT NULL,
  `user_name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `cpassword` varchar(50) NOT NULL,
  `is_verified` int(10) NOT NULL,
  `verificationToken` varchar(250) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `social_userid`, `user_name`, `password`, `cpassword`, `is_verified`, `verificationToken`, `date`) VALUES
(1, '', '', NULL, 'admin', '12345', '', 0, '', '2023-11-11 04:56:40'),
(9, '', '', NULL, 'ravindrakumar9560@gmail.com1', '12345', '12345', 0, '', '2023-11-16 18:45:41'),
(10, '', '', NULL, 'rav@gmail.com', '12345', '12345', 0, '', '2023-11-14 09:42:02'),
(11, '', '', NULL, 'rav@gmail.com', '12345', '12345', 0, '', '2023-11-14 09:45:05'),
(12, 'Rudra', 'Sharma', NULL, 'rudra@gmail.com', 'admin', 'admin', 0, '', '2023-11-14 09:45:55'),
(13, 'Rudra', 'Sharma', NULL, 'rudra@gmail.com', 'admin', 'admin', 0, '', '2023-11-14 09:48:28'),
(14, 'Ravi', 'Singh', NULL, 'ravi@gmail.com', 'admin123', 'admin123', 0, '', '2023-11-14 10:24:18'),
(15, 'Ravi', 'Singh', NULL, 'ravi@gmail.com', 'admin', 'admin', 0, '', '2023-11-14 10:25:11'),
(16, '', '', NULL, '', '', '', 0, '', '2023-11-14 10:28:58'),
(17, '', '', NULL, '', '', '', 0, '', '2023-11-14 10:29:07'),
(18, '', '', NULL, '', '', '', 0, '', '2023-11-14 10:29:45'),
(19, '', '', NULL, '', '', '', 0, '', '2023-11-14 10:29:53'),
(20, 'Mannu', 'Sharma', NULL, 'mannu@gmail.com', 'admin123', 'admin123', 0, '', '2023-11-14 10:33:41'),
(21, 'Mannu', 'Sharma', NULL, 'mannu@gmail.com', 'admin', 'admin', 0, '', '2023-11-14 11:10:53'),
(22, 'Mannu', 'Sharma', NULL, 'mannu@gmail.com', 'admin', 'admin', 0, '', '2023-11-14 11:12:37'),
(23, 'Udayraj', 'Sharma', NULL, 'uday@gmail.com', '123', '123', 0, '', '2023-11-14 11:18:48'),
(33, 'Ravi', 't', NULL, 'test@gmai.com', 'adnin', 'admin', 0, '', '2023-11-16 16:54:13'),
(34, 'Ravi', 'Sharma', NULL, 'test1@gmai.com', 'admin', 'admin', 0, '', '2023-11-16 16:56:16'),
(35, 'Ravi', 'Sharma', NULL, 'ravis@gmail.com', 'admin', 'admin', 0, '', '2023-11-16 17:02:00'),
(36, 'Ravi', 'Sharma', NULL, 'ravia@gmail.com', 'admin', 'admin', 0, '', '2023-11-16 17:03:56'),
(37, 'Ravi', 'Sharma', NULL, 'ravim@gmail.com', 'admin', 'admin', 0, '', '2023-11-16 17:07:08'),
(38, 'Ravindra Kumar', '', '2601274260037454', 'ravindrakumar9560@gmail.com', '12345', '12345', 0, '', '2023-11-16 19:03:48'),
(45, 'Ravi', 'Singh', NULL, 'ravindrakumar21995@gmail.com', '123', '123', 0, '85c0bf1627190466bd6457119d78edcedd2d48c67477d139e30747693537788a', '2023-11-26 08:33:44'),
(47, 'Ravi', 'Singh', NULL, 'abc@com', 'abc', 'abc', 0, '', '2023-11-26 12:35:20'),
(48, 'Ravi', 'Sh', NULL, 'abcq@com', 'abc', 'abc', 0, '', '2023-11-26 12:37:26'),
(49, 'Dog', 'Singh', NULL, 'doc@com', '123', '1233', 0, 'b55412bf0096b43d15550393785f84ddd9229717d4a5b94b357f65b70e8320e4', '2023-11-26 12:38:38'),
(50, 'Ravi', 'Singh', NULL, 'rudra12@gmail.com', '123', '1234', 0, '68f5a90fff18e91eb32bf76460ebbfb10109768f7cb05892070ccd60870242a8', '2023-11-26 12:46:52'),
(51, 'Ravi', 'Sharma', NULL, 'ravi12@gmail.com', '123', '123', 0, 'aa33188105c2be08d1895943d458ffd42802e06a294d9112ca722e9db6138cdc', '2023-11-26 12:51:41'),
(52, 'Ravi', 'Singh', NULL, 'sharravi@gmail.com', '123', '123', 0, '2b8b092363b0c61707bcf906c2ed44779c39be73d8ebd71fb4a0f258e0bcbe2e', '2023-11-26 12:52:07');

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE `vendor` (
  `id` int(10) NOT NULL,
  `cname` text NOT NULL,
  `logo` text NOT NULL,
  `caddress` text NOT NULL,
  `gstnmbr` varchar(202) NOT NULL,
  `listofservices` varchar(200) NOT NULL,
  `cpname` text NOT NULL,
  `cpemail` text NOT NULL,
  `linkedinid` text NOT NULL,
  `photo` text NOT NULL,
  `entry_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vendor`
--

INSERT INTO `vendor` (`id`, `cname`, `logo`, `caddress`, `gstnmbr`, `listofservices`, `cpname`, `cpemail`, `linkedinid`, `photo`, `entry_date`) VALUES
(1, 'ra', '1699886839Capture.JPG', 'noida', 'hhhh', 'laptop Repair', 'eab', 'abc@vpm', 'ffff', '1699886839Capture.JPG', '2023-11-13 14:47:19'),
(2, 'fsdf', '1699887484UGS.PNG', 'sdfsdf', 'sdfsdf', 'Computer Repair', 'dfsdf', 'f@com', 'gdf', '1699887484UGS.PNG', '2023-11-13 14:58:04'),
(3, 'fsdf', '1699888226UGS.PNG', 'sdfsdf', 'sdfsdf', 'Computer Repair', 'dfsdf', 'f@com', 'gdf', '1699888226UGS.PNG', '2023-11-13 15:10:26'),
(4, 'Ravi', '1699888394UGS.PNG', 'Noida', 'GGHJJJweqe3', 'Computer Repair', 'vcbcvbvc', 'b@gmaai', 'dfdf', '1699888394Capture.JPG', '2023-11-13 15:13:14'),
(5, 'Ravi', '1701004854DIC_sighra.jpg', 'Noida', 'Abcda123', 'Computer Repair', 'Sohan', 'sohan@vigyanprasar.gov.in', 'sohna62', '1701004854DIC_Ravindrapic.jpg', '2023-11-26 13:20:54'),
(6, 'Ravi', '1701005195DIC_sighra.jpg', 'Noida', 'dsfsd', 'Computer Repair', 'sdsvvfds', 'edw@com', 'ravindr62', '1701005195DIC_sighra.jpg', '2023-11-26 13:26:35'),
(7, 'Ravindra Shamra', '1701005293RAVINDRA pic.jpg', 'Noida', 'mmdvdv', 'Computer Repair', 'Sohan', 'sd@fd', 'sohna62', '1701005293Ravindrapic.jpg', '2023-11-26 13:28:13'),
(8, 'Ravindra S', '1701007834RAVINDRA pic.jpg', 'Ghaziabad', 'DVAP1234', 'laptop Repair', 'Mohan S', 'mahan@com', 'mohan12', '1701007834DIC_Ravindrapic.jpg', '2023-11-26 14:10:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `social` (`social_userid`) USING HASH;

--
-- Indexes for table `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vendor`
--
ALTER TABLE `vendor`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
