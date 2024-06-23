-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 23, 2024 at 05:54 AM
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
-- Database: `pms`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `userid` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `confirmpassword` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`userid`, `username`, `email`, `password`, `confirmpassword`) VALUES
(3, 'vince', 'vincee@email.com', '$2y$10$deZKEwQCP/rfIfRpAImhjeLtnme4dZXwOFJNPhoFXtR', 'vincee'),
(4, 'admin123', 'adminoto@email.com', '$2y$10$OfOQV.TIHJilpbgES3G1C.d8HXbIVN01kCsLSQuBfwS', 'adminx'),
(5, 'user01', 'user01@email.com', '$2y$10$nFLzfnlgcM7079MnxERIw.LTWV3AjlPBNB7FuxsFFYU', 'user'),
(6, 'user02', 'user002@email.com', '$2y$10$oSW.XPhuZqQ8Fz8u0j5NX.oPOoqg1/NJhP2GxfbZ9r1', 'user02');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `projectid` int(11) NOT NULL,
  `projectname` varchar(50) NOT NULL,
  `startdate` date NOT NULL,
  `enddate` date NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`projectid`, `projectname`, `startdate`, `enddate`, `status`) VALUES
(10001, 'Web Redesign', '2024-01-15', '2024-04-26', 'Not Staring'),
(10002, 'Mobile App Development', '2024-02-05', '2024-05-30', 'Not Started'),
(10003, 'Marketing Campaign', '2024-03-11', '2024-07-05', 'In Progress'),
(10004, 'New Product Launch', '2024-04-07', '2024-08-02', 'Planning'),
(10005, 'Cloud Migration', '2024-05-06', '2024-09-27', 'Not Started'),
(10006, 'CRM Implementation', '2024-06-17', '2024-08-09', 'In Progress'),
(10007, 'Data Analysis Project', '2024-07-01', '2024-11-01', 'Completed'),
(10008, 'Employee Training Program', '2024-06-03', '2024-10-25', 'Planning'),
(10009, 'Customer Survey Analysis', '2024-09-02', '2024-09-27', 'Not Started'),
(10011, 'Infrastructure Upgrade', '2024-10-07', '2025-01-06', 'In Progress'),
(10014, 'Annual Report Preparation', '2024-03-18', '2024-08-20', 'Completed');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `task_id` int(11) NOT NULL,
  `assigned` varchar(50) NOT NULL,
  `project_id` varchar(50) NOT NULL,
  `position` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`task_id`, `assigned`, `project_id`, `position`, `status`) VALUES
(1112, 'Alice Johnson', '10001', 'Initial Design Mockups', 'Done'),
(1113, 'Bob Smith', '10001', 'Backend Development', 'Active'),
(1114, 'Carol White', '10001', 'User Testing', 'Inactive'),
(1115, 'David Brown', '10002', 'Requirement Gathering', 'Done'),
(1116, 'Eva Green', '10002', 'UI/UX Design', 'Active'),
(1117, 'Frank Black', '10002', 'Feature Implementation', 'Done'),
(1118, 'Gina Blue', '10003', 'Campaign Strategy Meeting', 'Inactive'),
(1119, 'Henry Yellow', '10003', 'Content Creation', 'Active'),
(1121, 'Jack Red', '10004', 'Market Analysis', 'Active'),
(1122, 'James Bond', '10012', 'IT Setup', 'Active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`projectid`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`task_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `projectid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10016;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `task_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1123;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
