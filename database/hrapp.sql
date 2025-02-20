-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 21, 2022 at 10:26 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hrapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `log-cred`
--

CREATE TABLE `log-cred` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `employee_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `log-cred`
--

INSERT INTO `log-cred` (`id`, `name`, `email`, `password`, `employee_id`) VALUES
(1, 'Vasu subramanium', 'subramaniumvasu6@gmail.com', '$2y$10$yUD/dewewv2FGHRAxa8mS.aqexL4wYLk95XEEGvb4cYJR0NTzd4d2', 886107),
(2, 'Avinash Singh', 'saarav392@gmail.com', '$2y$10$OO4vZWZVX0bJDJKnRX8oxut4OlK2Ax5rxoP5ULIHP3WCj66XqM2gC', 371802),
(3, 'Nithyanand Sir', 'test@gmail.com', '$2y$10$tyFPsgmoWsD9WG69QtAx6O7xKkQBkEWAZCHL5g82KobbzD0G4v0mi', 657634);

-- --------------------------------------------------------

--
-- Table structure for table `resources`
--

CREATE TABLE `resources` (
  `name` varchar(100) NOT NULL,
  `mobile` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `experience in relevant field` varchar(100) NOT NULL,
  `work experience` varchar(100) NOT NULL,
  `skills` varchar(100) NOT NULL,
  `developer-type` varchar(100) NOT NULL,
  `developer-skillset` varchar(100) NOT NULL,
  `graduation-course` varchar(100) NOT NULL,
  `graduation-type` varchar(100) NOT NULL,
  `resume` varchar(100) NOT NULL,
  `picture` varchar(100) NOT NULL,
  `current role` varchar(100) NOT NULL,
  `current company` varchar(100) NOT NULL,
  `notice period` varchar(100) NOT NULL,
  `current ctc` varchar(100) NOT NULL,
  `work_location` varchar(100) NOT NULL,
  `freelance ready` varchar(100) NOT NULL,
  `device available` varchar(100) NOT NULL,
  `type of job` varchar(100) NOT NULL,
  `joining date` varchar(100) NOT NULL,
  `linkedin` varchar(100) NOT NULL,
  `rate per-hour` varchar(100) NOT NULL,
  `resource-type` varchar(100) NOT NULL,
  `recruiter` varchar(100) NOT NULL,
  `project assigned` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `resources`
--

INSERT INTO `resources` (`name`, `mobile`, `email`, `location`, `address`, `experience in relevant field`, `work experience`, `skills`, `developer-type`, `developer-skillset`, `graduation-course`, `graduation-type`, `resume`, `picture`, `current role`, `current company`, `notice period`, `current ctc`, `work_location`, `freelance ready`, `device available`, `type of job`, `joining date`, `linkedin`, `rate per-hour`, `resource-type`, `recruiter`, `project assigned`) VALUES
('Vasu subramanium', '07889170021', 'optimusprime2232@gmail.com', 'Akola', '1002 sec 38b', '2', '3', 'Lucid Chart , automation-testing , agile , agile-testing , agile-development , ', 'webdev', 'mern', 'B.Sc.- Hospitality and Hotel Administration', 'ug', 'resource_document/OurNewServerLoginDetails.docx', 'resource_document/Sign up-rafiki.png', 'sasd', 'asdasd', '8 Days', '18000', 'Ajmer', 'yes', 'laptop', 'on-site', '2022-07-22', 'https://www.w3schools.com/php/phptryit.asp?filename=tryphp_func_math_rand', '20', 'it', '', 'null'),
('Avinash Singh', '8895644125', 'saarav392@gmail.com', 'Alappuzha', '1002 sec 38b', '3', '2', 'talend , teradata , ui-path , ', 'webdev', 'mern', 'BSW- Bachelor of Social Work', 'ug', 'resource_document/OurNewServerLoginDetails.docx', 'resource_document/images.jpg', 'Ui Dev', 'Infogenx', '10 Days', '18000', 'Allahabad', 'yes', 'laptop', 'remote', '2022-07-21', 'https://www.w3schools.com/php/phptryit.asp?filename=tryphp_func_math_rand', '20', 'non-it', '', 'null'),
('Avinash Singh', '8895644125', 'saarav392@gmail.com', 'Alappuzha', '1002 sec 38b', '3', '2', 'talend , teradata , ui-path , ', 'webdev', 'mern', 'BSW- Bachelor of Social Work', 'ug', 'resource_document/OurNewServerLoginDetails.docx', 'resource_document/images.jpg', 'Ui Dev', 'Infogenx', '10 Days', '18000', 'Allahabad', 'yes', 'laptop', 'remote', '2022-07-21', 'https://www.w3schools.com/php/phptryit.asp?filename=tryphp_func_math_rand', '20', 'non-it', '', 'null'),
('lekha subramanium', '8562242533', 'lekha@gmail.com', 'Chandigarh', 'test adress', '3', '4', 'agile , agile-testing , agile-development , ', 'webdev', 'lamp', 'B.Sc.- Hospitality and Hotel Administration', 'ug', 'resource_document/OurNewServerLoginDetails.docx', 'resource_document/Sign up-rafiki.png', 'Manager', 'Infogenx', '15 Days', '200000', 'Dehradun', 'yes', 'laptop', 'remote', '2022-07-20', 'google.com', 'Rs50', 'it', '', 'null');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `log-cred`
--
ALTER TABLE `log-cred`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `log-cred`
--
ALTER TABLE `log-cred`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
